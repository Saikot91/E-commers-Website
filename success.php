<?php include "inc/nav.php"; ?>
<?php 
	$login = Session::get("customlogin");
	if ($login == false) {
		header("Location:login.php");
	}
?>


		<div id="colorlib-contact">
			<div class="container">
				<div class="row">
					<div class="col-sm-8 offset-2 mt-2 p-4" style="border: 2px solid gray;">
						<h1 class="text-center" style="text-shadow: 2px 1px green;font-size:">Success</h1>
						<p class="lead p-4 text-dark bg-success">Thanks For Purches, Recive your ordet successfuly. We wil contact you ASAP with delivery details.</p>
					</div>
				</div>
			</div>
		</div>

	<?php include "inc/footer.php"; ?>