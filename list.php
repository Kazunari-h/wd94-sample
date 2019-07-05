<?php

// ==============================
// 一覧表示処理をするPHPファイル
// ==============================

session_start();
$page_title = "投稿一覧";
include "header.php";

// CSSの確認のため、一時的にfocusするジャンルを指定する
$focus = "おにぎり";
include "sidebar.php";

$page_count = 1;
if (
    isset($_GET["page_count"]) &&
    !empty($_GET["page_count"])

) {
    $page_count = intval($_GET["page_count"]);
} else {
    $page_count = 1;
}

// データベースに接続
include "./common/dbconfig.php";

// DBの設定をするオブジェクト
$pdo = new PDO(
    $dbconfig["dsn"],
    $dbconfig["user"],
    $dbconfig["password"]
);

$stmt = $pdo->query(
    "SELECT COUNT(*) as count FROM post"
);
$row = $stmt->fetch();
// 全ての件数の取得
$all_count = intval($row["count"]);

/*
1ページ目 1-5件目
2ページ目 6-10件目
3ページ目 11-15件目
4ページ目 16-20件目
5ページ目 21-25件目
6ページ目 26-30件目
*/

// POSTテーブルから投稿一覧を表示
// SQLの実行
$count = 6; //表示件数
$offset = ($page_count - 1) * $count;
echo "<div class=\"flex-main\">";

if ($all_count > $offset) {
    $stmt = $pdo->query(
        "SELECT * FROM post 
            ORDER BY id 
            LIMIT $count OFFSET $offset"
    );


    // データを読み込む
    while ($row = $stmt->fetch()) {
        // 投稿ごとのHTMLの出力
        ?>
        <div class="box">
            <article class="media">
                <div class="media-left">
                    <figure class="image is-64x64">
                        <img src="<?= $row["url"] ?>" alt="Image">
                    </figure>
                </div>
                <div class="media-content">
                    <div class="content">
                        <p>
                            <strong><?= $row["name"] ?></strong> <small><?= $line[2] ?></small>
                            <br>
                            <?= $row["comment"] ?>
                            <br>
                        </p>
                        <nav class="level is-mobile">
                            <div class="level-left cell-icons">
                                <a class="cell-link level-item" aria-label="like">
                                    <span class="icon is-small">
                                        <i class="far fa-heart" aria-hidden="true"></i>
                                    </span>
                                    いいね
                                </a>
                                <?php
                                if (
                                    isset($_SESSION["email"]) &&
                                    $row["email"] == $_SESSION["email"]
                                ) { ?>
                                    <a class="cell-link level-item" aria-label="like">
                                        <span class="icon is-small">
                                            <i class="far fa-edit" aria-hidden="true"></i>
                                        </span>
                                        編集
                                    </a>
                                    <a class="cell-link level-item" aria-label="like">
                                        <span class="icon is-small">
                                            <i class="far fa-trash-alt" aria-hidden="true"></i>
                                        </span>
                                        ゴミ箱
                                    </a>
                                <?php } ?>
                            </div>
                        </nav>
                    </div>
                </div>
            </article>
        </div>
    <?php
}
} else {
    echo "<p>投稿はありません。</p>";
}
echo "</div>";


include "./footer.php";
