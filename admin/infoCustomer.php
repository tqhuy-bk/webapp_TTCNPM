<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
   include '../classes/order.php';
   include '../classes/customer.php';
?>
<?php 
   $customer = new customer();
   if(!isset($_GET['customerid']) || $_GET['customerid'] ==NULL){
     echo  "<script> window.location='vieworder.php' </script>";
   }
   else{
    $id = $_GET['customerid'];
   }
 ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Customer</h2>
               <span> <?php 
                   if(isset($check_update_cat)==true){
                      echo $check_update_cat; 
                   }
                ?></span>
                <?php 
                   $get_info_customer= $customer->get_info_customer_admin($id);
                   if($get_info_customer){
                      while($result = $get_info_customer->fetch_assoc()){

                 ?>
                 <form action="" method ="post">
                    <table class="form">	
                        <tr>
                          <td>Name</td>
                            <td>
                                <input type="text" readonly="readonly"value="<?php echo $result['customerName'] ?>" placeholder="Edit Category Name..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                          <td>Phone</td>
                            <td>
                                <input type="text" readonly="readonly"value="<?php echo $result['customerPhone'] ?>" placeholder="Edit Category Name..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                          <td>Email</td>
                            <td>
                                <input type="text" readonly="readonly"value="<?php echo $result['customerEmail'] ?>" placeholder="Edit Category Name..." class="medium" />
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?php 
                      }
                     }
                    ?>
                
            </div>
        </div>
   }
<?php include 'inc/footer.php';?>