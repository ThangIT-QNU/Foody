-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 05, 2021 lúc 04:39 PM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `foody`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `idHoaDon` int(11) NOT NULL,
  `tenMonAn` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `giaTien` float NOT NULL,
  `soLuong` int(11) NOT NULL,
  `thanhTien` float NOT NULL,
  `ngayLapHoaDon` date NOT NULL,
  `idChiTietHoaDon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaimonan`
--

CREATE TABLE `loaimonan` (
  `idLoaiMonAn` int(11) NOT NULL,
  `tenLoaiMonAn` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loaimonan`
--

INSERT INTO `loaimonan` (`idLoaiMonAn`, `tenLoaiMonAn`) VALUES
(1, 'Cơm Gia Đình'),
(2, 'Đồ Ăn Hải Sản'),
(3, 'Đồ Ăn Vặt');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `monan`
--

CREATE TABLE `monan` (
  `idMonAn` int(11) NOT NULL,
  `idLoaiMonAn` int(11) NOT NULL,
  `tenMonAn` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `hinhAnh` text COLLATE utf8_unicode_ci NOT NULL,
  `thongTinMonAn` text COLLATE utf8_unicode_ci NOT NULL,
  `soLuong` int(11) NOT NULL,
  `giaBan` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `monan`
--

INSERT INTO `monan` (`idMonAn`, `idLoaiMonAn`, `tenMonAn`, `hinhAnh`, `thongTinMonAn`, `soLuong`, `giaBan`) VALUES
(1, 1, 'Cơm Gà', 'comDaoGa.jpg', 'Cơm gà Tam Kỳ là món ăn đặc sản của vùng đất Tam Kỳ - Quảng Nam. Cơm gà Tam Kỳ rất dễ làm, hương vị lại hấp dẫn, nhiều người nếm thử một lần rồi nhớ mãi.', 10, 50000),
(2, 2, 'Cơm Chiên Hải Sản', 'comchienhaisan.jpg', 'Cơm chiên hải sản là sự kết hợp hoàn hảo giữa cơm, trứng, hải sản tạo nên món ngon hấp dẫn được nhiều người yêu thích. Cách làm cơm chiên hải sản đơn giản, dễ thực hiện chị em có thể làm nhanh để cả nhà có món ngon đổi bữa.', 10, 40000),
(3, 3, 'Khô Gà Lá Chanh', 'tipuSnaks.jpg', 'Khô gà xé lá chanh hiện đang là món ăn vặt “làm mưa làm gió” trên thị trường. Trước sức nóng đó, việc bạn muốn tự đầu tư sản xuất và kinh doanh sản phẩm này là điều dễ hiểu. Tuy nhiên, để làm ra sản phẩm khô gà xe lá chanh ngon nhìn qua có vẻ đơn giản nhưng lại không dễ dàng. Nắm bắt được xu hướng đó, VinaOrganic đã đưa ra công nghệ khô gà xé lá chanh với quy trình và công thức đã được chuẩn hóa, cho ra một sản phẩm khô gà xé lá chanh chất lượng tuyệt hảo.', 5, 100000),
(5, 1, 'Cơm Gà Chiên Mắm', 'comgachienmam1.jpg', 'Cơm gà chiên mắm là món ăn đặc sản của vùng đất Tam Kỳ - Quảng Nam. Cơm gà chiên Tam Kỳ rất dễ làm, hương vị lại hấp dẫn, nhiều người nếm thử một lần rồi nhớ mãi.', 10, 50000),
(6, 2, 'Mực Chiên Mắm', 'mucchienmam1.jpg', 'Mực là một trong số loại hải sản ngon, bổ dưỡng có rất nhiều cách chế biến khác nhau. Trong chuyên mục góc ẩm thực Hương Sen Hôm nay chúng tôi sẽ giới thiệu đến các bạn cách chế biến một món ăn khá độc đáo hấp dẫn từ mực đó là món mực chiên nước mắm. Món ăn có cách chế biến khá đơn giản, nhanh gọn mà lại vô cùng đậm đà thơm ngon. Khi thưởng thức các bạn sẽ cảm nhận được sự giòn dai của mực cùng với mùi thơm đặc trưng của nước mắm, đảm bảo sẽ giúp cho bữa ăn gia đình của bạn thêm hấp dẫn hơn. Vậy các bạn hãy cùng nhau bắt tay vào chế biến món mực chiên nước mắm để thay đổi những bữa ăn gia đình trở nên mới lạ hơn.', 11, 50000),
(7, 2, 'Bạch Tuộc Hấp', 'bachtuochap.jpg', 'Bạch tuộc hấp là món ăn được rất nhiều gia đình ưa thích, nhất là trong những ngày thời tiết mát lạnh, bên cạnh một đĩa bạch tuộc hấp thơm giòn sần sật, hương vị hải sản lan tỏa, xích mọi người lại gần nhau hơn. Còn gì tuyệt hơn điều ấy chứ? Cùng YummyDay vào bếp  tìm hiểu cách làm bạch tuộc hấp ngay nào!', 5, 30000),
(8, 3, 'Nem nướng', 'nemnuong.jpg', 'Nem nướng được xem là một trong những món đặc sản cực kỳ nổi tiếng của tỉnh Khánh Hòa - Nha Trang. Món ăn được chế biến từ hỗn hợp thịt và mỡ heo, nêm nếm thêm gia vị cho vừa ăn. Sau đó, thịt sẽ được xiên vào đũa rồi nướng chín trên bếp than.', 10, 50000),
(9, 3, 'Bánh tráng trộn', 'banhtrantron.jpg', 'Bánh tráng trộn luôn là cái tên “hot” được mọi người xướng tên đầu tiên khi nhắc đến món ăn vặt. Chỉ với vài nguyên liệu cơ bản từ bánh tráng cắt sợi, khô bò, trứng cút, đậu phộng, xoài, rau răm và sa tế cũng đủ để bạn làm nên một bịch bánh tráng thơm ngon, hấp dẫn.', 5, 30000),
(10, 1, 'Cơm chiên trứng ', 'comchientrung.jpg', 'Cơm chiên trứng là một món ăn rất quen thuộc với tất cả mọi người, chỉ với vài nguyên liệu đơn giản, là bạn đã có ngay một đĩa cơm chiên trứng ngon lành và bổ dưỡng rồi.', 10, 50000),
(11, 1, 'Cơm chiên Dương Châu', 'comchienduongchau.jpg', 'Cơm chiên Dương Châu là một món ăn nổi tiếng, hầu như tất cả các nhà hàng Trung Quốc nào cũng có món cơm chiên này. Hãy cùng học nấu ăn với món cơm chiên Dương Châu này nào.', 5, 30000),
(12, 3, 'Bánh trân châu đường đen', 'Banhtranchau.jpg', 'Bánh trà sữa trân châu đường đen của vị mềm mịn thơm hương trà lại được phủ thêm lớp kem trân châu lên làm các tín đồ trà sữa mê tít mắt\r\n\r\n', 5, 20000),
(13, 3, 'Bánh cuốn', 'Banhcuon.jpg', 'Bánh cuốn là một món ăn khá phổ biến và được ưa chuộng ở khắp 3 miền Bắc, Trung, Nam Việt Nam. Mỗi miền sẽ có một công thức cuốn riêng tạo nên hương vị đặc trưng của món cuốn vùng đó, nhưng cho dù ở đâu thì khi nhắc đến món bánh cuốn người ta sẽ nhớ ngay đến mùi vị thơm ngon, hấp dẫn khó cưỡng của nó và chỉ muốn chạy nhanh đến một quán thật ngon để được ăn cho thỏa thích.', 5, 20000),
(14, 3, 'Bánh dâu', 'Banhdau.jpg', 'Bánh dâu tây vừa đơn giản đẹp mắt lại vô cùng ngon miệng. Vị chua nhẹ, béo ngậy của phô mai quyện cùng với vị tươi mát, chua thanh của dâu tây sẽ khiến cho bạn nhớ mãi món ăn này.', 5, 15000),
(15, 1, 'Cơm tấm sườn', 'comtamsuon.jpg', 'Miếng sườn cốt lết  được tẩm ướp cầu kỳ và công phu để mang lại hương vị đậm đà thấm sâu vào từng thớ thịt. Với những người không thích phải gặm xương như ăn sườn non thì miếng sườn cốt lết là lựa chọn hợp lý để ăn kèm cơm tấm mà vẫn giữ nguyên mùi và vị.', 10, 30000),
(16, 1, 'Bún riêu cua', 'bunrieucua.jpg', 'Bún riêu cua là một món nước hấp dẫn đổi vị cho bữa cơm gia đình hoặc là món ăn sáng thơm ngon.', 15, 20000),
(17, 1, 'Bún hải sản', 'bunHaiSan.jpg', 'Bún hải sản là sự kết hợp hài hòa giữa bị ngọt béo của nước hầm xương cùng nhiều loại hải sản tươi ngon, ngọt thanh. Đặc biệt, món ăn này còn mang đến giá trị dinh dưỡng cao', 5, 20000),
(18, 1, 'Gà bó xôi', 'Gaboxoi.jpg', 'Gà bó xôi là món ăn rất được các vua chúa, quý tộc ngày xưa yêu thích nhờ hương vị đậm đà, thơm ngon của thịt gà kết hợp cùng hạt sen, nấm hương,... Bên cạnh đó, phần xôi bọc bên ngòài vàng giòn vô cùng đẹp mắt và hấp dẫn', 6, 20000),
(19, 3, 'Bắp xào', 'bapXao.jpg', 'Bắp xào bơ, một món ăn đường phố quen thuộc của hầu hết mọi người, đặc biệt là các bạn trẻ yêu thích ăn vặt. Một món ăn tưởng chừng như đơn giản nhưng lại mang đến một hương vị rất khó quên.', 5, 10000),
(20, 2, 'Lẫu hải sản', 'lauHaiSan.jpeg', 'Lẩu hải sản, đây là món ăn giúp cả nhà có thể vừa thưởng thức vừa chuyện trò, chia sẻ với nhau. Món lẩu này được mọi người rất yêu thích bởi nó có thể tận dụng được độ ngọt từ hải sản để làm nên nước lẩu, kết hợp với các loại rau, nấm đặc trưng.', 10, 200000),
(21, 3, 'Ốc bưu nướng tiêu xanh', 'ocbuu.jpg', 'Ốc bươu nướng tiêu xanh cay cay đậm đà hương vị sẽ mang đến cho bạn một hương vị mới nhưng không hề thua kém các món chế biến từ ốc khác. Vị cay ngay đầu lưỡi cùng với miếng thịt ốc dai dai thơm ngon sẽ làm bạn muốn ăn mãi đến nghiền. ', 20, 50000),
(22, 2, 'Lẫu thái', 'lauThai.jpg', 'Lẩu thái mang một hương vị khác biệt không lẫn với bất kỳ món lẩu nào khác bởi vị nước lẩu chua chua cay cay, với hương thơm của riềng, xả nhúng kèm với các loại rau và hải sản tươi sống.', 10, 150000),
(23, 1, 'Canh chua cá lóc', 'canhchuacaloc.jpg', 'Là món canh truyền thống của người Nam bộ, mang vị chua ngọt đậm đà nhưng không bị bốc mùi tanh của cá, có sự hòa quyện của thịt cá và các loại rau dân dã, thích hợp ăn nóng kèm với cơm trong bữa ăn hàng ngày', 4, 70000),
(24, 3, 'Mì xào', 'miXao.jpg', 'Mì xào thường có màu vàng ươm, kết hợp với độ bóng mượt của dầu, mỡ, nhưng vẫn đảm bảo độ khô nhất định, luôn là món ăn hấp dẫn thực khách', 3, 40000),
(25, 3, 'Bánh tráng nướng', 'banhTrangNuong.jpg', 'Bánh tráng nướng có lớp bánh tráng giòn nhẹ được xếp lớp với vô số lớp phủ thơm ngon.', 20, 15000),
(26, 1, 'Thịt kho tàu', 'thitkhotau.jpg', 'Thịt kho tàu là món ăn rất quen thuộc trong mỗi mâm cơm của gia đình Việt, hương vị đậm đà, béo ngậy của từng miếng thịt hòa quyện với trứng vịt tạo ra một món ăn hấp dẫn không thể nào chối từ được.', 10, 45000),
(27, 1, 'Cá kho tộ', 'cakhoto.jpg', 'Cái vị ngọt mềm, thơm ngậy của thịt cá, chút mằn mặn của nước mắm se se vị cay của ớt đã tạo nên hương vị đặc trưng của món ăn này. ', 7, 50000),
(28, 1, 'Thịt kho tàu', 'thitkhotau.jpg', 'Thịt kho tàu là món ăn rất quen thuộc trong mỗi mâm cơm của gia đình Việt, hương vị đậm đà, béo ngậy của từng miếng thịt hòa quyện với trứng vịt tạo ra một món ăn hấp dẫn không thể nào chối từ được.', 7, 50000),
(29, 1, 'Cơm cuộn rong biển', 'comcuon.jpg', 'Cơm cuộn rong biển không xa lạ đối với người Việt Nam,bởi Cơm cuộn rong biển rất ngon. Dễ ăn và dễ làm,lại rất tiện lợi cho các bé ăn kèm thêm rau,các bạn làm việc cần mang thêm cơm.', 10, 50000),
(30, 1, 'Cá kho tộ', 'cakhoto.jpg', 'những niêu cá kho chinh phục người ăn bằng hương vị đậm đà, béo ngậy, thơm ngon và đặc biệt tốn cơm.', 7, 50000),
(31, 2, 'Gỏi hải sản Thái Lan', 'goihaisan.jpg', 'Nếu bạn là người mê ẩm thực và yêu thích món gỏi thì không thể nào bỏ qua món gỏi hải sản Thái Lan. Một món ăn đầy đủ hương vị chua, cay, mặn, ngọt sẽ mang đến cho bạn bất ngờ đến khó quên.', 8, 80000),
(32, 2, 'Chả giò trái câu hải sản', 'chagiohaisan.jpg', ' Vị thơm ngọt của trái cây hòa với vị tươi ngon của hải sản chắc chắn sẽ đem đến cho bạn sự mới lạ.', 13, 30000),
(33, 2, 'Nui xào hải sản', 'nui.png', 'Bạn sẽ cảm nhận được sự mềm mềm, dai dai của nui cộng với giòn ngọt của hải sản, thêm chút chua ngọt của nước sốt cà chua, thơm thơm của húng quế.', 9, 50000),
(34, 2, 'Nghêu hấp xả', 'ngheu.jpg', 'Nghêu hấp sả (ngao hấp sả) là món ăn dân dã, quen thuộc với vị ngọt đặc trưng của nghêu tươi kết hợp với vị cay cay của ớt, thơm thơm của sả làm nên một món ăn tuyệt vời. ', 16, 90000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `idTaiKhoan` int(11) NOT NULL,
  `tenTaiKhoan` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `matKhau` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `hoVaTen` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sdt` int(10) NOT NULL,
  `diaChi` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `quyen` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0:user,1:admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`idTaiKhoan`, `tenTaiKhoan`, `matKhau`, `hoVaTen`, `email`, `sdt`, `diaChi`, `quyen`) VALUES
