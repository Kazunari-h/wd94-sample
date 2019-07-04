<?php include "./common/common.php"; ?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <?php include "./common/head.php"; ?>
    <title><?= $page_title ?></title>
    <script>
        document.addEventListener('DOMContentLoaded', () => {

            // Get all "navbar-burger" elements
            const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

            // Check if there are any navbar burgers
            if ($navbarBurgers.length > 0) {

                // Add a click event on each of them
                $navbarBurgers.forEach(el => {
                    el.addEventListener('click', () => {

                        // Get the target from the "data-target" attribute
                        const target = el.dataset.target;
                        const $target = document.getElementById(target);

                        // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
                        el.classList.toggle('is-active');
                        $target.classList.toggle('is-active');

                    });
                });
            }

        });
    </script>
</head>

<body>
    <div id="container">
        <section class="section">
            <div class="container">
                <?php getNav(); ?>
            </div>
        </section>
        <section class="section">

            <div class="container">
                <h1 class="title">
                    <?= $page_title ?>
                </h1>
            </div>
            <div class="container">