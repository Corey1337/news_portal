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
        <div class="row mt-5">
            <div class="form-control col first-col rounded border bg-light border-2 pa-col">
                Сменить аватарку
                <form class="mt-2" action="" method="post">
                    <img src="../img/upload_def_icon.jpg" class="user-img rounded-circle img-thumbnail" width="200">
                    <input class="mt-2" type="file" name="image">
                    <div class="card-body d-flex flex-column">
                        <button type="submit" class="align-self-end btn btn-primary mt-auto ">Изменить аватарку</button>
                    </div>
                </form>
            </div>
            <div class="form-control col rounded border bg-light border-2 pa-col">
                Сменить имя
                <form action="" method="post">
                    <h3 class="h4 mt-5">Ваше текущее имя</h3>
                    <h3 class="mt-4"><?php print $_SESSION['login']?></h3>
                    <input class="form-control mt-5 mb-2" type="text" name="login" placeholder="Новое имя"/>
                    <div class="card-body d-flex flex-column">
                        <button type="submit" class="align-self-end btn btn-primary mt-auto ">Изменить имя</button>
                    </div>
                </form>
                
                
            </div>
            <div class="form-control col rounded border bg-light border-2 pa-col">
                Сменить пароль
                <form action="" method="post">
                <input class="form-control mt-5" type="text" name="cur_password" placeholder="Введите старый пароль"/>
                <input class="form-control mt-4" type="text" name="new_password" placeholder="Новый пароль"/>
                <input class="form-control mt-4 mb-3" type="text" name="new_password" placeholder="Повторите пароль"/>
                    <div class="card-body d-flex flex-column">
                        <button type="submit" class="align-self-end btn btn-primary mt-auto">Изменить пароль</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    

    <?php require "../blocks/footer-min.php" ?>
</body>
</html>