<?php 
include 'inc/header.php' ?>
<?php 
 $check_login = Session::get('customer_login');
             if($check_login==false){
                header('Location:index.php');
             }
?>
<?php 
     $get_info_customer=$customer->get_info();
        if($get_info_customer){
                 $result=$get_info_customer->fetch_assoc();
        }
?>
<style>
.jFEIKb {
    padding: 5px 10px 0px;
    display: flex;
    width:100%;
}
* {
    box-sizing: border-box;
}
.fxjiAa {
    flex-basis: 30%;
    background-color: rgb(255, 255, 255);
    color: rgb(51, 51, 51);
    margin-top: 15px;
    padding: 10px 15px;
    border-width: 1px;
    border-style: solid;
    border-color: rgb(221, 221, 221);
    border-image: initial;
    border-radius: 3px;
}
.cart_payment {
    height: auto;
    padding: 0 0 0 10px;
    background: #EDEDED;
    border: 1px solid #CECECE;
    border-left: none;
    line-height: 25px;
    border-radius: 0 2px 2px 0;
    box-sizing: border-box;
}
.fxjiAa .title {
    display: flex;
    -webkit-box-pack: justify;
    justify-content: space-between;
    padding-bottom: 10px;
    font-size: 13px;
    line-height: 31px;
    border-bottom: 1px solid rgb(201, 201, 201);
}
.fxjiAa .title a {
    font-size: 12px;
    padding-left: 14px;
    padding-right: 14px;
    height: 31px;
    outline-color: rgb(204, 204, 204);
    color: rgb(51, 51, 51);
    border-width: 1px;
    border-style: solid;
    border-color: rgb(204, 204, 204);
    border-image: initial;
    background: linear-gradient(rgb(255, 255, 255), rgb(247, 247, 247));
    border-radius: 2px;
    text-decoration: none;
}
.fxjiAa .address .name {
    font-size: 15px;
    font-weight: 700;
    margin-top: 15px;
    margin-bottom: 10px;
}
.fxjiAa .address .street, .fxjiAa .address .phone {
    padding: 2px 0px;
}
.fxjiAa .address span {
    display: block;
    font-size: 13px;
    line-height: 20px;
}
.UHbjr {
    margin-left:10px;
    flex-basis: 70%;
    background-color: rgb(255, 255, 255);
    color: rgb(51, 51, 51);
    margin-top: 15px;
    padding: 10px 15px;
    border-width: 1px;
    border-style: solid;
    border-color: rgb(221, 221, 221);
    border-image: initial;
    border-radius: 3px;
    min-height: 300px;
}
.UHbjr .title {
    display: flex;
    -webkit-box-pack: justify;
    justify-content: space-between;
    padding-bottom: 10px;
    font-size: 13px;
    line-height: 31px;
    border-bottom: 1px solid rgb(201, 201, 201);
}
.UHbjr .title a {
    font-size: 12px;
    padding-left: 14px;
    padding-right: 14px;
    height: 31px;
    outline-color: rgb(204, 204, 204);
    color: rgb(51, 51, 51);
    border-width: 1px;
    border-style: solid;
    border-color: rgb(204, 204, 204);
    border-image: initial;
    background: linear-gradient(rgb(255, 255, 255), rgb(247, 247, 247));
    border-radius: 2px;
    text-decoration: none;
}
.UHbjr .cart_payment {
    font-size: 12px;
}
.UHbjr .cart_payment .product {
    margin-bottom: 15px;
}
.iylcMU {
    font-size: 11px;
    display: flex;
    -webkit-box-pack: justify;
    justify-content: space-between;
    border-bottom: 1px solid rgb(201, 201, 201);
}
.iylcMU .info {
    flex: 9 1 0%;
}
.iylcMU .info .qty {
    padding-right: 5px;
}
.ifcYED .inner {
    display: flex;
    -webkit-box-pack: justify;
    justify-content: space-between;
}
b, strong {
    font-weight: bolder;
}
.iylcMU .info .product-name {
    color: rgb(0, 127, 240);
    text-decoration: none;
}
a {
    background-color: transparent;
}
.iylcMU .info .seller-name {
    display: block;
}
.iylcMU .price {
    text-align: right;
    flex: 1 1 0%;
    padding-right: 5px;
}

