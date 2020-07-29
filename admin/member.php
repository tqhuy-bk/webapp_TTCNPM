<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
   include '../classes/admin.php';
 ?>
<?php
   $admin= new admin();
   if(isset($_GET['deleteid'])){ 
    $id= $_GET['deleteid'];
    $delete= $admin->delete_admin($id);
   }
   
 ?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Product List</h2>
        <?php 
             if(isset($delete)==true){
                  	echo $delete;
             }
         ?>
        <div class="block">  
            <table class="data display " id="example">
			<thead>
				<tr>
					<th>Tên</th>
          <th>Email</th>
					<th>Tên đăng nhập</th>
					<th>Vai trò</th>
					<th>Tên quầy</th>
				</tr>
			</thead>
			<tbody>
                <?php 
                    $show = new admin(); 
                    $show_admin= $show->show_admin();
                    if($show_admin){
                    	$i=0;
                    	while($result=$show_admin->fetch_assoc()){
                    		$i++;
                    
                 ?>
				<tr class="odd gradeX">
          <td><?php echo $result['adminName'] ?></td>       
          <td><?php echo $result['adminEmail'] ?></td>
          <td><?php echo $result['adminUser'] ?></td>
          <td><?php echo $result['role'] ?></td>
          <td><?php echo $result['vendorname'] ?></td>
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
