<?php

// ==============================
// 一覧表示処理をするPHPファイル
// ==============================

session_start();
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

try {
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
    $count = 2; //表示件数
    $offset = ($page_count - 1) * $count;
    echo "<div class=\"flex-main\">";

    include "./common/breadcrumb.php";

    ?>
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="notification">
                    Primar lorem ipsum dolor sit amet, consectetur
                    adipiscing elit lorem ipsum dolor. <strong>Pellentesque risus mi</strong>, tempus quis placerat ut, porta nec nulla. Vestibulum rhoncus ac ex sit amet fringilla. Nullam gravida purus diam, et dictum <a>felis venenatis</a> efficitur. Sit amet,
                    consectetur adipiscing elit
                </div>
            </div>
            <div class="swiper-slide">
                <div class="notification">
                    Primar lorem ipsum dolor sit amet, consectetur
                    adipiscing elit lorem ipsum dolor. <strong>Pellentesque risus mi</strong>, tempus quis placerat ut, porta nec nulla. Vestibulum rhoncus ac ex sit amet fringilla. Nullam gravida purus diam, et dictum <a>felis venenatis</a> efficitur. Sit amet,
                    consectetur adipiscing elit
                </div>
            </div>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
        <!-- Add Arrows -->
        <div class="swiper-button-next">
            <i class="fas fa-arrow-alt-circle-right fa-2x"></i>
        </div>
        <div class="swiper-button-prev">
            <i class="fas fa-arrow-alt-circle-left fa-2x"></i>
        </div>
    </div>
    <?php

    if ($all_count >  $offset) {
        $stmt =  $pdo->query(
            "SELECT * FROM post 
            ORDER BY id 
            LIMIT  $count OFFSET  $offset"
        );

        // データを読み込む
        while ($row = $stmt->fetch()) {
            // 投稿ごとのHTMLの出力
            get_post_cell($row);
        }

        ?>
        <div class="buttons  is-centered">
            <?php
            for ($i = 1; $i <= ceil($all_count / $count); $i++) {
                $disabled = ($i == $page_count) ? "disabled" : "";
                $href = ($i == $page_count) ? "" : "href=\"./list.php?page_count=$i\"";
                echo "<a $href class=\"button\" $disabled>$i</a>";
            }
            ?>
        </div>
    <?php
    } else {
        echo "<p>投稿はありません。</p>";
    }
    echo "</div>";
} catch (PDOException $e) {
    $error = true;
    $message = "データベースのエラー" . $e->getMessage();
}
include "./footer.php";
