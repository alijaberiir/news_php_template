-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 07, 2021 at 02:31 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `id` int(50) NOT NULL,
  `AdminUserName` varchar(50) NOT NULL,
  `AdminPassword` varchar(50) NOT NULL,
  `AdminEmailId` varchar(50) NOT NULL,
  `Is_Active` int(1) NOT NULL,
  `user_roll` varchar(50) NOT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`id`, `AdminUserName`, `AdminPassword`, `AdminEmailId`, `Is_Active`, `user_roll`, `CreationDate`, `UpdationDate`) VALUES
(7, 'king', '1234', 'king@gmail.com', 1, 'editor', '2021-06-07 11:34:05', '0000-00-00 00:00:00'),
(8, 'admin', 'admin', 'admin@gmail.com', 1, 'admin', '2021-06-07 11:35:00', '2021-06-07 11:46:07');

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `id` int(50) NOT NULL,
  `CategoryName` varchar(50) NOT NULL,
  `Description` varchar(5000) NOT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Is_Active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`id`, `CategoryName`, `Description`, `PostingDate`, `UpdationDate`, `Is_Active`) VALUES
(8, 'سیاست', 'سیاست', '2021-06-06 12:31:25', '2021-06-06 18:09:06', 1),
(9, 'اقتصاد', 'اقتصاد', '2021-06-06 12:31:35', '2021-06-06 18:09:06', 1),
(10, 'فرهنگ', 'فرهنگfr', '2021-06-06 12:31:45', '2021-06-06 18:09:06', 1),
(12, 'بین‌الملل', 'بین‌الملل', '2021-06-06 12:32:04', '2021-06-06 18:09:06', 1),
(13, 'ورزش', 'ورزش', '2021-06-06 12:32:11', '2021-06-06 18:09:06', 1),
(15, 'فناوری اطلاعات', 'فناوری اطلاعات', '2021-06-06 12:33:07', '2021-06-06 18:09:06', 1),
(21, 'جامعه', 'a', '2021-06-07 09:10:09', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblcomments`
--

CREATE TABLE `tblcomments` (
  `id` int(50) NOT NULL,
  `postId` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `comment` varchar(5000) NOT NULL,
  `postingDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcomments`
--

INSERT INTO `tblcomments` (`id`, `postId`, `name`, `email`, `comment`, `postingDate`, `status`) VALUES
(10, 2, 'wqe', 'ali@gmail.com', 'qweqw', '2021-06-07 10:27:13', 1),
(12, 2, 'ewewe', 'admin@gmail.com', '   wewqe', '2021-06-07 10:27:12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblpages`
--

CREATE TABLE `tblpages` (
  `id` int(50) NOT NULL,
  `PageName` varchar(200) NOT NULL,
  `PageTitle` varchar(200) NOT NULL,
  `Description` varchar(10000) NOT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblpages`
--

INSERT INTO `tblpages` (`id`, `PageName`, `PageTitle`, `Description`, `PostingDate`, `UpdationDate`) VALUES
(1, 'contactus', 'تماس با آسمان من', '<h2 align=\"center\"><span style=\"background-color: rgb(156, 198, 239);\"><b>با ما در ارتباط باشید</b></span></h2><h3 align=\"center\"><span style=\"background-color: inherit;\"><b>091212345678</b></span></h3><h3 align=\"center\"><span style=\"background-color: inherit;\"><b>aseman@gmail.com</b></span></h3><h2 align=\"center\"><span style=\"background-color: rgb(156, 198, 239);\"><b><br></b></span></h2>', '2021-06-06 18:51:47', '2021-06-06 18:54:34'),
(2, 'aboutus', 'درباره آسمان نیوز', '<p>این وبسایت خبری بوده و پروژه دانشجوی اینجانب هست<br></p>', '2021-06-06 18:51:47', '2021-06-06 18:52:39');

-- --------------------------------------------------------

--
-- Table structure for table `tblposts`
--

CREATE TABLE `tblposts` (
  `id` int(50) NOT NULL,
  `PostTitle` varchar(500) NOT NULL,
  `CategoryId` int(200) NOT NULL,
  `SubCategoryId` int(200) NOT NULL,
  `PostDetails` varchar(1000) NOT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `Is_Active` int(1) NOT NULL,
  `PostUrl` varchar(1000) NOT NULL,
  `PostImage` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblposts`
--

INSERT INTO `tblposts` (`id`, `PostTitle`, `CategoryId`, `SubCategoryId`, `PostDetails`, `PostingDate`, `UpdationDate`, `Is_Active`, `PostUrl`, `PostImage`) VALUES
(2, 'استفتا از رهبر انقلاب درباره رای سفید دادن در انتخابات', 8, 10, '<p align=\"right\"><br></p><p align=\"right\"><font color=\"#FF9C00\"><span style=\"background-color: inherit;\">به گزارش خبرگزاری <a class=\"saba-backlink\" href=\"https://www.khabaronline.ir/\">خبرآنلاین</a>، متن استفتا به شرح زیر است:</span></font></p><p align=\"right\">\r\n\r\n<br></p><p align=\"right\"><b>ســـــؤال: حکم رأی ســـــفید و بی نـــــام دادن چیست؟ در صورت عدم \r\nشناخت و تحقیق، یا&nbsp;تحقیق کافی و عدم وصول به نتیجه و تحیّر در&nbsp;انتخاب اصلح \r\nچطور؟</b></p><p align=\"right\">\r\n\r\n<br></p><h4 align=\"right\"><b>جواب: در هر صورت اگر رأی سفید دادن موجب تضعیف نظام اسلامی باشد، حرام است.</b></h4><p align=\"right\"><br></p>', '2021-06-06 18:18:49', '2021-06-06 18:40:59', 1, 'استفتا-از-رهبر-انقلاب-درباره-رای-سفید-دادن-در-انتخابات', 'd62b3d096a27b73010710b51a9ca4abd.jpg'),
(3, 'ترجمه اشتباه حرف های اسکوچیچ!', 13, 39, '<p>دراگان اسکوچیچ امروز در نشست خبری پیش از دیدار مقابل بحرین شرکت کرد و\r\n طبق روال حرفه‌ای ترجمه صحبت‌های سرمربی با مترجم رسمی تیم ملی بود. \r\nرسانه‌ها نیز با استفاده از ترجمه صحبت‌های صورت‌گرفته اقدام به انتشار \r\nمصاحبه سرمربی تیم ملی کردند.</p> \r\n<p>البته که ترجمه همزمان چالش‌های خاص خودش را دارد، اما در بخشی از \r\nصحبت‌های اسکوچیچ واژه‌ای اضافه شده است که ناخودآگاه همه را یاد افشین \r\nقطبی انداخت. سرمربی وقت تیم ملی در انتخابی جام جهانی 2010، جایی که کار \r\nتیم ملی برای صعود به جام جهانی گره خورده بود و بازی حساسی با کره جنوبی \r\nداشت، با توجه به سابقه حضورش در کادر فنی حریف ایران اشاره کرد که کره را \r\nمثل کف دستش می‌شناسد.</p>', '2021-06-06 18:40:38', '2021-06-06 22:15:24', 0, 'ترجمه-اشتباه-حرف-های-اسکوچیچ!', '49925e5bcdf575cdbf2b19c78ff8e8f6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tblsubcategory`
--

CREATE TABLE `tblsubcategory` (
  `SubCategoryId` int(50) NOT NULL,
  `CategoryId` int(50) NOT NULL,
  `Subcategory` varchar(300) NOT NULL,
  `SubCatDescription` varchar(300) NOT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `Is_Active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblsubcategory`
--

INSERT INTO `tblsubcategory` (`SubCategoryId`, `CategoryId`, `Subcategory`, `SubCatDescription`, `PostingDate`, `UpdationDate`, `Is_Active`) VALUES
(10, 8, 'رهبری', 'رهبری', '2021-06-06 12:33:24', '2021-06-06 18:08:27', 1),
(11, 8, 'احزاب و شخصیت‌ها', 'احزاب و شخصیت‌ها', '2021-06-06 12:33:39', '2021-06-06 18:08:27', 1),
(13, 8, 'انتخابات', 'انتخابات', '2021-06-06 12:33:54', '2021-06-06 18:08:27', 1),
(14, 8, 'دولت', 'دولت', '2021-06-06 12:34:01', '2021-06-06 18:08:27', 1),
(15, 8, 'مجلس', 'مجلس', '2021-06-06 12:34:07', '2021-06-06 18:08:27', 1),
(16, 9, 'اقتصاد کلان', 'اقتصاد کلان', '2021-06-06 12:34:29', '2021-06-06 18:08:27', 1),
(17, 9, 'مسکن', 'مسکن', '2021-06-06 12:34:38', '2021-06-06 18:08:27', 1),
(18, 9, 'جهان', 'جهان', '2021-06-06 12:34:45', '2021-06-06 18:08:27', 1),
(19, 9, 'بازار مالی', 'بازار مالی', '2021-06-06 12:35:02', '2021-06-06 18:08:27', 1),
(20, 9, 'انرژی', 'انرژی', '2021-06-06 12:35:10', '2021-06-06 18:08:27', 1),
(21, 9, 'بازار کار', 'بازار کار', '2021-06-06 12:35:21', '2021-06-06 18:08:27', 1),
(22, 9, 'کشاورزی', 'کشاورزی', '2021-06-06 12:35:28', '2021-06-06 18:08:27', 1),
(23, 10, 'سینما', 'سینما', '2021-06-06 12:35:46', '2021-06-06 18:08:27', 1),
(24, 10, 'دفاع مقدس', 'دفاع مقدس', '2021-06-06 12:35:58', '2021-06-06 18:08:27', 1),
(25, 10, 'تلویزیون', 'تلویزیون', '2021-06-06 12:36:06', '2021-06-06 18:08:27', 1),
(26, 10, 'ادبیات', 'ادبیات', '2021-06-06 12:36:12', '2021-06-06 18:08:27', 1),
(27, 10, 'موسیقی', 'موسیقی', '2021-06-06 12:36:19', '2021-06-06 18:08:27', 1),
(28, 10, 'تجسمی', 'تجسمی', '2021-06-06 12:36:27', '2021-06-06 18:08:27', 1),
(30, 10, 'کتاب', 'کتاب', '2021-06-06 12:36:46', '2021-06-06 18:08:27', 1),
(31, 11, 'آموزش', 'آموزش', '2021-06-06 12:36:54', '2021-06-06 18:08:27', 1),
(32, 11, 'شهری', 'شهری', '2021-06-06 12:37:00', '2021-06-06 18:08:27', 1),
(33, 11, 'سلامت', 'سلامت', '2021-06-06 12:37:09', '2021-06-06 18:08:27', 1),
(34, 11, 'خانواده', 'خانواده', '2021-06-06 12:37:15', '2021-06-06 18:08:27', 1),
(36, 12, 'آمریکا', 'آمریکا', '2021-06-06 12:37:38', '2021-06-06 18:08:27', 1),
(37, 12, 'خاورمیانه', 'خاورمیانه', '2021-06-06 12:37:46', '2021-06-06 18:08:27', 1),
(38, 12, 'انرژی هسته‌ای', 'انرژی هسته‌ای', '2021-06-06 12:38:00', '2021-06-06 18:08:27', 1),
(39, 13, 'فوتبال ملی', 'فوتبال ملی', '2021-06-06 12:38:14', '2021-06-06 18:08:27', 1),
(40, 13, 'والیبال', 'والیبال', '2021-06-06 12:38:23', '2021-06-06 18:08:27', 1),
(41, 13, 'دیگر ورزش‌ها', 'دیگر ورزش‌ها', '2021-06-06 12:38:42', '2021-06-06 18:08:27', 1),
(42, 14, 'فناوری', 'فناوری', '2021-06-06 12:38:57', '2021-06-06 18:08:27', 1),
(43, 15, 'نرم‌افزار', 'نرم‌افزار', '2021-06-06 12:39:06', '2021-06-06 18:08:27', 1),
(44, 21, 'w', 'wsw', '2021-06-07 09:10:18', '2021-06-07 09:10:36', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcomments`
--
ALTER TABLE `tblcomments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `postid` (`postId`);

--
-- Indexes for table `tblpages`
--
ALTER TABLE `tblpages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblposts`
--
ALTER TABLE `tblposts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`CategoryId`),
  ADD KEY `subcategory` (`SubCategoryId`);

--
-- Indexes for table `tblsubcategory`
--
ALTER TABLE `tblsubcategory`
  ADD PRIMARY KEY (`SubCategoryId`),
  ADD KEY `category` (`CategoryId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tblcomments`
--
ALTER TABLE `tblcomments`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tblpages`
--
ALTER TABLE `tblpages`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblposts`
--
ALTER TABLE `tblposts`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblsubcategory`
--
ALTER TABLE `tblsubcategory`
  MODIFY `SubCategoryId` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
