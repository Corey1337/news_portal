<?php
    session_start();

    require "config.php";
?>


<?php

if(isset($_SESSION['id']))
{
    if(isset($_POST['sub']))
    {
        $old_img=$_SESSION['img'];
        //$result = mb_substr($old_img, 4);
        $name = mt_rand(0, 10000) . $_FILES['file']['name'];
        copy($_FILES['file']['tmp_name'], '../img/' . $name);
        $login = $_SESSION['login'];
        $result2 = mysqli_query ($db,"UPDATE `users_attribute` SET `img`='img/$name' WHERE `login`='$login'");
        // Проверяем, есть ли ошибки
        if ($result2=='TRUE')
        {
            $_SESSION['img']='img/'.$name;
            $file=$old_img;
            unlink($_SERVER['DOCUMENT_ROOT'].'/'.$file);

            //!!!!!ВОТ ТУТ СДЕЛАТЬ ПОП ИТ, ЧТО ПАРОЛЬ УСПЕШНО ИЗМЕНЁН
            header('Location: /personal_block/account_set.php');
        }
        else 
        {
            echo "Ошибка! Пароль не изменён";
        }

    }
    else
    {
        header("Location:/personal_block/account_set.php");
    }
}
else
{
    header("Location:/personal_block/account_set.php");
}
 
?>