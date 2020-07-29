<?php 
   $filepath= realpath(dirname(__FILE__));
   include_once ($filepath.'/../lib/database.php');
   include_once ($filepath.'/../helpers/format.php');

 ?>
 <?php 
    class order
    {
    	private $db;
    	private $fm;

    	public function __construct()
    	{
    		$this->db = new Database();
    		$this->fm = new Format();
    	}
      public function add_order($customer_id){//thanh toan bang tai khoan ung dung
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
                $query_order ="INSERT INTO tbl_order(productID,productName,customerID,quantity,price,image,state,paystatus) VALUES('$productID','$productName','$customerID','$quantity','$price','$image','Đang xử lí','Đã thanh toán')"; 
                $result_order = $this->db->insert($query_order);
            }
          }   
        }
         public function add_order_unpaid($customer_id){//thanh toan bang tai quầy
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
                $query_order ="INSERT INTO tbl_order(productID,productName,customerID,quantity,price,image,state,paystatus) VALUES('$productID','$productName','$customerID','$quantity','$price','$image','Đang xử lí','Chưa thanh toán')"; 
                $result_order = $this->db->insert($query_order);
            }
          }   
        }
        public function show_order_details($date_order){//dua vao date ngay order 
            $customerID = Session::get('customer_id');
            $query = "SELECT * FROM tbl_order WHERE customerID = '$customerID' AND date_order= '$date_order' order by orderID desc";
            $result = $this->db->select($query);
            return $result;
        }
         public function show_order_details_admin($date_order){//dua vao date ngay order 
            $query = "SELECT * FROM tbl_order WHERE date_order= '$date_order' order by orderID desc";
            $result = $this->db->select($query);
            return $result;
        }

        public function order_list(){//danh sach order
            $customerID = Session::get('customer_id');
            $query_del ="DELETE FROM tbl_orderlist  WHERE customerID = '$customerID' ";   
            $result_del = $this->db->delete($query_del); 


           
            $query_first = "SELECT * FROM tbl_order WHERE customerID = '$customerID' LIMIT 1";
            $get_first = $this->db->select($query_first);
            if($get_first){$result_first = $get_first->fetch_assoc(); //lay sp order dau tien 
            $temp = $result_first['date_order'];
            $customerID =  $result_first['customerID'];
            $productName =   $result_first['productName'];
            $total_price =  $result_first['quantity']* $result_first['price'];
            $state = $result_first['state'];
            $paystatus = $result_first['paystatus'];
            $qu ="INSERT INTO tbl_orderlist(date_order,customerID,description,price,state,paystatus) VALUES('$temp','$customerID','$productName','$total_price','$state','$paystatus')"; 
            $re = $this->db->insert($qu);
            //lấy các sp trong mỗi lần mua hàng
            $query_all = "SELECT * FROM tbl_order where customerID='$customerID' ";
            $get_order_all = $this->db->select($query_all);
            if($get_order_all){
               while($result_all=$get_order_all->fetch_assoc()){
                  if($result_all['date_order'] != $temp){
                    $date = $result_all['date_order'];
                    $customerID = $result_all['customerID'];
                    $productName =  $result_all['productName'];
                    $total_price = $result_all['quantity']*$result_all['price'];
                    $state = 'processing';
                    $query ="INSERT INTO tbl_orderlist(date_order,customerID,description,price,state,paystatus) VALUES('$date','$customerID','$productName','$total_price','$state','$paystatus')"; 
                    $result = $this->db->insert($query);
                    $temp = $result_all['date_order'];}
                  }
               }
            }
        }
        public function show_order_list(){
            $customerID = Session::get('customer_id');
            $query = "SELECT * FROM tbl_orderlist WHERE customerID = '$customerID' order by orderlistID desc";
            $result = $this->db->select($query);
            return $result;
        }
        public function show_order_list_admin(){
            $query = "SELECT * FROM tbl_orderlist order by orderlistID desc";
            $result = $this->db->select($query);
            return $result;
        }
    }
 ?>
