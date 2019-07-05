<?php

// ==============================
// 一覧表示処理をするPHPファイル
// ==============================

session_start();
include "header.php";

// CSSの確認のため、一時的にfocusするジャンルを指定する
$focus = "おにぎり";
include "sidebar.php";

// データベースに接続
include "./common/dbconfig.php";

try {
    $pdo = new PDO(
        $dbconfig["dsn"],
        $dbconfig["user"],
        $dbconfig["password"]
    );
    // POSTテーブルから投稿一覧を表示
    // SQLの実行
    $stmt = $pdo->query(
        'SELECT * FROM post'
    );

} catch (PDOException $e) {
    $error = true;
    $message = "データベースのエラー" . $e->getMessage();
}

echo "<div class=\"flex-main\">";
// データを読み込む
while ($row = $stmt->fetch()) {
    // 投稿ごとのHTMLの出力
    get_post_cell($row);
}
echo "</div>";

include "./footer.php";