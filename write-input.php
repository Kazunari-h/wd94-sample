<?php
// ログインの確認をする
session_start();
include "./common/functions.php";

$page_title = "入力画面";
include "./header.php";
?>
<form action="write.php" method="post">
    <div class="field">
        <label class="label">Name</label>
        <div class="control">
            <input name="name" class="input" type="text" placeholder="Text input">
        </div>
    </div>
    <div class="field">
        <label class="label">画像url</label>
        <div class="control">
            <input name="url" class="input" type="url" placeholder="URL">
        </div>
    </div>

    <div class="field">
        <label class="label">Message</label>
        <div class="control">
            <textarea name="comment" class="textarea" placeholder="テキストを打ってね"></textarea>
        </div>
    </div>

    <div class="field is-grouped">
        <div class="control">
            <button type="submit" class="button is-link">送る</button>
        </div>
    </div>
</form>
<?php
include "./footer.php";
