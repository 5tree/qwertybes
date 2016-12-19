<?php 
session_start();
if(isset($_GET['act'])){
if($_GET['act'] == 'login'){
require 'connect.php';
$username = $_POST['user'];
$password = (md5(md5($_POST['pass'])));
$result = mysqli_query($con,'select * from account where username = "'.$username.'" and password = "'.$password.'"');

if(mysqli_num_rows($result)>0){
    
    while($user = mysqli_fetch_array($result)){
  $_SESSION['name'] = $user['username'];
  
}
echo $_SESSION['name']; 
header("Location:?");

}
}}
if(isset($_GET['act'])){
        if ($_GET['act'] == 'logout') {
          unset($_SESSION['name']);
          header("Location:?");
        }
      }

?>  
<html style="transform: none;">
<head>
	<meta name="generator" content="Bootply" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="js/bootstrap-responsive.min.css" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css" rel="stylesheet">


    <script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="js/jquery.leanModal.min.js"></script>
<script type="text/javascript" src="js/jquery.imagemapster.js"></script>
        <!--[if lt IE 9]>
            <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
         <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/styles.css" rel="stylesheet">
	<link rel="SHORTCUT ICON" href="https://mail.kz/assets/frontend/img/favicon.png">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/fonts.css">
<link rel="stylesheet" type="text/css" href="css/responsive.css">
<link rel="stylesheet" type="text/css" href="css/main.css">
<link rel="stylesheet" type="text/css" href="css/sprites.css">
<link rel="stylesheet" type="text/css" href="css/common.css">
<link rel="stylesheet" type="text/css" href="js/bootstrap.js">
<link rel="stylesheet" type="text/css" href="js/bootstrap-theme.js">
	<title>KZ</title>
</style>
</head>
<form action="?act=logout" method="POST" id="form_ID">  </form> 
<body style="transform: none;">
	<header id="header">
		<div class="container">
			<div class="supertop">
	<div class="row">
		<div class="col-sm-12">
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-9">
					<div class="supertop-menu supertop-menu-list">
						<ul>
							<li class="">
				<a href="/ru/adv">Welcome</a>
    </li>
<li class="">
				<a href="/ru/news">Новости</a>
    </li>
<li class="">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
			Проекты &nbsp;<i class="caret" aria-hidden="true"></i>
		</a>
		<div class="dropdown-menu" role="menu" aria-labelledby="btnGroupDrop1">
			<div class="tbl">
				<div class="tbl-row">
											<div class="tbl-cell dropdown-menu-item"><a href="#">Афиша</a></div>
																	<div class="tbl-cell dropdown-menu-item"><a href="#">Мой Mail.KZ</a></div>
															</div>
			</div>
		</div>
	</li>
<li class="">
				<a href="#">Инструкция</a>
    </li>
