-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 31, 2020 at 01:37 PM
-- Server version: 10.3.25-MariaDB-0ubuntu0.20.04.1
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopping_card`
--

-- --------------------------------------------------------

--
-- Table structure for table `card`
--

CREATE TABLE `card` (
  `card_id` int(11) NOT NULL,
  `card_date` datetime NOT NULL,
  `total` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `card`
--

INSERT INTO `card` (`card_id`, `card_date`, `total`) VALUES
(2, '2020-12-22 00:00:55', 9.5),
(3, '2020-12-23 10:00:00', 9),
(4, '2020-12-23 00:00:00', 0),
(5, '2020-12-23 00:00:00', 0),
(6, '2020-12-23 00:00:00', 0),
(7, '2020-12-23 00:00:00', 0),
(8, '2020-12-23 00:00:00', 0),
(9, '2020-12-23 00:00:00', 0),
(10, '2020-12-23 00:00:00', 0),
(11, '2020-12-23 00:00:00', 0),
(12, '2020-12-23 00:00:00', 0),
(13, '2020-12-23 00:00:00', 0),
(14, '2020-12-23 00:00:00', 0),
(15, '2020-12-23 00:00:00', 0),
(16, '2020-12-31 00:00:00', 0),
(17, '2020-12-31 00:00:00', 0),
(18, '2020-12-31 00:00:00', 0),
(19, '2020-12-31 00:00:00', 0),
(20, '2020-12-31 00:00:00', 0),
(21, '2020-12-31 12:29:51', 1);

-- --------------------------------------------------------

--
-- Table structure for table `card_product`
--

CREATE TABLE `card_product` (
  `card_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `unit_price` float NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `card_product`
--

