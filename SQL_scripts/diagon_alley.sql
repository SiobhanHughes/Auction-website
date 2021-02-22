-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Dec 04, 2019 at 05:34 PM
-- Server version: 5.7.26
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `auction_site`
--

-- --------------------------------------------------------

--
-- Table structure for table `Auction`
--

CREATE TABLE `Auction` (
  `auctionid` int(11) NOT NULL,
  `sellerid` int(11) DEFAULT NULL,
  `itemid` int(11) DEFAULT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `isFinished` bit(1) NOT NULL DEFAULT b'0',
  `startPrice` decimal(18,2) DEFAULT NULL,
  `reservePrice` decimal(18,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Auction`
--

INSERT INTO `Auction` (`auctionid`, `sellerid`, `itemid`, `startDate`, `endDate`, `isFinished`, `startPrice`, `reservePrice`) VALUES
(2, 1, 2, '2019-12-03', '2020-12-31', b'0', '100.00', '150.00'),
(3, 1, 3, '2019-12-03', '2019-12-15', b'0', '30.00', '70.00'),
(4, 1, 4, '2019-12-03', '2019-12-16', b'0', '50.00', '65.00'),
(5, 2, 5, '2019-12-03', '2019-12-18', b'0', '10.00', '20.00'),
(6, 2, 6, '2019-12-03', '2019-12-21', b'0', '14.99', '24.99'),
(7, 2, 7, '2019-12-03', '2019-12-21', b'0', '19.99', '29.99'),
(8, 3, 8, '2019-12-03', '2019-12-24', b'0', '69.99', '79.99'),
(9, 3, 9, '2019-12-03', '2019-12-25', b'0', '49.99', '59.99'),
(10, 3, 10, '2019-12-03', '2019-12-26', b'0', '5.00', '9.99'),
(11, 4, 11, '2019-12-01', '2019-12-10', b'0', '9.99', '19.99'),
(12, 5, 12, '2019-12-03', '2019-12-22', b'0', '19.99', '29.99'),
(13, 5, 13, '2019-11-24', '2020-01-02', b'0', '2.99', '3.99'),
(14, 5, 14, '2019-12-03', '2019-12-12', b'0', '3.99', '4.99'),
(15, 5, 15, '2019-12-03', '2019-12-23', b'0', '7.99', '8.99'),
(17, 1, 17, '2019-12-03', '2019-12-23', b'0', '15.00', '30.00'),
(18, 7, 18, '2019-12-03', '2019-12-27', b'0', '30.00', '45.00'),
(19, 7, 19, '2019-12-03', '2019-12-26', b'0', '12.99', '18.99'),
(20, 2, 20, '2019-12-03', '2019-12-14', b'0', '10.00', '20.00');

-- --------------------------------------------------------

--
-- Table structure for table `Bids`
--

CREATE TABLE `Bids` (
  `auctionid` int(11) NOT NULL,
  `buyerid` int(11) NOT NULL,
  `bidValue` decimal(18,2) NOT NULL,
  `win` varchar(10) DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Bids`
--

INSERT INTO `Bids` (`auctionid`, `buyerid`, `bidValue`, `win`) VALUES
(2, 3, '155.00', 'No'),
(2, 5, '160.00', 'No'),
(2, 7, '105.00', 'No'),
(3, 5, '40.00', 'No'),
(4, 2, '62.00', 'No'),
(4, 5, '60.00', 'No'),
(5, 1, '15.00', 'No'),
(5, 5, '20.00', 'No'),
(6, 3, '19.00', 'No'),
(6, 5, '20.00', 'No'),
(7, 5, '22.00', 'No'),
(8, 2, '80.00', 'No'),
(8, 7, '75.00', 'No'),
(9, 1, '65.00', 'No'),
(9, 2, '70.00', 'No'),
(10, 5, '12.00', 'No'),
(11, 2, '25.00', 'No'),
(12, 4, '25.00', 'No'),
(13, 2, '4.00', 'No'),
(14, 1, '5.00', 'No'),
(17, 5, '25.00', 'No'),
(18, 1, '40.00', 'No'),
(20, 5, '10.00', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `Items`
--

CREATE TABLE `Items` (
  `itemid` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `category` varchar(50) NOT NULL,
  `cndtn` varchar(20) DEFAULT NULL,
  `photo` varchar(1000) DEFAULT NULL,
  `colour` varchar(50) DEFAULT NULL,
  `desc1` varchar(5000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Items`
--

INSERT INTO `Items` (`itemid`, `title`, `category`, `cndtn`, `photo`, `colour`, `desc1`) VALUES
(2, 'Invisibility Cloak', 'clothes', 'used', 'uploads/invisibility-cloak.jpg', 'Black', 'One of a kind! Hide in plain sight!'),
(3, 'Nimbus 2000', 'sporting-goods', 'used', 'uploads/nimbus2000.jpg', 'Brown', 'Win your next quidditch match in style!'),
(4, 'Gryffindor sweater', 'clothes', 'new', 'uploads/Gryffindor_sweater.jpg', 'Red', 'Wear your house colours with pride!'),
(5, 'Poly Juice Potion', 'potions', 'new', 'uploads/polyjuice-potion.jpg', 'Fluorescent', 'Be whoever you want to be!'),
(6, 'Fantastic Beasts Book', 'books', 'new', 'uploads/fantastic-beasts-book.jpeg', 'Green', 'Learn everything you wanted to know about magical beasts'),
(7, 'Spell Book', 'books', 'used', 'uploads/spell_book.jpg', 'Burgundy', 'Learn the spells you\'ve always wanted to use!'),
(8, 'Dark Arts Book', 'books', 'used', 'uploads/dark_arts.jpg', 'Grey', 'Learn the Dark Arts!'),
(9, 'Liquid Luck Potion', 'potions', 'new', 'uploads/liquid-luck.jpg', 'Yellow', 'Looking for some luck?\r\nLook no further!'),
(10, 'Love Potion', 'potions', 'new', 'uploads/love-potion.jpg', 'Pink', 'Need a hand to get the person of your dreams?'),
(11, 'Socks', 'other', 'used', 'uploads/sock.jpg', 'Burgundy', 'Dobby is now a free elf!'),
(12, 'Huffle Puff Jumper', 'clothes', 'new', 'uploads/huffle_puff_jumper.jpg', 'Yellow', 'To keep you warm in the cold!'),
(13, 'Chocolate Frog', 'other', 'new', 'uploads/choc_frog.jpg', 'Brown', 'Feeling peckish?'),
(14, 'Every Flavour Beans', 'other', 'new', 'uploads/beans.jpg', 'Variety', 'Enjoy the mysteries of these Every Flavour Beans'),
(15, 'Broken Wand', 'wands', 'used', 'uploads/used-wand.jpg', 'Woody', 'Sometimes back fires!'),
(17, 'Quidditch Balls', 'sporting-goods', 'new', 'uploads/quidditch-balls.jpg', 'Burgundy', 'Quidditch Balls'),
(18, 'Golden Snitch', 'sporting-goods', 'used', 'uploads/snitch.jpeg', 'Golden', 'Win that Quidditch game!'),
(19, 'Slytherin Jumper', 'clothes', 'new', 'uploads/slytherin_jumper.jpg', 'Yellow', 'To keep you warm in the cold!'),
(20, 'New Wand', 'wands', 'new', 'uploads/wand.jpg', 'Brown', 'Great working wand!');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `userid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `passwordhash` varchar(60) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `addressline1` varchar(200) DEFAULT NULL,
  `addressline2` varchar(200) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `postcode` varchar(10) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`userid`, `username`, `email`, `passwordhash`, `firstname`, `lastname`, `addressline1`, `addressline2`, `city`, `postcode`, `phone`) VALUES
(1, 'HarryP', 'harrypotter@hogwarts.com', '$2y$10$09ioog0/3ocra3P83.TUwOqxDSyGzrfw9c1oQHPyzuRQUF3/dnGp2', 'Harry', 'Potter', '4 Privet Drive', 'Little Whinging', 'London', 'CR2 5ER', '12345'),
(2, 'HermioneG', 'hermionegranger@hogwarts.com', '$2y$10$aiKBuksyKFXTJ3RgqY4zI.ecafYK5xzkKpRQkpN/bKGwQgwemJdQm', 'Hermione', 'Granger', 'Hogwarts', 'School of Wizardry and WitchCraft', 'Hogwarts', 'WW11 XYZ', '456789'),
(3, 'SeverusS', 'severussnape@hogwarts.com', '$2y$10$USYSC1f1Sp/WenlogA5E2Obsep7RT5U4QwvgKgPWDyxocdMUxRZZ2', 'Severus', 'Snape', 'Hogwarts', 'School of Wizardry and WitchCraft', 'Hogwarts', 'WW11 XYZ', '12345678'),
(4, 'Dobby', 'dobby@hogwarts.com', '$2y$10$fbTkO6iO7PtKRcT5thaHW.Ui1Qkbtyetw7GPqKPAZIrOIyxagKf8i', 'Dobby', 'The Elf', 'Hogwarts', 'School of Wizardry and WitchCraft', 'Hogwarts', 'WW11 XYZ', '07776665554'),
(5, 'RonW', 'ronweasley@hogwarts.com', '$2y$10$oSgERAQqlBVBlu8nMsNVie17FamiW/8gqSjQn8xIYRUYon8bZwbOq', 'Ron', 'Weasley', 'Hogwarts', 'School of Wizardry and WitchCraft', 'Hogwarts', 'WW11 XYZ', '123456789'),
(7, 'DracoM', 'dracomalfoy@hogwarts.com', '$2y$10$5cclkifeWZHbDlLrW2muSOBGt35Edrd6R9cxUzXZkoGKdjUEJDwxO', 'Draco', 'Malfoy', 'Hogwarts', 'School of Wizardry and WitchCraft', 'Hogwarts', 'WW11 XYZ', '987654321');

-- --------------------------------------------------------

--
-- Table structure for table `Watch`
--

CREATE TABLE `Watch` (
  `auctionid` int(11) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Watch`
--

INSERT INTO `Watch` (`auctionid`, `userid`) VALUES
(2, 2),
(10, 2),
(3, 7),
(9, 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Auction`
--
ALTER TABLE `Auction`
  ADD PRIMARY KEY (`auctionid`),
  ADD KEY `sellerid` (`sellerid`),
  ADD KEY `itemid` (`itemid`);

--
-- Indexes for table `Bids`
--
ALTER TABLE `Bids`
  ADD PRIMARY KEY (`auctionid`,`buyerid`),
  ADD KEY `buyerid` (`buyerid`);

--
-- Indexes for table `Items`
--
ALTER TABLE `Items`
  ADD PRIMARY KEY (`itemid`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `Watch`
--
ALTER TABLE `Watch`
  ADD PRIMARY KEY (`auctionid`,`userid`),
  ADD KEY `userid` (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Auction`
--
ALTER TABLE `Auction`
  MODIFY `auctionid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `Items`
--
ALTER TABLE `Items`
  MODIFY `itemid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Auction`
--
ALTER TABLE `Auction`
  ADD CONSTRAINT `auction_ibfk_1` FOREIGN KEY (`sellerid`) REFERENCES `Users` (`userid`),
  ADD CONSTRAINT `auction_ibfk_2` FOREIGN KEY (`itemid`) REFERENCES `Items` (`itemid`);

--
-- Constraints for table `Bids`
--
ALTER TABLE `Bids`
  ADD CONSTRAINT `bids_ibfk_1` FOREIGN KEY (`auctionid`) REFERENCES `Auction` (`auctionid`),
  ADD CONSTRAINT `bids_ibfk_2` FOREIGN KEY (`buyerid`) REFERENCES `Users` (`userid`);

--
-- Constraints for table `Watch`
--
ALTER TABLE `Watch`
  ADD CONSTRAINT `watch_ibfk_1` FOREIGN KEY (`auctionid`) REFERENCES `Auction` (`auctionid`),
  ADD CONSTRAINT `watch_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `Users` (`userid`);

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `Auction ends` ON SCHEDULE EVERY 1 DAY STARTS '2019-12-04 17:33:08' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE Auction
SET isFinished = 1
WHERE Auction.endDate <= CURRENT_TIMESTAMP$$

DELIMITER ;