<li class="">
				<a href="#">Конкурс от Mail.KZ</a>
    </li>

						</ul>
					</div>
					<div class="supertop-menu supertop-footer-menu-list"></div>
					<!--
					<div class="login pull-right">
						<span>Почта</span>
						<b class="active">37</b>
						<a href="#">soljaris@mail.kz</a>
						<img src="https://mail.kz/assets/frontend/img/tmp/ava.png">
						<a href="#"><i class="spr spr-logout"></i></a>
					</div>
					-->


					<div class="supertop-menu supertop-menu-user pull-sm-right">
													
								
					
 <?php if(isset($_SESSION['name'])) { 
                      ?>
                      
          
            
                      
            <div class="supertop-menu supertop-menu-user pull-sm-right">
           
            <ul>
            <li class="">
				<a href="">
				<?php echo "Почта ".$_SESSION['name'];?>  <img src="img/ava.png" class="img-rounded"> </a>
    </li>
							<li class="">
           <a href="" onClick="document.getElementById('form_ID').submit(); return false;" >Выйти <img src="img/logout.png"></a>
            </li>
            </ul>
</div>
            <?php 
} else
 { ?>
   <div class="supertop-menu supertop-menu-user pull-sm-right">
           
            <ul>
							<li class="">
          <a id="modal_t" href="#modal1" class="logout">Авторизация</a>
         </li>
         </ul>
         </div>
            
            
            <div id="modal1" class="popupContainer" style="display:none;">
    <header class="popupHeader" style="color: #ffcb05;">
      <span class="header_title">Авторизация</span>
      <span class="modal_close"><i class="fa fa-times"></i></span>
    </header>
    
    <section class="popupBody">
      <!-- Social Login -->
      <div class="social_login">
        

        

        <div class="action_btns">
          <div class="one_half"><a href="#" id="login_form" class="btn">Вход</a></div>
          <div class="one_half last"><a href="#" id="register_form" class="btn">Регистрация</a></div>
        </div>
      </div>

      <!-- Username & Password Login form -->
      <div class="user_login">
        <form action="?act=login" method="POST" id="fo">
          <label>Логин</label>
          <input type="text" name="user"/>
          <br />

          <label>Пароль</label>
          <input type="password" name="pass"/>
          <br />

         

          <div class="action_btns">
            <div class="one_half"><a href="#" class="btn back_btn"><i class="fa fa-angle-double-left"></i> Назад</a></div>
            <div class="one_half"> <a href="" onClick="document.getElementById('fo').submit(); return false;" class="btn">Войти </a></div>
          </div>
        </form>

        
      </div>

      <!-- Register Form -->
      <div class="user_register">
        <form action="abb.php" id="for" method="post">
          <label>Имя</label>
          <input type="text" name="f_name" />
          <br />

          <label>Фамилия</label>
          <input type="text" name="s_name" />
          <br />

          <label>Логин</label>
          <input type="text" name ="name"/>
          <br />

          <label>Пароль</label>
          <input type="password" name= "comment"/>
          <br />

          

          <div class="action_btns">
            <div class="one_half"><a href="#" class="btn back_btn"><i class="fa fa-angle-double-left"></i> Назад</a></div>
           
          <div class="one_half"> <a href="" onClick="document.getElementById('for').submit(); return false;" class="btn">Зарегистрироваться </a></div>
            
            
          </div>
        </form>
      </div>
    </section>
  </div>
   
   <script type="text/javascript">
  $("#modal_t").leanModal({top : 140, overlay : 0.6, closeButton: ".modal_close" });

  $(function(){ 
    // Calling Login Form
    $("#login_form").click(function(){
      $(".social_login").hide();
      $(".user_login").show();
      return false;
    });

    // Calling Register Form
    $("#register_form").click(function(){
      $(".social_login").hide();
      $(".user_register").show();
      $(".header_title").text('Регистрация');
      return false;
    });

    // Going back to Social Forms
    $(".back_btn").click(function(){
      $(".user_login").hide();
      $(".user_register").hide();
      $(".social_login").show();
      $(".header_title").text('Вход');
      return false;
    });

  })
</script>
<?php } ?>

</div>

				</div>
				<div class="clearfix"></div>
			</div>
		</div><!-- .col-* -->
	</div><!-- .row -->
</div><!-- .supertop -->
			<div class="header">
				<div class="supertop-menu lang-menu" style="margin-left: 0">
					<ul style="margin-left: 0">
						<li><a href="#">Каз</a></li>
						<li class="active"><a href="#">Рус</a></li>
					</ul>
				
				</div>

				
				<div class="owl-item cloned" style="width: 862px; margin-right: 10px;">
				
				<div class="slider-item">
					<div class="relative-block">
	<div class="hidden-xs">
		<a href="https://mail.kz/ru/click?url=http%3A%2F%2Fwww.starttime.kz%2F" target="_blank" style="z-index: 4" class="overlay">&nbsp;</a>
		<div class="overlay" style="cursor: pointer; z-index: 3" onclick="javascript: window.open('https://mail.kz/ru/click?url=http%3A%2F%2Fwww.starttime.kz%2F', '_blank');">&nbsp;</div>

	</div>
	
