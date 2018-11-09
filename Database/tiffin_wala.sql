-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 09, 2018 at 10:42 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tiffin_wala`
--

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `city_id` int(11) NOT NULL AUTO_INCREMENT,
  `city_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`city_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `city_name`) VALUES
(1, 'Ahmedabad'),
(2, 'Surat'),
(3, 'Baroda'),
(4, 'Pune'),
(5, 'Banglore'),
(6, 'Gandhinagar');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `address` varchar(255) DEFAULT NULL,
  `fk_tiffin_id` int(11) NOT NULL,
  `fk_user_id` int(11) NOT NULL,
  `fk_menu_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `order_flag` int(11) NOT NULL,
  PRIMARY KEY (`order_id`),
  KEY `fk_tiffin_id` (`fk_tiffin_id`),
  KEY `fk_user_id` (`fk_user_id`),
  KEY `fk_menu_id` (`fk_menu_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `address`, `fk_tiffin_id`, `fk_user_id`, `fk_menu_id`, `quantity`, `amount`, `date`, `order_flag`) VALUES
(1, 'Paldi', 1, 2, 1, 5, 350, '30-10-2018', 1),
(8, 'Reliance Cross Roads', 1, 13, 1, 3, 210, '08-11-2018', 1),
(9, 'Reliance Cross Roads', 1, 13, 1, 3, 210, '08-11-2018', 1),
(10, 'Reliance Cross Roads', 1, 13, 1, 3, 210, '08-11-2018', 1),
(11, 'Reliance Cross Roads', 1, 13, 1, 3, 210, '08-11-2018', 1),
(13, 'Reliance Cross Roads', 1, 13, 1, 3, 210, '08-11-2018', 1),
(14, 'Reliance Cross Roads', 1, 15, 1, 3, 210, '08-11-2018', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tiffinwala`
--

CREATE TABLE IF NOT EXISTS `tiffinwala` (
  `tiffin_id` int(11) NOT NULL AUTO_INCREMENT,
  `tiffin_address` varchar(255) DEFAULT NULL,
  `tiffin_email` varchar(255) DEFAULT NULL,
  `tiffin_flag` int(11) DEFAULT NULL,
  `tiffin_mobile` int(11) DEFAULT NULL,
  `tiffin_name` varchar(255) DEFAULT NULL,
  `tiffin_pincode` int(11) DEFAULT NULL,
  `cityvo_city_id` int(11) DEFAULT NULL,
  `uservo_user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`tiffin_id`),
  KEY `tiffinwala_ibfk_2` (`uservo_user_id`),
  KEY `tiffinwala_ibfk_1` (`cityvo_city_id`),
  KEY `cityvo_city_id` (`cityvo_city_id`),
  KEY `uservo_user_id` (`uservo_user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tiffinwala`
--

INSERT INTO `tiffinwala` (`tiffin_id`, `tiffin_address`, `tiffin_email`, `tiffin_flag`, `tiffin_mobile`, `tiffin_name`, `tiffin_pincode`, `cityvo_city_id`, `uservo_user_id`) VALUES
(1, 'Kudasan, Gandhinagar', 'jayjalaram@gmail.com', 1, 2147483647, 'Jay Jalaram', 380007, 6, 2),
(2, 'sp', 'sp@gmail.com', 1, 1234, 'sp', 380007, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tiffin_menu`
--

CREATE TABLE IF NOT EXISTS `tiffin_menu` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_desc` varchar(255) DEFAULT NULL,
  `menu_items` varchar(255) DEFAULT NULL,
  `menu_price` int(11) DEFAULT NULL,
  `tiffinvo_tiffin_id` int(11) DEFAULT NULL,
  `typevo_type_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`menu_id`),
  KEY `tiffinvo_tiffin_id` (`tiffinvo_tiffin_id`),
  KEY `typevo_type_id` (`typevo_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tiffin_menu`
--

INSERT INTO `tiffin_menu` (`menu_id`, `menu_desc`, `menu_items`, `menu_price`, `tiffinvo_tiffin_id`, `typevo_type_id`) VALUES
(1, 'Chapati Roti, Kobi Sabji', 'Roti, Sabji, Dal, Bhat', 70, 1, 1),
(2, 'Sev-Tameta', 'Bhakhri, Khichdi, Chhash, Sabji', 70, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE IF NOT EXISTS `type` (
  `type_id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`type_id`, `type_name`) VALUES
(1, 'Lunch'),
(2, 'Dinner');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) DEFAULT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `user_flag` int(11) DEFAULT NULL,
  `user_mobile` int(255) DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `user_password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `image`, `user_email`, `user_flag`, `user_mobile`, `user_name`, `user_password`) VALUES
(1, 'Paldi, Ahmedabad', 'lalsthecake@gmail.com', 1, 2147483647, 'Vadil_Mehta', 'darshil'),
(2, 'Kudasan, Gandhinagar', 'nileshthakkar@gmail.com', 1, 2147483647, 'Nilesh_Thakkar', 'nilesh'),
(13, 'Priyansh', 'priyanshsheth1997@gmail.com', 3, 123, 'Priyansh', '123'),
(15, 'Paldi, Ahmedabad', 'lalsthecake@gmail.com', 2, 2147483647, 'Vadil_Mehta', 'darshil');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tiffinwala`
--
ALTER TABLE `tiffinwala`
  ADD CONSTRAINT `tiffinwala_ibfk_1` FOREIGN KEY (`cityvo_city_id`) REFERENCES `city` (`city_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tiffinwala_ibfk_2` FOREIGN KEY (`uservo_user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tiffin_menu`
--
ALTER TABLE `tiffin_menu`
  ADD CONSTRAINT `tiffin_menu_ibfk_1` FOREIGN KEY (`tiffinvo_tiffin_id`) REFERENCES `tiffinwala` (`tiffin_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tiffin_menu_ibfk_2` FOREIGN KEY (`typevo_type_id`) REFERENCES `type` (`type_id`) ON DELETE CASCADE ON UPDATE CASCADE;
