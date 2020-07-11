
<?php 
   $filepath= realpath(dirname(__FILE__));
   include_once ($filepath.'/../lib/database.php');
   include_once ($filepath.'/../helpers/format.php');

 ?>
 <?php 
    /**
     * 
     */
    class cart
    {
    	private $db;
    	private $fm;

    	public function __construct()
    	{
    		$this->db = new Database();
    		$this->fm = new Format();
    	}
        public function add_product_cart($quantity,$id){
           $quantity= $this->fm->validation($quantity);
           $quantity = mysqli_real_escape_string($this->db->link, $quantity);
           $id = mysqli_real_escape_string($this->db->link, $id);
           $sessionID= session_id();
        
           //láº¥y dá»¯ liá»‡u trong báº£ng product
            $query_product = "SELECT * FROM tbl_product WHERE productID='$id'";
            $result=$this->db->select($query_product)->fetch_assoc();

            $query_check_product = "SELECT * FROM tbl_cart WHERE sessionID='$sessionID' AND productID='$id'";
            $result_check=$this->db->select($query_check_product);
            if($result_check){
                $alert=" <span style='color:red;font-size:25px;'>Product already add to cart</span>";
                return $alert;
            }
            else{  
                $productName= $result['productName'];
                $price= $result['price'];
                $image= $result['image'];
                //thÃªm dá»¯ liá»‡u vÃ o báº£ng cart
                $query_cart ="INSERT INTO tbl_cart(productID,sessionID,productName,quantity,price,image) VALUES('$id','$sessionID','$productName','$quantity','$price','$image')"; 
                $result_cart = $this->db->insert($query_cart);
                    if($result_cart){
                         $alert="<span style='color:green;font-size:25px;'> Add product to cart completion</span>";
                        return $alert;
                    }
                    else{
                         $alert="<span style='color:red;font-size:25px;'> Add product to cart not completion</span>";
                         return $alert;
                    }   
            }
           
            
        }
        public function show_cart(){
            $sessionID=session_id();
            $query = "SELECT * FROM tbl_cart WHERE sessionID ='$sessionID' order by cartID desc";
            //láº¥y cÃ¡c pháº§n tá»­ trong báº£ng rá»“i sáº¯p xáº¿p theo ID
            $result = $this->db->select($query);
            return $result;
        }
        public function update_quantity($quantity,$cartID){
           $quantity = mysqli_real_escape_string($this->db->link, $quantity);
           $id = mysqli_real_escape_string($this->db->link, $cartID);
           $query ="UPDATE tbl_cart SET quantity ='$quantity' WHERE cartID = '$cartID'";
           $result = $this->db->update($query);
                if($result){
                   header('Location:cart.php');
                }
                else{
                    $alert="<span style='color:red;font-size:25px;'> Update quantity not completion</span>";
                    return $alert;
                } 
        }
        public function delete_product_from_cart($productID){
            $query = "DELETE FROM tbl_cart WHERE productID='$productID' ";
            $result = $this->db->delete($query);
            if($result){
                header('Location:cart.php');
            }
            else{
                $alert= "<span style='color:red;font-size:25px;'> Dalete not completion</span>";
                return $alert;
            }
        }
        public function empty_cart(){
            $sessionID=session_id();
            $query = "SELECT * FROM tbl_cart WHERE sessionID ='$sessionID' ";
            $result = $this->db->select($query);
            return $result;
        }

        public function delete_cart(){
            $sessionID = session_id();
            $query ="DELETE FROM tbl_cart WHERE sessionID='$sessionID' ";   
            $result = $this->db->delete($query);
            return;
        }

    }
 ?>
