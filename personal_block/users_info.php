<?php 
session_start();
require "../server/config.php";
?>

<?php
if($_SESSION['root']==1)
{
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
                <h3 class="h4">Список пользователей</h3>
                <div class="row mt-4">
                    <div class="col">
                        Имя
                    </div>
                    <div class="col">
                        Почта
                    </div>
                    <div class="col">
                        Статус
                    </div>
                    <div class="col">
                        Установка привелегий
                    </div>
                </div>
                <!-- Сверху шапка туда не лезь -->
                <?php
                $result = $db->query('SELECT * FROM `users_attribute`');
                while($row = $result->fetch_assoc())
                {
                ?>
                <div class="row mt-4 vertical-center">
                    <div class="col">
                        <?php
                        if ($row['img'] == '')
                        {
                        ?>
                        <img src="../img/upload_def_icon.jpg" class="user-img-min rounded-circle img-thumbnail">
                        <?php
                        }
                        else
                        {
                        ?>
                        <img src="../<?php echo $row['img']; ?>" class="user-img-min rounded-circle img-thumbnail">
                        <?php
                        }
                        ?>
                        <!-- <img class="rounded-circle img-thumbnail" src="../img/upload_def_icon.jpg" width="45"> -->
                        <?php print $row['login'] ?>
                    </div>
                    <div class="col">
                        <?php print $row['email'] ?>
                    </div>
                    <div class="col">
                        <?php
                        if ($row['root']==1)
                        {
                            echo '<h6 style="color:#0dcaf0;">Админ</h6>';
                        }
                        elseif($row['root']==0)
                        {
                            echo '<h6 style="color:#6c757d;">Обычный пользователь</h6>';
                        }
                        else
                        {
                            echo '<h6 style="color:#dc3545;">Забанен</h6>';
                        }
                        ?>
                    </div>
                    <div class="col">
                        <?php
                        if($row['root']==1 or $row['root']==0)
                        {
                            ?>
                            <button type="" class="btn btn-danger">Бан</button>
                            <?php
                        }
                        else
                        {
                            ?>
                            <button type="" class="btn btn-success">Разбан</button>
                            <?php
                        }
                        if($row['root']==1)
                        {
                            ?>
                            <button type="" class="btn btn-secondary">Сделать пользователем</button>
                            <?php
                        }
                        else
                        {
                            ?>
                            <button type="" class="btn btn-info">Сделать админом</button>
                            <?php
                        }
                        ?>
                    </div>
                </div>
                <?php
                }
                ?>
                <!-- в цикл этот div -->
            </div>
        </div>
        

        <?php require "../blocks/footer-min.php" ?>
    </body>
    </html>
    <?php
}
else
{
    header("Location:account_set.php");
}
?>