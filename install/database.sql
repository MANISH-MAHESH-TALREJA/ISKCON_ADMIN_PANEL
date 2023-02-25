-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2021 at 06:33 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `android_diet_plan_app_first_time_buyer`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_active_log`
--

CREATE TABLE `tbl_active_log` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `date_time` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_active_log`
--

INSERT INTO `tbl_active_log` (`id`, `user_id`, `date_time`) VALUES
(1, 1, '1640088405');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `image` varchar(100) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `username`, `password`, `email`, `image`) VALUES
(1, 'admin', 'admin', 'viaviwebtech@gmail.com', 'profile.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bmi`
--

CREATE TABLE `tbl_bmi` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `bmi_score` varchar(100) NOT NULL,
  `date_time` varchar(100) NOT NULL,
  `bmi_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_bmi`
--

INSERT INTO `tbl_bmi` (`id`, `user_id`, `gender`, `bmi_score`, `date_time`, `bmi_status`) VALUES
(4, 0, 'MALE', '24.382717', '25-12-2020 06:45 PM', 'Normal'),
(5, 0, 'MALE', '20.408165', '25-12-2020 09:53 PM', 'Normal'),
(6, 0, 'MALE', '34.602074', '25-12-2020 09:54 PM', 'Obese'),
(7, 0, 'MALE', '31.141867', '25-12-2020 09:54 PM', 'Obese'),
(8, 0, 'MALE', '34.602074', '25-12-2020 09:54 PM', 'Obese'),
(9, 0, 'MALE', '31.141867', '25-12-2020 09:54 PM', 'Obese'),
(10, 0, 'MALE', '29.411764', '25-12-2020 09:54 PM', 'Overweight'),
(11, 0, 'MALE', '25.951555', '25-12-2020 09:54 PM', 'Overweight'),
(12, 0, 'MALE', '24.221453', '25-12-2020 09:54 PM', 'Normal'),
(13, 0, 'MALE', '24.755463', '27-12-2020 06:17 PM', 'Normal'),
(14, 0, 'MALE', '19.97441', '01-01-2021 12:32 PM', 'Normal'),
(15, 0, 'FEMALE', '19.97441', '01-01-2021 12:33 PM', 'Normal'),
(17, 0, 'MALE', '23.14815', '07-01-2021 02:14 AM', 'Normal'),
(18, 0, 'MALE', '26.23457', '07-01-2021 02:14 AM', 'Overweight'),
(19, 0, 'MALE', '24.69136', '07-01-2021 02:14 AM', 'Normal'),
(22, 0, 'MALE', '20.408165', '11-01-2021 06:18 PM', 'Normal'),
(23, 0, 'FEMALE', '25.777779', '11-01-2021 06:18 PM', 'Overweight'),
(24, 0, 'MALE', '147.92902', '15-01-2021 10:11 AM', 'Obese'),
(25, 0, 'MALE', '139.71074', '15-01-2021 10:11 AM', 'Obese'),
(26, 0, 'MALE', '123.27418', '15-01-2021 10:12 AM', 'Obese'),
(27, 0, 'MALE', '60.81526', '15-01-2021 10:12 AM', 'Obese'),
(28, 0, 'MALE', '220.10709', '15-01-2021 10:12 AM', 'Obese'),
(29, 0, 'MALE', '3.5685349', '15-01-2021 10:12 AM', 'Underweight'),
(33, 0, 'MALE', '20.408165', '21-01-2021 01:40 PM', 'Normal'),
(34, 0, 'MALE', '30.102041', '21-01-2021 01:40 PM', 'Obese'),
(36, 0, 'MALE', '24.96801', '23-01-2021 02:24 PM', 'Normal'),
(37, 0, 'MALE', '20.408165', '23-01-2021 02:42 PM', 'Normal'),
(38, 0, 'FEMALE', '20.408165', '23-01-2021 02:42 PM', 'Normal'),
(39, 0, 'MALE', '20.408165', '23-01-2021 02:42 PM', 'Normal'),
(40, 0, 'MALE', '231.9336', '28-01-2021 11:49 AM', 'Obese'),
(41, 0, 'MALE', '195.3125', '28-01-2021 11:49 AM', 'Obese'),
(42, 0, 'MALE', '170.89844', '28-01-2021 11:49 AM', 'Obese'),
(43, 0, 'MALE', '12.207031', '28-01-2021 11:49 AM', 'Underweight'),
(44, 0, 'FEMALE', '12.207031', '28-01-2021 11:50 AM', 'Underweight'),
(47, 0, 'MALE', '25.97868', '02-02-2021 05:18 PM', 'Overweight'),
(48, 0, 'MALE', '23.589834', '02-02-2021 05:18 PM', 'Normal'),
(49, 0, 'MALE', '24.485651', '02-02-2021 05:18 PM', 'Normal'),
(50, 0, 'MALE', '25.082863', '02-02-2021 05:18 PM', 'Overweight'),
(51, 0, 'MALE', '24.485651', '02-02-2021 05:18 PM', 'Normal'),
(56, 0, 'MALE', '11.22449', '09-02-2021 11:11 PM', 'Underweight'),
(57, 0, 'MALE', '26.511806', '09-02-2021 11:30 PM', 'Overweight'),
(58, 0, 'FEMALE', '25.711664', '09-02-2021 11:31 PM', 'Overweight'),
(60, 0, 'MALE', '48.32653', '09-02-2021 11:57 PM', 'Obese'),
(61, 0, 'MALE', '19.591837', '09-02-2021 11:58 PM', 'Normal'),
(62, 0, 'MALE', '21.55102', '09-02-2021 11:58 PM', 'Normal'),
(63, 0, 'MALE', '24.163265', '09-02-2021 11:58 PM', 'Normal'),
(64, 0, 'MALE', '10.77551', '09-02-2021 11:58 PM', 'Underweight'),
(65, 0, 'MALE', '22.222221', '10-02-2021 03:35 AM', 'Normal'),
(72, 0, 'MALE', '20.408165', '11-02-2021 08:10 PM', 'Normal'),
(74, 0, 'MALE', '19.631117', '12-02-2021 04:03 AM', 'وزن طبيعي'),
(75, 0, 'MALE', '30.991732', '12-02-2021 04:04 AM', 'سمنة إلى درجة الخطورة'),
(76, 0, 'MALE', '44.191914', '12-02-2021 04:04 AM', 'سمنة إلى درجة الخطورة'),
(77, 0, 'MALE', '20.408165', '12-02-2021 04:05 AM', 'وزن طبيعي'),
(78, 0, 'MALE', '20.408165', '12-02-2021 04:32 AM', 'وزن طبيعي'),
(81, 0, 'MALE', '27.755102', '12-02-2021 07:31 PM', 'Overweight'),
(88, 0, 'MALE', '77.16049', '17-02-2021 06:50 AM', 'Obese'),
(89, 0, 'MALE', '27.755102', '17-02-2021 03:36 PM', 'Overweight'),
(90, 0, 'MALE', '21.40309', '17-02-2021 06:50 PM', 'Normal'),
(91, 0, 'MALE', '19.56086', '18-02-2021 08:51 AM', 'Normal'),
(94, 0, 'MALE', '20.408165', '18-02-2021 03:01 PM', 'Normal'),
(102, 0, 'MALE', '31.67347', '27-02-2021 05:53 AM', 'Obese'),
(107, 0, 'MALE', '26.395802', '07-03-2021 09:47 PM', 'Overweight'),
(121, 0, 'FEMALE', '21.311737', '28-03-2021 12:20 AM', 'Normal'),
(122, 0, 'MALE', '18.51852', '03-04-2021 09:45 AM', 'Normal'),
(150, 0, 'FEMALE', '180.0', '15-05-2021 03:12 AM', 'Obese'),
(151, 0, 'FEMALE', '260.0', '15-05-2021 03:12 AM', 'Obese'),
(152, 0, 'FEMALE', '40.0', '15-05-2021 03:12 AM', 'Obese'),
(153, 0, 'FEMALE', '23.668642', '15-05-2021 03:12 AM', 'Overweight'),
(156, 0, 'FEMALE', '25.2092', '21-05-2021 07:46 PM', 'Overweight'),
(161, 0, 'MALE', '17.313019', '23-05-2021 12:21 AM', 'Underweight'),
(162, 0, 'MALE', '20.408165', '25-05-2021 02:08 PM', 'Normal'),
(163, 0, 'FEMALE', '20.408165', '25-05-2021 02:09 PM', 'Normal'),
(164, 0, 'MALE', '24.221453', '01-06-2021 07:14 AM', 'Normal'),
(165, 0, 'MALE', '35.201046', '01-06-2021 07:15 AM', 'Obese'),
(166, 0, 'MALE', '26.291725', '01-06-2021 07:16 AM', 'Overweight'),
(168, 0, 'MALE', '31.210012', '03-06-2021 08:25 PM', 'Obese'),
(169, 0, 'MALE', '31.210012', '03-06-2021 08:25 PM', 'Obese'),
(170, 0, 'MALE', '36.73095', '04-06-2021 05:30 AM', 'Obese'),
(171, 0, 'MALE', '20.408165', '09-06-2021 11:53 AM', 'Normal'),
(176, 0, 'MALE', '22.460033', '19-06-2021 03:50 AM', 'Normal'),
(177, 0, 'FEMALE', '199.99998', '21-06-2021 09:36 PM', 'Obese'),
(178, 0, 'MALE', '28.721123', '26-06-2021 12:39 AM', 'Overweight'),
(180, 0, 'MALE', '21.499596', '21-07-2021 12:55 PM', 'Normal'),
(182, 0, 'MALE', '26.827423', '23-07-2021 12:26 AM', 'Overweight'),
(184, 0, 'MALE', '21.40309', '01-08-2021 08:49 PM', 'Normal'),
(185, 0, 'MALE', '21.296297', '02-08-2021 12:15 PM', 'Normal'),
(186, 0, 'MALE', '12.499921', '02-08-2021 12:25 PM', 'Underweight'),
(187, 0, 'FEMALE', '12.754366', '02-08-2021 12:25 PM', 'Underweight'),
(188, 0, 'FEMALE', '552.7778', '02-08-2021 12:25 PM', 'Obese'),
(189, 0, 'MALE', '1243.7499', '02-08-2021 12:25 PM', 'Obese'),
(195, 0, 'MALE', '20.408165', '10-08-2021 12:39 PM', 'Normal'),
(197, 0, 'MALE', '24.65374', '15-08-2021 04:09 PM', 'Normal'),
(199, 0, 'MALE', '25.564955', '18-08-2021 02:10 AM', 'Overweight'),
(200, 0, 'MALE', '26.511806', '18-08-2021 02:11 AM', 'Overweight'),
(202, 0, 'MALE', '20.719788', '20-08-2021 11:39 AM', 'Normal'),
(205, 0, 'MALE', '40.12346', '04-09-2021 03:10 AM', 'Obese'),
(206, 0, 'MALE', '31.172842', '04-09-2021 03:10 AM', 'Obese'),
(207, 0, 'MALE', '26.23457', '04-09-2021 03:10 AM', 'Overweight'),
(208, 0, 'MALE', '21.60494', '04-09-2021 03:10 AM', 'Normal'),
(209, 0, 'MALE', '23.14815', '04-09-2021 03:11 AM', 'Normal'),
(210, 0, 'MALE', '25.000002', '04-09-2021 03:11 AM', 'Overweight'),
(211, 0, 'MALE', '24.074076', '04-09-2021 03:11 AM', 'Normal'),
(212, 0, 'MALE', '28.763975', '12-09-2021 12:26 AM', 'Overweight'),
(213, 0, 'MALE', '27.343748', '13-09-2021 06:47 PM', 'Overweight'),
(214, 0, 'MALE', '29.384758', '28-09-2021 02:24 AM', 'Overweight'),
(215, 0, 'FEMALE', '25.777779', '30-09-2021 05:51 AM', 'Overweight'),
(216, 0, 'MALE', '20.408165', '07-10-2021 08:39 PM', 'Normal'),
(217, 0, 'MALE', '12.618604', '08-10-2021 07:08 PM', 'Underweight'),
(218, 0, 'MALE', '14.242733', '08-10-2021 07:08 PM', 'Underweight'),
(219, 0, 'MALE', '31.334013', '08-10-2021 07:08 PM', 'Obese'),
(220, 0, 'MALE', '20.408165', '15-10-2021 02:06 PM', 'Normal'),
(222, 0, 'MALE', '20.408165', '23-10-2021 06:05 AM', 'Normal'),
(223, 0, 'MALE', '27.343748', '23-10-2021 06:06 AM', 'Overweight'),
(231, 0, 'MALE', '20.408165', '17-11-2021 12:47 AM', 'Normal'),
(232, 0, 'MALE', '25.729889', '17-11-2021 12:48 AM', 'Overweight'),
(233, 0, 'MALE', '19.8791', '17-11-2021 12:50 AM', 'Normal'),
(236, 0, 'MALE', '26.175196', '17-12-2021 03:33 PM', 'Overweight'),
(237, 0, 'MALE', '25.099503', '17-12-2021 03:33 PM', 'Overweight'),
(238, 0, 'MALE', '23.665245', '17-12-2021 03:33 PM', 'Normal'),
(239, 0, 'MALE', '24.02381', '17-12-2021 03:33 PM', 'Normal'),
(240, 0, 'MALE', '25.099503', '17-12-2021 03:33 PM', 'Overweight'),
(241, 0, 'MALE', '24.740938', '17-12-2021 03:33 PM', 'Normal'),
(242, 0, 'FEMALE', '25.099503', '17-12-2021 03:33 PM', 'Overweight'),
(243, 0, 'FEMALE', '24.382374', '17-12-2021 03:33 PM', 'Overweight'),
(244, 0, 'FEMALE', '21.513859', '17-12-2021 03:33 PM', 'Normal'),
(245, 0, 'FEMALE', '21.872423', '17-12-2021 03:33 PM', 'Normal'),
(246, 0, 'FEMALE', '23.665245', '17-12-2021 03:33 PM', 'Overweight'),
(250, 115, 'MALE', '33.78222', '21-12-2021 11:37 AM', 'Obese');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `cid` int(11) NOT NULL,
  `category_name` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `category_image` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `show_on_home` int(1) NOT NULL DEFAULT 0,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`cid`, `category_name`, `category_image`, `show_on_home`, `status`) VALUES
