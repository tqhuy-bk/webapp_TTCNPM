<?php 
   $filepath= realpath(dirname(__FILE__));
   include_once ($filepath.'/../lib/database.php');
   include_once ($filepath.'/../helpers/format.php');
 ?>

 <?php 
    /**
     * 
     */
    class wareorder
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
            $description = mysqli_real_escape_string($this->db->link, $data['description']);
            $ad=Session::get('adminName');
            $sender=$ad;
            $status = "chờ xử lý";
            $vendor = Session::get('vendorid');
            

            if($productName=="" || $amount=="" || $sender==""||$vendor==""){
                $alert= "<span class='error' >Không được để trống</span>";
                return $alert;
            }
            else{
                //move_uploaded_file($_FILES['image']['tmp_name'], "uploads/$file_name");
                $query ="INSERT INTO tbl_wareorder(productName,amount,description,sender,status,vendor) VALUES('$productName','$amount','$description','$sender','$status','$vendor')"; 
                $result = $this->db->insert($query);
                if($result){
                    $alert="<span class ='success'>Đã gửi yêu cầu cho vendor</span>";
                    return $alert;
                }
                else{
                    $alert="<span class ='error'>Chưa gửi được yêu cầu</span>";
                    return $alert;
                }
            }
        }
        public function show_wareorder($vendor){
            $query = "
            SELECT *
            FROM tbl_wareorder as p WHERE vendor='$vendor'
             order by productID desc";
            //lấy các phần tử trong bảng rồi sắp xếp theo ID
            $result = $this->db->select($query);
            return $result;
        }
        public function show_product_to_chef($chefname){
            $query = "
            SELECT p.*
            FROM tbl_wareorder as p WHERE sender LIKE '%$chefname%'
             order by p.productID desc";
            //lấy các phần tử trong bảng rồi sắp xếp theo ID
            $result = $this->db->select($query);
            return $result;
        }
        public function getProductById($id){//dùng cho khi edit hoặc delete 
            $query = "SELECT * FROM tbl_wareorder WHERE productID='$id' ";
            //chọn phần tử trong bảng với đk catID= id 
            $result = $this->db->select($query);
            return $result;
        }

        public function update_product($data, $id){
           $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
            $amount = mysqli_real_escape_string($this->db->link, $data['amount']);
            $description = mysqli_real_escape_string($this->db->link, $data['description']);
            
            

            if(empty($productName) || empty($amount)){
                $alert= "<span class='error'> Fiels must be not empty</span>";
                return $alert;
            }
            else{ 
                
                    $query ="UPDATE tbl_wareorder  SET productName ='$productName',amount='$amount',description='$description' WHERE productID = '$id'";
                 $result = $this->db->update($query);
                    if($result){
                        $alert="<span class ='success'> Update product completion</span>";
                         return $alert;
                    }
                    else{
                         $alert="<span class ='error'> Update product not completion</span>";
                          return $alert;
                    }
            }
        }
       
        public function delete_product($id){
            $query = "DELETE FROM tbl_wareorder WHERE productID='$id' ";
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

        public function insert($id,$name,$amo)
        {
             $query = "SELECT * FROM tbl_wareorder WHERE productID='$id' AND status='đã xử lý' ";
            $ketqua =$this->db->select($query);
            if ($ketqua)
            {$alert= "<span class='error' >Yêu cầu này đã được xử lý rồi!</span>";
            return $alert;}
            else
            {
            $vendor=Session::get('vendorid');
            $query ="INSERT INTO tbl_warehouseproduct(productName,amount,vendor) VALUES('$name','$amo','$vendor')"; 
                $result = $this->db->insert($query);
                if($result){
                     $query ="UPDATE tbl_wareorder  SET status ='đã xử lý' WHERE productID = '$id'";
                                    $dadada = $this->db->update($query);
                    $alert="<span class ='success'>Yêu cầu xử lý thành công</span>";
                    return $alert;
                }
                else{
                    $alert="<span class ='error'>Chưa gửi được yêu cầu</span>";
                    return $alert;
                }
            }
        }
       /* public function change_status_product($id,$name,$amo,$vendor){
            $query = "SELECT * FROM tbl_wareorder WHERE productID='$id' AND status='đã xử lý' ";
            $ketqua =$this->db->select($query);
            if ($ketqua)
            {$alert= "<span class='error' >Yêu cầu này đã được xử lý rồi!</span>";
            return $alert;}
            else
            {
                    $query = "SELECT * FROM tbl_warehouseproduct WHERE productName LIKE '%$name%' AND amount<'$amo' AND vendor='$vendor' ";
                    $ketq =$this->db->select($query);
                    if ($ketq){
                        $alert= "<span class='error' >Mặt hàng này không đủ số lượng yêu cầu!</span>";
                        return $alert;
                    }
                    else
                    {
                        $query = "SELECT * FROM tbl_warehouseproduct WHERE productName LIKE '%$name%' AND vendor='$vendor'";
                        //chọn phần tử trong bảng với đk catID= id 
                        $result = $this->db->select($query);
                        if ($result)
                        {
                                $query ="UPDATE tbl_warehouseproduct  SET amount=amount-'$amo' WHERE productName LIKE '%$name%' AND vendor='$vendor'";
                                $res = $this->db->update($query);
                                if($res){
                                    $query ="UPDATE tbl_wareorder  SET status ='đã xử lý' WHERE productID = '$id'";
                                    $dadada = $this->db->update($query);
                                    $alert= "<span class='success' >Đã xử lý xong</span>";
                                    return $alert;
                                }
                                else{
                                    $alert= "<span class='error' >Không được xử lý</span>";
                                    return $alert;
                                }
                        }
                        else 
                        {
                            $alert= "<span class='error' >Mặt hàng yêu cầu chưa có trong kho. Hãy thêm mặt hàng này vào kho trước!</span>";
                            return $alert;
                        }
                    }
            }
        }*/
    }
 ?>