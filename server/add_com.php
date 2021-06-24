<?php
  ini_set('error_reporting', E_ALL);
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  ini_set( 'upload_max_size' , '12M' );
  ini_set( 'post_max_size', '12M');
  ini_set( 'max_execution_time', '150' );
  require "config.php";
  global $db;
  $id_c=$_POST["id_c"];
  $full_text=$_POST["message"];
  $login=isset($_SESSION['login']);
 $log=print_r($login);
global $db;
$sql="INSERT INTO `comments` (`name_users`,`id_news`,`text`,`date`) 
                VALUES ('$log','$id_c','$full_text',now())";
                $res=mysqli_query($db,$sql);
                if ($res==TRUE) {
                  header("Location: /index.php");
                  echo "<h1>";
                  echo "Данные добавлены";
                  echo "</h1>";
                  header('Location: /index.php');
              }  
                  else {
                    echo "<h1>";
                    echo "Произошла ошибка  соединения с бд";
                    echo "</h1>";
            } 

                
                ?>

