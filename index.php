<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chu</title>

    <!-- css của phần body -->
    <link rel="stylesheet" href="public/css/body_index_2.css">

</head>

<body>

    <?php include 'header.php' ?>


    <!-- Phần body -->

    <body>
        <div class="container">
            <nav>
                <ul>
                    <li><a href="index.php?category=all">Tất cả danh mục</a></li>
                    <?php

                    // kết nối db
                    include __DIR__ . '/config/db_connect.php';

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

            <form class="search-form" action="index_2.php" method="GET">
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
                        echo "<a href='app/views/product_detail.php?id=" . $row["id_sp"] . "'>";
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


    <?php include 'footer.php' ?>
</body>

</html>