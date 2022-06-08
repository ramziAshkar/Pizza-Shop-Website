-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2022 at 11:50 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pizza`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `ID` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `email` text NOT NULL,
  `password` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`ID`, `name`, `email`, `password`, `username`) VALUES
(4, 'aya', 'aya@saoudi.com', 'a', 'aya'),
(5, 'ramzi', 'ElAchkarRa@students.rhu.edu.lb', 'ramzi', 'ramzi'),
(6, 'ramzi', 'ElAchkarRa@students.rhu.edu.lb', 'ramzi', 'ramzii'),
(7, 'ramziii', 'ElAchkarRa@students.rhu.edu.lb', 'ra', 'ramziii');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `Name` varchar(25) NOT NULL,
  `price` double NOT NULL,
  `type` varchar(25) NOT NULL,
  `Description` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`Name`, `price`, `type`, `Description`, `image`) VALUES
('4CHEESE', 30.99, 'pizza', 'White Garlic Sauce, Mozzarella, Gorgonzola, Provolone, Pecorino', 'images/menu/pizza7.jpg'),
('AMERICAN PEPPERONI', 28.99, 'pizza', 'Tomato Sauce, Mozzarella, American Pepperoni, Fresh Basil', 'images/menu/pizza8.jpg'),
('ANCHOVIE & OLIVE', 27.99, 'pizza', 'Tomato Sauce, Mozzarella, Anchovie, Black Olives', 'images/menu/pizza4.jpg'),
('BEEF STAKE', 35, 'dishes', 'Two pieces of beef stake served with sauce and vegetables ', 'images/menu/dish8.jpg'),
('CHICKEN ESCALOPE', 30, 'dishes', 'Two pieces of chicken escalope served with fries, cheddar and salad', 'images/menu/dish9.jpg'),
('FRANKIE (WEEKEND SPECIAL!', 30.99, 'pizza', 'Vodka Sauce, Mozzarella, Ricotta, Meatball, Red Pepper, Fresh Italian Basil', 'images/menu/pizza9.jpg'),
('FRENCH FRIES', 15.99, 'dishes', 'French fries with cheddar, ketchup and mayonnaise', 'images/menu/dish1.jpg'),
('FRIED CHICKEN', 29, 'dishes', 'Fried chicken served with fries and salad', 'images/menu/dish7.jpg'),
('GREEK SALAD', 20, 'dishes', 'Tomato, cucumber and cheese', 'images/menu/dish2.jpg'),
('ITALIAN SAUSAGE', 21.99, 'pizza', 'Tomato Sauce, Mozzarella, & Spicy Fennel Italian Sausage', 'images/menu/pizza3.jpg'),
('MARGHERITA', 26.99, 'pizza', 'Tomato Sauce, Mozzarella, Fresh Basil', 'images/menu/pizza6.jpg'),
('NEW YORKER', 24.99, 'pizza', 'Tomato Sauce, Mozzarella, American Pepperoni, Italian Sausage, Black Olives', 'images\\menu\\pizza1.jpg'),
('PASTA', 25, 'DISHES', 'Italian Pasta with tomato sauce and mint', 'images/menu/dish6.jpg'),
('PROSCIUTTO DI PARMA', 20.99, 'pizza', 'Tomato Sauce, Mozzarella, Prosciutto di Parma, Fresh Basil', 'images/menu/pizza2.jpg'),
('SUPREME', 21.99, 'pizza', 'Tomato Sauce, Mozzarella, Bell Peppers, Caramelized Onions, Black Olives, Parmesean', 'images/menu/pizza5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ordered`
--

CREATE TABLE `ordered` (
  `price` double NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `Description` text NOT NULL,
  `total` double NOT NULL,
  `image` text NOT NULL,
  `id` int(11) NOT NULL,
  `user` varchar(200) NOT NULL,
  `Name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ordered`
--

INSERT INTO `ordered` (`price`, `quantity`, `Description`, `total`, `image`, `id`, `user`, `Name`) VALUES
(28.99, 4, 'Tomato Sauce, Mozzarella, American Pepperoni, Fresh Basil', 115, 'images/menu/pizza8.jpg', 15, 'ramzi', 'AMERICAN PEPPERONI'),
(21.99, 2, 'Tomato Sauce, Mozzarella, & Spicy Fennel Italian Sausage', 43, 'images/menu/pizza3.jpg', 16, 'ramzi', 'ITALIAN SAUSAGE'),
(30, 4, 'Two pieces of chicken escalope served with fries, cheddar and salad', 120, 'images/menu/dish9.jpg', 17, 'ramzi', 'CHICKEN ESCALOPE'),
(27.99, 3, 'Tomato Sauce, Mozzarella, Anchovie, Black Olives', 83, 'images/menu/pizza4.jpg', 18, 'ramziii', 'ANCHOVIE & OLIVE'),
(21.99, 3, 'Tomato Sauce, Mozzarella, Bell Peppers, Caramelized Onions, Black Olives, Parmesean', 65, 'images/menu/pizza5.jpg', 19, 'ramziii', 'SUPREME'),
(20, -3, 'Tomato, cucumber and cheese', -60, 'images/menu/dish2.jpg', 20, 'ramziii', 'GREEK SALAD');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `username` varchar(25) NOT NULL,
  `review_ID` int(11) NOT NULL,
  `review` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`username`, `review_ID`, `review`) VALUES
('aya', 28, 'ijvh gikug ikugiou oihoih olihoih kbolih oihoih '),
('aya', 29, 'ijvh gikug ikugiou oihoih olihoih kbolih oihoih '),
('aya', 30, 'lol'),
('ramzi', 31, 'rrrrrr\r\n'),
('ramzii', 32, 'hello\r\n'),
('ramzii', 33, 'hhhh');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`Name`);

--
-- Indexes for table `ordered`
--
ALTER TABLE `ordered`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_ID`),
  ADD KEY `ID` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ordered`
--
ALTER TABLE `ordered`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
