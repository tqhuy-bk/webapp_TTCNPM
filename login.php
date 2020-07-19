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
        	<h3>Existing Customers</h3>
        	<span><?php 
			   if(isset($check_signin_customer)){
			   	echo $check_signin_customer;
			   }
			 ?></span>
        	<p>Sign in with the form below.</p>
        	<form action="" method="POST">
                	<input name="customerName" type="text" class="field" placeholder="Enter Name...">
                    <input name="password" type="password" class="field" placeholder="Enter password...">
            
                    <p class="note"><a href="#">Forgot passoword </a></p>
                    <div><input  style="background: #0c5a6c;" class="buysubmit"  type ="submit" name="signin" value="Sign In" ></div>
            </form>
            <br>
            <br>
            <br>
        </div>
<!-- style="background:#6492d6;border: 1px solid #cecece;box-sizing: border-box;color: #444;display: block; font-size: 27px;height: 38px;text-align: center;" class="grey" -->
    	<div class="register_account">
    		<h3>Register New Account</h3>
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
							<input type="text" name="customerName" placeholder="Enter name..." >
						</div>
						<div>
							<input type="text"  name="customerEmail" placeholder="Enter E-Mail...">
						</div>
		    		</td>
		    		<td>       
		                <div>
		                    <input type="text" name="customerPhone" placeholder="Enter phone...">
		                </div>
				  
				        <div>
					        <input style="width:97%;height:28px;margin-top:5px;" type="password" name="password" placeholder="Enter password...">
				        </div>
		    	    </td>
		       </tr> 
		    </tbody></table> 
		   <br>
		  <div><input style="background: #0c5a6c;" class="buysubmit" type ="submit" name="submit" value="Creat ccount" ></div>
		  
		    <div class="clear"></div>
		    </form>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>

<?php
  include 'inc/footer.php';
 ?>
