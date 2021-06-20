<?php

//вместо localhost нужно будет подставить IP сервера, если будем его подключать, он будет дан самим хостером
//далее 'имя пользователя дб' 'пароль' 'название дб'
$db = mysqli_connect('localhost','root','root','list_of_users');

$site_url="http:localhost";

if(mysqli_connect_errno())
{
    //errno возвращает номер ошибки подключения к бд
    echo 'Ошибка в подключении к базе данных ('.  mysqli_connect_errno().'):'.   mysqli_connect_error();
    exit();
}