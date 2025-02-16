-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 29, 2024 lúc 03:01 PM
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
-- Cơ sở dữ liệu: `test`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `cate_ID` int(11) NOT NULL,
  `cate_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `cate_des` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`cate_ID`, `cate_name`, `cate_des`) VALUES
(3, 'PERFECT DIARY', 'Son, Phấn Phủ, Phấn Má, Phấn Mắt,...'),
(4, 'Romand', 'Son, Phấn Mắt'),
(5, 'Maybeline', 'Kem Nền, Phấn Nén, Son'),
(6, 'JUDYDOLL', 'Phấn khối, Son, Má hồng,..'),
(7, 'Flower Knows', 'Son, Phấn Má, ....'),
(8, 'Dior', 'Son dưỡng, Son,...'),
(9, 'YSL', 'son, phấn phủ,...');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact`
--

CREATE TABLE `contact` (
  `contact_ID` int(11) NOT NULL,
  `contact_name` varchar(200) NOT NULL,
  `contact_email` varchar(200) NOT NULL,
  `contact_message` varchar(200) NOT NULL,
  `contact_phone` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `contact`
--

INSERT INTO `contact` (`contact_ID`, `contact_name`, `contact_email`, `contact_message`, `contact_phone`) VALUES
(2, 'Little Angel 9-Color Eyeshadow Palette', 'ngocvyy6868@gmail.com', 'xinchao', '099999999999'),
(5, 'NGUYEN THI NGOC VY', 'ngocvyy6868@gmail.com', 'xin chao', '0774698684'),
(6, 'NGUYEN THI NGOC VY', 'ngocvyy6868@gmail.com', 'web đẹp thân thiện', '0774698684');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_user` varchar(255) NOT NULL,
  `address` text DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `payment` varchar(50) DEFAULT NULL,
  `shipping` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `order`
--

INSERT INTO `order` (`order_id`, `user_id`, `order_user`, `address`, `phone`, `note`, `payment`, `shipping`, `status`, `total_amount`, `create_at`) VALUES
(25, 8, 'tui la zi', '66 trang tử phường 14', '0774698684', NULL, 'cod', 'processing', 'completed', 500.00, '2024-12-28 05:51:27'),
(26, 8, 'tui la zi', '66 trang tử phường 14', '0774698684', NULL, 'cod', 'processing', 'processing', 1279.00, '2024-12-28 05:54:50'),
(27, 13, 'ttpt', '66 trang tử phường 14', '0774698684', '11', 'cod', 'processing', 'cancelled', 500.00, '2024-12-28 10:30:25'),
(28, 1, 'nguyenthingocvy', '66 trang tử phường 14', '0774698684', '111111', 'card', 'processing', 'cancelled', 279.00, '2024-12-28 21:24:36'),
(29, 1, 'nguyenthingocvy', '66 trang tử phường 14', '+84 775234169', 'giao ở công ty', 'card', 'processing', 'pending', 2337.00, '2024-12-29 06:07:42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `order_detail_id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_ID` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`order_detail_id`, `order_id`, `product_ID`, `quantity`, `price`) VALUES
(1, 25, 22, 1, 500.00),
(2, 26, 5, 1, 279.00),
(3, 26, 21, 1, 500.00),
(4, 26, 4, 1, 500.00),
(5, 27, 4, 1, 500.00),
(6, 28, 5, 1, 279.00),
(7, 29, 1, 2, 500.00),
(8, 29, 3, 1, 500.00),
(9, 29, 5, 3, 279.00);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `product_ID` int(11) NOT NULL,
  `product_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `product_des` varchar(800) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `cate_ID` int(11) NOT NULL,
  `product_img` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `product_price` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `product_quantity` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`product_ID`, `product_name`, `product_des`, `cate_ID`, `product_img`, `product_price`, `product_quantity`) VALUES
