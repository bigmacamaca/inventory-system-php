-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2023 at 11:12 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `productinventorystystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `name` varchar(1000) NOT NULL,
  `unit` varchar(1000) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `expiry_date` date NOT NULL,
  `stock` int(255) NOT NULL,
  `cost` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`name`, `unit`, `price`, `expiry_date`, `stock`, `cost`, `image`, `id`) VALUES
('Snickers', '4pcs Per Box', 12.32, '2023-07-01', 2, 24.64, 'SNICKERS®_Bar_1800X1800_transparent.png', 3),
('Eggnog', '18 GS X 10 PCS', 57.25, '2023-06-08', 31, 1774.75, 'eggnog.png', 4),
('Sprite', '6 X 300ml', 120.46, '2023-06-14', 50, 6023.00, 'sprite.png', 6),
('Coca Cola', '6 Pack X 330ml', 250.45, '2024-06-07', 100, 25045.00, 'coca cola.png', 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
