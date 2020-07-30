<<<<<<< HEAD
<?php  include 'inc/header.php';?>
<?php  include 'inc/sidebar.php';?>
<?php 
     include '../classes/warehouseproduct.php';
 ?>
<?php 
   $product = new warehouseproduct();

   if(!isset($_GET['productid']) || $_GET['productid'] ==NULL){
     echo  "<script> window.location='warelist.php' </script>";
   }
   else{
    $id = $_GET['productid'];
   }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
      $check_update_product= $product->update_product($_POST, $id);
   }


 ?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Edit Product</h2>
        <span> <?php 
                   if(isset($check_update_product)==true){
                      echo $check_update_product; 
                   }
                ?>
        </span>
        <?php 
                   $get_product= $product->getProductById($id);
                   if($get_product){
                      while($result_product = $get_product->fetch_assoc()){

        ?>
        <div class="block">               
         <form action="" method="post" enctype="multipart/form-data">
        <!-- enctype để có thể thêm hình ảnh  -->
            <table class="form">

                <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input type="text" name="productName" value="<?php echo $result_product['productName'] ?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Amount</label>
                    </td>
                    <td>
                        <input type="text" name="amount" value="<?php echo $result_product['amount'] ?>" class="medium" />
                    </td>
                </tr>

        <tr>
                    <td></td>
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
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>
=======
<?php  include 'inc/header.php';?>
<?php  include 'inc/sidebar.php';?>
<?php 
     include '../classes/warehouseproduct.php';
 ?>
<?php 
   $product = new warehouseproduct();

   if(!isset($_GET['productid']) || $_GET['productid'] ==NULL){
     echo  "<script> window.location='warelist.php' </script>";
   }
   else{
    $id = $_GET['productid'];
   }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
      $check_update_product= $product->update_product($_POST, $id);
   }


 ?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Edit Product</h2>
        <span> <?php 
                   if(isset($check_update_product)==true){
                      echo $check_update_product; 
                   }
                ?>
        </span>
        <?php 
                   $get_product= $product->getProductById($id);
                   if($get_product){
                      while($result_product = $get_product->fetch_assoc()){

        ?>
        <div class="block">               
         <form action="" method="post" enctype="multipart/form-data">
        <!-- enctype để có thể thêm hình ảnh  -->
            <table class="form">

                <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input type="text" name="productName" value="<?php echo $result_product['productName'] ?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Amount</label>
                    </td>
                    <td>
                        <input type="text" name="amount" value="<?php echo $result_product['amount'] ?>" class="medium" />
                    </td>
                </tr>

        <tr>
                    <td></td>
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
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>
>>>>>>> c49b992b33ec8abcd70266ce4f96e853d6c6d545
