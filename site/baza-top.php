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
      <li><a href = "http://site/jidkosti.php">Жидкости</a></li>
    </ul>
    </li>
      <a class="nav-link" href="http://site/skidki.php">Скидки</a>
      <a class="nav-link" href="#">Обучение</a>
    </ul>
  </nav>  

<!-- Кнопка регистрации -->
  <a class="button" href="register.php"></a>

<!-- Соединямся с БД -->
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
   <div class="intro-title">БАЗЫ И ТОПЫ</div>
</div> 

<div class="cont_glav">
   <div class="cont_one">
      <div class="cont_two">
         <img src="images/baza1.jpg" alt="">  
            <div class="cont_text">
               <p>LAC База камуфлирующая для гель-лака TINT 01 (9 мл).</p>  
            </div>

            <div class="cont_but">
               <div class="price">349 p.</div>
               <a class="cont_korz" href="baza-top.php?page=products&action=add&id=13<?php echo $row['id_product'][13] ?>">В корзину</a>
            </div>
      </div>

      <div class="cont_two">
         <img src="images/baza2.jpg" alt="">  
            <div class="cont_text">
               <p>LAC База камуфлирующая для гель-лака TINT 03 (9 мл).</p>  
            </div>

            <div class="cont_but">
                <div class="price">349 p.</div>
                <a class="cont_korz" href="baza-top.php?page=products&action=add&id=14<?php echo $row['id_product'][14] ?>">В корзину</a>
            </div>
      </div>

      <div class="cont_two">
         <img src="images/baza3.jpg" alt="">  
            <div class="cont_text">
               <p>LAC База камуфлирующая для гель-лака TINT 04 (9 мл).</p>  
            </div>

            <div class="cont_but">
               <div class="price">349 p.</div>
               <a class="cont_korz" href="baza-top.php?page=products&action=add&id=15<?php echo $row['id_product'][15] ?>">В корзину</a>
            </div>
      </div>

      <div class="cont_two">
         <img src="images/baza4.jpg" alt="">  
            <div class="cont_text">
               <p>LAC База камуфлирующая для гель-лака TINT 05 (9 мл).</p>  
            </div>

            <div class="cont_but">
               <div class="price">349 p.</div>
               <a class="cont_korz" href="baza-top.php?page=products&action=add&id=16<?php echo $row['id_product'][16] ?>">В корзину</a>
            </div>
      </div>
   </div>

   <div class="cont_one">
      <div class="cont_two">
         <img src="images/baza5.jpg" alt="">  
            <div class="cont_text">
               <p>POLE Основа для гель-лака Rubber Pro (12 мл.)</p>  
            </div>

            <div class="cont_but">
                <div class="price">390 p.</div>
                <a class="cont_korz" href="baza-top.php?page=products&action=add&id=17<?php echo $row['id_product'][17] ?>">В корзину</a>
            </div>
      </div>

      <div class="cont_two">
         <img src="images/baza6.jpg" alt="">  
            <div class="cont_text">
               <p>LAC База для гель-лака 9 мл.</p>  
            </div>

            <div class="cont_but">
                <div class="price">349 p.</div>
                <a class="cont_korz" href="baza-top.php?page=products&action=add&id=18<?php echo $row['id_product'][18] ?>">В корзину</a>
            </div>
      </div>

      <div class="cont_two">
         <img src="images/baza7.jpg" alt="">  
            <div class="cont_text">
               <p>POLE Основа для гель-лака Rubber Pro (50 мл)</p>  
            </div>

            <div class="cont_but">
                <div class="price">850 p.</div>
                <a class="cont_korz" href="baza-top.php?page=products&action=add&id=19<?php echo $row['id_product'][19] ?>">В корзину</a>
            </div>
      </div>

      <div class="cont_two">
         <img src="images/baza8.jpg" alt="">  
            <div class="cont_text">
               <p>SELFIE by SLAVA SUPER STRONG BASE 18 мл.</p>  
            </div>

            <div class="cont_but">
                <div class="price">490 p.</div>
                <a class="cont_korz" href="baza-top.php?page=products&action=add&id=20<?php echo $row['id_product'][20] ?>">В корзину</a>
            </div>
      </div>
   </div>

   <div class="cont_one">
      <div class="cont_two">
         <img src="images/baza9.jpg" alt="">  
            <div class="cont_text">
               <p>POLE Закрепитель для гель-лака Strong effect (12 мл.)</p>  
            </div>

            <div class="cont_but">
                <div class="price">390 p.</div>
                <a class="cont_korz" href="baza-top.php?page=products&action=add&id=21<?php echo $row['id_product'][21] ?>">В корзину</a>
            </div>
      </div>

      <div class="cont_two">
         <img src="images/baza10.jpg" alt="">  
            <div class="cont_text">
               <p>TNL Закрепитель для гель-лака viscous 50 мл</p>  
            </div>

            <div class="cont_but">
                <div class="price">890 p.</div>
                <a class="cont_korz" href="baza-top.php?page=products&action=add&id=22<?php echo $row['id_product'][22] ?>">В корзину</a>
            </div>
      </div>

      <div class="cont_two">
         <img src="images/baza11.jpg" alt="">  
            <div class="cont_text">
               <p>TNL Топ закрепитель без липкого слоя Viscous 10 мл</p>  
            </div>

            <div class="cont_but">
                <div class="price">350 p.</div>
                <a class="cont_korz" href="baza-top.php?page=products&action=add&id=23<?php echo $row['id_product'][23] ?>">В корзину</a>
            </div>
      </div>

      <div class="cont_two">
         <img src="images/baza12.jpg" alt="">  
            <div class="cont_text">
               <p>KINETICS Покрытие верхнее с экстра глянцем SHIELD Extra Top 11 мл</p>  
            </div>

            <div class="cont_but">
                <div class="price">690 p.</div>
                <a class="cont_korz" href="baza-top.php?page=products&action=add&id=24<?php echo $row['id_product'][24] ?>">В корзину</a>
            </div>
      </div>
   </div>
</div>

 <?php require($_page.".php"); ?>

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