-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2022 at 06:39 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onpointdstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `idCus` int(10) NOT NULL,
  `prodName` varchar(1000) NOT NULL,
  `prodId` int(10) NOT NULL,
  `prodCartQtt` int(10) NOT NULL,
  `totalPrice` double NOT NULL,
  `prodSize` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`idCus`, `prodName`, `prodId`, `prodCartQtt`, `totalPrice`, `prodSize`) VALUES
(15, '', 1, 2, 958, '7'),
(15, 'Nike Air Force 1 07', 2, 1, 369, '7'),
(12, 'Adidas Forum 84 Low', 4, 2, 858, '7.5'),
(12, 'New Balance 550', 3, 1, 529, '7.5'),
(12, 'Air Jordan 1 Low SE Craft', 1, 1, 479, '7.5');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `idCus` int(11) NOT NULL,
  `cusEmail` varchar(100) NOT NULL,
  `cusPassword` varchar(10) DEFAULT NULL,
  `cusName` varchar(100) DEFAULT NULL,
  `cusGender` varchar(10) DEFAULT NULL,
  `cusNumPhone` varchar(20) DEFAULT NULL,
  `cusDOB` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`idCus`, `cusEmail`, `cusPassword`, `cusName`, `cusGender`, `cusNumPhone`, `cusDOB`) VALUES
