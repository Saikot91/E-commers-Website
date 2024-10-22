<?php include "inc/nav.php"; ?>


		<div id="colorlib-contact">
			<div class="container">

				<div class="row">
					
					<div class="col-md-8 offset-2 mt-2">
						<div class="contact-wrap">
						<?php
							if($_SERVER['REQUEST_METHOD']== 'POST' AND isset($_POST['submit'])){
								$curegister = $cu->customerregister($_POST);
							}
							if(isset($curegister)){
								echo $curegister;
							}
								
						?>
							<h3>User Registation</h3>
							<form action="" class="contact-form" method="post">
								<div class="row">

									<div class="col-sm-6">
										<div class="form-group">
											<label for="name">Name</label>
											<input type="text" id="name" name="name" class="form-control" placeholder="Name">
										</div>
									</div>

									<div class="col-sm-6">
										<div class="form-group">
											<label for="email">Email</label>
											<input type="email" id="email" name="email" class="form-control" placeholder="Email">
										</div>
									</div>
									
									
									<div class="col-sm-6">
										<div class="form-group">
											<label for="phone">Phone Number</label>
											<input type="text" id="email" name="phone" class="form-control" placeholder="Phone Number  ">
										</div>
									</div>

									<div class="col-sm-6">
										<div class="form-group">
											<label for="city">City</label>
											<input type="text" name="city" id="city" class="form-control" placeholder="City">
										</div>
									</div>
									

									<div class="col-sm-6">
										<div class="form-group">
											<label for="czipity">Zip</label>
											<input type="text" id="zip" name="zip" class="form-control" placeholder="Zip-code">
										</div>
									</div>
									

									<div class="col-sm-6">
										<div class="form-group">
											<label for="country">Country Name</label>
											<input type="text" id="country" name="country" class="form-control" placeholder="Country">
										</div>
									</div>
									
									<div class="col-sm-6">
										<div class="form-group">
											<label for="address">Address</label>
											<input type="text" id="address" name="address" class="form-control" placeholder="Address">
										</div>
									</div>

									
									<div class="col-sm-6">
										<div class="form-group">
											<label for="password">Password</label>
											<input type="password" id="password" name="password" class="form-control" placeholder="Password">
										</div>
									</div>
									
								
									<div class="col-sm-12 text-right">
										<div class="form-group">
											<input type="submit" value="Submit " class="btn btn-info" name="submit">
										</div>
									</div>
								</div>
							</form>		
						</div>
					</div>

				</div>
			</div>
		</div>

	<?php include "inc/footer.php"; ?>