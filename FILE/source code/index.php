<?php
include 'config.php';
$sql = "SELECT * FROM sanpham";
$result = $db->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet">
    <script src="app.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <?php 
    include 'header.php';
    ?>
    <article >
    <div class="banner">
        <div class="font"><h3>BỘ SƯU TẬP TUYỂN CHỌN</h3>
        <h1> THỜI TRANG <br>PHỤ NỮ Ở ĐÂY</h1>
        <a href="product.php">MUA NGAY</a>
        </div>
        <div clas="image"><img width="700" height="500" src="https://demo.themeies.com/silon/images/ban-1.png"></div>
    </div>
    <div>
        <h1 style="font-size: 35px; text-align: center; margin: 50px 0 50px 0;">SẢN PHẨM TIÊU BIỂU</h1>
    </div>
    <div class="show">
    <?php
    $data = $result->fetchAll(); // Lấy tất cả các dòng vào một mảng
    $counter = 0; // Khởi tạo biến đếm

    // Hiển thị ba mục đầu tiên
    foreach ($data as $rs) {
        if ($counter < 3) {
            $numStars = rand(3, 5);
?>
            <div>
                <a style="text-decoration:none; color:black;" href="xemsp.php?id=<?php echo $rs['id'] ?>"><img src="./image/<?php echo $rs['hinhanh'] ?>" alt=""></a>
                <a style="text-decoration:none; color:black;" href="xemsp.php?id=<?php echo $rs['id'] ?>"><p><?php echo $rs['tensp'] ?></p></a>
                <?php
            // Hiển thị các ngôi sao đầy đủ
            for ($j = 0; $j < $numStars; $j++) {
                echo "<i class='bx bxs-star'></i>";
            }
            // Hiển thị các ngôi sao trống còn lại (tối đa 5 sao)
            for ($j = $numStars; $j < 5; $j++) {
                echo "<i class='bx bx-star'></i>";
            }
            ?><br>
                <span>$<?php echo $rs['gia'] ?></span>
            </div>
<?php
            $counter++;
        } else {
            break;
        }
    }
?>
    </div>
    <div class="picture">
        <div class="font">
            <h3>30% OFF</h3>
            <h1>BỘ SƯU TẬP TẤT CẢ CỦA NỮ </h1>
            <a href="product.php">MUA NGAY</a>
        </div>
            <img width="750" height="520" src="./image/ban-2.png" alt="">
    </div>
    <div>
        <h1 style="font-size: 35px; text-align: center; margin: 70px 0 70px 0;">PHỔ BIẾN NHẤT</h1>
    </div>
    <div class="show1">
    <?php
    // Hiển thị các mục từ thứ tư đến thứ bảy
    for ($i = 3; $i < min(7, count($data)); $i++) {
        $numStars = rand(3, 5);
        $rs = $data[$i];
?>
        <div>
        <a style="text-decoration:none; color:black;" href="xemsp.php?id=<?php echo $rs['id'] ?>"><img src="./image/<?php echo $rs['hinhanh'] ?>" alt=""></a>
        <a style="text-decoration:none; color:black;" href="xemsp.php?id=<?php echo $rs['id'] ?>"><p><?php echo $rs['tensp'] ?></p></a>
            <?php
            // Hiển thị các ngôi sao đầy đủ
            for ($j = 0; $j < $numStars; $j++) {
                echo "<i class='bx bxs-star'></i>";
            }
            // Hiển thị các ngôi sao trống còn lại (tối đa 5 sao)
            for ($j = $numStars; $j < 5; $j++) {
                echo "<i class='bx bx-star'></i>";
            }
            ?><br>
            <span>$<?php echo $rs['gia'] ?></span>
        </div>
<?php
    }
    ?>
</div>
    <div class="fours">
        <div>
            <img src="./image/tien.png" alt="">
            <h3>ĐẢM BẢO HOÀN TIỀN</h3>
            <p>Hòan tiền hợp lí , đảm bảo</p>
        </div>
        <div>
            <img src="./image/xe.png" alt="">
            <h3>GIAO HÀNG MIỄN PHÍ</h3>
            <p>Giao hàng nhanh chóng và an toàn</p>
        </div>
        <div>
            <img src="./image/tainghe.png" alt="">
            <h3>HỖ TRỢ MỌI LÚC</h3>
            <p>Hỗ trợ khách hàng mọi lúc, mọi nơi</p>
        </div>
        <div>
            <img src="./image/baove.png" alt="">
            <h3>THANH TOÁN AN TOÀN</h3>
            <p>Thanh toán một cách bảo mật, an toàn</p>
        </div>
    </div>
    <div>
        <h1 style="font-size: 35px; text-align: center; margin: 50px 0 100px 0;">SẢN PHẨM XU HƯỚNG</h1>
    </div>
    <div class="show2">
    <?php
    // Hiển thị các mục từ thứ tư đến thứ bảy
    for ($i = 7; $i < min(11, count($data)); $i++) {
        $numStars = rand(3, 5);
        $rs = $data[$i];
?>
        <div>
        <a style="text-decoration:none; color:black;" href="xemsp.php?id=<?php echo $rs['id'] ?>"><img src="./image/<?php echo $rs['hinhanh'] ?>" alt=""></a>
        <a style="text-decoration:none; color:black;" href="xemsp.php?id=<?php echo $rs['id'] ?>"><p><?php echo $rs['tensp'] ?></p></a>
            <?php
            // Hiển thị các ngôi sao đầy đủ
            for ($j = 0; $j < $numStars; $j++) {
                echo "<i class='bx bxs-star'></i>";
            }
            // Hiển thị các ngôi sao trống còn lại (tối đa 5 sao)
            for ($j = $numStars; $j < 5; $j++) {
                echo "<i class='bx bx-star'></i>";
            }
            ?><br>
            <span>$<?php echo $rs['gia'] ?></span>
        </div>
<?php
    }
    ?>
    </div>
    <div style="margin-top:-30px" class="show3">
    <?php
    // Hiển thị các mục từ thứ tư đến thứ bảy
    for ($i = 11; $i < min(15, count($data)); $i++) {
        $numStars = rand(3, 5);
        $rs = $data[$i];
?>
        <div>
        <a style="text-decoration:none; color:black;" href="xemsp.php?id=<?php echo $rs['id'] ?>"><img src="./image/<?php echo $rs['hinhanh'] ?>" alt=""></a>
        <a style="text-decoration:none; color:black;" href="xemsp.php?id=<?php echo $rs['id'] ?>"><p><?php echo $rs['tensp'] ?></p></a>
            <?php
            // Hiển thị các ngôi sao đầy đủ
            for ($j = 0; $j < $numStars; $j++) {
                echo "<i class='bx bxs-star'></i>";
            }
            // Hiển thị các ngôi sao trống còn lại (tối đa 5 sao)
            for ($j = $numStars; $j < 5; $j++) {
                echo "<i class='bx bx-star'></i>";
            }
            ?><br>
            <span>$<?php echo $rs['gia'] ?></span>
        </div>
<?php
    }
    ?>
    </div>
    <div>
        <h1 style="font-size: 35px; text-align: center; margin: 20px 0 70px 0;">THEO DÕI CHÚNG TÔI</h1>
    </div>
    <div class="show4">
        <div>
            <img src="./image/16.jpg" alt="">
        </div>
        <div>
            <img src="./image/17.jpg" alt="">
        </div>
        <div>
            <img src="./image/18.jpg" alt="">
        </div>
    </div>
</article>
<?php
include 'footer.php';
?>
</body>
</html>