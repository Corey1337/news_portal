<?php 
session_start();
require "../server/config.php";
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">

    <title>News Today</title>
</head>
<body>
    <?php require "../blocks/header.php" ?>

    <div class="menu container mt-5 justify-content-md-center text-center">
        <?php require "pa_blocks/pa_header.php" ?>
        <div class="row mt-5 rounded border bg-light border-2">
            <div class="col">
                Аватарка
            </div>
            <div class="col">
                Имя
            </div>
            <div class="col">
                Почта
            </div>
            <div class="w-100 mt-2"></div>
            <div class="col mb-2">
                <?php
                if ($_SESSION['img'] == '')
                {
                ?>
                <img src="../img/1.jpg" class="user-img rounded-circle img-thumbnail" width="200" height="200">
                <?php
                }
                else
                {
                ?>
                    <img src="../<?php echo $_SESSION['img']; ?>" class="rounded-circle img-thumbnail" width="200">
                <?php
                }
                //?>
                <!-- Тут отображается ава пользователя -->
            </div>
            <div class="col">
                <?php
                   print $_SESSION['login']
                ?>
                <!-- Тут отображается Никнейм -->
            </div>
            <div class="col">
                <?php
                   print $_SESSION['email']
                ?>
                <!-- Тут отображается логин -->
            </div>
        </div>
    </div>
    

    <?php require "../blocks/footer-min.php" ?>
</body>
</html>