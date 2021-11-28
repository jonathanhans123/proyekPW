-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2021 at 01:49 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proyekpw`
--
CREATE DATABASE IF NOT EXISTS `proyekpw` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `proyekpw`;

-- --------------------------------------------------------

--
-- Table structure for table `discount`
--

DROP TABLE IF EXISTS `discount`;
CREATE TABLE IF NOT EXISTS `discount` (
  `id_discount` int(100) NOT NULL AUTO_INCREMENT,
  `id_item` int(100) NOT NULL,
  `value` int(10) NOT NULL,
  `discount_type` varchar(100) NOT NULL,
  PRIMARY KEY (`id_discount`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `discount`
--

INSERT INTO `discount` (`id_discount`, `id_item`, `value`, `discount_type`) VALUES
(5, 2, 10, 'percentage');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE IF NOT EXISTS `item` (
  `id_item` int(100) NOT NULL AUTO_INCREMENT,
  `item_nama` varchar(100) NOT NULL,
  `item_stock` varchar(100) NOT NULL,
  `item_price` varchar(100) NOT NULL,
  `item_color` varchar(100) NOT NULL,
  `item_desc` varchar(250) NOT NULL,
  `imageurl` varchar(100) NOT NULL,
  `item_size` varchar(100) NOT NULL,
  `item_cate` varchar(100) NOT NULL,
  PRIMARY KEY (`id_item`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id_item`, `item_nama`, `item_stock`, `item_price`, `item_color`, `item_desc`, `imageurl`, `item_size`, `item_cate`) VALUES
