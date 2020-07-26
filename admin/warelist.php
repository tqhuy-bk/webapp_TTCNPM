<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
   include '../classes/warehouseproduct.php';
   include_once '../helpers/format.php';
 ?>
<?php
   $product= new warehouseproduct();
   if(isset($_GET['deleteid'])){ 
    $id= $_GET['deleteid'];
    $delete= $product->delete_product($id);
   }
   
 ?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Hàng trong kho</h2>
        <?php 
             if(isset($delete)==true){
                  	echo $delete;
             }
         ?>
        <div class="block">  
            <table class="data display " id="example">
			<thead>
				<tr>
					<th>Serial No.</th>
					<th>Product Name</th>
					<th>Amount</th>
				</tr>
			</thead>
			<tbody>
                <?php 
                    $format= new Format();
                    $show = new warehouseproduct(); 
                    $vendor=Session::get('vendorid');
                    $show_product= $show->show_product($vendor);
                    if($show_product){
                    	$i=0;
                    	while($result=$show_product->fetch_assoc()){
                    		$i++;
                    
                 ?>
				<tr class="odd gradeX">
					<td><center><?php echo $i ?></center></td>
					<td><?php echo $result['productName'] ?></td>
					<td><center><?php echo $result['amount'] ?></center></td>
					<td><a href="ware_edit.php?productid=<?php echo $result['productID'] ?>">Edit</a> || <a href="?deleteid=<?php echo $result['productID'] ?>">Delete</a></td>
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
