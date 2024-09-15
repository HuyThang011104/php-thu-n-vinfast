-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2024 at 05:31 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_vinfast`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill_car`
--

CREATE TABLE `bill_car` (
  `id` int(11) NOT NULL,
  `id_car` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `cccd` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `status_pay` int(11) DEFAULT 0,
  `province` varchar(255) DEFAULT NULL,
  `showroom` varchar(255) DEFAULT NULL,
  `receive_info` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bill_car`
--

INSERT INTO `bill_car` (`id`, `id_car`, `name`, `phone`, `cccd`, `email`, `status_pay`, `province`, `showroom`, `receive_info`) VALUES
(1, 4, 'Lê Huy Thăng', 367132831, '234567890123', 'lehuythangvnsao@gmail.com', 0, '4', '2', 0),
(3, 5, 'Lê Huy Thăng', 2147483647, '324244322311', 'lehuythangvnsao@gmail.com', 1, '4', '2', 1),
(4, 4, 'Lê Huy ', 367132831, '242423442341', 'lehuythangvnsao@gmail.com', 1, '1', '5', 0),
(6, 4, 'Lê Huy Hoàng', 387488441, '123456789876', 'vukhoiclan@gmail.com', 1, '1', '1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `bill_product`
--

CREATE TABLE `bill_product` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `province_id` int(11) DEFAULT NULL,
  `showroom_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `creat_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bill_product`
--

INSERT INTO `bill_product` (`id`, `user_id`, `province_id`, `showroom_id`, `product_id`, `quantity`, `creat_at`) VALUES
(5, 2, 1, 1, 78, 3, '2024-07-09 00:16:58'),
(6, 2, 1, 1, 79, 3, '2024-07-09 07:52:25'),
(28, 2, 1, 3, 82, 2, '2024-07-09 16:49:29');

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `kind_of` int(11) DEFAULT NULL,
  `chair_number` int(11) DEFAULT NULL,
  `consume` int(11) DEFAULT NULL,
  `max_capacity` int(11) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `image_main` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`id`, `name`, `kind_of`, `chair_number`, `consume`, `max_capacity`, `price`, `description`, `image`, `image_main`) VALUES
(1, 'VF 8', 1, 4, 134, 98, 460000000, 'Không gian nội thất tinh tế được thiết kế bởi studio danh tiếng Pininfarina, tích hợp loạt công nghệ tiên tiến giúp cho mỗi chuyến đi của bạn là một trải nghiệm đầy ấn tượng.', 'VF8.png', 'vf8-rotate.png'),
(3, 'VF 6', 2, 6, 4, 123, 499900000, 'Trải nghiệm chất lượng vượt thời gian', 'VF6.png', 'vf6-rotate.png'),
(4, 'VF 3', 1, 4, 4, 123, 656433000, 'VF3 chất lượng cao', 'vf3.png', 'vf3-rotate.png'),
(5, 'VF 5 Plus', 1, 4, 56, 33, 656433000, 'VF5 chất lượng cao', 'VF5.png', 'vf5_plus-rotate.png'),
(6, 'VF e34', 1, 5, 56, 33, 600000000, 'VF e34 chất lượng cao', 'VFe34.png', 'vfe34-rotate.png'),
(7, 'VF 7', 1, 6, 67, 98, 400000000, 'VF 7 chất lượng cao', 'VF7.png', 'vf7-rotate.png'),
(8, 'VF 9', 1, 6, 55, 98, 700000000, 'VF 9 chất lượng cao', 'VF9.png', 'vf9-rotate.webp');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Phong cách sống'),
(2, 'Linh kiện ô tô điện'),
(3, 'Linh kiện ô tô xăng');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logintoken`
--

CREATE TABLE `logintoken` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `creat_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logintoken`
--

INSERT INTO `logintoken` (`id`, `user_id`, `token`, `creat_at`) VALUES
(9, 3, '2a44653fe10dd435f603934c44856d01cf20758c', '2024-07-10 07:51:53');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `detail` varchar(1000) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `creat_at` date DEFAULT NULL,
  `update_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `category_id`, `name`, `description`, `detail`, `image`, `price`, `quantity`, `creat_at`, `update_at`) VALUES
