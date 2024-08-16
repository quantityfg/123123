<?php
include 'config.php';
if(isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
}
$sql = "DELETE  FROM sanpham where id=$id";
$result = $db->exec($sql);
header('location:qlsanpham.php')
?>