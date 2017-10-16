-- phpMyAdmin SQL Dump
-- version 4.6.5.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 16-Out-2017 às 22:36
-- Versão do servidor: 5.6.34
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `redfoot`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `address`
--

CREATE TABLE `address` (
  `startup_id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `street` varchar(300) DEFAULT NULL,
  `number` varchar(50) DEFAULT NULL,
  `complement` varchar(250) DEFAULT NULL,
  `neighborhood` varchar(250) DEFAULT NULL,
  `zipcode` varchar(8) DEFAULT NULL,
  `city` varchar(250) DEFAULT NULL,
  `uf` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `address`
--

INSERT INTO `address` (`startup_id`, `type`, `street`, `number`, `complement`, `neighborhood`, `zipcode`, `city`, `uf`) VALUES
(3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `business`
--

CREATE TABLE `business` (
  `startup_id` int(11) NOT NULL,
  `main_market` int(11) DEFAULT NULL,
  `complementary_market` varchar(3000) DEFAULT NULL,
  `current_moment` int(11) DEFAULT NULL,
  `target_audience` varchar(50) DEFAULT NULL,
  `business_model` int(11) DEFAULT NULL,
  `revenue_model` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `business`
--

INSERT INTO `business` (`startup_id`, `main_market`, `complementary_market`, `current_moment`, `target_audience`, `business_model`, `revenue_model`) VALUES
(3, 0, 'null', 0, NULL, 0, 0),
(4, 0, 'null', 0, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `config`
--

CREATE TABLE `config` (
  `id` int(11) NOT NULL,
  `url_base` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `config`
--

INSERT INTO `config` (`id`, `url_base`) VALUES
(1, 'http://localhost/redfoot/');

-- --------------------------------------------------------

--
-- Estrutura da tabela `investment`
--

CREATE TABLE `investment` (
  `startup_id` int(11) NOT NULL,
  `is_invested` tinyint(1) DEFAULT NULL,
  `looking_for_investment` int(11) DEFAULT NULL,
  `investment_data` varchar(3000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `investment`
--

INSERT INTO `investment` (`startup_id`, `is_invested`, `looking_for_investment`, `investment_data`) VALUES
(3, 0, 0, 'null'),
(4, 0, 0, 'null');

-- --------------------------------------------------------

--
-- Estrutura da tabela `startup`
--

CREATE TABLE `startup` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `url` varchar(250) DEFAULT NULL,
  `partners_number` int(11) DEFAULT NULL,
  `employees_number` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `is_formalized` tinyint(1) DEFAULT NULL,
  `fullname` varchar(250) DEFAULT NULL,
  `document1` int(11) DEFAULT NULL,
  `foundation_date` date DEFAULT NULL,
  `reason_formalized` int(11) DEFAULT NULL,
  `contact_name` varchar(150) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `billing_range` int(11) DEFAULT NULL,
  `options_data` varchar(3000) DEFAULT NULL,
  `needs_text` varchar(3000) DEFAULT NULL,
  `image_path` varchar(300) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Extraindo dados da tabela `startup`
--

INSERT INTO `startup` (`id`, `name`, `url`, `partners_number`, `employees_number`, `start_date`, `is_formalized`, `fullname`, `document1`, `foundation_date`, `reason_formalized`, `contact_name`, `email`, `phone`, `billing_range`, `options_data`, `needs_text`, `image_path`, `created_date`, `status`) VALUES
(3, 'Redfooto', NULL, 0, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'null', NULL, 'media/ee52eba8817abd84b49096496b64fc611526482_438737332915351_473920_n.jpg', '2017-10-16 22:35:35', 0),
(4, 'Corelab', NULL, 0, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'null', NULL, 'media/8a8190ec3e3e00a990d4503c927103f813490695_884000105055736_8252217815644850166_o.jpg', '2017-10-16 22:36:04', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `torm_info`
--

CREATE TABLE `torm_info` (
  `id` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `torm_info`
--

INSERT INTO `torm_info` (`id`) VALUES
(1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`startup_id`,`type`);

--
-- Indexes for table `business`
--
ALTER TABLE `business`
  ADD PRIMARY KEY (`startup_id`);

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `investment`
--
ALTER TABLE `investment`
  ADD PRIMARY KEY (`startup_id`);

--
-- Indexes for table `startup`
--
ALTER TABLE `startup`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `startup`
--
ALTER TABLE `startup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `pk_add_id` FOREIGN KEY (`startup_id`) REFERENCES `startup` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `business`
--
ALTER TABLE `business`
  ADD CONSTRAINT `pk_bus_id` FOREIGN KEY (`startup_id`) REFERENCES `startup` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `investment`
--
ALTER TABLE `investment`
  ADD CONSTRAINT `pk_inv_id` FOREIGN KEY (`startup_id`) REFERENCES `startup` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
