
<?php
  $filepath= realpath(dirname(__FILE__));
   include($filepath.'/../lib/Session.php'); 
  	Session::checkLogin();
	
?>
<?php
  $filepath= realpath(dirname(__FILE__));
   include($filepath.'/../lib/Database.php'); 
   include($filepath.'/../helper/Format.php'); 
	
?>

<?php
class AdminLogin
{
	public $db;
	public $fm;
	
	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function adminLogin($adminUser, $adminPass){
		$adminUser = $this->fm->validation($adminUser);
		$adminPass = $this->fm->validation(md5($adminPass));

		$adminUser = mysqli_real_escape_string($this->db->link, $adminUser);
		$adminPass = mysqli_real_escape_string($this->db->link, $adminPass);
		if(empty($adminUser) or empty($adminPass)){
			$msg="Filed Must Not Be Empty";
			return $msg;
		}else{ 
			$query="SELECT * FROM tbl_admin where adminUser='$adminUser' and adminPass='$adminPass'";
			$result = $this->db->select($query);
			if($result != false){
				//$value = mysqli_fetch_array($result);
				//$value = mysqli_fetch_assoc($result);
				$value = $result->fetch_assoc();
				//if($value > 0){ 
					Session::set("adminLogin", true);
					Session::set("adminId", $value['adminId']);
					Session::set("adminName", $value['adminName']);
					Session::set("adminEmail", $value['adminEmail']);
					header("Location:dashbord.php");
				//}else{
					// $msg="Result Not found";
					// return $msg;
				//}
			}else{
				$msg="UserName And PassWord Not mach";
				return $msg;
			}
		}
	}

}
?>