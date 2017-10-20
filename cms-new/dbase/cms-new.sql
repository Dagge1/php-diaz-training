-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2017 at 05:25 PM
-- Server version: 5.7.9
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms-new`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` int(3) NOT NULL AUTO_INCREMENT,
  `cat_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Bootstrap'),
(2, 'Javascript'),
(3, 'PHP '),
(4, 'JAVA');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int(3) NOT NULL AUTO_INCREMENT,
  `comment_post_id` int(3) NOT NULL,
  `comment_author` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comment_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comment_content` text COLLATE utf8_unicode_ci NOT NULL,
  `comment_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comment_date` date NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES
(2, 1, 'Edwin', 'edwin@edwindiaz.com', 'Hello from Edwin, this is first comment', 'unapproved', '2017-10-19'),
(5, 1, 'Davor', 'dav@or.com', 'Moj comment za probu', 'unapproved', '2017-10-20'),
(6, 6, 'Llorem Man', 'llor@emman.com', 'New comment for Llorem', 'unapproved', '2017-10-20');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `post_id` int(3) NOT NULL AUTO_INCREMENT,
  `post_category_id` int(3) NOT NULL,
  `post_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `post_author` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text COLLATE utf8_unicode_ci NOT NULL,
  `post_content` text COLLATE utf8_unicode_ci NOT NULL,
  `post_tags` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `post_comment_count` int(11) NOT NULL DEFAULT '0',
  `post_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'draft',
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`) VALUES
(1, 3, 'Edwins Cms course is awesome ggg', 'John Doe', '2017-10-16', 'avatarvector_09.png', '                        Wow, I really like Edwin course.', 'edwin, javascript, php', 0, 'draft'),
(5, 1, 'Prvi postvvvdddddd', 'Davorvvvvvdddd', '2017-10-16', 'avatar_12.jpg', '                                        This is first post    vvvvvv  ddd', 'php vvvv', 4, 'unapprovedvvvvv'),
(6, 3, 'New Lorem Ipsum', 'Tizion', '2017-10-16', 'boarding_pass.png', '    Lorem ipsum dolor sit amet, vel ad sumo aeque, ne legere sensibus vel. Ius movet nostrum apeirian ne, noluisse liberavisse at vim. Ne per cibo accumsan accusamus. Te vis velit habemus iudicabit. Cu mel magna ullamcorper, natum commodo mea no. At quas saepe molestie vim, omnium antiopam forensibus his cu. Purto mazim cetero at vel.\r\n\r\nUnum soleat omnesque in mel. Illum epicuri percipit mea eu, et nec purto eirmod. Solum nostrum ea pro. Dolorum corpora cu nec. Eum ei ubique bonorum prodesset. Soluta commodo per no.', 'lorem, tizion, greek, latin', 4, 'published'),
(7, 4, 'Proba sa kategorijama', 'Javaman', '2017-10-16', 'avatarvector_09.png', '        Ovo je post za  probu sa kategorijama', 'java', 4, 'published');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
