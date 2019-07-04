<?php if (isset($_SESSION["email"])) {?>

<a href="./logout.php" class="button is-light">
    ログアウト
</a>

<?php } else {?>

<a href="./search-input.php" class="button is-primary">
    <strong>新規登録</strong>
</a>

<a href="./login-input.php" class="button is-light">
    ログイン
</a>

<?php }?>