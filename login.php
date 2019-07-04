<?php
// ==============================
// ログイン処理をするPHPファイル
// ==============================

// セッションの処理を行う場合に宣言する。
session_start();

include "./common/functions.php";

// エラーメッセージの定義
$message = "エラーが発生しました。";

// メールアドレスの取得
$email = "";
if (exist($_POST["email"])) {
    // もしemailが送られているなら変数の中に入れる
    $email = $_POST["email"];
} else {
    $message = "メールアドレスを入力してください。";
}
// パスワードの取得
$password = "";
if (exist($_POST["password"])) {
    // もしpasswordが送られているなら変数の中に入れる
    $password = $_POST["password"];
} else {
    $message = "パスワードを入力してください。";
}

// emailと
// passwordが DBに入っている値と
// あっているかどうか?

if (empty($password) || empty($email)) {
    // どちらかが空の場合
    // セッションで
    //      メールアドレスの値が残っている場合は
    //      ログインしているとみなす。
    if (isset($_SESSION["email"])) {
        // 一覧ページに飛ばす処理
        header("Location: ./list.php");
        exit();
    }
} else {
    // どちらも空じゃない
    // DBの設定をするオブジェクト
    include "./common/dbconfig.php";
    $pdo = new PDO(
        $dbconfig["dsn"],
        $dbconfig["user"],
        $dbconfig["password"]
    );

    // DBから特定の条件(メール, パスワード)
    //   でデータがあるか調べる
    // $pdo->prepare(SQLの文);
    // Insert, Select
    $sql = "SELECT count(*) FROM user WHERE
        email=:email AND password=:password";
    // WHERE ~ で条件を選択する
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $flag = $stmt->execute();

    if ($flag) {
        // emailとpasswordの組み合わせがあってた場合
        // セッションの処理
        // ログイン状態を維持する
        $_SESSION["email"] = $email;

        // 一覧ページに飛ばす処理
        header("Location: ./list.php");
        exit;
    } else {
        // emailかpasswordが間違ってた場合
        $message = "メールアドレスかパスワードが間違っています。";
    }
}

$page_title = "ログインエラー";
$call_url = "";
$error = true;
include "./message.php";