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
      $check_add_product_cart= $cart->add_product_cart($_POST,$id);
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
						<p>Price: <span><?php echo $result['price'] ?>VND</span></p>
						<p>Category: <span><?php echo $result['catName'] ?> </span></p>
						<p>Vendor: <span><?php echo $result['catName'] ?> </span> </p>
					</div>
				<div class="add-cart">
					<form action="" method="post">
						<input type="number" class="buyfield" name="quantity" value="1"/>
						<input type="submit" class="buysubmit" name="submit" value="Buy Now"/>
					</form>				
				</div>
			</div>
			<div class="product-desc">
			<h2>Product Details</h2>
			<p><?php echo $result['description'] ?></p>
	        </div>
				
	    </div>
	    <?php 
	      }
	       } 
	     ?>
				<div class="rightsidebar span_3_of_1">
					<h2>CATEGORIES</h2>
					<ul>
				         <li><a href="drinks.php">Coffee</a></li>
				         <li><a href="drinks.php">Coffee</a></li>
				         <li><a href="drinks.php">Coffee</a></li>
				         <li><a href="drinks.php">Coffee</a></li>
				         <li><a href="drinks.php">Coffee</a></li>
				         <li><a href="drinks.php">Coffee</a></li>
				         <li><a href="drinks.php">Coffee</a></li>
				         <li><a href="drinks.php">Coffee</a></li>
				         <li><a href="drinks.php">Coffee</a></li>
				         <li><a href="drinks.php">Coffee</a></li>
				         <li><a href="drinks.php">Coffee</a></li>
    				</ul>
    	
 				</div>
 		</div>
 	</div>
</div>

 <?php
  include 'inc/footer.php';
 ?>