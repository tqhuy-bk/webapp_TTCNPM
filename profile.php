<?php 
include 'inc/header.php' ?>
<?php 
 $check_login = Session::get('customer_login');
		   	 if($check_login==false){
		   	 	header('Location:index.php');
		   	 }
 ?>
<div class="main">
    <div class="content">
    	<!-- <p style="color:red;font-size:30px;margin-left:20%;"> Dạ nhóm em chưa làm xong trang này</p> -->
    	<div style="background:#dbdee0;width:100%;margin:auto;height:500px;">
            <table class="tblone">
                <tr><th></th></tr>
            </table>
            <div style="font-size:25px;margin:2% 30%;"><h1 style="float:left;margin-right:10%;">Name:</h1><p> Trần Quang Huy1 </p></div>
            <div style="font-size:25px;margin:2% 30%;"><h1 style="float:left;margin-right:10%;">Email:</h1><p> huy@gmail.com </p></div>
            <div style="font-size:25px;margin:2% 30%;"><h1 style="float:left;margin-right:10%;">Phone:</h1><p> 65222625625625</p></div>
            <div style="font-size:25px;margin:2% 30%;"><h1 style="float:left;margin-right:10%;">Balance:</h1><p> 651561VND </p></div>
            <br>
            <br>
            <div style="margin:2% 30%;"> 
                <a href="changeProfiles.php"style="background: #0c5a6c;float:left; margin-right:40px;" class="buysubmit"> Edit Information </a>
                <a href="drawmoney.php"style="background: #0c5a6c;float:left;" class="buysubmit"> Draw Money </a>
            </div>
        </div>
    </div> 
</div>
<?php 
include 'inc/footer.php' ?>
