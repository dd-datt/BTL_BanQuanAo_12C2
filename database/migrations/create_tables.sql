
CREATE DATABASE ql_banhang;

USE ql_banhang;

-- Cấu trúc bảng cho bảng `admin`
CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sdt` varchar(20) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `ngaysinh` date DEFAULT NULL,
  `diachi` varchar(255) DEFAULT NULL,
  `gioitinh` enum('Nam','Nữ') DEFAULT NULL,
  `anhavt` longblob DEFAULT NULL,
  `role` enum('admin','manager') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Cấu trúc bảng cho bảng `danhmucsp`
CREATE TABLE `danhmucsp` (
  `id_danhmucsp` int(11) NOT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `tendanhmucsp` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Cấu trúc bảng cho bảng `doanhthu`
CREATE TABLE `doanhthu` (
  `id_donhang` int(11) DEFAULT NULL,
  `tongtien` float DEFAULT NULL,
  `id_admin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Cấu trúc bảng cho bảng `donhang`
CREATE TABLE `donhang` (
  `id_donhang` int(11) NOT NULL,
  `id_kh` int(11) DEFAULT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `id_sp` int(11) DEFAULT NULL,
  `order_date` datetime DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `return_status` varchar(255) DEFAULT NULL,
  `tongtien` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Cấu trúc bảng cho bảng `khachhang`
CREATE TABLE `khachhang` (
  `id_kh` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sdt` varchar(20) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `ngaysinh` date NOT NULL,
  `diachi` varchar(255) DEFAULT NULL,
  `gioitinh` enum('Nam','Nữ') DEFAULT NULL,
  `anhavt` longblob NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Cấu trúc bảng cho bảng `khuyenmai`
CREATE TABLE `khuyenmai` (
  `id_km` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `discount_percent` decimal(5,2) DEFAULT NULL,
  `id_sp` int(11) DEFAULT NULL,
  `id_admin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Cấu trúc bảng cho bảng `sanpham`
CREATE TABLE `sanpham` (
  `id_sp` int(11) NOT NULL,
  `tensp` varchar(255) NOT NULL,
  `motasp` text NOT NULL,
  `giagoc` float NOT NULL,
  `giakm` float,
  `anhsp` longblob DEFAULT NULL,
  `mausac` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `soluongsp` int(11) NOT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `id_danhmucsp` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Thêm khóa chính và các chỉ mục
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

ALTER TABLE `danhmucsp`
  ADD PRIMARY KEY (`id_danhmucsp`),
  ADD KEY `id_admin` (`id_admin`);

ALTER TABLE `doanhthu`
  ADD KEY `id_donhang` (`id_donhang`),
  ADD KEY `id_admin` (`id_admin`);

ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id_donhang`),
  ADD KEY `id_kh` (`id_kh`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_sp` (`id_sp`);

ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`id_kh`);

ALTER TABLE `khuyenmai`
  ADD PRIMARY KEY (`id_km`),
  ADD KEY `id_sp` (`id_sp`),
  ADD KEY `id_admin` (`id_admin`);

ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id_sp`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_danhmucsp` (`id_danhmucsp`);

-- AUTO_INCREMENT cho các bảng
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `danhmucsp`
  MODIFY `id_danhmucsp` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `donhang`
  MODIFY `id_donhang` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `khachhang`
  MODIFY `id_kh` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `khuyenmai`
  MODIFY `id_km` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `sanpham`
  MODIFY `id_sp` int(11) NOT NULL AUTO_INCREMENT;

-- Ràng buộc khóa ngoại
ALTER TABLE `danhmucsp`
  ADD CONSTRAINT `danhmucsp_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`);

ALTER TABLE `doanhthu`
  ADD CONSTRAINT `doanhthu_ibfk_1` FOREIGN KEY (`id_donhang`) REFERENCES `donhang` (`id_donhang`),
  ADD CONSTRAINT `doanhthu_ibfk_2` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`);

ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`id_kh`) REFERENCES `khachhang` (`id_kh`),
  ADD CONSTRAINT `donhang_ibfk_2` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`),
  ADD CONSTRAINT `donhang_ibfk_3` FOREIGN KEY (`id_sp`) REFERENCES `sanpham` (`id_sp`);

ALTER TABLE `khuyenmai`
  ADD CONSTRAINT `khuyenmai_ibfk_1` FOREIGN KEY (`id_sp`) REFERENCES `sanpham` (`id_sp`),
  ADD CONSTRAINT `khuyenmai_ibfk_2` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`);

ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`),
  ADD CONSTRAINT `sanpham_ibfk_2` FOREIGN KEY (`id_danhmucsp`) REFERENCES `danhmucsp` (`id_danhmucsp`);


DELIMITER //
CREATE TRIGGER calculate_giakm_before_insert
BEFORE INSERT ON sanpham
FOR EACH ROW
BEGIN
    DECLARE discount_percent DECIMAL(5,2);
    
    -- Get the discount percentage for this product from the khuyenmai table
    SELECT km.discount_percent INTO discount_percent
    FROM khuyenmai km
    WHERE km.id_sp = NEW.id_sp
    LIMIT 1;
    
    -- If a discount exists, calculate the discounted price
    IF discount_percent IS NOT NULL THEN
        SET NEW.giakm = NEW.giagoc * (1 - discount_percent / 100);
    ELSE
        -- If no discount, set giakm to the original price
        SET NEW.giakm = NEW.giagoc;
    END IF;
END//
DELIMITER ;