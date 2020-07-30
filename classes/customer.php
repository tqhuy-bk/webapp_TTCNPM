<?php 
   $filepath= realpath(dirname(__FILE__));
   include_once ($filepath.'/../lib/database.php');
   include_once ($filepath.'/../helpers/format.php');
 ?>
 <?php 
    class customer
    {
    	private $db;
    	private $fm;
    	public function __construct()
    	{
    		$this->db = new Database();
    		$this->fm = new Format();
    	}
        public function create_customer($data){
            $customerName = mysqli_real_escape_string($this->db->link, $data['customerName']);
            $customerEmail = mysqli_real_escape_string($this->db->link, $data['customerEmail']);
            $customerPhone = mysqli_real_escape_string($this->db->link, $data['customerPhone']);
            $password = mysqli_real_escape_string($this->db->link, md5($data['password']));
            if(empty($customerName) || empty($customerEmail) || empty($customerPhone) || empty($password)){
                $alert= "<span class='error' style='color:red;font-size:23px;' > Must be not empty</span>";
                return $alert;
            }
            else{
                $query ="INSERT INTO tbl_customer(customerName,customerEmail,customerPhone,password) VALUES('$customerName','$customerEmail','$customerPhone','$password')"; 
                $result = $this->db->insert($query);
                if($result){
                    $alert="<span class ='success' style='color:green;font-size:23px;'>Create account completion</span>";
                    return $alert;
                }
                else{
                    $alert="<span style='color:red;font-size:23px;' class ='error'> Create account not completion</span>";
                    return $alert;
                }
            }
        }
        public function signin_customer($data){
            $customerName = mysqli_real_escape_string($this->db->link, $data['customerName']);
            $password = mysqli_real_escape_string($this->db->link, md5($data['password']));
            if(empty($customerName) || empty($password)){
                $alert= "<span  style='color:red;font-size:23px;' > Must be not empty</span>";
                return $alert;
            }
            else{
                 $query = "SELECT * FROM tbl_customer WHERE customerName='$customerName' AND password='$password' LIMIT 1 ";
                 $result=$this->db->select($query);
                 if($result==true){
                      $value= $result->fetch_assoc();
                      Session::set('customer_login',true); 
                      Session::set('customer_id',$value['customerID']);
                      Session::set('customer_name',$value['customerName']);
                      header('Location:index.php');
                 }else{
                     $alert= "<span style='color:red;font-size:23px;' > Name and password not match</span>";
                     return $alert;
                 }
            }
        }
        public function get_info(){
            $customerid=Session::get('customer_id');
            $query = "SELECT * FROM tbl_customer WHERE customerID = $customerid";
            $result = $this->db->select($query);
            return $result;
        }
        public function get_info_customer_admin($id){
            $query = "SELECT * FROM tbl_customer WHERE customerID = '$id' ";
            $result = $this->db->select($query);
            return $result;
        }
        public function update_info_customer($data,$id){
            $customerName = mysqli_real_escape_string($this->db->link, $data['customerName']);
            $customerEmail = mysqli_real_escape_string($this->db->link, $data['customerEmail']);
            $customerPhone = mysqli_real_escape_string($this->db->link, $data['customerPhone']);            
            if(empty($customerName) || empty($customerEmail) || empty($customerPhone)){
                $alert= "<span style='color:red;font-size:16px;'> Must be not empty</span>";
                return $alert;
            }
            else{                 
                    $query ="UPDATE tbl_customer  SET customerName ='$customerName',customerEmail='$customerEmail',customerPhone='$customerPhone' WHERE customerID = '$id' ";
                    $result = $this->db->update($query);
                    if($result){
                         $alert="<span style='color:green;font-size:16px;margin:2% 20%;'>Cập nhật thành công</span>";
                         return $alert;
                    }
                    else{
                         $alert="<span style='color:red;font-size:16px;margin:2% 35%;'>Cập nhật không thành công</span>";
                         return $alert;
                    }
            }
        }
         public function update_password_customer($data,$id){
            $passwordOld = mysqli_real_escape_string($this->db->link, md5($data['passwordOld']));
            $passwordNew = mysqli_real_escape_string($this->db->link, md5($data['passwordNew']));           
            if(empty($passwordOld) || empty($passwordNew)){
                $alert= "<span style='color:red;font-size:16px;margin-left: 21%;'> Bạn chưa điền đầy đủ thông tin!</span>";
                return $alert;
            }
            else{ 
                    $query_check = "SELECT * FROM tbl_customer WHERE customerID = '$id' ";
                    $result_check = $this->db->select($query_check);
                    $result_check_final =$result_check->fetch_assoc();
                    if($result_check_final['password'] == $passwordOld){
                        $query ="UPDATE tbl_customer  SET password='$passwordNew' WHERE customerID = '$id' ";
                        $result = $this->db->update($query);
                        if($result){
                              $alert= "<span style='color:green;font-size:16px;margin-left: 21%;'>Thay đổi mật khẩu thành công!</span>";
                              return $alert;
                        }
                        else{
                              $alert= "<span style='color:red;font-size:16px;margin-left: 21%;'> Thay đổi mật khẩu không thành công!</span>";
                              return $alert;
                        }

                    }
                    else{
                        $alert= "<span style='color:red;font-size:16px;margin-left: 21%;'>Thay đổi mật khẩu không thành công!</span>";
                        return $alert;
                    }
            }
        }
        public function withdraw($amount,$id){      
             $query ="SELECT * FROM tbl_customer WHERE customerID = '$id' ";
             $result = $this->db->select($query);
             if($result){
                $x=$result->fetch_assoc();
                $balance=$x['balance'];
             }
             $new=$balance+$amount;
             $query ="UPDATE tbl_customer SET balance=$new WHERE customerID = '$id' ";
             $result = $this->db->update($query);
             return ;
        }
        public function compare($amount,$id){      
            $query ="SELECT * FROM tbl_customer WHERE customerID = '$id' ";
            $result = $this->db->select($query);
            if($result){
                    $x=$result->fetch_assoc();
                    $balance=$x['balance'];
            }
            if($balance<$amount)
              return false;
            else return true;
        }
        public function pay($amount,$id){      
            $query ="SELECT * FROM tbl_customer WHERE customerID = '$id' ";
            $result = $this->db->select($query);
            if($result){
                    $x=$result->fetch_assoc();
                    $balance=$x['balance'];
            }
            $new=$balance-$amount;
            $query ="UPDATE tbl_customer SET balance=$new WHERE customerID = '$id' ";
            $result = $this->db->update($query);
            Session::set('customer_order',true); 
            header('Location:success.php');
        }
    }
 ?>