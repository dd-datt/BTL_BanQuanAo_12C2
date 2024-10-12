<?php

include 'config/db_connect.php';

// Lấy ID sản phẩm từ URL
if (isset($_GET['id'])) {
    $id = $conn->real_escape_string($_GET['id']);

    // Truy vấn để lấy thông tin sản phẩm
    $sql = "SELECT * FROM sanpham WHERE id_sp = '$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
        // Hiển thị thông tin sản phẩm
        echo "<h1>" . $product['tensp'] . "</h1>";
        echo "<img src=' " . $product['anhsp'] . "' alt='" . $product['tensp'] . "'>";
        echo "<p>Giá: " . number_format($product['giagoc'], 0, ',', '.') . " VNĐ</p>";
        // Thêm các thông tin khác về sản phẩm nếu cần
    } else {
        echo "Không tìm thấy sản phẩm.";
    }
} else {
    echo "ID sản phẩm không hợp lệ.";
}

$conn->close();
