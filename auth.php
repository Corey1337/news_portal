<?php
session_start();

require "server/config.php";

if(!isset($_SESSION['id']))
{
    ?>

    <html>
    <head>
        <title>RABOTAET</title>
    </head>
    <body>
    <h1>SIGN IN</h1>
        <form method="post" action="server/auth.php">
            <input type="text" name="login" placeholder="Login"/><br/>
            <input type="password" name="password" placeholder="Password" /><br />
            <input type="submit" name="sub" value="Enter" />
        </form>
    </body>
    </html>

    <?php
}
else
{
    header("Location:".$site_url);
}

?>