-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2021 at 06:11 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lalmonirhutappdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `benefecials`
--

CREATE TABLE `benefecials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `beneficial_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_certificate` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `husband_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ward_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `village_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `holding_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_code_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_office_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `business_holds`
--

CREATE TABLE `business_holds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ward_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `road_moholla` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `institute_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `business_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `husband_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `institute_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner_current_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner_permanent_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_certificate` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_license_issue_year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trade_fee` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `singnboard_tax` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `business_tax` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `other` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trade_total` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_charge_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `added_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activate_by` int(11) DEFAULT NULL,
  `deactive_by` int(11) DEFAULT NULL,
  `active_at` timestamp NULL DEFAULT NULL,
  `deactive_at` timestamp NULL DEFAULT NULL,
  `hdtype` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `business_holds`
--

INSERT INTO `business_holds` (`id`, `user_id`, `ward_id`, `road_moholla`, `institute_name`, `business_type`, `owner_name`, `father_name`, `husband_name`, `mother_name`, `institute_address`, `owner_current_address`, `owner_permanent_address`, `nid`, `birth_certificate`, `mobile`, `image`, `last_license_issue_year`, `trade_fee`, `vat`, `singnboard_tax`, `business_tax`, `other`, `trade_total`, `service_charge_id`, `payment_type`, `status`, `created_at`, `updated_at`, `added_by`, `activate_by`, `deactive_by`, `active_at`, `deactive_at`, `hdtype`) VALUES
(299, '222022001', '22', 'TTERDR', 'MHQ Trade Shop', 'DERT', 'milton chowdhury', 'Milon Chowdhury', NULL, 'Asia Begum', 'skdjh faskhf kaSH Kahr', '31/34, DERt Colony', '31/34, DERt Colony', '12345678', NULL, '01737539213', 'public/upload/Bhold/0610031022a3462f.jpg', '2020', '100', NULL, '40', '20', '30', '205', '150', '1', '1', '2021-10-25 07:03:09', NULL, NULL, 9382, NULL, '2021-10-25 00:01:15', NULL, 0),
(300, '222021002', '21', 'ghdg sdfgs df', 'yjugyutyusertwrt', 'saerluhiuo', 'weasefvsere ers', 'ert serwe', NULL, '5tert', 'drfg ser sjolio ae fssrt', '3sdfg s drfg sdrfgs', 'drydtry aer ste', '34545', NULL, '45345345345', 'public/upload/Bhold/061001aedb533d55.jpg', '2020', '100', NULL, '50', '60', '0', '225', '150', '1', '0', '2021-10-06 09:01:31', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(301, '222018003', '18', 'Adipisicing accusamu', 'Ina Fox', 'Dolores tenetur quas', 'Fleur Brady', 'Echo Guerra', NULL, 'Blair Long', 'Eum quas veniam et', 'Perferendis eaque id', 'Perferendis eaque id', '5454454454', NULL, '01677242853', NULL, '2011', '7', NULL, '21', '12', '86', '141', '150', '1', '0', '2021-10-23 19:46:43', NULL, 'Frontend', NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `business_hold_rates`
--

CREATE TABLE `business_hold_rates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `house_type_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `use_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax_rate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `business_types`
--

CREATE TABLE `business_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_capital_range` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_capital_range` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chairmen`
--

CREATE TABLE `chairmen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `chairmen_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chairmen_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `speech` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `chaimen_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chaimen_image_singnature` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `commercial_holds`
--

CREATE TABLE `commercial_holds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hold_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `husband_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` varchar(22) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_certificate` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ward_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `holding_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_house` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `length_number` varchar(22) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `width_number` varchar(22) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number_room` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `house_year_value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `yearly_vat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_tax_year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_charge` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `added_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activate_by` int(11) DEFAULT NULL,
  `deactive_by` int(11) DEFAULT NULL,
  `active_at` timestamp NULL DEFAULT NULL,
  `deactive_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `commercial_holds`
--

INSERT INTO `commercial_holds` (`id`, `user_id`, `hold_type`, `owner_name`, `father_name`, `husband_name`, `dob`, `nid`, `birth_certificate`, `mobile`, `ward_id`, `holding_no`, `type_house`, `length_number`, `width_number`, `number_room`, `house_year_value`, `yearly_vat`, `last_tax_year`, `service_charge`, `payment_type`, `status`, `created_at`, `updated_at`, `added_by`, `activate_by`, `deactive_by`, `active_at`, `deactive_at`) VALUES
(1, '222022001', 'ব্যক্তি মালিকানাধীন', 'Milton Chowdhury', 'Milon Chowdhury', NULL, '19/6/1994', '33456789', NULL, '01737539213', '22', '56', '7', '2234', '3455', '5', '120', '128.4', '2020', '150', 'Nagad', '1', '2021-10-09 01:54:25', NULL, NULL, 1, 1, '2021-10-12 00:18:08', '2021-10-12 00:17:25'),
(2, '222220002', 'বেসরকারী প্রতিষ্টান', 'Abraham Edwards', 'Justine Figueroa', NULL, '5/4/1998', NULL, '5455455445', '01677242853', '20', '45', '7', '198', '144', '639', '5454', '5835.78', '2015', '150', 'Bank', '0', '2021-10-23 20:03:18', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `councilors`
--

CREATE TABLE `councilors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ward_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `councilors`
--

INSERT INTO `councilors` (`id`, `name`, `ward_no`, `image`, `created_at`, `updated_at`) VALUES
(12, 'Counsilor Name', '1', 'upload/Councilor/1632963735.jpg', NULL, NULL),
(13, 'Counsilor Name', '2', 'upload/Councilor/1632963756.jpg', NULL, NULL),
(14, 'Counsilor Name', '3', 'upload/Councilor/1632963778.jpg', NULL, NULL),
(15, 'Counsilor Name', '4', 'upload/Councilor/1632963784.jpg', NULL, NULL),
(16, 'Counsilor Name', '5', 'upload/Councilor/1632963791.jpg', NULL, NULL),
(17, 'Counsilor Name', '6', 'upload/Councilor/1632963797.jpg', NULL, NULL),
(18, 'Counsilor Name', '7', 'upload/Councilor/1632963804.jpg', NULL, NULL),
(19, 'Counsilor Name', '8', 'upload/Councilor/1632963810.jpg', NULL, NULL),
(20, 'Counsilor Name', '9', 'upload/Councilor/1632963817.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `due_trade_licenses`
--

CREATE TABLE `due_trade_licenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `month` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_years` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `previous_due` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_due` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pay_sum` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remain_due` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `general_members`
--

CREATE TABLE `general_members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `husband_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `martial_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `day` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `month` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_certificate` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `religion_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `family_class` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ward_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `village_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `holding_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_code_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_office_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_house` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `length_number` varchar(22) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `width_number` varchar(22) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number_room` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `monthly_income` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `house_year_value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `yearly_vat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `occupation_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_tax_year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_charge` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `added_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activate_by` int(11) DEFAULT NULL,
  `deactive_by` int(11) DEFAULT NULL,
  `active_at` timestamp NULL DEFAULT NULL,
  `deactive_at` timestamp NULL DEFAULT NULL,
  `hdtype` int(11) NOT NULL DEFAULT 0,
  `member_male` int(11) DEFAULT NULL,
  `member_female` int(11) DEFAULT NULL,
  `biddut` int(11) DEFAULT NULL,
  `sanitation` int(11) DEFAULT NULL,
  `photo` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'img/usericon.jpg',
  `height` float DEFAULT NULL,
  `wide` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `general_members`
--

INSERT INTO `general_members` (`id`, `user_id`, `name`, `father_name`, `husband_name`, `mother_name`, `gender`, `martial_status`, `day`, `month`, `year`, `nid`, `birth_certificate`, `mobile`, `religion_id`, `family_class`, `ward_id`, `village_id`, `holding_no`, `post_code_id`, `post_office_id`, `type_house`, `length_number`, `width_number`, `number_room`, `monthly_income`, `house_year_value`, `yearly_vat`, `occupation_id`, `last_tax_year`, `service_charge`, `payment_type`, `status`, `created_at`, `updated_at`, `added_by`, `activate_by`, `deactive_by`, `active_at`, `deactive_at`, `hdtype`, `member_male`, `member_female`, `biddut`, `sanitation`, `photo`, `height`, `wide`) VALUES
(7555, '222011001', 'মোঃ মিজানুর রহমান', 'মৃত নজরুল ইসলাম', NULL, 'সাহারা বেগম', '1', '1', '5', '12', '1985', '7791226397', NULL, '01714692986', '1', '3', '16', '80', '3/52', '11', '16', '3', '', '', '3', NULL, '0', '0', '1', '2010', '150.00', '1', '1', '2021-09-28 06:28:50', NULL, 'superadmin', 9382, NULL, NULL, NULL, 0, 3, 4, 1, 2, 'img/usericon.jpg', NULL, NULL),
(7556, '222011002', 'সুদান চন্দ্র রায়', 'সুরেন্দ্র চন্দ্র রায়', NULL, 'শান্তিবালা রায়', '1', '1', '2', '1', '1967', '8222881404', '7791226397', '01712808314', '2', '1', '16', '80', '3/53', '11', '16', '1', '', '', '13', NULL, '0', '0', '1', '2010', '150.00', '1', '0', '2021-09-28 06:34:26', NULL, 'superadmin', NULL, NULL, NULL, NULL, 0, 2, 1, 1, 1, 'img/usericon.jpg', NULL, NULL),
(7557, '222011003', 'মেঘনা রানী রায়', 'সুনিল চন্দ্র রায়', NULL, 'বাজোবালা রায় দেউরি', '2', '1', '21', '4', '1974', '7772705823', NULL, '01633131514', '2', '2', '16', '77', '৩/৫৫', '11', '16', '2', '', '', '২', NULL, '0', '0', '1', '2010', '150.00', '1', '0', '2021-09-28 06:39:51', NULL, 'superadmin', NULL, NULL, NULL, NULL, 0, 1, 3, 1, 1, 'img/usericon.jpg', NULL, NULL),
(7558, '222011004', 'রাজ কমার বর্মন', 'মৃত প্রভাত চন্দ্র বর্মন', NULL, 'মৃত নিরাশী বর্মন', '1', '1', '13', '4', '1968', '5225503115590', NULL, '01731171472', '2', '2', '16', '80', '3/56', '11', '16', '2', '', '', '2', NULL, '0', '0', '1', '2010', '150.00', '1', '0', '2021-09-28 06:40:16', NULL, 'superadmin', NULL, NULL, NULL, NULL, 0, 2, 2, 1, 1, 'img/usericon.jpg', NULL, NULL),
(7559, '222011005', 'ভুপেন চন্দ্র বর্মন', 'মৃত রাম সুন্দর বর্মন', NULL, 'মৃত বালা বর্মন', '1', '1', '28', '8', '1977', '1492592686', NULL, '01703606218', '2', '2', '16', '80', '৩/৭২', '11', '16', '2', '', '', '২', NULL, '0', '0', '1', '2010', '150.00', '1', '0', '2021-09-28 06:52:14', NULL, 'superadmin', NULL, NULL, NULL, NULL, 0, 3, 1, 1, 1, 'img/usericon.jpg', NULL, NULL),
(7560, '222011006', 'নিগমানন্দ', 'মৃত প্রফুল্ল কুমার রায় নায়েক', NULL, 'ম্যানেকা রায় নায়েক', '1', '1', '2', '10', '1970', NULL, NULL, '01764857356', '2', '2', '16', '80', '৩/৭৫', '11', '16', '1', '', '', '৩', NULL, '0', '0', '6', '2010', '150.00', '1', '0', '2021-09-28 07:03:31', NULL, 'superadmin', NULL, NULL, NULL, NULL, 0, 2, 1, 1, 1, 'img/usericon.jpg', NULL, NULL),
(7561, '222011007', 'যোগানন্দ বর্মন', 'মৃত যোগেশ চন্দ্র বর্মন', NULL, 'মৃত করময়ী বর্মন', '1', '1', '1', '1', '1996', '5225502111179', NULL, '01731240332', '2', '2', '16', '80', '৩/৭৯', '11', '16', '2', '', '', '৩', NULL, '0', '0', '1', '2010', '150.00', '1', '0', '2021-09-28 07:13:13', NULL, 'superadmin', NULL, NULL, NULL, NULL, 0, 1, 3, 1, 1, 'img/usericon.jpg', NULL, NULL),
(7562, '222011008', 'বিমল ইন্দু সরকার', 'মৃত শশী ভূষন সরকার', NULL, 'শরজিনী সরকার', '1', '1', '20', '12', '1954', '5522456911', NULL, '01712117581', '2', '1', '16', '80', '৩/৮২', '11', '16', '1', '', '', '৫', NULL, '0', '0', '1', '2010', '150.00', '1', '0', '2021-09-28 07:27:36', NULL, 'superadmin', NULL, NULL, NULL, NULL, 0, 2, 3, 1, 1, 'img/usericon.jpg', NULL, NULL),
(7563, '222011009', 'কেশব দেব রায়', 'মৃত ধরনী কান্ত দেব রায়', NULL, 'মৃত শশী বালা রায়', '1', '1', '21', '10', '1955', '7322480323', NULL, '01735104765', '2', '2', '16', '80', '৩/৮৪', '11', '16', '3', '', '', '৩', NULL, '0', '0', '2', '2010', '150.00', '1', '0', '2021-09-28 07:42:47', NULL, 'superadmin', NULL, NULL, NULL, NULL, 0, 3, 1, 1, 1, 'img/usericon.jpg', NULL, NULL),
(7564, '222011010', 'অনিল দেব রায়', 'মৃত ধরনি কান্ত দেব রায়', NULL, 'মৃত শশী বালা রায়', '1', '1', '27', '4', '1958', NULL, NULL, '01730599272', '2', '2', '16', '80', '৩/৮৫', '11', '16', '2', '', '', '৫', NULL, '0', '0', '40', '2010', '150.00', '1', '0', '2021-09-28 07:48:19', NULL, 'superadmin', NULL, NULL, NULL, NULL, 0, 2, 2, 1, 1, 'img/usericon.jpg', NULL, NULL),
(7565, '222011011', 'আ.ফ.ম.  আবু দাউদ', 'মৃত ঃঃ লোকমান আলী', NULL, 'মোছা ঃঃ রাবেয়া বেগম', '1', '1', '4', '11', '1985', '7758599729', NULL, '01997678305', '1', '1', '14', '79', '319', '11', '16', '1', '', '', '8', NULL, '0', '0', '6', '2010', '150.00', '1', '1', '2021-10-25 07:52:31', NULL, 'superadmin', 9382, 9382, '2021-10-24 23:58:57', '2021-10-24 23:58:51', 0, 4, 2, 1, 1, 'img/usericon.jpg', NULL, NULL),
(7566, '222011012', 'মোঃ আব্দুল বারেক', 'মৃত শামসুল হক', NULL, 'মৃত রাহেলা খাতুন', '1', '1', '5', '7', '1967', '5225501104889', NULL, '01727215253', '1', '2', '14', '79', '321', '11', '16', '2', '', '', '3', NULL, '0', '0', '6', '2010', '150.00', '1', '0', '2021-09-28 07:57:29', NULL, 'superadmin', NULL, NULL, NULL, NULL, 0, 2, 2, 1, 2, 'img/usericon.jpg', NULL, NULL),
(7567, '222011013', 'মোঃ আব্দুর রহিম', 'মৃত মোহাম্মদ আলি', NULL, 'মৃত টেপরি বেগম', '1', '1', '14', '6', '1964', '5225501104524', NULL, '01885624301', '1', '2', '14', '79', '322', '11', '16', '3', '', '', '4', NULL, '0', '0', '5', '2010', '150.00', '1', '0', '2021-09-28 08:01:13', NULL, 'superadmin', NULL, NULL, NULL, NULL, 0, 2, 1, 1, 2, 'img/usericon.jpg', NULL, NULL),
(7568, '222011014', 'মোঃ আঃ মতিন', 'মৃতঃ মহসিন  আলী', NULL, 'জাহেদা খাতুন', '1', '1', '22', '5', '1977', '1473519976', NULL, '01718052873', '1', '2', '14', '79', '324', '11', '16', '2', '', '', '3', NULL, '0', '0', '1', '2010', '150.00', '1', '0', '2021-09-28 08:05:49', NULL, 'superadmin', NULL, NULL, NULL, NULL, 0, 1, 1, 1, 1, 'img/usericon.jpg', NULL, NULL),
(7569, '222011015', 'শ্রী সুনিল চক্রবর্তী', 'বিকাশ রন্জন চক্রবর্তী', NULL, 'মিলন চক্রবর্তী', '1', '1', '1', '2', '1966', '1472454881', NULL, '01738385478', '2', '2', '16', '80', '৩/৫৯', '11', '16', '2', '', '', '৩', NULL, '0', '0', '1', '2010', '150.00', '1', '0', '2021-09-28 08:08:45', NULL, 'superadmin', NULL, NULL, NULL, NULL, 0, 5, 3, 1, 1, 'img/usericon.jpg', NULL, NULL),
(7570, '222011016', 'মোছাঃ সায়েরা বেগম', 'শমসের উদ্দিন', NULL, 'মৃত কাচুয়ানি', '2', '1', '11', '7', '1947', '7322454666', NULL, '01766486730', '1', '3', '14', '79', '327', '11', '16', '3', '', '', '1', NULL, '0', '0', '26', '2010', '150.00', '1', '0', '2021-09-28 08:10:51', NULL, 'superadmin', NULL, NULL, NULL, NULL, 0, 2, 1, 1, 3, 'img/usericon.jpg', NULL, NULL),
(7571, '222011017', 'নির্মলেন্দু বর্মন', 'মৃত অনন্ত কুমার বর্মন', NULL, 'বিন্দু রানী', '1', '1', '1', '8', '1966', '5225503113247', NULL, '01737793144', '2', '2', '16', '80', '৩/৬০', '11', '16', '2', '', '', '৩', NULL, '0', '0', '1', '2010', '150.00', '1', '0', '2021-09-28 08:13:47', NULL, 'superadmin', NULL, NULL, NULL, NULL, 0, 2, 1, 1, 1, 'img/usericon.jpg', NULL, NULL),
(7572, '222011018', 'মোঃ ইউসুফ আলী', 'মৃত ফয়েজ উদ্দিন', NULL, 'মোছাঃ মেহেরু নেসা', '1', '1', '10', '4', '1956', '19655225501105016', NULL, '01765060742', '1', '2', '14', '79', '332', '11', '16', '2', '', '', '4', NULL, '0', '0', '1', '2010', '150.00', '1', '0', '2021-09-28 08:15:54', NULL, 'superadmin', NULL, NULL, NULL, NULL, 0, 2, 1, 1, 1, 'img/usericon.jpg', NULL, NULL),
(7573, '222011019', 'মধুসূদন বর্মন', 'প্রফুল্ল চন্দ্র বর্মন', NULL, 'সুমিতা বর্মন', '1', '1', '12', '1', '1987', '8672901579', NULL, '01751429941', '2', '2', '16', '80', '৩/৬১', '11', '16', '2', '', '', '৪', NULL, '0', '0', '1', '2010', '150.00', '1', '0', '2021-09-28 08:17:52', NULL, 'superadmin', NULL, NULL, NULL, NULL, 0, 1, 3, 1, 1, 'img/usericon.jpg', NULL, NULL),
(7574, '222011020', 'মোঃ পেয়ারুল ইসলাম', 'মৃত পণির উদ্দিন', NULL, 'খোদেজা বেগম', '1', '1', '14', '6', '1964', '7322513693', NULL, '01712479904', '1', '2', '14', '79', '334', '11', '16', '2', '', '', '4', NULL, '0', '0', '6', '2010', '150.00', '1', '0', '2021-09-28 08:19:53', NULL, 'superadmin', NULL, NULL, NULL, NULL, 0, 2, 1, 1, 1, 'img/usericon.jpg', NULL, NULL),
(7575, '222011021', 'শ্রী রজনী কান্ত বর্মন', 'মৃত উপেন্দ্রনাথ বর্মন', NULL, 'মৃত শ্রীমতি খুকি রানী', '1', '1', '8', '2', '1974', '9122700371', NULL, '01736587035', '2', '2', '16', '80', '৩/৬২', '11', '16', '3', '', '', '২', NULL, '0', '0', '1', '2010', '150.00', '1', '0', '2021-09-28 08:21:26', NULL, 'superadmin', NULL, NULL, NULL, NULL, 0, 2, 2, 1, 1, 'img/usericon.jpg', NULL, NULL),
(7576, '222011022', 'রাজেন্দ্র নাথ বর্মন', 'মৃত উপেন্দ্র নাথ বর্মন', NULL, 'শ্রীমতি খুকি রানী', '1', '1', '10', '1', '1974', '6451413014', NULL, '01740101703', '2', '2', '16', '80', '৩/৬৩', '11', '16', '2', '', '', '৪', NULL, '0', '0', '1', '2010', '150.00', '1', '0', '2021-09-28 08:25:08', NULL, 'superadmin', NULL, NULL, NULL, NULL, 0, 2, 1, 1, 1, 'img/usericon.jpg', NULL, NULL),
(7577, '222011023', 'মোঃ জাকির হোসেন', 'মোঃ মজিবর রহমান', NULL, 'সুফিয়া রহমান', '1', '1', '15', '11', '1981', '3217471165', NULL, '01720044441', '1', '2', '14', '79', '339', '11', '16', '2', '', '', '4', NULL, '0', '0', '1', '2010', '150.00', '1', '0', '2021-09-28 08:26:24', NULL, 'superadmin', NULL, NULL, NULL, NULL, 0, 3, 2, 1, 1, 'img/usericon.jpg', NULL, NULL),
(7578, '222011024', 'শ্রী পরিতোষ বর্মন', 'মৃত সুরেনন্দ্র নাথ বর্মন', NULL, 'সুরোবালা', '1', '1', '16', '10', '1984', '8672725457', NULL, '01723581266', '2', '2', '16', '80', '৩/৬৪', '11', '16', '2', '', '', '৪', NULL, '0', '0', '1', '2010', '150.00', '1', '0', '2021-09-28 08:29:39', NULL, 'superadmin', NULL, NULL, NULL, NULL, 0, 2, 2, 1, 1, 'img/usericon.jpg', NULL, NULL),
(7579, '222011025', 'মোঃ এনামূল হোসেন', 'আব্দুস্ সাওার', NULL, 'আম্বিয়া বেগম', '1', '1', '10', '1', '1981', '5972456288', NULL, '01', '1', '2', '14', '79', '340', '11', '16', '2', '', '', '3', NULL, '0', '0', '6', '2010', '150.00', '1', '0', '2021-09-28 08:30:05', NULL, 'superadmin', NULL, NULL, NULL, NULL, 0, 3, 2, 1, 1, 'img/usericon.jpg', NULL, NULL),
(7580, '222011026', 'শচিন্দ্রনাথ রায়', 'যোগেন্দ্র নাথ রায়', NULL, 'মঙ্গলী রানী', '1', '1', '8', '9', '1966', '4622547109', NULL, '01725193435', '2', '2', '16', '80', '৩/৬৮', '11', '16', '2', '', '', '৫', NULL, '0', '0', '6', '2010', '150.00', '1', '0', '2021-09-28 08:33:02', NULL, 'superadmin', NULL, NULL, NULL, NULL, 0, 2, 2, 1, 1, 'img/usericon.jpg', NULL, NULL),
(7581, '222011027', 'মোঃ আমজাদ হোসেন', 'আদ্দুস সাওার', NULL, 'আম্বিয়া খাতুন', '1', '1', '30', '3', '1974', '7322900270', NULL, '01933173521', '1', '2', '14', '79', '341', '11', '16', '2', '', '', '4', NULL, '0', '0', '1', '2010', '150.00', '1', '0', '2021-09-28 08:33:20', NULL, 'superadmin', NULL, NULL, NULL, NULL, 0, 3, 2, 1, 1, 'img/usericon.jpg', NULL, NULL),
(7582, '222011028', 'মধুরাম সেন', 'মৃত নগেন্দ্র নাথ সেন', NULL, 'বসন্তবালা সেন', '1', '1', '1', '8', '1961', '9561340929', NULL, '01711414929', '2', '2', '16', '80', '৩/৭০', '11', '16', '2', '', '', '৩', NULL, '0', '0', '6', '2010', '150.00', '1', '0', '2021-09-28 08:36:18', NULL, 'superadmin', NULL, NULL, NULL, NULL, 0, 5, 1, 1, 1, 'img/usericon.jpg', NULL, NULL),
(7583, '222011029', 'হরেন বর্মন', 'মৃত পিতাম্বর বর্মন', NULL, 'মৃত অংবালা বর্মন', '1', '1', '23', '9', '1961', '3722481904', NULL, '01710871863', '2', '1', '16', '80', '৩/৭১', '11', '16', '1', '', '', 'দুইতলা', NULL, '0', '0', '1', '2010', '150.00', '1', '0', '2021-09-28 08:39:26', NULL, 'superadmin', NULL, NULL, NULL, NULL, 0, 1, 1, 1, 1, 'img/usericon.jpg', NULL, NULL),
(7584, '222011030', 'স্বপন কুমার অধিকারী', 'মৃত সুধাংশ মোহন অধিকারী', NULL, 'মৃত প্রমিলা অধিকারী', '1', '1', '30', '6', '1963', '5072403982', NULL, '01715039697', '2', '2', '16', '80', '৩/৬৫', '11', '16', '2', '', '', '২', NULL, '0', '0', '1', '2010', '150.00', '1', '0', '2021-09-28 08:42:54', NULL, 'superadmin', NULL, NULL, NULL, NULL, 0, 3, 2, 1, 1, 'img/usericon.jpg', NULL, NULL),
(7585, '222011031', 'Milton Chowdhury', 'Milon Chowdhury', NULL, 'Asia Begum', '1', '2', '9', '9', '1988', '24234', NULL, '01737539213', '1', '1', '16', '77', '67', '11', '16', '7', '1250', '1160', '6', NULL, '120', '128.4', '1', '2020', '150', '2', '1', '2021-10-25 10:32:03', NULL, NULL, 9382, NULL, '2021-10-06 08:35:41', NULL, 0, 4, 4, 1, 1, 'img/usericon.jpg', NULL, NULL),
(7586, '2', 'Connor Sawyer', NULL, 'Cathleen Gay', 'Charissa Mcmillan', '2', '1', '1', '9', '2012', '5454445454', NULL, '0167799898', '2', '3', '21', '78', '5454', '11', '16', '1', NULL, NULL, '873', NULL, '0', '0', '2', '2021', '160', '1', '0', '2021-10-23 19:29:54', NULL, 'Front', NULL, NULL, NULL, NULL, 0, 92, 52, 1, 1, 'img/usericon.jpg', 54, 54),
(7587, '2', 'Connor Sawyer', NULL, 'Cathleen Gay', 'Charissa Mcmillan', '2', '1', '1', '9', '2012', '5454445454', NULL, '0167799898', '2', '3', '21', '78', '5454', '11', '16', '1', NULL, NULL, '873', NULL, '0', '0', '2', '2021', '160', '1', '0', '2021-10-23 19:30:37', NULL, 'Front', NULL, NULL, NULL, NULL, 0, 92, 52, 1, 1, 'img/usericon.jpg', 54, 54);

-- --------------------------------------------------------

--
-- Table structure for table `general_settings`
--

CREATE TABLE `general_settings` (
  `id` int(11) NOT NULL,
  `title_english` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_bangla` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `general_settings`
--

INSERT INTO `general_settings` (`id`, `title_english`, `title_bangla`) VALUES
(1, 'Lalmonirhat', 'লালমনিরহাট');

-- --------------------------------------------------------

--
-- Table structure for table `house_rates`
--

CREATE TABLE `house_rates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `house_type_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax_rate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `house_rates`
--

INSERT INTO `house_rates` (`id`, `house_type_id`, `tax_rate`, `status`, `created_at`, `updated_at`) VALUES
(6, '8', '7', '1', NULL, NULL),
(7, '9', '7', '1', NULL, NULL),
(8, '10', '7', '1', NULL, NULL),
(9, '11', '7', '1', NULL, NULL),
(10, '7', '7', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `house_types`
--

CREATE TABLE `house_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `house_types`
--

INSERT INTO `house_types` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(7, 'পাকা', '1', NULL, NULL),
(8, 'আধা পাকা', '1', NULL, NULL),
(9, 'কাচা', '1', NULL, NULL),
(10, '‌টিন সেট', '1', NULL, NULL),
(11, 'বহু জা‌তিক', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `important_links`
--

CREATE TABLE `important_links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `left_sidebar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `right_sidebar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `important_links`
--

INSERT INTO `important_links` (`id`, `title`, `url`, `description`, `left_sidebar`, `right_sidebar`, `image`, `created_at`, `updated_at`) VALUES
(1, 'রাষ্ট্রপতির কার্যালয়', 'https://bangabhaban.gov.bd/', NULL, NULL, '1', NULL, NULL, NULL),
(2, 'প্রধানমন্ত্রীর কার্যালয়', 'https://pmo.gov.bd/', NULL, NULL, '1', NULL, NULL, NULL),
(3, 'বাংলাদেশ জাতীয় তথ্য বাতায়ন', 'https://bangladesh.gov.bd/index.php', NULL, NULL, '1', NULL, NULL, NULL),
(4, 'জনপ্রশাসন মন্ত্রণালয়', 'https://mopa.gov.bd/', NULL, NULL, '1', NULL, NULL, NULL),
(5, 'জন্ম নিবন্ধন যাচাই', 'http://bris.lgd.gov.bd/pub/?pg=verify_br', NULL, NULL, '1', NULL, NULL, NULL),
(6, 'জন্ম নিবন্ধন ফরম', '#', NULL, '1', NULL, NULL, NULL, NULL),
(7, 'মৃত্যু নিবন্ধন ফরম', '#', NULL, '1', NULL, NULL, NULL, NULL),
(8, 'মৃত্যু সনদ ফরম', '#', NULL, '1', NULL, NULL, NULL, NULL),
(9, 'জন্ম/মৃত্যু সনদ বাতিল/সংশোধনের আবেদনপত্র', '#', NULL, '1', NULL, NULL, NULL, NULL),
(10, 'হোল্ডিং নাম্বার ফরম', '#', NULL, '1', NULL, NULL, NULL, NULL),
(11, 'উত্তরাধিকার সনদ ফরম', '#', NULL, '1', NULL, NULL, NULL, NULL),
(12, 'ট্রেড লাইসেন্স অ্যাপ্লিকেশান ফরম', '#', NULL, '1', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `meyors`
--

CREATE TABLE `meyors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meyor_place` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `meyors`
--

INSERT INTO `meyors` (`id`, `name`, `meyor_place`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Mayor Name', 'Lalmonirhat Paurosova', 'upload/Meyor/1632963485.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(21, '2021_10_21_235247_create_permission_tables', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 9382);

-- --------------------------------------------------------

--
-- Table structure for table `mohila_councilors`
--

CREATE TABLE `mohila_councilors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mohila_councilors`
--

INSERT INTO `mohila_councilors` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(5, 'Counsilor Name', 'upload/Councilor/1632963834.jpg', NULL, NULL),
(6, 'Counsilor Name', 'upload/Councilor/1632963844.jpg', NULL, NULL),
(7, 'Counsilor Name', 'upload/Councilor/1632963851.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `occupations`
--

CREATE TABLE `occupations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `occupations`
--

INSERT INTO `occupations` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'চাকুরীজীবি', '1', NULL, NULL),
(2, 'বেকার', '1', NULL, NULL),
(3, 'ডাক্তার', '1', NULL, NULL),
(4, 'সেবিকা / নার্স', '1', NULL, NULL),
(5, 'চালক / ড্রাইভার', '1', NULL, NULL),
(6, 'ব্যবসায়িক', '1', NULL, NULL),
(7, 'রাজনীতিক', '1', NULL, NULL),
(8, 'মন্ত্রী', '1', NULL, NULL),
(9, 'রাষ্ট্রপতি', '1', NULL, NULL),
(10, 'উকিল / আইনজীবী', '1', NULL, NULL),
(11, 'বিচারক', '1', NULL, NULL),
(12, 'হিসাব রক্ষক', '1', NULL, NULL),
(13, 'প্রকৌশলী', '1', NULL, NULL),
(14, 'শিক্ষক', '1', NULL, NULL),
(15, 'পন্ডিত', '1', NULL, NULL),
(16, 'শিক্ষার্থী', '1', NULL, NULL),
(17, 'ছাত্র', '1', NULL, NULL),
(18, 'ছাত্রী', '1', NULL, NULL),
(19, 'খেলোয়াড়', '1', NULL, NULL),
(20, 'লেখক', '1', NULL, NULL),
(21, 'বিজ্ঞানী', '1', NULL, NULL),
(22, 'অভিনেতা', '1', NULL, NULL),
(23, 'অভিনেত্রী', '1', NULL, NULL),
(24, 'কর্মকর্তা', '1', NULL, NULL),
(25, 'কর্মী', '1', NULL, NULL),
(26, 'শ্রমিক', '1', NULL, NULL),
(27, 'দোকানদার', '1', NULL, NULL),
(28, 'মুচি', '1', NULL, NULL),
(29, 'কৃষক', '1', NULL, NULL),
(30, 'ঝাড়ুদার', '1', NULL, NULL),
(31, 'মালি', '1', NULL, NULL),
(32, 'নাপিত', '1', NULL, NULL),
(33, 'সাংবাদিক', '1', NULL, NULL),
(34, 'গৃহিণী', '1', NULL, NULL),
(35, 'উদ্যোক্তা', '1', NULL, NULL),
(36, 'প্রবাসী', '1', NULL, NULL),
(37, 'জেলে', '1', NULL, NULL),
(38, 'কুটির শিল্প', '1', NULL, NULL),
(39, 'প্রতিবন্ধি', '1', NULL, NULL),
(40, 'অবসরপ্রাপ্ত', '1', NULL, NULL),
(41, 'ক্ষুদ্র ব‍্যবসায়ী', '1', NULL, NULL),
(42, 'মুক্তিযোদ্ধা', '1', NULL, NULL),
(43, 'রাজ মিস্ত্রী', '1', NULL, NULL),
(44, 'কাঠ মিস্ত্রী', '1', NULL, NULL),
(45, 'সরকারি চাকরিজীবি', '1', NULL, NULL),
(46, 'বেসরকারী চাকুরী জীবি', '1', NULL, NULL),
(47, 'মৃৎশিল্প', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `currency` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orphan_certficates`
--

CREATE TABLE `orphan_certficates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_certficate` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `day` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `month` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pay_bosot_dues`
--

CREATE TABLE `pay_bosot_dues` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `month` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_years` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `previous_due` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_due` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pay_sum` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remain_due` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pay_bosot_taxes`
--

CREATE TABLE `pay_bosot_taxes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `previous_due` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pay_sum` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `month` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_years` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_due` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remain_due` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(5, 'role-management', 'web', '2021-10-22 08:52:40', '2021-10-22 08:52:40'),
(6, 'user-management', 'web', '2021-10-22 08:52:40', '2021-10-22 08:52:40'),
(7, 'active-deactive-panel', 'web', '2021-10-22 08:52:40', '2021-10-22 08:52:40'),
(8, 'bosot-bari-list', 'web', '2021-10-22 08:52:40', '2021-10-22 08:52:40'),
(9, 'bosot-bari-edit', 'web', '2021-10-22 08:52:40', '2021-10-22 08:52:40'),
(10, 'bosot-bari-delete', 'web', '2021-10-22 08:52:40', '2021-10-22 08:52:40'),
(11, 'business-hold-list', 'web', '2021-10-22 08:52:40', '2021-10-22 08:52:40'),
(12, 'business-hold-edit', 'web', '2021-10-22 08:52:40', '2021-10-22 08:52:40'),
(13, 'business-hold-delete', 'web', '2021-10-22 08:52:40', '2021-10-22 08:52:40'),
(14, 'commercial-hold-list', 'web', '2021-10-22 08:52:40', '2021-10-22 08:52:40'),
(15, 'commercial-hold-edit', 'web', '2021-10-22 08:52:40', '2021-10-22 08:52:40'),
(16, 'commercial-hold-delete', 'web', '2021-10-22 08:52:40', '2021-10-22 08:52:40'),
(17, 'other-setup', 'web', '2021-10-22 08:52:40', '2021-10-22 08:52:40'),
(18, 'tax-rate-setup', 'web', '2021-10-22 08:52:40', '2021-10-22 08:52:40'),
(19, 'website-settings', 'web', '2021-10-22 08:52:40', '2021-10-22 08:52:40'),
(20, 'trade-license-due', 'web', '2021-10-22 08:52:40', '2021-10-22 08:52:40'),
(21, 'certificate-list', 'web', '2021-10-22 08:52:40', '2021-10-22 08:52:40'),
(22, 'certificate-approve', 'web', '2021-10-22 08:52:40', '2021-10-22 08:52:40'),
(23, 'bosot-bari-due', 'web', '2021-10-22 08:52:40', '2021-10-22 08:52:40'),
(24, 'support-admin-management', 'web', '2021-10-22 08:52:40', '2021-10-22 08:52:40'),
(25, 'beneficiary-management', 'web', NULL, NULL),
(26, 'reports', 'web', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `post_codes`
--

CREATE TABLE `post_codes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_codes`
--

INSERT INTO `post_codes` (`id`, `post_code`, `created_at`, `updated_at`) VALUES
(11, '5500', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `post_offices`
--

CREATE TABLE `post_offices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_code_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_office` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_offices`
--

INSERT INTO `post_offices` (`id`, `post_code_id`, `post_office`, `created_at`, `updated_at`) VALUES
(16, '11', 'লালম‌নিরহাট', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `presetdatas`
--

CREATE TABLE `presetdatas` (
  `id` bigint(20) NOT NULL,
  `dataname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datatype` varchar(22) COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `presetdatas`
--

INSERT INTO `presetdatas` (`id`, `dataname`, `datatype`, `create_at`, `updated_at`) VALUES
(0, 'Lalmonirhat', 'title_english', '2021-10-21 17:52:02', NULL),
(1, 'লালমনিরহাট পৌরসভা', 'title', '2021-10-03 04:04:24', NULL),
(2, 'http://localhost/lalmonirhutapp/', 'domain', '2021-10-04 07:36:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `relations`
--

CREATE TABLE `relations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `relation_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `relations`
--

INSERT INTO `relations` (`id`, `relation_name`, `created_at`, `updated_at`) VALUES
(1, 'পিতা', NULL, NULL),
(2, 'মাতা', NULL, NULL),
(3, 'স্বামী', NULL, NULL),
(4, 'স্ত্রী', NULL, NULL),
(5, 'ভাই', NULL, NULL),
(6, 'বোন', NULL, NULL),
(7, 'পুত্র', NULL, NULL),
(8, 'কন্যা', NULL, NULL),
(9, 'দাদা', NULL, NULL),
(10, 'দাদী', NULL, NULL),
(11, 'নানা', NULL, NULL),
(12, 'নানী', NULL, NULL),
(13, 'নাতি', NULL, NULL),
(14, 'নাতনি', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `renew_licenses`
--

CREATE TABLE `renew_licenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `license_years` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `charge_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `payment_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bangla_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'web',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `bangla_name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'সুপার এডমিন', 'web', NULL, NULL),
(2, 'Support Admin', 'সাপোর্ট এডমিন', 'web', NULL, NULL),
(3, 'Mayor', 'মেয়র', 'web', NULL, NULL),
(4, 'Secretary', 'সচিব/প্রধান নির্বাহী কর্মকতা', 'web', NULL, NULL),
(5, 'License', 'লাইসেন্স শাখা', 'web', NULL, NULL),
(6, 'Tax', 'কর শাখা', 'web', NULL, NULL),
(7, 'Certificate', 'সনদ শাখা', 'web', NULL, NULL),
(8, 'Assessment', 'মূল্যায়ন শাখা', 'web', NULL, NULL),
(9, 'Councillor', 'কাউন্সিলর', 'web', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(5, 1),
(5, 2),
(6, 1),
(7, 1),
(7, 2),
(8, 1),
(8, 2),
(9, 1),
(10, 1),
(11, 1),
(11, 2),
(12, 1),
(13, 1),
(14, 1),
(14, 2),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(24, 2);

-- --------------------------------------------------------

--
-- Table structure for table `service_charges`
--

CREATE TABLE `service_charges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `general_fee` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commercial_fee` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `business_fee` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_charges`
--

INSERT INTO `service_charges` (`id`, `general_fee`, `commercial_fee`, `business_fee`, `created_at`, `updated_at`) VALUES
(1, '150', '150', '0', '2021-10-04 14:46:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sms_radoms`
--

CREATE TABLE `sms_radoms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `random_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trade_licenses`
--

CREATE TABLE `trade_licenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `owner_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `business_type_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fee` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `signboard_tax` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `business_tax` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `others` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `online_charge` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_old` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `show_password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `contact` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT 'img/usericon.jpg',
  `ward` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `role_old`, `name`, `email`, `email_verified_at`, `password`, `show_password`, `remember_token`, `created_at`, `updated_at`, `contact`, `photo`, `ward`) VALUES
(1, 'superadmin', 'Super Admin', 'Superadmin', 'superadmin@gmail.com', NULL, '$2y$10$bKsPm4sCSIJicE2nDQYZGOF.LxD1OdNeR0tn90GLEa8c37M0YIOe6', '123456', NULL, NULL, NULL, NULL, 'img/usericon.jpg', NULL),
(2, 'super', 'Super Admin', 'super', 'super@admin.com', NULL, '$2y$10$oxIBlSQvhewM/2rSjihzPenHw5TW830iQ1lGtMatZNpy2GbZ08nTO', '12345678', NULL, '2021-10-17 03:06:53', NULL, '12345678', 'img/usericon.jpg', NULL),
(4905, 'meyor', 'Super Admin', 'Honorable Mayor', 'meyor@gmail.com', NULL, '$2y$10$kvLr3.4UkLANDtghSsqLFu3JrmpgKjXS7J5sn7ZRJEwdZnRj14h9S', 'user#123', NULL, NULL, NULL, NULL, 'img/usericon.jpg', NULL),
(9344, '222011001', 'Bosot Bari Member', 'wer', NULL, NULL, '$2y$10$QOy.UA70YPiimaRb.8P5dOyjGazm5XH2bzhLilkAlukj78jtU.fcW', '12345678', NULL, '2021-09-28 06:25:15', NULL, NULL, 'img/usericon.jpg', NULL),
(9345, '222011001', 'Bosot Bari Member', 'মোঃ মিজানুর রহমান', NULL, NULL, '$2y$10$KVikDNIajXMv0T8g2GDk4.Jv0WvhxKjt90TRCSfQiYp3YMsmd9OGG', '12345678', NULL, '2021-09-28 06:28:50', NULL, NULL, 'img/usericon.jpg', NULL),
(9346, '222011002', 'Bosot Bari Member', 'সুদান চন্দ্র রায়', NULL, NULL, '$2y$10$2RMV8TOUSR15wXC4KjcN1.XnsBLgtvYSpbRoAeZu0FiQZwXQf6kbW', '12345678', NULL, '2021-09-28 06:34:26', NULL, NULL, 'img/usericon.jpg', NULL),
(9347, '222011003', 'Bosot Bari Member', 'মেঘনা রানী রায়', NULL, NULL, '$2y$10$8g2mBZ3sM.qtev7oOKvCJOfUt2NHHRR9F2SLfl0EVV7y7g2U3WYRy', '12345678', NULL, '2021-09-28 06:39:51', NULL, NULL, 'img/usericon.jpg', NULL),
(9348, '222011004', 'Bosot Bari Member', 'রাজ কমার বর্মন', NULL, NULL, '$2y$10$MwHks.Auqd26WMZq0Z1LPemWKNx5hOH95pBnfmPxE3BZUI0uD2I/6', '12345678', NULL, '2021-09-28 06:40:16', NULL, NULL, 'img/usericon.jpg', NULL),
(9349, '222011005', 'Bosot Bari Member', 'ভুপেন চন্দ্র বর্মন', NULL, NULL, '$2y$10$kLNBHvlCplHmRPCEa1JEyei/RI0KrMY3PR7cocGyx6diq1rxmucyK', '12345678', NULL, '2021-09-28 06:52:14', NULL, NULL, 'img/usericon.jpg', NULL),
(9350, '222011006', 'Bosot Bari Member', 'নিগমানন্দ', NULL, NULL, '$2y$10$28/5ld7ttOZzvLhXzMotTep9F2OGuKzo8WZtGi9NiTi7i91q/yLS.', '12345678', NULL, '2021-09-28 07:03:31', NULL, NULL, 'img/usericon.jpg', NULL),
(9351, '222011007', 'Bosot Bari Member', 'যোগানন্দ বর্মন', NULL, NULL, '$2y$10$aFuR/onv4jJmY01ks5.iV.OqLV42NsYHY.6kKSM6l1ITeeCPqlzrq', '12345678', NULL, '2021-09-28 07:13:13', NULL, NULL, 'img/usericon.jpg', NULL),
(9352, '222011008', 'Bosot Bari Member', 'বিমল ইন্দু সরকার', NULL, NULL, '$2y$10$AJsTec5rpM0FVvHg26Za1u7FaQAShke2Hqy2i318w7iK2EWaBYxsC', '12345678', NULL, '2021-09-28 07:27:36', NULL, NULL, 'img/usericon.jpg', NULL),
(9353, '222011009', 'Bosot Bari Member', 'কেশব দেব রায়', NULL, NULL, '$2y$10$dmzveK5Mqu/c2IaC/ETOD.5SlOgFDpazhzjRgxxhMzzohTV0cmC.6', '12345678', NULL, '2021-09-28 07:42:47', NULL, NULL, 'img/usericon.jpg', NULL),
(9354, '222011010', 'Bosot Bari Member', 'অনিল দেব রায়', NULL, NULL, '$2y$10$IaDQ.a1sFsNahsJ/pg9i1uDgO8B4bwdrkU5XNvcE6YzVsaDiIPdPu', '12345678', NULL, '2021-09-28 07:48:19', NULL, NULL, 'img/usericon.jpg', NULL),
(9355, '222011011', 'Bosot Bari Member', 'আ.ফ.ম.  আবু দাউদ', NULL, NULL, '$2y$10$/Obp.hkww3SjGy78GdTXYuqlnBr1Q1cSwz8GZIJ.nUb9wVglt0C9G', '12345678', NULL, '2021-09-28 07:52:32', NULL, NULL, 'img/usericon.jpg', NULL),
(9356, '222011012', 'Bosot Bari Member', 'মোঃ আব্দুল বারেক', NULL, NULL, '$2y$10$ven4acK9RQWfVXP11DobeeZr1yZeMFhzdOIPok4D1YcFOQ8e5qDsC', '12345678', NULL, '2021-09-28 07:57:29', NULL, NULL, 'img/usericon.jpg', NULL),
(9357, '222011013', 'Bosot Bari Member', 'মোঃ আব্দুর রহিম', NULL, NULL, '$2y$10$EhGFuJj2ZmMKsh2t7McRYODel3y6jCyOHXGdt4vRneiyQNkB2yGEy', '12345678', NULL, '2021-09-28 08:01:13', NULL, NULL, 'img/usericon.jpg', NULL),
(9358, '222011014', 'Bosot Bari Member', 'মোঃ আঃ মতিন', NULL, NULL, '$2y$10$hUWMmYmGkSiphDEU.06Y1unoJiazr3YKCws.BvdyoXd1i/kmZy9HS', '12345678', NULL, '2021-09-28 08:05:49', NULL, NULL, 'img/usericon.jpg', NULL),
(9359, '222011015', 'Bosot Bari Member', 'শ্রী সুনিল চক্রবর্তী', NULL, NULL, '$2y$10$sHkTx4DcPSawcz0MP.bmB.wDqAjekbDD9/DUTJLmoUt6c3wwv97tK', '12345678', NULL, '2021-09-28 08:08:45', NULL, NULL, 'img/usericon.jpg', NULL),
(9360, '222011016', 'Bosot Bari Member', 'মোছাঃ সায়েরা বেগম', NULL, NULL, '$2y$10$rWBhklAPAQZk96LtbCF3Re9Z3E4hftfEYzroQcbS.JxqoC6e0UJ5y', '12345678', NULL, '2021-09-28 08:10:51', NULL, NULL, 'img/usericon.jpg', NULL),
(9361, '222011017', 'Bosot Bari Member', 'নির্মলেন্দু বর্মন', NULL, NULL, '$2y$10$9Cg9XteOtPIFOhjrRc7im.C/KlwgiWO6m5Q.863rCzOUkmFe9LXSe', '12345678', NULL, '2021-09-28 08:13:47', NULL, NULL, 'img/usericon.jpg', NULL),
(9362, '222011018', 'Bosot Bari Member', 'মোঃ ইউসুফ আলী', NULL, NULL, '$2y$10$ywXIBzcPfY0xRyboP.qs2OgiGK3kdHQ2EQV87VvPyPEf.AB/OcdGG', '12345678', NULL, '2021-09-28 08:15:54', NULL, NULL, 'img/usericon.jpg', NULL),
(9363, '222011019', 'Bosot Bari Member', 'মধুসূদন বর্মন', NULL, NULL, '$2y$10$8.gJR2dcWEIFo.fx7wVBfuW/a5LsdNIEqAQPSBGaq58eNwUSYj33m', '12345678', NULL, '2021-09-28 08:17:52', NULL, NULL, 'img/usericon.jpg', NULL),
(9364, '222011020', 'Bosot Bari Member', 'মোঃ পেয়ারুল ইসলাম', NULL, NULL, '$2y$10$LH2Ztweo/XjsJhXgewJaNOwECFnS458ZLi6Jic.J71e8DK2lhk1tW', '12345678', NULL, '2021-09-28 08:19:53', NULL, NULL, 'img/usericon.jpg', NULL),
(9365, '222011021', 'Bosot Bari Member', 'শ্রী রজনী কান্ত বর্মন', NULL, NULL, '$2y$10$ZUrEcu93ZDdJCYS8dM9zEu9xyz51184.uUsQ5exQmEDmqin5I.REm', '12345678', NULL, '2021-09-28 08:21:26', NULL, NULL, 'img/usericon.jpg', NULL),
(9366, '222011022', 'Bosot Bari Member', 'রাজেন্দ্র নাথ বর্মন', NULL, NULL, '$2y$10$3p30XR63kt3UgzTMHO9oxOIJj0FvUdaPAkX9XcKTdOGy5jO0fhwzW', '12345678', NULL, '2021-09-28 08:25:08', NULL, NULL, 'img/usericon.jpg', NULL),
(9367, '222011023', 'Bosot Bari Member', 'মোঃ জাকির হোসেন', NULL, NULL, '$2y$10$M0RIujOVj4JwecBmE2ki4OsXnVF1w7KQTDB7ZIdEafrMEMe/Ri0s.', '12345678', NULL, '2021-09-28 08:26:24', NULL, NULL, 'img/usericon.jpg', NULL),
(9368, '222011024', 'Bosot Bari Member', 'শ্রী পরিতোষ বর্মন', NULL, NULL, '$2y$10$TUnlNttSmBEv2MGIO4gVpu.jwJQp2tSOwlOM/8.f4v.kGTtDfeumK', '12345678', NULL, '2021-09-28 08:29:39', NULL, NULL, 'img/usericon.jpg', NULL),
(9369, '222011025', 'Bosot Bari Member', 'মোঃ এনামূল হোসেন', NULL, NULL, '$2y$10$q91jQvVcJi8mBVHtm5GLdurtd4nqBj3sVBqae5jhjAq3SKLWRFZya', '12345678', NULL, '2021-09-28 08:30:06', NULL, NULL, 'img/usericon.jpg', NULL),
(9370, '222011026', 'Bosot Bari Member', 'শচিন্দ্রনাথ রায়', NULL, NULL, '$2y$10$98CS2./zOY3kj/vb4QhkbeIZn46Sxz10.gVkDKHGUiknXanLALJ6m', '12345678', NULL, '2021-09-28 08:33:02', NULL, NULL, 'img/usericon.jpg', NULL),
(9371, '222011027', 'Bosot Bari Member', 'মোঃ আমজাদ হোসেন', NULL, NULL, '$2y$10$S.ZjFnuKjsraIU0YHwJe6e4wa3TLm7rnFExN4D3tDJiY1BaXda7qi', '12345678', NULL, '2021-09-28 08:33:20', NULL, NULL, 'img/usericon.jpg', NULL),
(9372, '222011028', 'Bosot Bari Member', 'মধুরাম সেন', NULL, NULL, '$2y$10$G3eN0APQoOfz8Z5aF1U4LOZBpn4H.bUEdCpFOvlSjwBqB1NKqjePe', '12345678', NULL, '2021-09-28 08:36:18', NULL, NULL, 'img/usericon.jpg', NULL),
(9373, '222011029', 'Bosot Bari Member', 'হরেন বর্মন', NULL, NULL, '$2y$10$dGUrrYXHw0mSKsH8vXOgmeeT9qYW.Zbz.Q1t584xMGWvrIXvx7gDG', '12345678', NULL, '2021-09-28 08:39:26', NULL, NULL, 'img/usericon.jpg', NULL),
(9374, '222011030', 'Bosot Bari Member', 'স্বপন কুমার অধিকারী', NULL, NULL, '$2y$10$DX6ZNYx79F56GY5TtfRiOu.pXPFluwaG8KJ6YHmuQvC8bXkWjx./S', '12345678', NULL, '2021-09-28 08:42:54', NULL, NULL, 'img/usericon.jpg', NULL),
(9375, '222011031', 'Bosot Bari Member', 'Milton Chowdhury', NULL, NULL, '$2y$10$rU5FzXuJMHvIw3f5xEYvSeTKxeTKlQ1cnUBVxKgddSwUuWWm.P7Ay', '12345678', NULL, '2021-10-04 10:32:03', NULL, NULL, 'img/usericon.jpg', NULL),
(9377, '222021002', 'Business Hold Reg', 'weasefvsere ers', NULL, NULL, '$2y$10$/en5jFchg1bWnRGQrZj/Auhp7qYLQysHphpfDIfOQaL3zBL7wuRHK', '12345678', NULL, '2021-10-06 09:01:31', NULL, NULL, 'img/usericon.jpg', NULL),
(9378, '222022001', 'Commercial Hold Reg', 'milton chowdhury', NULL, NULL, '$2y$10$ECtqI3WrQZh1RJyR3Rzx.eM9QL7UIH1pMIPEnP2byb08yO8U0y.pG', '12345678', NULL, '2021-10-09 01:54:25', NULL, NULL, 'img/usericon.jpg', NULL),
(9381, '9381', NULL, 'Jobayed Sumon', 'jobayedahmedsumon@gmail.com', NULL, '$2y$10$XdGhqkR/DEGKLa4KsbrKrOYUZN4zBJUo/rjOzli23M5kS.3RHCr7q', NULL, NULL, '2021-10-21 19:33:59', '2021-10-21 19:51:39', '01677242853', NULL, NULL),
(9382, 'sumon', NULL, 'Sumon', 'sumon@gmail.com', NULL, '$2y$10$zpxr5hVHl9qxclNLPNUNiO/IZKLv3N6Y5gytA2//1vpeW7f44elW2', NULL, NULL, '2021-10-22 09:37:56', '2021-10-22 09:37:56', '01677242853', NULL, NULL),
(9383, '2', NULL, 'Connor Sawyer', NULL, NULL, '$2y$10$gcZba0j56OKoZCPI.mBzTOpDqkcx0gesmB7da76.TzjL0aR5HH5ZC', '12345678', NULL, '2021-10-23 19:30:38', NULL, NULL, 'img/usericon.jpg', NULL),
(9384, '222018003', NULL, 'Fleur Brady', NULL, NULL, '$2y$10$AmnF40Ra7EkL8vmYvxIeEuhLhL0JXOB0C5sFwUWu3QEsJrqGuBGuS', '12345678', NULL, '2021-10-23 19:46:43', NULL, NULL, 'img/usericon.jpg', NULL),
(9385, '222220002', NULL, 'Abraham Edwards', NULL, NULL, '$2y$10$70AOaPdRFS2IyV3SaBaXkOTBvPr3fnUmBuvT9lapfU5cf1UMnuXTa', '12345678', NULL, '2021-10-23 20:03:18', NULL, NULL, 'img/usericon.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `villages`
--

CREATE TABLE `villages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ward_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `village_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `villages`
--

INSERT INTO `villages` (`id`, `ward_id`, `village_name`, `created_at`, `updated_at`) VALUES
(77, '16', '‌স্টে‌ডিয়াম পাড়া', NULL, NULL),
(78, '21', 'পূর্ব থানা পাড়া।', NULL, NULL),
(79, '14', 'পশ্চিম তালুখ খুটামারা', NULL, NULL),
(80, '16', 'দঃ খোদ্দ সাপটানা', NULL, NULL),
(81, '14', 'খুটামারা', NULL, NULL),
(82, '14', 'পশ্চিম তালুক খুটা মারা', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wards`
--

CREATE TABLE `wards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ward_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wards`
--

INSERT INTO `wards` (`id`, `ward_no`, `created_at`, `updated_at`) VALUES
(14, '1', NULL, NULL),
(15, '2', NULL, NULL),
(16, '3', NULL, NULL),
(17, '4', NULL, NULL),
(18, '৫', NULL, NULL),
(19, '৬', NULL, NULL),
(20, '৭', NULL, NULL),
(21, '৮', NULL, NULL),
(22, '৯', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `warish_certificates`
--

CREATE TABLE `warish_certificates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `random_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `husband_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_certificate` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `warish_members`
--

CREATE TABLE `warish_members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `random_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `warish_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warish_member_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `relation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `member_nid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `website_sliders`
--

CREATE TABLE `website_sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slider_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slider_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `website_sliders`
--

INSERT INTO `website_sliders` (`id`, `slider_title`, `slider_image`, `created_at`, `updated_at`) VALUES
(12, 'Slider 1', 'upload/Slider/1632963555.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `welcome_descriptions`
--

CREATE TABLE `welcome_descriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `welcome_descriptions`
--

INSERT INTO `welcome_descriptions` (`id`, `description`, `created_at`, `updated_at`) VALUES
(1, 'saf', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `benefecials`
--
ALTER TABLE `benefecials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business_holds`
--
ALTER TABLE `business_holds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business_hold_rates`
--
ALTER TABLE `business_hold_rates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business_types`
--
ALTER TABLE `business_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chairmen`
--
ALTER TABLE `chairmen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commercial_holds`
--
ALTER TABLE `commercial_holds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `councilors`
--
ALTER TABLE `councilors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `due_trade_licenses`
--
ALTER TABLE `due_trade_licenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `general_members`
--
ALTER TABLE `general_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_settings`
--
ALTER TABLE `general_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `house_rates`
--
ALTER TABLE `house_rates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `house_types`
--
ALTER TABLE `house_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `important_links`
--
ALTER TABLE `important_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meyors`
--
ALTER TABLE `meyors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `mohila_councilors`
--
ALTER TABLE `mohila_councilors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `occupations`
--
ALTER TABLE `occupations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orphan_certficates`
--
ALTER TABLE `orphan_certficates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pay_bosot_dues`
--
ALTER TABLE `pay_bosot_dues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pay_bosot_taxes`
--
ALTER TABLE `pay_bosot_taxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `post_codes`
--
ALTER TABLE `post_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_offices`
--
ALTER TABLE `post_offices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `presetdatas`
--
ALTER TABLE `presetdatas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `relations`
--
ALTER TABLE `relations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `renew_licenses`
--
ALTER TABLE `renew_licenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `service_charges`
--
ALTER TABLE `service_charges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms_radoms`
--
ALTER TABLE `sms_radoms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trade_licenses`
--
ALTER TABLE `trade_licenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `villages`
--
ALTER TABLE `villages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wards`
--
ALTER TABLE `wards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warish_certificates`
--
ALTER TABLE `warish_certificates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warish_members`
--
ALTER TABLE `warish_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `website_sliders`
--
ALTER TABLE `website_sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `welcome_descriptions`
--
ALTER TABLE `welcome_descriptions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `benefecials`
--
ALTER TABLE `benefecials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `business_holds`
--
ALTER TABLE `business_holds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=302;

--
-- AUTO_INCREMENT for table `business_hold_rates`
--
ALTER TABLE `business_hold_rates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `business_types`
--
ALTER TABLE `business_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `chairmen`
--
ALTER TABLE `chairmen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `commercial_holds`
--
ALTER TABLE `commercial_holds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `councilors`
--
ALTER TABLE `councilors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `due_trade_licenses`
--
ALTER TABLE `due_trade_licenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `general_members`
--
ALTER TABLE `general_members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7588;

--
-- AUTO_INCREMENT for table `general_settings`
--
ALTER TABLE `general_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `house_rates`
--
ALTER TABLE `house_rates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `house_types`
--
ALTER TABLE `house_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `important_links`
--
ALTER TABLE `important_links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `meyors`
--
ALTER TABLE `meyors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `mohila_councilors`
--
ALTER TABLE `mohila_councilors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `occupations`
--
ALTER TABLE `occupations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orphan_certficates`
--
ALTER TABLE `orphan_certficates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pay_bosot_dues`
--
ALTER TABLE `pay_bosot_dues`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pay_bosot_taxes`
--
ALTER TABLE `pay_bosot_taxes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `post_codes`
--
ALTER TABLE `post_codes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `post_offices`
--
ALTER TABLE `post_offices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `relations`
--
ALTER TABLE `relations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `renew_licenses`
--
ALTER TABLE `renew_licenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `service_charges`
--
ALTER TABLE `service_charges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sms_radoms`
--
ALTER TABLE `sms_radoms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=801;

--
-- AUTO_INCREMENT for table `trade_licenses`
--
ALTER TABLE `trade_licenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9386;

--
-- AUTO_INCREMENT for table `villages`
--
ALTER TABLE `villages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `wards`
--
ALTER TABLE `wards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `warish_certificates`
--
ALTER TABLE `warish_certificates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `warish_members`
--
ALTER TABLE `warish_members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `website_sliders`
--
ALTER TABLE `website_sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `welcome_descriptions`
--
ALTER TABLE `welcome_descriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
