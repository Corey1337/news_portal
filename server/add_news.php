  <?php
  ini_set('error_reporting', E_ALL);
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  ini_set( 'upload_max_size' , '12M' );
  ini_set( 'post_max_size', '12M');
  ini_set( 'max_execution_time', '150' );
  require "config.php";
  global $db;
  $tittle=$_POST["tittle"];
  $intro_text=$_POST["intro_text"]; 
  $full_text=$_POST["full_text"];
  $login=isset($_SESSION['login']);
  $res = $db->query("SELECT count(*) FROM news");
  $row = $res->fetch_row();
  $img_id = $row[0];
  $img_id=$img_id+1;  
  function chk($id_id){
              $uploaddir = '../news_img/';
              // это папка, в которую будет загружаться картинка
              $apend=$id_id.".jpg"; 
              // это имя, которое будет присвоенно изображению 
              $uploadfile = "$uploaddir$apend"; 

         echo  $uploadfile;
              if (move_uploaded_file($_FILES['image_t']['tmp_name'], $uploadfile)) 
              {
                  // header("Location: /index.php")
                  echo "Файл корректен и был успешно загружен.\n";
                  return TRUE;
              } else {
                  echo "Возможная атака с помощью файловой загрузки!\n";
                  echo  $uploadfile;
              }
              //в переменную $uploadfile будет входить папка и имя изображения
              return FALSE;}
  if (chk($img_id)==TRUE){
            $log=print_r($login);
            global $db;
            $sql="INSERT INTO `news` (`date` ,`intro_text`, `full_text`,`tittle`,`name_users`,`img_id`) 
                VALUES (now(),'$intro_text', '$full_text','$tittle','$log','$img_id
                ')";
                $res=mysqli_query($db,$sql);
                if ($res==TRUE) {
                  header("Location: /index.php");
                  echo "<h1>";
                  echo "Данные добавлены";
                  echo "</h1>";
                //  header('Location: /index.php');
              }  
                  else {
                    echo "<h1>";
                    echo "Произошла ошибка  соединения с бд";
                    echo "</h1>";
            }}  
          else{
            echo "<h1>";
            echo "Файл не подходит под условие";
            echo "</h1>";
          }        
                
                ?>

