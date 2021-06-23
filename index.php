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
    <title>News Today</title>
</head>
<body>
    <?php require "blocks/header.php" ?>

    <div class="container mt-5">
        <h3 class="newnews mb-5">Актуальные новости</h3>


        <?php

        //print $_SESSION['root'];
        //print $_SESSION['password'];
        //print $_SESSION['login'];
        //print $_SESSION['email'];
        //print $_SESSION['id'];

        if(isset($_SESSION['id']))
        {
            
            if($_SESSION['root']==1)
            {
            ?>
                    <button type="button" class="newnews btn btn-dark mb-5" onclick="document.location='newsform.php'">Добавить новость</button>

                <?php
            }
                
        }?>
        <!-- к этой кнопеке надо прикрутить проверку на админа хз как -->

        <div class="d-flex flex-wrap">
                        <?php require "server/fun_spawn_news.php"; ?>
                                    <?php  $result=get_news() ;
                                
                        while ($post= mysqli_fetch_assoc($result)) {
            echo ' <div class="card mb-4 rounded-3 shadow-sm">
                        <div class="card-header py-3">
                                            <h4 class="my-0 fw-normal">';
                                            print_r( $post['tittle']);
                            echo'</h4>
                                    <h6>';
                            print(date('Y-m-d',strtotime($post['date'])));
                                  echo'</h6>
                         </div>
                         <div class="card-body">
                            <div> <img src="news_img/'; print_r($post['img_id'])  ;echo'.jpg" class=img-thumbnail rounded mx-auto d-block width=50% </img>
                                 <h5>';print_r($post['intro_text']);echo'</h5>
                             </div>
                              <button type="button" class="w-100 btn btn-lg btn-outline-primary" onclick="document.location=`article.php`">Подробнее</button>
                        </div>
                        </div>';}?>
        </div>
    </div>
<!-- test -->
    <?php require "blocks/footer.php" ?>
</body>
</html>