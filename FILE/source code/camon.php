<?php
include 'config.php';

// Lấy dữ liệu từ bảng giohang
$sql = "SELECT * FROM hoadonchitiet";
$result = $db->query($sql);
$giohangData = $result->fetchAll(PDO::FETCH_ASSOC); // Lấy tất cả hàng kết quả
$giohangData['SoHD'] = 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    include 'header.php';
    ?>
    <div class="hoadonct">
    <h2>HÓA ĐƠN</h2>
    <div class="ttin">
        <p>Tên khách hàng: <?php echo $giohangData['SoHD']  ?></p>
        <p>Số điện thoại:</p>
        <p>Email:</p>
        <p>Địa chỉ giao hàng:</p>
        <p>Mã khuyến mãi:</p>
    </div>
    <div class="spham">

    </div>
    </div>
    <?php
    include 'footer.php';
    ?>
</body>
</html>