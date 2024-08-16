<?php
include 'config.php';

$id = null;
$row = null;

// Kiểm tra nếu codegh hợp lệ
if (isset($_GET['codegh']) && is_numeric($_GET['codegh'])) {
    $id = $_GET['codegh'];

    // Sử dụng prepared statements để tránh SQL Injection
    $sql = "SELECT * FROM giohangct WHERE codegh = :codegh";
    $stmt = $db->prepare($sql);
    $stmt->execute([':codegh' => $id]);

    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        echo "Không tìm thấy sản phẩm!";
        exit();
    }
} else {
    echo "Tham số codegh không hợp lệ!";
    exit();
}

if (isset($_POST['sua']) && $id !== null) {
    $trangthai = $_POST['trangthaigh'];
    
    // Kiểm tra giá trị đầu vào
    if (!empty($trangthai)) {
        // Sử dụng prepared statements để tránh SQL Injection
        $sql3 = "UPDATE giohangct SET trangthaigh = :trangthaigh WHERE codegh = :codegh";
        $stmt3 = $db->prepare($sql3);
        $stmt3->execute([':trangthaigh' => $trangthai, ':codegh' => $id]);
        header("location:hoadonadmin.php");
        exit();
    } else {
        echo "Vui lòng nhập trạng thái hợp lệ!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật trạng thái</title>
</head>
<body>
    <?php include 'hadmin.php'; ?>
    <form enctype="multipart/form-data" method="post" style="width:80%;height:300px; margin:5% 10% 5% 10%;">
        <h2>CẬP NHẬT TRẠNG THÁI</h2>
        <?php if ($row): ?>
            <label for="trangthaigh">Trạng thái hiện tại:</label>
            <input type="text" id="trangthaigh" name="trangthaigh" value="<?php echo htmlspecialchars($row['trangthaigh'], ENT_QUOTES, 'UTF-8'); ?>">
            <button type="submit" name="sua">Cập nhật</button>
        <?php else: ?>
            <p>Không có dữ liệu để hiển thị.</p>
        <?php endif; ?>
        <a href="hoadonadmin.php">Hủy</a>
    </form>
    <?php include 'footer.php'; ?>
</body>
</html>
