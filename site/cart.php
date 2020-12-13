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

<!-- Скипт для добавления товара -->
<?php 
  
  if(isset($_POST['submit'])){ 
        
      foreach($_POST['quantity'] as $key => $val) { 
          if($val==0) { 
              unset($_SESSION['cart'][$key]); 
          }else{ 
              $_SESSION['cart'][$key]['quantity']=$val; 
          } 
      } 
        
  } 

?> 
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="cartcss/reset.css" /> 
    <link rel="stylesheet" href="cartcss/style.css" /> 
    <link rel="stylesheet" href="css/style.css">
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
               <li><a href = "http://site/jidkosti.php">Жидкости</a></li>
               </ul>
               </li>
               <a class="nav-link" href="http://site/skidki.php">Скидки</a>
               <a class="nav-link" href="#">Обучение</a>
            </ul>
            </nav>  

<!-- <div class="cont-in-btn">  -->
  <a class="button" href="register.php"></a>
  <?
// Скрипт проверки

// Соединямся с БД
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
      </div>
   </header>    

<div class="intro">
   <div class="intro-title">ВАША КОРЗИНА</div>
</div> 



<div id="main"> 

<form method="post" action="cart.php?page=cart"> 
       
    <table> 
          
        <tr> 
            <th>Название</th> 
            <th>Количество</th> 
            <th>Цена</th> 
            <th>Цена товара</th> 
        </tr> 
     
    <!-- Таблица с товарами, добавленными в корзину -->
        <?php 
          
            $sql="SELECT * FROM products WHERE id_product IN ("; 
                      
                    foreach($_SESSION['cart'] as $id => $value) { 
                        $sql.=$id.","; 
                    } 
                      
                    $sql=substr($sql, 0, -1).") ORDER BY name ASC"; 
                    $query=mysqli_query($con,$sql); 
                    $totalprice=0; 
                    while($row=mysqli_fetch_array($query)){ 
                        $subtotal=$_SESSION['cart'][$row['id_product']]['quantity']*$row['price']; 
                        $totalprice+=$subtotal; 
    
                    ?> 
                        <tr> 
                            <td><?php echo $row['name'] ?></td> 
                            <td><input type="text" name="quantity[<?php echo $row['id_product'] ?>]" size="5" value="<?php echo $_SESSION['cart'][$row['id_product']]['quantity'] ?>" /></td> 
                            <td><?php echo $row['price'] ?>₽</td> 
                            <td><?php echo $_SESSION['cart'][$row['id_product']]['quantity']*$row['price'] ?>₽</td> 
                        </tr> 
                    <?php 
                          
                    } 
        ?> 
                    <tr > 
                        <td colspan="4"><br>Итоговая цена: <?php echo $totalprice ?>₽ </td> 
                    </tr> 
          
    </table> 
<div class="ulk">
    <button class="obnovlenie" type="submit" name="submit">Обновить корзину</button> <br>

    <button class="back"><a href="index.php?page=products">Вернуться на страницу товаров</a> </button>
</div>
</form> 
  
</div> 
</body>
</html>
