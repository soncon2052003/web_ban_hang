-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for web_ban_hang
CREATE DATABASE IF NOT EXISTS `web_ban_hang` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `web_ban_hang`;

-- Dumping structure for table web_ban_hang.comment
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fullname` varchar(50) DEFAULT NULL,
  `rate` int DEFAULT NULL,
  `content` text,
  `id_sp` varchar(50) DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fullname` (`fullname`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table web_ban_hang.comment: ~6 rows (approximately)
INSERT INTO `comment` (`id`, `fullname`, `rate`, `content`, `id_sp`, `date`) VALUES
	(1, 'Nguyen Thi A', 2, 'Minh khong biet che san pham o cho nao', '21', '2023-02-07'),
	(2, 'Nguyen Thi A', 3, 'Toi thay san pham rat chat luong. Lan sau se mua lai', '21', '2023-02-07'),
	(3, 'Nguyen Thi A', 4, 'Minh yeu san pham rat nhieu nhe', '21', '2023-02-07'),
	(12, 'Duong Van C', 5, 'tuyet cu meo', '20', '2023-02-08'),
	(15, 'Nguyen Thi A', 2, 'ko ngon lam', '21', '2023-02-09'),
	(16, 'Nguyen Thi A', 1, 'giày có nhiều màu quá', '20', '2023-02-09');

-- Dumping structure for table web_ban_hang.role
CREATE TABLE IF NOT EXISTS `role` (
  `role_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `dateCreate` date NOT NULL,
  PRIMARY KEY (`role_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table web_ban_hang.role: ~2 rows (approximately)
INSERT INTO `role` (`role_id`, `name`, `dateCreate`) VALUES
	(0, 'user', '2022-12-08'),
	(1, 'admin', '2022-12-08');

-- Dumping structure for table web_ban_hang.sanpham
CREATE TABLE IF NOT EXISTS `sanpham` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tensanpham` varchar(50) NOT NULL,
  `gia` int NOT NULL,
  `soluong` int NOT NULL,
  `diachi` varchar(50) NOT NULL,
  `image` varchar(200) NOT NULL,
  `mieuta` text,
  `title` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table web_ban_hang.sanpham: ~16 rows (approximately)
INSERT INTO `sanpham` (`id`, `tensanpham`, `gia`, `soluong`, `diachi`, `image`, `mieuta`, `title`) VALUES
	(2, 'Ổi Nghệ An', 15000, 1500, 'Nghệ An', './img/oi.jpg', 'Có tên khoa học là Psidium Guajava. Quả hình tròn, hình trứng hay hình quả lê, dài 3-10 cm tùy theo giống. Vỏ quả còn non màu xanh, khi chín chuyển sang màu vàng, thịt vỏ quả màu trắng, vàng hay ửng đỏ; ruột trắng, vàng hoặc đỏ. Quả chín có vị chua ngọt hay ngọt và có mùi thơm đặc trưng.', '0'),
	(3, 'Đào Hà Tĩnh', 20000, 1000, 'Hà Tĩnh', './img/dao.jpg', 'Quả đào, miền Nam gọi là trái đào, cùng với quả của anh đào, mận, mơ là các loại quả hạch. Quả đào có một hạt giống to được bao bọc trong một lớp vỏ gỗ cứng, cùi thịt màu vàng hay ánh trắng, có mùi vị thơm ngon và lớp vỏ có lông tơ mềm, khi non có màu xanh, khi chín chuyển sang màu hồng hoặc vàng', '0'),
	(5, 'Táo Hà Tĩnh', 20000, 233, 'Hà Tĩnh', './img/tao.jpg', 'Táo tây, còn gọi là bôm, là một loại quả ăn được từ cây táo tây. Táo tây được trồng trên khắp thế giới và là loài cây được trồng phổ biến nhất trong chi Malus. Cây táo tây có nguồn gốc từ Trung Á, nơi tổ tiên của nó là táo dại Tân Cương sinh sống, hiện vẫn còn tồn tại cho đến ngày nay.', '0'),
	(6, 'Nước khoáng', 10000, 1233, 'Nghệ An', './img/chai_nuoc.jpg', 'Nước khoáng là nước từ suối khoáng có chứa nhiều khoáng chất khác nhau, chẳng hạn như muối và các hợp chất lưu huỳnh. Nước khoáng thường có thể tĩnh lặng hoặc sủi bọt tùy theo sự có mặt hoặc không có khí thêm vào.', '1'),
	(8, 'Nước ép chanh', 18000, 1000, 'Hà Nội', './img/nuocchanh.webp', 'Nước chanh là một loại nước giải khát được chế biến từ nước cốt chanh (nước ép hay vắt từ quả chanh), pha loãng với nước và có thể được gia thêm đường, nước đá, lá bạc hà v.v.', '1'),
	(11, 'Ổi Hà Nội', 1000, 1200, 'Hà Nội', './img/oi.jpg', 'Được dịch từ tiếng Anh-Psidium guajava, ổi thường, ổi vàng, ổi chanh, hoặc ổi táo là một loại cây bụi hoặc cây nhỏ thường xanh có nguồn gốc từ vùng Caribê, Trung Mỹ và Nam Mỹ. Nó dễ dàng thụ phấn bởi côn trùng; khi được nuôi trồng, nó được thụ phấn chủ yếu bởi loài ong mật phổ biến, Apis mellifera.', '0'),
	(12, 'Cocacola', 10000, 101, 'New York', './img/cocacola.webp', 'Coca-Cola (hay còn gọi là Coca, Coke) là một thương hiệu nước ngọt có ga chứa nước cacbon dioxide bão hòa được sản xuất bởi Công ty Coca-Cola. Coca-Cola được điều chế bởi dược sĩ John Pemberton vào cuối thế kỷ XIX với mục đích ban đầu là trở thành một loại biệt dược.', '1'),
	(13, 'Giày sneaker', 200000, 231, 'Hà Nội', './img/giaysneaker.webp', 'Sneaker là những đôi giày được thiết kế chủ yếu để phục vụ cho thể thao hoặc các hoạt động khác liên quan đến thể dục, tuy nhiên ngày nay, loại giày này cũng có thể được hiểu là giày dùng để đi thường ngày. ', '2'),
	(14, 'Nước cam', 20000, 1231, 'Nghệ An', './img/nuocepcam.webp', 'Nước cam hay nước cam ép, nước cam vắt là một loại thức uống phổ biến được làm từ cam bằng cách chiết xuất nước từ trái cam tươi bằng việc vắt hay ép thành một loại nước cam tươi Đối với các sản phẩm nước cam được sản xuất theo công nghiệp, nước cam được chế biến có cho thêm các chất phụ gia, bảo quản rồi đóng chai ..', '1'),
	(15, 'Giày nike', 150000, 111, 'Hà Tĩnh', './img/giaynike.webp', 'Nike là một trong những thương hiệu giày và trang phục thể thao hàng đầu thế giới được thành lập vào năm 1964. Bill Bowerman và học trò là Phil Knight đã thành lập Blue Ribbon Sport (BRS) vào năm 1964, hoạt động với vai trò phân phối giày của thương hiệu Onitsuka của Nhật Bản.', '2'),
	(16, 'Giày gucci', 300000, 12, 'Nghệ An', './img/giaygucci.webp', 'Gucci là một trong những thương hiệu thời trang đồ da nổi tiếng trên thế giới đến từ nước Ý. Đây cũng là thương hiệu thời trang xếp top đầu có giá trị lên tới 10 tỷ USD. Năm 2009, thương hiệu thời trang này xếp thứ 41 trong danh sách 100 thương hiệu hàng đầu thế giới do tạp chí BusinessWeek.', '2'),
	(17, 'Giày xịn', 1000000, 1, 'Hội An', './img/giayxin.webp', 'Giày là một vật dụng đi vào bàn chân con người để bảo vệ và làm êm chân trong khi thực hiện các hoạt động khác nhau. Giày cũng được sử dụng như một món đồ trang trí. Thiết kế của giày đã đa dạng và phong phú vô cùng theo thời gian, văn hoá và mục đích sử dụng.', '2'),
	(18, 'Pepsi', 15000, 123, 'Cao Bằng', './img/pepsi.webp', 'Pepsi một đồ uống giải khát có gas, lần đầu tiên được sản xuất bởi Bradham. Ban đầu, Ông pha chế ra một loại nước uống dễ hấp thụ làm từ nước cacbonat, đường, vani và một ít dầu ăn dưới tên “Nước uống của Brad" năm 1892.', '1'),
	(19, 'Giày thể thao nữ', 20000, 122, 'Hà Nội', './img/giaynu.webp', ' Có nguồn gốc từ nước Anh cổ kính, giày Oxford là kiểu giày nữ mang chút gì đó cổ điển và thanh lịch, nhưng cũng rất cá tính và mạnh mẽ.', '2'),
	(20, 'Giày LV', 150000, 34, 'Hà Tĩnh', './img/giaylv.webp', 'Giày LV nam hay còn được biết với cái tên Louis Vuitton đều rất được các bạn trẻ yêu thích và tìm kiếm trên thị trường. Giày LV thuộc Công ty Louis Vuitton là một công ty và nhãn hiệu thời trang xa xỉ của Pháp, có trụ sở tại Paris, Pháp.', '2'),
	(21, 'Nước ép chanh', 12000, 123, 'Hà Tĩnh', './img/nuocchanh.webp', 'Nước chanh là một loại nước giải khát được chế biến từ nước cốt chanh (nước ép hay vắt từ quả chanh), pha loãng với nước và có thể được gia thêm đường, nước đá, lá bạc hà v.v.', '1');

-- Dumping structure for table web_ban_hang.tintuc
CREATE TABLE IF NOT EXISTS `tintuc` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `short` text NOT NULL,
  `content` text NOT NULL,
  `img` varchar(200) NOT NULL,
  `dateCreate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table web_ban_hang.tintuc: ~5 rows (approximately)
INSERT INTO `tintuc` (`id`, `title`, `short`, `content`, `img`, `dateCreate`) VALUES
	(1, 'Táo ngôi sao lạ mắt, quýt 300.000 đồng/quả dịp Tết', 'Quýt chum chĩnh vàng, táo hình ngôi sao, bưởi đỏ tiến vua... dù có giá đắt đỏ, nhưng vẫn thu hút khách hàng mua làm quà biếu Tết hoặc dâng hương với mong muốn một năm mới tiền tài rủng rỉnh cho gia chủ.', 'Quýt chum chĩnh vàng Giống như tên gọi độc đáo của mình, quýt chum có hình dạng như một chĩnh vàng tròn đầy, mang ý nghĩa tài lộc và may mắn. Quýt chum có nguồn gốc từ Nhật Bản, Hàn Quốc, được một số cửa hàng hoa quả nhập khẩu đưa về Việt Nam trong một vài năm trở lại đây.', '../img/tintuc1.webp', '2022-10-10'),
	(2, 'Bưởi da xanh bay đến Mỹ, giá hơn 500.000 đồng/kg', 'Lô bưởi da xanh đầu tiên của Việt Nam xuất khẩu sang Mỹ đã xuất hiện trên kệ hàng với giá bán lẻ dao động từ 375.000 - 535.000 đồng/kg.', 'Chiều 3-12, bà Ngô Tường Vy, Tổng Giám đốc Công ty CP Tập đoàn xuất khẩu trái cây Chánh Thu (Bến Tre), xác nhận lô bưởi đầu tiên của Việt Nam xuất khẩu sang Mỹ đã được nhà nhập khẩu phân phối đến các điểm bán lẻ với chất lượng được người tiêu dùng đánh giá cao.', '../img/tintuc2.webp', '2022-10-10'),
	(3, 'Quả cóc Thái to bằng bàn tay, giá chỉ 40.000 đồng/kg', 'Những quả cóc Thái có kích thước lớn, 3 quả đã được 1 cân lại được bán với giá rẻ chỉ bằng một nửa so với năm ngoái đang thu hút người tiêu dùng.', 'Thời điểm này tại nhiều nhóm bán hàng online đang rao bán loại cóc kích thước lớn, chỉ 3 quả là được 1 cân. LoTuy nhiên, không dễ dàng để tìm thấy hoa quả bạn cần lựa chọn trong một siêu thị hầu hết hoa quả trông rất đẹp mắt nhưng khi mua về cũng chưa chắc ngon ngọt như mong đợi.\r\nVì vậy, mua sắm có thể thực sự tốn thời gian và sẽ rất thất vọng nếu chất lượng hoa quả đã chọn không đạt được mong muốn. Vì vậy, những lời khuyên dưới đây có thể giúp việc mua sắm một số loại hoa quả phổ biến trong siêu thị trở nên dễ dàng hơn.ại cóc này không mới vì vài năm trước cũng đã xuất hiện nhưng nhiều người tiêu dùng vẫn bị thu hút vì giá thành năm nay hạ hơn nhiều so với năm ngoái. Nếu như năm ngoái cần tới 40 - 50.000 đồng mới mua được một cân thì năm nay giảm một nửa chỉ còn 25 - 35.000 đồng cho một cân.\r\nĐặc biệt, nhiều người tiêu dùng cho biết nếu mua số lượng nhiều từ 5 cân trở lên, mức giá sẽ rẻ hơn nữa, chỉ khoảng 20.000 đồng một cân. Thế nên mọi người thường gom mua từ 5 cân trở lên để đỡ công vận chuyển và phí giao hàng.', '../img/tintuc3.webp', '2022-10-09'),
	(4, 'Mẹo mua hoa quả tươi ngon ở siêu thị cho người bận rộn', ' Đôi khi vì quá bận nên bạn không có nhiều thời gian đi chợ, tiện lợi nhất là vào siêu thị ngay gần nhà.', 'Tuy nhiên, không dễ dàng để tìm thấy hoa quả bạn cần lựa chọn trong một siêu thị hầu hết hoa quả trông rất đẹp mắt nhưng khi mua về cũng chưa chắc ngon ngọt như mong đợi.\r\n\r\nVì vậy, mua sắm có thể thực sự tốn thời gian và sẽ rất thất vọng nếu chất lượng hoa quả đã chọn không đạt được mong muốn. Vì vậy, những lời khuyên dưới đây có thể giúp việc mua sắm một số loại hoa quả phổ biến trong siêu thị trở nên dễ dàng hơn.', '../img/tintuc4.webp', '2022-10-08');

-- Dumping structure for table web_ban_hang.title_sanpham
CREATE TABLE IF NOT EXISTS `title_sanpham` (
  `id` int NOT NULL AUTO_INCREMENT,
  `number` int DEFAULT NULL,
  `mean` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table web_ban_hang.title_sanpham: ~2 rows (approximately)
INSERT INTO `title_sanpham` (`id`, `number`, `mean`) VALUES
	(1, 0, 'fruit'),
	(2, 1, 'drink'),
	(3, 2, 'shoe');

-- Dumping structure for table web_ban_hang.user
CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `age` int NOT NULL,
  `sdt` varchar(20) NOT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  `role_id` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table web_ban_hang.user: ~7 rows (approximately)
INSERT INTO `user` (`username`, `password`, `fullname`, `age`, `sdt`, `id`, `role_id`) VALUES
	('001', '123', 'ADMIN', 19, '0123456789', 1, '1'),
	('002', '123', 'Nguyen Thi A', 20, '0123456789', 2, '0'),
	('003', '123', 'Duong Van C', 28, '0123456789', 3, '0'),
	('004', '123', 'Ho Thi D', 16, '0123456789', 4, '0'),
	('005', '123', 'Nguyen Van G', 18, '01234', 5, '0'),
	('006', '123', '1', 1, '1', 21, '0'),
	('11', '1', '1', 1, '1', 22, '0');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
