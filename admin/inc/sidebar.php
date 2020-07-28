

<div class="grid_2">
    <div class="box sidemenu">
        <div class="block" id="section-menu">
            <ul class="section menu">
                                <!-- <li><a class="menuitem">Site Option</a>
                    <ul class="submenu">
                        <li><a href="titleslogan.php">Title & Slogan</a></li>
                        <li><a href="social.php">Social Media</a></li>
                        <li><a href="copyright.php">Copyright</a></li>
                        
                    </ul>
                </li> -->

                <?php $level= Session::get('level')?>
                <li><a href="infoAdmin.php"class="menuitem" style=" background:#ef9478;">Tài khoản của tôi</a></li>
                <?php 
                    if($level==1){
                      echo '
                      <li><a class="menuitem" style=" background:#ef9478;">Product</a>
                            <ul class="submenu">
                                <li><a href="productlist.php">Danh sách mặt hàng</a> </li>
                            </ul>
                      </li>
                      <li><a class="menuitem" style=" background:#ef9478;">Tùy chỉnh nhà cung cấp</a>
                            <ul class="submenu">
                                <li><a href="vendoradd.php">Thêm nhà cung cấp</a> </li>
                                <li><a href="vendorlist.php">Danh sách nhà cung cấp</a> </li>
                            </ul>
                      </li>
                     <li><a class="menuitem" style=" background:#ef9478;">Tùy chỉnh danh mục</a>
                            <ul class="submenu">
                                <li><a href="catadd.php">Thêm danh mục mới</a> </li>
                                <li><a href="catlist.php">Danh sách danh mục</a> </li>
                            </ul>
                     </li>
                     <li><a class="menuitem" style=" background:#ef9478;">Thành viên</a>
                                <ul class="submenu">
                                <li><a href="memeber.php">Danh sách thành viên</a> </li>
                            </ul>
                        </li>
                      ';
                    }
                 ?>
                 <?php 
                    if($level==2){
                      echo '
                      <li><a class="menuitem" style=" background:#ef9478;">Mặt hàng</a>
                            <ul class="submenu">
                                <li><a href="productlist.php">Danh sách mặt hàng</a> </li>
                            </ul>
                      </li>
                      <li><a class="menuitem" style=" background:#ef9478;">Tùy chỉnh nhà cung cấp</a>
                            <ul class="submenu">
                                <li><a href="vendorlist.php">Danh sách nhà cung cấp</a> </li>
                            </ul>
                      </li>
                     <li><a class="menuitem" style=" background:#ef9478;">Tùy chỉnh danh mục</a>
                            <ul class="submenu">
                                <li><a href="catlist.php">Danh sách danh mục</a> </li>
                            </ul>
                     </li>
                      ';
                    }
                 ?>
				 <?php 
                    if($level==3){
                      echo '
                      <li><a class="menuitem" style=" background:#ef9478;">Mặt hàng</a>
                            <ul class="submenu">
                                <li><a href="productadd.php">Thêm mặt hàng mới</a> </li>
                                <li><a href="productlist.php">Danh sách mặt hàng</a> </li>
                            </ul>
                      </li>
                     <li><a class="menuitem" style=" background:#ef9478;">Tùy chỉnh danh mục</a>
                            <ul class="submenu">
                                <li><a href="catadd.php">Thêm danh mục mới</a> </li>
                                <li><a href="catlist.php">Danh sách danh mục</a> </li>
                            </ul>
                     </li>
                      <li><a class="menuitem" style=" background:#ef9478;">Đơn hàng</a>
                    <ul class="submenu">
                        <li><a href="vieworder.php">Xem đơn hàng</a> </li>
                    </ul>
                </li>
            
                <li><a class="menuitem" style=" background:#ef9478;" href="warelist.php">Nhà kho</a>
                    <ul class="submenu">
                        <li><a href="wareadd.php">Thêm hàng mới vào kho</a> </li>
                        <li><a href="wareorderlist.php">Xem danh sách yêu cầu lấy hàng từ bếp</a> </li>
                    </ul>
                </li>
                      ';
                    }
                 ?>
                 <?php 
                    if($level==4){
                      echo '
                      <li><a class="menuitem" style=" background:#ef9478;">Mặt hàng</a>
                            <ul class="submenu">
                                <li><a href="productlist.php">Danh sách mặt hàng</a> </li>
                            </ul>
                      </li>
                     <li><a class="menuitem" style=" background:#ef9478;">Tùy chỉnh danh mục</a>
                            <ul class="submenu">
                                <li><a href="catadd.php">Thêm danh mục mới</a> </li>
                                <li><a href="catlist.php">Danh sách danh mục</a> </li>
                            </ul>
                     </li>
                      <li><a class="menuitem" style=" background:#ef9478;">Đơn hàng</a>
                    <ul class="submenu">
                        <li><a href="vieworder.php">Xem đơn hàng</a> </li>
                    </ul>
                </li>
            
                <li><a class="menuitem" style=" background:#ef9478;" href="warelist.php">Nhà kho</a>
                    <ul class="submenu">
                        <li><a href="wareordersend.php">Yêu cầu lấy hàng trong kho</a> </li>
                    </ul>
                </li>
                      ';
                    }
                 ?>
                <!-- <li><a class="menuitem">Update Pages</a>
                    <ul class="submenu">
                        <li><a>About Us</a></li>
                        <li><a>Contact Us</a></li>
                    </ul>
                </li> -->
				<!-- <li><a class="menuitem">Slider Option</a>
                    <ul class="submenu">
                        <li><a href="addslider.php">Add Slider</a> </li>
                        <li><a href="sliderlist.php">Slider List</a> </li>
                    </ul>
                </li> -->
                 
               
                <br>
                <br>
                <br>
                
                <br>
                <br> 
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br> 
                <br>
                <br>
                <br>
                <br>
             
               
               
            </ul>
        </div>
    </div>
</div>