(1, 'Lip Pigment', 'WHY IT\'S SPECIAL: A weightless and ultra-lasting lip pigment that delivers bold color payoff in a silky-smooth, luxe matte formula.', 3, '/images/1_201.jpg', '500.000', '130'),
(3, 'ReadMe Lips', 'Summer Makeup Lock Technology】With the new ReadMe long-lasting lip gloss, the \"Hydrophobic Solid Color Layer\"* is formed after applying the velvet lip stain. The lip gloss locks in the color, prevent splashes, and resists sweat. It can achieve a 96% waterproof and color retention rate after the velvet lip stain is applied and the long-lasting lip gloss is layered on top. It\'s like wearing a denim coat on your lips to keep your makeup all day.', 3, '/images/034.jpg', '500.000', '100'),
(4, 'Rouge Intense Velvet Slim Lipstick', 'A stiletto-inspired lipstick comes in velvet-smooth and luxe matte formula that offers you full and sumptuous lips.', 3, '/images/1_l01.jpg', '500.000', '200'),
(5, 'GW 04 Đỏ Đất – Son Romand Glasting Water Tint', 'Thông tin son Romand Glastings Water Tint 04 Son Romand Glastings Water Tint 04 Vintage Ocean khoác lên môi bạn sắc đỏ đất trầm ấm, pha chút ánh nâu nhẹ nhàng. Sắc màu này không quá chói chang, không quá rực rỡ mà ẩn chứa sức hút đầy tinh tế, lôi cuốn. Bạn có thể thoải mái mix&match son Romand 04 Vintage Ocean với nhiều phong cách makeup khác nhau từ tự nhiên, cổ điển đến sang chảnh, quyến rũ. Nếu bạn đi dự một sự kiện trang trọng thì nên đánh son đậm hơn một chút để tạo điểm nhấn cho khuôn mặt. Ngược lại, nếu đi học hàng ngày, bạn có thể đánh son lòng môi để trông tự nhiên và thoải mái hơn.', 4, '/images/Son-Romand-Glasting-Water-Tint-04-Vintage-Ocean-1-510x510.jpg', '279.000', '120'),
(6, 'JL 21 Deep Sangria – Son Romand Juicy Lasting Tint', 'Thông tin son Romand Juicy Lasting Tint 21 Romand Juicy Lasting Tint là BST son môi mới nhất, chiếm trọn ưu thế ngay khi ra mắt. Dòng son này có sự kết hợp từ son lì và chất tint bóng mang lại màu sắc tươi tắn, căng mọng và quyến rũ cho đôi môi. Đặc biệt, trong BST có version Son Romand Juicy Lasting Tint 21 Deep Sangria luôn được càng nàng săn đón với tone màu đỏ mận quyến rũ, phù hợp với nhiều lớp makeup look.', 4, '/images/Son-Romand-Juicy-Lasting-Tint-21-1-510x510.jpg', '279.000', '150'),
(7, 'KEM NỀN DẠNG LỎNG MATTE + PORELESS LIQUID FOUNDATION', 'Kem Nền Fit Me® Matte + Poreless Foundation. Kem nền siêu nhẹ này làm mịn và làm mờ lỗ chân lông, cho lớp nền mịn màng, tự nhiên.', 5, '/images/face-make-up_foundation_fit-me-matte-poreless-foundation_Fair-Ivory.jpg', '288.000', '100'),
(8, 'Son Kem Vinyl Ink Longwear Liquid Lipcolor', 'Khám phá Son Kem Super Stay Vinyl Ink Longwear Liquid Lipcolor cho màu son không lem trôi với độ bền lên tới 16 giờ. Công thức Khóa Màu có khả năng chống lem, chống trôi và mang lại lớp bóng nhẹ tinh tế tức thì. Lắc đều trước khi sử dụng. Tô son đều lên môi sạch, khô. Hiện có sẵn 10 màu Vinyl Ink cho bạn lựa chọn.', 5, '/images/maybelline-superstay-vinyl-ink-longlasting-liquid-lipstick-cheeky-041554071023-o.jpg', '298.000', '250'),
(19, 'Weightless Soft-velvet Blurring Loose Powder', 'A silky powder with soft-focus technology that blurs imperfections and offers oil control.', 3, '/images/01_c1341d92-a38e-4b7d-8e1f-7e3bb7cbb604 (1).jpg', '250.000', '150'),
(20, 'Phấn Bắt Sáng Và Tạo Khối Judydoll Highlight & Contour 9g', 'Phấn Bắt Sáng Và Tạo Khối Judydoll Highlight & Contour là tạo khối đến từ thương hiệu Judydoll. Sản phẩm với thiết kế 2 in 1, cùng bao bì sang trọng tinh tế, vừa giúp tạo khối làm khuôn mặt trở nên thon gọn, thanh thoát hơn, vừa có phần highlight nhằm bắt sáng khuôn mặt trở nên rạng rỡ, tỏa sáng.', 6, '/images/judydoll_97b12f59a1a74fe19177c8aecb1ea49c_49407abdeaa84a43a99694e8a35e079d_1024x1024.jpg', '300.000', '200'),
(21, 'Little Angel 9-Color Eyeshadow Palette', 'Inspired by Medieval Gothic architecture, the packaging captures the way sunlight filters through a rose window, expressing glory and sacredness. At its center, a delicately carved praying angel adds an air of poetic grace. The multi-faceted craft reflects a diverse color spectrum under light.  This palette boasts a long-lasting, easy-to-apply powder formula. Its highly pigmented and versatile color choices make it essential for various occasions.  01 Eden\'s Angel features a delightful array of low-saturation latte shades. The harmonious combination of gradient and transition shades effortlessly allows you to create beautifully layered eye makeup looks. Designed to complement all skin tones, this palette is the perfect companion to enhance your natural beauty.', 7, '/images/01_05de3486-2d56-44b7-9acb-3e461a6a79a0_11zon.png', '500.000', '100'),
(22, 'Little Angel Matte Lipstick', 'Inspired by \'Medieval Gothic architecture,\' our design gracefully blends elements such as pointed arches, rose windows, and gilded angels into a cylindrical shape, all adorned with stardust to create a dreamy and sophisticated aesthetic.  The revolutionary smooth matte formula offers a creamy texture that\'s soft, highly pigmented, and easy to apply. It reduces the typical clumpiness of matte lipsticks, ensuring high color adherence for a smooth, seamless finish.  C01 Starry Cross features a delicate and tender nude apricot shade. Its subtle elegance and fresh look will elevate your style to new heights', 7, '/images/1_81e1df2d-80f5-465f-8942-62af6df30ee1_11zon.png', '500.000', '150'),
(23, 'Son Dior Addict Lip Tattoo Màu 771 Natural Berry Tint', 'Dior vừa cập nhật diện mạo mới nhấy 2022 cho dòng Dior Addict Lip Tattoo để tiếp nối sự thành công của dòng lại cang thêm rực rỡ hơn.Son Dior Addict Lip Tattoo Màu 771 Natural Berry phiên bản mới nhất 2022 với diện mạo mới càng thêm rực rỡ hơn.Son Dior Tattoo 771 Natural Berry tông màu đỏ berry cực nóng bỏng và tôn da cùng chất son nước dạng son tint lòng môi mềm mại cho đôi môi căng mọng xinh cực xinh.', 8, '/images/1.jpg', '649.000', '150'),
(24, 'Son Dior Rouge Dior 625 Mitzah Matte - Hồng Đất Ngọt Ngào', 'Nhà Dior lại cho ra mắt thêm một thỏi son cực phẩm Dior 625 Mitzah Matte tone màu hồng đất thiên hồng nhẹ nhàng cho nàng thêm phần ngọt ngào hơn. Màu son Dior 625 hứa hẹn cho nàng một makeup tươi tắn và cực dễ thương luôn nhé.', 8, '/images/2.jpg', '849.000', '100'),
(25, 'Son YSL màu 21', 'Son môi với thiết kế đầu vuông vô cùng sắc sảo và đẹp mắt, viền môi sắc nét trông bạn cuốn hút. Chất son mịn lì lâu trôi dù tán nhiều lớp son, độ che phú cao nay với phiên bản giới hạn logo YSL mang tính biểu tượng được lật nghiêng, uốn cong theo góc nhọn của The Slim và được đóng đinh như một viên ngọc quý.', 9, '/images/tải xuống (1).jpg', '890.000', '100'),
(26, 'JUDYDOLL Kem Dưỡng Môi Marshmallow Cotton Candy Lip Mud trắng sáng', 'Son môi mờ không dính Nhẹ nhàng. Lâu dài Màu sắc hợp thời trang Nhiều màu sắc dễ sử dụng cho người mới bắt đầu * Mẹo: Để đạt được lớp trang điểm lý tưởng, không có mí mắt khi thoa, đợi cho đến khi bạn cảm thấy mỏng và nhẹ sau khi trang điểm, hiệu quả trang điểm sẽ kéo dài thời gian sử dụng..', 4, '/images/sg-11134201-7rcd3-lr602dk6z9cx70.jpg', '280.000', '100');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `email` varchar(255) NOT NULL,
  `birthday` date DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `profile`
