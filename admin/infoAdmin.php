<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
   include '../classes/product.php';
   include '../classes/category.php';
   include_once '../helpers/format.php';
 ?>

<div class="grid_10">
    <div class="content">
        <div class="container" style="background:#dbdee0;width:100%;margin:auto;min-height:500px;">
            
            <div class="edAZXd">
                <h3 class="jZJmua">Thông tin tài khoản</h3>
                <div class="irgDVD">
                    <form action="" method="post">
                        <?php 
                        $level=Session::get('level');
                        $adminName=Session::get('adminName');
                        $adminEmail=Session::get('adminEmail');
                        $vendorname=Session::get('vendorname');
                        $vendorid=Session::get('vendorid');
                        echo "Họ và tên: " ;echo $adminName;
                        echo "    Email: " ;echo $adminEmail;
                        if($level==1){                          
                        echo "     Chức vụ: nhân viên IT" ;
                        }
                        if($level==2){                          
                        echo "     Chức vụ: Quản trị cao cấp";
                        }
                        if($level==3){                          
                        echo "    Chức vụ: Quản lý quầy ";echo $vendorname;echo "\n";
                        }
                        if($level==4){                          
                        echo "    Chức vụ: Đầu bếp quầy "; echo $vendorname;
                        }
                        ?>                        
                    </form>
        </div>
    </div> 
</div>
</div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
        setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
