-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2021 at 04:55 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL,
  `emailaddress` varchar(50) NOT NULL,
  `phonenumber` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `firstname`, `lastname`, `password`, `emailaddress`, `phonenumber`) VALUES
(101, 'admin', 'adminfirstname', 'adminlastname', 'admin', 'adminadmin@gmail.com', 123456),
(102, 'admin2', 'second', 'entry', 'admin', 'admin2@gmail.com', 550183),
(105, '', 'Richard', 'Sucgang', '$2y$10$NKkkqCso7qv.vDIhcT28YONorMxXZbVGcl0o6dkn/2wVuzxfqR/bC', 'rsucgang@gmail.com', 226655),
(106, '', 'admin', 'admin2', '$2y$10$EvHV8SUvcklkb8oifTm64.FGdK3Xj1bDY07um2QF/IAl44Io4vrgG', 'admin11@gmail.com', 456789),
(107, '', 'Trial', 'Subject', '$2y$10$wkPqoz3Giujv9196BCkH0eXrEOtV1d9Pv0z/yDdBitwzRErx/p6dq', 'trialSubject@gmail.com', 78241);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(50) NOT NULL,
  `profile_image` varchar(256) NOT NULL,
  `path` varchar(256) NOT NULL,
  `student_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `profile_image`, `path`, `student_id`) VALUES
(48, '3avatar.jpg', 'img/3avatar.jpg', 2020050);

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `id` int(10) NOT NULL,
  `degree` varchar(100) NOT NULL,
  `coursename` varchar(100) NOT NULL,
  `subjectcode` varchar(10) NOT NULL,
  `subjectname` varchar(256) NOT NULL,
  `yearlevel` varchar(50) NOT NULL,
  `semester` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`id`, `degree`, `coursename`, `subjectcode`, `subjectname`, `yearlevel`, `semester`) VALUES
(1, 'Bachelor of Science', 'Information Technology', '', '', '', ''),
(2, 'Bachelor of Science', 'Psychology', '', '', '', ''),
(3, 'Bachelor of Science', 'Industrial Engineering', '', '', '', ''),
(4, 'Bachelor of Science', 'Accountancy', '', '', '', ''),
(5, 'Bachelor of Arts', 'Communication', '', '', '', ''),
(6, 'Bachelor of Science', 'Nursing', '', '', '', ''),
(8, 'Bachelor of Science', 'Entrepreneurship', '', '', '', ''),
(9, 'Bachelor of Arts', 'Multimedia Arts', '', '', '', ''),
(10, 'Bachelor of Science', 'Education', '', '', '', ''),
(11, 'Bachelor of Science', 'Biology', '', '', '', ''),
(12, 'Bachelor of Science', 'Hotel and Restaurant Management', '', '', '', ''),
(13, 'Bachelor of Science', 'Tourism', '', '', '', ''),
(15, 'Bachelor of Science', 'Electrical Engineering', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `studentdetails`
--

CREATE TABLE `studentdetails` (
  `id` int(10) NOT NULL,
  `collegeprogram` varchar(100) NOT NULL,
  `studentid` int(10) NOT NULL,
  `studentlastname` varchar(100) NOT NULL,
  `studentfirstname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(50) NOT NULL,
  `subjectname` varchar(100) NOT NULL,
  `subjectcode` varchar(100) NOT NULL,
  `yearlevel` varchar(100) NOT NULL,
  `degree` varchar(100) NOT NULL,
  `coursename` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `subjectname`, `subjectcode`, `yearlevel`, `degree`, `coursename`) VALUES
