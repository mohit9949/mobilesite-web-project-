CREATE TABLE IF NOT EXISTS `tblproduct` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `price` double(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_code` (`code`)
)

INSERT INTO `tblproduct` (`id`, `name`, `code`, `image`, `price`) VALUES
(1, 'iPhone 7', '3DcAM01', '/Applications/MAMP/htdocs/simple-php-shopping-cart 2/product-images/iphone7s.jpg',59999.00),
(2, 'Moto G5 Plus', 'USB02', '/Applications/MAMP/htdocs/simple-php-shopping-cart 2/product-images/motog5s.jpg',16999.00),
(3, 'Sony XA', 'wristWear03', '/Applications/MAMP/htdocs/simple-php-shopping-cart 2/product-images/xa.jpg', 15990.00);
