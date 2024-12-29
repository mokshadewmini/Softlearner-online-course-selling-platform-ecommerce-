-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.34 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.5.0.6677
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for softlearner
CREATE DATABASE IF NOT EXISTS `softlearner` /*!40100 DEFAULT CHARACTER SET utf8mb3 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `softlearner`;

-- Dumping structure for table softlearner.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `fname` varchar(45) DEFAULT NULL,
  `lname` varchar(45) DEFAULT NULL,
  `verification_code` varchar(50) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `gender_id` int DEFAULT NULL,
  `mobile` varchar(10) DEFAULT NULL,
  `joined_date` date DEFAULT NULL,
  PRIMARY KEY (`email`),
  KEY `gender_id` (`gender_id`),
  CONSTRAINT `FK_admin_gender` FOREIGN KEY (`gender_id`) REFERENCES `gender` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table softlearner.admin: ~1 rows (approximately)
INSERT INTO `admin` (`fname`, `lname`, `verification_code`, `email`, `gender_id`, `mobile`, `joined_date`) VALUES
	('Moksha', 'Dewmini', '667aa367c22b2', 'dewminimoksha40@gmail.com', 2, '0711111111', '2024-06-25');

-- Dumping structure for table softlearner.cart
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_email` varchar(100) NOT NULL,
  `product_id` int NOT NULL,
  `qty` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `fk_cart_user1_idx` (`user_email`),
  KEY `fk_cart_seller1_idx` (`product_id`) USING BTREE,
  CONSTRAINT `FK_cart_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `FK_cart_user` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=945431 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table softlearner.cart: ~1 rows (approximately)
INSERT INTO `cart` (`id`, `user_email`, `product_id`, `qty`) VALUES
	(945430, 'dewminimoksha40@gmail.com', 3, 1);

-- Dumping structure for table softlearner.feedback
CREATE TABLE IF NOT EXISTS `feedback` (
  `feed_id` int NOT NULL AUTO_INCREMENT,
  `type` int DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `feed` varchar(250) DEFAULT NULL,
  `product_id` int NOT NULL,
  `user_email` varchar(100) NOT NULL,
  PRIMARY KEY (`feed_id`),
  KEY `fk_feedback_product1_idx` (`product_id`),
  KEY `fk_feedback_user1_idx` (`user_email`),
  CONSTRAINT `fk_feedback_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table softlearner.feedback: ~0 rows (approximately)

-- Dumping structure for table softlearner.gender
CREATE TABLE IF NOT EXISTS `gender` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table softlearner.gender: ~2 rows (approximately)
INSERT INTO `gender` (`id`, `name`) VALUES
	(1, 'Male'),
	(2, 'Female');

-- Dumping structure for table softlearner.image
CREATE TABLE IF NOT EXISTS `image` (
  `image_code` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `product_id` int NOT NULL,
  PRIMARY KEY (`image_code`),
  KEY `fk_image_product1_idx` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table softlearner.image: ~8 rows (approximately)
INSERT INTO `image` (`image_code`, `product_id`) VALUES
	('resource//You Tube Master Course For Beginners_0_6671bca4b0dc2.jpeg', 1),
	('resource/viva/eBay Dropshipping Course_65c872b098948.jpeg', 3),
	('resource/product/4_66758b4d83a80.jpeg', 4),
	('resource/viva/Ultimate Microsoft Office 365 Training_66706c454a8aa.jpeg', 5),
	('resource/viva/The Social Media Marketing Course_66702e25ad9d1.jpeg', 6),
	('resource/viva/Building Your Freelancing Career Specialization _66706e13541ea.png', 7),
	('resource/viva/HTML, CSS, and Javascript for Web Developers_66707a2e0d04b.jpeg', 8),
	('resource/viva/The Advanced Adobe PhotoShop course_66707fd33a97f.jpeg', 9);

-- Dumping structure for table softlearner.invoice
CREATE TABLE IF NOT EXISTS `invoice` (
  `id` int NOT NULL AUTO_INCREMENT,
  `date` datetime DEFAULT NULL,
  `total` double DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `product_id` int NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `order_id` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_invoice_product1_idx` (`product_id`),
  KEY `fk_invoice_user1_idx` (`user_email`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table softlearner.invoice: ~30 rows (approximately)
INSERT INTO `invoice` (`id`, `date`, `total`, `status`, `product_id`, `user_email`, `order_id`) VALUES
	(1, '2023-11-25 22:55:40', 12000, '0', 1, 'dewminimoksha40@gmail.com', '65622df358ff7'),
	(2, '2023-11-29 20:15:35', 12000, '0', 1, 'dewminimoksha40@gmail.com', '65674e5a58527'),
	(3, '2024-02-01 22:53:25', 12000, '0', 1, 'dewminimoksha40@gmail.com', '65bbd2454ece5'),
	(4, '2024-02-02 18:18:24', 12000, '1', 1, 'dewminimoksha40@gmail.com', '65bce498b3162'),
	(5, '2024-02-09 21:51:06', 12000, '0', 1, 'dewminimoksha40@gmail.com', '65c650c57e809'),
	(6, '2024-02-09 21:55:03', 12000, '0', 1, 'dewminimoksha40@gmail.com', '65c651c307175'),
	(7, '2024-02-09 21:58:55', 12000, '0', 1, 'dewminimoksha40@gmail.com', '65c652b0d5f21'),
	(8, '2024-02-09 22:01:23', 12000, '0', 1, 'dewminimoksha40@gmail.com', '65c653403c3a7'),
	(9, '2024-02-09 22:04:48', 12000, '0', 1, 'dewminimoksha40@gmail.com', '65c65413e038c'),
	(10, '2024-02-11 12:42:58', 13000, '0', 3, 'dewminimoksha40@gmail.com', '65c87348caa18'),
	(11, '2024-02-11 12:53:25', 13000, '0', 3, 'dewminimoksha40@gmail.com', '65c875cc4ce58'),
	(12, '2024-02-11 13:12:34', 13000, '0', 3, 'dewminimoksha40@gmail.com', '65c87a45911fa'),
	(13, '2024-02-11 13:29:55', 12000, '0', 1, 'dewminimoksha40@gmail.com', '65c87e7bc090b'),
	(14, '2024-02-11 13:29:55', 25000, '0', 3, 'dewminimoksha40@gmail.com', '65c87e7bcb309'),
	(15, '2024-06-17 23:59:50', 12000, '0', 9, 'dewminimoksha40@gmail.com', '6670807f8a495'),
	(16, '2024-06-18 00:01:01', 15000, '0', 8, 'dewminimoksha40@gmail.com', '667080c9eea10'),
	(17, '2024-06-18 00:02:29', 25000, '0', 4, 'dewminimoksha40@gmail.com', '6670811d30d82'),
	(18, '2024-06-18 00:03:30', 20000, '0', 5, 'dewminimoksha40@gmail.com', '6670815b8aca4'),
	(19, '2024-06-18 00:16:25', 12000, '0', 9, 'dewminimoksha40@gmail.com', '667084813eb29'),
	(20, '2024-06-18 00:16:25', 24000, '0', 5, 'dewminimoksha40@gmail.com', '667084814ae2e'),
	(21, '2024-06-18 00:16:25', 34000, '0', 4, 'dewminimoksha40@gmail.com', '6670848150633'),
	(22, '2024-06-18 00:16:25', 47000, '0', 3, 'dewminimoksha40@gmail.com', '6670848155bb3'),
	(23, '2024-06-18 23:36:57', 12000, '0', 9, 'dewminimoksha40@gmail.com', '6671ccc1121ba'),
	(24, '2024-06-18 23:36:57', 24000, '0', 5, 'dewminimoksha40@gmail.com', '6671ccc1509ec'),
	(25, '2024-06-18 23:36:57', 34000, '0', 4, 'dewminimoksha40@gmail.com', '6671ccc165586'),
	(26, '2024-06-18 23:36:57', 47000, '0', 3, 'dewminimoksha40@gmail.com', '6671ccc18f606'),
	(27, '2024-06-22 12:43:01', 15000, '0', 7, 'dewminimoksha40@gmail.com', '6676790ab41f1'),
	(28, '2024-06-22 12:44:19', 15000, '0', 7, 'dewminimoksha40@gmail.com', '667679a47f133'),
	(29, '2024-06-22 12:45:10', 12000, '0', 9, 'dewminimoksha40@gmail.com', '667679e6d5370'),
	(30, '2024-06-22 13:45:00', 10000, '0', 4, 'dewminimoksha40@gmail.com', '667687e3bb055');

-- Dumping structure for table softlearner.product
CREATE TABLE IF NOT EXISTS `product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `price` double DEFAULT NULL,
  `title` varchar(1000) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `description` varchar(1000) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `datetime_added` datetime DEFAULT NULL,
  `user_email` varchar(1000) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `title 2` varchar(1000) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `you_learn` varchar(1000) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `requirements` varchar(1000) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `status_id` int DEFAULT NULL,
  `tot_hours` int DEFAULT NULL,
  `lessons` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_product_user1_idx` (`user_email`),
  KEY `FK_product_status` (`status_id`),
  CONSTRAINT `FK_product_status` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`),
  CONSTRAINT `FK_product_user` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table softlearner.product: ~8 rows (approximately)
INSERT INTO `product` (`id`, `price`, `title`, `description`, `datetime_added`, `user_email`, `title 2`, `you_learn`, `requirements`, `status_id`, `tot_hours`, `lessons`) VALUES
	(1, 12000, 'You Tube Master Course For Beginners', 'Creating a comprehensive YouTube master course involves covering various aspects of YouTube, from content creation to channel optimization, audience engagement, and monetization. Here is a list of topics and modules that could be included in a YouTube master course,\r\nEach module should include video lessons, practical exercises, case studies, and opportunities for hands-on learning. Additionally, access to a supportive community or forum for students to ask questions and share their experiences can enhance the learning experience. Keep in mind that the course should be regularly updated to reflect changes in YouTube policies and best practices.', '2023-10-28 12:51:05', 'dewminimoksha40@gmail.com', 'You Tube Money Making Master Course with Approved Certificates', 'In a comprehensive YouTube master course as outlined in the previous response, students will learn a wide range of knowledge and skills related to YouTube content creation, channel growth, and audience engagement. Overall, students will gain a deep understanding of the YouTube ecosystem, from content creation and optimization to audience growth and monetization. The course should provide both theoretical knowledge and practical skills, enabling students to build and manage a successful YouTube channel while staying up-to-date with the latest trends and best practices.', 'Smart phone, PC or laptop', 1, 67, '13'),
	(3, 13000, 'Money making eBay Dropshipping Course', 'Ebay dropshipping is an excellent way to both learn about and start a small home business. With Udemy’s top-rated eBay dropshipping courses, you’ll learn the fundamentals of market and product research, as well as the basics of re-selling product on eBay.', '2024-02-11 12:39:36', 'dewminimoksha40@gmail.com', 'How to Train your Virtual Assistant for eBay Drop Shipping', 'Learn to do sellings through the social medias', 'Laptop or smart device', 1, 60, '10'),
	(4, 10000, 'The Complete Advanced NFT Course ', 'This  course from FutureLearn is a great introduction to NFTs for beginners. It covers the basics of NFTs as well as the potential risks and benefits of investing in them.  This course is a comprehensive introduction to NFTs covering everything from the basics to more advanced topics such as creating and selling your own NFTs.', '2024-06-17 15:46:50', 'dewminimoksha40@gmail.com', 'The Complete NFT Course - Learn Everything About NFTs ', 'This  course from FutureLearn is a great introduction to NFTs for beginners. It covers the basics of NFTs as well as the potential risks and benefits of investing in them.  This course is a comprehensive introduction to NFTs covering everything from the basics to more advanced topics such as creating and selling your own NFTs.', 'There are courses available for beginners, intermediates, and experts. Choose a course that is appropriate for your level of knowledge.', 1, 50, '14'),
	(5, 12000, 'The Social Media Marketing Course', 'Social media courses are a dime a dozen these days, and for good reason. Social media is a powerful tool that can be used for a variety of purposes, from marketing and branding to customer service and public relations. If you are looking to learn more about social media and how to use it effectively, taking an online course is a great option.', '2024-06-17 18:07:57', 'dewminimoksha40@gmail.com', 'The Social Media Marketing & Management Masterclass 2023 ', 'Once you have enrolled in an online course, be sure to set aside some time each week to complete the coursework. The most important thing is to learn at your own pace and to ask questions if you do not understand something.\r\nIn addition to taking an online course, there are a number of other ways to learn more about social media. Here are a few suggestions,\r\n\r\nRead social media blogs and articles. There are many great social media blogs and articles out there that can teach you about the latest trends and best practices.\r\nFollow social media experts on social media. There are many social media experts who share their knowledge and insights on social media platforms such as Twitter and LinkedIn.\r\nAttend social media conferences and events. Social media conferences and events are a great way to learn from social media experts and network with other professionals.', 'Only a smart device such as laptop, tab or mobile phone', 1, 25, '10'),
	(6, 15000, 'Ultimate Microsoft Office 365 Training Course', 'This specialization is a good option if you are new to Microsoft 365 and want to learn the basics of Word, Excel, PowerPoint, and other applications. The specialization includes three courses and takes about 4 months to complete.', '2024-06-17 22:33:01', 'dewminimoksha40@gmail.com', 'The Ultimate Microsoft Office 2021/365 Training Bundle', 'This bundle is a great option if you want to learn more advanced features of Microsoft 365. The bundle includes six courses on Word, Excel, PowerPoint, Outlook, OneNote, and Teams. ', 'A computer with a reliable internet connection is essential for online courses and A computer with a reliable internet connection is essential for online courses.', 1, 35, '10'),
	(7, 15000, 'Building Your Freelancing Career Specialization ', 'This course is specifically designed for people who want to learn how to freelance on Fiverr, a popular online marketplace for freelance services. The course covers everything from creating a profile and writing winning proposals to delivering projects and getting positive reviews.', '2024-06-17 22:40:43', 'dewminimoksha40@gmail.com', 'The Complete Freelancing Course - Learn Everything You Need to Become a Successful Freelancer', 'This course from Udemy is a comprehensive introduction to freelancing, covering everything from the basics of setting up your business to finding clients, negotiating rates, and delivering projects.', 'reliable computer with an internet connection to access the course materials and complete assignments, modern operating system like Windows, macOS, or ChromeOS.\r\nand web browser like Chrome, Firefox, Edge, or Safari is necessary to navigate the course platform.', 1, 15, '20'),
	(8, 15000, 'HTML, CSS, and Javascript for Web Developers', 'Once you have a basic understanding of HTML and CSS, try building your own simple websites. This will help you solidify your understanding and develop your skills.', '2024-06-17 23:32:21', 'dewminimoksha40@gmail.com', 'Tips for learning HTML and CSS', '\r\nIn web development courses focused on HTML and CSS, students will typically learn the foundational skills for building web pages and user interfaces. ', 'Familiarity with using a computer and navigating files and folders ad internet access', 1, 20, '8'),
	(9, 12000, 'The Advanced Adobe PhotoShop course', 'We focus on real world cases and I present the best techniques that require minimal effort yet produce maximum results. All the lessons are focused on getting the job done in the least amount of time possible. I will be using the latest version of the program - Photoshop CC, but I explain my workflow for all users, no matter what version you have installed.', '2024-06-17 23:56:26', 'dewminimoksha40@gmail.com', 'Ultimate Photoshop Training From Beginner to Pro 2024 + AI', '\r\nBy the end of this course you will be able to use the program with ease. You will feel in control as you pursue and complete more ambitious projects. Whether you are contemplating a career change, considering freelancing opportunities, or developing a personal hobby, get started today on your Photoshop journey!', 'No previous knowledge of Photoshop required.\r\nIf you have Photoshop installed, that is great. If not, I will teach you how to get it on your computer.', 1, 12, '12');

-- Dumping structure for table softlearner.profile_image
CREATE TABLE IF NOT EXISTS `profile_image` (
  `path` varchar(50) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  PRIMARY KEY (`path`),
  KEY `fk_profile_image_user1_idx` (`user_email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table softlearner.profile_image: ~5 rows (approximately)
INSERT INTO `profile_image` (`path`, `user_email`) VALUES
	('resource/profile_img/Moksha_667a9e4d42463.jpeg', 'dewminimoksha40@gmail.com'),
	('resource/profile_img/Imesh_6671d1f46c192.jpeg', 'graslydias@gmail.com'),
	('resource/profile_img/Newandi_6671d7b863e1d.jpeg', 'ruparathna@gmail.com'),
	('resource/profile_img/Methmi _6671ceece1295.jpeg', 'sathi2009@gmail.com'),
	('resource/profile_img/Shamith_6671d6b929fca.jpeg', 'sludayageek@gmail.com');

-- Dumping structure for table softlearner.profile_image_a
CREATE TABLE IF NOT EXISTS `profile_image_a` (
  `email` varchar(50) DEFAULT NULL,
  `path` varchar(50) DEFAULT NULL,
  KEY `FK__admin` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table softlearner.profile_image_a: ~1 rows (approximately)
INSERT INTO `profile_image_a` (`email`, `path`) VALUES
	('dewminimoksha40@gmail.com', 'resource/profile_img/_6671435fad33f.jpeg');

-- Dumping structure for table softlearner.recent
CREATE TABLE IF NOT EXISTS `recent` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_email` varchar(100) NOT NULL,
  `product_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_recent_user1_idx` (`user_email`),
  KEY `fk_recent_product1_idx` (`product_id`),
  CONSTRAINT `FK_recent_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `fk_recent_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table softlearner.recent: ~10 rows (approximately)
INSERT INTO `recent` (`id`, `user_email`, `product_id`) VALUES
	(1, 'dewminimoksha40@gmail.com', 1),
	(2, 'dewminimoksha40@gmail.com', 3),
	(3, 'dewminimoksha40@gmail.com', 5),
	(4, 'dewminimoksha40@gmail.com', 6),
	(5, 'dewminimoksha40@gmail.com', 4),
	(6, 'sathi2009@gmail.com', 3),
	(7, 'dewminimoksha40@gmail.com', 1),
	(8, 'dewminimoksha40@gmail.com', 1),
	(9, 'dewminimoksha40@gmail.com', 6),
	(10, 'dewminimoksha40@gmail.com', 1);

-- Dumping structure for table softlearner.status
CREATE TABLE IF NOT EXISTS `status` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table softlearner.status: ~2 rows (approximately)
INSERT INTO `status` (`id`, `name`) VALUES
	(1, 'Active'),
	(2, 'Inactive');

-- Dumping structure for table softlearner.user
CREATE TABLE IF NOT EXISTS `user` (
  `email` varchar(100) NOT NULL,
  `fname` varchar(45) DEFAULT NULL,
  `lname` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `mobile 01` tinytext,
  `mobile 02` tinytext,
  `joined_date` datetime DEFAULT NULL,
  `verification_code` varchar(45) DEFAULT NULL,
  `gender_id` int NOT NULL,
  `address` varchar(50) DEFAULT NULL,
  `status_id` int DEFAULT '1',
  PRIMARY KEY (`email`),
  KEY `fk_user_gender_idx` (`gender_id`),
  KEY `status_id` (`status_id`),
  CONSTRAINT `FK_user_gender` FOREIGN KEY (`gender_id`) REFERENCES `gender` (`id`),
  CONSTRAINT `FK_user_status` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table softlearner.user: ~5 rows (approximately)
INSERT INTO `user` (`email`, `fname`, `lname`, `password`, `mobile 01`, `mobile 02`, `joined_date`, `verification_code`, `gender_id`, `address`, `status_id`) VALUES
	('dewminimoksha40@gmail.com', 'Moksha', 'Dewmini', 'moki123', '0702574802', NULL, '2023-10-28 10:47:36', '66767082a64b9', 2, '', 1),
	('graslydias@gmail.com', 'Imesh', 'Dinil', 'mesh0001', '0758963214', NULL, '2024-06-18 23:53:59', NULL, 1, NULL, 1),
	('ruparathna@gmail.com', 'Newandi', 'Perera', 'newarupe123', '0712333648', NULL, '2024-06-19 00:21:19', NULL, 2, '', 1),
	('sathi2009@gmail.com', 'Methmi ', 'Sathsarangi', 'methi123', '0712369986', NULL, '2024-06-18 23:43:08', NULL, 2, NULL, 1),
	('sludayageek@gmail.com', 'Shamith', 'Udayanga', 'shamith2002', '0712368896', NULL, '2024-06-19 00:17:41', NULL, 1, NULL, 1);

-- Dumping structure for table softlearner.watchlist
CREATE TABLE IF NOT EXISTS `watchlist` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_email` varchar(100) NOT NULL,
  `product_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_watchlist_user1_idx` (`user_email`),
  KEY `fk_watchlist_product1_idx` (`product_id`),
  CONSTRAINT `FK_watchlist_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `fk_watchlist_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table softlearner.watchlist: ~2 rows (approximately)
INSERT INTO `watchlist` (`id`, `user_email`, `product_id`) VALUES
	(5, 'dewminimoksha40@gmail.com', 3),
	(6, 'ruparathna@gmail.com', 1);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