</div>

				</div></div>

					</div><!-- .col-* -->
				</div><!-- .row -->
			</div><!-- .header -->
		</div><!-- .container -->
	</header>
	<section class="main" style="transform: none;">
			
	<div class="container wrapper" style="transform: none;">
		<div class="row innerWrapper" style="transform: none;">
			
<div class="col-md-9 col-md-push-3 content sticky-column" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">
			<div class="visible-xs visible-sm">
			<div class="block auth-block">

		
	</div></div>

				
				<!-- .shop-adv-block -->
			<div class="theiaStickySidebar" style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none;"><div class="block">
					<div class="content-block active-content">
					
					<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="img/5.jpg" alt="...">
      <div class="carousel-caption">
     <h2> Алматы облысы</h2>
    <h3>Талдыкорган</h3>
      </div>
    </div>
    <div class="item">
      <img src="img/5.jpg" alt="...">
      <div class="carousel-caption">
        <h2>Алматы облысы</h2>
    <h3>Талдыкорган</h3>
      </div>
    </div>
    <div class="item">
      <img src="img/5.jpg" alt="...">
      <div class="carousel-caption">
        <h2>Алматы облысы</h2>
    <h3>Талдыкорган</h3>
      </div>
    </div>
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<br>

	<div class="row">
  
  <?php 


mysql_connect("besagash.mail.kz","www_besagash","1Fk4PF4F");
mysql_select_db("shop");

$result_set = mysql_query ("SELECT * FROM products order by id desc") or die(mysql_error());

    while($row=mysql_fetch_assoc($result_set))
    {
    ?>
    <div class="col-md-4" style="min-height: 372px; max-height: 357px;"> 
    <img  src="uploads/<?php echo $row['file'] ?>" style="min-height: 200px; max-height: 200px; min-width: 250px; max-width:200px " class="img-rounded"  >
    <h3 style="color: #337ab7;  word-wrap: break-word";><?php echo $row['photo_name'] ?></h3>
	<h3><?php echo $row['region'] ?></h3>
    <p style="font-size: 70%;"><b><?php echo $row['name'] ?> <?php echo $row['surname'] ?></b></p>
   <p style="display: inline;">Цена фотографии:   &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </p> <h2 style="color: #337ab7; display:inline;">     <?php echo $row['price'] ?>тг</h2>

   <input type="submit" name="sss" value="Купить" class="btn">
    </div>
  
  <?php
}
?>
</div>

	

							</div></div></div></div>
			<!-- col-md-6 -->





			
			<div class="col-md-3 col-md-pull-9 left-sidebar sticky-column" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">
				
					
				<!-- NOCACHE newsNoCategoryWidget -->
											<div class="">
											<div class="block">
	<div class="">
<?php if(isset($_SESSION['name'])) { 
                      ?>
		<ul class="nav nav-pills nav-stacked">
   <li role="presentation" class="active"><a href="my_photos.php">Мои фотографии</a></li>
</ul>	
<?php 
} else
 { ?>
 <ul class="nav nav-pills nav-stacked">
   <li role="presentation" class="active" onclick="aler()"><a href="#">Принять участие</a></li>
</ul>	
<?php } ?>
	</div>
</div>
</div>
				<!-- NOCACHE newsNoCategoryWidget -->
											
	<div >


	<?php

$link = mysql_connect("besagash.mail.kz", "www_besagash", "1Fk4PF4F");
mysql_select_db("shop", $link);

$result = mysql_query("SELECT * FROM products", $link);
$num_rows = mysql_num_rows($result);

$resul = mysql_query("SELECT * FROM products where region = 'Алматы'", $link);
$num_row = mysql_num_rows($resul);

$resul1 = mysql_query("SELECT * FROM products where region = 'Астана'", $link);
$num_row1 = mysql_num_rows($resul1);

$resul2 = mysql_query("SELECT * FROM products where region = 'Акмолинская область'", $link);
$num_row2 = mysql_num_rows($resul2);