--

INSERT INTO `profile` (`id`, `user_ID`, `fullname`, `phone`, `address`, `bio`, `updated_at`, `email`, `birthday`, `img`, `created_at`) VALUES
(1, 2, 'NGUYen', '0774698684', '66 trang tử phường 14', NULL, '2024-12-28 09:17:01', 'ngocvyy6868@gmail.com', '2024-12-11', 'images/1735402621_acd69be4e79fbc09a9c7f887ec9b96af.jpg', '2024-12-28 09:20:42'),
(2, 1, 'Nguyễn Thị Ngọc Vy', '0774698684', '33 Đ. Vĩnh Viễn, Phường 2, Quận 10, Hồ Chí Minh', 'Qi102', '2024-12-28 06:37:00', 'ngocvyy6868@gmail.com', '2004-07-28', 'images/1735393020_z6175509971031_00cae1b63cd38bfe1f8cf44f462a8841.jpg', '2024-12-28 09:20:42'),
(3, 4, '11', '1', '146712t368491', 'tui là di', '2024-12-28 02:51:31', '11@1111', '2024-12-20', 'images/1735379262_acd69be4e79fbc09a9c7f887ec9b96af.jpg', '2024-12-28 09:20:42'),
(4, 5, 'Nguyễn Thanh Tùng', '1900068887', '25/25 Nguyễn Bỉnh Khiêm, phường Bến Nghé, quận 1, TP. HCM', 'Nguyễn Thanh Tùng, thường được biết đến với nghệ danh Sơn Tùng M-TP, là một nam ca sĩ kiêm sáng tác nhạc, nhà sản xuất thu âm, rapper và diễn viên người Việt Nam. Nổi tiếng vì tầm ảnh hưởng sâu rộng đối với âm nhạc Việt Nam, anh được mệnh danh là \"Hoàng tử V-pop\" bởi Giải thưởng Âm nhạc Thế giới và BroadwayWorld.', '2024-12-28 06:28:48', 'stsvietnam.hcm@gmail.com', '1994-07-05', 'images/1735392528_channels4_profile.jpg', '2024-12-28 09:48:54'),
(5, 8, 'Hồng Minh', '123456789', '123 nguyen van a phường 2 quận 10 tpHCM', 'best on the mic', '2024-12-28 06:24:28', 'minhne@gmail.com', '2004-12-16', 'images/1735392268_acd69be4e79fbc09a9c7f887ec9b96af.jpg', '2024-12-28 09:49:03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_ID` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `image_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `product_ID`, `rating`, `comment`, `created_at`, `updated_at`, `image_path`) VALUES
(1, 1, 4, 4, 'sản phẩm tuyệt vời', '2024-12-28 23:01:00', '2024-12-28 23:01:00', NULL),
(2, 5, 1, 5, 'Sản phẩm tốt, giao hàng nhanh, chủ shop xinh gái nhiệt tình', '2024-12-29 06:06:30', '2024-12-29 06:06:30', NULL),
(3, 1, 1, 3, 'giao hàng trễ', '2024-12-28 23:15:25', '2024-12-28 23:15:25', NULL),
(5, 1, 19, 5, 'phấn phủ mịn quá xuất sắc', '2024-12-28 23:24:38', '2024-12-28 23:24:38', NULL),
(9, 1, 19, 5, 'sp tuyet voi', '2024-12-28 23:35:48', '2024-12-28 23:35:48', 'reviews/oyWC50c33mCI5YnPQRuWqFKY1NKY8O3g6A3nf0Ua.jpg'),
(10, 1, 5, 5, 'rat dep, dung nhu mo ta heheh', '2024-12-29 00:33:47', '2024-12-29 00:33:47', 'reviews/Ofy0T7603jpGAnm5Ag6w38537PmeockKdFwFTbLX.jpg'),
(11, 4, 7, 3, 'Xuống tone nhanh tone nhanh', '2024-12-29 06:11:30', '2024-12-29 06:11:30', 'reviews/dSREvXjzoN4rtsEHJURHcS1rsN3HhIlf1WfQfoHq.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `fullname` varchar(50) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`ID`, `username`, `password`, `fullname`, `role`) VALUES
(1, 'admin', '123', 'nguyenthingocvy', 1),
(2, 'user1', '123', 'hminh', 0),
(4, 'user2', '123', 'cherry', 0),
(5, 'users', 'mtp', 'nguyễn thanh tùng', 0),
(8, 'user3', '1', 'tui la zi', 0),
(13, 'admin1', '123', 'ttpt', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cate_ID`);

--
-- Chỉ mục cho bảng `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_ID`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_detail_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_ID` (`product_ID`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_ID`),
  ADD KEY `fk_category` (`cate_ID`);

--
-- Chỉ mục cho bảng `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id` (`user_ID`);

--
-- Chỉ mục cho bảng `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_ID` (`product_ID`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `cate_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `product_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`ID`);

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order` (`order_id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`product_ID`) REFERENCES `product` (`product_ID`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_category` FOREIGN KEY (`cate_ID`) REFERENCES `category` (`cate_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_ID`) REFERENCES `user` (`ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `profile_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `user` (`ID`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`product_ID`) REFERENCES `product` (`product_ID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
