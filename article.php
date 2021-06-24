<?php
    session_start();
    require "server/config.php";
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <title>News Today</title>
</head>
<body>
    <?php require "blocks/header.php" ?>
    <?php  
    require "server/config.php" ;
    ini_set('error_reporting', E_ALL);
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    global $db;
    $d=  $_POST["id_n"];
    $query=mysqli_query($db, "SELECT * FROM `news` WHERE `id`='$d' ");
    $news=mysqli_fetch_assoc($query);
    $tittle=$news['tittle'];
    $intro_text=$news['intro_text'];
    $date=$news['date'];
    $full_text=$news['full_text'];
    $name_users=$news['name_users'];
    $img_id=$news['img_id']
    ?>
    
    <div class="container mt-5">
        <h3 class="text-center newnews mb-5"><?php echo $tittle?></h3>
        <div class="" style="margin-left: 1%;">
            <h6 class="mt-2">Автор:<?php echo $name_users?></h6> 
            <h6 class="float-right">Дата публикации:<?php print(date('d.m.Y',strtotime($date))); ?></h6>
            <!-- ТУТ ГОД И АВТОРА НОРМ ВЫВОДИТЬ -->
        </div>

        <div class="row">
            <div class="col media">
                <a class="p-3 pull-left"> <img src="news_img/<?php print_r($news['img_id']); ?>.jpg" class=" img-thumbnail media-object" width="300" alt=""></a>
                <div class="media-body">
                    <p>
                    <?php echo $full_text?>
                    </p>
                </div>
            </div>
        </div>

        <?php  if(isset($_SESSION['id']))
        {
            
            if($_SESSION['root']==1)
            {
            ?><form action="server/article_change.php" method="post">
            <button id="id_n_c"  name="id_n_c" value=<?php echo $d;?>  class="btn btn-outline-info">
            <img src="news_img/pen.png" width="40">
            </form>
            
        </button>

                <?php
            }
                
        }?>
        
    <!-- Прикрутить к этой кнопке редактор текста и сделать недоступной для простолюдинов -->
    
    <section class="content-item mt-4" id="comments">
    <div class="container">   
    	<div class="row">
            <div class="col-sm-8">   
                <form>
                	<h3 class="pull-left">Новый коментарий</h3>
                	<button type="submit" class="btn btn-primary pull-right">Отправить</button>
                    <fieldset>
                        <div class="row">
                            <div class="col-sm-3 col-lg-2 hidden-xs">
                            	<img class="media-object img-responsive rounded-circle img-thumbnail" src="https://bootdey.com/img/Content/avatar/avatar1.png" width="100">
                            </div>
                            <div class="form-group col-xs-12 col-sm-9 col-lg-10">
                                <textarea class="form-control" id="message" placeholder="Ваше сообщение" required=""></textarea>
                            </div>
                        </div>  	   
                    </fieldset>
                </form>
                
                <h3>2 Коментария</h3>
                <!-- количество коментов, можно есчо просто удалить -->

                <!-- COMMENT 1 - START -->
                <div class="media">
                    <a class="pull-left"><img class="rounded-circle img-thumbnail media-object" src="https://bootdey.com/img/Content/avatar/avatar1.png" alt=""></a>
                    <!-- АВА ПОЛЬЗОВАТЕЛЯ -->
                    <div class="media-body">
                        <h4 class="media-heading">John Doe</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <!-- текст комента -->
                        <ul class="list-unstyled list-inline media-detail pull-left">
                            <li><i class="fa fa-calendar"></i>27/02/2014</li>
                            <!-- дата камента -->
                        </ul>
                    </div>
                </div>
                <!-- COMMENT 1 - END -->
                
                <!-- COMMENT 2 - START -->
                <!-- аналогично 1му коменту он тут просто шобы был -->
                <div class="media">
                    <a class="pull-left"><img class="rounded-circle img-thumbnail media-object" src="https://bootdey.com/img/Content/avatar/avatar2.png" alt=""></a>
                    <div class="media-body">
                        <h4 class="media-heading">John Doe</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <ul class="list-unstyled list-inline media-detail pull-left">
                            <li><i class="fa fa-calendar"></i>27/02/2014</li>
                            <!--  -->
                        </ul>
                    </div>
                </div>
                <!-- COMMENT 2 - END -->
            
            </div>
        </div>
    </div>
</section>

    <?php require "blocks/footer.php" ?>
</body>
</html>