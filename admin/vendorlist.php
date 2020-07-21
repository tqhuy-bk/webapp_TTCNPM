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
                <h2>Vendor List</h2>
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
							<th>Serial No.</th>
							<th>Vendor Name</th>
							<th>Action</th>
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
							<td><?php  echo $i ?></td>
							<td><?php echo $result['vendorName'] ?> </td> 
							<!-- echo là in ra catName -->
							<td><a href="vendor_edit.php?vendorid=<?php echo $result['vendorID'] ?>">Edit</a> || <a href="?deleteid=<?php echo $result['vendorID'] ?>">Delete</a></td>
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

