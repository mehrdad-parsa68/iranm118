<?php  
	require_once('core/core.php');
	$province_query = " SELECT * FROM `province`" ;
	$province_result = mysqli_query($connection,$province_query);
	
	function convertIdToName($connection,$id,$tableName){
		$query = " SELECT name FROM `$tableName` WHERE id = '$id' LIMIT 1"  ;
		$result = mysqli_query($connection,$query);
		$row = mysqli_fetch_assoc($result);
		return $row['name'];
		}
	if(isset($_SESSION['MM_ID'])){}
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>بانک مشاغل ایران</title>
    <meta name="keywords" contenet="برین ,برین کارت ,کارت تخفیف , تخفیف کارت ,بیشترین تخفیف, کارت تخفیف برین" http-equiv="Content-Type" content="text/html">
    <meta name="description" content="برین ,برین کارت ,کارت تخفیف , تخفیف کارت ,بیشترین تخفیف, کارت تخفیف برین">
    <meta name="author" content="rayweb.ir">
    <link rel="icon" href="{$obj->site_address}favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/custom.css">
    <link rel="stylesheet" type="text/css" href="css/slider.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/component.css">
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css">
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="js/jquery.js"></script>
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="?page=home">
      	<img src="images/logo.png" width="50">
      </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="شغل، زمینه فعالیت یا تلفن">
          <input type="text" class="form-control" placeholder="نام شهر یا معابر">
        </div>
        <button type="submit" class="btn btn-default btn-search">جستجو</button>
      </form>
      <ul class="nav navbar-nav navbar-right cbp-tm-menu" id="cbp-tm-menu">
      
      <?php if(isset($_GET['province'])){
		  $city_query = " SELECT * FROM `city` WHERE province = '$_GET[province]' ; " ;
		  $city_result = mysqli_query($connection,$city_query);
      echo '<li>
              <a href="#" style="padding-right:0px;">';
			
              	if(isset($_GET['city'])){
					echo convertIdToName($connection,$_GET['city'],'city');
					}else{
						echo 'همه';
						}
			  
			  echo ' <i class="fa fa-caret-down"></i></a>
              <ul class="cbp-tm-submenu"> ';   
            
			  	while($city_row = mysqli_fetch_assoc($city_result)){
						echo "<li><a href='?province=$_GET[province]&city=$city_row[id]'>$city_row[name]</a></li>";
					}
			 	
            echo '                     
              </ul>
          </li><li><a href="#"> انتخاب شهرستان <i class="fa fa-angle-double-left"></i></a></li>
       ';
       }
       ?>
       	<li>
              <a href="#" style="padding-right:0px;">
              <?php
              	if(isset($_GET['province'])){
					echo convertIdToName($connection,$_GET['province'],'province');
					}else{
						echo 'همه';
						}
			  ?>
               <i class="fa fa-caret-down"></i></a>
              <ul class="cbp-tm-submenu">    
              <?php 
			  	while($province_row = mysqli_fetch_assoc($province_result)){
						echo "<li><a href='?province=$province_row[id]'>$province_row[name]</a></li>";
					}
			  ?>                  
              </ul>
          </li>
         <li><a href="#"> انتخاب استان <i class="fa fa-angle-double-left"></i></a></li>
         <li><a href="?page=signin"><i class="fa fa-sign-in"></i> ورود</a></li>
         <li><a href="?page=signup"><i class="fa fa-user"></i> ثبت نام</a></li>
         
       
      </ul>
     <!-- <ul id="cbp-tm-menu" class="cbp-tm-menu">
          <li>
              <a href="#">Home</a>
          </li>
          <li>
              <a href="#">Veggie made</a>
              <ul class="cbp-tm-submenu">
                  <li><a href="#" class="cbp-tm-icon-archive">Sorrel desert</a></li>
                  <li><a href="#" class="cbp-tm-icon-cog">Raisin kakadu</a></li>
                  <li><a href="#" class="cbp-tm-icon-location">Plum salsify</a></li>
                  <li><a href="#" class="cbp-tm-icon-users">Bok choy celtuce</a></li>
                  <li><a href="#" class="cbp-tm-icon-earth">Onion endive</a></li>
                  <li><a href="#" class="cbp-tm-icon-location">Bitterleaf</a></li>
                  <li><a href="#" class="cbp-tm-icon-mobile">Sea lettuce</a></li>
              </ul>
          </li>
          <li>
              <a href="#">Pepper tatsoi</a>
              <ul class="cbp-tm-submenu">
                  <li><a href="#" class="cbp-tm-icon-archive">Brussels sprout</a></li>
                  <li><a href="#" class="cbp-tm-icon-cog">Kakadu lemon</a></li>
                  <li><a href="#" class="cbp-tm-icon-link">Juice green</a></li>
                  <li><a href="#" class="cbp-tm-icon-users">Wine fruit</a></li>
                  <li><a href="#" class="cbp-tm-icon-earth">Garlic mint</a></li>
                  <li><a href="#" class="cbp-tm-icon-location">Zucchini garnish</a></li>
                  <li><a href="#" class="cbp-tm-icon-mobile">Sea lettuce</a></li>
              </ul>
          </li>
          <li>
              <a href="#">Sweet melon</a>
              <ul class="cbp-tm-submenu">
                  <li><a href="#" class="cbp-tm-icon-screen">Sorrel desert</a></li>
                  <li><a href="#" class="cbp-tm-icon-mail">Raisin kakadu</a></li>
                  <li><a href="#" class="cbp-tm-icon-contract">Plum salsify</a></li>
                  <li><a href="#" class="cbp-tm-icon-pencil">Bok choy celtuce</a></li>
                  <li><a href="#" class="cbp-tm-icon-article">Onion endive</a></li>
                  <li><a href="#" class="cbp-tm-icon-clock">Bitterleaf</a></li>
              </ul>
          </li>
      </ul>-->
      
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
	<nav class="nav-right text-center">
    	<div class="nav-ico">
        <a href="?page=home">
        	<img src="images/logo.png" width="40">
            <br>
            <p class="logo">بانک</p>
            <p class="logo">مشاغل ایران</p>
        </a>
        </div>
        <hr>
    	<div class="nav-ico">
        	<a href="?page=categories">
        		<p><i class="fa fa-list"></i></p>
                <p>فهرست مشاغل</p>
            </a>
        </div>
        <div class="nav-ico">
        	<a href="?page=add">
        		<p><i class="fa fa-plus"></i></p>
                <p>درج آگهی</p>
            </a>
        </div>
        <div class="nav-ico">
        	<a>
        		<p><i class="fa fa-search"></i></p>
                <p>جستجو</p>
            </a>
        </div>
        <div class="nav-ico">
        	<a>
        		<p><i class="fa fa-dollar"></i></p>
                <p>تعرفه</p>
            </a>
        </div>
        <div class="nav-ico">
        	<a href="?page=contact">
        		<p><i class="fa fa-phone"></i></p>
                <p>ارتباط با ما</p>
            </a>
        </div>
    </nav>
    <section class="main">
    
 		<?php
	if(isset($_GET['page'])){
	  if(is_file('include/'.$_GET['page'].'.php')){
		  include 'include/'.$_GET['page'].'.php';
		  }else{
		  die('صفحه مورد نظر وجود ندارد');
		  }
	  }else{
		  include 'include/home.php';
		  }


