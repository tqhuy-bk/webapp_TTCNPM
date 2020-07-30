<<<<<<< HEAD
<?php
  include 'inc/header.php';
 ?>
 <?php 
    $search=Session::get('search_value');
  ?>
 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<p style="font-size:20px;color:">Search  results  for  '<?php echo $search ?>': </p>
    		</div>
    		<div class="clear"></div>
    	</div>
	    <div class="section group">
				 <?php 
	      	        $get_product_search= $product->search($search);
	      	        if($get_product_search){
	      	        	while($result=$get_product_search->fetch_assoc()){//lay du lieu vao bien result
	      	     ?>
				<div class="grid_1_of_4 images_1_of_4" style="min-height:390px; margin: 1% 0.7% 1% 0.5%;">
					 <a href="details.php?productid=<?php echo $result['productID'] ?>"><img style="max-height:250px;min-width: 200px;min-height:245px;margin-bottom: 10px;" src="admin/uploads/<?php echo $result['image'] ?>" alt="" /></a>
					 <h2><?php echo $result['productName'] ?></h2>
					 <p><?php echo $fm->textShorten($result['description'],30) ?></p>
					 <p><span class="price"><?php echo $fm->format_money($result['price'])?> vnđ</span></p>
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
=======
<?php
  include 'inc/header.php';
 ?>
 <?php 
    $search=Session::get('search_value');
  ?>
 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<p style="font-size:20px;color:">Search  results  for  '<?php echo $search ?>': </p>
    		</div>
    		<div class="clear"></div>
    	</div>
	    <div class="section group">
				 <?php 
	      	        $get_product_search= $product->search($search);
	      	        if($get_product_search){
	      	        	while($result=$get_product_search->fetch_assoc()){//lay du lieu vao bien result
	      	     ?>
				<div class="grid_1_of_4 images_1_of_4" style="min-height:390px; margin: 1% 0.7% 1% 0.5%;">
					 <a href="details.php?productid=<?php echo $result['productID'] ?>"><img style="max-height:250px;min-width: 200px;min-height:245px;margin-bottom: 10px;" src="admin/uploads/<?php echo $result['image'] ?>" alt="" /></a>
					 <h2><?php echo $result['productName'] ?></h2>
					 <p><?php echo $fm->textShorten($result['description'],30) ?></p>
					 <p><span class="price"><?php echo $fm->format_money($result['price'])?> vnđ</span></p>
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
>>>>>>> c49b992b33ec8abcd70266ce4f96e853d6c6d545