$resul3 = mysql_query("SELECT * FROM products where region = 'Актюбинская область'", $link);
$num_row3 = mysql_num_rows($resul3);

$resul4 = mysql_query("SELECT * FROM products where region = 'Атырауская область'", $link);
$num_row4 = mysql_num_rows($resul4);

$resul5 = mysql_query("SELECT * FROM products where region = 'Вост-Казахстанская обл.'", $link);
$num_row5 = mysql_num_rows($resul5);

$resul6 = mysql_query("SELECT * FROM products where region = 'Жамбылская область'", $link);
$num_row6 = mysql_num_rows($resul6);

$resul7 = mysql_query("SELECT * FROM products where region = 'Зап-Казахстанская обл.'", $link);
$num_row7 = mysql_num_rows($resul7);

$resul8 = mysql_query("SELECT * FROM products where region = 'Карагандинская область'", $link);
$num_row8 = mysql_num_rows($resul8);

$resul9 = mysql_query("SELECT * FROM products where region = 'Костанайская область'", $link);
$num_row9 = mysql_num_rows($resul9);

$resul10 = mysql_query("SELECT * FROM products where region = 'Кызылординская область'", $link);
$num_row10 = mysql_num_rows($resul10);

$resul11 = mysql_query("SELECT * FROM products where region = 'Мангистауская область'", $link);
$num_row11 = mysql_num_rows($resul11);

$resul12 = mysql_query("SELECT * FROM products where region = 'Павлодарская область'", $link);
$num_row12 = mysql_num_rows($resul12);

$resul13 = mysql_query("SELECT * FROM products where region = 'Сев-Казахстанская обл.'", $link);
$num_row13 = mysql_num_rows($resul13);

$resul14 = mysql_query("SELECT * FROM products where region = 'Южно-Казахстанская обл.'", $link);
$num_row14 = mysql_num_rows($resul14);


?>
	<div style="background: white;" class="row-fluid"> 
<script>
function aler(){
  alert("Сначала авторизуйтесь!");
}

</script>
<p><a href="index.php">Все регионы &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo " $num_rows";?></a></p> 
<p><a href="region1.php">Алматы &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo " $num_row";?></a></p> 
<p> <a href="region2.php">Астана &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo " $num_row1";?></a></p> 
<p> <a href="region3.php">Акмолинская область &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo " $num_row2";?></a></p> 
<p> <a href="region4.php">Актюбинская область &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo " $num_row3";?></a></p> 
<p> <a href="region5.php">Атырауская область&nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<?php echo " $num_row4";?></a></p> 
<p> <a href="region6.php">Вост-Казахстанская обл.&nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;<?php echo " $num_row5";?></a></p> 
<p> <a href="region7.php">Жамбылская область &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;<?php echo " $num_row6";?></a></p> 
<p> <a href="region8.php">Зап-Казахстанская обл.&nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;<?php echo " $num_row7";?></a></p> 
<p> <a href="region9.php">Карагандинская область&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo " $num_row8";?></a></p> 
<p> <a href="region10.php">Костанайская область&nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<?php echo " $num_row9";?></a></p> 
<p> <a href="region11.php">Кызылординская область&nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo " $num_row10";?></a></p> 
<p> <a href="region12.php">Мангистауская область&nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;<?php echo " $num_row11";?></a></p> 
<p> <a href="region13.php">Павлодарская область&nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<?php echo " $num_row12";?></a></p> 
<p> <a href="region14.php">Сев-Казахстанская обл.&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo " $num_row13";?></a></p> 
<p> <a href="region15.php">Южно-Казахстанская обл.&nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;<?php echo " $num_row14";?></a></p> 


</div>
	
</div></div></div><!-- .content -->
			<!-- .col-*, sidebar-right -->
		</div><!-- .row -->
	</div><!-- .container -->
	<div class="container wrapper" style="transform: none;">
		<div class="row innerWrapper" style="transform: none;">
			<div class="col-md-12  content sticky-column" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">
			<div class="visible-xs visible-sm">
			<div class="block auth-block">

		
	</div></div>
	
				
				<!-- .shop-adv-block -->
        <script >
 
