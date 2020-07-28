<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
    include '../classes/vendor.php';
 ?>
<?php 
    $vendor = new vendor();
    if(isset($_GET['deleteid'])) {
     $id = $_GET['deleteid'];
     $delete_vendor= $vendor->del_vendor($id);
    }
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Danh sách nhà cung cấp</h2>
                <?php 
                  if(isset($delete_vendor)==true){
                  	echo $delete_vendor;
                  }
                 ?>
                <div class="block">        
                    <table class="data display">
                    	<!-- class ="database" -->
					<thead>
						<tr>
							<th>Số thứ tự</th>
							<th>Tên nhà cung cấp</th>
							<th>Thao tác</th>
						</tr>
					</thead>
					<tbody  >
						<?php 
						   $showvendor= $vendor->show_vendor();
						   if($showvendor){
						   	  $i=0;
						   	  while($result = $showvendor->fetch_assoc()){ 
						   	  	$i++;
						   //result trả về một cấu trúc gồm id và name
						 ?>
						<tr class="even gradeC">
							<td><center><?php  echo $i ?></center></td>
							<td><center><?php echo $result['vendorName'] ?> </center></td> 
							<!-- echo là in ra catName -->
							<td><center><a href="vendor_edit.php?vendorid=<?php echo $result['vendorID'] ?>">Chỉnh sửa</a> || <a href="?deleteid=<?php echo $result['vendorID'] ?>">Xóa</a></center></td>
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

