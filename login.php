<?php include "inc/nav.php"; ?>


		<div id="colorlib-contact">
			<div class="container">

				<div class="row">
				

					<div class="col-md-6 mt-2 login offset-3">
						<?php
			        		if ($_SERVER['REQUEST_METHOD']=='POST' OR isset($_POST['lsub'])) {	
			        			$login=$cu->cunstomerlogin($_POST);
			        		}
			        	?>
						<div class="contact-wrap">
							<h3>User Login</h3>
							<?php
					    		if (isset($login)) {
					    			echo "$login";
					    		}
					    	?>
							<form action="" method="post" class="contact-form">
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<input type="email" id="fname" name="email" class="form-control" placeholder="Email Address">
										</div>
										<div class="form-group">
											<input type="password" id="lname" name="password" class="form-control" placeholder="Password">
										</div>
									</div>

									<div class="col-sm-12">
										<p>You are not registered <a style="color:blue" href="register.php">Register Now</a></p>
									</div>
									<div class="col-sm-12">
										<div class="form-group">
											<input type="submit" name="lsub" value="Login" class="btn btn-info">
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