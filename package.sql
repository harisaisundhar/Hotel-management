

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `package`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE IF NOT EXISTS `bill` (
  `r_id` int(11) NOT NULL,
  `name` char(30) NOT NULL,
  `room_cost` int(11) NOT NULL,
  `laundry_cost` int(11) NOT NULL,
  `sw_cost` int(11) NOT NULL,
  `meals_cost` int(11) NOT NULL,
  PRIMARY KEY (`r_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`r_id`, `name`, `room_cost`, `laundry_cost`, `sw_cost`, `meals_cost`) VALUES
(12, '', 0, 0, 0, 0),
(34, '', 0, 0, 0, 0),
(57, '', 0, 0, 0, 0),
(241, '', 0, 0, 0, 0),
(324, '', 0, 0, 0, 0),
(768, '', 0, 0, 0, 0),
(1234, 'oviya', 3000, 400, 100, 5300),
(5562, '', 0, 0, 0, 200),
(8980, '', 0, 0, 0, 0),
(8989, '', 0, 0, 0, 0),
(9999, '', 0, 0, 0, 0),
(12358, '', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `room_no` int(11) NOT NULL,
  `feedback` varchar(300) NOT NULL,
  `r_id` int(11) NOT NULL,
  PRIMARY KEY (`r_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--


-- --------------------------------------------------------

--
-- Table structure for table `laundry`
--

CREATE TABLE IF NOT EXISTS `laundry` (
  `l_id` int(11) NOT NULL,
  `r_id` int(11) NOT NULL,
  `no_of_clothes` int(11) NOT NULL,
  `total_charge` int(11) NOT NULL,
  `given_date` date NOT NULL,
  `due_date` date NOT NULL,
  `type` varchar(20) NOT NULL,
  `service` char(20) NOT NULL,
  PRIMARY KEY (`l_id`),
  KEY `r_id` (`r_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laundry`
--

INSERT INTO `laundry` (`l_id`, `r_id`, `no_of_clothes`, `total_charge`, `given_date`, `due_date`, `type`, `service`) VALUES
(9003, 1234, 15, 300, '2012-05-17', '2012-05-19', 'cotton', 'wash and iron'),
(9009, 2345, 20, 500, '2012-09-27', '2012-11-02', 'linen', 'wash'),
(9023, 3456, 5, 200, '2013-01-16', '2013-01-19', 'silk', 'dry clean'),
(9045, 4567, 14, 150, '2013-04-02', '2013-04-05', 'cotton', 'wash'),
(9089, 4567, 12, 120, '2013-04-15', '2013-04-19', 'cotton', 'wash and iron'),
(9123, 4567, 10, 300, '2013-05-15', '2013-05-19', 'linen', 'wash and iron'),
(9456, 4567, 25, 400, '2013-05-26', '2013-05-29', 'linen', 'wash'),
(9765, 6789, 4, 100, '2014-03-12', '2014-03-13', 'linen', 'dry clean'),
(9989, 6789, 5, 300, '2014-03-14', '2014-03-15', 'silk', 'dry clean'),
(9999, 8901, 18, 450, '2015-05-22', '2015-05-24', 'cotton', 'wash and iron');

--
-- Triggers `laundry`
--
DROP TRIGGER IF EXISTS `laundry_trig`;
DELIMITER //
CREATE TRIGGER `laundry_trig` AFTER INSERT ON `laundry`
 FOR EACH ROW UPDATE bill set laundry_cost=laundry_cost+new.total_charge where r_id=new.r_id
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `look_up`
--

CREATE TABLE IF NOT EXISTS `look_up` (
  `r_id` int(11) NOT NULL,
  `room_no` int(11) NOT NULL,
  PRIMARY KEY (`r_id`),
  KEY `room_no` (`room_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `look_up`
--

INSERT INTO `look_up` (`r_id`, `room_no`) VALUES
(1234, 1),
(2345, 2),
(3456, 3),
(4567, 4),
(5678, 17);

-- --------------------------------------------------------

--
-- Table structure for table `meals`
--

CREATE TABLE IF NOT EXISTS `meals` (
  `c_id` int(11) NOT NULL,
  `r_id` int(11) NOT NULL,
  `cuisine` varchar(40) NOT NULL,
  `cost` int(11) NOT NULL,
  PRIMARY KEY (`c_id`),
  KEY `r_id` (`r_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meals`
--

INSERT INTO `meals` (`c_id`, `r_id`, `cuisine`, `cost`) VALUES
(1, 4567, 'Continental', 2000),
(2, 1234, 'indian', 90000),
(5, 7890, 'American', 6000),
(8, 8901, 'Chinese', 4000),
(12, 9345, 'Continental', 5000),
(34, 1234, 'Indian', 3000),
(77, 5562, 'canaidian', 200),
(87, 3456, 'Italian', 5000),
(89, 1234, 'indian', 300),
(90, 1234, 'American', 6000),
(138, 4567, 'Chinese', 7000),
(999, 8901, 'Indian', 6700),
(1097, 3456, 'Indian', 9000);

--
-- Triggers `meals`
--
DROP TRIGGER IF EXISTS `bill_trig`;
DELIMITER //
CREATE TRIGGER `bill_trig` AFTER INSERT ON `meals`
 FOR EACH ROW UPDATE bill set meals_cost=meals_cost+new.cost where r_id=new.r_id
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE IF NOT EXISTS `register` (
  `r_id` int(11) NOT NULL,
  `name` varchar(40) DEFAULT NULL,
  `address` varchar(70) NOT NULL,
  `check_in_date` date NOT NULL,
  `contact` int(10) DEFAULT NULL,
  `nationality` varchar(30) NOT NULL,
  `email` varchar(70) DEFAULT NULL,
  `check_out_date` date NOT NULL,
  `room_type` varchar(40) NOT NULL,
  PRIMARY KEY (`r_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`r_id`, `name`, `address`, `check_in_date`, `contact`, `nationality`, `email`, `check_out_date`, `room_type`) VALUES
(12, 'pavishna', '90 college road', '0000-00-00', 97657300, 'americain', 'pavi98@gmail.com', '0000-00-00', 'suite'),
(324, 'gfb', 'renrtn', '0000-00-00', 2147483647, '3dfsb', '235', '0000-00-00', 'dfbsb'),
(1110, 'Kumudha', 'abc', '2012-04-16', 2147483647, 'indian', 'o@gmail.com', '0000-00-00', 'queen'),
(1234, 'Raghav', '12,rajiv street,chennai', '2012-05-16', 987603213, 'Indian', 'raghav_rr@gmail.com', '2016-10-26', 'single'),
(2345, 'Richard', 'Florida', '2012-09-26', 65247390, 'American', 'richard_9837@hotmail.com', '2012-10-10', 'single'),
(3456, 'Santhosi', '245/9,vishwa apartment,Bangalore', '2013-01-10', 2147483647, 'Indian', 'san_sat@gmail.com', '2013-01-20', 'Double'),
(4567, 'John', 'Italy', '2013-04-01', 56882990, 'Italian', 'john_it@rediff.com', '2013-05-01', 'Single'),
(5562, 'prithivi', '67,perundurai', '2016-04-07', 2147483647, 'indian', 'pp@gmail.com', '2016-05-01', 'queen'),
(5678, 'Kavya', 'Trichi', '2016-10-19', 89076445, 'Indian', 'kavya_546@gmail.com', '2016-10-25', 'Double'),
(6789, 'Arjun', 'Kerala', '2014-03-11', 98754567, 'Indian', 'arjun_cha@gmail.com', '2014-03-16', 'Queen'),
(7890, 'Nila', 'Delhi', '2014-07-31', 989754547, 'Indian', 'nilamn@gmail.com', '2014-08-02', 'Suite'),
(8901, 'Amara', 'Karnataka', '2015-05-21', 908090077, 'Indian', 'amaraa@gmail.com', '2015-05-24', 'Double'),
(8980, 'sreedee', 'hopes college', '0009-03-16', 994065969, 'canadian', 'sreedee@dee.com', '0000-00-00', 'suite'),
(8989, 'sreedee', 'hopes college', '0009-03-16', 2147483647, 'canadian', 'sreedee@dee.com', '0000-00-00', 'suite'),
(9012, 'Ananya', 'Hyderabad', '2015-09-23', 78990665, 'Indian', 'ananya_ravi@gmail.com', '2015-09-25', 'Suite'),
(9345, 'Krishna', 'Coimbatore', '2016-02-12', 89068690, 'Indian', 'krish@gmail.com', '2016-02-14', 'single'),
(9866, 'oviya', '58,kre layout', '0000-00-00', 2147483647, 'indian', 'oviya@gmail.com', '0000-00-00', 'suite'),
(12358, 'shri', 'gfg', '0000-00-00', 0, 'skdfjhs', 'jhjgjgj', '0000-00-00', 'fgfhgh');

--
-- Triggers `register`
--
DROP TRIGGER IF EXISTS `update_trig`;
DELIMITER //
CREATE TRIGGER `update_trig` AFTER INSERT ON `register`
 FOR EACH ROW INSERT INTO bill (r_id) VALUES (new.r_id)
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE IF NOT EXISTS `room` (
  `room_no` int(11) NOT NULL,
  `status` char(1) NOT NULL,
  PRIMARY KEY (`room_no`),
  KEY `room_no` (`room_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_no`, `status`) VALUES
(1, 'A'),
(2, 'A'),
(3, 'N'),
(4, 'A'),
(5, 'A'),
(6, 'N'),
(7, 'N'),
(8, 'N'),
(9, 'N'),
(10, 'A'),
(11, 'N'),
(12, 'N'),
(13, 'A'),
(14, 'A'),
(15, 'A'),
(16, 'A'),
(17, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `swimming_pool`
--

CREATE TABLE IF NOT EXISTS `swimming_pool` (
  `sw_id` int(11) NOT NULL,
  `r_id` int(11) NOT NULL,
  `duration` int(11) NOT NULL,
  PRIMARY KEY (`sw_id`),
  KEY `r_id` (`r_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `swimming_pool`
--

INSERT INTO `swimming_pool` (`sw_id`, `r_id`, `duration`) VALUES
(111, 2345, 3),
(222, 2345, 2),
(333, 3456, 5),
(444, 3456, 6),
(555, 4567, 6),
(666, 4567, 7),
(777, 7890, 1),
(888, 4567, 8),
(999, 9012, 4),
(1010, 4567, 3);

--
-- Triggers `swimming_pool`
--
DROP TRIGGER IF EXISTS `sw_trig`;
DELIMITER //
CREATE TRIGGER `sw_trig` AFTER INSERT ON `swimming_pool`
 FOR EACH ROW UPDATE bill set sw_cost=sw_cost+(new.duration*100) where r_id=new.r_id
//
DELIMITER ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `laundry`
--
ALTER TABLE `laundry`
  ADD CONSTRAINT `laundry_ibfk_1` FOREIGN KEY (`r_id`) REFERENCES `register` (`r_id`);

--
-- Constraints for table `meals`
--
ALTER TABLE `meals`
  ADD CONSTRAINT `meals_ibfk_1` FOREIGN KEY (`r_id`) REFERENCES `register` (`r_id`);

--
-- Constraints for table `swimming_pool`
--
ALTER TABLE `swimming_pool`
  ADD CONSTRAINT `swimming_pool_ibfk_1` FOREIGN KEY (`r_id`) REFERENCES `register` (`r_id`);
