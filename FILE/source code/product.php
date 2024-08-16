<?php
include 'config.php';
$sql="SELECT * FROM sanpham";
$result =$db->query($sql);
?>
    <?php
    include 'header.php';
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet">
</head>
<body>

    <article style="padding-top:3%;">
        <div class="page">
            <div class="search">
                <h2>DANH MỤC SẢN PHẨM</h2>
                <ul>Váy
                <i class='bx bx-chevron-down'></i>
                <li><a href="">Váy dài</a></li>
                <li><a href="">Váy ngắn</a></li>
                <li><a href="">Váy đầm</a></li>
                </ul>
                <ul>Quần
                <i class='bx bx-chevron-down'></i>
                <li><a href="">Quần dài</a></li>
                <li><a href="">Quần ngắn</a></li>
                <li><a href="">Quần đùi</a></li>
                </ul>
                <ul>Áo
                <i class='bx bx-chevron-down'></i>
                <li><a href="">Áo thun</a></li>
                <li><a href="">Áo sơ mi</a></li>
                <li><a href="">Áo polo</a></li>
                </ul>
                <ul>Kính
                <i class='bx bx-chevron-down'></i>
                <li><a href="">Kính cận</a></li>
                <li><a href="">Kính râm</a></li>
                <li><a href="">Kính thời trang</a></li>
                </ul>
                <ul>Túi
                <i class='bx bx-chevron-down'></i>
                <li><a href="">Túi xách</a></li>
                <li><a href="">Túi đeo chéo</a></li>
                <li><a href="">Balo</a></li>
                </ul>
                <ul>Giày
                <i class='bx bx-chevron-down'></i>
                <li><a href="">Giày cao gót</a></li>
                <li><a href="">Giày thể thao</a></li>
                <li><a href="">Giày thời trang</a></li>
                </ul>
                <ul>Dép
                <i class='bx bx-chevron-down'></i>
                <li><a href="">Dép xỏ ngón</a></li>
                <li><a href="">Dép thời trang</a></li>
                <li><a href="">Dép công sở</a></li>
                </ul>
            </div>
            <div class="product">
    <div class="anh">
        <div class="ten">
            <h1>TẤT CẢ<br>SẢN PHẨM</h1>
            <h2>Ở ĐÂY<i class='bx bxs-hand-left bx-rotate-270'></i></h2>
        </div>
        <img height="290" width="415" src="./image/ban-1.png" alt="">
    </div>
    <div class="sanpham">
        <?php 
        while ($rs = $result->fetch()){
            // Tạo số sao ngẫu nhiên từ 1 đến 4 cho mỗi sản phẩm
            $numStars = rand(3, 5);
        ?>
        <div class="products">
            <a style="color:black; text-decoration:none;" href="xemsp.php?id=<?php echo $rs['id'] ?>"><img src="./image/<?php echo $rs['hinhanh'] ?>" alt=""></a>
            <a style="color:black; text-decoration:none;" href="xemsp.php?id=<?php echo $rs['id'] ?>"><p style="margin-top:3%;"><?php echo $rs['tensp']?></p></a>
            <?php
            // Hiển thị các ngôi sao đầy đủ
            for ($i = 0; $i < $numStars; $i++) {
                echo "<i class='bx bxs-star'></i>";
            }
            // Hiển thị các ngôi sao trống còn lại (tối đa 5 sao)
            for ($i = $numStars; $i < 5; $i++) {
                echo "<i class='bx bx-star'></i>";
            }
            ?><br>
            <span style="text-align:center">$<?php echo $rs['gia'] ?></span>
        </div>
        <?php
        }
        ?>
    </div>
</div>

        </div>
    </article>
    <?php
    include 'footer.php';
    ?>
</body>
</html>