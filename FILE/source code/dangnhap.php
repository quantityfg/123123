<?php
        $lifetime = 60*60*24*365;
        session_set_cookie_params($lifetime,'/');
        session_start();//khởi tạo sesstion
        ?>
        <?php
    // Kiểm tra xem session đã tồn tại chưa
    if(session_status() === PHP_SESSION_NONE) {
        $lifetime = 60*60*24*365;
        session_set_cookie_params($lifetime,'/');
        session_start();//khởi tạo sesstion
    }
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php 
        include 'config.php';
        // Khi nhấn vào nút đăng nhập
        if(isset($_POST['tendn']) && !empty($_POST['tendn']) && isset($_POST['mk']) && !empty($_POST['mk'])){
          $username = $_POST['tendn'];
          $password = $_POST['mk'];
          $sql = "SELECT * FROM khachhang WHERE tendn = '".$username."' AND mk = '".$password."'";
          $result = $db ->query($sql);
          $rs = $result->fetch(PDO::FETCH_ASSOC);
          if ($rs && $rs['role'] == 1) {
            $_SESSION['tendn'] = $username;
            $_SESSION['mk'] = $password;
            header('location: admin.php');
            exit();
        } elseif ($rs && $rs['role'] == 0) {
            $_SESSION['tendn'] = $username;
            $_SESSION['mk'] = $password;
            header('Location:index.php');
            exit();
          }else{
            echo '<script language="javascript">';
            echo 'alert("Sai tên đăng nhập hoặc mật khẩu.")';
            echo '</script>';
          }
        }
    ?>  
<div class="dangnhap">
  <form action="<?php echo $_SERVER['PHP_SELF'];?>" method = "post" enctype="multipart/form-data">
  <div class="login">
    <h2>Đăng nhập</h2>
      <input type="text" name="tendn" placeholder=" " required>
      <label for="name">Tài khoản</label>
      </div>
      <div class="login">
      <input type="password" name="mk" placeholder=" " required>
      <label for="matkhau">Mật khẩu</label>
      </div>
      <div class="thua">
        <button type="submit">Đăng nhập</button>
        <a href="dangky.php">Đăng ký</a><a style="text-decoration:none; color:black; margin-left:15px; background-color:white;" href="index.php">Hủy</a>
      </div>
      <a class="quen" href="quenmk.php">Quên mật khẩu ?</a>
  </form>
</div>
</body>
</html>
