<?php 
   include '../classes/adminlogin.php';
?>
<?php
   $class  = new adminlogin();  
   if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $adminUser = $_POST['adminUser'];
      $adminPass = md5($_POST['adminPass']);
      $login_check = $class->login_admin($adminUser, $adminPass);
   }
 ?> 
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
    
</head>
<body>
<div class="container">
	<section id="content">
		<form action="login.php" method="post">
			<h1>Đăng nhập (Quản trị viên)</h1>
			<span><?php 
			   if(isset($login_check)){
			   	echo $login_check;
			   }
			 ?></span>
			<div>
				<input type="text" placeholder="Tên đăng nhập" required="" name="adminUser"/>
			</div>
			<div>
				<input type="password" placeholder="Mật khẩu..."  required="" name="adminPass"/>
			</div>
			<div>
				<input type="submit" value="Đăng nhập" />
			</div>
		</form><!-- form -->
		<div class="button">
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>