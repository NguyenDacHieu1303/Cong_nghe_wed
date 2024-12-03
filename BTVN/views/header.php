<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo "Quản lý sản phẩm"; ?></title>
    <link rel="stylesheet" href="../assets/css/style.css"> <!-- Link tới file CSS riêng -->
</head>
<body>
    <header>
        <div class="header-left">
            <h1><?php echo "Administration"; ?></h1>
            <nav>
                <?php
                $menuItems = [
                    ["name" => "Trang chủ", "link" => "#"],
                    ["name" => "Trang ngoài", "link" => "#"],
                    ["name" => "Thể loại", "link" => "#", "strong" => true],
                    ["name" => "Tác giả", "link" => "#"],
                    ["name" => "Bài viết", "link" => "#"]
                ];

                // Hàm để tạo menu link
                function createMenuLinks($menuItems) {
                    foreach ($menuItems as $item) {
                        $name = isset($item['strong']) && $item['strong'] ? "<strong>{$item['name']}</strong>" : $item['name'];
                        echo "<a href='{$item['link']}'>{$name}</a>";
                    }
                }

                // Gọi hàm để hiển thị các menu
                createMenuLinks($menuItems);
                ?>
            </nav>
        </div>
    </header>
</body>
</html>