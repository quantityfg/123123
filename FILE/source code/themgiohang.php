<?php
session_start();
$user = isset($_SESSION['tendn']) ? $_SESSION['tendn'] : '';
if (empty($user)) {
    echo "<script>alert('Bạn chưa đăng nhập. Vui lòng đăng nhập !');</script>";
    echo "<script>window.location.href = 'dangnhap.php';</script>";
    exit; // Kết thúc script sau khi chuyển hướng
}
include 'config.php';
// lien he
//cong sp

if(isset($_GET['cong'])){
    $id = $_GET['cong'];
    $sanpham = array(); // Khởi tạo một mảng mới để lưu trữ giỏ hàng cập nhật

    foreach ($_SESSION['giohang'] as $giohang_item){
        if($giohang_item['id'] != $id){
            $sanpham[] = $giohang_item;
        } else {
            $tangsoluong = $giohang_item['soluong'] + 1;
            $soluong += 1;
            $giohang_item['soluong'] += 1;
            $sanpham[] = $giohang_item; // Thêm mục đã được cập nhật vào mảng mới
        }
    }
    
    $_SESSION['giohang'] = $sanpham; // Gán lại giỏ hàng với mảng mới
    header('Location:giohang.php');
}

// tru sp
if (isset($_GET['tru'])) {
    $id = $_GET['tru'];
    $sanpham = array(); // Khởi tạo một mảng mới để lưu trữ giỏ hàng cập nhật

    foreach ($_SESSION['giohang'] as $giohang_item) {
        if ($giohang_item['id'] == $id) {
            // Giảm số lượng của sản phẩm này
            $giohang_item['soluong'] -= 1;

            // Chỉ thêm sản phẩm nếu số lượng lớn hơn 0
            if ($giohang_item['soluong'] > 0) {
                $sanpham[] = $giohang_item;
            }
        } else {
            // Thêm lại các sản phẩm khác vào mảng mới
            $sanpham[] = $giohang_item;
        }
    }

    // Cập nhật giỏ hàng với mảng mới
    $_SESSION['giohang'] = $sanpham;
    header('Location: giohang.php');
    exit; // Ensure script termination after redirection
}

// xoa theo id
if(isset($_SESSION['giohang']) && isset($_GET['xoa'])){
    $id=$_GET['xoa'];
    foreach ($_SESSION['giohang'] as $giohang_item){
        if($giohang_item['id']!=$id){
            $sanpham[] = array(
                'tensp' => $giohang_item['tensp'],
                'id' => $giohang_item['id'],
                'soluong' => $giohang_item['soluong'],
                'gia' => $giohang_item['gia'],
                'hinhanh' => $giohang_item['hinhanh'],
                'madm' => $giohang_item['madm']
            );
        }
        $_SESSION['giohang'] = $sanpham;
        header('location:giohang.php'); 
    }
};
// xoa all
if(isset($_GET['xoaall'])){
    unset($_SESSION['giohang']);
    header('location:giohang.php');
};
// them sanpham
if (isset($_POST['themgiohang'])) {
    $id = $_GET['id'];
    $soluong = 1;

    // Thực thi SQL để lấy sản phẩm từ bảng `sanpham`
    $sql = "SELECT * FROM sanpham WHERE id = :id LIMIT 1";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    // Truy xuất dữ liệu dưới dạng mảng liên kết
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        $new_sanpham = array(array(
            'tensp' => $result['tensp'],
            'id' => $id,
            'soluong' => $soluong,
            'gia' => $result['gia'],
            'hinhanh' => $result['hinhanh'],
            'madm' => $result['madm']
        ));

        if (isset($_SESSION['giohang'])) {
            $found = false;
            $sanpham = array();

            foreach ($_SESSION['giohang'] as $giohang_item) {
                if ($giohang_item['id'] == $id) {
                    $sanpham[] = array(
                        'tensp' => $giohang_item['tensp'],
                        'id' => $giohang_item['id'],
                        'soluong' => $giohang_item['soluong'] + 1,
                        'gia' => $giohang_item['gia'],
                        'hinhanh' => $giohang_item['hinhanh'],
                        'madm' => $giohang_item['madm']
                    );
                    $found = true;
                } else {
                    $sanpham[] = array(
                        'tensp' => $giohang_item['tensp'],
                        'id' => $giohang_item['id'],
                        'soluong' => $giohang_item['soluong'],
                        'gia' => $giohang_item['gia'],
                        'hinhanh' => $giohang_item['hinhanh'],
                        'madm' => $giohang_item['madm']
                    );
                }
            }

            if (!$found) {
                $sanpham = array_merge($sanpham, $new_sanpham);
            }

            $_SESSION['giohang'] = $sanpham;

        } else {
            $_SESSION['giohang'] = $new_sanpham;
        }
    }
    header("location:tb.php");
}
?>