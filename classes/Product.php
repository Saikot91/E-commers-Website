 
<?php
  $filepath= realpath(dirname(__FILE__));
   include_once($filepath.'/../lib/Database.php'); 
   include_once($filepath.'/../helper/Format.php'); 
	
?>
<?php
/**
* class for product
*/
class Product {	

	public $fm;
	public $db;

	public function __construct()
	{
		$this->fm = new Format();
		$this->db = new Database();

	}
	public function productInsert($data, $file){
		$productName = $this->fm->validation($data['productName']);
		$catId       = $this->fm->validation($data['catId']);
		$foodId      = $this->fm->validation($data['foodId']);
		// $body        = $this->fm->validation($data['body']);
		$price       = $this->fm->validation($data['price']);
		$type        = $this->fm->validation($data['type']);
		

		$productName = mysqli_real_escape_string($this->db->link, $productName);
		$catId       = mysqli_real_escape_string($this->db->link, $catId);
		$foodId      = mysqli_real_escape_string($this->db->link, $foodId);
		$body        = mysqli_real_escape_string($this->db->link, $body);
		$price       = mysqli_real_escape_string($this->db->link, $price);
		$type        = mysqli_real_escape_string($this->db->link, $type);

		$permited  = array("jpg", "jpeg", "png", "gif");
		$file_name = $file['image']['name'];
		$file_size = $file['image']['size'];
		$file_temp = $file['image']['tmp_name'];

		$div         = explode(".", $file_name );
		$file_exe    = strtolower(end($div));
		$unique_name = substr(md5(time()), 0,10).".".$file_exe;
		$upload_file = "upload/".$unique_name;



		if ($productName == "" || $catId == "" || $foodId == "" || $body == "" || $price == "" || $type == "" || $file_name == "") {
			$msg="<span class='error'>Flied Must Not Be Empty</span>";
			return $msg;
		}elseif($file_size > 1048576){
			$msg="<span class='error'>Image must be 1 mb </span>";
			return $msg;
		}elseif(in_array($file_exe, $permited) === false){
			$msg="<span class='error'>image must be:-".implode(", ", $permited )."</span>";
			return $msg;
		}else{
			move_uploaded_file($file_temp, $upload_file);
			$query = "INSERT INTO tbl_product(productName, catId, foodId, body, price, image, type) values('$productName', '$catId', '$foodId', '$body', '$price', '$upload_file', '$type')";
			$value = $this->db->insert($query);
			if ($value) {
				$msg="<span class='success'>Product Insert Successfuly</span>";
				return $msg;
			}else{
				$msg="<span class='error'>Product Insert not Successfuly</span>";
				return $msg;
			}
		}

	}

	public function allproductget(){
		$query = "SELECT tbl_product.*, tbl_category.catName, tbl_item.foodName 
		from tbl_product 
		inner join tbl_category 
		on tbl_product.catId= tbl_category.catId
		inner join tbl_item 
		on tbl_product.foodId=tbl_item.foodId 
		order by tbl_product.productId";

		$result = $this->db->select($query);
		return $result;
	}



	public function eidproduct($eid){
		$query = "SELECT * FROM tbl_product where productId = '$eid'";
		$result = $this->db->delete($query);
		return $result ;
	}


	public function productdelete($dproduct){
		$query="SELECT * FROM tbl_product where productId='$dproduct'";
		$result = $this->db->select($query);
		if ($result) {
			while ($value = $result->fetch_assoc()) {
				$delimg = $value['image'];
				unlink($delimg);
			}
		}

		$query = "DELETE from tbl_product where productId='$dproduct'";
		$result = $this->db->delete($query);
		if ($result) {
			$msg="<span class='success'>Product delete  Successfuly</span>";
				return $msg;
		}else{
			$msg="<span class='error'>Product delete not Successfuly</span>";
				return $msg;
		}
	}


