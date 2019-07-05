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
$name = "";
if (exist($_POST["name"])) {
    // もしemailが送られているなら変数の中に入れる
    $name = $_POST["name"];
} else {
    $message = "名前を入力してください。";
}

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

if (
    empty($name) ||
    empty($password) ||
    empty($email)
) {
    if (isset($_SESSION["email"])) {
        // 一覧ページに飛ばす処理
        header("Location: ./list.php");
        exit();
    }
} else {
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
    $sql = "INSERT INTO user (email, password, name) VALUES (?,?,?) ";
    // WHERE ~ で条件を選択する
    $stmt = $pdo->prepare($sql);
    $flag = $stmt->execute([$email, $password, $name]);

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
        $message = "新規登録できませんでした。";
    }
}

$call_url = "";
$error = true;
include "./message.php";