<<<<<<< HEAD
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
 <style>
 	.inner{
	 	background-color: rgb(255, 255, 255);
	    min-height: 400px;
	    border-radius: 4px;
	    padding: 1px;
 	}
 	.table {
		border-collapse: collapse;
	    width: 100%;
	    word-break: break-word;
	    display: table;
	    border-spacing: 2px;
    	border-color: grey;
 	}
 	.thead{
 		display: table-header-group;
	    vertical-align: middle;
	    border-color: inherit;
 	}
 	.tr{
 		display: table-row;
	    vertical-align: inherit;
	    border-color: inherit;
	    border-bottom: 1px solid rgb(244, 244, 244);
	 }
	 .th{
	 	min-width: 130px;
	    color:black;
	    font-size: 18px;
	    font-weight: 550;
	    text-align: left;
	    padding: 15px 15px;
	    display: table-cell;
        vertical-align: inherit;
	 }
	 .tbody{
	 	display: table-row-group;
	    vertical-align: middle;
	    border-color: inherit;
	 }
	 .td{
	 	font-size: 16px;
	    line-height: 5px;
	    color: rgb(51, 51, 51);
	    min-width: 130px;
	    font-weight: 500;
	    text-align: left;
	    padding: 20px 15px;
	    display: table-cell;
        vertical-align: inherit;
	 }
	 .tr:hover{
       background: #e7f7fc;
	 }
 </style>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Danh sách nhà cung cấp</h2>
                <?php 
                  if(isset($delete_vendor)==true){
                  	echo $delete_vendor;
                  }
                 ?>
                <div class="inner">
						<table class="table">
							<thead class="thread">
								<tr class="tr">
									<th class="th">Số thứ tự</th>
									<th class="th">Tên nhà cung cấp</th>
									<th class="th">Tùy chỉnh</th>
								</tr>
							</thead>
							<tbody class="tbody">
								<?php 
								   $showvendor= $vendor->show_vendor();
								   if($showvendor){
								   		$i=0;
								   		while($result = $showvendor->fetch_assoc()){ 
								   	  		$i++;
						  			 //result trả về một cấu trúc gồm id và name
						 		?>
								<tr class="tr">
									<td  class="td"><?php  echo $i ?></td>
									<td class="td"><?php echo $result['vendorName'] ?> </td> 
									<td class="td"><a href="vendor_edit.php?vendorid=<?php echo $result['vendorID'] ?>">Sửa</a> || <a href="?deleteid=<?php echo $result['vendorID'] ?>">Xóa</a></td>
								</tr>
								<?php 
                                 }}
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
=======
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
 <style>
 	.inner{
	 	background-color: rgb(255, 255, 255);
	    min-height: 400px;
	    border-radius: 4px;
	    padding: 1px;
 	}
 	.table {
		border-collapse: collapse;
	    width: 100%;
	    word-break: break-word;
	    display: table;
	    border-spacing: 2px;
    	border-color: grey;
 	}
 	.thead{
 		display: table-header-group;
	    vertical-align: middle;
	    border-color: inherit;
 	}
 	.tr{
 		display: table-row;
	    vertical-align: inherit;
	    border-color: inherit;
	    border-bottom: 1px solid rgb(244, 244, 244);
	 }
	 .th{
	 	min-width: 130px;
	    color:black;
	    font-size: 18px;
	    font-weight: 550;
	    text-align: left;
	    padding: 15px 15px;
	    display: table-cell;
        vertical-align: inherit;
	 }
	 .tbody{
	 	display: table-row-group;
	    vertical-align: middle;
	    border-color: inherit;
	 }
	 .td{
	 	font-size: 16px;
	    line-height: 5px;
	    color: rgb(51, 51, 51);
	    min-width: 130px;
	    font-weight: 500;
	    text-align: left;
	    padding: 20px 15px;
	    display: table-cell;
        vertical-align: inherit;
	 }
	 .tr:hover{
       background: #e7f7fc;
	 }
 </style>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Vendor List</h2>
                <?php 
                  if(isset($delete_vendor)==true){
                  	echo $delete_vendor;
                  }
                 ?>
                <div class="inner">
						<table class="table">
							<thead class="thread">
								<tr class="tr">
									<th class="th">Serial No.</th>
									<th class="th">Vendor name</th>
									<th class="th">Action</th>
								</tr>
							</thead>
							<tbody class="tbody">
								<?php 
								   $showvendor= $vendor->show_vendor();
								   if($showvendor){
								   		$i=0;
								   		while($result = $showvendor->fetch_assoc()){ 
								   	  		$i++;
						  			 //result trả về một cấu trúc gồm id và name
						 		?>
								<tr class="tr">
									<td  class="td"><?php  echo $i ?></td>
									<td class="td"><?php echo $result['vendorName'] ?> </td> 
									<td class="td"><a href="vendor_edit.php?vendorid=<?php echo $result['vendorID'] ?>">Edit</a> || <a href="?deleteid=<?php echo $result['vendorID'] ?>">Delete</a></td>
								</tr>
								<?php 
                                 }}
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
>>>>>>> c49b992b33ec8abcd70266ce4f96e853d6c6d545
