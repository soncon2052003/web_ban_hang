-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2023 at 02:54 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_ban_hang`
--

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE `permission` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `note` varchar(200) NOT NULL,
  `dateCreate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `note` varchar(200) NOT NULL,
  `dateCreate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`, `note`, `dateCreate`) VALUES
(1, 'admin', 'toi la admin', '2022-12-08'),
(2, 'user', 'nguoi dung', '2022-12-08');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permission`
--

CREATE TABLE `role_has_permission` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `dateCreate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(11) NOT NULL,
  `tensanpham` varchar(50) NOT NULL,
  `gia` int(20) NOT NULL,
  `soluong` int(20) NOT NULL,
  `diachi` varchar(50) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`id`, `tensanpham`, `gia`, `soluong`, `diachi`, `image`) VALUES
(2, 'Ổi Nghệ An', 15000, 1500, 'Nghệ An', './img/oi.jpg'),
(3, 'Đào Hà Tĩnh', 20000, 1000, 'Hà Tĩnh', './img/dao.jpg'),
(4, 'Chuối Nghệ An', 15000, 2000, 'Nghệ An', './img/chuoi.jpg'),
(5, 'Táo Hà Tĩnh', 20000, 233, 'Hà Tĩnh', './img/tao.jpg'),
(6, 'Nước khoáng', 10000, 1233, 'Nghệ An', './img/chai_nuoc.jpg'),
(7, 'Bưởi Hà Nội', 1000, 1000, 'Hà Nội', './img/buoi.jpg'),
(8, '10', 1, 1, '1', '1'),
(10, 'Táo Hải Phòng', 10000, 10000, 'Hải Phòng', './img/tao.jpg'),
(11, 'Ổi Hà Nội', 1000, 1200, 'Hà Nội', './img/oi.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tintuc`
--

CREATE TABLE `tintuc` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `short` text NOT NULL,
  `content` text NOT NULL,
  `img` varchar(200) NOT NULL,
  `dateCreate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tintuc`
--

INSERT INTO `tintuc` (`id`, `title`, `short`, `content`, `img`, `dateCreate`) VALUES
(1, 'Táo ngôi sao lạ mắt, quýt 300.000 đồng/quả dịp Tết', 'Quýt chum chĩnh vàng, táo hình ngôi sao, bưởi đỏ tiến vua... dù có giá đắt đỏ, nhưng vẫn thu hút khách hàng mua làm quà biếu Tết hoặc dâng hương với mong muốn một năm mới tiền tài rủng rỉnh cho gia chủ.', 'Quýt chum chĩnh vàng Giống như tên gọi độc đáo của mình, quýt chum có hình dạng như một chĩnh vàng tròn đầy, mang ý nghĩa tài lộc và may mắn. Quýt chum có nguồn gốc từ Nhật Bản, Hàn Quốc, được một số cửa hàng hoa quả nhập khẩu đưa về Việt Nam trong một vài năm trở lại đây.', '../img/tintuc1.webp', '2022-10-10'),
(2, 'Bưởi da xanh bay đến Mỹ, giá hơn 500.000 đồng/kg', 'Lô bưởi da xanh đầu tiên của Việt Nam xuất khẩu sang Mỹ đã xuất hiện trên kệ hàng với giá bán lẻ dao động từ 375.000 - 535.000 đồng/kg.', 'Chiều 3-12, bà Ngô Tường Vy, Tổng Giám đốc Công ty CP Tập đoàn xuất khẩu trái cây Chánh Thu (Bến Tre), xác nhận lô bưởi đầu tiên của Việt Nam xuất khẩu sang Mỹ đã được nhà nhập khẩu phân phối đến các điểm bán lẻ với chất lượng được người tiêu dùng đánh giá cao.', '../img/tintuc2.webp', '2022-10-10'),
(3, 'Quả cóc Thái to bằng bàn tay, giá chỉ 40.000 đồng/kg', 'Những quả cóc Thái có kích thước lớn, 3 quả đã được 1 cân lại được bán với giá rẻ chỉ bằng một nửa so với năm ngoái đang thu hút người tiêu dùng.', 'Thời điểm này tại nhiều nhóm bán hàng online đang rao bán loại cóc kích thước lớn, chỉ 3 quả là được 1 cân. LoTuy nhiên, không dễ dàng để tìm thấy hoa quả bạn cần lựa chọn trong một siêu thị hầu hết hoa quả trông rất đẹp mắt nhưng khi mua về cũng chưa chắc ngon ngọt như mong đợi.\r\nVì vậy, mua sắm có thể thực sự tốn thời gian và sẽ rất thất vọng nếu chất lượng hoa quả đã chọn không đạt được mong muốn. Vì vậy, những lời khuyên dưới đây có thể giúp việc mua sắm một số loại hoa quả phổ biến trong siêu thị trở nên dễ dàng hơn.ại cóc này không mới vì vài năm trước cũng đã xuất hiện nhưng nhiều người tiêu dùng vẫn bị thu hút vì giá thành năm nay hạ hơn nhiều so với năm ngoái. Nếu như năm ngoái cần tới 40 - 50.000 đồng mới mua được một cân thì năm nay giảm một nửa chỉ còn 25 - 35.000 đồng cho một cân.\r\nĐặc biệt, nhiều người tiêu dùng cho biết nếu mua số lượng nhiều từ 5 cân trở lên, mức giá sẽ rẻ hơn nữa, chỉ khoảng 20.000 đồng một cân. Thế nên mọi người thường gom mua từ 5 cân trở lên để đỡ công vận chuyển và phí giao hàng.', '../img/tintuc3.webp', '2022-10-09'),
(4, 'Mẹo mua hoa quả tươi ngon ở siêu thị cho người bận rộn', ' Đôi khi vì quá bận nên bạn không có nhiều thời gian đi chợ, tiện lợi nhất là vào siêu thị ngay gần nhà.', 'Tuy nhiên, không dễ dàng để tìm thấy hoa quả bạn cần lựa chọn trong một siêu thị hầu hết hoa quả trông rất đẹp mắt nhưng khi mua về cũng chưa chắc ngon ngọt như mong đợi.\r\n\r\nVì vậy, mua sắm có thể thực sự tốn thời gian và sẽ rất thất vọng nếu chất lượng hoa quả đã chọn không đạt được mong muốn. Vì vậy, những lời khuyên dưới đây có thể giúp việc mua sắm một số loại hoa quả phổ biến trong siêu thị trở nên dễ dàng hơn.', '../img/tintuc4.webp', '2022-10-08'),
(6, '1', '1', '1', '1', '0001-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `age` int(5) NOT NULL,
  `sdt` varchar(20) NOT NULL,
  `id` int(11) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `fullname`, `age`, `sdt`, `id`, `role`) VALUES
('001', '123', 'Hoang Van Son', 19, '0123456789', 1, 'admin'),
('002', '123', 'Nguyen Thi A', 20, '0123456789', 2, 'user'),
('003', '123', 'Duong Van C', 28, '0123456789', 3, 'user'),
('004', '123', 'Ho Thi D', 16, '0123456789', 4, 'user'),
('005', '123', 'Nguyen Van G', 18, '01234', 5, 'user'),
('1', '1', '1', 1, '1', 21, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `user_has_role`
--

CREATE TABLE `user_has_role` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `dateCreate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_has_role`
--

INSERT INTO `user_has_role` (`id`, `user_id`, `role_id`, `dateCreate`) VALUES
(1, 1, 1, '2022-12-15'),
(2, 2, 2, '2022-12-29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permission`
--
ALTER TABLE `role_has_permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tintuc`
--
ALTER TABLE `tintuc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_has_role`
--
ALTER TABLE `user_has_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `permission`
--
ALTER TABLE `permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `role_has_permission`
--
ALTER TABLE `role_has_permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tintuc`
--
ALTER TABLE `tintuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user_has_role`
--
ALTER TABLE `user_has_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
