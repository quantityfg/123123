<?php
include 'config.php';
if(isset($_POST['them'])){
    $tensp = $_POST['tensp'];
    $hinhanh = $_FILES['hinhanh']['name'];
    $linkup = "./image/";
    move_uploaded_file($_FILES['hinhanh']['tmp_name'],$linkup.$hinhanh);
    
    $gia = $_POST['gia'];
    $soluong = $_POST['soluong'];
    $mota = $_POST['mota'];
    $madm = $_POST['madm'];
    
    $sql = "INSERT INTO `sanpham` (`tensp`, `hinhanh`, `gia`,`soluong`,`mota`, `madm`) VALUES ('".$tensp."','".$hinhanh."','".$gia."','".$soluong."','".$mota."','".$madm."')";
    $result = $db -> query($sql); 
    header('location:qlsanpham.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" enctype="multipart/form-data">
        <div>
            <h2>Thêm</h2>
        <div>
        <input type="text" placeholder="Mã danh mục" name="madm">
        </div><br>
        <div>
        <input type="text" placeholder="Tên sản phẩm" name="tensp">
        </div><br>
        <div>
        <input type="text" placeholder="Giá" name="gia">
        </div><br>
        <div>
        <input type="text" placeholder="Số lượng" name="soluong">
        </div><br>
        <div>
        <input type="text" placeholder="Mô tả" name="mota">
        </div><br>
        <div>
        <input type="file" name="hinhanh">
        </div><br>
        <button name="them" type="submit">Thêm</button>
        <a href="qlsanpham.php">Hủy</a>
        </div>
    </form>
</body>
</html>