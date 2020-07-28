
<?php
   $filepath= realpath(dirname(__FILE__));
   include ($filepath.'/../lib/session.php');
   Session::checkLogin();
   include ($filepath.'/../lib/database.php');
   include ($filepath.'/../helpers/format.php');

 ?>

 <?php 
    /**
     * 
     */
    class adminlogin
    {
    	private $db;
    	private $fm;

    	public function __construct()
    	{
    		$this->db = new Database();
    		$this->fm = new Format();
    	}
    	public function login_admin($adminUser, $adminPass)
    	{
            $adminUser = $this->fm->validation($adminUser);
            $adminPass = $this->fm->validation($adminPass);

            $adminUser = mysqli_real_escape_string($this->db->link, $adminUser);
            $adminPass = mysqli_real_escape_string($this->db->link, $adminPass);

            if(empty($adminUser) || empty($adminPass)){
            	$alert= "Xin điền đầy đủ thông tin";
            	return $alert;
            }
            else{
            	$query ="SELECT * FROM tbl_admin WHERE adminUser='$adminUser' AND adminPass = '$adminPass' LIMIT 1";
            	$result = $this->db->select($query);
            	if($result != false ){
            		$value = $result->fetch_assoc();
            		Session::set('adminlogin',true);
            		Session::set('adminID', $value['adminID']);
            		Session::set('adminUser',$value['adminUser']);
            		Session::set('adminName',$value['adminName']);
            		header("Location:index.php");

            	}
            	else{
            		$alert="Chưa có tài khoản/Thông tin đã nhập không đúng";
            		return $alert;
            	}
            }
    	}
       public function get_info_admin(){
            $id=Session::get('adminID');
            $query = "SELECT * FROM tbl_admin WHERE adminID = '$id' ";
            $result = $this->db->select($query);
            return $result;
        }
        public function update_info_customer($data,$id){
            $adminName = mysqli_real_escape_string($this->db->link, $data['adminName']);
            $adminEmail = mysqli_real_escape_string($this->db->link, $data['adminEmail']);
            $adminUser = mysqli_real_escape_string($this->db->link, $data['adminUser']); 
            $role = mysqli_real_escape_string($this->db->link, $data['role']);          
            if(empty($adminName) || empty($adminEmail) || empty($adminPhone)){
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