(5, 'idzham@gmail.com', 'wwww1111', 'idzham mazlan', 'Male', '0136660802', '2022-07-27'),
(6, 'sofiahisham12@gmail.com', 'qqqq1111', 'sofia binti hisham', 'female', '021472384523', '2022-07-17'),
(16, 'aminur@gmail.com', 'aaaa1111', 'aminur shuhada', 'female', '013384484', '2022-08-13'),
(17, 'syuksolihin@gmail.com', 'ssss1111', 'syukri solihin', 'male', '0124345435', '2021-12-16');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `cusName` varchar(100) DEFAULT NULL,
  `cusEmail` varchar(50) DEFAULT NULL,
  `cusNumPhone` varchar(12) DEFAULT NULL,
  `cusAddress` varchar(100) DEFAULT NULL,
  `payment` varchar(20) DEFAULT NULL,
  `products` varchar(1000) NOT NULL,
  `grand_total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`cusName`, `cusEmail`, `cusNumPhone`, `cusAddress`, `payment`, `products`, `grand_total`) VALUES
('sfsdf', 'aa@gmail.com', '324234', 'fvdfv', 'cod', '1(1)', 479),
('dsg', 'aa@gmail.com', '3543', 'fddb', 'cod', '(2), Nike Air Force 1 07(1)', 1327),
('hdsfhd', 'aa@gmail.com', '32423', 'sfgdf', 'cod', '(2)', 958),
('dsfds', 'aa@gmail.com', '24332', 'cfd', 'cod', 'Air Jordan 1 Low SE Craft(1)', 479),
('df', 'aa@gmail.com', '334', 'df', 'netbanking', 'Air Jordan 1 Low SE Craft(1), New Balance 550(1)', 1008),
('dgdf', 'aasd@gmail.com', '23432', 'fhfhd', 'cod', 'Air Jordan 1 Low SE Craft(1), New Balance 550(1), Adidas Forum 84 Low(6)', 3582),
('sad', 'aa@gmail.com', '12', 'sac', 'cod', '(1), Adidas Forum 84 Low(1)', 798),
('fg', '324@e', '23', 'fd', 'cod', 'Adidas Forum 84 Low(2)', 858),
('fsdfsfdsdf', 'aa@gmail.com', '111111111', 'sfds', 'bank', '', 0),
('naufal', '23423@g', '324234234', 'dfsdf', 'bank', '', 0),
('dc', '23423@g', '2342', 'ddc', 'cod', 'Adidas Forum 84 Low(2), New Balance 550(1)', 1387),
('dfdf', '23423@g', '2323', 'dsd', 'netbanking', 'Adidas Forum 84 Low(2), New Balance 550(1)', 1387),
('dfsdf', 'sdf4@ce', '324234234', 'dsvfd', 'cod', 'Adidas Forum 84 Low(2), New Balance 550(1)', 1387),
('dfsdf', 'sdf4@ce', '324234234', 'dsvfd', 'cod', 'Adidas Forum 84 Low(2), New Balance 550(1)', 1387),
('dfsdf', 'sdf4@ce', '324234234', 'dsvfd', 'cod', 'Adidas Forum 84 Low(2), New Balance 550(1)', 1387),
('dfsdf', 'sdf4@ce', '324234234', 'dsvfd', 'cod', 'Adidas Forum 84 Low(2), New Balance 550(1)', 1387),
('dfsdf', 'sdf4@ce', '324234234', 'dsvfd', 'cod', 'Adidas Forum 84 Low(2), New Balance 550(1)', 1387),
('fsdfs', 'aa@gmail.com', '35345', 'fgdf', 'cod', 'Adidas Forum 84 Low(2), New Balance 550(1)', 1387),
('sdfd', 'aa@gmail.com', '23432', 'sdf', 'cod', 'Adidas Forum 84 Low(2), New Balance 550(1)', 1387),
('df', 's@r', '23', 'sd', 'cod', 'Adidas Forum 84 Low(2), New Balance 550(1)', 1387),
('ewd', 'aa@gmail.com', '2342', 'cd', 'cod', 'Adidas Forum 84 Low(2), New Balance 550(1)', 1387),
('ewd', 'aa@gmail.com', '2342', 'cd', 'cod', 'Adidas Forum 84 Low(2), New Balance 550(1)', 1387),
('ewd', 'aa@gmail.com', '2342', 'cd', 'cod', 'Adidas Forum 84 Low(2), New Balance 550(1)', 1387),
('wefe', 'aasd@gmail.com', '124234', 'efd', 'cod', 'Adidas Forum 84 Low(2), New Balance 550(1)', 1387),
('wefe', 'aasd@gmail.com', '124234', 'efd', 'cod', 'Adidas Forum 84 Low(2), New Balance 550(1)', 1387),
('wefe', 'aasd@gmail.com', '124234', 'efd', 'cod', 'Adidas Forum 84 Low(2), New Balance 550(1)', 1387),
('wefe', 'aasd@gmail.com', '124234', 'efd', 'cod', 'Adidas Forum 84 Low(2), New Balance 550(1)', 1387),
('wefe', 'aasd@gmail.com', '124234', 'efd', 'cod', 'Adidas Forum 84 Low(2), New Balance 550(1)', 1387),
('wefe', 'aasd@gmail.com', '124234', 'efd', 'cod', 'Adidas Forum 84 Low(2), New Balance 550(1)', 1387),
('wefe', 'aasd@gmail.com', '124234', 'efd', 'cod', 'Adidas Forum 84 Low(2), New Balance 550(1)', 1387),
('wefe', 'aasd@gmail.com', '124234', 'efd', 'cod', 'Adidas Forum 84 Low(2), New Balance 550(1)', 1387),
('wefe', 'aasd@gmail.com', '124234', 'efd', 'cod', 'Adidas Forum 84 Low(2), New Balance 550(1)', 1387),
('wefe', 'aasd@gmail.com', '124234', 'efd', 'cod', 'Adidas Forum 84 Low(2), New Balance 550(1)', 1387),
('wefe', 'aasd@gmail.com', '124234', 'efd', 'cod', 'Adidas Forum 84 Low(2), New Balance 550(1)', 1387),
('wefe', 'aasd@gmail.com', '124234', 'efd', 'cod', 'Adidas Forum 84 Low(2), New Balance 550(1)', 1387),
('wefe', 'aasd@gmail.com', '124234', 'efd', 'cod', 'Adidas Forum 84 Low(2), New Balance 550(1)', 1387),
('fdsf', 'aa@gmail.com', '2132', 'dfsdf', 'netbanking', 'Adidas Forum 84 Low(2), New Balance 550(1), Air Jordan 1 Low SE Craft(1)', 1866);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prodId` int(10) NOT NULL,
  `prodName` varchar(100) NOT NULL,
  `prodPrice` double NOT NULL,
  `prodDesc` varchar(1000) NOT NULL,
  `prodQtt` int(10) NOT NULL,
  `prodCategory` varchar(20) NOT NULL,
  `prodImg` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prodId`, `prodName`, `prodPrice`, `prodDesc`, `prodQtt`, `prodCategory`, `prodImg`) VALUES
(1, 'Air Jordan 1 Low SE Craft', 479, 'Consistently fresh and always on point, the low-profile AJ1 is one of the most iconic sneakers of all time. This version incorporates natural tones and suede details—its a grounding refresh for a soaring legend.', 2, 'men', 'men1.jpg'),
(2, 'Nike Air Force 1 07', 369, 'The radiance lives on in the Nike Air Force 1 07, the b-ball icon that puts a fresh spin on what you know best: crisp leather, bold colours and the perfect amount of flash to make you shine.', 4, 'women', 'women1.jpg'),
(3, 'New Balance 550', 529, 'Many will tell you that this is the colorway that started it all. Wed agree. If youre looking to cop a future icon then this is a safe bet.', 6, 'men', 'men3.jpg'),
(4, 'Adidas Forum 84 Low', 429, 'Style VIPS only. If you can appreciate retro design, B-ball history, and the luxury of premium leather, then youre ready to step into these revamped adidas Forum 84 shoes. Low cut with pops of colors, they re equally at home kicking back by a pool or making moves in the city\r\n.', 6, 'men', 'men2.jpg'),
(5, 'New Balance 327 Junior', 360, 'Lace up in a track-inspired style with these juniors\' 327 sneakers from New Balance. Comin\' in a Pink color way, these runners have a breathable textile upper, with smooth synthetic suede overlays for added support and durability.', 8, 'kids', 'kids1.jpg'),
(6, 'Adidas Duramo 10 Junior', 209, 'The LIGHTMOTION midsole in these shoes adds superlight cushioning that helps them scurry in a hurry. Elastic laces plus a hook-and-loop top strap create a snug fit for all-day play. Designs on the upper add big-kid flash', 5, 'kids', 'kids2.jpg'),
(7, 'Jordan Air 1 Mid Junior', 319, ' FRESH LOOK FOR A STREET FASHION ICON. The all-time classic AJ1 design gets a makeover with fresh pops of color and mixed materials.\r\nGenuine and synthetic leather and textile materials in the upper provide durability and structure', 6, 'kids', 'kids3.jpg'),
(8, 'jordan air 1 mid junior pink', 559, 'Consistently fresh and always on point, the AJ1 is one of the most iconic sneakers of all time. This version uses natural tones and suede details for a grounding refresh to a soaring legend.\r\n\r\nEncapsulated Air-Sole unit and foam midsole cushion every step.\r\nMid-cut, cushioned collar creates a comfortable fit around your ankle.\r\nRubber sole gives you durable traction.', 2, 'kids', 'kids4.jpg'),
(9, 'Puma Pacer Future Marble Slip-On ', 399, 've your wardrobe a fresh infusion of attitude in our Wild Rider collection, trainers engineered for the perfect balance of performance and everyday comfort. Our Wild Rider R... ', 4, 'men', 'men4.jpg'),
(10, 'Adidas Original Stan Smith Women', 449, 'es, tennis shoes can be fancy. Enter the Stan Smith - with a luxe touch. For over 50 years, these shoes have solidified their place as an icon. Now the timeless appeal that put this style on the map gets a chic upgrade with a marbled heel tab. The metallic underlay adds a sumptuous detail.', 3, 'women', 'women2.jpg'),
(11, 'Nike React Infinity 3 Women', 450, 'Still our most tested shoe. Still designed to help keep you running. The Nike React Infinity Run 3 offers a soft, stable feel and a smooth ride that will carry you through routes—both long and short. A breathable upper is made to feel contained, yet flexible. We even added more cushioning to the collar for a soft, protected feel. Keep running, we\'ve got you.\r\n', 4, 'women', 'women3.jpg'),
(12, 'Puma X Dua Lipa Mayze', 579, 'The second season of PUMA x DUA LIPA is here, and the collection is filled with bold styles with ‘90s influence. This version of the Mayze is no exception, with a stacked sole, and vibrant accents throughout. It’s for the hype girls and the trendsetters – just like Dua.\r\n', 3, 'women', 'women4.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`idCus`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prodId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `idCus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prodId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
