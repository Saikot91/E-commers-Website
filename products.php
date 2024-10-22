<?php include "inc/nav.php"; ?>

		


		<div class="colorlib-product">
			<div class="container">
				<div class="row">
					<div class="col-sm-8 offset-sm-2 text-center colorlib-heading colorlib-heading-sm">
						<h2>View All Products</h2>
					</div>
				</div>
				<div class="row row-pb-md">
					<?php
			    		$nproduct = $pd->getnproductall();
			    		if ($nproduct) {
			    			while ($value=$nproduct->fetch_assoc()) {
			    	?>
					<div class="col-md-3 col-lg-3 mb-4 text-center">
						<div class="product-entry border">
							<a class="prod-img" href="details.php?dfprduct=<?php echo $value['productId']; ?>"><img class="img-fluid" src="admin/<?php echo $value['image']; ?>" alt=""></a>
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