(2, 'Vizzano Mina', '100', '299000', 'pink', 'These are Vizzano Mina shoes.', '../upload/Vizzano Mina1.jpg,../upload/Vizzano Mina2.jpg,../upload/Vizzano Mina3.jpg,../upload/Vizzan', '38,39,40', 'Wedges'),
(11, 'New Balance 574 Classic Sneakers', '23', '1599000', 'White and Brown', '- Colour blocked panelled leather sneakers with brand details\r\n- Textile/leather/synthetic upper\r\n- Textile insole\r\n- ENCAP midsole cushioning combines lightweight foam with a durable polyurethane rim to deliver all-day support\r\n- Lightweight EVA foa', '../upload/New Balance 574 Classic Sneakers1.jpg,../upload/New Balance 574 Classic Sneakers2.jpg,../u', '38,39,42,43', 'Sneakers'),
(12, 'New Balance 574 Classic Sneakers', '15', '1599000', 'Cream', '- Colour blocked panelled leather sneakers with brand details\r\n- Textile/leather/synthetic upper\r\n- Textile insole\r\n- ENCAP midsole cushioning combines lightweight foam with a durable polyurethane rim to deliver all-day support\r\n- Lightweight EVA foa', '../upload/New Balance 574 Classic Sneakers1.jpg,../upload/New Balance 574 Classic Sneakers2.jpg,../u', '39,40,41', 'Sneakers'),
(13, 'New Balance 574 Classic Sneakers', '10', '1599000', 'Black', '- Colour blocked panelled leather sneakers with brand details\r\n- Textile/leather/synthetic upper\r\n- Textile insole\r\n- ENCAP midsole cushioning combines lightweight foam with a durable polyurethane rim to deliver all-day support\r\n- Lightweight EVA foa', '../upload/New Balance 574 Classic Sneakers1.jpg,../upload/New Balance 574 Classic Sneakers2.jpg,../u', '38,39,40,42,43,44', 'Sneakers'),
(14, 'New Balance 574 Classic Sneakers', '30', '1599000', 'Black and Brown', '- Colour blocked panelled leather sneakers with brand details\r\n- Textile/leather/synthetic upper\r\n- Textile insole\r\n- ENCAP midsole cushioning combines lightweight foam with a durable polyurethane rim to deliver all-day support\r\n- Lightweight EVA foa', '../upload/New Balance 574 Classic Sneakers1.jpg,../upload/New Balance 574 Classic Sneakers2.jpg,../u', '38,40,41', 'Sneakers'),
(15, 'ADIDAS Originals ZX 2K Flux Sneakers', '15', '1597050', 'Purple', '- adidas originals\n- Best for lifestyle\n- Gradient print sneakers with 3-stripes detail\n- Knit and TPU upper\n- EVA inner\n- Rubber outsole\n- Round toe\n- Lace closure', '../upload/ADIDAS Originals ZX 2K Flux Sneakers1.jpg,../upload/ADIDAS Originals ZX 2K Flux Sneakers2.', '39,41', 'Sneakers'),
(16, 'ADIDAS originals superstar junior sneakers', '15', '1020000', 'Black', '- adidas originals\r\n- Best for lifestyle\r\n- Shelltoe leather sneakers\r\n- Leather upper\r\n- Textile inner\r\n- Molded sockliner\r\n- Rubber outsole\r\n- Round toe\r\n- Lace fastening', '../upload/ADIDAS originals superstar junior sneakers1.jpg,../upload/ADIDAS originals superstar junio', '39,40,41', 'Sneakers'),
(17, 'ADIDAS nite jogger sneakers', '10', '2164050', 'Grey', '- adidas originals\r\n- Best for running\r\n- Reflective lace up sneakers\r\n- Nylon with suede upper\r\n- Textile inner\r\n- Rubber outsole\r\n- Nylon ripstop and mesh upper with suede and 3M Scotchlite reflective overlays\r\n- Responsive Boost midsole', '../upload/ADIDAS nite jogger sneakers1.jpg,../upload/ADIDAS nite jogger sneakers2.jpg,../upload/ADID', '39,40,42', 'Sneakers'),
(19, 'Converse Jack Purcell Gold Standard 1st In Class Ox Sneakers', '3', '943900', 'Black', '- Court-inspired solid shade low top sneakers\r\n- Textile upper\r\n- Textile insole\r\n- OrthoLite insole for comfort\r\n- Rubber outsole\r\n- Round toecap\r\n- Lace up fastening\r\n\r\n#CoreClassic; #JackPurcell', '../upload/Converse Jack Purcell Gold Standard 1st In Class Ox Sneakers1.jpg,../upload/Converse Jack ', '38,39,40,41,42,43,44', 'Sneakers'),
(20, 'Converse Chuck Taylor All Star 70 Core Ox Sneakers', '5', '1099000', 'White', '- Low plain sneakers\r\n- Textile upper\r\n- Textile insole\r\n- Rubber outsole\r\n- Round toe\r\n- Lace up fastening\r\n\r\n#CoreClassic; #Chuck70', '../upload/Converse Chuck Taylor All Star 70 Core Ox Sneakers1.jpg,../upload/Converse Chuck Taylor Al', '39,40,42', 'Sneakers'),
(21, 'Converse Jack Purcell Gold Standard Ox Sneakers', '7', '1177900', 'White', '- Solid tone casual leather sneakers\r\n- Leather upper\r\n- Textile inner\r\n- Rubber outsole\r\n- Round toe\r\n- Lace fastening\r\n\r\n#CoreClassic; #JackPurcell', '../upload/Converse Jack Purcell Gold Standard Ox Sneakers1.jpg,../upload/Converse Jack Purcell Gold ', '38,39,41,42', 'Sneakers'),
(23, 'The North Face Men Thermoball Boot Zip-Up-NF0A4OAI9T3', '10', '1645000', 'Gray', '-OrthoLite® ReBound footbed \r\n-Comfort \r\n-Ultra-warm, \r\n-Waterproof\r\n-Side zipper\r\n-Material: PU-coated leather, 100% recycled P.E.T.', '../upload/The North Face Men Thermoball Boot Zip-Up-NF0A4OAI9T31.jpg,../upload/The North Face Men Th', '39,42', 'Boots'),
(24, 'The North Face Men M Thermoball Boot-NF0A4OAIV75', '14', '1645000', 'Dark Brown', '-Lightweight ThermoBall™ Eco\r\n-Water-resistant\r\n-PU-coated medial zipper for easy on/off\r\n-OrthoLite® Eco LT™ footbed\r\n-Material: 100% recycled PET (non-PFC DWR)', '../upload/The North Face Men M Thermoball Boot-NF0A4OAIV751.jpg,../upload/The North Face Men M Therm', '39,41,42,43', 'Boots'),
(25, 'The North Face Men Thermoball Boot Zip Up Black Grey-NF0A4OAIKZ2', '2', '3290000', 'Black and Gray', '- 100% recycled PET\r\n- Lightweight ThermoBall™ Eco insulation \r\n- Water-resistant\r\n- PU-coated medial zipper \r\n- OrthoLite® Eco LT™ footbed\r\n- UPPER: Waterproof, PU-coated leather upper \r\n- SOLE UNIT: Lightweight, injection-molded, ground-contact EVA', '../upload/The North Face Men Thermoball Boot Zip Up Black Grey-NF0A4OAIKZ21.jpg,../upload/The North ', '38,40,41', 'Boots');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
CREATE TABLE IF NOT EXISTS `order` (
  `id_order` varchar(150) NOT NULL,
  `id_user` varchar(150) NOT NULL,
  `id_sepatu` varchar(150) NOT NULL,
  `harga_total` varchar(150) NOT NULL,
  `tanggal_order` varchar(150) NOT NULL,
  `status` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(10) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_phone` varchar(100) NOT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `user_email` (`user_email`),
  UNIQUE KEY `user_phone` (`user_phone`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `user_name`, `user_password`, `user_email`, `user_phone`) VALUES
(1, 'jonathanhans1234', 'jojo123', 'jojo@gmail.com', 'joji2'),
(2, 'jojojojo', 'jojojojojo', 'jojjojjojoj', 'jojojojojojojojo');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
