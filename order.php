
<?php 
   $filepath= realpath(dirname(__FILE__));
   include_once ($filepath.'/../lib/database.php');
   include_once ($filepath.'/../helpers/format.php');

 ?>
 <?php 
    /**
     * 
     */
    class order
    {
    	private $db;
    	private $fm;

    	public function __construct()
    	{
    		$this->db = new Database();
    		$this->fm = new Format();
    	}
        public function add_order($customer_id){
          $sessionID= session_id();
          $query= "SELECT * FROM tbl_cart WHERE sessionID= '$sessionID' ";
          $get_prodcut = $this->db->select($query);
          if( $get_prodcut){
            while($result = $get_prodcut->fetch_assoc()){
                $productID=$result['productID'];
                $productName=$result['productName'];
                $customerID=$customer_id;
                $quantity = $result['quantity'];
                $price  = $result['price']* $quantity;
                $image  = $result['image'];
                $query_order ="INSERT INTO tbl_order(productID,productName,customerID,quantity,price,image) VALUES('$productID','$productName','$customerID','$quantity','$price','$image')"; 
                $result_order = $this->db->insert($query_order);
            }
          }   
        }
        public function show_order(){
            $customerID = Session::get('customer_id');
            $query = "SELECT * FROM tbl_order WHERE customerID = '$customerID' order by orderID desc";
            //lấy các phần tử trong bảng rồi sắp xếp theo ID
            $result = $this->db->select($query);
            return $result;
        }
        
    }
 ?>