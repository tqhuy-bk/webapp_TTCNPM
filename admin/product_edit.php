<?php  include 'inc/header.php';?>
<?php  include 'inc/sidebar.php';?>
<?php 
   include '../classes/category.php';
  // include 'vendor'
 ?>
<?php 
     include '../classes/product.php';
 ?>
<?php 
   $product = new product();
   
   if(!isset($_GET['productid']) || $_GET['productid'] ==NULL){
     echo  "<script> window.location='productlist.php' </script>";
   }
   else{
    $id = $_GET['productid'];
   }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
      $check_update_product= $product->update_product($_POST,$_FILES, $id);
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
                        <label>Category</label>
                    </td>
                    <td>
                        <select id="select" value name="category">
                            
                            <?php 
                               $cat= new category();
                            $catlist= $cat->show_category();
                            if($catlist){
                                while($result= $catlist->fetch_assoc()){
                             ?>
                            <option 
                            <?php 
                                if($result['catID']==$result_product['categoryID']){echo 'selected';}
                             ?>
                            value="<?php echo $result['catID'] ?>"><?php echo $result['catName'] ?></option>
                            <?php 
                              }
                             }
                             ?>
                        </select>
                    </td>
                </tr>
        <tr>
                    <td>
                        <label>Vendor</label>
                    </td>
                    <td>
                        <select id="select" name="vendor">
                          <?php 
                            $cat= new category();
                            $catlist= $cat->show_category();
                            if($catlist){
                                while($result= $catlist->fetch_assoc()){
                             ?>
                            <option
                            <?php 
                                if($result['catID']==$result_product['categoryID']){echo 'selected';}
                             ?>
                             value="<?php echo $result['catID'] ?>"><?php echo $result['catName'] ?></option>
                            <?php 
                              }
                             }
                             ?>
                        </select>
                    </td>
                </tr>
        
                <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Description</label>
                    </td>
                    <td>
                        <textarea name="description" value="<?php echo $result_product['description'] ?>"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Price</label>
                    </td>
                    <td>
                        <input type="text" name="price" value="<?php echo $result_product['price'] ?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Type</label>
                    </td>
                    <td>
                        <select id="select" name="type">
                            <option value="combo">combo</option>
                            <option value="discount">discount</option>
                            <option value="drinks">drinks</option>
                            <option value="foods">foods</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                      <?php  
                          $text= $result_product['image']
                      ?>
                      <img src="uploads/<?php echo $text ?>" height= 100px;>
                        <input type="file" name="image"/>
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


