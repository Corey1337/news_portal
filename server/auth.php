<?php
session_start();

require "config.php";

if(!isset($_SESSION['id']))
{
    if(isset($_POST['sub']))
    {
        $email=$_POST['email'];
        $password=$_POST['password'];

        //print $email." ".$password;

        $query=mysqli_query($db, "SELECT * FROM `users_attribute` WHERE `email`='$email' AND `password`='$password' ");

        if(mysqli_num_rows($query)>0)
        {
            $user=mysqli_fetch_assoc($query);
            $id=$user['id'];
            $root=$user['root'];
            $login=$user['login'];
            $_SESSION['password']=$password;
            $_SESSION['login']=$login;
            $_SESSION['email']=$email;
            $_SESSION['root']=$root;
            $_SESSION['id']=$id;
            //на главную страницу, если вход успешен
            header("Location: /index.php");
        }
        else
        {  
            print "Login or password are incorrect, try again! <br/>";
            print "<a href= /auth.php>Back</a>";
        }
    }
}
else
{
    //тут надо как-то переписать, чтобы ссылалось обратно на главную страницу
    header("Location:index.php");
}
?>