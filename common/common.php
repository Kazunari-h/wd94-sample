<?php

$site_name = "掲示板";

// ナビゲーションHTMLを出力する関数
function get_navigation()
{
    include "./common/env.php";
    include "./common/nav.php";
}

function get_post_cell($row)
{
    $post_name = $row["name"];
    $post_comment = $row["comment"];
    $post_image_url = $row["url"];
    $is_self = isset($_SESSION["email"]) && $row["email"] == $_SESSION["email"];
    include "./common/post-cell.php";
}

function get_page_title($filename)
{
    $page = array(
        'list' => "投稿画面",
        'search-input' => "検索入力画面",
        'write-input' => "書込画面",
        'write' => "書込画面",
        'login-input' => "ログイン画面",
        'login' => "ログイン画面",
        'logout' => "ログアウト画面",
        'message' => "メッセージ",
    );
    return $page[$filename];
}

function get_page_subtitle($filename)
{
    $page = array(
        'list' => "投稿された書込を表示します。",
        'search-input' => "キーワードで投稿を探し出します。",
        'write-input' => "自分の投稿ができます。",
        'write' => "自分の投稿ができます。",
        'login-input' => "ユーザー情報の入力をすると書込と検索ができるようになります。",
        'login' => "ユーザー情報の入力をすると書込と検索ができるようになります。",
        'logout' => "ログイン情報をリセットしました。",
        'message' => "",
    );
    return $page[$filename];
}