

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--
DROP TABLE banner;
CREATE TABLE `banner` (
  `id` int(11) PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `desc` varchar(255) NULL,
  `status` tinyint(4) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO banner (name, image, `desc`) VALUES
('Banner name 41', 'https://i.pinimg.com/originals/4e/21/21/4e21214e901ffbf8495936f700d4ccaa.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti, labore ipsa cupiditate recusandae repellendus perspiciatis magni vero. Iste adipisci sunt delectus eos atque, cum doloremque eaque quidem! Excepturi, temporibus inventore?'),
('Banner name 5', 'https://i.pinimg.com/originals/4e/21/21/4e21214e901ffbf8495936f700d4ccaa.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti, labore ipsa cupiditate recusandae repellendus perspiciatis magni vero. Iste adipisci sunt delectus eos atque, cum doloremque eaque quidem! Excepturi, temporibus inventore?'),
('Banner name 6', 'https://i.pinimg.com/originals/4e/21/21/4e21214e901ffbf8495936f700d4ccaa.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti, labore ipsa cupiditate recusandae repellendus perspiciatis magni vero. Iste adipisci sunt delectus eos atque, cum doloremque eaque quidem! Excepturi, temporibus inventore?');


CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` tinyint(4) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `status`) VALUES
(1, 'Quần', 1),
(4, 'Đồng hồ', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(150) DEFAULT NULL,
  `gender` tinyint(4) DEFAULT 0,
  `birthday` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`id`, `name`, `email`, `phone`, `address`, `gender`, `birthday`) VALUES
(1, 'Trần Quốc Khánh', 'khanhtq@gmail.com', '0986421', NULL, 0, '1998-10-15'),
(2, 'Võ Hồng Nam', 'namvh@gmail.com', '0597977', NULL, 0, '1995-05-20');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `status` tinyint(4) DEFAULT 1,
  `order_date` date DEFAULT curdate(),
  `order_note` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `status`, `order_date`, `order_note`) VALUES
(1, 1, 0, '2022-10-11', NULL),
(2, 2, 1, '2022-10-11', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` float NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `order_detail`
--

INSERT INTO `order_detail` (`order_id`, `product_id`, `price`, `quantity`) VALUES
(1, 1, 200000, 2),
(1, 2, 1800000, 1),
(2, 1, 200000, 5),
(2, 2, 1800000, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` tinyint(4) DEFAULT 1,
  `content` text DEFAULT NULL,
  `price` float NOT NULL,
  `sale_price` float DEFAULT 0,
  `category_id` int(11) DEFAULT NULL,
  `created_date` date DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `status`, `content`, `price`, `sale_price`, `category_id`, `created_date`) VALUES
(1, 'Bộ vest nam công sở', 1, NULL, 200000, 0, 1, '2022-10-11'),
(2, 'Đồng hồ Parado', 1, NULL, 2000000, 1800000, 4, '2022-10-11');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`order_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`);

--
-- Các ràng buộc cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
