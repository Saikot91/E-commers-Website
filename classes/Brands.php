<?php
  $filepath= realpath(dirname(__FILE__));
   include_once($filepath.'/../lib/Database.php'); 
   include_once($filepath.'/../helper/Format.php'); 
	
?>

<?php
class Brands
{
	
	public $db;
	public $fm;
	
	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}
	public function topbrands($brandName){
		$brandName = $this->fm->validation($brandName);
		$brandName = mysqli_real_escape_string($this->db->link, $brandName);

		if (empty($brandName)) {
			$msg="<span class='error'>Flied Must Not Be Empty</span>";
			return $msg;
		}elseif (strlen($brandName)>50) {
			$msg="<span class='error'>Brands Size Must Be Less Than 50 character</span>";
			return $msg;
		}else{
			$query="INSERT INTO tbl_brands(brandName) values('$brandName')";
			$result=$this->db->insert($query);
			if ($result) {
				$msg="<span class='success'>Brands Insert Success fully</span>";
			return $msg;
			}
		}
	}


	public function brandlist(){
		$query="SELECT * FROM tbl_brands order by brandId desc";
		$result=$this->db->select($query);
			return $result;
	}

	public function getBrandName($brandId){
		$query="SELECT * FROM tbl_brands WHERE brandId='$brandId'";
		$result=$this->db->select($query);
			return $result;
	}

	public function eidtbrand($brandName, $brandId){
	
			if (empty($brandName)) {
			$msg="<span class='error'>Flied Must Not Be Empty</span>";
			return $msg;
		}elseif (strlen($brandName)>50) {
			$msg="<span class='error'>Brands Size Must Be Less Than 50 character</span>";
			return $msg;
		}else{
			$query="UPDATE tbl_brands 
				SET
				brandName='$brandName'
				WHERE brandId='$brandId'";
				$result=$this->db->update($query);
				if ($result) {
					$msg="<span class='success'>Brands Update Successfuly</span>";
					return $msg;
				}
		}

	}

	public function deletebrand($delBrandId){
		$query="DELETE FROM tbl_brands WHERE brandId='$delBrandId'";
		$result=$this->db->delete($query);
			if ($result) {
				$msg="<span class='success'>Brands Delete Successfuly</span>";
					return $msg;
			}else{
				$msg="<span class='error'>Brands not Deleted </span>";
					return $msg;
			}
	}
}
?>