<?php
require 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="quenmk">
    <form enctype="multipart/form-data" method="post" action="mk.php">
        <h2>Quên mật khẩu</h2>
        <div class="login">
            <input type="text" name="tendn" placeholder=" " pattern=".{6,}"  title="Tên phải có ít nhất 6 kí tự" value="" required>
            <label>Tên đăng nhập</label>
        </div>
        <div class="login">
            <input type="email" name="email" placeholder=" " pattern=".{6,}" value="" required>
            <label for="name">Email</label>
        </div>
        <div>
            <button type="submit" name="xacnhan">Xác nhận</button><a style="text-decoration:none; color:black; margin-left:15px;" href="index.php">Hủy</a>
        </div>
    </form>
</div>
</body>
</html>