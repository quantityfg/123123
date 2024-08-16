<?php
include 'config.php';
if(isset($_GET['id']) && is_numeric($_GET['id'])){
    $id = $_GET['id'];


    $sql = "SELECT * FROM sanpham where id = '".$id."'";

    $result = $db -> query($sql);

    if($result->rowCount() > 0){
        $row = $result->fetch(PDO::FETCH_ASSOC);
    } else {
        echo "Không tìm thấy sản phẩm!";
        exit();
    }
}
if(isset($_POST['sua'])){
    $tensp = $_POST['tensp'];
    $hinhanh = $row['hinhanh'];
    if(isset($_FILES['hinhanh']['name']) && !empty($_FILES['hinhanh']['name'])) {
        $hinhanh = $_FILES['hinhanh']['name'];
        $uploaddir = './image/';
        move_uploaded_file($_FILES['hinhanh']['tmp_name'], $uploaddir .$hinhanh);
    }

    $gia = $_POST['gia'];
    $soluong = $_POST['soluong'];
    $mota = $_POST['mota'];
    
    $sql3 = "UPDATE sanpham SET tensp ='".$tensp."',gia='".$gia."', hinhanh = '".$hinhanh."', soluong='".$soluong."', mota= '".$mota."' WHERE id = '".$id."'";
    $result = $db -> query($sql3); 
    header("location:qlsanpham.php");
    exit();
}
?>
<!DOCTYPE html> 
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Sản Phẩm Mới</title>
<link rel="stylesheet" href="./CSS/suasp.css">
</head>
<body>
    <div class="container">
    <form method="post" enctype="multipart/form-data">
        <table>
            <caption>CẬP NHẬT THÔNG TIN</caption>
            <tr>
                <td>Mã Danh Mục</td>
            <td><input type="text" readonly name="madm" value="<?php echo $row["madm"]?>"></td>
            </tr>
            <tr>
                <td>ID</td>
            <td><input type="text" readonly name="id" value="<?php echo $row["id"]?>"></td>
            </tr>
            <tr>
                <td>Tên sản phẩm:</td>
                <td><input type="text" name="tensp" required value="<?php echo $row['tensp'] ?>"></td>
            </tr>
            <tr>
                <td>Giá: </td>
                <td><input type="text" name="gia" required value="<?php echo $row['gia'] ?>"></td>
            </tr>
            <tr>
                <td>Số lượng: </td>
                <td><input type="text" name="soluong" required value="<?php echo $row['soluong'] ?>"></td>
            </tr>
            <tr>
                Mô tả: </td>
                <td><textarea name="mota" rows="6" cols="52" required placeholder='Nội dung'><?php echo $row['mota'] ?></textarea ></td>
            </tr>
            <tr>
                <td>Hình ảnh: </td>
                <td><input type="file" name="hinhanh">
                <img src="./image/<?php echo $row['hinhanh'] ?>" width="100px" height="100"/></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <button type="submit" name="sua">Cập nhật</button>
                    <a href="qlsanpham.php" type="huy">Hủy</a>
                </td>
            </tr>
        </table>
    </div>
    </form>
</body>
</html>