/**
 * Google Apps Script web app that appends LETCO consultation sign-ups to this spreadsheet.
 * The Cloudflare Pages worker posts {secret, lead}; set the same secret as the script property
 * LEAD_SECRET (Project Settings > Script properties). Deploy as a web app that runs as you and
 * is accessible to anyone; the secret is what keeps other senders out.
 *
 * Optional Zalo alert: with the script properties ZALO_BOT_TOKEN (from bot.zaloplatforms.com)
 * and ZALO_CHAT_IDS (comma-separated chat IDs; run listZaloChats to find them), every new row
 * is also announced to those Zalo chats. A failed alert is logged and never loses the lead.
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
    notifyZalo(lead);
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

var ZALO_API = 'https://bot-api.zaloplatforms.com/bot';

function notifyZalo(lead) {
  var props = PropertiesService.getScriptProperties();
  var token = props.getProperty('ZALO_BOT_TOKEN');
  var chatIds = (props.getProperty('ZALO_CHAT_IDS') || '').split(',').map(function (id) { return id.trim(); }).filter(String);
  if (!token || !chatIds.length) {
    return;
  }
  var lines = ['🔔 Đăng ký tư vấn mới'];
  [['full_name', 'Họ tên'], ['phone', 'SĐT'], ['email', 'Email'], ['program', 'Chương trình'],
    ['major', 'Ngành'], ['school_name', 'Trường'], ['korean_level', 'Tiếng Hàn'], ['message', 'Quan tâm'],
    ['source_url', 'Trang']].forEach(function (field) {
    if (lead[field[0]]) {
      lines.push(field[1] + ': ' + lead[field[0]]);
    }
  });
  lines.push('Sheet: ' + SpreadsheetApp.getActiveSpreadsheet().getUrl());
  var text = lines.join('\n').slice(0, 2000);
  chatIds.forEach(function (chatId) {
    try {
      var response = UrlFetchApp.fetch(ZALO_API + token + '/sendMessage', {
        method: 'post',
        contentType: 'application/json',
        payload: JSON.stringify({ chat_id: chatId, text: text }),
        muteHttpExceptions: true,
      });
      var result = JSON.parse(response.getContentText());
      if (!result.ok) {
        console.error('Zalo alert to ' + chatId + ' failed: ' + response.getContentText());
      }
    } catch (error) {
      console.error('Zalo alert to ' + chatId + ' failed: ' + error);
    }
  });
}

// Run from the editor after messaging the bot (or adding it to a group): the log lists the chat
// IDs that recently wrote to it, to copy into ZALO_CHAT_IDS.
function listZaloChats() {
  var token = PropertiesService.getScriptProperties().getProperty('ZALO_BOT_TOKEN');
  var response = UrlFetchApp.fetch(ZALO_API + token + '/getUpdates', { method: 'post', muteHttpExceptions: true });
  var body = response.getContentText();
  console.log(body);
  var data = JSON.parse(body);
  var updates = Array.isArray(data.result) ? data.result : (data.result ? [data.result] : []);
  updates.forEach(function (update) {
    var message = update.message || {};
    if (message.chat && message.chat.id) {
      var sender = message.from ? message.from.display_name || message.from.id : '';
      console.log('chat_id: ' + message.chat.id + (sender ? '  (' + sender + ')' : ''));
    }
  });
  if (!updates.length) {
    console.log('No new messages. Send the bot a message in Zalo, then run this again within 30 seconds.');
  }
}

// Run from the editor to send a sample alert without adding a row.
function testZaloAlert() {
  notifyZalo({ full_name: 'Thử thông báo', phone: '0900000000', program: 'Kiểm tra bot Zalo' });
}

function reply(data) {
  return ContentService.createTextOutput(JSON.stringify(data)).setMimeType(ContentService.MimeType.JSON);
}
