<?php 
include 'inc/header.php' ?>
<?php 
 $check_login = Session::get('customer_login');
             if($check_login==false){
                header('Location:index.php');
             }
 ?>
 <?php 
   if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
      $id= Session::get('customer_id');
      $check_update_info= $customer->update_info_customer($_POST, $id);
   }
?>
<div class="main">
    <div class="content">
        <!-- <p style="color:red;font-size:30px;margin-left:20%;"> Dáº¡ nhÃ³m em chÆ°a lÃ m xong trang nÃ y</p> -->
       <div style="background:#dbdee0;width:100%;margin:auto;height:500px;"> 
       <table class="tblone">
                <tr><th></th></tr>
        </table>          
        <?php 
            $check_get_info_customer=$customer->get_info();
            if($check_get_info_customer){
                $result=$check_get_info_customer->fetch_assoc();
            }
        ?>    
        <form action="" method="post">
               
                <div style="margin:2% 20%;">
                    <label  style="font-size:25px;margin-right: 20%;float:left;">Name:</label>
                    <input style="width:200px;height:30px;" type="text" name="customerName" value="<?php echo $result['customerName'] ?>"  />
                </div>
                <div style="font-size:25px;margin:2% 21%;">
                    <label  style="margin-right: 20%;float:left">Email:</label>
                    <input style="width:200px;height:30px;" type="text" name="customerEmail" value="<?php echo $result['customerEmail'] ?>"  />
                </div>
                <div style="font-size:25px;margin:2% 20%;">
                    <label  style="margin-right: 20%;float:left">Phone:</label>
                    <input style="width:200px;height:30px;" type="text" name="customerPhone" value="<?php echo $result['customerPhone'] ?>" />
                </div>
                <?php  
                        if(isset($check_update_info)){
                            echo $check_update_info;
                        }
                ?>
                <div style="margin:2% 40%;"> <input style="background: #0c5a6c; color:white;width:100px;height:30px;" type="submit" name="submit" Value="Update" /> </div>    
            </form>
        </div>
    </div> 
</div>
<?php 
include 'inc/footer.php' ?>
