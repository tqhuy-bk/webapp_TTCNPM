<?php 
include 'inc/header.php' ?>
<?php 
 $check_login = Session::get('customer_login');
             if($check_login==false){
                header('Location:index.php');
             }
 ?>
 <?php 
   if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
      $id= Session::get('customer_id');
      $check_update_info= $customer->update_info_customer($_POST, $id);
   }
?>
 <style>
    .container{
     display: flex;
    width: 100%;
    flex-wrap: wrap;
    margin: 0px auto 20px;
}
*{
    box-sizing: border-box;
}
.gKGcfW {
    width: 250px;
    margin: 10px;
}
aside {
    display: block;
}
.hBHoW {
    display: flex;
    -webkit-box-align: center;
    align-items: center;
    padding-left: 7px;
    margin: 0px 0px 12px;
}
.hBHoW img {
    width: 45px;
    margin: 0px 12px 0px 0px;
    border-radius: 50%;
}
img {
    border-style: none;
    max-width: 100%;
}
.hBHoW .info {
    font-size: 13px;
    line-height: 15px;
    color: rgb(51, 51, 51);
    font-weight: 300;
    flex: 1 1 0%;
}
.uSLJP {
    font-size: 13px;
    margin: 0px;
    padding: 0px;
    list-style: none;
}
ul {
    display: block;
    list-style-type: disc;
    margin-block-start: 1em;
    margin-block-end: 1em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
    padding-inline-start: 40px;
}
li {
    display: list-item;
    text-align: -webkit-match-parent;
}
.uSLJP a:hover, .uSLJP a:active, .uSLJP a:focus, .uSLJP a.is-active {
    background-color: rgb(236, 236, 236);
    color: rgb(0, 0, 0);
}
.uSLJP a {
    display: flex;
    -webkit-box-align: center;
    align-items: center;
    color: rgb(74, 74, 74);
    padding: 7px 18px;
    text-decoration: none;
}
.uSLJP a svg, .uSLJP a .icon {
    width: 24px;
    height: 24px;
    font-size: 24px;
    color: rgb(155, 155, 155);
    margin: 0px 22px 0px 0px;
}
path[Attributes Style] {
    d: path("M 12 12 c 2.21 0 4 -1.79 4 -4 s -1.79 -4 -4 -4 s -4 1.79 -4 4 s 1.79 4 4 4 Z m 0 2 c -2.67 0 -8 1.34 -8 4 v 2 h 16 v -2 c 0 -2.66 -5.33 -4 -8 -4 Z");
}
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
    text-align: center;
    font-size: 16px;
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
.message {
    color: rgba(0, 0, 0, 0.65);
    margin: 20px 0px;
}
p {
    display: block;
    margin-block-start: 1em;
    margin-block-end: 1em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
}
.back {
    width: 190px;
    color: rgb(74, 74, 74);
    font-size: 14px;
    background-color: rgb(253, 216, 53);
    display: block;
    border-radius: 4px;
    padding: 10px 30px;
    margin: auto;
}
 </style>
 <?php 
     $get_info_customer=$customer->get_info();
        if($get_info_customer){
                 $result=$get_info_customer->fetch_assoc();
        }
?>
<div class="main">
    <div class="content">
    	<div class="container" style="background:#dbdee0;width:100%;margin:auto;min-height:500px;">
            <aside class=" gKGcfW">
                <div class="hBHoW"><img src="https://salt.tikicdn.com/desktop/img/avatar.png"><div class="info">Tài khoản của <strong> <?php echo $result['customerName'] ?></strong></div></div>
                <ul class="uSLJP">
                     <li>
                        <a href="profile.php">
                            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"></path></svg>
                             <span>Tài khoản của tôi</span></a>
                    </li>
                     <li>
                        <a href="changePassword.php">
                            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"></path></svg>
                            <span>Thay đổi mật khẩu</span></a>
                    </li>
                    <li>
                        <a class="is-active" href="mynotice.php">
                            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M12 22c1.1 0 2-.9 2-2h-4c0 1.1.89 2 2 2zm6-6v-5c0-3.07-1.64-5.64-4.5-6.32V4c0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5 1.5v.68C7.63 5.36 6 7.92 6 11v5l-2 2v1h16v-1l-2-2z"></path></svg>
                            <span>Thông báo của tôi</span>
                        </a>
                    </li>
                    <li>
                        <a class="" href="drawmoney.php">
                            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M20 4H4c-1.11 0-1.99.89-1.99 2L2 18c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2V6c0-1.11-.89-2-2-2zm0 14H4v-6h16v6zm0-10H4V6h16v2z"></path></svg>
                             <span>Nạp tiền</span>
                        </a>
                    </li>
                    <li>
                        <a class="" href="orderlist.php">
                            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M13 12h7v1.5h-7zm0-2.5h7V11h-7zm0 5h7V16h-7zM21 4H3c-1.1 0-2 .9-2 2v13c0 1.1.9 2 2 2h18c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 15h-9V6h9v13z"></path></svg>
                            <span>Đơn hàng đã đặt</span>
                        </a>
                    </li>
                </ul>
            </aside>
            <div class="edAZXd">
                <h3 class="jZJmua">Thông báo của tôi</h3>
                <div class="irgDVD">
                    <p class="message">Bạn chưa có thông báo</p>
                    <a style="text-decoration: none;" href="index.php" class="back">Tiếp tục mua sắm</a>
                </div>
            </div> 
        </div>
    </div>
</div>
<?php 
include 'inc/footer.php' ?>