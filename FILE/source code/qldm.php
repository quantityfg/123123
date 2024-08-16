<?php
include 'config.php';
$sql = "SELECT * FROM danhmuc";
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
    <style>
        table{
            text-align: center;
            border:1px solid black;
        }
        th{
            padding:10px 5px;
            background-color: lightgray;
            
        }
        td{
            padding:5px 5px;
            padding-left: 30px;
        }
        .ql>a{
            color:green;
            text-decoration:underline;
        }
        table>a{
            text-decoration: none;
        }
        table>a:hover{
            color:green;
            text-decoration:underline;
        }
    </style>
</head>
<body>
    <div style="padding:80px;" class="ql">
    <a href="themdm.php">Thêm danh mục</a>
    <table>
        <caption>SẢN PHẨM</caption>
        <tr>
        <th>Mã Danh Mục</th>
        <th>Tên Danh Mục</th>
        <th>Thao tác</th>
        </tr>
        <?php
        while ($rs = $result->fetch()){
        ?>
        <tr>
            <td><?php echo $rs['madm'] ?></td>
            <td><?php echo $rs['tendm'] ?></td>
            <td>
                <a href="suadm.php?id=<?php echo $rs['madm'] ?>">Sửa</a>
                <a onclick="return confirm('Bạn muốn xóa Mã <?php echo $rs['madm'] ?> này không ?') " href="xoadm.php?id=<?php echo $rs['madm'] ?>">Xóa</a>
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