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

// データベースに接続
include "./common/dbconfig.php";

// DBの設定をするオブジェクト
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

echo "<div class=\"flex-main\">";
// データを読み込む
while ($row = $stmt->fetch()) {
    // 投稿ごとのHTMLの出力
    ?>
<div class="box">
    <article class="media">
        <div class="media-left">
            <figure class="image is-64x64">
                <img src="<?=$row["url"]?>" alt="Image">
            </figure>
        </div>
        <div class="media-content">
            <div class="content">
                <p>
                    <strong><?=$row["name"]?></strong> <small><?=$line[2]?></small>
                    <br>
                    <?=$row["comment"]?>
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
    ) {?>
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
                        <?php }?>
                    </div>
                </nav>
            </div>
        </div>

    </article>
</div>
<?php
}
echo "</div>";

include "./footer.php";