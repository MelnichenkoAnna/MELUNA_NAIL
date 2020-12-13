<?php session_start(); ?>
<!-- Скрипт для навигации по корзине -->

<?php 
   
    require("connection.php"); 
      if(isset($_GET['page']))
      {   
        $pages=array("products", "cart");   
        if(in_array($_GET['page'], $pages)) 
        {  
            $_page=$_GET['page'];   
        }
        else
        {  
            $_page="products";  
        } 
      }
      else
      {  
        $_page="products";    
      } 
?>


<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <link rel="stylesheet" href="css/style.css">
      <title>MELUNA NAILS</title>
   </head>
   
<body> 

<!-- Шапка -->
<header class="header">
  <div class="cont-in">
    <div class="cont">
      <a align="center" href="index.php" class="logo">MELUNA 
      <br> NAILS</a> 
    </div> 

<!-- Меню сайта -->           
  <nav class="nav">
    <ul>
    <li><a class="nav-link" href="#">Меню</a>
    <ul class="second">
      <li><a href = "http://site/gel-lak.php">Гель-лаки</a></li>
      <li><a href = "http://site/baza-top.php">Базы и топы</a></li>
      <li><a href = "http://site/pilki.php">Пилки и шлифовщики</a></li>
      <li><a href = "http://site/jidkosti.php">ЖИДКОСТИ</a></li>
    </ul>
    </li>
      <a class="nav-link" href="http://site/skidki.php">Скидки</a>
      <a class="nav-link" href="#">Обучение</a>
    </ul>
  </nav>

<!-- Кнопка регистрации -->
  <a class="button" href="register.php"></a>
  
<!-- Соединямся с БД  --> 
  <?
  $link=mysqli_connect("site", "mysql", "mysql", "testtable");
  if (isset($_COOKIE['id']))
  {
    $query = mysqli_query($link, "SELECT *,INET_NTOA(user_ip) AS user_ip FROM users WHERE user_id = '".intval($_COOKIE['id'])."' LIMIT 1");
    $userdata = mysqli_fetch_assoc($query);

    if(($userdata['user_id'] !== $_COOKIE['id']))
    {
        setcookie("id", "", time() - 3600*24*30*12, "/");
        print "Хм, что-то не получилось";
    }
    else
    {
        $content = "<a href='cart.php?page=cart'><div class='button1' ></div></a>";
        echo $content;
        $welcome = "<div class = 'korz-btn'
        <a> Привет, ".$userdata['user_login']."! </a>";
        echo $welcome;
        $exel = "<br><a href='logout.php' class='vihod'>выход</a>";
        echo $exel;
        }
        }
?>

</div>    
</header>  

<!-- Блок с товарами -->
<div class="intro">
  <div class="intro-title">ГЕЛЬ-ЛАКИ</div>
</div>

