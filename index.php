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
				<div class="grid_1_of_4 images_1_of_4" style=" min-height:390px;margin: 1% 0% 1% 0%;">
					 <a href="details.php?productid=<?php echo $result['productID'] ?>"><img src="admin/uploads/<?php echo $result['image'] ?>" alt="" /></a>
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
    		        <h3>Discount</h3>
    		     </div>
    		     <div class="clear"></div>
    	    </div>
			<div class="section group">
				 <?php 
	      	        $get_product_discount= $product->get_discount();
	      	        if($get_product_discount){
	      	        	while($result=$get_product_discount->fetch_assoc()){//lay du lieu vao bien result
	      	     ?>
				<div class="grid_1_of_4 images_1_of_4" style=" min-height:390px;margin: 1% 0% 1% 0%;">
					 <a href="details.php?productid=<?php echo $result['productID'] ?>"><img src="admin/uploads/<?php echo $result['image'] ?>" alt="" /></a>
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
    </div>
 </div>

<?php 
  include 'inc/footer.php';
 ?>
