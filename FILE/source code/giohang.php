<?php
include 'config.php';
session_start();
$role = isset($_SESSION['role']) ? $_SESSION['role'] : ''; 
$user = isset($_SESSION['tendn']) ? $_SESSION['tendn'] : '';
if (empty($user)) {
    echo "<script>alert('Bạn chưa đăng nhập. Vui lòng đăng nhập !');</script>";
    echo "<script>window.location.href = 'dangnhap.php';</script>";
    exit; // Kết thúc script sau khi chuyển hướng
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'header.php';
     if(isset($_SESSION['giohang']) && !empty($_SESSION['giohang'])){ ?>
    <div class="giohang">
        <h2>GIỎ HÀNG<a name="xoaall" href="themgiohang.php?xoaall">Xóa tất cả</a></h2>
        <?php 
            $giohang_count = count($_SESSION['giohang']);
            $i = 0;
            $tong = 0;
            $tamtinh = 0;
            $VAT = 0;
            $ship = 3.00;
            $tongso = 0;
            while ($i < $giohang_count):
                $giohang_item = $_SESSION['giohang'][$i];
                $tong = $giohang_item['gia'] * $giohang_item['soluong'];
                $tamtinh += $tong;
                $VAT = $tamtinh * 0.1;
                $tongcong = $VAT + $tamtinh + $ship;
            ?>
            <div class="sanpham">
                <img src="./image/<?php echo $giohang_item['hinhanh'] ?>">
                <p><?php echo $giohang_item['tensp'] ?><br>$<?php echo number_format($giohang_item['gia'],2) ?><br>
                <a href="themgiohang.php?tru=<?php echo $giohang_item['id'] ?>"><i class='bx bx-minus'></i></a><input disabled value="<?php echo $giohang_item['soluong'] ?>"><a href="themgiohang.php?cong=<?php echo $giohang_item['id'] ?>"><i class='bx bx-plus'></i></a></p>
                <span style="position:absolute; right:20px; top:10px;">$<?php echo number_format($tong,2) ?></span>
                <a name="xoa" href="themgiohang.php?xoa=<?php echo $giohang_item['id'] ?>">Xóa</a>
            </div>
            <?php 
                $i++;
            endwhile; 
            ?>
            <div class="thanhtoan">
                <h3>Tóm tắt đơn hàng</h3>
                <div style="float:left; line-height:30px; padding-left:10px;">
                    <span>Tạm tính</span><br>
                    <span>Vận chuyển</span><br>
                    <span>VAT</span><br>
                    <span style="font-weight:600;">Tổng cộng</span>
                </div>
                <div style="float:right; line-height:30px; padding-right:10px;">
                    <p style="float:right;">$<?php echo number_format($tamtinh,2) ?></p><br>
                    <p style="float:right;">$<?php echo number_format($ship,2) ?></p><br>
                    <p style="float:right;">$<?php echo number_format($VAT,2) ?></p><br>
                    <p style="font-weight:600;float:right;">$<?php echo number_format($tongcong,2) ?></p>
                </div>
                <div style="clear:both; text-align:center; margin-top:145px;">
                <form action="thongtin.php">
                <a href="themhoadon.php" name="tieptuc" style="padding-left: 15px; text-align:left;">Tiếp tục thanh toán<i style="margin-left:50px; margin-right:10px; vertical-align: middle; font-size:18px;" class='bx bx-arrow-back bx-rotate-180'></i></a>
                </form>
                </div>
            </div>
    </div>
    <?php } else { ?>
        <div style="margin-bottom:250px;" class="giohang">
        <h2>GIỎ HÀNG</h2>
        <div style="margin-top:0px; display:flex; justify-content:center; align-items:center;" class="sanpham">
            <span style="font-size:20px;">Không có sản phẩm nào trong giỏ hàng của bạn.</span>
        </div>
        <div class="thanhtoan" style="margin-top:3px;">
                <h3>Tóm tắt đơn hàng</h3>
                <div style="float:left; line-height:30px; padding-left:10px;">
                    <span>Tạm tính</span><br>
                    <span>Vận chuyển</span><br>
                    <span>VAT</span><br>
                    <span style="font-weight:600;">Tổng cộng</span>
                </div>
                <div style="float:right; line-height:30px; padding-right:10px;">
                    <p style="float:right;">$0.00</p><br>
                    <p style="float:right;">$0.00</p><br>
                    <p style="float:right;">$0.00</p><br>
                    <p style="font-weight:600;float:right;">$0.00</p>
                </div>
                <div style="clear:both; text-align:center; margin-top:145px;"><form action="thongtin.php">
                <a style="padding-left: 15px; text-align:left;">Tiếp tục thanh toán<i style="margin-left:50px; margin-right:10px; vertical-align: middle; font-size:18px;" class='bx bx-arrow-back bx-rotate-180'></i></a>
                </form>
                </div>
            </div>
        </div>
    <?php }
    include 'footer.php';
    ?>
</body>
</html>
