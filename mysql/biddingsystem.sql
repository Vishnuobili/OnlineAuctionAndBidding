-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2025 at 09:20 AM
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
-- Database: `biddingsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `auctions`
--

CREATE TABLE `auctions` (
  `AuctionID` int(11) NOT NULL,
  `SellerID` int(11) DEFAULT NULL,
  `Title` varchar(255) NOT NULL,
  `Description` text DEFAULT NULL,
  `CategoryID` int(100) DEFAULT NULL,
  `StartPrice` decimal(10,2) DEFAULT NULL,
  `StartTime` datetime DEFAULT NULL,
  `EndTime` datetime DEFAULT NULL,
  `Winner` text DEFAULT NULL,
  `Status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `auctions`
--

INSERT INTO `auctions` (`AuctionID`, `SellerID`, `Title`, `Description`, `CategoryID`, `StartPrice`, `StartTime`, `EndTime`, `Winner`, `Status`) VALUES
(1, 1, 'antique mahogany cabinet auction', 'a beautifully preserved antique mahogany cabinet perfect for collectors or vintage interior lovers.', 8, 2500.00, '2025-04-11 12:00:00', '2025-04-12 16:00:00', NULL, '3'),
(2, 2, 'vintage diamond ring auction', 'an elegant vintage diamond ring set in white gold, ideal for special occasions.', 6, 1000000.00, '2025-04-15 12:00:00', '2025-04-15 18:00:00', NULL, '3'),
(3, 2, 'rare first edition book auction', 'an elegant vintage diamond ring set in white gold, ideal for special occasions.', 7, 5000.00, '2025-04-24 12:00:00', '2025-04-24 18:00:00', NULL, '3'),
(4, 2, 'classic 1967 mustang auction', 'this classic 1967 ford mustang is a must-have for car enthusiasts and collectors.', 3, 50000000.00, '2025-05-07 12:00:00', '2025-05-08 18:00:00', NULL, '3'),
(5, 2, 'modern abstract painting auction', 'own an original modern abstract painting to enhance your space or grow your collection.', 5, 3000.00, '2025-07-01 12:00:00', '2025-07-01 18:00:00', NULL, '3');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `CategoryID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Description` text DEFAULT NULL,
  `ImageURL` varchar(255) DEFAULT NULL,
  `NumberOfItems` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CategoryID`, `Name`, `Description`, `ImageURL`, `NumberOfItems`) VALUES
(1, 'electronics', 'stay ahead of the curve with our electronics category. whether you\'re looking for the latest smartphones, laptops, smartwatches, or gaming consoles, this section is your gateway to cutting-edge tech at unbeatable prices.', 'electronics1744268535.jpg', 0),
(2, 'real estate', 'bid on properties that suit every lifestyle and investment goal. our real estate category includes homes, apartments, commercial properties, and land parcels in prime and developing locations.', 'real estate1744268632.jpg', 0),
(3, 'vehicles', 'from sleek sports cars to rugged trucks and motorcycles, the vehicles category fuels your need for motion. find amazing deals on both new and vintage models, all verified and ready to ride.', 'vehicles1744268663.jpg', 1),
(4, 'antiques', 'step into the past with timeless artifacts in our antiques category. from vintage furniture and classic decor to ancient collectibles, each piece carries a legacy and a unique story for collectors and enthusiasts.', 'antiques1744268729.jpg', 0),
(5, 'art', 'express yourself with stunning artwork from both rising and legendary creators. explore paintings, sculptures, and mixed media that can transform a space or start a conversation.', 'art1744268778.jpg', 1),
(6, 'jewelry', 'elevate your style with dazzling jewelry auctions. browse luxury watches, gold pieces, diamond rings, and heirloom-worthy gems, perfect for gifts or personal indulgence.', 'jewelry1744269012.jpg', 1),
(7, 'books & comics', ' a paradise for collectors and story lovers alike. our books & comics category includes rare first editions, vintage comics, signed novels, and literary treasures from around the world.', 'books & comics1744269027.jpg', 1),
(8, 'furniture', 'add elegance and comfort to your space with furniture auctions. from classic wooden craftsmanship to modern minimalist pieces, we feature items to suit every aesthetic and need.', 'furniture1744269067.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `FeedbackID` int(11) NOT NULL,
  `FromUserID` int(11) DEFAULT NULL,
  `ToUserID` int(11) DEFAULT NULL,
  `AuctionID` int(11) DEFAULT NULL,
  `Rating` int(11) DEFAULT NULL CHECK (`Rating` >= 1 and `Rating` <= 5),
  `Comment` text DEFAULT NULL,
  `Timestamp` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `auctionId` int(11) DEFAULT NULL,
  `Image` text DEFAULT NULL,
  `uploadtimestamp` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `MessageID` int(11) NOT NULL,
  `SenderID` int(11) DEFAULT NULL,
  `AuctionId` int(11) DEFAULT NULL,
  `Body` text DEFAULT NULL,
  `Timestamp` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `PasswordHash` varchar(255) NOT NULL,
  `RegistrationDate` datetime DEFAULT current_timestamp(),
  `Role` varchar(20) DEFAULT NULL,
  `Rating` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `Username`, `Email`, `PasswordHash`, `RegistrationDate`, `Role`, `Rating`) VALUES
(1, 'admin_user', 'admin@example.com', '928685e214fa387530cc8e14d09a1858', '2025-04-01 00:00:00', 'Admin', 5),
(2, 'john_doe', 'john@example.com', '47c7d0987db4e59e2264ce9fefce4977', '2025-04-02 00:00:00', 'User', 4),
(3, 'jane_smith', 'jane@example.com', '47e0df99e1b2d40eb31c2f31bd1dbb07', '2025-04-03 00:00:00', 'User', 4),
(4, 'michael_b', 'michaelb@example.com', '034cf681746c20463dde9986d11fe60f', '2025-04-04 00:00:00', 'User', 5),
(5, 'lucy_l', 'lucy@example.com', '3312962fda5314cadb2c465834bea4b3', '2025-04-05 00:00:00', 'User', 4),
(6, 'david_lee', 'david@example.com', 'b079e37308a66d27e832b78b3ad4a878', '2025-04-06 00:00:00', 'User', 5),
(7, 'nina_r', 'nina@example.com', '49f8a80a543f8137668a8f99ef76407e', '2025-04-07 00:00:00', 'User', 4),
(8, 'chris_k', 'chris@example.com', '818ec63c8c0219b25271d4f736c4c45b', '2025-04-08 00:00:00', 'User', 4),
(9, 'emma_t', 'emma@example.com', '43b1f0f6f9a5ab72d15c9809adfece58', '2025-04-09 00:00:00', 'User', 5),
(10, 'liam_j', 'liam@example.com', 'a6f8f514070888823cfaf6b8b711998b', '2025-04-10 00:00:00', 'User', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auctions`
--
ALTER TABLE `auctions`
  ADD PRIMARY KEY (`AuctionID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CategoryID`),
  ADD UNIQUE KEY `Name` (`Name`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`FeedbackID`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`MessageID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `Username` (`Username`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auctions`
--
ALTER TABLE `auctions`
  MODIFY `AuctionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `FeedbackID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `MessageID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