(76, 2, 'Lót Cốc Sơn Mài VinFast Sự giao thoa giữa hiện đại và quá khứ', 'Với triết lý “Đặt khách hàng làm trọng tâm”, VinFast không ngừng sáng tạo để tạo ra các sản phẩm đẳng cấp và trải nghiệm xuất sắc cho mọi người. Để triển khai gói dán film cách nhiệt cao cấp, VinFast lựa chọn thương hiệu 3M với lịch sử hơn 50 năm trong lĩ', 'Với triết lý “Đặt khách hàng làm trọng tâm”, VinFast không ngừng sáng tạo để tạo ra các sản phẩm đẳng cấp và trải nghiệm xuất sắc cho mọi người. Để triển khai gói dán film cách nhiệt cao cấp, VinFast lựa chọn thương hiệu 3M với lịch sử hơn 50 năm trong lĩ', 'card.png', 4000000, 5000, '2024-06-13', NULL),
(78, 1, 'Lót Cốc Sơn Mài VinFast1', 'Với triết lý “Đặt khách hàng làm trọng tâm”, VinFast không ngừng sáng tạo để tạo ra các sản phẩm đẳng cấp và trải nghiệm xuất sắc cho mọi người. Để triển khai gói dán film cách nhiệt cao cấp, VinFast lựa chọn thương hiệu 3M với lịch sử hơn 50 năm trong lĩ', 'Với triết lý “Đặt khách hàng làm trọng tâm”, VinFast không ngừng sáng tạo để tạo ra các sản phẩm đẳng cấp và trải nghiệm xuất sắc cho mọi người. Để triển khai gói dán film cách nhiệt cao cấp, VinFast lựa chọn thương hiệu 3M với lịch sử hơn 50 năm trong lĩ', 'tấm dán 3.png', 420000, 320, '2024-06-10', NULL),
(79, 2, 'Bộ Sạc Di Động Ô Tô Điện 2.2 kW', 'Bộ sạc di động công suất 2.2 kW giúp khách hàng chủ động sạc xe ô tô điện VinFast tại nhà hoặc tại các địa điểm thuận tiện khác. Bộ sạc này được thiết kế nhỏ gọn, dễ dàng mang theo xe. Thời gian sạc cho mức pin đạt 10%-70% khoảng 11 tiếng.', 'Giao diện sạc: IEC62196-2 mức 2, cổng cái (female). Súng sạc xoay chiều (5 tiếp điểm) cấp nguồn từ ổ cắm chuyên dụng cho xe điện, sạc có dây xoay chiều mức 2.&#13;&#10;* Điện áp đầu vào: Điện xoay chiều 1 pha, 3 dây (230V ± 10%, 50/60Hz ± 1%).&#13;&#10;* Điện áp đầu ra: Điện xoay chiều 1 pha (230V ± 10%, 50/60Hz ± 1%), tối đa 2,2kW.&#13;&#10;* Kiểu chân cắm: Loại E/F (theo chứng chỉ VDE).&#13;&#10;* Dải nhiệt độ hoạt động: - 25ºC ≤ Ta ≤  45ºC.&#13;&#10;* Nhiệt độ lưu trữ: -40ºC ≤ Ta ≤  85ºC.&#13;&#10;* Độ ẩm hoạt động: 5%~95%RH (không ngưng tụ) .&#13;&#10;* Bảo vệ an toàn: Bảo vệ dòng rò; bảo vệ quá nhiệt; bảo vệ quá dòng, quá áp và thấp áp.&#13;&#10;* Bảo vệ môi trường: Súng sạc tiêu chuẩn 54 IP.&#13;&#10;&#13;&#10;&#13;&#10;Lưu ý lắp đặt bộ sạc&#13;&#10;Khi sạc xe ô tô điện VinFast với bộ sạc di động 2,2kW, người dùng cần tuân thủ đầy đủ các bước sau:&#13;&#10;* Bước 1: Người dùng lấy bộ sạc xe điện ra khỏi hộp, cắm phích trực tiếp vào ổ điện loại E/F tại gia đình. Chờ đến khi đèn đỏ', 'sạc di động ô tô.png', 567223, 23324, '2024-06-12', NULL),
(80, 1, 'Áo Phông VF 5 Plus Limited', 'Cảm hứng thiết kế dựa trên “hệ gene” VF 5 Plus:&#13;&#10;• Vibrant: Màu sắc rực rỡ, tươi mới, tràn đầy năng lượng, giống như cách chơi màu mạnh mẽ, cá tính trên dòng xe VF 5 Plus.&#13;&#10;• Imaginative: Bùng nổ ý tưởng, đột phá sáng tạo. VinFast phá vỡ n', '- Thiết kế thời trang, trẻ trung và tươi mới, màu sắc trung tính Unisex phù hợp cho cả nam và nữ.&#13;&#10;- Sử dụng chất liệu vải cotton 4 chiều 250 GSM được xử lý cẩn thận giúp form đứng, bề mặt mát tay, khi mặc thông thoáng, không xù lông.&#13;&#10;- Đ', 'áo.png', 345000, 241, '2024-06-10', NULL),
(81, 1, 'Gói Film Cách Nhiệt Dán Trần VinFast VF 8', 'Với triết lý “Đặt khách hàng làm trọng tâm”, VinFast không ngừng sáng tạo để tạo ra các sản phẩm đẳng cấp và trải nghiệm xuất sắc cho mọi người. Để triển khai gói dán film cách nhiệt cao cấp, VinFast lựa chọn thương hiệu 3M với lịch sử hơn 50 năm trong lĩ', 'Công nghệ film quang học 200 lớp 3M Crystalline được lấy cảm hứng từ cánh bướm Morpho mỏng tang và tinh tế. Từ sự phản chiếu quang học kỳ diệu trên từng lớp cánh bướm siêu mỏng, các nhà khoa học tại 3M sáng tạo ra công nghệ đa lớp quang học nano nhằm kiểm', 'tấm lót.png', 7800000, 501, '2024-06-10', NULL),
(82, 2, 'Gói Dán Film Cách Nhiệt VinFast Lux A2.0', 'Các sản phẩm film cách nhiệt VF x 3M giúp cách nhiệt, ngăn bức xạ hồng ngoại, loại bỏ tia UV, giảm lóa hiệu quả giúp trải nghiệm khách hàng trong xe được cải thiện, bảo vệ khách hàng khỏi các tia có hại cũng như tăng độ bền cho nội thất xe.&#13;&#10;&#13;&#10;', 'Các sản phẩm film cách nhiệt VF x 3M giúp cách nhiệt, ngăn bức xạ hồng ngoại, loại bỏ tia UV, giảm lóa hiệu quả giúp trải nghiệm khách hàng trong xe được cải thiện, bảo vệ khách hàng khỏi các tia có hại cũng như tăng độ bền cho nội thất xe.&#13;&#10;&#13;&#10;', 'tấm dán 2.png', 6500000, 5, '2024-07-10', NULL),
(83, 3, 'VF4', 'uaifhisufiewrwe', 'hjjfhsfkjgejkgjkd', 'card.png', 4990000, 3452, '2024-07-15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

CREATE TABLE `province` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`id`, `name`) VALUES
(1, 'Hà Nội'),
(2, 'Hải Phòng'),
(3, 'Quảng  Ninh'),
(4, 'Bắc Giang'),
(5, 'Vĩnh Phúc'),
(6, 'Tp.Hồ Chí Minh'),
(7, 'Cần Thơ'),
(8, 'Bình Dương');

