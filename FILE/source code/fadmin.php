<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet">
    <style>
        footer{
    width: 100%;
    height: auto;
    background-color: antiquewhite;
}
.footer{
    display: flex;
    width: 100%;
    gap: 85px;
    justify-content:center;
}
.footer>div{
    width: 13%;
    text-align: left;
    line-height: 28px;
    padding: 30px 0 60px 0;
}
.footer>div>h4{
    font-size: 15px;
    margin-bottom: 15px;
}
.footer>div p{
    font-size: 14px;
    color:rgb(110, 110, 110);
    width: fit-content;
    position: relative;
}
.footer>div p::after{
    content: '';
    position: absolute;
    width: 0;
    height: 1.5px;
    top:22px;
    left: 0;
    transition: width 0.5s;
    background-color: black;
}
.footer>div p:hover::after{
    width: 100%;
}
.footer>div p:hover{
    color:black;
    cursor: pointer;
}
.footer>div:last-child{
    width: 18%;
}
.footer .get a{
    text-decoration: none;
    width: 130px;
    height:50px;
    padding: 5px 0;
    margin-top: -3px;
    border-radius: 5px;
    margin-bottom: 10px;
}
.footer .get a i{
    float: left;
    margin-top: 7px;
    font-size: 24px;
    margin-right: 5px;
    margin-left: 5px;
}   

.footer .get span{
    font-size: 13px;
    margin-right: 5%;
    font-weight: 500;
}
.footer .get{
    display: flex;
    line-height: 17px;
    gap:12px;
    margin-bottom: 10px;
}
    </style>
</head>
<body>
    <footer>
        <div class="footer" style="height:250px">
        <div>
            <h4>VỀ CHÚNG TÔI</h4>
            <p>Chúng tôi là ai</p>
            <p>Làm việc với chúng tôi</p>
            <p>Trở thành nhà cung cấp</p>
            <p>Quan hệ đầu tư</p>
        </div>
        <div>
            <h4>LIÊN KẾT HỮU ÍCH</h4>
            <p>Thiết bị của chúng tôi</p>
            <p>Trở thành nhà cung cấp</p>
            <p>Chương trình liên kết</p>
            <p>Làm việc với chúng tôi</p>
        </div>
        <div>
            <h4>MUA SẮM TRỰC TUYẾN</h4>
            <p>Quan hệ đầu tư</p>
            <p>Trở thành nhà cung cấp</p>
            <p>Chúng tôi là ai</p>
            <p>Chương trình liên kết</p>
        </div>
        <div>
            <h4>TRẢI NGHIỆM ỨNG DỤNG DI ĐỘNG</h4>
            <div class="get">
            <a class="a1" href="">
                <i class='bx bxl-android'></i>
                <span><e style="font-size: 9.5px; font-weight: 400;">TẢI XUỐNG BỞI</e><br>
                GOOGLE PLAY
                </span>
            </a>
            <a class="a2" href="">
                <i style="font-size: 22px; margin-top: 8.5px;"  class='bx bxl-apple'></i>
                <span><e style="font-size: 9px; font-weight: 400;">TẢI XUỐNG BỞI</e><br>
                APP STORE
                </span>
            </a>
        </div>
        <hr>
            <div class="online">
                <h4>MUA SẮM TRỰC TIẾP</h4>
                <i class='bx bxl-facebook'></i>
                <i class='bx bxl-twitter' ></i>
                <i class='bx bxl-pinterest-alt' ></i>
                <i class='bx bxl-instagram' ></i>
            </div>
        </div>
    </div>
        <div style="clear: both; text-align: center; padding-bottom: 5px;">
            <hr style="margin: 0 auto; width:74%;"><br>
            <p style="margin-bottom: 10px;">Copyright © 2024. Thiết kết website: Nguyễn Nhật Khoa</p>
        </div>
    </footer>
</body>
</html>