<?php include "inc/nav.php"; ?>
<?php 
	$login = Session::get("customlogin");
	if ($login == false) {
		header("Location:login.php");
	}
?>


		<div id="colorlib-contact">
			<div class="container">

				<table class="table table-bordered mt-3 text-center h4">
					<?php
						$cusid= Session::get("cmrId");
						$data = $cu->getcustumarinformatio($cusid);
						if ($data) {
							while ($value = $data->fetch_assoc()){
					?>
					<tr>
						<td colspan="2" class="bg-info">Your Profile.<br />Any wrong information, edit Your Profile   <a href="profileEdit.php" class="btn btn-success"> Update Profile</a></td>
						
					</tr>
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
		</div>

	<?php include "inc/footer.php"; ?>