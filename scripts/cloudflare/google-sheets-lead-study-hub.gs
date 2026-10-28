/**
 * Google Apps Script web app that appends sign-ups from the study-and-work overview page
 * (Cô Thanh Mai Du Học) to this spreadsheet. Same contract as google-sheets-lead.gs: the
 * Cloudflare Pages worker posts {secret, lead}; set the same secret as the script property
 * LEAD_SECRET (Project Settings > Script properties). Deploy as a web app that runs as you and
 * is accessible to anyone; the secret is what keeps other senders out.
 *
 * It only writes to the sheet and sends no alerts.
 */

var SHEET_NAME = 'Leads';
var COLUMNS = [
  ['submitted_at', 'Thời gian'],
  ['full_name', 'Họ và tên'],
  ['phone', 'Số điện thoại'],
  ['email', 'Email'],
  ['program', 'Nước quan tâm'],
  ['message', 'Em đang quan tâm'],
  ['source_url', 'Trang đăng ký'],
];

function doPost(e) {
  try {
    var body = JSON.parse(e.postData.contents);
    var secret = PropertiesService.getScriptProperties().getProperty('LEAD_SECRET');
    if (!secret || body.secret !== secret) {
      return reply({ ok: false, error: 'unauthorized' });
    }
    var lead = body.lead || {};
    lead.submitted_at = new Date();
    var lock = LockService.getScriptLock();
    lock.waitLock(20000);
    try {
      var sheet = leadsSheet();
      sheet.appendRow(COLUMNS.map(function (column) { return cell(lead[column[0]]); }));
    } finally {
      lock.releaseLock();
    }
    return reply({ ok: true });
  } catch (error) {
    return reply({ ok: false, error: String(error) });
  }
}

// A script opened from the sheet (Extensions > Apps Script) writes to that sheet; a standalone
// script needs the script property SHEET_ID, the long ID in the sheet's URL after /d/.
function leadsSheet() {
  var sheetId = PropertiesService.getScriptProperties().getProperty('SHEET_ID');
  var book = sheetId ? SpreadsheetApp.openById(sheetId) : SpreadsheetApp.getActiveSpreadsheet();
  if (!book) {
    throw new Error('No spreadsheet: open this script from the sheet, or set the SHEET_ID script property.');
  }
  var sheet = book.getSheetByName(SHEET_NAME) || book.insertSheet(SHEET_NAME);
  if (sheet.getLastRow() === 0) {
    sheet.appendRow(COLUMNS.map(function (column) { return column[1]; }));
    sheet.setFrozenRows(1);
  }
  return sheet;
}

// Visitor text that starts like a formula is stored as plain text, never evaluated, and
// phone numbers keep their leading zero instead of becoming numbers.
function cell(value) {
  if (value instanceof Date) {
    return value;
  }
  var text = value == null ? '' : String(value);
  return /^[=+\-@]|^0\d/.test(text) ? "'" + text : text;
}

function reply(data) {
  return ContentService.createTextOutput(JSON.stringify(data)).setMimeType(ContentService.MimeType.JSON);
}
