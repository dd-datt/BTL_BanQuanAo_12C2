# BTL_BanQuanAo_12C2

Bài tập lớn. Web bán quần áo. ĐH12C2.

# Cấu trúc thư mục dự án

```bash
/BTL_BanQuanAo_12C2
│
├── /app
│   ├── /controllers      # Chứa các file điều khiển (controller) cho ứng dụng
│   ├── /models           # Chứa các mô hình (model) tương tác với cơ sở dữ liệu
│   └── /views            # Chứa các file giao diện (view) hiển thị cho người dùng
│
├── /config
│   └── database.php      # File cấu hình kết nối tới cơ sở dữ liệu
│
├── /public
│   ├── /css              # Thư mục chứa các file CSS cho giao diện
│   ├── /js               # Thư mục chứa các file JavaScript cho tương tác
│   ├── /images           # Thư mục chứa các hình ảnh sử dụng trong ứng dụng
│
│
├── /database
│   ├── /migrations       # Chứa các tập lệnh tạo hoặc cập nhật cấu trúc bảng
│   │   └── create_tables.sql   # File SQL tạo bảng cho cơ sở dữ liệu
│   ├── /seeds            # Dữ liệu mẫu để khởi tạo
│   │   └── seed_data.sql       # File SQL chứa dữ liệu mẫu (sản phẩm, khách hàng, ...)
│   └── init.sql          # File SQL tổng hợp để khởi tạo toàn bộ cơ sở dữ liệu
|
|-- index.php             # File trang chủ
└── README.md             # Tài liệu mô tả dự án, hướng dẫn cài đặt và sử dụng
```
