<?php 
include 'inc/header.php' ?>
<?php 
 $check_login = Session::get('customer_login');
		   	 if($check_login==false){
		   	 	header('Location:index.php');
		   	 }
 ?>
<div class="main">
    
	<div class="section group">
<br><br><br>
	      	    <p> Chọn phương thức thanh toán</p>
			
<br><br>
 			<div ><a style="background: #0c5a6c;float:left; margin-right:40px;" class="buysubmit" href="bankpayment.php">Thẻ ngân hàng</a></div>
			<div ><a style="background: #0c5a6c;float:left; margin-right:40px;" class="buysubmit" href="apppayment.php">Tài khoản ứng dụng</a></div>
            <div ><a style="background: #0c5a6c;float:left; margin-right:40px;" class="buysubmit" href="">Trả tại quầy</a></div>
	</div>
				
    	<br>
    	<br>
    	<br>
    	<br>
    	<br>
    	<br>

    </div> 
</div>
<?php 
  include 'inc/footer.php';
 ?>