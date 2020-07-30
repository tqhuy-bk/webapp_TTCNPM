<?php
  include 'inc/header.php';
 ?>
 <?php 
             $check_login = Session::get('customer_login');
		   	 if($check_login){
		   	 	header('Location:index.php');
		   	 }
  ?>
<?php   
   if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
      $check_create_customer = $customer->create_customer($_POST);
   }
 ?>
 <?php   
   if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['signin'])) {
      $check_signin_customer = $customer->signin_customer($_POST);
      
   }
 ?>
 <div class="main">
    <div class="content">
    	 <div class="login_panel">
        	<h3>Đã có tài khoản?</h3>
        	<span><?php 
			   if(isset($check_signin_customer)){
			   	echo $check_signin_customer;
			   }
			 ?></span>
        	<p>Hãy điền thông tin tài khoản vào bên dưới.</p>
        	<form action="" method="POST">
                <input name="customerName" type="text" class="field" placeholder="Tên tài khoản...">
                    <input name="password" type="password" class="field" placeholder="Mật khẩu...">
            
                    <p class="note"><a href="#">Quên mật khẩu?</a></p>
                    <div><input  style="background: #0c5a6c;" class="buysubmit"  type ="submit" name="signin" value="Đăng nhập" ></div>
            </form>
            <br>
            <br>
            <br>
        </div>
    	<div class="register_account">
    		<h3>Đăng kí tài khoản mới</h3>
    		<span><?php 
			   if(isset($check_create_customer)){
			   	echo $check_create_customer;
			   }
			 ?></span>
    		<form action="" method="POST">
		   	<table><tbody>
			    <tr>
					<td>
						<div>
							<input type="text" name="customerName" placeholder="Tên tài khoản..." >
						</div>
						<div>
							<input type="text"  name="customerEmail" placeholder="Địa chỉ email...">
						</div>
		    		</td>
		    		<td>       
		                <div>
		                    <input type="text" name="customerPhone" placeholder="Số điện thoại...">
		                </div>
				  
				        <div>
					        <input style="width:97%;height:28px;margin-top:5px;" type="password" name="password" placeholder="Mật khẩu...">
				        </div>
		    	    </td>
		       </tr> 
		    </tbody></table> 
		   <br>
		  <div><input style="background: #0c5a6c;" class="buysubmit" type ="submit" name="submit" value="Tạo tài khoản" ></div>
		  
		    <div class="clear"></div>
		    </form>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>

<?php
  include 'inc/footer.php';
 ?>
