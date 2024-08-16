<?php
include 'config.php';
if(isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
}
$sql = "DELETE FROM danhmuc where madm = $id";
$result = $db->exec($sql);
header('location:qldm.php')
?>