
<?php 
   $filepath= realpath(dirname(__FILE__)); 
   include_once ($filepath.'/../lib/database.php');
   include_once ($filepath.'/../helpers/format.php');

 ?>

 <?php 
    /**
     * 
     */
    class category
    {
    	private $db;
    	private $fm;

    	public function __construct()
    	{
    		$this->db = new Database();
    		$this->fm = new Format();
    	}
    	public function insert_category($catName)
    	{
            $catName = $this->fm->validation($catName);//kiểm tra định dạng của dữ liệu nhập vào
           
            $catName = mysqli_real_escape_string($this->db->link, $catName);
            //lấy catName gán vào link trong class database

            if(empty($catName)){
            	$alert= "<span class='error' >Xin điền đầy đủ thông tin</span>";
            	return $alert;
            }
            else{
            	$query ="INSERT INTO tbl_categori(catName) VALUES('$catName')"; 
            	$result = $this->db->insert($query);
                if($result){
                    $alert="<span class ='success'>Thêm danh mục thành công</span>";
                    return $alert;
                }
                else{
                    $alert="<span class ='error'>Thêm danh mục thất bại</span>";
                    return $alert;
                }
            }
    	}
        public function show_category(){
            $query = "SELECT * FROM tbl_categori order by catID desc";
            //lấy các phần tử trong bảng rồi sắp xếp theo catID
            $result = $this->db->select($query);
            return $result;
        }
        public function getcatbyId($id){ //dùng cho khi edit hoặc delete 
            $query = "SELECT * FROM tbl_categori WHERE catID='$id' ";
            //chọn phần tử trong bảng với đk catID= id 
            $result = $this->db->select($query);
            return $result;
        }
        public function update_category($catName, $id){
            $catName = $this->fm->validation($catName);//kiểm tra định dạng của dữ liệu nhập vào
           
            $catName = mysqli_real_escape_string($this->db->link, $catName);
            //lấy catName gán vào link trong class database
            $id = mysqli_real_escape_string($this->db->link, $id);

            if(empty($catName)){
                $alert= "<span class='error' >Xin điền đầy đủ thông tin</span>";
                return $alert;
            }
            else{
                $query ="UPDATE tbl_categori  SET catName ='$catName' WHERE catID = '$id'"; 
                $result = $this->db->update($query);
                if($result){
                    $alert="<span class ='success'>Cập nhật danh mục thành công</span>";
                    return $alert;
                }
                else{
                    $alert="<span class ='error'>Cập nhật danh mục thất bại</span>";
                    return $alert;
                }
            }
        }
        public function del_category($id){
            $query = "DELETE FROM tbl_categori WHERE catID='$id' ";
            //chọn phần tử trong bảng với đk catID= id 
            $result = $this->db->delete($query);
            if($result){
                $alert= "<span class='success' >Xóa danh mục thành công</span>";
                return $alert;
            }
            else{
                $alert= "<span class='error' >Xóa danh mục thất bại</span>";
                return $alert;
            }
        }
    }
 ?>