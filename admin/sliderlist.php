<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
   include '../classes/product.php';
   include '../classes/category.php';
   include '../classes/vendor.php';
   include_once '../helpers/format.php';
 ?>
<?php 
    $fm= new format();
?>
<?php
   $product= new product();
   if(isset($_GET['deleteid'])){ 
    $id= $_GET['deleteid'];
    $delete= $product->delete_slider($id);
   }
   
 ?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Slider List</h2>
        <?php 
             if(isset($delete)==true){
                  	echo $delete;
             }
         ?>
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>No.</th>
					<th>Slider Title</th>
					<th>Slider Image</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				 <?php 
                    $format= new Format();
                    $show = new product(); 
                    $show_slider= $show->show_slider();
                    if($show_slider){
                    	$i=0;
                    	while($result=$show_slider->fetch_assoc()){
                    		$i++;
                    
                 ?>
				<tr class="odd gradeX">
					<td><?php echo $i ?></td>
					<td><?php echo $result['title'] ?></td>
					<?php  
					    $text= $result['image']
					 ?>
					<td><img src="uploads/<?php echo $text ?>" height= 100px;></td>			
				<td>
					<a href="#">Edit</a> || <a href="?deleteid=<?php echo $result['sliderID'] ?>">Delete</a>
				</td>
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
