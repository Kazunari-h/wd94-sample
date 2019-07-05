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
    ?>
    <p>
        <?=$message?>
    </p>
    <?php
} else {
    ?>
    <h2 class="title is-4">検索結果</h2>
    <p><strong><?=$keyword?></strong>の検索結果一覧</p>
    <?php
// データを読み込む
    while ($row = $stmt->fetch()) {
        // 投稿ごとのHTMLの出力
        get_post_cell($row);
    }
}