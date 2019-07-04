<?php
function checkAuth($url)
{
    if (isset($_SESSION["email"])) {
        // ログイン状態である
        // 一覧ページにジャンプさせる
        header("Location: ./$url");
        // 処理をここで終わらせる
        exit();
    }

}

function exist($value)
{
    return isset($value) && !empty($value);
}