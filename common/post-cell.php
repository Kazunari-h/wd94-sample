<div class="box">
    <article class="media">
        <div class="media-left">
            <figure class="image is-64x64">
                <img src="<?=$post_url?>" alt="Image">
            </figure>
        </div>
        <div class="media-content">
            <div class="content">
                <p>
                    <strong><?=$post_name?></strong>
                    <br>
                    <span><?=$post_comment?></span>
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
                        <?php if ($is_self) {?>
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