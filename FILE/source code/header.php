<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$role = isset($_SESSION['role']) ? $_SESSION['role'] : ''; 
$user = isset($_SESSION['tendn']) ? $_SESSION['tendn'] : '';
if(isset($_SESSION['giohang'])){
    $giohang_count = count($_SESSION['giohang']);
}else{
    $giohang_count = 0;
}
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
        <img src="./image/LOGO.png">
    </div>
    <div class="href">
        <ul>
            <li><a href="index.php">TRANG CHỦ</a></li>
            <li><a href="introduct.php">GIỚI THIỆU</a></li>
            <li><a href="product.php">SẢN PHẨM</a></li>
            <li><a href="lienhe.php">LIÊN HỆ</a></li>
            <li><a href="FAQ.php">HỖ TRỢ</a></li>
        </ul>
    </div>
    <div class="icon">
        <i style="font-size: 22px;"class='bx bx-heart'></i>
        <a style="color:black;position:relative; text-decoration:none;" href="giohang.php"><i style="font-size: 24px;"class='bx bx-cart'></i></a><b style="color:black; margin-left:-9px; margin-top:2px;">(<?php echo $giohang_count ?>)</b>
        <div class="i1">
            <i style="font-size: 22px;"class='bx bx-user'>
                <ul>
                <?php if(isset($_SESSION['tendn'])){ ?>
                    <li><a href="giohang.php">Giỏ hàng</a></li>
                    <li><a href="hoadon.php">Hóa đơn</a></li>
                    <li><a href="logout.php">Đăng xuất</a></li>
                    <?php } else{ ?>
                    <li><a href="dangnhap.php">Đăng nhập</a></li>
                    <li><a href="dangky.php">Đăng ký</a></li>
                    <?php } ?>
                </ul>
                </i><?php if(isset($_SESSION['tendn'])){ ?><b style=" position:relative; top:-4px; vertical-align: middle; font-weight:400;"> Xin chào - <?php echo $user; } ?></b>
    </div>
    </div>
    </header>
</body>
</html>