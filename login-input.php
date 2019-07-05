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
include "./header.php";
?>

<form action="./login.php" method="post" id="login-form">
</form>

<form action="./create-user.php" method="post" id="create-user-form">
</form>

<div class="columns is-mobile is-centered">
    <div class="column is-6">
        <div class="box">
            <h1 class="title is-5">
                ログインフォーム
            </h1>
            <div class="field">
                <label class="label">メールアドレス</label>
                <p class="control">
                    <input class="input" type="email" placeholder="hogehoge@gmail.com" name="email" form="login-form" require>
                </p>
            </div>
            <div class="field">
                <label class="label">パスワード</label>
                <p class="control">
                    <input class="input" type="password" placeholder="8桁推奨" name="password" form="login-form" require>
                </p>
            </div>
            <div class="field">
                <div class="content">
                    <label class="checkbox">パスワードを忘れた方は<a href="#">こちら</a>
                    </label>
                </div>
            </div>
            <div class="field">
                <div class="control">
                    <button type="submit" form="login-form" class="button is-link">ログイン</button>
                </div>
            </div>
        </div>
    </div>
    <div class="column is-6">
        <div class="box">
            <h1 class="title is-5">
                新規登録ファーム
            </h1>
            <div class="field">
                <label class="label">名前</label>
                <p class="control">
                    <input class="input" type="text" placeholder="令和 太郎" name="name" form="create-user-form" require>
                </p>
            </div>
            <div class="field">
                <label class="label">メールアドレス</label>
                <p class="control">
                    <input class="input" type="email" placeholder="hogehoge@gmail.com" name="email" form="create-user-form"
                        require>
                </p>
            </div>
            <div class="field">
                <label class="label">パスワード</label>
                <p class="control">
                    <input class="input" type="password" placeholder="8桁推奨" name="password" form="create-user-form"
                        require>
                </p>
            </div>
            <div class="field">
                <div class="control">
                    <button type="submit" form="create-user-form" class="button is-success">新規登録</button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include "./footer.php";