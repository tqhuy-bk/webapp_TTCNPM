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
                <h2>Category List</h2>
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
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
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
							<td><?php  echo $i ?></td>
							<td><?php echo $result['catName'] ?> </td> 
							<!-- echo là in ra catName -->
							<td><a href="category_edit.php?catid=<?php echo $result['catID'] ?>">Edit</a> || <a href="?deleteid=<?php echo $result['catID'] ?>">Delete</a></td>
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

