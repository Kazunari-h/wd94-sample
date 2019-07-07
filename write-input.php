<?php
// ログインの確認をする
session_start();
include "./common/functions.php";

include "./header.php";
?>

<div class="columns" id="input-form">
    <div class="column is-half">
        <div class="container">
            <form action="write.php" method="post">
                <div class="field">
                    <label class="label">名前</label>
                    <div class="control">
                        <input name="name"  v-model="name" class="input" type="text" placeholder="令和 太郎">
                    </div>
                </div>
                <div class="field">
                    <label class="label" >プロフィールアイコン</label>
                    <div class="control">
                        <input name="url" v-model="url" class="input" type="url" placeholder="画像URL">
                    </div>
                </div>

                <div class="field">
                    <label class="label">コメント</label>
                    <div class="control">
                        <textarea name="comment" v-model="comment" class="textarea" placeholder="テキストを打ってね"></textarea>
                    </div>
                </div>

                <div class="field is-grouped">
                    <div class="control">
                        <button type="submit" class="button is-link">送る</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="column is-half">
        <h1 class="title　is-5">
            <strong>記入例</strong>
        </h1>
        <div class="box">
            <article class="media">
                <div class="media-left">
                    <figure class="image is-64x64">
                        <img v-if="url" :src="url" alt="Image">
                        <img v-else src="https://placehold.jp/150x150.png?text=No%20Image" alt="Image">
                    </figure>
                </div>
                <div class="media-content">
                    <div class="content">
                        <p>
                            <strong>{{ name }}</strong>
                            <br>
                            <span>{{ comment }}</span>
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
                            </div>
                        </nav>
                    </div>
                </div>
            </article>
        </div>
    </div>
</div>

<script>
new Vue({
  el: '#input-form',
  data: {
    name: "",
    comment: "",
    url: ""
  }
})
</script>

<?php
include "./footer.php";