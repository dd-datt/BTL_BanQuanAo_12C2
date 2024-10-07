-- Ví dụ:
-- CREATE TABLE users (
--     id INT AUTO_INCREMENT PRIMARY KEY,
--     username VARCHAR(50) NOT NULL UNIQUE,
--     email VARCHAR(100) NOT NULL UNIQUE,
--     password VARCHAR(255) NOT NULL,
--     created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
-- );

CREATE DATABASE BTL_WebBanQuanAo;

USE BTL_WebBanQuanAo;

CREATE TABLE adminn (
    id_admin INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    sdt VARCHAR(20),
    password VARCHAR(255) NOT NULL,
    ngaysinh DATE,
    diachi VARCHAR(255),
    gioitinh ENUM("Nam", "Nữ"),
    anhavt LONGBLOB,
    role ENUM("admin", "manager"),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE khachhang (
    id_kh INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    sdt VARCHAR(20),
    password VARCHAR(255) NOT NULL,
    ngaysinh DATE NOT NULL,
    diachi VARCHAR(255),
    gioitinh ENUM("Nam", "Nữ"),
    anhavt LONGBLOB NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE danhmucsp (
    id_danhmucsp INT AUTO_INCREMENT PRIMARY KEY,
    id_admin INT,
    tendanhmucsp VARCHAR(255),
    motadanhmucsp TEXT,
    FOREIGN KEY (id_admin) REFERENCES adminn(id_admin)
);

CREATE TABLE sanpham (
    id_sp INT AUTO_INCREMENT PRIMARY KEY,
    tensp VARCHAR(255) NOT NULL,
    motasp TEXT NOT NULL,
    giagoc FLOAT NOT NULL,      -- Giá gốc
    giaKM FLOAT,                -- Giá khuyến mãi
    giasp FLOAT NOT NULL,
    anhsp LONGBLOB,
    mausac VARCHAR(255),
    size VARCHAR(255),
    soluongsp INT NOT NULL,
    id_admin INT,
    id_danhmucsp INT,
    FOREIGN KEY (id_admin) REFERENCES adminn(id_admin),
    FOREIGN KEY (id_danhmucsp) REFERENCES danhmucsp(id_danhmucsp)
);

CREATE TABLE donhang (
    id_donhang INT AUTO_INCREMENT PRIMARY KEY,
    id_kh INT,
    id_admin INT,
    id_sp INT,
    order_date DATETIME,
    status VARCHAR(255),
    return_status VARCHAR(255),
    tongtien FLOAT,
    FOREIGN KEY (id_kh) REFERENCES khachhang(id_kh),
    FOREIGN KEY (id_admin) REFERENCES adminn(id_admin),
    FOREIGN KEY (id_sp) REFERENCES sanpham(id_sp)
);

CREATE TABLE doanhthu (
    id_donhang INT,
    tongtien FLOAT,
    id_admin INT,
    FOREIGN KEY (id_donhang) REFERENCES donhang(id_donhang),
    FOREIGN KEY (id_admin) REFERENCES adminn(id_admin)
);

CREATE TABLE khuyenmai (
    id_km INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    discount_percent DECIMAL(5, 2),
    id_sp INT,
    id_admin INT,
    FOREIGN KEY (id_sp) REFERENCES sanpham(id_sp),
    FOREIGN KEY (id_admin) REFERENCES adminn(id_admin)
);


-- tính giá km tự động
CREATE TRIGGER calculate_giaKM
BEFORE INSERT ON sanpham
FOR EACH ROW
BEGIN
    DECLARE discount DECIMAL(5, 2);
    -- Lấy discount_percent từ khuyến mãi tương ứng với sản phẩm
    SELECT discount_percent INTO discount 
    FROM khuyenmai 
    WHERE id_sp = NEW.id_sp LIMIT 1;
    -- Kiểm tra xem có khuyến mãi không
    IF discount IS NOT NULL THEN
        SET NEW.giaKM = NEW.giagoc * (1 - discount / 100);
    ELSE
        SET NEW.giaKM = NEW.giagoc; -- Nếu không có khuyến mãi, giữ giá gốc
    END IF;
END;
