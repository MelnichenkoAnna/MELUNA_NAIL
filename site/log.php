<?
// Страница авторизации

// Функция для генерации случайной строки
function generateCode($length=6) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";
    $code = "";
    $clen = strlen($chars) - 1;
    while (strlen($code) < $length) {
            $code .= $chars[mt_rand(0,$clen)];
    }
    return $code;
}

// Соединямся с БД
$link=mysqli_connect("site", "mysql", "mysql", "testtable");

if(isset($_POST['submit']))
{
    // Вытаскиваем из БД запись, у которой логин равняеться введенному
    $query = mysqli_query($link,"SELECT user_id, user_password FROM users WHERE user_login='".mysqli_real_escape_string($link,$_POST['login'])."' LIMIT 1");
    $data = mysqli_fetch_assoc($query);

    // Сравниваем пароли
    if($data['user_password'] === ($_POST['password']))
    {
        // Генерируем случайное число и шифруем его
        




        mysqli_query($link, "UPDATE users SET user_hash='".$hash."' ".$insip." WHERE user_id='".$data['user_id']."'");
        // Ставим куки


        setcookie("id", $data['user_id'], time()+60*60*24*30, "/");
    // httponly !!!

        // Переадресовываем браузер на страницу проверки нашего скрипта

echo"<head>";
echo '<meta http-equiv="refresh" content="5;URL=check.php">';
echo"</head>";

        // header("Location: check.php"); exit();
    }
    else
    {
        // echo '<div class="invalid">"Вы ввели неправильный логин/пароль"</div>'; 
       echo "<script>alert(\"Вы ввели неправильный логин/пароль\");</script>";
    }
}
?>