<?php 
include 'inc/header.php' ?>
<?php 
 $check_login = Session::get('customer_login');
             if($check_login==false){
                header('Location:index.php');
             }
?>
<?php 
     $get_info_customer=$customer->get_info();
        if($get_info_customer){
                 $result=$get_info_customer->fetch_assoc();
        }
?>
<style>
.jFEIKb {
padding: 5px 10px 0px;
display: flex;
}
* {
box-sizing: border-box;
}
.fxjiAa {
    background-color: rgb(255, 255, 255);
    color: rgb(51, 51, 51);
    margin-top: 15px;
    padding: 10px 15px;
    border-width: 1px;
    border-style: solid;
    border-color: rgb(221, 221, 221);
    border-image: initial;
    border-radius: 3px;
}
.fxjiAa .title {
    display: flex;
    -webkit-box-pack: justify;
    justify-content: space-between;
    padding-bottom: 10px;
    font-size: 13px;
    line-height: 31px;
    border-bottom: 1px solid rgb(201, 201, 201);
}
.fxjiAa .title a {
    font-size: 12px;
    padding-left: 14px;
    padding-right: 14px;
    height: 31px;
    outline-color: rgb(204, 204, 204);
    color: rgb(51, 51, 51);
    border-width: 1px;
    border-style: solid;
    border-color: rgb(204, 204, 204);
    border-image: initial;
    background: linear-gradient(rgb(255, 255, 255), rgb(247, 247, 247));
    border-radius: 2px;
    text-decoration: none;
}
.fxjiAa .address .name {
    font-size: 15px;
    font-weight: 700;
    margin-top: 15px;
    margin-bottom: 10px;
}
.fxjiAa .address .street, .fxjiAa .address .phone {
    padding: 2px 0px;
}
.fxjiAa .address span {
    display: block;
    font-size: 13px;
}
.UHbjr {
    background-color: rgb(255, 255, 255);
    color: rgb(51, 51, 51);
    margin-top: 15px;
    padding: 10px 15px;
    border-width: 1px;
    border-style: solid;
    border-color: rgb(221, 221, 221);
    border-image: initial;
    border-radius: 3px;
}
.UHbjr .title {
    display: flex;
    -webkit-box-pack: justify;
    justify-content: space-between;
    padding-bottom: 10px;
    font-size: 13px;
    line-height: 31px;
    border-bottom: 1px solid rgb(201, 201, 201);
}
.UHbjr .title a {
    font-size: 12px;
    padding-left: 14px;
    padding-right: 14px;
    height: 31px;
    outline-color: rgb(204, 204, 204);
    color: rgb(51, 51, 51);
    border-width: 1px;
    border-style: solid;
    border-color: rgb(204, 204, 204);
    border-image: initial;
    background: linear-gradient(rgb(255, 255, 255), rgb(247, 247, 247));
    border-radius: 2px;
    text-decoration: none;
}
.UHbjr .cart {
    font-size: 12px;
}
.UHbjr .cart .product {
    margin-bottom: 15px;
}
.iylcMU {
    font-size: 11px;
    display: flex;
    -webkit-box-pack: justify;
    justify-content: space-between;
    padding: 12px 0px;
    border-bottom: 1px solid rgb(201, 201, 201);
}
.iylcMU .info {
    flex: 2 1 0%;
}
.iylcMU .info .qty {
    padding-right: 10px;
}
b, strong {
    font-weight: bolder;
}
.iylcMU .info .product-name {
    color: rgb(0, 127, 240);
    text-decoration: none;
}
a {
    background-color: transparent;
}
.iylcMU .info .seller-name {
    display: block;
    margin-top: 5px;
}
.iylcMU .price {
    text-align: right;
    flex: 1 1 0%;
}
.ifcYED {
    margin-bottom: 13px;
    position: relative;
}
.byenE {
    box-shadow: none;
    padding-left: 15px;
    overflow-y: hidden;
    max-height: 0px;
    margin: 0px auto;
    transition: max-height 0.3s ease-in-out 0s;
}
.byenE .sponsor__items {
    max-width: 550px;
    padding: 0px;
    margin: 15px 0px 0px;
    list-style: none;
}
.byenE .sponsor__item {
    display: flex;
    flex-wrap: nowrap;
    -webkit-box-pack: justify;
    justify-content: space-between;
    margin-bottom: 15px;
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
.byenE .sponsor__item {
    display: flex;
    flex-wrap: nowrap;
    -webkit-box-pack: justify;
    justify-content: space-between;
    margin-bottom: 15px;
}
li {
    display: list-item;
    text-align: -webkit-match-parent;
}
.byenE .sponsor__name {
    color: rgb(36, 36, 36);
    font-size: 12px;
    font-weight: 300;
}
.byenE .sponsor__prices {
    color: rgb(36, 36, 36);
    font-size: 12px;
    font-weight: 300;
}
.UHbjr .cart .price-summary .total {
    display: flex;
    -webkit-box-pack: justify;
    justify-content: space-between;
    padding-top: 12px;
    margin-bottom: 0px;
    line-height: 19px;
    font-weight: 700;
    border-top: 2px solid rgb(201, 201, 201);
}
.UHbjr .cart .price-summary .total .value {
    color: rgb(238, 35, 71);
    font-size: 19px;
    font-weight: 400;
    text-align: right;
}
.UHbjr .cart .price-summary .total .value i {
    display: block;
    font-size: 12px;
    color: rgb(51, 51, 51);
}
i {
    font-style: italic;
}
</style>
<div class="main">
    <div class="content">
    	<div class="container" style="background:#dbdee0;width:100%;margin:auto;min-height:500px;">
            <div class="jFEIKb">
                <div class="fxjiAa">
                    <div class="title">
                        <span>Địa chỉ giao hàng</span>
                        <a href="/checkout/shipping">Sửa</a>
                    </div>
                    <div class="address">
                        <span class="name">Trần Quang Huy</span>
                        <span class="street">KTX  Khu B ĐHQGTPHCM, Phường Dĩ An, Thị xã Dĩ An, Bình Dương Việt Nam</span><span class="phone">Điện thoại: 0919421719</span>
                    </div>
                </div>
                <div class="UHbjr">
                    <div class="title">
                        <span>Đơn hàng (1 sản phẩm)</span>
                        <a href="/checkout/cart?src=checkout_payment">Sửa</a>
                    </div>
                    <div class="cart">
                        <div class="product">
                            <div class="iylcMU">
                                <div class="info">
                                    <strong class="qty">1 x</strong>
                                    <a href="/tai-nghe-inpod-i12-tws-bluetooth-5-0-cho-iphone-va-android-kem-hop-sac-hang-nhap-khau-xanh-tim-than-p52403675.html?spid=52526875" target="_blank" class="product-name">Tai nghe Inpod i12 TWS Bluetooth 5.0 cho iPhone và Android kèm Hộp sạc</a>
                                    <span class="seller-name">Cung cấp bởi <strong>Hương Bảo</strong></span>
                                </div>
                                <div class="price">149.000 ₫</div>
                            </div>
                            <div class="iylcMU">
                                <div class="info">
                                    <strong class="qty">1 x</strong>
                                    <a href="/tai-nghe-inpod-i12-tws-bluetooth-5-0-cho-iphone-va-android-kem-hop-sac-hang-nhap-khau-xanh-tim-than-p52403675.html?spid=52526875" target="_blank" class="product-name">Tai nghe Inpod i12 TWS Bluetooth 5.0 cho iPhone và Android kèm Hộp sạc</a>
                                    <span class="seller-name">Cung cấp bởi <strong>Hương Bảo</strong></span>
                                </div>
                                <div class="price">149.000 ₫</div>
                            </div>
                        </div>
                        <div class="price-summary">
                            <div class="ifcYED">
                                <div class="inner">
                                    <div class="name">Tạm tính</div>
                                    <div class="value">149.000đ</div>
                                </div>
                            </div>
                            <div class="ifcYED">
                                <div class="inner">
                                    <div class="name">Phí vận chuyển<span class="sponsor__link">Chi tiết</span></div>
                                    <div class="value">21.901đ</div>
                                </div>
                                <div class="byenE">
                                    <ul class="sponsor__items">
                                        <li class="sponsor__item">
                                            <span class="sponsor__name">Phí ban đầu</span>
                                            <span class="sponsor__prices sponsor__prices--null">22.000đ</span>
                                        </li>
                                        <li class="sponsor__item">
                                            <span class="sponsor__name">Hương Bảo hỗ trợ</span>
                                            <span class="sponsor__prices sponsor__prices--positive">-99đ</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="total">
                                <div class="name">Thành tiền:</div>
                                <div class="value">170.901 ₫<i>(Đã bao gồm VAT nếu có)</i></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
include 'inc/footer.php' ?>