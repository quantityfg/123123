<?php
include 'config.php';

if (isset($_POST['xacnhan'])) {
    echo "<script>alert('Yêu cầu của bạn đã được gửi đi !');</script>";
    echo "<script>window.location.href = 'index.php';</script>";
    exit; // Kết thúc script sau khi chuyển hướng
}
?>
