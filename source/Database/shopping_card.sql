-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 30-Dez-2020 às 10:53
-- Versão do servidor: 10.3.25-MariaDB-0ubuntu0.20.04.1
-- versão do PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `shopping_card`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `card_product`
--

CREATE TABLE `card_product` (
  `card_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `unit_price` float NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `card_product`
--

INSERT INTO `card_product` (`card_id`, `product_id`, `unit_price`, `amount`) VALUES
(9, 67, 7.99, 1),
(9, 67, 7.99, 1),
(2, 15, 9.5, 1),
(2, 15, 9.5, 1),
(4, 9, 3.5, 1),
(4, 96, 11, 2),
(15, 2, 7.99, 1),
(15, 96, 9, 1),
(15, 2, 7.99, 1),
(15, 96, 9, 1),
(2, 67, 4, 1),
(3, 3, 1.99, 1),
(8, 3, 1.99, 1),
(8, 3, 1.99, 1),
(8, 3, 1.99, 1),
(8, 3, 1.99, 1),
(8, 3, 1.99, 1),
(7, 3, 1.99, 1),
(11, 3, 1.99, 4);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `card_product`
--
ALTER TABLE `card_product`
  ADD KEY `fk_card_id` (`card_id`),
  ADD KEY `fk_product_id` (`product_id`);

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `card_product`
--
ALTER TABLE `card_product`
  ADD CONSTRAINT `fk_card_id` FOREIGN KEY (`card_id`) REFERENCES `card` (`card_id`),
  ADD CONSTRAINT `fk_product_id` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
