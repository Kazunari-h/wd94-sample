<?php
// サイドバーを表示するPHP
// 掲示板の投稿ジャンルを表示する。
// ジャンルの一覧を配列に格納する。

$genre = array(
    // 'ジャンル名' => "URL",
    'おにぎり' => "#",
    '寿司' => "#",
    '天ぷら' => "#",
    'そば' => "#",
    '焼きそば' => "#",
    'お好み焼き' => "#",
);
?>
<div class="flex-container">
    <nav class="sidebar">
        <ul>
            <?php
foreach ($genre as $name => $url) {
    if ($name == $focus) {
        echo "<li class=\"focus\">$name</li>";
    } else {
        echo "<li class=\"sidebar-list\"><a href=\"$url\">$name</a></li>";
    }
}
?>
        </ul>
    </nav>