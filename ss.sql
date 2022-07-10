-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2022 at 08:55 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ss`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic_semester`
--

CREATE TABLE `academic_semester` (
  `asemister_id` int(1) NOT NULL,
  `semister` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `academic_semester`
--

INSERT INTO `academic_semester` (`asemister_id`, `semister`) VALUES
(3, '1'),
(4, '2'),
(5, '3'),
(6, '4'),
(7, '5'),
(8, '6');

-- --------------------------------------------------------

--
-- Table structure for table `academic_year`
--

CREATE TABLE `academic_year` (
  `ay_id` int(2) NOT NULL,
  `academic_year` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `academic_year`
--

INSERT INTO `academic_year` (`ay_id`, `academic_year`) VALUES
(1, 2022),
(2, 2023),
(5, 2024),
(6, 2025);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `school_id` int(2) NOT NULL,
  `school_branch_id` int(1) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `admin_role` int(1) NOT NULL,
  `regdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `school_id`, `school_branch_id`, `username`, `password`, `admin_role`, `regdate`) VALUES
(1, 31, 44, 'sol', '123', 1, '2022-07-02 02:34:41'),
(2, 31, 44, 'shewa', '123', 4, '2022-07-05 05:15:30'),
(3, 32, 47, 'admin', '123', 2, '2022-07-05 05:15:36');

-- --------------------------------------------------------

--
-- Table structure for table `class_grade`
--

CREATE TABLE `class_grade` (
  `class_grade_id` int(4) NOT NULL,
  `school_id` varchar(5) NOT NULL,
  `school_branch_id` varchar(5) NOT NULL,
  `academic_year` year(4) NOT NULL,
  `academic_semester` year(4) NOT NULL,
  `building_id` varchar(5) NOT NULL,
  `class_id` varchar(5) NOT NULL,
  `grade_id` int(5) NOT NULL,
  `assigned_by` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class_grade`
--

INSERT INTO `class_grade` (`class_grade_id`, `school_id`, `school_branch_id`, `academic_year`, `academic_semester`, `building_id`, `class_id`, `grade_id`, `assigned_by`) VALUES
(22, '31', '44', 2025, 2006, '8', '36', 15, 'shewa'),
(23, '31', '44', 2025, 2006, '8', '37', 15, 'shewa'),
(24, '31', '44', 2025, 2006, '8', '38', 15, 'shewa'),
(25, '31', '44', 2025, 2006, '9', '39', 15, 'shewa'),
(26, '31', '44', 2025, 2006, '9', '40', 18, 'shewa');

-- --------------------------------------------------------

--
-- Table structure for table `grade_subject`
--

CREATE TABLE `grade_subject` (
  `grade_subject_id` int(3) NOT NULL,
  `school_id` int(3) NOT NULL,
  `school_branch_id` int(3) NOT NULL,
  `grade_id` int(2) NOT NULL,
  `subject_id` varchar(50) NOT NULL,
  `registered_by` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grade_subject`
--

INSERT INTO `grade_subject` (`grade_subject_id`, `school_id`, `school_branch_id`, `grade_id`, `subject_id`, `registered_by`) VALUES
(36, 31, 44, 16, '20,', 'shewa'),
(37, 31, 44, 15, '23,24,', 'shewa'),
(38, 31, 44, 18, '20,21,22,', 'shewa');

-- --------------------------------------------------------

--
-- Table structure for table `parent_registration`
--

CREATE TABLE `parent_registration` (
  `parent_id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `school_id` int(5) NOT NULL,
  `parent_name` varchar(70) NOT NULL,
  `parent_fullname_am` varchar(70) NOT NULL,
  `student_id` int(11) NOT NULL,
  `id_card` varchar(255) NOT NULL,
  `educational_level` varchar(14) NOT NULL,
  `parent_picture` varchar(255) NOT NULL,
  `region` varchar(11) NOT NULL,
  `subcity` varchar(20) NOT NULL,
  `woreda` varchar(10) NOT NULL,
  `kebele` varchar(10) NOT NULL,
  `house_no` varchar(12) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `approval` int(1) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parent_registration`
--

INSERT INTO `parent_registration` (`parent_id`, `username`, `school_id`, `parent_name`, `parent_fullname_am`, `student_id`, `id_card`, `educational_level`, `parent_picture`, `region`, `subcity`, `woreda`, `kebele`, `house_no`, `phone`, `approval`, `timestamp`) VALUES
(11, 'shewa', 31, 'Shewaye Habte', 'ሸዋዬ ሐብቴ', 27, 'fulltext_ajnfs-v2-id1040-with-cover-page-v2.pdf', 'Certificate', 'Lab_eiar_stamp.PNG', 'Addis Ababa', 'Lemi Kura', '02', '-', '004/001', '0902519263', 1, '2022-06-30 00:35:48'),
(12, 'sol', 32, 'Solomon Abate', 'ሰሎሞን አባተ', 27, 'bsc1.png', 'Ph.D.', '20190823_191657.jpg', 'Addis Ababa', 'Lemi Kura', '02', '11', '004/001', '0911772778', 1, '2022-06-30 08:43:25'),
(13, 'mulu', 31, 'muluken abate', 'uyyy', 28, '', 'BSc/BA', '', 'Addis Ababa', 'Gullele', '55', '9', '99', '0000', 1, '2022-07-01 18:07:16'),
(14, 'mulu', 31, 'abate mek', 'uyyy', 29, '', 'BSc/BA', '', 'Addis Ababa', 'Gullele', '55', '9', '99', '0000', 1, '2022-07-01 18:09:41');

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `region_id` int(11) NOT NULL,
  `region_name_e` varchar(40) NOT NULL,
  `region_name_a` varchar(40) NOT NULL,
  `population` int(20) NOT NULL,
  `area` int(20) NOT NULL,
  `density` decimal(10,0) NOT NULL,
  `capital` varchar(15) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`region_id`, `region_name_e`, `region_name_a`, `population`, `area`, `density`, `capital`, `timestamp`) VALUES
(1, 'Addis Ababa', '??? ???', 2, 527, '5', 'N/A', '0000-00-00 00:00:00'),
(2, 'Afar Region', '???', 1, 72, '20', 'Semera', '0000-00-00 00:00:00'),
(3, 'Amhara Region', '???', 17, 154, '111', 'Bahir Dar', '0000-00-00 00:00:00'),
(4, 'Benishangul-Gumuz Region', '?????? ???', 670, 50, '13', 'Asosa', '0000-00-00 00:00:00'),
(5, 'Dire Dawa', '????', 341, 1, '219', 'N/A', '0000-00-00 00:00:00'),
(6, 'Gambela Region', '????', 306, 29, '10', 'Gambela', '0000-00-00 00:00:00'),
(7, 'Harari Region', '???', 183, 334, '549', 'Harar', '0000-00-00 00:00:00'),
(8, 'Oromia Region', '????', 27, 284, '95', 'Addis Ababa', '0000-00-00 00:00:00'),
(9, 'Sidama Region', '???', 0, 0, '0', 'Hawassa', '2022-06-24 02:57:44'),
(10, 'Somali Region', '???', 4, 279, '16', 'Jijiga', '0000-00-00 00:00:00'),
(11, 'South West Region', '??? ????', 0, 0, '0', 'Bonga', '2022-06-24 02:58:06'),
(12, 'Southern Nations, Nationalities, and Peo', '???', 15, 105, '142', 'Hawassa', '0000-00-00 00:00:00'),
(13, 'Tigray Region', '????', 4, 41, '104', 'Mek\'ele', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `rectime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role`, `description`, `rectime`) VALUES
(1, 'Director', 'Director is a person who has responsibility to manage the whole activities of the school compound accountable to the board of management.', '2022-06-22 09:53:45'),
(2, 'Teacher', 'All teachers assigned to the school', '2022-06-22 10:34:09'),
(3, 'Student', 'Registered and currently active students in the school are under this category', '2022-06-22 10:35:34'),
(4, 'Parent', 'In this group of users all parents having students in the class are groupd', '2022-06-22 10:48:46'),
(5, 'Other staff', 'Staff other than teachers, directors, and management members are categorized here', '2022-06-23 05:13:32'),
(6, 'Owner', 'School owners', '2022-06-23 05:14:06'),
(7, 'Guest', 'Any user who have privilege to access some restricted information from the school', '2022-06-26 02:50:09');

-- --------------------------------------------------------

--
-- Table structure for table `school_basic_info`
--

CREATE TABLE `school_basic_info` (
  `school_id` int(11) NOT NULL,
  `school_name` varchar(200) NOT NULL,
  `noOfbranches` int(1) NOT NULL,
  `slogan` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `telegram` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `registeredBy` varchar(50) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `school_basic_info`
--

INSERT INTO `school_basic_info` (`school_id`, `school_name`, `noOfbranches`, `slogan`, `logo`, `website`, `twitter`, `telegram`, `facebook`, `instagram`, `registeredBy`, `timestamp`) VALUES
(31, 'Ozone School', 3, 'We are proud', 'FD-firstbite1029_025 (1).jpg', 'rqwrqr', 'asfasfa', 'afafa', 'erqwrq', 'afadfa', 'sol', '2022-06-26 10:41:34'),
(32, 'Zenebu School', 1, 'Quality Education', 'EIAR.jpg', 'wrwrq', 'wtwtw', 'qqerq', 'qreqr', 'qrqer', '', '2022-06-26 11:17:24'),
(33, 'aki', 2, '', '', '', '', '', '', '', 'meresa', '2022-07-01 18:30:02');

-- --------------------------------------------------------

--
-- Table structure for table `school_branches`
--

CREATE TABLE `school_branches` (
  `school_branch_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `branch_name` varchar(50) NOT NULL,
  `level` varchar(20) NOT NULL,
  `gradeFrom` varchar(10) NOT NULL,
  `gradeTo` varchar(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(70) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `studentCapacity` int(6) NOT NULL,
  `recBy` varchar(40) NOT NULL,
  `timeStamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `school_branches`
--

INSERT INTO `school_branches` (`school_branch_id`, `school_id`, `branch_name`, `level`, `gradeFrom`, `gradeTo`, `address`, `email`, `phone`, `studentCapacity`, `recBy`, `timeStamp`) VALUES
(44, 31, 'Hayat branch', 'Nursery', '1', '2', 'Bole Sub City. P.O.Box 2003, EgziabherAb Church', 'dgeleti2005@yahoo.com', '+251930469511', 0, 'sol', '2022-06-26 10:41:49'),
(45, 31, 'Tafo branch', 'Advanced school', '4', '8', '8200 misty meadow ct.', 'dgeleti2005@yahoo.com', '+251930469511', 0, 'sol', '2022-06-26 10:42:03'),
(46, 31, 'SaliteMihiret Branch', 'Advanced school', '11', '12', 'Bole Sub City. P.O.Box 2003, EgziabherAb Church', 'solomon.abt@snu.ac.kr', '+251911772778', 0, 'sol', '2022-06-26 10:42:19'),
(47, 32, 'fafa', 'kindergarten', '1', '12', 'Bole Sub City. P.O.Box 2003, EgziabherAb Church', 'dgeleti2005@yahoo.com', '+251930469511', 0, '', '2022-06-26 11:17:39'),
(48, 33, 'b1', 'kindergarten', '1', '6', '', '', '', 0, 'meresa', '2022-07-01 18:31:11'),
(49, 33, 'b2', 'Secondary school', '', '', '', '', '', 0, 'meresa', '2022-07-01 18:31:46');

-- --------------------------------------------------------

--
-- Table structure for table `school_buildings`
--

CREATE TABLE `school_buildings` (
  `building_id` int(3) NOT NULL,
  `school_id` int(2) NOT NULL,
  `school_branch_id` int(2) NOT NULL,
  `building_name` varchar(7) NOT NULL,
  `no_of_floors` int(2) NOT NULL,
  `no_of_rooms` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `school_buildings`
--

INSERT INTO `school_buildings` (`building_id`, `school_id`, `school_branch_id`, `building_name`, `no_of_floors`, `no_of_rooms`) VALUES
(8, 31, 44, 'Zema', 2, 30),
(9, 31, 44, 'Mamo', 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `school_class`
--

CREATE TABLE `school_class` (
  `class_id` int(2) NOT NULL,
  `school_id` int(2) NOT NULL,
  `school_branch_id` int(3) NOT NULL,
  `building_id` varchar(5) NOT NULL,
  `class_name` varchar(5) NOT NULL,
  `carying_capacity` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `school_class`
--

INSERT INTO `school_class` (`class_id`, `school_id`, `school_branch_id`, `building_id`, `class_name`, `carying_capacity`) VALUES
(36, 31, 44, '8', 'A', 10),
(37, 31, 44, '8', 'B', 10),
(38, 31, 44, '8', 'C', 10),
(39, 31, 44, '9', 'A', 3),
(40, 31, 44, '9', 'B', 5);

-- --------------------------------------------------------

--
-- Table structure for table `school_class_schedule`
--

CREATE TABLE `school_class_schedule` (
  `class_schedule_id` int(11) NOT NULL,
  `school_id` int(3) NOT NULL,
  `school_branch_id` int(3) NOT NULL,
  `academic_year` date NOT NULL,
  `academic_semister` varchar(6) NOT NULL,
  `grade_id` int(2) NOT NULL,
  `building_id` int(11) NOT NULL,
  `section_id` int(3) NOT NULL,
  `day` varchar(10) NOT NULL,
  `time_from` time NOT NULL,
  `time_to` varchar(10) NOT NULL,
  `subject` varchar(5) NOT NULL,
  `teacher_id` varchar(3) NOT NULL,
  `registered_by` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `school_daily_time_basic`
--

CREATE TABLE `school_daily_time_basic` (
  `dailyTime_id` int(11) NOT NULL,
  `school_id` int(3) NOT NULL,
  `school_branch_id` int(3) NOT NULL,
  `schedule_category` varchar(50) NOT NULL,
  `date_when` varchar(12) NOT NULL,
  `morningPeriodFrom` time NOT NULL,
  `morningPeriodTo` time NOT NULL,
  `afternoonPeriodFrom` time NOT NULL,
  `afternoonPeriodTo` time NOT NULL,
  `timePerClass` int(11) NOT NULL,
  `morningBreakTimeFrom` time NOT NULL,
  `morningBreakTimeTo` time NOT NULL,
  `afternoonBreakTimeFrom` time NOT NULL,
  `afternoonBreakTimeTo` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `school_daily_time_basic`
--

INSERT INTO `school_daily_time_basic` (`dailyTime_id`, `school_id`, `school_branch_id`, `schedule_category`, `date_when`, `morningPeriodFrom`, `morningPeriodTo`, `afternoonPeriodFrom`, `afternoonPeriodTo`, `timePerClass`, `morningBreakTimeFrom`, `morningBreakTimeTo`, `afternoonBreakTimeFrom`, `afternoonBreakTimeTo`) VALUES
(2, 31, 44, 'Regular', '2022-07-08', '08:00:00', '05:30:00', '01:00:00', '03:30:00', 60, '09:30:00', '10:00:00', '02:30:00', '03:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `school_grade`
--

CREATE TABLE `school_grade` (
  `grade_id` int(9) NOT NULL,
  `school_id` int(4) NOT NULL,
  `school_branch_id` int(4) NOT NULL,
  `grade_name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `school_grade`
--

INSERT INTO `school_grade` (`grade_id`, `school_id`, `school_branch_id`, `grade_name`) VALUES
(15, 31, 44, 'KG1'),
(16, 31, 44, 'KG2'),
(17, 31, 44, 'KG3'),
(18, 31, 44, '6');

-- --------------------------------------------------------

--
-- Table structure for table `school_sections`
--

CREATE TABLE `school_sections` (
  `class_id` int(2) NOT NULL,
  `school_id` int(2) NOT NULL,
  `school_branch_id` int(3) NOT NULL,
  `grade` int(2) NOT NULL,
  `section_name` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `staff_registration`
--

CREATE TABLE `staff_registration` (
  `s_id` int(11) NOT NULL,
  `school_id` int(2) NOT NULL,
  `username` varchar(50) NOT NULL,
  `staff_id` varchar(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `father_name` varchar(30) NOT NULL,
  `gf_name` varchar(30) NOT NULL,
  `stff_fullname_am` varchar(70) NOT NULL,
  `staff_role` int(1) NOT NULL,
  `gender` varchar(5) NOT NULL,
  `birth_date` date NOT NULL,
  `blood_type` varchar(5) NOT NULL,
  `health_status` varchar(25) NOT NULL,
  `educational_level` varchar(30) NOT NULL,
  `job_position` varchar(50) NOT NULL,
  `job_level` varchar(6) NOT NULL,
  `employement_date` date NOT NULL,
  `region` varchar(20) NOT NULL,
  `zone_subcity` varchar(20) NOT NULL,
  `woreda` varchar(20) NOT NULL,
  `kebele` varchar(10) NOT NULL,
  `house_no` varchar(10) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `incaseOfemergency` varchar(70) NOT NULL,
  `emergency_phone` varchar(12) NOT NULL,
  `resident_id` varchar(255) NOT NULL,
  `staff_picture` varchar(255) NOT NULL,
  `attach1` varchar(255) NOT NULL,
  `attach2` varchar(255) NOT NULL,
  `attach3` varchar(255) NOT NULL,
  `staff_approval` int(1) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff_registration`
--

INSERT INTO `staff_registration` (`s_id`, `school_id`, `username`, `staff_id`, `first_name`, `father_name`, `gf_name`, `stff_fullname_am`, `staff_role`, `gender`, `birth_date`, `blood_type`, `health_status`, `educational_level`, `job_position`, `job_level`, `employement_date`, `region`, `zone_subcity`, `woreda`, `kebele`, `house_no`, `phone`, `incaseOfemergency`, `emergency_phone`, `resident_id`, `staff_picture`, `attach1`, `attach2`, `attach3`, `staff_approval`, `timestamp`) VALUES
(27, 31, 'zemenu', '5971', 'Zemenu', 'Hassen', 'Embilta', 'fafadf', 0, 'Male', '2022-06-13', 'Blood', 'Frequently sick', 'Elementary', 'Senior teacher', 'III', '2022-05-29', 'Addis Ababa', 'Gullele', '12', '11', '001', '09rwerq', '', '', '', '', '', '', '', 1, '2022-06-28 06:13:51'),
(28, 31, 'kemal', '5971', 'Kemal', 'Jemal', 'Chilot', 'fadfa', 0, 'Male', '2022-06-13', 'Blood', 'Physically disabled', 'Level I', 'Senior teacher', 'II', '2022-05-30', 'Addis Ababa', 'Gullele', '12', '11', '001', '0966776555', 'fasfafd', '0945655577', 'kuku.jpg', 'Kuku(Redu)_Photo.jpg', 'org.csv', 'subcity.csv', 'zones.csv', 1, '2022-06-28 07:35:03'),
(29, 32, 'tedi', '98765', 'Tedi', 'Taz', 'Abe', 'fadaerwe', 0, 'Male', '2022-06-13', 'Blood', 'Frequently sick', 'Level I', 'Senior teacher', 'I', '2022-06-14', 'Addis Ababa', 'Gullele', '22', '11', '001', '09755241', 'afddeeqrq', '096465442', 'mesob.jpg', 'kuku.jpg', 'crown.jpg', 'zones.csv', 'fulltext_ajnfs-v2-id1040-with-cover-page-v2.pdf', 1, '2022-06-30 01:15:36'),
(31, 31, 'meresa', '5971', 'Meresa', 'Adhana', 'Aba', '03124566', 0, 'Male', '2022-06-27', 'Blood', 'Healthy', 'BSc/BA', 'Medium teacher', 'III', '2022-07-10', 'Addis Ababa', 'Arada', '7', '09', '343', '092311452', 'afddeeqrq', '09542314', 'insects.jpg', 'kas1.jpg', 'eipo_letter.pdf', 'donors.xlsx', 'DNA.jpg', 1, '2022-07-01 05:42:29');

-- --------------------------------------------------------

--
-- Table structure for table `student_class_location`
--

CREATE TABLE `student_class_location` (
  `stud_class_id` int(11) NOT NULL,
  `student_fullname` varchar(40) NOT NULL,
  `school_id` int(2) NOT NULL,
  `school_branch_id` int(2) NOT NULL,
  `academic_year` varchar(4) NOT NULL,
  `academic_semester` varchar(5) NOT NULL,
  `grade` varchar(5) NOT NULL,
  `building` varchar(5) NOT NULL,
  `allocated_section` varchar(5) NOT NULL,
  `assigned_by` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_class_location`
--

INSERT INTO `student_class_location` (`stud_class_id`, `student_fullname`, `school_id`, `school_branch_id`, `academic_year`, `academic_semester`, `grade`, `building`, `allocated_section`, `assigned_by`) VALUES
(9, 'Rediet Solomon Abate', 31, 44, '2025', '6', '18', '40', '', 'shewa'),
(10, 'Amen Muluken Abate', 31, 44, '2025', '6', '15', '36', '', 'shewa'),
(11, 'tsehay zenebu kkkl', 31, 44, '2025', '6', '15', '36', '', 'shewa');

-- --------------------------------------------------------

--
-- Table structure for table `student_registration`
--

CREATE TABLE `student_registration` (
  `stu_id` int(11) NOT NULL,
  `school_id` int(2) NOT NULL,
  `username` varchar(50) NOT NULL,
  `student_id` varchar(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `father_name` varchar(30) NOT NULL,
  `gf_name` varchar(30) NOT NULL,
  `stu_fullname_am` varchar(70) NOT NULL,
  `gender` varchar(5) NOT NULL,
  `birth_date` date NOT NULL,
  `blood_type` varchar(5) NOT NULL,
  `health_status` varchar(25) NOT NULL,
  `mother_name` varchar(50) NOT NULL,
  `mother_phone` varchar(30) NOT NULL,
  `father_phone` varchar(11) NOT NULL,
  `grade` varchar(5) NOT NULL,
  `section` varchar(3) NOT NULL,
  `region` varchar(20) NOT NULL,
  `zone_subcity` varchar(20) NOT NULL,
  `woreda` varchar(20) NOT NULL,
  `kebele` varchar(10) NOT NULL,
  `house_no` varchar(10) NOT NULL,
  `school_from` varchar(70) NOT NULL,
  `your_id` varchar(255) NOT NULL,
  `student_picture` varchar(255) NOT NULL,
  `attach1` varchar(255) NOT NULL,
  `attach2` varchar(255) NOT NULL,
  `attach3` varchar(255) NOT NULL,
  `st_approval` int(1) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_registration`
--

INSERT INTO `student_registration` (`stu_id`, `school_id`, `username`, `student_id`, `first_name`, `father_name`, `gf_name`, `stu_fullname_am`, `gender`, `birth_date`, `blood_type`, `health_status`, `mother_name`, `mother_phone`, `father_phone`, `grade`, `section`, `region`, `zone_subcity`, `woreda`, `kebele`, `house_no`, `school_from`, `your_id`, `student_picture`, `attach1`, `attach2`, `attach3`, `st_approval`, `timestamp`) VALUES
(27, 31, 'redu', 'STU-31-27', 'Rediet', 'Solomon', 'Abate', 'dfafd', 'Femal', '2011-03-28', 'Blood', 'Frequently sick', 'shewaye habte', '0902519263', 'Solomon Aba', 'KG1', '', 'Addis Ababa', 'Lemi Kura', '02', '-', '004/001', 'Mieraf School', 'mesob.jpg', 'Kuku(Redu)_Photo.jpg', 'crops.csv', '', '', 1, '2022-07-07 07:57:27'),
(28, 31, 'amen', 'STU-31-28', 'Amen', 'Muluken', 'Abate', 'afdfa', 'Male', '2022-07-10', 'Blood', 'Occasionally sick', 'aynadis tadele', '09897666', '098765645', '1', '', 'Addis Ababa', 'Arada', '12', '11', '001', 'Bole', 'EDY6SAxWkAAKhJY.jpg', '', 'pic.jpg', 'image.jpg', 'bsc2.png', 1, '2022-07-05 09:23:56'),
(29, 32, 'zen', 'STU-32-29', 'tsehay', 'zenebu', 'kkkl', 'iioop', 'Femal', '2022-07-27', 'Blood', 'Healthy', 'pppp', '09998', '098888', '4', '', 'Addis Ababa', 'Kirkos', '1', '-', '109', 'mnhyt', '', '', '', '', '', 1, '2022-07-05 09:25:14');

-- --------------------------------------------------------

--
-- Table structure for table `subcities`
--

CREATE TABLE `subcities` (
  `subcity_id` int(2) NOT NULL,
  `subcity` varchar(20) NOT NULL,
  `area_km2` int(11) NOT NULL,
  `population` int(12) NOT NULL,
  `density` int(12) NOT NULL,
  `map` varchar(255) NOT NULL,
  `region_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subcities`
--

INSERT INTO `subcities` (`subcity_id`, `subcity`, `area_km2`, `population`, `density`, `map`, `region_id`) VALUES
(1, 'Addis Ketema', 7, 271, 36, 'no', 1),
(2, 'Akaky Kaliti', 118, 195, 1, 'no', 1),
(3, 'Arada', 10, 225, 23, 'no', 1),
(4, 'Bole', 122, 328, 2, 'no', 1),
(5, 'Gullele', 30, 284, 9, 'no', 1),
(6, 'Kirkos', 15, 235, 16, 'no', 1),
(7, 'Kolfe Keranio', 61, 546, 7, 'no', 1),
(8, 'Lideta', 9, 214, 23, 'no', 1),
(9, 'Nifas Silk-Lafto', 68, 335, 4, 'no', 1),
(10, 'Yeka', 85, 337, 39, 'no', 1),
(11, 'Lemi Kura', 0, 0, 0, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subject_id` int(2) NOT NULL,
  `school_id` int(2) NOT NULL,
  `school_branch_id` int(2) NOT NULL,
  `subject_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subject_id`, `school_id`, `school_branch_id`, `subject_name`) VALUES
(20, 31, 44, 'Amharic/ አማርኛ'),
(21, 31, 44, 'English'),
(22, 31, 44, 'Maths'),
(23, 31, 44, 'Chemistry'),
(24, 31, 44, 'Physics'),
(25, 31, 44, 'Biology'),
(26, 31, 44, 'Art/ ሥነ_ጥበብ'),
(27, 31, 44, 'CIVICS'),
(28, 31, 44, 'General Science'),
(30, 31, 44, 'History');

-- --------------------------------------------------------

--
-- Table structure for table `teachers_registration`
--

CREATE TABLE `teachers_registration` (
  `teacher_id` int(11) NOT NULL,
  `fullname` varchar(70) NOT NULL,
  `academic_year` year(4) NOT NULL,
  `academic_semester` varchar(3) NOT NULL,
  `grade` varchar(5) NOT NULL,
  `section` varchar(5) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `assigned_by` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teachers_registration`
--

INSERT INTO `teachers_registration` (`teacher_id`, `fullname`, `academic_year`, `academic_semester`, `grade`, `section`, `subject`, `assigned_by`) VALUES
(13, 'Zemenu Hassen Embilta', 2025, '6', 'KG1', 'A', 'Amharic/ አማርኛ', 'shewa'),
(14, 'Zemenu Hassen Embilta', 2025, '6', '4', 'A', 'Amharic/ አማርኛ', 'shewa'),
(15, 'Zemenu Hassen Embilta', 2025, '6', '2', 'A', 'Art/ ሥነ_ጥበብ', 'shewa'),
(17, 'Meresa Adhana Aba', 2025, '6', 'KG1', 'A', 'Maths', 'shewa'),
(18, 'Meresa Adhana Aba', 2025, '6', 'KG1', 'B', 'Physics', 'shewa'),
(19, '', 2025, '6', 'KG1', '', '', 'shewa'),
(20, '', 2025, '6', '6', '14', '', 'shewa');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `school_id` int(2) NOT NULL,
  `school_branch_id` int(2) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `fathername` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(50) NOT NULL,
  `contactno` varchar(11) NOT NULL,
  `role_request` int(2) NOT NULL,
  `role_request2` int(1) NOT NULL,
  `role_request3` int(1) NOT NULL,
  `role_request4` int(1) NOT NULL,
  `approval` int(1) NOT NULL,
  `role_id` int(2) NOT NULL,
  `role_id2` int(1) NOT NULL,
  `role_id3` int(1) NOT NULL,
  `role_id4` int(1) NOT NULL,
  `full_registration` int(1) NOT NULL,
  `posting_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `school_id`, `school_branch_id`, `fname`, `fathername`, `lname`, `email`, `password`, `contactno`, `role_request`, `role_request2`, `role_request3`, `role_request4`, `approval`, `role_id`, `role_id2`, `role_id3`, `role_id4`, `full_registration`, `posting_date`) VALUES
(23, 31, 0, 'Zemenu', 'Hassen', 'Embilta', 'zemenu', '123', '097733444', 2, 0, 0, 0, 1, 2, 0, 0, 0, 1, '2022-07-05 02:13:23'),
(24, 31, 0, 'Kemal', 'Jemal', 'Chilot', 'kemal', '123', '0911845732', 1, 0, 0, 0, 0, 1, 0, 0, 0, 1, '2022-07-01 18:38:12'),
(25, 31, 0, 'Tedi', 'Taz', 'Abe', 'tedi', '123', '0982343434', 2, 0, 0, 0, 1, 2, 0, 0, 0, 1, '2022-07-05 06:30:19'),
(26, 31, 0, 'Shewaye', 'Habte', 'Beza', 'shewa', '123', '0902519263', 4, 0, 0, 0, 1, 4, 0, 0, 0, 1, '2022-06-30 00:27:19'),
(27, 31, 0, 'Rediet', 'Solomon', 'Abate', 'redu', '123', '00000', 3, 0, 0, 0, 1, 3, 0, 0, 0, 1, '2022-06-28 12:55:50'),
(28, 32, 0, 'Solomon', 'Abate', 'Mekonnen', 'sol', '123', '0911772778', 4, 0, 0, 0, 1, 2, 0, 0, 0, 1, '2022-07-05 06:27:13'),
(31, 31, 0, 'Azeb', 'Kebede', 'Mekruia', 'azeb', '123', '091114555', 3, 0, 0, 0, 1, 3, 0, 0, 0, 0, '2022-07-01 02:57:52'),
(32, 31, 0, 'Meresa', 'Adhana', 'Aba', 'meresa', '123', '902134562', 2, 4, 1, 0, 1, 2, 1, 1, 0, 1, '2022-07-01 18:20:20'),
(33, 31, 0, 'Amen', 'Muluken', 'Abate', 'amen', '123', '09877656', 3, 0, 0, 0, 1, 3, 0, 0, 0, 1, '2022-07-01 17:21:38'),
(34, 32, 0, 'tsehay', 'zenebu', 'kk', 'zen', '123', '1234', 3, 0, 0, 0, 1, 3, 0, 0, 0, 1, '2022-07-01 17:46:57'),
(35, 31, 0, 'muluken', 'abate', 'mek', 'mulu', '123', '90777', 4, 0, 0, 0, 1, 4, 0, 0, 0, 1, '2022-07-01 18:05:20'),
(37, 31, 44, 'Christian', 'Muluken', 'Abate', 'chirist', '123', '0956245687', 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-07-01 20:38:56');

-- --------------------------------------------------------

--
-- Table structure for table `woreda`
--

CREATE TABLE `woreda` (
  `woreda_id` int(11) NOT NULL,
  `woreda_name` varchar(30) NOT NULL,
  `region_id` int(3) NOT NULL,
  `zone_id` int(3) NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `woreda`
--

INSERT INTO `woreda` (`woreda_id`, `woreda_name`, `region_id`, `zone_id`, `remarks`, `timestamp`) VALUES
(2, 'Afambo', 2, 2, 'none', '0000-00-00 00:00:00'),
(3, 'Asayita', 2, 2, 'none', '0000-00-00 00:00:00'),
(4, 'Chifra', 2, 2, 'none', '0000-00-00 00:00:00'),
(5, 'Dubti', 2, 2, 'none', '0000-00-00 00:00:00'),
(6, 'Elidar', 2, 2, 'none', '0000-00-00 00:00:00'),
(7, 'Kori', 2, 2, 'none', '0000-00-00 00:00:00'),
(8, 'Mille', 2, 2, 'none', '0000-00-00 00:00:00'),
(9, 'Abala', 2, 3, 'none', '0000-00-00 00:00:00'),
(10, 'Afdera', 2, 3, 'none', '0000-00-00 00:00:00'),
(11, 'Berhale', 2, 3, 'none', '0000-00-00 00:00:00'),
(12, 'Dallol', 2, 3, 'none', '0000-00-00 00:00:00'),
(13, 'Erebti', 2, 3, 'none', '0000-00-00 00:00:00'),
(14, 'Koneba', 2, 3, 'none', '0000-00-00 00:00:00'),
(15, 'Megale', 2, 3, 'none', '0000-00-00 00:00:00'),
(16, 'Amibara', 2, 4, 'none', '0000-00-00 00:00:00'),
(17, 'Awash Fentale', 2, 4, 'none', '0000-00-00 00:00:00'),
(18, 'Bure Mudaytu', 2, 4, 'none', '0000-00-00 00:00:00'),
(19, 'Dulecha', 2, 4, 'none', '0000-00-00 00:00:00'),
(20, 'Gewane', 2, 4, 'none', '0000-00-00 00:00:00'),
(21, 'Aura', 2, 5, 'none', '0000-00-00 00:00:00'),
(22, 'Ewa', 2, 5, 'none', '0000-00-00 00:00:00'),
(23, 'Gulina', 2, 5, 'none', '0000-00-00 00:00:00'),
(24, 'Teru', 2, 5, 'none', '0000-00-00 00:00:00'),
(25, 'Yalo', 2, 5, 'none', '0000-00-00 00:00:00'),
(26, 'Dalifage (formerly known as Ar', 2, 6, 'none', '0000-00-00 00:00:00'),
(27, 'Dewe', 2, 6, 'none', '0000-00-00 00:00:00'),
(28, 'Hadele Ele (formerly known as ', 2, 6, 'none', '0000-00-00 00:00:00'),
(29, 'Simurobi Gele\'alo', 2, 6, 'none', '0000-00-00 00:00:00'),
(30, 'Telalak', 2, 6, 'none', '0000-00-00 00:00:00'),
(31, 'Achefer', 3, 0, 'Defunct district/woredas', '0000-00-00 00:00:00'),
(32, 'Angolalla Terana Asagirt', 3, 0, 'Defunct district/woredas', '0000-00-00 00:00:00'),
(33, 'Artuma Fursina Jile', 3, 0, 'Defunct district/woredas', '0000-00-00 00:00:00'),
(34, 'Banja', 3, 0, 'Defunct district/woredas', '0000-00-00 00:00:00'),
(35, 'Belessa', 3, 0, 'Defunct district/woredas', '0000-00-00 00:00:00'),
(36, 'Bure Wemberma', 3, 0, 'Defunct district/woredas', '0000-00-00 00:00:00'),
(37, 'Chefe Golana Dewerahmedo', 3, 0, 'Defunct district/woredas', '0000-00-00 00:00:00'),
(38, 'Dawuntna Delant', 3, 0, 'Defunct district/woredas', '0000-00-00 00:00:00'),
(39, 'Gera Midirna Keya Gebriel', 3, 0, 'Defunct district/woredas', '0000-00-00 00:00:00'),
(40, 'Mam Midrina Lalo Midir', 3, 0, 'Defunct district/woredas', '0000-00-00 00:00:00'),
(41, 'Sanja', 3, 0, 'Defunct district/woredas', '0000-00-00 00:00:00'),
(42, 'Ankasha Guagusa', 3, 8, 'none', '0000-00-00 00:00:00'),
(43, 'Banja Shekudad', 3, 8, 'none', '0000-00-00 00:00:00'),
(44, 'Dangila', 3, 8, 'none', '0000-00-00 00:00:00'),
(45, 'Faggeta Lekoma', 3, 8, 'none', '0000-00-00 00:00:00'),
(46, 'Guagusa Shekudad', 3, 8, 'none', '0000-00-00 00:00:00'),
(47, 'Guangua', 3, 8, 'none', '0000-00-00 00:00:00'),
(48, 'Jawi', 3, 8, 'none', '0000-00-00 00:00:00'),
(49, 'Aneded', 3, 9, 'none', '0000-00-00 00:00:00'),
(50, 'Awabel', 3, 9, 'none', '0000-00-00 00:00:00'),
(51, 'Baso Liben', 3, 9, 'none', '0000-00-00 00:00:00'),
(52, 'Bibugn', 3, 9, 'none', '0000-00-00 00:00:00'),
(53, 'Debay Telatgen', 3, 9, 'none', '0000-00-00 00:00:00'),
(54, 'Debre Elias', 3, 9, 'none', '0000-00-00 00:00:00'),
(55, 'Debre Marqos (town)', 3, 9, 'none', '0000-00-00 00:00:00'),
(56, 'Dejen', 3, 9, 'none', '0000-00-00 00:00:00'),
(57, 'Enarj Enawga', 3, 9, 'none', '0000-00-00 00:00:00'),
(58, 'Enbise Sar Midir', 3, 9, 'none', '0000-00-00 00:00:00'),
(59, 'Enemay', 3, 9, 'none', '0000-00-00 00:00:00'),
(60, 'Goncha', 3, 9, 'none', '0000-00-00 00:00:00'),
(61, 'Goncha Siso Enese', 3, 9, 'none', '0000-00-00 00:00:00'),
(62, 'Guzamn', 3, 9, 'none', '0000-00-00 00:00:00'),
(63, 'Hulet Ej Enese', 3, 9, 'none', '0000-00-00 00:00:00'),
(64, 'Machakel', 3, 9, 'none', '0000-00-00 00:00:00'),
(65, 'Shebel Berenta', 3, 9, 'none', '0000-00-00 00:00:00'),
(66, 'Sinan', 3, 9, 'none', '0000-00-00 00:00:00'),
(67, 'Addi Arkay', 3, 10, 'none', '0000-00-00 00:00:00'),
(68, 'Alefa', 3, 10, 'none', '0000-00-00 00:00:00'),
(69, 'Beyeda', 3, 10, 'none', '0000-00-00 00:00:00'),
(70, 'Chilga', 3, 10, 'none', '0000-00-00 00:00:00'),
(71, 'Dabat', 3, 10, 'none', '0000-00-00 00:00:00'),
(72, 'Debarq', 3, 10, 'none', '0000-00-00 00:00:00'),
(73, 'Dembiya', 3, 10, 'none', '0000-00-00 00:00:00'),
(74, 'Gondar (town)', 3, 10, 'none', '0000-00-00 00:00:00'),
(75, 'Gondar Zuria', 3, 10, 'none', '0000-00-00 00:00:00'),
(76, 'Jan Amora', 3, 10, 'none', '0000-00-00 00:00:00'),
(77, 'Lay Armachiho', 3, 10, 'none', '0000-00-00 00:00:00'),
(78, 'Metemma', 3, 10, 'none', '0000-00-00 00:00:00'),
(79, 'Mirab Armachiho', 3, 10, 'none', '0000-00-00 00:00:00'),
(80, 'Mirab Belessa', 3, 10, 'none', '0000-00-00 00:00:00'),
(81, 'Misraq Belessa', 3, 10, 'none', '0000-00-00 00:00:00'),
(82, 'Qwara', 3, 10, 'none', '0000-00-00 00:00:00'),
(83, 'Tach Armachiho', 3, 10, 'none', '0000-00-00 00:00:00'),
(84, 'Takusa', 3, 10, 'none', '0000-00-00 00:00:00'),
(85, 'Tegeda', 3, 10, 'none', '0000-00-00 00:00:00'),
(86, 'Tselemt', 3, 10, 'none', '0000-00-00 00:00:00'),
(87, 'Wegera', 3, 10, 'none', '0000-00-00 00:00:00'),
(88, 'Angolalla Tera', 3, 11, 'none', '0000-00-00 00:00:00'),
(89, 'Ankober', 3, 11, 'none', '0000-00-00 00:00:00'),
(90, 'Antsokiyana Gemza', 3, 11, 'none', '0000-00-00 00:00:00'),
(91, 'Asagirt', 3, 11, 'none', '0000-00-00 00:00:00'),
(92, 'Basona Werana', 3, 11, 'none', '0000-00-00 00:00:00'),
(93, 'Berehet', 3, 11, 'none', '0000-00-00 00:00:00'),
(94, 'Debre Berhan (town)', 3, 11, 'none', '0000-00-00 00:00:00'),
(95, 'Efratana Gidim', 3, 11, 'none', '0000-00-00 00:00:00'),
(96, 'Ensaro', 3, 11, 'none', '0000-00-00 00:00:00'),
(97, 'Geshe', 3, 11, 'none', '0000-00-00 00:00:00'),
(98, 'Hagere Mariamna Kesem', 3, 11, 'none', '0000-00-00 00:00:00'),
(99, 'Kewet', 3, 11, 'none', '0000-00-00 00:00:00'),
(100, 'Menjarna Shenkora', 3, 11, 'none', '0000-00-00 00:00:00'),
(101, 'Menz Gera Midir', 3, 11, 'none', '0000-00-00 00:00:00'),
(102, 'Menz Keya Gebreal', 3, 11, 'none', '0000-00-00 00:00:00'),
(103, 'Menz Lalo Midir', 3, 11, 'none', '0000-00-00 00:00:00'),
(104, 'Menz Mam Midir', 3, 11, 'none', '0000-00-00 00:00:00'),
(105, 'Merhabiete', 3, 11, 'none', '0000-00-00 00:00:00'),
(106, 'Mida Woremo', 3, 11, 'none', '0000-00-00 00:00:00'),
(107, 'Mojana Wadera', 3, 11, 'none', '0000-00-00 00:00:00'),
(108, 'Moretna Jiru', 3, 11, 'none', '0000-00-00 00:00:00'),
(109, 'Siyadebrina Wayu', 3, 11, 'none', '0000-00-00 00:00:00'),
(110, 'Termaber', 3, 11, 'none', '0000-00-00 00:00:00'),
(111, 'Bugna', 3, 12, 'none', '0000-00-00 00:00:00'),
(112, 'Dawunt', 3, 12, 'none', '0000-00-00 00:00:00'),
(113, 'Delanta', 3, 12, 'none', '0000-00-00 00:00:00'),
(114, 'Gidan', 3, 12, 'none', '0000-00-00 00:00:00'),
(115, 'Guba Lafto', 3, 12, 'none', '0000-00-00 00:00:00'),
(116, 'Habru', 3, 12, 'none', '0000-00-00 00:00:00'),
(117, 'Kobo', 3, 12, 'none', '0000-00-00 00:00:00'),
(118, 'Lasta', 3, 12, 'none', '0000-00-00 00:00:00'),
(119, 'Meket', 3, 12, 'none', '0000-00-00 00:00:00'),
(120, 'Wadla', 3, 12, 'none', '0000-00-00 00:00:00'),
(121, 'Weldiya (town)', 3, 12, 'none', '0000-00-00 00:00:00'),
(122, 'Artuma Fursi', 3, 13, 'none', '0000-00-00 00:00:00'),
(123, 'Bati', 3, 13, 'none', '0000-00-00 00:00:00'),
(124, 'Dawa Chefe', 3, 13, 'none', '0000-00-00 00:00:00'),
(125, 'Dawa Harewa', 3, 13, 'none', '0000-00-00 00:00:00'),
(126, 'Jile Timuga', 3, 13, 'none', '0000-00-00 00:00:00'),
(127, 'Kemise (town)', 3, 13, 'none', '0000-00-00 00:00:00'),
(128, 'Debre Tabor (town)', 3, 14, 'none', '0000-00-00 00:00:00'),
(129, 'Dera', 3, 14, 'none', '0000-00-00 00:00:00'),
(130, 'Ebenat', 3, 14, 'none', '0000-00-00 00:00:00'),
(131, 'Farta', 3, 14, 'none', '0000-00-00 00:00:00'),
(132, 'Fogera', 3, 14, 'none', '0000-00-00 00:00:00'),
(133, 'Kemekem', 3, 14, 'none', '0000-00-00 00:00:00'),
(134, 'Lay Gayint', 3, 14, 'none', '0000-00-00 00:00:00'),
(135, 'Mirab Este', 3, 14, 'none', '0000-00-00 00:00:00'),
(136, 'Misraq Este', 3, 14, 'none', '0000-00-00 00:00:00'),
(137, 'Simada', 3, 14, 'none', '0000-00-00 00:00:00'),
(138, 'Tach Gayint', 3, 14, 'none', '0000-00-00 00:00:00'),
(139, 'Abuko', 3, 15, 'none', '0000-00-00 00:00:00'),
(140, 'Amba Sel', 3, 15, 'none', '0000-00-00 00:00:00'),
(141, 'Debre Sina', 3, 15, 'none', '0000-00-00 00:00:00'),
(142, 'Dessie (town)', 3, 15, 'none', '0000-00-00 00:00:00'),
(143, 'Dessie Zuria', 3, 15, 'none', '0000-00-00 00:00:00'),
(144, 'Jama', 3, 15, 'none', '0000-00-00 00:00:00'),
(145, 'Kalu (woreda)', 3, 15, 'none', '0000-00-00 00:00:00'),
(146, 'Kelala', 3, 15, 'none', '0000-00-00 00:00:00'),
(147, 'Kombolcha (town)', 3, 15, 'none', '0000-00-00 00:00:00'),
(148, 'Kutaber', 3, 15, 'none', '0000-00-00 00:00:00'),
(149, 'Legahida', 3, 15, 'none', '0000-00-00 00:00:00'),
(150, 'Legambo', 3, 15, 'none', '0000-00-00 00:00:00'),
(151, 'Magdala', 3, 15, 'none', '0000-00-00 00:00:00'),
(152, 'Mehal Sayint', 3, 15, 'none', '0000-00-00 00:00:00'),
(153, 'Sayint', 3, 15, 'none', '0000-00-00 00:00:00'),
(154, 'Tehuledere', 3, 15, 'none', '0000-00-00 00:00:00'),
(155, 'Tenta', 3, 15, 'none', '0000-00-00 00:00:00'),
(156, 'Wegde', 3, 15, 'none', '0000-00-00 00:00:00'),
(157, 'Were Babu', 3, 15, 'none', '0000-00-00 00:00:00'),
(158, 'Were Ilu', 3, 15, 'none', '0000-00-00 00:00:00'),
(159, 'Aberegelle', 3, 16, 'none', '0000-00-00 00:00:00'),
(160, 'Dehana', 3, 16, 'none', '0000-00-00 00:00:00'),
(161, 'Gazbibla', 3, 16, 'none', '0000-00-00 00:00:00'),
(162, 'Sehala', 3, 16, 'none', '0000-00-00 00:00:00'),
(163, 'Soqota (town)', 3, 16, 'none', '0000-00-00 00:00:00'),
(164, 'Soqota Zuria', 3, 16, 'none', '0000-00-00 00:00:00'),
(165, 'Zikuala', 3, 16, 'none', '0000-00-00 00:00:00'),
(166, 'Bahir Dar Zuria', 3, 17, 'none', '0000-00-00 00:00:00'),
(167, 'Bure', 3, 17, 'none', '0000-00-00 00:00:00'),
(168, 'Debub Achefer', 3, 17, 'none', '0000-00-00 00:00:00'),
(169, 'Dega Damot', 3, 17, 'none', '0000-00-00 00:00:00'),
(170, 'Dembecha', 3, 17, 'none', '0000-00-00 00:00:00'),
(171, 'Finote Selam (town)', 3, 17, 'none', '0000-00-00 00:00:00'),
(172, 'Jabi Tehnan', 3, 17, 'none', '0000-00-00 00:00:00'),
(173, 'Kuarit', 3, 17, 'none', '0000-00-00 00:00:00'),
(174, 'Mecha (formerly known as Meraw', 3, 17, 'none', '0000-00-00 00:00:00'),
(175, 'Sekela', 3, 17, 'none', '0000-00-00 00:00:00'),
(176, 'Semien Achefer', 3, 17, 'none', '0000-00-00 00:00:00'),
(177, 'Wemberma', 3, 17, 'none', '0000-00-00 00:00:00'),
(178, 'Yilmana Densa (formerly known ', 3, 17, 'none', '0000-00-00 00:00:00'),
(179, 'Bahir Dar (town)', 3, 18, 'none', '0000-00-00 00:00:00'),
(180, 'Mao-Komo Special Woreda', 4, 0, 'Independent district/woredas', '0000-00-00 00:00:00'),
(181, 'Pawe Special Woreda', 4, 0, 'Independent district/woredas', '0000-00-00 00:00:00'),
(182, 'Asosa', 4, 19, 'none', '0000-00-00 00:00:00'),
(183, 'Bambasi', 4, 19, 'none', '0000-00-00 00:00:00'),
(184, 'Komesha', 4, 19, 'none', '0000-00-00 00:00:00'),
(185, 'Kormuk', 4, 19, 'none', '0000-00-00 00:00:00'),
(186, 'Menge', 4, 19, 'none', '0000-00-00 00:00:00'),
(187, 'Oda Godere', 4, 19, 'none', '0000-00-00 00:00:00'),
(188, 'Sherkole', 4, 19, 'none', '0000-00-00 00:00:00'),
(189, 'Agalo Mite', 4, 20, 'none', '0000-00-00 00:00:00'),
(190, 'Belo Jegonfoy', 4, 20, 'none', '0000-00-00 00:00:00'),
(191, 'Kamashi', 4, 20, 'none', '0000-00-00 00:00:00'),
(192, 'Sirba Abbay', 4, 20, 'none', '0000-00-00 00:00:00'),
(193, 'Yaso', 4, 20, 'none', '0000-00-00 00:00:00'),
(194, 'Bulen', 4, 21, 'none', '0000-00-00 00:00:00'),
(195, 'Dangur', 4, 21, 'none', '0000-00-00 00:00:00'),
(196, 'Dibate', 4, 21, 'none', '0000-00-00 00:00:00'),
(197, 'Guba', 4, 21, 'none', '0000-00-00 00:00:00'),
(198, 'Mandura', 4, 21, 'none', '0000-00-00 00:00:00'),
(199, 'Wenbera', 4, 21, 'none', '0000-00-00 00:00:00'),
(200, 'Itang Special Woreda', 6, 0, 'Independent district/woredas', '0000-00-00 00:00:00'),
(201, 'Abobo', 6, 23, 'none', '0000-00-00 00:00:00'),
(202, 'Dimma', 6, 23, 'none', '0000-00-00 00:00:00'),
(203, 'Gambela (town)', 6, 23, 'none', '0000-00-00 00:00:00'),
(204, 'Gambela Zuria', 6, 23, 'none', '0000-00-00 00:00:00'),
(205, 'Gog', 6, 23, 'none', '0000-00-00 00:00:00'),
(206, 'Jor', 6, 23, 'none', '0000-00-00 00:00:00'),
(207, 'Akobo', 6, 25, 'none', '0000-00-00 00:00:00'),
(208, 'Jikawo', 6, 25, 'none', '0000-00-00 00:00:00'),
(209, 'Lare', 6, 25, 'none', '0000-00-00 00:00:00'),
(210, 'Wentawo', 6, 25, 'none', '0000-00-00 00:00:00'),
(211, 'Godere', 6, 24, 'none', '0000-00-00 00:00:00'),
(212, 'Mengesh', 6, 24, 'none', '0000-00-00 00:00:00'),
(213, 'Ada\'a Chukala', 8, 0, 'Defunct district/woredas', '0000-00-00 00:00:00'),
(214, 'Adolana Wadera', 8, 0, 'Defunct district/woredas', '0000-00-00 00:00:00'),
(215, 'Amuru Jarte', 8, 0, 'Defunct district/woredas', '0000-00-00 00:00:00'),
(216, 'Ayra Guliso', 8, 0, 'Defunct district/woredas', '0000-00-00 00:00:00'),
(217, 'Bekoji (woreda)', 8, 0, 'Defunct district/woredas', '0000-00-00 00:00:00'),
(218, 'Berehna Aleltu', 8, 0, 'Defunct district/woredas', '0000-00-00 00:00:00'),
(219, 'Bila Seyo', 8, 0, 'Defunct district/woredas', '0000-00-00 00:00:00'),
(220, 'Boji', 8, 0, 'Defunct district/woredas', '0000-00-00 00:00:00'),
(221, 'Chiro (woreda)', 8, 0, 'Defunct district/woredas', '0000-00-00 00:00:00'),
(222, 'Dale Lalo', 8, 0, 'Defunct district/woredas', '0000-00-00 00:00:00'),
(223, 'Dodotana Sire', 8, 0, 'Defunct district/woredas', '0000-00-00 00:00:00'),
(224, 'Dugda Bora', 8, 0, 'Defunct district/woredas', '0000-00-00 00:00:00'),
(225, 'Gaserana Gololcha', 8, 0, 'Defunct district/woredas', '0000-00-00 00:00:00'),
(226, 'Gawo Dale', 8, 0, 'Defunct district/woredas', '0000-00-00 00:00:00'),
(227, 'Gola Odana Meyumuluke', 8, 0, 'Defunct district/woredas', '0000-00-00 00:00:00'),
(228, 'Hagere Mariam', 8, 0, 'Defunct district/woredas', '0000-00-00 00:00:00'),
(229, 'Hawa Welele', 8, 0, 'Defunct district/woredas', '0000-00-00 00:00:00'),
(230, 'Jimma Gidami', 8, 0, 'Defunct district/woredas', '0000-00-00 00:00:00'),
(231, 'Jimma Horo <East Welega>', 8, 0, 'Defunct district/woredas', '0000-00-00 00:00:00'),
(232, 'Mennana Harena Buluk', 8, 0, 'Defunct district/woredas', '0000-00-00 00:00:00'),
(233, 'Mulona Sululta', 8, 0, 'Defunct district/woredas', '0000-00-00 00:00:00'),
(234, 'Sinanana Dinsho', 8, 0, 'Defunct district/woredas', '0000-00-00 00:00:00'),
(235, 'Walisona Goro', 8, 0, 'Defunct district/woredas', '0000-00-00 00:00:00'),
(236, 'Wama Bonaya', 8, 0, 'Defunct district/woredas', '0000-00-00 00:00:00'),
(237, 'Wuchalena Jido', 8, 0, 'Defunct district/woredas', '0000-00-00 00:00:00'),
(238, 'Yaya Gulelena Debre Liban', 8, 0, 'Defunct district/woredas', '0000-00-00 00:00:00'),
(239, 'Amigna', 8, 27, 'none', '0000-00-00 00:00:00'),
(240, 'Aseko (woreda)', 8, 27, 'none', '0000-00-00 00:00:00'),
(241, 'Asella', 8, 27, 'none', '0000-00-00 00:00:00'),
(242, 'Bale Gasegar', 8, 27, 'none', '0000-00-00 00:00:00'),
(243, 'Chole (woreda)', 8, 27, 'none', '0000-00-00 00:00:00'),
(244, 'Digeluna Tijo', 8, 27, 'none', '0000-00-00 00:00:00'),
(245, 'Diksis', 8, 27, 'none', '0000-00-00 00:00:00'),
(246, 'Dodota', 8, 27, 'none', '0000-00-00 00:00:00'),
(247, 'Enkelo Wabe', 8, 27, 'none', '0000-00-00 00:00:00'),
(248, 'Gololcha', 8, 27, 'none', '0000-00-00 00:00:00'),
(249, 'Guna (woreda)', 8, 27, 'none', '0000-00-00 00:00:00'),
(250, 'Hitosa', 8, 27, 'none', '0000-00-00 00:00:00'),
(251, 'Jeju (woreda)', 8, 27, 'none', '0000-00-00 00:00:00'),
(252, 'Limuna Bilbilo', 8, 27, 'none', '0000-00-00 00:00:00'),
(253, 'Lude Hitosa', 8, 27, 'none', '0000-00-00 00:00:00'),
(254, 'Merti', 8, 27, 'none', '0000-00-00 00:00:00'),
(255, 'Munesa', 8, 27, 'none', '0000-00-00 00:00:00'),
(256, 'Robe (woreda)', 8, 27, 'none', '0000-00-00 00:00:00'),
(257, 'Seru (woreda)', 8, 27, 'none', '0000-00-00 00:00:00'),
(258, 'Sire', 8, 27, 'none', '0000-00-00 00:00:00'),
(259, 'Sherka', 8, 27, 'none', '0000-00-00 00:00:00'),
(260, 'Sude', 8, 27, 'none', '0000-00-00 00:00:00'),
(261, 'Tena (woreda)', 8, 27, 'none', '0000-00-00 00:00:00'),
(262, 'Tiyo (woreda)', 8, 27, 'none', '0000-00-00 00:00:00'),
(263, 'Ziway Dugda', 8, 27, 'none', '0000-00-00 00:00:00'),
(264, 'Agarfa (woreda)', 8, 28, 'none', '0000-00-00 00:00:00'),
(265, 'Berbere (woreda)', 8, 28, 'none', '0000-00-00 00:00:00'),
(266, 'Dawe Kachen', 8, 28, 'none', '0000-00-00 00:00:00'),
(267, 'Dawe Serara', 8, 28, 'none', '0000-00-00 00:00:00'),
(268, 'Delo Menna', 8, 28, 'none', '0000-00-00 00:00:00'),
(269, 'Dinsho (woreda)', 8, 28, 'none', '0000-00-00 00:00:00'),
(270, 'Gasera', 8, 28, 'none', '0000-00-00 00:00:00'),
(271, 'Ginir (woreda)', 8, 28, 'none', '0000-00-00 00:00:00'),
(272, 'Goba (woreda)', 8, 28, 'none', '0000-00-00 00:00:00'),
(273, 'Goba (town)', 8, 28, 'none', '0000-00-00 00:00:00'),
(274, 'Gololcha', 8, 28, 'none', '0000-00-00 00:00:00'),
(275, 'Goro', 8, 28, 'none', '0000-00-00 00:00:00'),
(276, 'Guradamole', 8, 28, 'none', '0000-00-00 00:00:00'),
(277, 'Harena Buluk', 8, 28, 'none', '0000-00-00 00:00:00'),
(278, 'Legehida', 8, 28, 'none', '0000-00-00 00:00:00'),
(279, 'Meda Welabu', 8, 28, 'none', '0000-00-00 00:00:00'),
(280, 'Raytu', 8, 28, 'none', '0000-00-00 00:00:00'),
(281, 'Robe (town)', 8, 28, 'none', '0000-00-00 00:00:00'),
(282, 'Seweyna', 8, 28, 'none', '0000-00-00 00:00:00'),
(283, 'Sinana', 8, 28, 'none', '0000-00-00 00:00:00'),
(284, 'Abaya', 8, 29, 'none', '0000-00-00 00:00:00'),
(285, 'Arero', 8, 29, 'none', '0000-00-00 00:00:00'),
(286, 'Bule Hora', 8, 29, 'none', '0000-00-00 00:00:00'),
(287, 'Dire (woreda)', 8, 29, 'none', '0000-00-00 00:00:00'),
(288, 'Dugda Dawa', 8, 29, 'none', '0000-00-00 00:00:00'),
(289, 'Gelana', 8, 29, 'none', '0000-00-00 00:00:00'),
(290, 'Miyu (woreda)', 8, 29, 'none', '0000-00-00 00:00:00'),
(291, 'Moyale', 8, 29, 'none', '0000-00-00 00:00:00'),
(292, 'Teltele (woreda)', 8, 29, 'none', '0000-00-00 00:00:00'),
(293, 'Yabelo (woreda)', 8, 29, 'none', '0000-00-00 00:00:00'),
(294, 'Babille', 8, 30, 'none', '0000-00-00 00:00:00'),
(295, 'Bedeno (woreda)', 8, 30, 'none', '0000-00-00 00:00:00'),
(296, 'Chinaksen (woreda)', 8, 30, 'none', '0000-00-00 00:00:00'),
(297, 'Deder (woreda)', 8, 30, 'none', '0000-00-00 00:00:00'),
(298, 'Fedis', 8, 30, 'none', '0000-00-00 00:00:00'),
(299, 'Girawa (woreda)', 8, 30, 'none', '0000-00-00 00:00:00'),
(300, 'Gola Oda', 8, 30, 'none', '0000-00-00 00:00:00'),
(301, 'Goro Gutu', 8, 30, 'none', '0000-00-00 00:00:00'),
(302, 'Gursum', 8, 30, 'none', '0000-00-00 00:00:00'),
(303, 'Haro Maya (woreda)', 8, 30, 'none', '0000-00-00 00:00:00'),
(304, 'Jarso (Hararge)', 8, 30, 'none', '0000-00-00 00:00:00'),
(305, 'Kersa', 8, 30, 'none', '0000-00-00 00:00:00'),
(306, 'Kombolcha (woreda)', 8, 30, 'none', '0000-00-00 00:00:00'),
(307, 'Kurfa Chele (woreda)', 8, 30, 'none', '0000-00-00 00:00:00'),
(308, 'Malka Balo', 8, 30, 'none', '0000-00-00 00:00:00'),
(309, 'Meta (woreda)', 8, 30, 'none', '0000-00-00 00:00:00'),
(310, 'Meyumuluke', 8, 30, 'none', '0000-00-00 00:00:00'),
(311, 'Midega Tola', 8, 30, 'none', '0000-00-00 00:00:00'),
(312, 'Ada\'a', 8, 31, 'none', '0000-00-00 00:00:00'),
(313, 'Adama Zuria', 8, 31, 'none', '0000-00-00 00:00:00'),
(314, 'Adami Tullu and Jido Kombolcha', 8, 31, 'none', '0000-00-00 00:00:00'),
(315, 'Bishoftu (town)', 8, 31, 'none', '0000-00-00 00:00:00'),
(316, 'Bora (woreda)', 8, 31, 'none', '0000-00-00 00:00:00'),
(317, 'Dugda (woreda)', 8, 31, 'none', '0000-00-00 00:00:00'),
(318, 'Boset', 8, 31, 'none', '0000-00-00 00:00:00'),
(319, 'Fentale', 8, 31, 'none', '0000-00-00 00:00:00'),
(320, 'Gimbichu', 8, 31, 'none', '0000-00-00 00:00:00'),
(321, 'Liben', 8, 31, 'none', '0000-00-00 00:00:00'),
(322, 'Lome (woreda)', 8, 31, 'none', '0000-00-00 00:00:00'),
(323, 'Ziway (town)', 8, 31, 'none', '0000-00-00 00:00:00'),
(324, 'Bonaya Boshe', 8, 32, 'none', '0000-00-00 00:00:00'),
(325, 'Diga', 8, 32, 'none', '0000-00-00 00:00:00'),
(326, 'Gida Kiremu', 8, 32, 'none', '0000-00-00 00:00:00'),
(327, 'Gobu Seyo', 8, 32, 'none', '0000-00-00 00:00:00'),
(328, 'Gudeya Bila', 8, 32, 'none', '0000-00-00 00:00:00'),
(329, 'Guto Gida', 8, 32, 'none', '0000-00-00 00:00:00'),
(330, 'Haro Limmu', 8, 32, 'none', '0000-00-00 00:00:00'),
(331, 'Leka Dulecha', 8, 32, 'none', '0000-00-00 00:00:00'),
(332, 'Ibantu', 8, 32, 'none', '0000-00-00 00:00:00'),
(333, 'Jimma Arjo', 8, 32, 'none', '0000-00-00 00:00:00'),
(334, 'Limmu (woreda)', 8, 32, 'none', '0000-00-00 00:00:00'),
(335, 'Nekemte (town)', 8, 32, 'none', '0000-00-00 00:00:00'),
(336, 'Nunu Kumba', 8, 32, 'none', '0000-00-00 00:00:00'),
(337, 'Sasiga', 8, 32, 'none', '0000-00-00 00:00:00'),
(338, 'Sibu Sire', 8, 32, 'none', '0000-00-00 00:00:00'),
(339, 'Wama Hagalo', 8, 32, 'none', '0000-00-00 00:00:00'),
(340, 'Wayu Tuka', 8, 32, 'none', '0000-00-00 00:00:00'),
(341, 'Adola', 8, 33, 'none', '0000-00-00 00:00:00'),
(342, 'Ana Sora', 8, 33, 'none', '0000-00-00 00:00:00'),
(343, 'Bore (woreda)', 8, 33, 'none', '0000-00-00 00:00:00'),
(344, 'Dima (woreda)', 8, 33, 'none', '0000-00-00 00:00:00'),
(345, 'Girja', 8, 33, 'none', '0000-00-00 00:00:00'),
(346, 'Hambela Wamena', 8, 33, 'none', '0000-00-00 00:00:00'),
(347, 'Harenfema', 8, 33, 'none', '0000-00-00 00:00:00'),
(348, 'Kebri Mangest (town)', 8, 33, 'none', '0000-00-00 00:00:00'),
(349, 'Kercha', 8, 33, 'none', '0000-00-00 00:00:00'),
(350, 'Liben', 8, 33, 'none', '0000-00-00 00:00:00'),
(351, 'Negele Borana (town)', 8, 33, 'none', '0000-00-00 00:00:00'),
(352, 'Odo Shakiso', 8, 33, 'none', '0000-00-00 00:00:00'),
(353, 'Uraga (woreda)', 8, 33, 'none', '0000-00-00 00:00:00'),
(354, 'Wadera (woreda)', 8, 33, 'none', '0000-00-00 00:00:00'),
(355, 'Abay Chomen', 8, 34, 'none', '0000-00-00 00:00:00'),
(356, 'Abe Dongoro', 8, 34, 'none', '0000-00-00 00:00:00'),
(357, 'Amuru (woreda)', 8, 34, 'none', '0000-00-00 00:00:00'),
(358, 'Guduru (woreda)', 8, 34, 'none', '0000-00-00 00:00:00'),
(359, 'Hababo Guduru', 8, 34, 'none', '0000-00-00 00:00:00'),
(360, 'Horo (woreda)', 8, 34, 'none', '0000-00-00 00:00:00'),
(361, 'Jardega Jarte', 8, 34, 'none', '0000-00-00 00:00:00'),
(362, 'Jimma Genete', 8, 34, 'none', '0000-00-00 00:00:00'),
(363, 'Jimma Rare', 8, 34, 'none', '0000-00-00 00:00:00'),
(364, 'Shambu (town)', 8, 34, 'none', '0000-00-00 00:00:00'),
(365, 'Ale (woreda)', 8, 35, 'none', '0000-00-00 00:00:00'),
(366, 'Alge Sache', 8, 35, 'none', '0000-00-00 00:00:00'),
(367, 'Bedele (town)', 8, 35, 'none', '0000-00-00 00:00:00'),
(368, 'Bedele Zuria', 8, 35, 'none', '0000-00-00 00:00:00'),
(369, 'Bicho (woreda)', 8, 35, 'none', '0000-00-00 00:00:00'),
(370, 'Bilo Nopha', 8, 35, 'none', '0000-00-00 00:00:00'),
(371, 'Borecha', 8, 35, 'none', '0000-00-00 00:00:00'),
(372, 'Bure', 8, 35, 'none', '0000-00-00 00:00:00'),
(373, 'Chewaka', 8, 35, 'none', '0000-00-00 00:00:00'),
(374, 'Chora (woreda)', 8, 35, 'none', '0000-00-00 00:00:00'),
(375, 'Dabo Hana', 8, 35, 'none', '0000-00-00 00:00:00'),
(376, 'Darimu', 8, 35, 'none', '0000-00-00 00:00:00'),
(377, 'Dega (woreda)', 8, 35, 'none', '0000-00-00 00:00:00'),
(378, 'Didessa (woreda)', 8, 35, 'none', '0000-00-00 00:00:00'),
(379, 'Didu (woreda)', 8, 35, 'none', '0000-00-00 00:00:00'),
(380, 'Doreni', 8, 35, 'none', '0000-00-00 00:00:00'),
(381, 'Gechi (woreda)', 8, 35, 'none', '0000-00-00 00:00:00'),
(382, 'Hurumu', 8, 35, 'none', '0000-00-00 00:00:00'),
(383, 'Mako (woreda)', 8, 35, 'none', '0000-00-00 00:00:00'),
(384, 'Metu Zuria', 8, 35, 'none', '0000-00-00 00:00:00'),
(385, 'Metu (town)', 8, 35, 'none', '0000-00-00 00:00:00'),
(386, 'Nono Sele', 8, 35, 'none', '0000-00-00 00:00:00'),
(387, 'Supena Sodo', 8, 35, 'none', '0000-00-00 00:00:00'),
(388, 'Yayu (woreda)', 8, 35, 'none', '0000-00-00 00:00:00'),
(389, 'Agaro (town)', 8, 36, 'none', '0000-00-00 00:00:00'),
(390, 'Chora Botor', 8, 36, 'none', '0000-00-00 00:00:00'),
(391, 'Dedo', 8, 36, 'none', '0000-00-00 00:00:00'),
(392, 'Gera (woreda)', 8, 36, 'none', '0000-00-00 00:00:00'),
(393, 'Gomma (woreda)', 8, 36, 'none', '0000-00-00 00:00:00'),
(394, 'Gumay (woreda)', 8, 36, 'none', '0000-00-00 00:00:00'),
(395, 'Kersa', 8, 36, 'none', '0000-00-00 00:00:00'),
(396, 'Limmu Kosa', 8, 36, 'none', '0000-00-00 00:00:00'),
(397, 'Limmu Sakka', 8, 36, 'none', '0000-00-00 00:00:00'),
(398, 'Mana (woreda)', 8, 36, 'none', '0000-00-00 00:00:00'),
(399, 'Omo Nada', 8, 36, 'none', '0000-00-00 00:00:00'),
(400, 'Seka Chekorsa (woreda)', 8, 36, 'none', '0000-00-00 00:00:00'),
(401, 'Setema', 8, 36, 'none', '0000-00-00 00:00:00'),
(402, 'Shebe Senbo', 8, 36, 'none', '0000-00-00 00:00:00'),
(403, 'Sigmo (woreda)', 8, 36, 'none', '0000-00-00 00:00:00'),
(404, 'Sokoru (woreda)', 8, 36, 'none', '0000-00-00 00:00:00'),
(405, 'Tiro Afeta', 8, 36, 'none', '0000-00-00 00:00:00'),
(406, 'Anfillo (woreda)', 8, 37, 'none', '0000-00-00 00:00:00'),
(407, 'Dale Sedi', 8, 37, 'none', '0000-00-00 00:00:00'),
(408, 'Dale Wabera', 8, 37, 'none', '0000-00-00 00:00:00'),
(409, 'Dembidolo (town)', 8, 37, 'none', '0000-00-00 00:00:00'),
(410, 'Gawo Kebe', 8, 37, 'none', '0000-00-00 00:00:00'),
(411, 'Gidami (woreda)', 8, 37, 'none', '0000-00-00 00:00:00'),
(412, 'Hawa Gelan', 8, 37, 'none', '0000-00-00 00:00:00'),
(413, 'Jimma Horo <Kelem Welega>', 8, 37, 'none', '0000-00-00 00:00:00'),
(414, 'Lalo Kile', 8, 37, 'none', '0000-00-00 00:00:00'),
(415, 'Sayo', 8, 37, 'none', '0000-00-00 00:00:00'),
(416, 'Yemalogi Welele', 8, 37, 'none', '0000-00-00 00:00:00'),
(417, 'Abichuna Gne\'a', 8, 38, 'none', '0000-00-00 00:00:00'),
(418, 'Aleltu', 8, 38, 'none', '0000-00-00 00:00:00'),
(419, 'Debre Libanos (woreda)', 8, 38, 'none', '0000-00-00 00:00:00'),
(420, 'Degem', 8, 38, 'none', '0000-00-00 00:00:00'),
(421, 'Dera', 8, 38, 'none', '0000-00-00 00:00:00'),
(422, 'Fiche (town)', 8, 38, 'none', '0000-00-00 00:00:00'),
(423, 'Gerar Jarso', 8, 38, 'none', '0000-00-00 00:00:00'),
(424, 'Hidabu Abote', 8, 38, 'none', '0000-00-00 00:00:00'),
(425, 'Jido', 8, 38, 'none', '0000-00-00 00:00:00'),
(426, 'Kembibit', 8, 38, 'none', '0000-00-00 00:00:00'),
(427, 'Kuyu', 8, 38, 'none', '0000-00-00 00:00:00'),
(428, 'Sendafa (town)', 8, 38, 'none', '0000-00-00 00:00:00'),
(429, 'Wara Jarso', 8, 38, 'none', '0000-00-00 00:00:00'),
(430, 'Wuchale', 8, 38, 'none', '0000-00-00 00:00:00'),
(431, 'Yaya Gulele', 8, 38, 'none', '0000-00-00 00:00:00'),
(432, 'Amaya (woreda)', 8, 39, 'none', '0000-00-00 00:00:00'),
(433, 'Becho', 8, 39, 'none', '0000-00-00 00:00:00'),
(434, 'Dawo', 8, 39, 'none', '0000-00-00 00:00:00'),
(435, 'Elu (woreda)', 8, 39, 'none', '0000-00-00 00:00:00'),
(436, 'Goro', 8, 39, 'none', '0000-00-00 00:00:00'),
(437, 'Kersana Malima', 8, 39, 'none', '0000-00-00 00:00:00'),
(438, 'Seden Sodo (formerly known as ', 8, 39, 'none', '0000-00-00 00:00:00'),
(439, 'Sodo Dacha', 8, 39, 'none', '0000-00-00 00:00:00'),
(440, 'Tole', 8, 39, 'none', '0000-00-00 00:00:00'),
(441, 'Waliso (woreda)', 8, 39, 'none', '0000-00-00 00:00:00'),
(442, 'Waliso (town)', 8, 39, 'none', '0000-00-00 00:00:00'),
(443, 'Wonchi', 8, 39, 'none', '0000-00-00 00:00:00'),
(444, 'Adaba (woreda)', 8, 40, 'none', '0000-00-00 00:00:00'),
(445, 'Arsi Negele (woreda)', 8, 40, 'none', '0000-00-00 00:00:00'),
(446, 'Dodola (woreda)', 8, 40, 'none', '0000-00-00 00:00:00'),
(447, 'Gedeb Asasa', 8, 40, 'none', '0000-00-00 00:00:00'),
(448, 'Kofele (woreda)', 8, 40, 'none', '0000-00-00 00:00:00'),
(449, 'Kokosa (woreda)', 8, 40, 'none', '0000-00-00 00:00:00'),
(450, 'Kore (woreda)', 8, 40, 'none', '0000-00-00 00:00:00'),
(451, 'Nensebo (woreda)', 8, 40, 'none', '0000-00-00 00:00:00'),
(452, 'Seraro', 8, 40, 'none', '0000-00-00 00:00:00'),
(453, 'Shala (woreda)', 8, 40, 'none', '0000-00-00 00:00:00'),
(454, 'Shashamene (town)', 8, 40, 'none', '0000-00-00 00:00:00'),
(455, 'Shashamene Zuria', 8, 40, 'none', '0000-00-00 00:00:00'),
(456, 'Anchar', 8, 41, 'none', '0000-00-00 00:00:00'),
(457, 'Badessa (town)', 8, 41, 'none', '0000-00-00 00:00:00'),
(458, 'Boke (woreda)', 8, 41, 'none', '0000-00-00 00:00:00'),
(459, 'Chiro (town)', 8, 41, 'none', '0000-00-00 00:00:00'),
(460, 'Chiro Zuria', 8, 41, 'none', '0000-00-00 00:00:00'),
(461, 'Gemechis', 8, 41, 'none', '0000-00-00 00:00:00'),
(462, 'Darolebu', 8, 41, 'none', '0000-00-00 00:00:00'),
(463, 'Doba (woreda)', 8, 41, 'none', '0000-00-00 00:00:00'),
(464, 'Guba Koricha', 8, 41, 'none', '0000-00-00 00:00:00'),
(465, 'Habro', 8, 41, 'none', '0000-00-00 00:00:00'),
(466, 'Kuni (woreda)', 8, 41, 'none', '0000-00-00 00:00:00'),
(467, 'Mesela (woreda)', 8, 41, 'none', '0000-00-00 00:00:00'),
(468, 'Mieso', 8, 41, 'none', '0000-00-00 00:00:00'),
(469, 'Tulo', 8, 41, 'none', '0000-00-00 00:00:00'),
(470, 'Abuna Ginde Beret', 8, 42, 'none', '0000-00-00 00:00:00'),
(471, 'Adda Berga', 8, 42, 'none', '0000-00-00 00:00:00'),
(472, 'Ambo (town)', 8, 42, 'none', '0000-00-00 00:00:00'),
(473, 'Ambo (woreda)', 8, 42, 'none', '0000-00-00 00:00:00'),
(474, 'Bako Tibe', 8, 42, 'none', '0000-00-00 00:00:00'),
(475, 'Cheliya', 8, 42, 'none', '0000-00-00 00:00:00'),
(476, 'Dano (woreda)', 8, 42, 'none', '0000-00-00 00:00:00'),
(477, 'Dendi (woreda)', 8, 42, 'none', '0000-00-00 00:00:00'),
(478, 'Ejerie (sometimes known as Add', 8, 42, 'none', '0000-00-00 00:00:00'),
(479, 'Elfata', 8, 42, 'none', '0000-00-00 00:00:00'),
(480, 'Ginde Beret', 8, 42, 'none', '0000-00-00 00:00:00'),
(481, 'Jeldu', 8, 42, 'none', '0000-00-00 00:00:00'),
(482, 'Jibat', 8, 42, 'none', '0000-00-00 00:00:00'),
(483, 'Meta Robi', 8, 42, 'none', '0000-00-00 00:00:00'),
(484, 'Midakegn', 8, 42, 'none', '0000-00-00 00:00:00'),
(485, 'Nono (Shewa)', 8, 42, 'none', '0000-00-00 00:00:00'),
(486, 'Tikur Enchini', 8, 42, 'none', '0000-00-00 00:00:00'),
(487, 'Toke Kutaye', 8, 42, 'none', '0000-00-00 00:00:00'),
(488, 'Ayra (woreda)', 8, 43, 'none', '0000-00-00 00:00:00'),
(489, 'Babo Gambela', 8, 43, 'none', '0000-00-00 00:00:00'),
(490, 'Begi', 8, 43, 'none', '0000-00-00 00:00:00'),
(491, 'Boji Chokorsa', 8, 43, 'none', '0000-00-00 00:00:00'),
(492, 'Boji Dirmaji', 8, 43, 'none', '0000-00-00 00:00:00'),
(493, 'Genji (woreda)', 8, 43, 'none', '0000-00-00 00:00:00'),
(494, 'Gimbi (woreda)', 8, 43, 'none', '0000-00-00 00:00:00'),
(495, 'Gimbi (town)', 8, 43, 'none', '0000-00-00 00:00:00'),
(496, 'Guliso', 8, 43, 'none', '0000-00-00 00:00:00'),
(497, 'Haru (woreda)', 8, 43, 'none', '0000-00-00 00:00:00'),
(498, 'Homa (woreda)', 8, 43, 'none', '0000-00-00 00:00:00'),
(499, 'Jarso (Welega)', 8, 43, 'none', '0000-00-00 00:00:00'),
(500, 'Kondala', 8, 43, 'none', '0000-00-00 00:00:00'),
(501, 'Kiltu Kara (woreda)', 8, 43, 'none', '0000-00-00 00:00:00'),
(502, 'Lalo Asabi', 8, 43, 'none', '0000-00-00 00:00:00'),
(503, 'Mana Sibu', 8, 43, 'none', '0000-00-00 00:00:00'),
(504, 'Nejo (woreda)', 8, 43, 'none', '0000-00-00 00:00:00'),
(505, 'Nole Kaba', 8, 43, 'none', '0000-00-00 00:00:00'),
(506, 'Sayo Nole', 8, 43, 'none', '0000-00-00 00:00:00'),
(507, 'Yubdo (woreda)', 8, 43, 'none', '0000-00-00 00:00:00'),
(508, 'Adama', 8, 44, 'none', '0000-00-00 00:00:00'),
(509, 'Jimma', 8, 45, 'none', '0000-00-00 00:00:00'),
(510, 'Akaki', 8, 46, 'none', '0000-00-00 00:00:00'),
(511, 'Bereh', 8, 46, 'none', '0000-00-00 00:00:00'),
(512, 'Burayu (town)', 8, 46, 'none', '0000-00-00 00:00:00'),
(513, 'Holeta Genet (town)', 8, 46, 'none', '0000-00-00 00:00:00'),
(514, 'Mulo (woreda)', 8, 46, 'none', '0000-00-00 00:00:00'),
(515, 'Sebeta Hawas (formerly known a', 8, 46, 'none', '0000-00-00 00:00:00'),
(516, 'Sebeta (town)', 8, 46, 'none', '0000-00-00 00:00:00'),
(517, 'Sendafa (town)', 8, 46, 'none', '0000-00-00 00:00:00'),
(518, 'Walmara', 8, 46, 'none', '0000-00-00 00:00:00'),
(519, 'Afder (woreda)', 10, 47, 'none', '0000-00-00 00:00:00'),
(520, 'Bare (woreda)', 10, 47, 'none', '0000-00-00 00:00:00'),
(521, 'Cherti (woreda)', 10, 47, 'none', '0000-00-00 00:00:00'),
(522, 'Dolobay', 10, 47, 'none', '0000-00-00 00:00:00'),
(523, 'Elekere', 10, 47, 'none', '0000-00-00 00:00:00'),
(524, 'Goro Bekeksa', 10, 47, 'none', '0000-00-00 00:00:00'),
(525, 'Guradamole', 10, 47, 'none', '0000-00-00 00:00:00'),
(526, 'Kersa Dula', 10, 47, 'none', '0000-00-00 00:00:00'),
(527, 'Mirab Imi', 10, 47, 'none', '0000-00-00 00:00:00'),
(528, 'Aware (woreda)', 10, 48, 'none', '0000-00-00 00:00:00'),
(529, 'Degehabur (woreda)', 10, 48, 'none', '0000-00-00 00:00:00'),
(530, 'Degehamedo (woreda)', 10, 48, 'none', '0000-00-00 00:00:00'),
(531, 'Gunagadow', 10, 48, 'none', '0000-00-00 00:00:00'),
(532, 'Misraq Gashamo', 10, 48, 'none', '0000-00-00 00:00:00'),
(533, 'Dihun', 10, 49, 'none', '0000-00-00 00:00:00'),
(534, 'Fiq (woreda)', 10, 49, 'none', '0000-00-00 00:00:00'),
(535, 'Gerbo (woreda)', 10, 49, 'none', '0000-00-00 00:00:00'),
(536, 'Hamero (woreda)', 10, 49, 'none', '0000-00-00 00:00:00'),
(537, 'Lagahida', 10, 49, 'none', '0000-00-00 00:00:00'),
(538, 'Mayumuluka', 10, 49, 'none', '0000-00-00 00:00:00'),
(539, 'Salahad', 10, 49, 'none', '0000-00-00 00:00:00'),
(540, 'Segeg (woreda)', 10, 49, 'none', '0000-00-00 00:00:00'),
(541, 'Adadle', 10, 50, 'none', '0000-00-00 00:00:00'),
(542, 'Danan (woreda)', 10, 50, 'none', '0000-00-00 00:00:00'),
(543, 'Ferfer (woreda)', 10, 50, 'none', '0000-00-00 00:00:00'),
(544, '[ Armali Fiqi Omar]]', 10, 50, 'none', '0000-00-00 00:00:00'),
(545, 'Gode (woreda)', 10, 50, 'none', '0000-00-00 00:00:00'),
(546, 'Imiberi', 10, 50, 'none', '0000-00-00 00:00:00'),
(547, 'Qorof', 10, 50, 'none', '0000-00-00 00:00:00'),
(548, 'Kelafo (woreda)', 10, 50, 'none', '0000-00-00 00:00:00'),
(549, 'Mustahil (woreda)', 10, 50, 'none', '0000-00-00 00:00:00'),
(550, 'Ajersagora', 10, 51, 'none', '0000-00-00 00:00:00'),
(551, 'Awbere (woreda)', 10, 51, 'none', '0000-00-00 00:00:00'),
(552, 'Babille', 10, 51, 'none', '0000-00-00 00:00:00'),
(553, 'Gursum', 10, 51, 'none', '0000-00-00 00:00:00'),
(554, 'Harshin (woreda)', 10, 51, 'none', '0000-00-00 00:00:00'),
(555, 'Jijiga (woreda)', 10, 51, 'none', '0000-00-00 00:00:00'),
(556, 'Kebri Beyah (woreda)', 10, 51, 'none', '0000-00-00 00:00:00'),
(557, 'Debeweyin', 10, 52, 'none', '0000-00-00 00:00:00'),
(558, 'Kebri Dahar (woreda)', 10, 52, 'none', '0000-00-00 00:00:00'),
(559, 'Shekosh (woreda)', 10, 52, 'none', '0000-00-00 00:00:00'),
(560, 'Shilavo (woreda)', 10, 52, 'none', '0000-00-00 00:00:00'),
(561, 'Dolo Odo', 10, 53, 'none', '0000-00-00 00:00:00'),
(562, 'Filtu (woreda) (formley known ', 10, 53, 'none', '0000-00-00 00:00:00'),
(563, 'Moyale', 10, 53, 'none', '0000-00-00 00:00:00'),
(564, 'Udet (woreda)', 10, 53, 'none', '0000-00-00 00:00:00'),
(565, 'Afdem (woreda)', 10, 54, 'none', '0000-00-00 00:00:00'),
(566, 'Ayesha (woreda)', 10, 54, 'none', '0000-00-00 00:00:00'),
(567, 'Dembel (woreda)', 10, 54, 'none', '0000-00-00 00:00:00'),
(568, 'Erer (woreda)', 10, 54, 'none', '0000-00-00 00:00:00'),
(569, 'Mieso, Somali (woreda)', 10, 54, 'none', '0000-00-00 00:00:00'),
(570, 'Shinile (woreda)', 10, 54, 'none', '0000-00-00 00:00:00'),
(571, 'Boh (woreda)', 10, 55, 'none', '0000-00-00 00:00:00'),
(572, 'Danot (woreda)', 10, 55, 'none', '0000-00-00 00:00:00'),
(573, 'Geladin (woreda)', 10, 55, 'none', '0000-00-00 00:00:00'),
(574, 'Werder (woreda)', 10, 55, 'none', '0000-00-00 00:00:00'),
(575, 'Awasa (woreda)', 12, 0, 'Defunct district/woredas', '0000-00-00 00:00:00'),
(576, 'Badawacho', 12, 0, 'Defunct district/woredas', '0000-00-00 00:00:00'),
(577, 'Bena Tsemay', 12, 0, 'Defunct district/woredas', '0000-00-00 00:00:00'),
(578, 'Bench (woreda)', 12, 0, 'Defunct district/woredas', '0000-00-00 00:00:00'),
(579, 'Boreda Abaya', 12, 0, 'Defunct district/woredas', '0000-00-00 00:00:00'),
(580, 'Dita Dermalo', 12, 0, 'Defunct district/woredas', '0000-00-00 00:00:00'),
(581, 'Goro', 12, 0, 'Defunct district/woredas', '0000-00-00 00:00:00'),
(582, 'Hamer Bena', 12, 0, 'Defunct district/woredas', '0000-00-00 00:00:00'),
(583, 'Isara Tocha', 12, 0, 'Defunct district/woredas', '0000-00-00 00:00:00'),
(584, 'Konteb', 12, 0, 'Defunct district/woredas', '0000-00-00 00:00:00'),
(585, 'Loma Bosa', 12, 0, 'Defunct district/woredas', '0000-00-00 00:00:00'),
(586, 'Mareka Gena', 12, 0, 'Defunct district/woredas', '0000-00-00 00:00:00'),
(587, 'Masha Anderacha', 12, 0, 'Defunct district/woredas', '0000-00-00 00:00:00'),
(588, 'Meskanena Mareko', 12, 0, 'Defunct district/woredas', '0000-00-00 00:00:00'),
(589, 'Meinit', 12, 0, 'Defunct district/woredas', '0000-00-00 00:00:00'),
(590, 'Omo Sheleko', 12, 0, 'Defunct district/woredas', '0000-00-00 00:00:00'),
(591, 'Zala Ubamale', 12, 0, 'Defunct district/woredas', '0000-00-00 00:00:00'),
(592, 'Alaba Special Woreda', 12, 0, 'Independent district/woredas', '0000-00-00 00:00:00'),
(593, 'Amaro Special Woreda', 12, 0, 'Independent district/woredas', '0000-00-00 00:00:00'),
(594, 'Basketo Special Woreda', 12, 0, 'Independent district/woredas', '0000-00-00 00:00:00'),
(595, 'Burji Special Woreda', 12, 0, 'Independent district/woredas', '0000-00-00 00:00:00'),
(596, 'Dirashe Special Woreda', 12, 0, 'Independent district/woredas', '0000-00-00 00:00:00'),
(597, 'Konso Special Woreda', 12, 0, 'Independent district/woredas', '0000-00-00 00:00:00'),
(598, 'Konta Special Woreda (formerly', 12, 0, 'Independent district/woredas', '0000-00-00 00:00:00'),
(599, 'Yem Special Woreda', 12, 0, 'Independent district/woredas', '0000-00-00 00:00:00'),
(600, 'Bero (woreda)', 12, 56, 'none', '0000-00-00 00:00:00'),
(601, 'Debub Bench', 12, 56, 'none', '0000-00-00 00:00:00'),
(602, 'Guraferda', 12, 56, 'none', '0000-00-00 00:00:00'),
(603, 'Maji (woreda) (formerly known ', 12, 56, 'none', '0000-00-00 00:00:00'),
(604, 'Meinit Goldiya', 12, 56, 'none', '0000-00-00 00:00:00'),
(605, 'Meinit Shasha', 12, 56, 'none', '0000-00-00 00:00:00'),
(606, 'Mizan Aman (town)', 12, 56, 'none', '0000-00-00 00:00:00'),
(607, 'Semien Bench', 12, 56, 'none', '0000-00-00 00:00:00'),
(608, 'She Bench', 12, 56, 'none', '0000-00-00 00:00:00'),
(609, 'Sheko (woreda)', 12, 56, 'none', '0000-00-00 00:00:00'),
(610, 'Surma (woreda)', 12, 56, 'none', '0000-00-00 00:00:00'),
(611, 'Gena Bosa', 12, 57, 'none', '0000-00-00 00:00:00'),
(612, 'Isara (woreda)', 12, 57, 'none', '0000-00-00 00:00:00'),
(613, 'Loma (woreda)', 12, 57, 'none', '0000-00-00 00:00:00'),
(614, 'Mareka', 12, 57, 'none', '0000-00-00 00:00:00'),
(615, 'Tocha (woreda)', 12, 57, 'none', '0000-00-00 00:00:00'),
(616, 'Arba Minch (town)', 12, 58, 'none', '0000-00-00 00:00:00'),
(617, 'Arba Minch Zuria', 12, 58, 'none', '0000-00-00 00:00:00'),
(618, 'Bonke', 12, 58, 'none', '0000-00-00 00:00:00'),
(619, 'Boreda', 12, 58, 'none', '0000-00-00 00:00:00'),
(620, 'Chencha (woreda)', 12, 58, 'none', '0000-00-00 00:00:00'),
(621, 'Dita (woreda)', 12, 58, 'none', '0000-00-00 00:00:00'),
(622, 'Deramalo', 12, 58, 'none', '0000-00-00 00:00:00'),
(623, 'Demba Gofa', 12, 58, 'none', '0000-00-00 00:00:00'),
(624, 'Geze Gofa', 12, 58, 'none', '0000-00-00 00:00:00'),
(625, 'Kemba (woreda)', 12, 58, 'none', '0000-00-00 00:00:00'),
(626, 'Kucha (woreda)', 12, 58, 'none', '0000-00-00 00:00:00'),
(627, 'Melokoza', 12, 58, 'none', '0000-00-00 00:00:00'),
(628, 'Mirab Abaya', 12, 58, 'none', '0000-00-00 00:00:00'),
(629, 'Oyda', 12, 58, 'none', '0000-00-00 00:00:00'),
(630, 'Sawla (town)', 12, 58, 'none', '0000-00-00 00:00:00'),
(631, 'Uba Debretsehay', 12, 58, 'none', '0000-00-00 00:00:00'),
(632, 'Zala (woreda)', 12, 58, 'none', '0000-00-00 00:00:00'),
(633, 'Bule', 12, 59, 'none', '0000-00-00 00:00:00'),
(634, 'Dila (town)', 12, 59, 'none', '0000-00-00 00:00:00'),
(635, 'Dila Zuria', 12, 59, 'none', '0000-00-00 00:00:00'),
(636, 'Gedeb', 12, 59, 'none', '0000-00-00 00:00:00'),
(637, 'Kochere', 12, 59, 'none', '0000-00-00 00:00:00'),
(638, 'Wenago (woreda)', 12, 59, 'none', '0000-00-00 00:00:00'),
(639, 'Yirgachefe (woreda)', 12, 59, 'none', '0000-00-00 00:00:00'),
(640, 'Abeshge', 12, 60, 'none', '0000-00-00 00:00:00'),
(641, 'Butajira (town)', 12, 60, 'none', '0000-00-00 00:00:00'),
(642, 'Cheha', 12, 60, 'none', '0000-00-00 00:00:00'),
(643, 'Endegagn', 12, 60, 'none', '0000-00-00 00:00:00'),
(644, 'Enemorina Eaner', 12, 60, 'none', '0000-00-00 00:00:00'),
(645, 'Ezha', 12, 60, 'none', '0000-00-00 00:00:00'),
(646, 'Geta (woreda)', 12, 60, 'none', '0000-00-00 00:00:00'),
(647, 'Gumer', 12, 60, 'none', '0000-00-00 00:00:00'),
(648, 'Kebena', 12, 60, 'none', '0000-00-00 00:00:00'),
(649, 'Kokir Gedebano', 12, 60, 'none', '0000-00-00 00:00:00'),
(650, 'Mareko (woreda)', 12, 60, 'none', '0000-00-00 00:00:00'),
(651, 'Meskane', 12, 60, 'none', '0000-00-00 00:00:00'),
(652, 'Muhor Na Aklil', 12, 60, 'none', '0000-00-00 00:00:00'),
(653, 'Soddo (woreda)', 12, 60, 'none', '0000-00-00 00:00:00'),
(654, 'Welkite (town)', 12, 60, 'none', '0000-00-00 00:00:00'),
(655, 'Ana Lemo', 12, 61, 'none', '0000-00-00 00:00:00'),
(656, 'Duna (woreda)', 12, 61, 'none', '0000-00-00 00:00:00'),
(657, 'Gibe (woreda)', 12, 61, 'none', '0000-00-00 00:00:00'),
(658, 'Gomibora', 12, 61, 'none', '0000-00-00 00:00:00'),
(659, 'Hosaena (town)', 12, 61, 'none', '0000-00-00 00:00:00'),
(660, 'Limo (woreda)', 12, 61, 'none', '0000-00-00 00:00:00'),
(661, 'Mirab Badawacho', 12, 61, 'none', '0000-00-00 00:00:00'),
(662, 'Misha (woreda)', 12, 61, 'none', '0000-00-00 00:00:00'),
(663, 'Misraq Badawacho', 12, 61, 'none', '0000-00-00 00:00:00'),
(664, 'Shashogo', 12, 61, 'none', '0000-00-00 00:00:00'),
(665, 'Soro (woreda)', 12, 61, 'none', '0000-00-00 00:00:00'),
(666, 'Bita', 12, 62, 'none', '0000-00-00 00:00:00'),
(667, 'Bonga (town)', 12, 62, 'none', '0000-00-00 00:00:00'),
(668, 'Chena (woreda)', 12, 62, 'none', '0000-00-00 00:00:00'),
(669, 'Cheta (woreda)', 12, 62, 'none', '0000-00-00 00:00:00'),
(670, 'Decha', 12, 62, 'none', '0000-00-00 00:00:00'),
(671, 'Gesha', 12, 62, 'none', '0000-00-00 00:00:00'),
(672, 'Gewata', 12, 62, 'none', '0000-00-00 00:00:00'),
(673, 'Ginbo', 12, 62, 'none', '0000-00-00 00:00:00'),
(674, 'Menjiwo', 12, 62, 'none', '0000-00-00 00:00:00'),
(675, 'Sayilem', 12, 62, 'none', '0000-00-00 00:00:00'),
(676, 'Telo', 12, 62, 'none', '0000-00-00 00:00:00'),
(677, 'Angacha (woreda)', 12, 64, 'none', '0000-00-00 00:00:00'),
(678, 'Damboya (woreda)', 12, 64, 'none', '0000-00-00 00:00:00'),
(679, 'Doyogena (woreda)', 12, 64, 'none', '0000-00-00 00:00:00'),
(680, 'Durame (town)', 12, 64, 'none', '0000-00-00 00:00:00'),
(681, 'Hadero Tunto', 12, 64, 'none', '0000-00-00 00:00:00'),
(682, 'Kacha Bira', 12, 64, 'none', '0000-00-00 00:00:00'),
(683, 'Kedida Gamela', 12, 64, 'none', '0000-00-00 00:00:00'),
(684, 'Tembaro', 12, 64, 'none', '0000-00-00 00:00:00'),
(685, 'Anderacha (woreda)', 12, 66, 'none', '0000-00-00 00:00:00'),
(686, 'Masha (woreda)', 12, 66, 'none', '0000-00-00 00:00:00'),
(687, 'Yeki', 12, 66, 'none', '0000-00-00 00:00:00'),
(688, 'Aleta Wendo (woreda)', 9, 0, 'none', '0000-00-00 00:00:00'),
(689, 'Arbegona (woreda)', 9, 0, 'none', '0000-00-00 00:00:00'),
(690, 'Aroresa', 9, 0, 'none', '0000-00-00 00:00:00'),
(691, 'Awasa Zuria', 9, 0, 'none', '0000-00-00 00:00:00'),
(692, 'Bensa', 9, 0, 'none', '0000-00-00 00:00:00'),
(693, 'Bona Zuria', 9, 0, 'none', '0000-00-00 00:00:00'),
(694, 'Boricha (woreda)', 9, 0, 'none', '0000-00-00 00:00:00'),
(695, 'Bursa (woreda)', 9, 0, 'none', '0000-00-00 00:00:00'),
(696, 'Chere (woreda)', 9, 0, 'none', '0000-00-00 00:00:00'),
(697, 'Chuko (woreda)', 9, 0, 'none', '0000-00-00 00:00:00'),
(698, 'Dale (woreda)', 9, 0, 'none', '0000-00-00 00:00:00'),
(699, 'Dara (woreda)', 9, 0, 'none', '0000-00-00 00:00:00'),
(700, 'Gorche', 9, 0, 'none', '0000-00-00 00:00:00'),
(701, 'Hula (woreda)', 9, 0, 'none', '0000-00-00 00:00:00'),
(702, 'Loko Abaya', 9, 0, 'none', '0000-00-00 00:00:00'),
(703, 'Malga', 9, 0, 'none', '0000-00-00 00:00:00'),
(704, 'Shebedino', 9, 0, 'none', '0000-00-00 00:00:00'),
(705, 'Wensho', 9, 0, 'none', '0000-00-00 00:00:00'),
(706, 'Wondo Genet', 9, 0, 'none', '0000-00-00 00:00:00'),
(707, 'Alicho Werero', 12, 68, 'none', '0000-00-00 00:00:00'),
(708, 'Dalocha', 12, 68, 'none', '0000-00-00 00:00:00'),
(709, 'Lanfro', 12, 68, 'none', '0000-00-00 00:00:00'),
(710, 'Mirab Azernet Berbere', 12, 68, 'none', '0000-00-00 00:00:00'),
(711, 'Misraq Azernet Berbere', 12, 68, 'none', '0000-00-00 00:00:00'),
(712, 'Sankurra', 12, 68, 'none', '0000-00-00 00:00:00'),
(713, 'Silte', 12, 68, 'none', '0000-00-00 00:00:00'),
(714, 'Wulbareg', 12, 68, 'none', '0000-00-00 00:00:00'),
(715, 'Bako Gazer', 12, 69, 'none', '0000-00-00 00:00:00'),
(716, 'Bena Tsemay', 12, 69, 'none', '0000-00-00 00:00:00'),
(717, 'Gelila (woreda)', 12, 69, 'none', '0000-00-00 00:00:00'),
(718, 'Hamer (woreda)', 12, 69, 'none', '0000-00-00 00:00:00'),
(719, 'Kuraz', 12, 69, 'none', '0000-00-00 00:00:00'),
(720, 'Male (woreda)', 12, 69, 'none', '0000-00-00 00:00:00'),
(721, 'Nyangatom (woreda)', 12, 69, 'none', '0000-00-00 00:00:00'),
(722, 'Selamago', 12, 69, 'none', '0000-00-00 00:00:00'),
(723, 'Boloso Bombe', 12, 70, 'none', '0000-00-00 00:00:00'),
(724, 'Boloso Sore', 12, 70, 'none', '0000-00-00 00:00:00'),
(725, 'Damot Gale', 12, 70, 'none', '0000-00-00 00:00:00'),
(726, 'Damot Pulasa', 12, 70, 'none', '0000-00-00 00:00:00'),
(727, 'Damot Sore', 12, 70, 'none', '0000-00-00 00:00:00'),
(728, 'Damot Weyde', 12, 70, 'none', '0000-00-00 00:00:00'),
(729, 'Diguna Fango', 12, 70, 'none', '0000-00-00 00:00:00'),
(730, 'Humbo', 12, 70, 'none', '0000-00-00 00:00:00'),
(731, 'Kindo Didaye', 12, 70, 'none', '0000-00-00 00:00:00'),
(732, 'Kindo Koysha', 12, 70, 'none', '0000-00-00 00:00:00'),
(733, 'Offa (woreda)', 12, 70, 'none', '0000-00-00 00:00:00'),
(734, 'Sodo (town)', 12, 70, 'none', '0000-00-00 00:00:00'),
(735, 'Sodo Zuria', 12, 70, 'none', '0000-00-00 00:00:00'),
(736, 'Awasa', 9, 0, 'none', '0000-00-00 00:00:00'),
(737, 'Abergele (woreda)', 13, 79, 'none', '0000-00-00 00:00:00'),
(738, 'Adwa (woreda)', 13, 79, 'none', '0000-00-00 00:00:00'),
(739, 'Degua Tembien', 13, 79, 'none', '0000-00-00 00:00:00'),
(740, 'Enticho (woreda)', 13, 79, 'none', '0000-00-00 00:00:00'),
(741, 'Kola Tembien', 13, 79, 'none', '0000-00-00 00:00:00'),
(742, 'La\'ilay Maychew', 13, 79, 'none', '0000-00-00 00:00:00'),
(743, 'Mereb Lehe', 13, 79, 'none', '0000-00-00 00:00:00'),
(744, 'Naeder Adet', 13, 79, 'none', '0000-00-00 00:00:00'),
(745, 'Tahtay Maychew', 13, 79, 'none', '0000-00-00 00:00:00'),
(746, 'Werie Lehe', 13, 79, 'none', '0000-00-00 00:00:00'),
(747, 'Atsbi Wenberta', 13, 80, 'none', '0000-00-00 00:00:00'),
(748, 'Ganta Afeshum', 13, 80, 'none', '0000-00-00 00:00:00'),
(749, 'Gulomahda', 13, 80, 'none', '0000-00-00 00:00:00'),
(750, 'Hawzen (woreda)', 13, 80, 'none', '0000-00-00 00:00:00'),
(751, 'Irob (woreda)', 13, 80, 'none', '0000-00-00 00:00:00'),
(752, 'Saesi Tsaedaemba', 13, 80, 'none', '0000-00-00 00:00:00'),
(753, 'Wukro (woreda)', 13, 80, 'none', '0000-00-00 00:00:00'),
(754, 'Asigede Tsimbela', 13, 81, 'none', '0000-00-00 00:00:00'),
(755, 'La\'ilay Adiyabo', 13, 81, 'none', '0000-00-00 00:00:00'),
(756, 'Medebay Zana', 13, 81, 'none', '0000-00-00 00:00:00'),
(757, 'Tahtay Adiyabo', 13, 81, 'none', '0000-00-00 00:00:00'),
(758, 'Tahtay Koraro', 13, 81, 'none', '0000-00-00 00:00:00'),
(759, 'Tselemti', 13, 81, 'none', '0000-00-00 00:00:00'),
(760, 'Alaje', 13, 82, 'none', '0000-00-00 00:00:00'),
(761, 'Alamata (woreda)', 13, 82, 'none', '0000-00-00 00:00:00'),
(762, 'Endamehoni', 13, 82, 'none', '0000-00-00 00:00:00'),
(763, 'Ofla', 13, 82, 'none', '0000-00-00 00:00:00'),
(764, 'Raya Azebo', 13, 82, 'none', '0000-00-00 00:00:00'),
(765, 'Enderta (woreda)', 13, 83, 'none', '0000-00-00 00:00:00'),
(766, 'Hintalo Wajirat', 13, 83, 'none', '0000-00-00 00:00:00'),
(767, 'Samre (woreda)', 13, 83, 'none', '0000-00-00 00:00:00'),
(768, 'Kafta Humera', 13, 84, 'none', '0000-00-00 00:00:00'),
(769, 'Tsegede', 13, 84, 'none', '0000-00-00 00:00:00'),
(770, 'Wolqayt', 13, 84, 'none', '0000-00-00 00:00:00'),
(771, 'Mek\'ele', 13, 85, 'none', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `zones`
--

CREATE TABLE `zones` (
  `zone_id` int(11) NOT NULL,
  `zone_name` varchar(40) NOT NULL,
  `region_id` int(2) NOT NULL,
  `recTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `zones`
--

INSERT INTO `zones` (`zone_id`, `zone_name`, `region_id`, `recTime`) VALUES
(1, 'Addis Ababa', 1, '0000-00-00 00:00:00'),
(2, 'Administrative Zone 1 (a.k.a. Awsi Rasu)', 2, '0000-00-00 00:00:00'),
(3, 'Administrative Zone 2 (a.k.a. Kilbet Ras', 2, '0000-00-00 00:00:00'),
(4, 'Administrative Zone 3 (a.k.a. Gabi Rasu)', 2, '0000-00-00 00:00:00'),
(5, 'Administrative Zone 4 (a.k.a. Fantena Ra', 2, '0000-00-00 00:00:00'),
(6, 'Administrative Zone 5 (a.k.a. Hari Rasu)', 2, '0000-00-00 00:00:00'),
(7, 'Argobba (special woreda)', 2, '0000-00-00 00:00:00'),
(8, 'Agew Awi', 3, '0000-00-00 00:00:00'),
(9, 'East Gojjam', 3, '0000-00-00 00:00:00'),
(10, 'North Gondar', 3, '0000-00-00 00:00:00'),
(11, 'North Shewa', 3, '0000-00-00 00:00:00'),
(12, 'North Wollo', 3, '0000-00-00 00:00:00'),
(13, 'Oromia', 3, '0000-00-00 00:00:00'),
(14, 'South Gondar', 3, '0000-00-00 00:00:00'),
(15, 'South Wollo', 3, '0000-00-00 00:00:00'),
(16, 'Wag Hemra', 3, '0000-00-00 00:00:00'),
(17, 'West Gojjam', 3, '0000-00-00 00:00:00'),
(18, 'Bahir Dar (special zone)', 3, '0000-00-00 00:00:00'),
(19, 'Asosa', 4, '0000-00-00 00:00:00'),
(20, 'Kamashi', 4, '0000-00-00 00:00:00'),
(21, 'Metekel', 4, '0000-00-00 00:00:00'),
(22, 'Dire Dawa', 5, '0000-00-00 00:00:00'),
(23, 'Anuak', 6, '0000-00-00 00:00:00'),
(24, 'Mezhenger', 6, '0000-00-00 00:00:00'),
(25, 'Nuer', 6, '0000-00-00 00:00:00'),
(26, 'Harari', 7, '0000-00-00 00:00:00'),
(27, 'Arsi', 8, '0000-00-00 00:00:00'),
(28, 'Bale', 8, '0000-00-00 00:00:00'),
(29, 'Borena', 8, '0000-00-00 00:00:00'),
(30, 'East Hararghe', 8, '0000-00-00 00:00:00'),
(31, 'East Shewa', 8, '0000-00-00 00:00:00'),
(32, 'East Welega', 8, '0000-00-00 00:00:00'),
(33, 'Guji', 8, '0000-00-00 00:00:00'),
(34, 'Horo Gudru Welega', 8, '0000-00-00 00:00:00'),
(35, 'Illubabor', 8, '0000-00-00 00:00:00'),
(36, 'Jimma', 8, '0000-00-00 00:00:00'),
(37, 'Kelem Welega', 8, '0000-00-00 00:00:00'),
(38, 'North Shewa', 8, '0000-00-00 00:00:00'),
(39, 'South West Shewa', 8, '0000-00-00 00:00:00'),
(40, 'West Arsi', 8, '0000-00-00 00:00:00'),
(41, 'West Hararghe', 8, '0000-00-00 00:00:00'),
(42, 'West Shewa', 8, '0000-00-00 00:00:00'),
(43, 'West Welega', 8, '0000-00-00 00:00:00'),
(44, 'Adama (special zone)', 8, '0000-00-00 00:00:00'),
(45, 'Jimma (special zone)', 8, '0000-00-00 00:00:00'),
(46, 'Oromia-Finfinne (special zone)', 8, '0000-00-00 00:00:00'),
(47, 'Afder', 10, '0000-00-00 00:00:00'),
(48, 'Degehabur', 10, '0000-00-00 00:00:00'),
(49, 'Fiq', 10, '0000-00-00 00:00:00'),
(50, 'Gode', 10, '0000-00-00 00:00:00'),
(51, 'Jijiga', 10, '0000-00-00 00:00:00'),
(52, 'Korahe', 10, '0000-00-00 00:00:00'),
(53, 'Liben', 10, '0000-00-00 00:00:00'),
(54, 'Shinile', 10, '0000-00-00 00:00:00'),
(55, 'Werder', 10, '0000-00-00 00:00:00'),
(56, 'Bench Maji', 12, '0000-00-00 00:00:00'),
(57, 'Dawro (formerly part of North Omo Zone)', 12, '0000-00-00 00:00:00'),
(58, 'Gamo Gofa (formerly part of North Omo Zo', 12, '0000-00-00 00:00:00'),
(59, 'Gedeo', 12, '0000-00-00 00:00:00'),
(60, 'Gurage', 12, '0000-00-00 00:00:00'),
(61, 'Hadiya', 12, '0000-00-00 00:00:00'),
(62, 'Keffa (formerly part of Keficho Shekicho', 12, '0000-00-00 00:00:00'),
(63, 'Keficho Shekicho (abolished in 2007)', 12, '0000-00-00 00:00:00'),
(64, 'Kembata Tembaro', 12, '0000-00-00 00:00:00'),
(65, 'North Omo (abolished in 2000)', 12, '0000-00-00 00:00:00'),
(66, 'Sheka (formerly part of Keficho Shekicho', 12, '0000-00-00 00:00:00'),
(67, 'Sidama', 12, '0000-00-00 00:00:00'),
(68, 'Silti', 12, '0000-00-00 00:00:00'),
(69, 'South Omo', 12, '0000-00-00 00:00:00'),
(70, 'Wolayita (formerly part of North Omo Zon', 12, '0000-00-00 00:00:00'),
(71, 'Alaba (special woreda)', 12, '0000-00-00 00:00:00'),
(72, 'Amaro (special woreda)', 12, '0000-00-00 00:00:00'),
(73, 'Basketo (special woreda, formerly part o', 12, '0000-00-00 00:00:00'),
(74, 'Burji (special woreda)', 12, '0000-00-00 00:00:00'),
(75, 'Dirashe (special woreda)', 12, '0000-00-00 00:00:00'),
(76, 'Konso (special woreda)', 12, '0000-00-00 00:00:00'),
(77, 'Konta (special woreda, formerly part of ', 12, '0000-00-00 00:00:00'),
(78, 'Yem (special woreda)', 12, '0000-00-00 00:00:00'),
(79, 'Central Tigray', 13, '0000-00-00 00:00:00'),
(80, 'East Tigray', 13, '0000-00-00 00:00:00'),
(81, 'North West Tigray', 13, '0000-00-00 00:00:00'),
(82, 'South Tigray', 13, '0000-00-00 00:00:00'),
(83, 'South East Tigray', 13, '0000-00-00 00:00:00'),
(84, 'West Tigray', 13, '0000-00-00 00:00:00'),
(85, 'Mekele (special zone)', 13, '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic_semester`
--
ALTER TABLE `academic_semester`
  ADD PRIMARY KEY (`asemister_id`);

--
-- Indexes for table `academic_year`
--
ALTER TABLE `academic_year`
  ADD PRIMARY KEY (`ay_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_grade`
--
ALTER TABLE `class_grade`
  ADD PRIMARY KEY (`class_grade_id`);

--
-- Indexes for table `grade_subject`
--
ALTER TABLE `grade_subject`
  ADD PRIMARY KEY (`grade_subject_id`);

--
-- Indexes for table `parent_registration`
--
ALTER TABLE `parent_registration`
  ADD PRIMARY KEY (`parent_id`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`region_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `school_basic_info`
--
ALTER TABLE `school_basic_info`
  ADD PRIMARY KEY (`school_id`),
  ADD UNIQUE KEY `school_name` (`school_name`);

--
-- Indexes for table `school_branches`
--
ALTER TABLE `school_branches`
  ADD PRIMARY KEY (`school_branch_id`);

--
-- Indexes for table `school_buildings`
--
ALTER TABLE `school_buildings`
  ADD PRIMARY KEY (`building_id`);

--
-- Indexes for table `school_class`
--
ALTER TABLE `school_class`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `school_class_schedule`
--
ALTER TABLE `school_class_schedule`
  ADD PRIMARY KEY (`class_schedule_id`);

--
-- Indexes for table `school_daily_time_basic`
--
ALTER TABLE `school_daily_time_basic`
  ADD PRIMARY KEY (`dailyTime_id`);

--
-- Indexes for table `school_grade`
--
ALTER TABLE `school_grade`
  ADD PRIMARY KEY (`grade_id`);

--
-- Indexes for table `school_sections`
--
ALTER TABLE `school_sections`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `staff_registration`
--
ALTER TABLE `staff_registration`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `student_class_location`
--
ALTER TABLE `student_class_location`
  ADD PRIMARY KEY (`stud_class_id`);

--
-- Indexes for table `student_registration`
--
ALTER TABLE `student_registration`
  ADD PRIMARY KEY (`stu_id`);

--
-- Indexes for table `subcities`
--
ALTER TABLE `subcities`
  ADD PRIMARY KEY (`subcity_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `teachers_registration`
--
ALTER TABLE `teachers_registration`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `woreda`
--
ALTER TABLE `woreda`
  ADD PRIMARY KEY (`woreda_id`);

--
-- Indexes for table `zones`
--
ALTER TABLE `zones`
  ADD PRIMARY KEY (`zone_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academic_semester`
--
ALTER TABLE `academic_semester`
  MODIFY `asemister_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `academic_year`
--
ALTER TABLE `academic_year`
  MODIFY `ay_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `class_grade`
--
ALTER TABLE `class_grade`
  MODIFY `class_grade_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `grade_subject`
--
ALTER TABLE `grade_subject`
  MODIFY `grade_subject_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `parent_registration`
--
ALTER TABLE `parent_registration`
  MODIFY `parent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `region_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `school_basic_info`
--
ALTER TABLE `school_basic_info`
  MODIFY `school_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `school_branches`
--
ALTER TABLE `school_branches`
  MODIFY `school_branch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `school_buildings`
--
ALTER TABLE `school_buildings`
  MODIFY `building_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `school_class`
--
ALTER TABLE `school_class`
  MODIFY `class_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `school_class_schedule`
--
ALTER TABLE `school_class_schedule`
  MODIFY `class_schedule_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `school_daily_time_basic`
--
ALTER TABLE `school_daily_time_basic`
  MODIFY `dailyTime_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `school_grade`
--
ALTER TABLE `school_grade`
  MODIFY `grade_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `school_sections`
--
ALTER TABLE `school_sections`
  MODIFY `class_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `staff_registration`
--
ALTER TABLE `staff_registration`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `student_class_location`
--
ALTER TABLE `student_class_location`
  MODIFY `stud_class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `student_registration`
--
ALTER TABLE `student_registration`
  MODIFY `stu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `subcities`
--
ALTER TABLE `subcities`
  MODIFY `subcity_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subject_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `teachers_registration`
--
ALTER TABLE `teachers_registration`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `woreda`
--
ALTER TABLE `woreda`
  MODIFY `woreda_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=772;

--
-- AUTO_INCREMENT for table `zones`
--
ALTER TABLE `zones`
  MODIFY `zone_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
