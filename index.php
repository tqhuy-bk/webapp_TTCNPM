<?php
  include 'inc/header.php';
  include 'inc/slider.php'; 
 ?>
 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Combo</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
	      	    <?php 
	      	        $get_product_combo= $product->get_combo();
	      	        if($get_product_combo){
	      	        	while($result=$get_product_combo->fetch_assoc()){//lay du lieu vao bien result
	      	     ?>
				<div class="grid_1_of_4 images_1_of_4" style=" min-height:390px;">
					 <a href="details.php"><img src="admin/uploads/<?php echo $result['image'] ?>" alt="" /></a>
					 <h2><?php echo $result['productName'] ?></h2>
					 <p><?php echo $fm->textShorten($result['description'],30) ?></p>
					 <p><span class="price"><?php echo $result['price'] ?>VND</span></p>
				     <div class="button"><span><a href="details.php?productid=<?php echo $result['productID'] ?>" class="details">Details</a></span></div>
				</div>
				<?php 
					  }
	      	        }
				 ?>
			</div>
			<div class="content_bottom">
    		<div class="heading">
    		<h3>Drinks</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
				<div class="grid_1_of_4 images_1_of_4" style=" min-height:390px;">
					 <a href="details.php"><img src="images/hinh_6.jpg" alt="" /></a>
					 <h2>Coffee </h2>
					 <p><span class="price">50.000VND</span></p>
				     <div class="button"><span><a href="details.php" class="details">Details</a></span></div>
				</div>
				<div class="grid_1_of_4 images_1_of_4" style=" min-height:390px;">
					<a href="details.php"><img src="images/hinh_7.1.jpg" alt="" /></a>
					 <h2>Coffee </h2>
					 <p><span class="price">50.000VND</span></p> 
				     <div class="button"><span><a href="details.php" class="details">Details</a></span></div>
				</div>
				<div class="grid_1_of_4 images_1_of_4" style=" min-height:390px;">
					<a href="details.php"><img src="images/hinh_8.jpg" alt="" /></a>
					 <h2>Coffee </h2>
					 <p><span class="price">50.000VND</span></p>
				     <div class="button"><span><a href="details.php" class="details">Details</a></span></div>
				</div>
				<div class="grid_1_of_4 images_1_of_4" style=" min-height:390px;">
				 <img src="images/hinh_9.jpg" alt="" />
					 <h2>Coffee </h2>					 
					 <p><span class="price">50.000VND</span></p>

				     <div class="button"><span><a href="details.php" class="details">Details</a></span></div>
				</div>
			</div>
    </div>
 </div>

<?php 
  include 'inc/footer.php';
 ?>