-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 22, 2024 lúc 01:25 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `banhang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `madm` int(11) NOT NULL,
  `tendm` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`madm`, `tendm`) VALUES
(1, 'Váy'),
(2, 'Quần'),
(3, 'Áo'),
(4, 'Kính'),
(5, 'Túi'),
(6, 'Giày'),
(7, 'Dép'),
(8, 'Dây chuyền');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `magh` int(11) NOT NULL,
  `idkh` int(11) NOT NULL,
  `codegh` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `giohang`
--

INSERT INTO `giohang` (`magh`, `idkh`, `codegh`) VALUES
(59, 0, '4507'),
(60, 0, '64962'),
(61, 0, '91283'),
(62, 0, '26282'),
(63, 0, '1849'),
(64, 0, '42420'),
(65, 0, '78049'),
(66, 0, '68360'),
(67, 0, '25599'),
(68, 0, '91857'),
(69, 0, '39182'),
(70, 0, '26633'),
(71, 0, '39092'),
(72, 0, '82738'),
(73, 0, '25801'),
(74, 0, '399'),
(75, 0, '23266'),
(76, 0, '53545'),
(77, 0, '80762'),
(78, 0, '96868'),
(79, 0, '82069'),
(80, 0, '53123'),
(81, 0, '67674'),
(82, 0, '18940'),
(83, 0, '28199'),
(84, 0, '24616'),
(85, 0, '91744'),
(86, 0, '25186'),
(87, 0, '27029'),
(88, 0, '32011'),
(89, 0, '1134'),
(90, 0, '76580'),
(91, 0, '5086'),
(92, 0, '25191'),
(93, 0, '42338'),
(94, 0, '76296'),
(95, 0, '93620'),
(96, 0, '14239'),
(97, 0, '83540'),
(98, 0, '23106'),
(99, 0, '18464');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohangct`
--

CREATE TABLE `giohangct` (
  `idghct` int(11) NOT NULL,
  `codegh` varchar(11) NOT NULL,
  `idsp` int(11) NOT NULL,
  `soluongsp` varchar(20) NOT NULL,
  `trangthaigh` varchar(255) NOT NULL DEFAULT 'Đặt hàng thành công'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `giohangct`
--

INSERT INTO `giohangct` (`idghct`, `codegh`, `idsp`, `soluongsp`, `trangthaigh`) VALUES
(101, '42338', 4, '1', 'Đã xác nhận đơn hàng'),
(102, '42338', 6, '1', 'Đã xác nhận đơn hàng'),
(103, '76296', 9, '1', 'Đã xác nhận đơn hàng'),
(104, '93620', 2, '1', 'Đã hủy đơn'),
(105, '93620', 3, '1', 'Đã hủy đơn'),
(106, '14239', 2, '1', 'Đã gửi yêu cầu hủy đơn !'),
(107, '83540', 2, '1', 'Hủy đơn hàng'),
(108, '23106', 3, '1', 'Đặt hàng thành công'),
(109, '18464', 3, '1', 'Đã gửi yêu cầu hủy đơn');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `id` int(11) NOT NULL,
  `tenkh` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `sodt` int(11) NOT NULL,
  `diachi` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`id`, `tenkh`, `email`, `sodt`, `diachi`) VALUES
