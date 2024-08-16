<?php
include 'config.php';

// Truy vấn bao gồm tổng số lượng sản phẩm và tổng giá trị cho mỗi codegh
$sql = "
    SELECT giohangct.codegh, 
           COUNT(giohangct.idsp) as soluongsp, 
           SUM(sanpham.gia * giohangct.soluongsp) as tonggia, 
           giohangct.trangthaigh
    FROM giohangct
    JOIN sanpham ON giohangct.idsp = sanpham.id
    GROUP BY giohangct.codegh, giohangct.trangthaigh
    ORDER BY giohangct.codegh DESC";

$result = $db->query($sql);
$hasOrders = $result->rowCount() > 0; // Kiểm tra nếu có bất kỳ hóa đơn nào
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tài liệu</title>
    <link rel="stylesheet" href="style.css">
    </head>
<body>
    <?php include 'hadmin.php'; ?>
    <article>
    <h2 style="text-align:center; font-size:25px;margin:20px 0 -50px 0;">QUẢN LÍ HÓA ĐƠN</h2>
        <div class="hoadon" style="width:80%; margin:5% 10% 5% 10%;">
            <?php if ($hasOrders): // Nếu có hóa đơn ?>
                <?php
                $ship = 3.00; // Phí vận chuyển cố định
                while ($rs = $result->fetch(PDO::FETCH_ASSOC)) {
                    $VAT = $rs['tonggia'] * 0.1; // 10% VAT
                    $tong = $rs['tonggia'] + $VAT + $ship;
                ?>
                    <div style="width:100%; height:50px; padding:15px 0 0 30px; border:1px solid black; margin-bottom:2px; display:flex; gap:10px;">
                        <p style="width:140px; text-align:left;">Mã: DTMKN<?php echo htmlspecialchars($rs['codegh']); ?></p>
                        <p>Số sản phẩm: <?php echo htmlspecialchars($rs['soluongsp']); ?></p>
                        <p>Tổng giá trị: $<?php echo number_format($tong, 2); ?></p>
                        <p style=" padding-left:20px;;width:500px; text-align:left;"><?php echo htmlspecialchars($rs['trangthaigh']); ?></p>
                        <a style="text-decoration:none;" href="hoadonctadmin.php?codegh=<?php echo urlencode($rs['codegh']); ?>">Xem chi tiết</a>
                        <?php if ($rs['trangthaigh'] != 'Đã hủy đơn'): ?>
                        <a style="text-decoration:none;" href="capnhatdon.php?codegh=<?php echo urlencode($rs['codegh']); ?>">Cập nhật</a>
                        <?php endif; ?>
                    </div>
                <?php } ?>
            <?php else: // Nếu không có hóa đơn ?>
                <p>Bạn không có hóa đơn nào cả</p>
            <?php endif; ?>
        </div>
    </article>
    <?php include 'footer.php'; ?>
</body>
</html>