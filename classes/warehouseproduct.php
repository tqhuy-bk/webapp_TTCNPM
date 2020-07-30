<?php 
   $filepath= realpath(dirname(__FILE__));
   include_once ($filepath.'/../lib/database.php');
   include_once ($filepath.'/../helpers/format.php');

 ?>

 <?php 
    /**
     * 
     */
    class warehouseproduct
    {
        private $db;
        private $fm;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }
        public function insert_product($data,$files)
        {
           
            $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
            $amount = mysqli_real_escape_string($this->db->link, $data['amount']);
            $vendor = Session::get('vendorid');
            
            if($productName=="" || $amount==""){
                $alert= "<span class='error' > fiels must be not empty</span>";
                return $alert;
            }
            else{
                //move_uploaded_file($_FILES['image']['tmp_name'], "uploads/$file_name");
                $query ="INSERT INTO tbl_warehouseproduct(productName,amount,vendor) VALUES('$productName','$amount','$vendor')"; 
                $result = $this->db->insert($query);
                if($result){
                    $alert="<span class ='success'> Insert product completion</span>";
                    return $alert;
                }
                else{
                    $alert="<span class ='error'> Insert product not completion</span>";
                    return $alert;
                }
            }
        }
        public function show_product($vendor){
            $query = "
            SELECT p.*
            FROM tbl_warehouseproduct as p WHERE vendor='$vendor'
             order by p.productID desc";
            //lấy các phần tử trong bảng rồi sắp xếp theo ID
            $result = $this->db->select($query);
            return $result;
        }
        public function getProductById($id){//dùng cho khi edit hoặc delete 
            $query = "SELECT * FROM tbl_warehouseproduct WHERE productID='$id' ";
            //chọn phần tử trong bảng với đk catID= id 
            $result = $this->db->select($query);
            return $result;
        }
        public function update_product($data, $id){
           $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
            $amount = mysqli_real_escape_string($this->db->link, $data['amount']);
            

            if(empty($productName) || empty($amount)){
                $alert= "<span class='error'> Fiels must be not empty</span>";
                return $alert;
            }
            else{ 
                     $query ="UPDATE tbl_warehouseproduct  SET productName ='$productName',amount='$amount' WHERE productID = '$id'";
                 $result = $this->db->update($query);
                    if($result){
                        $alert="<span class ='success'> Update prouct completion</span>";
                         return $alert;
                    }
                    else{
                         $alert="<span class ='error'> Update product not completion</span>";
                          return $alert;
                    }
            }
        }
       
        public function delete_product($id){
            $query = "DELETE FROM tbl_warehouseproduct WHERE productID='$id' ";
            //chọn phần tử trong bảng với đk productID= id 
            $result = $this->db->delete($query);
            if($result){
                $alert= "<span class='success' > Delete completion</span>";
                return $alert;
            }
            else{
                $alert= "<span class='error' > Dalete not completion</span>";
                return $alert;
            }
        }
    }
 ?>