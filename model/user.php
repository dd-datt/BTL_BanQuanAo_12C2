<?php


// Hàm kiểm tra xem người dùng đã tồn tại chưa
function checkUserExist($conn, $username) {
    // Chuẩn bị câu truy vấn với tham số
    $stmt = $conn->prepare("SELECT id FROM users WHERE username = ?");

    // Ràng buộc tham số
    $stmt->bind_param("s", $username);

    // Thực thi truy vấn
    $stmt->execute();

    // Lấy kết quả
    $result = $stmt->get_result();

    // Kiểm tra nếu có kết quả trả về (người dùng đã tồn tại)
    if ($result->num_rows > 0) {
        return true; // Người dùng đã tồn tại
    } else {
        return false; // Người dùng không tồn tại
    }

    // Đóng statement
    $stmt->close();
}

// Hàm tạo người dùng mới
function createUser($conn, $username, $password, $email, $role = 0, $avatar = 'view/images/avatar_default.jpg', $hashPassword = true) {
    // Nếu không mã hóa mật khẩu
    if ($hashPassword) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    } else {
        $hashedPassword = $password; // Sử dụng mật khẩu dưới dạng văn bản thuần túy
    }

    // Chuẩn bị câu truy vấn với tham số
    $stmt = $conn->prepare("INSERT INTO users (username, password, email, role, avatar) VALUES (?, ?, ?, ?, ?)");
    
    // Ràng buộc tham số
    $stmt->bind_param("sssis", $username, $hashedPassword, $email, $role, $avatar);

    // Thực thi truy vấn
    if ($stmt->execute()) {
        return true; // Tạo người dùng thành công
    } else {
        return false; // Tạo người dùng thất bại
    }

    // Đóng statement
    $stmt->close();
}

// Hàm lấy thông tin người dùng
function getUserinfo($conn, $username) {
    // Kiểm tra xem kết nối còn mở không
    if ($conn->connect_errno) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }

    // Chuẩn bị câu truy vấn với tham số
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");

  
    // câu truy vấn trong hàm getUserinfo
        $stmt = $conn->prepare("SELECT id, username, password, role, avatar, email FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return null; // Trả về null nếu không có kết quả
        }
    }
    function updateUserAvatar($conn, $userId, $avatarData) {
        $sql = "UPDATE users SET avatar = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('si', $avatarData, $userId);
        return $stmt->execute();
    }
    
    function saveAvatarToDatabase($conn, $userId, $avatarData) {
        // Sử dụng truy vấn SQL để cập nhật avatar trong bảng người dùng
        $sql = "UPDATE users SET avatar = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $avatarData, $userId);
        return $stmt->execute();
    }
    function getAvatarFromDatabase($conn, $userId,$avatarData) {
        $stmt = $conn->prepare("SELECT avatar FROM users WHERE id = ?");
        $stmt->bind_param("i", $userId); // Giả sử ID người dùng là kiểu integer
        $stmt->execute();
        $stmt->bind_result($avatarData);
        
        if ($stmt->fetch()) {
            // Kiểm tra nếu avatar không phải là null
            if ($avatarData) {
                return base64_encode($avatarData); // Trả về avatar mã hóa Base64
            }
        }
        
        return null; // Không tìm thấy avatar
    }
    


?>