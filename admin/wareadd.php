<?php  include 'inc/header.php';?>
<?php  include 'inc/sidebar.php';?>
<?php 
     include '../classes/warehouseproduct.php';
 ?>
<?php 
   $pr = new warehouseproduct();  
   if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
      $check_insert_product= $pr->insert_product($_POST,$_FILES);
      //vi co chen ảnh nên có $_FILES
   }
 ?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Thêm hàng vào kho</h2>
        <?php  
        if(isset($check_insert_product)){
            echo $check_insert_product;
        }
         ?>
        <div class="block">               
         <form action="wareadd.php" method="post" enctype="multipart/form-data">
        <!-- enctype để có thể thêm hình ảnh  -->
            <table class="form">

                <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input type="text" name="productName" placeholder="Nhập tên mặt hàng..." class="medium" />
                    </td>
                </tr>
				        <tr>
                    <td>
                        <label>Amount</label>
                    </td>
                    <td>
                        <input type="text" name="amount" placeholder="Nhập số lượng..." class="medium" />
                    </td>
                </tr>
				        <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Save" />
                    </td>
                </tr>
            </table>
            </form>
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