//   $(document).ready(function(){
//     $("area#myBtn").hover(function(){
//       alert("azazazazzaazaza");
//     });
//     $("button").click(function(){
    
//       alert("azazaazza");
//         });
    
// });

</script>
			<div class="theiaStickySidebar" style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none;"><div class="block">
					<div class="d_t content">
					<div style="margin: 9px 0px 3px 32px">						
						<div class="d_t" style="height:404px">
							<div class="d_r">
								<div class="d_c"><br>
                            
									<div  style="margin-left:118px; margin-top:13px; margin-right:25px;;">
                                    <span class="row14 col-md-1" style="z-index:100;color:white;position:absolute;margin-top:220px;margin-left:503px;width:0.2%;height: 5%;opacity:.7;background: lime;border-radius: 45%;"><?php echo " $num_row14";?></span>
                                     <span class="rowKyzyl col-md-1" style="z-index:100;color:white;position:absolute;margin-top:170px;margin-left:430px;width:0.2%;height: 5%;opacity:.7;background: lime;border-radius: 45%;"><?php echo " $num_row10";?></span>
                                      <span class="rowJambyl col-md-1" style="z-index:100;color:white;position:absolute;margin-top:180px;margin-left:533px;width:0.2%;height: 5%;opacity:.7;background: lime;border-radius: 45%;"><?php echo " $num_row6";?></span>
                                      <span class="row1 col-md-1" style="z-index:100;color:white;position:absolute;margin-top:164px;margin-left:613px;width:0.2%;height: 5%;opacity:.7;background: lime;border-radius: 45%;"><?php echo " $num_row";?></span>
                                      <span class="rowMan col-md-1" style="z-index:100;color:white;position:absolute;margin-top:179px;margin-left:313px;width:0.2%;height: 5%;opacity:.7;background: lime;border-radius: 45%;"><?php echo " $num_row11";?></span>
                                      <span class="rowAtyrau col-md-1" style="z-index:100;color:white;position:absolute;margin-top:123px;margin-left:296px;width:0.2%;height: 5%;opacity:.7;background: lime;border-radius: 45%;"><?php echo " $num_row4";?></span>
                                      <span class="rowZapad col-md-1" style="z-index:100;color:white;position:absolute;margin-top:92px;margin-left:235px;width:0.2%;height: 5%;opacity:.7;background: lime;border-radius: 45%;"><?php echo " $num_row7";?></span>
                                      <span class="rowAktobe col-md-1" style="z-index:100;color:white;position:absolute;margin-top:150px;margin-left:352px;width:0.2%;height: 5%;opacity:.7;background: lime;border-radius: 45%;"><?php echo " $num_row3";?></span>
                                      <span class="rowKaraganda col-md-1" style="z-index:100;color:white;position:absolute;margin-top:120px;margin-left:573px;width:.2%;height: 5%;opacity:.7;background: lime;border-radius: 45%;"><?php echo " $num_row8";?></span>
                                      <span class="rowVostok col-md-1" style="z-index:100;color:white;position:absolute;margin-top:68px;margin-left:653px;width:.2%;height: 5%;opacity:.7;background: lime;border-radius: 45%;"><?php echo " $num_row5";?></span>
                                       <span class="rowPavlodar col-md-1" style="z-index:100;color:white;position:absolute;margin-top:28px;margin-left:580px;width:.2%;height: 5%;opacity:.7;background: lime;border-radius: 45%;"><?php echo " $num_row12";?></span>
                                         <span class="rowAkmola col-md-1" style="z-index:100;color:white;position:absolute;margin-top:38px;margin-left:512px;width:.2%;height: 5%;opacity:.7;background: lime;border-radius: 45%;"><?php echo " $num_row2";?></span>
                                         <span class="rowSever col-md-1" style="z-index:100;position:absolute;margin-top:8px;margin-left:500px;width:.2%;height: 5%;opacity:.7;color:white;background: lime;border-radius: 45%;"><?php echo " $num_row13";?></span>
                                       <span class="rowKostanai col-md-1" style="z-index:100;position:absolute;margin-top:38px;margin-left:435px;width:.2%;height: 5%;opacity:.7;color:white;background: lime;border-radius: 45%;"><?php echo " $num_row9";?></span>

                                    <center><img src="images/Map_KZ.gif" style="background-color: red;" alt="Карта Казахстана" width="500" height="283" border="0" usemap="#Map" class="img_center" id="vegetables"></center>
                                    <map name="Map" id="veg_map">
                                    
                                      <area id="myBtn" name="Shym" style="z-index: 100" shape="poly" coords="244,250,271,235,274,221,265,205,261,182,285,181,297,211,293,230,303,234,312,248,295,265,283,280,271,274,257,274,243,260" href="region15.php">
                                      <area shape="poly" name="zapad" style="z-index: 100" coords="0,102,10,83,20,75,29,84,34,76,44,68,59,61,77,63,92,69,101,81,101,91,99,101,91,111,79,114,74,124,55,119,33,127,0,112" href="region8.php">
                                      <area shape="poly" style="z-index: 100;" name="kyzyl" coords="186,228,171,210,169,187,152,184,160,170,177,159,185,145,194,149,208,162,234,171,257,180,262,188,262,200,267,213,272,220,272,233,255,243,246,247,231,226" href="region11.php">
                                      <area shape="poly" name="almaty" coords="381,227,375,223,376,219,371,217,373,211,373,206,362,202,359,197,347,187,344,173,354,158,369,154,393,155,393,144,401,140,414,142,427,144,442,145,456,154,463,164,432,178,447,205,443,229,419,223" href="region1.php">
                                      <area shape="poly" name="vostok" coords="402,139,389,145,383,143,386,129,382,120,385,112,378,111,372,103,383,88,394,86,398,78,387,67,396,56,408,66,416,60,428,66,441,55,453,57,461,65,469,67,471,73,483,72,490,64,498,74,498,80,489,96,492,118,483,130,461,130,458,153,444,145" href="region6.php">
                                      <area shape="poly" name="karaganda" coords="204,158,219,145,217,139,228,124,239,123,261,103,261,98,268,95,264,90,276,88,273,96,283,96,292,97,295,96,308,85,312,91,316,89,333,74,337,83,343,84,351,89,350,94,372,85,373,79,383,83,380,89,372,102,377,111,382,114,380,121,384,128,383,136,383,144,391,145,392,155,371,154,358,156,349,162,341,175,259,180" href="region9.php">
                                      <area shape="poly" name="akmola" coords="236,88,233,71,240,58,255,60,256,57,262,60,263,54,272,48,272,41,269,37,274,32,282,31,291,38,294,34,298,38,304,35,306,43,317,40,323,46,332,48,334,59,332,65,338,66,332,74,316,89,311,85,304,88,294,96,276,95,277,88,265,89,264,93,257,95,248,89" href="region2.php">
                                      <area shape="poly" name="jambyl" coords="314,246,305,236,295,231,298,211,286,181,342,176,345,185,352,192,360,201,371,207,370,216,375,220,380,228,356,226,347,232,349,241,331,237,318,237" href="region7.php">
                                      <area shape="poly" name="kostanai" coords="217,139,203,126,197,114,204,107,198,85,181,78,169,68,180,59,180,47,187,46,182,33,185,28,205,26,218,23,239,16,243,25,238,29,244,43,240,45,240,57,234,68,233,78,235,88,241,89,250,90,257,95,264,93,265,97,256,107,246,118,228,124,221,131" href="region10.php">
                                      <area shape="poly" name="aktobe" coords="121,194,118,168,104,156,104,145,103,134,104,122,100,118,95,121,92,112,100,101,101,94,103,84,108,80,112,85,116,88,125,81,140,84,149,82,158,89,165,92,173,90,182,92,185,80,196,86,200,96,202,104,196,115,199,122,205,131,216,141,217,145,204,155,188,144,177,153,172,160,157,172,152,181,145,188" href="region4.php">
                                      <area shape="poly" name="atyrau" coords="4,115,5,128,13,128,21,145,15,147,22,158,55,148,57,154,74,154,67,175,76,174,86,168,93,168,103,168,107,167,117,174,116,169,109,163,102,156,102,145,101,132,103,125,100,121,95,123,92,114,87,113,79,116,76,125,55,121,45,124,34,129" href="region5.php">
                                      <area shape="poly" name="mangystau" coords="120,194,119,183,117,176,107,169,98,170,87,170,79,175,67,177,72,183,55,182,46,182,43,188,32,192,33,197,38,219,49,229,58,231,53,252,68,244,80,244,91,257,92,264,102,265,110,198" href="region12.php">
                                      <area shape="poly" name="sever" coords="241,57,242,46,247,43,240,30,244,25,240,16,261,9,266,3,280,3,292,3,298,20,307,17,324,19,323,27,325,34,326,38,327,42,331,47,319,40,308,41,304,35,298,36,295,33,290,36,281,30,274,30,268,36,270,41,271,48,264,53,262,59,258,56,253,59" href="region14.php">
                                      <area shape="poly" name="pavlodar" coords="338,82,334,74,339,66,333,64,336,58,330,43,324,26,330,31,334,26,340,22,355,9,359,12,356,16,377,30,396,54,391,61,387,67,397,79,394,84,385,86,374,77,371,83,351,93,348,85" href="region13.php">
                                    </map>
                                    <br>
                                      <script type="text/javascript">
                                         var xref = {
        kyzyl: "<a href='google.kz'>aaaaa</a>",
        akmola: "<b>Asparagus</b> is one of the first vegetables of the spring. " 
            +"Being a dark green, it's great for you, and has interesting side effects.",
        karaganda: "<b>Squash</b> is a winter vegetable, and not eaten raw too much. Is that really squash?",
        Shym: "href='google.kz' ",
        mangystau: "Similar to red peppers, <b>yellow peppers</b> are sometimes sweeter.",
        zapad: "<b>Celery</b> is a fascinating vegetable. Being mostly water, it actually takes your body "
            +"more calories to process it than it provides.",
        atyrau: "<b>Cucumbers</b> are cool.",
        aktobe: "<b>Broccoli</b> is like a forest of goodness in your mouth. And very good for you. "
            +"Eat lots of broccoli!",
        dip: "Everything here is good for you but this one. <b>Don't be a dip!</b>"
    };
    
    var defaultDipTooltip = 'I know you want the dip. But it\'s loaded with saturated fat, just skip it '
        +'and enjoy as many delicious, crisp vegetables as you can eat.';
    
    var image = $('#vegetables');

    image.mapster(
    {
        fillOpacity: 0.4,
        fillColor: "d42e16",
        stroke: true,
        strokeColor: "3320FF",
        strokeOpacity: 0.8,
        strokeWidth: 4,
        singleSelect: true,
        mapKey: 'name',
        listKey: 'name',
        onClick: function (e) {
            
            
          // update text depending on area selected
             $('#selections').html(xref[e.key]);
            
       // if Asparagus selected, change the tooltip
             if (e.key === 'kyzyl') {
               document.location.href="region11.php";
            }
            if(e.key === 'Shym'){
              document.location.href="region15.php";
            }
            if(e.key === 'zapad'){
              document.location.href="region8.php";
            }
            if(e.key === 'akmola'){
              document.location.href="region2.php";
            }
            if(e.key === 'karaganda'){
              document.location.href="region9.php";
            }
            if(e.key === 'mangystau'){
              document.location.href="region12.php";
            } 
             if(e.key === 'atyrau'){
              document.location.href="region5.php";
            }
             if(e.key === 'karaganda'){
              document.location.href="region9.php";
            }
             if(e.key === 'aktobe'){
              document.location.href="region4.php";
            }
            if(e.key =='kostanai'){
               document.location.href="region10.php";
            }
            if(e.key =='sever'){
               document.location.href="region14.php";
            }
            if(e.key =='pavlodar'){
               document.location.href="region13.php";
            }
            if(e.key =='jambyl'){
               document.location.href="region7.php";
            }
            if(e.key =='almaty'){
               document.location.href="region1.php";
            }
            if(e.key =='vostok'){
               document.location.href="region6.php";
            }
        },
         showToolTip: true,
           });
    // carrots.onclick=function(){
    //   document.location.href="localhost/mailkz/region13.php";
    // }

                                      </script>
                                    <br>
                                      
								  </div>
                                  
                                  <div  style="margin-left:18px; margin-top:13px; margin-right:25px;;">

                                  </div>
