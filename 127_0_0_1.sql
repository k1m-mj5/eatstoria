-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2021 at 11:41 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--
CREATE DATABASE IF NOT EXISTS `blog` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `blog`;

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `account_id` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT 'U'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`account_id`, `username`, `password`, `status`) VALUES
(13, 'u11', 'p11', 'U'),
(14, 'un2', 'p2', 'U'),
(15, 'newuser', 'newpass', 'A'),
(16, 'un4', 'p4', 'U'),
(21, 'ado.love', '$2y$10$S014DTGjPXDdVHDfmg3yb.ILZG0BbYBuUbePhWRJZtvMe5LHjqvYy', 'U'),
(22, 'ado.love', '$2y$10$tYAHwoVExGRkqZcKOZM/XOvc1ZbSlMyGevWhN4E5mqoQ3ulhMO.pm', 'U'),
(23, 'jj.doe', '$2y$10$pKaK5MXrkUJ6FDd7KbrgLuoJ/t0V0M3sswwdkEUiD89uHaFt5pq9G', 'U'),
(24, 'jj.doe', '$2y$10$QJ6NY9Trywh5M0X6WpHRE.ZzgQ3KHhnddk/v6ALRoLeNsUYZwRmwS', 'U'),
(25, 'jameslee', '$2y$10$CIh/5z4cEZOuXSWVZsRrdOA43vm9fdMS7I5sVO1r3SwB3S6NuJUjq', 'U'),
(26, 'louraropez', '$2y$10$VIMq.Ti66YaL8fFbJnsnOOv/dJqq/RXFlLNeTr.gJ2XEBq14BxO/S', 'U'),
(27, 'rosasantos', '$2y$10$fIum6dBkK/ZZJ5btXYOQL.UFuEi/QoyGOrRhWZlMSBJl8HyGMVwbe', 'U'),
(28, 'johnwhite', '$2y$10$NeUmGDXgdpb6HezsTqx.7.PTG75ajB.Tn9OwwpP43TC3SaJrXMldm', 'U'),
(29, 'emitanaka', '$2y$10$6UeK.A2Itvk7XAjLL/KW0ul1I80H748aXMcdnOVfnrb8/KrRXXu7C', 'U'),
(30, 'yumisato', '$2y$10$idRaGZMGhM7VdmEt63gi9OLjH0Ha0F3HIrPG0zrh2xa1LTjsUyJYW', 'A'),
(31, 'tomokoshimura', '$2y$10$W7Pq4uREsvQchpFNBQjYoO1yOLoFZChsq.tzbeEsj3bmJWWJrrU5.', 'U'),
(32, 'kentanakata', '$2y$10$WA6rTGj/EeVzjZ3HPc9PhORffDtk6uYNj9a0cnHv2wnJSx82ZEZaO', 'U');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(5, 'Programming'),
(6, 'abc'),
(7, '456'),
(10, 'def');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `post_title` varchar(45) NOT NULL,
  `date_posted` date NOT NULL,
  `category_id` int(11) NOT NULL,
  `post_message` varchar(100) NOT NULL,
  `account_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_title`, `date_posted`, `category_id`, `post_message`, `account_id`) VALUES
(3, 'programming title', '2020-08-07', 5, 'programming test', 27),
(4, 'test title', '2020-04-10', 7, 'test title 456', 28),
(5, 'title test', '2020-05-30', 7, 'edited test', 29),
(6, 'edited test', '2020-09-30', 10, 'test message', 30),
(8, 'title edited', '2020-12-12', 10, 'message edited', 31),
(9, 'text test', '2021-04-07', 5, 'programming', 27),
(10, 'This is an edited title', '2021-10-07', 6, 'This is our first post for our blog portfolio. We have implemented this using OOP.', 26);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `contact_number` varchar(45) NOT NULL,
  `address` varchar(45) NOT NULL,
  `avatar` varchar(45) DEFAULT NULL,
  `bio` varchar(100) DEFAULT NULL,
  `account_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `contact_number`, `address`, `avatar`, `bio`, `account_id`) VALUES
(3, 'f11', 'l11', 'c11', 'a11', NULL, NULL, 13),
(4, 'f22', 'l22', 'co22', 'a22', NULL, NULL, 14),
(5, 'new fname', 'new lname', 'new num', 'new address', NULL, NULL, 15),
(6, 'f4', 'l4', 'c4', 'a4', NULL, NULL, 16),
(11, 'Loura', 'Ropez', '13456789', 'Mexico', NULL, NULL, 26),
(12, 'Rosa', 'Santos', '093123456', 'Brazil', NULL, NULL, 27),
(13, 'John', 'White', '09213456', 'USA', NULL, NULL, 28),
(14, 'Emi', 'Tanaka', '090123456', 'Japan', NULL, NULL, 29),
(15, 'Yumi', 'Sato', '090123456', 'Japan', NULL, NULL, 30),
(16, 'Tomoko', 'Shimura', '090654123', 'Japan', NULL, NULL, 31),
(17, 'Kenta', 'Nakata', '09045617894', 'Japan', NULL, NULL, 32);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- Database: `dev_app_db`
--
CREATE DATABASE IF NOT EXISTS `dev_app_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `dev_app_db`;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `login_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT 'U'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`login_id`, `username`, `password`, `status`) VALUES
(5, 'User2', 'pass2', 'A'),
(6, 'user3', 'pass3', 'U');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `login_id` int(11) NOT NULL,
  `img` varchar(255) NOT NULL DEFAULT 'NO IMAGE'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fname`, `lname`, `login_id`, `img`) VALUES
