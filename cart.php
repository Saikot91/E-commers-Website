<?php include "inc/nav.php"; ?>

<?php
  if (isset($_GET['delproquntity'])) {
   	$delproquntity    = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['delproquntity']);
   	//$delproduct    = $_GET['delproduct'];
   	$delquantity = $ct->quantyproductdel($delproquntity);
   }

?>
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' || isset($_POST['submit'])) {
    	$cartId = $_POST['cartId'];
    	$quantity = $_POST['quantity'];
        $quantityupdate  = $ct->updatequntitycart($cartId, $quantity);
        if ($quantity <= 0) {
        	$delquantity = $ct->quantyproductdel($cartId);
        }
    }
?>

<?php
if (!isset($_GET['id'])) {
	echo "<meta http-equiv='refresh' content='0URL=?id=live' />";
}
?>


		<div class="colorlib-product">
			<div class="container">
			<!--
				<div class="row row-pb-lg">
					<div class="col-md-10 offset-md-1">
						<div class="process-wrap">
							<div class="process text-center active">
								<p><span>01</span></p>
								<h3>Shopping Cart</h3>
							</div>
							<div class="process text-center">
								<p><span>02</span></p>
								<h3>Checkout</h3>
							</div>
							<div class="process text-center">
								<p><span>03</span></p>
								<h3>Order Complete</h3>
							</div>
						</div>
					</div>
				</div>
			-->
				
				<div class="row row-pb-lg">
					<div class="col-md-12">
						<div class="product-name d-flex">
							<div class="one-forth text-left px-4">
								<span>Product Details</span>
							</div>
							<div class="one-eight text-center">
								<span>Price</span>
							</div>
							<div class="one-eight text-center">
								<span>Quantity</span>
							</div>
							<div class="one-eight text-center">
								<span>Total</span>
							</div>
							<div class="one-eight text-center px-4">
								<span>Remove</span>
							</div>
						</div>
						<?php 
								$getpro= $ct->getcartproduct();
								if($getpro){
									$sum=0;
									$quanty =0;
									while ($value=$getpro->fetch_assoc()) {
							?>
						<div class="product-cart d-flex">
							<div class="one-forth">
								<div class="product-img" >
									<img src="admin/<?php echo $value['image']; ?>"/ class="img-fluidss w-100 h-100">
								</div>
								<div class="display-tc">
									<h3><?php echo $value['productName']; ?></h3>
								</div>
							</div>
							<div class="one-eight text-center">
								<div class="display-tc">
									<span class="price">$ <?php echo $value['price']; ?></span>
								</div>
							</div>


							<div class="one-eight text-center">
								<div class="display-tc">
									<form action="" method="post">
									<input type="hidden" name="cartId" value="<?php echo $value['cartId']; ?>"/>

									<input type="number" id="quantity" name="quantity" value="<?php echo $value['quantity']; ?>" class="form-control input-number text-center" min="1" max="100" />

									<input type="submit" name="submit" value="Update" name="submit" />
								</form>
								</div>
							</div>



							<div class="one-eight text-center">
								<div class="display-tc">
									<span class="price">
										$<?php 
										$total = $value['price']*$value['quantity']; 
										echo $total;							
									?></span>
								</div>
							</div>
							<div class="one-eight text-center">
								<div class="display-tc">
									
									<a class="closed" onclick="return confirm('Are you sure delete quantity');" href="?delproquntity=<?php echo $value['cartId'];?>"></a>
								</div>
							</div>
							
						</div>
						<?php
							$sum = $sum+$total;
							Session::set("sum", $sum);
							$quanty = $quanty+$value['quantity'];
							Session::set("quanty", $quanty);
						 } } ?>
					</div>





					
				</div>
				<div class="row row-pb-lg">
					<div class="col-md-12">
						<div class="total-wrap">
							<div class="row">
								<div class="col-sm-8">
	
								</div>
								<div class="col-sm-4 text-center">
									<?php if (isset($getcart)) { ?>
									<div class="total">
										<div class="sub">
											<p><span>Subtotal:</span> <span>$<?php echo $sum; ?></span></p>
											<p><span>VAT:</span> <span>10%</span></p>
											<p><span>Discount:</span> <span>$45.00</span></p>
										</div>
										<div class="grand-total">
											<p><span><strong>Total:</strong></span> <span><?php
												$vat = $sum*0.1;
												$gtotal = $sum+$vat;
												echo "$"."$gtotal";
											?></span></p>
										</div>
									</div>
									<?php } else{
					   					//header("Location:index.php");
					   				} ?>
								</div>
								<div class="col-md-12 text-center mb-4">
									<div class="d-inline">
										<div class="shopleft d-inline">
											<a href="index.php"> <img class="img-fluid" style="width:160px" src="images/shop.png" alt="imgage" /></a>
										</div>
										<div class="shopright d-inline">
											<a href="payment.php"> <img  style="width:160px" class="img-fluid" src="images/check.png" alt="image" /></a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>


		<!-- REATED PROOCDUCT--> 
		<div class="colorlib-product mt-3">
			<div class="container">
				<div class="row">
					<div class="col-sm-8 offset-sm-2 text-center colorlib-heading">
						<h2>Related Product</h2>
					</div>
				</div>
				<div class="row row-pb-md">
			
					<div class="w-100"></div>
					<?php
			    		$nproduct = $pd->related();
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