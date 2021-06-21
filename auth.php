<?php
    session_start();

    require "server/config.php";

    if(!isset($_SESSION['id']))
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

        <title>Вход</title>
    </head>
    <body>
        <div class="text-center">
        
            <form method="post" action="server/auth.php" class="form-signin">
                <a href="/" class="align-items-center text-dark text-decoration-none">
                    <img src="img/logo2.png" wight="100" height="100" class="mt-5"></img>
                </a>
                <h1 class="h3 mb-3 font-weight-normal">Войдите в ваш аккаунт</h1>
                <input class="form-control mb-1" type="text" name="login" placeholder="Логин"/>
                <input class="form-control mb-1" type="password" name="password" placeholder="Пароль"/>
                <input class="form-control btn-primary" type="submit" name="sub" value="Войти" />
            </form>
            <p class="text-center">Ещё не успели зарегестрироваться? Тогда сделайте это прямо сейчас</p>
            <button type="button" class="newnews btn btn-secondary mb-5" onclick="document.location='registration.php'">Регистрация</button>
        </div>
        
        <?php require "blocks/footer-min.php" ?>
    </body>
    </html>

<?php
    }
    else
    {
        header("Location:".$site_url);
    }

?>