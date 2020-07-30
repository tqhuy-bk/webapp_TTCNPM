<<<<<<< HEAD


<div class="grid_2">
    <div class="box sidemenu">
        <div class="block" id="section-menu">
            <ul class="section menu">
                          

                <?php $level= Session::get('level')?>
                <?php 
                    if($level==1){
                      echo '
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
                                <li><a href="memberadd.php">Thêm thành viên</a> </li>
                                <li><a href="member.php">Danh sách thành viên</a> </li>
                            </ul>
                      </li>
                       <li><a class="menuitem" style=" background:#ef9478;" href="#"> Tùy chỉnh Slider</a>
                            <ul class="submenu">
                                <li><a href="slideradd.php">Thêm Slider</a> </li>
                                <li><a href="sliderlist.php">Danh sách Slider</a> </li>
                            </ul>
                        </li>
                        <li><a class="menuitem" style=" background:#ef9478;">Thông tin hệ thống</a>
                          <ul class="submenu">
                              <li><a>Cập nhập thông tin</a></li>
                              <li><a>Liên hệ</a></li>
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
                        <li><a href="wareorderlist.php">Danh sách yêu cầu nhập nguyên liệu</a> </li>
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
                        <li><a href="wareordersend.php">Yêu cầu nhập nguyên liệu</a> </li>
                    </ul>
                </li>
                      ';
                    }
                 ?>
                 
                <?php 
                    if($level==5){
                      echo '
                      <li><a class="menuitem" style=" background:#ef9478;">Product</a>
                            <ul class="submenu">
                                <li><a href="unpaidlist.php">Đơn hàng đang chờ</a> </li>
                            </ul>
                      </li>
                     
                      ';
                    }
                 ?>
                 
               
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
=======


<div class="grid_2">
    <div class="box sidemenu">
        <div class="block" id="section-menu">
            <ul class="section menu">
                          

                <?php $level= Session::get('level')?>
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
                                <li><a href="memberadd.php">Thêm thành viên</a> </li>
                                <li><a href="member.php">Danh sách thành viên</a> </li>
                            </ul>
                      </li>
                      
                       <li><a class="menuitem" style=" background:#ef9478;" href="#">Slider Option</a>
                            <ul class="submenu">
                                <li><a href="slideradd.php">Add Slider</a> </li>
                                <li><a href="sliderlist.php">Slider List</a> </li>
                            </ul>
                        </li>
                        <li><a class="menuitem" style=" background:#ef9478;">Update Pages</a>
                          <ul class="submenu">
                              <li><a>About Us</a></li>
                              <li><a>Contact Us</a></li>
                          </ul>
                        </li> 
                        <li><a class="menuitem" style=" background:#ef9478;" href="warelist.php">Nhà kho</a>
                            <ul class="submenu">
                                <li><a href="wareadd.php">Thêm hàng mới vào kho</a> </li>
                                <li><a href="wareorderlist.php">Xem danh sách yêu cầu lấy hàng từ bếp</a> </li>
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
>>>>>>> c49b992b33ec8abcd70266ce4f96e853d6c6d545
