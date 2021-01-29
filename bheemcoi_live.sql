-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 17, 2018 at 11:27 PM
-- Server version: 5.6.38
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bheemcoi_live`
--

-- --------------------------------------------------------

--
-- Table structure for table `advertise`
--

CREATE TABLE `advertise` (
  `advertise_id` int(11) NOT NULL,
  `advertise_name` text NOT NULL,
  `advertise_created_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advertise`
--

INSERT INTO `advertise` (`advertise_id`, `advertise_name`, `advertise_created_date`) VALUES
(2, '<iframe data-aa=\'807020\' src=\'//ad.a-ads.com/807020?size=200x200\' scrolling=\'no\' style=\'width:200px; height:200px; border:0px; padding:0;overflow:hidden\' allowtransparency=\'true\'></iframe>', '2018-01-09 16:52:55'),
(3, '<iframe data-aa=\'807026\' src=\'//ad.a-ads.com/807026?size=728x90\' scrolling=\'no\' style=\'width:728px; height:90px; border:0px; padding:0;overflow:hidden\' allowtransparency=\'true\'></iframe>', '2018-01-09 16:18:08'),
(4, '<iframe data-aa=\'807051\' src=\'//ad.a-ads.com/807051?size=250x250\' scrolling=\'no\' style=\'width:250px; height:250px; border:0px; padding:0;overflow:hidden\' allowtransparency=\'true\'></iframe>', '2018-01-10 17:18:14'),
(5, '<iframe data-aa=\'808043\' src=\'//ad.a-ads.com/808043?size=728x90\' scrolling=\'no\' style=\'width:728px; height:90px; border:0px; padding:0;overflow:hidden\' allowtransparency=\'true\'></iframe>', '2018-01-10 17:16:26'),
(6, 'height_210_width_270', '2017-12-20 12:04:22'),
(7, '<iframe data-aa=\'807050\' src=\'//ad.a-ads.com/807050?size=160x600\' scrolling=\'no\' style=\'width:160px; height:600px; border:0px; padding:0;overflow:hidden\' allowtransparency=\'true\'></iframe>', '2018-01-09 16:56:42'),
(8, '<iframe data-aa=\'807051\' src=\'//ad.a-ads.com/807051?size=250x250\' scrolling=\'no\' style=\'width:250px; height:250px; border:0px; padding:0;overflow:hidden\' allowtransparency=\'true\'></iframe>', '2018-01-09 16:57:41'),
(9, 'height_600_width_300', '2017-12-20 12:11:18');

-- --------------------------------------------------------

--
-- Table structure for table `api_settings`
--

CREATE TABLE `api_settings` (
  `api_id` int(11) NOT NULL,
  `api_name` varchar(200) NOT NULL,
  `api_private` varchar(200) NOT NULL,
  `api_public` varchar(200) NOT NULL,
  `current` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `api_settings`
--

INSERT INTO `api_settings` (`api_id`, `api_name`, `api_private`, `api_public`, `current`) VALUES
(1, 'coin_payment', 'acz_xoin_payment', 'abcxyz_coin_payment', 1),
(2, 'faset_hub', 'adsadfsdsdsd', 'faset_hubxyz', 0);

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `bank_id` int(11) NOT NULL,
  `bank_user_id` int(11) NOT NULL,
  `bank_name` varchar(200) NOT NULL,
  `bank_iban` varchar(200) NOT NULL,
  `bank_account` varchar(200) NOT NULL,
  `bank_amount` float NOT NULL,
  `branch_name` varchar(200) NOT NULL,
  `branch_address` varchar(200) NOT NULL,
  `bank_account_holdername` varchar(200) NOT NULL,
  `bank_created_date` datetime NOT NULL,
  `bank_updated_date` datetime NOT NULL,
  `bank_ip_address` varchar(200) NOT NULL,
  `bank_status` int(1) NOT NULL DEFAULT '1' COMMENT '0=disable,1=enable'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `user_id` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `message` text NOT NULL,
  `image` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `collect_satoshi`
--

CREATE TABLE `collect_satoshi` (
  `collect_id` int(11) NOT NULL,
  `collect_user_id` int(11) NOT NULL,
  `collect_satoshi` int(50) NOT NULL,
  `collect_ip_address` varchar(50) NOT NULL,
  `collect_created_date` datetime NOT NULL,
  `collect_earning_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `collect_satoshi`
