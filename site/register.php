<?php require_once('reg.php'); ?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <link rel="stylesheet" href="css/style.css">
      <link rel="stylesheet" href="css/register.css">
   <!--   <link rel="stylesheet" href="slick/slick.css">
      <link rel="stylesheet" href="slick/slick-theme.css">-->
      <title>MELUNA NAILS</title>
   </head>
   <body> 
   <header class="header">

      <div class="container">
         <div class="cont-in">
         <div class="cont">
        <a align="center" href="index.php" class="logo">MELUNA <br> NAILS</a> 
         </div> 

<!-- Меню сайта -->            
            <nav class="nav">
               <ul>
               <li><a class="nav-link" href="#">Меню</a>
               <ul class="second">
               <li><a href = "http://site/gel-lak.php">Гель-лаки</a></li>
               <li><a href = "http://site/baza-top.php">Базы и топы</a></li>
               <li><a href = "http://site/pilki.php">Пилки и шлифовщики</a></li>
               <li><a href = "http://site/jidkosti.php">ЖИДКОСТИ</a></li></li>
               </ul>
               </li>
               <a class="nav-link" href="#">Скидки</a>
               <a class="nav-link" href="#">Обучение</a>
            </ul>
            </nav>  
  <a class="button" href="register.php"></a>
      </div>
      </div>
   </header>  



<div class="intro">
   <div class="intro-title">РЕГИСТРАЦИЯ</div>
</div>   

<div class="cont_register">
      <form class="input__style" method="POST">
         <div class="log">
         ЛОГИН <input class="avtoriz" name="login" type="text" required><br>
         </div>

         <div class="parol">
         ПАРОЛЬ <input class="avtoriz" name="password" type="password" required><br>
         </div>

         <div class="btn_reg">
         <input class="button_reg" name="submit" type="submit" value="Зарегистрироваться"><br>
         </div> 


   <button class="button_log"> <a href="login.php">ВОЙТИ </a></button>

      </form>
</div>


</body>

</html>