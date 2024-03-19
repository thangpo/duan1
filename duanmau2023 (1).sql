-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 21, 2024 lúc 04:43 PM
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
-- Cơ sở dữ liệu: `duanmau2023`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `id_bill` int(10) NOT NULL,
  `id_taikhoan` int(10) NOT NULL DEFAULT 0,
  `bill_name` varchar(250) NOT NULL,
  `bill_address` varchar(250) NOT NULL,
  `bill_phonenum` varchar(11) NOT NULL,
  `bill_email` varchar(150) NOT NULL,
  `bill_payment` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1.TT Trực tiếp 2.Chuyển khoản 3.Thanh toán online',
  `ngaydathang` varchar(50) DEFAULT NULL,
  `total` int(11) NOT NULL DEFAULT 0,
  `bill_status` tinyint(1) DEFAULT 0 COMMENT '0.Đơn mới 1.Đang xử lý 2.Đang giao 3.Đã giao',
  `receive_name` varchar(250) DEFAULT NULL,
  `receive_address` varchar(250) DEFAULT NULL,
  `receive_phonenum` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `bill`
--

INSERT INTO `bill` (`id_bill`, `id_taikhoan`, `bill_name`, `bill_address`, `bill_phonenum`, `bill_email`, `bill_payment`, `ngaydathang`, `total`, `bill_status`, `receive_name`, `receive_address`, `receive_phonenum`) VALUES
(3, 1, 'admin123', 'Đông Mỹ', '364191792', 'uckgudu@gmail.com', 0, '09:36:37am 20/02/2024', 600250, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `id_binhluan` int(10) NOT NULL,
  `noidung` varchar(255) NOT NULL,
  `id_sanpham` int(10) NOT NULL,
  `id_taikhoan` int(10) NOT NULL,
  `ngaybinhluan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `binhluan`
--

INSERT INTO `binhluan` (`id_binhluan`, `noidung`, `id_sanpham`, `id_taikhoan`, `ngaybinhluan`) VALUES
(26, 'Sách rấc bổ ích', 35, 1, '01:45:36am 21/02/2024'),
(27, 'Tuyệt tác', 32, 1, '01:45:51am 21/02/2024'),
(28, 'Như quần què', 24, 1, '01:46:03am 21/02/2024'),
(29, 'Shop có bán áo đen không', 23, 1, '01:46:14am 21/02/2024'),
(30, 'MÌ có vị như mì', 21, 1, '01:46:27am 21/02/2024'),
(33, 'bát đập là bị vỡ', 38, 1, '03:43:15pm 21/02/2024');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id_cart` int(10) NOT NULL,
  `id_taikhoan` int(10) NOT NULL,
  `id_sanpham` int(10) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `name_sanpham` varchar(255) DEFAULT NULL,
  `price` int(11) NOT NULL DEFAULT 0,
  `soluong` int(3) NOT NULL,
  `thanhtien` int(11) NOT NULL,
  `id_bill` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id_cart`, `id_taikhoan`, `id_sanpham`, `img`, `name_sanpham`, `price`, `soluong`, `thanhtien`, `id_bill`) VALUES
(7, 1, 35, 'vi-sinh-vat-vi-tinh.jpg', 'Vi sinh vật vi tính', 52250, 1, 52250, 3),
(8, 1, 33, 'nhungnhathamhiemhamho.jpg', 'Những nhà thám hiểm hăm hở', 58000, 1, 58000, 3),
(9, 1, 23, '20221013_n6HKsuzizp6K2vDgrJLI4qA8.jpg', 'Áo phông trắng', 90000, 1, 90000, 3),
(10, 1, 22, '20231023_74YUAwr0Fe.jpg', 'Áo khoác Cardigan Aerospace', 400000, 1, 400000, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id_danhmuc` int(10) NOT NULL,
  `name_danhmuc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`id_danhmuc`, `name_danhmuc`) VALUES
(8, 'Tiêu dùng'),
(9, 'Thời trang'),
(10, 'Công nghệ'),
(11, 'Sách Tạp chí'),
(12, 'Gia dụng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id_sanpham` int(10) NOT NULL,
  `name_sanpham` varchar(255) NOT NULL,
  `price` double(10,2) NOT NULL DEFAULT 0.00,
  `img` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `view` int(11) NOT NULL DEFAULT 0,
  `id_danhmuc` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id_sanpham`, `name_sanpham`, `price`, `img`, `description`, `view`, `id_danhmuc`) VALUES
(18, 'Muối I-ốt Bạc Liêu', 5000.00, 'muoiiot-scaled.jpg', '                    Sản phẩm Muối Iốt Bạc Liêu được Công ty cổ phần muối Bạc Liêu sản xuất từ nguồn nguyên liệu Muối biển (NaCl) do diêm dân tại địa phương sản xuất ra và Kali iodat (KIO3) do Bệnh viện nội tiết cấp từ chương trình phòng chống bướu cổ. Sản phẩm được sản xuất trên dây chuyền đạt an toàn vệ sinh thực phẩm và quản lý theo QCVN 9-1: 2011/BYT đối với muối Iốt.\r\nThời hạn sử dụng:\r\n– Thời gian sử dụng: 24 tháng kể từ ngày sản xuất\r\n– Ngày sản xuất: In trên bao bì\r\nHướng dẫn sử dụng và bảo quản:\r\n– Hướng dẫn sử dụng: Sử dụng trong chế biến thực phẩm, phòng bệnh, chữa bệnh bướu cổ và các rối loạn do thiếu hụt i-ốt– Hướng dẫn bảo quản: Để nơi khô ráo, thoáng mát.\r\nChất liệu bao bì và quy cách bao gói:\r\n– Sản phẩm được đóng trực tiếp bằng túi PE và bao PP, quy cách gồm loại gói 500g, 900g                ', 0, 8),
(19, 'Gạo ST25 Vua gạo 2kg', 79000.00, 'gao-thom-vua-gao-st25-tui-2kg-202307281557232542.png', '                    Gạo thơm Vua Gạo chất lượng với giống lúa ST25 ngon nhất thế giới đảm bảo mang đến loại gạo chất lượng, giúp bạn ăn ngon miệng. Gạo thơm Vua Gạo ST25 túi 2kg dẻo và mềm nhiều, nở ít, ăn cơm ngon, thơm rất thích hợp sử dụng cho cả gia đình, túi 2 kg vừa phải sử dụng cá nhân hay gia đình đều được                ', 0, 8),
(20, 'Dầu đậu nành Simply 1 lít', 74000.00, 'dau-dau-nanh-nguyen-chat-simply-chai-1-lit-202308081100325912.jpg', 'Dầu đậu nành nguyên chất Simply chai 1 lít chứa tới 80% axit béo chưa bão hoà cùng lượng lớn chất chống oxy hoá giúp làm giảm lượng cholesterol xấu trong máu và cho bạn một trái tim khoẻ mạnh. Dầu ăn Simply là nhãn hiệu dầu ăn duy nhất được Hội Tim Mạch Học Việt Nam khuyên dùng.', 0, 8),
(21, 'Mì ly Hảo Hảo Tôm chua cay 24 ly', 249000.00, 'c3fc05a347e12fa70068f86500a50e54.jpg.jpg', 'Mì Ly Handy Hảo Hảo ( Tôm Chua cay ) 67gr x 24 ly\r\n\r\nThích hợp cho việc nấu các món: Xào, Ăn lẩu, Ăn sáng\r\n\r\nPhù hơp với mọi bửa ăn trong gia đình', 0, 8),
(22, 'Áo khoác Cardigan Aerospace', 400000.00, '20231023_74YUAwr0Fe.jpg', 'THÔNG TIN Áo len cardigan unisex Aerospace\r\n1. Kiểu dáng: \r\n\r\nÁo cardigan len Aerospace mang kiểu dáng unisex, form rộng dễ mặc, dễ dàng kết hợp với các sản phẩm quần jean, quần jogger, chân váy... \r\n\r\nÁo thiết kế cổ V kèm mác dệt cùng họa tiết monogram in logo thương hiệu độc lạ\r\n\r\n2. Cảm hứng thiết kế: \r\n\r\nĐược lấy cảm hứng từ không gian rộng lớn của vũ trụ. Màu xanh đậm được sử dụng để tượng trưng cho sự mạnh mẽ, và sự hiện diện của vũ trụ. Màu trắng thể hiện sự tinh khiết, đại diện cho ánh sáng trong bóng tối của vũ trụ. Đặc biệt, với họa tiết monogram in logo thương hiệu được thiết kế để nhấn mạnh vào các yếu tố đặc trưng của vật chất trong không gian, chẳng hạn như thiết bị đo lường, bánh răng, hoặc kính thiên văn,...', 0, 9),
(23, 'Áo phông trắng', 90000.00, '20221013_n6HKsuzizp6K2vDgrJLI4qA8.jpg', 'HƯỚNG DẪN CHỌN KÍCH CỠ\r\nNGƯỜI MẪU: 182CM 65KG\r\n\r\nKÍCH CỠ ÁO: XL', 0, 9),
(24, 'Quần jeans baggy', 200000.00, 'baggy.jpg', '                                        Nhập mã VNCLO50 thêm 50K đơn hàng\r\nĐồng giá Ship toàn quốc 30.000đ\r\nHỗ trợ 10K phí Ship cho đơn hàng từ 200K\r\nMiễn phí Ship cho đơn hàng từ 299k\r\nĐổi trả ngay nếu sản phẩm lỗi bất kì                                ', 0, 9),
(25, 'Smart Tivi Samsung QLED 4K 65 inch', 14000000.00, 'smart_tv_samsung_4k_qled_65_inch_qa65q63b_ec2a4bbcc6fb4e509c73069125c67844_1024x1024.jpg', '                    Công nghệ Quantum Dot hiển thị 100% dải màu\r\nCông nghệ Quantum Dot hiển thị 100% dải màu với độ chân thực sống động và rõ nét, cho bạn thưởng thức từng khung hình mang màu sắc cuộc sống, tuyệt đẹp ở mọi mức độ sáng.\r\n\r\n*100% dải sắc màu được đo theo tiêu chuẩn DCI-P3, được chứng nhận bởi VDE.                ', 0, 10),
(26, 'Bàn phím cơ E-DRA EK398 Alpha Red', 480000.00, 'shopping.jpg', 'Thông số kỹ thuật sản phẩm:\r\n\r\nGiao diện: USB\r\n\r\nSố lượng phím: 98 phím\r\n\r\nMàu keycaps: Alpha (White + Black)\r\n\r\nĐèn nền: Rainbows\r\n\r\nSwitch: YH Red\r\n\r\nKeycap: ABS\r\n\r\nAntighosting: antishosting 25 keys\r\n\r\nTương thích với Win XP, Win7, Win8, Win10, hệ thống MAC.', 0, 10),
(27, 'Chuột Razer DeathAdder Essential', 449000.00, '250-7591-chuot-razer-deathadder-essential-ergonomic-001.jpg', 'Cảm biến quang học 6400 DPI\r\n\r\n5 nút bấm, tuổi thọ 10 triệu lần nhấp\r\n\r\nTốc độ tối đa: 220 IPS\r\n\r\nGia tốc tối đa: 30G\r\n\r\nTần số quét: 1000 Hz\r\n\r\nChiều dài cáp: 1,8m\r\n\r\nKích thước: 127 x 73 x 43mm', 0, 10),
(28, 'Màn hình Gaming Acer Nitro VG270 E/27', 2890000.00, 'shoppingmanhinhacer.jpg', '\r\nLoại màn hình	Màn hình phẳng\r\nKích thước màn hình	27 inch\r\nCông nghệ màn hình	IPS LCD\r\nĐộ phân giải	1920 x 1080 Pixels\r\nChuẩn màn hình	FHD\r\nĐộ sáng	250 nits\r\nĐộ tương phản	1000:1\r\nTấm nền	IPS\r\nTần số quét	100\r\nTỷ lệ màn hình	16:09\r\nGóc nhìn	178°(Dọc) / 178°(Ngang)\r\nMàu màn hình	16.7 Triệu\r\nThời gian phản hồi	1ms\r\nĐiện áp	220 - 240 V\r\nCổng giao tiếp	\r\nĐầu vào: DisplayPort\r\nĐầu vào: HDMI\r\nPhụ kiện trong hộp\r\nPhụ kiện trong hộp	\r\nDây HDMI\r\nDây nguồn', 0, 10),
(29, 'Bàn di chuột cỡ lớn 70x30cm', 39000.00, 'bandichuot.jpg', 'Bàn di chuột cỡ lớn 70x30cm siêu êm không thấm mồ hôi cực tốt dùng khoẻ thì 1 năm là hỏng có khi chưa đến', 0, 10),
(30, 'Nhà giả kim', 69000.00, '737846efdb9f28f0f51352cacf9225c5.jpg', 'Tất cả những trải nghiệm trong chuyến phiêu du theo đuổi vận mệnh của mình đã giúp Santiago thấu hiểu được ý nghĩa sâu xa nhất của hạnh phúc, hòa hợp với vũ trụ và con người.\r\n\r\nTiểu thuyết Nhà giả kim của Paulo Coelho như một câu chuyện cổ tích giản dị, nhân ái, giàu chất thơ, thấm đẫm những minh triết huyền bí của phương Đông. Trong lần xuất bản đầu tiên tại Brazil vào năm 1988, sách chỉ bán được 900 bản. Nhưng, với số phận đặc biệt của cuốn sách dành cho toàn nhân loại, vượt ra ngoài biên giới quốc gia, Nhà giả kim đã làm rung động hàng triệu tâm hồn, trở thành một trong những cuốn sách bán chạy nhất mọi thời đại, và có thể làm thay đổi cuộc đời người đọc.', 0, 11),
(31, 'Tạp chí kiến trức và đời sống', 38500.00, 'bcc824df7b7741d75df9f4f8edeaacb5.jpg', 'Công ty phát hành\r\nCông ty TNHH Không Gian Sống Media\r\nLoại bìa\r\nBìa mềm\r\nNhà xuất bản\r\nCông ty TNHH Không Gian Sống Media', 0, 11),
(32, 'Tiếng Gọi Nơi Hoang Dã', 58400.00, '8935236430944.jpg', 'Tiếng Gọi Nơi Hoang Dã (Tái Bản 2023)\r\n\r\nBuck, đang sống trong một gia đình khá giả, bỗng bị bắt cóc và cuộc đời của Buck thay đổi từ đây. Chú bị bán làm chó kéo xe. Câu chuyện ghi lại Buck trên những bước đường khó nhọc, cùng với chủ, phải đối diện với cuộc đấu tranh sinh tồn. Chú đã học cách tồn tại và cuối cùng đã trở thành thủ lĩnh của đàn chó.\r\n\r\nNhưng rồi, Buck đã nghe và bị thôi thúc bởi những tiếng gọi nơi rừng hoang. “Và có một thứ luôn gắn chặt với cảnh mộng về con người lông lá ấy là tiếng gọi, tiếng gọi cứ vang lên trong rừng thẳm. Mỗi lần nghe tiếng gọi ấy là lòng Buck tràn ngập nỗi xao xuyến bồi hồi và những ham muốn kỳ lạ. Nó mang đến cho Buck một niềm vui mơ hồ mà thú vị, và Buck nhận thấy trong lòng mình sôi lên cuồng nhiệt bao nỗi khát khao mong muốn những điều mà Buck không rõ là gì. Thỉnh thoảng Buck vùng dậy chạy vào rừng, đuổi theo tiếng gọi, sục tìm nó như thể nó là một vật có thể sờ mó được”…\r\n\r\nSau một lần đi săn từ rừng trở về, Buck đã nhìn thấy cảnh hoang tàn, đẫm máu đối với người chủ nó thương yêu nhất: John cùng những người bạn và các chú chó kéo xe bị nhóm người Yhet tàn sát. Lúc này đây, tình yêu thương, trung thành mà Buck dành cho John đã trở thành nỗi đau thống thiết, khiến Buck trở nên hoang dã hơn bao giờ hết…\r\n\r\nĐọc Tiếng gọi nơi hoang dã, chúng ta sẽ cùng Buck đến những miền đất hoang sơ chưa ai biết, biết thế nào là luật dùi cui và răng nanh, hiểu thế nào là lao khổ của dây cương và đường mòn…\r\n\r\nMã hàng	8935236430944\r\nTên Nhà Cung Cấp	Nhà Sách Minh Thắng\r\nTác giả	Jack London\r\nNXB	Văn Học\r\nNăm XB	2023\r\nNgôn Ngữ	Tiếng Việt\r\nTrọng lượng (gr)	280\r\nKích Thước Bao Bì	20.5 x 15 x 1.2 cm\r\nSố trang	254\r\nHình thức	Bìa Mềm\r\nSản phẩm bán chạy nhất	Top 100 sản phẩm Tác Phẩm Kinh Điển bán chạy của tháng\r\nGiá sản phẩm trên Fahasa.com đã bao gồm thuế theo luật hiện hành. Bên cạnh đó, tuỳ vào loại sản phẩm, hình thức và địa chỉ giao hàng mà có thể phát sinh thêm chi phí khác như Phụ phí đóng gói, phí vận chuyển, phụ phí hàng cồng kềnh,...\r\nChính sách khuyến mãi trên Fahasa.com không áp dụng cho Hệ thống Nhà sách Fahasa trên toàn quốc\r\nTiếng Gọi Nơi Hoang Dã (Tái Bản 2023)\r\n\r\nBuck, đang sống trong một gia đình khá giả, bỗng bị bắt cóc và cuộc đời của Buck thay đổi từ đây. Chú bị bán làm chó kéo xe. Câu chuyện ghi lại Buck trên những bước đường khó nhọc, cùng với chủ, phải đối diện với cuộc đấu tranh sinh tồn. Chú đã học cách tồn tại và cuối cùng đã trở thành thủ lĩnh của đàn chó.\r\n\r\nNhưng rồi, Buck đã nghe và bị thôi thúc bởi những tiếng gọi nơi rừng hoang. “Và có một thứ luôn gắn chặt với cảnh mộng về con người lông lá ấy là tiếng gọi, tiếng gọi cứ vang lên trong rừng thẳm. Mỗi lần nghe tiếng gọi ấy là lòng Buck tràn ngập nỗi xao xuyến bồi hồi và những ham muốn kỳ lạ. Nó mang đến cho Buck một niềm vui mơ hồ mà thú vị, và Buck nhận thấy trong lòng mình sôi lên cuồng nhiệt bao nỗi khát khao mong muốn những điều mà Buck không rõ là gì. Thỉnh thoảng Buck vùng dậy chạy vào rừng, đuổi theo tiếng gọi, sục tìm nó như thể nó là một vật có thể sờ mó được”…\r\n\r\nSau một lần đi săn từ rừng trở về, Buck đã nhìn thấy cảnh hoang tàn, đẫm máu đối với người chủ nó thương yêu nhất: John cùng những người bạn và các chú chó kéo xe bị nhóm người Yhet tàn sát. Lúc này đây, tình yêu thương, trung thành mà Buck dành cho John đã trở thành nỗi đau thống thiết, khiến Buck trở nên hoang dã hơn bao giờ hết…\r\nTIN TÔI ĐI TUYỆT TÁC CỦA SỰ HOANG DÃ QUÁ TUYỆT VỜI.', 0, 11),
(33, 'Những nhà thám hiểm hăm hở', 58000.00, 'nhungnhathamhiemhamho.jpg', 'Cuốn sách trong tủ Horrible Geography là loại special - đặc biệt nên dầy gấp rưỡi so với các cuốn khác trong tủ sách này nhằm phục vụ cho những người mê du ký.\r\n\r\nNhư là cuốn lịch sử của môn thám hiểm, chuyện được kể bắt đầu từ Thời xa xưa với những bước đi bằng hai chân đầu tiên ở dưới đất của tổ tiên loài người đến các chuyến thám hiểm của người Ai Cập và Hy Lạp cổ đại.\r\n\r\nVà lần lượt là thành quả từ những chuyến thám hiểm: phát hiện quả đất là hình tròn; khai phá địa cực; nhiều miền đất mới được phát hiện cùng với một số căn bệnh lạ nguy hiểm, và nảy những phát minh khoa học phục vụ cho những chuyến đi. Cũng từ những chuyến đi đã mở ra các cơ hội buôn bán (như Hành trình Con đường tơ lụa nối liền châu Á với Âu châu); cơ hội truyền bá tư tưởng tôn giáo (Hành trình thỉnh kinh 15 năm của thầy Huyền Trang sang đất Phật..); hay đơn giản chỉ là những chuyến xuyên sa mạc và leo núi… những chuyến đi thỏa chí tò mò và phiêu lưu để nhìn thế giới này và “lấp đầy những khoảng còn trống trên bản đồ”, từ đó mà có các nhân vật vĩ đại: Columbus, Magenllan, James Cook, Johann Burckhardt, J. Stuart…\r\n\r\nLịch sử thám hiểm kết thúc bằng một sơ đồ “Dòng thời gian” tổng kết những “Bước chân thám hiểm”, nhìn vào đó thấy hơn 3 triệu năm thám hiểm của những người can trường.\r\n\r\nThông điệp quan trọng đặc biệt trong cuốn sách này, ngoài kiến thức, là ngợi ca những phẩm chất cần có trong con người: lòng dũng cảm và những đam mê.\r\n\r\nĐược chia thành các chương, phần lớn nhỏ với nhiều box ghi chú và các kiểu trình bày linh hoạt để dễ theo dõi, giọng văn ngắn, gọn, hài hước và minh họa thú vị , Những nhà thám hiểm hăm hở thu hút độc giả theo duyên riêng của bộ Horrible Science.', 0, 11),
(34, 'Thế giới ô nhiễm', 42500.00, 'horrible-science-the-gioi-o-nhiem-bia.jpg', 'Horrible Science - Thế Giới Ô Nhiễm\r\n\r\n\r\n\r\nTập sách về cuộc sống quanh ta, về sự lạm dụng và phung phí tài nguyên của con người gây ra nhiều ảnh hưởng nghiêm trọng đến hành tinh, nhưng được thể hiện một cách nhẹ nhàng, hài hước, không phê phán mà đề cập để cảnh tỉnh. Đây là tập tiếp theo trong series Horrible science rất được các bạn đọc yêu thích. \r\n', 0, 11),
(35, 'Vi sinh vật vi tính', 52250.00, 'vi-sinh-vat-vi-tinh.jpg', 'Horrible Science - Vi Sinh Vật Vi Tính\r\n\r\n\r\n \r\nCuốn sách thuộc bộ Horrible Science, được trình bày bằng giọng văn và các minh họa hài hước quen thuộc của hai tác giả Nick Arnold và Tony De Saulles giúp bạn dễ dàng làm quen với kiến thức cơ bản nhất liên quan đến các loại vi khuẩn vi sinh.\r\n\r\nNhững hình vẽ và lời giản dị dễ hiểu – như những đoạn truyện tranh  hấp dẫn giúp bạn dễ tưởng tượng ra thế giới của những “động vật” tí hon, cùng với tên tuổi những nhà bác học trong ngành, những kết luận khoa học và nhất là những lời khuyên thực tế, hữu hiệu vô giá, những cảnh báo quan trọng cho lối sống hiện đại … Và nhờ thế mà cuốn sách được nhiều giải thưởng về sách khoa học dành cho thiếu nhi và được đông đảo bạn đọc từ trẻ em đến người lớn tìm đọc.', 0, 11),
(36, 'Chảo nguyên khối sâu lòng Trimax', 529000.00, 'el3846si03-34682a84-b0bd-4fe2-b326-fbdf43ec7d91.jpg', '                    Công năng tuyệt vời giúp việc nấu ăn trở nên đơn giản, nhanh gọn hơn\r\n\r\nChất liệu inox 304 cao cấp, tuyệt đối an toàn\r\nChảo xào Trimax sử dụng chất liệu lớp trong cùng là inox 304 cao cấp an toàn cho thực phẩm. Inox 304 được khẳng định là hợp kim inox tuyệt vời, có khả năng chống oxy hóa cao. Hợp kim này hoàn toàn không thôi nhiễm các chất độc hại vào thức ăn, có khả năng chống bám bẩn tối ưu và tuyệt đối an toàn cho sức khỏe. \r\n\r\nel3846si_profile_02b-4\r\n\r\nel3846si_profile_05-3\r\n\r\nel3846si_profile_09-3\r\n\r\nCông nghệ mới 3 lớp liền thân\r\n\r\n “Bí mật” của chảo xào Trimax nằm ở cấu tạo 3 lớp liền thân dày dặn - Sự kết hợp hoàn hảo của 3 lớp kim loại để tối ưu hiệu quả của từng loại chất liệu:\r\n\r\nTrong cùng là lớp inox 304 cao cấp dày 0,5mm xước mịn. Chính vì là phần tiếp xúc trực tiếp với thức ăn nên chất liệu mà Elmich sử dụng phải luôn đảm bảo an toàn cho sức khỏe cho dù được nung nóng ở nhiệt độ cao hay khi sử dụng lâu năm.\r\n\r\nNằm chính giữa là lớp nhôm dày 1,5 mm. Đây là chất liệu truyền - giữ nhiệt tuyệt vời. Với việc bổ sung lõi nhôm, chảo xào Trimax có thể phân bổ nhiệt nhanh chóng, đồng đều. Thực phẩm được làm nóng từ cả thành và đáy mà không lo bị cháy hay bám dính nhờ đó thức ăn chín đều, rút ngắn quá trình làm chín thực phẩm và lưu giữ được lượng vi chất tối đa trong quá trình chế biến. Khuyến cáo nên để mức 1000-1200W.\r\n\r\nLớp ngoài cùng tiếp xúc với mặt bếp là inox 430 dày 0,5mm cho hiệu suất bắt từ lên đến 98%, giúp tiết kiệm nhiên liệu tối đa khi nấu. Nhờ có lớp đáy từ, chảo xào Trimax dùng được trên mọi loại bếp bao gồm bếp từ, bếp hồng ngoại, bếp gas,…                ', 0, 12),
(37, 'Bộ nồi Zwilling Twin Classic 5', 3989000.00, 'mai__40__3eae2772fcbf44d7b14f25fb5be79e23_grande.jpg', 'Thương hiệu Zwilling đã cho ra đời các sản phẩm chất lượng cao trong nhà bếp với những tính năng đặc biệt hông qua các giá trị truyền thống, tầm nhìn sáng tạo và kỹ thuật đổi mới. Các sản phẩm đến từ nhà Zwilling đều có vẻ đẹp vượt thời gian cùng với những thiết kế tiện lợi. Bộ nồi Zwilling Twin Classic 5 món bóng mờ là sự kết hợp hoàn hảo giữa thiết kế sang trọng và chất lượng vượt trội. Bộ sản phẩm gồm 5 chiếc nồi với đường kính từ 16cm đến 24cm, được làm bằng thép không gỉ cao cấp, giúp cho sản phẩm có độ bền cao và khả năng chống dính tốt.\r\n\r\n', 0, 12),
(38, 'Bộ 10 bát cơm sứ trắng ngà', 169000.00, '7c8e11d2836bce9e72bbc4293f7c8399.jpg', '* Đơn vị tính : Cái\r\n\r\n* Giá niêm yết : Bao gồm thuế VAT\r\n\r\n* Cân nặng 01 đơn vị sản phẩm : 0,20 kg\r\n\r\n* Quy cách đóng gói hộp : 10 cái/ bao màng co\r\n\r\n* Đặc tính sản phẩm:\r\n\r\n- Thân sứ siêu cứng nhờ phối liệu đặc biệt\r\n\r\n- Men cứng chắc\r\n\r\n- Màu sứ Ngà ấm áp\r\n\r\n- Không chì và Cadimium\r\n\r\n- Độ bền cao, chịu sốc nhiệt tốt\r\n\r\n- An Toàn sử dụng trong lò viba, máy rửa chén\r\n\r\n- Giá cả hợp lý', 0, 12),
(39, 'Bộ Cây Lau Nhà Lock&Lock', 480000.00, 'bo-cay-lau-nha-xoay-tay-lock-lock-corner-etm494-4.jpg', '                    ✔️ Bộ sản phẩm gồm 1 thùng chứa nước, 1 cây lau và 2 bông lau\r\n✔️ Phần bông lau được làm bằng bông microfiber, có khả năng thấm hút tốt, không xơ cứng nên không làm trầy xước bề mặt được lau. Sợi microfiber với khả năng thấm nước gấp 7 lần và khô nhanh gấp 3 lần so với các khăn lau thông thường khác giúp lau nhanh, sạch mọi ngóc ngách, ngay cả những nơi khó tiếp cận trong nhà.\r\n✔️ Thân cây được cấu tạo bằng inox chắc chắn, không hoen gỉ, chịu lực tốt, có thể chuyển động xoay 360 độ độc đáo.\r\n✔️ Cơ chế vắt ly tâm hiện đại, vắt nước không bị bắn ra ngoài, không cần phải đạp chân hoặc vắt tay.\r\n✔️ Kiểu dáng hiện đại, đĩa lau có thể gập lại lau góc tường và sàn nhà.                ', 0, 12);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id_taikhoan` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phonenum` int(20) DEFAULT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`id_taikhoan`, `username`, `password`, `email`, `address`, `phonenum`, `role`) VALUES
(1, 'admin123', '123456', 'uckgudu@gmail.com', 'Đông Mỹ', 364191792, 1),
(4, 'linhdao', '123456', 'uckgudu@gmail.com', 'Khương Đình', 2147483647, 0),
(7, 'SiuDepTrai', '123456', 'nguyenanlinhdao@gmail.com', 'Láng Hạ', 753469783, 0),
(8, 'Pessi123', '123456abc', 'nguyenanlinhdao@gmail.com', 'Trịnh Văn Bô', 974983989, 1),
(9, 'HuyNgao123DepTrai', '123456', 'uckgudu@gmail.com', NULL, NULL, 0),
(10, '', '', '', NULL, NULL, 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id_bill`);

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id_binhluan`),
  ADD KEY `FK_bl_sp` (`id_sanpham`),
  ADD KEY `FK_bl_tk` (`id_taikhoan`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`),
  ADD KEY `FK_idsanpham` (`id_sanpham`),
  ADD KEY `FK_idtaikhoan` (`id_taikhoan`),
  ADD KEY `FK_idbill` (`id_bill`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id_danhmuc`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id_sanpham`),
  ADD KEY `FK_id_danhmuc` (`id_danhmuc`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id_taikhoan`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `id_bill` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id_binhluan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id_danhmuc` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id_sanpham` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id_taikhoan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `FK_bl_sp` FOREIGN KEY (`id_sanpham`) REFERENCES `sanpham` (`id_sanpham`),
  ADD CONSTRAINT `FK_bl_tk` FOREIGN KEY (`id_taikhoan`) REFERENCES `taikhoan` (`id_taikhoan`);

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `FK_idbill` FOREIGN KEY (`id_bill`) REFERENCES `bill` (`id_bill`),
  ADD CONSTRAINT `FK_idsanpham` FOREIGN KEY (`id_sanpham`) REFERENCES `sanpham` (`id_sanpham`),
  ADD CONSTRAINT `FK_idtaikhoan` FOREIGN KEY (`id_taikhoan`) REFERENCES `taikhoan` (`id_taikhoan`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `FK_id_danhmuc` FOREIGN KEY (`id_danhmuc`) REFERENCES `danhmuc` (`id_danhmuc`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
