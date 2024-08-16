<?php
include 'config.php';
session_start();

// Kiểm tra xem `codegh` có được truyền qua `GET` hay không
if (!isset($_GET['codegh'])) {
    echo "Không tìm thấy mã hóa đơn.";
    exit;
}

$codegh = $_GET['codegh'];

// Cập nhật trạng thái giỏ hàng thành "Đã hủy"
$sql = "UPDATE giohangct SET trangthaigh = 'Đã gửi yêu cầu hủy đơn' WHERE codegh = :codegh";
$stmt = $db->prepare($sql);
$stmt->execute(['codegh' => $codegh]);

// Kiểm tra xem có bản ghi nào bị ảnh hưởng
if ($stmt->rowCount() > 0) {
    echo '<script language="javascript">';
    echo 'alert("Đơn hàng của bạn đã được hủy thành công!");';
    echo 'window.location.href = "index.php";';
    echo '</script>';
}
?>
