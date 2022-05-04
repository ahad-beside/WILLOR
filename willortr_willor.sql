-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 17, 2019 at 09:02 AM
-- Server version: 5.6.44
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `willortr_willor`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `name`) VALUES
(1, 'admin@gmail.com', '$2y$11$h9q.ilOMzGBlwAWaMJ47eOr2OoxIEahNQit3VSsPmrKRMo0nL6vUe', 'hassan shahid');

-- --------------------------------------------------------

--
-- Table structure for table `transfers`
--

CREATE TABLE `transfers` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `receiverbank` varchar(255) NOT NULL,
  `receiveraccount` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `finishdate` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `ttype` varchar(255) NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transfers`
--

INSERT INTO `transfers` (`id`, `userid`, `amount`, `receiverbank`, `receiveraccount`, `date`, `finishdate`, `type`, `status`, `ttype`, `purpose`, `country`) VALUES
(1, 1, '500', 'Bank', '444444444444', '2019-04-01', '2019-04-23', 'local', '0', 'debit', 'LOAN', ''),
(2, 1, '250', 'Bank', '444444444444', '2019-04-15', '2019-05-15', 'international', '0', 'debit', 'Loan', 'Pakistan'),
(4, 3, '650', 'Sunny', '1323131231321', '2019-04-22', '2019-04-22', '', '1', 'credit', '', ''),
(5, 3, '600', 'Bank', '444444444444', '2019-04-15', '2019-04-20', 'local', '0', 'debit', 'Test', ''),
(6, 1, '1000', 'Sunny', '123123123123', '2019-04-23', '2019-04-23', '', '1', 'credit', '', ''),
(7, 6, '10000', 'GT Bank', '350532229940', '2019-04-23', '2019-04-23', '', '1', 'credit', 'business', ''),
(8, 6, '500', 'willortrust', '4444333322221111', '2019-04-23', '2019-05-11', 'local', '0', 'debit', 'Goods Shipment to Africa', ''),
(9, 6, '3000', 'Fiderlity', 'Personal Deposite', '2019-04-23', '2019-04-23', '', '1', 'credit', 'funds meeting', ''),
(10, 6, '2000', 'willortrust', 'James Lim', '2019-04-23', '2019-04-24', 'local', '0', 'debit', 'business', ''),
(11, 7, '200000', 'WT', 'WT-Deposit', '2019-04-25', '2019-04-25', '', '1', 'credit', 'Deposit', ''),
(12, 6, '8000', 'willortrust', 'James Lim', '2019-05-04', '2019-06-20', 'local', '0', 'debit', 'business', ''),
(13, 9, '260000', 'FT', 'FederalTrust deposit', '2019-05-04', '2019-05-04', '', '1', 'credit', 'deposit', ''),
(14, 10, '100000', 'FEDERALTRUST', '2077045821', '2019-05-06', '2019-05-06', '', '1', 'credit', 'CREDITED', ''),
(15, 10, '10000', 'ZENITH', '2178025706', '2019-05-06', '2019-05-07', 'local', '0', 'debit', 'CREDITED', ''),
(16, 10, '10000', 'ZENITH', '2178025706', '2019-05-06', '2019-07-16', 'local', '0', 'debit', 'CREDITED', ''),
(17, 12, '100000', 'FEDERALTRUST', 'FEDERALTRUST', '2019-05-07', '2019-05-07', '', '1', 'credit', 'CREDITED', ''),
(18, 12, '100000', 'FEDERALTRUST', 'FEDERALTRUST', '2019-05-07', '2019-05-07', '', '1', 'credit', 'CREDITED', ''),
(19, 11, '120000', 'FEDERALTRUST', 'FEDERALTRUST', '2019-05-07', '2019-05-07', '', '1', 'credit', 'CREDITED', ''),
(20, 31, '45000', 'GT Bank', '98765456789', '2019-06-16', '2019-06-16', '', '1', 'credit', 'business', ''),
(21, 31, '1200000', 'ddd', 'WT-Deposit', '2019-06-16', '2019-06-16', '', '1', 'credit', 'Deposit', ''),
(22, 31, '5000', 'willortrust', 'James Lim', '2019-06-16', '', 'local', '0', 'debit', 'personal deposit', ''),
(23, 33, '12300900', 'GT Bank', '9482211', '2019-06-17', '2019-06-17', '', '1', 'credit', 'Deposit', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `bdate` varchar(200) NOT NULL,
  `address` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `country` varchar(200) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `accountno` varchar(255) DEFAULT NULL,
  `pics` longblob NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `pin` varchar(4) NOT NULL,
  `balance` varchar(255) NOT NULL DEFAULT '0',
  `role` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `accounttype` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `gender`, `bdate`, `address`, `state`, `city`, `zip`, `country`, `phone`, `accountno`, `pics`, `email`, `password`, `pin`, `balance`, `role`, `status`, `accounttype`) VALUES
(16, 'Dan', 'Willor', '', '', '', '', '', '', '', '', '', '', 'willortrust@gmail.com', '$2y$11$n7qQRo49xnvGW7m3PVeAn.XcotiAqEQGZbwVyHgB0pQowT0nHFAH.', '', '0', 'user', 0, ''),
(17, 'Simono', 'forson', '', '', '', '', '', '', '', '', '', '', 'simono@gmail.com', '$2y$11$/ijXM4Ab2AupXvaL9khzXuMyYdgTZxZa8xRSmnWFpdRJejqUQQLHW', '', '0', 'user', 0, ''),
(18, 'abi', 'brimpomah', 'Female', '1988-01-17', 'klabfklebglkbsdkb kvbsvklsbvsdkh kbvlkbskj', 'afagsgs', 'sadds', '00333', 'France', '', '', 0x39324445424631372d463746302d343838442d393638422d4543363242334238413145312e6a7067, 'bibibi@gmail.com', '$2y$11$ooPpjgqvzUOElNSlPXPid.vYZuxeIcoq4gVbjLWOYPPUJ9zAcPbEK', '$2y$', '0', 'user', 0, 'DOLLAR ACCOUNT'),
(19, 'Francis ', 'Minsih', 'male', '2000-01-01', 'p.o.box.k.t.152', 'Accra', 'accra', '00233', 'Ghana', '207962747', '', 0x39324445424631372d463746302d343838442d393638422d4543363242334238413145312e6a7067, 'francisminsih@gmail.com', '$2y$11$iBYNDJHcmBLnJ5H.TituF.AYlQUvlWCN0t9dpR.rY/W5yzCQ/QaRG', '$2y$', '0', 'user', 0, 'DOLLAR ACCOUNT'),
(20, 'justina', 'aidoo', 'Female', '2000-01-01', 'kings Town, Astra. Germany.', 'Accra', 'Accra', '00233', 'Ghana', '', '', 0x39324445424631372d463746302d343838442d393638422d4543363242334238413145312e6a7067, 'tinaaidoo@gmail.com', '$2y$11$6aOrJQ2J4V5N.AruDR29aelEiL9XJ5Ohq3/ij6lSXi597/acYSzg2', '$2y$', '0', 'user', 0, 'EURO ACCOUNT'),
(21, 'ikono', 'erooo', 'male', '2000-01-01', 'p.o.box.k.t.152', 'Accra', 'accra', '00233', 'Ghana', '207962747', '', 0x5f4d475f303532302e6a7067, 'fillo@gmail.com', '$2y$11$.0NvlKuird3nKbEHZc91rOFVvseYTnMgdNDQP338g36hirEqUSZ.C', '$2y$', '0', 'user', 0, 'DOLLAR ACCOUNT'),
(23, 'martha', 'aidoo', 'male', '2000-01-01', 'kings Town, Astra. Germany.', 'Accra', 'Accra', '00233', 'Ghana', '400503030', '33044499921MN', 0x39324445424631372d463746302d343838442d393638422d4543363242334238413145312e6a7067, 'ducee89@gmail.com', '$2y$11$QQnvFO60CwhRbIZRBJT/d.X8XTDk2ObOUTN18x.3ZJbWfIdh3zf32', '$2y$', '0', 'user', 1, 'DOLLAR ACCOUNT'),
(24, 'nuru', 'alhasan', 'male', '2000-01-01', 'kings Town, Astra. Germany.', 'Accra', 'Accra', '00233', 'Ghana', '400503030', 'WT200134987', 0x39324445424631372d463746302d343838442d393638422d4543363242334238413145312e6a7067, 'nurudeen@gmail.com', '$2y$11$r7xtPJVnA.qYobDSrbpWIuvZYewQRzlHpLJ3jcq6RodXzoeF6fhA6', '$2y$', '0', 'user', 1, 'DOLLAR ACCOUNT'),
(25, 'Gif', 'Quansah', 'male', '2000-01-01', 'kings Town, Astra. Germany.', 'Accra', 'ho', '00233', 'Ghana', '400503030', '095544123455', 0x6a6f73682e6a7067, 'phonebook@gmail.com', '$2y$11$sKbf53Inpiy5ji2ImEGZ9.Dycye0wMF0QsOvypoyzLbjwzQ5/Fr3O', '4040', '0', 'user', 1, 'DOLLAR ACCOUNT'),
(26, 'efoo', 'Wilson', 'male', '2000-01-01', 'kings Town, Astra. Germany.', 'Accra', 'Accra', '00233', 'Ghana', '453342221', '03118399322', 0x39324445424631372d463746302d343838442d393638422d4543363242334238413145312e6a7067, 'ffff@gmail.com', '$2y$11$1AX.OugDnDz1ifRHOK23UOVNqWxs..g7f845TYss9USdMal4oBKx2', '$2y$', '0', 'user', 0, 'EURO ACCOUNT'),
(27, 'Gifty', 'Obeng', 'Female', '1994-02-09', 'weija-broadcasting', 'Accra', 'Accra', 'Accra 00234', 'Ghana', '547150168', 'WT203015768302', 0x6162692e504e47, 'kukuaasaaba@mail.com', '$2y$11$Eh659MMx2RauLsA1O/1DPOF1pFBmBqbsD38.jZd07jm4jie8uHSj2', '2020', '0', 'user', 1, 'EURO ACCOUNT'),
(28, 'Rosina', 'Agyapong', 'Female', '1996-02-28', 'Barrier-Kasoa', 'Accra', 'Accra', '00205', 'Ghana', '0249692199', 'WT5053448756', 0x73697a6564322e6a7067, 'info@clustersmash.net', '$2y$11$qrwTaY6djCp4GoZiprAPQu0XgnLrj8IF8GMFybZvto/bGCa5j/i9y', '1234', '0', 'user', 1, 'EURO ACCOUNT'),
(29, 'jessy', 'Aidoo', 'male', '2000-01-01', 'p.o.box.k.t.152', 'Accra', 'accra', '00233', 'Ghana', '207962747', NULL, '', 'joshuaaidoo@gmail.com', '$2y$11$4BMarUXcQaKF1oxSsh6T9OMPZfWQTk3fh55qgfIajSlaaphnPniWy', 'dddd', '0', 'user', 0, 'DOLLAR ACCOUNT'),
(30, 'ISHMEAL', 'MELLO', 'male', '1997-01-01', 'weija-broadcasting', 'Accra', 'Accra', 'Accra 00234', 'Ghana', '045532291', '111111112211012', 0x6a6f73682e6a7067, 'SHAMMMA@MAIL.COM', '$2y$11$DvYkv.yGq1nRRfVdVHWwE.ZY1kcj/4gfuA8JyEM04/oiJ5A2UgTAu', '3232', '0', 'user', 1, '$'),
(31, 'NII', 'QUASSI', 'male', '1996-04-04', 'amanfrom toptown curve', 'centra ', 'kasoa centra ', 'Accra 00234', 'Ghana', '34502349111', '333333333945', 0x706c616365686f6c6465722e706e67, 'niiiii@mail.com', '$2y$11$2uHWStA2T8XPQh0ZWPjTWuVCXaTkT0s4u2QQTtp865IuQV/D3n2.a', '1111', '1240000', 'user', 1, '&euro;'),
(32, 'rajib', 'rajib', 'Female', '2000-01-01', 'BD', 'MIR', 'DH', '1216', 'BD', '01735121212', NULL, 0x3939303331363738385f6f2e6a7067, 'rrakhmit@gmail.com', '$2y$11$HDpaU0EWIXAO0ajRczIvYu6daR8f.gwm4D2pluOPSL0uJUBuFJQz.', '1234', '0', 'user', 0, '$'),
(33, 'ALEXANDRA', 'WINSON', 'male', '1996-02-29', 'Plot # 192.\r\nBoulevard RoadWest Legon\r\nAccra-Ghana\r\nP. 0. Box GP 14.481.', 'ACCRA', 'ACCRA', '00233', 'GHANA', '0207962747', 'WT19222229111233', 0x35393936396634633865333137663562393830323130616163653133393163612e6a7067, 'admin@readyoilghana.com', '$2y$11$blj7D3/VLdr9DwK9ej2u5emrW9iVIchQO1nx1n650wnM8O8zB8vty', '0101', '12300900', 'user', 1, '$');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transfers`
--
ALTER TABLE `transfers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transfers`
--
ALTER TABLE `transfers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
