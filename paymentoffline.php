<?php include "inc/nav.php"; ?>
<?php 
	$login = Session::get("customlogin");
	if ($login == false) {
		header("Location:login.php");
	}
?>



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

<?php
    if (isset($_GET['orderid']) and ($_GET['orderid'])=="order") {
        $cmrId= Session::get("cmrId");
        $productorder = $ct->orderproduct($cmrId);
        $ct->deletecustomarcart();
        header("Location:success.php");
    }
?>

		<div id="colorlib-contact" class="mt-2">
			<div class="container">
				<div class="row">

					<div class="col-sm-4">
						<div class="card">
							<div class="card-header">
								<h6>Customer Profile</h6>
							</div>
							<div class="card-body">
								<table class="table table-bordered mt-3 text-center">
									<?php
										$cusid= Session::get("cmrId");
										$data = $cu->getcustumarinformatio($cusid);
										if ($data) {
											while ($value = $data->fetch_assoc()){
									?>
									<tr>
										<td>Name: </td>
										<td><?php echo $value['name']; ?></td>
									</tr>
									<tr>
										<td>city: </td>
										<td><?php echo $value['city']; ?></td>
									</tr>
									<tr>
										<td>Zip Code: </td>
										<td><?php echo $value['zip']; ?></td>
									</tr>
									<tr>
										<td>email: </td>
										<td><?php echo $value['email']; ?></td>
									</tr>
									<tr>
										<td>address: </td>
										<td><?php echo $value['address']; ?></td>
									</tr>
									<tr>
										<td>country: </td>
										<td><?php echo $value['country']; ?></td>
									</tr>
									<tr>
										<td>Phone Number: </td>
										<td><?php echo $value['phone']; ?></td>
									</tr>
										<?php } } ?>
								</table>
							</div>
							<div class="card-footer">
								<h6>Check Your Information, Any wrong information, edit Your Profile <a style="color:blue" href="profile.php">Update</a></h6>
							</div>
						</div>
						
					</div>

					<div class="col-sm-8">
						<div class="card">
							<div class="card-header">
								<h5 class="p-2">Check Your Product Details and order. <a style="color:blue" href="?orderid=order">Confrim Order</a> </h5>
							</div>
							<div class="card-body">
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
								</div>

								<div class="row row-pb-lg">
								<div class="col-md-12">
									<div class="total-wrap">
										<div class="row">
											<div class="col-sm-7"></div>
											<div class="col-sm-5">
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
													<div class="text-center">
														<a href="?orderid=order" class="btn btn-info btn-sm">Confrim Order</a>
													</div>
												</div>
												<?php } else{
													header("Location:index.php");
												} ?>
											</div>
										</div>
									</div>
								</div>
						
							</div>
							
						
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	<?php include "inc/footer.php"; ?>