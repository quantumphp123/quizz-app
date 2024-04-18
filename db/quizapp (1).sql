-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 18, 2024 at 04:16 AM
-- Server version: 10.6.17-MariaDB-cll-lve
-- PHP Version: 8.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quizapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'ANAND', 'ashutoshchauhan129@gmail.com', '$2y$10$GjGJp2AJSB/8GBGdVSIefeV2zb8Ta3swxNzJ9yiSetX6XaG5FmoZu', '2022-10-11 06:28:48', '2022-11-14 18:23:01'),
(2, 'Admin', 'admin@gmail.com', '$2y$10$JfOLoD5AsVs9jrG1HYq7Ke.IR.qvmE/cYwmjv64b.rnxNqMZ87Xvy', '2022-10-19 17:15:47', '2022-10-19 17:15:47');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `createdByTeacherId` varchar(191) NOT NULL,
  `groupName` varchar(191) NOT NULL,
  `class` varchar(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `createdByTeacherId`, `groupName`, `class`, `created_at`, `updated_at`) VALUES
(14, '1', 'Anand 2', '11', '2022-11-10 17:17:18', '2022-11-10 17:17:18'),
(18, '8', 'Group 8', '4', '2022-11-18 16:45:43', '2022-11-18 16:45:43'),
(20, '12', 'last', '4', '2022-11-29 12:27:08', '2022-11-29 12:27:08');

-- --------------------------------------------------------

--
-- Table structure for table `group_projects`
--

CREATE TABLE `group_projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject` varchar(191) NOT NULL,
  `assignment` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `dueDate` date DEFAULT NULL,
  `teacherId` bigint(20) UNSIGNED DEFAULT NULL,
  `groupId` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `group_projects`
--

INSERT INTO `group_projects` (`id`, `subject`, `assignment`, `created_at`, `updated_at`, `dueDate`, `teacherId`, `groupId`) VALUES
(20, 'Maths', 'Solve question bank', '2022-11-18 16:53:12', NULL, '2022-11-22', 8, 18),
(21, 'English Essay updated', 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum', '2022-12-06 01:14:53', NULL, '2022-12-08', 1, 14);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_10_10_114011_create_teacher_table', 1),
(6, '2022_10_10_114346_create_students_table', 2),
(7, '2022_10_10_114444_create_parents_table', 3),
(8, '2022_10_10_114552_create_admins_table', 4),
(9, '2022_10_17_083223_create_parentkids_table', 5),
(10, '2022_10_17_090926_rename_parent_kids_table', 6),
(11, '2022_10_17_114304_add_columns_to_student_table', 7),
(12, '2022_10_17_115622_make_student_column_changes', 8),
(13, '2022_10_18_074800_create_student_changes2_table', 9),
(14, '2022_10_18_091145_change_student_column_name', 10),
(15, '2022_10_18_100747_create_parents_assign_points_table', 11),
(16, '2022_10_18_100907_create_parents_assign_points_table', 12),
(17, '2022_10_18_110116_update_parent_points_table2', 13),
(18, '2022_10_18_100804_create_teacher_classes_table', 14),
(19, '2022_10_18_095051_create_teacher_add_column_table', 15),
(20, '2022_10_18_133014_create_student_group_table', 16),
(21, '2022_10_18_133233_create_group_list_table', 16),
(22, '2022_10_18_134243_update_group_list_table', 17),
(23, '2022_10_19_053830_create_students_changes_3_table', 18),
(24, '2022_10_19_075354_create_groups_changes_table', 19),
(26, '2022_10_19_082942_create_teacher_assign_points_table', 20),
(28, '2022_10_20_113322_create_teacher_feedbacks_table', 21),
(30, '2022_10_26_050338_create_parent_feedbacks_table', 22),
(31, '2022_10_26_073602_create_group_projects_table', 23),
(32, '2022_11_04_163615_add_parent_id_to_teacher_feedbacks', 24),
(33, '2022_11_04_171528_add_color_to_students', 25),
(34, '2022_11_04_175919_add_parent_id_to_students', 26),
(35, '2022_11_08_143436_add_points_by_parent_to_students', 27),
(36, '2022_11_10_114323_add_student_id_to_student_group', 28),
(37, '2022_11_10_114852_add_group_id_to_student_group', 29),
(38, '2022_11_10_172945_add_student_id_to_teacher_assign_points', 30),
(39, '2022_11_10_173344_add_teacher_id_to_teacher_assign_points', 31),
(40, '2022_11_10_174520_add_points_by_teacher_to_students', 32),
(41, '2022_11_10_184905_add_teacher_id_to_group_projects', 33),
(42, '2022_11_10_185025_add_group_id_to_group_projects', 34),
(43, '2022_11_11_112050_add_contact_number_to_parents', 35),
(44, '2022_11_11_130522_create_notice_boards_table', 36),
(45, '2022_11_15_100900_create_parent_point_comments_table', 37),
(46, '2022_11_15_184538_create_teacher_point_comments_table', 38);

-- --------------------------------------------------------

--
-- Table structure for table `notice_boards`
--

CREATE TABLE `notice_boards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notice_boards`
--

