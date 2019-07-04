<?php
// ==============================
// 検索結果を表示するPHPファイル
// ==============================

$error = false;
$message = "";
$keyword = "";

if (isset($_POST["keyword"]) && !empty($_POST["keyword"])) {
    // 検索ワードの検査
    $keyword = $_POST["keyword"];
} else {
    $error = true;
    $message = "検索ワードを入力してください。";
}

if (!$error) { // エラーじゃない場合
    try {
        // データベースに接続
        // DBの設定をするオブジェクト

        include "./common/dbconfig.php";

        $pdo = new PDO(
            $dbconfig["dsn"],
            $dbconfig["user"],
            $dbconfig["password"]
        );

        // POSTテーブルから検索した投稿を表示
        // SQLの実行
        $stmt = $pdo->prepare(
            "SELECT * FROM post WHERE name LIKE ? OR comment LIKE ?"
        );
        $stmt->execute(
            ["%$keyword%", "%$keyword%"]
        );
    } catch (PDOException $e) {
        $error = true;
        $message = "データベースのエラー" . $e->getMessage();
    }
}

if ($error) {
    // エラー画面を表示
    $page_title = "検索エラー";
    $call_url = "";
    include "./message.php";
} else {
    $page_title = "検索結果";
    include "./header.php";
    ?>
<h2>検索結果</h2>
<p>
    <strong>
        <?=$keyword?>
    </strong>
    の検索結果一覧</p>
<?php

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
                    <strong><?=$row["name"]?></strong>
                    <br>
                    <?=$row["comment"]?>
                </p>
            </div>
        </div>
    </article>
</div>
<?php
}
    include "./footer.php";
}