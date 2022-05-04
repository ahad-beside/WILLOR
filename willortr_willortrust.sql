-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 17, 2019 at 09:06 AM
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
-- Database: `willortr_willortrust`
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
(16, 10, '10000', 'ZENITH', '2178025706', '2019-05-06', '2019-06-26', 'local', '0', 'debit', 'CREDITED', ''),
(17, 12, '100000', 'FEDERALTRUST', 'FEDERALTRUST', '2019-05-07', '2019-05-07', '', '1', 'credit', 'CREDITED', ''),
(18, 12, '100000', 'FEDERALTRUST', 'FEDERALTRUST', '2019-05-07', '2019-05-07', '', '1', 'credit', 'CREDITED', ''),
(19, 11, '120000', 'FEDERALTRUST', 'FEDERALTRUST', '2019-05-07', '2019-05-07', '', '1', 'credit', 'CREDITED', ''),
(20, 9, '20000000', 'GT Bank', '350532229940', '2019-05-27', '2019-05-27', '', '1', 'credit', 'business', ''),
(21, 8, '300000000', 'Fiderlity', 'Personal Deposite', '2019-05-27', '2019-05-27', '', '1', 'credit', 'funds meeting', ''),
(22, 8, '300000000', 'Fiderlity', 'Personal Deposite', '2019-05-27', '2019-05-27', '', '1', 'credit', 'funds meeting', ''),
(23, 15, '100000000', 'Fiderlity', 'Personal Deposite', '2019-05-28', '2019-05-28', '', '1', 'credit', 'deposit', ''),
(24, 8, '900', 'willortrust', 'James Lim', '2019-06-02', '', 'local', '0', 'debit', 'business', ''),
(25, 8, '90000000', 'willortrust', 'TIN356678889977', '2019-06-02', '', 'local', '0', 'debit', 'Goods Shipment to Africa', ''),
(26, 15, '45000', 'kjbklbkh', 'lknbkjbkjbkjhkblkhbhb', '2019-06-10', '2019-06-10', '', '1', 'credit', 'ljbhklgbkhj', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `accountno` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `pin` varchar(255) NOT NULL,
  `balance` varchar(255) NOT NULL DEFAULT '0',
  `role` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `address`, `state`, `city`, `zip`, `phone`, `accountno`, `email`, `password`, `pin`, `balance`, `role`, `status`) VALUES
(6, 'Robert', 'Hawkins', '61 Bridge Street, Kington, Herefordshire HR5 3DJ', 'london', 'Pool', '304', '0241705044', '33044499921MN', 'jonquilarine@gmail.com', '$2y$11$boq.7QKPKiE8WAKIcwa5WOIs38HdgNEIApJoJQT0thbndJDoDPTWK', '4455', '2500', 'user', 1),
(8, 'Dan', 'Willor', '423 Brintnell Blvd, Edmonton', 'Edmonton', 'Edmonton', 'T5A 0A7', '7808077528', '1234567890', 'hassanrrs@gmail.com', '$2y$11$2WuLUO6DbW8C4IOJ/Lqpsu24KFGAqBepEJozHYJ.cQ1iXsugQNMLy', '', '509999100', 'user', 1),
(9, 'peter', 'loin', '', '', '', '', '', 'TIN356678889977', 'kwamegyesi88@gmail.com', '$2y$11$RuukIK7aNhT2r4Iil3iCnOFZZyRLUyuNtCnK5ysAsKZIQ.V6nyXEu', '', '20260000', 'user', 1),
(10, 'DANIEL ', 'SOLOMON', '', '', '', '', '', '2077045821', 'danbunky@gmail.com', '$2y$11$frPxl9TS6/SjdkjEsaybLOqRrq8lQrAamBIOUNJfUJzE1WtldsBfa', '', '80000', 'user', 1),
(11, 'MIRTA MONICA', 'DE LA GUARDIA ARROCHA', 'COCO DEL MAR CALLE AVE 3ERA K SUR Y 79 ESTE CONDOMINIO SAMELI  APTO. No 11', 'AMERICAN', 'PANAMA', '0819-06043', '+1 (507) 609-03218', '2077054624', 'monicathomas27@hotmail.com', '$2y$11$a9MTRRXXTaU3kreklx0zdOGw4h2SX8qwiJ6OI7C3aUKUMv9S7YgCC', '', '120000', 'user', 1),
(12, 'Daniel', 'SOLOMON', 'Kasoa', 'Ghana', 'Accra', '+233', '+233237105393', '2076472447', 'james.phillip9898@gmail.com', '$2y$11$3v6xKYgP7.FrTNE.KCGdTupvdylwMYA0vl2Q9PLnwmQjODiRibKpO', '', '200000', 'user', 1),
(13, 'Katalin', 'Igaz Imr&eacute;n&eacute;', '', '', '', '', '', '', 'katalinigazne@gmail.com', '$2y$11$7xOWiBgDeCR37fuoVXPtoOWdMIEoLI4NjHhkcj42fZfekK5vpWrAK', '', '0', 'user', 0),
(14, 'ONOME', 'PRINCE', '', '', '', '', '', '', 'princeonomzy@gmail.com', '$2y$11$PERX1/8w82Tdl34KvghACeeUKTvjA.6Dz1Gux4OYcH2LdwjNzVkr.', '', '0', 'user', 0),
(15, 'Gifty', 'Obeng', '', '', '', '', '', 'WT201300991702', 'obeng.gifty@gmail.con', '$2y$11$SyUKv8OuD31e99uxYFP/yO8IQx5TXdmRVPYl7r4QENp0kOVAwL9YW', '', '100045000', 'user', 1),
(16, 'PIMEX', 'Group', '', '', '', '', '', '', 'pimexgroup@gmail.com', '$2y$11$hRBhSvUSHeRRa8.FmDfR9uXvZQGuFBdgD7k6QKHRPYOiVKArbcF52', '', '0', 'user', 0),
(17, 'linda', 'Quansah', '', '', '', '', '', '', 'jonquilarine4real@yahoo.com', '$2y$11$Z0/9cPsvbohfh.w2yi40t.UU5GCzyAvFvXPgXPSRuI2yXRy8tOgEC', '', '0', 'user', 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
