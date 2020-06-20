<?php 
include 'inc/header.php' ?>
<?php 
 $check_login = Session::get('customer_login');
		   	 if($check_login==false){
		   	 	header('Location:index.php');
		   	 }
 ?>
<div class="main">
    <div class="content">
    	<p style="color:red;font-size:30px;margin-left:20%;"> Dạ nhóm em chưa làm xong trang này</p>
    	<br>
    	<br>
    	<br>
    	<br>
    	<br>
    	<br>
    </div> 
</div>
<?php 
include 'inc/footer.php' ?>