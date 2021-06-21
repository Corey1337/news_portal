<?php
    session_start();
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="js/cur_backligth.js"></script>
<script>
$(function() {

    var pathname_url = window.location.pathname;
    var href_url = window.location.href;

    $(".menu li").each(function () {

        var link = $(this).find("a").attr("href");

        if(pathname_url == link || href_url == link) {

            $(this).addClass("active");

        }

    });
    });
</script>

<div class="container py-3">
        <div class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">
            <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
                <img src="img/upd_2_logo.png" wight="50" height="50"></img>
                <span class="fs-4">News Today</span>
            </a>

            <nav class="menu d-inline-flex mt-2 mt-md-0 ms-md-auto">
                <a class="me-3 py-2 text-dark text-decoration-none" href="/index.php">Главная</a>
                <a class="me-3 py-2 text-dark text-decoration-none" href="/contact.php">Контакты</a>
                <?php
                if(!isset($_SESSION['id']))
                {
                    ?>
                    <a class="btn btn-outline-primary" href="/redirect.php">Вход/Регистрация</a>
                    <?php
                }
                else
                {
                    ?>
                    <a class="me-3 py-2 text-dark text-decoration-none" href="/personal_area.php">Личный кабинет</a>
                    <a class="btn btn-outline-primary" href="/exit.php">Выход</a>
                    <?php
                }
                ?>
            </nav>
                
        </div>
    </div>