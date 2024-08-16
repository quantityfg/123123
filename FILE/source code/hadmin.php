<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$role = isset($_SESSION['role']) ? $_SESSION['role'] : ''; 
$user = isset($_SESSION['tendn']) ? $_SESSION['tendn'] : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet">
    <title>Document</title>
    <script src="app.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div>
        <a href="admin.php"><img src="./image/LOGO.png"></a>
    </div>
    <div class="href">
        <ul>
        <li><a href="qldm.php">QL DANH MỤC</a></li>
            <li><a href="qlsanpham.php">QL SẢN PHẨM</a></li>
            <li><a href="qlkhachhang.php">QL KHÁCH HÀNG</a></li>
            <li><a href="hoadonadmin.php">HÓA ĐƠN</a></li>

        </ul>
    </div>
    <div class="icon">
        <i style="font-size: 22px;"class='bx bx-heart'></i>
        <i style="font-size: 24px;"class='bx bx-cart'></i>
        <div class="i1">
        <i style="font-size: 22px;"class='bx bx-user'>
        <ul>
            <li><a href="logout.php">Đăng xuất</a></li>
        </ul>
        </i><p style="position:absolute; left:-20px; top:0; width:270px;">Xin chào - <?php echo $user ?></p>
    </div>
    </div>
    </header>
</body>
</html>