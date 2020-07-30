<?php 
  include 'lib/session.php';
  Session::init();
 ?>
 <?php 
   include_once 'lib/database.php';
   include_once 'helpers/format.php';
   spl_autoload_register(function($className){
   	   include_once "classes/".$className.".php";
   });
   $db = new Database();
   $fm = new Format();
   $cart= new cart();
   $customer= new customer();
   $product = new product();
   $category = new category();
   $bankaccount = new bankaccount();
   $order = new order();
 ?>
<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>
<!DOCTYPE HTML>
<head>
<title>Webapp</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/menu.css" rel="stylesheet" type="text/css" media="all"/>
<script src="js/jquerymain.js"></script>
<script src="js/script.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script> 
<script type="text/javascript" src="js/nav-hover.js"></script>

<script type="text/javascript">
  $(document).ready(function($){
    $('#dc_mega-menu-orange').dcMegaMenu({rowItems:'4',speed:'fast',effect:'fade'});
  });
</script>
</head>
<body>
  <div class="wrap">
		<div class="header_top">
			<div class="logo">
				<a href="index.php"><img src="images/logo1.png" alt="" /></a>
			</div>
			  <div class="header_top_right">

			    <div class="shopping_cart">
					<div class="cart">
						<a href="cart.php" title="View my shopping cart" rel="nofollow">
								<span class="cart_title">Giỏ hàng: </span>
								<span class="no_product">
									<?php
									   $check_empty_cart= $cart->empty_cart();
									   if($check_empty_cart){
									   	  $check_sum= Session::get('sum');
                                       	     echo $fm->format_money($check_sum);
									   }
									   else{
									   	echo '0';
									   }
									   
									 ?>
									 VND
								</span>
							</a>
						</div>
			      </div>
			      <?php 
		   	           $check_login = Session::get('customer_login');
		   	           if($check_login){
		   	 	         echo '<a href="profile.php" class="login" style="margin-left:10px;background:#0c5a6c;width:200px;font-size:20px;border-radius: 8px;color:white;padding: 5px 5px;">Tài khoản của tôi</a>';
		   	       }
		   	       ?>
			      <div><a href="admin/login.php" class="login" style="margin-left:10px;background:#0c5a6c;width:170px;border-radius: 8px; font-size:20px;color:white;font-weight: 200;padding: 5px 5px; ">Đăng nhập admin</a> </div>
			      <?php 
			          if(isset($_GET['customerid'])){ 
			          	Session::destroy(); // nếu tồi tại customerid thì đăng xuất hủy phiên làm việc (khi đăng nhập) quay về lại ban đầu login.php
			          }
			       ?>
		   <div class="login" style="background:#0c5a6c; border-radius: 8px;font-size:20px;color:white;padding: 5px 5px;">
		   	<?php 
		   	  $check_login = Session::get('customer_login');
		   	 if($check_login==false){
		   	 	echo '<a style="color:white;"href="login.php">Đăng nhập</a>';
		   	 }
		   	 else{
                 echo  '<a style="color:white;"href="?customerid='.Session::get('customer_id').'">Đăng xuất</a>';//lấy customer_id gán vào customerid
		   	 }
		   	 ?> 
		   </div>
		   <br>
		   <br>
		   <br>
		    <div class="search_box" >
			<form>
				<input type="text" name="search" value="Tìm kiếm mặt hàng..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search for Products';}"><input type="submit" name="ok" value="Tìm kiếm">
			</form>
			    <?php
        			if (isset($_REQUEST['ok'])) {
            			global $search;
            			$search = addslashes($_GET['search']);
            			if (empty($search)) {
            				echo "Yêu cầu nhập dữ liệu vào ô trống";
            			} 
            			else {
            				$check_search = $product->search($search);
            				Session::set('search_value',$search);
                			// Nếu có kết quả thì hiển thị, ngược lại thì thông báo không tìm thấy kết quả
                			if ($check_search) {
                    			header('Location:search.php');
                			} 
                			else {
                    			echo "Không tìm được dữ liệu bạn yêu cầu!";
                			}           				
            			}
            		}
        		?>
			</div>
		 <div class="clear"></div>
	 </div>
	 <div class="clear"></div>
 </div>
<div class="menu">
	
	<ul id="dc_mega-menu-orange" class="dc_mm-orange">
	   <li><a href="index.php">Trang chủ</a></li>
	  <li><a href="foods.php">Món ăn</a> </li>
	  <li><a href="drinks.php">Đồ uống</a></li>
	  <li><a href="cart.php">Giỏ hàng</a></li>
	  <li><a href="contact.php">Liên hệ</a> </li>
	  <div class="clear"></div>
	</ul>
</div>