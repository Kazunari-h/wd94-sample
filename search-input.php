<?php
// ==============================
// 検索入力画面のPHPファイル
// ==============================
session_start();
include "./header.php";
?>
<div class="section">
    <form action="./search-input.php" method="post">
        <div class="title is-4">検索フォーム</div>
        <div class="field is-expanded">
            <div class="field has-addons">
                <div class="control has-icons-left ">
                    <input class="input" type="text" placeholder="キーワード検索" name="keyword"
                        <?=(isset($_POST["keyword"])) ? "value=\"" . $_POST["keyword"] . "\"" : "";?>>
                    <span class="icon is-small is-left">
                        <i class="fas fa-search"></i>
                    </span>
                </div>
                <div class="control">
                    <button type="submit" class="button is-info">
                        検索する
                    </button>
                </div>
            </div>
            <p class="help">名前とコメントからキーワードを検索します。</p>
        </div>
    </form>
</div>

<div class="section">
<?php
if (isset($_POST["keyword"])) {
    include "./search.php";
}
?>
</div>
<?php
include "./footer.php";
?>