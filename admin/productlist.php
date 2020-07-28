<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
   include '../classes/product.php';
   include '../classes/category.php';
   include_once '../helpers/format.php';
 ?>
<?php
   $product= new product();
   if(isset($_GET['deleteid'])){ 
    $id= $_GET['deleteid'];
    $delete= $product->delete_product($id);
   }
   
 ?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Danh sách mặt hàng</h2>
        <?php 
             if(isset($delete)==true){
                  	echo $delete;
             }
         ?>
        <div class="block">  
            <table class="data display " id="example">
			<thead>
				<tr>
					<th>Số thứ tự</th>
					<th>Tên mặt hàng</th>
					<th>Giá tiền</th>
					<th>Hình ảnh</th>
					<th>Mô tả</th>
				  <th>Danh mục</th>
				  <th>Nhà cung cấp</th>
          <th>Loại</th>
          <?php $level=Session::get('level');?>
          <?php if($level==3){ ?>
          <th>Thao tác</th>>
           <?php
              }
              ?> 
					
				</tr>
			</thead>
			<tbody>
                <?php 
                    $level=Session::get('level');
                    $vendorid=Session::get('vendorid');
                    $format= new Format();
                    $show = new product(); 
                    if($level==1 or $level==2){
                      $show_product= $show->show_product();
                    }
                    if($level==3 or $level==4){
                      $show_product= $show->show_productvendor($vendorid);
                    }
                    if($show_product){
                    	$i=0;
                    	while($result=$show_product->fetch_assoc()){
                    		$i++;
                    
                 ?>
				<tr class="odd gradeX">
					<td><?php echo $i ?></td>
					<td><?php echo $result['productName'] ?></td>
					<td><?php echo $result['price'] ?></td>
					<?php  
					    $text= $result['image']
					 ?>
					<td><img src="uploads/<?php echo $text ?>" height= 100px;></td>
					<td><?php echo $format->textShorten($result['description'],30)?></td>
					<td><?php echo $result['catName'] ?></td>
					<td class="center"> <?php echo $result['catName'] ?></td>
          <td class="center"> <?php echo $result['type'] ?></td>
          <?php $level=Session::get('level');?>
          <?php if($level==3){ ?>
					<td><a href="product_edit.php?productid=<?php echo $result['productID'] ?>">Chỉnh sửa</a> || <a href="?deleteid=<?php echo $result['productID'] ?>">Xóa</a></td>
				   <?php
              }
              ?> 
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

<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
		setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
