<?php
  include 'inc/header.php';
 ?>
<?php 
    if(!isset($_GET['date_order']) || $_GET['date_order'] ==NULL){
     echo  "<script> window.location='orderlist.php' </script>";
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
 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Order</h2>
			    	<div class="kHWfJY">
			    		<?php 
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
								<th width="20%">Product Name</th>
								<th width="10%">Image</th>
								<th width="15%">Price</th>
								<th width="20%">Quantity</th>
								<th width="20%">Total Price</th>
								<th  width="20%">Date Order</th>
								<th width="10%">State</th>
							</tr>
						    <?php 
						        $show_order= $order->show_order_details($date_order);
						        $sum_price=0;
                                if($show_order){
                    	            while($result=$show_order->fetch_assoc()){    
						     ?>
							<tr>
								<td><?php echo $result['productName'] ?></td>
								<td><img style ="width:100px;height:70px;" src="admin/uploads/<?php echo $result['image'] ?>" alt=""/></td>
								<td><?php echo  $fm->format_money($result['price']) ?></td>
								<td> <?php echo $result['quantity'] ?></td>
								<?php 
								   $total_price = $result['quantity']*$result['price'];
								   $sum_price += $total_price;
								   Session::set('sum',$sum_price);
								?>
								<td><?php echo  $fm->format_money($total_price)?></td>
								<td><?php echo $result['date_order'] ?></td>
								<td><a href="">Processing</a></td>
							</tr>
                             <?php 
                                }
                               }
                              ?>
						</table>
						<table style="float:right;text-align:left;" width="40%">
							<br>
							<tr>
								<th style=" color:red;font-size:30px;">Total : </th>
								<td style=" color:red;font-size:20px;"><?php echo  $fm->format_money($sum_price)  ?> VND</td>
							</tr>
							
					   </table>
					</div>
					
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>

<?php
  include 'inc/footer.php';
 ?>

