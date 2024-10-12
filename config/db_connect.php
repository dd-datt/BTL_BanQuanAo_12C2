<?php
// Kết nối database
$conn = new mysqli("localhost", "root", "", "ql_banhang");

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
