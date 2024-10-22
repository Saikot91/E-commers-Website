<?php include "lib/Session.php"; 
    Session::init();
?>
<?php 

	include "lib/Database.php"; 
	include "helper/Format.php";
?>
<?php
  spl_autoload_register(function($class){
  	include_once "classes/".$class.".php";
  });

  $db  = new Database();
  $fm  = new Format();
  $pd  = new Product();
  $ct  = new Cart();
  $cat = new Category();
  $cu  = new Customer();
?>

<!DOCTYPE HTML>
<html>
	<head>
	<title>Gourmet Food</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!--<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Rokkitt:100,300,400,700" rel="stylesheet">
	-->
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Ion Icon Fonts-->
	<link rel="stylesheet" href="css/ionicons.min.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.min.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="css/flexslider.css">

	<!-- Owl Carousel -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	
	<!-- Date Picker -->
	<link rel="stylesheet" href="css/bootstrap-datepicker.css">
	<!-- Flaticons  -->
	<link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	</head>
	<body>
		
	<div class="colorlib-loader"></div>

	<div id="page">
		<?php
			if (isset($_GET['logoutid'])) {
				$ct->deletecustomarcart();
				Session::destroy();
			}
		?>
	
		<nav class="colorlib-nav" role="navigation">
		
			<div class="top-menu p-0">
				<div class="container-fluid">
					<div class="row bg-dark">
						<div class="col-md-4">
							<div id="colorlib-logo"><a href="index.php"> <img src="images\images\gourmet food 2.JPG" height="50" width="80"> </a></div>
						</div>
						<div class="col-md-5 mt-2">
							<form action="#" class="search-wrap">
			               <div class="form-group">
			                  <input type="search" class="form-control search" placeholder="Search">
			                  <button class="btn btn-primary submit-search text-center" type="submit"><i class="icon-search"></i></button>
			               </div>
			            </form>
						</div>
						<div class="col-md-3">
						 
						<div class="float-right mt-2">
							<?php
				    		$checklog=Session::get("customlogin");
				    		if ($checklog == false) { ?>
				    				 <a class="btn btn-info " href="login.php"> Login</a>
				    		<?php	} else{ ?>
				    			<a class="btn btn-info " href="?logoutid=<?php Session::get("cid"); ?>">Log Out</a>
				    		<?php }
				    	?>
						</div>
			         </div>
		         </div>
					<div class="row">
						<div class="col-sm-12 text-left menu-1">
							<ul>
								<li><a href="index.php">Home</a></li>
								<li><a href="products.php">Products</a></li>
								<!-- <li><a href="brands.php">Top Brands</a></li> -->
								<?php 
								  	$logid= Session::get("customlogin");
								  	if($logid == true){ ?>
								  		<li><a href="profile.php">Profile</a></li>
								  	<?php }
								?>
								<?php 
							  		$checkcart = $ct->checkcart();
									  	if ($checkcart) { ?>
									  		<li><a href="cart.php">Cart</a></li>
									  		<li><a href="payment.php">Payment</a></li>
							  		<?php } ?>
								<li><a href="contact.php">Contact</a></li>


								<?php 
							  		$checkcart = $ct->checkcart();
									  	if ($checkcart) { ?>
								<li class="cart"><a href="cart.php" rel="nofollow"><i class="icon-shopping-cart"></i> Cart 

									[
								<?php
									$getcart=$ct->checkcart();
									if($getcart){ 
									$total=Session::get("sum");
									echo "$"."$total";
									$total=Session::get("quanty");
									echo " || Qnt:"."$total";
								}else{
									echo "empty()";
								}
								?>

									]



								</a></li><?php } ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
			
			
			<div class="sale">
				<div class="container">
					<div class="row">
						<div class="col-sm-8 offset-sm-2 text-center">
							<div class="row">
								<div class="owl-carousel2">
									<div class="item">
										<div class="col">
											<h3><a href="#">25% off (Almost) Everything! Use Code: Summer Sale</a></h3>
										</div>
									</div>
									<div class="item">
										
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</nav>