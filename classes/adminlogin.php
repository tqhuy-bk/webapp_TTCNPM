<?php
   $filepath = realpath(dirname(__FILE__));
   include_once ($filepath.'/../lib/session.php');
   include_once ($filepath.'/../lib/database.php');
   include_once ($filepath.'/../helpers/format.php');
   Session::checkLogin();
 ?>

 <?php 
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
            	$alert= " must be not empty";
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
            		Session::set('vendorid',$value['vendorid']);
                    Session::set('role',$value['role']);           
                    Session::set('pass',$value['adminPass']);
                    Session::set('level',$value['level']);      
            		header("Location:index.php");

            	}
            	else{
            		$alert=" not Completion";
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
        public function update_info_admin($data,$id){
            $adminName = mysqli_real_escape_string($this->db->link, $data['adminName']);
            $adminEmail = mysqli_real_escape_string($this->db->link, $data['adminEmail']);
            $adminUser = mysqli_real_escape_string($this->db->link, $data['adminUser']); 
            $role = mysqli_real_escape_string($this->db->link, $data['role']);          
            if(empty($adminName) || empty($adminEmail) || empty($adminPhone)){
                $alert= "<span style='color:red;font-size:16px;'> Must be not empty</span>";
                return $alert;
            }
            else{                 
                    $query ="UPDATE tbl_admin  SET adminName ='$adminName',adminEmail='$adminEmail',adminUser='$adminUser' WHERE adminID = '$id' ";
                    $result = $this->db->update($query);
                    if($result){
                         $alert="<span style='color:green;font-size:16px;margin:2% 20%;'> Update completion</span>";
                         return $alert;
                    }
                    else{
                         $alert="<span style='color:red;font-size:16px;margin:2% 35%;'> Update not completion</span>";
                         return $alert;
                    }
            }
        }
         public function update_pass_admin($data,$id,$old){
            $adminOldpass = mysqli_real_escape_string($this->db->link, $data['oldpass']);
            $adminNewpass = mysqli_real_escape_string($this->db->link, $data['newpass']);
            if(empty($adminOldpass) || empty($adminNewpass) ){
                $alert= "<span style='color:red;font-size:16px;'> Không được để trống</span>";
                return $alert;
            }
            /*if(md5($adminOldpass)!=$old){
                $alert= "<span style='color:red;font-size:16px;'> Mật khẩu cũ không chính xác</span>";
                return $alert;
            }*/
            else {                 
                    $query ="UPDATE tbl_admin  SET adminPass =md5('$adminNewpass') WHERE adminID = '$id' ";
                    $result = $this->db->update($query);
                    if($result){
                         $alert="<span style='color:green;font-size:16px;margin:2% 20%;'> Update completion</span>";
                         return $alert;
                    }
                    else{
                         $alert="<span style='color:red;font-size:16px;margin:2% 35%;'> Update not completion</span>";
                         return $alert;
                    }
            }
        }
        
    }
 ?>