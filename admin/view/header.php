
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../public/css/admin.css">
  
    <script src="https://kit.fontawesome.com/95b5cd4c14.js" crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
</head>

<body>
    
        <div id="admin-dashboard">
            <!-- Header với avatar và tên -->
            <header>
                <h3>Fashion Store</h3>
              
                <div id="user-info">
                <i class="fa-regular fa-message" style="margin-right :30px;"></i>
                <i class="fa-regular fa-bell" style="margin-right :30px;"></i>
                    <a href="../index.php" style="text-decoration: none;color: white; margin-right :30px;">
                        Giao diện khách hàng 
                        <i class="fa-solid fa-house"></i>
                    </a>
                    <?php
                     if (isset($_SESSION['username']) && ($_SESSION['username'] != "")) {
                        // avatar and username
                        if (isset($_SESSION['avatar']) && !empty($_SESSION['avatar'])) {
                            if (base64_encode(base64_decode($_SESSION['avatar'], true)) === $_SESSION['avatar']) {
                                // Hiển thị ảnh đại diện từ dữ liệu base64 người dùng thêm từ ngoài
                                echo '<img src="data:image/jpeg;base64,' . $_SESSION['avatar'] . '" alt="Profile Picture" id="avatar">';
                            } else {
                                // Hiển thị ảnh đại diện từ đường dẫn khi chèn trong xampp
                                echo '<img src="data:image/jpeg;base64,' . base64_encode($_SESSION['avatar']) . '" alt="Profile Picture"  id="avatar">';
                            }
                        } else {
                            // Hiển thị ảnh mặc định nếu không có avatar
                            echo '<img src="view/images/avatar_default.jpg" alt="Default Profile Picture" id="avatar">';
                        }
                        // username
                          echo'<span id="user-name">' . $_SESSION['username'] . '</span>';
                     }
                     
                     
                    ?>  
                    

                    
                </div>
            </header>