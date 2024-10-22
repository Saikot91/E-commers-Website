<?php include "inc/nav.php"; ?>
		
		<div class="container-fluide">
		<div id="myCarousel" class="carousel slide" data-ride="carousel">

		  <!-- Indicators -->
		  <ul class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1"></li>
			<li data-target="#myCarousel" data-slide-to="2"></li>
		  </ul>
		  
		  <!-- The slideshow -->
		  <div class="carousel-inner">
			<div class="carousel-item active slide">
			  <img src="images\images\Paneer\Paneer-Do-Pyaza.jpg" alt="Los Angeles" height="500">
			</div>
			<div class="carousel-item">
			  <img src="images\images\Chainese\Chili-Chicken.jpg" alt="Chicago" height="500">
			</div>
			<div class="carousel-item">
			  <img src="images\images\Chicken\Handi-chicken.jpg" alt="New York"  height="500">
			</div>
		  </div>
		  
		  <!-- Left and right controls -->
		  <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
			<span class="carousel-control-prev-icon"></span>
		  </a>
		  <a class="carousel-control-next" href="#myCarousel" data-slide="next">
			<span class="carousel-control-next-icon"></span>
		  </a>
		</div>
		</div>
	
		<div class="colorlib-product">
			<div class="container">
				<div class="row">
					<div class="col-sm-8 offset-sm-2 text-center colorlib-heading">
						<h2>Best Sellers</h2>
					</div>
				</div>
				<div class="row row-pb-md">
					<?php
			    		$fproduct = $pd->getfproduct();
			    		if ($fproduct) {
			    		while ($value=$fproduct->fetch_assoc()) {
			    	?>
					<div class="col-lg-3 mb-4 text-center">
						<div class="product-entry border">
							<a class="prod-img" href="details.php?dfprduct=<?php echo $value['productId']; ?>">
								<img src="admin/<?php echo $value['image']; ?>" class="img-fluid" alt="Free html5 bootstrap 4 template">
							</a>
							<div class="desc">
								<h2><a href="details.php?dfprduct=<?php echo $value['productId']; ?>"><?php echo $value['productName']; ?></a></h2>
								<span class="price">$<?php echo $value['price']; ?></span>
							</div>
						</div>
					</div>
					<?php } } ?>
				</div>
			</div>
		</div>
		

		
		
		<div class="colorlib-product">
			<div class="container">
				<div class="row">
					<div class="col-sm-8 offset-sm-2 text-center colorlib-heading">
						<h2>New Dish</h2>
					</div>
				</div>
				<div class="row row-pb-md">
			
					<div class="w-100"></div>
					<?php
			    		$nproduct = $pd->getnproduct();
			    		if ($nproduct) {
			    			while ($value=$nproduct->fetch_assoc()) {
			    	?>
					<div class="col-lg-3 mb-4 text-center">
						<div class="product-entry border">
							<a class="prod-img" href="details.php?dfprduct=<?php echo $value['productId']; ?>">
								<img src="admin/<?php echo $value['image']; ?>" class="img-fluid" alt="Free html5 bootstrap 4 template">
							</a>
							<div class="desc">
								<h2><a href="details.php?dfprduct=<?php echo $value['productId']; ?>"><?php echo $value['productName']; ?></a></h2>
								<span class="price">$<?php echo $value['price']; ?></span>
							</div>
						</div>
					</div>
					<?php } } ?>
				</div>
			</div>
		</div>
		
	<?php include "inc/footer.php"; ?>