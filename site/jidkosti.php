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
               <li><a href = "http://site/jidkosti.php">ЖИДКОСТИ</a></li>
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
   <div class="intro-title">ЖИДКОСТИ</div>
</div> 

<div class="cont_glav">
   <div class="cont_one">
      <div class="cont_two">
         <img src="images/jid1.jpg" alt="">  
            <div class="cont_text">
               <p>ADRICOCO Средство для обезжиривания ногтей и снятия липкого слоя (100 мл.)</p>  
            </div>

            <div class="cont_but">
               <div class="price">99 p.</div>
               <a class="cont_korz" href="jidkosti.php?page=products&action=add&id=27<?php echo $row['id_product'][27] ?>">В корзину</a>
            </div>
      </div>

      <div class="cont_two">
         <img src="images/jid2.jpg" alt="">  
            <div class="cont_text">
               <p>EVI professional Средство для обезжиривания ногтей и снятия липкого слоя 250 мл</p>  
            </div>

            <div class="cont_but">
                <div class="price">199 p.</div>
                <a class="cont_korz" href="jidkosti.php?page=products&action=add&id=28<?php echo $row['id_product'][28] ?>">В корзину</a>
            </div>
      </div>

      <div class="cont_two">
         <img src="images/jid3.jpg" alt="">  
            <div class="cont_text">
               <p>SEVERINA Средство для обезжиривания и снятия липкого слоя 80 мл</p>  
            </div>

            <div class="cont_but">
               <div class="price">99 p.</div>
               <a class="cont_korz" href="jidkosti.php?page=products&action=add&id=29<?php echo $row['id_product'][29] ?>">В корзину</a>
            </div>
      </div>

      <div class="cont_two">
         <img src="images/jid4.jpg" alt="">  
            <div class="cont_text">
               <p>POLE Средство для обезжиривания ногтей и снятия липкого слоя (100 мл.)</p>  
            </div>

            <div class="cont_but">
               <div class="price">99 p.</div>
               <a class="cont_korz" href="jidkosti.php?page=products&action=add&id=30<?php echo $row['id_product'][30] ?>">В корзину</a>
            </div>
      </div>
   </div>

   <div class="cont_one">
      <div class="cont_two">
         <img src="images/jid5.jpg" alt="">  
            <div class="cont_text">
               <p>Антисептик на спиртовой основе для обработки рук и поверхностей (спрей) 150 мл.</p>  
            </div>

            <div class="cont_but">
                <div class="price">465 p.</div>
                <a class="cont_korz" href="jidkosti.php?page=products&action=add&id=31<?php echo $row['id_product'][31] ?>">В корзину</a>
            </div>
      </div>

      <div class="cont_two">
         <img src="images/jid6.jpg" alt="">  
            <div class="cont_text">
               <p>Гель для рук очищающий антибактериальный Sterilin 60 мл.</p>  
            </div>

            <div class="cont_but">
                <div class="price">99 p.</div>
                <a class="cont_korz" href="jidkosti.php?page=products&action=add&id=32<?php echo $row['id_product'][32] ?>">В корзину</a>
            </div>
      </div>

      <div class="cont_two">
         <img src="images/jid7.jpg" alt="">  
            <div class="cont_text">
               <p>АЛАМИНОЛ Дезинфицирующее средство 1 литр</p>  
            </div>

            <div class="cont_but">
                <div class="price">699 p.</div>
                <a class="cont_korz" href="jidkosti.php?page=products&action=add&id=33<?php echo $row['id_product'][33] ?>">В корзину</a>
            </div>
      </div>

      <div class="cont_two">
         <img src="images/jid8.jpg" alt="">  
            <div class="cont_text">
               <p>Оптимакс средство для дезинфекции с моющим эффектом 1 л</p>  
            </div>

            <div class="cont_but">
                <div class="price">890 p.</div>
                <a class="cont_korz" href="jidkosti.php?page=products&action=add&id=34<?php echo $row['id_product'][34] ?>">В корзину</a>
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