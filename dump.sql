-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 20, 2023 at 09:39 AM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `userdata`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_views`
--

CREATE TABLE `user_views` (
                              `id` bigint(20) NOT NULL,
                              `ip_address` char(255) NOT NULL,
                              `user_agent` char(255) NOT NULL,
                              `view_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                              `page_url` char(255) NOT NULL,
                              `views_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_views`
--

INSERT INTO `user_views` (`id`, `ip_address`, `user_agent`, `view_date`, `page_url`, `views_count`) VALUES
(15, '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36', '2023-04-20 06:29:31', 'http://localhost:8880/test/index1.html', 18),
(16, '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36', '2023-04-20 09:37:47', 'http://localhost:8880/test/index2.html', 20),
(17, '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.4 Safari/605.1.15', '2023-04-19 19:10:11', 'http://localhost:8880/test/index2.html', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_views`
--
ALTER TABLE `user_views`
    ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ipaddress_useragent_pageurl` (`ip_address`,`user_agent`,`page_url`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_views`
--
ALTER TABLE `user_views`
    MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