<br><br><br>
<script type="text/javascript" src="js/mykarta.js">
</script>
                                  
							  </div>
							</div>
						</div>						
					</div>
				</div>

					</div>
	</section>
	
        
      </div>
	
	

	<script src="https://mail.kz/assets/frontend/lib/jquery/jquery-1.12.3.min.js"></script>

	<script src="https://mail.kz/assets/frontend/lib/bootstrap/js/bootstrap.min.js"></script>

	<link media="all" type="text/css" rel="stylesheet" href="https://mail.kz/assets/frontend/lib/font-awesome/css/font-awesome.min.css">


	<!-- OWL Carousel -->
	<link media="all" type="text/css" rel="stylesheet" href="https://mail.kz/assets/frontend/lib/owl/assets/owl.carousel.min.css">

	<script src="https://mail.kz/assets/frontend/lib/owl/owl.carousel.min.js"></script>

	<!-- /OWL Carousel -->
	
	<!-- Sticky -->
	<script src="https://mail.kz/assets/frontend/lib/sticky/theia-sticky-sidebar.js"></script>

	<!-- /Sticky -->
	
	<!-- Dynamic-tabs -->
	<script src="https://mail.kz/assets/frontend/lib/dynamic-tabs/bootstrap-dynamic-tabs.min.js?v=1.1"></script>

	<link media="all" type="text/css" rel="stylesheet" href="https://mail.kz/assets/frontend/lib/dynamic-tabs/bootstrap-dynamic-tabs.min.css">

	<!-- /Dynamic-tabs -->
	
	
	<script src="https://mail.kz/assets/frontend/js/main.js?v1.3"></script>

	<script src="https://mail.kz/assets/frontend/js/common.js?v1.2"></script>

	<script src="https://mail.kz/assets/frontend/js/sliders.js"></script>
	
	<!-- /Bootstrap Datetimepicker -->
	
	<footer>
	<div class="container">
		<div class="footer">
		
			<div class="pull-left">
				<ul>
					<li><a href="#">© Mail.kz</a></li>
					<li class="">
				<a href="https://mail.kz/ru/adv">Реклама</a>
    </li>
<li class="">
				<a href="https://mail.kz/ru/contacts">Контакты</a>
    </li>

				</ul>
			</div>
			<div class="pull-right">
				<ul>
					<li class="">
				<a href="https://mail.kz/ru/partners">Партнеры проекта</a>
    </li>
<li class="">
				<a href="https://mail.kz/ru/agreement">Пользовательское соглашение</a>
    </li>
<li class="">
				<a href="https://mail.kz/ru/vacancy">Вакансии</a>
    </li>
				</ul>
			</div>
		</div><!-- .footer -->
	</div><!-- .container -->
</footer>


	<script type="text/javascript" src="js/myJquery.js"></script>
	<div class="body-overlay"></div>
	<div class="hidden"></div>
	<!-- 0KHQtNC10LvQsNC7INCR0LDQu9GC0LDQsdCw0LXQsiDQoNGD0YHRgtCw0Lw= -->

</body></html>