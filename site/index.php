<?php 
  session_start(); 
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
    
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
    <link rel="stylesheet" href="cartcss/reset.css" /> 
    <link rel="stylesheet" href="css/style.css">
    <title>MELUNA NAILS</title> 
  
</head> 
  
<body> 

<!-- Шапка -->
<header class="header">

  <div class="cont-in">
    <div class="cont">
      <a align="center" href="index.php" class="logo">MELUNA <br> NAILS</a> 
    </div> 

<!-- Меню сайта -->
    <nav class="nav">
      <ul> <!-- Тег для маркированного списка -->
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

<!-- Скрипт показывающий, что пользователь авторизован -->
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

<!-- Блок со слайдером -->
<div class="intro">
    <div class="intro-title">СПЕЦИАЛЬНЫЕ ПРЕДЛОЖЕНИЯ</div>
</div>

<div class="slider-cont">
    <div class="slider">
      <div class="slider-item">
         <img src="images/sl1.jpg" alt="" class="round">
      </div>
      <div class="slider-item">
         <img src="images/sl2.jpg" alt="" class="round">
      </div>
      <div class="slider-item">
         <img src="images/sl3.jpg" alt="" class="round">
      </div>
      <div class="slider-item">
         <img src="images/sl4.jpg" alt="" class="round">
      </div>
      <div class="slider-item">
         <img src="images/sl5.jpg" alt="" class="round">
      </div>
      <div class="slider-item">
         <img src="images/sl6.jpg" alt="" class="round">
      </div>
      <div class="slider-item">
         <img src="images/sl7.jpg" alt="" class="round">
      </div>
      <div class="slider-item">
         <img src="images/sl8.jpg" alt="" class="round">
      </div>
      <div class="slider-item">
         <img src="images/sl9.jpg" alt="" class="round">
      </div>
   </div>

<!-- Кнопка, ведущая к разделу скидки -->
  <a class="btn" href="http://site/skidki.php">В магазин</a>
</div>

<!-- Блок с тремя товарами -->
<div class="intro-in">
   <div class="intro-title">НАШИ ФАВОРИТЫ</div>
</div> 
   
<div class="favorite">
   <div class="favorite-wind">
      <img src="images/sl10.jpg" alt="">  
         <div class="fav-text">
            <p>Гель для наращивания и укрепления IRISK</p>  
            <p>От</p>
            <div class="cont-button">
                <div class="cifr">249 p.</div>
                <a class="cont-btn" href="index.php?page=products&action=add&id=1<?php echo $row['id_product'][1] ?>">Купить</a>
            </div>
         </div>
   </div>

   <div class="favorite-wind">
      <img src="images/sl12.jpg" alt="">  
         <div class="fav-text">
            <p>Топ UNO SUPERSHINE без липкого слоя</p>  
            <p>От</p>
            <div class="cont-button">
                <div class="cifr">349 p.</div>
                <a class="cont-btn" href="index.php?page=products&action=add&id=2<?php echo $row['id_product'][2] ?>">Купить</a>
            </div>
         </div>
   </div>

   <div class="favorite-wind">
      <img src="images/sl13.jpg" alt="">  
         <div class="fav-text">
            <p>Гель-лаки LACK ME #SUMMER LUX</p>  
            <p>От</p>
            <div class="cont-button">
                <div class="cifr">149 p.</div>
                <a class="cont-btn" href="index.php?page=products&action=add&id=3<?php echo $row['id_product'][3] ?>">Купить</a>
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

<!-- Скрипты для слайдера -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="js/slick.min.js"></script>
<script src="js/script.js"></script>
</body> 
</html>