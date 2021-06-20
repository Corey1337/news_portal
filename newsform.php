<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
    <title>Best news</title>
</head>
<body>
    <?php require "blocks/header.php" ?>
    <div class="container mt-5">
        <form action="" method="post">
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
                    <input class="form-control" type="text" id="heading" name="heading">
                </div>
                <div class="form-group mt-5">
                    <label for="desc">Краткое описание:</label>
                    <textarea class="form-control" id="desc" name="desc"></textarea>
                </div>
                <div class="form-group mt-5">
                    <label for="article">Статья:</label>
                    <textarea class="form-control" id="article" name="article"></textarea>
                </div>
                <button type="submit" class="btn btn-primary mt-5">Submit</button>
                <!-- После нажатия все данные с форм отправляются там куда-то вам и после должны на главной появиться -->
            
        </form>
    </div>
    <?php require "blocks/footer.php" ?>
</body>
</html>