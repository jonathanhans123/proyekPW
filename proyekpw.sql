-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2021 at 07:23 AM
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
  `imageurl` varchar(10000) NOT NULL,
  `item_size` varchar(100) NOT NULL,
  `item_cate` varchar(100) NOT NULL,
  PRIMARY KEY (`id_item`)
) ENGINE=InnoDB AUTO_INCREMENT=114 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id_item`, `item_nama`, `item_stock`, `item_price`, `item_color`, `item_desc`, `imageurl`, `item_size`, `item_cate`) VALUES
(11, 'New Balance 574 Classic Sneakers', '23', '1599000', 'White and Brown', '- Colour blocked panelled leather sneakers with brand details\r\n- Textile/leather/synthetic upper\r\n- Textile insole\r\n- ENCAP midsole cushioning combines lightweight foam with a durable polyurethane rim to deliver all-day support\r\n- Lightweight EVA foa', '../upload/New Balance 574 Classic Sneakers1.jpg,../upload/New Balance 574 Classic Sneakers2.jpg,../upload/New Balance 574 Classic Sneakers3.jpg', '38,39,42,43', 'Sneakers'),
(12, 'New Balance 574 Classic Sneakers', '15', '1599000', 'Cream', '- Colour blocked panelled leather sneakers with brand details\r\n- Textile/leather/synthetic upper\r\n- Textile insole\r\n- ENCAP midsole cushioning combines lightweight foam with a durable polyurethane rim to deliver all-day support\r\n- Lightweight EVA foa', '../upload/New Balance 574 Classic Sneakers1.jpg,../upload/New Balance 574 Classic Sneakers2.jpg,../upload/New Balance 574 Classic Sneakers3.jpg', '39,40,41', 'Sneakers'),
(13, 'New Balance 574 Classic Sneakers', '10', '1599000', 'Black', '- Colour blocked panelled leather sneakers with brand details\r\n- Textile/leather/synthetic upper\r\n- Textile insole\r\n- ENCAP midsole cushioning combines lightweight foam with a durable polyurethane rim to deliver all-day support\r\n- Lightweight EVA foa', '../upload/New Balance 574 Classic Sneakers1.jpg,../upload/New Balance 574 Classic Sneakers2.jpg,../upload/New Balance 574 Classic Sneakers3.jpg', '38,39,40,42,43,44', 'Sneakers'),
(14, 'New Balance 574 Classic Sneakers', '30', '1599000', 'Black and Brown', '- Colour blocked panelled leather sneakers with brand details\r\n- Textile/leather/synthetic upper\r\n- Textile insole\r\n- ENCAP midsole cushioning combines lightweight foam with a durable polyurethane rim to deliver all-day support\r\n- Lightweight EVA foa', '../upload/New Balance 574 Classic Sneakers1.jpg,../upload/New Balance 574 Classic Sneakers2.jpg,../upload/New Balance 574 Classic Sneakers3.jpg', '38,40,41', 'Sneakers'),
(15, 'ADIDAS Originals ZX 2K Flux Sneakers', '15', '1597050', 'Purple', '- adidas originals\n- Best for lifestyle\n- Gradient print sneakers with 3-stripes detail\n- Knit and TPU upper\n- EVA inner\n- Rubber outsole\n- Round toe\n- Lace closure', '../upload/ADIDAS Originals ZX 2K Flux Sneakers1.jpg,../upload/ADIDAS Originals ZX 2K Flux Sneakers2.jpg,../upload/ADIDAS Originals ZX 2K Flux Sneakers3.jpg', '39,41', 'Sneakers'),
(16, 'ADIDAS originals superstar junior sneakers', '15', '1020000', 'Black', '- adidas originals\r\n- Best for lifestyle\r\n- Shelltoe leather sneakers\r\n- Leather upper\r\n- Textile inner\r\n- Molded sockliner\r\n- Rubber outsole\r\n- Round toe\r\n- Lace fastening', '../upload/ADIDAS originals superstar junior sneakers1.jpg,../upload/ADIDAS originals superstar junior sneakers2.jpg,../upload/ADIDAS originals superstar junior sneakers3.jpg', '39,40,41', 'Sneakers'),
(17, 'ADIDAS nite jogger sneakers', '10', '2164050', 'Grey', '- adidas originals\r\n- Best for running\r\n- Reflective lace up sneakers\r\n- Nylon with suede upper\r\n- Textile inner\r\n- Rubber outsole\r\n- Nylon ripstop and mesh upper with suede and 3M Scotchlite reflective overlays\r\n- Responsive Boost midsole', '../upload/ADIDAS nite jogger sneakers1.jpg,../upload/ADIDAS nite jogger sneakers2.jpg,../upload/ADIDAS nite jogger sneakers3.jpg', '39,40,42', 'Sneakers'),
(19, 'Converse Jack Purcell Gold Standard 1st In Class Ox Sneakers', '3', '943900', 'Black', '- Court-inspired solid shade low top sneakers\r\n- Textile upper\r\n- Textile insole\r\n- OrthoLite insole for comfort\r\n- Rubber outsole\r\n- Round toecap\r\n- Lace up fastening\r\n\r\n#CoreClassic; #JackPurcell', '../upload/Converse Jack Purcell Gold Standard 1st In Class Ox Sneakers1.jpg,../upload/Converse Jack Purcell Gold Standard 1st In Class Ox Sneakers2.jpg,../upload/Converse Jack Purcell Gold Standard 1st In Class Ox Sneakers3.jpg ', '38,39,40,41,42,43,44', 'Sneakers'),
(20, 'Converse Chuck Taylor All Star 70 Core Ox Sneakers', '5', '1099000', 'White', '- Low plain sneakers\r\n- Textile upper\r\n- Textile insole\r\n- Rubber outsole\r\n- Round toe\r\n- Lace up fastening\r\n\r\n#CoreClassic; #Chuck70', '../upload/Converse Chuck Taylor All Star 70 Core Ox Sneakers1.jpg,../upload/Converse Chuck Taylor All Star 70 Core Ox Sneakers2.jpg,../upload/Converse Chuck Taylor All Star 70 Core Ox Sneakers3.jpg', '39,40,42', 'Sneakers'),
(21, 'Converse Jack Purcell Gold Standard Ox Sneakers', '7', '1177900', 'White', '- Solid tone casual leather sneakers\r\n- Leather upper\r\n- Textile inner\r\n- Rubber outsole\r\n- Round toe\r\n- Lace fastening\r\n\r\n#CoreClassic; #JackPurcell', '../upload/Converse Jack Purcell Gold Standard Ox Sneakers1.jpg,../upload/Converse Jack Purcell Gold Standard Ox Sneakers2.jpg,../upload/Converse Jack Purcell Gold Standard Ox Sneakers3.jpg', '38,39,41,42', 'Sneakers'),
(23, 'The North Face Men Thermoball Boot Zip-Up-NF0A4OAI9T3', '10', '1645000', 'Gray', '-OrthoLite® ReBound footbed \r\n-Comfort \r\n-Ultra-warm, \r\n-Waterproof\r\n-Side zipper\r\n-Material: PU-coated leather, 100% recycled P.E.T.', '../upload/The North Face Men Thermoball Boot Zip-Up-NF0A4OAI9T31.jpg,../upload/The North Face Men Thermoball Boot Zip-Up-NF0A4OAI9T32.jpg,../upload/The North Face Men Thermoball Boot Zip-Up-NF0A4OAI9T33.jpg', '39,42', 'Boots'),
(24, 'The North Face Men M Thermoball Boot-NF0A4OAIV75', '14', '1645000', 'Dark Brown', '-Lightweight ThermoBall™ Eco\r\n-Water-resistant\r\n-PU-coated medial zipper for easy on/off\r\n-OrthoLite® Eco LT™ footbed\r\n-Material: 100% recycled PET (non-PFC DWR)', '../upload/The North Face Men M Thermoball Boot-NF0A4OAIV751.jpg,../upload/The North Face Men M Thermoball Boot-NF0A4OAIV752.jpg,../upload/The North Face Men M Thermoball Boot-NF0A4OAIV753.jpg', '39,41,42,43', 'Boots'),
(25, 'The North Face Men Thermoball Boot Zip Up Black Grey-NF0A4OAIKZ2', '2', '3290000', 'Black and Gray', '- 100% recycled PET\n- Lightweight ThermoBall™ Eco insulation \n- Water-resistant\n- PU-coated medial zipper \n- OrthoLite® Eco LT™ footbed\n- UPPER: Waterproof, PU-coated leather upper \n- SOLE UNIT: Lightweight, injection-molded, ground-contact EVA', '../upload/The North Face Men Thermoball Boot Zip Up Black Grey-NF0A4OAIKZ21.jpg,../upload/The North Face Men Thermoball Boot Zip Up Black Grey-NF0A4OAIKZ22.jpg,../upload/The North Face Men Thermoball Boot Zip Up Black Grey-NF0A4OAIKZ23.jpg', '38,39,40,41,42', 'Boots'),
(26, 'Timberland Men White Ledge Mid Waterproof Ankle Boot', '11', '1294455', 'Black', '100% Leather\r\nImported\r\nRubber sole\r\nOur White Ledge Men Hiking Boots have premium full-grain waterproof leather uppers, seam-sealed waterproof construction, and rustproof speed lace hardware with hooks at top for secure lacing.', '../upload/Timberland Men White Ledge Mid Waterproof Ankle Boot1.jpg,../upload/Timberland Men White Ledge Mid Waterproof Ankle Boot2.jpg,../upload/Timberland Men White Ledge Mid Waterproof Ankle Boot3.jpg', '39,40,42', 'Boots'),
(27, 'Timberland Men Classic Boot Ankle', '10', '2158625', 'Wheat Nubuck', '100% Leather\r\nImported\r\nRubber sole\r\nPlatform measures approximately .05 inches\r\nUpper made with premium leather from an LWG Silver-rated tannery\r\nSeam-sealed construction with rustproof hardware for long-lasting wear\r\n400 Grams Of PrimaLoft insulati', '../upload/Timberland Men Classic Boot Ankle1Wheat Nubuck.jpg,../upload/Timberland Men Classic Boot Ankle2Wheat Nubuck.jpg,../upload/Timberland Men Classic Boot Ankle4Wheat Nubuck.jpg', '38,40,42', 'Boots'),
(28, 'Timberland Men Flume Mid Waterproof Hiking Boot', '15', '1295175', 'Dark Brown', '100% Premium full-grain waterproof leather\r\nImported\r\nRubber sole\r\nBoot opening measures approximately 8 around\r\nPremium full-grain waterproof leather uppers for durability\r\nWaterproof seam-sealed construction keeps feet dry', '../upload/Timberland Men Flume Mid Waterproof Hiking Boot1Dark Brown.jpg,../upload/Timberland Men Flume Mid Waterproof Hiking Boot2Dark Brown.jpg,../upload/Timberland Men Flume Mid Waterproof Hiking Boot3Dark Brown.jpg', '40,41,42', 'Boots'),
(29, 'Timberland 6 Premium Boot', '5', '1599522', 'Burgundy', 'Upper Material - Nubuck\nSole Material - Rubber\nPrimaloft lined\nWaterproof\nEmbroidered logo to side of heel\nBranding to the sole', '../upload/Timberland 6 Premium Boot1Burgundy.jpg,../upload/Timberland 6 Premium Boot2Burgundy.jpg,../upload/Timberland 6 Premium Boot3Burgundy.jpg', '41,43', 'Boots'),
(30, 'Red Wing Heritage Men Classic Moc 6 Boot', '24', '3813426', 'Copper Rough and Tough', '100% Leather\r\nMade in USA\r\nMan Made sole\r\nLeather ankle boot featuring lace-up vamp and contrast-stitched moccasin toe\r\nMost customers buy Red Wing Heritage footwear 1/2 size smaller than their normal size\r\n80-inch Chestnut Leather Lace\r\nStyle No. 19', '../upload/Red Wing Heritage Men Classic Moc 6 Boot1Copper Rough and Tough.jpg,../upload/Red Wing Heritage Men Classic Moc 6 Boot2Copper Rough and Tough.jpg,../upload/Red Wing Heritage Men Classic Moc 6 Boot3Copper Rough and Tough.jpg', '38,39,40', 'Boots'),
(31, 'Red Wing Men Iron Ranger 6 Boot', '10', '4605066', 'Amber Harness', '100% Leather\r\nMade in USA\r\nNitrile Cork sole\r\nThe product is natural leather and its easy for scuffs to happen but they rub out.This can be removed by a soft dry cloth and lightly buffed out the scuffs.\r\nMany customers size down ½ to 1 full size.', '../upload/Red Wing Men Iron Ranger 6 Boot1Amber Harness.jpg,../upload/Red Wing Men Iron Ranger 6 Boot2Amber Harness.jpg,../upload/Red Wing Men Iron Ranger 6 Boot3Amber Harness.jpg', '38,40,42', 'Boots'),
(32, 'Red Wing Heritage Men Blacksmith Vibram Boot', '10', '4604922', 'Copper Rough and Tough', '100% Leather\r\nMade in US\r\nMan Made sole\r\nLeather ankle boot featuring classic round toe styling with triple stitched quality and Goodyear welt construction\r\nStyle No. 3343,Shank: Steel\r\nVibram 430 Mini-lug outsole', '../upload/Red Wing Heritage Men Blacksmith Vibram Boot1Copper Rough and Tough.jpg,../upload/Red Wing Heritage Men Blacksmith Vibram Boot2Copper Rough and Tough.jpg../upload/Red Wing Heritage Men Blacksmith Vibram Boot3Copper Rough and Tough.jpg', '38,39,42', ''),
(33, 'ADIDAS nizza rf slip shoes', '15', '1000000', 'Black', '- adidas originals\r\n- Slip on sneakers nuansa monokrom untuk effortless urban\r\n- Warna core black (hitam)\r\n- Upper kanvas\r\n- Insole tekstil\r\n- Rubber outsole\r\n- Side gusset elastis\r\n- Round toe\r\n- Produk unisex', '../upload/ADIDAS nizza rf slip shoes1Black.jpg,../upload/ADIDAS nizza rf slip shoes2Black.jpg,../upl', '39,40,42', 'Slip-on'),
(34, 'ADIDAS 3MC Slip x Disney Sport Goofy Shoes', '5', '1199999', 'Cream', '- Sepatu model laid-back yang cocok untuk jalan maupun sepatu harian.\r\n- Slip-on construction, Suede upper, Abrasion-resistance Adituff toe, Skate-inspired shoes with a disney print, Grippy, Flexible geoflex tread.\r\n- Persediaan Terbatas', '../upload/3MC Slip x Disney Sport Goofy Shoes1Cream.jpg,../upload/3MC Slip x Disney Sport Goofy Shoe', '39,41', 'Slip-on'),
(35, 'ADIDAS Originals womens Superstar Slip-On Shoes', '16', '2445722', 'Black/White/Gold Metallic', '100% Nylon\r\nRubber sole\r\nadidas Originals female sneaker\r\nAdidas is the original sports brand, Driven by innovation and a bias to action. We are creators, makers and doers\r\nNo matter how serious you are about sports – a sporting Lifestyle does not en', '../upload/ADIDAS Originals womens Superstar Slip-On Shoes1Black/White/Gold Metallic.jpg,../upload/AD', '39,41,42', 'Slip-on'),
(36, 'Vans Classic Slip-On', '10', '999000', 'Black and Red', '- Slip on sneakers dengan detail motif kombinasi yang modern\r\n- Multiwarna\r\n- Kanvas upper\r\n- Insole tekstil\r\n- Rubber outsole\r\n- Side gusset elastis\r\n- Round toe', '../upload/Vans Classic Slip-On1Black and Red.jpg,../upload/Vans Classic Slip-On2Black and Red.jpg,..', '38,40', 'Slip-on'),
(37, 'Vans Classic Slip-On 98 Dx', '5', '1099000', 'Checkboard', '- Slip-on sneakers dengan detail chekerboard print yang ikonik\r\n- Kombinasi warna hitam dan putih\r\n- Upper kanvas\r\n- Insole tekstil\r\n- Rubber outsole\r\n- Detail padding pada bagian collar untuk kenyamanan\r\n- Side gusset elastis\r\n- Round toe\r\n- Produk ', '../upload/Vans Classic Slip-On 98 Dx1Checkboard.jpg,../upload/Vans Classic Slip-On 98 Dx2Checkboard.', '39,40,42', 'Slip-on'),
(38, 'Vans Comfycush Slip-On', '15', '1229000', 'Green', '- Slip on yang nyaman dan effortless untuk beraktivitas outdoor\r\n- Warna hijau\r\n- Upper tekstil\r\n- Insole tekstil\r\n- Dengan teknologi ComfyCush untuk cushioning yang ringan dan nyaman\r\n- Rubber outsole\r\n- Round toe\r\n- Produk unisex', '../upload/Vans Comfycush Slip-On1Green.jpg,../upload/Vans Comfycush Slip-On2Green.jpg,../upload/Vans', '39,40,42', 'Slip-on'),
(39, 'Vans Ua Comfycush Slip-On', '10', '1149000', 'Black', '- Slip on desain all black bernuansa klasik\r\n- Warna hitam\r\n- Upper kanvas\r\n- Insole sintetis\r\n- Rubber outsole\r\n- Round toe\r\n- Produk unisex', '../upload/Vans Ua Comfycush Slip-On1Black.jpg,../upload/Vans Ua Comfycush Slip-On2Black.jpg,../uploa', '39,41,42', 'Slip-on'),
(40, 'Rubi HOLLY SLIP ON', '10', '199.900', 'White', '- Sneakers. The hero of any casual look\n- Shock absorbing, rubber-like EVA sole\n- Easy slip-on design\n- Available in a variety of textures and looks\n- Casual yet stylish', '../upload/Rubi HOLLY SLIP ON1White.jpg,../upload/Rubi HOLLY SLIP ON2White.jpg,../upload/Rubi HOLLY S', '41', 'Slip-on'),
(41, 'Rubi HOLLY SLIP ON', '10', '199.900', 'White', '- Sneakers. The hero of any casual look\n- Shock absorbing, rubber-like EVA sole\n- Easy slip-on design\n- Available in a variety of textures and looks\n- Casual yet stylish', '../upload/Rubi HOLLY SLIP ON1Black.jpg,../upload/Rubi HOLLY SLIP ON2Black.jpg,../upload/Rubi HOLLY S', '41', 'Slip-on'),
(42, 'Rubi PEYTON SLIP ON', '11', '199900', 'Black', '- PETA vegan Approved\r\n- everyday slip on\r\n- on trend OUTSOLE design\r\n- Comfortable Padded sole', '../upload/Rubi PEYTON SLIP ON1Black.jpg,../upload/Rubi PEYTON SLIP ON2Black.jpg,../upload/Rubi PEYTO', '38,39,44', 'Slip-on'),
(43, 'Columbia Men Redmond V2 Waterproof Hiking Boot', '10', '2629349', 'Peeble/Sun Desert', '- 100% Leather and Textile\r\n- Imported\r\n- Rubber sole\r\n- Shaft measures approximately low-top from arch\r\n- ADVANCED TECHNOLOGY\r\n- DURABLE HIKING SHOE\r\n- ALL TERRAIN TRACTION\r\n- HANDY FEATURES\r\n- REINFORCED TOE AND HEEL CONSTRUCTION', '../upload/Columbia Men Redmond V2 Waterproof Hiking Boot1Peeble/Sun Desert.jpg,../upload/Columbia Me', '38,39,41,44', 'Hiking'),
(44, 'Columbia Men Newton Ridge Plus Ii Suede Waterproof Hiking Shoe', '10', '1031247', 'Shark/Black', '- Leather and Synthetic\r\n- Imported\r\n- Rubber sole\r\n- ADVANCED TECHNOLOGY: This Columbia Men Newton Ridge Plus II Waterproof hiking boot features Techlite lightweight midsole for long lasting comfort, and superior cushioning.', '../upload/Columbia Men Newton Ridge Plus Ii Suede Waterproof Hiking Shoe1Shark/Black.jpg,../upload/C', '38,40,41,44', 'Hiking'),
(45, 'Columbia Women Newton Ridge Plus Hiking Boot', '13', '3425018', 'Light Brown/Cyber Purple', 'Imported\r\nRubber sole\r\nShaft measures approximately ankle-high from arch\r\nPlatform measures approximately 1 inches inches inches\r\nADVANCED TECHNOLOGY: Columbia Women Newton Ridge Plus Waterproof Hiking Boot features our lightweight.', '../upload/Columbia Women Newton Ridge Plus Hiking Boot1Light Brown/Cyber Purple.jpg,../upload/Columb', '38,39,40', 'Hiking'),
(46, 'Merrell Men Moab 2 Vent Hiking Shoe', '12', '3648076', 'Walnut', '- Suede leather, mesh\r\n- Imported\r\n- Manmade sole\r\n- Performance suede leather and mesh upper\r\n- Bellows, closed-cell foam tongue keeps moisture and debris out\r\n- Protective rubber toe cap\r\n- Breathable mesh lining. 5mm lug depth\r\nVibram TC5-plus sol', '../upload/Merrell Men Moab 2 Vent Hiking Shoe1Walnut.jpg,../upload/Merrell Men Moab 2 Vent Hiking Sh', '38,40,41,42,44', 'Hiking'),
(47, 'ADIDAS Terrex Swift R3 Gore-TEX Hiking Shoes', '10', '1508015', 'Focus Olive/Core Black/Grey Five', 'Made in the USA or Imported\r\n', '../upload/ADIDAS Terrex Swift R3 Gore-TEX Hiking Shoes1Focus Olive/Core Black/Grey Five.jpg,../uploa', '40,42,44', 'Hiking'),
(48, 'ADIDAS Men Terrex Trailmaker Gore-tex Hiking Walking Shoe', '10', '1095430', 'Core Black/Core Black/Dark Grey Heather', 'Rubber sole\r\nadidas Adult Walking Shoe', '../upload/ADIDAS Men Terrex Trailmaker Gore-tex Hiking Walking Shoe1Core Black/Core Black/Dark Grey ', '39,41,43,44', 'Hiking'),
(49, 'ADIDAS Men Terrex Eastrail Hiking Shoes', '10', '2014572', 'Carbon/Black/Grey Five', '100% Textile Synthetics\r\nRubber sole\r\nMen hiking shoes with cushioning and traction for rugged terrain\r\nRegular fit; Weight: 350 g (size 9)\r\nMesh and synthetic upper is soft and durable\r\nEVA midsole for lightweight cushioning\r\nTraxion outsole for opt', '../upload/ADIDAS Men Terrex Eastrail Hiking Shoes1Carbon/Black/Grey Five.jpg,../upload/ADIDAS Men Te', '38,39,41,44', 'Hiking'),
(50, 'ADIDAS Men Terrex Free Hiker Hiking Boot', '11', '2414062', 'Core Black/Carbon/White', 'Synthetic-and-mesh\r\nImported\r\nRubber sole\r\nMale terrex free hiker\r\nThe adidas brand has a long history and deep-rooted Connection with sport.', '../upload/ADIDAS Men Terrex Free Hiker Hiking Boot1Core Black/Carbon/White.jpg,../upload/ADIDAS Men ', '38,40,43,44', 'Hiking'),
(51, 'Clarks Men Tilden Cap Oxford Shoe', '20', '2095593', 'Black Leather', '100% Leather\r\nImported\r\nThermoplastic Elastomers sole\r\nThese smart men shoes with a square cap toe toe are crafted from a premium leather\r\nStretch Gore Panels for a Flexible Fit\r\nOrtholite footbed that softens impact and wicks away moisture', '../upload/Clarks Men Tilden Cap Oxford Shoe1Black Leather.jpg,../upload/Clarks Men Tilden Cap Oxford', '39,40,42,43', 'Oxford'),
(52, 'Clarks Men Tilden Walk Oxford', '10', '2518971', 'Dark Tan Leather', '100% Leather\r\nImported\r\nSynthetic sole\r\nA shoe designed to take on the Monday through Friday grind\r\nStretch Gore Panels for a Flexible Fit\r\nOrtholite footbed that softens impact and wicks away moisture', '../upload/Clarks Men Tilden Walk Oxford1Dark Tan Leather.jpg,../upload/Clarks Men Tilden Walk Oxford', '38,40,42,44', 'Oxford'),
(53, 'Clarks Men Touareg Vibe Oxford', '12', '1883904', 'Black Leather', '100% Leather\r\nImported\r\nSynthetic sole\r\nEasy care leather\r\nFlexible sole\r\nNon-marking outsole. PU Sole Material\r\nbreathable leather\r\ncomfort footbed', '../upload/Clarks Men Touareg Vibe Oxford1Black Leather.jpg,../upload/Clarks Men Touareg Vibe Oxford2', '40,42,44', 'Oxford'),
(54, 'Clarks Men Whiddon Cap Oxford', '13', '2231154', 'Dark Tan Leather', 'fabric-and-synthetic\r\nImported\r\nRubber sole\r\nClarks Whiddon Cap lace-up oxford\r\nLeather upper\r\nRemovable Ortholite footbed that softens impact and wicks away moisture\r\nSynthetic sole is soft, flexible, and durable', '../upload/Clarks Men Whiddon Cap Oxford1Dark Tan Leather.jpg,../upload/Clarks Men Whiddon Cap Oxford', '38,39,40,42', 'Oxford'),
(55, 'Eastland Women Sadie Oxford', '11', '2434353', 'Black/White', '100% Leather\r\nImported\r\nRubber sole\r\nHeel Height is 6/8 inch', '../upload/Eastland Women Sadie Oxford1Black/White.jpg,../upload/Eastland Women Sadie Oxford2Black/Wh', '39,40,41,43', 'Oxford'),
(56, 'Eastland Women Plainview', '12', '2466876', 'Black', '100% Leather\r\nPlatform measures approximately 0.75 inches\r\nFull-grain leather upper\r\nRemovable insole\r\nPolyurethane outsole\r\nFabric', '../upload/Eastland Women Plainview1Black.jpg,../upload/Eastland Women Plainview2Black.jpg,../upload/', '38,39,40,42', 'Oxford'),
(57, 'Eastland Men Plainview Oxford', '5', '956702', 'Black', '100% Leather\r\nManmade sole\r\nLeather upper\r\nRemovable cushioned insole\r\nFabric knit lining\r\nPolyurethane sole', '../upload/Eastland Men Plainview Oxford1Black.jpg,../upload/Eastland Men Plainview Oxford2Black.jpg,', '39,41,43,44', 'Oxford'),
(58, 'Cole Haan Men Original grand Cloudfeel Energy Merid Sw Oxford', '5', '1062043', 'British Tan Full Grain', 'Made in USA or Imported\r\nRubber sole\r\nOxford with wingtip upper pattern in rich leather\r\nLined in moisture-wicking textile\r\nREBOUND TECHNOLOGY - engineered fusion of Cole Haan Rebound cushioning compound and Grandfoam.', '../upload/Cole Haan Men Original grand Cloudfeel Energy Merid Sw Oxford1British Tan Full Grain.jpg,.', '38,39,40,42,44', 'Oxford'),
(59, 'Cole Haan Men Lenox Hill Cap Oxford', '10', '1007070', 'British Tan', '100% Leather\r\nImported\r\nRubber sole\r\nShaft measures approximately low-top from arch\r\nClassic lace-up oxford featuring blind eyelets and cap toe\r\nStacked heel', '../upload/Cole Haan Men Lenox Hill Cap Oxford1British Tan.jpg,../upload/Cole Haan Men Lenox Hill Cap', '38,40,41,44', 'Oxford'),
(60, 'Cole Haan Men Zerogrand Stitchlite Wingtip Oxford', '7', '4632984', 'Marine/Ivory', '100% Synthetic\r\nImported\r\nRubber sole\r\nShaft measures approximately low-top from arch\r\nRipstop and nylon upper\r\nNatural storm welt\r\nEVA midsole with rubber outsole\r\nCole Haan Grand OS technology for ultimate comfort', '../upload/Cole Haan Men Zerogrand Stitchlite Wingtip Oxford1Marine/Ivory.jpg,../upload/Cole Haan Men', '38,39,41,43,44', 'Oxford'),
(61, 'Cole Haan Men Zerogrand Stitchlite Wingtip Oxford', '10', '4632984', 'Ironstone/Ivory', '100% Synthetic\r\nImported\r\nRubber sole\r\nShaft measures approximately low-top from arch\r\nRipstop and nylon upper\r\nNatural storm welt\r\nEVA midsole with rubber outsole\r\nCole Haan Grand OS technology for ultimate comfort', '../upload/Cole Haan Men Zerogrand Stitchlite Wingtip Oxford1Ironstone/Ivory.jpg,../upload/Cole Haan ', '40,41,42,44', 'Oxford'),
(62, 'Vizzano Jiwoo', '10', '795000', 'Begie', '- Wedges detail statementable embellishment bergaya chic\n- Warna krem\n- Upper sintetis\n- Insole sintetis\n- Rubber outsole\n- Round toe', '../upload/Vizzano Jiwoo1Begie.jpg,../upload/Vizzano Jiwoo2Begie.jpg,../upload/Vizzano Jiwoo3Begie.jpg', '38,39,40', 'Wedges'),
(63, 'Vizzano Minna', '11', '807000', 'Begie', 'Upper Material : Sintetis\nInsole Material : Sintetis\nOutsole Material : Rubber\nKondisi 100% BARU\nSize Chart :\n38: 24.5 cm\n39: 25 cm\n40: 25.5 cm', '../upload/Vizzano Minna1Begie.jpg,../upload/Vizzano Minna2Begie.jpg,../upload/Vizzano Minna3Begie.jpg', '38,39,40,42', 'Wedges'),
(64, 'Vizzano Micha', '10', '595.000', 'Yellow', '- Warna kuning\n- Upper sintetis\n- Insole sintetis\n- Rubber outsole\n- Tinggi wedges: 4cm\n- Adjustable pin buckle strap\n- Pointed toe', '../upload/Vizzano Micha1Yellow.jpg,../upload/Vizzano Micha2Yellow.jpg,../upload/Vizzano Micha3Yellow.jpg', '40,42', 'Wedges'),
(65, 'Hush Puppies Odell Ornament Pump', '11', '1799000', 'Brown', '- Sepatu wedge klasik detail debossed logo\n- Warna cokelat\n- Leather upper\n- Leather insole\n- Rubber outsole\n- Tinggi wedge: 6cm\n- Almond toe', '../upload/Hush Puppies Odell Ornament Pump1Brown.jpg,../upload/Hush Puppies Odell Ornament Pump2Brown.jpg,../upload/Hush Puppies Odell Ornament Pump3Brown.jpg', '38,39,41,42', 'Wedges'),
(66, 'Hush Puppies Camila', '7', '699000', 'Black', '- Sepatu bergaya feminine chic dengan desain sleek\n- Warna hitam\n- PVC upper\n- PVC insole\n- Rubber outsole\n- Adjustable ankle strap\n- Pointed toe', '../upload/Hush Puppies Camila1Black.jpg,../upload/Hush Puppies Camila2Black.jpg,../upload/Hush Puppies Camila3Black.jpg', '38,39,40,41', 'Wedges'),
(67, 'Hush Puppies Monza', '9', '1599000', 'Black', '- Wedges tekstur kulit nuansa monokrom\n- Warna hitam\n- Leather upper\n- Leather insole\n- Rubber outsole\n- Tinggi wedges: 9cm\n- Peep toe', '../upload/Hush Puppies Monza1Black.jpg,../upload/Hush Puppies Monza2Black.jpg,../upload/Hush Puppies Monza3Black.jpg', '38,39,40,42', 'Wedges'),
(68, 'PAYLESS Dexflex Womens Karlile', '9', '399000', 'Black', 'Dexflex Womens Karlile - BLACK Breathable women shoe with soft lining, foam insole and durable outsole\n\n', '../upload/PAYLESS Dexflex Womens Karlile1Black.jpg,../upload/PAYLESS Dexflex Womens Karlile2Black.jpg,../upload/PAYLESS Dexflex Womens Karlile3Black.jpg', '38,39,40,42', 'Wedges'),
(69, 'PAYLESS Dexflex Womens Karlile', '9', '399000', 'Black', 'Dexflex Womens Karlile - BLACK Breathable women shoe with soft lining, foam insole and durable outsole\n\n', '../upload/PAYLESS Dexflex Womens Karlile1Begie.jpg,../upload/PAYLESS Dexflex Womens Karlile2Begie.jpg,../upload/PAYLESS Dexflex Womens Karlile3Begie.jpg', '38,39,40,42', 'Wedges'),
(70, 'STACCATO SC7 SM20 W Z1055 BLACK', '8', '1399000', 'Black', 'Wedges Sandals\nUpper Material: Mesh / Fabric\nlining material: Sheep\nSole material: Rubber\n\nSize Disclaimer:\nThere may be a 1-2cm difference in measurements depending on the development and manufacturing process.', '../upload/STACCATO SC7 SM20 W Z1055 BLACK1Black.jpg,../upload/STACCATO SC7 SM20 W Z1055 BLACK2Black.jpg,../upload/STACCATO SC7 SM20 W Z1055 BLACK3Black.jpg', '38,39,40,42', 'Wedges'),
(71, 'Obermain Nava Dericka - Slide', '6', '1499000', 'Begie', '- Sandal wedges untuk tampilan feminin yang stylish\n- Warna beige\n- Leather upper\n- Leather insole\n- Rubber outsole\n- Open toe', '../upload/Obermain Nava Dericka - Slide1Begie.jpg,../upload/Obermain Nava Dericka - Slide2Begie.jpg,../upload/Obermain Nava Dericka - Slide3Begie.jpg', '38,39,41,43', 'Wedges'),
(72, 'PAYLESS Fioni Women Lucre Lucite Pointy High Heel', '10', '399000', 'Black', 'Fioni Women Lucre Lucite Pointy High Heel - Black smooth lining with a soft sole and durable outsole, equipped with comfortable heels, adjustable straps make it easy for you to walk comfortably', '../upload/PAYLESS Fioni Women Lucre Lucite Pointy High Heel1Black.jpg,../upload/PAYLESS Fioni Women Lucre Lucite Pointy High Heel2Black.jpg,../upload/PAYLESS Fioni Women Lucre Lucite Pointy High Heel3Black.jpg', '38,39,40,42', 'High-heels'),
(73, 'PAYLESS Fioni Women Haha Pointy High Heel Pump', '8', '359000', 'Black', 'Fioni Women Haha Pointy High Heel Pump - Black smooth lining with a soft sole and durable outsole, equipped with comfortable heels, adjustable straps make it easy for you to walk comfortably', '../upload/PAYLESS Fioni Women Haha Pointy High Heel Pump1Black.jpg,../upload/PAYLESS Fioni Women Haha Pointy High Heel Pump2Black.jpg,../upload/PAYLESS Fioni Women Haha Pointy High Heel Pump3Black.jpg', '38,39,41,42', 'High-heels'),
(74, 'ALDO Amenabar Tie Up Stiletto Heels', '5', '1889000', 'Brown', '- Solid tone lace up faux suede heels \n- Textile and synthetic upper\n- Leather insole\n- Synthetic outsole\n- Heel height: 11.5cm\n- Lace up fastening', '../upload/ALDO Amenabar Tie Up Stiletto Heels1Brown.jpg,../upload/ALDO Amenabar Tie Up Stiletto Heels2Brown.jpg,../upload/ALDO Amenabar Tie Up Stiletto Heels3Brown.jpg', '38,39,41', 'High-heels'),
(75, 'ALDO Sepatu Wanita GLASSSLIPPER', '1', '1199000', 'Light Blue', 'Disney x ALDO | Cinderella CollectionStep ke sandal gelas Anda sendiri. dongeng ini terinspirasi pompa transparan dengan halus rincian warni dan jelas tali pergelangan kaki akan menginspirasi keajaiban di dalam kamu', '../upload/ALDO Sepatu Wanita GLASSSLIPPER1Light Blue.jpg,../upload/ALDO Sepatu Wanita GLASSSLIPPER2Light Blue.jpg,../upload/ALDO Sepatu Wanita GLASSSLIPPER3Light Blue.jpg', '38,39,40', 'High-heels'),
(76, 'ALDO Scarlett Platform Stiletto Heels', '3', '2199000', 'Dark Brown', '- Perspex strap platform stiletto heels\n- Polyurethane and TPU upper\n- Synthetic insole\n- Synthetic outsole\n- Heel height: 12cm\n- Adjustable pin buckle ankle strap fastening', '../upload/ALDO Scarlett Platform Stiletto Heels1Dark Brown.jpg,../upload/ALDO Scarlett Platform Stiletto Heels2Dark Brown.jpg,../upload/ALDO Scarlett Platform Stiletto Heels3Dark Brown.jpg', '38,39,40,42', 'High-heels'),
(77, 'London Rag Black Clear Detail Sling-back Stiletto Sandal', '5', '696150', 'Black and Begie', 'Quite a treat to feet: stylish pointed heel sandal with clear detail in croc textured PU with pointed toe cap. \nUpper material: Croc Polyurethane\nLining Material: Polyurethane\nOuter sole: TPR \nQuality Insole\nClosed Pointed Toe', '../upload/London Rag Black Clear Detail Sling-back Stiletto Sandal1Black and Begie.jpg,../upload/London Rag Black Clear Detail Sling-back Stiletto Sandal2Black and Begie.jpg,../upload/London Rag Black Clear Detail Sling-back Stiletto Sandal3Black and Begie.jpg', '38,39', 'High-heels'),
(78, 'London Rag Patent PU Slip on Stiletto', '3', '960149', 'Black and Red', 'In color blocked pattern – the high heeled stiletto dress shoe is a perfect shoe for the evening. Comes in two color options to choose from – the stylish heels definitely deserve some room in wardrobe.\nUpper Material: Patent PU ', '../upload/London Rag Patent PU Slip on Stiletto1Black and Red.jpg,../upload/London Rag Patent PU Slip on Stiletto2Black and Red.jpg,../upload/London Rag Patent PU Slip on Stiletto3Black and Red.jpg', '38,39', 'High-heels'),
(79, 'London Rag Tiara Clear Stiletto Sling-back', '3', '1256149', 'Black', 'You are one queen and let this tiara styled jeweled stiletto put it clear. Absolute stunner and party wear, this peep – toe shoe is!\nUpper material: Thermoplastic Polyurethane\nLining Material: Synthetic\nOuter sole: Rubber', '../upload/London Rag Tiara Clear Stiletto Sling-back1Black.jpg,../upload/London Rag Tiara Clear Stiletto Sling-back2Black.jpg,../upload/London Rag Tiara Clear Stiletto Sling-back3Black.jpg', '38,39,41', 'High-heels'),
(80, 'London Rag Suede Stiletto Sling-back Sandal', '4', '1034149', 'Black', 'Braided Suede straps that settle on feet elegantly, this pair of stilettos keep all your formal dates sorted.\r\nUpper material: Polyurethane\r\nLining Material: Synthetic\r\nOuter sole: Rubber \r\nHeel Height: \r\nSling-back Design\r\nOpen Square Toe\r\nSlip-On S', '../upload/London Rag Suede Stiletto Sling-back Sandal1Black.jpg,../upload/London Rag Suede Stiletto Sling-back Sandal2Black.jpg,../upload/London Rag Suede Stiletto Sling-back Sandal3Black.jpg', '38,39,41,42', 'High-heels'),
(81, 'MANGO Asymmetric Stiletto Shoes', '2', '799000', 'Wine', 'Soft finish.\r\nAsymmetric design.\r\nSide slit.\r\nPointed.\r\nStiletto heel. 9.5 cm heel.\r\nParty collection.', '../upload/MANGO Asymmetric Stiletto Shoes1Wine.jpg,../upload/MANGO Asymmetric Stiletto Shoes2Wine.jpg,../upload/MANGO Asymmetric Stiletto Shoes3Wine.jpg', '38,39,41,42', 'High-heels'),
(83, 'WaterMonkey Men Casual Skateboarding Shoes High Top Sneakers Sports Shoes Men Outdoor Breathable Wal', '5', '757092', 'Black and Red', 'SKU : 32945989130\r\nGender : Men \r\nHeel Type : Flat \r\nOutsole Material : Rubber \r\nInsole Material : EVA \r\nClosure Type : Lace-Up \r\nSports Type : FINALE EVO \r\nAthletic Shoe Type : Skateboarding Shoes \r\nElements : Thread \r\nApplicable Place : Hard Court', '../upload/WaterMonkey Men Casual Skateboarding Shoes High Top Sneakers Sports Shoes Men Outdoor Breathable Walking Shoes Street Shoes Chaussure Homme1Black and Red.jpg,../upload/WaterMonkey Men Casual Skateboarding Shoes High Top Sneakers Sports Shoes Men Outdoor Breathable Walking Shoes Street Shoes Chaussure Homme2Black and Red.jpg,../upload/WaterMonkey Men Casual Skateboarding Shoes High Top Sneakers Sports Shoes Men Outdoor Breathable Walking Shoes Street Shoes Chaussure Homme3Black and Red.jpg', '41,42,43,44', 'Sneakers'),
(84, 'WaterMonkey Men Casual Skateboarding Shoes High Top Sneakers Sports Shoes Men Outdoor Breathable Wal', '5', '757092', 'Black and White', 'SKU : 32945989130\r\nGender : Men \r\nHeel Type : Flat \r\nOutsole Material : Rubber \r\nInsole Material : EVA \r\nClosure Type : Lace-Up \r\nSports Type : FINALE EVO \r\nAthletic Shoe Type : Skateboarding Shoes \r\nElements : Thread \r\nApplicable Place : Hard Court ', '../upload/WaterMonkey Men Casual Skateboarding Shoes High Top Sneakers Sports Shoes Men Outdoor Breathable Walking Shoes Street Shoes Chaussure Homme1Black and White.jpg,../upload/WaterMonkey Men Casual Skateboarding Shoes High Top Sneakers Sports Shoes Men Outdoor Breathable Walking Shoes Street Shoes Chaussure Homme2Black and White.jpg,../upload/WaterMonkey Men Casual Skateboarding Shoes High Top Sneakers Sports Shoes Men Outdoor Breathable Walking Shoes Street Shoes Chaussure Homme3Black and White.jpg', '41,42,43,44', 'High-Tops'),
(85, 'Sepatu High Top Kasual Cowok', '10', '257500', 'Black', '• Berbahan 100% kulit sapi full grain berkualitas maksimal\r\nToleransi ukuran tiap size : ± 0.25 cm\r\nSize 39 Fit to  : 24 cm \r\nSize 40 Fit to  : 25 cm \r\nSize 41 Fit to  : 26 cm \r\nSize 42 Fit to  : 27 cm \r\nSize 43 Fit to  : 28 cm ', '../upload/Sepatu High Top Kasual Cowok1Black.jpg,../upload/Sepatu High Top Kasual Cowok2Black.jpg,../upload/Sepatu High Top Kasual Cowok3Black.jpg', '39,40,41,42,43', 'High-Tops'),
(86, 'Sepatu High Top Kasual Cowok', '5', '257500', 'Brown', '• Berbahan 100% kulit sapi full grain berkualitas maksimal\r\nToleransi ukuran tiap size : ± 0.25 cm\r\nSize 39 Fit to  : 24 cm \r\nSize 40 Fit to  : 25 cm \r\nSize 41 Fit to  : 26 cm \r\nSize 42 Fit to  : 27 cm \r\nSize 43 Fit to  : 28 cm ', '../upload/Sepatu High Top Kasual Cowok1Brown.jpg,../upload/Sepatu High Top Kasual Cowok2Brown.jpg,../upload/Sepatu High Top Kasual Cowok3Brown.jpg', '39,40,41,42,43', 'High-Tops'),
(87, 'ALDO Masari Sneakers', '3', '2099000', 'Black', '- High top sneakers with croc panels and accent buckles\r\n- Polyurethane upper\r\n- Polyester inner\r\n- Rubber outsole\r\n- Lace up fastening', '../upload/ALDO Masari Sneakers1Black.jpg,../upload/ALDO Masari Sneakers2Black.jpg,../upload/ALDO Masari Sneakers3Black.jpg', '39,41,42,43', 'High-Tops'),
(88, 'ALDO Frealia-Wr Sneakers', '3', '1879000', 'Black and Orange', '- Perforated high cut lace up sneakers\r\n- Polyester blend\r\n- Textile inner\r\n- Rubber outsole\r\n- Round toe\r\n- Lace closure', '../upload/ALDO Frealia-Wr Sneakers1Black and Orange.jpg,../upload/ALDO Frealia-Wr Sneakers2Black and Orange.jpg,../upload/ALDO Frealia-Wr Sneakers3Black and Orange.jpg', '40,41,42,43', 'High-Tops'),
(89, 'Hummel Stadil 3.0 Classic High Sneakers', '10', '1399000', 'Navy, Orange, and White', '- Sneakers bergaya klasik dengan desain high cut\r\n- Warna navy\r\n- Suede upper\r\n- Insole tekstil\r\n- Rubber outsole\r\n- Tali depan\r\n- Round toe\r\n- Produk unisex', '../upload/Hummel Stadil 3.0 Classic High Sneakers1Navy, Orange, and White.jpg,../upload/Hummel Stadil 3.0 Classic High Sneakers2Navy, Orange, and White.jpg,../upload/Hummel Stadil 3.0 Classic High Sneakers3Navy, Orange, and White.jpg', '40,41,42,43', 'High-Tops'),
(90, 'Hummel Slimmer Stadil High Sneakers', '3', '949000', 'Grey', '- Sneakers desain hi-top dengan aksen chevron kontras\r\n- Warna abu-abu\r\n- Upper kanvas dan suede leather\r\n- PU insole\r\n- Rubber outsole\r\n- Tali depan\r\n- Round toe\r\n- Produk unisex', '../upload/Hummel Slimmer Stadil High Sneakers1Grey.jpg,../upload/Hummel Slimmer Stadil High Sneakers2Grey.jpg,../upload/Hummel Slimmer Stadil High Sneakers3Grey.jpg', '40,41,42,43', 'High-Tops'),
(91, 'Converse Run Star Hike', '10', '1582991', 'Black and White', 'A chunky platform and jagged rubber sole put an unexpected twist on your everyday Chucks. Details like a canvas build, rubber toe cap and Chuck Taylor ankle patch stay true to the original.', '../upload/Converse Run Star Hike1Black and White.jpg,../upload/Converse Run Star Hike2Black and White.jpg,../upload/Converse Run Star Hike3Black and White.jpg', '41,42,43', 'High-Tops'),
(92, 'Converse Chuck Taylor All Star', '10', '863450', 'Black and White', 'We could tell you that it’s the OG basketball shoe, created over 100 years ago. Or that the design has largely stayed the same, because why mess with a good thing.', '../upload/Converse Chuck Taylor All Star1Black and White.jpg,../upload/Converse Chuck Taylor All Star2Black and White.jpg,../upload/Converse Chuck Taylor All Star3Black and White.jpg', '40,42,43', 'High-Tops'),
(93, 'Converse Chuck Taylor 70s Hi Optical', '5', '399000', 'White', 'Converse Chuck Taylor 70s Hi \r\n\r\nCondition : Brand New In Box Premium Import Perfect Kick \r\n\r\n( Tidak sesui Foto Garansi Uang Kembali ) \r\n\r\n\r\n#converseoriginal #converse70sopticalwhite\r\n#converseallstar #allstar #sepatuallstar\r\n', '../upload/Converse Chuck Taylor 70s Hi Optical1White.jpg,../upload/Converse Chuck Taylor 70s Hi Optical2White.jpg,../upload/Converse Chuck Taylor 70s Hi Optical3White.jpg', '40,42,43', 'High-Tops'),
(94, 'Nike Asuna Crater', '12', '749000', 'Cream, White, Orange, and Black', 'Bridging sport and fashion, the Nike Asuna Crater takes a fresh step towards sustainability. Made from at least 20% recycled material by weight, the design features soft Crater foam underfoot and a rugged tread pattern that grips sand.', '../upload/Nike Asuna Crater1Cream, White, Orange, and Black.png,../upload/Nike Asuna Crater2Cream, White, Orange, and Black.png,../upload/Nike Asuna Crater3Cream, White, Orange, and Black.png', '40,42,43', 'Sandals'),
(95, 'Nike Victori One', '12', '529000', 'Black, Off-Noir, and Dark Smoke', 'From the beach to the streets, the Nike Victori One perfects a classic, must-have design. Delivering lightweight comfort that is easy to wear, it features new, softer foam that feels comfortable while the contoured footbed with grip pattern.', '../upload/Nike Victori One1Black, Off-Noir, and Dark Smoke.png,../upload/Nike Victori One2Black, Off-Noir, and Dark Smoke.png,../upload/Nike Victori One3Black, Off-Noir, and Dark Smoke.png', '40,41,42,44', 'Sandals'),
(96, 'Nike Air Max Camden', '13', '649000', 'Anthracite, Dark Grey, Cool Grey, and Volt', 'Inspired by an icon, the Nike Air Max Camden Slide uses soft foam, deep flex grooves and a cushioned upper strap to give you 360 degrees of comfort.', '../upload/Nike Air Max Camden1Anthracite, Dark Grey, Cool Grey, and Volt.jpg,../upload/Nike Air Max Camden2Anthracite, Dark Grey, Cool Grey, and Volt.jpg,../upload/Nike Air Max Camden3Anthracite, Dark Grey, Cool Grey, and Volt.jpg', '38,40,41,42', 'Sandals'),
(97, 'Nike Canyon', '14', '999000', 'Moon Fossil - Orange - Black - Racer Blue', 'Your journey starts with the Nike Canyon Sandal. This rugged hiker is ready to explore. The Nike heritage-inspired design features a beefy outsole, plush foam midsole, triple-strap closure and premium metallic finishes.', '../upload/Nike Canyon1MMoon Fossil - Orange - Black - Racer Blue.jpg,../upload/Nike Canyon2Moon Fossil - Orange - Black - Racer Blue.jpg,../upload/Nike Canyon3Moon Fossil - Orange - Black - Racer Blue.jpg', '38,40,41,42', 'Sandals'),
(98, 'CERRUTI 1881 Unisex Slide Sandals', '8', '5320000', 'Black', 'Comfortable and relaxed sandals :\r\n100% Calf Leather mix\r\nNew anti slippery technology soles\r\nMade in Italy', '../upload/CERRUTI 1881 Unisex Slide Sandals1Black.jpg,../upload/CERRUTI 1881 Unisex Slide Sandals2Black.jpg,../upload/CERRUTI 1881 Unisex Slide Sandals3Black.jpg', '39,41,42', 'Sandals'),
(99, 'CERRUTI 1881 Unisex Slide Sandals (Strap)', '4', '3420000', 'Black', 'Comfortable and relaxed sandals :\r\nNylon and Cotton mix\r\nNew anti slippery technology soles\r\nMade in Italy', '../upload/CERRUTI 1881 Unisex Slide Sandals (Strap)1Black.jpg,../upload/CERRUTI 1881 Unisex Slide Sandals (Strap)2Black.jpg,../upload/CERRUTI 1881 Unisex Slide Sandals (Strap)3Black.jpg', '39,42,43,44', 'Sandals'),
(100, 'CERRUTI 1881 Unisex Slide Sandals (Backbelt and Strap)', '5', '3608100', 'Black', 'Comfortable and relaxed sandals :\r\nNylon and Cotton mix\r\nNew anti slippery technology soles\r\nMade in Italy', '../upload/CERRUTI 1881 Unisex Slide Sandals (Backbelt and Strap)1Black.jpg,../upload/CERRUTI 1881 Unisex Slide Sandals (Backbelt and Strap)2Black.jpg,../upload/CERRUTI 1881 Unisex Slide Sandals (Backbelt and Strap)3Black.jpg', '38,39,40,42', 'Sandals'),
(101, 'Sandal MyFeet F4 Kids', '1', '499000', 'Wood and Black', 'Pada pemakaian awal akan terasa sakit & pegal pada bagian tertentu, khususnya telapak kaki dan betis. Hentikan pemakaian sementara pada sandal jika terasa sakit sampai sakitnya reda, atau gunakan kaos kaki sebagai alat bantu.', '../upload/Sandal MyFeet F4 Kids1Wood and Black.jpg,../upload/Sandal MyFeet F4 Kids2Wood and Black.jpg,../upload/Sandal MyFeet F4 Kids3Wood and Black.jpg', '39,40,42', 'Sandals'),
(102, 'Sandal MyFeet F2 Classic', '2', '1710000', 'Brown', 'MyFeet adalah Sandal kesehatan yang berfungsi untuk menjaga keseimbangan kaki, sehingga kaki akan terasa lebih nyaman saat melakukan perjalanan jauh, atau untuk mengatasi penyakit ringan seperti tumit sakit, sakit pada lutut, dll.', '../upload/Sandal MyFeet F2 Classic1Brown.jpg,../upload/Sandal MyFeet F2 Classic2Brown.jpg,../upload/Sandal MyFeet F2 Classic3Brown.jpg', '38,39,41,42', 'Sandals'),
(103, 'MYFEET Sandal MyFeet F1 Classic', '5', '1280000', 'Camel', '-Solid tone\r\n-Warna Camel\r\n-Oiled Leather Upper\r\n-Genuine Leather Insole\r\n-Natural Rubber Outsole\r\n-Adjustable Strap\r\n-Open toe', '../upload/MYFEET Sandal MyFeet F1 Classic1Camel.jpg,../upload/MYFEET Sandal MyFeet F1 Classic2Camel.jpg,../upload/MYFEET Sandal MyFeet F1 Classic3Camel.jpg', '38,39,41,42', 'Sandals'),
(104, 'Nike Wildhorse 7', '3', '1799000', 'Turqoise', 'Take on those tough and extreme trail runs with the rugged build of the Nike Wildhorse 7.Confidently take on rocky terrain with high-abrasion rubber on the outsole that adds durable traction.', '../upload/Nike Wildhorse 71Turqoise.png,../upload/Nike Wildhorse 72Turqoise.png,../upload/Nike Wildhorse 73Turqoise.png', '39,40,41,43', 'Sports'),
(105, 'Nike ZoomX Vaporfly Next 2', '1', '3209000', 'Black', 'Continue the next evolution of speed with a racing shoe made to help you chase new goals and records. It helps improve comfort and breathability with a redesigned upper.', '../upload/Nike ZoomX Vaporfly Next 21Black.png,../upload/Nike ZoomX Vaporfly Next 22Black.png,../upload/Nike ZoomX Vaporfly Next 23Black.png', '40,41,42', 'Sports'),
(106, 'Nike Revolution 6 Next Nature', '3', '799000', 'Red', 'Here is to new beginnings between you and the tarmac.Lace up the 100% recycled laces and set the pace at the start of your running journey with the plush feel of the Nike Revolution 6 Next Nature.', '../upload/Nike Revolution 6 Next Nature1Red.png,../upload/Nike Revolution 6 Next Nature2Red.png,../upload/Nike Revolution 6 Next Nature3Red.png', '40,41,42', 'Sports'),
(107, 'Nike Zoom Mamba V', '4', '1799000', 'Barely Volt', 'Designed specifically for the steeplechase, the Nike Zoom Mamba V delivers traction and a secure fit in wet conditions.', '../upload/Nike Zoom Mamba V1Barely Volt.png,../upload/Nike Zoom Mamba V2Barely Volt.png,../upload/Nike Zoom Mamba V3Barely Volt.png', '38,39,41,42', 'Sports'),
(108, 'ULTRABOOST 20 EXPLORER SHOES', '3', '3200000', 'White and Black', 'Even with its innovative design and legendary technology, the vision behind Ultraboost is quite simple — comfort. Lace into these adidas running shoes and find it wherever the day takes you. Boost cushioning fuels every step with energy.', '../upload/ULTRABOOST 20 EXPLORER SHOES1White and Black.jpg,../upload/ULTRABOOST 20 EXPLORER SHOES2White and Black.jpg,../upload/ULTRABOOST 20 EXPLORER SHOES3White and Black.jpg', '39,41,42,44', 'Sports'),
(109, 'ULTRABOOST 5.0 DNA SHOES', '5', '2800000', 'Black and Red', 'Comfort that is rooted in running meets effortless style in these adidas Ultraboost 5.0 DNA Shoes. Boost cushioning turns up the energy return so you can look good and feel great all day. The adidas Primeknit upper is stretchy and supportive.', '../upload/ULTRABOOST 5.0 DNA SHOES1Black and Red.jpg,../upload/ULTRABOOST 5.0 DNA SHOES2Black and Red.jpg,../upload/ULTRABOOST 5.0 DNA SHOES3Black and Red.jpg', '39,42,43,44', 'Sports'),
(110, 'PUREBOOST 21 SHOES', '6', '2000000', 'Black and Grey', 'A training plan is only as good as the effort you put into its execution. These adidas running shoes support your dedication with the incredible energy-return of Boost.', '../upload/PUREBOOST 21 SHOES1Black and Grey.jpg,../upload/PUREBOOST 21 SHOES2Black and Grey.jpg,../upload/PUREBOOST 21 SHOES3Black and Grey.jpg', '39,40,42,44', 'Sports'),
(111, 'New Balance Fresh Foam 1080v11', '10', '2158481', 'Deep Ocean', 'Our Fresh Foam 1080v11 provides luxurious comfort for the long run. This soft, plush shoe features responsive underfoot Fresh Foam partnered perfectly with a soft, selectively stretchy knit upper offering 360-degree comfort for high mileage. ', '../upload/New Balance Fresh Foam 1080v111Deep Ocean.jpg,../upload/New Balance Fresh Foam 1080v112Deep Ocean.jpg,../upload/New Balance Fresh Foam 1080v113Deep Ocean.jpg', '39,40,41,42', 'Sports'),
(112, 'New Balance FuelCell RC Elite v2', '3', '3237793', 'Pink', 'The FuelCell RC Elite v2 is designed to give you a competitive edge on race day. This lightweight men’s running shoe features our high-rebound FuelCell midsole compound paired with a full-length carbon fiber plate to help promote energy return.', '../upload/New Balance FuelCell RC Elite v21Pink.jpg,../upload/New Balance FuelCell RC Elite v22Pink.jpg,../upload/New Balance FuelCell RC Elite v23Pink.jpg', '38,41,42,44', 'Sports'),
(113, 'New Balance Made in USA 990v5', '3', '2662160', 'Grey', 'Proof that quality still exists, our Made in the USA 990v5 is the ultimate blend of performance and style. Made without compromise, the 990v5 is a staple of both morning runs and fashion runways.', '../upload/New Balance Made in USA 990v51Grey.jpg,../upload/New Balance Made in USA 990v52Grey.jpg,../upload/New Balance Made in USA 990v53Grey.jpg', '38,39,40,41,42,43,44', 'Sports');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
CREATE TABLE IF NOT EXISTS `order` (
  `id_order` varchar(150) NOT NULL,
  `id_user` varchar(150) NOT NULL,
  `harga_total` varchar(150) NOT NULL,
  `tanggal_order` varchar(150) NOT NULL,
  `status` varchar(150) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ordered_item`
--

DROP TABLE IF EXISTS `ordered_item`;
CREATE TABLE IF NOT EXISTS `ordered_item` (
  `id_order` int(100) NOT NULL,
  `id_item` int(100) NOT NULL,
  `item_price` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `item_size` int(100) NOT NULL,
  PRIMARY KEY (`id_order`,`id_item`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

DROP TABLE IF EXISTS `review`;
CREATE TABLE IF NOT EXISTS `review` (
  `id_review` int(100) NOT NULL AUTO_INCREMENT,
  `id_item` int(100) NOT NULL,
  `id_user` int(100) NOT NULL,
  `stars` int(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `comment` varchar(255) NOT NULL,
  PRIMARY KEY (`id_review`)
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

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

DROP TABLE IF EXISTS `wishlist`;
CREATE TABLE IF NOT EXISTS `wishlist` (
  `id_wishlist` int(100) NOT NULL AUTO_INCREMENT,
  `id_item` int(100) NOT NULL,
  `id_user` int(100) NOT NULL,
  PRIMARY KEY (`id_wishlist`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id_wishlist`, `id_item`, `id_user`) VALUES
(1, 2, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
