<?php
session_start();

require "server/config.php";

if(!isset($_SESSION['id']))
{
    ?>

    <html>
    <head>
        <title>Autorization</title>
    </head>
    <body>
    <h1>SIGN IN</h1>
        <form method="post" action="server/auth.php">
            <input type="text" name="login" placeholder="Login"/><br/>
            <input type="password" name="password" placeholder="Password" /><br />
            <input type="submit" name="sub" value="Enter" />
        </form>
        Если вы ещё не зарегистрированны на нашем сайте, то перейдите по ссылке ниже и заполните форму
        </br>
        </br>
        <button type="button" class="newnews btn btn-dark mb-5" onclick="document.location='registration.php'">Регистрация</button>
    </body>
    </html>

    <?php
}
else
{
    header("Location:".$site_url);
}

?>