<?php
  $filepath= realpath(dirname(__FILE__));
   include_once($filepath.'/../lib/Database.php'); 
   include_once($filepath.'/../helper/Format.php'); 
	
?>

<?php

class Customer{
	
	public $db;
	public $fm;
	
	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}
	
	public function customerregister($data){
		$name     = $this->fm->validation($data['name']);
		$city     = $this->fm->validation($data['city']);
		$zip      = $this->fm->validation($data['zip']);
		$email    = $this->fm->validation($data['email']);
		$address  = $this->fm->validation($data['address']);
		$country  = $this->fm->validation($data['country']);
		$phone    = $this->fm->validation($data['phone']);
		$password = $this->fm->validation(md5($data['password']));
		
		$name     = mysqli_real_escape_string($this->db->link, $name);
		$city     = mysqli_real_escape_string($this->db->link, $city);
		$zip      = mysqli_real_escape_string($this->db->link, $zip);
		$email    = mysqli_real_escape_string($this->db->link, $email);
		$address  = mysqli_real_escape_string($this->db->link, $address);
		$country  = mysqli_real_escape_string($this->db->link, $country);
		$phone    = mysqli_real_escape_string($this->db->link, $phone);
		$password = mysqli_real_escape_string($this->db->link, $password);
		
		$chaeckE = $this->checkEmaii($email);
		$chaeckP = $this->checkPhone($phone);
		
		if ($name == "" || $city == "" || $zip == "" || $email == "" || $address == "" || $country == "" || $phone == "" || $password == ""){
			$msg="<span class='alert alert-danger d-block'>Flied Must Not Be Empty</span>";
			return $msg;
		}elseif(strlen($name) <= 3){
			$msg="<span class='alert alert-danger d-block'>Name Must be 4 character</span>";
			return $msg;
		}elseif(strlen($password) <= 5){
			$msg="<span class='alert alert-danger d-block'>Password Must be 6 character</span>";
			return $msg;
		}elseif($chaeckE == true){
			$msg="<span class='alert alert-danger d-block'>Email Addres already registered.</span>";
			return $msg;
		}elseif($chaeckP == true){
			$msg="<span class='alert alert-danger d-block'>Phone Number already used</span>";
			return $msg;
		}else{
			
			$query = "INSERT INTO tbl_customer(name, city, zip, email, address, country, phone, password) values('$name', '$city', '$zip', '$email', '$address', '$country', '$phone', '$password')";
			$value = $this->db->insert($query);
			if ($value) {
				$msg="<span class='alert alert-success'>Register Successfuly</span>";
				return $msg;
			}else{
				$msg="<span class='alert alert-danger'>Register not Successfuly</span>";
				return $msg;
			}
		}
	}

	public function checkEmaii($data){
		$query = "SELECT * from tbl_customer where email='$data'";
		$result=$this->db->select($query);
		if ($result) {
			return true;
		}else{
			return false;
		}
	}

	public function checkPhone($data){
		$query = "SELECT * from tbl_customer where phone='$data'";
		$result=$this->db->select($query);
		if ($result) {
			return true;
		}else{
			return false;
		}
	}



	public function cunstomerlogin($data){
		$email     = $this->fm->validation($data['email']);
		$password  = $this->fm->validation(md5($data['password']));


		$email     = mysqli_real_escape_string($this->db->link, $email);
		$password  = mysqli_real_escape_string($this->db->link, $password);
		if($email == "" || $password==""){
			$msg="<span class='alert alert-danger d-block'>Flied Must Not be empty</span>";
				return $msg;
		}else{ 
			$query  ="SELECT * FROM tbl_customer where email='$email' and password='$password'";
			$result = $this->db->select($query);
			if ($result != false) {
				$value=$result->fetch_assoc();
				Session::set("customlogin", true);
				Session::set("cmrId", $value['customerId']);
				Session::set("email", $value['email']);
				Session::set("phone", $value['phone']);
				header("Location:profile.php");
				//echo "<script>window.location = 'profile.php';</script>";
			}else{
				$msg="<span class='alert alert-danger d-block'>Email And Password NOt mach</span>";
				return $msg;
			}
		}
	}

	public function getcustumarinformatio($cusid){
		$query = "SELECT * FROM tbl_customer where customerId = '$cusid'";
		$result = $this->db->select($query);
		return $result ;
	}



	public function cunstomerupdate($data,$cusid){
		$name     = $this->fm->validation($data['name']);
		$city     = $this->fm->validation($data['city']);
		$zip      = $this->fm->validation($data['zip']);
		$email    = $this->fm->validation($data['email']);
		$address  = $this->fm->validation($data['address']);
		$country  = $this->fm->validation($data['country']);
		$phone    = $this->fm->validation($data['phone']);
		
		
		$name     = mysqli_real_escape_string($this->db->link, $name);
		$city     = mysqli_real_escape_string($this->db->link, $city);
		$zip      = mysqli_real_escape_string($this->db->link, $zip);
		$email    = mysqli_real_escape_string($this->db->link, $email);
		$address  = mysqli_real_escape_string($this->db->link, $address);
		$country  = mysqli_real_escape_string($this->db->link, $country);
		$phone    = mysqli_real_escape_string($this->db->link, $phone);
		
		
		
		
		if ($name == "" || $city == "" || $zip == "" || $email == "" || $address == "" || $country == "" || $phone == ""){
			$msg="<span class='alert alert-danger d-block'>Flied Must Not Be Empty</span>";
			return $msg;
		}elseif(strlen($name) <= 3){
			$msg="<span class='alert alert-danger d-block'>Name Must be 4 character</span>";
			return $msg;
		}else{
			
			$query ="UPDATE tbl_customer 
				SET 
				name    = '$name',
				city    = '$city',
				zip     = '$zip',
				email   = '$email',
				address = '$address',
				country = '$country',
				phone   = '$phone'
				where customerId = '$cusid'";

		$result = $this->db->update($query);
		if ($result) {
			$msg="<span class='alert alert-success d-block'>Information update  Successfuly</span>";
				return $msg;
		}else{
			$msg="<span class='alert alert-danger d-block'>Information update not Successfuly</span>";
				return $msg;
		}
		}
	}

	public function viewcustomar($cmrid){
		$query = "SELECT * from tbl_customer where customerId='$cmrid'";
		$result=$this->db->select($query);
		return $result;
	}


}
?>