(1, '7 Days Diet', '50124_7days-diet.png', 1, 1),
(2, 'Indian Diet Plan for Weight Loss in 4 Weeks', '90211_4week_dietPlan.jpg', 0, 1),
(3, '7 Day Flat Belly Diet', '10764_7DayFlatbellydiet.jpg', 1, 1),
(4, 'Your Best Body Meal Plan', '51539_your-meal-plan-week-1.jpg', 1, 1),
(6, 'Easy Eating Plan for Weight Loss', '45794_EasyEatingPlanforWeightLoss.jpg', 1, 1),
(8, 'Can You Eat Pizza Every Day?', '44580_pizza-weight-loss-diet.jpg', 1, 1),
(10, '9 Soups To Make Lose Weight', '55024_9SoupsToMakeLoseWeight.jpg', 0, 1),
(11, '6 Ways Your Vegetarian Diet', '5845_6WaysYourVegetarianDiet.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact_list`
--

CREATE TABLE `tbl_contact_list` (
  `id` int(11) NOT NULL,
  `contact_name` varchar(150) CHARACTER SET utf8mb4 NOT NULL,
  `contact_email` varchar(150) CHARACTER SET utf8mb4 NOT NULL,
  `contact_phone` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `contact_subject` int(5) NOT NULL,
  `contact_msg` text CHARACTER SET utf8mb4 NOT NULL,
  `created_at` varchar(150) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact_sub`
--

CREATE TABLE `tbl_contact_sub` (
  `id` int(5) NOT NULL,
  `title` varchar(150) CHARACTER SET utf8mb4 NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_contact_sub`
--

INSERT INTO `tbl_contact_sub` (`id`, `title`, `status`) VALUES
(1, 'Other', 1),
(2, 'Promotion ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_diets`
--

CREATE TABLE `tbl_diets` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `diet_title` varchar(150) CHARACTER SET utf8mb4 NOT NULL,
  `diet_info` text CHARACTER SET utf8mb4 NOT NULL,
  `diet_image` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `total_views` int(11) NOT NULL DEFAULT 0,
  `status` int(1) NOT NULL DEFAULT 1,
  `status_type` varchar(30) CHARACTER SET utf8mb4 NOT NULL,
  `is_slider` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_diets`
--

INSERT INTO `tbl_diets` (`id`, `cat_id`, `diet_title`, `diet_info`, `diet_image`, `total_views`, `status`, `status_type`, `is_slider`) VALUES
(16, 1, '7 Days Diet - Day 5', '<p><strong>Breakfast</strong><br />\r\nBurrito made with 1 medium whole wheat tortilla, 4 scrambled egg whites, 1 teaspoon olive oil, 1/4 cup fat-free refried black beans, 2 tablespoons salsa, 2 tablespoons grated low-fat cheddar, and 1 teaspoon fresh cilantro<br />\r\n1 cup mixed melon</p>\r\n\r\n<p><strong>Snack</strong><br />\r\n3 ounces sliced lean ham<br />\r\n1 medium apple</p>\r\n\r\n<p><strong>Lunch</strong><br />\r\nTurkey burger<br />\r\nSalad made with 1 cup baby spinach, 1/4 cup halved cherry tomatoes, 1/2 cup cooked lentils, 2 teaspoons grated Parmesan, and 1 tablespoon light Russian dressing<br />\r\n1 cup skim milk</p>\r\n\r\n<p><strong>Snack</strong><br />\r\n1 fat-free mozzarella string cheese stick<br />\r\n1 cup red grapes</p>\r\n\r\n<p><strong>Dinner&nbsp;</strong><br />\r\n5 ounces grilled wild salmon<br />\r\n1/2 cup brown or wild rice<br />\r\n2 cups mixed baby greens with 1 tablespoon low-fat Caesar dressing<br />\r\n1/2 cup all-fruit strawberry sorbet with 1 sliced pear</p>\r\n', '4193_7DaysDiet_Day5.jpg', 0, 1, '', 0),
(34, 4, 'Saturday', '<p><strong>Breakfast</strong><br />\r\nLoaded Vegetable Omelet<br />\r\n1 banana<br />\r\n<strong>Snack</strong><br />\r\n1 piece of string cheese<br />\r\n<strong>Lunch</strong><br />\r\nTurkey Wrap<br />\r\n1 apple<br />\r\n<strong>Snack</strong><br />\r\n10 cherry tomatoes<br />\r\n2 Tbsp of hummus<br />\r\n<strong>Dinner</strong><br />\r\nQuick Lemon Chicken with Rice<br />\r\n2 cups of broccoli<br />\r\n<strong>Snack</strong><br />\r\n1 Sugar-Free Fudgsicle<br />\r\n<br />\r\n<iframe allow=\";\" allowfullscreen=\"\" frameborder=\"0\" height=\"320\" src=\"https://www.youtube.com/embed/hl_-PeO7e-o\" width=auto></iframe></p>\r\n', '51676_YourBestBodyMealPlan_Day6.jpg', 0, 1, '', 0),
(36, 6, '1,500-calorie eating plan designed to help you stay trim and satisfied', '<p>BREAKFAST</p>\r\n\r\n<p><strong>Egg-White Frittata with Feta, Spinach, and Mushrooms</strong><br />\r\n2 egg whites and 1 whole egg<br />\r\n1/2 cup chopped fresh spinach<br />\r\n1/2 cup chopped button mushrooms<br />\r\n1 oz feta cheese<br />\r\n1 tsp fresh cilantro<br />\r\n1 slice oat-bran bread<br />\r\n2 oz glass 100 percent pomegranate juice* mixed with 6 oz water or seltzer<br />\r\n<br />\r\nPomegranates have natural sugars to satisfy your sweet tooth and are packed with antioxidants, which boost energy, fight wrinkles, prevent blood clots and high cholesterol, and bolster your immune system.<br />\r\n<br />\r\n<strong>Total:</strong>&nbsp;362 calories</p>\r\n\r\n<p>SNACK</p>\r\n\r\n<p>1/3 cup part-skim ricotta cheese mixed with 1/2 tsp vanilla extract<br />\r\n1 Tbsp almond butter<br />\r\n4 medium celery sticks*<br />\r\n<br />\r\nEating low-energy-dense foods like water-packed celery helped women consume 275 fewer calories a day in one study.&nbsp;<br />\r\n<br />\r\n<strong>Total:</strong>&nbsp;219 calories&nbsp;</p>\r\n\r\n<p>LUNCH</p>\r\n\r\n<p><strong>Quinoa Salad</strong><br />\r\n3/4 cup cooked quinoa*<br />\r\n3 cups mixed greens<br />\r\n5 pieces sun-dried tomato<br />\r\n3/4 cup chopped cucumber<br />\r\n1/4 cup chopped yellow pepper<br />\r\n<br />\r\nTop with 3 Tbsp balsamic vinegar, 1 Tbsp Annie&#39;s Organic Honey Mustard, and onion powder.&nbsp;<br />\r\n<br />\r\nQuinoa contains all the essential amino acids your body needs to build lean muscle.&nbsp;<br />\r\n<br />\r\n<strong>Total:</strong>&nbsp;319 calories&nbsp;</p>\r\n\r\n<p>SNACK</p>\r\n\r\n<p>12 Kashi TLC 7 Grain crackers<br />\r\n1 Wholly Guacamole* 100 Calorie Snack Pack<br />\r\n3/4 cup sliced apples<br />\r\n<br />\r\nMonounsaturated fats in avocado help burn belly fat.&nbsp;<br />\r\n<br />\r\n<strong>Total:</strong>&nbsp;239 calories</p>\r\n\r\n<p>DINNER</p>\r\n\r\n<p><strong>Baked Tofu</strong><br />\r\n1/4 tsp onion powder<br />\r\n1/4 tsp garlic powder<br />\r\n1/4 tsp paprika<br />\r\n4 oz firm tofu<br />\r\n5 medium asparagus spears<br />\r\n4 oz cooked edamame<br />\r\n1 1/2 cups cubed butternut squash, roasted and mashed*<br />\r\n22 raspberries for dessert<br />\r\n<br />\r\nSeason tofu, asparagus, and edamame. Bake at 350&deg;F for about 20 minutes. Serve with side of squash.&nbsp;<br />\r\n<br />\r\nWith more than a third of your RDA of fiber, this veggie will keep you satiated.&nbsp;<br />\r\n<br />\r\n<strong>Total:</strong>&nbsp;361 calories&nbsp;</p>\r\n', '9933_EasyEatingPlanforWeightLoss1.png', 0, 1, '', 1),
(37, 8, 'Can You Eat Pizza Every Day And Still Lose Weight?', '<p>If you were stuck on a desert island and could only eat one food the rest of your life, pizza wouldn&rsquo;t be a bad way to go. But if you&#39;re trying to lose weight, it&#39;s definitely not the obvious choice.</p>\r\n\r\n<p>However, according to the New York Post, one New York City chef (and Naples, Italy native) dropped nearly 100 pounds by, among other changes, eating a pizza for lunch every day. Which begs the question: Can eating a slice a day really help you shed pounds?</p>\r\n\r\n<p>Monotony has its advantages when it comes to weight loss,&rdquo; says Jennifer McDaniel, R.D. She says some research has also found that eating the same thing day after day can lead you to want to eat less of it, while variety can spark appetite even when you&#39;re full. A limited menu, therefore, can be less tempting and simpler to plan&mdash;at least for a while. (Hit the reset button&mdash;and burn fat like crazy with Women&#39;s Health&#39;s The Body Clock Diet!)</p>\r\n\r\n<p>&ldquo;If weight loss is your goal, sometimes repetition can be helpful,&rdquo; agrees Brigitte Zeitlin, R.D. &ldquo;Some studies have shown that consistency can help when it comes to changing habits. For example, if you are trying to lose weight and never eat breakfast, then eating the same thing every day for breakfast can make the new morning routine easier to get accustomed to instead of trying to think of seven different breakfasts for the week.&rdquo;</p>\r\n\r\n<p>But as far as long-term sustainability and health, the experts are more skeptical. &quot;Eating any food every day won&#39;t net you all the nutrients your body needs to function optimally,&quot; says Zeitlin. &quot;We are not meant to eat foods in isolation, we are meant to eat a variety of different foods so that we obtain the various amount of vitamins, minerals, and nutrients our bodies require to maintain a healthy life. So, eating just pizza (or just any one item) every day is not a healthy, sustainable diet.&quot; After all, we&rsquo;re omnivores, and our bodies require a variety of nutrients that aren&rsquo;t all found inside a delivery box. More to the point, boredom is a total diet killer. But if you want to give the slice-a-day diet a try, there are a few ways to pack your pizza with more nutrients and fewer calories.</p>\r\n\r\n<p>Customize. Homemade pies will almost always be lighter on grease than delivery styles, says McDaniel. But many chains now offer thin and whole-wheat crusts, leaner meats, and a larger variety of vegetables.</p>\r\n\r\n<p>Downsize. Here&rsquo;s a sneaky way to control your portions: scale down your size. If you usually get a large, go for a medium. People tend to eat the same number of slices so you&rsquo;ll trim calories without trying. Another tip: Have the pie cut into more slices so each is smaller.</p>\r\n\r\n<p>Veg out. More sauce, less cheese is a good start. Then, when it comes to toppings, opt for fiber- and vitamin-rich veggies instead of fatty meats.</p>\r\n\r\n<p>Supplement your slice. A traditional piece of pizza is not nutrient dense, so it takes more slices to fill you up, which adds up in calories and sugar which can contribute to weight gain, says Zeitlin. With no fiber or protein, you have nothing to really fill you up and keep you full. So pair your pie with a salad or other fiber-filled option.</p>\r\n', '18387_pizza-weight-loss-diet.jpg', 0, 1, '', 1),
(39, 11, '6 Ways Your Vegetarian Diet Might Be Sabotaging Your Weight Loss', '<p>Whether you&#39;re trying to reduce your cancer risk, slash your carbon footprint, or you just want to take a stand as an animal lover, there are tons of benefits associated with going vegetarian. And one of those benefits could be weight loss. In fact, a study published in the American Journal of Clinical Nutrition concluded that people who ate about 250 grams of meat a day&mdash;roughly the size of one half-pound steak, piece of poultry, or processed meat&mdash;packed on more pounds over the course of five years compared to other study participants who ate less animal protein. And this was true even when they had the same amount of calories overall. But slimming down as the result of going plant-based is definitely not guaranteed. In fact, certain missteps could lead to weight gain.<br />\r\n&nbsp;</p>\r\n\r\n<p>Will Bulsiewicz, M.D., a board-certified gastroenterologist with @HappyGutMD, notes that vegetarians often sabotage their weight-loss efforts by eating more processed foods when they cut out animal protein. &quot;When it comes to avoiding weight gain on a vegetarian diet, it&#39;s important to make sure that the majority of your calories are coming from high quality, fresh whole foods,&quot; he says.&nbsp;</p>\r\n\r\n<p>If you&#39;re trying to steer clear of eating meat without skewing the scale, here are the specific, weight-loss saboteurs you&#39;ll want to tackle head-on. (Then, find out how you can hit the reset button&mdash;and burn fat like crazy&mdash;with The Body Clock Diet!)</p>\r\n', '85916_6WaysYourVegetarianDiet.jpg', 0, 1, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_favourite`
--

CREATE TABLE `tbl_favourite` (
  `fa_id` int(10) NOT NULL,
  `post_id` int(10) NOT NULL,
  `type` varchar(30) CHARACTER SET utf8mb4 NOT NULL,
  `user_id` int(10) NOT NULL,
  `created_at` varchar(255) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_recent`
--

CREATE TABLE `tbl_recent` (
  `re_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `recent_type` varchar(30) NOT NULL,
  `post_id` varchar(30) NOT NULL,
  `recent_date` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_settings`
--

CREATE TABLE `tbl_settings` (
  `id` int(11) NOT NULL,
  `envato_buyer_name` varchar(200) CHARACTER SET utf8mb4 NOT NULL,
  `envato_purchase_code` varchar(200) CHARACTER SET utf8mb4 NOT NULL,
  `envato_purchased_status` int(1) NOT NULL DEFAULT 0,
  `package_name` varchar(150) CHARACTER SET utf8mb4 NOT NULL,
  `onesignal_app_id` varchar(200) CHARACTER SET utf8mb4 NOT NULL,
  `onesignal_rest_key` varchar(200) CHARACTER SET utf8mb4 NOT NULL,
  `app_name` varchar(150) CHARACTER SET utf8mb4 NOT NULL,
  `app_logo` varchar(200) CHARACTER SET utf8mb4 NOT NULL,
  `app_email` varchar(150) CHARACTER SET utf8mb4 NOT NULL,
  `app_version` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `app_author` varchar(200) CHARACTER SET utf8mb4 NOT NULL,
  `app_contact` varchar(200) CHARACTER SET utf8mb4 NOT NULL,
  `app_website` varchar(200) CHARACTER SET utf8mb4 NOT NULL,
  `app_description` text CHARACTER SET utf8mb4 NOT NULL,
  `app_developed_by` varchar(200) CHARACTER SET utf8mb4 NOT NULL,
  `app_privacy_policy` text CHARACTER SET utf8mb4 NOT NULL,
  `app_update_status` varchar(10) CHARACTER SET utf8mb4 NOT NULL DEFAULT 'false',
  `app_new_version` double NOT NULL DEFAULT 1,
  `app_update_desc` text CHARACTER SET utf8mb4 NOT NULL,
  `app_redirect_url` text CHARACTER SET utf8mb4 NOT NULL,
  `cancel_update_status` varchar(10) CHARACTER SET utf8mb4 NOT NULL DEFAULT 'false',
  `banner_ad_type` varchar(30) CHARACTER SET utf8mb4 NOT NULL DEFAULT 'admob',
  `banner_facebook_id` text CHARACTER SET utf8mb4 NOT NULL,
  `interstital_ad_type` varchar(30) CHARACTER SET utf8mb4 NOT NULL DEFAULT 'admob',
  `interstital_facebook_id` text CHARACTER SET utf8mb4 NOT NULL,
  `app_faq` text CHARACTER SET utf8mb4 NOT NULL,
  `app_terms_conditions` text CHARACTER SET utf8mb4 NOT NULL,
  `api_page_limit` int(11) NOT NULL DEFAULT 5,
  `video_status` varchar(10) CHARACTER SET utf8mb4 DEFAULT 'true',
  `home_limit` int(11) NOT NULL DEFAULT 5,
  `account_delete_intruction` text CHARACTER SET utf8mb4 NOT NULL,
  `native_ad` varchar(20) CHARACTER SET utf8mb4 NOT NULL DEFAULT 'false',
  `native_ad_type` varchar(30) CHARACTER SET utf8mb4 NOT NULL DEFAULT 'admob',
  `native_ad_id` text CHARACTER SET utf8mb4 NOT NULL,
  `native_facebook_id` text CHARACTER SET utf8mb4 NOT NULL,
  `native_cat_position` int(10) NOT NULL DEFAULT 1,
  `native_position` int(10) NOT NULL DEFAULT 1,
  `api_cat_order_by` varchar(200) CHARACTER SET utf8mb4 NOT NULL,
  `api_cat_post_order_by` varchar(200) CHARACTER SET utf8mb4 NOT NULL,
  `api_video_order` varchar(200) CHARACTER SET utf8mb4 NOT NULL,
  `publisher_id` varchar(200) CHARACTER SET utf8mb4 NOT NULL,
  `interstital_ad` varchar(200) CHARACTER SET utf8mb4 NOT NULL,
  `interstital_ad_id` varchar(200) CHARACTER SET utf8mb4 NOT NULL,
  `interstital_ad_click` varchar(200) CHARACTER SET utf8mb4 NOT NULL,
  `banner_ad` varchar(200) CHARACTER SET utf8mb4 NOT NULL,
  `banner_ad_id` varchar(200) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_settings`
--

INSERT INTO `tbl_settings` (`id`, `envato_buyer_name`, `envato_purchase_code`, `envato_purchased_status`, `package_name`, `onesignal_app_id`, `onesignal_rest_key`, `app_name`, `app_logo`, `app_email`, `app_version`, `app_author`, `app_contact`, `app_website`, `app_description`, `app_developed_by`, `app_privacy_policy`, `app_update_status`, `app_new_version`, `app_update_desc`, `app_redirect_url`, `cancel_update_status`, `banner_ad_type`, `banner_facebook_id`, `interstital_ad_type`, `interstital_facebook_id`, `app_faq`, `app_terms_conditions`, `api_page_limit`, `video_status`, `home_limit`, `account_delete_intruction`, `native_ad`, `native_ad_type`, `native_ad_id`, `native_facebook_id`, `native_cat_position`, `native_position`, `api_cat_order_by`, `api_cat_post_order_by`, `api_video_order`, `publisher_id`, `interstital_ad`, `interstital_ad_id`, `interstital_ad_click`, `banner_ad`, `banner_ad_id`) VALUES
(1, 'viaviwebtech', '', 0, 'com.example.dietplan', '', '', 'Diet Plan', 'ic_launcher_round.png', 'user.viaviweb@gmail.com', '1.0.0', 'Viavi Webtech', '+91 9227777522', 'www.viaviweb.com', '<p>Your Application reflects an identity of your business and it&#39;s time to mark your identity! Viavi Webtech is by your side in your journy towards becoming a proud business owner. now a days there are plenty of brands available in same categories, Viavi Webtech helps you to be unique from the others.</p>\r\n\r\n<p>Checkout our products on Codecanyon &nbsp;<a href=\"https://1.envato.market/JakrN\" target=\"_blank\">PORTFOLIO LINK</a></p>\r\n\r\n<p>We also develop custom applications, if you need any kind of custom application contact us on given Email or Contact No.</p>\r\n\r\n<p><strong>Email:</strong> viaviwebtech@gmail.com<br />\r\n<strong>WhatsApp:</strong> +919227777522<br />\r\n<strong>Website:</strong> <a href=\"http://www.viaviweb.com\">www.viaviweb.com</a></p>\r\n', 'Viavi Webtech', '<p><strong>We are committed to protecting your privacy</strong></p>\r\n\r\n<p>We collect the minimum amount of information about you that is commensurate with providing you with a satisfactory service. This policy indicates the type of processes that may result in data being collected about you. Your use of this website gives us the right to collect that information.&nbsp;</p>\r\n\r\n<p><strong>Information Collected</strong></p>\r\n\r\n<p>We may collect any or all of the information that you give us depending on the type of transaction you enter into, including your name, address, telephone number, and email address, together with data about your use of the website. Other information that may be needed from time to time to process a request may also be collected as indicated on the website.</p>\r\n\r\n<p><strong>Information Use</strong></p>\r\n\r\n<p>We use the information collected primarily to process the task for which you visited the website. Data collected in the UK is held in accordance with the Data Protection Act. All reasonable precautions are taken to prevent unauthorised access to this information. This safeguard may require you to provide additional forms of identity should you wish to obtain information about your account details.</p>\r\n\r\n<p><strong>Cookies</strong></p>\r\n\r\n<p>Your Internet browser has the in-built facility for storing small files - &quot;cookies&quot; - that hold information which allows a website to recognise your account. Our website takes advantage of this facility to enhance your experience. You have the ability to prevent your computer from accepting cookies but, if you do, certain functionality on the website may be impaired.</p>\r\n\r\n<p><strong>Disclosing Information</strong></p>\r\n\r\n<p>We do not disclose any personal information obtained about you from this website to third parties unless you permit us to do so by ticking the relevant boxes in registration or competition forms. We may also use the information to keep in contact with you and inform you of developments associated with us. You will be given the opportunity to remove yourself from any mailing list or similar device. If at any time in the future we should wish to disclose information collected on this website to any third party, it would only be with your knowledge and consent.&nbsp;</p>\r\n\r\n<p>We may from time to time provide information of a general nature to third parties - for example, the number of individuals visiting our website or completing a registration form, but we will not use any information that could identify those individuals.&nbsp;</p>\r\n\r\n<p>In addition Dummy may work with third parties for the purpose of delivering targeted behavioural advertising to the Dummy website. Through the use of cookies, anonymous information about your use of our websites and other websites will be used to provide more relevant adverts about goods and services of interest to you. For more information on online behavioural advertising and about how to turn this feature off, please visit youronlinechoices.com/opt-out.</p>\r\n\r\n<p><strong>Changes to this Policy</strong></p>\r\n\r\n<p>Any changes to our Privacy Policy will be placed here and will supersede this version of our policy. We will take reasonable steps to draw your attention to any changes in our policy. However, to be on the safe side, we suggest that you read this document each time you use the website to ensure that it still meets with your approval.</p>\r\n\r\n<p><strong>Contacting Us</strong></p>\r\n\r\n<p>If you have any questions about our Privacy Policy, or if you want to know what information we have collected about you, please email us at hd@dummy.com. You can also correct any factual errors in that information or require us to remove your details form any list under our control.</p>\r\n', 'false', 1, 'kindly you can update new version app', 'https://play.google.com/store/apps/developer?id=Viaan+Parmar', 'true', 'admob', 'IMG_16_9_APP_INSTALL#293685261999350_293692201998656', 'admob', 'IMG_16_9_APP_INSTALL#293685261999350_293692201998656', '<p><strong>We are committed to protecting your privacy</strong></p>\r\n\r\n<p>We collect the minimum amount of information about you that is commensurate with providing you with a satisfactory service. This policy indicates the type of processes that may result in data being collected about you. Your use of this website gives us the right to collect that information.&nbsp;</p>\r\n\r\n<p><strong>Information Collected</strong></p>\r\n\r\n<p>We may collect any or all of the information that you give us depending on the type of transaction you enter into, including your name, address, telephone number, and email address, together with data about your use of the website. Other information that may be needed from time to time to process a request may also be collected as indicated on the website.</p>\r\n\r\n<p><strong>Information Use</strong></p>\r\n\r\n<p>We use the information collected primarily to process the task for which you visited the website. Data collected in the UK is held in accordance with the Data Protection Act. All reasonable precautions are taken to prevent unauthorised access to this information. This safeguard may require you to provide additional forms of identity should you wish to obtain information about your account details.</p>\r\n\r\n<p><strong>Cookies</strong></p>\r\n\r\n<p>Your Internet browser has the in-built facility for storing small files - &quot;cookies&quot; - that hold information which allows a website to recognise your account. Our website takes advantage of this facility to enhance your experience. You have the ability to prevent your computer from accepting cookies but, if you do, certain functionality on the website may be impaired.</p>\r\n\r\n<p><strong>Disclosing Information</strong></p>\r\n\r\n<p>We do not disclose any personal information obtained about you from this website to third parties unless you permit us to do so by ticking the relevant boxes in registration or competition forms. We may also use the information to keep in contact with you and inform you of developments associated with us. You will be given the opportunity to remove yourself from any mailing list or similar device. If at any time in the future we should wish to disclose information collected on this website to any third party, it would only be with your knowledge and consent.&nbsp;</p>\r\n\r\n<p>We may from time to time provide information of a general nature to third parties - for example, the number of individuals visiting our website or completing a registration form, but we will not use any information that could identify those individuals.&nbsp;</p>\r\n\r\n<p>In addition Dummy may work with third parties for the purpose of delivering targeted behavioural advertising to the Dummy website. Through the use of cookies, anonymous information about your use of our websites and other websites will be used to provide more relevant adverts about goods and services of interest to you. For more information on online behavioural advertising and about how to turn this feature off, please visit youronlinechoices.com/opt-out.</p>\r\n\r\n<p><strong>Changes to this Policy</strong></p>\r\n\r\n<p>Any changes to our Privacy Policy will be placed here and will supersede this version of our policy. We will take reasonable steps to draw your attention to any changes in our policy. However, to be on the safe side, we suggest that you read this document each time you use the website to ensure that it still meets with your approval.</p>\r\n\r\n<p><strong>Contacting Us</strong></p>\r\n\r\n<p>If you have any questions about our Privacy Policy, or if you want to know what information we have collected about you, please email us at hd@dummy.com. You can also correct any factual errors in that information or require us to remove your details form any list under our control.</p>', '<p><strong>Contact&nbsp;</strong></p>\r\n\r\n<p><strong>Email :-&nbsp;&nbsp;</strong><strong>info@viaviweb.com</strong></p>', 5, '1', 5, '<p><strong>Contact&nbsp;</strong></p>\r\n\r\n<p><strong>Email :-&nbsp;&nbsp;</strong><strong>info@viaviweb.com</strong></p>', 'true', 'admob', 'ca-app-pub-3940256099942544/2247696110', 'IMG_16_9_APP_INSTALL#288347782353524_288348195686816', 0, 4, 'cid', 'ASC', 'DESC', 'pub-8356404931736973', 'true', 'ca-app-pub-3940256099942544/1033173712', '3', 'true', 'ca-app-pub-3940256099942544/6300978111');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `id` int(10) NOT NULL,
  `post_id` int(10) NOT NULL DEFAULT 0,
  `slider_type` varchar(30) DEFAULT NULL,
  `slider_title` varchar(150) DEFAULT NULL,
  `external_url` text DEFAULT NULL,
  `external_image` text DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_slider`
--

INSERT INTO `tbl_slider` (`id`, `post_id`, `slider_type`, `slider_title`, `external_url`, `external_image`, `status`) VALUES
(2, 0, 'external', 'Online Shopping CMS', 'https://codecanyon.net/item/online-shopping-cms-ecommerce-system-ecommerce-marketplace-buy-sell-paypal-stripe-cod/25683842?s_rank=1', '31599_slider.jpg', 1),
(18, 4, 'video', '', '', '', 1),
(19, 37, 'diet', '', '', '', 1),
(20, 39, 'diet', '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_smtp_settings`
--

CREATE TABLE `tbl_smtp_settings` (
  `id` int(5) NOT NULL,
  `smtp_type` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `smtp_host` varchar(150) CHARACTER SET utf8mb4 NOT NULL,
  `smtp_email` varchar(150) CHARACTER SET utf8mb4 NOT NULL,
  `smtp_password` text CHARACTER SET utf8mb4 NOT NULL,
  `smtp_secure` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `port_no` varchar(10) CHARACTER SET utf8mb4 NOT NULL,
  `smtp_ghost` varchar(150) CHARACTER SET utf8mb4 NOT NULL,
  `smtp_gemail` varchar(150) CHARACTER SET utf8mb4 NOT NULL,
  `smtp_gpassword` text CHARACTER SET utf8mb4 NOT NULL,
  `smtp_gsecure` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `gport_no` varchar(10) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_smtp_settings`
--

INSERT INTO `tbl_smtp_settings` (`id`, `smtp_type`, `smtp_host`, `smtp_email`, `smtp_password`, `smtp_secure`, `port_no`, `smtp_ghost`, `smtp_gemail`, `smtp_gpassword`, `smtp_gsecure`, `gport_no`) VALUES
(1, 'server', '', '', '', 'ssl', '465', 'smtp.gmail.com', '', '', 'ssl', '465');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `user_type` varchar(30) CHARACTER SET utf8mb4 NOT NULL,
  `name` varchar(150) CHARACTER SET utf8mb4 NOT NULL,
  `email` varchar(200) CHARACTER SET utf8mb4 NOT NULL,
  `password` varchar(200) CHARACTER SET utf8mb4 NOT NULL,
  `phone` varchar(200) CHARACTER SET utf8mb4 NOT NULL,
  `device_id` text CHARACTER SET utf8mb4 NOT NULL,
  `auth_id` text CHARACTER SET utf8mb4 NOT NULL,
  `is_duplicate` int(1) NOT NULL DEFAULT 0,
  `user_image` varchar(200) CHARACTER SET utf8mb4 DEFAULT NULL,
  `confirm_code` varchar(200) CHARACTER SET utf8mb4 NOT NULL DEFAULT '0',
  `status` varchar(200) CHARACTER SET utf8mb4 NOT NULL DEFAULT '1',
  `created_at` varchar(200) CHARACTER SET utf8mb4 NOT NULL DEFAULT '-'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `user_type`, `name`, `email`, `password`, `phone`, `device_id`, `auth_id`, `is_duplicate`, `user_image`, `confirm_code`, `status`, `created_at`) VALUES
(1, 'Normal', 'user', 'user.viaviweb@gmail.com', 'ee11cbb19052e40b07aac0ca060c23ee', '1234567890', '9dcd6d57b22ec6ad', '', 0, '53486_22122021062711_user.jpg', '0', '1', '1640062680');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_video`
--

CREATE TABLE `tbl_video` (
  `id` int(11) NOT NULL,
  `video_type` varchar(200) CHARACTER SET utf8mb4 NOT NULL,
  `video_title` varchar(200) CHARACTER SET utf8mb4 NOT NULL,
  `video_url` text CHARACTER SET utf8mb4 NOT NULL,
  `video_id` varchar(200) CHARACTER SET utf8mb4 DEFAULT NULL,
  `video_thumbnail` text CHARACTER SET utf8mb4 NOT NULL,
  `video_duration` varchar(200) CHARACTER SET utf8mb4 DEFAULT NULL,
  `total_views` int(11) NOT NULL DEFAULT 0,
  `is_slider` int(1) NOT NULL DEFAULT 0,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_video`
--

INSERT INTO `tbl_video` (`id`, `video_type`, `video_title`, `video_url`, `video_id`, `video_thumbnail`, `video_duration`, `total_views`, `is_slider`, `status`) VALUES
(2, 'server_url', 'Can You Eat Pizza Every Day And Still Lose Weight?', 'http://www.viaviweb.in/envato/cc/diet_plan_app_new_demo/uploads/39768_video.mp4', '', '90341_4week_dietPlan.jpg', '00:24', 0, 1, 1),
(3, 'youtube', '9 Soups To Make Lose Weight', 'https://www.youtube.com/watch?v=CWFhxL2RALE', 'CWFhxL2RALE', '', '1:49', 0, 0, 1),
(4, 'local', 'Your Best Body Meal Plan', 'http://www.viaviweb.in/envato/cc/diet_plan_app_new_demo/uploads/39768_video.mp4', '', '83501_YourBestBodyMealPlan_Day5.jpg', '0:13', 0, 1, 1),
(5, 'youtube', 'Doing Yoga Exercise Stock Video', 'https://www.youtube.com/watch?v=riGXak3zN98', 'riGXak3zN98', '', '00:12', 0, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_active_log`
--
ALTER TABLE `tbl_active_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_bmi`
--
ALTER TABLE `tbl_bmi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `tbl_contact_list`
--
ALTER TABLE `tbl_contact_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_contact_sub`
--
ALTER TABLE `tbl_contact_sub`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_diets`
--
ALTER TABLE `tbl_diets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_favourite`
--
ALTER TABLE `tbl_favourite`
  ADD PRIMARY KEY (`fa_id`);

--
-- Indexes for table `tbl_recent`
--
ALTER TABLE `tbl_recent`
  ADD PRIMARY KEY (`re_id`);

--
-- Indexes for table `tbl_settings`
--
ALTER TABLE `tbl_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_smtp_settings`
--
ALTER TABLE `tbl_smtp_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_video`
--
ALTER TABLE `tbl_video`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_active_log`
--
ALTER TABLE `tbl_active_log`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_bmi`
--
ALTER TABLE `tbl_bmi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_contact_list`
--
ALTER TABLE `tbl_contact_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_contact_sub`
--
ALTER TABLE `tbl_contact_sub`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_diets`
--
ALTER TABLE `tbl_diets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tbl_favourite`
--
ALTER TABLE `tbl_favourite`
  MODIFY `fa_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_recent`
--
ALTER TABLE `tbl_recent`
  MODIFY `re_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_settings`
--
ALTER TABLE `tbl_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_smtp_settings`
--
ALTER TABLE `tbl_smtp_settings`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_video`
--
ALTER TABLE `tbl_video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