?>
	
    </section>
    <div class="clearfix"></div>
    <footer>
    	<div class="container text-center">
        	<div class="col-sm-8 pull-right">
            	<h2>لینک های مرتبط</h2>
                <hr>
                <ul class="col-sm-6 text-center pull-right">
                	<li><a href="#">درباره ایران 118</a></li>
                    <li><a href="#">سفارش آگهی</a></li>
                    <li><a href="#">تعرفه آگهی‌</a></li>
                    <li><a href="#">استخدام</a></li>
                    
                </ul>
                <ul class="col-sm-6 text-center pull-right">
                	<li><a href="#">حریم شخصی کاربران</a></li>
                    <li><a href="#">فهرست مشاغل</a></li>
                    <li><a href="#">شرایط استفاده</a></li>
                    <li><a href="#">شبکه اجتماعی</a></li>
                    
                </ul>
            </div>
            <div class="col-sm-4 pull-right">
           		<h2>ارتباط با ما</h2>
                <hr>	
                <p>آدرس : خیابان شهید بهشتی ، بعد از خیابان میرعماد، پلاک 294، طبقه پنجم ، واحد 501</p>
                <p>تلفن : 88759591 - 021</p>
                <p>خط ویژه : 88507922 - 021</p>
                
            </div>
        </div>
        
        <p class="text-center social"><a href="#"><img src="images/fb.png"></a><a href="#"><img src="images/tw.png"></a><a href="#"><img src="images/go.png"></a></p>
    </footer>
    <div class="footer-end">
        	<h5 class="text-center">تمامی حقوق این وب سایت متعلق به شرکت یگانه نوآوران پویا می باشد.</h5>
            <h5 class="text-center">طراح : <a href="http://rayweb.ir">رای وب</a></h5>
        </div>
   	
   


<script src="js/jquery.easing.1.3.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/custom.js"></script>
<script src="js/modernizr.custom.js"></script>
<script src="js/cbpTooltipMenu.min.js"></script>
<script>
	var menu = new cbpTooltipMenu( document.getElementById( 'cbp-tm-menu' ) );
</script>
</body>
</html>