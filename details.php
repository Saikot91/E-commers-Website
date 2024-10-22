<?php include "inc/nav.php"; ?>

<?php
if (!isset($_GET['dfprduct']) || $_GET['dfprduct']==NULL) {
  echo "<script>window.location='404.php'</script>";
}else{
    $futecherid = $_GET['dfprduct'];
}

   
    if ($_SERVER['REQUEST_METHOD'] == 'POST' || isset($_POST['submit'])) {
    	$quantity = $_POST['quantity']; 
        $cartadd  = $ct->addcart($quantity, $futecherid);
   }
?>

		<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col">
						<p class="bread"><span><a href="index.php">Home</a></span> / <span>Product Details</span></p>
					</div>
				</div>
			</div>
		</div>

		<span style="color: red; font-size: 20px;display: block; margin-top: 20px;">
			<?php
				if(isset($cartadd)){
					echo "$cartadd"; ?>
			<?php } ?>
		</span>
		<div class="colorlib-product">
			<div class="container">
				<div class="row row-pb-lg product-detail-wrap align-items-centers">
					<?php
						  $futecherid = $pd->viewproduct($futecherid);
						  if($futecherid){
						  	while ($value=$futecherid->fetch_assoc()) { 		
					?>
					<div class="col-sm-8">

						<div>
							<img src="admin/<?php echo $value['image']?>" class="img-fluidss w-75 h-50" alt="Img Not Found">
						</div>

					</div>
					<div class="col-sm-4">
						<div class="product-desc">
							<h3><?php echo $value['productName']; ?></h3>
							<p class="price">
								<span>$<?php echo $value['price']; ?></span> 
								<span class="rate">
									<i class="icon-star-full"></i>
									<i class="icon-star-full"></i>
									<i class="icon-star-full"></i>
									<i class="icon-star-full"></i>
									<i class="icon-star-half"></i>
									(74 Rating)
								</span>
							</p>
							<p>

							
							</p>
							
		                     <div class="input-group mb-4">
			                    <form action="" method="post" class="form">
			                     	
			                     	<input type="number" max="10" min="1" name="quantity" class="form-control" value="1">
			                     	 
			                     	<input type="submit"  name="submit" value="Add to Cart"/>
			                    </form>
		                  	</div>
                  			
						</div>
					</div>
					<?php } } ?>
				</div>

			</div>
		</div>

<?php include "inc/footer.php"; ?>