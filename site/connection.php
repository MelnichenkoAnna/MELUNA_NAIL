    <?php 
  
  define("DB_SERVER", "site");
  define("DB_USER", "mysql");
  define("DB_PASS", "mysql");
  define("DB_NAME", "testtable");
      
    // connect to mysql 
	$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS) or die("Нет соединения: ".mysqli_error());
	mysqli_select_db($con, DB_NAME) or die("Cannot select DB");
  
?>