(1, 'Computer Programming 1', 'Coprog1', 'First', 'Bachelor of Science', 'Information Technology'),
(3, 'Computer Programming 2', 'Coprog2', 'First', 'Bachelor of Science', 'Information Technology'),
(5, 'Computer Maintenance and Troubleshooting', 'Commaint', 'First', '', 'Information Technology'),
(11, 'Introduction to Business Processes', 'Itbupro', 'First', '', 'Information Technology'),
(12, 'Introduction to Psychology', 'Inpsych', 'First', '', 'Psychology'),
(13, 'Biological Psychology', 'Biopsyc', 'First', '', 'Psychology'),
(14, 'Introduction to Computing', 'Intcomp', 'First', '', 'Information Technology'),
(15, 'Introduction to Human Computer Interaction', 'Intcomi', 'First', '', 'Information Technology'),
(16, 'Data Structures and Algorithms', 'Datastr', 'Second', '', 'Information Technology'),
(17, 'Information Assurance and Security 1', 'Infasec1', 'Second', '', 'Information Technology'),
(18, 'Operating Systems', 'Opersyst', 'Second', '', 'Information Technology'),
(19, 'IT Service Management', 'Itservm', 'Second', '', 'Information Technology'),
(20, 'Information Management', 'Infoman', 'Second', '', 'Information Technology'),
(21, 'Information Assurance and Security 1', 'Infasec2', 'Second', '', 'Information Technology'),
(22, 'Project Management', 'Itproma', 'Second', '', 'Information Technology'),
(23, 'Linux System and Network Administration', 'Linusyst', 'Second', '', 'Information Technology'),
(24, 'Systems Analysis and Design', 'Itsysde', 'Second', '', 'Information Technology'),
(25, 'IT Elective 1', 'Itelect1', 'Second', '', 'Information Technology'),
(26, 'Integrative Programming and Technologies', 'Inteprog', 'Second', '', 'Information Technology'),
(27, 'Applications Development and Emerging Technologies', 'Appdevt', 'Third', '', 'Information Technology'),
(28, 'Fundamentals of Database Systems', 'Infoman2', 'Third', '', 'Information Technology'),
(29, 'Networking 1', 'Itnetw1', 'Third', '', 'Information Technology'),
(30, 'IT Elective 2', 'Itelect2', 'Third', '', 'Information Technology'),
(31, 'IT Methods of Research', 'ITMetre', 'Third', '', 'Information Technology'),
(32, 'System Integration and Architecture1', 'Sysiarc1', 'Third', '', 'Information Technology'),
(33, 'IT Field Trips and Seminars', 'Itfitsem', 'Third', '', 'Information Technology'),
(34, 'IT Elective 3', 'Itelect3', 'Third', '', 'Information Technology'),
(35, 'Capstone Project 1', 'ITCaproj1', 'Third', '', 'Information Technology'),
(36, 'Technopreneurship', 'Techpre', 'Third', '', 'Information Technology'),
(37, 'Theories of Personality 1', 'Theoper1', 'First', '', 'Psychology'),
(38, 'Developmental Psychology', 'Devpsyc', 'First', '', 'Psychology'),
(39, 'Psychology Elective 1', 'Psyelec1', 'Second', '', 'Psychology'),
(40, 'Psychological Statistics', 'Psycstat', 'First', '', 'Psychology'),
(41, 'Calculus1', 'Engcalc1', 'First', '', 'Industrial Engineering'),
(42, 'Engineering Drawing', 'Engdraw', 'First', '', 'Industrial Engineering'),
(43, 'Calculus 2', 'Engcalc2', 'First', '', 'Industrial Engineering'),
(44, 'Computer-Aided Drafting', 'AutoCAD', 'First', '', 'Industrial Engineering'),
(45, 'Statistical Analysis for Industrial Engineering 1', 'IEStat1', 'First', '', 'Industrial Engineering'),
(46, 'Introduction to Communication Media', 'Intromed', 'First', '', 'Communication'),
(47, 'Communication Theory', 'Comtheo', 'First', '', 'Communication'),
(48, 'System Administration and Maintenance', 'Systadm', 'Third', '', 'Information Technology'),
(50, 'Communication, Culture and Society', 'Comsoc', 'First', '', 'Communication'),
(51, 'Experimental Psychology', 'Exrpsyc', 'Second', '', 'Psychology'),
(52, 'Introduction to Film', 'Intrfilm', 'First', '', 'Communication'),
(53, 'Psychology Elective 2', 'Psyelec2', 'Second', '', 'Psychology'),
(54, 'Knowledge Management', 'Knowman', 'First', '', 'Communication'),
(55, 'Communication Planning', 'Complan', 'Second', '', 'Communication'),
(56, 'Differential Equations', 'Difeque', 'Second', '', 'Industrial Engineering'),
(57, 'Broadcasting Principles and Practices', 'Prinbrod', 'Second', '', 'Communication'),
(58, 'Statistical Analysis for Industrial Engineering 2', 'IEStat2', 'Second', '', 'Industrial Engineering'),
(59, 'Journalism Principles and Practices', 'Prijour', 'Second', '', 'Communication'),
(60, 'Industrial/Organizational Psychology', 'IOPsyc', 'Second', '', 'Psychology'),
(61, 'Industrial Organization & Management', 'Inorman', 'Second', '', 'Industrial Engineering'),
(62, 'Introduction to Video Editing and Design', 'Videodit', 'Second', '', 'Communication'),
(63, 'Psychological Assessment', 'Psychass', 'Third', '', 'Psychology'),
(64, 'Communication Research', 'Comres', 'Second', '', 'Communication'),
(65, 'Advanced Mathematics for Industrial Engineering', 'AdmatIE', 'Second', '', 'Industrial Engineering'),
(66, 'Engineering Economics', 'EngiEcon', 'Second', '', 'Industrial Engineering'),
(67, 'Work Study and Management', 'Workmea', 'Second', '', 'Industrial Engineering'),
(68, 'Abnormal Psychology', 'Abpsych', 'Third', '', 'Psychology'),
(69, 'Public Relations Principles and Practices', 'Pubrela', 'Second', '', 'Communication'),
(70, 'Risk Disaster and Humanitarian Communication', 'RDHComm', 'Second', '', 'Communication'),
(71, 'Field Methods in Psychology', 'Filmeth', 'Third', '', 'Psychology'),
(72, 'Thermodynamics', 'Thermody', 'Second', '', 'Industrial Engineering'),
(73, 'Theoretical Foundation of Nursing', 'NCM_100', 'First', '', 'Nursing'),
(74, 'Managerial Economics', 'Maneco', 'First', '', 'Accountancy'),
(75, 'Financial Accounting and Reporting', 'Finacre', 'First', '', 'Accountancy'),
(76, 'Conceptual Framework & Accounting Standards', 'Confras', 'First', '', 'Accountancy'),
(77, 'Information and Communications Technology in Business (ICT)', 'ICTech', 'First', '', 'Entrepreneurship'),
(78, 'Financial Accounting', 'Fin-Acc', 'First', '', 'Entrepreneurship'),
(79, 'Entrepreneurial Behavior ', 'Entrebe', 'First', '', 'Entrepreneurship'),
(80, 'Introduction to Multimedia Arts', 'Introma', 'First', '', 'Multimedia Arts'),
(81, 'Drawing 1', 'Drawone', 'First', '', 'Multimedia Arts'),
(82, 'History of Graphic Design', 'Hisgrap', 'First', '', 'Multimedia Arts'),
(83, 'Teaching Science in Elementary Grades (Biology and Chemistry)', 'Teasci1', 'First', '', 'Education'),
(84, 'Teaching Math in the Primary Grades', 'Teamat1', 'First', '', 'Education'),
(85, 'Teaching Social Science in Elementary Grades (Culture and Geography)', 'Teasoc1', 'First', '', 'Education'),
(86, 'General Zoology Lecture', 'Genzole', 'First', '', 'Biology'),
(87, 'General Zoology Laboratory', 'Genzolb', 'First', '', 'Biology'),
(88, 'Macro Perspective of Tourism and Hospitality', 'Mactour', 'First', '', 'Hotel and Restaurant Management'),
(89, 'Risk Management as Applied to Safety, Security and Sanitation', 'Safesan', 'First', '', 'Hotel and Restaurant Management'),
(92, 'dummyForEdit1', 'dummyDeets101', '', '', 'Nursing'),
(94, 'Health Assessment', 'NCM_101', 'First', '', 'Nursing'),
(95, 'Health Education', 'NCM_102', 'First', '', 'Nursing'),
(96, 'Fundamentals of Nursing Practice', 'NCM_103', 'First', '', 'Nursing'),
(97, 'Community Health Nursing 1 (Individual and Family as Clients)', 'NCM_104', 'Second', '', 'Nursing'),
(98, 'Economic Development', 'Econdev', 'First', '', 'Accountancy'),
(99, 'Cost Accounting & Control', 'CostconA', 'First', '', 'Accountancy'),
(100, 'Intermediate Accounting 1', 'Intacc1', 'First', '', 'Accountancy'),
(101, 'Networking 2', 'Itnetw2', 'Third', '', 'Information Technology'),
(102, 'System Integration and Architecture 2', 'Sysiarc2', 'Third', '', 'Information Technology'),
(103, 'Cognitive Psychology', 'Cogpsyc', 'Third', '', 'Psychology'),
(104, 'Research in Psychology 1', 'Reseone', 'Third', '', 'Psychology'),
(105, 'Social Psychology', 'Socpsyc', 'Third', '', 'Psychology'),
(106, 'Programs and Policies on Enterprise Development', 'Entedev', 'First', '', 'Entrepreneurship'),
(107, 'Computer Application in Business (ERP)', 'CompERP', 'First', '', 'Entrepreneurship'),
(108, 'Human Resource Management', 'Humanre', 'First', '', 'Entrepreneurship'),
(109, 'Pricing and Costing', 'Pricost', 'First', '', 'Entrepreneurship'),
(110, 'The Child and Adolescent Learner and Learning Principles', 'Calprin', 'First', '', 'Education'),
(111, 'Good Manners and Right Conduct', 'GoodMan', 'First', '', 'Education'),
(112, 'Teaching Science in Elementary Grades (Physics, Earth and Space Science)', 'Teasci2', 'First', '', 'Education'),
(116, 'Nutrition and Diet Therapy (Lec)', 'NCM_105le', 'Second', '', 'Nursing'),
(117, 'Nutrition and Diet Therapy (Lab)', 'NCM_105lb', 'Second', '', 'Nursing'),
(121, 'Drawing 1', 'Drawtwo', 'First', '', 'Multimedia Arts'),
(122, 'Elements and Principles of Design', 'Prindes', 'First', '', 'Multimedia Arts'),
(123, 'Adobe Photoshop', 'Adobe', 'First', '', 'Multimedia Arts'),
(124, 'Color Theory', 'Theocol', 'Second', '', 'Multimedia Arts'),
(125, 'Writing for New Media', 'Writmed', 'Second', '', 'Multimedia Arts'),
(126, 'Digital Photography', 'Digipho', 'Second', '', 'Multimedia Arts'),
(127, 'Typography and Layout', 'Typolay', 'Second', '', 'Multimedia Arts'),
(128, '2D Animation', '2DAnima', 'Second', '', 'Multimedia Arts'),
(129, 'Fundamentals in Film and Video Production', 'Filmvid', 'Second', '', 'Multimedia Arts'),
(130, 'General Botany Lecture', 'Botnyle', 'First', '', 'Biology'),
(131, 'General Botany Laboratory', 'Botnylb', 'First', '', 'Biology'),
(132, 'Chemical Biology I Lecture (Organic Molecules)', 'Orgnclc', 'First', '', 'Biology'),
(133, 'Chemical Biology I Laboratory (Organic Molecules)', 'Orgnclb', 'First', '', 'Biology'),
(134, 'Teaching Arts in the Elementary Grades', 'TeaArts', 'Second', '', 'Education'),
(135, 'Teaching Math in the Intermediate Grades', 'Teamat2', 'Second', '', 'Education'),
(136, 'Financial Management', 'Fin-Man', 'Second', '', 'Accountancy'),
(137, 'Strategic Cost Management', 'Costram', 'Second', '', 'Accountancy');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `email_address` varchar(40) NOT NULL,
  `password` varchar(256) NOT NULL,
  `phonenumber` int(11) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `birthday` varchar(20) NOT NULL,
  `address` varchar(70) NOT NULL,
  `degree` varchar(200) NOT NULL,
  `program` varchar(100) NOT NULL,
  `yearlevel` varchar(100) NOT NULL,
  `semester` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email_address`, `password`, `phonenumber`, `gender`, `birthday`, `address`, `degree`, `program`, `yearlevel`, `semester`) VALUES
(2020047, 'Karen', 'Karen', 'karen3@gmail.com', '$2y$10$Eb71suLQji0nvx7Adghdneb0wsGWclUblRVRRZXAI8OckSiiV7T/C', 111100, 'Female', '1996-04-20', '440-1211, Takatsuji, Yurihama-cho Tohaku-gun, Tottori', 'Bachelor of Science', 'Psychology', 'Second Year', 'Second Semester'),
(2020049, 'Bryan', 'De Vera', 'bryandevera@gmail.com', '$2y$10$DEUL4xSLNu517hgVj2PhH.DPD6lyh4vWALr9koA.cflRMkNAs4QyS', 9567787, 'Male', '1987-04-30', 'Brgy. Dagatan Marawoy Lipa City Batangas', '', 'Nursing', 'Second Year', 'Second Semester'),
(2020050, 'Nikola', 'Jokic', 'nikolaj@denver.com', '$2y$10$oRMeOOOXiUVuZkzQP2SytuOvRrByQAQnX7/bCKZcHSGlH5UMjBaPq', 122, 'Male', '1995-08-15', '37000, Central Serbia, Rasina Administrative District, Krusevac City, ', '', 'Industrial Engineering', 'Third Year', 'First Semester'),
(2020051, 'Clarke', 'Griffin', 'cgriffin@gmail.com', '$2y$10$xjFXIhAJJjCiBmPJ3CsSSehTvNtbnrss4JXkO8Co0iKiExGa6KqPm', 356884, 'Female', '1996-04-20', 'Detroit USA', '', 'Industrial Engineering', 'Second Year', 'Second Semester'),
(2020052, 'Octavia', 'Blake', 'oblake@gmail.com', '$2y$10$sTDd9Kv1NAJL2M1gVDsVA.UCyQncUWBwhNlvISiXUi9BtXMUxdefm', 9561121, 'Female', '1994-06-23', 'North Carolina USA', '', 'Psychology', 'Third Year', 'Second Semester'),
(2020053, 'Otis', 'Milburn', 'omilburn@gmail.com', '$2y$10$VGnngi0MTeoiKEt7oXyGG.d.Ok.cZGPddrZcfxjDd96RTpSRB/YPS', 953346, 'Male', '2004-09-16', '48 Ashton St, Beverly, MA 01915', '', 'Psychology', 'Second Year', 'Second Semester'),
(2020054, 'Bryan', 'Miller', 'bmiller@gmail.com', '$2y$10$4tVyoqCgbcpDZWoGApEAnuNMXfvCbSmGZba3Oo6fNZzVCaT1b0hOq', 999990, 'Male', '2001-01-01', '546 Alabama St NY', '', 'Industrial Engineering', 'Third Year', 'First Semester'),
(2020055, 'John', 'Nathan', 'jnathan@gmail.com', '$2y$10$bX51ziX6uY/8qwE/kBvjs.reW/oduVvnx/ZR2SvCOXtVVorM.knRO', 88888, 'Male', '2008-02-26', '345 St Clair St,.', '', 'Industrial Engineering', 'Third Year', 'First Semester'),
(2020056, 'Jesse', 'Pinkman', 'jpinkman@gmail.com', '$2y$10$Tbi5rsOscCFwQ8SmrKli9OkoQWaeeZ8cuhijZppmrpif16TZgjnnC', 845578, 'Male', '1989-09-24', 'New Mexico City Alabama ', '', 'Biology', 'Second Year', 'Second Semester'),
(2020057, 'Walter', 'White', 'wwhite@gmail.com', '$2y$10$OMrtQXq/fzJtScXD4/xboeWWg7p/2I2F3YkNbe3aHX5LO3/YHJpBC', 226624, 'Male', '1973-11-29', 'New Mexico City Alabama New York 6969', '', 'Biology', 'Fourth Year', 'First Semester'),
(2020058, 'Jon', 'Snow', 'jsnow@gmail.com', '$2y$10$R81xMG3U0eeTr.P6FDMoJu7g9QqfOtjMsp0SeDuZJz0R6m4AaFIpG', 789456, 'Male', '1984-06-17', 'Winterfall North Remembers', '', 'Tourism', 'Fourth Year', 'First Semester'),
(2020059, 'Arya', 'Stark', 'astark@gmail.com', '$2y$10$EJMNpCfZ63sPjC/W7oCstuBzhQg9G8bcfGhESTBJDOODNlD8tCFL2', 122241, 'Female', '1999-06-26', 'Winterfell North Remembers', '', 'Psychology', 'First Year', 'First Semester'),
(2020060, 'Valar', 'Morghulis', 'vmorghulis@gmail.com', '$2y$10$jlcW4xdPvZoyeigERsbADuyjOSxIGmNpbuR7R/L4LyLFHVuzfFVyS', 887256, 'Male', '1911-11-11', 'New Shire Rd. NC', '', 'Communication', 'Fourth Year', 'First Semester'),
(2020062, 'Miso', 'Kim', 'kmiso@gmail.com', '$2y$10$Z7tGEqfUjAFPHV2cnGHEQeaDOqz9h3raCJkddyiLVUiruMn.bAZg.', 445284, 'Female', '1992-06-16', 'Itaewon South Korea', '', 'Communication', 'Second Year', 'First Semester'),
(2020063, 'Soma', 'Yukihira', 'somay@gmail.com', '$2y$10$bcZAN.Pzn.cg2tHJ4tMVb.B6zlvz4tpqg61fd6OqHlZZ/9uoTY.7q', 866977, 'Male', '1998-02-26', 'Nagishaki Japan', '', 'Hotel and Restaurant Management', 'Second Year', 'First Semester'),
(2020064, 'Shirley', 'Cabi', 'shirleyC@gmail.com', '$2y$10$1zjvKk.nMJa28hp2K2JPbeLIJj1lrmkU8eieXDMu8kIX/8LLVaCzi', 2323115, 'Female', '1995-12-18', 'Brgy. Inosluban Marawoy ', '', 'Entrepreneurship', 'Fourth Year', 'Second Semester'),
(2020065, 'Ram Mar', 'Clavo', 'rammarclavo12@gmail.com', '$2y$10$61PJGaAVOYyY40PXe5MlG.48eVjESMj.j5KnkyfdtKOzLvMjY391a', 445329, 'Male', '1994-12-15', 'Calapan Rizal City', '', 'Entrepreneurship', 'Second Year', 'Second Semester'),
(2020066, 'Hernel', 'Tocmo', 'thernel@gmail.com', '$2y$10$UyeHLoTEYiFv2xM16PEMPO6w3y3o1Boer/RwOP972HqX/T62xDJmy', 588254, 'Male', '1981-09-01', 'Nueva Ecija PH', '', 'Entrepreneurship', 'Second Year', 'First Semester'),
(2020067, 'Megumi', 'Tadokoro', 'tmegumi@gmail.com', '$2y$10$uSFwgAdEWGPzVXm544vPcOqiEp4FGZJWAKrXDkb2Rse9LjlaGk3TS', 223452, 'Female', '1999-06-28', 'Nagasaki Japan', '', 'Hotel and Restaurant Management', 'Second Year', 'First Semester'),
(2020068, 'Vincent', 'Paul', 'pvincent@gmail.com', '$2y$10$NcBqtdzvTqSrkxc3VsjwnuUqS85J4.YDnnKuiJWkdyxGNqy8ZUF7C', 221116, 'Male', '1976-09-04', 'San Jose Lipa City', '', 'Biology', 'First Year', 'Second Semester'),
(2020070, 'Annie Lizel', 'Pascual', 'alpascual@gmail.com', '$2y$10$Hen0qHoKeYlj6a8OYFh6tONFlh0vERYoyQPs7s0urIuoBf4eB8v6S', 224252, 'Female', '1986-06-13', 'Dumatlao, Quezon City', '', 'Psychology', 'Second Year', 'First Semester'),
(2020071, 'Anwar', 'Abdul', 'aabdul@gmail.com', '$2y$10$VplhqJXmFLIoxS1iQizTjeW/YAr1/eBFwlySubE9ZtiJha1b1cjDm', 223772, 'Male', '1985-06-30', 'New Delhi India', '', 'Information Technology', 'First Year', 'Second Semester'),
(2020072, 'Christian', 'Lugod', 'clugod@gmail.com', '$2y$10$k2ifKaHANZZvHU/ex7wGteOjgXJlrLHUfdzoyJoXauzGTYnf8K8SG', 223151, 'Male', '1988-02-12', 'Montalban Rizal', '', 'Information Technology', 'First Year', 'Second Semester'),
(2020073, 'Pepito', 'Manaloto', 'pmanaloto@gmail.com', '$2y$10$EdB67imICIyOJb55GuSAleBemvzeSzY28Ad0WHb8nFrTyKdYOe06i', 226233, 'Male', '1974-09-12', 'Rio Brazil', '', 'Entrepreneurship', 'First Year', 'First Semester'),
(2020074, 'Steffi Grace', 'Dimalibot', 'sgdimalibot@gmail.com', '$2y$10$eS4SKPq3Vuis8yrTb4lUz.oSrcpgTAPBCYjeiHvd8ujTPss6kcRPG', 223555, 'Female', '1996-11-29', 'Kidapawan Philippines', '', 'Multimedia Arts', 'Third Year', 'First Semester'),
(2020075, 'Sandy', 'Dagis', 'sdagis@gmail.com', '$2y$10$8axk5BJJI1OfMDUBd4FPxOMhnXdA6u5c4P6arhvKl3rkiFI7y2O16', 223863, 'Female', '2012-02-22', 'Puerto Prinsesa Palawan', '', 'Education', 'First Year', 'First Semester'),
(2020076, 'Katrina', 'Acedo', 'kacedo@gmail.com', '$2y$10$AspO2NZw6oNYdrHWgKyFhOZ0Yav7m5enMacQEQF3V0P8dvgi7u2AS', 221638, 'Female', '1986-07-19', 'San Francisco, Agusan del Sur', '', 'Tourism', 'First Year', 'First Semester'),
(2020077, 'Yvonne', 'Yap', 'yyap@gmail.com', '$2y$10$Sad7Oag77m6YQBPXz5yF6eGT4mJu75ShjcPKfP/1gTCICGyek7kb2', 226915, 'Female', '2000-05-07', '656 Edsel Road\r\nSherman Oaks, CA 91403', '', 'Education', 'Third Year', 'Second Semester'),
(2020078, 'Clara', 'Gilliam', 'cgilliam@gmail.com', '$2y$10$s9bSIA.zJIh8mnffXyivqOFgcK0UaeGBnheYLpMlcLdeU4k5aAdkO', 224295, 'Female', '1997-02-24', '63 Woodridge Lane Memphis, TN 38138', '', 'Communication', 'Second Year', 'First Semester'),
(2020079, 'Barbara', 'Hurley', 'bhurley@gmail.com', '$2y$10$vkdhRmqPqYhuEt3xBTAS5ea983x/DgTd6AifAF7ShLAd.vvaFvJp6', 224668, 'Female', '1994-09-02', '1241 Canis Heights Drive Los Angeles, CA 90017', '', 'Education', 'Third Year', 'First Semester'),
(2020080, 'Antonio', 'Forbes', 'aforbes@gmail.com', '$2y$10$5PGSkIq7TYpge2zIf.ZsGugF4kNncGJnP9QPl4L38RlpuIMpNKUrC', 229870, 'Male', '1988-07-08', '403 Snyder Avenue Charlotte, NC 28208', '', 'Accountancy', 'Second Year', 'Second Semester'),
(2020081, 'Charles', 'Horst', 'chorst@gmail.com', '$2y$10$Va8sJBXxwGqBCoxb9PkPb.xNeHj95L0MOXbtA/k7z1yWd/QMk0jlS', 226060, 'Male', '1999-02-08', '1636 Walnut Hill Drive Cincinnati, OH 45202', '', 'Multimedia Arts', 'First Year', 'First Semester'),
(2020082, 'Ronald', 'Collela', 'collelar@gmail.com', '$2y$10$n3fYfguBdOw5Qgo.ENwUSuySjkm1p8/LFvBSyLA.cfIDW/zN1MH8e', 202033, 'Male', '2001-06-10', '1571 Bingamon Branch Road, Barrington, IL 60010', '', 'Industrial Engineering', 'Second Year', 'First Semester'),
(2020083, 'Martha', 'Tomlinson', 'mtomlinson@gmail.com', '$2y$10$AEVYvqatqQ1FImXujzeK0.mdqUIiDdxznh6g17gvceE85Yc.iqLDC', 220783, 'Female', '1996-06-10', '4005 Bird Spring Lane, Houston, TX 77002', '', 'Tourism', 'First Year', 'First Semester'),
(2020084, 'Elizabeth', 'Bradly', 'ebradly@gmail.com', '$2y$10$LHomj64RIjPP1MKzAMNnLO7KlFLCsxUdEwzXpaDH8/1gTa3dvqsRC', 200368, 'Female', '2002-08-19', '1399 Randall Drive Honolulu, HI 96819', '', 'Information Technology', 'Third Year', 'Second Semester'),
(2020085, 'John Mikel', 'Doe', 'jmdoe@gmail.com', '$2y$10$0qZu3Ef3fB3sEMysayWfZeGR/IHiyN6m1L1DXBVmMp4f.ZrnXx/ve', 200361, 'Male', '2002-02-14', '4122  McVaney Road Hickory NC 28601', '', 'Industrial Engineering', 'Second Year', 'Second Semester'),
(2020086, 'Lois', 'Britton', 'lbritton@gmail.com', '$2y$10$G.CgXXXy5lQkOn48g79cm.6oddJzR2Ft85YF685YiFLJsva6qHrKW', 0, 'Female', '1965-03-28', '3114  State Street Detroit MI 48204', '', 'Tourism', 'Third Year', 'Second Semester'),
(2020087, 'David', 'Jensen', 'djensen@gmail.com', '$2y$10$IijvKLNEbpt1Gq/viWNPle46S/s72Z0b8IVZaPG6EE3CR0FlCSXai', 260666, 'Male', '1994-12-24', '1413  Martha Ellen Drive Annapolis MD 21409', '', 'Multimedia Arts', 'First Year', 'Second Semester'),
(2020088, 'Charles', 'Walker', 'cwalker@gmail.com', '$2y$10$kOZ5ke3DgeHfLvPo7Db.k.7Xe7m9eOjE8sPG6w5VTYExiIDTBFfF2', 680482, 'Male', '1985-05-23', '418  Ersel Street NEW PORT RICHEY FL 34653', '', 'Accountancy', 'Second Year', 'First Semester'),
(2020089, 'Martha', 'Oswalt', 'moswalt@gmail.com', '$2y$10$Xwuk7mhYd9XfdWcOnssP6uGEO0t4wJnQh4Lk4y7UNOnnScE7YYUG2', 598200, 'Female', '1957-06-26', '2475  Joy Lane Burbank CA 91504', '', 'Nursing', 'Fourth Year', 'First Semester'),
(2020090, 'Jane', 'Hammond', 'jhammond@gmail.com', '$2y$10$E1U/pR4gt8lbRAENvUMDD.eDjZmUruA4FEeJgNZJU0G4Qst6Cj0qK', 401883, 'Female', '1963-08-14', '1336  Meadowbrook Mall Road Gardena CA 90248', '', 'Accountancy', 'Fourth Year', 'Second Semester'),
(2020091, 'Minerva', 'Leon', 'mleon@gmail.com', '$2y$10$WmfDD4TP9KDxZ9RK088YIekcEtQRGja8FQfn4Ry2Eew8qlYh.4zPu', 660813, 'Female', '1998-05-05', '3864  Burnside Avenue Montezuma Creek UT 84534', '', 'Accountancy', 'Third Year', 'First Semester'),
(2020092, 'Kelly', 'Spivey', 'kspivey@gmail.com', '$2y$10$Y.9hOpfXE56yU91RqMhXf.oL.1SU7o8jDYsiuCsckYx2DLfIBdrDy', 890455, 'Female', '1986-12-30', '572  Center Street NORTH NORWICH NY 13814', '', 'Biology', 'Second Year', 'Second Semester'),
(2020093, 'Tracey', 'Hendrix', 'thendrix@gmail.com', '$2y$10$wVVacsN.Q6F2lFoth75oZ.PKLUccSFpCLBLtY6uQMs29GOE/Ozzfm', 990824, 'Female', '2000-03-09', '4914  Arbor Court Wheatland WY 82201', '', 'Hotel and Restaurant Management', 'Fourth Year', 'First Semester'),
(2020094, 'Sandra', 'Lindsey', 'slindsey@gmail.com', '$2y$10$nWUixexpnsLrXAdr1ZTwyeYmnNkfSdDgnSlatyOwu9Ny.YZiq78by', 550480, 'Female', '1988-04-15', '1731  James Street Buffalo NY 12214', '', 'Biology', 'Fourth Year', 'Second Semester'),
(2020095, 'Priscilla', 'Pomerleau', 'ppomerleau@gmail.com', '$2y$10$9yBFlGtXF5RW2/LIi4VmReHZvNZ5Tulfc2rqA/8NCuWozX8CvO1Ke', 100401, 'Female', '1977-10-13', '3702  Hillview Drive Ukiah CA 95482', '', 'Communication', 'Third Year', 'Second Semester'),
(2020096, 'Jason', 'Derulo', 'jderulo@gmail.com', '$2y$10$jQ8a2KtlTcfW3/bm0ZE8rOC1oPz5v5NHG8efc16l2SG93ApRMrkIW', 200482, 'Male', '2002-02-10', 'Gave you all i had', '', 'Hotel and Restaurant Management', 'Third Year', 'First Semester'),
(2020097, 'Dok', 'Prapanpoj', 'dprapanpoj@gmail.com', '$2y$10$xbhdYdJNL4AYUmb1q9SOxO2RZGCqYiRMikf5YZqRaxIMEj0r0Scwq', 504824, 'Female', '1988-08-07', '12/105 Moo 6 Srinakarin Road Nhongbon 10260', '', 'Entrepreneurship', 'Second Year', 'First Semester'),
(2020098, 'Guanyu', 'Xuan', 'gxuan@gmail.com', '$2y$10$C26SDSXKC6lw8UjgR4oUA.H9gKOPsHBoSj/9UA/eBJfnuXi/PnOsu', 8097254, 'Male', '0998-12-11', '179 River Valley Road #05-13 River Valley Building, 179033, Singapore', '', 'Tourism', 'Second Year', 'Second Semester'),
(2020099, 'Yun', 'Lu', 'yunlu@gmail.com', '$2y$10$Y61LnP0HNIArQNugBuvDSuP32p1OWDgSDPdqMrPu6xIxR8eWEroU.', 889004, 'Male', '1993-06-20', '10 Eunos Road 8 #09-04 Singapore Post Centre, 408600, Singapore 408600', '', 'Communication', 'First Year', 'Second Semester'),
(2020102, 'Andy', 'Schauss ', 'andySchauss@gmail.com', '$2y$10$RfQ81nPlTJiDODA4nJiksO9qVeLrafE2uRmkcTAGe2rO2Enus9Ki.', 633915, 'Male', '1973-06-26', '5 Ölwerkstrasse Allemagne', '', 'Accountancy', 'Fourth Year', 'First Semester'),
(2020114, 'Lina', 'Inverse', 'inverseLina@gmail.com', '$2y$10$coK6HS.o0R2zDwZadmgfi.nu6iULK/WcCVrjwUvc.3G.r2OjyPXO6', 11010, 'Female', '2006-10-01', '179-1102, Tokiwacho, Suzaka-shi, Nagano', '', 'Electrical Engineering', 'First Year', 'Second Semester'),
(2020115, 'Toshio', 'Asago', 'asagotoshio@gmail.com', '$2y$10$DvXh2yYwPa8iBj0he2AEdu6Q5REQd1BhEcBmqfJ9c7fb95p0u3NF2', 621085, 'Male', '1999-04-26', '494-1108, Botan, Koto-ku, Tokyo', '', 'Hotel and Restaurant Management', '', ''),
(2020116, 'Takako', 'Nakahara', 'takakonakahara@gmail.com', '$2y$10$t2dwvmq1UUx6fgaAze8EWe9IUx8ZRKDkYG50kMxgRDK1wnqSUQwfW', 550110, 'Male', '1991-04-10', '475-1009, Toneri, Adachi-ku, Tokyo', '', '', '', ''),
(2020117, 'Inyou', 'Eyes', 'inyourdog@gmail.com', '$2y$10$RSG5QKYlN.kEgb3DjaiXg.BFVvlkBxUPNkC2Gaa4aGe3CKc8NWckK', 23024, 'Male', '1986-06-13', 'city brgy hall blvd', '', 'haHAA', 'Second Year', 'First Semester'),
(2020118, '', '', '', '$2y$10$MvZG.6VAc84WqNoOSSA4beE9NM5WR6XA0sJc1slc5jKUaKyVPOXoO', 0, '', '', '', '', '', '', ''),
(2020119, 'What Is ', 'Love', 'whatislove@gmail.com', '$2y$10$M2dgbBbjJiNcfslvmfZ3xOvrIQBFRmYMOBEHpGcdi/MIf2Fceysy.', 2147483647, '', '1991-03-20', 'onje', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studentdetails`
--
ALTER TABLE `studentdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `studentdetails`
--
ALTER TABLE `studentdetails`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2020120;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
