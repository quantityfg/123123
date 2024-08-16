<?php
include 'config.php';
session_start();
// Kiểm tra xem `codegh` có được truyền qua `GET` hay không
if (!isset($_GET['codegh'])) {
    echo "Không tìm thấy mã hóa đơn.";
    exit;
}

$codegh = $_GET['codegh'];

// Truy vấn lấy thông tin chi tiết giỏ hàng theo `codegh`
$sql = "SELECT  giohangct.*, sanpham.tensp, sanpham.gia, sanpham.hinhanh, giohangct.trangthaigh
        FROM giohangct 
        INNER JOIN sanpham ON giohangct.idsp = sanpham.id
        WHERE giohangct.codegh = :codegh
        ORDER BY giohangct.idghct DESC";
$stmt = $db->prepare($sql);
$stmt->execute(['codegh' => $codegh]);
$giohangData = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Truy vấn lấy thông tin khách hàng
$sql1 = "SELECT * FROM khachhang WHERE tendn = :tendn LIMIT 1";
$stmt1 = $db->prepare($sql1);
$stmt1->execute(['tendn' => $_SESSION['tendn']]);
$hoadonData = $stmt1->fetch(PDO::FETCH_ASSOC);

$tongtien = 0;
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Hóa Đơn</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'hadmin.php'; ?>
    <div class="hoadonct">
        <h2>HÓA ĐƠN</h2>
        <div class="ttin">
            <p>Mã đơn: DTMKN<?php echo htmlspecialchars($codegh); ?></p>
            <p>Tên khách hàng: <?php echo htmlspecialchars($hoadonData['tenkh']); ?></p>
            <p>Số điện thoại: <?php echo htmlspecialchars($hoadonData['sodt']); ?></p>
            <p>Email: <?php echo htmlspecialchars($hoadonData['email']); ?></p>
            <p>Mã khuyến mãi: (không có)</p>
            <p>Địa chỉ giao hàng: <?php echo htmlspecialchars($hoadonData['diachi']); ?></p>
            <p style="padding-bottom: 25px;">
                Trạng thái: <b><?php echo htmlspecialchars($giohangData[0]['trangthaigh']); ?></b>
                <?php if ($giohangData[0]['trangthaigh'] == 'Đã hủy đơn'): ?>
                    <a style="text-decoration:none; float:right; margin-right:20px; color:red;"
                       onclick="return confirm('Bạn có chắc muốn xóa mã đơn DTMKN<?php echo htmlspecialchars($lastCodegh); ?> không?')"
                       href="xoadonhang.php?codegh=<?php echo htmlspecialchars($giohangData[0]['codegh']); ?>">Xóa đơn hàng</a>
                <?php endif; ?>
            </p>

        </div>
        <div class="spham">
            <?php
                        $ship = 3.00;
            foreach ($giohangData as $giohangItem): 
                $tong = $giohangItem['gia'] * $giohangItem['soluongsp'];
                $VAT = $tong * 0.1;
                $tongtien += $tong + $VAT; ?>
                <div class="thongtin">
                    <img src="./image/<?php echo htmlspecialchars($giohangItem['hinhanh']); ?>" alt="Hình ảnh sản phẩm">
                    <p style="line-height:30px; margin-left:20px;"><?php echo htmlspecialchars($giohangItem['tensp']); ?><br>
                       $<?php echo number_format($giohangItem['gia'], 2); ?><br>
                       Số lượng: <?php echo htmlspecialchars($giohangItem['soluongsp']); ?></p>
                    <p style="line-height:30px; margin-left:250px;">$<?php echo number_format($tong, 2); ?></p>
                </div>
            <?php endforeach; ?>
            <div><?php $tongtien += $ship; ?>
                <p style="margin-left:15px;">Tổng giá trị đơn hàng: <?php echo number_format($tongtien,2) ?></p>
            </div>
        </div>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>
