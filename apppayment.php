<<<<<<< HEAD
<?php 
include 'inc/header.php' 
?>
<?php 
 $check_login = Session::get('customer_login');
         if($check_login==false){
          header('Location:index.php');
         }
 ?>
<style type="text/css">
    .box_left {
      width:48%;
      border: 1px solid #666;
      float:left;
    }
     .box_right {
      width:48%;
      border: 1px solid #666;
      float:right;
    }
</style>
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
          <p>Tổng tiền thanh toán: <?php echo $fm->format_money($sum_price) ?> VND <p> 
            <br>
            <?php  
            $get_info= $customer->get_info();
                  if($get_info){
            $result=$get_info->fetch_assoc();} ?>
            <p> Số tiền hiện có trong tài khoản: <?php echo  $fm->format_money($result['balance'])  ?> VND</p>                 
          <p>Bạn có muốn thanh toán bằng ứng dụng? <p> <br>
            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
                $id=Session::get('customer_id');
                $compare=$customer->compare($sum_price,$id);
                if($compare==true){
                  $add_order= $order->add_order($id);
                  $remove = $cart->delete_cart(); 
                  $check_draw = $customer->pay($sum_price,$id); 
                }
                else echo 'Không đủ tiền';
             }
          ?>
          <form action="" method="POST">
          <div><input style="background: #0c5a6c;float:left; margin-right:40px;" class="buysubmit" type ="submit" name="submit" value="Thanh toán ngay" ></div></form>
          <div >
          <a style="background: #0c5a6c;float:left; margin-right:40px;" class="buysubmit" href="drawmoney.php">Nạp thêm tiền</a></div>   
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
  include 'inc/footer.php';?>
=======
<?php 
include 'inc/header.php' 
?>
<?php 
 $check_login = Session::get('customer_login');
         if($check_login==false){
          header('Location:index.php');
         }
 ?>
<style type="text/css">
    .box_left {
      width:48%;
      border: 1px solid #666;
      float:left;
    }
     .box_right {
      width:48%;
      border: 1px solid #666;
      float:right;
    }
</style>
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
          <p>Tổng tiền thanh toán: <?php echo $fm->format_money($sum_price) ?> VND <p> 
            <br>
            <?php  
            $get_info= $customer->get_info();
                  if($get_info){
            $result=$get_info->fetch_assoc();} ?>
            <p> Số tiền hiện có trong tài khoản: <?php echo  $fm->format_money($result['balance'])  ?> VND</p>                 
          <p>Bạn có muốn thanh toán bằng ứng dụng? <p> <br>
            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
                $id=Session::get('customer_id');
                $compare=$customer->compare($sum_price,$id);
                if($compare==true){
                  $add_order= $order->add_order($id);
                  $remove = $cart->delete_cart(); 
                  $check_draw = $customer->pay($sum_price,$id); 
                }
                else echo 'Không đủ tiền';
             }
          ?>
          <form action="" method="POST">
          <div><input style="background: #0c5a6c;float:left; margin-right:40px;" class="buysubmit" type ="submit" name="submit" value="Thanh toán ngay" ></div></form>
          <div >
          <a style="background: #0c5a6c;float:left; margin-right:40px;" class="buysubmit" href="drawmoney.php">Nạp thêm tiền</a></div>   
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
  include 'inc/footer.php';?>
>>>>>>> c49b992b33ec8abcd70266ce4f96e853d6c6d545
