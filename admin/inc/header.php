<<<<<<< HEAD
<?php 
  include '../lib/session.php';
  Session::checkSession();
 ?>
<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="css/reset.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/text.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/grid.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/layout.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/nav.css" media="screen" />
    <link href="css/table/demo_page.css" rel="stylesheet" type="text/css" />
    <!-- BEGIN: load jquery -->
   
    <!-- END: load jquery -->
     <script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
            setSidebarHeight();
        });
    </script>

</head>
<body>
    <div class="container_12">
        <div class="grid_12 header-repeat">
            <div id="branding">
                <div class="floatleft logo">
                    <img src="img/logo0.png" alt="Logo" />
                </div>
                <div class="floatleft middle">
                    <h1>Shopruner</h1>
                    <p>Love it. Get it</p>
                </div>
                <div class="floatright">
                    <div class="floatleft">
                        <img src="img/img-profile.jpg" alt="Profile Pic" /></div>
                    <div class="floatleft marginleft10">
                        <ul class="inline-ul floatleft">
                            <li>Xin chào <?php echo Session::get('adminName')?></li>
                            <?php 
                              if(isset($_GET['action']) && $_GET['action'] == 'logout'){
                                Session::destroy();
                              }
                             ?>
                            <li><a href="?action=logout">Đăng xuất</a></li>
                        </ul>
                    </div>
                </div>
                <div class="clear">
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
        <div class="grid_12">
            <ul class="nav main">
                <li class="ic-dashboard"><a href="index.php"><span>Trang chủ</span></a> </li>
                <li class="ic-form-style"><a href="infoAdmin.php"><span>Thông tin tài khoản</span></a></li>
                <li class="ic-typography"><a href="changepassword.php"><span>Đổi mật khẩu</span></a></li>
                <li class="ic-grid-tables"><a href="../index.php"><span>Trang chủ Web</span></a></li>
            </ul>
        </div>
        <div class="clear">
        </div>
=======
<?php 
  include '../lib/session.php';
  Session::checkSession();
 ?>
<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="css/reset.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/text.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/grid.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/layout.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/nav.css" media="screen" />
    <link href="css/table/demo_page.css" rel="stylesheet" type="text/css" />
    <!-- BEGIN: load jquery -->
   
    <!-- END: load jquery -->
     <script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
            setSidebarHeight();
        });
    </script>

</head>
<body>
    <div class="container_12">
        <div class="grid_12 header-repeat">
            <div id="branding">
                <div class="floatleft logo">
                    <img src="img/logo0.png" alt="Logo" />
                </div>
                <div class="floatleft middle">
                    <h1>Shopruner</h1>
                    <p>Love it. Get it</p>
                </div>
                <div class="floatright">
                    <div class="floatleft">
                        <img src="img/img-profile.jpg" alt="Profile Pic" /></div>
                    <div class="floatleft marginleft10">
                        <ul class="inline-ul floatleft">
                            <li>Xin chào <?php echo Session::get('adminName')?></li>
                            <?php 
                              if(isset($_GET['action']) && $_GET['action'] == 'logout'){
                                Session::destroy();
                              }
                             ?>
                            <li><a href="?action=logout">Đăng xuất</a></li>
                        </ul>
                    </div>
                </div>
                <div class="clear">
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
        <div class="grid_12">
            <ul class="nav main">
                <li class="ic-dashboard"><a href="index.php"><span>Trang chủ</span></a> </li>
                <li class="ic-form-style"><a href="infoAdmin.php"><span>Thông tin tài khoản</span></a></li>
                <li class="ic-typography"><a href="changepassword.php"><span>Đổi mật khẩu</span></a></li>
                <li class="ic-grid-tables"><a href="../index.php"><span>Trang chủ Web</span></a></li>
            </ul>
        </div>
        <div class="clear">
        </div>
>>>>>>> c49b992b33ec8abcd70266ce4f96e853d6c6d545
