
<?php 
   $filepath= realpath(dirname(__FILE__));
   include_once ($filepath.'/../lib/database.php');
   include_once ($filepath.'/../helpers/format.php');

 ?>

 <?php 
    /**
     * 
     */
    class product
    {
    	private $db;
    	private $fm;

    	public function __construct()
    	{
    		$this->db = new Database();
    		$this->fm = new Format();
    	}
    	public function insert_product($data,$files)
    	{
           
            $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
            $category = mysqli_real_escape_string($this->db->link, $data['category']);
            $vendor = mysqli_real_escape_string($this->db->link, $data['vendor']);
            $description = mysqli_real_escape_string($this->db->link, $data['description']);
            $price = mysqli_real_escape_string($this->db->link, $data['price']);
            $type = mysqli_real_escape_string($this->db->link, $data['type']);


            //kiem tra va cho vao foad
            // $permited = array('jpg','jpeg','png','gif');
            $file_name = $_FILES['image']['name'];
            // $file_size = $_FILES['image']['size'];
            // $file_temp = $_FILES['image']['tmp_name'];
            
            $div =explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0,10).'.'.$file_ext;
            // $uploaded_image = "D/xampp/htdocs/shop/admin/uploads".$unique_image;
            

            if($productName=="" || $category=="" || $vendor=="" || $description=="" || $price=="" || $file_name=="" || $type==""){
            	$alert= "<span class='error' > fiels must be not empty</span>";
            	return $alert;
            }
            else{
                move_uploaded_file($_FILES['image']['tmp_name'], "uploads/$file_name");
            	$query ="INSERT INTO tbl_product(productName,categoryID,vendorID,description,price,type,image) VALUES('$productName','$category','$vendor','$description','$price','$type','$file_name')"; 
            	$result = $this->db->insert($query);
                if($result){
                    $alert="<span class ='success'> Insert product completion</span>";
                    return $alert;
                }
                else{
                    $alert="<span class ='error'> Insert product not completion</span>";
                    return $alert;
                }
            }
    	}
        public function show_product(){
            $query = "
            SELECT p.*,c.catName
            FROM tbl_product as p,tbl_categori as c WHERE p.categoryID = c.catID
             order by p.productID desc";
            //lấy các phần tử trong bảng rồi sắp xếp theo ID
            $result = $this->db->select($query);
            return $result;
        }
        public function getProductById($id){//dùng cho khi edit hoặc delete 
            $query = "SELECT * FROM tbl_product WHERE productID='$id' ";
            //chọn phần tử trong bảng với đk catID= id 
            $result = $this->db->select($query);
            return $result;
        }
        public function update_product($data,$files, $id){
           $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
            $category = mysqli_real_escape_string($this->db->link, $data['category']);
            $vendor = mysqli_real_escape_string($this->db->link, $data['vendor']);
            $description = mysqli_real_escape_string($this->db->link, $data['description']);
            $price = mysqli_real_escape_string($this->db->link, $data['price']);
            $type = mysqli_real_escape_string($this->db->link, $data['type']);
            

            //kiem tra va cho vao foad
            // $permited = array('jpg','jpeg','png','gif');
            $file_name = $_FILES['image']['name'];
            // $file_size = $_FILES['image']['size'];
            // $file_temp = $_FILES['image']['tmp_name'];
            
            $div =explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0,10).'.'.$file_ext;
            // $uploaded_image = "D/xampp/htdocs/shop/admin/uploads".$unique_image;
            

            if(empty($productName) || empty($category) || empty($vendor) || empty($description) || empty($price)){
                $alert= "<span class='error'> Fiels must be not empty</span>";
                return $alert;
            }
            else{ 
                if(!empty($file_name)){//chon anh
                    move_uploaded_file($_FILES['image']['tmp_name'], "uploads/$file_name");
                     $query ="UPDATE tbl_product  SET productName ='$productName',categoryID='$category',vendorID='vendor',description='$description',price='$price',type='$type',image='$file_name' WHERE productID = '$id'";
                }
                else{//khong chon anh
                    $query ="UPDATE tbl_product  SET productName ='$productName',categoryID='$category',vendorID='vendor',description='$description',price='$price',type='$type' WHERE productID = '$id'";
                }
                 $result = $this->db->update($query);
                    if($result){
                        $alert="<span class ='success'> Update prouct completion</span>";
                         return $alert;
                    }
                    else{
                         $alert="<span class ='error'> Update product not completion</span>";
                          return $alert;
                    }
            }
        }
       
        public function delete_product($id){
            $query = "DELETE FROM tbl_product WHERE productID='$id' ";
            //chọn phần tử trong bảng với đk productID= id 
            $result = $this->db->delete($query);
            if($result){
                $alert= "<span class='success' > Delete completion</span>";
                return $alert;
            }
            else{
                $alert= "<span class='error' > Dalete not completion</span>";
                return $alert;
            }
        }
        ///////////////
        public function get_combo(){
            $query = "SELECT * FROM tbl_product WHERE type='combo'";
            //chọn phần tử trong bảng với đk catID= id 
            $result = $this->db->select($query);
            return $result;
        }
        public function get_details($id){
            $query = "
            SELECT p.*,c.catName
            FROM tbl_product as p,tbl_categori as c WHERE p.categoryID = c.catID AND
             p.productID='$id'";
            //lấy các phần tử trong bảng rồi sắp xếp theo ID
            $result = $this->db->select($query);
            return $result;
        }
       public function search($search){
            // Dùng câu lênh like trong sql và sứ dụng toán tử % của php để tìm kiếm dữ liệu chính xác hơn.
            $query = "SELECT * FROM tbl_product WHERE productName LIKE '%$search%'";
            // Thực thi câu truy vấn
            $result = $this->db->select($query);
            // Nếu có kết quả thì hiển thị, ngược lại thì thông báo không tìm thấy kết quả
            if ($search != "") {
                return $result;
            } 
            else {
                echo "Khong tim thay ket qua!";
            }
        }
    }
 ?>
