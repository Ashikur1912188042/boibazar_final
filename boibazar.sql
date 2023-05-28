-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2023 at 09:27 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `boibazar`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'Farheen', 'farheen@gmail.com', '$2y$10$UbLb9/Lu8arZDUTNwjyikOyVN7qzKk0FQAaXZkNg6XF7VsODYru6S'),
(2, 'Pranta', 'pranta@gmail.com', '$2y$10$JhDC3GS9Uh3c1y.bMuk4eejEkCajdPcYECey6wFaz81ZwnaoZ/s2O');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(7, 'Madina Prokashani'),
(8, 'Seba Prokashani'),
(9, 'Dipto Publication');

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `product_id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`) VALUES
(12, 'Literature'),
(13, 'Novel'),
(14, 'Science Fiction'),
(15, 'Law'),
(16, 'Politics'),
(17, 'Islamic');

-- --------------------------------------------------------

--
-- Table structure for table `orders_pending`
--

CREATE TABLE `orders_pending` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(255) NOT NULL,
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders_pending`
--

INSERT INTO `orders_pending` (`order_id`, `user_id`, `invoice_number`, `product_id`, `quantity`, `order_status`) VALUES
(8, 21, 1317067886, 4, 1, 'pending'),
(9, 21, 867072337, 4, 1, 'pending'),
(10, 21, 1123985549, 2, 1, 'pending'),
(11, 21, 340473908, 2, 1, 'pending'),
(12, 21, 293267609, 4, 1, 'pending'),
(13, 21, 1971768249, 2, 1, 'pending'),
(14, 21, 1652724648, 2, 1, 'pending'),
(15, 21, 122070617, 3, 1, 'pending'),
(16, 21, 1667652049, 3, 1, 'pending'),
(17, 21, 2108929414, 2, 1, 'pending'),
(18, 21, 1696099387, 10, 1, 'pending'),
(19, 24, 268868816, 15, 1, 'pending'),
(20, 24, 1298959688, 20, 1, 'pending'),
(21, 24, 1435802383, 17, 1, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(100) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_keywords` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_image1` varchar(255) NOT NULL,
  `product_image2` varchar(255) NOT NULL,
  `product_image3` varchar(255) NOT NULL,
  `product_price` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_description`, `product_keywords`, `category_id`, `brand_id`, `product_image1`, `product_image2`, `product_image3`, `product_price`, `date`, `status`) VALUES
