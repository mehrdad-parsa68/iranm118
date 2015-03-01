<?php
session_start();
ob_start();

##### CONNECT TO DB ######
define('HOST_NAME','127.0.0.1');
define('USER_NAME','root');
define('PASSWORD','');
define('DB_NAME','iran118');

$connection = mysqli_connect(HOST_NAME,USER_NAME,PASSWORD,DB_NAME) or die('CONNECTION FAILED!!!');
mysqli_set_charset($connection,'utf8');
##########################



include('jdf.php');
?>