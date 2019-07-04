<?php
// ==============================
// 書き込み処理をするPHPファイル
// ==============================

// ログインの確認をする
session_start();
if (!isset($_SESSION["email"])) {
    header("Location: ./login-input.php");
    exit;
}

$error = false; // エラーフラグ
$message = "書き込みしました<br>2秒後に一覧画面に遷移します。";

$name = ""; // 名前
$comment = ""; // 本文
$url = ""; // 画像のURL

// 送られてきた値の検査をする
if (isset($_POST["name"])) { // nameの検査。
    $name = $_POST["name"];
} else {
    $name = "名無し"; //もし送られていなかったら名無しにする
}

if (isset($_POST["comment"])) { // コメントの検査
    $comment = $_POST["comment"];
} else {
    $error = true; // もしコメントがないならエラーにする
    $message = "コメントを入力してください。";
}

if (
    isset($_POST["url"]) && !empty($_POST["url"])
) { // URLの検査
    $url = $_POST["url"];
} else {
    // No Image画像の追加 (一行で書いてね ↓↓↓↓↓↓↓↓↓↓↓↓↓↓)
    $url = "https://placehold.jp/150x150.png?text=No%20Image";
}

if (!$error) {
    try {
        include "./common/dbconfig.php";
        $pdo = new PDO(
            $dbconfig["dsn"],
            $dbconfig["user"],
            $dbconfig["password"]
        );

        $datetime = new DateTime();
        $date = $datetime->format(
            'Y-m-d H:i:s'
        );

        $stmt = $pdo->prepare("INSERT INTO post (name, comment, date, url, email) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$name, $comment, $date, $url, $_SESSION["email"]]);
    } catch (PDOException $e) {
        $error = true;
        $message = "データベースのエラー" . $e->getMessage();
    }
}

$page_title = "書き込み完了";
$call_url = "list.php";
include "./message.php";