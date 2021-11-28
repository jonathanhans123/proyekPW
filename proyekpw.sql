-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2021 at 11:26 AM
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
CREATE TABLE `discount` (
  `id_discount` int(100) NOT NULL,
  `id_item` int(100) NOT NULL,
  `value` int(10) NOT NULL,
  `discount_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
CREATE TABLE `item` (
  `id_item` int(100) NOT NULL,
  `item_nama` varchar(100) NOT NULL,
  `item_stock` varchar(100) NOT NULL,
  `item_price` varchar(100) NOT NULL,
  `item_color` varchar(100) NOT NULL,
  `item_desc` varchar(250) NOT NULL,
  `imageurl` varchar(10000) NOT NULL,
  `item_size` varchar(100) NOT NULL,
  `item_cate` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id_item`, `item_nama`, `item_stock`, `item_price`, `item_color`, `item_desc`, `imageurl`, `item_size`, `item_cate`) VALUES
(2, 'Vizzano Mina', '100', '299000', 'Pink', 'These are Vizzano Mina shoes.', '../upload/Vizzano Mina1.jpg,../upload/Vizzano Mina2.jpg,../upload/Vizzano Mina3.jpg,../upload/Vizzan', '38,39,40', 'Wedges'),
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
(61, 'Cole Haan Men Zerogrand Stitchlite Wingtip Oxford', '10', '4632984', 'Ironstone/Ivory', '100% Synthetic\r\nImported\r\nRubber sole\r\nShaft measures approximately low-top from arch\r\nRipstop and nylon upper\r\nNatural storm welt\r\nEVA midsole with rubber outsole\r\nCole Haan Grand OS technology for ultimate comfort', '../upload/Cole Haan Men Zerogrand Stitchlite Wingtip Oxford1Ironstone/Ivory.jpg,../upload/Cole Haan ', '40,41,42,44', 'Oxford');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
CREATE TABLE `order` (
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
CREATE TABLE `ordered_item` (
  `id_order` int(100) NOT NULL,
  `id_item` int(100) NOT NULL,
  `item_price` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `item_size` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

DROP TABLE IF EXISTS `review`;
CREATE TABLE `review` (
  `id_review` int(100) NOT NULL,
  `id_item` int(100) NOT NULL,
  `id_user` int(100) NOT NULL,
  `stars` int(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id_user` int(10) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_phone` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
CREATE TABLE `wishlist` (
  `id_wishlist` int(100) NOT NULL,
  `id_item` int(100) NOT NULL,
  `id_user` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id_wishlist`, `id_item`, `id_user`) VALUES
(1, 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`id_discount`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id_item`);

--
-- Indexes for table `ordered_item`
--
ALTER TABLE `ordered_item`
  ADD PRIMARY KEY (`id_order`,`id_item`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id_review`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `user_email` (`user_email`),
  ADD UNIQUE KEY `user_phone` (`user_phone`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id_wishlist`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `discount`
--
ALTER TABLE `discount`
  MODIFY `id_discount` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id_item` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id_review` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id_wishlist` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