INSERT INTO `notice_boards` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'title', 'kfnjknlvnkldnlcsxkl', '2022-11-11 08:12:36', NULL),
(2, 'Hey Brother Competition', 'vkjvjknvmlvcnxkjvhncvcxlkjvf987f98v748fc654v98fd7h498hkmj8k4hj789hb74gf8b74a85g7498fdffakjdnjdhfjf7vg78fgfgf456j5214564165fv4165sdff45as', '2022-11-11 08:36:45', NULL),
(3, 'Competition', 'Compete in drawing and win prize', '2022-11-18 17:16:43', NULL),
(4, 'Christmas Party', 'ankit_sawner ankit_sawner ankit_sawnerankit_sawner ankit_sawner ankit_sawner ankit_sawner ankit_sawner ankit_sawner ankit_sawner', '2022-12-06 01:34:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `parentkids`
--

CREATE TABLE `parentkids` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` varchar(191) NOT NULL,
  `student_id` varchar(191) NOT NULL,
  `token` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parentkids`
--

INSERT INTO `parentkids` (`id`, `parent_id`, `student_id`, `token`, `created_at`, `updated_at`) VALUES
(1, '1', '1', NULL, '2022-10-18 09:15:55', NULL),
(2, '1', '2', NULL, '2022-10-18 09:17:10', NULL),
(3, '1', '3', NULL, '2022-10-18 09:28:19', NULL),
(4, '1', '4', NULL, '2022-10-18 09:28:27', NULL),
(5, '1', '5', NULL, '2022-10-18 14:46:48', NULL),
(6, '2', '6', NULL, '2022-10-19 06:45:18', NULL),
(7, '3', '7', NULL, '2022-10-19 07:26:07', NULL),
(8, '3', '8', NULL, '2022-10-19 07:36:55', NULL),
(9, '4', '9', NULL, '2022-10-19 14:25:54', NULL),
(10, '5', '10', NULL, '2022-10-19 14:47:15', NULL),
(11, '6', '11', NULL, '2022-10-20 07:13:07', NULL),
(13, '5', '13', NULL, '2022-11-02 08:53:24', NULL),
(14, '5', '14', NULL, '2022-11-02 09:00:29', NULL),
(15, '4', '15', NULL, '2022-11-02 11:28:25', NULL),
(16, '5', '16', NULL, '2022-11-03 05:09:10', NULL),
(17, '5', '17', NULL, '2022-11-03 05:11:30', NULL),
(18, '5', '18', NULL, '2022-11-04 07:20:16', NULL),
(19, '5', '19', NULL, '2022-11-04 17:21:24', NULL),
(20, '5', '18', NULL, '2022-11-08 13:01:11', NULL),
(21, '5', '19', NULL, '2022-11-08 13:07:53', NULL),
(22, '5', '20', NULL, '2022-11-08 13:18:29', NULL),
(23, '5', '21', NULL, '2022-11-08 13:19:27', NULL),
(24, '5', '22', NULL, '2022-11-08 13:52:27', NULL),
(25, '5', '23', NULL, '2022-11-08 13:59:22', NULL),
(26, '5', '24', NULL, '2022-11-08 14:00:06', NULL),
(27, '5', '25', NULL, '2022-11-08 14:01:20', NULL),
(28, '5', '26', NULL, '2022-11-08 14:02:20', NULL),
(29, '5', '27', NULL, '2022-11-08 14:13:48', NULL),
(30, '5', '28', NULL, '2022-11-08 14:14:15', NULL),
(31, '5', '14', NULL, '2022-11-09 12:26:08', NULL),
(32, '5', '15', NULL, '2022-11-09 12:27:28', NULL),
(33, '5', '16', NULL, '2022-11-09 13:23:27', NULL),
(34, '5', '14', NULL, '2022-11-09 23:39:36', NULL),
(35, '5', '15', NULL, '2022-11-09 23:40:26', NULL),
(36, '5', '16', NULL, '2022-11-09 23:40:54', NULL),
(37, '5', '17', NULL, '2022-11-09 23:41:41', NULL),
(38, '5', '18', NULL, '2022-11-10 23:48:07', NULL),
(39, '5', '19', NULL, '2022-11-10 23:48:07', NULL),
(40, '5', '19', NULL, '2022-11-18 08:51:30', NULL),
(41, '5', '20', NULL, '2022-11-18 08:52:37', NULL),
(42, '5', '21', NULL, '2022-11-18 08:57:23', NULL),
(43, '5', '22', NULL, '2022-11-23 12:40:11', NULL),
(44, '5', '23', NULL, '2022-11-23 12:43:31', NULL),
(45, '29', '24', NULL, '2022-11-29 05:16:46', NULL),
(46, '29', '25', NULL, '2022-11-29 05:25:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `parents`
--

CREATE TABLE `parents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `contact_number` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parents`
--

INSERT INTO `parents` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`, `contact_number`) VALUES
(1, 'parent', 'parent@gmail.com', '$2y$10$l.kXYxm37DiyVkd2rgvruulMxR8ctFQpcH/b.K1Lnai6kqAa3/rBa', '2022-10-17 02:57:50', NULL, ''),
(2, 'parent2', 'parent2@gmail.com', '$2y$10$yuKL7fPNrFV5w9Kr7VD7muWsKZSFVxrznqqssRjv0RtKWTf0NFdsm', '2022-10-19 13:43:49', NULL, ''),
(3, 'Parent 3', 'parent3@gmail.com', '$2y$10$qC/3.Dka4vkXWtE6r230Suu8LgSeMbOmVAjOpNz2RVkRYqneotrce', '2022-10-19 14:23:39', NULL, ''),
(4, 'Parent 4', 'parent4@gmail.com', '$2y$10$6pRSnLA.6BWYPOs0BWPbhuZrFzo9o/Y1hdZ436Wag1RjbTQ9UbKpa', '2022-10-19 21:23:46', NULL, ''),
(5, 'mireille', 'mireille@gmail.com', '$2y$10$dzSRq6A8OhaKpjZyf3yH5O0vzKvl0HCriqRbW6yR/V6EjXq3Ymly.', '2022-10-19 21:43:45', '2022-11-09 18:05:09', ''),
(6, 'Parent 5', 'parent5@gmail.com', '$2y$10$2viNUAK0c7Lcu2r08ssu/OzmhMgDNXzf0OnGXyW5G2UOT55Mijeru', '2022-10-20 14:11:24', NULL, ''),
(10, 'Keshav Sugaliya', 'bairagistudiogfx@gmail.com', '$2y$10$0V16P2bZOKj.KerECzH5iuRrduh/66AgSaCLxvD3JDJpjA1G4DM/m', '2022-11-18 13:34:38', NULL, '1020304050'),
(12, 'Anand Bairagi', 'anandbairagi@gmail.com', '$2y$10$V/QL/GfUBGh5fVF3mQanIueLyFg1FDSnDcns2IDJMUF8dwNtI23A2', '2022-11-18 13:38:05', NULL, '1234567890'),
(13, 'Anand Bairagi', 'anandgupta@gmail.com', '$2y$10$ypTH.YSD7c/ZWcK/eDjsHes3SYPJ2ZD4jRwCn0ju9774F/uzrYMce', '2022-11-18 13:44:43', NULL, '4567891234'),
(14, 'Peggy Carter', 'peggy34@gmail.com', '$2y$10$9ggG/IWBIgG0V9gEhANW2.CQvc3wK7iFXYo.ONTtxYU.XAPRo/wgq', '2022-11-18 18:04:21', NULL, '5498763201'),
(16, 'Priya Rathi', 'keshav@gmail.com', '$2y$10$ev6FcICKxss30gdX8lN/9eKhIxiD/brIQtJWhN8FE53lqC88nbcWG', '2022-11-18 19:07:44', NULL, '4567891230'),
(17, 'Priya Rathi', 'priya@gmail.com', '$2y$10$4bOXx68QRCuo5JUBL6WXqu/i1ScVJVjnPeiMUfej6wy4PqHhm6uWW', '2022-11-18 19:18:01', NULL, '1020305040'),
(19, 'Priya Rathi', 'priyarathi@gmail.com', '$2y$10$ngZVzv2KkpaDDge.LO.7Nu6BIk/X/RdOSNh7A8wQjcHV.iy5Df3Oq', '2022-11-18 19:20:31', NULL, '1020304050'),
(20, 'Priya Rathi', 'ashutoshchauhan129@gmail.com', '$2y$10$dFjEkpiPDDkyaXHitzu9B.KCLRGpMHarT1FlBSPvx7MbFP0eR6Su.', '2022-11-18 19:30:19', NULL, '1020304050'),
(21, 'Raj', 'raj@gmail.com', '$2y$10$chwgrXOiVmsweYJRcaOkg.sRoawTXri2FLbv69C7p76iDEtvMMWLa', '2022-11-22 16:31:11', NULL, '0123456789'),
(22, 'Anand Bairagi', 'anandquantumitinnovation@gmail.com', '$2y$10$Wu22WcebltCSTghv6QvlUube6FbcdbBF4MEGfQzKg3YU/8sLzZ7ka', '2022-11-23 18:16:36', NULL, '8945678012'),
(28, 'Anand Bairagi', 'anandbairagi500@gmail.com', '$2y$10$OZv1ykj63jyb4W4VF8N7dON1Eq0K0/b8UtQBoB6jaRSF6XImFSdRC', '2022-11-24 14:01:35', '2022-11-24 21:56:02', '12304568970'),
(29, 'New Parent', 'newestparent@gmail.com', '$2y$10$Q3DCFhQuEIyPVDWV5V9sROk/RTayFaVAu4/7n26js7DqgN3vn6BUm', '2022-11-29 12:09:08', '2022-11-29 12:12:12', '9920154556'),
(30, 'Anand Godpole', 'anandbairagi789@gmail.com', '$2y$10$kfnWdyreWsSd5vfwSQxYo.rpA6VgvznlhMLPFWR/xL1gloqAhJGua', '2022-11-29 13:10:09', NULL, '8910849216');

-- --------------------------------------------------------

--
-- Table structure for table `parents_assign_points`
--

CREATE TABLE `parents_assign_points` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parentId` varchar(191) NOT NULL,
  `studentId` varchar(191) NOT NULL,
  `reason` varchar(191) NOT NULL,
  `point` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parents_assign_points`
--

INSERT INTO `parents_assign_points` (`id`, `parentId`, `studentId`, `reason`, `point`, `created_at`, `updated_at`) VALUES
(224, '5', '10', 'punctual', 1, '2022-11-15 09:04:28', '2022-11-15 09:04:28'),
(225, '5', '10', 'discipline', 1, '2022-11-15 09:04:28', '2022-11-15 09:04:28'),
(226, '5', '10', 'respectful', 0, '2022-11-15 09:04:28', '2022-11-15 09:04:28'),
(227, '5', '10', 'contributing', 0, '2022-11-15 09:04:29', '2022-11-15 09:04:29'),
(228, '5', '10', 'organized', 1, '2022-11-15 09:04:29', '2022-11-15 09:04:29'),
(229, '5', '10', 'performing', 1, '2022-11-15 09:04:29', '2022-11-15 09:04:29'),
(230, '5', '10', 'responsible', 1, '2022-11-15 09:04:29', '2022-11-15 09:04:29'),
(231, '5', '10', 'co-operative', 1, '2022-11-15 09:04:29', '2022-11-15 09:04:29'),
(232, '5', '10', 'leadership', 1, '2022-11-15 09:04:29', '2022-11-15 09:04:29'),
(233, '5', '10', 'determined', 1, '2022-11-15 09:04:29', '2022-11-15 09:04:29'),
(234, '5', '10', 'self confident', 1, '2022-11-15 09:04:29', '2022-11-15 09:04:29'),
(235, '5', '10', 'obedient', 0, '2022-11-15 09:04:29', '2022-11-15 09:04:29'),
(308, '5', '13', 'punctual', 0, '2022-11-15 10:30:32', '2022-11-15 10:30:32'),
(309, '5', '13', 'discipline', 0, '2022-11-15 10:30:32', '2022-11-15 10:30:32'),
(310, '5', '13', 'respectful', 0, '2022-11-15 10:30:32', '2022-11-15 10:30:33'),
(311, '5', '13', 'contributing', 0, '2022-11-15 10:30:33', '2022-11-15 10:30:33'),
(312, '5', '13', 'organized', 0, '2022-11-15 10:30:33', '2022-11-15 10:30:33'),
(313, '5', '13', 'performing', 0, '2022-11-15 10:30:33', '2022-11-15 10:30:33'),
(314, '5', '13', 'responsible', 0, '2022-11-15 10:30:33', '2022-11-15 10:30:33'),
(315, '5', '13', 'co-operative', 0, '2022-11-15 10:30:33', '2022-11-15 10:30:33'),
(316, '5', '13', 'leadership', 0, '2022-11-15 10:30:33', '2022-11-15 10:30:33'),
(317, '5', '13', 'determined', 0, '2022-11-15 10:30:33', '2022-11-15 10:30:33'),
(318, '5', '13', 'self confident', 0, '2022-11-15 10:30:34', '2022-11-15 10:30:34'),
(319, '5', '13', 'obedient', 0, '2022-11-15 10:30:34', '2022-11-15 10:30:34'),
(320, '5', '14', 'punctual', 0, '2022-11-15 10:30:34', '2022-11-15 10:30:34'),
(321, '5', '14', 'discipline', 0, '2022-11-15 10:30:34', '2022-11-15 10:30:34'),
(322, '5', '14', 'respectful', 0, '2022-11-15 10:30:34', '2022-11-15 10:30:34'),
(323, '5', '14', 'contributing', 0, '2022-11-15 10:30:34', '2022-11-15 10:30:34'),
(324, '5', '14', 'organized', 0, '2022-11-15 10:30:34', '2022-11-15 10:30:34'),
(325, '5', '14', 'performing', 0, '2022-11-15 10:30:35', '2022-11-15 10:30:35'),
(326, '5', '14', 'responsible', 0, '2022-11-15 10:30:35', '2022-11-15 10:30:35'),
(327, '5', '14', 'co-operative', 0, '2022-11-15 10:30:35', '2022-11-15 10:30:35'),
(328, '5', '14', 'leadership', 0, '2022-11-15 10:30:35', '2022-11-15 10:30:35'),
(329, '5', '14', 'determined', 0, '2022-11-15 10:30:35', '2022-11-15 10:30:35'),
(330, '5', '14', 'self confident', 0, '2022-11-15 10:30:35', '2022-11-15 10:30:35'),
(331, '5', '14', 'obedient', 0, '2022-11-15 10:30:35', '2022-11-15 10:30:35'),
(332, '5', '15', 'punctual', 0, '2022-11-15 10:30:35', '2022-11-15 10:30:35'),
(333, '5', '15', 'discipline', 0, '2022-11-15 10:30:35', '2022-11-15 10:30:35'),
(334, '5', '15', 'respectful', 0, '2022-11-15 10:30:35', '2022-11-15 10:30:35'),
(335, '5', '15', 'contributing', 0, '2022-11-15 10:30:36', '2022-11-15 10:30:36'),
(336, '5', '15', 'organized', 0, '2022-11-15 10:30:36', '2022-11-15 10:30:36'),
(337, '5', '15', 'performing', 0, '2022-11-15 10:30:36', '2022-11-15 10:30:36'),
(338, '5', '15', 'responsible', 0, '2022-11-15 10:30:36', '2022-11-15 10:30:36'),
(339, '5', '15', 'co-operative', 0, '2022-11-15 10:30:36', '2022-11-15 10:30:36'),
(340, '5', '15', 'leadership', 0, '2022-11-15 10:30:36', '2022-11-15 10:30:36'),
(341, '5', '15', 'determined', 0, '2022-11-15 10:30:36', '2022-11-15 10:30:36'),
(342, '5', '15', 'self confident', 0, '2022-11-15 10:30:36', '2022-11-15 10:30:36'),
(343, '5', '15', 'obedient', 0, '2022-11-15 10:30:36', '2022-11-15 10:30:36'),
(344, '5', '16', 'punctual', 0, '2022-11-15 10:30:37', '2022-11-15 10:30:36'),
(345, '5', '16', 'discipline', 0, '2022-11-15 10:30:37', '2022-11-15 10:30:37'),
(346, '5', '16', 'respectful', 0, '2022-11-15 10:30:37', '2022-11-15 10:30:37'),
(347, '5', '16', 'contributing', 0, '2022-11-15 10:30:37', '2022-11-15 10:30:37'),
(348, '5', '16', 'organized', 0, '2022-11-15 10:30:37', '2022-11-15 10:30:37'),
(349, '5', '16', 'performing', 0, '2022-11-15 10:30:37', '2022-11-15 10:30:37'),
(350, '5', '16', 'responsible', 0, '2022-11-15 10:30:37', '2022-11-15 10:30:37'),
(351, '5', '16', 'co-operative', 0, '2022-11-15 10:30:37', '2022-11-15 10:30:37'),
(352, '5', '16', 'leadership', 0, '2022-11-15 10:30:37', '2022-11-15 10:30:37'),
(353, '5', '16', 'determined', 0, '2022-11-15 10:30:37', '2022-11-15 10:30:37'),
(354, '5', '16', 'self confident', 0, '2022-11-15 10:30:37', '2022-11-15 10:30:37'),
(355, '5', '16', 'obedient', 0, '2022-11-15 10:30:38', '2022-11-15 10:30:38'),
(356, '5', '17', 'punctual', 0, '2022-11-15 10:30:38', '2022-11-15 10:30:38'),
(357, '5', '17', 'discipline', 0, '2022-11-15 10:30:38', '2022-11-15 10:30:38'),
(358, '5', '17', 'respectful', 0, '2022-11-15 10:30:38', '2022-11-15 10:30:38'),
(359, '5', '17', 'contributing', 0, '2022-11-15 10:30:38', '2022-11-15 10:30:38'),
(360, '5', '17', 'organized', 0, '2022-11-15 10:30:38', '2022-11-15 10:30:38'),
(361, '5', '17', 'performing', 0, '2022-11-15 10:30:38', '2022-11-15 10:30:38'),
(362, '5', '17', 'responsible', 0, '2022-11-15 10:30:38', '2022-11-15 10:30:38'),
(363, '5', '17', 'co-operative', 0, '2022-11-15 10:30:38', '2022-11-15 10:30:38'),
(364, '5', '17', 'leadership', 0, '2022-11-15 10:30:38', '2022-11-15 10:30:38'),
(365, '5', '17', 'determined', 0, '2022-11-15 10:30:38', '2022-11-15 10:30:38'),
(366, '5', '17', 'self confident', 0, '2022-11-15 10:30:39', '2022-11-15 10:30:39'),
(367, '5', '17', 'obedient', 0, '2022-11-15 10:30:39', '2022-11-15 10:30:39'),
(368, '5', '18', 'punctual', 0, '2022-11-15 10:30:39', '2022-11-15 10:30:39'),
(369, '5', '18', 'discipline', 0, '2022-11-15 10:30:39', '2022-11-15 10:30:39'),
(370, '5', '18', 'respectful', 0, '2022-11-15 10:30:39', '2022-11-15 10:30:39'),
(371, '5', '18', 'contributing', 0, '2022-11-15 10:30:39', '2022-11-15 10:30:39'),
(372, '5', '18', 'organized', 0, '2022-11-15 10:30:39', '2022-11-15 10:30:39'),
(373, '5', '18', 'performing', 0, '2022-11-15 10:30:39', '2022-11-15 10:30:39'),
(374, '5', '18', 'responsible', 0, '2022-11-15 10:30:40', '2022-11-15 10:30:40'),
(375, '5', '18', 'co-operative', 0, '2022-11-15 10:30:40', '2022-11-15 10:30:40'),
(376, '5', '18', 'leadership', 0, '2022-11-15 10:30:40', '2022-11-15 10:30:40'),
(377, '5', '18', 'determined', 0, '2022-11-15 10:30:40', '2022-11-15 10:30:40'),
(378, '5', '18', 'self confident', 0, '2022-11-15 10:30:40', '2022-11-15 10:30:40'),
(379, '5', '18', 'obedient', 0, '2022-11-15 10:30:40', '2022-11-15 10:30:40'),
(380, '5', '20', 'punctual', 1, '2022-11-18 15:56:06', '2022-11-18 08:56:06'),
(381, '5', '20', 'discipline', 1, '2022-11-18 15:56:06', '2022-11-18 08:56:06'),
(382, '5', '20', 'respectful', 1, '2022-11-18 15:56:06', '2022-11-18 08:56:06'),
(383, '5', '20', 'contributing', 1, '2022-11-18 15:56:06', '2022-11-18 08:56:06'),
(384, '5', '20', 'organized', 1, '2022-11-18 15:56:06', '2022-11-18 08:56:06'),
(385, '5', '20', 'performing', 1, '2022-11-18 15:56:06', '2022-11-18 08:56:06'),
(386, '5', '20', 'responsible', 1, '2022-11-18 15:56:06', '2022-11-18 08:56:06'),
(387, '5', '20', 'co-operative', 1, '2022-11-18 15:56:06', '2022-11-18 08:56:06'),
(388, '5', '20', 'leadership', 1, '2022-11-18 15:56:06', '2022-11-18 08:56:06'),
(389, '5', '20', 'determined', 1, '2022-11-18 15:56:06', '2022-11-18 08:56:06'),
(390, '5', '20', 'self confident', 1, '2022-11-18 15:56:06', '2022-11-18 08:56:06'),
(391, '5', '20', 'obedient', 1, '2022-11-18 15:56:06', '2022-11-18 08:56:06'),
(392, '5', '21', 'punctual', 1, '2022-11-18 16:58:41', '2022-11-18 09:58:41'),
(393, '5', '21', 'discipline', 1, '2022-11-18 16:58:41', '2022-11-18 09:58:41'),
(394, '5', '21', 'respectful', 1, '2022-11-18 16:58:41', '2022-11-18 09:58:41'),
(395, '5', '21', 'contributing', 1, '2022-11-18 16:58:41', '2022-11-18 09:58:41'),
(396, '5', '21', 'organized', 1, '2022-11-18 16:58:41', '2022-11-18 09:58:41'),
(397, '5', '21', 'performing', 1, '2022-11-18 16:58:41', '2022-11-18 09:58:41'),
(398, '5', '21', 'responsible', 1, '2022-11-18 16:58:41', '2022-11-18 09:58:41'),
(399, '5', '21', 'co-operative', 1, '2022-11-18 16:58:41', '2022-11-18 09:58:41'),
(400, '5', '21', 'leadership', 1, '2022-11-18 16:58:41', '2022-11-18 09:58:41'),
(401, '5', '21', 'determined', 1, '2022-11-18 16:58:41', '2022-11-18 09:58:41'),
(402, '5', '21', 'self confident', 1, '2022-11-18 16:58:41', '2022-11-18 09:58:41'),
(403, '5', '21', 'obedient', 1, '2022-11-18 16:58:41', '2022-11-18 09:58:41'),
(404, '5', '14', 'punctual', 0, '2022-12-06 12:33:56', '2022-12-06 05:33:56'),
(405, '5', '14', 'discipline', 1, '2022-12-06 12:33:56', '2022-12-06 05:33:56'),
(406, '5', '14', 'respectful', 1, '2022-12-06 12:33:56', '2022-12-06 05:33:56'),
(407, '5', '14', 'contributing', 1, '2022-12-06 12:33:56', '2022-12-06 05:33:56'),
(408, '5', '14', 'organized', 1, '2022-12-06 12:33:56', '2022-12-06 05:33:56'),
(409, '5', '14', 'performing', 1, '2022-12-06 12:33:56', '2022-12-06 05:33:56'),
(410, '5', '14', 'responsible', 1, '2022-12-06 12:33:56', '2022-12-06 05:33:56'),
(411, '5', '14', 'co-operative', 1, '2022-12-06 12:33:56', '2022-12-06 05:33:56'),
(412, '5', '14', 'leadership', 1, '2022-12-06 12:33:56', '2022-12-06 05:33:56'),
(413, '5', '14', 'determined', 1, '2022-12-06 12:33:56', '2022-12-06 05:33:56'),
(414, '5', '14', 'obedient', 1, '2022-12-06 12:33:56', '2022-12-06 05:33:56');

-- --------------------------------------------------------

--
-- Table structure for table `parent_feedbacks`
--

CREATE TABLE `parent_feedbacks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parentId` varchar(191) NOT NULL,
  `studentId` varchar(191) NOT NULL,
  `title` varchar(191) NOT NULL,
  `description` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parent_feedbacks`
--

INSERT INTO `parent_feedbacks` (`id`, `parentId`, `studentId`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, '6', '11', 'My first Feedback', 'First feedback to my child', NULL, NULL),
(2, '6', '11', 'Second Feedback', 'Second Feedback to my child', '2022-10-26 12:43:23', '2022-10-26 12:43:23'),
(3, '4', '9', 'My first Feedback', 'My first feedback to my child', '2022-10-26 13:41:32', NULL),
(4, '5', '10', 'test feedback', 'i am ashutosh and i am giving feedback', '2022-11-02 16:08:56', '2022-10-31 18:30:00'),
(5, '5', '10', 'Feedback by Me', 'fdfggsdg', '2022-11-08 11:28:01', '2022-08-31 18:30:00'),
(6, '5', '13', 'Points kam aa rahe hai bacha', 'hfhfihfaifahfjgghfghfhkjkjh', '2022-11-08 11:28:51', '2022-10-11 18:30:00'),
(7, '5', '14', 'Ankit Bhai', 'jfnjinhjnvvcvfddfvbcvbcvbcvb', '2022-11-10 14:47:13', '2022-11-10 14:47:13');

-- --------------------------------------------------------

--
-- Table structure for table `parent_point_comments`
--

CREATE TABLE `parent_point_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `comment` text NOT NULL,
  `parent_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `parents_assign_point_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parent_point_comments`
--

INSERT INTO `parent_point_comments` (`id`, `comment`, `parent_id`, `student_id`, `parents_assign_point_id`, `created_at`, `updated_at`) VALUES
(5, 'fiojofjiofjiofvdxc', 5, 10, 226, '2022-11-15 09:04:28', NULL),
(6, 'cvvfsvzcxvx', 5, 10, 227, '2022-11-15 09:04:29', NULL),
(7, 'ihuivkcj;cdc54655vvvfs', 5, 10, 235, '2022-11-15 09:04:29', NULL),
(80, 'Parent Forget to Assign Points', 5, 13, 308, '2022-11-15 10:30:32', NULL),
(81, 'Parent Forget to Assign Points', 5, 13, 309, '2022-11-15 10:30:32', NULL),
(82, 'Parent Forget to Assign Points', 5, 13, 310, '2022-11-15 10:30:33', NULL),
(83, 'Parent Forget to Assign Points', 5, 13, 311, '2022-11-15 10:30:33', NULL),
(84, 'Parent Forget to Assign Points', 5, 13, 312, '2022-11-15 10:30:33', NULL),
(85, 'Parent Forget to Assign Points', 5, 13, 313, '2022-11-15 10:30:33', NULL),
(86, 'Parent Forget to Assign Points', 5, 13, 314, '2022-11-15 10:30:33', NULL),
(87, 'Parent Forget to Assign Points', 5, 13, 315, '2022-11-15 10:30:33', NULL),
(88, 'Parent Forget to Assign Points', 5, 13, 316, '2022-11-15 10:30:33', NULL),
(89, 'Parent Forget to Assign Points', 5, 13, 317, '2022-11-15 10:30:34', NULL),
(90, 'Parent Forget to Assign Points', 5, 13, 318, '2022-11-15 10:30:34', NULL),
(91, 'Parent Forget to Assign Points', 5, 13, 319, '2022-11-15 10:30:34', NULL),
(92, 'Parent Forget to Assign Points', 5, 14, 320, '2022-11-15 10:30:34', NULL),
(93, 'Parent Forget to Assign Points', 5, 14, 321, '2022-11-15 10:30:34', NULL),
(94, 'Parent Forget to Assign Points', 5, 14, 322, '2022-11-15 10:30:34', NULL),
(95, 'Parent Forget to Assign Points', 5, 14, 323, '2022-11-15 10:30:34', NULL),
(96, 'Parent Forget to Assign Points', 5, 14, 324, '2022-11-15 10:30:34', NULL),
(97, 'Parent Forget to Assign Points', 5, 14, 325, '2022-11-15 10:30:35', NULL),
(98, 'Parent Forget to Assign Points', 5, 14, 326, '2022-11-15 10:30:35', NULL),
(99, 'Parent Forget to Assign Points', 5, 14, 327, '2022-11-15 10:30:35', NULL),
(100, 'Parent Forget to Assign Points', 5, 14, 328, '2022-11-15 10:30:35', NULL),
(101, 'Parent Forget to Assign Points', 5, 14, 329, '2022-11-15 10:30:35', NULL),
(102, 'Parent Forget to Assign Points', 5, 14, 330, '2022-11-15 10:30:35', NULL),
(103, 'Parent Forget to Assign Points', 5, 14, 331, '2022-11-15 10:30:35', NULL),
(104, 'Parent Forget to Assign Points', 5, 15, 332, '2022-11-15 10:30:35', NULL),
(105, 'Parent Forget to Assign Points', 5, 15, 333, '2022-11-15 10:30:35', NULL),
(106, 'Parent Forget to Assign Points', 5, 15, 334, '2022-11-15 10:30:36', NULL),
(107, 'Parent Forget to Assign Points', 5, 15, 335, '2022-11-15 10:30:36', NULL),
(108, 'Parent Forget to Assign Points', 5, 15, 336, '2022-11-15 10:30:36', NULL),
(109, 'Parent Forget to Assign Points', 5, 15, 337, '2022-11-15 10:30:36', NULL),
(110, 'Parent Forget to Assign Points', 5, 15, 338, '2022-11-15 10:30:36', NULL),
(111, 'Parent Forget to Assign Points', 5, 15, 339, '2022-11-15 10:30:36', NULL),
(112, 'Parent Forget to Assign Points', 5, 15, 340, '2022-11-15 10:30:36', NULL),
(113, 'Parent Forget to Assign Points', 5, 15, 341, '2022-11-15 10:30:36', NULL),
(114, 'Parent Forget to Assign Points', 5, 15, 342, '2022-11-15 10:30:36', NULL),
(115, 'Parent Forget to Assign Points', 5, 15, 343, '2022-11-15 10:30:36', NULL),
(116, 'Parent Forget to Assign Points', 5, 16, 344, '2022-11-15 10:30:37', NULL),
(117, 'Parent Forget to Assign Points', 5, 16, 345, '2022-11-15 10:30:37', NULL),
(118, 'Parent Forget to Assign Points', 5, 16, 346, '2022-11-15 10:30:37', NULL),
(119, 'Parent Forget to Assign Points', 5, 16, 347, '2022-11-15 10:30:37', NULL),
(120, 'Parent Forget to Assign Points', 5, 16, 348, '2022-11-15 10:30:37', NULL),
(121, 'Parent Forget to Assign Points', 5, 16, 349, '2022-11-15 10:30:37', NULL),
(122, 'Parent Forget to Assign Points', 5, 16, 350, '2022-11-15 10:30:37', NULL),
(123, 'Parent Forget to Assign Points', 5, 16, 351, '2022-11-15 10:30:37', NULL),
(124, 'Parent Forget to Assign Points', 5, 16, 352, '2022-11-15 10:30:37', NULL),
(125, 'Parent Forget to Assign Points', 5, 16, 353, '2022-11-15 10:30:37', NULL),
(126, 'Parent Forget to Assign Points', 5, 16, 354, '2022-11-15 10:30:37', NULL),
(127, 'Parent Forget to Assign Points', 5, 16, 355, '2022-11-15 10:30:38', NULL),
(128, 'Parent Forget to Assign Points', 5, 17, 356, '2022-11-15 10:30:38', NULL),
(129, 'Parent Forget to Assign Points', 5, 17, 357, '2022-11-15 10:30:38', NULL),
(130, 'Parent Forget to Assign Points', 5, 17, 358, '2022-11-15 10:30:38', NULL),
(131, 'Parent Forget to Assign Points', 5, 17, 359, '2022-11-15 10:30:38', NULL),
(132, 'Parent Forget to Assign Points', 5, 17, 360, '2022-11-15 10:30:38', NULL),
(133, 'Parent Forget to Assign Points', 5, 17, 361, '2022-11-15 10:30:38', NULL),
(134, 'Parent Forget to Assign Points', 5, 17, 362, '2022-11-15 10:30:38', NULL),
(135, 'Parent Forget to Assign Points', 5, 17, 363, '2022-11-15 10:30:38', NULL),
(136, 'Parent Forget to Assign Points', 5, 17, 364, '2022-11-15 10:30:38', NULL),
(137, 'Parent Forget to Assign Points', 5, 17, 365, '2022-11-15 10:30:39', NULL),
(138, 'Parent Forget to Assign Points', 5, 17, 366, '2022-11-15 10:30:39', NULL),
(139, 'Parent Forget to Assign Points', 5, 17, 367, '2022-11-15 10:30:39', NULL),
(152, 'jbjvh', 5, 14, 404, '2022-12-06 12:33:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('ashutoshchauhan129@gmail.com', 'qJeWauZdkcqeijZI6OhvBLzr1xJCHbx8ZDXf8s0v9IiIN3FlpqSjmKL062OSoZHF', '2022-11-23 18:18:28'),
('anandquantumitinnovation@gmail.com', '59pAQ4yNDgfoBTFzJ2sjPZgLOrXlAa87IExCvCAG0dTAKR0Az1zYWNUAKOpmSivf', '2022-11-23 18:51:25'),
('ashutoshchauhan129@gmail.com', '1whLuLJKT3YeyLXX7767TsKWKqtv5ibkHrMSQZX6X5OhhmvajOtg1SX7hVJieVuQ', '2022-11-23 18:51:52'),
('mireille9510@gmail.com', 'sLJysz3WUI3B4yuEOmqdizUFZnaXISSXBvhwOa7DPpGNfDMGjFCbLRF6WuVbEVRx', '2022-11-28 11:55:22');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `userId` varchar(191) DEFAULT NULL,
  `password` varchar(191) DEFAULT NULL,
  `gender` varchar(191) NOT NULL,
  `dateOfBirth` varchar(191) NOT NULL,
  `class` varchar(191) NOT NULL,
  `profilePic` varchar(191) DEFAULT NULL,
  `bio` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `hex` enum('#F8DF81','#F6AA90','#F6B4BF','#D5B6D5','#BADFDA','#9BD0B7','#E5EBD7','#96C3EB','#E6E6E6','#FFE3D1') DEFAULT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `points_by_parent` tinyint(1) DEFAULT NULL,
  `points_by_teacher` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `userId`, `password`, `gender`, `dateOfBirth`, `class`, `profilePic`, `bio`, `created_at`, `updated_at`, `hex`, `parent_id`, `points_by_parent`, `points_by_teacher`) VALUES
(10, 'john', 'john123', '$2y$10$COYkHjTOHQGNpke5DN9RjuUga8rPGWNFnpRBMJxEGUnqrYmsUvva6', 'Male', '11/11/2001', '11', 'icon-male.png', 'teamplayer, hardworking, quick learner', '2022-10-19 14:47:15', '2022-12-06 05:27:46', '#F8DF81', 5, 0, 0),
(13, 'Ayushi', 'ayushi', '$2y$10$/UG4WTAnKoPFbfCicv3f/ecjhDzk3qV/qhE7uPHlZRwpdBypyID0O', 'Female', '02/11/2001', '4', 'icon-female.png', 'smart, hardworking', '2022-11-02 08:53:24', '2022-11-18 12:05:06', '#F6AA90', 5, 0, 0),
(14, 'Ankit Sawner', 'ankit_sawner', '$2y$10$QEfDO.146FKBuHn8H7.TOOvfTBWUWub2CEwcZqF.c7R7rn4kKDa4a', 'Male', '02/11/2022', '11', 'icon-male.png', NULL, '2022-11-09 23:39:36', '2022-12-06 12:33:56', '#F6B4BF', 5, 0, 0),
(15, 'Rohit Rajput', 'rohit_rajput', '$2y$10$bJI2j66OIml.2VO9Loq0mO4/SkAiOUGuzDTS5mEsOPvssZHappwIi', 'Male', '01/11/2022', '11', 'icon-male.png', NULL, '2022-11-09 23:40:26', '2022-11-14 18:29:02', '#D5B6D5', 5, 0, NULL),
(16, 'Anu', 'anuradha', '$2y$10$mb4tKDplKDgxxRN.dt4jg.yOIZXVH/FC/oWcdytHiPIQFkRyE5hnq', 'Female', '01/11/2022', '11', 'icon-female.png', NULL, '2022-11-09 23:40:54', '2022-11-14 18:29:02', '#BADFDA', 5, 0, NULL),
(17, 'Harshit Modi', 'harshit_modi', '$2y$10$9F1ZSH1R34WPQ9Eddqp0heqtVsAk.DKJmM4A2whcMtfhvQjYYjfsa', 'Male', '01/11/2022', '3', 'icon-male.png', NULL, '2022-11-09 23:41:41', '2022-11-18 12:02:05', '#9BD0B7', 5, 0, NULL),
(22, 'yahika vaishnav', 'yahikavaishnav', '$2y$10$Y.6GWQgMC0Yz4QBHnN0RH.qT/47u2lPAj1VRGgrWJoUel2F6HN20G', 'Female', '01/11/2022', '4', 'icon-female.png', NULL, '2022-11-23 12:40:11', NULL, '#E5EBD7', 5, NULL, NULL),
(23, 'Ramesh Sodhi', 'ramesh_sodhi', '$2y$10$6xw6IpD.YcLQtARf4xII0e0tkAm10GEePNQMtggP/qpYQp9NfhxQ.', 'Male', '01/11/2022', '4', 'icon-male.png', NULL, '2022-11-23 12:43:31', NULL, '#96C3EB', 5, NULL, NULL),
(24, 'peggy', 'peggy', '$2y$10$wfTYwGMEAwtxe1OIKnkchOMN3g41omP5vI4pyTkCpjWLJ1n9kmpiq', 'Male', '23 / 08 / 1998', '4', 'icon-male.png', NULL, '2022-11-29 05:16:46', NULL, '#F8DF81', 29, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_group`
--

CREATE TABLE `student_group` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `studentId` bigint(20) UNSIGNED DEFAULT NULL,
  `groupId` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_group`
--

INSERT INTO `student_group` (`id`, `created_at`, `updated_at`, `studentId`, `groupId`) VALUES
(47, '2022-11-10 22:47:18', '2022-11-10 22:47:18', 10, 14),
(55, '2022-11-18 09:45:43', '2022-11-18 09:45:43', 13, 18),
(61, '2022-11-23 08:58:39', '2022-11-23 08:58:39', 16, 14),
(62, '2022-11-23 08:58:49', '2022-11-23 08:58:49', 14, 14),
(63, '2022-11-29 05:27:08', '2022-11-29 05:27:08', 24, 20);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `contact` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `dob` varchar(191) DEFAULT NULL,
  `gender` varchar(191) DEFAULT NULL,
  `profilePic` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `email`, `contact`, `password`, `dob`, `gender`, `profilePic`, `created_at`, `updated_at`) VALUES
(1, 'ashutosh chauhan', 'ashutoshchauhan129@gmail.com', '8468921900', '$2y$10$4tOgTR0ItqBd9VTQm9JIeOJukPI3AtKH55GiMLH6M3HoQE6wH9yfK', '2001-11-11', 'Male', '', '2022-10-18 07:58:19', '2022-10-18 07:58:19'),
(2, 'Teacher 1', 'teacher1@gmail.com', '7889653423', '$2y$10$Lb23Ndax.X2G0jTX8/e2Med49.wiCPxPMAqHVhwZj6iKK1twcA78.', '2005-06-19', 'Female', '', '2022-10-19 13:37:22', '2022-10-19 13:37:22'),
(3, 'Teacher2', 'teacher2@gmail.com', '9889055510', '$2y$10$Xss6Qn.WHDsb2fFdgSJBl./WmLYxzSQPnELtzTkx3.Jk71Cg5sJUC', '1992-06-27', NULL, NULL, '2022-10-27 12:21:34', '2022-10-27 12:21:34'),
(4, 'Ashutosh Teacher', 'ashutosh@gmail.com', '8468921978', '$2y$10$RRut54sVDTeLZYTd7mxp7eK1y.G.6G0Ds0fzPfuDf7z.4V6KWjy7S', '2001-11-11', NULL, NULL, '2022-11-03 01:41:54', '2022-11-03 01:41:54'),
(7, 'Ayush Singh', 'ayushsingh@gmail.com', '9889055589', '$2y$10$TWpXl3glkmoYigSPwZMItuU3NN2T.MoHopB11qhF/4j020dStaPia', NULL, NULL, NULL, '2022-11-03 15:02:12', '2022-11-03 15:02:12'),
(8, 'Aashish Singh', 'aashish@gmail.com', '9224343955', '$2y$10$YCg363NCMKlki1gCjh4eoezk/TgcwS5l1oeqvTJAmvA6OmpvK1eG.', '1997-09-23', NULL, NULL, '2022-11-04 13:18:59', '2022-11-04 13:18:59'),
(9, 'Anand Bairagi', 'anandbairagi500@gmail.com', '1234567890', '$2y$10$Ia.WKvH3LGlSBLKgqjSb6OF.j7bu5VQIPHIhyX6D1zmG4ZehNTvD2', NULL, NULL, NULL, '2022-11-11 05:44:00', '2022-11-24 22:03:35'),
(10, 'Keshav Sugaliya', 'keshav@gmail.com', '1230456789', '$2y$10$RwGv2BaA584TIk9vC2RCr.Dllw2Fs2Td1WbYRi/XV/Aac9o1QvEG.', NULL, NULL, NULL, '2022-11-18 19:06:53', '2022-11-18 19:06:53'),
(11, 'Rakesh', 'rakesh@gmail.com', '0123456789', '$2y$10$8MoxEnlSkzvp0MJ1Il08k.OYOsjWsa/x8bn4Q76FHEPy07co/Q9RG', NULL, NULL, NULL, '2022-11-22 16:30:27', '2022-11-22 16:30:27'),
(12, 'mireille9510', 'mireille9510@gmail.com', '9871641320', '$2y$10$L1ZkYWIfpBNasf4eGf3hvehvodDqbu11jrRvqZLkvrLNqRd9A05/G', NULL, NULL, NULL, '2022-11-28 11:50:11', '2022-11-28 11:54:49');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_assign_points`
--

CREATE TABLE `teacher_assign_points` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reason` varchar(191) DEFAULT NULL,
  `point` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `studentId` bigint(20) UNSIGNED DEFAULT NULL,
  `teacherId` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teacher_assign_points`
--

INSERT INTO `teacher_assign_points` (`id`, `reason`, `point`, `created_at`, `updated_at`, `studentId`, `teacherId`) VALUES
(169, 'punctual', 1, '2022-11-16 05:41:56', '2022-11-16 05:41:57', 14, 1),
(170, 'discipline', 0, '2022-11-16 05:41:57', '2022-11-16 05:41:57', 14, 1),
(171, 'respectful', 0, '2022-11-16 05:41:57', '2022-11-16 05:41:57', 14, 1),
(172, 'contributing', 1, '2022-11-16 05:41:57', '2022-11-16 05:41:57', 14, 1),
(173, 'organized', 1, '2022-11-16 05:41:57', '2022-11-16 05:41:57', 14, 1),
(174, 'performing', 1, '2022-11-16 05:41:57', '2022-11-16 05:41:57', 14, 1),
(175, 'responsible', 1, '2022-11-16 05:41:57', '2022-11-16 05:41:57', 14, 1),
(176, 'co-operative', 1, '2022-11-16 05:41:57', '2022-11-16 05:41:57', 14, 1),
(177, 'leadership', 1, '2022-11-16 05:41:57', '2022-11-16 05:41:57', 14, 1),
(178, 'determined', 1, '2022-11-16 05:41:57', '2022-11-16 05:41:57', 14, 1),
(179, 'self confident', 1, '2022-11-16 05:41:57', '2022-11-16 05:41:57', 14, 1),
(180, 'obedient', 0, '2022-11-16 05:41:57', '2022-11-16 05:41:57', 14, 1),
(193, 'punctual', 1, '2022-12-06 12:27:46', '2022-12-06 05:27:46', 10, 1),
(194, 'discipline', 1, '2022-12-06 12:27:46', '2022-12-06 05:27:46', 10, 1),
(195, 'respectful', 1, '2022-12-06 12:27:46', '2022-12-06 05:27:46', 10, 1),
(196, 'contributing', 1, '2022-12-06 12:27:46', '2022-12-06 05:27:46', 10, 1),
(197, 'organized', 1, '2022-12-06 12:27:46', '2022-12-06 05:27:46', 10, 1),
(198, 'performing', 1, '2022-12-06 12:27:46', '2022-12-06 05:27:46', 10, 1),
(199, 'responsible', 0, '2022-12-06 12:27:46', '2022-12-06 05:27:46', 10, 1),
(200, 'co-operative', 0, '2022-12-06 12:27:46', '2022-12-06 05:27:46', 10, 1),
(201, 'leadership', 1, '2022-12-06 12:27:46', '2022-12-06 05:27:46', 10, 1),
(202, 'determined', 1, '2022-12-06 12:27:46', '2022-12-06 05:27:46', 10, 1),
(203, 'obedient', 1, '2022-12-06 12:27:46', '2022-12-06 05:27:46', 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_classes`
--

CREATE TABLE `teacher_classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `teacherId` varchar(191) NOT NULL,
  `class` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teacher_classes`
--

INSERT INTO `teacher_classes` (`id`, `teacherId`, `class`, `created_at`, `updated_at`) VALUES
(1, '1', '11', NULL, NULL),
(2, '1', '12', NULL, NULL),
(3, '2', '3', NULL, NULL),
(4, '2', '4', NULL, NULL),
(5, '2', '5', NULL, NULL),
(6, '3', '2', NULL, NULL),
(7, '3', '3', NULL, NULL),
(8, '3', '4', NULL, NULL),
(9, '3', '6', NULL, NULL),
(10, '4', '11', NULL, NULL),
(11, '4', '12', NULL, NULL),
(12, '4', '13', NULL, NULL),
(13, '7', '9', NULL, NULL),
(14, '7', '10', NULL, NULL),
(15, '7', '11', NULL, NULL),
(16, '7', '12', NULL, NULL),
(17, '8', '3', NULL, NULL),
(18, '8', '4', NULL, NULL),
(19, '9', '11', NULL, NULL),
(20, '9', '14', NULL, NULL),
(21, '10', '2', NULL, NULL),
(22, '11', '6', NULL, NULL),
(23, '12', '4', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_feedbacks`
--

CREATE TABLE `teacher_feedbacks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `teacherId` varchar(191) NOT NULL,
  `studentId` varchar(191) NOT NULL,
  `title` varchar(191) NOT NULL,
  `description` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teacher_feedbacks`
--

INSERT INTO `teacher_feedbacks` (`id`, `teacherId`, `studentId`, `title`, `description`, `created_at`, `updated_at`, `parent_id`) VALUES
(1, '2', '9', 'About Punctuality', 'Be punctual .You always late', '2022-10-15 07:00:00', '2022-10-12 06:13:10', NULL),
(2, '2', '3', 'ghkjlk', 'hfdg;k\'hlf', '2022-10-26 06:13:19', '2022-10-26 06:13:19', NULL),
(3, '1', '10', 'test feedback', 'asadaddsdsdf', '2022-10-08 06:14:32', '2022-10-31 06:14:32', 5),
(4, '1', '10', 'feedback for John', 'feedback given on 3 november', '2022-08-10 05:14:02', '2022-11-03 05:14:02', 5),
(5, '1', '5', 'd', 'c', '2022-11-03 09:10:37', '2022-11-03 09:10:37', NULL),
(6, '1', '13', 'Awesome', 'awesome hai aapka bacha', '2022-11-04 14:22:45', '2022-11-04 14:22:45', 5),
(7, '1', '10', 'From Anand', 'fudhiudhadg', '2022-11-09 07:51:38', '2022-11-09 07:51:38', 5),
(8, '1', '13', 'From Anand Teacher', 'fniudfhfjf', '2022-11-10 17:16:39', '2022-11-10 17:16:39', NULL),
(9, '1', '14', 'Feed back from Anand Teacher', 'jjfhnlkmnkjnvcmxvcx,vcvcxvvxz', '2022-11-10 20:26:22', '2022-11-10 20:26:22', NULL),
(10, '8', '13', 'Good Work', 'Done assignment on time', '2022-11-18 10:11:28', '2022-11-18 10:11:28', NULL),
(11, '8', '21', 'Good Work 2', 'DOne work on time', '2022-11-18 10:12:02', '2022-11-18 10:12:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_point_comments`
--

CREATE TABLE `teacher_point_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `comment` text NOT NULL,
  `teacher_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `teacher_assign_point_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teacher_point_comments`
--

INSERT INTO `teacher_point_comments` (`id`, `comment`, `teacher_id`, `student_id`, `teacher_assign_point_id`, `created_at`, `updated_at`) VALUES
(6, 'hfiuofhisuf5985', 1, 14, 170, '2022-11-16 05:41:57', NULL),
(7, 'huygu', 1, 14, 171, '2022-11-16 05:41:57', NULL),
(8, 'hguygdds989', 1, 14, 180, '2022-11-16 05:41:58', NULL),
(10, 'ahhjckjjhhgjkhjkgfchjhgj', 1, 10, 199, '2022-12-06 12:27:46', NULL),
(11, 'hghdhfghjgfghjgfh', 1, 10, 200, '2022-12-06 12:27:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_projects`
--
ALTER TABLE `group_projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_projects_teacherid_foreign` (`teacherId`),
  ADD KEY `group_projects_groupid_foreign` (`groupId`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice_boards`
--
ALTER TABLE `notice_boards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parentkids`
--
ALTER TABLE `parentkids`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parents`
--
ALTER TABLE `parents`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `parents_email_unique` (`email`);

--
-- Indexes for table `parents_assign_points`
--
ALTER TABLE `parents_assign_points`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parent_feedbacks`
--
ALTER TABLE `parent_feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parent_point_comments`
--
ALTER TABLE `parent_point_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_point_comments_parent_id_foreign` (`parent_id`),
  ADD KEY `parent_point_comments_student_id_foreign` (`student_id`),
  ADD KEY `parent_point_comments_parents_assign_point_id_foreign` (`parents_assign_point_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `students_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `student_group`
--
ALTER TABLE `student_group`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_group_studentid_foreign` (`studentId`),
  ADD KEY `student_group_groupid_foreign` (`groupId`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `teachers_email_unique` (`email`),
  ADD UNIQUE KEY `teachers_contact_unique` (`contact`);

--
-- Indexes for table `teacher_assign_points`
--
ALTER TABLE `teacher_assign_points`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacher_assign_points_studentid_foreign` (`studentId`),
  ADD KEY `teacher_assign_points_teacherid_foreign` (`teacherId`);

--
-- Indexes for table `teacher_classes`
--
ALTER TABLE `teacher_classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_feedbacks`
--
ALTER TABLE `teacher_feedbacks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacher_feedbacks_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `teacher_point_comments`
--
ALTER TABLE `teacher_point_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacher_point_comments_teacher_id_foreign` (`teacher_id`),
  ADD KEY `teacher_point_comments_student_id_foreign` (`student_id`),
  ADD KEY `teacher_point_comments_teacher_assign_point_id_foreign` (`teacher_assign_point_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `group_projects`
--
ALTER TABLE `group_projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `notice_boards`
--
ALTER TABLE `notice_boards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `parentkids`
--
ALTER TABLE `parentkids`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `parents`
--
ALTER TABLE `parents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `parents_assign_points`
--
ALTER TABLE `parents_assign_points`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=415;

--
-- AUTO_INCREMENT for table `parent_feedbacks`
--
ALTER TABLE `parent_feedbacks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `parent_point_comments`
--
ALTER TABLE `parent_point_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `student_group`
--
ALTER TABLE `student_group`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `teacher_assign_points`
--
ALTER TABLE `teacher_assign_points`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=204;

--
-- AUTO_INCREMENT for table `teacher_classes`
--
ALTER TABLE `teacher_classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `teacher_feedbacks`
--
ALTER TABLE `teacher_feedbacks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `teacher_point_comments`
--
ALTER TABLE `teacher_point_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `group_projects`
--
ALTER TABLE `group_projects`
  ADD CONSTRAINT `group_projects_groupid_foreign` FOREIGN KEY (`groupId`) REFERENCES `groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `group_projects_teacherid_foreign` FOREIGN KEY (`teacherId`) REFERENCES `teachers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `parent_point_comments`
--
ALTER TABLE `parent_point_comments`
  ADD CONSTRAINT `parent_point_comments_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `parents` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `parent_point_comments_parents_assign_point_id_foreign` FOREIGN KEY (`parents_assign_point_id`) REFERENCES `parents_assign_points` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `parent_point_comments_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `parents` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `student_group`
--
ALTER TABLE `student_group`
  ADD CONSTRAINT `student_group_groupid_foreign` FOREIGN KEY (`groupId`) REFERENCES `groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_group_studentid_foreign` FOREIGN KEY (`studentId`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `teacher_assign_points`
--
ALTER TABLE `teacher_assign_points`
  ADD CONSTRAINT `teacher_assign_points_studentid_foreign` FOREIGN KEY (`studentId`) REFERENCES `students` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `teacher_assign_points_teacherid_foreign` FOREIGN KEY (`teacherId`) REFERENCES `teachers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `teacher_feedbacks`
--
ALTER TABLE `teacher_feedbacks`
  ADD CONSTRAINT `teacher_feedbacks_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `parents` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `teacher_point_comments`
--
ALTER TABLE `teacher_point_comments`
  ADD CONSTRAINT `teacher_point_comments_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `teacher_point_comments_teacher_assign_point_id_foreign` FOREIGN KEY (`teacher_assign_point_id`) REFERENCES `teacher_assign_points` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `teacher_point_comments_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
