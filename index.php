<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Best news</title>
</head>
<body>
    <?php require "blocks/header.php" ?>

    <div class="container mt-5">
        <h3 class="mb-5">Актуальные новости</h3>


        <button type="button" class="btn btn-dark mb-5" onclick="document.location='newsform.php'">Добавить новость</button>
        <!-- к этой кнопеке надо прикрутить проверку на админа хз как -->


        <div class="d-flex flex-wrap">
            <?php
                for($i = 0; $i < 3; $i++):
            ?>
            <div class="card mb-4 rounded-3 shadow-sm">
                <div class="card-header py-3">
                    <h4 class="my-0 fw-normal">Заголовоки</h4>
                </div>
                <div class="card-body">
                    <img src="img/<?php echo ($i + 1) ?>.jpg" class="img-thumbnail rounded mx-auto d-block" width="50%"></img>
                    <div>
                        <h5>Тут всякой текстик</h5>
                    </div>
                    <button type="button" class="w-100 btn btn-lg btn-outline-primary">Подробнее</button>
                </div>
            </div>
                 <?php endfor ?>
        </div>
    </div>
<!-- test -->
    <?php require "blocks/footer.php" ?>
</body>
</html>