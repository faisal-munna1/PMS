-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2026 at 08:39 PM
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
(1, 'Napa', 1, 1, 1, 1, 'active', '2026-07-06 17:59:53', '2026-07-06 17:59:53');

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
(1, '3ml');

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
(1, '5 days');

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
(1, '1+1+1');

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
(1, 'peracitamol', 'active', '2026-07-06 17:30:47', '2026-07-06 17:30:47');

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
(1, 'after meal'),
(2, 'before meal');

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
(1, 'popular', 'active', '2026-07-06 17:30:58', '2026-07-06 17:30:58');

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
(1, '500mg', 'active', '2026-07-06 17:48:22', '2026-07-06 17:48:22');

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
(1, 'Syrup', 'active', '2026-07-06 17:31:20', '2026-07-06 17:31:20');

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
(2, 3, 'doctor', '$2y$10$WPOnIFc1MQac9CEZuowVV.cie0hAcZXvOrR7YR04dK3MEIt/5h.8S', 'Dr. Sirajee Shafiqul Islam', 'sirajee@gmail.com', '017500', 'dr-sirajee-shafiqul-islam-1783350534.jpg', 'active', NULL, '2026-07-06 11:13:23', '2026-07-06 15:08:54'),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `medicine_doses`
--
ALTER TABLE `medicine_doses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `medicine_durations`
--
ALTER TABLE `medicine_durations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `medicine_frequencies`
--
ALTER TABLE `medicine_frequencies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `medicine_generics`
--
ALTER TABLE `medicine_generics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `medicine_instructions`
--
ALTER TABLE `medicine_instructions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `medicine_manufacturers`
--
ALTER TABLE `medicine_manufacturers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `medicine_strengths`
--
ALTER TABLE `medicine_strengths`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `medicine_types`
--
ALTER TABLE `medicine_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prescription_medicines`
--
ALTER TABLE `prescription_medicines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
