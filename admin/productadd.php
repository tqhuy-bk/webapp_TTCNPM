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
   $pr = new product();  
   if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
      $check_insert_product= $pr->insert_product($_POST,$_FILES);
      //vi co chen ảnh nên có $_FILES
   }
 ?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Thêm mặt hàng mới</h2>
        <?php  
        if(isset($check_insert_product)){
            echo $check_insert_product;
        }
         ?>
        <div class="block">               
         <form action="productadd.php" method="post" enctype="multipart/form-data">
        <!-- enctype để có thể thêm hình ảnh  -->
            <table class="form">
               
                <tr>
                    <td>
                        <label>Tên</label>
                    </td>
                    <td>
                        <input type="text" name="productName" placeholder="Nhập tên mặt hàng..." class="medium" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Danh mục</label>
                    </td>
                    <td>
                        <select id="select" name="category">
                            
                            <?php 
                               $cat= new category();
                            $catlist= $cat->show_category();
                            if($catlist){
                                while($result= $catlist->fetch_assoc()){
                             ?>
                            <option value="<?php echo $result['catID'] ?>"><?php echo $result['catName'] ?></option>
                            <?php 
                              }
                             }
                             ?>
                        </select>
                    </td>
                </tr>
				        <tr>
                    <td>
                        <label>Nhà cung cấp</label>
                    </td>
                    <td>
                        <select id="select" name="vendor">
                          <?php 
                               $cat= new category();
                            $catlist= $cat->show_category();
                            if($catlist){
                                while($result= $catlist->fetch_assoc()){
                             ?>
                            <option value="<?php echo $result['catID'] ?>"><?php echo $result['catName'] ?></option>
                            <?php 
                              }
                             }
                             ?>
                        </select>
                    </td>
                </tr>
				
				        <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Mô tả mặt hàng</label>
                    </td>
                    <td>
                        <textarea name="Mô tả mặt hàng" ></textarea>
                    </td>
                </tr>
				        <tr>
                    <td>
                        <label>Giá tiền</label>
                    </td>
                    <td>
                        <input type="text" name="price" placeholder="Nhập giá tiền..." class="medium" />
                    </td>
                </tr>
                 <tr>
                    <td>
                        <label>Loại</label>
                    </td>
                    <td>
                        <select id="select" name="type">
                            <option value="combo">combo</option>
                            <option value="discount">giảm giá</option>
                            <option value="drinks">đồ uống</option>
                            <option value="foods">món ăn</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Tải hình ảnh lên</label>
                    </td>
                    <td>
                        <input type="file" name="image"/>
                    </td>
                </tr>

				        <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Thêm" />
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


