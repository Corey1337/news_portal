<?php 
    require "config.php";
   
 function get_news (){
     global $db;
     $result=mysqli_query($db,"SELECT * FROM `news`");
     return $result;
 }
?>