<?php
include 'config.php';
session_start();

// Kiểm tra xem `codegh` có được truyền qua `GET` hay không
if (!isset($_GET['codegh'])) {
    echo "Không tìm thấy mã hóa đơn.";
    exit;
}

$codegh = $_GET['codegh'];

// Xóa các chi tiết giỏ hàng theo `codegh`
$sql = "DELETE FROM giohangct WHERE codegh = :codegh";
$stmt = $db->prepare($sql);
$stmt->execute(['codegh' => $codegh]);

// Kiểm tra xem xóa thành công hay không
if ($stmt->rowCount() > 0) {
    echo "Đã xóa đơn hàng thành công.";
} else {
    echo "Đơn hàng không tồn tại hoặc đã bị xóa trước đó.";
}

// Chuyển hướng về trang chi tiết hóa đơn hoặc trang chủ sau khi xóa
header("Location: hoadonadmin.php");
exit;
?>
