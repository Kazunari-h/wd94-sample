<?php
// ==============================
// 検索入力画面のPHPファイル
// ==============================
$page_title = "検索画面 | 掲示板システム";
include "./header.php";
?>
<p>
    検索すると投稿が表示されます。
</p>
<form action="./search.php" method="post">
    <input type="text" name="keyword">
    <button type="submit">
        検索する
    </button>
</form>
<?php
include "./footer.php";
?>