-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2026 at 06:40 AM
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
-- Database: `kumul_electronics`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `AdminID` int(11) NOT NULL,
  `Fname` varchar(50) NOT NULL,
  `Lname` varchar(50) NOT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`AdminID`, `Fname`, `Lname`, `Email`, `Password`) VALUES
(1, 'Ako', 'Murray', 'ako@admin.com', 'hashedpassword1'),
(2, 'Eau', 'Mallen', 'eau@admin.com', 'hashedpassword2'),
(3, 'James', 'Kora', 'james@admin.com', 'hashedpassword3');

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `AnsID` int(11) NOT NULL,
  `AnswerText` text NOT NULL,
  `AdminID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`AnsID`, `AnswerText`, `AdminID`) VALUES
(1, 'Yes, the iPhone 15 Pro Max supports MagSafe charging.', 1),
(2, 'The ASUS ROG Strix G16 comes with 16GB RAM and RTX graphics.', 2),
(3, 'Netflix and YouTube are pre-installed on the Sony Bravia TV.', 3);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `CtgID` int(11) NOT NULL,
  `CategoryName` varchar(100) NOT NULL,
  `Description` text DEFAULT NULL,
  `AdminID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`CtgID`, `CategoryName`, `Description`, `AdminID`) VALUES
(1, 'Smartphones', 'Modern smartphones and mobile devices', 1),
(2, 'Computers', 'Gaming laptops and office computers', 2),
(3, 'Electronics', 'TVs, cameras and electronic accessories', 3);

-- --------------------------------------------------------

--
-- Table structure for table `inventorystatus`
--

