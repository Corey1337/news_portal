<?php
    session_start();
   /// require "server/add_news.php"
?>
<?php
        //print $_SESSION['root'];
    if($_SESSION['root']==1 && isset($_SESSION['id']))
    {
?>
    <!DOCTYPE html>
    <html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
        <title>News Today</title>
    </head>
    <body>
        <?php require "blocks/header.php" ?>
        <div class="container mt-5">
            <form action="server/add_news.php" method="post">
                    <div class="form-group">
                        <label for="article-pic">Картинка статьи:</label>
                        <img id="article-pic" src="img/upload_def_icon.jpg">
                        <div>
                            <input type="file" name="image">
                            <!-- При выборе файла выбранная картинка должна появиться вместо деф пикчи -->
                        </div>
                    </div>
                    <div class="form-group mt-5">
                        <label for="heading">Заголовок:</label>
                        <input class="form-control" type="text" id="tittle" name="tittle">
                    </div>  
                    <div class="form-group mt-5">
                        <label for="desc">Краткое описание:</label>
                        <textarea class="form-control" id="desc" type="text"  name="intro_text"></textarea>
                    </div>
                    <div class="form-group mt-5">
                        <label for="article">Статья:</label>
                        <textarea class="form-control" type="text"  id="full_text" name="full_text"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mt-5">Submit</button>
                    <!-- После нажатия все данные с форм отправляются там куда-то вам и после должны на главной появиться -->
                
            </form>
        </div>
        <?php require "blocks/footer.php" ?>
    </body>
    </html>   

<?php
    }
    else
    {
        header("Location: index.php");    
    }            
?>
