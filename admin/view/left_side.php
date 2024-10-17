<div class="content-wrapper">

<aside id="sidebar">
    <nav>
        <ul>
           
            <li>
                <a href="index.php?act=thongke" onclick="toggleSubmenu('statistics')">
                    <label for="">
                        Thống kê doanh thu
                        <i class="fa-solid fa-chart-simple"></i>
                    </label>

                </a>                 
            </li>
            <li>
                <a href="" onclick="toggleSubmenu('order-management')">
                    <label for="">
                        Quản lý đơn hàng
                        <i class="fa-solid fa-bars-progress"></i>
                    </label>
                </a>
                <ul id="order-management" class="submenu hidden">
                    <li><a href="#">Đơn trả hàng/hoàn tiền</a></li>
                    <li><a href="#">Cập nhập đơn hàng</a></li>  
                    <li><a href="#">Hóa đơn</a></li>  
                </ul>
            </li>
            <li>
                <a href="#" onclick="toggleSubmenu('product-management')">
                    <label for="">
                        Quản lý sản phẩm
                        <i class="fa-solid fa-bars-progress"></i>
                    </label>
                </a>
                <ul id="product-management" class="submenu hidden">
                    <li><a href="sanpham.php">Sản phẩm</a></li>
                    <li><a href="#">Danh mục sản phẩm</a></li>
                    <li><a href="#">Nhà cung cấp</a></li>
                </ul>
            </li>
            <li>
                <a href="#" onclick="toggleSubmenu('admin-management')">
                    <label for="">
                        Quản lý nhân viên
                        <i class="fa-solid fa-bars-progress"></i>
                    </label>
                </a>
                <ul id="admin-management" class="submenu hidden">
                    <li><a href="#">Thông tin nhân viên</a></li>
                    <li><a href="#">Phân quyền nhân viên</a></li>
                    
                </ul>
            </li>
            <li>
                <a href="#" onclick="toggleSubmenu('user-management')">
                    <label for="">
                        Quản lý khách hàng
                        <i class="fa-solid fa-bars-progress"></i>
                    </label>
                </a>
                <ul id="user-management" class="submenu hidden">
                    <li><a href="#">Thông tin Khách hàng</a></li>
                    <li><a href="#">Thông tin khách hàng thân thiết</a></li>
                </ul>
            </li>
            <li>
                <a href="#" onclick="toggleSubmenu('sales-management')">
                    <label for="">
                        Quản lý bán hàng
                        <i class="fa-solid fa-bars-progress"></i>
                    </label>
                </a>
                <ul id="sales-management" class="submenu hidden">
                    <li><a href="#">Voucher</a></li>
                    <li><a href="#">Các chương trình khuyến mãi</a></li>
                    <li><a href="#">Slider</a></li>
                </ul>
            </li>
            <li>
                <a href="#" onclick="toggleSubmenu('access-management')">
                    <label for="">
                        Quyền truy cập
                        <i class="fa-solid fa-bars-progress"></i>
                    </label>
                </a>
                <ul id="access-management" class="submenu hidden">
                    <li><a href="user_account.php">Tài khoản khách hàng</a></li>
                    <li><a href="#">Tài khoản nhân viên</a></li>
                </ul>
            </li>
            <li>
                <a href="#" onclick="toggleSubmenu('settings')">
                   <label for="">
                    Cài đặt
                    <i class="fa-solid fa-gear"></i>
                    </label>
                </a>
                <ul id="settings" class="submenu hidden">
                    <li><a href="#">Hệ thống</a></li>
                    <?php
                     if (isset($_SESSION['username']) && ($_SESSION['username'] != "")) {
                      echo' <li><a href="../index.php?act=logout">
                            Đăng xuất
                            <i class="fa-solid fa-right-from-bracket"></i>
                        </a></li>';
                     }

                    
                    ?>
                    
                </ul>
            </li>
        </ul>
    </nav>
</aside>
