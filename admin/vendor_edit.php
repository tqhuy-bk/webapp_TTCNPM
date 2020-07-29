<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
   include '../classes/vendor.php'
?>
<?php 
   $vendor = new vendor();
   if(!isset($_GET['vendorid']) || $_GET['vendorid'] ==NULL){
     echo  "<script> window.location='vendorlist.php' </script>";
   }
   else{
    $id = $_GET['vendorid'];
   }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $vendorName = $_POST['vendorName'];
      $check_update_vendor= $vendor->update_vendor($vendorName, $id);
   }
     
   
 ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Edit Vendor</h2>
               <span> <?php 
                   if(isset($check_update_vendor)==true){
                      echo $check_update_vendor; 
                   }
                ?></span>
                <?php 
                   $get_vendor_name = $vendor->get_vendor_by_ID($id);
                   if($get_vendor_name){
                      while($result = $get_vendor_name->fetch_assoc()){

                 ?>
               <div class="block copyblock"> 
                 <form action="" method ="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name ="vendorName" value="<?php echo $result['vendorName'] ?>" placeholder="Edit Vendor Name..." class="medium" />
                            </td>
                        </tr>
						             <tr> 
                            <td>
                                <input type="submit" name="submit" Value="Update" />
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
        </div>
   }
<?php include 'inc/footer.php';?>
