
<?php 
   $filepath= realpath(dirname(__FILE__));
   include_once ($filepath.'/../lib/database.php');
   include_once ($filepath.'/../helpers/format.php');

 ?>

 <?php 
    /**
     * 
     */
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
                $alert= "<span class='error' > Fiels must be not empty</span>";
                return $alert;
            }
            else{
                $query ="INSERT INTO tbl_customer(customerName,customerEmail,customerPhone,password) VALUES('$customerName','$customerEmail','$customerPhone','$password')"; 
                $result = $this->db->insert($query);
                if($result){
                    $alert="<span class ='success'>Create account completion</span>";
                    return $alert;
                }
                else{
                    $alert="<span color='red' class ='error'> Create account not completion</span>";
                    return $alert;
                }
            }
        }
        public function signin_customer($data){
            $customerName = mysqli_real_escape_string($this->db->link, $data['customerName']);
            $password = mysqli_real_escape_string($this->db->link, md5($data['password']));

            if(empty($customerName) || empty($password)){
                $alert= "<span class='error' > Fiels must be not empty</span>";
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
                     $alert= "<span class='error' > Name and password not match</span>";
                     return $alert;
                 }
            }
        }

    }
 ?>
