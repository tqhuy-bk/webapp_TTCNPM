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
        <h2>Post List</h2>
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
					<th>Price</th>
					<th>Product Image</th>
					<th>Description</th>
				    <th>Category</th>
				    <th>Vendor</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
                <?php 
                    $format= new Format();
                    $show = new product(); 
                    $show_product= $show->show_product();
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
					<td><a href="product_edit.php?productid=<?php echo $result['productID'] ?>">Edit</a> || <a href="?deleteid=<?php echo $result['productID'] ?>">Delete</a></td>
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
