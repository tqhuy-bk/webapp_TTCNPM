
<?php
   $filepath = realpath(dirname(__FILE__));
   include_once ($filepath.'/../lib/database.php');
   include_once ($filepath.'/../helpers/format.php');
 ?>

 <?php 
    /**
     * 
     */
    class admin
    {
    	private $db;
    	private $fm;

    	public function __construct()
    	{
    		$this->db = new Database();
    		$this->fm = new Format();
    	}
        public function get_info_admin(){
            $id=Session::get('adminID');
            $query = "SELECT * FROM tbl_admin WHERE adminID = '$id' ";
            $result = $this->db->select($query);
            return $result;
        }
        public function update_info_admin($data,$id){
            $adminName = mysqli_real_escape_string($this->db->link, $data['adminName']);
            $adminEmail = mysqli_real_escape_string($this->db->link, $data['adminEmail']);
            $adminUser = mysqli_real_escape_string($this->db->link, $data['adminUser']);           
            if(empty($adminName) || empty($adminEmail) || empty($adminUser)){
                $alert= "<span style='color:red;font-size:16px;'>Xin điền đầy đủ thông tin</span>";
                return $alert;
            }
            else{                 
                    $query ="UPDATE tbl_admin  SET adminName ='$adminName',adminEmail='$adminEmail',adminUser='$adminUser' WHERE adminID = '$id' ";
                    $result = $this->db->update($query);
                    if($result){
                         $alert="<span style='color:green;font-size:16px;margin:2% 20%;'>Cập nhật thành công</span>";
                         return $alert;
                    }
                    else{
                         $alert="<span style='color:red;font-size:16px;margin:2% 35%;'>Cập nhật thất bại</span>";
                         return $alert;
                    }
            }
        }
        
    }
 ?>