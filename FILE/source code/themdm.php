<?php
include 'config.php';
if(isset($_POST['them'])){
    $tendm = $_POST['tendm'];
    
    $sql = "INSERT INTO `danhmuc` (`tendm`) VALUES ('".$tendm."')";
    $result = $db -> query($sql); 
    header('location:qldm.php');
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
        <input type="text" placeholder="Tên sản phẩm" name="tendm">
        </div><br>
        <button name="them" type="submit">Thêm</button>
        <a href="qldm.php">Hủy</a>
        </div>
    </form>
</body>
</html>