-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2023 at 11:32 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codeigniter_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role_id` int(11) NOT NULL,
  `dob` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `register_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `contact`, `address`, `gender`, `image`, `role_id`, `dob`, `status`, `register_date`) VALUES
(1, 'Administrator', 'johnpaultanion001@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', '09445552252', 'Admin Nagar test', 'Female', 'error.png', 1, '2000-02-21', 1, '2023-12-07 18:42:46'),
(12, 'TEST', 'TEST@TESTTEST.COM', 'f925916e2754e5e03f75dd58a5733251', '09323331221', 'TEST', 'Male', 'error.png', 2, '', 1, '2023-12-07 18:10:04'),
(13, 'Jorden Black', 'gohy@mailinator.com', 'f925916e2754e5e03f75dd58a5733251', 'Cupiditate incididun', 'Vero quia laboris lo', 'Male', 'noimage.jpg', 2, '02212000', 1, '2023-12-07 18:24:27'),
(14, 'jp  tanion', 'test@test.com', '5f4dcc3b5aa765d61d8327deb882cf99', '', '', '', '', 0, '', 0, '2023-12-08 01:25:12'),
(15, 'Ferris Gonzalez', 'deduv@mailinator.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '', '', 'Female', 'minions01.jpg', 0, '', 0, '2023-12-07 18:42:02'),
(16, 'Kiayada Jacobs', 'nifukoc@mailinator.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '', '', '', '', 0, '', 0, '2023-12-08 01:27:25'),
(17, 'Octavius Cherry', 'xekodyvez@mailinator.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '', '', '', '', 0, '', 0, '2023-12-08 01:29:40'),
(18, 'Chaney Howe', 'tekakivyr@mailinator.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '', '', '', '', 0, '', 0, '2023-12-08 01:42:32'),
(19, 'Portia Alexander', 'lydusif@mailinator.com', 'f925916e2754e5e03f75dd58a5733251', '09776662240', 'Nam eaque laudantium', 'Male', 'minions01.jpg', 2, '1981-07-27', 1, '2023-12-07 18:43:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
