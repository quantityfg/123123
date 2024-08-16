<?php
include 'config.php';
$sql = "SELECT * FROM khachhang";
$result = $db->query($sql);
?>
    <?php
include 'hadmin.php'
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <style>
        table th{
            background-color:lightgray;
            padding:5px;
        }
        table td{
            background-color:beige;
            padding:10px;
        }
    </style>
</head>
<body>
    <div class="ql">
    <a href="themsp.php">Thêm sản phẩm</a>
    <table style="text-align:center;">
        <caption>SẢN PHẨM</caption>
        <tr>
        <th>STT</th>
        <th>Tên khách hàng</th>
        <th>Tên đăng nhập</th>
        <th>Mật khẩu</th>
        <th>Số điện thoại</th>
        <th>Email</th>
        <th>Địa chỉ</th>
        </tr>
        <?php
        while ($rs = $result->fetch()){
        ?>
        <tr>
            <td><?php echo $rs['idkh'] ?></td>
            <td><?php echo $rs['tenkh'] ?></td>
            <td><?php echo $rs['tendn'] ?></td>
            <td><?php echo $rs['mk'] ?></td>
            <td><?php echo $rs['sodt'] ?></td>
            <td><?php echo $rs['email'] ?></td>
            <td><?php echo $rs['diachi'] ?></td>
        </tr>
        <?php
        }
        ?>
    </table>
    </div>
    <?php 
    include 'fadmin.php' ?>
</body>
</html>