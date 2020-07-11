<?php 
include 'inc/header.php' ?>
<?php 
 $check_login = Session::get('customer_login');
		   	 if($check_login==false){
		   	 	header('Location:index.php');
		   	 }
 ?>
<?php
   if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
      $id=Session::get('customer_id');
      $amount= $_POST['amount'];
      $check_draw = $bankaccount->withdraw($_POST,$id);	
}
 ?>
<div class="main">
    
			
		    <br><br><br>
        	<h2 style="font-size:25px;">Fill out the card information</h2><br>
        	<form action="" method="POST">
                    <input style="height: 30px;width:200px;"name="cardcode" type="text" class="field" placeholder="Card Code...">
		                <input style="height: 30px;width:200px;" name="cardPass" type="password" class="field" placeholder="Card Password...">
		                <input style="height: 30px;width:200px;" name="amount" type="text" class="field" placeholder="Deposit Amount...">  
			              <br>  </br>
                    <div><input class="login"style="background:#6492d6; margin-left:0px;float: left;" type ="submit" name="submit" value="Update" class="grey"></div>
           	 </form>
             <br>
  
	<br><br>
        <span>
              <?php 
              if(isset($check_draw)){
                  $compare = $bankaccount->compare($_POST,$amount); 
                  if($compare==true){
                     $check_withdraw = $customer->withdraw($amount,$id);  
                  } 
                  echo $check_draw;
              }
              ?>
          
             </span>	
    	<br>
    	<br>
    	<br>
    	<br>
    	<br>
    	<br>

  
</div>
<?php 
  include 'inc/footer.php';
 ?>