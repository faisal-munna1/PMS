-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2026 at 04:05 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pms`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

CREATE TABLE `activity_logs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `action` varchar(50) NOT NULL,
  `module` varchar(50) NOT NULL,
  `reference_id` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `ip_address` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `appointment_date` date NOT NULL,
  `appointment_time` time NOT NULL,
  `serial_number` int(11) NOT NULL,
  `checked_in_at` timestamp NULL DEFAULT NULL,
  `reason_for_visit` text DEFAULT NULL,
  `status` enum('scheduled','checked-in','in-consultation','completed','cancel') DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `patient_id`, `doctor_id`, `appointment_date`, `appointment_time`, `serial_number`, `checked_in_at`, `reason_for_visit`, `status`, `created_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2026-07-06', '12:10:00', 1, NULL, 'back pain', 'scheduled', NULL, NULL, '2026-07-06 17:10:21', '2026-07-06 17:10:21');

-- --------------------------------------------------------

--
-- Table structure for table `consultations`
--

CREATE TABLE `consultations` (
  `id` int(11) NOT NULL,
  `appointment_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `chief_complaint` text DEFAULT NULL,
  `clinical_notes` text DEFAULT NULL,
  `medical_history` text DEFAULT NULL,
  `physical_examination` text DEFAULT NULL,
  `diagnosis` text DEFAULT NULL,
  `treatment_plan` text DEFAULT NULL,
  `consultation_date` date NOT NULL,
  `report` text DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `consultations`
--

INSERT INTO `consultations` (`id`, `appointment_id`, `patient_id`, `doctor_id`, `chief_complaint`, `clinical_notes`, `medical_history`, `physical_examination`, `diagnosis`, `treatment_plan`, `consultation_date`, `report`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '', '', '', NULL, '', '', '2026-07-06', 'report-1783358495.pdf', NULL, '2026-07-06 17:21:35', '2026-07-06 17:21:35');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `specialization` varchar(100) NOT NULL,
  `qualification` text DEFAULT NULL,
  `consultation_fee` decimal(10,2) DEFAULT 0.00,
  `signature_image` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `user_id`, `name`, `email`, `phone`, `specialization`, `qualification`, `consultation_fee`, `signature_image`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 'Dr. Sirajee Shafiqul Islam', 'sirajee@gmail.com', '017500', 'Neurologist', 'PPHP', 0.00, NULL, 'dr-sirajee-shafiqul-islam-1783350701.jpg', 'active', '2026-07-06 11:13:24', '2026-07-06 15:12:07'),
(2, 4, 'Md. Mahmud Hasan', 'mahmud@gmail.com', '01750000000', '', NULL, NULL, NULL, 'mahmud-hasan-1783349692.jpg', 'active', '2026-07-06 12:15:02', '2026-07-06 15:12:54');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_schedules`
--

CREATE TABLE `doctor_schedules` (
  `id` int(11) NOT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `day_of_week` enum('Saturday','Sunday','Monday','Tuesday','Wednesday','Thursday','Friday') NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor_schedules`
--

INSERT INTO `doctor_schedules` (`id`, `doctor_id`, `day_of_week`, `start_time`, `end_time`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, 'Saturday', '19:00:00', '21:00:00', 1, '2026-07-06 17:29:08', '2026-07-06 17:29:08'),
(2, 1, 'Sunday', '19:00:00', '21:00:00', 1, '2026-07-06 17:29:09', '2026-07-06 17:29:09'),
(3, 1, 'Monday', '19:00:00', '21:00:00', 1, '2026-07-06 17:29:09', '2026-07-06 17:29:09');

-- --------------------------------------------------------

--
-- Table structure for table `follow_ups`
--

CREATE TABLE `follow_ups` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `related_consultation_id` int(11) NOT NULL,
  `follow_up_date` date NOT NULL,
  `progress_notes` text DEFAULT NULL,
  `repeat_prescription_id` int(11) DEFAULT NULL,
  `repeat_investigation_id` int(11) DEFAULT NULL,
  `reminder_date` date DEFAULT NULL,
  `reminder_status` enum('Pending','Sent','Not Required') DEFAULT 'Pending',
  `status` enum('Scheduled','Completed','Missed','Cancelled') DEFAULT 'Scheduled',
  `created_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `appointment_id` int(11) NOT NULL,
  `invoice_date` date NOT NULL,
  `total_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `discount_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `discount_reason` varchar(255) DEFAULT NULL,
  `net_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `status` enum('Unpaid','Partially Paid','Paid') DEFAULT 'Unpaid',
  `created_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_items`
--

