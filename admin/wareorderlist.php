<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
   include '../classes/wareorder.php';
   include_once '../helpers/format.php';
 ?>
<?php
   $product= new wareorder();
   if(isset($_GET['deleteid'])){ 
    $id= $_GET['deleteid'];
    $delete= $product->delete_product($id);
   }
   
if(isset($_GET['getname'])){ 
    $id=$_GET['getid'];
    $name= $_GET['getname'];
    $amo=$_GET['changeamount'];
    $vendor=$_GET['vendorid'];
    $delete= $product->change_status_product($id,$name,$amo,$vendor);
   }

 ?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Danh sách đơn yêu cầu</h2>
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
					<th>Tên hàng hóa</th>
					<th>Số lượng</th>
          <th>Mô tả</th>
          <th>Người yêu cầu</th>
          <th>Trạng thái</th>
				</tr>
			</thead>
			<tbody>
                <?php 
                    $format= new Format();
                    $show = new wareorder(); 
                    $vendor = Session::get('vendorid');
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
          <td><center><?php echo $result['description'] ?></center></td>
          <td><center><?php echo $result['sender'] ?></center></td>
          <td><center><?php echo $result['status'] ?></center></td>
					<td><a href="?getname=<?php echo $result['productName']?>&getid=<?php echo $result['productID']?>&changeamount=<?php echo $result['amount']?>&vendorid=$vendor">Xử lý</a> || <a href="?deleteid=<?php echo $result['productID'] ?>">Xóa</a></td>
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
