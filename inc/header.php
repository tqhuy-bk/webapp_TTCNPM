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

 ?>
<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>
<!DOCTYPE HTML>
<head>
<title>Store Website</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/menu.css" rel="stylesheet" type="text/css" media="all"/>
<script src="js/jquerymain.js"></script>
<script src="js/script.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="js/move-top.js"></script>
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
						<a href="#" title="View my shopping cart" rel="nofollow">
								<span class="cart_title">Cart</span>
								<span class="no_product">(empty)</span>
							</a>
						</div>
			      </div>
			      <?php 
			          if(isset($_GET['customerid'])){ 
			          	Session::destroy(); // nếu tồi tại customerid thì đăng xuất
			          }
			       ?>
		   <div class="login" style="background:#6492d6;">
		   	<?php 
		   	  $check_login = Session::get('customer_login');
		   	 if($check_login==false){
		   	 	echo '<a href="login.php">Login</a>';
		   	 }
		   	 else{
                 echo  	'<a href="?customerid='.Session::get('customer_id').'">Logout</a>';//lấy customer_id gán vào customerid
                 echo '<a class="login" style="margin-top:20px;margin-left:0px;background:#6492d6;" href="profile.php">Profile</a>';
		   	 }
		   	 ?> 
		   </div>
		    <div class="search_box" >
				    <form>
				    	<input type="text" value="Search for Products" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search for Products';}"><input type="submit" value="SEARCH">
				    </form>
			    </div>
		 <div class="clear"></div>
	 </div>
	 <div class="clear"></div>
 </div>
<div class="menu">
	<ul id="dc_mega-menu-orange" class="dc_mm-orange">
	  <li><a href="index.php">Home</a></li>
	  <li><a href="foods.php">Foods</a> </li>
	  <li><a href="drinks.php">Drinks</a></li>
	  <li><a href="cart.php">Cart</a></li>
	  <li><a href="contact.php">Contact</a> </li>
	  <div class="clear"></div>
	</ul>
</div>