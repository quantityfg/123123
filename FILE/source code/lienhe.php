<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    include 'header.php';
    ?>
    <article  style="padding-top: 2.5%;">
        <div class="lienhe">
                <div class="bieumau">
                    <form>
                    <div class="input-container">
                        <input type="text" id="name" placeholder=" " pattern=".{6,}" title="Tên đăng nhập từ 6 kí tự trở lên" required>
                        <label for="name">Tên khách hàng</label>
                    </div>
                    <div class="input-container">
                        <input type="email" id="email" placeholder=" "  title="Nhập đúng định dạng của Email !"  required>
                        <label for="email">Email</label>
                    </div>
                    <div class="input-container">
                        <input type="text" id="address" placeholder=" " pattern=".{15,}" title="Địa chỉ chi tiết cụ thể !" required>
                        <label for="address">Địa chỉ</label>
                    </div>  
                    <div class="input-container">
                        <input type="text" id="phone" placeholder=" " pattern=".{10,}" maxlength="10" oninput="this.value = this.value.replace(/[^0-9]/g, '')" required>
                        <label for="phone">Số điện thoại</label>
                    </div>
                    <div class="input-container">
                        <textarea id="description" placeholder=" " required></textarea>
                        <label for="description">Mô tả</label>
                    </div>
                    <div class="input-container">
                        <button type="submit" name="lienhe">Submit</button>
                    </div>   
                </form>        
                </div>
            <div class="thongtin">
                <div>
                    <img width="100%" style="position:absolute; top:-80px; left:-10px" src="./image/logo.png">
                </div>
                <div class="div" style="margin-top: 120px;">
                    <h3>Số điện thoại</h3>
                    <p>+840328571784</p>
                </div>
                <div class="div">
                    <h3>Email</h3>
                    <p>nhatkhoathcs@gmail.com</p>
                </div>
                <div class="div">
                    <h3>Website</h3>
                    <p>thoitrangDTM.com.vn</p>
                </div>
            </div>
        </div>
    </article>
    <?php
    include 'footer.php';
    ?>
</body>
</html>