(13, ' নিউইয়র্কে হুমায়ূন আহমেদের চিকিৎসা ও অন্যান্য প্রসঙ্গ', 'যাদুকর এগিয়ে চলেছেন তা৭র সহজ পদচারণায়, আর তাঁর প্রতিটি পদপাতেই ছড়িয়ে পড়ছে অজস্র ফুলের হাসি। হ্যাঁ, এমনি যাদুকরি মুগ্ধতা ছড়িয়ে হুমায়ূন আহমেদের এগিয়ে চলা। সাহিত্যের প্রতিটি অঙ্গনে তাঁর অবদান বিপুল অভিনন্দনে ধন্য।', ' নিউইয়র্কে হুমায়ূন আহমেদের চিকিৎসা ও অন্যান্য প্রসঙ্গ, পূরবী বসু,হুমায়ূন , Humayun Ahmed', 12, 7, '03.png', '03.png', '03.png', 170, '2023-05-17 04:51:50', 'true'),
(14, 'মানুষ জীবনানন্দ', 'রবীন্দ প্রভাব বলয়ের বাইরের প্রধানতম কবি জীবনান্দ দাশ কলকাতায় এক ট্রাম দূর্ঘটনায় মৃত্যুবরণ করেন 1954 সালে। নিভৃতচারী এই কবি দীর্ঘ দিন ধরে বেকারত্ব ও দারিদ্রের সাথে সংগ্রাম করে মৃত্যুর মাত্র কয়েক বছর আগে পেতে শুরু করেছিলেন খ্যাতি ও জনপ্রিয়তা ।', 'মানুষ জীবনানন্দ, জীবনানন্দ, Jibonanondo das', 12, 7, '02.png', '02.png', '02.png', 220, '2023-05-17 04:53:07', 'true'),
(15, 'আলেখ্য : জীবনানন্দ দাস', 'মাত্র পাঁচটি কবিতার বই আর দেড়শোর সামান্য বেশি কিতাব রেখে যখন মারা যান জীবনানন্দ দাশ তখন কি কেউ জানতো কী অজস্র রত্মভাণ্ডার তাঁর উত্তরাধিকারীদের জন্য রেখে গেছেন তিনি? এই অপ্রত্যাশিত আবিষ্কারের মধ্যে রয়েছে তাঁর বর্ণিল গদ্যসম্ভার-অজস্র গল্প, উপন্যাসের পাণ্ডুল', 'আলেখ্য : জীবনানন্দ দাস,জীবনানন্দ দাস,Jibonando', 12, 7, '04.png', '04.png', '04.png', 180, '2023-05-17 04:54:52', 'true'),
(16, 'উৎস ফেরার ছলচাতুরী শিশু ও শিশু সাহিত্য', 'বাংলাদেশের সাহিত্যে হায়াৎ মামুদের পরিচিতি একাধিক কারণে পরিব্যাপ্ত। সামাজিক ও সাংস্কৃতিক দায়বদ্ধতার যে প্রমাণ তিনি গেঁথে রাখেন দেশের প্রগতিশীল অজস্র ও বহুমুখী কর্মপ্রণোদনায় স্বেচ্ছাশ্রমিক হওয়ার আন্তর্তাগিদে, তা হয়তো-বা একটি কারণ। কিন্তু এর বাইরে, সাহিত্যের', 'উৎস ফেরার ছলচাতুরী শিশু ও শিশু সাহিত্য,হায়াত মামুদ, Hayat Mahmud', 12, 8, '05.png', '05.png', '05.png', 200, '2023-05-17 04:56:38', 'true'),
(17, 'হিমু সমগ্র - ১ম খণ্ড (হার্ডকভার)', '“হিমু সমগ্র” বইয়ের ভূমিকা হিমুকে নিয়ে কতগুলি বই লিখেছি নিজেও জানি না। মন মেজাজ খারাপ থাকলেই হিমু লিখতে বসি। মন ঠিক হয়ে যায়। বেশি লেখার ফল সব সময় শূভ হয় না। আমার ক্ষেত্রেও হয় নি। অনেক জায়গাতেই ল্যাজে গোবরে করে ফেলেছি। হিমুর পাঞ্জাবির পকেট থাকে না অথচ একটা ', 'হিমু সমগ্র - ১ম খণ্ড, হুমায়ূন আহমেদ', 13, 9, '06.png', '06.png', '06.png', 650, '2023-05-17 05:03:53', 'true'),
(18, 'জলেশ্বরী', 'গল্পটা একজন মানুষের ফিরে চলা বা অতীতকে খোঁজার। এই খোঁজার গল্পের ভেতরে নিখুতভাবে ফুটে উঠেছে আটাশির বন্যায় মানুষের দুর্দশার করুণ চিত্র। আটাশির বন্যা যে কতোটা মহামারি রূপ ধারণ করেছিলো তার একটা চিত্র চোখের সামনে ভেসে ওঠে। পেটের ক্ষুধার কাছে বাকি সব পরাজিত সৈন', 'জলেশ্বরী, ওবায়েদ হক', 13, 7, '07.png', '07.png', '07.png', 250, '2023-05-17 05:07:53', 'true'),
(19, 'হাসির পাঁচ উপন্যাস', 'বিভিন্ন সময়ে হাসির উপন্যাস লিখেছেন ইমদাদুর হক মিলন। সেইসব উপন্যাস পড়ে হাসতে হাসতে পেটে খিল ধরেছে পাঠকের। হাসির উপন্যাসগুলোর কোনও কোনওটির নাট্যরূপ প্রচার হয়েছে টেলিভিশন চ্যানেলগুলোতে। সেগুলো দেখে টেলিভিশন পর্দা থেকে চোখ সরাতে পারেনি দর্শক। এরকম পাঁচটি উপন্', 'হাসির পাঁচ উপন্যাস, হাসির পাঁচ উপন্যাস', 13, 8, '08.png', '08.png', '08.png', 270, '2023-05-17 05:10:38', 'true'),
(20, 'দ্য থ্রি বডি প্রবলেম', 'চীনের সাংস্কৃতিক বিপ্লবের সময় নিষ্ঠুর অভিজ্ঞতার শিকার হবার পর ইয়ে ওয়েনজিয়ার ঠাঁই হয়েছিল চীনের অত্যন্ত গোপনীয় প্রজেক্ট—রেড কোস্ট বেইজে। তারপর... সেই ঘটনার চল্লিশ বছর পর একের পর এক বিজ্ঞানী মারা পড়ছেন। আত্মহত্যা নাকি হত্যা তা বোঝা না গেলেও সবার সাথেই ', 'দ্য থ্রি বডি প্রবলেম,লিউ সিশিন', 14, 8, '09.png', '09.png', '09.png', 760, '2023-05-17 05:21:44', 'true'),
(21, 'প্রলয়', 'প্রলয় একজন ফেরারী আসামী। সে কখনও কারো সাথে প্রতারণা করেনি, এছাড়া এমন কোনো অপরাধ নেই যেটি সে করেনি। সে ধরা পড়বে কখনও ভাবেনি, কিন্তু শেষ পর্যন্ত শৃঙ্খলা বাহিনীর হাতে ধরা পড়েছে। দুর্ভেদ্য কারাগারে তার বাকী জীবন কাটাতে হবে – অন্তত সেটাই সবাই ভেবেছিল। কিন্', 'প্রলয়, মুহম্মদ জাফর ইকবাল', 14, 8, '12.png', '12.png', '12.png', 240, '2023-05-17 05:22:45', 'true'),
(22, 'মতিঝিলে বাঘ', 'মতিঝিলে গভীর রাতে একটি বাঘ ঢুকে পড়েছে, টহলরত পুলিশের একেবারে সামনে দিয়ে। যেনতেন বাঘ নয়, প্রকাণ্ড রয়েল বেঙ্গল টাইগার। সেই বাঘটিকে কিছুতেই আর খুঁজে পাওয়া যায় না। চিড়িয়াখানা থেকেও কোনও বাঘ পালিয়ে যায় নি। সেটা এলো কোথা থেকে? গেল কোথায়? নানা মুনির ন', 'মতিঝিলে বাঘ, মোস্তফা তানিম', 14, 7, '13.png', '13.png', '13.png', 320, '2023-05-17 05:26:07', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `user_orders`
--

CREATE TABLE `user_orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount_due` int(255) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `total_products` int(255) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_orders`
--

INSERT INTO `user_orders` (`order_id`, `user_id`, `amount_due`, `invoice_number`, `total_products`, `order_date`, `order_status`) VALUES
(75, 21, 240, 1667652049, 1, '2023-05-15 08:09:33', 'Complete'),
(76, 21, 230, 2108929414, 1, '2023-05-15 10:41:41', 'Complete'),
(77, 21, 730, 1696099387, 2, '2023-05-16 18:48:32', 'pending'),
(78, 24, 400, 268868816, 2, '2023-05-17 06:17:29', 'pending'),
(79, 24, 760, 1298959688, 1, '2023-05-17 06:20:24', 'pending'),
(80, 24, 650, 1435802383, 1, '2023-05-17 08:24:21', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `user_payments`
--

CREATE TABLE `user_payments` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `invoice_number` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_payments`
--

INSERT INTO `user_payments` (`payment_id`, `order_id`, `invoice_number`, `amount`, `payment_mode`, `date`) VALUES
(6, 73, 1652724648, 230, 'Paypal', '2023-05-15 07:45:21'),
(7, 73, 1652724648, 230, 'Paypal', '2023-05-15 07:50:15'),
(8, 73, 1652724648, 230, 'Paypal', '2023-05-15 07:52:51'),
(9, 74, 122070617, 470, 'Select Payment Option', '2023-05-15 07:56:24'),
(10, 75, 1667652049, 240, 'Select Payment Option', '2023-05-15 08:09:33'),
(11, 75, 1667652049, 240, 'Select Payment Option', '2023-05-15 08:30:33'),
(12, 75, 1667652049, 240, 'Select Payment Option', '2023-05-15 08:46:27'),
(13, 75, 1667652049, 240, 'Select Payment Option', '2023-05-15 08:46:33'),
(14, 76, 2108929414, 230, 'Select Payment Option', '2023-05-15 10:41:41');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_ip` varchar(100) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_contact` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `username`, `user_email`, `user_password`, `user_image`, `user_ip`, `user_address`, `user_contact`) VALUES
(24, 'Ashik', 'ashik@gmail.com', '$2y$10$BhufRIGos/PKFq5.8TnM0ewllut4Sj43yZKVsqVvzf0XRgvsNSfru', ' image3.jpg', '::1', ' Bashundhara R/A, Dhaka', '01737883827'),
(25, 'Maisha', 'maisha@gmail.com', '$2y$10$HOMQj4SMhhsbrQs1xpjiSew1FQri/nQSTp5n2uUlftPCWtN0CBoIO', ' 1111.jpg', '::1', ' Bashundhara R/A', '01700000001');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `orders_pending`
--
ALTER TABLE `orders_pending`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user_orders`
--
ALTER TABLE `user_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `user_payments`
--
ALTER TABLE `user_payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `orders_pending`
--
ALTER TABLE `orders_pending`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user_orders`
--
ALTER TABLE `user_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `user_payments`
--
ALTER TABLE `user_payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
