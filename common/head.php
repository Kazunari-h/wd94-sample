    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/css/swiper.min.css" integrity="sha256-XwfUNXGiAjWyUGBhyXKdkRedMrizx1Ejqo/NReYNdUE=" crossorigin="anonymous" />
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/js/swiper.min.js" integrity="sha256-uckMYBvIGtce2L5Vf/mwld5arpR5JuhAEeJyjPZSUKY=" crossorigin="anonymous"></script>

    <!-- CSSの読み込み -->
    <link rel="stylesheet" href="./common.css">
    <!-- JSの読み込み -->
    <script defer src="./common/common.js"></script>

    <?php if (!$error && !empty($call_url)) { ?>
        <meta http-equiv="refresh" content=" 2; url=./<?= $call_url ?>">
    <?php } ?>