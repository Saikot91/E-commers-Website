<?php include "inc/nav.php"; ?>
<?php 
	$login = Session::get("customlogin");
	if ($login == false) {
		header("Location:login.php");
	}
?>
<style type="text/css">
	.tblone{
		width: 700px;
		margin: 0px auto;
	}
	.tblone tr td{
		text-align: justify;
	}
	.tblone input[type="text"] {
    padding: 7px;
    width: 80%;
	}
	.tblone input[type="submit"] {
    height: 40px;
    width: 40%;
	}
</style>
  <div class="main">
  	<?php
  		$cusid= Session::get("cmrId");
		  
  		if ($_SERVER['REQUEST_METHOD']=='POST' OR isset($_POST['submit'])) {	
        		$updatecunstomer = $cu->cunstomerupdate($_POST,$cusid);
        	}
  	?>
    <div class="content">
    	<?php 
    		$cusid= Session::get("cmrId");
    		$cuinfo =  $cu->getcustumarinformatio($cusid);
    		if ($cuinfo ) {
    			while ($value = $cuinfo->fetch_assoc()) {

    	?>
    	<form action="profileEdit.php" method="post">
			<table class="tblone">
				<?php

					if (isset($updatecunstomer)) {
						echo"<tr><td colspan='2'>".$updatecunstomer."</td></tr>";
					}
				?>
				<tr>
					<td colspan="2" style="color: tomato; text-align: center; font-size: 30px">Your Information </td>
				</tr>
				<tr>
					<td width="15%">Name </td>
					<td><input type="text" name="name" Value="<?php echo $value['name'];?>"></td>
				</tr>
				<tr>
					<td>City </td>
					<td><input type="text" name="city" Value="<?php echo $value['city'];?>"></td>
				</tr>
				<tr>
					<td>Zip Code  </td>
					<td><input type="text" name="zip" Value="<?php echo $value['zip'];?>"></td>
				</tr>
				<tr>
					<td>Email  </td>
					<td><input type="text" name="email" Value="<?php echo $value['email'];?>"></td>
				</tr>
				<tr>
					<td>Address </td>
					<td><input type="text" name="address" Value="<?php echo $value['address'];?>"></td>
				</tr>
				<tr>
					<td>Country  </td>
					<td><input type="text" name="country" Value="<?php echo $value['country'];?>"></td>
				</tr>
				<tr>
					<td>Phoneumber  </td>
					 <td><input type="text" name="phone" Value="<?php echo $value['phone'];?>"></td>
					
				</tr>

				<tr>
					<td> </td>
					<td> <input type="submit" name="submit" Value="Update Information"> </td>
				</tr>
			</table>
		</form>
			<?php } } ?>
    </div>
 </div>
 <?php include "inc/footer.php"; ?>