(4, 'Jane', 'Do', 5, 'kredo.png'),
(5, 'first3', 'last3', 6, 'NO IMAGE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Database: `dev_pm_db`
--
CREATE DATABASE IF NOT EXISTS `dev_pm_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `dev_pm_db`;

-- --------------------------------------------------------

--
-- Table structure for table `users_info`
--

CREATE TABLE `users_info` (
  `user_id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `birth` date DEFAULT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_info`
--

INSERT INTO `users_info` (`user_id`, `fname`, `lname`, `age`, `birth`, `location`) VALUES
(2, 'Jerry', 'Ray', '25', '1997-09-10', 'Osaka'),
(3, 'young', 'kim', '24', '1997-08-08', 'seoul'),
(7, 'Joel', 'Ryan', '25', '1988-10-23', 'manila');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users_info`
--
ALTER TABLE `users_info`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users_info`
--
ALTER TABLE `users_info`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Database: `eatstoria`
--
CREATE DATABASE IF NOT EXISTS `eatstoria` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `eatstoria`;

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `account_id` int(11) NOT NULL,
  `username` varchar(45) DEFAULT NULL,
  `rest_username` varchar(45) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(1) DEFAULT 'U'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`account_id`, `username`, `rest_username`, `password`, `role`) VALUES
(1, 'alice', NULL, '$2y$10$9veVxDtuGYClTchEz0M3m.R0h0ONcsFlNurR5o9qOT5qFfES53Cj2', 'U'),
(2, 'bob', NULL, '$2y$10$9veVxDtuGYClTchEz0M3m.R0h0ONcsFlNurR5o9qOT5qFfES53Cj2', 'U'),
(3, NULL, 'steakhouse', '$2y$10$4LhGpEIs181VFSDKPGegT.RXUQjR3e9lKvb/OEiVOjpc9l1vP5p9O', 'R'),
(4, NULL, 'sakura', '$2y$10$Q8C9yMxT3v7PQ6pONylFCOejrfnGHI6rvDBcXY7wnSBDbHhW8clKS', 'R'),
(5, NULL, 'toraji', '$2y$10$jEYderxf/Zlrcdc3JXjOkepnMlGaq2ATmIGw0LUx7aVyN51xnq2Nq', 'R'),
(6, NULL, 'pitta', '$2y$10$jEYderxf/Zlrcdc3JXjOkepnMlGaq2ATmIGw0LUx7aVyN51xnq2Nq', 'R'),
(7, 'admin', NULL, '$2y$10$TvZxIKuz9s9oZBjPb5TWdOB.XIRTfbSsreNcisHbga.SV6zOrdVEa', 'A'),
(8, 'carol', NULL, '$2y$10$9veVxDtuGYClTchEz0M3m.R0h0ONcsFlNurR5o9qOT5qFfES53Cj2', 'U'),
(9, 'dave', NULL, '$2y$10$9veVxDtuGYClTchEz0M3m.R0h0ONcsFlNurR5o9qOT5qFfES53Cj2', 'U'),
(10, 'ellen', NULL, '$2y$10$8jfjEudTMZ/pZktfpiUyXOqzp9j9xK18ElJVsxGt.fYj25UjmXwTG', 'U'),
(11, NULL, 'riogrande', '$2y$10$TJ4gP3m/6rR6KVq1yd8W4OeWC9UPQ0r3FH813emUi5PHXZk/xasyi', 'R'),
(12, 'frank', NULL, '$2y$10$gpYJhQpoiN3rC4sdOPxGw.WU1NzFRWV79LVnBTjrxm7IrznJ/7FEK', 'U'),
(13, NULL, 'rico', '$2y$10$xB1y/mRInKElRxrdRzzcn.im/ZhmPhN6ry7M9U7/ybUBV3jlgmssS', 'R');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL,
  `menu_title` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `rest_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menu_id`, `menu_title`, `price`, `description`, `rest_id`) VALUES
(1, 'Nigiri Sushi', '20', 'First-class Nigiri Sushi Assortment', 3),
(2, 'Sushi Rolls', '10', 'Sushi Rolls with Raw Tuna', 3),
(3, 'Original Orange Chicken', '10', 'Crispy chicken wok-tossed in a sweet and spicy orange sauce.', 4),
(4, 'Matcha Americano', '4', 'Matcha espresso with water added', 5),
(5, 'Dumplings', '10', 'Steamed Port & Leek Dumpling (15 pieces)', 4),
(6, 'New York Strip (300g)', '30', 'Ambitioni dedisse scripsisse iudicaretur.', 6),
(7, 'Angus Ribeye (280g)', '35', 'Ambitioni dedisse scripsisse iudicaretur.', 6),
(8, 'Steakhouse Burger', '20', 'Ambitioni dedisse scripsisse iudicaretur.', 6),
(9, 'Matcha Latte', '5', 'Matcha with milk', 5),
(10, 'Galbi', '25', 'Grilled Short Beef Rib', 7),
(11, 'Bulgogi', '20', 'BBQ spicy Port', 7),
(12, 'Dak Bulgogi', '20', 'BBQ Boneless Chicken', 7),
(13, 'Signature Pizza (Large)', '25', 'Ambitioni dedisse scripsisse iudicaretur.', 8),
(14, 'Signature Spaghetti', '9', 'Spaghetti with butter sauce', 8),
(15, 'Churrasco', '20', 'Chicken/Pork/Beef', 9),
(16, 'Chicken finger (6 pieces)', '10', 'Chicken fingers with french fries', 9),
(17, 'Seafood Pasta Paella', '7', 'Ambitioni dedisse scripsisse iudicaretur.', 10),
(18, 'Spicy Potato Tapas Patatas Bravas', '11', 'Ambitioni dedisse scripsisse iudicaretur.', 10),
(21, 'Taco Rice', '9', 'Ambitioni dedisse scripsisse iudicaretur.', 11),
(22, 'Taco Salad', '5', 'Ambitioni dedisse scripsisse iudicaretur.', 11),
(23, 'Cheese Quesadilla', '6', 'Ambitioni dedisse scripsisse iudicaretur.', 11);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `rest_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `contact_num` varchar(100) NOT NULL,
  `way` varchar(45) NOT NULL,
  `order_date` varchar(100) NOT NULL,
  `order_time` varchar(100) NOT NULL,
  `account_id` int(11) NOT NULL,
  `message` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `rest_id`, `menu_id`, `quantity`, `contact_num`, `way`, `order_date`, `order_time`, `account_id`, `message`) VALUES
