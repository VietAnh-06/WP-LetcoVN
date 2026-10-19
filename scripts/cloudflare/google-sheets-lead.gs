/**
 * Google Apps Script web app that appends LETCO consultation sign-ups to this spreadsheet.
 * The Cloudflare Pages worker posts {secret, lead}; set the same secret as the script property
 * LEAD_SECRET (Project Settings > Script properties). Deploy as a web app that runs as you and
 * is accessible to anyone; the secret is what keeps other senders out.
 */

var SHEET_NAME = 'Leads';
var COLUMNS = [
  ['submitted_at', 'Thời gian'],
  ['full_name', 'Họ và tên'],
  ['phone', 'Số điện thoại'],
  ['email', 'Email'],
  ['program', 'Chương trình'],
  ['major', 'Ngành học'],
  ['birth_year', 'Năm sinh'],
  ['gpa', 'GPA THPT'],
  ['korean_level', 'Trình độ tiếng Hàn'],
  ['study_status', 'Tình trạng học'],
  ['school_name', 'Trường đang học'],
  ['message', 'Quan tâm'],
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

function leadsSheet() {
  var book = SpreadsheetApp.getActiveSpreadsheet();
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
