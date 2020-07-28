<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
   include '../classes/product.php';
   include '../classes/category.php';
   include '../classes/vendor.php';
   include '../classes/order.php';
   include '../classes/cart.php';
   include '../classes/customer.php';
   include_once '../helpers/format.php';
 ?>
 <?php 
    if(!isset($_GET['date_order']) || $_GET['date_order'] ==NULL){
     echo  "<script> window.location='vieworder.php' </script>";
   }
   else{
    $date_order = $_GET['date_order'];
   }
 ?>
 <style>
  .kHWfJY {
      display: flex;
      margin: 10px 0px 20px;
    }
    .kHWfJY > div:first-child {
    margin-left: 0px;
}
.kHWfJY > div {
    width: 33.3333%;
    margin: 5px 5px;
    padding: 5px;
    border:1px solid #ddd;
}
.ipnhKS {
    display: flex;
    flex-direction: column;
    color: rgba(0, 0, 0, 0.65);
    margin: 10px 0px 20px;
}
.ipnhKS .title {
    font-size: 15px;
    text-transform: uppercase;
    color: rgb(36, 36, 36);
    margin: 5px 10px 15px;
    font-weight: 500;
}
.ipnhKS .content {
    display: flex;
    flex-direction: column;
    background-color: rgb(255, 255, 255);
    height: 100%;
    padding: 10px;
    border-radius: 4px;
}
.ipnhKS .name {
    text-transform: uppercase;
}
.kHWfJY .name {
    color: rgb(36, 36, 36);
    font-weight: bold;
}
.kHWfJY p {
    margin: 5px 0px 0px;
}
p {
    display: block;
    margin-block-start: 1em;
    margin-block-end: 1em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
}
*{
  box-sizing: border-box;
}
 </style>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Thông tin đơn hàng</h2>
                <div class="kHWfJY">
                  <?php 
                     $customer= new customer();
                     $show_info = $customer->get_info();
                     $result_info=$show_info->fetch_assoc();
                   ?>
                  <div class="ipnhKS">
                    <div class="title">Thông tin khách hàng</div>
                    <div class="content">
                      <p class="name"><?php echo $result_info['customerName'] ?></p>
                      <p class="address">
                      <span>Địa chỉ: </span>KTX  Khu B ĐHQGTPHCM, Bình Dương, Việt Nam</p>
                      <p class="phone"><span>Điện thoại: </span><?php echo  $result_info['customerPhone'] ?></p>
                    </div>
                  </div>
                  <div class="ipnhKS">
                    <div class="title">Hình thức giao hàng</div>
                    <div class="content"><p>Không</p><p></p></div>
                  </div>
                  <div class="ipnhKS">
                    <div class="title">Hình thức thanh toán</div>
                    <div class="content"><p class="">Thanh toán tiền mặt tại quầy</p></div>
                  </div>
              </div>
              <table class="tblone">
                  <tr>
                    <th width="20%">Mặt hàng</th>
                    <th width="10%">Hình ảnh</th>
                    <th width="15%">Giá tiền</th>
                    <th width="20%">Số lượng</th>
                    <th width="20%">Thành tiền</th>
                    <th  width="20%">Ngày đặt hàng</th>
                    <th width="10%">Trạng thái</th>
                  </tr>
                    <?php 
                        $order= new order();
                        $show_order= $order->show_order_details($date_order);
                        $sum_price=0;
                                    if($show_order){
                                      while($result=$show_order->fetch_assoc()){    
                     ?>
                  <tr>
                    <td><?php echo $result['productName'] ?></td>
                    <td><img style ="width:100px;height:70px;" src="uploads/<?php echo $result['image'] ?>" alt=""/></td>
                    <td><?php echo $result['price'] ?></td>
                    <td> <?php echo $result['quantity'] ?></td>
                    <?php 
                       $total_price = $result['quantity']*$result['price'];
                       $sum_price += $total_price;
                       Session::set('sum',$sum_price);
                    ?>
                    <td><?php echo $total_price?></td>
                    <td><?php echo $result['date_order'] ?></td>
                    <td><a href="">Đang thực hiện</a></td>
                  </tr>
                                 <?php 
                                    }
                                   }
                                  ?>
                </table>
                <table style="float:right;text-align:left;" width="40%">
                  <br>
                  <tr>
                    <th style=" color:red;font-size:20px;">Tổng cộng: </th>
                    <td style=" color:red;font-size:20px;"><?php echo $sum_price  ?> đồng</td>
                  </tr>
                  
             </table>
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
