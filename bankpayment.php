<?php 
include 'inc/header.php' ?>
<?php 
 $check_login = Session::get('customer_login');
		   	 if($check_login==false){
		   	 	header('Location:index.php');
		   	 }
 ?>

<div class="main">
    
			         <?php 
                    $show_cart= $cart->show_cart();
                    $sum_price=0;
                                if($show_cart){
                                  while($result=$show_cart->fetch_assoc()){    
                   $total_price = $result['quantity']*$result['price'];
                   $sum_price += $total_price;}}
                   Session::set('sum',$sum_price);
                ?>
		    <br><br><br>
          <p>Tổng tiền thanh toán: <?php echo $sum_price ?> <p> 
        	<p>Điền thông tin thẻ:</p><br>
        	<form action="" method="POST">
                    <input name="cardcode" type="text" class="field" placeholder="Mã thẻ...">
		                <input name="cardPass" type="password" class="field" placeholder="Mật khẩu thẻ...">
			<br>  </br>
                    <div><input class="login"style="background:#6492d6; margin-left:0px;width:220px" type ="submit" name="submit" value="Thanh toán" class="grey"></div>
           	 </form>
            <?php
   if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
      $id=Session::get('customer_id');
      $check_draw = $bankaccount->payment($_POST,$sum_price); 
      if(isset($check_draw)){
          $compare=$bankaccount->compare($_POST,$sum_price);
          if($compare==true){
          $remove = $cart->delete_cart(); 
          }
      }
  }
  ?>
        	
	<br><br><br><br>
        <br>
        <br>		
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