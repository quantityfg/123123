<?php
include 'config.php';
$sql = "SELECT * FROM sanpham";
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
</head>
<body>
    <div style="margin:2% 0 -2% 5%; padding-top: 50px;">
    <a href="themsp1.php">Thêm sản phẩm</a>
    </div>
    <div class="ql">
    <table style="text-align:center;">
        <caption>SẢN PHẨM</caption>
        <tr>
        <th>ID</th>
        <th>Tên sản phẩm</th>
        <th>Hình ảnh</th>
        <th>Giá</th>
        <th>Số lượng</th>
        <th>Mô tả</th>
        <th>Mã DM</th>
        <th>Thao tác</th>
        </tr>
        <?php
        while ($rs = $result->fetch()){
            $_SESSION['idsp'] = $rs['id'];
        ?>
        <tr>
            <td><?php echo $rs['id'] ?></td>
            <td><?php echo $rs['tensp'] ?></td>
            <td><img width="100" src="./image/<?php echo $rs['hinhanh'] ?>"></td>
            <td><?php echo $rs['gia'] ?></td>
            <td><?php echo $rs['soluong'] ?></td>
            <td><?php echo $rs['mota'] ?></td>
            <td><?php echo $rs['madm'] ?></td>
            <td>
                <a href="sua.php?id=<?php echo $rs['id']?>">Sửa</a>
                <a onclick="return confirm('Bạn thực sự muốn xóa id <?php echo $rs['id'] ?> đúng không ?')" href="xoa.php?id=<?php echo $rs['id']?>">Xóa</a>
            </td>
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