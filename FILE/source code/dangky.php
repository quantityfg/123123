<?php
include 'config.php';

// Khởi tạo các biến trống để lưu trữ thông tin người dùng
$tenkh = $tendn = $mk = $sodt = $diachi = $email = "";
$message = "";

if(isset($_POST['dangky'])){
    $tenkh = $_POST['tenkh'];
    $tendn = $_POST['tendn'];
    $mk = $_POST['mk'];
    $sodt = $_POST['sodt'];
    $diachi = $_POST['diachi'];
    $email = $_POST['email'];

    // Mã hóa mật khẩu

    try {
        // Kiểm tra xem tên đăng nhập đã tồn tại chưa
        $stmt = $db->prepare("SELECT * FROM `khachhang` WHERE `tendn` = ?");
        $stmt->execute([$tendn]);
    
        if ($stmt->rowCount() > 0) {
            // Nếu tên đăng nhập đã tồn tại
            $message = "Tên đăng nhập đã có, vui lòng chọn tên khác.";
        } else {
            // Kiểm tra xem số điện thoại đã tồn tại chưa
            $stmt = $db->prepare("SELECT * FROM `khachhang` WHERE `sodt` = ?");
            $stmt->execute([$sodt]);
    
            if ($stmt->rowCount() > 0) {
                // Nếu số điện thoại đã tồn tại
                $message1 = "Số điện thoại đã có, vui lòng nhập số khác.";
            } else {
                // Chèn dữ liệu mới vào cơ sở dữ liệu
                $stmt = $db->prepare("INSERT INTO `khachhang` (`tenkh`, `tendn`, `mk`, `sodt`, `diachi`, `email`) VALUES (?, ?, ?, ?, ?, ?)");
                $stmt->execute([$tenkh, $tendn, $mk, $sodt, $diachi, $email]);
                // Chuyển hướng sau khi đăng ký thành công
                header('location:xemdn.php');
                exit();
            }
        }
    } catch (PDOException $e) {
        $message = 'Lỗi: ' . $e->getMessage();
        $message1 = 'Lỗi: ' . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Đăng ký</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="dangky">
    <form method="post" enctype="multipart/form-data">
        <h2>Đăng ký</h2>
        <?php
        // Hiển thị thông báo nếu có
        if (!empty($message)) {
            echo '<p style="color: red;position:relative; top:-20px; left:30px;">' . $message . '</p>';
        } 
        if (!empty($message1)) {
            echo '<p style="color: red;position:relative; top:-20px; left:30px;">' . $message1 . '</p>';
        }
        ?>
        <div class="login">
            <input type="text" name="tenkh" placeholder=" "  value="<?php echo htmlspecialchars($tenkh); ?>" required>
            <label>Tên khách hàng</label>
        </div>
        <div class="login">
            <input type="text" name="tendn" placeholder=" " pattern=".{6,}" title="Tên phải có ít nhất 6 kí tự" value="<?php echo htmlspecialchars($tendn); ?>" required>
            <label for="name">Tên đăng nhập</label>
        </div>
        <div class="login">
            <input type="password" name="mk" placeholder=" " pattern=".{6,}" title="Mật khẩu phải có ít nhất 8 kí tự" required>
            <label>Mật khẩu</label>
        </div>
        <div class="login">
            <input type="text" name="sodt" maxlength="10" oninput="this.value = this.value.replace(/[^0-9]/g, '')" placeholder=" " title="Nhập đúng số điện thoại" value="<?php echo htmlspecialchars($sodt); ?>" required>
            <label>Số điện thoại</label>
        </div>
        <div class="login">
            <input type="text" name="email" placeholder=" " value="<?php echo htmlspecialchars($email); ?>" required>
            <label>Email</label>
        </div>
        <div class="login">
            <input type="text" name="diachi" placeholder=" " value="<?php echo htmlspecialchars($diachi); ?>" required>
            <label>Địa chỉ</label>
        </div>
        <div class="singup">
            <button type="submit" name="dangky">Đăng ký</button>
            <a href="index.php" type="huy">Hủy</a>
        </div>
    </form>
    </div>
</body>
</html>
