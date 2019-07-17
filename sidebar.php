<?php
// サイドバーを表示するPHP
// 掲示板の投稿ジャンルを表示する。
// ジャンルの一覧を配列に格納する。

$genre = array(
    "和食" => array(
        "おにぎり" => "#",
        "焼きそば" => "#",
    ),
    "洋食" => array(
        "オムレツ" => "#",
        "ビーフシチュー" => "#",
    ),
);

// https://codepen.io/takanorip/pen/grZpOp
?>
<div class="flex-container">
    <nav class="sidebar">
        <?php
        foreach ($genre as $name => $small_genre) {
            echo "<input type=\"checkbox\" id=\"check_$name\">";
            echo "<label class=\"sidebar-label\" for=\"check_$name\">$name</label>";
            echo "<ul id=\"list_$name\">";
            foreach ($small_genre as $s_name => $s_url) {
                echo "<li>
                        <a href=\"$s_url\">$s_name</a>
                      </li>";
            }
            echo "</ul>";

            // if ($name == $focus) {
            //     echo "<li class=\"focus\">$name</li>";
            // } else {
            //     echo "<li class=\"sidebar-list\"><a href=\"$url\">$name</a></li>";
            // }
        }
        ?>
    </nav>