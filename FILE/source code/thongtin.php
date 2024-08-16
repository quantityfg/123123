<?php
session_start();
include 'config.php';
if(isset($_POST['xacnhan'])){
    $tenkh = $_POST['tenkh'];
    $sodt = $_POST['sodt'];
    $email = $_POST['email'];
    $diachi = $_POST['diachi'];
    $sql = "INSERT INTO hoadon (tenkh, sodt, email, diachi) VALUES('".$tenkh."','".$sodt."','".$email."','".$diachi."')";
    $result = $db->query($sql);
    unset($_SESSION['giohang']);
    header('location:hoadonct.php');
}
$sql1 = "SELECT * FROM hoadon"; // Sửa lại câu truy vấn
$result1 = $db->query($sql1);
$row = $result1->fetch();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include 'header.php'
    ?>
    <div class="khachhang">
    <form enctype="multipart/form-data" action="" method="post">
        <div class="information">
            <h2>THÔNG TIN THANH TOÁN</h2>
            <input type="text" name="tenkh" value="" placeholder="" required>
            <label for="name">Tên khách hàng</label>
            <input type="text" name="sodt" value="" placeholder="" required>
            <label for="sodt">Số điện thoại</label>
            <input type="text" name="email" value="" placeholder="" required>
            <label for="email">Email</label>
            <input type="text" name="ma" placeholder="">
            <label for="ma">Mã khuyến mãi (nếu có)</label>
            <textarea type="text" name="diachi" placeholder=" " required></textarea>
            <label for="diachi">Địa chỉ cụ thể</label>
            <button type="submit" name="xacnhan">
                Hoàn tất <i style="vertical-align: middle; margin:-2px 0 0 0; font-size:18px;" class='bx bxs-right-arrow-alt'></i>
            </button>
        </div>
    </form>
    </div>
    <?php
    include 'footer.php'
    ?>
</body>
</html>