INSERT INTO `card_product` (`card_id`, `product_id`, `unit_price`, `amount`) VALUES
(9, 67, 7.99, 1),
(9, 67, 7.99, 1),
(2, 15, 9.5, 1),
(2, 15, 9.5, 1),
(4, 9, 3.5, 1),
(4, 96, 11, 2),
(2, 67, 4.99, 2),
(3, 54, 3.5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` float NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `name`, `price`, `description`) VALUES
(1, 'Sabão em pó', 7.99, 'Produtos de Limpeza'),
(2, 'Amaciante', 4.9, 'Produtos de Limpeza'),
(3, 'Detergente', 1.99, 'Produtos de Limpeza'),
(4, 'Água sanitária', 3.99, 'Produtos de Limpeza'),
(5, 'Esponja de aço', 4.5, 'Produtos de Limpeza'),
(6, 'Buchinha de pia', 5.5, 'Produtos de Limpeza'),
(7, 'Sabão em pedra', 6.5, 'Produtos de Limpeza'),
(8, 'Sabonete', 2.5, 'Produtos de Limpeza'),
(9, 'Shampo', 3.5, 'Produtos de Limpeza'),
(10, 'Condicionador', 4.5, 'Produtos de Limpeza'),
(11, 'Desinfetante', 5.5, 'Produtos de Limpeza'),
(12, 'Lustra móveis', 6.5, 'Produtos de Limpeza'),
(13, 'Tira manchas', 7.5, 'Produtos de Limpeza'),
(14, 'Limpa vidros', 8.5, 'Produtos de Limpeza'),
(15, 'Alcool', 9.5, 'Produtos de Limpeza'),
(16, 'Saco de lixo 30l', 10.5, 'Produtos de Limpeza'),
(17, 'Saco de lixo 50l', 11.5, 'Produtos de Limpeza'),
(18, 'Refrigerante 2l', 8.5, 'Bebidas'),
(19, 'Suco garrafa 1l', 13.5, 'Bebidas'),
(20, 'Suco caixinha 500ml', 14.5, 'Bebidas'),
(21, 'Suco sachê', 15.5, 'Bebidas'),
(22, 'Leite integral litro', 16.5, 'Bebidas'),
(23, 'Leite desnatado 2 litros', 3.88, 'Bebida'),
(24, 'Arroz 5kg', 18.5, 'Alimentacao'),
(25, 'Feijão 2kg', 19.5, 'Alimentacao'),
(26, 'Macarrão', 20.5, 'Alimentacao'),
(27, 'Extrato de tomate', 21.5, 'Alimentacao'),
(28, 'Molho de tomate', 22.5, 'Alimentacao'),
(29, 'Sal', 23.5, 'Alimentacao'),
(30, 'Açucar', 24.5, 'Alimentacao'),
(31, 'Achocolatado', 25.5, 'Alimentacao'),
(32, 'Bolacha', 26.5, 'Alimentacao'),
(33, 'Café', 27.5, 'Alimentacao'),
(34, 'Farofa pronta', 28.5, 'Alimentacao'),
(35, 'Fubá', 29.5, 'Alimentacao'),
(36, 'Farinha de trigo', 30.5, 'Alimentacao'),
(37, 'Farinha de milho', 31.5, 'Alimentacao'),
(38, 'Farinha de mandioca', 32.5, 'Alimentacao'),
(39, 'Sardinha', 33.5, 'Alimentacao'),
(40, 'Atum', 34.5, 'Alimentacao'),
(41, 'Maionese', 35.5, 'Alimentacao'),
(42, 'Molho de pimenta', 36.5, 'Alimentacao'),
(43, 'Ervilha', 37.5, 'Alimentacao'),
(44, 'Milho verde', 38.5, 'Alimentacao'),
(45, 'Seleta ', 39.5, 'Alimentacao'),
(46, 'Doce de leite', 40.5, 'Alimentacao'),
(47, 'Goiabada', 41.5, 'Alimentacao'),
(48, 'Milho de pipoca', 42.5, 'Alimentacao'),
(49, 'Óleo de cozinha', 43.5, 'Alimentacao'),
(50, 'Leite em pó', 44.5, 'Alimentacao'),
(51, 'Creme de leite', 45.5, 'Alimentacao'),
(52, 'Leite condensado', 46.5, 'Alimentacao'),
(53, 'Pão de forma', 47.5, 'Alimentacao'),
(54, 'Alface', 48.5, 'Hortifruti'),
(55, 'Couve', 49.5, 'Hortifruti'),
(56, 'Batata', 50.5, 'Hortifruti'),
(57, 'Tomate', 51.5, 'Hortifruti'),
(58, 'Cenoura', 52.5, 'Hortifruti'),
(59, 'Beterraba', 53.5, 'Hortifruti'),
(60, 'Chicória', 54.5, 'Hortifruti'),
(61, 'Mandioca', 55.5, 'Hortifruti'),
(62, 'Chuchu', 56.5, 'Hortifruti'),
(63, 'Espinafre', 57.5, 'Hortifruti'),
(64, 'Banana', 58.5, 'Hortifruti'),
(65, 'Ovos', 59.5, 'Hortifruti'),
(66, 'Uva', 60.5, 'Hortifruti'),
(67, 'Abacate', 61.5, 'Hortifruti'),
(68, 'Mamão', 62.5, 'Hortifruti'),
(69, 'Melancia', 63.5, 'Hortifruti'),
(70, 'Melão', 64.5, 'Hortifruti'),
(71, 'Jiló', 65.5, 'Hortifruti'),
(72, 'Quiabo', 66.5, 'Hortifruti'),
(73, 'Salsa', 67.5, 'Hortifruti'),
(74, 'Cheiro verde', 68.5, 'Hortifruti'),
(75, 'Cebola', 69.5, 'Hortifruti'),
(76, 'Queijo Minas', 70.5, 'Carnes e Frios'),
(77, 'Queijo Mussarela', 71.5, 'Carnes e Frios'),
(78, 'Queijo outros', 72.5, 'Carnes e Frios'),
(79, 'Manteiga', 73.5, 'Carnes e Frios'),
(80, 'Margarina', 74.5, 'Carnes e Frios'),
(81, 'Iogurte', 75.5, 'Carnes e Frios'),
(82, 'Presunto', 76.5, 'Carnes e Frios'),
(83, 'Peixe', 77.5, 'Carnes e Frios'),
(84, 'Frango', 78.5, 'Carnes e Frios'),
(85, 'Carne vermelha', 79.5, 'Carnes e Frios'),
(86, 'Carne seca', 80.5, 'Carnes e Frios'),
(87, 'Salsicha', 81.5, 'Carnes e Frios'),
(88, 'Batata palha fina', 12.99, 'Batata palha pequena'),
(89, 'Batata palha com calabresa', 12.99, 'Batata palha pequena'),
(90, 'Batata Rufles', 12.99, 'Batata palha pequena'),
(91, 'Batata Springs', 12.99, 'Batata palha pequena'),
(92, 'Batata palha', 12.99, 'Batata palha pequena'),
(93, 'Batata Doce', 12.99, 'Batata palha pequena'),
(94, 'Batata corada', 12.99, 'Batata palha pequena'),
(95, 'Batata calabresa', 12.99, 'Batata palha pequena'),
(96, 'Alcatra', 49.99, 'Carnes e frios'),
(97, 'Picanha', 49.99, 'Carnes e frios'),
(98, 'Algodao doce', 4.99, 'Doce');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`card_id`);

--
-- Indexes for table `card_product`
--
ALTER TABLE `card_product`
  ADD KEY `fk_card_id` (`card_id`),
  ADD KEY `fk_product_id` (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `card`
--
ALTER TABLE `card`
  MODIFY `card_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `card_product`
--
ALTER TABLE `card_product`
  ADD CONSTRAINT `fk_card_id` FOREIGN KEY (`card_id`) REFERENCES `card` (`card_id`),
  ADD CONSTRAINT `fk_product_id` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
