<?php  include 'inc/header.php';?>
<?php  include 'inc/sidebar.php';?>
<?php 
     include '../classes/wareorder.php';
 ?>
<?php 
   $pr = new wareorder();  
   if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
      $check_insert_product= $pr->insert_product($_POST,$_FILES);
      //vi co chen ảnh nên có $_FILES
   }
 ?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Yêu cầu lấy hàng trong kho</h2>
        <?php  
        if(isset($check_insert_product)){
            echo $check_insert_product;
        }
         ?>
        <div class="block">               
         <form action="wareordersend.php" method="post" enctype="multipart/form-data">
        <!-- enctype để có thể thêm hình ảnh  -->
            <table class="form">
               
                <tr>
                    <td>
                        <label>Tên</label>
                    </td>
                    <td>
                        <input type="text" name="productName" placeholder="Nhập tên hàng..." class="medium" />
                    </td>
                </tr>
				        <tr>
                    <td>
                        <label>Số lượng</label>
                    </td>
                    <td>
                        <input type="text" name="amount" placeholder="Nhập số lượng..." class="medium" />
                    </td>
                </tr>
                 <tr>
                    <td>
                        <label>ID của người quản lý kho cần lấy hàng</label>
                    </td>
                    <td>
                        <input type="text" name="vendorid" placeholder="Nhập ID..." class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Mô tả</label>
                    </td>
                    <td>
                        <textarea name="description" ></textarea>
                    </td>
                </tr>
				        <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Gửi" />
                    </td>
                </tr>
            </table>
            </form>
        </div>
        <div class="block"> 
        <h2>Danh sách đơn đã gửi</h2>
            <table class="data display " id="example">
            <thead>
                <tr>
                    <th>Số thứ tự</th>
                    <th>Tên hàng</th>
                    <th>Số lượng</th>
          <th>Mô tả</th>
          <th>Người yêu cầu</th>
          <th>Trạng thái</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $format= new Format();
                    $show = new wareorder();
                    $ad=Session::get('adminName');
                    $ten = $ad;
                    $show_product= $show->show_product_to_chef($ten);
                    if($show_product){
                        $i=0;
                        while($result=$show_product->fetch_assoc()){
                            $i++;
                    
                 ?>
                <tr class="odd gradeX">
                    <td><center><?php echo $i ?></center></td>
                    <td><?php echo $result['productName'] ?></td>
                    <td><center><?php echo $result['amount'] ?></center></td>
          <td><center><?php echo $result['description'] ?></center></td>
          <td><center><?php echo $result['sender'] ?></center></td>
          <td><center><?php echo $result['status'] ?></center></td>
                </tr>
                <?php 
                     }
                    }
                 ?>
            </tbody>
        </table>
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


