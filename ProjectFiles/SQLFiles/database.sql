DROP DATABASE IF EXISTS risdendata;
CREATE DATABASE risdendata;
USE risdendata;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL auto_increment,
  `role` varchar(64) NOT NULL default '',
  `username` varchar(64) NOT NULL unique,
  `password` varchar(128) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4080 DEFAULT CHARSET=utf8mb4;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(11) NOT NULL auto_increment,
  `supplier` varchar(64) NOT NULL default '',
  `product_name` varchar(64) NOT NULL,
  `quantity` int(35) NOT NULL,
  `price` int(20) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4080 DEFAULT CHARSET=utf8mb4;

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
CREATE TABLE `transactions` (
  `id` int(11) NOT NULL auto_increment,
  `order_number` varchar(64) NOT NULL default '',
  `title` varchar(64) NOT NULL default '',
  `customer_name` varchar(64) NOT NULL default '',
  `telephone` char(50) NOT NULL  default '',
  `delivery_address` varchar(128) NOT NULL default '',
  `product_name` varchar(64) NOT NULL default '',
  `quantity` int(40) NOT NULL default '0',
  `price` varchar(40) NOT NULL default '',
  `discount` varchar(20) NOT NULL default '0',
  `payment` varchar(20) NULL default '',
  `change` varchar(20) NULL default '',
  `delivery_date` date NOT NULL,
  `transaction_time` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4080 DEFAULT CHARSET=utf8mb4;

--
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
CREATE TABLE `logs` (
  `id` int(11) NOT NULL auto_increment,
  `product_id` int(11) NOT NULL,
  `changed_supplier` varchar(64) NOT NULL default '',
  `changed_product_name` varchar(64) NOT NULL,
  `changed_quantity` int(35) NOT NULL,
  `changed_price` int(20) NOT NULL,
  `operation` varchar(64) NOT NULL,
  `log_time` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;


--
-- Table structure for table `incoming_orders`
--

DROP TABLE IF EXISTS `incoming_orders`;
CREATE TABLE `incoming_orders` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(64) NOT NULL default '',
  `customer_name` varchar(64) NOT NULL default '',
  `telephone` char(50) NOT NULL default '',
  `delivery_address` varchar(128) NOT NULL default '',
  `product_name` varchar(64) NOT NULL default '',
  `quantity` int(40) NOT NULL,
  `delivery_date` date NOT NULL,
  `transaction_time` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS `email`;
CREATE TABLE `email` (
  `id` int(11) NOT NULL auto_increment,
  `email` varchar(64) NOT NULL default '',
  `password` varchar(64) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS `gct`;
CREATE TABLE `gct` (
  `id` int(11) NOT NULL auto_increment,
  `gct` varchar(64) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;


INSERT INTO `users` VALUES (1, 'admin', 'devTeam1', 'ae9030c665364eb2651d450e8321ae62dd51a726');