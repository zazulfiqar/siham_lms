-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 01, 2021 at 11:38 AM
-- Server version: 10.3.30-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clientdemolink_sihamlms`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `application` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cell` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` tinyint(4) DEFAULT NULL,
  `to_send` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT 0,
  `response` varchar(255) DEFAULT 'wait for the response'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `blood_groups`
--

CREATE TABLE `blood_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `my_class_id` int(10) UNSIGNED DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `book_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_copies` int(11) DEFAULT NULL,
  `issued_copies` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `book_requests`
--

CREATE TABLE `book_requests` (
  `id` int(10) UNSIGNED NOT NULL,
  `book_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `start_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `returned` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `class_schedules`
--

CREATE TABLE `class_schedules` (
  `id` int(10) UNSIGNED NOT NULL,
  `course_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `topic` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `zoom_link` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class_schedules`
--

INSERT INTO `class_schedules` (`id`, `course_id`, `class_id`, `teacher_id`, `topic`, `time`, `zoom_link`, `created_at`, `updated_at`) VALUES
(7, 24, 4, 80, 'Primery1', '12 Pm Wednesday', 'weqweqwdsasasdasd', '2021-05-26 07:58:20', '2021-05-31 12:47:39'),
(8, 25, 14, 80, 'Angular Work', '12 Pm Wednesday', 'wwwsdjkahjkdhasjkhdjkhasjkdjkasd', '2021-05-31 10:56:50', '2021-05-31 12:48:04'),
(10, 26, 16, 11, 'ICT', '8:00 - 9:00 am', 'https://us05web.zoom.us/j/83248620541?pwd=Y3JTS0RuWGxGbE4rajhlc2dlZ0tQUT09', '2021-06-05 09:04:47', '2021-06-05 09:04:47');

-- --------------------------------------------------------

--
-- Table structure for table `class_types`
--

CREATE TABLE `class_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `class_types`
--

INSERT INTO `class_types` (`id`, `name`, `code`, `created_at`, `updated_at`) VALUES
(1, 'Creche', 'C', NULL, NULL),
(2, 'Pre Nursery', 'PN', NULL, NULL),
(3, 'Nursery', 'N', NULL, NULL),
(4, 'Primary', 'P', NULL, NULL),
(5, 'Junior Secondary', 'J', NULL, NULL),
(6, 'Senior Secondary', 'S', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `complains`
--

CREATE TABLE `complains` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `std_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `complain` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cell` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `my_class_id` tinyint(4) DEFAULT NULL,
  `time_slot` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `teacher_id`, `name`, `code`, `description`, `created_at`, `updated_at`, `my_class_id`, `time_slot`) VALUES
(31, 82, 'Mathematics', 'SpMT-101', 'All Maths courses', '2021-06-15 16:19:29', '2021-06-15 16:19:29', 19, '10:00 -11:00 am'),
(32, 82, 'Language Courses', 'SpL-101', 'English Language courses', '2021-06-18 14:22:09', '2021-06-24 08:13:28', 20, '10:00-11:00 am'),
(33, 82, 'ICT Courses', 'SpIT-101', 'Technology Courses', '2021-06-18 14:36:42', '2021-06-18 14:36:42', 21, '2:00-3:00 pm');

-- --------------------------------------------------------

--
-- Table structure for table `courses_study_plan`
--

CREATE TABLE `courses_study_plan` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `study_plan` varchar(500) NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses_study_plan`
--

INSERT INTO `courses_study_plan` (`id`, `name`, `study_plan`, `course_id`) VALUES
(1, 'Brenda Palmer', 'dddd', 23),
(2, 'Brenda Palmer', 'dddd', 23),
(3, 'ICT', 'Information Technology', 26);

-- --------------------------------------------------------

--
-- Table structure for table `course_registrations`
--

CREATE TABLE `course_registrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `courses_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_registrations`
--

INSERT INTO `course_registrations` (`id`, `created_at`, `updated_at`, `courses_id`, `user_id`) VALUES
(22, '2021-06-02 11:09:48', '2021-06-02 11:09:48', '25', '18'),
(23, '2021-06-02 11:10:01', '2021-06-02 11:10:01', '23', '18'),
(24, '2021-06-02 11:12:28', '2021-06-02 11:12:28', '24', '18'),
(25, '2021-06-05 08:52:43', '2021-06-05 08:52:43', '26', '18'),
(26, '2021-06-11 17:47:21', '2021-06-11 17:47:21', '29', '18'),
(27, '2021-06-21 15:59:53', '2021-06-21 15:59:53', '33', '18');

-- --------------------------------------------------------

--
-- Table structure for table `curricula`
--

CREATE TABLE `curricula` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dorms`
--

CREATE TABLE `dorms` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `term` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `file` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_id` tinyint(4) DEFAULT NULL,
  `class_id` tinyint(4) DEFAULT NULL,
  `topic` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `teacher_id` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exam_records`
--

CREATE TABLE `exam_records` (
  `id` int(10) UNSIGNED NOT NULL,
  `exam_id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `my_class_id` int(10) UNSIGNED NOT NULL,
  `section_id` int(10) UNSIGNED NOT NULL,
  `total` int(11) DEFAULT NULL,
  `ave` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class_ave` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pos` int(11) DEFAULT NULL,
  `af` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ps` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_comment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `t_comment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expense_types`
--

CREATE TABLE `expense_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paymentMethod` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expense_types`
--

INSERT INTO `expense_types` (`id`, `title`, `type`, `status`, `paymentMethod`, `description`, `created_at`, `updated_at`) VALUES
(6, 'Monthly subscription', NULL, NULL, NULL, NULL, '2021-06-06 16:14:38', '2021-06-06 16:14:38');

-- --------------------------------------------------------

--
-- Table structure for table `front_blogs`
--

CREATE TABLE `front_blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `front_blogs`
--

INSERT INTO `front_blogs` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Life\'s Too Short To Waste Time & Money Learning Things You\'ll Never Use.', 'Choosing a career shouldn\'t cost you a fortune. The problem with college today is that it does. Too many people are spending tens of thousands of dollars on degrees that have little value in the modern world.', '2021-02-26 16:10:34', '2021-05-27 16:58:26'),
(2, 'Unlimited Access To Practical Career Courses!', 'Choosing a career and improving your life just got easier. Knowledge Society teaches you practical life lessons from recognized experts who have real-world experience and success doing what they show you.', '2021-02-26 16:17:26', '2021-03-01 20:41:39'),
(3, 'Learn From Anywhere, On Your Own Schedule', 'It doesn\'t matter if you only have 15 minutes spare time on the bus to work. Or an hour before bed. You can log in and learn as long as you\'re connected to the internet. All your progress through the courses is saved, so you can pick up exactly where you left off.', '2021-02-26 17:48:23', '2021-03-01 20:42:51'),
(4, 'Life\'s Too Short To Waste Time and Money Learning Things You\'ll Never Use', 'Choosing a career shouldn\'t cost you a fortune. The problem with college today is that it does. Too many people are spending tens of thousands of dollars on degrees that have little value in the modern world.', '2021-02-26 18:01:47', '2021-03-01 20:43:46'),
(5, 'Unlimited Access To Practical Career Courses!', 'Choosing a career and improving your life just got easier. Knowledge Society teaches you practical life lessons from recognized experts who have real-world experience and success doing what they show you.', '2021-02-26 18:02:43', '2021-03-01 20:44:26'),
(7, 'Choosing a career shouldn\'t cost you a fortune.', 'Choosing a career shouldn\'t cost you a fortune. The problem with college today is that it does. Too many people are spending tens of thousands of dollars on degrees that have little value in the modern world.', '2021-04-21 19:23:39', '2021-04-21 19:23:39'),
(8, 'About Us', 'Space-eLearn is a revolutionary online education platform in Ethiopia that provides\r\non-demand tutoring and online courses. We believe there are more teachers\r\nin the world than are actually teaching so we want to empower more people\r\nto learn from each other. Our platform enables thousands of tutors to share\r\ntheir knowledge with students around the globe. Whether you need help\r\nwith high school algebra or you want to learn how to program in Python, we\r\nhave a perfect tutor for you. At Space-eLearn, we want to change the way you learn.', '2021-06-10 15:13:44', '2021-06-10 15:13:44');

-- --------------------------------------------------------

--
-- Table structure for table `front_courses`
--

CREATE TABLE `front_courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `front_courses`
--

INSERT INTO `front_courses` (`id`, `course_id`, `content`, `created_at`, `updated_at`) VALUES
(171, 1, 'Algebra I', NULL, NULL),
(172, 1, 'Algebra II', NULL, NULL),
(173, 1, 'Algebra in Spanish', NULL, NULL),
(174, 1, 'Applied Calculus', NULL, NULL),
(175, 1, 'Basic Math', NULL, NULL),
(176, 1, 'Basic Math in Spanish', NULL, NULL),
(177, 1, 'Business Statistics', NULL, NULL),
(178, 1, 'Calculus I, II, III, IV', NULL, NULL),
(179, 1, 'Calculus BC', NULL, NULL),
(180, 1, 'Calculus in Spanish', NULL, NULL),
(181, 1, 'College Algebra', NULL, NULL),
(182, 1, 'Differential Equations', NULL, NULL),
(183, 1, 'Discrete Math', NULL, NULL),
(184, 1, 'Finite Math', NULL, NULL),
(185, 1, 'Geometry', NULL, NULL),
(186, 1, 'Geometry in Spanish', NULL, NULL),
(187, 1, 'Intermediate Statistics', NULL, NULL),
(188, 1, 'Linear Algebra', NULL, NULL),
(189, 1, 'Matrix Algebra', NULL, NULL),
(190, 1, 'Multivariable Calculus', NULL, NULL),
(191, 1, 'Pre-Algebra', NULL, NULL),
(192, 1, 'Pre-Algebra in Spanish', NULL, NULL),
(193, 1, 'Pre-Calculus', NULL, NULL),
(194, 1, 'Quantitative Methods', NULL, NULL),
(195, 1, 'Quantitative Reasoning', NULL, NULL),
(196, 1, 'Statistics', NULL, NULL),
(197, 1, 'Statistics in Spanish', NULL, NULL),
(198, 1, 'Trigonometry', NULL, NULL),
(199, 1, 'Trigonometry in Spanish', NULL, NULL),
(200, 1, 'Vector Algebra', NULL, NULL),
(201, 2, 'American Literature', NULL, NULL),
(202, 2, 'British Literature', NULL, NULL),
(203, 2, 'Composition I, II', NULL, NULL),
(204, 2, 'Drama', NULL, NULL),
(205, 2, 'English Language Use for ELL', NULL, NULL),
(206, 2, 'Fiction', NULL, NULL),
(207, 2, 'Grammar', NULL, NULL),
(208, 2, 'Literature, General', NULL, NULL),
(209, 2, 'Non-Fiction Literature', NULL, NULL),
(210, 2, 'Poetry', NULL, NULL),
(211, 2, 'Reading Comprehension', NULL, NULL),
(212, 2, 'Reading - College Level', NULL, NULL),
(213, 2, 'Vocabulary', NULL, NULL),
(214, 2, 'World Literature', NULL, NULL),
(215, 3, 'Biology', NULL, '2021-03-18 10:49:06'),
(216, 3, 'Chemistry', NULL, '2021-03-18 11:00:01'),
(217, 3, 'Physics', NULL, '2021-03-18 11:00:46'),
(218, 3, 'Earth Scince', NULL, '2021-03-18 11:02:15'),
(219, 3, 'Middle School Science', NULL, '2021-03-18 11:02:53'),
(220, 3, 'Acoustics', NULL, '2021-03-18 11:03:44'),
(221, 3, 'Micro Biology', NULL, '2021-03-18 11:04:28'),
(222, 3, 'Astronomy', NULL, '2021-03-18 11:05:06'),
(223, 3, 'Calculus BC', NULL, NULL),
(224, 3, 'Calculus in Spanish', NULL, NULL),
(225, 3, 'College Algebra', NULL, NULL),
(226, 3, 'Differential Equations', NULL, NULL),
(227, 3, 'Discrete Math', NULL, NULL),
(228, 3, 'Finite Math', NULL, NULL),
(229, 3, 'Geometry', NULL, NULL),
(230, 3, 'Geometry in Spanish', NULL, NULL),
(231, 3, 'Intermediate Statistics', NULL, NULL),
(232, 3, 'Linear Algebra', NULL, NULL),
(233, 3, 'Matrix Algebra', NULL, NULL),
(234, 3, 'Multivariable Calculus', NULL, NULL),
(235, 3, 'Pre-Algebra', NULL, NULL),
(236, 3, 'Pre-Algebra in Spanish', NULL, NULL),
(237, 3, 'Pre-Calculus', NULL, NULL),
(238, 3, 'Quantitative Methods', NULL, NULL),
(239, 3, 'Quantitative Reasoning', NULL, NULL),
(240, 3, 'Statistics', NULL, NULL),
(241, 3, 'Statistics in Spanish', NULL, NULL),
(242, 3, 'Trigonometry', NULL, NULL),
(243, 3, 'Trigonometry in Spanish', NULL, NULL),
(244, 3, 'Vector Algebra', NULL, NULL),
(245, 4, 'Technology I', NULL, NULL),
(246, 4, 'Technology II', NULL, NULL),
(247, 4, 'Technology in Spanish', NULL, NULL),
(248, 4, 'Applied Technology', NULL, NULL),
(249, 4, 'Basic Math', NULL, NULL),
(250, 4, 'Basic Math in Spanish', NULL, NULL),
(251, 4, 'Business Statistics', NULL, NULL),
(252, 4, 'Technology I, II, III, IV', NULL, NULL),
(253, 4, 'Technology BC', NULL, NULL),
(254, 4, 'Technology in Spanish', NULL, NULL),
(255, 4, 'College Algebra', NULL, NULL),
(256, 4, 'Differential Equations', NULL, NULL),
(257, 4, 'Discrete Math', NULL, NULL),
(258, 4, 'Finite Math', NULL, NULL),
(259, 4, 'Geometry', NULL, NULL),
(260, 4, 'Geometry in Spanish', NULL, NULL),
(261, 4, 'Intermediate Statistics', NULL, NULL),
(262, 4, 'Technology', NULL, NULL),
(263, 4, 'Matrix Algebra', NULL, NULL),
(264, 4, 'Multivariable Calculus', NULL, NULL),
(265, 5, 'American Literature', NULL, NULL),
(266, 5, 'British Literature', NULL, NULL),
(267, 5, 'Composition I, II', NULL, NULL),
(268, 5, 'Drama', NULL, NULL),
(269, 5, 'English Language Use for ELL', NULL, NULL),
(270, 5, 'Fiction', NULL, NULL),
(271, 5, 'Grammar', NULL, NULL),
(272, 5, 'Literature, General', NULL, NULL),
(273, 5, 'Non-Fiction Literature', NULL, NULL),
(274, 5, 'Poetry', NULL, NULL),
(275, 5, 'Reading Comprehension', NULL, NULL),
(276, 5, 'Reading - College Level', NULL, NULL),
(277, 5, 'Vocabulary', NULL, NULL),
(278, 5, 'World Literature', NULL, NULL),
(279, 6, 'Business', NULL, NULL),
(280, 6, 'Business 2', NULL, NULL),
(281, 6, 'Business I, II', NULL, NULL),
(283, 6, 'Business Language Use for ELL', NULL, NULL),
(284, 6, 'Business Methods', NULL, NULL),
(285, 6, 'Business Reasoning', NULL, NULL),
(286, 6, 'Statistics', NULL, NULL),
(287, 6, 'Statistics in Spanish', NULL, NULL),
(288, 6, 'Trigonometry', NULL, NULL),
(289, 6, 'Trigonometry in Spanish', NULL, NULL),
(290, 6, 'Vector Algebra', NULL, NULL),
(292, 9, 'Vender 2 Subject', '2021-03-11 12:41:41', '2021-03-11 12:41:41'),
(293, 1, 'Math 1234', '2021-04-03 21:12:18', '2021-04-03 21:12:18'),
(294, 6, 'TQM', '2021-04-21 19:20:04', '2021-04-21 19:20:04'),
(295, 10, 'Hello Cources', '2021-05-21 05:05:24', '2021-05-21 05:05:24'),
(298, 16, 'basic computing', '2021-06-07 17:39:30', '2021-06-07 17:39:30'),
(299, 18, 'Algebra-1', '2021-06-08 17:15:44', '2021-06-08 17:15:44'),
(300, 18, 'Algebra-2', '2021-06-08 17:21:24', '2021-06-08 17:21:24'),
(301, 18, 'Calculus', '2021-06-08 17:22:52', '2021-06-08 17:22:52'),
(304, 18, 'Geometry', '2021-06-08 17:26:41', '2021-06-08 17:26:41'),
(305, 18, 'Trigonometry', '2021-06-08 17:26:53', '2021-06-08 17:26:53'),
(306, 24, 'Biology', '2021-06-10 15:26:03', '2021-06-10 15:26:03'),
(307, 24, 'Chemistry', '2021-06-10 15:26:14', '2021-06-10 15:26:14'),
(309, 24, 'Earth Science', '2021-06-10 15:26:35', '2021-06-10 15:26:35'),
(310, 24, 'Food Science', '2021-06-10 15:26:53', '2021-06-10 15:26:53'),
(311, 23, 'Basic Computer Trainings', '2021-06-10 15:34:07', '2021-06-10 15:34:07'),
(312, 23, 'Microsoft Office', '2021-06-10 15:34:38', '2021-06-10 15:34:38'),
(313, 23, 'Graphic Design & Animation', '2021-06-10 15:35:21', '2021-06-10 15:35:21'),
(314, 24, 'Physics', '2021-06-10 15:35:47', '2021-06-10 15:35:47'),
(315, 24, 'Space Science', '2021-06-10 15:36:03', '2021-06-10 15:36:03'),
(316, 23, 'Programming, Java, Python', '2021-06-10 15:37:11', '2021-06-10 15:37:11'),
(317, 25, 'Basic Grammar', '2021-06-10 15:40:25', '2021-06-10 15:40:25'),
(318, 25, 'Reading', '2021-06-10 15:40:52', '2021-06-10 15:40:52'),
(319, 25, 'Vocabulary', '2021-06-10 15:41:24', '2021-06-10 15:41:24'),
(320, 25, 'Literature', '2021-06-10 15:42:57', '2021-06-10 15:42:57'),
(321, 26, 'Basic Social Study', '2021-06-10 15:46:11', '2021-06-10 15:46:11'),
(323, 26, 'Geography', '2021-06-10 15:46:55', '2021-06-10 15:46:55'),
(324, 26, 'Civics & Government', '2021-06-10 15:47:21', '2021-06-10 15:47:21'),
(325, 26, 'Psychology', '2021-06-10 15:48:07', '2021-06-10 15:48:07'),
(326, 26, 'Philosophy', '2021-06-10 15:48:37', '2021-06-10 15:48:37'),
(327, 26, 'Research Method', '2021-06-10 15:48:58', '2021-06-10 15:48:58'),
(328, 26, 'World History', '2021-06-10 15:49:19', '2021-06-10 15:49:19'),
(329, 28, 'Mathematics', '2021-06-15 16:25:01', '2021-06-15 16:25:01'),
(330, 28, 'Science', '2021-06-15 16:25:23', '2021-06-15 16:25:23'),
(331, 28, 'Social Studies', '2021-06-15 16:25:45', '2021-06-15 16:25:45'),
(332, 28, 'English Grammar', '2021-06-15 16:26:08', '2021-06-15 16:26:08'),
(333, 28, 'Biology', '2021-06-15 16:26:20', '2021-06-15 16:26:20'),
(334, 28, 'Physics', '2021-06-15 16:26:31', '2021-06-15 16:26:31'),
(335, 28, 'Chemistry', '2021-06-15 16:26:41', '2021-06-15 16:26:41'),
(336, 29, 'English Language', '2021-06-18 14:27:34', '2021-06-18 14:27:34'),
(337, 29, 'English Writing', '2021-06-18 14:28:01', '2021-06-18 14:28:01'),
(338, 29, 'English Vocabulary', '2021-06-18 14:32:59', '2021-06-18 14:32:59'),
(339, 29, 'Amharic Language', '2021-06-18 14:33:22', '2021-06-18 14:33:22'),
(340, 29, 'Amharic Writing', '2021-06-18 14:33:41', '2021-06-18 14:33:41'),
(341, 30, 'Basic Computer Knowledge', '2021-06-18 14:40:14', '2021-06-18 14:40:14'),
(342, 30, 'Microsoft Office', '2021-06-18 14:40:33', '2021-06-18 14:40:33'),
(343, 30, 'Programming', '2021-06-18 14:40:50', '2021-06-18 14:40:50'),
(344, 30, 'Computer Network', '2021-06-18 14:41:08', '2021-06-18 14:41:08'),
(345, 30, 'Database & Data Security', '2021-06-18 14:41:36', '2021-06-18 14:41:36'),
(346, 30, 'Crypto-Currency', '2021-06-18 14:42:29', '2021-06-18 14:42:29'),
(347, 30, 'Graphic Design', '2021-06-18 14:42:54', '2021-06-18 14:42:54');

-- --------------------------------------------------------

--
-- Table structure for table `front_faqs`
--

CREATE TABLE `front_faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `faq` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `front_faqs`
--

INSERT INTO `front_faqs` (`id`, `faq`, `description`, `created_at`, `updated_at`) VALUES
(1, 'What will lorem ipsum teach me?', 'Knowledge Society focuses on four main pillars of online education: health, wealth, love, and happiness. At this time, we\'re focusing on wealth - practical skills that you can use to start or grow your career. Because there\'s multiple courses, you will learn both beginner and advanced concepts.', '2021-02-26 16:21:24', '2021-03-01 20:04:49'),
(2, 'How old do I have to be to take an online class?', 'You must be at least a high school sophomore, junior, or senior.', '2021-02-26 18:04:12', '2021-02-26 18:04:12'),
(3, 'How do I enroll and register?', 'If you are a high school student, see the online courses page on the Precollege Studies website. Otherwise, please visit the registration page', '2021-02-26 18:04:54', '2021-02-26 18:04:54');

-- --------------------------------------------------------

--
-- Table structure for table `front_galleries`
--

CREATE TABLE `front_galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `home_header_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_header_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price_header_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `testimonial_header_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blog_header_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `faq_header_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_header_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `front_galleries`
--

INSERT INTO `front_galleries` (`id`, `home_header_image`, `course_header_image`, `price_header_image`, `testimonial_header_image`, `blog_header_image`, `faq_header_image`, `contact_header_image`, `created_at`, `updated_at`) VALUES
(1, 'uploads/banner/vr.jpg', 'uploads/banner/Course banner.jpg', 'uploads/banner/FAQ banner.jpg', 'uploads/banner/Testimoneial banner.jpg', 'uploads/banner/Blog banner.jpg', 'uploads/banner/Blog banner.jpg', 'uploads/banner/Contact Banner.jpg', NULL, '2021-06-25 07:30:33'),
(2, '1', '2', '3', '7', '4', '5', '6', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `front_homepage_galleries`
--

CREATE TABLE `front_homepage_galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `front_homepage_galleries`
--

INSERT INTO `front_homepage_galleries` (`id`, `name`, `content`, `photo`, `created_at`, `updated_at`) VALUES
(27, 'Mr. Phillip', 'English Grammar & Reading (All Level)', '1623840148-images (7).jpeg', '2021-05-24 10:50:52', '2021-05-24 10:50:52'),
(28, 'Mr. Alelign Dametew', 'Biology & Chemistry Tutor Class', '1623854646-images (11).jpeg', '2021-05-24 10:51:18', '2021-05-24 10:51:18'),
(30, 'Ms. Mekdes Melaku', 'Maths & Physics Tutor Class', '1623854707-a8d9db8bdc1a5b0df2c393a2b61d6e8e.jpg', '2021-06-07 10:30:20', '2021-06-07 10:30:20'),
(32, 'Mr. Fitsum Tekeste', 'Graphic Design and Basic Computer Skills', '1623840821-images (13).jpeg', '2021-06-10 09:06:31', '2021-06-10 09:06:31');

-- --------------------------------------------------------

--
-- Table structure for table `front_hpmepage_videos`
--

CREATE TABLE `front_hpmepage_videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtubeurl` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `checkWebsite` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `front_hpmepage_videos`
--

INSERT INTO `front_hpmepage_videos` (`id`, `name`, `content`, `photo`, `youtubeurl`, `checkWebsite`, `created_at`, `updated_at`) VALUES
(6, 'Mr. Fitsum Tekete', 'Basic Computer, Graphic Design, & 3d', '1624561504-160-1606325_slider-apple-wireless-keyboard.jpg', 'Arteficial Intelligence', 1, '2021-06-14 08:32:33', '2021-06-14 08:32:33'),
(11, 'Video Course', 'Python Programming Full Courses', '1624543829-online live classes pic.jpg', 'https://www.youtube.com/watch?v=Y8Tko2YC5hA', 1, '2021-06-24 13:29:50', '2021-06-24 13:29:50'),
(12, 'by Mr. Alelign Damtew', 'Food Science & Fitness', '1624543896-online live classes pic.jpg', 'https://youtu.be/swOc-IP6BFM', 1, '2021-06-24 13:50:15', '2021-06-24 13:50:15'),
(13, 'by Mr. Amir', 'Cryptocurrency-Bitcoin', '1624543944-iStock-1145592947-1.jpg', 'https://www.youtube.com/watch?v=3wQVZOjxa5w', 1, '2021-06-24 13:55:44', '2021-06-24 13:55:44'),
(14, 'By Mr. Asres Temam', 'Programming Language & Intro. to Computing', '1624559518-87-879470_computer-programming-coding-technology.jpg', 'https://www.youtube.com/watch?v=OAx_6-wdslM', 1, '2021-06-24 18:27:36', '2021-06-24 18:27:36'),
(15, 'Space e Learning', 'About Us', '1624559962-201091298_236042131665531_2111510194022621040_n.jpg', 'https://www.youtube.com/watch?v=LDFZdfvNu-I', 1, '2021-06-24 18:39:22', '2021-06-24 18:39:22');

-- --------------------------------------------------------

--
-- Table structure for table `front_pricings`
--

CREATE TABLE `front_pricings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_duration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature_one` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature_two` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature_three` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature_four` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature_five` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `front_testimonials`
--

CREATE TABLE `front_testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `front_testimonials`
--

INSERT INTO `front_testimonials` (`id`, `image`, `name`, `description`, `created_at`, `updated_at`) VALUES
(9, 'uploads/testimonial/20210617_184532.jpg', 'E. A. Siblu', 'These Classes are thing important keys to unloking our written creativity. If you have beliefe, freedom and discipline, then who knows what the future will hold', '2021-03-01 20:10:36', '2021-06-17 15:46:22'),
(10, 'uploads/testimonial/saying_img2.png', 'Sabbir Hasan', 'I loved this class.I leraned to create rather than follow recipes and how to think outside of the box. I have alwayes loved cooking, this class taken meto a new level', '2021-03-01 20:11:49', '2021-06-07 11:11:05'),
(12, 'uploads/testimonial/saying_img3.png', 'White Smith', 'Collaboratively formulate mission-critical innovation without cost effective channels. Competently iterate end-to-end imperatives with effective leadership skills.', '2021-03-01 20:13:46', '2021-06-07 11:14:00');

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class_type_id` int(10) UNSIGNED DEFAULT NULL,
  `mark_from` tinyint(4) NOT NULL,
  `mark_to` tinyint(4) NOT NULL,
  `remark` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `homepagefronts`
--

CREATE TABLE `homepagefronts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `banner_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_learning` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subjects_topic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subjects_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `learn_anywhere_topic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `learn_anywhere_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `learn_anywhere_card_topic1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `learn_anywhere_card_text1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `learn_anywhere_card_topic2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `learn_anywhere_card_text2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `learn_anywhere_card_topic3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `learn_anywhere_card_text3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pricing_content` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `testimonials` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `faq_topic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `faq_content` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_topic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_content` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `homepagefronts`
--

INSERT INTO `homepagefronts` (`id`, `banner_text`, `start_learning`, `subjects_topic`, `subjects_text`, `learn_anywhere_topic`, `learn_anywhere_text`, `learn_anywhere_card_topic1`, `learn_anywhere_card_text1`, `learn_anywhere_card_topic2`, `learn_anywhere_card_text2`, `learn_anywhere_card_topic3`, `learn_anywhere_card_text3`, `pricing_content`, `testimonials`, `faq_topic`, `faq_content`, `contact_topic`, `contact_content`, `created_at`, `updated_at`) VALUES
(1, 'Upgrade Your skill Change your life!', '', 'We deliver Knowledge!', 'Welcome aboard to space online education service in Ethiopia. Now you are part of a revolutionary online education platform that provides on demand tutoring, online courses, trainings, and tutor marketplace.', 'Discover a new way of learning !', 'A new course now, A new skill later.', 'Log into your private account', 'Watch via any device with internet access.', 'Learn on your own schedule', 'Start or stop the videos anytime. Pause and pick up where you left off easily.', 'Use any computer', 'Watch right on Knowledgesociety.com.', 'Get access to specialized video training that teaches practical skills for improving your career and life, every month. Weekly content updates from multiple world\'s best experts.', 'What Student Are Saying', 'Frequently Asked Questions', 'Here are some answers to common questions we get from students about Knowledge Society Learning. If your question is not answered below, contact us to assist.', 'Need Anything? Contact With Us', 'You can also contact us by using our Online Contact Form', NULL, '2021-06-24 14:45:53');

-- --------------------------------------------------------

--
-- Table structure for table `lectures`
--

CREATE TABLE `lectures` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `teacher_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `topic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lectures`
--

INSERT INTO `lectures` (`id`, `course_id`, `class_id`, `teacher_id`, `file`, `topic`, `description`, `created_at`, `updated_at`) VALUES
(9, '24', '4', '9', 'uploads/Lectures/1615039562.png', 'New Your Cources Here', 'Yes Here Is Your New Lacture', '2021-05-26 07:49:12', '2021-05-26 07:49:12'),
(10, '25', '14', '10', 'uploads/Lectures/sihamnewdb.sql', 'binary number', 'empty', '2021-05-27 17:27:06', '2021-05-27 17:27:06'),
(11, '26', '14', '11', 'uploads/Lectures/Brilliant - Learn to think.mp4', 'ICT', NULL, '2021-06-05 08:47:34', '2021-06-05 08:47:34');

-- --------------------------------------------------------

--
-- Table structure for table `lgas`
--

CREATE TABLE `lgas` (
  `id` int(10) UNSIGNED NOT NULL,
  `state_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lgas`
--

INSERT INTO `lgas` (`id`, `state_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Aba North', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(2, 1, 'Aba South', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(3, 1, 'Arochukwu', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(4, 1, 'Bende', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(5, 1, 'Ikwuano', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(6, 1, 'Isiala Ngwa North', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(7, 1, 'Isiala Ngwa South', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(8, 1, 'Isuikwuato', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(9, 1, 'Obi Ngwa', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(10, 1, 'Ohafia', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(11, 1, 'Osisioma', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(12, 1, 'Ugwunagbo', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(13, 1, 'Ukwa East', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(14, 1, 'Ukwa West', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(15, 1, 'Umuahia North', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(16, 1, 'Umuahia South', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(17, 1, 'Umu Nneochi', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(18, 2, 'Demsa', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(19, 2, 'Fufure', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(20, 2, 'Ganye', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(21, 2, 'Gayuk', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(22, 2, 'Gombi', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(23, 2, 'Grie', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(24, 2, 'Hong', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(25, 2, 'Jada', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(26, 2, 'Larmurde', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(27, 2, 'Madagali', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(28, 2, 'Maiha', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(29, 2, 'Mayo Belwa', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(30, 2, 'Michika', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(31, 2, 'Mubi North', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(32, 2, 'Mubi South', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(33, 2, 'Numan', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(34, 2, 'Shelleng', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(35, 2, 'Song', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(36, 2, 'Toungo', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(37, 2, 'Yola North', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(38, 2, 'Yola South', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(39, 3, 'Abak', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(40, 3, 'Eastern Obolo', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(41, 3, 'Eket', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(42, 3, 'Esit Eket', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(43, 3, 'Essien Udim', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(44, 3, 'Etim Ekpo', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(45, 3, 'Etinan', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(46, 3, 'Ibeno', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(47, 3, 'Ibesikpo Asutan', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(48, 3, 'Ibiono-Ibom', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(49, 3, 'Ika', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(50, 3, 'Ikono', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(51, 3, 'Ikot Abasi', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(52, 3, 'Ikot Ekpene', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(53, 3, 'Ini', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(54, 3, 'Itu', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(55, 3, 'Mbo', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(56, 3, 'Mkpat-Enin', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(57, 3, 'Nsit-Atai', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(58, 3, 'Nsit-Ibom', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(59, 3, 'Nsit-Ubium', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(60, 3, 'Obot Akara', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(61, 3, 'Okobo', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(62, 3, 'Onna', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(63, 3, 'Oron', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(64, 3, 'Oruk Anam', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(65, 3, 'Udung-Uko', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(66, 3, 'Ukanafun', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(67, 3, 'Uruan', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(68, 3, 'Urue-Offong/Oruko', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(69, 3, 'Uyo', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(70, 4, 'Aguata', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(71, 4, 'Anambra East', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(72, 4, 'Anambra West', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(73, 4, 'Anaocha', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(74, 4, 'Awka North', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(75, 4, 'Awka South', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(76, 4, 'Ayamelum', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(77, 4, 'Dunukofia', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(78, 4, 'Ekwusigo', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(79, 4, 'Idemili North', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(80, 4, 'Idemili South', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(81, 4, 'Ihiala', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(82, 4, 'Njikoka', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(83, 4, 'Nnewi North', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(84, 4, 'Nnewi South', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(85, 4, 'Ogbaru', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(86, 4, 'Onitsha North', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(87, 4, 'Onitsha South', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(88, 4, 'Orumba North', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(89, 4, 'Orumba South', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(90, 4, 'Oyi', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(91, 5, 'Alkaleri', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(92, 5, 'Bauchi', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(93, 5, 'Bogoro', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(94, 5, 'Damban', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(95, 5, 'Darazo', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(96, 5, 'Dass', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(97, 5, 'Gamawa', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(98, 5, 'Ganjuwa', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(99, 5, 'Giade', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(100, 5, 'Itas/Gadau', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(101, 5, 'Jama\'are', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(102, 5, 'Katagum', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(103, 5, 'Kirfi', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(104, 5, 'Misau', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(105, 5, 'Ningi', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(106, 5, 'Shira', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(107, 5, 'Tafawa Balewa', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(108, 5, 'Toro', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(109, 5, 'Warji', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(110, 5, 'Zaki', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(111, 6, 'Brass', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(112, 6, 'Ekeremor', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(113, 6, 'Kolokuma/Opokuma', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(114, 6, 'Nembe', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(115, 6, 'Ogbia', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(116, 6, 'Sagbama', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(117, 6, 'Southern Ijaw', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(118, 6, 'Yenagoa', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(119, 7, 'Agatu', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(120, 7, 'Apa', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(121, 7, 'Ado', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(122, 7, 'Buruku', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(123, 7, 'Gboko', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(124, 7, 'Guma', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(125, 7, 'Gwer East', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(126, 7, 'Gwer West', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(127, 7, 'Katsina-Ala', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(128, 7, 'Konshisha', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(129, 7, 'Kwande', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(130, 7, 'Logo', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(131, 7, 'Makurdi', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(132, 7, 'Obi', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(133, 7, 'Ogbadibo', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(134, 7, 'Ohimini', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(135, 7, 'Oju', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(136, 7, 'Okpokwu', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(137, 7, 'Oturkpo', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(138, 7, 'Tarka', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(139, 7, 'Ukum', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(140, 7, 'Ushongo', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(141, 7, 'Vandeikya', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(142, 8, 'Abadam', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(143, 8, 'Askira/Uba', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(144, 8, 'Bama', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(145, 8, 'Bayo', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(146, 8, 'Biu', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(147, 8, 'Chibok', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(148, 8, 'Damboa', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(149, 8, 'Dikwa', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(150, 8, 'Gubio', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(151, 8, 'Guzamala', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(152, 8, 'Gwoza', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(153, 8, 'Hawul', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(154, 8, 'Jere', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(155, 8, 'Kaga', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(156, 8, 'Kala/Balge', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(157, 8, 'Konduga', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(158, 8, 'Kukawa', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(159, 8, 'Kwaya Kusar', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(160, 8, 'Mafa', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(161, 8, 'Magumeri', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(162, 8, 'Maiduguri', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(163, 8, 'Marte', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(164, 8, 'Mobbar', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(165, 8, 'Monguno', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(166, 8, 'Ngala', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(167, 8, 'Nganzai', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(168, 8, 'Shani', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(169, 9, 'Abi', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(170, 9, 'Akamkpa', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(171, 9, 'Akpabuyo', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(172, 9, 'Bakassi', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(173, 9, 'Bekwarra', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(174, 9, 'Biase', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(175, 9, 'Boki', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(176, 9, 'Calabar Municipal', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(177, 9, 'Calabar South', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(178, 9, 'Etung', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(179, 9, 'Ikom', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(180, 9, 'Obanliku', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(181, 9, 'Obubra', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(182, 9, 'Obudu', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(183, 9, 'Odukpani', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(184, 9, 'Ogoja', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(185, 9, 'Yakuur', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(186, 9, 'Yala', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(187, 10, 'Aniocha North', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(188, 10, 'Aniocha South', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(189, 10, 'Bomadi', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(190, 10, 'Burutu', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(191, 10, 'Ethiope East', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(192, 10, 'Ethiope West', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(193, 10, 'Ika North East', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(194, 10, 'Ika South', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(195, 10, 'Isoko North', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(196, 10, 'Isoko South', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(197, 10, 'Ndokwa East', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(198, 10, 'Ndokwa West', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(199, 10, 'Okpe', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(200, 10, 'Oshimili North', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(201, 10, 'Oshimili South', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(202, 10, 'Patani', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(203, 10, 'Sapele, Delta', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(204, 10, 'Udu', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(205, 10, 'Ughelli North', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(206, 10, 'Ughelli South', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(207, 10, 'Ukwuani', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(208, 10, 'Uvwie', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(209, 10, 'Warri North', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(210, 10, 'Warri South', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(211, 10, 'Warri South West', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(212, 11, 'Abakaliki', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(213, 11, 'Afikpo North', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(214, 11, 'Afikpo South', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(215, 11, 'Ebonyi', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(216, 11, 'Ezza North', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(217, 11, 'Ezza South', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(218, 11, 'Ikwo', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(219, 11, 'Ishielu', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(220, 11, 'Ivo', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(221, 11, 'Izzi', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(222, 11, 'Ohaozara', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(223, 11, 'Ohaukwu', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(224, 11, 'Onicha', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(225, 12, 'Akoko-Edo', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(226, 12, 'Egor', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(227, 12, 'Esan Central', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(228, 12, 'Esan North-East', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(229, 12, 'Esan South-East', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(230, 12, 'Esan West', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(231, 12, 'Etsako Central', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(232, 12, 'Etsako East', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(233, 12, 'Etsako West', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(234, 12, 'Igueben', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(235, 12, 'Ikpoba Okha', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(236, 12, 'Orhionmwon', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(237, 12, 'Oredo', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(238, 12, 'Ovia North-East', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(239, 12, 'Ovia South-West', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(240, 12, 'Owan East', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(241, 12, 'Owan West', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(242, 12, 'Uhunmwonde', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(243, 13, 'Ado Ekiti', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(244, 13, 'Efon', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(245, 13, 'Ekiti East', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(246, 13, 'Ekiti South-West', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(247, 13, 'Ekiti West', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(248, 13, 'Emure', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(249, 13, 'Gbonyin', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(250, 13, 'Ido Osi', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(251, 13, 'Ijero', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(252, 13, 'Ikere', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(253, 13, 'Ikole', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(254, 13, 'Ilejemeje', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(255, 13, 'Irepodun/Ifelodun', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(256, 13, 'Ise/Orun', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(257, 13, 'Moba', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(258, 13, 'Oye', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(259, 14, 'Aninri', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(260, 14, 'Awgu', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(261, 14, 'Enugu East', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(262, 14, 'Enugu North', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(263, 14, 'Enugu South', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(264, 14, 'Ezeagu', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(265, 14, 'Igbo Etiti', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(266, 14, 'Igbo Eze North', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(267, 14, 'Igbo Eze South', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(268, 14, 'Isi Uzo', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(269, 14, 'Nkanu East', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(270, 14, 'Nkanu West', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(271, 14, 'Nsukka', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(272, 14, 'Oji River', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(273, 14, 'Udenu', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(274, 14, 'Udi', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(275, 14, 'Uzo Uwani', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(276, 15, 'Abaji', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(277, 15, 'Bwari', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(278, 15, 'Gwagwalada', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(279, 15, 'Kuje', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(280, 15, 'Kwali', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(281, 15, 'Municipal Area Council', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(282, 16, 'Akko', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(283, 16, 'Balanga', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(284, 16, 'Billiri', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(285, 16, 'Dukku', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(286, 16, 'Funakaye', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(287, 16, 'Gombe', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(288, 16, 'Kaltungo', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(289, 16, 'Kwami', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(290, 16, 'Nafada', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(291, 16, 'Shongom', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(292, 16, 'Yamaltu/Deba', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(293, 17, 'Aboh Mbaise', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(294, 17, 'Ahiazu Mbaise', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(295, 17, 'Ehime Mbano', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(296, 17, 'Ezinihitte', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(297, 17, 'Ideato North', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(298, 17, 'Ideato South', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(299, 17, 'Ihitte/Uboma', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(300, 17, 'Ikeduru', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(301, 17, 'Isiala Mbano', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(302, 17, 'Isu', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(303, 17, 'Mbaitoli', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(304, 17, 'Ngor Okpala', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(305, 17, 'Njaba', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(306, 17, 'Nkwerre', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(307, 17, 'Nwangele', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(308, 17, 'Obowo', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(309, 17, 'Oguta', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(310, 17, 'Ohaji/Egbema', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(311, 17, 'Okigwe', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(312, 17, 'Orlu', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(313, 17, 'Orsu', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(314, 17, 'Oru East', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(315, 17, 'Oru West', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(316, 17, 'Owerri Municipal', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(317, 17, 'Owerri North', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(318, 17, 'Owerri West', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(319, 17, 'Unuimo', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(320, 18, 'Auyo', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(321, 18, 'Babura', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(322, 18, 'Biriniwa', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(323, 18, 'Birnin Kudu', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(324, 18, 'Buji', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(325, 18, 'Dutse', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(326, 18, 'Gagarawa', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(327, 18, 'Garki', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(328, 18, 'Gumel', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(329, 18, 'Guri', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(330, 18, 'Gwaram', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(331, 18, 'Gwiwa', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(332, 18, 'Hadejia', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(333, 18, 'Jahun', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(334, 18, 'Kafin Hausa', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(335, 18, 'Kazaure', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(336, 18, 'Kiri Kasama', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(337, 18, 'Kiyawa', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(338, 18, 'Kaugama', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(339, 18, 'Maigatari', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(340, 18, 'Malam Madori', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(341, 18, 'Miga', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(342, 18, 'Ringim', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(343, 18, 'Roni', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(344, 18, 'Sule Tankarkar', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(345, 18, 'Taura', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(346, 18, 'Yankwashi', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(347, 19, 'Birnin Gwari', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(348, 19, 'Chikun', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(349, 19, 'Giwa', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(350, 19, 'Igabi', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(351, 19, 'Ikara', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(352, 19, 'Jaba', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(353, 19, 'Jema\'a', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(354, 19, 'Kachia', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(355, 19, 'Kaduna North', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(356, 19, 'Kaduna South', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(357, 19, 'Kagarko', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(358, 19, 'Kajuru', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(359, 19, 'Kaura', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(360, 19, 'Kauru', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(361, 19, 'Kubau', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(362, 19, 'Kudan', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(363, 19, 'Lere', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(364, 19, 'Makarfi', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(365, 19, 'Sabon Gari', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(366, 19, 'Sanga', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(367, 19, 'Soba', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(368, 19, 'Zangon Kataf', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(369, 19, 'Zaria', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(370, 20, 'Ajingi', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(371, 20, 'Albasu', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(372, 20, 'Bagwai', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(373, 20, 'Bebeji', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(374, 20, 'Bichi', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(375, 20, 'Bunkure', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(376, 20, 'Dala', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(377, 20, 'Dambatta', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(378, 20, 'Dawakin Kudu', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(379, 20, 'Dawakin Tofa', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(380, 20, 'Doguwa', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(381, 20, 'Fagge', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(382, 20, 'Gabasawa', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(383, 20, 'Garko', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(384, 20, 'Garun Mallam', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(385, 20, 'Gaya', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(386, 20, 'Gezawa', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(387, 20, 'Gwale', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(388, 20, 'Gwarzo', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(389, 20, 'Kabo', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(390, 20, 'Kano Municipal', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(391, 20, 'Karaye', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(392, 20, 'Kibiya', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(393, 20, 'Kiru', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(394, 20, 'Kumbotso', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(395, 20, 'Kunchi', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(396, 20, 'Kura', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(397, 20, 'Madobi', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(398, 20, 'Makoda', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(399, 20, 'Minjibir', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(400, 20, 'Nasarawa', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(401, 20, 'Rano', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(402, 20, 'Rimin Gado', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(403, 20, 'Rogo', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(404, 20, 'Shanono', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(405, 20, 'Sumaila', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(406, 20, 'Takai', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(407, 20, 'Tarauni', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(408, 20, 'Tofa', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(409, 20, 'Tsanyawa', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(410, 20, 'Tudun Wada', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(411, 20, 'Ungogo', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(412, 20, 'Warawa', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(413, 20, 'Wudil', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(414, 21, 'Bakori', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(415, 21, 'Batagarawa', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(416, 21, 'Batsari', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(417, 21, 'Baure', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(418, 21, 'Bindawa', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(419, 21, 'Charanchi', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(420, 21, 'Dandume', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(421, 21, 'Danja', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(422, 21, 'Dan Musa', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(423, 21, 'Daura', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(424, 21, 'Dutsi', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(425, 21, 'Dutsin Ma', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(426, 21, 'Faskari', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(427, 21, 'Funtua', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(428, 21, 'Ingawa', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(429, 21, 'Jibia', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(430, 21, 'Kafur', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(431, 21, 'Kaita', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(432, 21, 'Kankara', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(433, 21, 'Kankia', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(434, 21, 'Katsina', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(435, 21, 'Kurfi', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(436, 21, 'Kusada', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(437, 21, 'Mai\'Adua', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(438, 21, 'Malumfashi', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(439, 21, 'Mani', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(440, 21, 'Mashi', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(441, 21, 'Matazu', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(442, 21, 'Musawa', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(443, 21, 'Rimi', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(444, 21, 'Sabuwa', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(445, 21, 'Safana', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(446, 21, 'Sandamu', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(447, 21, 'Zango', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(448, 22, 'Aleiro', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(449, 22, 'Arewa Dandi', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(450, 22, 'Argungu', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(451, 22, 'Augie', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(452, 22, 'Bagudo', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(453, 22, 'Birnin Kebbi', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(454, 22, 'Bunza', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(455, 22, 'Dandi', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(456, 22, 'Fakai', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(457, 22, 'Gwandu', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(458, 22, 'Jega', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(459, 22, 'Kalgo', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(460, 22, 'Koko/Besse', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(461, 22, 'Maiyama', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(462, 22, 'Ngaski', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(463, 22, 'Sakaba', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(464, 22, 'Shanga', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(465, 22, 'Suru', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(466, 22, 'Wasagu/Danko', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(467, 22, 'Yauri', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(468, 22, 'Zuru', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(469, 23, 'Adavi', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(470, 23, 'Ajaokuta', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(471, 23, 'Ankpa', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(472, 23, 'Bassa', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(473, 23, 'Dekina', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(474, 23, 'Ibaji', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(475, 23, 'Idah', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(476, 23, 'Igalamela Odolu', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(477, 23, 'Ijumu', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(478, 23, 'Kabba/Bunu', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(479, 23, 'Kogi', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(480, 23, 'Lokoja', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(481, 23, 'Mopa Muro', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(482, 23, 'Ofu', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(483, 23, 'Ogori/Magongo', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(484, 23, 'Okehi', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(485, 23, 'Okene', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(486, 23, 'Olamaboro', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(487, 23, 'Omala', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(488, 23, 'Yagba East', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(489, 23, 'Yagba West', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(490, 24, 'Asa', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(491, 24, 'Baruten', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(492, 24, 'Edu', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(493, 24, 'Ekiti, Kwara State', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(494, 24, 'Ifelodun', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(495, 24, 'Ilorin East', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(496, 24, 'Ilorin South', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(497, 24, 'Ilorin West', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(498, 24, 'Irepodun', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(499, 24, 'Isin', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(500, 24, 'Kaiama', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(501, 24, 'Moro', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(502, 24, 'Offa', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(503, 24, 'Oke Ero', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(504, 24, 'Oyun', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(505, 24, 'Pategi', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(506, 25, 'Agege', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(507, 25, 'Ajeromi-Ifelodun', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(508, 25, 'Alimosho', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(509, 25, 'Amuwo-Odofin', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(510, 25, 'Apapa', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(511, 25, 'Badagry', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(512, 25, 'Epe', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(513, 25, 'Eti Osa', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(514, 25, 'Ibeju-Lekki', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(515, 25, 'Ifako-Ijaiye', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(516, 25, 'Ikeja', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(517, 25, 'Ikorodu', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(518, 25, 'Kosofe', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(519, 25, 'Lagos Island', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(520, 25, 'Lagos Mainland', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(521, 25, 'Mushin', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(522, 25, 'Ojo', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(523, 25, 'Oshodi-Isolo', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(524, 25, 'Shomolu', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(525, 25, 'Surulere, Lagos State', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(526, 26, 'Akwanga', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(527, 26, 'Awe', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(528, 26, 'Doma', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(529, 26, 'Karu', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(530, 26, 'Keana', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(531, 26, 'Keffi', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(532, 26, 'Kokona', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(533, 26, 'Lafia', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(534, 26, 'Nasarawa', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(535, 26, 'Nasarawa Egon', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(536, 26, 'Obi', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(537, 26, 'Toto', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(538, 26, 'Wamba', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(539, 27, 'Agaie', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(540, 27, 'Agwara', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(541, 27, 'Bida', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(542, 27, 'Borgu', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(543, 27, 'Bosso', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(544, 27, 'Chanchaga', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(545, 27, 'Edati', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(546, 27, 'Gbako', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(547, 27, 'Gurara', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(548, 27, 'Katcha', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(549, 27, 'Kontagora', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(550, 27, 'Lapai', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(551, 27, 'Lavun', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(552, 27, 'Magama', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(553, 27, 'Mariga', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(554, 27, 'Mashegu', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(555, 27, 'Mokwa', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(556, 27, 'Moya', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(557, 27, 'Paikoro', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(558, 27, 'Rafi', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(559, 27, 'Rijau', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(560, 27, 'Shiroro', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(561, 27, 'Suleja', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(562, 27, 'Tafa', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(563, 27, 'Wushishi', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(564, 28, 'Abeokuta North', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(565, 28, 'Abeokuta South', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(566, 28, 'Ado-Odo/Ota', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(567, 28, 'Egbado North', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(568, 28, 'Egbado South', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(569, 28, 'Ewekoro', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(570, 28, 'Ifo', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(571, 28, 'Ijebu East', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(572, 28, 'Ijebu North', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(573, 28, 'Ijebu North East', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(574, 28, 'Ijebu Ode', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(575, 28, 'Ikenne', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(576, 28, 'Imeko Afon', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(577, 28, 'Ipokia', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(578, 28, 'Obafemi Owode', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(579, 28, 'Odeda', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(580, 28, 'Odogbolu', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(581, 28, 'Ogun Waterside', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(582, 28, 'Remo North', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(583, 28, 'Shagamu', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(584, 29, 'Akoko North-East', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(585, 29, 'Akoko North-West', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(586, 29, 'Akoko South-West', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(587, 29, 'Akoko South-East', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(588, 29, 'Akure North', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(589, 29, 'Akure South', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(590, 29, 'Ese Odo', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(591, 29, 'Idanre', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(592, 29, 'Ifedore', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(593, 29, 'Ilaje', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(594, 29, 'Ile Oluji/Okeigbo', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(595, 29, 'Irele', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(596, 29, 'Odigbo', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(597, 29, 'Okitipupa', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(598, 29, 'Ondo East', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(599, 29, 'Ondo West', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(600, 29, 'Ose', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(601, 29, 'Owo', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(602, 30, 'Atakunmosa East', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(603, 30, 'Atakunmosa West', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(604, 30, 'Aiyedaade', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(605, 30, 'Aiyedire', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(606, 30, 'Boluwaduro', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(607, 30, 'Boripe', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(608, 30, 'Ede North', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(609, 30, 'Ede South', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(610, 30, 'Ife Central', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(611, 30, 'Ife East', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(612, 30, 'Ife North', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(613, 30, 'Ife South', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(614, 30, 'Egbedore', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(615, 30, 'Ejigbo', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(616, 30, 'Ifedayo', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(617, 30, 'Ifelodun', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(618, 30, 'Ila', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(619, 30, 'Ilesa East', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(620, 30, 'Ilesa West', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(621, 30, 'Irepodun', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(622, 30, 'Irewole', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(623, 30, 'Isokan', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(624, 30, 'Iwo', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(625, 30, 'Obokun', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(626, 30, 'Odo Otin', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(627, 30, 'Ola Oluwa', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(628, 30, 'Olorunda', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(629, 30, 'Oriade', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(630, 30, 'Orolu', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(631, 30, 'Osogbo', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(632, 31, 'Afijio', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(633, 31, 'Akinyele', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(634, 31, 'Atiba', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(635, 31, 'Atisbo', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(636, 31, 'Egbeda', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(637, 31, 'Ibadan North', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(638, 31, 'Ibadan North-East', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(639, 31, 'Ibadan North-West', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(640, 31, 'Ibadan South-East', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(641, 31, 'Ibadan South-West', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(642, 31, 'Ibarapa Central', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(643, 31, 'Ibarapa East', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(644, 31, 'Ibarapa North', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(645, 31, 'Ido', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(646, 31, 'Irepo', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(647, 31, 'Iseyin', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(648, 31, 'Itesiwaju', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(649, 31, 'Iwajowa', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(650, 31, 'Kajola', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(651, 31, 'Lagelu', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(652, 31, 'Ogbomosho North', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(653, 31, 'Ogbomosho South', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(654, 31, 'Ogo Oluwa', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(655, 31, 'Olorunsogo', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(656, 31, 'Oluyole', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(657, 31, 'Ona Ara', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(658, 31, 'Orelope', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(659, 31, 'Ori Ire', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(660, 31, 'Oyo', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(661, 31, 'Oyo East', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(662, 31, 'Saki East', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(663, 31, 'Saki West', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(664, 31, 'Surulere, Oyo State', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(665, 32, 'Bokkos', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(666, 32, 'Barkin Ladi', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(667, 32, 'Bassa', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(668, 32, 'Jos East', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(669, 32, 'Jos North', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(670, 32, 'Jos South', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(671, 32, 'Kanam', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(672, 32, 'Kanke', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(673, 32, 'Langtang South', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(674, 32, 'Langtang North', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(675, 32, 'Mangu', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(676, 32, 'Mikang', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(677, 32, 'Pankshin', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(678, 32, 'Qua\'an Pan', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(679, 32, 'Riyom', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(680, 32, 'Shendam', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(681, 32, 'Wase', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(682, 33, 'Abua/Odual', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(683, 33, 'Ahoada East', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(684, 33, 'Ahoada West', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(685, 33, 'Akuku-Toru', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(686, 33, 'Andoni', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(687, 33, 'Asari-Toru', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(688, 33, 'Bonny', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(689, 33, 'Degema', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(690, 33, 'Eleme', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(691, 33, 'Emuoha', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(692, 33, 'Etche', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(693, 33, 'Gokana', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(694, 33, 'Ikwerre', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(695, 33, 'Khana', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(696, 33, 'Obio/Akpor', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(697, 33, 'Ogba/Egbema/Ndoni', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(698, 33, 'Ogu/Bolo', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(699, 33, 'Okrika', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(700, 33, 'Omuma', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(701, 33, 'Opobo/Nkoro', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(702, 33, 'Oyigbo', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(703, 33, 'Port Harcourt', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(704, 33, 'Tai', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(705, 34, 'Binji', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(706, 34, 'Bodinga', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(707, 34, 'Dange Shuni', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(708, 34, 'Gada', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(709, 34, 'Goronyo', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(710, 34, 'Gudu', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(711, 34, 'Gwadabawa', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(712, 34, 'Illela', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(713, 34, 'Isa', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(714, 34, 'Kebbe', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(715, 34, 'Kware', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(716, 34, 'Rabah', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(717, 34, 'Sabon Birni', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(718, 34, 'Shagari', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(719, 34, 'Silame', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(720, 34, 'Sokoto North', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(721, 34, 'Sokoto South', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(722, 34, 'Tambuwal', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(723, 34, 'Tangaza', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(724, 34, 'Tureta', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(725, 34, 'Wamako', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(726, 34, 'Wurno', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(727, 34, 'Yabo', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(728, 35, 'Ardo Kola', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(729, 35, 'Bali', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(730, 35, 'Donga', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(731, 35, 'Gashaka', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(732, 35, 'Gassol', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(733, 35, 'Ibi', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(734, 35, 'Jalingo', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(735, 35, 'Karim Lamido', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(736, 35, 'Kumi', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(737, 35, 'Lau', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(738, 35, 'Sardauna', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(739, 35, 'Takum', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(740, 35, 'Ussa', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(741, 35, 'Wukari', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(742, 35, 'Yorro', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(743, 35, 'Zing', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(744, 36, 'Bade', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(745, 36, 'Bursari', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(746, 36, 'Damaturu', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(747, 36, 'Fika', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(748, 36, 'Fune', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(749, 36, 'Geidam', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(750, 36, 'Gujba', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(751, 36, 'Gulani', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(752, 36, 'Jakusko', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(753, 36, 'Karasuwa', '2021-02-26 16:56:34', '2021-02-26 16:56:34');
INSERT INTO `lgas` (`id`, `state_id`, `name`, `created_at`, `updated_at`) VALUES
(754, 36, 'Machina', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(755, 36, 'Nangere', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(756, 36, 'Nguru', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(757, 36, 'Potiskum', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(758, 36, 'Tarmuwa', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(759, 36, 'Yunusari', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(760, 36, 'Yusufari', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(761, 37, 'Anka', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(762, 37, 'Bakura', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(763, 37, 'Birnin Magaji/Kiyaw', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(764, 37, 'Bukkuyum', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(765, 37, 'Bungudu', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(766, 37, 'Gummi', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(767, 37, 'Gusau', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(768, 37, 'Kaura Namoda', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(769, 37, 'Maradun', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(770, 37, 'Maru', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(771, 37, 'Shinkafi', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(772, 37, 'Talata Mafara', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(773, 37, 'Chafe', '2021-02-26 16:56:34', '2021-02-26 16:56:34'),
(774, 37, 'Zurmi', '2021-02-26 16:56:34', '2021-02-26 16:56:34');

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `subject_id` int(10) UNSIGNED NOT NULL,
  `my_class_id` int(10) UNSIGNED NOT NULL,
  `section_id` int(10) UNSIGNED NOT NULL,
  `exam_id` int(10) UNSIGNED NOT NULL,
  `t1` int(11) DEFAULT NULL,
  `t2` int(11) DEFAULT NULL,
  `t3` int(11) DEFAULT NULL,
  `t4` int(11) DEFAULT NULL,
  `tca` int(11) DEFAULT NULL,
  `exm` int(11) DEFAULT NULL,
  `tex1` int(11) DEFAULT NULL,
  `tex2` int(11) DEFAULT NULL,
  `tex3` int(11) DEFAULT NULL,
  `sub_pos` tinyint(4) DEFAULT NULL,
  `cum` int(11) DEFAULT NULL,
  `cum_ave` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grade_id` int(10) UNSIGNED DEFAULT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2013_09_20_121733_create_blood_groups_table', 1),
(2, '2013_09_22_124750_create_states_table', 1),
(3, '2013_09_22_124806_create_lgas_table', 1),
(4, '2013_09_26_121148_create_nationalities_table', 1),
(5, '2014_10_12_000000_create_users_table', 1),
(6, '2014_10_12_100000_create_password_resets_table', 1),
(7, '2018_09_20_100249_create_user_types_table', 1),
(8, '2018_09_20_150906_create_class_types_table', 1),
(9, '2018_09_22_073005_create_my_classes_table', 1),
(10, '2018_09_22_073526_create_sections_table', 1),
(11, '2018_09_22_080555_create_settings_table', 1),
(12, '2018_09_22_081302_create_subjects_table', 1),
(13, '2018_09_22_151514_create_student_records_table', 1),
(14, '2018_09_26_124241_create_dorms_table', 1),
(15, '2018_10_04_224910_create_exams_table', 1),
(16, '2018_10_06_224846_create_marks_table', 1),
(17, '2018_10_06_224944_create_grades_table', 1),
(18, '2018_10_06_225007_create_pins_table', 1),
(19, '2018_10_18_205550_create_skills_table', 1),
(20, '2018_10_18_205842_create_exam_records_table', 1),
(21, '2018_10_31_191358_create_books_table', 1),
(22, '2018_10_31_192540_create_book_requests_table', 1),
(23, '2018_11_01_132115_create_staff_records_table', 1),
(24, '2018_11_03_210758_create_payments_table', 1),
(25, '2018_11_03_210817_create_payment_records_table', 1),
(26, '2018_11_06_083707_create_receipts_table', 1),
(27, '2018_11_27_180401_create_time_tables_table', 1),
(28, '2019_09_22_142514_create_fks', 1),
(29, '2019_09_26_132227_create_promotions_table', 1),
(30, '2021_02_19_083507_create_teachers_table', 1),
(31, '2021_02_22_110541_create_courses_table', 1),
(32, '2021_02_24_084812_create_policies_table', 1),
(33, '2021_02_24_124825_create_front_courses_table', 1),
(34, '2021_02_24_124848_create_front_pricings_table', 1),
(35, '2021_02_24_124913_create_front_testimonials_table', 1),
(36, '2021_02_24_124937_create_front_blogs_table', 1),
(37, '2021_02_24_124958_create_front_faqs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `my_classes`
--

CREATE TABLE `my_classes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class_type_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `my_classes`
--

INSERT INTO `my_classes` (`id`, `name`, `class_type_id`, `created_at`, `updated_at`) VALUES
(19, 'Elemntary Maths', 4, '2021-06-15 15:57:31', '2021-06-15 16:22:31'),
(20, 'Language Courses', 4, '2021-06-18 14:18:16', '2021-06-18 14:18:16'),
(21, 'ICT Courses', 5, '2021-06-18 14:34:49', '2021-06-18 14:34:49');

-- --------------------------------------------------------

--
-- Table structure for table `nationalities`
--

CREATE TABLE `nationalities` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nationalities`
--

INSERT INTO `nationalities` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Afghan', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(2, 'Albanian', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(3, 'Algerian', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(4, 'American', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(5, 'Andorran', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(6, 'Angolan', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(7, 'Antiguans', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(8, 'Argentinean', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(9, 'Armenian', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(10, 'Australian', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(11, 'Austrian', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(12, 'Azerbaijani', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(13, 'Bahamian', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(14, 'Bahraini', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(15, 'Bangladeshi', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(16, 'Barbadian', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(17, 'Barbudans', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(18, 'Batswana', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(19, 'Belarusian', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(20, 'Belgian', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(21, 'Belizean', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(22, 'Beninese', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(23, 'Bhutanese', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(24, 'Bolivian', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(25, 'Bosnian', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(26, 'Brazilian', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(27, 'British', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(28, 'Bruneian', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(29, 'Bulgarian', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(30, 'Burkinabe', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(31, 'Burmese', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(32, 'Burundian', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(33, 'Cambodian', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(34, 'Cameroonian', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(35, 'Canadian', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(36, 'Cape Verdean', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(37, 'Central African', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(38, 'Chadian', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(39, 'Chilean', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(40, 'Chinese', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(41, 'Colombian', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(42, 'Comoran', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(43, 'Congolese', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(44, 'Costa Rican', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(45, 'Croatian', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(46, 'Cuban', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(47, 'Cypriot', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(48, 'Czech', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(49, 'Danish', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(50, 'Djibouti', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(51, 'Dominican', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(52, 'Dutch', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(53, 'East Timorese', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(54, 'Ecuadorean', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(55, 'Egyptian', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(56, 'Emirian', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(57, 'Equatorial Guinean', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(58, 'Eritrean', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(59, 'Estonian', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(60, 'Ethiopian', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(61, 'Fijian', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(62, 'Filipino', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(63, 'Finnish', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(64, 'French', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(65, 'Gabonese', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(66, 'Gambian', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(67, 'Georgian', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(68, 'German', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(69, 'Ghanaian', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(70, 'Greek', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(71, 'Grenadian', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(72, 'Guatemalan', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(73, 'Guinea-Bissauan', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(74, 'Guinean', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(75, 'Guyanese', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(76, 'Haitian', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(77, 'Herzegovinian', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(78, 'Honduran', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(79, 'Hungarian', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(80, 'I-Kiribati', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(81, 'Icelander', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(82, 'Indian', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(83, 'Indonesian', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(84, 'Iranian', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(85, 'Iraqi', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(86, 'Irish', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(87, 'Israeli', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(88, 'Italian', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(89, 'Ivorian', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(90, 'Jamaican', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(91, 'Japanese', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(92, 'Jordanian', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(93, 'Kazakhstani', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(94, 'Kenyan', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(95, 'Kittian and Nevisian', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(96, 'Kuwaiti', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(97, 'Kyrgyz', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(98, 'Laotian', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(99, 'Latvian', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(100, 'Lebanese', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(101, 'Liberian', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(102, 'Libyan', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(103, 'Liechtensteiner', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(104, 'Lithuanian', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(105, 'Luxembourger', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(106, 'Macedonian', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(107, 'Malagasy', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(108, 'Malawian', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(109, 'Malaysian', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(110, 'Maldivan', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(111, 'Malian', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(112, 'Maltese', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(113, 'Marshallese', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(114, 'Mauritanian', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(115, 'Mauritian', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(116, 'Mexican', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(117, 'Micronesian', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(118, 'Moldovan', '2021-02-26 16:56:32', '2021-02-26 16:56:32'),
(119, 'Monacan', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(120, 'Mongolian', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(121, 'Moroccan', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(122, 'Mosotho', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(123, 'Motswana', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(124, 'Mozambican', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(125, 'Namibian', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(126, 'Nauruan', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(127, 'Nepalese', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(128, 'New Zealander', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(129, 'Nicaraguan', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(130, 'Nigerian', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(131, 'Nigerien', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(132, 'North Korean', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(133, 'Northern Irish', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(134, 'Norwegian', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(135, 'Omani', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(136, 'Pakistani', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(137, 'Palauan', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(138, 'Panamanian', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(139, 'Papua New Guinean', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(140, 'Paraguayan', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(141, 'Peruvian', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(142, 'Polish', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(143, 'Portuguese', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(144, 'Qatari', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(145, 'Romanian', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(146, 'Russian', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(147, 'Rwandan', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(148, 'Saint Lucian', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(149, 'Salvadoran', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(150, 'Samoan', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(151, 'San Marinese', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(152, 'Sao Tomean', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(153, 'Saudi', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(154, 'Scottish', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(155, 'Senegalese', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(156, 'Serbian', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(157, 'Seychellois', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(158, 'Sierra Leonean', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(159, 'Singaporean', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(160, 'Slovakian', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(161, 'Slovenian', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(162, 'Solomon Islander', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(163, 'Somali', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(164, 'South African', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(165, 'South Korean', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(166, 'Spanish', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(167, 'Sri Lankan', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(168, 'Sudanese', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(169, 'Surinamer', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(170, 'Swazi', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(171, 'Swedish', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(172, 'Swiss', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(173, 'Syrian', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(174, 'Taiwanese', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(175, 'Tajik', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(176, 'Tanzanian', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(177, 'Thai', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(178, 'Togolese', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(179, 'Tongan', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(180, 'Trinidadian/Tobagonian', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(181, 'Tunisian', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(182, 'Turkish', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(183, 'Tuvaluan', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(184, 'Ugandan', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(185, 'Ukrainian', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(186, 'Uruguayan', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(187, 'Uzbekistani', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(188, 'Venezuelan', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(189, 'Vietnamese', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(190, 'Welsh', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(191, 'Yemenite', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(192, 'Zambian', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(193, 'Zimbabwean', '2021-02-26 16:56:33', '2021-02-26 16:56:33');

-- --------------------------------------------------------

--
-- Table structure for table `offered_courses`
--

CREATE TABLE `offered_courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `teacher_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `online_papers`
--

CREATE TABLE `online_papers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `paper_id` int(11) DEFAULT NULL,
  `question` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `choice1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `choice2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `choice3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `choice4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `online_papers`
--

INSERT INTO `online_papers` (`id`, `paper_id`, `question`, `choice1`, `choice2`, `choice3`, `choice4`, `answer`, `created_at`, `updated_at`) VALUES
(9, 7, 'What is Angular?', 'Angular is frontend script language.', 'Angular is backend language.', 'No any Language', 'Non of above', '1', '2021-05-26 07:56:38', '2021-05-26 07:56:38'),
(10, 8, 'Compiler translates the source code to', 'Executable code', 'Machine code', 'Binary code', 'Both B and C', '4', '2021-05-27 17:32:05', '2021-05-27 17:32:05'),
(11, 8, 'Which of the following groups is/are token together into semantic structures?', 'Syntax analyzer', 'Intermediate code generation', 'Lexical analyzer', 'Semantic analyzer', '3', '2021-05-27 17:32:40', '2021-05-27 17:32:40');

-- --------------------------------------------------------

--
-- Table structure for table `papers`
--

CREATE TABLE `papers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `teacher_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unique_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  `topic` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `papers`
--

INSERT INTO `papers` (`id`, `course_id`, `class_id`, `teacher_id`, `unique_id`, `time`, `topic`, `description`, `created_at`, `updated_at`) VALUES
(7, '24', '4', '9', 'P3I6g3x3c9', '2021-05-26 17:54:00', 'Primery 1', 'Hello Here is your paper', NULL, NULL),
(8, '25', '14', '10', 'c1q8b2C5W3', '2021-05-28 18:30:00', 'Matric Cource Test Paper', 'Matric Cource Test PaperMatric Cource Test PaperMatric Cource Test PaperMatric Cource Test Paper', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paymentrecord`
--

CREATE TABLE `paymentrecord` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expensiveType` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paymentMethod` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `ref_no` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `method` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'cash',
  `my_class_id` int(10) UNSIGNED DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_records`
--

CREATE TABLE `payment_records` (
  `id` int(10) UNSIGNED NOT NULL,
  `payment_id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `ref_no` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amt_paid` int(11) DEFAULT NULL,
  `balance` int(11) DEFAULT NULL,
  `paid` tinyint(4) NOT NULL DEFAULT 0,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_supports`
--

CREATE TABLE `payment_supports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pins`
--

CREATE TABLE `pins` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `used` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `times_used` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `student_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `policies`
--

CREATE TABLE `policies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `policies`
--

INSERT INTO `policies` (`id`, `role_type`, `policy`, `created_at`, `updated_at`) VALUES
(5, 'teacher', 'Updates Check All Student ProfileUpdates Check All Student ProfileUpdates Check All Student ProfileUpdates Check All Student ProfileUpdates Check All Student ProfileUpdates Check All Student ProfileUpdates Check All Student Profile', '2021-05-27 17:20:06', '2021-05-27 17:20:06'),
(6, 'student', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2021-06-04 06:10:02', '2021-06-04 08:19:07');

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE `promotions` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `from_class` int(10) UNSIGNED NOT NULL,
  `from_section` int(10) UNSIGNED NOT NULL,
  `to_class` int(10) UNSIGNED NOT NULL,
  `to_section` int(10) UNSIGNED NOT NULL,
  `grad` tinyint(4) NOT NULL,
  `from_session` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `to_session` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `receipts`
--

CREATE TABLE `receipts` (
  `id` int(10) UNSIGNED NOT NULL,
  `pr_id` int(10) UNSIGNED NOT NULL,
  `amt_paid` int(11) NOT NULL,
  `balance` int(11) NOT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reportings`
--

CREATE TABLE `reportings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `my_class_id` int(10) UNSIGNED NOT NULL,
  `teacher_id` int(10) UNSIGNED DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `name`, `my_class_id`, `teacher_id`, `active`, `created_at`, `updated_at`) VALUES
(25, 'A', 19, NULL, 1, '2021-06-15 15:57:31', '2021-06-15 15:57:31'),
(26, 'A', 20, NULL, 1, '2021-06-18 14:18:16', '2021-06-18 14:18:16'),
(27, 'A', 21, NULL, 1, '2021-06-18 14:34:49', '2021-06-18 14:34:49');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `type`, `description`, `created_at`, `updated_at`) VALUES
(1, 'current_session', '2018-2019', NULL, NULL),
(2, 'system_title', 'LMS', NULL, NULL),
(3, 'system_name', 'SIHAM LMS', NULL, NULL),
(4, 'term_ends', '7/10/2021', NULL, NULL),
(5, 'term_begins', '7/10/2021', NULL, NULL),
(6, 'phone', '+251938109045\r\n+251911152254', NULL, NULL),
(7, 'address', 'Addis Ababa, Ethiopia Jemo Michael-Mina Mall', NULL, NULL),
(8, 'system_email', 'info@spaceelearn.com', NULL, NULL),
(9, 'alt_email', '', NULL, NULL),
(10, 'email_host', '', NULL, NULL),
(11, 'email_pass', '', NULL, NULL),
(12, 'lock_exam', '0', NULL, NULL),
(13, 'logo', '', NULL, NULL),
(14, 'next_term_fees_j', '20000', NULL, NULL),
(15, 'next_term_fees_pn', '25000', NULL, NULL),
(16, 'next_term_fees_p', '25000', NULL, NULL),
(17, 'next_term_fees_n', '25600', NULL, NULL),
(18, 'next_term_fees_s', '15600', NULL, NULL),
(19, 'next_term_fees_c', '1600', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `skill_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff_records`
--

CREATE TABLE `staff_records` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emp_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Abia', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(2, 'Adamawa', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(3, 'Akwa Ibom', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(4, 'Anambra', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(5, 'Bauchi', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(6, 'Bayelsa', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(7, 'Benue', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(8, 'Borno', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(9, 'Cross River', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(10, 'Delta', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(11, 'Ebonyi', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(12, 'Edo', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(13, 'Ekiti', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(14, 'Enugu', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(15, 'FCT', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(16, 'Gombe', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(17, 'Imo', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(18, 'Jigawa', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(19, 'Kaduna', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(20, 'Kano', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(21, 'Katsina', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(22, 'Kebbi', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(23, 'Kogi', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(24, 'Kwara', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(25, 'Lagos', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(26, 'Nasarawa', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(27, 'Niger', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(28, 'Ogun', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(29, 'Ondo', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(30, 'Osun', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(31, 'Oyo', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(32, 'Plateau', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(33, 'Rivers', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(34, 'Sokoto', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(35, 'Taraba', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(36, 'Yobe', '2021-02-26 16:56:33', '2021-02-26 16:56:33'),
(37, 'Zamfara', '2021-02-26 16:56:33', '2021-02-26 16:56:33');

-- --------------------------------------------------------

--
-- Table structure for table `std_online_papers`
--

CREATE TABLE `std_online_papers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `std_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paper_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `std_online_papers`
--

INSERT INTO `std_online_papers` (`id`, `std_id`, `question_id`, `answer`, `paper_id`, `created_at`, `updated_at`) VALUES
(35, '81', '9', '1', '7', NULL, NULL),
(36, '81', '10', '1', '8', NULL, NULL),
(37, '81', '11', '3', '8', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `students_instructions`
--

CREATE TABLE `students_instructions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students_instructions`
--

INSERT INTO `students_instructions` (`id`, `title`, `details`, `status`, `created_at`, `updated_at`) VALUES
(9, 'New Instructions', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras euismod diam lectus, non tempus velit venenatis id. In luctus placerat iaculis. Nulla nec ligula eget neque elementum blandit. Curabitur congue, erat at porta consectetur, orci nibh dapibus metus, id feugiat lacus nisi a eros. Praesent ex odio, fermentum a porttitor quis, rutrum a elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In at pulvinar ex, non convallis arcu.', 'active', '2021-06-04 06:15:18', '2021-06-07 16:08:45'),
(10, 'InstructionsNew', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras euismod diam lectus, non tempus velit venenatis id. In luctus placerat iaculis. Nulla nec ligula eget neque elementum blandit. Curabitur congue, erat at porta consectetur, orci nibh dapibus metus, id feugiat lacus nisi a eros. Praesent ex odio, fermentum a porttitor quis, rutrum a elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In at pulvinar ex, non convallis arcu.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras euismod diam lectus, non tempus velit venenatis id. In luctus placerat iaculis. Nulla nec ligula eget neque elementum blandit. Curabitur congue, erat at porta consectetur, orci nibh dapibus metus, id feugiat lacus nisi a eros. Praesent ex odio, fermentum a porttitor quis, rutrum a elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In at pulvinar ex, non convallis arcu.', 'active', '2021-06-04 06:21:42', '2021-06-07 16:08:54');

-- --------------------------------------------------------

--
-- Table structure for table `students_notifications`
--

CREATE TABLE `students_notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students_notifications`
--

INSERT INTO `students_notifications` (`id`, `title`, `details`, `status`, `created_at`, `updated_at`) VALUES
(5, 'Hello Matric Students', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras euismod diam lectus, non tempus velit venenatis id. In luctus placerat iaculis. Nulla nec ligula eget neque elementum blandit. Curabitur congue, erat at porta consectetur, orci nibh dapibus metus, id feugiat lacus nisi a eros. Praesent ex odio, fermentum a porttitor quis, rutrum a elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In at pulvinar ex, non convallis arcu.', 'active', '2021-05-27 17:34:48', '2021-06-07 16:09:16'),
(7, 'asdasdds', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras euismod diam lectus, non tempus velit venenatis id. In luctus placerat iaculis. Nulla nec ligula eget neque elementum blandit. Curabitur congue, erat at porta consectetur, orci nibh dapibus metus, id feugiat lacus nisi a eros. Praesent ex odio, fermentum a porttitor quis, rutrum a elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In at pulvinar ex, non convallis arcu.', 'active', '2021-06-04 06:11:06', '2021-06-07 16:09:48');

-- --------------------------------------------------------

--
-- Table structure for table `students_updates`
--

CREATE TABLE `students_updates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students_updates`
--

INSERT INTO `students_updates` (`id`, `title`, `details`, `status`, `created_at`, `updated_at`) VALUES
(13, 'New Updates', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'active', '2021-06-04 06:23:24', '2021-06-04 06:25:59'),
(14, 'New Updates', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'active', '2021-06-04 06:23:33', '2021-06-04 06:26:09'),
(15, 'Monthly subscription', '30% off', 'active', '2021-06-06 16:19:50', '2021-06-06 16:19:50');

-- --------------------------------------------------------

--
-- Table structure for table `student_assignments`
--

CREATE TABLE `student_assignments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `term` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `topic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assignment_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_assignments`
--

INSERT INTO `student_assignments` (`id`, `term`, `course_id`, `class_id`, `file`, `topic`, `status`, `description`, `created_at`, `updated_at`, `user_id`, `assignment_id`) VALUES
(3, NULL, NULL, NULL, 'uploads/students/assignments/complaint.jpg', NULL, NULL, NULL, '2021-05-27 11:22:59', '2021-05-27 11:22:59', '81', '13');

-- --------------------------------------------------------

--
-- Table structure for table `student_courses`
--

CREATE TABLE `student_courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_evaluations`
--

CREATE TABLE `student_evaluations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_evaluations`
--

INSERT INTO `student_evaluations` (`id`, `question`, `status`, `created_at`, `updated_at`) VALUES
(6, 'How is your Teacher?', 'active', '2021-05-27 17:19:16', '2021-05-27 17:53:46'),
(7, 'How is your School?', 'active', '2021-05-27 17:54:05', '2021-05-27 17:54:05'),
(8, 'Another Answer', 'active', '2021-05-27 10:05:06', '2021-05-27 10:05:06'),
(9, 'ASAs', 'active', '2021-05-27 10:17:41', '2021-05-27 10:17:41'),
(10, 'waeqweqwe', 'active', '2021-06-02 11:55:01', '2021-06-02 11:55:01'),
(11, 'How is your Teacher?', 'active', '2021-06-04 06:32:36', '2021-06-04 06:32:36'),
(12, 'How is your Teacher?', 'active', '2021-06-04 06:32:41', '2021-06-04 06:32:41'),
(13, 'How is your Teacher?', 'active', '2021-06-04 06:32:46', '2021-06-04 06:32:46'),
(14, 'dasdasdasdasd', 'active', '2021-06-04 06:55:33', '2021-06-04 06:55:33');

-- --------------------------------------------------------

--
-- Table structure for table `student_records`
--

CREATE TABLE `student_records` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `my_class_id` int(10) UNSIGNED NOT NULL,
  `section_id` int(10) UNSIGNED NOT NULL,
  `adm_no` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `my_parent_id` int(10) UNSIGNED DEFAULT NULL,
  `dorm_id` int(10) UNSIGNED DEFAULT NULL,
  `dorm_room_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `session` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `house` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` tinyint(4) DEFAULT NULL,
  `year_admitted` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grad` tinyint(4) NOT NULL DEFAULT 0,
  `grad_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_records`
--

INSERT INTO `student_records` (`id`, `user_id`, `my_class_id`, `section_id`, `adm_no`, `my_parent_id`, `dorm_id`, `dorm_room_no`, `session`, `house`, `age`, `year_admitted`, `grad`, `grad_date`, `created_at`, `updated_at`) VALUES
(48, 99, 19, 25, 'QS/P/2021/4580', NULL, NULL, NULL, '2018-2019', NULL, 13, '2021', 0, NULL, '2021-06-26 08:16:29', '2021-06-26 08:16:29');

-- --------------------------------------------------------

--
-- Table structure for table `student_surveys`
--

CREATE TABLE `student_surveys` (
  `id` int(10) NOT NULL,
  `std_id` tinyint(4) DEFAULT NULL,
  `question_id` varchar(255) DEFAULT NULL,
  `answer` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_surveys`
--

INSERT INTO `student_surveys` (`id`, `std_id`, `question_id`, `answer`) VALUES
(41, 81, '6', 'Average'),
(42, 81, '7', 'Average'),
(43, 81, '8', 'Good'),
(44, 81, '9', 'Excellent'),
(45, 72, '6', 'Excellent'),
(46, 72, '7', 'Good'),
(47, 72, '8', 'Good'),
(48, 72, '9', 'Excellent'),
(49, 18, '6', 'Excellent'),
(50, 18, '7', 'Good'),
(51, 18, '8', 'Average'),
(52, 18, '9', 'Good'),
(53, 18, '10', 'Good'),
(54, 18, '11', 'Average'),
(55, 18, '12', 'Good'),
(56, 18, '13', 'Excellent'),
(57, 18, '14', 'Average');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `my_class_id` int(10) UNSIGNED NOT NULL,
  `teacher_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `course_id` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `slug`, `my_class_id`, `teacher_id`, `created_at`, `updated_at`, `course_id`) VALUES
(28, 'Academic Courses', 'Ac', 19, 82, '2021-06-15 16:24:36', '2021-06-15 16:24:36', 31),
(29, 'Language Course', 'Lang', 20, 82, '2021-06-18 14:25:17', '2021-06-24 08:14:32', 32),
(30, 'IT Courses & Trainings', 'Ict', 21, 82, '2021-06-18 14:39:38', '2021-06-18 14:39:38', 33);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nationality` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lga` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` bigint(20) DEFAULT NULL,
  `joining_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `speciality` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `user_id`, `name`, `address`, `email`, `gender`, `nationality`, `state`, `lga`, `image`, `age`, `joining_date`, `speciality`, `created_at`, `updated_at`) VALUES
(7, 73, 'NewTeacher', 'NewTeacher', 'NewTeacher@gmail.com', 'Male', NULL, NULL, NULL, NULL, 12, '2012', 'English', '2021-05-17 07:57:41', '2021-05-17 07:57:41'),
(8, 76, 'Wyatt Glenn', 'Sed est anim autem d', 'dyrywef@mailinator.com', 'Male', NULL, NULL, NULL, NULL, 12, '2015', 'English', '2021-05-17 10:24:02', '2021-05-17 10:24:02'),
(9, 78, 'TeacherNew1', 'TeacherNew1', 'TeacherNew1@gmail.com', 'Male', NULL, NULL, NULL, NULL, 27, '2011', 'Spring Boot', '2021-05-26 07:33:10', '2021-05-26 07:33:10'),
(10, 80, 'MaxwelTeacher', 'MaxwelTeacher', 'maxwelteacher@gmail.com', 'Male', NULL, NULL, NULL, NULL, 33, '2011', 'Laravel', '2021-05-27 17:07:45', '2021-05-27 17:07:45'),
(11, 82, 'Mr. Fitsum Tekeste', 'Addis Ababa', 'fit4legacy@gmail.com', 'Male', NULL, NULL, NULL, NULL, 30, '2021', 'ICT & Graphic Design', '2021-06-05 06:30:13', '2021-06-05 06:30:13'),
(12, 83, 'Mr. Alelign Dametew', 'Addis Ababa', 'aleligndamtew@gmail.com', 'Male', NULL, NULL, NULL, NULL, 26, '2021', 'Applied Biology & Food Science', '2021-06-10 16:00:04', '2021-06-10 16:00:04'),
(13, 94, 'Mr. Phillip', 'Addis Ababa', 'mrphilipneps@gmail.com', 'Male', NULL, NULL, NULL, NULL, 61, '2021', 'English Grammar/Reading', '2021-06-24 08:18:42', '2021-06-24 08:18:42'),
(14, 98, 'abd', 'house #101 Street linken', 'abd@gmail.com', 'Male', NULL, NULL, NULL, NULL, NULL, '2021', 'Computer Scientists', '2021-06-25 14:15:55', '2021-06-25 14:15:55'),
(15, 102, 'jimmy teacher', 'james', 'jimmyteacher@gmail.com', 'Male', NULL, NULL, NULL, NULL, 22, '2012', 'null', '2021-06-30 14:30:37', '2021-06-30 14:30:37');

-- --------------------------------------------------------

--
-- Table structure for table `teachers_instructions`
--

CREATE TABLE `teachers_instructions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers_instructions`
--

INSERT INTO `teachers_instructions` (`id`, `title`, `details`, `status`, `created_at`, `updated_at`) VALUES
(5, 'Instruction Check All Student Profile', 'Instruction about Check All Student Profiles', 'active', '2021-05-27 17:15:35', '2021-05-27 17:15:35');

-- --------------------------------------------------------

--
-- Table structure for table `teachers_notifications`
--

CREATE TABLE `teachers_notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers_notifications`
--

INSERT INTO `teachers_notifications` (`id`, `title`, `details`, `status`, `created_at`, `updated_at`) VALUES
(5, 'Notification Check All Student Profile', 'Notification Check All Student Notification Check All Student Profile', 'active', '2021-05-27 17:16:34', '2021-05-27 17:16:34');

-- --------------------------------------------------------

--
-- Table structure for table `teachers_updates`
--

CREATE TABLE `teachers_updates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers_updates`
--

INSERT INTO `teachers_updates` (`id`, `title`, `details`, `status`, `created_at`, `updated_at`) VALUES
(4, 'Updates Check All Student Profile', 'Updates Check All Student Profile Updates Check All Student Profile', 'active', '2021-05-27 17:17:14', '2021-05-27 17:17:14');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_assignments`
--

CREATE TABLE `teacher_assignments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `term` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `topic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `teacher_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teacher_assignments`
--

INSERT INTO `teacher_assignments` (`id`, `term`, `course_id`, `class_id`, `file`, `topic`, `status`, `description`, `created_at`, `updated_at`, `teacher_id`, `user_id`) VALUES
(12, 'Third Term', '24', '4', 'uploads/assignments/logo.png', 'This is your Assignment Here', '0', 'This is your Assignment HereThis is your Assignment HereThis is your Assignment HereThis is your Assignment', '2021-05-26 07:50:41', '2021-05-26 07:51:28', NULL, NULL),
(13, 'First Term', '25', '14', 'uploads/assignments/sihamnewdb.sql', 'binary number ass', '0', 'empty', '2021-05-27 17:28:50', '2021-05-27 17:28:50', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_courses`
--

CREATE TABLE `teacher_courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_evaluations`
--

CREATE TABLE `teacher_evaluations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teacher_evaluations`
--

INSERT INTO `teacher_evaluations` (`id`, `question`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Hello All Teachers How Are You?', 'active', '2021-05-27 17:17:40', '2021-05-27 17:17:40');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_students`
--

CREATE TABLE `teacher_students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `time_slots`
--

CREATE TABLE `time_slots` (
  `id` int(10) UNSIGNED NOT NULL,
  `ttr_id` int(10) UNSIGNED NOT NULL,
  `hour_from` tinyint(4) NOT NULL,
  `min_from` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meridian_from` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hour_to` tinyint(4) NOT NULL,
  `min_to` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meridian_to` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_from` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_to` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `timestamp_from` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `timestamp_to` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `time_tables`
--

CREATE TABLE `time_tables` (
  `id` int(10) UNSIGNED NOT NULL,
  `ttr_id` int(10) UNSIGNED NOT NULL,
  `ts_id` int(10) UNSIGNED NOT NULL,
  `subject_id` int(10) UNSIGNED DEFAULT NULL,
  `exam_date` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timestamp_from` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `timestamp_to` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `day` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `day_num` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `time_table_records`
--

CREATE TABLE `time_table_records` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `my_class_id` int(10) UNSIGNED NOT NULL,
  `exam_id` int(10) UNSIGNED DEFAULT NULL,
  `year` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'LMS',
  `username` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'Student',
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'http://localhost/global_assets/images/user.png',
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bg_id` int(10) UNSIGNED DEFAULT NULL,
  `state_id` int(10) UNSIGNED DEFAULT NULL,
  `lga_id` int(10) UNSIGNED DEFAULT NULL,
  `nal_id` int(10) UNSIGNED DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `code`, `username`, `user_type`, `dob`, `gender`, `photo`, `phone`, `phone2`, `bg_id`, `state_id`, `lga_id`, `nal_id`, `address`, `status`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Zayn', 'zayn@gmail.com', 'TSWN6MMTXU', 'zayn', 'super_admin', NULL, NULL, 'uploads/admin/IMQYGZSSNW/admin.PNG', '23123123123', NULL, NULL, NULL, NULL, NULL, 'Adresss AdresssAdresssAdresss AdresssAdresss', NULL, NULL, '$2y$10$/rc5SRLo4MHR7azo/zNJJe8MTs7qdoWnIwXjNkbvZTYGKV8kyaU4W', 'yFSAdm6wolfAmESlyg2ki04Vmr6NR6eJljwzTgmR61lHwUXXfauekNELI3l1', NULL, '2021-03-02 17:50:44'),
(2, 'Admin', 'admin@gmail.com', 'L3J2WVRP5G', 'admin', 'admin', NULL, NULL, 'uploads/admin/L3J2WVRP5G/Space official logo.jpg', '+251938109045', NULL, NULL, NULL, NULL, NULL, 'Addis Ababa, Ethiopia', NULL, NULL, '$2y$10$KypKV8JtxGltQhmDc4ZYq.uqbduHcJ2AqA6K3bVv887yB3ttYFNtq', '1g4ZUIyf41jx0AXz850U5Nw2mr7pD8fvAZq27ozmgBK28pYaf7u48aC58Xa5', NULL, '2021-06-05 06:38:59'),
(3, 'Teacher', 'teacher@gmail.com', 'AHBUXSHZRB', 'teacher', 'teacher', NULL, NULL, 'uploads/teacher/AHBUXSHZRB/saying_img2.png', '111111', NULL, NULL, NULL, NULL, NULL, 'USA Street No 23', 1, NULL, '$2y$10$/wyZw41unGD27XPZr7DJOusr.p3ZVBtiLwM1Ly5E3mwbnF3gOYCnu', 'cM9bI8YJvt6c8XB8gP1nYAeUIRpvyFqDXWR9ZUnGofq6afw6snMQioTAWtjd', NULL, '2021-06-07 16:32:54'),
(18, 'Student', 'student@student.com', '4UMX1YO8VK', 'student', 'student', NULL, NULL, 'uploads/student/4UMX1YO8VK/saying_img2.png', '111111111', NULL, NULL, NULL, NULL, NULL, 'USA Streeet No 888', NULL, NULL, '$2y$10$jt00TFYoBxPuUSiAkFctgeCQolJNerQjL7PyaRhOi9CthWU0N/Uqy', 'uoQrcC0KX7TQbwxN1cnh0CE7a8m5s0p5utt6RPKNIOg6w5y1mnim2XC9nyPV', '2021-02-26 16:56:36', '2021-04-27 14:47:45'),
(72, 'NewStudent', 'NewStudent@gmail.com', '4FCKBIZQFC', 'QS/P/2011/2662', 'student', NULL, 'Male', 'uploads/student/4FCKBIZQFC/photo.jpg', NULL, NULL, NULL, 3, 40, 5, 'NewStudent', 1, NULL, '$2y$10$S.SuUs5mN4a2gQtTYDAgGOPnJnA6a2cTnBg0co3baAUyFJiv24zoe', NULL, '2021-05-17 07:56:24', '2021-05-17 07:56:34'),
(73, 'NewTeacher', 'NewTeacher@gmail.com', '01A2BYWCLK', 'NewTeacher', 'teacher', NULL, 'Male', 'http://localhost/siham_lms/public/storage/uploads/teacher/01A2BYWCLK/photo.jpg', NULL, NULL, NULL, 4, 72, 2, 'NewTeacher', 1, NULL, '$2y$10$8/57NKtDrytl1nsqF68Cje4zxIFdoWU9ui7XJ2VdXzwwVFx16lLMq', NULL, '2021-05-17 07:57:41', '2021-05-17 07:57:41'),
(74, 'Student1@gmail.com', 'student1@gmail.com', 'DM3D0XRGJF', 'QS/P/2012/9108', 'student', NULL, 'Male', 'uploads/student/DM3D0XRGJF/photo.jpg', NULL, NULL, NULL, 7, 123, 6, 'student1@gmail.com', 1, NULL, '$2y$10$NAllIlX22J665xUnwhe4D.xlt8kuo7Q/7GkhqSrVkiM6SSkaICZ6W', NULL, '2021-05-17 08:19:36', '2021-05-17 08:40:58'),
(75, 'Student2@gmail.com', 'student2@gmail.com', 'EFPMPCOWZV', 'QS/P/2013/7508', 'student', NULL, 'Male', 'uploads/student/EFPMPCOWZV/photo.jpg', NULL, NULL, NULL, 4, 71, 15, 'student2@gmail.com', 1, NULL, '$2y$10$qnOpir6UC0/1NQsTekjfYurZiaS5GFMRTMtUAwJkgfiEUACv1xvSS', NULL, '2021-05-17 08:40:05', '2021-05-17 08:40:55'),
(76, 'Wyatt Glenn', 'dyrywef@mailinator.com', 'A8JEHVGHTY', 'Wyatt Glenn', 'teacher', NULL, 'Male', 'http://localhost/siham_lms/public/storage/uploads/teacher/A8JEHVGHTY/photo.png', NULL, NULL, NULL, 35, 728, 2, 'Sed est anim autem d', NULL, NULL, '$2y$10$s1tK7kRaNwUeyWI1VDsiTe7IGYj4huaQg1728cZkzRjbn8MqMbrGm', NULL, '2021-05-17 10:24:02', '2021-05-17 10:24:02'),
(77, 'NewStudent3', 'NewStudent3@gmail.com', 'U5MR5W3IDE', 'QS/P/2011/7197', 'student', NULL, 'Male', 'uploads/student/U5MR5W3IDE/photo.jpg', NULL, NULL, NULL, 7, 121, 104, 'NewStudent3', 1, NULL, '$2y$10$Mzi2VjmWmfQQ.7yfgTjEuuwzhl090mDlEvmoHiwwT98rbWU1Yvpli', NULL, '2021-05-17 11:30:46', '2021-05-17 11:31:13'),
(78, 'TeacherNew1', 'TeacherNew1@gmail.com', 'HDN102HMJL', 'TeacherNew1', 'teacher', NULL, 'Male', 'http://localhost/siham_lms/public/storage/uploads/teacher/HDN102HMJL/photo.jpg', NULL, NULL, NULL, 1, 3, 1, 'TeacherNew1', 1, NULL, '$2y$10$DpSEL8LDyR2BLo8S.5jTZ.OlOP/sfdW7rZLNYj20LTXHm2w7wboBq', NULL, '2021-05-26 07:33:10', '2021-05-26 07:33:10'),
(80, 'MaxwelTeacher', 'maxwelteacher@gmail.com', 'ZF0QIXRZSB', 'MaxwelTeacher', 'teacher', NULL, 'Male', 'https://sihamlms.imseopro.com/storage/uploads/teacher/ZF0QIXRZSB/photo.png', NULL, NULL, NULL, 2, 19, 2, 'MaxwelTeacher', NULL, NULL, '$2y$10$jsL8Rlux9UfhKT7l.AytX.NfgTOK5.H5Z.kzln3d1b1vV1is61opW', NULL, '2021-05-27 17:07:45', '2021-05-27 17:07:45'),
(81, 'James', 'james@gmai.com', 'MLVBFDJ3CN', 'QS/SS/2011/1658', 'student', NULL, 'Male', 'uploads/student/MLVBFDJ3CN/photo.jpg', NULL, NULL, NULL, 2, 23, 1, 'james', 1, NULL, '$2y$10$IgIEKEX0SKUKaW3RtBpdmueOZCkDUbUVc/MZLBVat.F0N1R2TI6xa', NULL, '2021-05-27 17:23:03', '2021-05-27 17:23:27'),
(82, 'Mr. Fitsum Tekeste', 'fit4legacy@gmail.com', '8USQJITAPP', 'Mr. Fitsum Tekeste', 'teacher', NULL, 'Male', 'uploads/teacher/8USQJITAPP/90544493_3647843728619077_1062143050068787200_n.jpg', '+251938109045', NULL, NULL, 9, 169, 60, 'Addis Ababa', NULL, NULL, '$2y$10$eq3qkOmFz.d3MABrHc6ZJ.gXh/5/c/d0VTgH/iNcf.rrBnJqw5iI2', NULL, '2021-06-05 06:30:13', '2021-06-07 16:03:50'),
(83, 'Mr. Alelign Dametew', 'aleligndamtew@gmail.com', 'NY4ILRQHQ9', 'Mr. Alelign Dametew', 'teacher', NULL, 'Male', 'http://spaceelearn.com/storage/uploads/teacher/NY4ILRQHQ9/photo.jpg', NULL, NULL, NULL, 15, 278, 60, 'Addis Ababa', NULL, NULL, '$2y$10$pbnvMxrVfJ6D1XEpOAUPnO6NsoQjRzWuv2D3074RPovpzqJPMuxlG', NULL, '2021-06-10 16:00:04', '2021-06-10 16:00:04'),
(94, 'Mr. Phillip', 'mrphilipneps@gmail.com', 'LOQ0KJ6GTD', 'Mr. Phillip', 'teacher', NULL, 'Male', 'http://spaceelearn.com/storage/uploads/teacher/LOQ0KJ6GTD/photo.jpg', NULL, NULL, NULL, 6, 111, 27, 'Addis Ababa', NULL, NULL, '$2y$10$uzPujHqWo8XOx1siDSUd6OY0XqjPoFLdqb9D9iUihkxiMhSe/JT3O', NULL, '2021-06-24 08:18:42', '2021-06-24 08:18:42'),
(98, 'abd', 'abd@gmail.com', 'YLRO1KRMSN', 'abd', 'teacher', NULL, 'Male', 'http://spaceelearn.com/storage/uploads/teacher/YLRO1KRMSN/photo.png', NULL, NULL, NULL, 19, 347, 4, 'house #101 Street linken', NULL, NULL, '$2y$10$Gxy9pREDbw87ykkNh2nMyuCRF3zBCR0NVSgTychkYa5hQHpeoQL3a', NULL, '2021-06-25 14:15:55', '2021-06-25 14:15:55'),
(99, 'Siham', 'sihamosman85@gmail.com', '5UJJBHTTYJ', 'QS/P/2021/4580', 'student', NULL, 'Female', 'http://spaceelearn.com/global_assets/images/user.png', NULL, NULL, NULL, 18, NULL, 15, '37171', 0, NULL, '$2y$10$0xEKM9uyXWAJ495GU8Bxhum/99CTBhLMamGSdddqn27zABby/TGpK', NULL, '2021-06-26 08:16:29', '2021-06-26 08:16:29'),
(102, 'jimmy teacher', 'jimmyteacher@gmail.com', 'JLPJ1FFMSH', 'jimmy teacher', 'teacher', NULL, 'Male', 'http://spaceelearn.com/storage/uploads/teacher/JLPJ1FFMSH/photo.png', NULL, NULL, NULL, 2, 21, 1, 'james', NULL, NULL, '$2y$10$VisDX3TzZyO0ZaUw/kIbZ.bz07XcDBLrA1XU6O72keXmHVegLhS3S', NULL, '2021-06-30 14:30:37', '2021-06-30 14:30:37');

-- --------------------------------------------------------

--
-- Table structure for table `user_statuses`
--

CREATE TABLE `user_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE `user_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`id`, `title`, `name`, `level`, `created_at`, `updated_at`) VALUES
(1, 'accountant', 'Accountant', '5', NULL, NULL),
(2, 'parent', 'Parent', '4', NULL, NULL),
(3, 'teacher', 'Teacher', '3', NULL, NULL),
(4, 'admin', 'Admin', '2', NULL, NULL),
(5, 'super_admin', 'Super Admin', '1', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blood_groups`
--
ALTER TABLE `blood_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `books_my_class_id_foreign` (`my_class_id`);

--
-- Indexes for table `book_requests`
--
ALTER TABLE `book_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_requests_book_id_foreign` (`book_id`),
  ADD KEY `book_requests_user_id_foreign` (`user_id`);

--
-- Indexes for table `class_schedules`
--
ALTER TABLE `class_schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_types`
--
ALTER TABLE `class_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complains`
--
ALTER TABLE `complains`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses_study_plan`
--
ALTER TABLE `courses_study_plan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_registrations`
--
ALTER TABLE `course_registrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `curricula`
--
ALTER TABLE `curricula`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dorms`
--
ALTER TABLE `dorms`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dorms_name_unique` (`name`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `exams_term_year_unique` (`term`,`year`);

--
-- Indexes for table `exam_records`
--
ALTER TABLE `exam_records`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exam_records_exam_id_foreign` (`exam_id`),
  ADD KEY `exam_records_my_class_id_foreign` (`my_class_id`),
  ADD KEY `exam_records_student_id_foreign` (`student_id`),
  ADD KEY `exam_records_section_id_foreign` (`section_id`);

--
-- Indexes for table `expense_types`
--
ALTER TABLE `expense_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `front_blogs`
--
ALTER TABLE `front_blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `front_courses`
--
ALTER TABLE `front_courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `front_faqs`
--
ALTER TABLE `front_faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `front_galleries`
--
ALTER TABLE `front_galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `front_homepage_galleries`
--
ALTER TABLE `front_homepage_galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `front_hpmepage_videos`
--
ALTER TABLE `front_hpmepage_videos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `front_pricings`
--
ALTER TABLE `front_pricings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `front_testimonials`
--
ALTER TABLE `front_testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `grades_name_class_type_id_remark_unique` (`name`,`class_type_id`,`remark`),
  ADD KEY `grades_class_type_id_foreign` (`class_type_id`);

--
-- Indexes for table `homepagefronts`
--
ALTER TABLE `homepagefronts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lectures`
--
ALTER TABLE `lectures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lgas`
--
ALTER TABLE `lgas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lgas_state_id_foreign` (`state_id`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `marks_student_id_foreign` (`student_id`),
  ADD KEY `marks_my_class_id_foreign` (`my_class_id`),
  ADD KEY `marks_section_id_foreign` (`section_id`),
  ADD KEY `marks_subject_id_foreign` (`subject_id`),
  ADD KEY `marks_exam_id_foreign` (`exam_id`),
  ADD KEY `marks_grade_id_foreign` (`grade_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `my_classes`
--
ALTER TABLE `my_classes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `my_classes_class_type_id_name_unique` (`class_type_id`,`name`);

--
-- Indexes for table `nationalities`
--
ALTER TABLE `nationalities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offered_courses`
--
ALTER TABLE `offered_courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `online_papers`
--
ALTER TABLE `online_papers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `papers`
--
ALTER TABLE `papers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `paymentrecord`
--
ALTER TABLE `paymentrecord`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `payments_ref_no_unique` (`ref_no`),
  ADD KEY `payments_my_class_id_foreign` (`my_class_id`);

--
-- Indexes for table `payment_records`
--
ALTER TABLE `payment_records`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `payment_records_ref_no_unique` (`ref_no`),
  ADD KEY `payment_records_payment_id_foreign` (`payment_id`),
  ADD KEY `payment_records_student_id_foreign` (`student_id`);

--
-- Indexes for table `payment_supports`
--
ALTER TABLE `payment_supports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pins`
--
ALTER TABLE `pins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pins_code_unique` (`code`),
  ADD KEY `pins_user_id_foreign` (`user_id`),
  ADD KEY `pins_student_id_foreign` (`student_id`);

--
-- Indexes for table `policies`
--
ALTER TABLE `policies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `promotions_student_id_foreign` (`student_id`),
  ADD KEY `promotions_from_class_foreign` (`from_class`),
  ADD KEY `promotions_from_section_foreign` (`from_section`),
  ADD KEY `promotions_to_section_foreign` (`to_section`),
  ADD KEY `promotions_to_class_foreign` (`to_class`);

--
-- Indexes for table `receipts`
--
ALTER TABLE `receipts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `receipts_pr_id_foreign` (`pr_id`);

--
-- Indexes for table `reportings`
--
ALTER TABLE `reportings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sections_name_my_class_id_unique` (`name`,`my_class_id`),
  ADD KEY `sections_my_class_id_foreign` (`my_class_id`),
  ADD KEY `sections_teacher_id_foreign` (`teacher_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_records`
--
ALTER TABLE `staff_records`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `staff_records_code_unique` (`code`),
  ADD KEY `staff_records_user_id_foreign` (`user_id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `std_online_papers`
--
ALTER TABLE `std_online_papers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students_instructions`
--
ALTER TABLE `students_instructions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students_notifications`
--
ALTER TABLE `students_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students_updates`
--
ALTER TABLE `students_updates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_assignments`
--
ALTER TABLE `student_assignments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_courses`
--
ALTER TABLE `student_courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_evaluations`
--
ALTER TABLE `student_evaluations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_records`
--
ALTER TABLE `student_records`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_records_adm_no_unique` (`adm_no`),
  ADD KEY `student_records_user_id_foreign` (`user_id`),
  ADD KEY `student_records_my_class_id_foreign` (`my_class_id`),
  ADD KEY `student_records_section_id_foreign` (`section_id`),
  ADD KEY `student_records_my_parent_id_foreign` (`my_parent_id`),
  ADD KEY `student_records_dorm_id_foreign` (`dorm_id`);

--
-- Indexes for table `student_surveys`
--
ALTER TABLE `student_surveys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subjects_my_class_id_name_unique` (`my_class_id`,`name`),
  ADD KEY `subjects_teacher_id_foreign` (`teacher_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers_instructions`
--
ALTER TABLE `teachers_instructions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers_notifications`
--
ALTER TABLE `teachers_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers_updates`
--
ALTER TABLE `teachers_updates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_assignments`
--
ALTER TABLE `teacher_assignments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_courses`
--
ALTER TABLE `teacher_courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_evaluations`
--
ALTER TABLE `teacher_evaluations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_students`
--
ALTER TABLE `teacher_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `time_slots`
--
ALTER TABLE `time_slots`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `time_slots_timestamp_from_timestamp_to_ttr_id_unique` (`timestamp_from`,`timestamp_to`,`ttr_id`),
  ADD KEY `time_slots_ttr_id_foreign` (`ttr_id`);

--
-- Indexes for table `time_tables`
--
ALTER TABLE `time_tables`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `time_tables_ttr_id_ts_id_day_unique` (`ttr_id`,`ts_id`,`day`),
  ADD UNIQUE KEY `time_tables_ttr_id_ts_id_exam_date_unique` (`ttr_id`,`ts_id`,`exam_date`),
  ADD KEY `time_tables_ts_id_foreign` (`ts_id`),
  ADD KEY `time_tables_subject_id_foreign` (`subject_id`);

--
-- Indexes for table `time_table_records`
--
ALTER TABLE `time_table_records`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `time_table_records_name_unique` (`name`),
  ADD UNIQUE KEY `time_table_records_my_class_id_exam_id_year_unique` (`my_class_id`,`exam_id`,`year`),
  ADD KEY `time_table_records_exam_id_foreign` (`exam_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_code_unique` (`code`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD KEY `users_state_id_foreign` (`state_id`),
  ADD KEY `users_lga_id_foreign` (`lga_id`),
  ADD KEY `users_bg_id_foreign` (`bg_id`),
  ADD KEY `users_nal_id_foreign` (`nal_id`);

--
-- Indexes for table `user_statuses`
--
ALTER TABLE `user_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `blood_groups`
--
ALTER TABLE `blood_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `book_requests`
--
ALTER TABLE `book_requests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `class_schedules`
--
ALTER TABLE `class_schedules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `class_types`
--
ALTER TABLE `class_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `complains`
--
ALTER TABLE `complains`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `courses_study_plan`
--
ALTER TABLE `courses_study_plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `course_registrations`
--
ALTER TABLE `course_registrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `curricula`
--
ALTER TABLE `curricula`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dorms`
--
ALTER TABLE `dorms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `exam_records`
--
ALTER TABLE `exam_records`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expense_types`
--
ALTER TABLE `expense_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `front_blogs`
--
ALTER TABLE `front_blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `front_courses`
--
ALTER TABLE `front_courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=348;

--
-- AUTO_INCREMENT for table `front_faqs`
--
ALTER TABLE `front_faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `front_galleries`
--
ALTER TABLE `front_galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `front_homepage_galleries`
--
ALTER TABLE `front_homepage_galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `front_hpmepage_videos`
--
ALTER TABLE `front_hpmepage_videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `front_pricings`
--
ALTER TABLE `front_pricings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `front_testimonials`
--
ALTER TABLE `front_testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `homepagefronts`
--
ALTER TABLE `homepagefronts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lectures`
--
ALTER TABLE `lectures`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `lgas`
--
ALTER TABLE `lgas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=775;

--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `my_classes`
--
ALTER TABLE `my_classes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `nationalities`
--
ALTER TABLE `nationalities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;

--
-- AUTO_INCREMENT for table `offered_courses`
--
ALTER TABLE `offered_courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `online_papers`
--
ALTER TABLE `online_papers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `papers`
--
ALTER TABLE `papers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `paymentrecord`
--
ALTER TABLE `paymentrecord`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `payment_records`
--
ALTER TABLE `payment_records`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_supports`
--
ALTER TABLE `payment_supports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pins`
--
ALTER TABLE `pins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `policies`
--
ALTER TABLE `policies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `promotions`
--
ALTER TABLE `promotions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `receipts`
--
ALTER TABLE `receipts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reportings`
--
ALTER TABLE `reportings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff_records`
--
ALTER TABLE `staff_records`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `std_online_papers`
--
ALTER TABLE `std_online_papers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `students_instructions`
--
ALTER TABLE `students_instructions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `students_notifications`
--
ALTER TABLE `students_notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `students_updates`
--
ALTER TABLE `students_updates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `student_assignments`
--
ALTER TABLE `student_assignments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student_courses`
--
ALTER TABLE `student_courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_evaluations`
--
ALTER TABLE `student_evaluations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `student_records`
--
ALTER TABLE `student_records`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `student_surveys`
--
ALTER TABLE `student_surveys`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `teachers_instructions`
--
ALTER TABLE `teachers_instructions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `teachers_notifications`
--
ALTER TABLE `teachers_notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `teachers_updates`
--
ALTER TABLE `teachers_updates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `teacher_assignments`
--
ALTER TABLE `teacher_assignments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `teacher_courses`
--
ALTER TABLE `teacher_courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teacher_evaluations`
--
ALTER TABLE `teacher_evaluations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `teacher_students`
--
ALTER TABLE `teacher_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `time_slots`
--
ALTER TABLE `time_slots`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `time_tables`
--
ALTER TABLE `time_tables`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `time_table_records`
--
ALTER TABLE `time_table_records`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `user_statuses`
--
ALTER TABLE `user_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_my_class_id_foreign` FOREIGN KEY (`my_class_id`) REFERENCES `my_classes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `book_requests`
--
ALTER TABLE `book_requests`
  ADD CONSTRAINT `book_requests_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `book_requests_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `exam_records`
--
ALTER TABLE `exam_records`
  ADD CONSTRAINT `exam_records_exam_id_foreign` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `exam_records_my_class_id_foreign` FOREIGN KEY (`my_class_id`) REFERENCES `my_classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `exam_records_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `exam_records_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `grades`
--
ALTER TABLE `grades`
  ADD CONSTRAINT `grades_class_type_id_foreign` FOREIGN KEY (`class_type_id`) REFERENCES `class_types` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `lgas`
--
ALTER TABLE `lgas`
  ADD CONSTRAINT `lgas_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `marks`
--
ALTER TABLE `marks`
  ADD CONSTRAINT `marks_exam_id_foreign` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `marks_grade_id_foreign` FOREIGN KEY (`grade_id`) REFERENCES `grades` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `marks_my_class_id_foreign` FOREIGN KEY (`my_class_id`) REFERENCES `my_classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `marks_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `marks_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `marks_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `my_classes`
--
ALTER TABLE `my_classes`
  ADD CONSTRAINT `my_classes_class_type_id_foreign` FOREIGN KEY (`class_type_id`) REFERENCES `class_types` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_my_class_id_foreign` FOREIGN KEY (`my_class_id`) REFERENCES `my_classes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payment_records`
--
ALTER TABLE `payment_records`
  ADD CONSTRAINT `payment_records_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `payment_records_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pins`
--
ALTER TABLE `pins`
  ADD CONSTRAINT `pins_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pins_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `promotions`
--
ALTER TABLE `promotions`
  ADD CONSTRAINT `promotions_from_class_foreign` FOREIGN KEY (`from_class`) REFERENCES `my_classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `promotions_from_section_foreign` FOREIGN KEY (`from_section`) REFERENCES `sections` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `promotions_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `promotions_to_class_foreign` FOREIGN KEY (`to_class`) REFERENCES `my_classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `promotions_to_section_foreign` FOREIGN KEY (`to_section`) REFERENCES `sections` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `receipts`
--
ALTER TABLE `receipts`
  ADD CONSTRAINT `receipts_pr_id_foreign` FOREIGN KEY (`pr_id`) REFERENCES `payment_records` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sections`
--
ALTER TABLE `sections`
  ADD CONSTRAINT `sections_my_class_id_foreign` FOREIGN KEY (`my_class_id`) REFERENCES `my_classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sections_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `staff_records`
--
ALTER TABLE `staff_records`
  ADD CONSTRAINT `staff_records_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `student_records`
--
ALTER TABLE `student_records`
  ADD CONSTRAINT `student_records_dorm_id_foreign` FOREIGN KEY (`dorm_id`) REFERENCES `dorms` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `student_records_my_class_id_foreign` FOREIGN KEY (`my_class_id`) REFERENCES `my_classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_records_my_parent_id_foreign` FOREIGN KEY (`my_parent_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `student_records_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_records_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `subjects_my_class_id_foreign` FOREIGN KEY (`my_class_id`) REFERENCES `my_classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subjects_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `time_slots`
--
ALTER TABLE `time_slots`
  ADD CONSTRAINT `time_slots_ttr_id_foreign` FOREIGN KEY (`ttr_id`) REFERENCES `time_table_records` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `time_tables`
--
ALTER TABLE `time_tables`
  ADD CONSTRAINT `time_tables_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `time_tables_ts_id_foreign` FOREIGN KEY (`ts_id`) REFERENCES `time_slots` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `time_tables_ttr_id_foreign` FOREIGN KEY (`ttr_id`) REFERENCES `time_table_records` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `time_table_records`
--
ALTER TABLE `time_table_records`
  ADD CONSTRAINT `time_table_records_exam_id_foreign` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `time_table_records_my_class_id_foreign` FOREIGN KEY (`my_class_id`) REFERENCES `my_classes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_bg_id_foreign` FOREIGN KEY (`bg_id`) REFERENCES `blood_groups` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `users_lga_id_foreign` FOREIGN KEY (`lga_id`) REFERENCES `lgas` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `users_nal_id_foreign` FOREIGN KEY (`nal_id`) REFERENCES `nationalities` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `users_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
