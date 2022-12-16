-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Des 2022 pada 09.47
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_anipets`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `customer_id` int(11) NOT NULL,
  `customer_code` varchar(100) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `email_address` varchar(200) NOT NULL,
  `contact_number` varchar(15) NOT NULL,
  `complete_address` varchar(255) NOT NULL,
  `avatar` varchar(500) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` int(1) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_customer`
--

INSERT INTO `tbl_customer` (`customer_id`, `customer_code`, `customer_name`, `email_address`, `contact_number`, `complete_address`, `avatar`, `username`, `password`, `status`, `user_id`) VALUES
(1, 'cust01', 'DWI TIA AUDINA', 'dina@example.com', '0987654321', 'BOYOLALI', 'customer1.jpg', 'tia', 'customer', 1, 1),
(2, 'cust02', 'ARYA TIO WASESA', 'arya@example.com', '0987654321', 'BOYOLALI', 'customer2.jpg', 'tio', '$2y$10$JqYQl4CWwjkAO.EOdEYA2OR3P.dCAEjiqVo5wmpymed3ctShnpx9S', 0, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(11) NOT NULL,
  `reference_no` varchar(30) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` enum('accepted','declined','to deliver','to receive') NOT NULL,
  `expected_delivery_date` date DEFAULT NULL,
  `total_amount` float NOT NULL,
  `number_of_items` int(5) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `reference_no`, `customer_id`, `order_date`, `order_status`, `expected_delivery_date`, `total_amount`, `number_of_items`, `user_id`) VALUES