ul {
    display: block;
    list-style-type: disc;
}
li {
    display: list-item;
    text-align: -webkit-match-parent;
}
.UHbjr .cart_payment .price-summary .total {
    display: flex;
    -webkit-box-pack: justify;
    justify-content: space-between;
    padding-top: 12px;
    margin-bottom: 0px;
    line-height: 19px;
    font-weight: 700;
    border-top: 2px solid rgb(201, 201, 201);
}
.UHbjr .cart_payment .price-summary .total .value {
    color: rgb(238, 35, 71);
    font-size: 19px;
    font-weight: 400;
    text-align: right;
    padding-right:5px;
}
.UHbjr .cart_payment .price-summary .total .value i {
    display: block;
    font-size: 12px;
    color: rgb(51, 51, 51);
}
i {
    font-style: italic;
}
</style>
               
<div class="main">
    <div class="content">
      <div class="container" style="background:#dbdee0;width:100%;margin:auto;min-height:700px;">
            <div class="jFEIKb">
                <div class="fxjiAa">
                    <div class="title">
                        <span><strong> Thông tin khách hàng</strong></span>
                        <a href="profile.php">Sửa</a>
                    </div>
                    <div class="address">
                        <span class="name">Họ và tên: <?php echo $result['customerName'] ?></span>
                        <span class="street">Số điện thoại: <?php echo $result['customerPhone'] ?></span>
                        <span class="phone">Email:  <?php echo $result['customerEmail'] ?></span>
                    </div>
                </div>
                <?php 
                                $show_cart= $cart->show_cart_detail();
                                $sum_price=0;
                                $i=0;
                                if($show_cart){
                                    while($result=$show_cart->fetch_assoc()){   
                                        $i++;
                                    } }
                ?>
                <div class="UHbjr">
                    <div class="title">
                        <span> <strong>Đơn hàng (<?php echo $i ?> sản phẩm) </strong></span>
                        <a href="cart.php">Sửa</a>
                    </div>
                    <div class="cart_payment">
                        <div class="product">
                             <?php 
                                $show_cart= $cart->show_cart_detail();
                                $sum_price=0;
                                if($show_cart){
                                    while($result=$show_cart->fetch_assoc()){    
                             ?>
                            <div class="iylcMU">
                                <div class="info">
                                    <strong class="qty"><?php echo $result['quantity'] ?> x</strong>
                                    <a href="#" class="product-name"><?php echo $result['productName']?>:  <?php echo $fm->textShorten($result['description'],100) ?> </a>
                                    <span class="seller-name">Cung cấp bởi <strong><?php echo $result["vendorName"] ?></strong></span>
                                </div>
                                 <?php 
                                   $total_price = $result['quantity']*$result['price'];
                                   $sum_price += $total_price;
                                   Session::set('sum',$sum_price);
                                ?>
                                <div class="price"><?php echo  $fm->format_money($total_price) ?> vnđ</div>
                            </div>
                            <?php 
                                }}
                             ?>
                        </div>
                        <div class="price-summary">
                            <div class="total">
                                <div class="name">Thành tiền:</div>
                                <div class="value"><?php echo  $fm->format_money($sum_price)?> vnđ<i>(Đã bao gồm VAT nếu có)</i></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
                <?php
                  if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
                      $id=Session::get('customer_id');
<<<<<<< HEAD
                        $add_order= $order->add_order_unpaid($id);
                        $remove = $cart->delete_cart();
                        echo  "<script> window.location='success.php' </script>";
=======
                      $compare=$customer->compare($sum_price,$id);
                      if($compare==true){
                        $add_order= $order->add_order_unpaid($id);
                        $remove = $cart->delete_cart();
                        echo  "<script> window.location='success.php' </script>";
                      }
>>>>>>> c49b992b33ec8abcd70266ce4f96e853d6c6d545
                   }
                ?>  
            <p style="margin-left:40px;" > Chọn phương thức thanh toán:</p>
             <br><br>
                <div ><a style="background: #0c5a6c;float:left; margin-right:40px;margin-left:40px; " class="buysubmit" href="apppayment.php">Tài khoản ứng dụng</a></div>
            <form action="" method="POST">
                    <div><input style="background: #0c5a6c;float:left; margin-right:40px;" class="buysubmit" type ="submit" name="submit" value="Trả tại quầy" ></div>
            </form>
        </div>
    </div>
</div>
<?php 
<<<<<<< HEAD
include 'inc/footer.php' ?>
=======
include 'inc/footer.php' ?>
>>>>>>> c49b992b33ec8abcd70266ce4f96e853d6c6d545