(1, 3, 2, '2', '090-4567-1234', 'Take Out', '2021-11-01', '18:15', 1, 'credit card'),
(2, 3, 1, '3', '090-7894-1235', 'Eat In', '2021-11-03', '19:00', 1, 'table seat'),
(3, 4, 3, '1', '090-456-1237', 'Eat In', '2021-11-03', '19:50', 2, ''),
(4, 5, 9, '10', '070-7894-1235', 'Delivery', '2021-11-06', '13:00', 8, 'room 206, NC Bulding '),
(5, 6, 6, '2', '090-894-1235', 'Eat In', '2021-10-31', '12:00', 9, '2 persons'),
(6, 7, 12, '2', '080-7894-1235', 'Take Out', '2021-11-02', '19:30', 10, 'credit card'),
(7, 8, 13, '3', '080-7945-1654', 'Delivery', '2021-11-06', '19:00', 2, 'room 301, Casamia'),
(8, 9, 15, '5', '090-7894-1562', 'Eat In', '2021-11-05', '19:00', 8, '10 persons 1 table'),
(9, 10, 18, '1', '070-5897-2356', 'Eat In', '2021-11-05', '20:00', 10, ''),
(10, 7, 10, '2', '090-5644-1234', 'Eat In', '2021-11-04', '18:00', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `rest_id` int(11) NOT NULL,
  `rest_name` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `location` varchar(100) NOT NULL,
  `telephone` varchar(100) NOT NULL,
  `open_hour` varchar(100) NOT NULL,
  `account_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`rest_id`, `rest_name`, `description`, `location`, `telephone`, `open_hour`, `account_id`) VALUES
(3, 'Ginzaya', 'Japanese dishes', 'Tokyo', '03-456-7891', '10:00-23:00', 4),
(4, 'Shanghai', 'Chinese Dishes', 'Osaka', '06-1234-7894', '10:00-22:00', 4),
(5, 'Green Tea', 'Green Tea Cafe', 'Tokyo', '03-123-4567', '10:00-22:00', 4),
(6, 'Mr. Steakhouse', 'American Steak House', 'Tokyo', '03-700-9031', '11:00-23:00', 3),
(7, 'Toraji', 'Korean barbecue', 'Osaka', '06-456-7891', '11:00-23:00', 5),
(8, 'Pitta', 'Italian Resturant', 'Tokyo', '03-789-4156', '11:00-23:00', 6),
(9, 'Rio Grande Grill', 'Brazilian BBQ Restaurant', 'Osaka', '06-321-7895', '11:00-24:00', 11),
(10, 'Bar Rico', 'Spanish Dining', 'Nagoya', '052-456-8954', '11:30-23:00', 13),
(11, 'Taco Tacos', 'Taco Rice ', 'Nagoya', '052-789-4561', '11:30-23:00', 4);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_id` int(11) NOT NULL,
  `message` varchar(500) NOT NULL,
  `rating` varchar(100) NOT NULL,
  `rest_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `way` varchar(45) NOT NULL,
  `account_id` int(11) NOT NULL,
  `date_posted` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`review_id`, `message`, `rating`, `rest_id`, `menu_id`, `way`, `account_id`, `date_posted`) VALUES
(1, 'msg msg ', '2', 3, 1, 'Take Out', 1, '2021-10-24'),
(2, 'msg msg msg', '4', 4, 5, 'Take Out', 1, '2021-10-23'),
(3, 'Ambitioni dedisse scripsisse iudicaretur.', '3', 6, 6, 'Eat In', 2, '2021-10-28'),
(4, 'Ambitioni dedisse scripsisse iudicaretur.', '5', 5, 4, 'Take Out', 8, '2021-10-28'),
(5, 'Ambitioni dedisse scripsisse iudicaretur.', '4', 7, 10, 'Delivery', 12, '2021-10-28'),
(6, 'Ambitioni dedisse scripsisse iudicaretur.', '5', 9, 15, 'Eat In', 9, '2021-10-28'),
(7, 'Ambitioni dedisse scripsisse iudicaretur.', '4', 8, 13, 'Take Out', 10, '2021-10-28'),
(8, 'Ambitioni dedisse scripsisse iudicaretur.', '3', 10, 17, 'Eat In', 10, '2021-10-29'),
(9, 'msg', '4', 3, 2, 'Take Out', 1, '2021-10-29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `account_id`, `email`) VALUES
(1, 1, 'user1@email.com'),
(2, 2, 'bob22@gmail.com'),
(3, 3, 'owner1@email.com'),
(4, 4, 'owner2@email.com'),
(5, 5, 'owner3@email.com'),
(6, 6, 'owner4@email.com'),
(7, 7, 'admin@email.com'),
(8, 8, 'user3@email.com'),
(9, 9, 'user4@email.com'),
(10, 10, 'user5@email.com'),
(11, 11, 'owner5@email.com'),
(12, 12, 'user6@email.com'),
(13, 13, 'rico@email.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`account_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `rest_username` (`rest_username`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`rest_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `rest_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- Database: `kredo`
--
CREATE DATABASE IF NOT EXISTS `kredo` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `kredo`;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `empFname` varchar(30) NOT NULL,
  `empLname` varchar(30) NOT NULL,
  `empCountry` varchar(50) NOT NULL,
  `empGender` varchar(1) NOT NULL,
  `empBirthDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `empFname`, `empLname`, `empCountry`, `empGender`, `empBirthDate`) VALUES
(1, 'John', 'Doe', 'New Zealand', 'M', '1990-03-26'),
(2, 'Emily', 'Johnson', 'USA', 'F', '1980-04-23');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `stuFname` varchar(20) NOT NULL,
  `stuLname` varchar(20) NOT NULL,
  `stuCountry` varchar(100) NOT NULL,
  `stuCourse` varchar(5) NOT NULL,
  `stuYearLevel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `stuFname`, `stuLname`, `stuCountry`, `stuCourse`, `stuYearLevel`) VALUES
(3, 'Alec', 'Bell', 'Australia', 'BSA', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Table structure for table `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_length` text COLLATE utf8_bin DEFAULT NULL,
  `col_collation` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) COLLATE utf8_bin DEFAULT '',
  `col_default` text COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `settings_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Table structure for table `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `export_type` varchar(10) COLLATE utf8_bin NOT NULL,
  `template_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `template_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Table structure for table `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

--
-- Dumping data for table `pma__navigationhiding`
--

INSERT INTO `pma__navigationhiding` (`username`, `item_name`, `item_type`, `db_name`, `table_name`) VALUES
('root', 'login', 'table', 'dev_app_db', '');

-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Dumping data for table `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"eatstoria\",\"table\":\"accounts\"},{\"db\":\"eatstoria\",\"table\":\"users\"},{\"db\":\"eatstoria\",\"table\":\"menu\"},{\"db\":\"eatstoria\",\"table\":\"restaurant\"},{\"db\":\"eatstoria\",\"table\":\"review\"},{\"db\":\"eatstoria\",\"table\":\"orders\"},{\"db\":\"blog\",\"table\":\"posts\"},{\"db\":\"blog\",\"table\":\"users\"},{\"db\":\"blog\",\"table\":\"accounts\"},{\"db\":\"kredo\",\"table\":\"employees\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

--
-- Dumping data for table `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'blog', 'accounts', '{\"sorted_col\":\"`accounts`.`account_id`  DESC\"}', '2021-10-15 05:22:41'),
('root', 'eatstoria', 'restaurant', '{\"CREATE_TIME\":\"2021-10-19 18:21:04\"}', '2021-10-28 13:29:35'),
('root', 'school_db', 'students', '{\"sorted_col\":\"`students`.`studentID`  DESC\"}', '2021-09-23 08:40:22');

-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin DEFAULT NULL,
  `data_sql` longtext COLLATE utf8_bin DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data for table `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2021-10-29 05:18:45', '{\"Console\\/Mode\":\"collapse\",\"Server\\/hide_db\":\"\",\"Server\\/only_db\":\"\",\"2fa\":{\"type\":\"db\",\"backend\":\"\",\"settings\":[]},\"ThemeDefault\":\"metro\"}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL,
  `tab` varchar(64) COLLATE utf8_bin NOT NULL,
  `allowed` enum('Y','N') COLLATE utf8_bin NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Table structure for table `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indexes for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indexes for table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Database: `school_db`
--
CREATE DATABASE IF NOT EXISTS `school_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `school_db`;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `studentID` int(11) NOT NULL,
  `studentFname` varchar(255) NOT NULL,
  `studentLname` varchar(255) NOT NULL,
  `studentbdate` date DEFAULT NULL,
  `studentYear` varchar(255) NOT NULL,
  `studentLocation` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`studentID`, `studentFname`, `studentLname`, `studentbdate`, `studentYear`, `studentLocation`) VALUES
(1, 'John', 'Christopher', '2000-08-08', '1', 'USA'),
(2, 'Izzy', 'Graham', '1999-03-19', '2', 'Germany'),
(5, 'Lisa', 'White', '1997-02-14', '4', 'Canada'),
(7, 'Aciel', 'Weber', '2001-07-03', '1', 'Switzerland');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `teacherID` int(11) NOT NULL,
  `teacherFname` varchar(255) NOT NULL,
  `teacherLname` varchar(255) NOT NULL,
  `teacherBdate` date DEFAULT NULL,
  `assignedYearLevel` varchar(255) NOT NULL,
  `teacherContactNumber` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`teacherID`, `teacherFname`, `teacherLname`, `teacherBdate`, `assignedYearLevel`, `teacherContactNumber`) VALUES
(1, 'Jack', 'Doe', '1980-01-26', '1', '123456789'),
(4, 'Julia', 'Santos', '1980-05-30', '3', '987654321'),
(5, 'Michael', 'Bolton', '1979-11-04', '4', '987654123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`studentID`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`teacherID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `studentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `teacherID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
