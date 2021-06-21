<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">

    <title>News Today</title>
</head>
<body>
    <?php require "../blocks/header.php" ?>

    <div class="menu container mt-5 justify-content-md-center text-center">
        <?php require "pa_blocks/pa_header.php" ?>
        <div class="row mt-5 rounded border bg-light border-2">
            <h3 class="h4">Список пользователей</h3>
            <div class="row mt-4">
                <div class="col">
                    Имя
                </div>
                <div class="col">
                    Почта
                </div>
                <div class="col">
                    Статус
                </div>
                <div class="col">
                    Установка привелегий
                </div>
            </div>
            <!-- Сверху шапка туда не лезь -->
            <div class="row mt-4 vertical-center">
                <div class="col">
                    <img class="rounded-circle img-thumbnail" src="../img/upload_def_icon.jpg" width="45">
                    Имя
                </div>
                <div class="col">
                    Почта
                </div>
                <div class="col">
                    Статус
                </div>
                <div class="col">
                    <button type="" class="btn btn-danger">Бан</button>
                    <button type="" class="btn btn-success">Разбан</button>
                    <button type="" class="btn btn-info">Админ</button>
                    <button type="" class="btn btn-secondary">Пользователь</button>
                </div>
            </div>
            <!-- в цикл этот div -->
        </div>
    </div>
    

    <?php require "../blocks/footer-min.php" ?>
</body>
</html>