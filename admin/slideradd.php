<<<<<<< HEAD
<?php  include 'inc/header.php';?>
<?php  include 'inc/sidebar.php';?>
<?php 
   include '../classes/category.php';
  include '../classes/vendor.php';
 ?>
<?php 
     include '../classes/product.php';
 ?>
<?php 
   $pr = new product();  
   if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
      $check_insert_slider= $pr->insert_slider($_POST,$_FILES);
   }
 ?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Thêm slider mới</h2>
         <?php  
                if(isset($check_insert_slider)){
                    echo $check_insert_slider;
                }
         ?>
    <div class="block">               
         <form action="slideradd.php" method="post" enctype="multipart/form-data">
            <table class="form">     
                <tr>
                    <td>
                        <label>Chủ đề</label>
                    </td>
                    <td>
                        <input type="text" name="title" placeholder="Thêm chủ đề slider..." class="medium" />
                    </td>
                </tr>           
    
                <tr>
                    <td>
                        <label>Thêm hình ảnh</label>
                    </td>
                    <td>
                        <input type="file" name="image"/>
                    </td>
                </tr>
               
				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Lưu" />
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
=======
<?php  include 'inc/header.php';?>
<?php  include 'inc/sidebar.php';?>
<?php 
   include '../classes/category.php';
  include '../classes/vendor.php';
 ?>
<?php 
     include '../classes/product.php';
 ?>
<?php 
   $pr = new product();  
   if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
      $check_insert_slider= $pr->insert_slider($_POST,$_FILES);
   }
 ?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Slider</h2>
         <?php  
                if(isset($check_insert_slider)){
                    echo $check_insert_slider;
                }
         ?>
    <div class="block">               
         <form action="slideradd.php" method="post" enctype="multipart/form-data">
            <table class="form">     
                <tr>
                    <td>
                        <label>Title</label>
                    </td>
                    <td>
                        <input type="text" name="title" placeholder="Enter Slider Title..." class="medium" />
                    </td>
                </tr>           
    
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                        <input type="file" name="image"/>
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
>>>>>>> c49b992b33ec8abcd70266ce4f96e853d6c6d545
<?php include 'inc/footer.php';?>