(1, 'thang', 'thang123', 'Thắng', 'mtpthang829@gmail.com', 0, 'Cát Tài', 1),
(2, 'thang123', 'thang123', 'Đinh Thành Thắng', 'thangitqnu@gmail.com', 0, 'Quy Nhơn', 0),
(3, 'tuyen', 'thang123', '', 'mtpthang829@gmail.com', 0, '', 1),
(4, 'tuyen123', 'thang123', 'Thanh Tuyền', 'mtpthang829@gmail.com', 0, '', 1),
(11, 'Thang', '123456', 'Mai Thị Chi', 'mtpthang829@gmail.com', 989725994, 'Cát Tài', 1),
(15, '', '123456', 'csabjslkaas', 'mtpthang829@gmail.com', 989725994, 'Cát Thành', 0),
(16, '', '123456', 'csabjslkaas', 'mtpthang829@gmail.com', 989725994, 'Cát Thành', 0),
(17, '', '123456', 'sac', 'mtpthang829@gmail.com', 989725994, 'vdxz', 0),
(18, '', '123456', 'sac', 'mtpthang829@gmail.com', 989725994, 'vdxz', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`idHoaDon`);

--
-- Chỉ mục cho bảng `loaimonan`
--
ALTER TABLE `loaimonan`
  ADD PRIMARY KEY (`idLoaiMonAn`) USING BTREE;

--
-- Chỉ mục cho bảng `monan`
--
ALTER TABLE `monan`
  ADD PRIMARY KEY (`idMonAn`),
  ADD KEY `fk_idLoaiMonAn` (`idLoaiMonAn`) USING BTREE;

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`idTaiKhoan`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `idHoaDon` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `loaimonan`
--
ALTER TABLE `loaimonan`
  MODIFY `idLoaiMonAn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `monan`
--
ALTER TABLE `monan`
  MODIFY `idMonAn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `idTaiKhoan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `monan`
--
ALTER TABLE `monan`
  ADD CONSTRAINT `monan_ibfk_1` FOREIGN KEY (`idLoaiMonAn`) REFERENCES `loaimonan` (`idLoaiMonAn`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
