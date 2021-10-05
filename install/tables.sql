-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2021 at 10:32 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT ;*/
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS ;*/
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION ;*/
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webox1`
--

-- --------------------------------------------------------

--
-- Table structure for table `landingpage`
--

CREATE TABLE `landingpage` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `url` varchar(200) DEFAULT NULL,
  `user-id` int(11) NOT NULL,
  `background-type` tinyint(4) NOT NULL,
  `draft-token` varchar(101) DEFAULT NULL,
  `is-published` tinyint(4) NOT NULL,
  `date-created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product-background-color`
--

CREATE TABLE `product-background-color` (
  `id` int(11) NOT NULL,
  `landingpage-id` int(11) NOT NULL,
  `html-color-code` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product-background-image`
--

CREATE TABLE `product-background-image` (
  `id` int(11) NOT NULL,
  `landingpage-id` int(11) NOT NULL,
  `path` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product-creator`
--

CREATE TABLE `product-creator` (
  `id` int(11) NOT NULL,
  `landingpage-id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image-path` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product-cta`
--

CREATE TABLE `product-cta` (
  `id` int(11) NOT NULL,
  `landingpage-id` int(11) NOT NULL,
  `text` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product-description`
--

CREATE TABLE `product-description` (
  `id` int(11) NOT NULL,
  `landingpage-id` int(11) NOT NULL,
  `text` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product-faq`
--

CREATE TABLE `product-faq` (
  `id` int(11) NOT NULL,
  `landingpage-id` int(11) NOT NULL,
  `question-text` varchar(2000) NOT NULL,
  `answer-text` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product-feature-benefit`
--

CREATE TABLE `product-feature-benefit` (
  `id` int(11) NOT NULL,
  `landingpage-id` int(11) NOT NULL,
  `text` varchar(2000) NOT NULL,
  `icon` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product-headline`
--

CREATE TABLE `product-headline` (
  `id` int(11) NOT NULL,
  `landingpage-id` int(11) NOT NULL,
  `headline-1` varchar(200) NOT NULL,
  `headline-2` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product-image`
--

CREATE TABLE `product-image` (
  `id` int(11) NOT NULL,
  `landingpage-id` int(11) NOT NULL,
  `path` varchar(40) NOT NULL,
  `logo-path` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product-precta`
--

CREATE TABLE `product-precta` (
  `id` int(11) NOT NULL,
  `landingpage-id` int(11) NOT NULL,
  `selling-price` int(10) NOT NULL,
  `strike-price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product-preview`
--

CREATE TABLE `product-preview` (
  `id` int(10) NOT NULL,
  `landingpage-id` int(11) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `caption` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product-pricelist`
--

CREATE TABLE `product-pricelist` (
  `id` int(11) NOT NULL,
  `landingpage-id` int(11) NOT NULL,
  `package` varchar(40) NOT NULL,
  `price` int(10) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `url` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product-ps-disclaimer`
--

CREATE TABLE `product-ps-disclaimer` (
  `id` int(11) NOT NULL,
  `landingpage-id` int(11) NOT NULL,
  `text` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product-satisfy`
--

CREATE TABLE `product-satisfy` (
  `id` int(11) NOT NULL,
  `landingpage-id` int(11) NOT NULL,
  `text` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product-scarity`
--

CREATE TABLE `product-scarity` (
  `id` int(11) NOT NULL,
  `landingpage-id` int(11) NOT NULL,
  `text` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product-subheadline`
--

CREATE TABLE `product-subheadline` (
  `id` int(11) NOT NULL,
  `landingpage-id` int(11) NOT NULL,
  `text` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product-subheadline-detail`
--

CREATE TABLE `product-subheadline-detail` (
  `id` int(11) NOT NULL,
  `subheadline-id` int(11) NOT NULL,
  `text` varchar(2000) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(35) NOT NULL,
  `role_id` int(11) NOT NULL,
  `image` varchar(40) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `date_created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `landingpage`
--
ALTER TABLE `landingpage`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user-id` (`user-id`);

--
-- Indexes for table `product-background-color`
--
ALTER TABLE `product-background-color`
  ADD PRIMARY KEY (`id`),
  ADD KEY `landingpage-id` (`landingpage-id`);

--
-- Indexes for table `product-background-image`
--
ALTER TABLE `product-background-image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `landingpage-id` (`landingpage-id`);

--
-- Indexes for table `product-creator`
--
ALTER TABLE `product-creator`
  ADD PRIMARY KEY (`id`),
  ADD KEY `landingpage-id` (`landingpage-id`);

--
-- Indexes for table `product-cta`
--
ALTER TABLE `product-cta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `landingpage-id` (`landingpage-id`);

--
-- Indexes for table `product-description`
--
ALTER TABLE `product-description`
  ADD PRIMARY KEY (`id`),
  ADD KEY `landingpage-id` (`landingpage-id`);

--
-- Indexes for table `product-faq`
--
ALTER TABLE `product-faq`
  ADD PRIMARY KEY (`id`),
  ADD KEY `landingpage-id` (`landingpage-id`);

--
-- Indexes for table `product-feature-benefit`
--
ALTER TABLE `product-feature-benefit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `landingpage-id` (`landingpage-id`);

--
-- Indexes for table `product-headline`
--
ALTER TABLE `product-headline`
  ADD PRIMARY KEY (`id`),
  ADD KEY `landingpage-id` (`landingpage-id`);

--
-- Indexes for table `product-image`
--
ALTER TABLE `product-image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `landingpage-id` (`landingpage-id`);

--
-- Indexes for table `product-precta`
--
ALTER TABLE `product-precta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `landingpage-id` (`landingpage-id`);

--
-- Indexes for table `product-preview`
--
ALTER TABLE `product-preview`
  ADD PRIMARY KEY (`id`),
  ADD KEY `landingpage-id` (`landingpage-id`);

--
-- Indexes for table `product-pricelist`
--
ALTER TABLE `product-pricelist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `landingpage-id` (`landingpage-id`);

--
-- Indexes for table `product-ps-disclaimer`
--
ALTER TABLE `product-ps-disclaimer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `landingpage-id` (`landingpage-id`);

--
-- Indexes for table `product-satisfy`
--
ALTER TABLE `product-satisfy`
  ADD PRIMARY KEY (`id`),
  ADD KEY `landingpage-id` (`landingpage-id`);

--
-- Indexes for table `product-scarity`
--
ALTER TABLE `product-scarity`
  ADD PRIMARY KEY (`id`),
  ADD KEY `landingpage-id` (`landingpage-id`);

--
-- Indexes for table `product-subheadline`
--
ALTER TABLE `product-subheadline`
  ADD PRIMARY KEY (`id`),
  ADD KEY `landingpage-id` (`landingpage-id`);

--
-- Indexes for table `product-subheadline-detail`
--
ALTER TABLE `product-subheadline-detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subheadline-id` (`subheadline-id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `landingpage`
--
ALTER TABLE `landingpage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product-background-color`
--
ALTER TABLE `product-background-color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product-background-image`
--
ALTER TABLE `product-background-image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product-creator`
--
ALTER TABLE `product-creator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product-cta`
--
ALTER TABLE `product-cta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product-description`
--
ALTER TABLE `product-description`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product-faq`
--
ALTER TABLE `product-faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product-feature-benefit`
--
ALTER TABLE `product-feature-benefit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product-headline`
--
ALTER TABLE `product-headline`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product-image`
--
ALTER TABLE `product-image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product-precta`
--
ALTER TABLE `product-precta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product-preview`
--
ALTER TABLE `product-preview`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product-pricelist`
--
ALTER TABLE `product-pricelist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product-ps-disclaimer`
--
ALTER TABLE `product-ps-disclaimer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product-satisfy`
--
ALTER TABLE `product-satisfy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product-scarity`
--
ALTER TABLE `product-scarity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product-subheadline`
--
ALTER TABLE `product-subheadline`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product-subheadline-detail`
--
ALTER TABLE `product-subheadline-detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `landingpage`
--
ALTER TABLE `landingpage`
  ADD CONSTRAINT `landingpage_ibfk_1` FOREIGN KEY (`user-id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product-background-color`
--
ALTER TABLE `product-background-color`
  ADD CONSTRAINT `product-background-color_ibfk_1` FOREIGN KEY (`landingpage-id`) REFERENCES `landingpage` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product-background-image`
--
ALTER TABLE `product-background-image`
  ADD CONSTRAINT `product-background-image_ibfk_1` FOREIGN KEY (`landingpage-id`) REFERENCES `landingpage` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product-creator`
--
ALTER TABLE `product-creator`
  ADD CONSTRAINT `product-creator_ibfk_1` FOREIGN KEY (`landingpage-id`) REFERENCES `landingpage` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product-cta`
--
ALTER TABLE `product-cta`
  ADD CONSTRAINT `product-cta_ibfk_1` FOREIGN KEY (`landingpage-id`) REFERENCES `landingpage` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product-description`
--
ALTER TABLE `product-description`
  ADD CONSTRAINT `product-description_ibfk_1` FOREIGN KEY (`landingpage-id`) REFERENCES `landingpage` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product-faq`
--
ALTER TABLE `product-faq`
  ADD CONSTRAINT `product-faq_ibfk_1` FOREIGN KEY (`landingpage-id`) REFERENCES `landingpage` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product-feature-benefit`
--
ALTER TABLE `product-feature-benefit`
  ADD CONSTRAINT `product-feature-benefit_ibfk_1` FOREIGN KEY (`landingpage-id`) REFERENCES `landingpage` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product-headline`
--
ALTER TABLE `product-headline`
  ADD CONSTRAINT `product-headline_ibfk_1` FOREIGN KEY (`landingpage-id`) REFERENCES `landingpage` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product-image`
--
ALTER TABLE `product-image`
  ADD CONSTRAINT `product-image_ibfk_1` FOREIGN KEY (`landingpage-id`) REFERENCES `landingpage` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product-precta`
--
ALTER TABLE `product-precta`
  ADD CONSTRAINT `product-precta_ibfk_1` FOREIGN KEY (`landingpage-id`) REFERENCES `landingpage` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product-preview`
--
ALTER TABLE `product-preview`
  ADD CONSTRAINT `product-preview_ibfk_1` FOREIGN KEY (`landingpage-id`) REFERENCES `landingpage` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product-pricelist`
--
ALTER TABLE `product-pricelist`
  ADD CONSTRAINT `product-pricelist_ibfk_1` FOREIGN KEY (`landingpage-id`) REFERENCES `landingpage` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product-ps-disclaimer`
--
ALTER TABLE `product-ps-disclaimer`
  ADD CONSTRAINT `product-ps-disclaimer_ibfk_1` FOREIGN KEY (`landingpage-id`) REFERENCES `landingpage` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product-satisfy`
--
ALTER TABLE `product-satisfy`
  ADD CONSTRAINT `product-satisfy_ibfk_1` FOREIGN KEY (`landingpage-id`) REFERENCES `landingpage` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product-scarity`
--
ALTER TABLE `product-scarity`
  ADD CONSTRAINT `product-scarity_ibfk_1` FOREIGN KEY (`landingpage-id`) REFERENCES `landingpage` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product-subheadline`
--
ALTER TABLE `product-subheadline`
  ADD CONSTRAINT `product-subheadline_ibfk_1` FOREIGN KEY (`landingpage-id`) REFERENCES `landingpage` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product-subheadline-detail`
--
ALTER TABLE `product-subheadline-detail`
  ADD CONSTRAINT `product-subheadline-detail_ibfk_1` FOREIGN KEY (`subheadline-id`) REFERENCES `product-subheadline` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