(5, 'order01', 1, '2022-12-13 08:51:39', 'declined', '2022-12-21', 200000, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_order_detail`
--

CREATE TABLE `tbl_order_detail` (
  `order_detail_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `pet_product_id` int(11) DEFAULT NULL,
  `quantity` int(5) NOT NULL,
  `quantity_price` float NOT NULL,
  `status` enum('completed','on delivery','cancelled') NOT NULL,
  `vendor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_order_detail`
--

INSERT INTO `tbl_order_detail` (`order_detail_id`, `order_id`, `pet_product_id`, `quantity`, `quantity_price`, `status`, `vendor_id`) VALUES
(1, 5, 1, 1, 200000, 'completed', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `payment_id` int(11) NOT NULL,
  `reference_no` varchar(30) NOT NULL,
  `payment_for` enum('service','order') NOT NULL,
  `amount_paid` float NOT NULL,
  `payment_status` enum('partial','fully paid') NOT NULL,
  `paid_by` varchar(30) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_payment`
--

INSERT INTO `tbl_payment` (`payment_id`, `reference_no`, `payment_for`, `amount_paid`, `payment_status`, `paid_by`, `user_id`) VALUES
(7, 'pay01', 'order', 100000, 'fully paid', 'DWI TIA AUDINA', 1),
(8, 'pay01', 'service', 100000, 'partial', 'DWI TIA AUDINA', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pet`
--

CREATE TABLE `tbl_pet` (
  `pet_id` int(11) NOT NULL,
  `pet_name` varchar(200) NOT NULL,
  `pet_description` text NOT NULL,
  `pet_category_id` int(11) NOT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `pet_images` varchar(500) NOT NULL,
  `pet_status` int(1) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_pet`
--

INSERT INTO `tbl_pet` (`pet_id`, `pet_name`, `pet_description`, `pet_category_id`, `vendor_id`, `pet_images`, `pet_status`, `user_id`) VALUES
(1, 'Siamese Cat', 'The Siamese cat is one of the oldest recorded cat breeds. They are descended from the Felidae cat family. Several other types of cats are derived from Siamese cats, namely Balinese cats, Javanese cats, and Bengal cats.', 4, 1, 'siamese.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pet_category`
--

CREATE TABLE `tbl_pet_category` (
  `pet_category_id` int(11) NOT NULL,
  `pet_category_name` varchar(30) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_pet_category`
--

INSERT INTO `tbl_pet_category` (`pet_category_id`, `pet_category_name`, `user_id`) VALUES
(3, 'dog', 1),
(4, 'cat', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pet_product`
--

CREATE TABLE `tbl_pet_product` (
  `pet_product_id` int(11) NOT NULL,
  `product_code` varchar(50) NOT NULL,
  `product_image` varchar(500) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_detail` text NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `quantity_on_hand` int(5) NOT NULL,
  `vendor_price` float NOT NULL,
  `retail_price` float NOT NULL,
  `discount` float NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_pet_product`
--

INSERT INTO `tbl_pet_product` (`pet_product_id`, `product_code`, `product_image`, `product_name`, `product_detail`, `product_category_id`, `quantity_on_hand`, `vendor_price`, `retail_price`, `discount`, `vendor_id`, `status`, `user_id`) VALUES
(1, 'df01', 'https://cdn.onemars.net/sites/whiskas_id_xGoUJ_mwh5/image/thumb_new-pack-whk_in-door_1652271904013.png', 'WHISKAS® DRY ADULT 1+ INDOOR', 'Sebagai pencipta makanan kucing WHISKAS®, kami tahu bahwa kucing rumahan memiliki kebutuhan diet khusus yang perlu disesuaikan dengan gaya hidup mereka yang santai. Kucing rumahan cenderung menghabiskan waktu mereka dengan tidur dan bersantai di tempat favorit mereka seharian, mereka tidak terlalu aktif dan membutuhkan hanya sedikit energi.', 1, 10, 150000, 170000, 0, 1, 1, 1),
(2, 'df02', 'https://cdn.onemars.net/sites/whiskas_id_xGoUJ_mwh5/image/thumb_new-pack-whk_skin-coat_1652272296139.png', 'WHISKAS® DRY ADULT 1+ SKIN & COAT', 'Bulu dan kulit yang indah adalah ciri khas kucing yang dirawat dengan baik dan sehat. Banyak faktor yang bisa menyebabkan kesehatan kulit & bulu yang jelek, seperti nutrisi yang buruk, berat badan yang berlebihan (yang mempersulit kucing Anda merawat tubuh mereka sendiri), usia tua dan bahkan terlalu sering dimandikan (yang bisa menghilangkan minyak alami dan menyebabkan iritasi kulit).', 7, 10, 200000, 250000, 0, 1, 1, 1),
(3, 'df03', 'https://cdn.onemars.net/sites/whiskas_id_xGoUJ_mwh5/image/thumb_new-pack-whk_hairball_1652272467435.png', 'WHISKAS® DRY ADULT 1+ HAIRBALL CONTROL', 'Kucing menghabiskan setidaknya lima jam sehari untuk merawat dirinya. Lidah mereka yang kasar seperti amplas mudah menjaring rambut yang terlepas, yang kemudiannya tertelan. Meskipun bulu tersebut biasanya bisa melewati usus dan dikeluarkan melalui feses, beberapa kucing (terutama kucing berambut panjang) cenderung membentuk hairball di perutnya. Memang kucing dapat memuntahkan hairball (sesuatu yang sudah cukup tidak menyenangkan), namun hairball yang menumpuk di perut dapat menjadi masalah serius jika tersendat pada saluran pencernaan.', 7, 10, 200000, 220000, 0, 1, 1, 1),
(4, 'df01', 'https://cdn.royalcanin-weshare-online.io/eCEqa2QBaxEApS7L2fi7/v290/fbn2016-packshot-british-shorthair-kitten?w=250&fm=jpg&auto=compress', 'British Shorthair Kitten', 'This specially designed moon-shaped kibble is adapted in size and texture to be easy for the British Shorthair kitten to grasp. The unique kibble encourages chewing to help support oral hygiene.', 7, 10, 150000, 200000, 0, 2, 1, 1),
(6, 'df08', 'https://cdn.royalcanin-weshare-online.io/m1ayV30BBKJuub5qT8y3/v304/sol-kitten-ster-dry-packshot-b1?w=250&fm=jpg&auto=compress', 'KITTEN STERILISED', 'ROYAL CANIN® Sterilised Kitten is specially formulated to support the nutritional needs of sterilised kittens in the “consolidation phase” of their growth. This formula is suitable for 6 to 12-month-old sterilised kittens as they undergo a period of significant physical and behavioural changes.', 7, 10, 150000, 200000, 0, 2, 1, 1),
(7, 'df010', 'https://cdn.royalcanin-weshare-online.io/m2kUrmsBG95Xk-RB3Pu-/v297/hairskin-ne-fcn-packshot?w=250&fm=jpg&auto=compress', 'Hair And Skin Care', 'ROYAL CANIN® Hair & Skin Care is an exclusive complex of nutrients that help to support the skin\'s barrier role. It contains high quality proteins, including specific amino acids, to maintain healthy hair growth and skin renewal.ROYAL CANIN® Hair & Skin Care includes an essential combination of omega-3 and omega-6 fatty acids for beneficial effects on skin health and coat condition.', 7, 10, 150000, 200000, 0, 2, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pet_product_category`
--

CREATE TABLE `tbl_pet_product_category` (
  `product_category_id` int(11) NOT NULL,
  `category_name` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_pet_product_category`
--

INSERT INTO `tbl_pet_product_category` (`product_category_id`, `category_name`, `description`, `user_id`) VALUES
(1, 'WetFood', 'This wet food is useful for cats that have certain health conditions that require more water intake', 1),
(2, 'RawFood', 'Raw food has many functions for your cat, such as supporting healthy teeth and dental hygiene. and also raw foods have higher protein than other types of food', 1),
(7, 'DryFood', 'Dry food is also beneficial for the dental health of your cat and your dog. There are several dry food diets that have beneficial effects on teeth, either reducing tartar formation or slowing plaque accumulation. The activity of chewing dry food can clean plaque.', 1),
(8, 'Treats', 'Treats are also necessary for your pet. apart from being a treats snack, it also functions to maintain the health of cats too, why?? because the content of treats usually has more ingredients that are useful for nourishing the baby\'s internal organs', 1),
(10, 'Mainan', 'toys are also necessary for children, as a boredom buster for children or for their employers.', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_service`
--

CREATE TABLE `tbl_service` (
  `service_id` int(11) NOT NULL,
  `reference_no` varchar(30) NOT NULL,
  `service_name` varchar(100) NOT NULL,
  `service_picture` varchar(500) NOT NULL,
  `service_detail` varchar(500) NOT NULL,
  `service_fee` float NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_service`
--

INSERT INTO `tbl_service` (`service_id`, `reference_no`, `service_name`, `service_picture`, `service_detail`, `service_fee`, `user_id`) VALUES
(1, 'svc01', 'Animal Gromming', 'pet-house.png', 'Gromming at our place, safe and reliable. and we do it wholeheartedly without discriminating against the race of an animal', 100000, 1),
(2, 'svc02', 'Animal Boarding', 'dog.png', 'Animal lodging at our place is very reliable, because it will be guarded 24 hours', 300000, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_service_order`
--

CREATE TABLE `tbl_service_order` (
  `order_service_id` int(11) NOT NULL,
  `reference_no` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `service_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `service_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `reserve_date` date DEFAULT NULL,
  `service_status` enum('fully paid','partial') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'partial',
  `total_amount` float NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `tbl_service_order`
--

INSERT INTO `tbl_service_order` (`order_service_id`, `reference_no`, `service_id`, `customer_id`, `service_date`, `reserve_date`, `service_status`, `total_amount`, `user_id`) VALUES
(3, 'so01', 1, 1, '2022-12-13 08:03:20', NULL, 'fully paid', 120000, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `avatar` varchar(500) DEFAULT NULL,
  `contact` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `user_category_id` int(1) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `username`, `password`, `fullname`, `avatar`, `contact`, `email`, `user_category_id`, `status`) VALUES
(1, 'dina', '$2y$10$WFd/FMy9c6y5x.DMMoVqOOX', 'DWI TIA AUDINA', 'avatar1.jpg', '0987654321', 'tia@gmail.com', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user_group`
--

CREATE TABLE `tbl_user_group` (
  `user_group_id` int(11) NOT NULL,
  `group_name` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `allow_add` int(1) NOT NULL,
  `allow_edit` int(1) NOT NULL,
  `allow_delete` int(1) NOT NULL,
  `allow_print` int(1) NOT NULL,
  `allow_import` int(1) NOT NULL,
  `allow_export` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user_group`
--

INSERT INTO `tbl_user_group` (`user_group_id`, `group_name`, `description`, `allow_add`, `allow_edit`, `allow_delete`, `allow_print`, `allow_import`, `allow_export`) VALUES
(1, 'cashier', 'cashier in charge of serving online customers who order through the website or whatever', 1, 1, 0, 1, 0, 0),
(3, 'admin', 'This admin is the head to oversee the work of the cashiers, and this admin can access all the features on this website', 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_vendor`
--

CREATE TABLE `tbl_vendor` (
  `company_id` int(11) NOT NULL,
  `company_name` varchar(200) NOT NULL,
  `company_contact_person` varchar(200) NOT NULL,
  `company_email` varchar(200) NOT NULL,
  `company_contact_number` varchar(15) NOT NULL,
  `company_website` varchar(200) NOT NULL,
  `company_profile` varchar(250) DEFAULT NULL,
  `vendor_username` varchar(200) NOT NULL,
  `vendor_password` varchar(200) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_vendor`
--

INSERT INTO `tbl_vendor` (`company_id`, `company_name`, `company_contact_person`, `company_email`, `company_contact_number`, `company_website`, `company_profile`, `vendor_username`, `vendor_password`, `user_id`) VALUES
(1, 'WHISKAS', '098765434321', 'whiskas@example.com', '098765434321', 'https://www.whiskasindonesia.com/', 'Whiskas-Logo.png', 'whiskasindonesia', 'mamkucing', 1),
(2, 'ROYALCANIN', '0987654321', 'canin@example.com', '0987654321', 'https://www.royalcanin.com/id', 'royal-canin.png', 'royalcanin', '$2y$10$gnbKt0M6RP98Xw7VsJBNUu4DeQV3ddT3h7kSCqRP8zUp/eI7SF6z2', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `customer_name` (`customer_name`);

--
-- Indeks untuk tabel `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  ADD PRIMARY KEY (`order_detail_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `pet_product_id` (`pet_product_id`),
  ADD KEY `vendor_id` (`vendor_id`);

--
-- Indeks untuk tabel `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `tbl_payment_ibfk2` (`paid_by`);

--
-- Indeks untuk tabel `tbl_pet`
--
ALTER TABLE `tbl_pet`
  ADD PRIMARY KEY (`pet_id`),
  ADD KEY `pet_category_id` (`pet_category_id`),
  ADD KEY `vendor_id` (`vendor_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `tbl_pet_category`
--
ALTER TABLE `tbl_pet_category`
  ADD PRIMARY KEY (`pet_category_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `tbl_pet_product`
--
ALTER TABLE `tbl_pet_product`
  ADD PRIMARY KEY (`pet_product_id`),
  ADD KEY `product_category_id` (`product_category_id`),
  ADD KEY `vendor_id` (`vendor_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `tbl_pet_product_category`
--
ALTER TABLE `tbl_pet_product_category`
  ADD PRIMARY KEY (`product_category_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `tbl_service`
--
ALTER TABLE `tbl_service`
  ADD PRIMARY KEY (`service_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `tbl_service_order`
--
ALTER TABLE `tbl_service_order`
  ADD PRIMARY KEY (`order_service_id`),
  ADD KEY `tbl_service_order_ibfk1` (`customer_id`),
  ADD KEY `tbl_service_order_ibfk2` (`service_id`),
  ADD KEY `tbl_service_order_ibfk3` (`user_id`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_category_id` (`user_category_id`);

--
-- Indeks untuk tabel `tbl_user_group`
--
ALTER TABLE `tbl_user_group`
  ADD PRIMARY KEY (`user_group_id`);

--
-- Indeks untuk tabel `tbl_vendor`
--
ALTER TABLE `tbl_vendor`
  ADD PRIMARY KEY (`company_id`),
  ADD KEY `fk_vendor_ibfk1` (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  MODIFY `order_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tbl_pet`
--
ALTER TABLE `tbl_pet`
  MODIFY `pet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_pet_category`
--
ALTER TABLE `tbl_pet_category`
  MODIFY `pet_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_pet_product`
--
ALTER TABLE `tbl_pet_product`
  MODIFY `pet_product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tbl_pet_product_category`
--
ALTER TABLE `tbl_pet_product_category`
  MODIFY `product_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tbl_service`
--
ALTER TABLE `tbl_service`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_service_order`
--
ALTER TABLE `tbl_service_order`
  MODIFY `order_service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `tbl_user_group`
--
ALTER TABLE `tbl_user_group`
  MODIFY `user_group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_vendor`
--
ALTER TABLE `tbl_vendor`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD CONSTRAINT `tbl_customer_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD CONSTRAINT `tbl_order_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_order_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `tbl_customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  ADD CONSTRAINT `tbl_order_detail_ibfk_1` FOREIGN KEY (`pet_product_id`) REFERENCES `tbl_pet_product` (`pet_product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_order_detail_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `tbl_order` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_order_detail_ibfk_3` FOREIGN KEY (`vendor_id`) REFERENCES `tbl_vendor` (`company_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD CONSTRAINT `tbl_payment_ibfk2` FOREIGN KEY (`paid_by`) REFERENCES `tbl_customer` (`customer_name`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_payment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`user_id`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_pet`
--
ALTER TABLE `tbl_pet`
  ADD CONSTRAINT `tbl_pet_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_pet_ibfk_2` FOREIGN KEY (`pet_category_id`) REFERENCES `tbl_pet_category` (`pet_category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_pet_ibfk_3` FOREIGN KEY (`vendor_id`) REFERENCES `tbl_vendor` (`company_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_pet_category`
--
ALTER TABLE `tbl_pet_category`
  ADD CONSTRAINT `tbl_pet_category_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_pet_product`
--
ALTER TABLE `tbl_pet_product`
  ADD CONSTRAINT `tbl_pet_product_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_pet_product_ibfk_2` FOREIGN KEY (`product_category_id`) REFERENCES `tbl_pet_product_category` (`product_category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_pet_product_ibfk_3` FOREIGN KEY (`vendor_id`) REFERENCES `tbl_vendor` (`company_id`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_pet_product_category`
--
ALTER TABLE `tbl_pet_product_category`
  ADD CONSTRAINT `tbl_pet_product_category_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_service`
--
ALTER TABLE `tbl_service`
  ADD CONSTRAINT `tbl_service_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_service_order`
--
ALTER TABLE `tbl_service_order`
  ADD CONSTRAINT `tbl_service_order_ibfk1` FOREIGN KEY (`customer_id`) REFERENCES `tbl_customer` (`customer_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_service_order_ibfk2` FOREIGN KEY (`service_id`) REFERENCES `tbl_service` (`service_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_service_order_ibfk3` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`user_id`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD CONSTRAINT `tbl_user_ibfk_1` FOREIGN KEY (`user_category_id`) REFERENCES `tbl_user_group` (`user_group_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_vendor`
--
ALTER TABLE `tbl_vendor`
  ADD CONSTRAINT `fk_vendor_ibfk1` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
