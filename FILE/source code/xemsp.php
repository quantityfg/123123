<?php
include 'config.php';  

// Bắt đầu phiên nếu chưa bắt đầu
if (session_status() == PHP_SESSION_NONE) {
}

// Kiểm tra xem người dùng đã đăng nhập và vai trò của họ
$user = isset($_SESSION['User']) ? $_SESSION['User'] : '';
$role = isset($_SESSION['Role']) ? $_SESSION['Role'] : '';

if(isset($_GET['id'])) {
    // Lấy ID sản phẩm từ URL
    $product_id = $_GET['id'];
    
    // Sử dụng chuẩn bị lệnh để tránh SQL injection
    $stmt = $db->prepare("SELECT * FROM sanpham WHERE id = :id");
    $stmt->bindParam(':id', $product_id, PDO::PARAM_INT);
    $stmt->execute();
    $product = $stmt->fetch();

    if(isset($_SESSION[$user])){
        
    }
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết sản phẩm</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
    include 'header.php'; 
    if($stmt->rowCount() > 0) {
        $words = explode(' ', $product['tensp']);
        $lastTwoWords = array_slice($words, -2);
        $tensp1 = implode(' ', $lastTwoWords);
    ?>
    <form style="padding-top:2.5%;" id="them" action="themgiohang.php?id=<?= $product['id'] ?>" method="post" enctype="multipart/form-data" onsubmit="updateHiddenFields()">
    <div class="chitiet">
        <div class="tchieu">
            <img src="./image/<?=$product['hinhanh'] ?>" alt="<?=$product['tensp'] ?>">
        </div>
        <div class="chung">
            <h3><?=$product['tensp'] ?></h3>
            <br>
            <span><i class='bx bx-dollar'></i><b style="color:#ff5353;font-size:19px"><?=$product['gia'] ?>.00</b></span>
            <br><br>
            <p><?=$product['mota'] ?>.</p><br><br>
            <div class="number">
                <p>Số lượng</p><br>
                <input value="1" readonly name="luong">
            </div>
            <!-- Màu sắc và số lượng như các trường ẩn -->
            <a style="cursor:pointer;" href="themgiohang.php?masp=<?php echo $product['id'] ?>"><button style="padding:5px 10px; cursor:pointer;" type="submit" name="themgiohang"><i style="font-size:17px;" class='bx bx-cart'></i></button></a>
            <a style=" cursor:pointer;color:black; padding:5px 10px; border:1px solid black; text-decoration:none;" href="giohang.php">Mua ngay</a>
        </div>
    </div>
    </form>
    <?php
    } else {
        echo "Sản phẩm không tồn tại";    
    }
} else {
    echo "ID sản phẩm không được cung cấp";
}
?>
<?php
include 'footer.php';
?>
</body>
</html>
