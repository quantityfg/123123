<?php
session_start();
include 'config.php';

// Kiểm tra xem biến $_SESSION['giohang1'] có tồn tại hay không
if(isset($_SESSION['giohang']) && is_array($_SESSION['giohang'])) {
    $idkh = $_SESSION['id'];
    $codegh = rand(0,99999);
    $sql = "INSERT INTO giohang (idkh, codegh) VALUES ('".$idkh."','".$codegh."')";
    $result = $db->query($sql);
    if($result){
        foreach($_SESSION['giohang'] as $key => $value){
            $idsp = $value['id'];
            $soluong = $value['soluong'];
            $sql1 = "INSERT INTO giohangct (idsp, codegh, soluongsp) VALUES ('".$idsp."','".$codegh."','".$soluong."')";
            $result1 = $db->query($sql1);
        }
    }
    header('Location: thongtin.php'); // Chuyển hướng đến trang 'thongtin.php'
}
?>