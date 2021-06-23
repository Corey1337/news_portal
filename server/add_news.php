<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
require "config.php";
$tittle=$_POST["tittle"];
$intro_text=$_POST["intro_text"]; 
$full_text=$_POST["full_text"];
$login=isset($_SESSION['login']);
$img_id=1;
$log=print_r($login);
global $db;
$sql="INSERT INTO `news` (`date` ,`intro_text`, `full_text`,`tittle`,`name_users`,`img_id`) 
    VALUES (now(),'$intro_text', '$full_text','$tittle','$log','$img_id')";
    $res=mysqli_query($db,$sql);
    if ($res==TRUE) {
      echo "<h1>";
      echo "Данные добавлены";
      echo "</h1>";
      header('Location: /index.php');}  
      else {
        echo "<h1>";
        echo "Произошла ошибка  соединения с бд";
        echo "</h1>";
}
    
    ?>

