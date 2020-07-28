<?php 
include 'inc/header.php' ?>
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
    <div class="content">
       <div class="section group">
          <div class="box_left">
              <div class="cartpage">
              <h2>Giỏ hàng</h2>
              <?php  
                 if(isset($check_update_quantity)){
                   echo $check_update_quantity;
                 }
              ?>
              <?php  
                 if(isset($delete)){
                   echo $delete;
                 }
              ?>
              <table class="tblone">
              <tr>
                <th width="20%">Tên mặt hàng</th>
                <th width="15%">Giá tiền</th>
                <th width="25%">Số lượng</th>
                <th width="20%">Thành tiền</th>
              </tr>
                <?php 
                    $show_cart= $cart->show_cart();
                    $sum_price=0;
                                if($show_cart){
                                  while($result=$show_cart->fetch_assoc()){    
                 ?>
              <tr>
                <td><?php echo $result['productName'] ?></td>
                <td><?php echo $result['price'] ?></td>
                <td>
                  <?php echo $result['quantity'] ?>
                </td>
                <?php 
                   $total_price = $result['quantity']*$result['price'];
                   $sum_price += $total_price;
                   Session::set('sum',$sum_price);
                ?>
                <td><?php echo $total_price?></td>
                
              </tr>
                             <?php 
                                }
                               }
                              ?>
            </table>
            <table style="float:right;text-align:left;" width="40%">
              <br>
              <tr>
                <th style=" color:red;font-size:30px;">Tổng cộng: </th>
                <td style=" color:red;font-size:20px;"><?php echo $sum_price  ?> đồng</td>
              </tr>
              
             </table>
          </div>
          </div>
          <div class="box_right">
              <div class="cartpage">
              <h2>Thông tin</h2>
               <?php 
                  $check_get_info_customer=$customer->get_info();
                 if($check_get_info_customer){
                     $result=$check_get_info_customer->fetch_assoc();
                 }
               ?>
              <table class="tblone">
              <tr>
                <th></th>
                <th></th>
                <th> </th>
              </tr>
                
              <tr>
                <td><?php echo $result['customerName'] ?></td>
                <td><?php echo $result['customerEmail'] ?></td>
                <td><?php echo $result['customerPhone'] ?></td>

              </tr>
            </table>
             </table>
          </div>
          </div> 
       </div>
    </div>
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
          <p>Tổng tiền thanh toán: <?php echo $sum_price ?> đồng<p> 
            <br>
            <?php  
            $get_info= $customer->get_info();
                  if($get_info){
            $result=$get_info->fetch_assoc();} ?>
            <p>Số tiền hiện có trong tài khoản: <?php echo $result['balance']  ?> đồng</p>           
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
          <p>Bạn có muốn thanh toán bằng ứng dụng?<p> <br>
            <form action="" method="POST">
          <div><input style="background: #0c5a6c;float:left; margin-right:40px;" class="buysubmit" type ="submit" name="submit" value="Thanh toán ngay" class="grey"></div></form>
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
  include 'inc/footer.php';
 ?>