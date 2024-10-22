<?php
  $filepath= realpath(dirname(__FILE__));
   include_once($filepath.'/../lib/Database.php'); 
   include_once($filepath.'/../helper/Format.php'); 
	
?>

<?php

class Cart{
	
	public $db;
	public $fm;
	
	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function addcart($quantity, $productId){
		$quantity   = $this->fm->validation($quantity);
		$productId = $this->fm->validation($productId);


		$quantity   = mysqli_real_escape_string($this->db->link, $quantity);
		$productId = mysqli_real_escape_string($this->db->link, $productId);

		$sId = session_id();

		$query = "SELECT * FROM tbl_product where productId='$productId'";
		$result = $this->db->select($query)->fetch_assoc();
		$productName = $result['productName'];
		$price = $result['price'];
		$image = $result['image'];

		$query = "SELECT * FROM tbl_cart where productId='$productId' and sId='$sId'";
		$result=$this->db->select($query);
		if($result){ 
			$msg = "Product Insert Already Added";
			return $msg;
		}else{
			$query = "INSERT INTO tbl_cart(sId, productId, productName, price, quantity, image) values('$sId', '$productId', '$productName', '$price', '$quantity', '$image')";
			$value = $this->db->insert($query);
			if ($value) {
				header("Location:cart.php");
			}else{
				header("Location:404.php");
			}
		}
	}
 

	public function getcartproduct(){
		$sId = session_id();
		$query = "SELECT * FROM tbl_cart where sId = '$sId'";
		$result = $this->db->select($query);
		return $result ;
	}


	public function updatequntitycart($cartId, $quantity){
		$cartId   = $this->fm->validation($cartId);
		$quantity = $this->fm->validation($quantity);


		$cartId   = mysqli_real_escape_string($this->db->link, $cartId);
		$quantity = mysqli_real_escape_string($this->db->link, $quantity);

		$query ="UPDATE tbl_cart 
				SET 
				quantity = '$quantity'
				where cartId= '$cartId'
		";

		$result = $this->db->update($query);
		if ($result) {
			header("Location:cart.php");
		}else{
			$msg="<span class='error'>Quantity update not Successfuly</span>";
				return $msg;
		}
	}








	public function quantyproductdel($delproquntity){
		$query = "DELETE from tbl_cart where cartId='$delproquntity'";
		$result = $this->db->delete($query);
		if ($result) {
			header("Location:cart.php");
		}else{
			$msg="<span class='error'>Quantity delete not Successfuly</span>";
				return $msg;
		}
	}

	public function checkcart(){
		$sId = session_id();
		$query = "SELECT * FROM tbl_cart where sId = '$sId'";
		$result = $this->db->select($query);
		return $result ;
	}

	public function deletecustomarcart(){
		$sid=session_id();
		$query = "DELETE FROM tbl_cart WHERE sId='$sid'";
		$this->db->delete($query);
	}

	public function orderproduct($cmrId){
		$sId = session_id();
		$query = "SELECT * FROM tbl_cart where sId = '$sId'";
		$data = $this->db->select($query);
		if ($data) {
			while ($value = $data->fetch_assoc()) {
				$productId   = $value['productId'];
				$productName = $value['productName'];
				$quantity    = $value['quantity'];
				$price       = $value['price'] * $quantity;
				$image       = $value['image'];


				$query = "INSERT INTO tbl_order(cmrId,productId, productName,quantity, price,image) values('$cmrId','$productId', '$productName',  '$quantity','$price', '$image')";
					$value = $this->db->insert($query);
			}
		}
	}



	public function payableAmount($cmrId){
		$query = "SELECT price  FROM tbl_order where cmrId = '$cmrId' and date=now()";
		$result = $this->db->select($query);
		return $result ;
	}

	public function getorderproduct($cmrId){
		$query = "SELECT *  FROM tbl_order where cmrId = '$cmrId' order by date desc";
		$result = $this->db->select($query);
		return $result ;
	}


	public function checkorder( $cmrId){
		$query = "SELECT * FROM tbl_order where cmrId = '$cmrId'";
		$result = $this->db->select($query);
		return $result ;
	}


	public function getAllproduct(){
		$query = "SELECT * FROM tbl_order order by date  ";
		$result = $this->db->select($query);
		return $result ;
	}

	public function ShiftedProduct($id){
		$id   = $this->fm->validation($id);

		$date = mysqli_real_escape_string($this->db->link, $id);


		$query ="UPDATE tbl_order 
				SET status = 1 where id ='$id'";

		$result = $this->db->update($query);
		if ($result) {
			$msg="<span class='error'>Product Shifted Successfuly</span>";
				return $msg;
		}else{
			$msg="<span class='error'>Product not Shifted </span>";
				return $msg;
		}
	}

	/* public function ShiftedProduct($id, $price, $date){
		$id   = $this->fm->validation($id);
		$price = $this->fm->validation($price);
		$date = $this->fm->validation($date);


		$id   = mysqli_real_escape_string($this->db->link, $id);
		$price = mysqli_real_escape_string($this->db->link, $price);
		$date = mysqli_real_escape_string($this->db->link, $date);


		$query ="UPDATE tbl_order 
				SET 
				status = 1
				where cmrId ='$id' and price='$price' and date='$date'";

		$result = $this->db->update($query);
		if ($result) {
			$msg="<span class='error'>Product Shifted Successfuly</span>";
				return $msg;
		}else{
			$msg="<span class='error'>Product not Shifted </span>";
				return $msg;
		}
	} */


}
?>