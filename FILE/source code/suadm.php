<?php
include 'config.php';
if(isset($_GET['id']) && is_numeric($_GET['id'])){
    $id = $_GET['id'];


    $sql = "SELECT * FROM danhmuc where madm = '".$id."'";

    $result = $db -> query($sql);

    if($result->rowCount() > 0){
        $row = $result->fetch(PDO::FETCH_ASSOC);
    } else {
        echo "Không tìm thấy sản phẩm!";
        exit();
    }
}
if(isset($_POST['sua'])){
    $tendm = $_POST['tendm'];
    
    $sql3 = "UPDATE danhmuc SET tendm ='".$tendm."' WHERE madm = '".$id."'";
    $result = $db -> query($sql3); 
    header("location:qldm.php");
    exit();
}
?>
<!DOCTYPE html> 
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Sản Phẩm Mới</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
    <form method="post" enctype="multipart/form-data">
        <table>
            <caption>CẬP NHẬT THÔNG TIN</caption>
            <tr>
                <td>Mã Danh Mục</td>
                <td><input type="text" disabled name="madm" value="<?php echo $row["madm"]?>"></td>
            </tr>
            <tr>
                <td>Tên Danh Mục</td>
                <td><input type="text" name="tendm" value="<?php echo $row["tendm"]?>"></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <button type="submit" name="sua">Cập nhật</button>
                    <a href="qldm.php" type="huy">Hủy</a>
                </td>
            </tr>
        </table>
    </div>
    </form>
</body>
</html>