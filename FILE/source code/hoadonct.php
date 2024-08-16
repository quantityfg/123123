<?php
include 'config.php';
session_start();

// Khởi tạo mảng lưu trữ các sản phẩm đã được thêm vào giỏ hàng theo từng codegh
$giohang = array();

// Lấy dữ liệu từ bảng giohangct và sanpham, sắp xếp theo codegh và idghct gần nhất
$sql = "SELECT giohangct.*, sanpham.tensp, sanpham.gia, sanpham.hinhanh, giohangct.trangthaigh
        FROM giohangct 
        INNER JOIN sanpham ON giohangct.idsp = sanpham.id
        ORDER BY giohangct.idghct DESC";
$result = $db->query($sql);
$giohangData = $result->fetchAll(PDO::FETCH_ASSOC); // Lấy tất cả hàng kết quả

// Lấy dữ liệu từ bảng hoadon (chỉ một hàng, tương ứng với đơn hàng cuối cùng)
$sql1 = "SELECT * FROM hoadon ORDER BY id DESC LIMIT 1";
$stmt1 = $db->prepare($sql1);
$stmt1->execute();
$hoadonData = $stmt1->fetch(PDO::FETCH_ASSOC); // Lấy một hàng kết quả

// Xác định codegh của giỏ hàng cuối cùng
$lastCodegh = null;
if (!empty($giohangData)) {
    $lastCodegh = $giohangData[0]['codegh']; // Giỏ hàng cuối cùng dựa trên sắp xếp
}

// Duyệt qua dữ liệu giỏ hàng để lấy sản phẩm thuộc codegh cuối cùng
if ($lastCodegh !== null) {
    foreach ($giohangData as $giohangItem) {
        if ($giohangItem['codegh'] == $lastCodegh) {
            $id = $giohangItem['idsp'];
            if (!isset($giohang[$id])) {
                $giohang[$id] = $giohangItem;
            } else {
                $giohang[$id]['soluongsp'] = $giohangItem['soluongsp'];
            }
        }
    }
}
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
    <?php include 'header.php'; ?>
    <div class="hoadonct">
        <h2>HÓA ĐƠN</h2>
        <div class="ttin">
            <p>Mã đơn: DTMKN<?php echo htmlspecialchars($lastCodegh); ?></p>
            <p>Tên khách hàng: <?php echo htmlspecialchars($hoadonData['tenkh']); ?></p>
            <p>Số điện thoại: <?php echo htmlspecialchars($hoadonData['sodt']); ?></p>
            <p>Email: <?php echo htmlspecialchars($hoadonData['email']); ?></p>
            <p>Mã khuyến mãi: (không có)</p>
            <p>Địa chỉ giao hàng: <?php echo htmlspecialchars($hoadonData['diachi']); ?></p>
            <p style="padding-bottom: 30px;">Trạng thái: <b><?php echo htmlspecialchars($giohangData[0]['trangthaigh']); ?></b></p>
            <?php if ($giohangData[0]['trangthaigh'] == 'Đặt hàng thành công'): ?>
                <a style="text-decoration:none; float:right; margin-right:20px;" onclick="return confirm('Bạn có chắc muốn hủy mã đơn DTMKN<?php echo htmlspecialchars($lastCodegh); ?> không ?')" href="huydon.php?codegh=<?php echo htmlspecialchars($lastCodegh); ?>">Hủy đơn</a>
            <?php endif; ?>
        </div>
        <div class="spham">
            <?php
            $tongtien = 0;  
            $ship = 3.00; 
            foreach ($giohang as $giohangItem):  
                $tong = $giohangItem['gia'] * $giohangItem['soluongsp']; 
                $VAT = $tong * 0.1; 
                $tongtien += $tong + $VAT; ?>
                <div class="thongtin">
                    <img src="./image/<?php echo htmlspecialchars($giohangItem['hinhanh']); ?>" alt="Hình ảnh sản phẩm">
                    <p style="margin-left:15px; line-height:30px; margin-right:90px;"><?php echo htmlspecialchars($giohangItem['tensp']); ?><br> Giá: $<?php echo number_format($giohangItem['gia'], 2); ?><br> Số lượng: <?php echo htmlspecialchars($giohangItem['soluongsp']); ?></p>
                    <p style="line-height:30px; margin:5px 0 0  100px;">$<?php echo number_format($tong, 2); ?></p>
                </div>
            <?php endforeach; ?>
            <div class="tonggia"><?php $tongtien += $ship; ?>
                <p style="margin-left:15px;">Tổng giá trị đơn hàng: $<?php echo number_format($tongtien,2) ?></p>
            </div>
        </div>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>