<div class="cont_glav">
   <div class="cont_one">
      <div class="cont_two">
         <img src="images/lak1.jpg" alt="">  
            <div class="cont_text">
               <p>ADRICOCO гель-лак №07 камуфлирующий персиковый с шиммером (8 мл.)</p>  
            </div>

            <div class="cont_but">
               <div class="price">139 p.</div>
               <a class="cont_korz" href="gel-lak.php?page=products&action=add&id=1<?php echo $row['id_product'][1] ?>">В корзину</a>
            </div>
      </div>

      <div class="cont_two">
         <img src="images/lak2.jpg" alt="">  
            <div class="cont_text">
               <p>ADRICOCO гель-лак №04 камуфлирующий светло-персиковый (8 мл.)</p>  
            </div>

            <div class="cont_but">
                <div class="price">139 p.</div>
                <a class="cont_korz" href="gel-lak.php?page=products&action=add&id=2<?php echo $row['id_product'][2] ?>">В корзину</a>
            </div>
      </div>

      <div class="cont_two">
         <img src="images/lak3.jpg" alt="">  
            <div class="cont_text">
               <p>ADRICOCO гель-лак №09 камуфлирующий сиреневый с шиммером (8 мл.)</p>  
            </div>

            <div class="cont_but">
               <div class="price">139 p.</div>
               <a class="cont_korz" href="gel-lak.php?page=products&action=add&id=3<?php echo $row['id_product'][3] ?>">В корзину</a>
            </div>
      </div>

      <div class="cont_two">
         <img src="images/lak4.jpg" alt="">  
            <div class="cont_text">
               <p>ADRICOCO гель-лак №08 камуфлирующий розовый с шиммером (8 мл.)</p>  
            </div>

            <div class="cont_but">
               <div class="price">139 p.</div>
               <a class="cont_korz" href="gel-lak.php?page=products&action=add&id=4<?php echo $row['id_product'][4] ?>">В корзину</a>
            </div>
      </div>
   </div>

   <div class="cont_one">
      <div class="cont_two">
         <img src="images/lak5.jpg" alt="">  
            <div class="cont_text">
               <p>LACK ME гель-лак 10 мл. #1031</p>  
            </div>

            <div class="cont_but">
                <div class="price">220 p.</div>
                <a class="cont_korz" href="gel-lak.php?page=products&action=add&id=5<?php echo $row['id_product'][5] ?>">В корзину</a>
            </div>
      </div>

      <div class="cont_two">
         <img src="images/lak6.jpg" alt="">  
            <div class="cont_text">
               <p>LACK ME гель-лак 10 мл. #1033</p>  
            </div>

            <div class="cont_but">
                <div class="price">220 p.</div>
                <a class="cont_korz" href="gel-lak.php?page=products&action=add&id=6<?php echo $row['id_product'][6] ?>">В корзину</a>
            </div>
      </div>

      <div class="cont_two">
         <img src="images/lak7.jpg" alt="">  
            <div class="cont_text">
               <p>LACK ME гель-лак 10 мл. #1037</p>  
            </div>

            <div class="cont_but">
                <div class="price">220 p.</div>
                <a class="cont_korz" href="gel-lak.php?page=products&action=add&id=7<?php echo $row['id_product'][7] ?>">В корзину</a>
            </div>
      </div>

      <div class="cont_two">
         <img src="images/lak8.jpg" alt="">  
            <div class="cont_text">
               <p>LACK ME гель-лак 10 мл. #1036</p>  
            </div>

            <div class="cont_but">
                <div class="price">220 p.</div>
                <a class="cont_korz" href="gel-lak.php?page=products&action=add&id=8<?php echo $row['id_product'][8] ?>">В корзину</a>
            </div>
      </div>
   </div>

   <div class="cont_one">
      <div class="cont_two">
         <img src="images/lak9.jpg" alt="">  
            <div class="cont_text">
               <p>POLE гель-лак 8мл №031 - клюквенный морс</p>  
            </div>

            <div class="cont_but">
                <div class="price">259 p.</div>
                <a class="cont_korz" href="gel-lak.php?page=products&action=add&id=9<?php echo $row['id_product'][9] ?>">В корзину</a>
            </div>
      </div>

      <div class="cont_two">
         <img src="images/lak10.jpg" alt="">  
            <div class="cont_text">
               <p>POLE гель-лак 8мл №036 - жженая сиена</p>  
            </div>

            <div class="cont_but">
                <div class="price">259 p.</div>
                <a class="cont_korz" href="gel-lak.php?page=products&action=add&id=10<?php echo $row['id_product'][10] ?>">В корзину</a>
            </div>
      </div>

      <div class="cont_two">
         <img src="images/lak11.jpg" alt="">  
            <div class="cont_text">
               <p>POLE гель-лак 8мл №066 - розовое кружево</p>  
            </div>

            <div class="cont_but">
                <div class="price">259 p.</div>
                <a class="cont_korz" href="gel-lak.php?page=products&action=add&id=11<?php echo $row['id_product'][11] ?>">В корзину</a>
            </div>
      </div>

      <div class="cont_two">
         <img src="images/lak12.jpg" alt="">  
            <div class="cont_text">
               <p>POLE гель-лак 8мл №069 - весенний пион</p>  
            </div>

            <div class="cont_but">
                <div class="price">259 p.</div>
                <a class="cont_korz" href="gel-lak.php?page=products&action=add&id=12<?php echo $row['id_product'][12] ?>">В корзину</a>
            </div>
      </div>
   
   </div>
</div>

 <?php require($_page.".php"); ?>

<!-- Скрипт для корзины -->
  <?php 
    if(isset($_SESSION['cart']))
    {  
        $sql="SELECT * FROM products WHERE id_product IN (";  
        foreach($_SESSION['cart'] as $id => $value) 
        { 
            $sql.=$id.","; 
        }   
          $sql=substr($sql, 0, -1).") ORDER BY name ASC"; 
          $query=mysqli_query($con, $sql); 
    } 

        else
        { 
        echo "<p>Ваша корзина пуста, добавьте товары</p>"; 
        }   
  ?>

</body>
</html>