	public function productUpate($data, $file, $eid){
		$productName = $this->fm->validation($data['productName']);
		$catId       = $this->fm->validation($data['catId']);
		$foodId      = $this->fm->validation($data['foodId']);
		$body        = $this->fm->validation($data['body']);
		$price       = $this->fm->validation($data['price']);
		$type        = $this->fm->validation($data['type']);
		

		$productName = mysqli_real_escape_string($this->db->link, $productName);
		$catId       = mysqli_real_escape_string($this->db->link, $catId);
		$foodId      = mysqli_real_escape_string($this->db->link, $foodId);
		$body        = mysqli_real_escape_string($this->db->link, $body);
		$price       = mysqli_real_escape_string($this->db->link, $price);
		$type        = mysqli_real_escape_string($this->db->link, $type);

		$permited  = array("jpg", "jpeg", "png", "gif");
		$file_name = $file['image']['name'];
		$file_size = $file['image']['size'];
		$file_temp = $file['image']['tmp_name'];

		$div         = explode(".", $file_name );
		$file_exe    = strtolower(end($div));
		$unique_name = substr(md5(time()), 0,10).".".$file_exe;
		$upload_file = "upload/".$unique_name;



		if ($productName == "" || $catId == "" || $foodId == "" || $body == "" || $price == "" || $type == "") {
			$msg="<span class='error'>Flied Must Not Be Empty</span>";
			return $msg;
		}else{
			if(!empty($file_name)){ 
				if($file_size > 1048576){
				$msg="<span class='error'>Image must be 1 mb </span>";
				return $msg;
			}else{
				move_uploaded_file($file_temp, $upload_file);

				$query = "UPDATE tbl_product
				set
				productName = '$productName',
				catId       = '$catId',
				foodId     = '$foodId',
				body        = '$body',
				price       = '$price',
				image       = '$upload_file',
				type        = '$type'
				where productId ='$eid' ";


				$value = $this->db->update($query);
				if ($value) {
					$msg="<span class='success'>Product update Successfuly</span>";
					return $msg;
				}else{
					$msg="<span class='error'>Product update not Successfuly</span>";
					return $msg;
				}
			}
		}else{
				$query = "UPDATE tbl_product
				set
				productName = '$productName',
				catId       = '$catId',
				foodId     = '$foodId',
				body        = '$body',
				price       = '$price',
				type        = '$type'
				where productId ='$eid' ";


				$value = $this->db->update($query);
				if ($value) {
					$msg="<span class='success'>Product update Successfuly</span>";
					return $msg;
				}else{
					$msg="<span class='error'>Product update not Successfuly</span>";
					return $msg;
				}
			
			}
		}
	}



	public function getfproduct(){
		$query="SELECT * FROM tbl_product where type='0' order by productId desc limit 8";
		$result = $this->db->select($query);
		return $result;
	}

	public function getnproduct(){
		$query="SELECT * FROM tbl_product order by productId desc limit 8";
		$result = $this->db->select($query);
		return $result;
	}

	public function getnproductall(){
		$query="SELECT * FROM tbl_product order by productId desc";
		$result = $this->db->select($query);
		return $result;
	}

	public function getFoodProduct(){
		$query="SELECT * FROM tbl_product order by RAND()";
		$result = $this->db->select($query);
		return $result;
	}

	public function viewproduct($futecherid){
		$query = "SELECT tbl_product.*, tbl_category.catName, tbl_item.foodName 
		from tbl_product 
		inner join tbl_category 
		on tbl_product.catId= tbl_category.catId
		inner join tbl_item 
		on tbl_product.foodId=tbl_item.foodId 
		where tbl_product.productId ='$futecherid'";
		$result = $this->db->select($query);
		return $result;
	}

	public function iphone(){
		$query="SELECT * FROM tbl_product where foodId='1' order by productId desc limit 1";
		$result = $this->db->select($query);
		return $result;
	}

	public function Samsung(){
		$query="SELECT * FROM tbl_product where foodId='2' order by productId desc limit 1";
		$result = $this->db->select($query);
		return $result;
	}
	public function Samsung2(){
		$query="SELECT * FROM tbl_product where foodId='2' order by productId desc";
		$result = $this->db->select($query);
		return $result;
	}

	public function Acer(){
		$query="SELECT * FROM tbl_product where foodId='3' order by productId desc limit 1";
		$result = $this->db->select($query);
		return $result;
	}
	public function Acer2(){
		$query="SELECT * FROM tbl_product where foodId='3' order by productId desc";
		$result = $this->db->select($query);
		return $result;
	}

	public function Canon(){
		$query="SELECT * FROM tbl_product where foodId='5' order by productId desc limit 1";
		$result = $this->db->select($query);
		return $result;
	}
	public function Canon2(){
		$query="SELECT * FROM tbl_product where foodId='5' order by productId desc";
		$result = $this->db->select($query);
		return $result;
	}


	public function related(){
		$query="SELECT * FROM tbl_product order by productId desc limit 4";
		$result = $this->db->select($query);
		return $result;
	}

	public function delOrderProduct($orderDel){
		$query ="DELETE from tbl_order where id='$orderDel'";
		$result = $this->db->delete($query);
		if ($result) {
			$msg="<span class='error'>Order Delete  Successfully</span>";
			return $msg;
		}else{
			$msg="<span class='success'>Order Delete not Successfully</span>";
			return $msg;
		}
	}
}
?>