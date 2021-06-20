<?php
session_start();

if(isset($_SESSION['id']))
{
    unset($_SESSION['id']);
    unset($_SESSION['password']);
    unset($_SESSION['email']);
    unset($_SESSION['root']);
    header("Location: index.php");
}
else
{
    header("Location: index.php");
}

?>