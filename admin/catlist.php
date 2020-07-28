<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
    include '../classes/category.php';
 ?>
<?php 
    $show = new category();
    if(isset($_GET['deleteid'])) {
     $id = $_GET['deleteid'];
     $delete_cat= $show->del_category($id);
    }
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Danh sách danh mục sản phẩm</h2>
                <?php 
                  if(isset($delete_cat)==true){
                  	echo $delete_cat;
                  }
                 ?>
                <div class="block">        
                    <table class="data display" id="example">
                    	<!-- class ="database" -->
					<thead>
						<tr>
							<th>Số thứ tự</th>
							<th>Tên danh mục sản phẩm</th>
							<th>Thao tác</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						   $showcategory= $show->show_category();
						   if($showcategory){
						   	  $i=0;
						   	  while($result = $showcategory->fetch_assoc()){ 
						   	  	$i++;
						   //result trả về một cấu trúc gồm id và name
						 ?>
						<tr class="even gradeC">
							<td><center><?php  echo $i ?></center></td>
							<td><center><?php echo $result['catName'] ?></center> </td> 
							<!-- echo là in ra catName -->
							<td><center><a href="category_edit.php?catid=<?php echo $result['catID'] ?>">Chỉnh sửa</a> || <a href="?deleteid=<?php echo $result['catID'] ?>">Xóa</a></center></td>
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

