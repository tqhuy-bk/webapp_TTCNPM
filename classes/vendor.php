
<?php 
   $filepath= realpath(dirname(__FILE__)); 
   include_once ($filepath.'/../lib/database.php');
   include_once ($filepath.'/../helpers/format.php');

 ?>

 <?php 
    /**
     * 
     */
    class vendor
    {
    	private $db;
    	private $fm;

    	public function __construct()
    	{
    		$this->db = new Database();
    		$this->fm = new Format();
    	}
    	public function insert_vendor($vendorName)
    	{
            $vendorName = $this->fm->validation($vendorName);//kiểm tra định dạng của dữ liệu nhập vào
           
            $vendorName = mysqli_real_escape_string($this->db->link, $vendorName);
            //lấy vendorName gán vào link trong class database

            if(empty($vendorName)){
            	$alert= "<span class='error' >Xin điền đầy đủ thông tin</span>";
            	return $alert;
            }
            else{
            	$query ="INSERT INTO tbl_vendor(vendorName) VALUES('$vendorName')"; 
            	$result = $this->db->insert($query);
                if($result){
                    $alert="<span class ='success'>Thêm nhà cung cấp mới thành công</span>";
                    return $alert;
                }
                else{
                    $alert="<span class ='error'>Thêm nhà cung cấp mới thất bại</span>";
                    return $alert;
                }
            }
    	}
        public function show_vendor(){
            $query = "SELECT * FROM tbl_vendor order by vendorID desc";
            //lấy các phần tử trong bảng rồi sắp xếp theo catID
            $result = $this->db->select($query);
            return $result;
        }
        public function get_vendor_by_ID($id){ //dùng cho khi edit hoặc delete 
            $query = "SELECT * FROM tbl_vendor WHERE vendorID='$id' ";
            //chọn phần tử trong bảng với đk catID= id 
            $result = $this->db->select($query);
            return $result;
        }
        public function update_vendor($vendorName, $id){
            $vendorName = $this->fm->validation($vendorName);//kiểm tra định dạng của dữ liệu nhập vào
           
            $vendorName = mysqli_real_escape_string($this->db->link, $vendorName);
            //lấy catName gán vào link trong class database
            $id = mysqli_real_escape_string($this->db->link, $id);

            if(empty($vendorName)){
                $alert= "<span class='error' >Xin điền đầy đủ thông tin</span>";
                return $alert;
            }
            else{
                $query ="UPDATE tbl_vendor  SET vendorName ='$vendorName' WHERE vendorID = '$id'"; 
                $result = $this->db->update($query);
                if($result){
                    $alert="<span class ='success'>Cập nhật thành công</span>";
                    return $alert;
                }
                else{
                    $alert="<span class ='error'>Cập nhật thất bại</span>";
                    return $alert;
                }
            }
        }
        public function del_vendor($id){
            $query = "DELETE FROM tbl_vendor WHERE vendorID='$id' ";
            //chọn phần tử trong bảng với đk vendorID= id 
            $result = $this->db->delete($query);
            if($result){
                $alert= "<span class='success' >Xóa thành công</span>";
                return $alert;
            }
            else{
                $alert= "<span class='error' >Xóa không thành công</span>";
                return $alert;
            }
        }
    }
 ?>