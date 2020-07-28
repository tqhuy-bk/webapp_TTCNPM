<?php
  include 'inc/header.php';
 ?>
 
 <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
        $quantity= $_POST['quantity'];
        $cartID=$_POST['cartID'];
        $check_update_quantity = $cart->update_quantity($quantity,$cartID);
   } 
 ?>
<?php
    if(isset($_GET['delete_product_id'])){ 
        $id= $_GET['delete_product_id'];
        $delete= $cart->delete_product_from_cart($id);
   } 
 ?>
 <div class="main">
    <div class="content">
    	<div class="cartoption">		
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
								<th width="10%">Hình ảnh</th>
								<th width="15%">Giá tiền</th>
								<th width="25%">Số lượng</th>
								<th width="20%">Thành tiền</th>
								<th width="10%">Thao tác</th>
							</tr>
						    <?php 
						        $show_cart= $cart->show_cart();
						        $sum_price=0;
                                if($show_cart){
                    	            while($result=$show_cart->fetch_assoc()){    
						     ?>
							<tr>
								<td><?php echo $result['productName'] ?></td>
								<td><img style ="width:100px;height:70px;" src="admin/uploads/<?php echo $result['image'] ?>" alt=""/></td>
								<td><?php echo  $fm->format_money($result['price']) ?></td>
								<td>
									<form action="" method="post">
										<input type="hidden" name="cartID" value="<?php echo $result['cartID'] ?>"/>
										<input type="number" name="quantity" min="1" value="<?php echo $result['quantity'] ?>"/>
										<input type="submit" name="submit" value="Cập nhật"/>
									</form>
								</td>
								<?php 
								   $total_price = $result['quantity']*$result['price'];
								   $sum_price += $total_price;
								   Session::set('sum',$sum_price);
								?>
								<td><?php echo  $fm->format_money($total_price)?></td>
								<td><a href="?delete_product_id=<?php echo $result['productID'] ?>">Xóa</a></td>
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
								<td style=" color:red;font-size:20px;"><?php echo  $fm->format_money($sum_price)  ?> đồng</td>
							</tr>
							
					   </table>
					</div>
					<div class="shopping">
						<div class="shopleft">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
						<div class="shopright">
							<a href="<?php 
                                         $check_login = Session::get('customer_login');
		                             	 if($check_login==false){
		   	 	                             echo 'login.php';
		   	                             }
		   	                             else echo 'payment.php';
                                     ?>"> <img src="images/check.png" alt="" /></a>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>

<?php
  include 'inc/footer.php';
 ?>

