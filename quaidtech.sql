-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2020 at 07:04 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quaidtech`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(22) NOT NULL,
  `category` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `slug` varchar(250) NOT NULL,
  `short_description` text NOT NULL,
  `description` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` enum('Active','In Active') NOT NULL DEFAULT 'Active',
  `meta_title` varchar(200) NOT NULL,
  `meta_description` text NOT NULL,
  `focus_keywords` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `category`, `title`, `slug`, `short_description`, `description`, `image`, `status`, `meta_title`, `meta_description`, `focus_keywords`, `created_at`, `updated_at`) VALUES
(4, 3, 'Why Pakistani Students Opt For Education In Australia?', 'why-pakistani-students-opt-for-education-in-australia', '<p>Being the world&rsquo;s 6th&nbsp;largest country, Australia is beautiful and worth living destination. Its high pace of development has attracted immigrants from around the world. It is the third most preferred education destination of students, globally. However, this being relatively economical from US and UK provides equally good quality education.&nbsp;</p>', '<p>Being the world&rsquo;s 6th&nbsp;largest country, Australia is beautiful and worth living destination. Its high pace of development has attracted immigrants from around the world. It is the third most preferred education destination of students, globally. However, this being relatively economical from US and UK provides equally good quality education.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Pakistani students lack quality education in the homeland because of unstable political, economic, terrorism and warfare conditions. Moreover, they look for good job opportunities in Australia as well. Let&rsquo;s get to know some more reasons Why&nbsp;<strong>study in Australia</strong>&nbsp;is a good option?&nbsp;</p>\r\n\r\n<p><strong>Welcoming Environment:</strong></p>\r\n\r\n<p>Australian people are very welcoming towards foreign students. As 45% of Australians are immigrants, they have a very multicultural nation. The issue of racism and religious discrimination is less there in comparison to other western countries.&nbsp;</p>\r\n\r\n<p>The issues any Pakistani student would face are somewhat that others are facing too. As some groups would not like foreign people grabbing opportunities in their land.&nbsp;</p>\r\n\r\n<p><strong>Home to Remarkable Institutes</strong></p>\r\n\r\n<p>Out of the top hundred universities, Australia houses seven best institutes. To name a few we have The University of Melbourne, University of New South Wales (UNSW), The Australian National University and The University of Sydney and the list go on. These universities are accommodating half a million students. Over and above that, they offer 22000 courses in different fields of study.&nbsp;</p>\r\n\r\n<p><strong>High-Quality education</strong></p>\r\n\r\n<p>The Australian government is very serious about providing good quality education. They are spending millions of dollars annually for this purpose. Australian universities have the best-equipped research labs to promote scientific researches. The there curriculum is easy and practical. In addition to this, the syllabus is based on modern research and is updated regularly.&nbsp;</p>\r\n\r\n<p><strong>Wide-Ranging Scholarships</strong></p>\r\n\r\n<p>A large mass of Pakistani students cannot afford higher education even in Pakistan and here we are talking about foreign education. You shall be glad that Australia offers a wide range of scholarships for people in different categories. They try their best to offer good education economically.&nbsp;</p>\r\n\r\n<p><strong>Plenty of Job Opportunities&nbsp;</strong></p>\r\n\r\n<p>Once you got admission in any Australian institution obviously you have to live there for a certain time period. Most of the students going from Pakistan are either supported by their families or take debt from someone to travel.&nbsp;</p>\r\n\r\n<p>Now they need to cover their expenses during their stay in Australia they also have to repay the debts. In this scenario, Australia has proved to be very supportive and accommodating. If you are enrolled in a full degree program you can do a part-time job. This requires you to work for 20 hours per week.</p>\r\n\r\n<p>To cap it all you are provided rest breaks and incentives like any other working personnel.&nbsp;</p>\r\n\r\n<p><strong>Easy Accommodation&nbsp;</strong></p>\r\n\r\n<p>Living in an unfamiliar country is difficult. Australia offers you many options for easy accommodation. You can live in university hostels or can rent apartments, single or shared. Another great and secure option is to stay with a family. Families there usually rent out rooms to students with laundry and food facility.</p>\r\n\r\n<p>Australian government keeps a strict check on whether the rooms are safe and secure for foreign students or not.</p>\r\n\r\n<p><strong>No Language Barrier</strong></p>\r\n\r\n<p>80% of Australians are English speaking. This makes it easy for students to communicate. Also, the education system is an English medium.&nbsp;</p>\r\n\r\n<p><strong>Peaceful Environment&nbsp;</strong></p>\r\n\r\n<p>Since many years Pakistan has been an unstable country. It has faced a lot of political instability. Along with terrorist attacks and the effects of war against terrorism. This has put the country&rsquo;s development at hold. Government has failed to provide good education and job opportunities.&nbsp;</p>\r\n\r\n<p>Australia is a peaceful country and students prefer to go and study there. It lets them concentrate on their growth.&nbsp;</p>\r\n\r\n<p><strong>Wrapping It Up:</strong></p>\r\n\r\n<p>Australia is providing high-quality education in the world&rsquo;s best institutes. They wholeheartedly welcome foreign students. They hunt for young and talented people around the world.&nbsp;</p>\r\n\r\n<p>For that reason, Pakistani students can avail great benefits while studying in Australia.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', 'why-pakistani-students-opt-for-education-in-australia1574236027.jpg', 'Active', 'Why Pakistani Students Opt For Education In Australia?', 'Why Pakistani Students Opt For Education In Australia?', 'Why Pakistani Students Opt For Education In Australia?', '2019-11-20 07:47:07', '2019-11-20 02:47:07');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `slug` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `slug`) VALUES
(1, 'Air Conditioning Installation Services', 'air-conditioning-installation-services'),
(2, 'Electrical', 'electrical'),
(3, 'Ielts In Pakistan', 'ielts-in-pakistan');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `status` enum('Active','In Active') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `title`, `url`, `image`, `status`) VALUES
(1, 'aBBAS je', 'http://quaidtech.local/webmaster/clients/1/edit', 'abbas-je1574319085.jpg', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `generalsettings`
--

CREATE TABLE `generalsettings` (
  `id` int(11) NOT NULL,
  `email` varchar(200) DEFAULT NULL,
  `phone` varchar(200) DEFAULT NULL,
  `facebook` varchar(200) DEFAULT NULL,
  `twitter` varchar(200) DEFAULT NULL,
  `linkdin` varchar(200) DEFAULT NULL,
  `google` varchar(200) DEFAULT NULL,
  `linkedin` varchar(200) DEFAULT NULL,
  `meta_title` varchar(200) DEFAULT NULL,
  `meta_description` text,
  `focus_keywords` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `generalsettings`
--

INSERT INTO `generalsettings` (`id`, `email`, `phone`, `facebook`, `twitter`, `linkdin`, `google`, `linkedin`, `meta_title`, `meta_description`, `focus_keywords`) VALUES
(1, 'info@quaidtech.com', '+92 3000 66 2512', 'https://www.facebook.com/QuaidTech', 'https://twitter.com/QuaidTech', 'http://quaidtech.com/feed=rss2', 'https://plus.google.com/111027127690975820686', 'https://www.linkedin.com/company/quaidtech', 'Quaid Technologies | The Heartbeat of Next Generation Technology!', 'Quaid Technologies | The Heartbeat of Next Generation Technology!', 'Quaid Technologies | The Heartbeat of Next Generation Technology!');

-- --------------------------------------------------------

--
-- Table structure for table `photogallery`
--

CREATE TABLE `photogallery` (
  `id` int(11) NOT NULL,
  `type` enum('About Page','Team Page') NOT NULL DEFAULT 'Team Page',
  `photo` varchar(250) NOT NULL,
  `story` text,
  `display` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `photogallery`
--

INSERT INTO `photogallery` (`id`, `type`, `photo`, `story`, `display`) VALUES
(2, 'Team Page', 'photogallery1574417654.jpg', 'Thsi is about us page image', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE `portfolio` (
  `id` int(11) NOT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `type` enum('Web','Mobile') DEFAULT 'Mobile',
  `title` varchar(250) DEFAULT NULL,
  `tagLine` varchar(250) DEFAULT NULL,
  `category` varchar(250) DEFAULT NULL,
  `compatibility` varchar(250) DEFAULT NULL,
  `seller` varchar(250) DEFAULT NULL,
  `size` varchar(250) DEFAULT NULL,
  `languages` varchar(250) DEFAULT NULL,
  `ageRating` varchar(250) DEFAULT NULL,
  `copyright` varchar(250) DEFAULT NULL,
  `price` varchar(250) DEFAULT NULL,
  `description` text,
  `shortDescription` text,
  `description2` text,
  `appStoreLine` varchar(250) DEFAULT NULL,
  `playStoreLink` varchar(250) DEFAULT NULL,
  `clientName` varchar(250) DEFAULT NULL,
  `clientWords` text,
  `clientVideo` varchar(250) DEFAULT NULL,
  `slidrThumb` varchar(250) DEFAULT NULL,
  `mianImage` varchar(250) DEFAULT NULL,
  `desImage1` varchar(250) DEFAULT NULL,
  `desImage2` varchar(250) DEFAULT NULL,
  `status` enum('Active','In Active') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`id`, `slug`, `type`, `title`, `tagLine`, `category`, `compatibility`, `seller`, `size`, `languages`, `ageRating`, `copyright`, `price`, `description`, `shortDescription`, `description2`, `appStoreLine`, `playStoreLink`, `clientName`, `clientWords`, `clientVideo`, `slidrThumb`, `mianImage`, `desImage1`, `desImage2`, `status`) VALUES
(1, 'inseller', 'Mobile', 'Inseller', 'LUXERY SHOPPING', 'Social Networking', 'Requires iOS 8.0 or later. Compatible with iPhone, iPad and iPod touch', 'STEADFAST MARKETING SERVICES, LLC', '28.6 MB', 'English', 'You must be at least 17 years old to download this application.', '2016 STEADFAST MARKETING SERVICES, LLC', 'free', 'Inseller is the leading source of authentic, pre-owned designer handbags, shoes and accessories headquartered in the middle east. Inseller provides unparalleled access to the most coveted brands in fashion today.', 'Inseller is the leading source of authentic, pre-owned designer handbags, shoes and accessories headquartered in the middle east. Inseller provides unparalleled access to the most coveted brands in fashion today.', NULL, 'https://www.google.com/', 'https://www.google.com/', 'steve jobs', 'Design is not just what it looks like and feels like. Design is how it works', 'clientVideo1575286131.mp4', 'slidrThumb1575286131.jpg', 'mianImage1575286131.png', 'desImage11575286131.png', 'desImage21575286131.png', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `portfoliogallery`
--

CREATE TABLE `portfoliogallery` (
  `id` int(11) NOT NULL,
  `portfolioId` int(11) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `portfoliogallery`
--

INSERT INTO `portfoliogallery` (`id`, `portfolioId`, `image`) VALUES
(1, 1, 'inseller.1575286131.jpg'),
(2, 1, 'inseller_device.1575286131.png'),
(3, 1, 'Portfolio-1.1575286131.png'),
(4, 1, 'Portfolio-2.1575286131.png');

-- --------------------------------------------------------

--
-- Table structure for table `seopages`
--

CREATE TABLE `seopages` (
  `id` int(11) NOT NULL,
  `page` varchar(100) NOT NULL,
  `meta_title` varchar(100) DEFAULT NULL,
  `meta_description` varchar(200) DEFAULT NULL,
  `focus_keywords` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seopages`
--

INSERT INTO `seopages` (`id`, `page`, `meta_title`, `meta_description`, `focus_keywords`) VALUES
(1, 'About', 'Quaid Technologies | The Heartbeat of Next Generation Technology!', 'Quaid Technologies | The Heartbeat of Next Generation Technology!', 'Quaid Technologies | The Heartbeat of Next Generation Technology!'),
(2, 'Blog', 'Quaid Technologies | The Heartbeat of Next Generation Technology!', 'Quaid Technologies | The Heartbeat of Next Generation Technology!', 'Quaid Technologies | The Heartbeat of Next Generation Technology!'),
(3, 'Team', 'Quaid Technologies | The Heartbeat of Next Generation Technology!', 'Quaid Technologies | The Heartbeat of Next Generation Technology!', 'Quaid Technologies | The Heartbeat of Next Generation Technology!'),
(4, 'Contact-us', 'Quaid Technologies | The Heartbeat of Next Generation Technology!', 'Quaid Technologies | The Heartbeat of Next Generation Technology!', 'Quaid Technologies | The Heartbeat of Next Generation Technology!'),
(5, 'portfolio', 'Quaid Technologies | The Heartbeat of Next Generation Technology!', 'Quaid Technologies | The Heartbeat of Next Generation Technology!', 'Quaid Technologies | The Heartbeat of Next Generation Technology!');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(22) NOT NULL,
  `title` varchar(200) NOT NULL,
  `slug` varchar(250) NOT NULL,
  `short_description` text NOT NULL,
  `description` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` enum('Active','In Active') NOT NULL DEFAULT 'Active',
  `showonhomepage` enum('Yes','No') NOT NULL DEFAULT 'No',
  `meta_title` varchar(200) NOT NULL,
  `meta_description` text NOT NULL,
  `focus_keywords` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `slug`, `short_description`, `description`, `image`, `status`, `showonhomepage`, `meta_title`, `meta_description`, `focus_keywords`, `created_at`, `updated_at`) VALUES
(1, 'What is Lorem Ipsum?', 'what-is-lorem-ipsum', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'what-is-lorem-ipsum1574333992.jpg', 'Active', 'No', 'What is Lorem Ipsum', 'What is Lorem Ipsum?', 'What is Lorem Ipsum?', '2019-11-21 05:59:52', '2019-11-21 05:59:52');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `category` varchar(20) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `designation` varchar(100) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `description` text,
  `status` enum('Active','In Active') DEFAULT 'Active',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `category`, `title`, `designation`, `image`, `description`, `status`, `created_at`, `updated_at`) VALUES
(2, 'core_management', 'Muhammad waqas', 'Software Eggingener', 'muhammad-waqas1574235724.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 'Active', '2019-11-20 07:33:30', '2019-12-11 09:19:35');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL,
  `edited_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `added_by`, `edited_by`) VALUES
(1, 'admin', 'pakcyber.abbas@gmail.com', '$2y$10$HWWXjCXaDvzdthjD6T8ave.pHh7vhdWQA33h0i5DSHuqFR9gPPj8m', 'MmseQecKOy3e1oBYgM4cEVYxMtWu6uDCiUsR93KBYuumf7ONkRDKgVQQjVA6', '2019-06-25 02:18:11', '2019-11-06 00:36:41', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `generalsettings`
--
ALTER TABLE `generalsettings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photogallery`
--
ALTER TABLE `photogallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfoliogallery`
--
ALTER TABLE `portfoliogallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seopages`
--
ALTER TABLE `seopages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `generalsettings`
--
ALTER TABLE `generalsettings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `photogallery`
--
ALTER TABLE `photogallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `portfoliogallery`
--
ALTER TABLE `portfoliogallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `seopages`
--
ALTER TABLE `seopages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