(2, 'Đào Thanh Mai', 'KhoaNguyen@gmail.com', 328571784, 'Quảng Nam'),
(3, 'Đào Thanh Mai', 'nhatkhoathcs@gmail.com', 328571784, 'Quảng Nam'),
(4, 'KhoaNguyen', 'dtmai@gmail.com', 901982415, 'Huế'),
(5, 'KhoaNguyen', 'KhoaNguyen@gmail.com', 328571784, 'Quảng Nam'),
(6, 'Đào Thanh Mai', 'KhoaNguyen@gmail.com', 328571784, 'Quảng Nam'),
(7, 'KhoaNguyen', '23', 12, '23'),
(8, 'KhoaNguyen', 'nhatkhoathcs@gmail.com', 328571784, 'Đại Lộc, Quảng Nam'),
(9, 'Đào Thanh Mai', 'nhatkhoathcs@gmail.com', 328571784, 'Quảng Nam'),
(10, 'KhoaNguyen', 'nhatkhoathcs@gmail.com', 328571784, 'Quảng Nam'),
(11, 'KhoaNguyen', '121212', 901982415, '12345678'),
(12, 'Đào Thanh Mai', '121212', 328571784, '1'),
(13, 'KhoaNguyen', '121212', 328571784, '2'),
(14, 'Đào Thanh Mai', '121212', 328571784, 'Q'),
(15, 'Đào Thanh Mai', '121212', 328571784, '1'),
(16, 'Đào Thanh Mai', '121212', 328571784, '2'),
(17, 'KhoaNguyen', '121212', 328571784, '1'),
(18, 'Đào Thanh Mai', '121212', 328571784, '1'),
(19, 'KhoaNguyen', '121212', 901982415, 'b'),
(20, 'Đào Thanh Mai', '121212', 901982415, 'Q'),
(21, 'Đào Thanh Mai', '121212', 901982415, '1'),
(22, 'KhoaNguyen', '121212', 328571784, '1'),
(23, 'Đào Thanh Mai', '121212', 328571784, '1'),
(24, 'KhoaNguyen', '121212', 328571784, 'Khoa'),
(25, '121', '1212', 212, '12'),
(26, 'Đào Thanh Mai', 'nhatkhoathcs@gmail.con', 328571784, 'A'),
(27, 'Đào Thanh Mai', 'nhatkhoathcs@gmail.con', 328571784, 'Quảng Nam'),
(28, 'Đào Thanh Mai', 'nhatkhoathcs@gmail.con', 328571784, 'Quảng Nam'),
(29, 'Đào Thanh Mai', 'nhatkhoathcs@gmail.con', 328571784, '1'),
(30, 'Đào Thanh Mai', 'nhatkhoathcs@gmail.con', 328571784, 'Quảng Nam'),
(31, 'KhoaNguyen', '0966168465', 901982415, 'Q'),
(32, 'Đào Thanh Mai', 'nhatkhoathcs@gmail.con', 328571784, 'Q'),
(33, 'Nguyễn Nhật Khoa', 'nhatkhoathcs@gmail.con', 328571784, 'Quảng Nam'),
(34, 'KhoaNguyen', 'nhatkhoathcs@gmail.con', 901982415, 'Quảng Nam'),
(35, 'KhoaNguyen', 'nhatkhoathcs@gmail.con', 901982415, 'Quảng Nam'),
(36, 'Đào Thanh Mai', 'nhatkhoathcs@gmail.con', 328571784, 'Quảng Nam'),
(37, 'Đào Thanh Mai', 'nhatkhoathcs@gmail.con', 328571784, 'QUảng Nam'),
(38, 'Đào Thanh Mai', 'nhatkhoathcs@gmail.con', 328571784, 'Q'),
(39, 'Đào Thanh Mai', 'nhatkhoathcs@gmail.con', 328571784, 'Q'),
(40, 'Đào Thanh Mai', 'nhatkhoathcs@gmail.con', 328571784, '12'),
(41, 'Đào Thanh Mai', 'nhatkhoathcs@gmail.con', 328571784, '12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `idkh` int(11) NOT NULL,
  `tenkh` varchar(30) NOT NULL,
  `tendn` varchar(30) NOT NULL,
  `mk` varchar(30) NOT NULL,
  `sodt` varchar(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `diachi` varchar(200) NOT NULL,
  `role` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`idkh`, `tenkh`, `tendn`, `mk`, `sodt`, `email`, `diachi`, `role`) VALUES
(4, 'Khoa', 'KhoaNguyen', '123456', '0328571784', 'nhat@gmail.com', 'Quảng Nam', 1),
(5, 'Đào Thanh Mai', 'MaiDao', '234567', '0901982415', 'dtmai74.@gmail.com', '82 Quảng Tế, TP. Huế 3', 0),
(7, 'Nguyễn Lê Vân Nhi', 'Vannhi', '234567', '0328571784', 'vannhi@gmail.com', 'Số 10, Trần Cao Vân, Thị Trấn Ái Nghĩa, huyện Đại Lộc, tỉnh Quảng Nam', 0),
(33, '12121414', '1314141', '414343', '424324234', '32434324@gmail.com', 'gflgfgfg', 0),
(34, 'Nguyễn Nhật Khoa', '12121212', '21314151515', '24242', '424@gmail.com', '1214', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(11) NOT NULL,
  `tensp` varchar(100) NOT NULL,
  `gia` decimal(10,0) NOT NULL,
  `hinhanh` varchar(100) NOT NULL,
  `soluong` varchar(20) NOT NULL,
  `mota` varchar(400) NOT NULL,
  `madm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id`, `tensp`, `gia`, `hinhanh`, `soluong`, `mota`, `madm`) VALUES
(2, 'Váy màu xanh lá', 20, '2.jpg', '10', 'Chiếc đầm xanh mint có thiết kế đơn giản với tay ngắn và cổ tròn. Đai lưng tạo điểm nhấn ở eo, tôn lên vẻ thanh mảnh. Các phụ kiện trang sức như vòng cổ và nhẫn mang đến chút sang trọng, trang nhã. Tổng thể, bộ trang phục toát lên vẻ tươi tắn, tinh tế và hiện đại', 1),
(3, 'Váy màu trắng', 25, '3.jpg', '10', 'Chiếc váy trắng có thiết kế đơn giản với đường viền kẻ ngang sọc đỏ-xanh-trắng tạo điểm nhấn trên thân váy và dây vai. Vải chất liệu mềm mại, được xếp nếp tạo nên form váy dài xòe. Người mặc kết hợp cùng túi cói và khuyên tai to bản, tạo nên vẻ ngoài thanh lịch nhưng vẫn mang phong cách hiện đại', 1),
(4, 'Ví Nữ Da Màu Đen', 15, '4.jpg', '100', 'Đây là một chiếc ví da thanh lịch với màu xanh kim loại và tua rua nổi bật ở khóa kéo. Ví được cầm bởi một bàn tay có nhiều chiếc nhẫn và đồng hồ, thể hiện phong cách cá nhân. Nền là sự kết hợp màu vàng và xanh ngọc tạo nên bố cục ấn tượng', 5),
(5, 'Balo Nữ Màu Hồng', 10, '5.jpg', '10', 'Đây là một chiếc túi xách nhỏ đầy màu sắc và hiện đại. Với gam màu hồng neon nổi bật, túi thu hút sự chú ý ngay lập tức. Thiết kế đơn giản nhưng tinh tế, với dây đeo vai mảnh bằng xích kim loại. Chiếc túi này mang đến vẻ ngoài trẻ trung và năng động, phù hợp với những ai yêu thích phong cách thời trang cá tính', 5),
(6, 'Giày Cao Gót Nữ Màu Bạc', 25, '6.jpg', '10', 'Đây là một đôi giày cao gót sang trọng với thiết kế thanh lịch. Chất liệu da bóng màu xám bạc tạo nên vẻ ngoài tinh tế. Đường cong mềm mại ở phần gót giày cao mảnh càng nhấn mạnh vẻ quý phái. Đây là một lựa chọn lý tưởng cho những dịp cần hướng đến vẻ ngoài lịch sự', 6),
(7, 'Kính Nữ Màu Xanh', 7, '7.jpg', '10', 'Đây là một cặp kính râm nổi bật với gọng kính cứng màu xanh dương bắt mắt. Phần kiếng lớn và tối màu tạo nên vẻ ngoài thời trang cá tính. Thiết kế hiện đại phù hợp với những người ưa chuộng phong cách năng động, trẻ trung. Đây là một món phụ kiện thời trang ấn tượng, vừa chống chói lóa vừa tôn lên vẻ ngoài sành điệu', 4),
(8, 'Áo Hở Lưng Nữ Màu Xanh', 25, '8.jpg', '10', 'Chiếc váy xanh dương mang đến vẻ ngoài thanh lịch và cá tính. Với thiết kế đơn giản, váy có phần vai được cách điệu bằng một đường xẻ tinh tế, tạo nên vẻ đẹp nữ tính. Form ôm body giúp tôn lên đường cong của người mặc, đồng thời mang lại vẻ sang trọng, hiện đại.Tổng thể, chiếc váy là một món đồ thời trang ấn tượng,vừa tôn lên vẻ đẹp vừa phong cách', 3),
(9, 'Áo Thun Nữ Màu Hồng', 28, '9.jpg', '1', 'Chiếc áo hồng pastel mang đến vẻ đẹp nhẹ nhàng, nữ tính. Thiết kế cổ tròn đơn giản tạo nên sự thanh lịch, trong khi phần váy xòe nhẹ nhàng giúp tôn lên vẻ đẹp của người mặc. Tông màu hồng pastel mang đến cảm giác dịu dàng, vừa đủ để nổi bật mà không quá rực rỡ. Tổng thể, chiếc áo là một lựa chọn ấn tượng, phù hợp với những ai ưa chuộng phong cách nữ tính, tinh tế', 3),
(10, 'Áo Ngắn Nữ Màu Xanh', 32, '10.jpg', '10', 'Chiếc áo xanh dương sẫm mang đến vẻ đẹp tươi tắn, năng động. Thiết kế dạng yếm với đường cắt táo bạo tạo nên sự cá tính. Phom dáng ôm body giúp tôn lên được đường cong của người mặc. Cách lựa chọn màu sắc và họa tiết này mang đến cái nhìn hiện đại, trẻ trung, phù hợp với những ai ưa chuộng phong cách thời trang phóng khoáng', 3),
(11, 'Áo Cổ Lọ Nữ Màu Vàng', 35, '11.jpg', '10', 'Chiếc áo màu vàng rực rỡ với thiết kế cổ lọ ấn tượng. Form dáng ôm body tạo vẻ ngoài thanh lịch và tinh tế. Tông màu vàng nổi bật mang đến cảm giác tươi tắn, năng động, phù hợp với những ai muốn thể hiện vẻ đẹp tự tin và cá tính. Tổng thể, chiếc áo là một lựa chọn thời trang ấn tượng, vừa đủ sang trọng mà không quá cầu kỳ', 3),
(12, 'Đầm Nữ Màu Đỏ', 30, '12.jpg', '10', 'Chiếc váy đỏ rực rỡ với thiết kế xòe nhẹ nhàng và đường cắt đơn giản. Form dáng ôm nhẹ vòng eo và xòe ra từ phần eo xuống giúp tôn lên vẻ đẹp hài hòa của người mặc. Tông màu đỏ nổi bật mang đến sự tươi tắn, tự tin và thu hút. Tổng thể, chiếc váy là một lựa chọn thời trang thanh lịch và tinh tế, phù hợp với những ai muốn thể hiện phong cách sành điệu', 3),
(13, 'Đầm Nữ Màu Xanh Nhạt', 20, '13.jpg', '10', 'Chiếc áo yếm xanh nhạt với đường viền bèo nhún tạo điểm nhấn nữ tính. Phom dáng ôm body giúp tôn lên đường cong của người mặc. Tông màu xanh nhạt mang đến cảm giác nhẹ nhàng, tươi mới, phù hợp với những ai ưa chuộng phong cách thanh lịch và nữ tính. Thiết kế áo yếm cùng đường viền bèo nhún giúp tạo điểm nhấn, mang đến vẻ đẹp đầy sức sống và thu hút', 3),
(14, 'Áo Nữ Màu Hồng Nhạt', 20, '14.jpg', '10', 'Chiếc váy màu hồng nhạt với thiết kế dáng yếm đơn giản nhưng tinh tế. Form dáng ôm body tôn lên đường cong gọn gàng, mềm mại của người mặc. Tông màu hồng nhạt mang đến cảm giác dịu dàng, nữ tính và tươi mới. Thiết kế yếm đơn giản kết hợp với phom dáng ôm vừa phải tạo nên vẻ ngoài thanh lịch, trang nhã nhưng vẫn đủ năng động và thu hút. Tổng thể, chiếc váy là lựa chọn nữ tính và gọn gàng', 3),
(15, 'Áo Vải Nữ Màu Hồng Nhạt', 15, '15.jpg', '10', 'Chiếc áo sơ mi hồng nhạt với thiết kế nút buộc ở eo tạo điểm nhấn nữ tính. Phom dáng ôm vừa phải giúp tôn lên vóc dáng thanh thoát của người mặc. Tông màu hồng nhạt mang đến cảm giác dịu dàng, tươi tắn. Cách phối kết hợp với quần jeans tạo nên một set đồ trang nhã nhưng vẫn đủ cá tính. Tổng thể, chiếc áo là một lựa chọn thời trang phù hợp cho những ai ưa chuộng phong cách nữ tính, năng động', 3);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`madm`);

--
-- Chỉ mục cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`magh`);

--
-- Chỉ mục cho bảng `giohangct`
--
ALTER TABLE `giohangct`
  ADD PRIMARY KEY (`idghct`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`idkh`),
  ADD UNIQUE KEY `tendn` (`tendn`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `madm` (`madm`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `madm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `giohang`
--
ALTER TABLE `giohang`
  MODIFY `magh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT cho bảng `giohangct`
--
ALTER TABLE `giohangct`
  MODIFY `idghct` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `idkh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `madm_1` FOREIGN KEY (`madm`) REFERENCES `danhmuc` (`madm`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