CREATE TABLE `invoice_items` (
  `id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `item_type` enum('Consultation Fee','Investigation Charge','Additional Charge') NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lab_orders`
--

CREATE TABLE `lab_orders` (
  `id` int(11) NOT NULL,
  `consultation_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `investigation_name` varchar(100) NOT NULL,
  `instructions` text DEFAULT NULL,
  `status` enum('Requested','Completed') DEFAULT 'Requested',
  `requested_date` date NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lab_results`
--

CREATE TABLE `lab_results` (
  `id` int(11) NOT NULL,
  `lab_order_id` int(11) NOT NULL,
  `report_file_path` varchar(255) NOT NULL,
  `report_notes` text DEFAULT NULL,
  `report_date` date NOT NULL,
  `uploaded_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `medicines`
--

CREATE TABLE `medicines` (
  `id` int(11) NOT NULL,
  `medicine_name` varchar(100) NOT NULL,
  `generic_id` int(10) DEFAULT NULL,
  `manufacturer_id` int(10) DEFAULT NULL,
  `type_id` int(10) DEFAULT NULL,
  `strength_id` int(10) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medicines`
--

INSERT INTO `medicines` (`id`, `medicine_name`, `generic_id`, `manufacturer_id`, `type_id`, `strength_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Napa', 1, 2, 1, 33, 'active', '2026-07-08 14:49:56', '2026-07-08 14:49:56'),
(2, 'Napa Extend', 1, 2, 1, 38, 'active', '2026-07-08 14:49:56', '2026-07-08 14:49:56'),
(3, 'Ace', 1, 1, 1, 33, 'active', '2026-07-08 14:49:56', '2026-07-08 14:49:56'),
(4, 'Ace XR', 1, 1, 1, 38, 'active', '2026-07-08 14:49:56', '2026-07-08 14:49:56'),
(5, 'Reset', 1, 3, 1, 33, 'active', '2026-07-08 14:49:56', '2026-07-08 14:49:56'),
(6, 'Ecosprin', 2, 4, 1, 23, 'active', '2026-07-08 14:49:56', '2026-07-08 14:49:56'),
(7, 'Ecosprin Gold', 2, 4, 2, 23, 'active', '2026-07-08 14:49:56', '2026-07-08 14:49:56'),
(8, 'Clopid', 3, 1, 1, 24, 'active', '2026-07-08 14:49:56', '2026-07-08 14:49:56'),
(9, 'Clopilet', 3, 3, 1, 24, 'active', '2026-07-08 14:49:56', '2026-07-08 14:49:56'),
(10, 'Plavix', 3, 15, 1, 24, 'active', '2026-07-08 14:49:56', '2026-07-08 14:49:56'),
(11, 'Rosuva', 4, 1, 1, 15, 'active', '2026-07-08 14:49:56', '2026-07-08 14:49:56'),
(12, 'Rosutin', 4, 3, 1, 15, 'active', '2026-07-08 14:49:56', '2026-07-08 14:49:56'),
(13, 'Rostat', 4, 4, 1, 15, 'active', '2026-07-08 14:49:56', '2026-07-08 14:49:56'),
(14, 'Atova', 5, 1, 1, 15, 'active', '2026-07-08 14:49:56', '2026-07-08 14:49:56'),
(15, 'Atorva', 5, 3, 1, 15, 'active', '2026-07-08 14:49:56', '2026-07-08 14:49:56'),
(16, 'Maxpro', 8, 4, 1, 18, 'active', '2026-07-08 14:49:56', '2026-07-08 14:49:56'),
(17, 'Pantonix', 6, 1, 1, 18, 'active', '2026-07-08 14:49:56', '2026-07-08 14:49:56'),
(18, 'PPI', 6, 2, 1, 18, 'active', '2026-07-08 14:49:56', '2026-07-08 14:49:56'),
(19, 'Losectil', 9, 5, 2, 15, 'active', '2026-07-08 14:49:56', '2026-07-08 14:49:56'),
(20, 'Rabeca', 7, 3, 1, 15, 'active', '2026-07-08 14:49:56', '2026-07-08 14:49:56'),
(21, 'Nervalin', 10, 1, 2, 19, 'active', '2026-07-08 14:49:56', '2026-07-08 14:49:56'),
(22, 'Pregaba', 10, 3, 2, 19, 'active', '2026-07-08 14:49:56', '2026-07-08 14:49:56'),
(23, 'Pregalin', 10, 4, 2, 19, 'active', '2026-07-08 14:49:56', '2026-07-08 14:49:56'),
(24, 'Neurogab', 11, 1, 2, 27, 'active', '2026-07-08 14:49:56', '2026-07-08 14:49:56'),
(25, 'Gabastar', 11, 3, 2, 27, 'active', '2026-07-08 14:49:56', '2026-07-08 14:49:56'),
(26, 'RivaXa', 55, 1, 1, 12, 'active', '2026-07-08 14:53:21', '2026-07-08 14:53:21'),
(27, 'Kinexa', 55, 2, 1, 15, 'active', '2026-07-08 14:53:21', '2026-07-08 14:53:21'),
(28, 'Roxarel', 55, 3, 1, 12, 'active', '2026-07-08 14:53:21', '2026-07-08 14:53:21'),
(29, 'Roxolyte', 55, 4, 1, 12, 'active', '2026-07-08 14:53:21', '2026-07-08 14:53:21'),
(30, 'Rivarox', 55, 5, 1, 12, 'active', '2026-07-08 14:53:21', '2026-07-08 14:53:21'),
(31, 'Apixa', 56, 2, 1, 8, 'active', '2026-07-08 14:53:21', '2026-07-08 14:53:21'),
(32, 'Pixorel', 56, 3, 1, 8, 'active', '2026-07-08 14:53:21', '2026-07-08 14:53:21'),
(33, 'Antixa', 56, 12, 1, 8, 'active', '2026-07-08 14:53:21', '2026-07-08 14:53:21'),
(34, 'Pixan', 56, 20, 1, 8, 'active', '2026-07-08 14:53:21', '2026-07-08 14:53:21'),
(35, 'Apiban', 56, 22, 1, 8, 'active', '2026-07-08 14:53:21', '2026-07-08 14:53:21'),
(36, 'Dabigat', 57, 3, 2, 24, 'active', '2026-07-08 14:53:21', '2026-07-08 14:53:21'),
(37, 'Dabixa', 57, 2, 2, 24, 'active', '2026-07-08 14:53:21', '2026-07-08 14:53:21'),
(38, 'Lovenox', 58, 4, 4, 27, 'active', '2026-07-08 14:53:21', '2026-07-08 14:53:21'),
(39, 'Enoxa', 58, 3, 4, 27, 'active', '2026-07-08 14:53:21', '2026-07-08 14:53:21'),
(40, 'Comet', 49, 1, 1, 33, 'active', '2026-07-08 14:53:21', '2026-07-08 14:53:21'),
(41, 'Metfo', 49, 2, 1, 33, 'active', '2026-07-08 14:53:21', '2026-07-08 14:53:21'),
(42, 'Empa', 51, 3, 1, 12, 'active', '2026-07-08 14:53:21', '2026-07-08 14:53:21'),
(43, 'Empazin', 51, 4, 1, 12, 'active', '2026-07-08 14:53:21', '2026-07-08 14:53:21'),
(44, 'Linita', 52, 1, 1, 8, 'active', '2026-07-08 14:53:21', '2026-07-08 14:53:21'),
(45, 'Sitavia', 53, 3, 1, 24, 'active', '2026-07-08 14:53:21', '2026-07-08 14:53:21'),
(46, 'Domin', 68, 2, 1, 12, 'active', '2026-07-08 14:53:21', '2026-07-08 14:53:21'),
(47, 'Ondem', 69, 3, 1, 12, 'active', '2026-07-08 14:53:21', '2026-07-08 14:53:21'),
(48, 'Lactu', 70, 1, 3, 47, 'active', '2026-07-08 14:53:21', '2026-07-08 14:53:21'),
(49, 'D-Rise', 73, 4, 2, 26, 'active', '2026-07-08 14:53:21', '2026-07-08 14:53:21'),
(50, 'Calbo-D', 71, 1, 1, 24, 'active', '2026-07-08 14:53:21', '2026-07-08 14:53:21');

-- --------------------------------------------------------

--
-- Table structure for table `medicine_doses`
--

CREATE TABLE `medicine_doses` (
  `id` int(11) NOT NULL,
  `dose_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medicine_doses`
--

INSERT INTO `medicine_doses` (`id`, `dose_name`) VALUES
(1, '1+0+0'),
(2, '0+1+0'),
(3, '0+0+1'),
(4, '1+0+1'),
(5, '1+1+0'),
(6, '1+1+1'),
(7, '1+1+1+1'),
(8, '1/2+0+1/2'),
(9, '1/2+0+0'),
(10, '0+0+1/2'),
(11, '2+0+2'),
(12, '2+2+2'),
(13, 'SOS'),
(14, 'PRN'),
(15, 'Stat'),
(16, 'Alternate Day'),
(17, 'Once Weekly'),
(18, 'Twice Weekly'),
(19, 'Loading Dose'),
(20, 'As Directed');

-- --------------------------------------------------------

--
-- Table structure for table `medicine_durations`
--

CREATE TABLE `medicine_durations` (
  `id` int(11) NOT NULL,
  `duration_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medicine_durations`
--

INSERT INTO `medicine_durations` (`id`, `duration_name`) VALUES
(1, '1 Day'),
(2, '3 Days'),
(3, '5 Days'),
(4, '7 Days'),
(5, '10 Days'),
(6, '14 Days'),
(7, '15 Days'),
(8, '21 Days'),
(9, '1 Month'),
(10, '6 Weeks'),
(11, '2 Months'),
(12, '3 Months'),
(13, '6 Months'),
(14, '9 Months'),
(15, '1 Year'),
(16, 'Long Term'),
(17, 'Continue'),
(18, 'Until Follow-up'),
(19, 'As Needed'),
(20, 'Single Dose');

-- --------------------------------------------------------

--
-- Table structure for table `medicine_frequencies`
--

CREATE TABLE `medicine_frequencies` (
  `id` int(11) NOT NULL,
  `frequency_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medicine_frequencies`
--

INSERT INTO `medicine_frequencies` (`id`, `frequency_name`) VALUES
(1, 'OD'),
(2, 'BD'),
(3, 'TDS'),
(4, 'QID'),
(5, 'HS'),
(6, 'Morning'),
(7, 'Night'),
(8, 'Before Meal'),
(9, 'After Meal'),
(10, 'With Food'),
(11, 'Empty Stomach'),
(12, 'Every 6 Hours'),
(13, 'Every 8 Hours'),
(14, 'Every 12 Hours'),
(15, 'Weekly'),
(16, 'Monthly'),
(17, 'SOS'),
(18, 'PRN'),
(19, 'Immediately'),
(20, 'As Directed');

-- --------------------------------------------------------

--
-- Table structure for table `medicine_generics`
--

CREATE TABLE `medicine_generics` (
  `id` int(11) NOT NULL,
  `generic_name` varchar(150) NOT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medicine_generics`
--

INSERT INTO `medicine_generics` (`id`, `generic_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Paracetamol', 'active', '2026-07-08 14:39:20', '2026-07-08 14:39:20'),
(2, 'Aspirin', 'active', '2026-07-08 14:39:20', '2026-07-08 14:39:20'),
(3, 'Clopidogrel', 'active', '2026-07-08 14:39:20', '2026-07-08 14:39:20'),
(4, 'Rosuvastatin', 'active', '2026-07-08 14:39:20', '2026-07-08 14:39:20'),
(5, 'Atorvastatin', 'active', '2026-07-08 14:39:20', '2026-07-08 14:39:20'),
(6, 'Pantoprazole', 'active', '2026-07-08 14:39:20', '2026-07-08 14:39:20'),
(7, 'Rabeprazole', 'active', '2026-07-08 14:39:20', '2026-07-08 14:39:20'),
(8, 'Esomeprazole', 'active', '2026-07-08 14:39:20', '2026-07-08 14:39:20'),
(9, 'Omeprazole', 'active', '2026-07-08 14:39:20', '2026-07-08 14:39:20'),
(10, 'Pregabalin', 'active', '2026-07-08 14:39:20', '2026-07-08 14:39:20'),
(11, 'Gabapentin', 'active', '2026-07-08 14:39:20', '2026-07-08 14:39:20'),
(12, 'Methylcobalamin', 'active', '2026-07-08 14:39:20', '2026-07-08 14:39:20'),
(13, 'Citicoline', 'active', '2026-07-08 14:39:20', '2026-07-08 14:39:20'),
(14, 'Piracetam', 'active', '2026-07-08 14:39:20', '2026-07-08 14:39:20'),
(15, 'Levetiracetam', 'active', '2026-07-08 14:39:20', '2026-07-08 14:39:20'),
(16, 'Sodium Valproate', 'active', '2026-07-08 14:39:20', '2026-07-08 14:39:20'),
(17, 'Carbamazepine', 'active', '2026-07-08 14:39:20', '2026-07-08 14:39:20'),
(18, 'Oxcarbazepine', 'active', '2026-07-08 14:39:20', '2026-07-08 14:39:20'),
(19, 'Lamotrigine', 'active', '2026-07-08 14:39:20', '2026-07-08 14:39:20'),
(20, 'Topiramate', 'active', '2026-07-08 14:39:20', '2026-07-08 14:39:20'),
(21, 'Clonazepam', 'active', '2026-07-08 14:39:20', '2026-07-08 14:39:20'),
(22, 'Diazepam', 'active', '2026-07-08 14:39:20', '2026-07-08 14:39:20'),
(23, 'Alprazolam', 'active', '2026-07-08 14:39:20', '2026-07-08 14:39:20'),
(24, 'Betahistine', 'active', '2026-07-08 14:39:20', '2026-07-08 14:39:20'),
(25, 'Cinnarizine', 'active', '2026-07-08 14:39:20', '2026-07-08 14:39:20'),
(26, 'Prochlorperazine', 'active', '2026-07-08 14:39:20', '2026-07-08 14:39:20'),
(27, 'Amitriptyline', 'active', '2026-07-08 14:39:20', '2026-07-08 14:39:20'),
(28, 'Duloxetine', 'active', '2026-07-08 14:39:20', '2026-07-08 14:39:20'),
(29, 'Nortriptyline', 'active', '2026-07-08 14:39:20', '2026-07-08 14:39:20'),
(30, 'Escitalopram', 'active', '2026-07-08 14:39:20', '2026-07-08 14:39:20'),
(31, 'Sertraline', 'active', '2026-07-08 14:39:20', '2026-07-08 14:39:20'),
(32, 'Fluoxetine', 'active', '2026-07-08 14:39:20', '2026-07-08 14:39:20'),
(33, 'Donepezil', 'active', '2026-07-08 14:39:20', '2026-07-08 14:39:20'),
(34, 'Memantine', 'active', '2026-07-08 14:39:20', '2026-07-08 14:39:20'),
(35, 'Baclofen', 'active', '2026-07-08 14:39:20', '2026-07-08 14:39:20'),
(36, 'Tizanidine', 'active', '2026-07-08 14:39:20', '2026-07-08 14:39:20'),
(37, 'Tolperisone', 'active', '2026-07-08 14:39:20', '2026-07-08 14:39:20'),
(38, 'Amlodipine', 'active', '2026-07-08 14:39:20', '2026-07-08 14:39:20'),
(39, 'Telmisartan', 'active', '2026-07-08 14:39:20', '2026-07-08 14:39:20'),
(40, 'Losartan', 'active', '2026-07-08 14:39:20', '2026-07-08 14:39:20'),
(41, 'Bisoprolol', 'active', '2026-07-08 14:39:20', '2026-07-08 14:39:20'),
(42, 'Metoprolol', 'active', '2026-07-08 14:39:20', '2026-07-08 14:39:20'),
(43, 'Nebivolol', 'active', '2026-07-08 14:39:20', '2026-07-08 14:39:20'),
(44, 'Perindopril', 'active', '2026-07-08 14:39:20', '2026-07-08 14:39:20'),
(45, 'Ramipril', 'active', '2026-07-08 14:39:20', '2026-07-08 14:39:20'),
(46, 'Hydrochlorothiazide', 'active', '2026-07-08 14:39:20', '2026-07-08 14:39:20'),
(47, 'Furosemide', 'active', '2026-07-08 14:39:20', '2026-07-08 14:39:20'),
(48, 'Spironolactone', 'active', '2026-07-08 14:39:20', '2026-07-08 14:39:20'),
(49, 'Metformin', 'active', '2026-07-08 14:39:20', '2026-07-08 14:39:20'),
(50, 'Gliclazide', 'active', '2026-07-08 14:39:20', '2026-07-08 14:39:20'),
(51, 'Empagliflozin', 'active', '2026-07-08 14:39:20', '2026-07-08 14:39:20'),
(52, 'Linagliptin', 'active', '2026-07-08 14:39:20', '2026-07-08 14:39:20'),
(53, 'Sitagliptin', 'active', '2026-07-08 14:39:20', '2026-07-08 14:39:20'),
(54, 'Insulin Human', 'active', '2026-07-08 14:39:20', '2026-07-08 14:39:20'),
(55, 'Rivaroxaban', 'active', '2026-07-08 14:39:20', '2026-07-08 14:39:20'),
(56, 'Apixaban', 'active', '2026-07-08 14:39:20', '2026-07-08 14:39:20'),
(57, 'Dabigatran', 'active', '2026-07-08 14:39:20', '2026-07-08 14:39:20'),
(58, 'Enoxaparin', 'active', '2026-07-08 14:39:20', '2026-07-08 14:39:20'),
(59, 'Cefixime', 'active', '2026-07-08 14:39:20', '2026-07-08 14:39:20'),
(60, 'Cefuroxime', 'active', '2026-07-08 14:39:20', '2026-07-08 14:39:20'),
(61, 'Ceftriaxone', 'active', '2026-07-08 14:39:20', '2026-07-08 14:39:20'),
(62, 'Azithromycin', 'active', '2026-07-08 14:39:20', '2026-07-08 14:39:20'),
(63, 'Amoxicillin', 'active', '2026-07-08 14:39:20', '2026-07-08 14:39:20'),
(64, 'Amoxicillin + Clavulanic Acid', 'active', '2026-07-08 14:39:20', '2026-07-08 14:39:20'),
(65, 'Metronidazole', 'active', '2026-07-08 14:39:20', '2026-07-08 14:39:20'),
(66, 'Ciprofloxacin', 'active', '2026-07-08 14:39:20', '2026-07-08 14:39:20'),
(67, 'Levofloxacin', 'active', '2026-07-08 14:39:20', '2026-07-08 14:39:20'),
(68, 'Domperidone', 'active', '2026-07-08 14:39:20', '2026-07-08 14:39:20'),
(69, 'Ondansetron', 'active', '2026-07-08 14:39:20', '2026-07-08 14:39:20'),
(70, 'Lactulose', 'active', '2026-07-08 14:39:20', '2026-07-08 14:39:20'),
(71, 'Calcium Carbonate + Vitamin D3', 'active', '2026-07-08 14:39:20', '2026-07-08 14:39:20'),
(72, 'Vitamin B Complex', 'active', '2026-07-08 14:39:20', '2026-07-08 14:39:20'),
(73, 'Vitamin D3', 'active', '2026-07-08 14:39:20', '2026-07-08 14:39:20'),
(74, 'Zinc Sulfate', 'active', '2026-07-08 14:39:20', '2026-07-08 14:39:20'),
(75, 'Folic Acid', 'active', '2026-07-08 14:39:20', '2026-07-08 14:39:20'),
(76, 'Ferrous Fumarate + Folic Acid', 'active', '2026-07-08 14:39:20', '2026-07-08 14:39:20'),
(77, 'Thiamine', 'active', '2026-07-08 14:39:20', '2026-07-08 14:39:20'),
(78, 'Acetylcysteine', 'active', '2026-07-08 14:39:20', '2026-07-08 14:39:20'),
(79, 'Montelukast', 'active', '2026-07-08 14:39:20', '2026-07-08 14:39:20'),
(80, 'Levocetirizine', 'active', '2026-07-08 14:39:20', '2026-07-08 14:39:20');

-- --------------------------------------------------------

--
-- Table structure for table `medicine_instructions`
--

CREATE TABLE `medicine_instructions` (
  `id` int(11) NOT NULL,
  `instruction_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medicine_instructions`
--

INSERT INTO `medicine_instructions` (`id`, `instruction_name`) VALUES
(1, 'After Meal'),
(2, 'Before Meal'),
(3, 'With Food'),
(4, 'Empty Stomach'),
(5, 'At Bedtime'),
(6, 'Swallow Whole'),
(7, 'Do Not Crush'),
(8, 'Drink Plenty of Water'),
(9, 'Complete Full Course'),
(10, 'Shake Well Before Use'),
(11, 'External Use Only'),
(12, 'Eye Use Only'),
(13, 'Ear Use Only'),
(14, 'Use As Directed'),
(15, 'Avoid Alcohol'),
(16, 'Avoid Driving'),
(17, 'Monitor Blood Pressure'),
(18, 'Monitor Blood Sugar'),
(19, 'Take With Milk'),
(20, 'Take With Plenty of Water');

-- --------------------------------------------------------

--
-- Table structure for table `medicine_manufacturers`
--

CREATE TABLE `medicine_manufacturers` (
  `id` int(11) NOT NULL,
  `manufacturer_name` varchar(150) NOT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medicine_manufacturers`
--

INSERT INTO `medicine_manufacturers` (`id`, `manufacturer_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Square Pharmaceuticals PLC', 'active', '2026-07-08 14:37:28', '2026-07-08 14:37:28'),
(2, 'Beximco Pharmaceuticals Ltd', 'active', '2026-07-08 14:37:28', '2026-07-08 14:37:28'),
(3, 'Incepta Pharmaceuticals Ltd', 'active', '2026-07-08 14:37:28', '2026-07-08 14:37:28'),
(4, 'Renata PLC', 'active', '2026-07-08 14:37:28', '2026-07-08 14:37:28'),
(5, 'Eskayef Pharmaceuticals Ltd', 'active', '2026-07-08 14:37:28', '2026-07-08 14:37:28'),
(6, 'Healthcare Pharmaceuticals Ltd', 'active', '2026-07-08 14:37:28', '2026-07-08 14:37:28'),
(7, 'ACI Limited', 'active', '2026-07-08 14:37:28', '2026-07-08 14:37:28'),
(8, 'Opsonin Pharma Ltd', 'active', '2026-07-08 14:37:28', '2026-07-08 14:37:28'),
(9, 'Drug International Ltd', 'active', '2026-07-08 14:37:28', '2026-07-08 14:37:28'),
(10, 'Aristopharma Ltd', 'active', '2026-07-08 14:37:28', '2026-07-08 14:37:28'),
(11, 'Popular Pharmaceuticals Ltd', 'active', '2026-07-08 14:37:28', '2026-07-08 14:37:28'),
(12, 'General Pharmaceuticals Ltd', 'active', '2026-07-08 14:37:28', '2026-07-08 14:37:28'),
(13, 'The ACME Laboratories Ltd', 'active', '2026-07-08 14:37:28', '2026-07-08 14:37:28'),
(14, 'Beacon Pharmaceuticals PLC', 'active', '2026-07-08 14:37:28', '2026-07-08 14:37:28'),
(15, 'Radiant Pharmaceuticals Ltd', 'active', '2026-07-08 14:37:28', '2026-07-08 14:37:28'),
(16, 'Orion Pharma Ltd', 'active', '2026-07-08 14:37:28', '2026-07-08 14:37:28'),
(17, 'IBN SINA Pharmaceutical Industry Ltd', 'active', '2026-07-08 14:37:28', '2026-07-08 14:37:28'),
(18, 'Unimed Unihealth Pharmaceuticals Ltd', 'active', '2026-07-08 14:37:28', '2026-07-08 14:37:28'),
(19, 'Biopharma Ltd', 'active', '2026-07-08 14:37:28', '2026-07-08 14:37:28'),
(20, 'Globe Pharmaceuticals Ltd', 'active', '2026-07-08 14:37:28', '2026-07-08 14:37:28'),
(21, 'Navana Pharmaceuticals Ltd', 'active', '2026-07-08 14:37:28', '2026-07-08 14:37:28'),
(22, 'NIPRO JMI Pharma Ltd', 'active', '2026-07-08 14:37:28', '2026-07-08 14:37:28'),
(23, 'Novo Healthcare Ltd', 'active', '2026-07-08 14:37:28', '2026-07-08 14:37:28'),
(24, 'Delta Pharma Ltd', 'active', '2026-07-08 14:37:28', '2026-07-08 14:37:28'),
(25, 'Pacific Pharmaceuticals Ltd', 'active', '2026-07-08 14:37:28', '2026-07-08 14:37:28'),
(26, 'Team Pharmaceuticals Ltd', 'active', '2026-07-08 14:37:28', '2026-07-08 14:37:28'),
(27, 'White Horse Pharmaceuticals Ltd', 'active', '2026-07-08 14:37:28', '2026-07-08 14:37:28'),
(28, 'Ziska Pharmaceuticals Ltd', 'active', '2026-07-08 14:37:28', '2026-07-08 14:37:28'),
(29, 'Amico Laboratories Ltd', 'active', '2026-07-08 14:37:28', '2026-07-08 14:37:28'),
(30, 'Benham Pharmaceuticals Ltd', 'active', '2026-07-08 14:37:28', '2026-07-08 14:37:28');

-- --------------------------------------------------------

--
-- Table structure for table `medicine_strengths`
--

CREATE TABLE `medicine_strengths` (
  `id` int(11) NOT NULL,
  `strength_name` varchar(50) NOT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medicine_strengths`
--

INSERT INTO `medicine_strengths` (`id`, `strength_name`, `status`, `created_at`, `updated_at`) VALUES
(1, '0.25 mg', 'active', '2026-07-08 14:37:53', '2026-07-08 14:37:53'),
(2, '0.5 mg', 'active', '2026-07-08 14:37:53', '2026-07-08 14:37:53'),
(3, '1 mg', 'active', '2026-07-08 14:37:53', '2026-07-08 14:37:53'),
(4, '2 mg', 'active', '2026-07-08 14:37:53', '2026-07-08 14:37:53'),
(5, '2.5 mg', 'active', '2026-07-08 14:37:53', '2026-07-08 14:37:53'),
(6, '3 mg', 'active', '2026-07-08 14:37:53', '2026-07-08 14:37:53'),
(7, '4 mg', 'active', '2026-07-08 14:37:53', '2026-07-08 14:37:53'),
(8, '5 mg', 'active', '2026-07-08 14:37:53', '2026-07-08 14:37:53'),
(9, '6 mg', 'active', '2026-07-08 14:37:53', '2026-07-08 14:37:53'),
(10, '7.5 mg', 'active', '2026-07-08 14:37:53', '2026-07-08 14:37:53'),
(11, '8 mg', 'active', '2026-07-08 14:37:53', '2026-07-08 14:37:53'),
(12, '10 mg', 'active', '2026-07-08 14:37:53', '2026-07-08 14:37:53'),
(13, '12.5 mg', 'active', '2026-07-08 14:37:53', '2026-07-08 14:37:53'),
(14, '16 mg', 'active', '2026-07-08 14:37:53', '2026-07-08 14:37:53'),
(15, '20 mg', 'active', '2026-07-08 14:37:53', '2026-07-08 14:37:53'),
(16, '25 mg', 'active', '2026-07-08 14:37:53', '2026-07-08 14:37:53'),
(17, '30 mg', 'active', '2026-07-08 14:37:53', '2026-07-08 14:37:53'),
(18, '40 mg', 'active', '2026-07-08 14:37:53', '2026-07-08 14:37:53'),
(19, '50 mg', 'active', '2026-07-08 14:37:53', '2026-07-08 14:37:53'),
(20, '60 mg', 'active', '2026-07-08 14:37:53', '2026-07-08 14:37:53'),
(21, '75 mg', 'active', '2026-07-08 14:37:53', '2026-07-08 14:37:53'),
(22, '80 mg', 'active', '2026-07-08 14:37:53', '2026-07-08 14:37:53'),
(23, '81 mg', 'active', '2026-07-08 14:37:53', '2026-07-08 14:37:53'),
(24, '100 mg', 'active', '2026-07-08 14:37:53', '2026-07-08 14:37:53'),
(25, '120 mg', 'active', '2026-07-08 14:37:53', '2026-07-08 14:37:53'),
(26, '150 mg', 'active', '2026-07-08 14:37:53', '2026-07-08 14:37:53'),
(27, '200 mg', 'active', '2026-07-08 14:37:53', '2026-07-08 14:37:53'),
(28, '250 mg', 'active', '2026-07-08 14:37:53', '2026-07-08 14:37:53'),
(29, '300 mg', 'active', '2026-07-08 14:37:53', '2026-07-08 14:37:53'),
(30, '325 mg', 'active', '2026-07-08 14:37:53', '2026-07-08 14:37:53'),
(31, '400 mg', 'active', '2026-07-08 14:37:53', '2026-07-08 14:37:53'),
(32, '450 mg', 'active', '2026-07-08 14:37:53', '2026-07-08 14:37:53'),
(33, '500 mg', 'active', '2026-07-08 14:37:53', '2026-07-08 14:37:53'),
(34, '550 mg', 'active', '2026-07-08 14:37:53', '2026-07-08 14:37:53'),
(35, '600 mg', 'active', '2026-07-08 14:37:53', '2026-07-08 14:37:53'),
(36, '750 mg', 'active', '2026-07-08 14:37:53', '2026-07-08 14:37:53'),
(37, '800 mg', 'active', '2026-07-08 14:37:53', '2026-07-08 14:37:53'),
(38, '1000 mg', 'active', '2026-07-08 14:37:53', '2026-07-08 14:37:53'),
(39, '1.5 gm', 'active', '2026-07-08 14:37:53', '2026-07-08 14:37:53'),
(40, '2 gm', 'active', '2026-07-08 14:37:53', '2026-07-08 14:37:53'),
(41, '5 ml', 'active', '2026-07-08 14:37:53', '2026-07-08 14:37:53'),
(42, '10 ml', 'active', '2026-07-08 14:37:53', '2026-07-08 14:37:53'),
(43, '15 ml', 'active', '2026-07-08 14:37:53', '2026-07-08 14:37:53'),
(44, '20 ml', 'active', '2026-07-08 14:37:53', '2026-07-08 14:37:53'),
(45, '30 ml', 'active', '2026-07-08 14:37:53', '2026-07-08 14:37:53'),
(46, '50 ml', 'active', '2026-07-08 14:37:53', '2026-07-08 14:37:53'),
(47, '100 ml', 'active', '2026-07-08 14:37:53', '2026-07-08 14:37:53'),
(48, '200 ml', 'active', '2026-07-08 14:37:53', '2026-07-08 14:37:53'),
(49, '250 ml', 'active', '2026-07-08 14:37:53', '2026-07-08 14:37:53');

-- --------------------------------------------------------

--
-- Table structure for table `medicine_types`
--

CREATE TABLE `medicine_types` (
  `id` int(11) NOT NULL,
  `type_name` varchar(50) NOT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medicine_types`
--

INSERT INTO `medicine_types` (`id`, `type_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Tablet', 'active', '2026-07-08 14:38:03', '2026-07-08 14:38:03'),
(2, 'Capsule', 'active', '2026-07-08 14:38:03', '2026-07-08 14:38:03'),
(3, 'Syrup', 'active', '2026-07-08 14:38:03', '2026-07-08 14:38:03'),
(4, 'Injection', 'active', '2026-07-08 14:38:03', '2026-07-08 14:38:03'),
(5, 'Suspension', 'active', '2026-07-08 14:38:03', '2026-07-08 14:38:03'),
(6, 'Oral Solution', 'active', '2026-07-08 14:38:03', '2026-07-08 14:38:03'),
(7, 'Drops', 'active', '2026-07-08 14:38:03', '2026-07-08 14:38:03'),
(8, 'Eye Drop', 'active', '2026-07-08 14:38:03', '2026-07-08 14:38:03'),
(9, 'Ear Drop', 'active', '2026-07-08 14:38:03', '2026-07-08 14:38:03'),
(10, 'Nasal Spray', 'active', '2026-07-08 14:38:03', '2026-07-08 14:38:03'),
(11, 'Inhaler', 'active', '2026-07-08 14:38:03', '2026-07-08 14:38:03'),
(12, 'Respule', 'active', '2026-07-08 14:38:03', '2026-07-08 14:38:03'),
(13, 'Cream', 'active', '2026-07-08 14:38:03', '2026-07-08 14:38:03'),
(14, 'Ointment', 'active', '2026-07-08 14:38:03', '2026-07-08 14:38:03'),
(15, 'Gel', 'active', '2026-07-08 14:38:03', '2026-07-08 14:38:03'),
(16, 'Lotion', 'active', '2026-07-08 14:38:03', '2026-07-08 14:38:03'),
(17, 'Powder', 'active', '2026-07-08 14:38:03', '2026-07-08 14:38:03'),
(18, 'Sachet', 'active', '2026-07-08 14:38:03', '2026-07-08 14:38:03'),
(19, 'Suppository', 'active', '2026-07-08 14:38:03', '2026-07-08 14:38:03');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `patient_code` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `gender` enum('male','female','others') NOT NULL,
  `date_of_birth` date NOT NULL,
  `blood_group` enum('A+','A-','B+','B-','AB+','AB-','O+','O-') DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `nid` varchar(20) DEFAULT NULL,
  `occupation` varchar(50) DEFAULT NULL,
  `marital_status` enum('single','married','divorced') DEFAULT NULL,
  `address` text DEFAULT NULL,
  `emergency_contact_name` varchar(50) DEFAULT NULL,
  `emergency_contact_phone` varchar(20) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `patient_code`, `name`, `gender`, `date_of_birth`, `blood_group`, `phone`, `email`, `nid`, `occupation`, `marital_status`, `address`, `emergency_contact_name`, `emergency_contact_phone`, `image`, `status`, `created_by`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'PT-000001', 'Md Shajjad Hossain', 'male', '2005-12-30', 'O+', '01750086600', 'shajjad@gmail.com', '3762502015', 'Student', '', 'Hossain Market', 'Faisal', '01750086600', 'md-shajjad-hossain-1783357234.jpg', 'active', 0, 0, NULL, '2026-07-06 17:00:34', '2026-07-06 17:00:34');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `amount_paid` decimal(10,2) NOT NULL DEFAULT 0.00,
  `payment_date` date NOT NULL,
  `payment_method` enum('Cash','Card','Mobile Banking') NOT NULL,
  `received_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prescriptions`
--

CREATE TABLE `prescriptions` (
  `id` int(11) NOT NULL,
  `consultation_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `prescription_date` date NOT NULL,
  `additional_notes` text DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prescriptions`
--

INSERT INTO `prescriptions` (`id`, `consultation_id`, `patient_id`, `doctor_id`, `prescription_date`, `additional_notes`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 0, 0, 0, '2026-07-08', NULL, NULL, '2026-07-08 13:29:57', '2026-07-08 13:29:57'),
(2, 0, 0, 0, '2026-07-08', NULL, NULL, '2026-07-08 13:29:57', '2026-07-08 13:29:57'),
(3, 1, 1, 1, '2026-07-08', NULL, NULL, '2026-07-08 13:40:47', '2026-07-08 13:40:47'),
(4, 1, 1, 1, '2026-07-08', NULL, NULL, '2026-07-08 16:20:34', '2026-07-08 16:20:34');

-- --------------------------------------------------------

--
-- Table structure for table `prescription_medicines`
--

CREATE TABLE `prescription_medicines` (
  `id` int(11) NOT NULL,
  `prescription_id` int(11) NOT NULL,
  `medicine_id` int(11) NOT NULL,
  `dose_id` int(11) NOT NULL,
  `frequency_id` int(11) NOT NULL,
  `duration_id` int(11) NOT NULL,
  `instruction_id` int(11) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `sort_order` int(11) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prescription_medicines`
--

INSERT INTO `prescription_medicines` (`id`, `prescription_id`, `medicine_id`, `dose_id`, `frequency_id`, `duration_id`, `instruction_id`, `remarks`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 0, 1, 1, '', 0, '2026-07-08 13:29:57', '2026-07-08 13:29:57'),
(2, 2, 1, 1, 0, 1, 1, '', 0, '2026-07-08 13:29:57', '2026-07-08 13:29:57'),
(3, 3, 1, 1, 0, 1, 0, '', 0, '2026-07-08 13:40:47', '2026-07-08 13:40:47'),
(4, 4, 1, 1, 0, 1, 0, '', 0, '2026-07-08 16:20:34', '2026-07-08 16:20:34'),
(5, 4, 3, 7, 0, 4, 0, '', 0, '2026-07-08 16:20:34', '2026-07-08 16:20:34');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin role  work here', '2026-07-06 11:09:29', '2026-07-06 11:10:18'),
(2, 'Assistant', 'assistant role', '2026-07-06 11:09:42', '2026-07-06 11:09:42'),
(3, 'Doctor', 'docor role', '2026-07-06 11:10:06', '2026-07-06 11:10:06');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `test_category_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `test_category`
--

CREATE TABLE `test_category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `username`, `password`, `name`, `email`, `phone`, `image`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin', '$2y$10$hhZNHZ3jASkA3aRgJHaqBO98U4T3QNjJ4igsgz2Toe4C0LJt2mpJO', 'Faisal Munna', 'admin@gmail.com', '01750086600', 'faisal-munna-1783347298.jpg', 'active', NULL, '2026-07-06 11:10:43', '2026-07-06 15:52:56'),
(2, 3, 'doctor', '$2y$10$WPOnIFc1MQac9CEZuowVV.cie0hAcZXvOrR7YR04dK3MEIt/5h.8S', 'Dr. Sirajee Shafiqul Islam', 'sirajee@gmail.com', '017500', 'dr-sirajee-shafiqul-islam-1783524183.jpg', 'active', NULL, '2026-07-06 11:13:23', '2026-07-08 15:23:03'),
(3, 2, 'assistant', '$2y$10$m4MZY/yi7mdlYJ4LwS5Y/uyg6MAQGyL8gkb8HBNV243Pnjb3tBFpS', 'Shajjad Patwary', 'shajjad@gmail.com', '017500', 'shajjad-patwary-1783347271.jpg', 'active', NULL, '2026-07-06 11:15:02', '2026-07-06 14:14:31'),
(4, 3, 'mahmud', '$2y$10$stio3qGLhaQAHskOHyFOF.x/l17qQsv3byJ/vK6m384ymDeRJHmri', 'Md. Mahmud Hasan', 'mahmud@gmail.com', '01750000000', 'madud-hhhhhhhh-1783347323.jpg', 'active', NULL, '2026-07-06 12:15:01', '2026-07-06 15:12:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `consultations`
--
ALTER TABLE `consultations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor_schedules`
--
ALTER TABLE `doctor_schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `follow_ups`
--
ALTER TABLE `follow_ups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_items`
--
ALTER TABLE `invoice_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lab_orders`
--
ALTER TABLE `lab_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lab_results`
--
ALTER TABLE `lab_results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicines`
--
ALTER TABLE `medicines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicine_doses`
--
ALTER TABLE `medicine_doses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicine_durations`
--
ALTER TABLE `medicine_durations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicine_frequencies`
--
ALTER TABLE `medicine_frequencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicine_generics`
--
ALTER TABLE `medicine_generics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicine_instructions`
--
ALTER TABLE `medicine_instructions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicine_manufacturers`
--
ALTER TABLE `medicine_manufacturers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicine_strengths`
--
ALTER TABLE `medicine_strengths`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicine_types`
--
ALTER TABLE `medicine_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prescription_medicines`
--
ALTER TABLE `prescription_medicines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_category`
--
ALTER TABLE `test_category`
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
-- AUTO_INCREMENT for table `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `consultations`
--
ALTER TABLE `consultations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `doctor_schedules`
--
ALTER TABLE `doctor_schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `follow_ups`
--
ALTER TABLE `follow_ups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice_items`
--
ALTER TABLE `invoice_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lab_orders`
--
ALTER TABLE `lab_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lab_results`
--
ALTER TABLE `lab_results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medicines`
--
ALTER TABLE `medicines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `medicine_doses`
--
ALTER TABLE `medicine_doses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `medicine_durations`
--
ALTER TABLE `medicine_durations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `medicine_frequencies`
--
ALTER TABLE `medicine_frequencies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `medicine_generics`
--
ALTER TABLE `medicine_generics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `medicine_instructions`
--
ALTER TABLE `medicine_instructions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `medicine_manufacturers`
--
ALTER TABLE `medicine_manufacturers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `medicine_strengths`
--
ALTER TABLE `medicine_strengths`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `medicine_types`
--
ALTER TABLE `medicine_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prescriptions`
--
ALTER TABLE `prescriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `prescription_medicines`
--
ALTER TABLE `prescription_medicines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `test_category`
--
ALTER TABLE `test_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
