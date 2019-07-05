<?php
include "./common/env.php";
?>
</div>
</section>

<footer class="footer">
    <nav>
        <ul>
            <?php foreach ($menu as $name => $url) {?>
            <li><a href="<?=$url?>"><?=$name?></a></li>
            <?php }?>
        </ul>
        <ul>
            <?php foreach ($help as $name => $url) {?>
            <li><a href="<?=$url?>"><?=$name?></a></li>
            <?php }?>
        </ul>
    </nav>
    <p>
        <small>Copyright 2019 <a href="">hirosawa</a></small>
    </p>
</footer>
</div>

</body>

</html>