
<?php include_once 'inc/header.php';?>
<?php include_once 'inc/sidebar.php';?>
<?php 
   include '../classes/order.php';
   include '../classes/admin.php';
   include_once '../helpers/format.php';
?> 
 <?php 
    $admin= new admin();
    $get_info_admin =$admin->get_info_admin();
        if($get_info_admin){
            $result=$get_info_admin->fetch_assoc();
        }
?> 
<?php 
   if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
      $id = Session::get('adminID');
      $check_update_info = $admin->update_info_admin($_POST, $id);
   }
?>
 <style>
    .edAZXd {
        flex: 1 1 0%;
    }
    .jZJmua {
        font-size: 19px;
        line-height: 21px;
        font-weight: 300;
        margin: 20px 0px 15px;
    }
    .irgDVD {
        background-color: rgb(255, 255, 255);
        padding: 30px 20px;
        border-radius: 4px;
        width:90%;
    }
    .irgDVD form {
        width: 70%;
    }
    form {
        display: block;
        margin-top: 0em;
    }
    .irgDVD .form-control {
        display: flex;
        -webkit-box-align: center;
        align-items: center;
        margin: 0px 0px 15px;
    }
    .irgDVD .input-label {
        width: 110px;
        min-width: 110px;
        font-size: 13px;
        color: rgb(51, 51, 51);
    }
    label {
        cursor: default;
    }
    .irgDVD .form-control > div {
        display: flex;
        position: relative;
        z-index: 1;
        flex: 1 1 0%;
    }
    .irgDVD .form-control input {
        flex: 1 1 0%;
    }
    .bYlDgr {
        height: 34px;
        line-height: 34px;
        transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s, -webkit-box-shadow 0.15s ease-in-out 0s;
        border-width: 1px;
        border-style: solid;
        border-color: rgb(204, 204, 204);
        border-image: initial;
        border-radius: 4px;
        padding: 6px 12px;
        outline: none;
    }
    button, input {
        overflow: visible;
    }
    button, input, optgroup, select, textarea {
        font-family: inherit;
        font-size: 100%;
        line-height: 1.15;
        margin: 0px;
    }


    input[type="radio" i] {
        background-color: initial;
        cursor: default;
        appearance: radio;
        box-sizing: border-box;
        margin: 3px 3px 0px 5px;
        padding: initial;
        border: initial;
    }
    input {
        -webkit-writing-mode: horizontal-tb !important;
        text-rendering: auto;
        color: -internal-light-dark(black, white);
        letter-spacing: normal;
        word-spacing: normal;
        text-transform: none;
        text-indent: 0px;
        text-shadow: none;
        display: inline-block;
        text-align: start;
        appearance: textfield;
        background-color: -internal-light-dark(rgb(255, 255, 255), rgb(59, 59, 59));
        -webkit-rtl-ordering: logical;
        cursor: text;
        margin: 0em;
        font: 400 13.3333px Arial;
        padding: 1px 2px;
        border-width: 2px;
        border-style: inset;
        border-color: -internal-light-dark(rgb(118, 118, 118), rgb(195, 195, 195));
        border-image: initial;
    }
    button, input {
        overflow: visible;
    }
    .irgDVD .input-label span {
        font-size: 11px;
        display: block;
        margin: 5px 0px 0px;
    }
    .irgDVD .btn-submit {
        width: 176px;
        height: 40px;
        color: rgb(74, 74, 74);
        font-size: 14px;
        background-color: rgb(253, 216, 53);
        cursor: pointer;
        border-width: 0px;
        border-style: initial;
        border-color: initial;
        border-image: initial;
        border-radius: 4px;
    }
 </style>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Admin</h2>
                <div class="edAZXd">
                    <h3 class="jZJmua">Thông tin tài khoản</h3>
                    <div class="irgDVD">
                        <form action="" method="post">
                           
                            <div class="form-control ">
                                <label class="input-label">Tên</label>
                                <div><input type="text" name="adminName" maxlength="128" class="bYlDgr" value="<?php echo $result['adminName'] ?>"></div>
                            </div>
                            <div class="form-control ">
                                <label class="input-label">Tên đăng nhập</label>
                                <div><input type="text" name="adminUser" maxlength="128" class="bYlDgr" value="<?php echo $result['adminUser'] ?>"></div>
                            </div>
                            <div class="form-control ">
                                <label class="input-label">Chức vụ</label><div><input type="text" name="role" class="bYlDgr" disabled="" value="<?php echo $result['role'] ?>"></div>
                            </div>
                            <div class="form-control">
                                <label class="input-label">Email</label>
                                <input type="text" name="adminEmail" class="bYlDgr" value="<?php echo $result['adminEmail'] ?>">
                            </div>
                            <div class="form-control">
                                <label class="input-label">&nbsp;</label>
                                <button type="submit" name= "submit" class="btn-submit">Cập nhật</button>
                            </div>
                            <?php  
                                    if(isset($check_update_info)){
                                        echo $check_update_info;
                                    }
                                ?>
                        </form>
                    </div>
                </div> 
                
            </div>
        </div>
   }
<?php include 'inc/footer.php';?>
