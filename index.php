   <?php
   session_start(); // Khởi động session
   ob_start();
//    Kết nối database
    include __DIR__ . '/config/db_connect.php';
    include 'model/user.php';

    if (isset($_GET['act'])) {
        switch ($_GET['act']) {
            case 'sigin': // sigin là tên action của form dangky
                if (isset($_POST['sigin'])) {
                    // Lấy dữ liệu từ form đăng ký
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $email = $_POST['email'];

                    // Kiểm tra xem người dùng đã tồn tại chưa
                    $existingUser = checkUserExist($conn, $username, $email);
                    if ($existingUser) {
                        // Nếu người dùng đã tồn tại, báo lỗi
                        echo "<p style='color:red;'>Username or email already exists.</p>";
                    } else {
                        // Nếu không tồn tại, tiếp tục xử lý đăng ký
                        $result = createUser($conn, $username, $password, $email);
                        if ($result) {
                            // Đăng ký thành công, lưu thông tin vào session
                            $_SESSION['username'] = $username;
                            $_SESSION['role'] = 0; // Đặt role mặc định là 0 cho người dùng mới (customer)
                            $_SESSION['avatar'] = 'view/images/avatar_default.jpg'; // Ảnh mặc định

                            // Chuyển hướng đến trang chính sau khi đăng ký thành công
                            header("Location: dangnhap.php");
                            exit();
                        } else {
                            // Nếu có lỗi trong quá trình tạo người dùng
                            echo "<p style='color:red;'>Registration failed. Please try again.</p>";
                        }
                    }
                }
                break;

            case 'login':// tương tự sigin - của form dangnhap
                if (isset($_POST['login'])) {
                    $username = $_POST['username'];
                    $password = $_POST['password'];

                    $userInfo = getUserinfo($conn, $username);
                    if ($userInfo) {
                        // Kiểm tra xem mật khẩu có phải đã mã hóa hay không
                        if (password_verify($password, $userInfo[0]['password'])) {
                            // Mật khẩu đã mã hóa
                            $role = (int)$userInfo[0]['role'];
                            $_SESSION['role'] = $role;
                            $_SESSION['iduser'] = $userInfo[0]['id'];
                            $_SESSION['username'] = $userInfo[0]['username'];
                            $_SESSION['email'] = $userInfo[0]['email'];

                            // Lưu đường dẫn ảnh vào session
                            $_SESSION['avatar'] = !empty($userInfo[0]['avatar']) ? $userInfo[0]['avatar'] : 'view/images/avatar_default.jpg';

                            // Chuyển hướng dựa trên vai trò
                            if ($role === 1) { // Nếu role = 1, vào trang admin
                                header("Location: admin/index.php");
                            } elseif ($role === 0) { // Nếu role = 0, vào trang customer
                                header("Location: index.php");
                            } else {
                                echo "<p style='color:red;'>Invalid user role: " . htmlspecialchars($role) . "</p>";
                            }
                            exit();
                        } else {
                            // Nếu không mã hóa mật khẩu, so sánh trực tiếp
                            if ($password === $userInfo[0]['password']) {
                                // Mật khẩu không được mã hóa
                                $role = (int)$userInfo[0]['role'];
                                $_SESSION['role'] = $role;
                                $_SESSION['iduser'] = $userInfo[0]['id'];
                                $_SESSION['username'] = $userInfo[0]['username'];
                                $_SESSION['email'] = $userInfo[0]['email'];


                                // Lưu đường dẫn ảnh vào session
                                $_SESSION['avatar'] = !empty($userInfo[0]['avatar']) ? $userInfo[0]['avatar'] : 'view/images/avatar_default.jpg';

                                // Chuyển hướng dựa trên vai trò
                                if ($role === 1) { // Nếu role = 1, vào trang admin
                                    header("Location: admin/index.php");
                                } elseif ($role === 0) { // Nếu role = 0, vào trang customer
                                    header("Location: index.php");
                                } else {
                                    echo "<p style='color:red;'>Invalid user role: " . htmlspecialchars($role) . "</p>";
                                }
                                exit();
                            } else {
                                echo "<p style='color:red;'>Invalid username or password.</p>";
                                header("Location: dangnhap.php");//// đăng nhập thất bại
                            }
                        }
                    } else {
                        echo "<p style='color:red;'>Invalid username or password.</p>";
                        header("Location: dangnhap.php");// đăng nhập thất bại
                    }
                }
                break;

            

            case 'logout':// Đăng xuất không cần dùng form gắn vào href "index.php?act=logout"
                session_unset(); // Xóa tất cả các biến session
                session_destroy(); // Hủy session
                header('Location: index.php');// Chuyển hướng về trang chủ
                exit(); // Dừng script
        }
    }


    include 'view/header.php';

    ?>
<!-- ----------------------------------------------------------------------------------------------------->

   <!-- Phần body -->

   <body>
       <div class="container" style="min-height: 80vh;">
           <nav>
               <ul>
                   <li><a href="index.php?category=all">Tất cả danh mục</a></li>
                   <?php

                    // kết nối db

                    // Lấy danh sách danh mục
                    $sql = "SELECT * FROM danhmucsp";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<li><a href='index.php?category=" . $row["id_danhmucsp"] . "'>" . $row["tendanhmucsp"] . "</a></li>";
                        }
                    }
                    ?>
               </ul>
           </nav>

           <form class="search-form" action="index.php" method="GET">
               <input type="text" name="search" placeholder="Tìm kiếm sản phẩm...">
               <button type="submit">Tìm kiếm</button>
           </form>

           <div class="product-grid">
               <?php
                // Xử lý lọc sản phẩm theo danh mục hoặc tìm kiếm
                $where = "";
                if (isset($_GET['category']) && $_GET['category'] != 'all') {
                    $category = $conn->real_escape_string($_GET['category']);
                    $where = "WHERE s.id_danhmucsp = '$category'";
                } elseif (isset($_GET['search'])) {
                    $search = $conn->real_escape_string($_GET['search']);
                    $where = "WHERE s.tensp LIKE '%$search%'";
                }

                // Lấy danh sách sản phẩm
                $sql = "SELECT s.*, k.discount_percent 
                    FROM sanpham s 
                    LEFT JOIN khuyenmai k ON s.id_sp = k.id_sp 
                    $where 
                    ORDER BY RAND() 
                    LIMIT 12";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $discountedPrice = $row["giagoc"];
                        if ($row["discount_percent"]) {
                            $discountedPrice = $row["giagoc"] * (1 - $row["discount_percent"] / 100);
                        }
                        echo "<div class='product-card'>";
                        echo "<a href='product_detail.php?id=" . $row["id_sp"] . "'>";
                        echo " <img src='" . $row['anhsp'] . "' alt='" . $row["tensp"] . "'>";
                        echo "<h3>" . $row["tensp"] . "</h3>";
                        echo "<p class='price'>" . number_format($discountedPrice, 0, ',', '.') . " VNĐ</p>";
                        if ($row["discount_percent"]) {
                            echo "<p class='old-price'>" . number_format($row["giagoc"], 0, ',', '.') . " VNĐ</p>";
                            echo "<p class='discount'>Giảm giá: " . $row["discount_percent"] . "%</p>";
                        }
                        echo "</a>";
                        echo "</div>";
                    }
                } else {
                    echo "<p>Không tìm thấy sản phẩm nào.</p>";
                }

                $conn->close();
                ?>
           </div>
       </div>
   </body>


   <?php include 'view/footer.php' ?>
   </body>

   </html>