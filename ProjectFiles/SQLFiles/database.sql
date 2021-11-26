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
  `password` varchar(64) NOT NULL default '',
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
  `order_number` varchar(64) NOT NULL,
  `customer_name` varchar(64) NOT NULL,
  `telephone` int(20) NOT NULL,
  `address` varchar(64) NOT NULL,
  `product_name` varchar(64) NOT NULL,
  `quantity` int(20) NOT NULL,
  `price` int(20) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4080 DEFAULT CHARSET=utf8mb4;
