<?php
  include 'inc/header.php';
 ?>
 

<!-- <?php
    if(isset($_GET['delete_product_id'])){ 
        $id= $_GET['delete_product_id'];
        $delete= $cart->delete_product_from_order($id);
   } 
 ?> -->
 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Your Cart</h2>
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
								<th width="20%">Product Name</th>
								<th width="10%">Image</th>
								<th width="15%">Price</th>
								<th width="20%">Quantity</th>
								<th width="20%">Total Price</th>
								<th  width="20%">Date Order</th>
								<th width="10%">State</th>
							</tr>
						    <?php 
						        $show_order= $order->show_order();
						        $sum_price=0;
                                if($show_order){
                    	            while($result=$show_order->fetch_assoc()){    
						     ?>
							<tr>
								<td><?php echo $result['productName'] ?></td>
								<td><img style ="width:100px;height:70px;" src="admin/uploads/<?php echo $result['image'] ?>" alt=""/></td>
								<td><?php echo $result['price'] ?></td>
								<td> <?php echo $result['quantity'] ?></td>
								<?php 
								   $total_price = $result['quantity']*$result['price'];
								   $sum_price += $total_price;
								   Session::set('sum',$sum_price);
								?>
								<td><?php echo $total_price?></td>
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
								<td style=" color:red;font-size:20px;"><?php echo $sum_price  ?> VND</td>
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

