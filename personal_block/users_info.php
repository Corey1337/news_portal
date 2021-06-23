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
            <div class="users_list row mt-5 rounded border bg-light border-2">
                <h3 class="h4">Список пользователей</h3>
                <div>
                    <form action="/server/user_search.php" method="post" class="users_search">
                        <input type="text" name="user" class="form-control d-inline" placeholder="Поиск по ключевому слову">
                        <input type="submit" name="user_search" class="form-control mt-2 d-inline btn btn-primary" value="Искать"/>
                    </form>
                    <!-- ПОИСК ПОЛЬЗОВАТЕЛЯ -->
                </div>
                <div class="row mt-2">
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
                //$result = $db->query('SELECT * FROM `users_attribute`');
                if(($_SESSION['need_of_search'])==FALSE)
                {
                    $result = $db->query('SELECT * FROM `users_attribute`');
                    while($row = $result->fetch_assoc())
                    {
                    $value=$row['email'];
                    ?>
                    <div class="row mt-4 vertical-center mb-1">
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
                                echo '<h6 style="color:#6c757d;">Пользователь</h6>';
                            }
                            else
                            {
                                echo '<h6 style="color:#dc3545;">Забанен</h6>';
                            }
                            ?>
                        </div>
                        <div class="col">
                            <?php
                            if($_SESSION['email']!=$row['email'])
                            {
                                if($row['root']==1 or $row['root']==0)
                                {
                                    ?>
                                    <form style="display:inline-block" method="post" action="/server/privilege.php">
                                        <input type="hidden" name="email" value="<?php echo $value; ?>" />
                                        <input type="submit" name="ban" class="btn btn-danger" value="Бан" />
                                    </form>
                                    <?php
                                }
                                else
                                {
                                    ?>
                                    <form style="display:inline-block" method="post" action="/server/privilege.php">
                                        <input type="hidden" name="email" value="<?php echo $value; ?>" />
                                        <input type="submit" name="unban" class="btn btn-success" value="Разбан" />
                                    </form>
                                    <?php
                                    
                                }
                                if($row['root']==1)
                                {
                                    ?>
                                    <form style="display:inline-block" method="post" action="/server/privilege.php">
                                        <input type="hidden" name="email" value="<?php echo $value; ?>" />
                                        <input type="submit" name="set_user" class="btn btn-secondary" value="Сделать пользователем" />
                                    </form>
                                    <?php
                                }
                                else
                                {
                                    ?>
                                    <form style="display:inline-block" method="post" action="/server/privilege.php">
                                        <input type="hidden" name="email" value="<?php echo $value; ?>" />
                                        <input type="submit" name="set_admin" class="btn btn-info" value="Сделать админом" />
                                    </form>
                                    <?php
                                }
                            }
                            else
                            {
                                echo 'Это вы!';
                            }
                            ?>
                        </div>
                    </div>
                    <?php
                    }
                }
                elseif($_SESSION['search']=="Админ" or $_SESSION['search']=="админ" or $_SESSION['search']=="АДМИН")
                {
                    $search=$_SESSION['search'];
                    $result = $db->query('SELECT * FROM `users_attribute` WHERE `root`=1 OR `email` = "Админ" OR `email` = "админ" OR `email` = "АДМИН" OR `login` = "Админ" OR `login` = "админ" OR `login` = "АДМИН" ');
                    while($row = $result->fetch_assoc())
                    {
                    $value=$row['email'];
                    ?>
                    <div class="row mt-4 vertical-center mb-1">
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
                                echo '<h6 style="color:#6c757d;">Пользователь</h6>';
                            }
                            else
                            {
                                echo '<h6 style="color:#dc3545;">Забанен</h6>';
                            }
                            ?>
                        </div>
                        <div class="col">
                            <?php
                            if($_SESSION['email']!=$row['email'])
                            {
                                if($row['root']==1 or $row['root']==0)
                                {
                                    ?>
                                    <form style="display:inline-block" method="post" action="/server/privilege.php">
                                        <input type="hidden" name="email" value="<?php echo $value; ?>" />
                                        <input type="submit" name="ban" class="btn btn-danger" value="Бан" />
                                    </form>
                                    <?php
                                }
                                else
                                {
                                    ?>
                                    <form style="display:inline-block" method="post" action="/server/privilege.php">
                                        <input type="hidden" name="email" value="<?php echo $value; ?>" />
                                        <input type="submit" name="unban" class="btn btn-success" value="Разбан" />
                                    </form>
                                    <?php
                                    
                                }
                                if($row['root']==1)
                                {
                                    ?>
                                    <form style="display:inline-block" method="post" action="/server/privilege.php">
                                        <input type="hidden" name="email" value="<?php echo $value; ?>" />
                                        <input type="submit" name="set_user" class="btn btn-secondary" value="Сделать пользователем" />
                                    </form>
                                    <?php
                                }
                                else
                                {
                                    ?>
                                    <form style="display:inline-block" method="post" action="/server/privilege.php">
                                        <input type="hidden" name="email" value="<?php echo $value; ?>" />
                                        <input type="submit" name="set_admin" class="btn btn-info" value="Сделать админом" />
                                    </form>
                                    <?php
                                }
                            }
                            else
                            {
                                echo 'Это вы!';
                            }
                            ?>
                        </div>
                    </div>
                    <?php
                    }
                }
                elseif($_SESSION['search']=="Забанен" or $_SESSION['search']=="забанен" or $_SESSION['search']=="ЗАБАНЕН")
                {
                    $search=$_SESSION['search'];
                    $result = $db->query('SELECT * FROM `users_attribute` WHERE `root`=2 OR `email` = "Забанен" OR `email` = "забанен" OR `email` = "ЗАБАНЕН" OR `login` = "Забанен" OR `login` = "забанен" OR `login` = "ЗАБАНЕН" ');
                    while($row = $result->fetch_assoc())
                    {
                    $value=$row['email'];
                    ?>
                    <div class="row mt-4 vertical-center mb-1">
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
                                echo '<h6 style="color:#6c757d;">Пользователь</h6>';
                            }
                            else
                            {
                                echo '<h6 style="color:#dc3545;">Забанен</h6>';
                            }
                            ?>
                        </div>
                        <div class="col">
                            <?php
                            if($_SESSION['email']!=$row['email'])
                            {
                                if($row['root']==1 or $row['root']==0)
                                {
                                    ?>
                                    <form style="display:inline-block" method="post" action="/server/privilege.php">
                                        <input type="hidden" name="email" value="<?php echo $value; ?>" />
                                        <input type="submit" name="ban" class="btn btn-danger" value="Бан" />
                                    </form>
                                    <?php
                                }
                                else
                                {
                                    ?>
                                    <form style="display:inline-block" method="post" action="/server/privilege.php">
                                        <input type="hidden" name="email" value="<?php echo $value; ?>" />
                                        <input type="submit" name="unban" class="btn btn-success" value="Разбан" />
                                    </form>
                                    <?php
                                    
                                }
                                if($row['root']==1)
                                {
                                    ?>
                                    <form style="display:inline-block" method="post" action="/server/privilege.php">
                                        <input type="hidden" name="email" value="<?php echo $value; ?>" />
                                        <input type="submit" name="set_user" class="btn btn-secondary" value="Сделать пользователем" />
                                    </form>
                                    <?php
                                }
                                else
                                {
                                    ?>
                                    <form style="display:inline-block" method="post" action="/server/privilege.php">
                                        <input type="hidden" name="email" value="<?php echo $value; ?>" />
                                        <input type="submit" name="set_admin" class="btn btn-info" value="Сделать админом" />
                                    </form>
                                    <?php
                                }
                            }
                            else
                            {
                                echo 'Это вы!';
                            }
                            ?>
                        </div>
                    </div>
                    <?php
                    }
                }
                elseif($_SESSION['search']=="Пользователь" or $_SESSION['search']=="пользователь" or $_SESSION['search']=="ПОЛЬЗОВАТЕЛЬ")
                {
                    $search=$_SESSION['search'];
                    $result = $db->query('SELECT * FROM `users_attribute` WHERE `root`=2 OR `email` = "Пользователь" OR `email` = "пользователь" OR `email` = "ПОЛЬЗОВАТЕЛЬ" OR `login` = "Пользователь" OR `login` = "пользователь" OR `login` = "ПОЛЬЗОВАТЕЛЬ" ');
                    while($row = $result->fetch_assoc())
                    {
                    $value=$row['email'];
                    ?>
                    <div class="row mt-4 vertical-center mb-1">
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
                                echo '<h6 style="color:#6c757d;">Пользователь</h6>';
                            }
                            else
                            {
                                echo '<h6 style="color:#dc3545;">Забанен</h6>';
                            }
                            ?>
                        </div>
                        <div class="col">
                            <?php
                            if($_SESSION['email']!=$row['email'])
                            {
                                if($row['root']==1 or $row['root']==0)
                                {
                                    ?>
                                    <form style="display:inline-block" method="post" action="/server/privilege.php">
                                        <input type="hidden" name="email" value="<?php echo $value; ?>" />
                                        <input type="submit" name="ban" class="btn btn-danger" value="Бан" />
                                    </form>
                                    <?php
                                }
                                else
                                {
                                    ?>
                                    <form style="display:inline-block" method="post" action="/server/privilege.php">
                                        <input type="hidden" name="email" value="<?php echo $value; ?>" />
                                        <input type="submit" name="unban" class="btn btn-success" value="Разбан" />
                                    </form>
                                    <?php
                                    
                                }
                                if($row['root']==1)
                                {
                                    ?>
                                    <form style="display:inline-block" method="post" action="/server/privilege.php">
                                        <input type="hidden" name="email" value="<?php echo $value; ?>" />
                                        <input type="submit" name="set_user" class="btn btn-secondary" value="Сделать пользователем" />
                                    </form>
                                    <?php
                                }
                                else
                                {
                                    ?>
                                    <form style="display:inline-block" method="post" action="/server/privilege.php">
                                        <input type="hidden" name="email" value="<?php echo $value; ?>" />
                                        <input type="submit" name="set_admin" class="btn btn-info" value="Сделать админом" />
                                    </form>
                                    <?php
                                }
                            }
                            else
                            {
                                echo 'Это вы!';
                            }
                            ?>
                        </div>
                    </div>
                    <?php
                    }
                }
                else
                {
                    $search=$_SESSION['search'];
                    $result = $db->query("SELECT * FROM `users_attribute` WHERE `email`= '$search' OR `login`='$search'");
                    while($row = $result->fetch_assoc())
                    {
                    $value=$row['email'];
                    ?>
                    <div class="row mt-4 vertical-center mb-1">
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
                                echo '<h6 style="color:#6c757d;">Пользователь</h6>';
                            }
                            else
                            {
                                echo '<h6 style="color:#dc3545;">Забанен</h6>';
                            }
                            ?>
                        </div>
                        <div class="col">
                            <?php
                            if($_SESSION['email']!=$row['email'])
                            {
                                if($row['root']==1 or $row['root']==0)
                                {
                                    ?>
                                    <form style="display:inline-block" method="post" action="/server/privilege.php">
                                        <input type="hidden" name="email" value="<?php echo $value; ?>" />
                                        <input type="submit" name="ban" class="btn btn-danger" value="Бан" />
                                    </form>
                                    <?php
                                }
                                else
                                {
                                    ?>
                                    <form style="display:inline-block" method="post" action="/server/privilege.php">
                                        <input type="hidden" name="email" value="<?php echo $value; ?>" />
                                        <input type="submit" name="unban" class="btn btn-success" value="Разбан" />
                                    </form>
                                    <?php
                                    
                                }
                                if($row['root']==1)
                                {
                                    ?>
                                    <form style="display:inline-block" method="post" action="/server/privilege.php">
                                        <input type="hidden" name="email" value="<?php echo $value; ?>" />
                                        <input type="submit" name="set_user" class="btn btn-secondary" value="Сделать пользователем" />
                                    </form>
                                    <?php
                                }
                                else
                                {
                                    ?>
                                    <form style="display:inline-block" method="post" action="/server/privilege.php">
                                        <input type="hidden" name="email" value="<?php echo $value; ?>" />
                                        <input type="submit" name="set_admin" class="btn btn-info" value="Сделать админом" />
                                    </form>
                                    <?php
                                }
                            }
                            else
                            {
                                echo 'Это вы!';
                            }
                            ?>
                        </div>
                    </div>
                    <?php
                    }
                }
                ?>
                <!-- в цикл этот div -->
            </div>
        </div>
        

        <?php require "../blocks/footer-min.php" ?>
        <?php require "pa_popups/support_popup.php"?>
    </body>
    </html>
    <?php
}
else
{
    header("Location:account_set.php");
}
?>