--

INSERT INTO `collect_satoshi` (`collect_id`, `collect_user_id`, `collect_satoshi`, `collect_ip_address`, `collect_created_date`, `collect_earning_date`) VALUES
(1, 9, 36, '116.73.193.153', '2018-01-04 15:43:46', '2018-01-04 15:43:46');

-- --------------------------------------------------------

--
-- Table structure for table `daily_earnings`
--

CREATE TABLE `daily_earnings` (
  `daily_id` int(11) NOT NULL,
  `daily_user_id` int(11) NOT NULL,
  `daily_type` varchar(50) NOT NULL,
  `daily_amount` int(11) NOT NULL,
  `daily_created_date` datetime NOT NULL,
  `daily_ip_address` varchar(200) NOT NULL,
  `daily_earning_status` int(11) NOT NULL DEFAULT '1' COMMENT '1=unused,0=used	'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daily_earnings`
--

INSERT INTO `daily_earnings` (`daily_id`, `daily_user_id`, `daily_type`, `daily_amount`, `daily_created_date`, `daily_ip_address`, `daily_earning_status`) VALUES
(1, 9, 'satoshi', 44, '2018-01-04 03:42:28', '116.73.193.153', 1),
(2, 9, 'satoshi', 155, '2018-01-05 12:08:50', '106.208.225.252', 1),
(3, 24, 'satoshi', 30, '2018-01-12 12:02:32', '103.16.70.198', 1);

-- --------------------------------------------------------

--
-- Table structure for table `daily_message`
--

CREATE TABLE `daily_message` (
  `daily_message_id` int(11) NOT NULL,
  `daily_message_user_id` int(11) NOT NULL,
  `daily_message_name` text NOT NULL,
  `daily_message_created_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `deposit`
--

CREATE TABLE `deposit` (
  `deposit_id` int(11) NOT NULL,
  `deposit_user_id` int(11) NOT NULL,
  `deposit_btc_address` varchar(200) NOT NULL,
  `txid` varchar(200) NOT NULL,
  `deposit_invoice_id` varchar(30) NOT NULL,
  `btc` float NOT NULL,
  `deposit_date` datetime NOT NULL,
  `deposit_status` int(1) NOT NULL DEFAULT '0' COMMENT '0=disable,1=enable'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deposit`
--

INSERT INTO `deposit` (`deposit_id`, `deposit_user_id`, `deposit_btc_address`, `txid`, `deposit_invoice_id`, `btc`, `deposit_date`, `deposit_status`) VALUES
(1, 9, '161tDmELCHFRU61cR5ZpCDJQkjLMZax2Mt', '', 'bhimcoin1515348968', 0, '2018-01-07 23:46:10', 0),
(2, 9, '1NShEETZhfp8H7R9yYJSS3BmuykouoZ4P6', '', 'bhimcoin1515349041', 0, '2018-01-07 23:47:22', 0),
(3, 9, '1NZkvku4ceRW3xK7GxpkJgVTSbFfjDcAD', '', 'bhimcoin1515349311', 0, '2018-01-07 23:51:52', 0),
(4, 9, '12xLg9yjNrbabucG9dFC7qfpUcFZvJE4Rd', '', 'bhimcoin1515349319', 0, '2018-01-07 23:51:59', 0),
(5, 9, '1CghQGRfPtTcQuWqwDm7YbBdEMsqbNGgzP', '', 'bhimcoin1515476399', 0, '2018-01-09 11:10:00', 0),
(6, 9, '1PWRvbTFujv6B5zJFBBw4SH1iC8qmR956d', '', 'bhimcoin1515477573', 0, '2018-01-09 11:29:34', 0),
(7, 9, '1Hc6rBa5iVbCfWjoCUGFdqFRcJkzxS3ZK3', '', 'bhimcoin1515477579', 0, '2018-01-09 11:29:39', 0),
(8, 9, '1JpFi27mDydkNZgAFVBueDaKYygcsRh5NX', '', 'bhimcoin1515477584', 0, '2018-01-09 11:29:44', 0),
(9, 9, '1NLY7cWUA7FiMTBEwCnPR6sBUqKjyKfyDm', '', 'bhimcoin1515479217', 0, '2018-01-09 11:56:57', 0),
(10, 9, '18H78cR12wDNq5KGqPc16rstQfRXXekiUi', '', 'bhimcoin1515929048', 0, '2018-01-14 16:54:09', 0),
(11, 9, '16SgWDgHHh8MaARaGoNiKaFDfMBtdvJUsK', '', 'bhimcoin1516107110', 0, '2018-01-16 18:21:52', 0),
(12, 9, '1FVRGKeZkTh3X7dxjPvy9Tbysnn21SdQPJ', '', 'bhimcoin1516107128', 0, '2018-01-16 18:22:08', 0),
(13, 9, '1BA3mntvrnoNaorwp8Zsjfv5k5ZhAUt3jV', '', 'bhimcoin1516107148', 0, '2018-01-16 18:22:28', 0),
(14, 9, '18DuxS8yemFQzfZq21vHkVajxYaZT2d4Eu', '', 'bhimcoin1516125750', 0, '2018-01-16 23:32:30', 0);

-- --------------------------------------------------------

--
-- Table structure for table `explorer`
--

CREATE TABLE `explorer` (
  `explorer_id` int(11) NOT NULL,
  `explorer_user_id` int(11) NOT NULL,
  `explorer_daily_star` int(11) NOT NULL,
  `explorer_created_date` datetime NOT NULL,
  `explorer_ip_address` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `explorer`
--

INSERT INTO `explorer` (`explorer_id`, `explorer_user_id`, `explorer_daily_star`, `explorer_created_date`, `explorer_ip_address`) VALUES
(1, 9, 1, '2018-01-04 00:00:00', '116.73.193.153'),
(2, 9, 1, '2018-01-05 00:00:00', '106.208.225.252'),
(3, 9, 1, '2018-01-09 00:00:00', '122.171.83.245'),
(4, 24, 1, '2018-01-12 00:00:00', '103.16.70.198');

-- --------------------------------------------------------

--
-- Table structure for table `foods`
--

CREATE TABLE `foods` (
  `foods_id` int(11) NOT NULL,
  `foods_name` varchar(200) NOT NULL,
  `foods_image` varchar(200) NOT NULL,
  `foods_health_capicity` int(50) NOT NULL,
  `foods_status` int(11) NOT NULL COMMENT '0=No,1=Yes',
  `foods_created_date` datetime NOT NULL,
  `foods_ip_address` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foods`
--

INSERT INTO `foods` (`foods_id`, `foods_name`, `foods_image`, `foods_health_capicity`, `foods_status`, `foods_created_date`, `foods_ip_address`) VALUES
(1, '10', 'apple.png', 1, 1, '2018-01-04 00:00:00', '116.73.193.153'),
(2, 'Grapes', 'grapes.png', 5, 1, '2017-12-01 00:00:00', '60.254.125.26'),
(3, 'Coconut', 'coconut.png', 15, 1, '2017-12-01 00:00:00', '60.254.125.26'),
(4, 'Milk', 'milk.png', 20, 1, '2017-12-01 00:00:00', '60.254.125.26'),
(5, 'Laddu', 'laddo2.png', 40, 1, '2017-12-01 00:00:00', '60.254.125.26');

-- --------------------------------------------------------

--
-- Table structure for table `generated_satoshi`
--

CREATE TABLE `generated_satoshi` (
  `generated_satoshi_id` int(11) NOT NULL,
  `generated_satoshi_user_id` int(11) NOT NULL,
  `generated_satoshi_amount` int(200) NOT NULL,
  `generated_satoshi_created_date` datetime NOT NULL,
  `generated_satoshi_ip_address` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `generated_satoshi`
--

INSERT INTO `generated_satoshi` (`generated_satoshi_id`, `generated_satoshi_user_id`, `generated_satoshi_amount`, `generated_satoshi_created_date`, `generated_satoshi_ip_address`) VALUES
(1, 9, 36, '2018-01-04 15:43:46', '116.73.193.153');

-- --------------------------------------------------------

--
-- Table structure for table `monkeystar`
--

CREATE TABLE `monkeystar` (
  `monkeystar_id` int(11) NOT NULL,
  `monkeystar_user_id` int(11) NOT NULL,
  `monkeystar_daily_star` int(11) NOT NULL,
  `monkeystar_created_date` datetime NOT NULL,
  `monkeystar_ip_address` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `musermst`
--

CREATE TABLE `musermst` (
  `user_id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `musermst`
--

INSERT INTO `musermst` (`user_id`, `username`, `password`, `email`) VALUES
(1, 'manage-ad', 'ac770e44462ec4bfe78f1a06a60712e5', 'saravanan.mindapps@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `player`
--

CREATE TABLE `player` (
  `player_id` int(11) NOT NULL,
  `player_user_id` int(11) NOT NULL,
  `player_name` varchar(50) NOT NULL,
  `player_satoshi_minute` int(11) NOT NULL,
  `player_membership` varchar(50) NOT NULL,
  `player_price` double NOT NULL,
  `player_price_type` int(1) NOT NULL COMMENT '1=satoshi , 2=star , 3=btc',
  `player_daily_limit` int(11) NOT NULL,
  `player_image` varchar(200) NOT NULL,
  `player_capicity` int(11) NOT NULL,
  `player_createdDate` datetime NOT NULL,
  `player_ip_address` varchar(200) NOT NULL,
  `player_status` int(1) NOT NULL DEFAULT '1' COMMENT '0=disable,1=enable'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `player`
--

INSERT INTO `player` (`player_id`, `player_user_id`, `player_name`, `player_satoshi_minute`, `player_membership`, `player_price`, `player_price_type`, `player_daily_limit`, `player_image`, `player_capicity`, `player_createdDate`, `player_ip_address`, `player_status`) VALUES
(1, 24, 'Monkey', 2, 'lifetime', 100, 1, 80, 'player11.png', 40, '2018-01-12 11:41:45', '103.16.70.198', 1),
(2, 24, 'Kalia', 1, 'lifetime', 100, 1, 80, 'player21.png', 60, '2018-01-12 11:41:56', '103.16.70.198', 1),
(3, 0, 'Chutki', 4, '2', 10, 2, 200, 'player31.png', 100, '2017-12-29 10:43:24', '157.50.10.185', 1),
(4, 0, 'Raju', 6, '2', 20, 2, 250, 'player4.png', 120, '2017-12-29 10:43:41', '157.50.10.185', 1),
(5, 0, 'Bheem', 26, '30', 0.01, 3, 36000, 'player51.png', 3000, '2017-12-29 10:43:56', '157.50.10.185', 1);

-- --------------------------------------------------------

--
-- Table structure for table `satoshi`
--

CREATE TABLE `satoshi` (
  `satoshi_id` int(11) NOT NULL,
  `satoshi_min` int(50) NOT NULL,
  `satoshi_max` int(50) NOT NULL,
  `satoshi_createdDate` datetime NOT NULL,
  `satoshi_IpAddress` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `satoshi`
--

INSERT INTO `satoshi` (`satoshi_id`, `satoshi_min`, `satoshi_max`, `satoshi_createdDate`, `satoshi_IpAddress`) VALUES
(1, 10, 50, '2018-01-06 00:00:00', '157.50.13.59');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `slider_id` int(11) NOT NULL,
  `slider_image` varchar(200) NOT NULL,
  `slider_content` text NOT NULL,
  `slider_view` int(1) NOT NULL COMMENT '1=before_login, 2=after_login',
  `created_date` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`slider_id`, `slider_image`, `slider_content`, `slider_view`, `created_date`) VALUES
(1, 'b1.png', '<div style=\"position: absolute;\r\n                             top: 313px;\r\n                             left: 37px;\r\n                             padding: 3%;\r\n                             width: 639px;\r\n                             text-shadow: 2px 1px 4px #171716;\r\n                             height: 286px;\r\n                             font-weight: bold;\r\n                             background-color: rgba(197, 219, 59, 0.61);\r\n                             text-transform: uppercase;\r\n                             font-size: 50px;\r\n                             color: #241707;\r\n                             line-height: 71px;\">Instantly Free </br><span style=\" color: #d21510;text-shadow: 3px 4px 2px #000;\">Bitcoin Generator</span></br><span style=\" color: #fff;text-shadow: 3px 4px 2px #000;\">Game For all !</span></div>', 1, '12/12/2017'),
(2, 'b2.png', '<div style=\"position: absolute;\n                             top: 64px;\n                             left: 1114px;\n                             padding: 3%;\n                             width: 639px;\n                             text-shadow: 2px 1px 4px #171716;\n                             height: 531px;\n                             font-weight: bold;\n                             background-color: rgba(197, 219, 59, 0.61);\n                             text-transform: uppercase;\n                             font-size: 50px;\n                             color: #241707;\n                             line-height: 75px;\">Free Members </br><span style=\" color: #d21510;text-shadow: 3px 4px 2px #000;\">Get 2 or 5 Satoshi\'s</span></br><span style=\" color: #fff;text-shadow: 3px 4px 2px #000;\">Every 5 Minutes</span> </br><span>Upgraded</b> Get</span></br><span>Up to <b>10</b> Satoshi\'s</span></br><span style=\"color: #fff;\">Every 5 Minutes</span></div>', 1, '12/12/2017'),
(3, 'b3.png', '<div style=\"position: absolute;\r\n                             top: 64px;\r\n                             left:50px;\r\n                             padding: 3%;\r\n                             width: 639px;\r\n                             text-shadow: 2px 1px 4px #171716;\r\n                             height: 481px;\r\n                             font-weight: bold;\r\n                             background-color: rgba(197, 219, 59, 0.61);\r\n                             text-transform: uppercase;\r\n                             font-size: 50px;\r\n                             color: #241707;\r\n                             line-height: 75px;\">Win Free Daily Gifts</br><span style=\" color: #d21510;text-shadow: 3px 4px 2px #000;\">upto (~500 Satoshi)</span></br><span style=\" text-shadow: 3px 4px 2px #000;\">based on</span> </br><span style=\" color: #fff;text-shadow: 3px 4px 2px #000;\">Bitcoin price</span></div>', 1, '12/12/2017');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `refered_by` varchar(256) NOT NULL,
  `bitcoin_address` varchar(512) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(512) NOT NULL,
  `reference_link` varchar(512) NOT NULL,
  `how_find` varchar(128) NOT NULL,
  `ip_address` varchar(128) NOT NULL,
  `status` varchar(128) NOT NULL DEFAULT '1' COMMENT '0=disable,1=enable',
  `status_block` int(1) NOT NULL DEFAULT '1' COMMENT '0=disable,1=enable',
  `date` date NOT NULL,
  `user_admin` int(11) NOT NULL DEFAULT '0' COMMENT '0=No,1=Yes',
  `user_player_health` int(11) NOT NULL,
  `user_attack_player_satoshi` float NOT NULL,
  `refer_earning` float NOT NULL,
  `user_star` int(11) NOT NULL,
  `user_current_player` int(1) NOT NULL DEFAULT '1' COMMENT '1 = default player',
  `user_current_player_expire` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_earning_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `refered_by`, `bitcoin_address`, `email`, `image`, `reference_link`, `how_find`, `ip_address`, `status`, `status_block`, `date`, `user_admin`, `user_player_health`, `user_attack_player_satoshi`, `refer_earning`, `user_star`, `user_current_player`, `user_current_player_expire`, `user_earning_date`) VALUES
(9, 'admin', 'e64052537b32f9868c3d222f67fcf045', '', '3LdDAxzFC9pL8wRNCpK2tF7Rs1txhfa1C', 'vnktpy@gmail.com', 'apple.png', 'http://testcodeonline.com/bhimcoin/index.php/welcome/register/admin', 'demo', '5', '1', 1, '2017-11-17', 1, 0, 856, 0, 49, 1, '2018-01-07 23:21:32', '2018-01-04 15:43:46'),
(26, 'jones', 'e10adc3949ba59abbe56e057f20f883e', '23', 'Txoxoyyoocpucpucp', 'jones@gmail.com', '', 'https://bheemcoin.com/index.php/welcome/register/Webiots', 'Google', '157.32.55.145', '1', 1, '2018-01-10', 0, 0, 0, 0, 0, 1, '2018-01-10 07:33:15', '2018-01-10 18:03:15'),
(24, 'webiotsm', 'e6053eb8d35e02ae40beeeacef203c1a', '23', 'dasdasd5a4d54asd54sad54', 'vnktshiv@gmail.com', '', 'https://bheemcoin.com/index.php/welcome/register/webiots', 'google', '77.111.246.15', '0', 1, '2018-01-10', 0, 0, 31, 0, 1, 1, '2018-01-10 03:04:04', '2018-01-10 13:34:04');

-- --------------------------------------------------------

--
-- Table structure for table `withdraw`
--

CREATE TABLE `withdraw` (
  `withdraw_id` int(11) NOT NULL,
  `withdraw_user_id` int(11) NOT NULL,
  `withdrawl_type` int(1) NOT NULL COMMENT '1=blockchain,2=facethub',
  `withdraw_btc_address` varchar(200) NOT NULL,
  `withdraw_btc_amount` float NOT NULL,
  `withdraw_status` int(1) NOT NULL DEFAULT '0' COMMENT '0 = pendind , 1 = approve , 2 = reject',
  `withdraw_date` datetime NOT NULL,
  `withdraw_ip_address` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `withdraw_limit`
--

CREATE TABLE `withdraw_limit` (
  `withdraw_limit_id` int(11) NOT NULL,
  `withdraw_limit_min` double NOT NULL,
  `withdraw_limit_max` double NOT NULL,
  `withdraw_limit_type` int(1) NOT NULL COMMENT '1=blockchain,2=facethub',
  `withdraw_limit_created_date` datetime NOT NULL,
  `withdraw_limit_fees` float NOT NULL,
  `withdraw_limit_ip_address` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `withdraw_limit`
--

INSERT INTO `withdraw_limit` (`withdraw_limit_id`, `withdraw_limit_min`, `withdraw_limit_max`, `withdraw_limit_type`, `withdraw_limit_created_date`, `withdraw_limit_fees`, `withdraw_limit_ip_address`) VALUES
(1, 20000, 10000000, 1, '2018-01-06 02:08:35', 5000, '157.50.13.59'),
(2, 100, 100000, 2, '2018-01-06 02:07:37', 25, '157.50.13.59');

-- --------------------------------------------------------

--
-- Table structure for table `worker`
--

CREATE TABLE `worker` (
  `worker_id` int(11) NOT NULL,
  `worker_name` varchar(200) NOT NULL,
  `worker_image` varchar(200) NOT NULL,
  `worker_minute` int(50) NOT NULL,
  `worker_value` int(11) NOT NULL,
  `worker_status` int(11) NOT NULL DEFAULT '1' COMMENT '0=No,1=Yes	',
  `worker_created_date` datetime NOT NULL,
  `worker_ip_address` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `worker`
--

INSERT INTO `worker` (`worker_id`, `worker_name`, `worker_image`, `worker_minute`, `worker_value`, `worker_status`, `worker_created_date`, `worker_ip_address`) VALUES
(2, 'Dholu Bholu', 'login1.jpg', 10, 1, 1, '2018-01-06 00:00:00', '157.50.13.59');

-- --------------------------------------------------------

--
-- Table structure for table `worker_satoshi`
--

CREATE TABLE `worker_satoshi` (
  `worker_satoshi_id` int(11) NOT NULL,
  `worker_s_worker_id` int(11) NOT NULL,
  `worker_satoshi_userId` int(11) NOT NULL,
  `worker_satoshi_amount` int(11) NOT NULL,
  `worker_satoshi_ip` varchar(200) NOT NULL,
  `worker_satoshi_created_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `worker_satoshi`
--

INSERT INTO `worker_satoshi` (`worker_satoshi_id`, `worker_s_worker_id`, `worker_satoshi_userId`, `worker_satoshi_amount`, `worker_satoshi_ip`, `worker_satoshi_created_date`) VALUES
(1, 2, 9, 10, '116.73.193.153', '2018-01-04 15:43:33'),
(2, 2, 24, 1, '103.16.70.198', '2018-01-12 11:14:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advertise`
--
ALTER TABLE `advertise`
  ADD PRIMARY KEY (`advertise_id`);

--
-- Indexes for table `api_settings`
--
ALTER TABLE `api_settings`
  ADD PRIMARY KEY (`api_id`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`bank_id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `collect_satoshi`
--
ALTER TABLE `collect_satoshi`
  ADD PRIMARY KEY (`collect_id`);

--
-- Indexes for table `daily_earnings`
--
ALTER TABLE `daily_earnings`
  ADD PRIMARY KEY (`daily_id`);

--
-- Indexes for table `daily_message`
--
ALTER TABLE `daily_message`
  ADD PRIMARY KEY (`daily_message_id`);

--
-- Indexes for table `deposit`
--
ALTER TABLE `deposit`
  ADD PRIMARY KEY (`deposit_id`);

--
-- Indexes for table `explorer`
--
ALTER TABLE `explorer`
  ADD PRIMARY KEY (`explorer_id`);

--
-- Indexes for table `foods`
--
ALTER TABLE `foods`
  ADD PRIMARY KEY (`foods_id`);

--
-- Indexes for table `generated_satoshi`
--
ALTER TABLE `generated_satoshi`
  ADD PRIMARY KEY (`generated_satoshi_id`);

--
-- Indexes for table `monkeystar`
--
ALTER TABLE `monkeystar`
  ADD PRIMARY KEY (`monkeystar_id`);

--
-- Indexes for table `musermst`
--
ALTER TABLE `musermst`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `player`
--
ALTER TABLE `player`
  ADD PRIMARY KEY (`player_id`);

--
-- Indexes for table `satoshi`
--
ALTER TABLE `satoshi`
  ADD PRIMARY KEY (`satoshi_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `ip_address` (`ip_address`),
  ADD KEY `ip_address_2` (`ip_address`);

--
-- Indexes for table `withdraw`
--
ALTER TABLE `withdraw`
  ADD PRIMARY KEY (`withdraw_id`);

--
-- Indexes for table `withdraw_limit`
--
ALTER TABLE `withdraw_limit`
  ADD PRIMARY KEY (`withdraw_limit_id`);

--
-- Indexes for table `worker`
--
ALTER TABLE `worker`
  ADD PRIMARY KEY (`worker_id`);

--
-- Indexes for table `worker_satoshi`
--
ALTER TABLE `worker_satoshi`
  ADD PRIMARY KEY (`worker_satoshi_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advertise`
--
ALTER TABLE `advertise`
  MODIFY `advertise_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `api_settings`
--
ALTER TABLE `api_settings`
  MODIFY `api_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `bank_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `collect_satoshi`
--
ALTER TABLE `collect_satoshi`
  MODIFY `collect_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `daily_earnings`
--
ALTER TABLE `daily_earnings`
  MODIFY `daily_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `daily_message`
--
ALTER TABLE `daily_message`
  MODIFY `daily_message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `deposit`
--
ALTER TABLE `deposit`
  MODIFY `deposit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `explorer`
--
ALTER TABLE `explorer`
  MODIFY `explorer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `foods`
--
ALTER TABLE `foods`
  MODIFY `foods_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `generated_satoshi`
--
ALTER TABLE `generated_satoshi`
  MODIFY `generated_satoshi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `monkeystar`
--
ALTER TABLE `monkeystar`
  MODIFY `monkeystar_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `musermst`
--
ALTER TABLE `musermst`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `player`
--
ALTER TABLE `player`
  MODIFY `player_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `satoshi`
--
ALTER TABLE `satoshi`
  MODIFY `satoshi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `withdraw`
--
ALTER TABLE `withdraw`
  MODIFY `withdraw_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `withdraw_limit`
--
ALTER TABLE `withdraw_limit`
  MODIFY `withdraw_limit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `worker`
--
ALTER TABLE `worker`
  MODIFY `worker_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `worker_satoshi`
--
ALTER TABLE `worker_satoshi`
  MODIFY `worker_satoshi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
