-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2016 at 01:23 PM
-- Server version: 5.5.39
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `connectu_user_map`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
`category_id` int(20) unsigned NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `icon_name` varchar(50) DEFAULT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=115 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `icon_name`, `status`) VALUES
(1, 'Others', '', 1),
(2, 'Hospitals', 'hospital', 1),
(3, 'Religious Places', 'religious_places', 1),
(4, 'Schools', '', 0),
(5, 'Colleges', '', 0),
(6, 'Institutions', '', 0),
(7, 'Fire Brigade', 'fire_brigade', 0),
(8, 'Blood Bank', 'blood_bank', 0),
(9, 'Banks', 'bank', 0),
(10, 'Patpedhi', '', 0),
(11, 'Bus stops', 'bus_stop', 1),
(12, 'Rikshaw Stand', '', 0),
(13, 'Medical Stores', 'medical_stores', 0),
(14, 'Beach', 'beach', 0),
(15, 'Picnic Spots', '', 0),
(16, 'Major Landmarks', '', 0),
(17, 'Public Toilets', 'public_toilets', 0),
(18, 'Shopping Malls', 'shopping', 0),
(19, 'ATMs', 'atm', 1),
(20, 'Restaurants', 'restaurants', 1),
(21, 'Post Offices', 'post_office', 0),
(22, 'Lounge', '', 0),
(23, 'Bus Depots', 'bus_depot', 0),
(24, 'Railway Stations', 'railway_station', 0),
(25, 'Bars', 'bar', 0),
(26, 'Wine Shops', 'wine_shop', 1),
(27, 'Beer Shops', 'beer_shop', 1),
(28, 'General Practitionars', 'hospital', 0),
(29, 'Specialist Doctors', 'doctor', 1),
(30, 'Pathological Labs', 'hospital', 0),
(31, 'Aadhar Card Center', '', 0),
(32, 'Government Offices', '', 0),
(33, 'Market Places', 'shopping', 0),
(37, 'Banking Agent', '', 1),
(38, 'Auto Care', 'auto_care', 1),
(39, 'Baby Sitting', '', 1),
(40, 'Banquet Hall', '', 0),
(41, 'Car Rental', 'car', 1),
(42, 'Caterers', '', 1),
(43, 'Contractors', '', 1),
(44, 'Plumber', 'plumber', 1),
(45, 'Electrician', 'electrician', 1),
(46, 'Carpenter', 'carpenter', 1),
(47, 'Fabrocator', 'isp', 1),
(48, 'Painter', '', 1),
(49, 'Mason', 'isp', 1),
(50, 'Activity Classes', '', 0),
(51, 'Dance Teacher', '', 1),
(52, 'Music Teacher', '', 1),
(53, 'Yoga Teacher', '', 1),
(54, 'Karate Classes', '', 0),
(55, 'Drawing Teacher', '', 1),
(56, 'Photography Teacher', '', 1),
(57, 'Language Teacher', '', 1),
(58, 'Coaching Classes', '', 0),
(59, 'Event Manager', '', 1),
(60, 'Florist', '', 1),
(61, 'House keeping', 'house_keeping', 1),
(62, 'Cook', '', 1),
(63, 'Maid', 'maid', 1),
(64, 'Driver', 'driver', 1),
(65, 'Gardener', 'isp', 1),
(66, 'Laundryman', 'isp', 1),
(67, 'House Cleaner', 'house_keeping', 1),
(68, 'Pest Control', 'pest_control', 0),
(69, 'Insurance Agent', '', 1),
(70, 'Internet Service', 'internet', 0),
(71, 'Transport Services', 'transport', 0),
(72, 'Tempo', 'transport', 1),
(73, 'Rickshaw', 'rickshaw', 1),
(74, 'DJ Service', '', 1),
(75, 'Photographers', '', 1),
(76, 'Personal Care', '', 1),
(77, 'Beautician', '', 1),
(79, 'Real Estate Agent', '', 1),
(80, 'AC Mechanic', 'isp', 1),
(81, 'Security Guard', 'isp', 1),
(82, 'Computer Hardware ', 'computer', 0),
(83, 'Network & Security', 'internet', 1),
(84, 'Tours & Travels', '', 0),
(85, 'Travel Agent', '', 1),
(86, 'School Picnic Organizer', '', 0),
(87, 'Building Material Supplier', '', 0),
(88, 'Architect and Surveyor', '', 1),
(89, 'Art & Craft', '', 0),
(90, 'Motor Driving School', '', 0),
(91, 'Website Developers', '', 1),
(92, 'Free lance Web Developers', '', 1),
(93, 'Graphic Designer', '', 1),
(95, 'Free lance Graphic Designers', '', 1),
(96, 'Printers', 'printers', 0),
(97, 'Drinking Water Suppliers', '', 0),
(98, 'Calligrapher', '', 1),
(99, 'Writer', '', 1),
(100, 'Nurse', '', 1),
(101, 'Artist Painter', '', 1),
(102, 'Sculptor', '', 1),
(103, 'Stage decorator', '', 1),
(104, 'Centre piece maker', '', 1),
(106, 'Singer', '', 1),
(108, 'Mehendi artist', '', 1),
(110, 'Gym trainer', '', 1),
(111, 'Key maker', '', 1),
(113, 'Police Station', 'police_station', 1),
(114, 'Interior Designer', 'isp', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE IF NOT EXISTS `sub_category` (
`sub_cat_id` int(20) NOT NULL,
  `sub_category_name` varchar(50) NOT NULL,
  `category_id` int(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=93 ;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`sub_cat_id`, `sub_category_name`, `category_id`) VALUES
(1, 'Nursing Home', 2),
(2, 'Maternity ', 2),
(3, 'Multi-speciality', 2),
(4, 'Church', 3),
(5, 'Temple', 3),
(6, 'Gurudwara', 3),
(7, 'Masjid', 3),
(8, 'Physician', 28),
(9, 'Family Doctors', 28),
(10, 'Dentists', 29),
(11, 'Cardiologists', 29),
(12, 'ENT Spcialist', 29),
(13, 'Child Specialist', 29),
(14, 'Panchayat Samitee', 32),
(15, 'Thasildar Office', 32),
(16, 'Court', 32),
(17, 'VVMC Offices', 32),
(18, 'Ward Offices', 32),
(19, 'Fish Market', 33),
(20, 'Vegetable Market', 33),
(21, 'Home Loans', 37),
(22, 'Car Loans', 37),
(23, 'Personal Loans', 37),
(24, 'Educational Loans', 37),
(25, 'Loan Against Gold', 37),
(26, 'Credit Cards', 37),
(27, 'Saving', 37),
(28, 'Fixed Deposit', 37),
(29, 'Two Wheeler Accessories', 38),
(30, 'Car Repair', 38),
(31, 'Car Tyres', 38),
(32, 'Car Batteries', 38),
(33, 'Car Accessories', 38),
(34, 'Car Wash', 38),
(35, 'Motorcycle Repair', 38),
(36, 'Scooter Repair', 38),
(37, 'Two Wheeler Tyres', 38),
(38, 'Two Wheeler Batteries', 38),
(39, 'All Caterers', 42),
(40, 'Office Caterers', 42),
(41, 'Birthday Party ', 42),
(42, 'Party', 42),
(43, 'Wedding', 42),
(44, 'Carpentry', 43),
(45, 'Civil', 43),
(46, 'Electrical', 43),
(47, 'Flooring', 43),
(48, 'Furniture', 43),
(49, 'Painting', 43),
(50, 'Plumbing', 43),
(51, 'Fabrictors', 43),
(52, 'Dance', 50),
(53, 'Music', 50),
(54, 'Singing', 50),
(55, 'Yoga', 50),
(56, 'Karate', 50),
(57, 'Drawing', 50),
(58, 'Photography', 50),
(59, 'Language', 50),
(60, 'Bank Exam Tutorials', 58),
(61, 'CA Tutorials', 58),
(62, 'CAT Tutorials', 58),
(63, 'CPT Tutorials', 58),
(64, 'CS Tutorials', 58),
(65, 'Engineering Tutorials', 58),
(66, 'IIT Tutorials', 58),
(67, 'Tutorials For Class X', 58),
(68, 'Tutorials For Class XII', 58),
(69, 'Tutorials For GATE', 58),
(70, 'Wedding Organizers', 59),
(71, 'Event Organizers', 59),
(72, 'Caterers', 59),
(73, 'Corporate Parties', 59),
(74, 'Private Parties', 59),
(75, 'Seminar Organizers', 59),
(76, 'Stage Show Organizers', 59),
(77, 'Trade Fair Organizers', 59),
(78, 'Cooks', 61),
(79, 'Maids', 61),
(80, 'Drivers', 61),
(81, 'Gardeners', 61),
(82, 'Laundry Services', 61),
(83, 'Cleaning Services', 61),
(84, 'Pest Control', 61),
(85, 'Beauty Services', 77),
(86, 'Bridal Makeup', 77),
(87, 'Bridegroom Makeup', 77),
(88, 'Salons', 77),
(89, 'Spas', 77),
(90, 'Beauty Parlours', 77),
(91, 'CCTV Camera and Network', 83),
(92, 'Interior designing', 43);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `status`) VALUES
(1, 'admin', 'admin', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `user_registration`
--

CREATE TABLE IF NOT EXISTS `user_registration` (
`id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `photo` longtext NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` int(11) NOT NULL,
  `new_category` varchar(255) NOT NULL,
  `subcategory` int(11) NOT NULL,
  `new_subcategory` varchar(255) NOT NULL,
  `address` longtext NOT NULL,
  `mobile` bigint(15) NOT NULL,
  `latitute` longtext NOT NULL,
  `longitude` longtext NOT NULL,
  `verified` int(1) NOT NULL DEFAULT '0' COMMENT '1=Yes, 0=No',
  `remark` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
 ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
 ADD PRIMARY KEY (`sub_cat_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_registration`
--
ALTER TABLE `user_registration`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
MODIFY `category_id` int(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=115;
--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
MODIFY `sub_cat_id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=93;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user_registration`
--
ALTER TABLE `user_registration`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
