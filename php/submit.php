<?php
// --- 入力内容を受け取る ---
$name = $_POST['name'] ?? '';
$birth = $_POST['birth'] ?? '';
$tel = $_POST['tel'] ?? '';
$email = $_POST['email'] ?? '';
$message = $_POST['message'] ?? '';

// --- SQLiteデータベースに接続（なければ自動で作られる） ---
$db = new SQLite3('../db/contact.sqlite');

// --- テーブルがまだなければ作る ---
$db->exec("CREATE TABLE IF NOT EXISTS contact (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  name TEXT,
  birth TEXT,
  tel TEXT,
  email TEXT,
  message TEXT,
  submitted_at TEXT
)");

// --- データを保存（今の日時も含めて） ---
$stmt = $db->prepare("INSERT INTO contact (name, birth, tel, email, message, submitted_at) 
                      VALUES (?, ?, ?, ?, ?, datetime('now'))");

$stmt->bindValue(1, $name, SQLITE3_TEXT);
$stmt->bindValue(2, $birth, SQLITE3_TEXT);
$stmt->bindValue(3, $tel, SQLITE3_TEXT);
$stmt->bindValue(4, $email, SQLITE3_TEXT);
$stmt->bindValue(5, $message, SQLITE3_TEXT);
$stmt->execute();

// --- 完了メッセージを表示 ---
?>
