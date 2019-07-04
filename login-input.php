<?php

// ==============================
// ログイン画面を表示するPHPファイル
// ==============================

// ログインしてたら一覧ページに飛ばす
session_start();
if (isset($_SESSION["email"])) {
    // ログイン状態である
    // 一覧ページにジャンプさせる
    header("Location: ./list.php");
    // 処理をここで終わらせる
    exit();
}
$page_title = "ログイン";
include "./header.php";
?>

<form action="./login.php" method="post" id="login-form">
</form>


<div class="columns is-mobile is-centered">
    <div class="column is-7">
        <div class="box">
            <div class="field">
                <label class="label">Mail</label>
                <p class="control">
                    <input class="input" type="email" placeholder="メールアドレス" name="email" form="login-form" require>
                </p>
            </div>
            <div class="field">
                <label class="label">Password</label>
                <p class="control">
                    <input class="input" type="password" placeholder="パスワード" name="password" form="login-form" require>
                </p>
            </div>
            <div class="field">
                <div class="content">
                    <label class="checkbox">パスワードを忘れた方は<a href="#">こちら</a>
                    </label>
                </div>
            </div>
            <div class="field is-grouped">
                <div class="control">
                    <button type="submit" form="login-form" class="button is-link">ログイン</button>
                </div>
                <div class="control">
                    <button type="submit" form="login-form" class="button is-success">新規登録</button>
                </div>
            </div>
        </div>
    </div>
    <?php
    include "./footer.php";
