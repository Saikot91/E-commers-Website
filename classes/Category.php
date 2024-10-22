 
<?php
  $filepath= realpath(dirname(__FILE__));
   include_once($filepath.'/../lib/Database.php'); 
   include_once($filepath.'/../helper/Format.php'); 
	
?>
<?php
class Category {
	
	public $db;
	public $fm;
	
	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function category($catName){
		$catName = $this->fm->validation($catName);
		$catName = mysqli_real_escape_string($this->db->link, $catName);

		if (empty($catName)) {
			$msg="<span class='error'>Flied Must Not Be Empty</span>";
			return $msg;
		}elseif (strlen($catName)>50) {
			$msg="<span class='error'>Category Size Must Be Less Than 50 character</span>";
			return $msg;
		}else{
			$query="INSERT INTO tbl_category(catName) values('$catName')";
			$result=$this->db->insert($query);
			if ($result) {
				$msg="<span class='success'>Category Insert Success fully</span>";
			return $msg;
			}
		}
	}


	public function categorylist(){
		$query="SELECT * FROM tbl_category order by catId desc";
		$result=$this->db->select($query);
			return $result;
	}


	public function getCatName($catId){
		$query="SELECT * FROM tbl_category WHERE catId='$catId'";
		$result=$this->db->select($query);
			return $result;
	}


	public function eidtCat($catName, $catId){
	
			if (empty($catName)) {
			$msg="<span class='error'>Flied Must Not Be Empty</span>";
			return $msg;
		}elseif (strlen($catName)>50) {
			$msg="<span class='error'>Category Size Must Be Less Than 50 character</span>";
			return $msg;
		}else{
			$query="UPDATE tbl_category 
				SET
				catName='$catName'
				WHERE catId='$catId'";
				$result=$this->db->update($query);
				if ($result) {
					$msg="<span class='success'>Category Update Successfuly</span>";
					return $msg;
				}
		}

	}

	public function deletecat($delCatId){
		$query="DELETE FROM tbl_category WHERE catId='$delCatId'";
		$result=$this->db->delete($query);
			if ($result) {
				$msg="<span class='success'>Category Delete Successfuly</span>";
					return $msg;
			}else{
				$msg="<span class='error'>Category not Deleted </span>";
					return $msg;
			}
	}

	public function getcategory(){
		$query="SELECT * FROM tbl_category";
		$result=$this->db->select($query);
			return $result;
	}

	public function categoryview($viewcat){
		$query="SELECT * FROM tbl_product WHERE catId='$viewcat'";
		$result=$this->db->select($query);
			return $result;
	}
}
?>





