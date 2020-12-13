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


   <header class="header">
         <div class="cont-in">
         <div class="cont">
             <a align="center" href="site.php" class="logo">MELUNA <br> NAILS</a> 
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

<div class="intro">
   <div class="intro-title">СКИДКИ</div>
</div> 

<div class="cont_glav">
   <div class="cont_one">
      <div class="cont_two">
         <img src="images/ak1.jpg" alt="">  
            <div class="cont_text">
               <p>IQ BEAUTY Каучуковый гель-лак с кальцием 10 мл №019</p>  
            </div>

            <div class="cont_but">
               <div class="price">189 p.</div>
               <a class="cont_korz" href="skidki.php?page=products&action=add&id=35<?php echo $row['id_product'][35] ?>">В корзину</a>
            </div>
      </div>

      <div class="cont_two">
         <img src="images/ak2.jpg" alt="">  
            <div class="cont_text">
               <p>IQ BEAUTY Каучуковый гель-лак с кальцием 10 мл №022</p>  
            </div>

            <div class="cont_but">
                <div class="price">189 p.</div>
                <a class="cont_korz" href="skidki.php?page=products&action=add&id=36<?php echo $row['id_product'][36] ?>">В корзину</a>
            </div>
      </div>

      <div class="cont_two">
         <img src="images/ak3.jpg" alt="">  
            <div class="cont_text">
               <p>IQ BEAUTY Каучуковый гель-лак с кальцием 10 мл №080</p>  
            </div>

            <div class="cont_but">
               <div class="price">189 p.</div>
               <a class="cont_korz" href="skidki.php?page=products&action=add&id=37<?php echo $row['id_product'][37] ?>">В корзину</a>
            </div>
      </div>

      <div class="cont_two">
         <img src="images/ak4.jpg" alt="">  
            <div class="cont_text">
               <p>IQ BEAUTY Каучуковый гель-лак с кальцием 10 мл №082</p>  
            </div>

            <div class="cont_but">
               <div class="price">189 p.</div>
               <a class="cont_korz" href="skidki.php?page=products&action=add&id=38<?php echo $row['id_product'][38] ?>">В корзину</a>
            </div>
      </div>
   </div>

   <div class="cont_one">
      <div class="cont_two">
         <img src="images/ak5.jpg" alt="">  
            <div class="cont_text">
               <p>Фреза керамическая для снятия гель-лака (зеленая)</p>  
            </div>

            <div class="cont_but">
                <div class="price">250 p.</div>
                <a class="cont_korz" href="skidki.php?page=products&action=add&id=39<?php echo $row['id_product'][39] ?>">В корзину</a>
            </div>
      </div>

      <div class="cont_two">
         <img src="images/ak6.jpg" alt="">  
            <div class="cont_text">
               <p>Фреза алмазная пламевидная закругленная 1,8мм, красная, мелкая зернистость</p>  
            </div>

            <div class="cont_but">
                <div class="price">120 p.</div>
                <a class="cont_korz" href="skidki.php?page=products&action=add&id=40<?php echo $row['id_product'][40] ?>">В корзину</a>
            </div>
      </div>

      <div class="cont_two">
         <img src="images/ak7.jpg" alt="">  
            <div class="cont_text">
               <p>Фреза алмазная шаровидная 5 мм, красная мелкая зернистость</p>  
            </div>

            <div class="cont_but">
                <div class="price">250 p.</div>
                <a class="cont_korz" href="skidki.php?page=products&action=add&id=41<?php echo $row['id_product'][41] ?>">В корзину</a>
            </div>
      </div>

      <div class="cont_two">
         <img src="images/ak8.jpg" alt="">  
            <div class="cont_text">
               <p>Фреза алмазная "Пламя" 5.2х10.5 мм</p>  
            </div>

            <div class="cont_but">
                <div class="price">65 p.</div>
                <a class="cont_korz" href="skidki.php?page=products&action=add&id=42<?php echo $row['id_product'][42] ?>">В корзину</a>
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