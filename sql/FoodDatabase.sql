

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";



--
-- Database: `GourmetFood`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

DROP TABLE IF EXISTS `tbl_admin`;
CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `adminId` int(11) NOT NULL AUTO_INCREMENT,
  `adminName` varchar(255) NOT NULL,
  `adminUser` varchar(255) NOT NULL,
  `adminEmail` varchar(255) NOT NULL,
  `adminPass` varchar(32) NOT NULL,
  `level` tinyint(4) NOT NULL,
  PRIMARY KEY (`adminId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminId`, `adminName`, `adminUser`, `adminEmail`, `adminPass`, `level`) VALUES
(1, 'admin', 'admin', 'admin@gamil.com', '81dc9bdb52d04dc20036dbd8313ed055', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_item`
--

DROP TABLE IF EXISTS `tbl_item`;
CREATE TABLE IF NOT EXISTS `tbl_item` (
  `foodId` int(11) NOT NULL AUTO_INCREMENT,
  `foodName` varchar(255) NOT NULL,
  PRIMARY KEY (`foodId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_item`
--

INSERT INTO `tbl_item` (`foodId`, `foodName`) VALUES
(1, 'Biriany'),
(2, 'Chicken'),
(3, 'Paneer'),
(4, 'Chinese');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

DROP TABLE IF EXISTS `tbl_cart`;
CREATE TABLE IF NOT EXISTS `tbl_cart` (
  `cartId` int(11) NOT NULL AUTO_INCREMENT,
  `sId` varchar(255) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`cartId`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

DROP TABLE IF EXISTS `tbl_category`;
CREATE TABLE IF NOT EXISTS `tbl_category` (
  `catId` int(11) NOT NULL AUTO_INCREMENT,
  `catName` varchar(255) NOT NULL,
  PRIMARY KEY (`catId`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`catId`, `catName`) VALUES
(1, 'Biriany'),
(2, 'Chicken'),
(3, 'Paneer'),
(4, 'Vegetables'),
(5, 'Chinese'),
(6, 'Bengali'),
(7, 'Flip Flops');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

DROP TABLE IF EXISTS `tbl_customer`;
CREATE TABLE IF NOT EXISTS `tbl_customer` (
  `customerId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `zip` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`customerId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`customerId`, `name`, `city`, `zip`, `email`, `address`, `country`, `phone`, `password`) VALUES
(1, 'admin', 'Rajshahi', 6600, 'admin@gmail.com', 'Rajshahi,Talimari', 'Bangladesh', '01616-xxxxxx01', '81dc9bdb52d04dc20036dbd8313ed055'),
(2, 'S', 'Rajshahi', 6600, 's@gmail.com', 'Talaimari, Rajshahi', 'Bangladesh', '01717-xxxx02', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

DROP TABLE IF EXISTS `tbl_order`;
CREATE TABLE IF NOT EXISTS `tbl_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cmrId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `cmrId`, `productId`, `productName`, `quantity`, `price`, `image`, `date`, `status`) VALUES
(1, 1, 15, 'Butter-Masala-Dosa', 1, 139, 'images\Specail Bengali\Butter-Masala-Dosa.png', '2019-04-02 10:30:54', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

DROP TABLE IF EXISTS `tbl_product`;
CREATE TABLE IF NOT EXISTS `tbl_product` (
  `productId` int(11) NOT NULL AUTO_INCREMENT,
  `productName` varchar(255) NOT NULL,
  `catId` int(11) NOT NULL,
  `foodId` int(11) NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`productId`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`productId`, `productName`, `catId`, `foodId`,  `price`, `image`, `type`) VALUES
(1, ' Chicken-Biryani-hyd', 6, 1,  139.00, 'images/Briani/Chicken-Biryani-hyd.JPG', 0),
(2, 'Ambur-Chicken-Biryani', 6, 3,  139.00, 'images/Briani/Ambur-Chicken-Biryani.jpg', 0),
(3, ' egg-biryani', 2, 2,  139.00, 'images/Briani/egg-biryani.jpeg', 0),
(4, 'goan-fish-biryani', 1, 2,  139.00, 'images/Briani/goan-fish-biryani.jpg', 0),
(5, 'hyd-Mutton-Biryani', 6, 1, 139.00, 'images/Briani/hyd-Mutton-Biryani.jpg', 0),
(6, 'kamrupi-biryani', 6, 1,  139.00, 'images/Briani/kamrupi-biryani.jpg', 0),
(7, 'kashmiri.pulao', 1, 3,  139.00, 'images/Briani/kashmiri.pulao.jpg', 0),
(8, 'memonibiryani', 1, 2,  139.00, 'images/Briani/memonibiryani.png', 0),
(9, 'mughlai-biryani', 1, 3, 139.00, 'images/Briani/mughlai-biryani.jpg', 1),
(10, 'Chicken Manchurian', 6, 2,  139.00, 'images/Chainese/ChickenManchurian.jpg', 1),
(11, 'Chili-Chicken', 1, 1,  139.00, 'images/Chainese/Chili-Chicken.jpg', 1),
(12, 'chowmin', 6, 1,  139.00, 'images/Chainese/chowmin.jpg', 1),
(13, 'mmos', 6, 4,  139.00, 'images/Chainese/mmos.jpg', 1),
(14, 'spring-rolls', 1, 2,  139.00, 'images/Chainese/spring-rolls.jpg', 1),
(15, 'szechuan-chicken', 1, 3,  139.00, 'images/Chainese/szechuan-chicken.jpg', 1),
(17, 'veg-fried-rice', 6, 2,  139.00, 'images/Chainese/veg-fried-rice.jpg', 1);
COMMIT;



