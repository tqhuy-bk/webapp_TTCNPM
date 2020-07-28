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
    		<p style="font-size:20px;color:">Kết quả tìm kiếm cho '<?php echo $search ?>': </p>
    		</div>
    		<div class="clear"></div>
    	</div>
	    <div class="section group">
				 <?php 
	      	        $get_product_search= $product->search($search);
	      	        if($get_product_search){
	      	        	while($result=$get_product_search->fetch_assoc()){//lay du lieu vao bien result
	      	     ?>
				<div class="grid_1_of_4 images_1_of_4" style="min-height:390px; margin: 1% 0% 1% 0%;">
					 <a href="details.php?productid=<?php echo $result['productID'] ?>"><img style="max-height:250px;min-width: 200px;" src="admin/uploads/<?php echo $result['image'] ?>" alt="" /></a>
					 <h2><?php echo $result['productName'] ?></h2>
					 <p><?php echo $fm->textShorten($result['description'],30) ?></p>
					 <p><span class="price"><?php echo $result['price'] ?>VND</span></p>
				     <div class="button"><span><a href="details.php?productid=<?php echo $result['productID'] ?>" class="details">Xem thêm</a></span></div>
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