-- --------------------------------------------------------

--
-- Table structure for table `showroom`
--

CREATE TABLE `showroom` (
  `id` int(11) NOT NULL,
  `province_id` int(11) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `showroom`
--

INSERT INTO `showroom` (`id`, `province_id`, `name`) VALUES
(1, 1, 'Chevrolet Đại Việt'),
(2, 1, 'Chevrolet Thăng Long\r\n'),
(3, 1, 'Royal City'),
(4, 1, 'Long Biên'),
(5, 6, 'Vin3S TT Củ Chi'),
(6, 6, 'Vin3S 307 Lạc Long Quân'),
(7, 6, 'VinFast Thảo Điền'),
(8, 6, 'Vin3S 57 Phạm Ngọc Thạch');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fullname` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `activeToken` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `forgotToken` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fullname`, `email`, `phone`, `password`, `activeToken`, `status`, `create_at`, `update_at`, `forgotToken`) VALUES
(2, 'Lê Huy Thăng', 'lehuythangvnsao@gmail.com', '036713232432', '$2y$10$rH1nGjIS5L6bZmEDiYpWTONK2qB5bzY/ql2tPu9WohG4TsQ9H1eDK', NULL, 1, '2024-07-08 11:43:13', NULL, NULL),
(3, 'Lê Huy Hoàng', 'lekuythangvnsao@gmail.com', '0367132831', '$2y$10$FhTZAhTL5OeMjtWTkG232uC.bZf2e8gLbNO2LcQf3eGQRytb/xSQe', NULL, 1, '2024-07-09 23:37:33', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill_car`
--
ALTER TABLE `bill_car`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_car` (`id_car`);

--
-- Indexes for table `bill_product`
--
ALTER TABLE `bill_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `province_id` (`province_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `showroom_id` (`showroom_id`);

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `logintoken`
--
ALTER TABLE `logintoken`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `showroom`
--
ALTER TABLE `showroom`
  ADD PRIMARY KEY (`id`),
  ADD KEY `province_id` (`province_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill_car`
--
ALTER TABLE `bill_car`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `bill_product`
--
ALTER TABLE `bill_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `car`
--
ALTER TABLE `car`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logintoken`
--
ALTER TABLE `logintoken`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `province`
--
ALTER TABLE `province`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `showroom`
--
ALTER TABLE `showroom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bill_car`
--
ALTER TABLE `bill_car`
  ADD CONSTRAINT `bill_car_ibfk_1` FOREIGN KEY (`id_car`) REFERENCES `car` (`id`);

--
-- Constraints for table `bill_product`
--
ALTER TABLE `bill_product`
  ADD CONSTRAINT `bill_product_ibfk_1` FOREIGN KEY (`province_id`) REFERENCES `province` (`id`),
  ADD CONSTRAINT `bill_product_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `bill_product_ibfk_3` FOREIGN KEY (`showroom_id`) REFERENCES `showroom` (`id`);

--
-- Constraints for table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `image_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `logintoken`
--
ALTER TABLE `logintoken`
  ADD CONSTRAINT `logintoken_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Constraints for table `showroom`
--
ALTER TABLE `showroom`
  ADD CONSTRAINT `showroom_ibfk_1` FOREIGN KEY (`province_id`) REFERENCES `province` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
