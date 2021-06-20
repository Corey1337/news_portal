<?php
    session_start();
?>
<div class="container py-3">
        <div class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">
            <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
                <img src="img/logo.png" wight="50" height="50"></img>
                <span class="fs-4">News today</span>
            </a>

            <nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
                <a class="me-3 py-2 text-dark text-decoration-none" href="index.php">Главная</a>
                <a class="me-3 py-2 text-dark text-decoration-none" href="contact.php">Контакты</a>
            </nav>
                <?php
                if(!isset($_SESSION['id']))
                {
                    ?>
                    <a class="btn btn-outline_primary" href="redirect.php">Вход/Регистрация</a>
                    <?php
                }
                else
                {
                    ?>
                    <a class="btn btn-outline_primary" href="personal_area.php">Личный кабинет</a>
                    <a class="btn btn-outline_primary" href="/Exit.php">Выход</a>
                    <?php
                }
                ?>
        </div>
    </div>