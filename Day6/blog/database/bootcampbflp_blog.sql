-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2024 at 12:56 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bootcampbflp_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `name`, `slug`, `created_at`) VALUES
(1, 'food', 'food', '2024-02-05 08:03:20');

-- --------------------------------------------------------

--
-- Table structure for table `blog_comments`
--

CREATE TABLE `blog_comments` (
  `id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `body` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `edited_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

CREATE TABLE `blog_posts` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `excerpt` text DEFAULT NULL,
  `body` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog_posts`
--

INSERT INTO `blog_posts` (`id`, `category_id`, `user_id`, `title`, `slug`, `excerpt`, `body`, `image`, `published_at`, `created_at`) VALUES
(1, 1, 1, 'Eating martabak at jakarta barat', 'Eating-martabak-at-jakarta-barat', 'Aenean sodales...posue', 'Aenean sodales posuere arcu at congue. Nullam in rhoncus dolor, non dapibus velit. Curabitur ornare sagittis justo, sit amet feugiat lacus volutpat at. Nunc in euismod ipsum. Vivamus auctor, erat at ullamcorper sollicitudin, nisi nunc vehicula turpis, id mattis felis ex eu tortor. Quisque massa quam, ullamcorper sit amet pharetra id, sodales cursus neque. Nullam eget dui pharetra, elementum justo id, pulvinar augue. Nunc nisl est, vehicula ac libero laoreet, ultricies ullamcorper lacus. Nam eleifend sed libero quis luctus. Aliquam at purus quis massa rhoncus dapibus. Cras lacinia purus augue, semper cursus nibh suscipit ut. Curabitur venenatis porta justo vel interdum. Curabitur vehicula tristique tellus vitae viverra.', 'images/blog/post-3.jpg', NULL, '2024-02-05 08:06:01'),
(2, 1, 1, 'Drinking water from the mississippi river', 'drinking-water-from-the-mississippi-river', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent est diam, tempor a ex ut, blandit cursus nibh.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent est diam, tempor a ex ut, blandit cursus nibh. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Quisque tellus leo, laoreet a mollis at, tincidunt et leo. Sed ut turpis eu lacus tempus dignissim gravida eu nunc. Proin aliquet metus in imperdiet pulvinar. In faucibus purus sed odio pulvinar consequat. Nam dapibus aliquam metus, a venenatis mauris aliquam sed. In hac habitasse platea dictumst. Nam congue sem a nisl iaculis, eget iaculis lectus mattis.\r\n\r\nMaecenas in posuere lorem. Suspendisse interdum lacinia rhoncus. Maecenas eu mauris diam. Cras placerat nunc at semper congue. Cras laoreet facilisis nunc vitae iaculis. Aenean imperdiet viverra dapibus. Maecenas nibh metus, volutpat non nunc eu, cursus placerat tellus. Vestibulum commodo suscipit molestie. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed vel scelerisque massa. Aliquam pellentesque erat et quam porttitor rhoncus. In hac habitasse platea dictumst. Cras ligula ex, consectetur sed laoreet id, fermentum quis lectus. Mauris porttitor eleifend nisi, in consequat risus mattis eu.\r\n\r\nAenean at dapibus purus. Maecenas porta leo tellus, gravida tincidunt mauris porta eu. Praesent ut sem sed quam condimentum vulputate. Vivamus vestibulum metus auctor velit faucibus, et tempus diam luctus. Morbi rutrum sagittis elementum. Integer rhoncus ac sem convallis dictum. Integer cursus cursus lacus, in pellentesque leo dictum non. Curabitur rutrum suscipit congue. Nunc nec pulvinar mauris, quis vulputate orci. Nulla lacinia fermentum metus, sodales feugiat metus congue vel. Mauris eleifend turpis dapibus lobortis euismod. Praesent nunc urna, suscipit a est non, convallis efficitur dolor. Cras et molestie augue.', 'images/blog/post-1.jpg', NULL, '2024-02-05 09:22:53'),
(3, 1, 1, 'Street food in bogor is kinda meh', 'Street-food-in-bogor-is-kinda-meh', 'Lorem ipsum dolor...si', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus rhoncus sem et neque vestibulum, id volutpat nulla sodales. Cras felis neque, lacinia rutrum arcu eget, sollicitudin varius quam. Vestibulum in luctus massa. Sed tempor molestie nisl, vitae eleifend mauris varius id. Mauris nec mollis eros. Nullam volutpat orci lobortis quam egestas malesuada. Fusce in condimentum tortor. Interdum et malesuada fames ac ante ipsum primis in faucibus. Ut posuere convallis mauris, eu aliquam nibh accumsan vitae. Sed vulputate, nisi et facilisis condimentum, augue ante eleifend quam, eget eleifend risus nisl eu nibh. Mauris eget sapien eu arcu eleifend fringilla. In facilisis massa sed lacus dictum pulvinar.\r\n\r\nSuspendisse potenti. Nullam mollis nisl eros, a faucibus mauris bibendum lobortis. Ut euismod commodo euismod. Nunc eu odio at odio bibendum egestas vel eu enim. Duis in tempus lectus. Proin scelerisque libero a libero viverra pellentesque. Vestibulum diam ipsum, gravida feugiat nunc eu, egestas cursus nulla. Nunc venenatis risus dolor.', 'img/65c0b77979744.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 1, 1, 'Thai food is actually nah', 'Thai-food-is-actually-nah', 'Lorem ipsum dolor...si', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus rhoncus sem et neque vestibulum, id volutpat nulla sodales. Cras felis neque, lacinia rutrum arcu eget, sollicitudin varius quam. Vestibulum in luctus massa. Sed tempor molestie nisl, vitae eleifend mauris varius id. Mauris nec mollis eros. Nullam volutpat orci lobortis quam egestas malesuada. Fusce in condimentum tortor. Interdum et malesuada fames ac ante ipsum primis in faucibus. Ut posuere convallis mauris, eu aliquam nibh accumsan vitae. Sed vulputate, nisi et facilisis condimentum, augue ante eleifend quam, eget eleifend risus nisl eu nibh. Mauris eget sapien eu arcu eleifend fringilla. In facilisis massa sed lacus dictum pulvinar.\r\n\r\nSuspendisse potenti. Nullam mollis nisl eros, a faucibus mauris bibendum lobortis. Ut euismod commodo euismod. Nunc eu odio at odio bibendum egestas vel eu enim. Duis in tempus lectus. Proin scelerisque libero a libero viverra pellentesque. Vestibulum diam ipsum, gravida feugiat nunc eu, egestas cursus nulla. Nunc venenatis risus dolor.', 'img/65c0b79280209.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 1, 3, 'Drinking beer in the middle of the noon', 'Drinking-beer-in-the-middle-of-the-noon', 'Cras vestibulum...iacu', 'Cras vestibulum iaculis purus. Proin laoreet, risus et bibendum vulputate, ipsum mauris aliquet nulla, auctor porttitor libero arcu a ex. Mauris ut dictum dui. Suspendisse non quam auctor, rhoncus augue vitae, posuere ligula. Fusce risus metus, porttitor sit amet mi et, posuere elementum velit. Integer fringilla a est et imperdiet. Praesent nulla lectus, finibus in quam quis, aliquam placerat enim. Nunc sollicitudin pharetra iaculis. Aliquam et lorem est. Pellentesque tristique mi ut vulputate gravida. Cras non mollis arcu. Sed eget sem sed nibh condimentum lobortis ut eu magna. Duis ornare, ante eu porttitor accumsan, ante sem mattis massa, et lacinia ipsum erat a ex. Phasellus placerat nunc ut vehicula placerat.', 'img/65c0c6aacb88d.jpg', '0000-00-00 00:00:00', '2024-02-05 11:29:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `isAdmin` int(11) DEFAULT NULL,
  `isStudent` int(11) DEFAULT NULL,
  `verified_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `edited_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `isAdmin`, `isStudent`, `verified_at`, `created_at`, `edited_at`) VALUES
(1, 'eva', '', '$2y$10$lmValx39iPfFELeHDtPh2esFo3GEZ83Kf6GGaaEtTBuwW2vBWt5yW', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'asdasd', '', '$2y$10$f140vgjMkFpc3xDgWthVz.V9K3sWXHsmxWRSihgRBRfnEQvg/i5v2', 0, 0, '0000-00-00 00:00:00', '2024-02-05 07:32:19', '0000-00-00 00:00:00'),
(3, 'nanda', '', '$2y$10$D0j3fFAh.itwgv6sqOYqE.irmlrziK88Gc.AatGlbUjquLQuUZmB2', 0, 0, '0000-00-00 00:00:00', '2024-02-05 11:22:24', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_to_userid_comment` (`user_id`),
  ADD KEY `fk_to_blogid` (`blog_id`);

--
-- Indexes for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_to_userid` (`user_id`),
  ADD KEY `fk_to_categoryid` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_posts`
--
ALTER TABLE `blog_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD CONSTRAINT `fk_to_blogid` FOREIGN KEY (`blog_id`) REFERENCES `blog_posts` (`id`),
  ADD CONSTRAINT `fk_to_userid_comment` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD CONSTRAINT `fk_to_categoryid` FOREIGN KEY (`category_id`) REFERENCES `blog_categories` (`id`),
  ADD CONSTRAINT `fk_to_userid` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