CREATE TABLE `inventorystatus` (
  `InvID` int(11) NOT NULL,
  `StatusName` varchar(50) NOT NULL,
  `StockCount` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventorystatus`
--

INSERT INTO `inventorystatus` (`InvID`, `StatusName`, `StockCount`) VALUES
(1, 'In Stock', 120),
(2, 'Low Stock', 8),
(3, 'Out of Stock', 0);

-- --------------------------------------------------------

--
-- Table structure for table `productcategories`
--

CREATE TABLE `productcategories` (
  `PID` int(11) NOT NULL,
  `CtgID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `productimage`
--

CREATE TABLE `productimage` (
  `ImgID` int(11) NOT NULL,
  `PID` int(11) DEFAULT NULL,
  `ImgName` varchar(255) DEFAULT NULL,
  `SrcURL` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `productimage`
--

INSERT INTO `productimage` (`ImgID`, `PID`, `ImgName`, `SrcURL`) VALUES
(21, 21, '1.jpg', 'images/1.jpg'),
(22, 22, '2.jpg', 'images/02.jpg'),
(23, 23, '3.jpg', 'images/3.jpg'),
(24, 24, '4.jpg', 'images/4.jpg'),
(25, 25, '5.jpg', 'images/5.jpg'),
(26, 26, '6.jpg', 'images/6.jpg'),
(27, 27, '7.jpg', 'images/7.jpg'),
(28, 28, '8.jpg', 'images/8.jpg'),
(29, 29, '9.jpg', 'images/9.jpg'),
(30, 30, '10.jpg', 'images/10.jpg'),
(31, 31, '11.jpg', 'images/11.jpg'),
(32, 32, '12.jpg', 'images/12.jpg'),
(33, 33, '13.jpg', 'images/13.jpg'),
(34, 34, '14.jpg', 'images/14.jpg'),
(35, 35, '15.jpg', 'images/15.jpg'),
(36, 36, '16.jpg', 'images/16.jpg'),
(37, 37, '17.jpg', 'images/17.jpg'),
(38, 38, '18.jpg', 'images/18.jpg'),
(39, 39, '19.jpg', 'images/19.jpg'),
(40, 40, '20.jpg', 'images/20.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `PID` int(11) NOT NULL,
  `ProductName` varchar(150) NOT NULL,
  `Description` text DEFAULT NULL,
  `Brand` varchar(100) DEFAULT NULL,
  `Price` decimal(10,2) DEFAULT NULL,
  `InvID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`PID`, `ProductName`, `Description`, `Brand`, `Price`, `InvID`) VALUES
(21, 'iPhone 15 Pro Max', 'Latest Apple flagship smartphone with A17 Pro chip', 'Apple', 6999.00, 1),
(22, 'Samsung Galaxy S25 Ultra', 'Premium Android smartphone', 'Samsung', 6499.00, 1),
(23, 'ASUS ROG Strix G16', 'Gaming laptop with RTX graphics', 'ASUS', 9200.00, 2),
(24, 'Dell XPS 15', 'Professional ultrabook laptop', 'Dell', 8700.00, 1),
(25, 'Sony Bravia OLED', '4K Smart TV with HDR', 'Sony', 5400.00, 1),
(26, 'AirPods Pro 2', 'Wireless earbuds with noise cancellation', 'Apple', 1200.00, 2),
(27, 'Logitech MX Master 3S', 'Wireless productivity mouse', 'Logitech', 550.00, 1),
(28, 'Canon EOS R6 Mark II', 'Professional mirrorless camera', 'Canon', 9800.00, 3),
(29, 'HP Spectre x360', '2-in-1 touchscreen laptop', 'HP', 8800.00, 1),
(30, 'ThinkPad X1 Carbon', 'Durable business laptop', 'Lenovo', 9100.00, 1),
(31, 'Surface Pro 9', 'Tablet + laptop hybrid', 'Microsoft', 7800.00, 1),
(32, 'Acer Predator Helios', 'Gaming laptop high performance', 'Acer', 8500.00, 2),
(33, 'Razer Blade 15', 'Slim gaming laptop', 'Razer', 10500.00, 2),
(34, 'Google Pixel 8 Pro', 'AI powered Android phone', 'Google', 6200.00, 1),
(35, 'OnePlus 12', 'Fast smooth smartphone', 'OnePlus', 5800.00, 1),
(36, 'Sony WH-1000XM5', 'Noise cancelling headphones', 'Sony', 1500.00, 2),
(37, 'Bose QuietComfort Ultra', 'Premium headphones', 'Bose', 1600.00, 2),
(38, 'Samsung Tab S9', 'Android tablet AMOLED display', 'Samsung', 4200.00, 1),
(39, 'iPad Pro 12.9', 'Powerful Apple tablet', 'Apple', 9500.00, 1),
(40, 'Nikon Z6 II', 'Professional camera', 'Nikon', 8700.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `QID` int(11) NOT NULL,
  `QuestionText` text NOT NULL,
  `AnsID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`QID`, `QuestionText`, `AnsID`) VALUES
(1, 'Does the iPhone 15 Pro Max support wireless charging?', 1),
(2, 'How much RAM does the ASUS ROG Strix G16 have?', 2),
(3, 'Does the Sony Bravia TV include Netflix?', 3);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `RvwID` int(11) NOT NULL,
  `Rating` int(11) DEFAULT NULL CHECK (`Rating` between 1 and 5),
  `ReviewText` text DEFAULT NULL,
  `ReviewDate` date DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL,
  `PID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `SupplierID` int(11) NOT NULL,
  `SupplierName` varchar(100) NOT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `PhoneNumber` varchar(20) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`SupplierID`, `SupplierName`, `Email`, `PhoneNumber`, `Address`) VALUES
(1, 'Tech Supply PNG', 'techsupply@png.com', '67570001111', 'Port Moresby'),
(2, 'Global Electronics Ltd', 'global@electronics.com', '67571112222', 'Lae'),
(3, 'Pacific Imports', 'pacific@imports.com', '67572223333', 'Madang');

-- --------------------------------------------------------

--
-- Table structure for table `supply`
--

CREATE TABLE `supply` (
  `PID` int(11) NOT NULL,
  `SupplierID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `userquestions`
--

CREATE TABLE `userquestions` (
  `UserID` int(11) NOT NULL,
  `QID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userquestions`
--

INSERT INTO `userquestions` (`UserID`, `QID`) VALUES
(1, 1),
(2, 1),
(3, 2),
(4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Fname` varchar(50) NOT NULL,
  `Lname` varchar(50) NOT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `Username`, `Fname`, `Lname`, `Email`, `Password`) VALUES
(1, 'johnwell', 'John', 'Well', 'john@gmail.com', 'hashedpassword1'),
(2, 'maryian', 'Mary', 'Ian', 'mary@gmail.com', 'hashedpassword2'),
(3, 'davidpeter', 'David', 'Peter', 'david@gmail.com', 'hashedpassword3'),
(4, 'lucyanna', 'Lucy', 'Anna', 'lucy@gmail.com', 'hashedpassword4'),
(7, 'taisenmichael5@gmail.com', 'Taisen', 'Michael', 'taisenmichael5@gmail.com', '0b3204738c9b9664cd2da6b65c23148d'),
(8, 'taisenmarainump', 'Taisen', 'Marainump', 'taisenmarainump9@gmail.com', 'ce27b6ffb72493580e52fda208ac41df');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`AdminID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`AnsID`),
  ADD KEY `AdminID` (`AdminID`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`CtgID`),
  ADD UNIQUE KEY `AdminID` (`AdminID`);

--
-- Indexes for table `inventorystatus`
--
ALTER TABLE `inventorystatus`
  ADD PRIMARY KEY (`InvID`);

--
-- Indexes for table `productcategories`
--
ALTER TABLE `productcategories`
  ADD PRIMARY KEY (`PID`,`CtgID`),
  ADD KEY `CtgID` (`CtgID`);

--
-- Indexes for table `productimage`
--
ALTER TABLE `productimage`
  ADD PRIMARY KEY (`ImgID`),
  ADD KEY `PID` (`PID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`PID`),
  ADD KEY `InvID` (`InvID`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`QID`),
  ADD UNIQUE KEY `AnsID` (`AnsID`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`RvwID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `PID` (`PID`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`SupplierID`);

--
-- Indexes for table `supply`
--
ALTER TABLE `supply`
  ADD PRIMARY KEY (`PID`,`SupplierID`),
  ADD KEY `SupplierID` (`SupplierID`);

--
-- Indexes for table `userquestions`
--
ALTER TABLE `userquestions`
  ADD PRIMARY KEY (`UserID`,`QID`),
  ADD KEY `QID` (`QID`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `AdminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `AnsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `CtgID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `inventorystatus`
--
ALTER TABLE `inventorystatus`
  MODIFY `InvID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `productimage`
--
ALTER TABLE `productimage`
  MODIFY `ImgID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `PID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `QID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `RvwID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `SupplierID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`AdminID`) REFERENCES `admins` (`AdminID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`AdminID`) REFERENCES `admins` (`AdminID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `productcategories`
--
ALTER TABLE `productcategories`
  ADD CONSTRAINT `productcategories_ibfk_1` FOREIGN KEY (`PID`) REFERENCES `products` (`PID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `productcategories_ibfk_2` FOREIGN KEY (`CtgID`) REFERENCES `categories` (`CtgID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `productimage`
--
ALTER TABLE `productimage`
  ADD CONSTRAINT `productimage_ibfk_1` FOREIGN KEY (`PID`) REFERENCES `products` (`PID`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`InvID`) REFERENCES `inventorystatus` (`InvID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`AnsID`) REFERENCES `answers` (`AnsID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`PID`) REFERENCES `products` (`PID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `supply`
--
ALTER TABLE `supply`
  ADD CONSTRAINT `supply_ibfk_1` FOREIGN KEY (`PID`) REFERENCES `products` (`PID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `supply_ibfk_2` FOREIGN KEY (`SupplierID`) REFERENCES `suppliers` (`SupplierID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `userquestions`
--
ALTER TABLE `userquestions`
  ADD CONSTRAINT `userquestions_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `userquestions_ibfk_2` FOREIGN KEY (`QID`) REFERENCES `questions` (`QID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
