<?php
include "./common/common.php";
$bt = debug_backtrace();
$filename = basename($bt[0]['file'], ".php");
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <?php include "./common/head.php";?>
    <title><?=get_page_title($filename) . " | " . $site_name?></title>
</head>

<body>
    <div id="container">
        <section class="section">
            <div class="container">
                <?php get_navigation();?>
            </div>
        </section>

        <section class="hero">
            <div class="hero-body">
                <div class="container">
                    <h1 class="title">
                        <?=get_page_title($filename)?>
                    </h1>
                    <h2 class="subtitle">
                        <?=get_page_subtitle($filename)?>
                    </h2>
                </div>
            </div>
        </section>

        <section class="section">
            <div class="container">