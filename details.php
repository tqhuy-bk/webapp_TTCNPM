<?php
  include 'inc/header.php';
 ?>
<?php 
    if(!isset($_GET['productid']) || $_GET['productid'] ==NULL){
     echo  "<script> window.location='index.php' </script>";
   }
   else{
    $id = $_GET['productid'];
   }
 ?>
 <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
        $quantity= $_POST['quantity'];
        $check_add_product_cart = $cart->add_product_cart($quantity,$id);
      //vi co chen ảnh nên có $_FILES
   } 
 ?>
 <div class="main">
    <div class="content">
    	<div class="section group">
    		<?php 
                $get_product= $product->get_details($id);
                if($get_product){
                    while($result = $get_product->fetch_assoc()){

            ?>
				<div class="cont-desc span_1_of_2">				
					<div class="grid images_3_of_2">
						<img src="admin/uploads/<?php echo $result['image'] ?>" alt="" />
					</div>
				<div class="desc span_3_of_2">
					<h2><?php echo $result['productName'] ?></h2>
					<p><?php echo  $result['description'] ?></p>					
					<div class="price">
						<p>Giá tiền: <span><?php echo  $fm->format_money($result['price']) ?> vnđ</span></p>
						<p>Loại: <span><?php echo $result['catName'] ?> </span></p>
						<p>Cung cấp bởi:<span><?php echo $result['vendorName'] ?> </span> </p>
					</div>
				<div class="add-cart">
					<form action="" method="post">
						<input type="number" class="buyfield" name="quantity" value="1" min="1" />
						<input style="background: #0c5a6c;" type="submit" class="buysubmit" name="submit" value="Buy Now"/>
					</form>
					<br>
					<?php 
					   if(isset($check_add_product_cart)){
					   	echo $check_add_product_cart;
					   }
					 ?>				
				</div>
			</div>
			<div class="product-desc">
			<h2 style="background: #0c5a6c;">Chi tiết sản phẩm</h2>
			<p><?php echo $result['description'] ?></p>
	        </div>
				
	    </div>
	    <?php 
	      }
	       } 
	     ?>
				<div class="rightsidebar span_3_of_1">
					<h2>DANH MỤC</h2>
					<ul>
				         <li><a href="drinks.php">Cà phê</a></li>
				         <li><a href="drinks.php">Cà phê</a></li>
				         <li><a href="drinks.php">Cà phê</a></li>
				         <li><a href="drinks.php">Cà phê</a></li>
				         <li><a href="drinks.php">Cà phê</a></li>
				         <li><a href="drinks.php">Cà phê</a></li>
				         <li><a href="drinks.php">Cà phê</a></li>
				         <li><a href="drinks.php">Cà phê</a></li>
				         <li><a href="drinks.php">Cà phê</a></li>
				         <li><a href="drinks.php">Cà phê</a></li>
				         <li><a href="drinks.php">Cà phê</a></li>
    				</ul>
    	
 				</div>
 		</div>
 	</div>
</div>

 <?php
  include 'inc/footer.php';
 ?>
