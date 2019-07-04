    <nav class="navbar" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <a class="navbar-item" href="./list.php">
                <img src="http://placehold.jp/28/ffffff/000000/112x28.png?text=SP91">
            </a>
            <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>
        <div id="navbarBasicExample" class="navbar-menu">
            <div class="navbar-start">
                <?php foreach ($menu as $name => $url) { ?>
                    <a href="<?= $url ?>" class="navbar-item">
                        <?= $name ?>
                    </a>
                <?php } ?>
            </div>
            <div class="navbar-end">
                <div class="navbar-item">
                    <div class="buttons">
                        <?php include "./common/nav-buttons.php"; ?>
                    </div>
                </div>
            </div>
        </div>
    </nav>