-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2024 at 06:47 PM
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
-- Database: `edunex`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
                           `course_id` int(11) NOT NULL,
                           `course_name` varchar(255) NOT NULL,
                           `description` text DEFAULT NULL,
                           `teacher_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_name`, `description`, `teacher_id`) VALUES
                                                                                    (3, 'computer science', 'A technical science course', 7),
                                                                                    (4, 'BCOM', 'hjsvndojvn fd', 8),
                                                                                    (5, 'math', 'hfjk,mc fdjknv ', 8);

--
-- Triggers `courses`
--
DELIMITER $$
CREATE TRIGGER `insert_course_trigger` AFTER INSERT ON `courses` FOR EACH ROW BEGIN
    INSERT INTO school_data (data_type, name, parent_id)
    VALUES ('course', CONCAT(NEW.course_name, ' (Course)'), NULL);
END
    $$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `school_data`
--

CREATE TABLE `school_data` (
                               `id` int(11) NOT NULL,
                               `data_type` enum('student','teacher','course','enrollment') NOT NULL,
  `name` varchar(255) NOT NULL,
  `parent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `school_data`
--

INSERT INTO `school_data` (`id`, `data_type`, `name`, `parent_id`) VALUES
                                                                       (1, 'student', 'andanje (Student)', NULL),
                                                                       (2, 'course', 'BCOM (Course)', NULL),
                                                                       (3, 'teacher', 'william (Teacher)', NULL),
                                                                       (4, 'course', 'math (Course)', NULL),
                                                                       (5, 'course', 'pure chemistry (Course)', NULL),
                                                                       (6, 'student', 'waine (Student)', NULL),
                                                                       (7, 'student', 'john Doe (Student)', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
                            `std_id` int(11) NOT NULL,
                            `std_name` varchar(255) NOT NULL,
                            `gender` enum('Male','Female','Other') NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `fees` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`std_id`, `std_name`, `gender`, `dob`, `email`, `phone_number`, `fees`) VALUES
                                                                                                    (1, 'Washington Klein', 'Male', '2001-03-12', 'washingtonklein1@gmail.com', '+0847436573', 567.00),
                                                                                                    (2, 'lewis', 'Male', '2024-03-15', 'lewis@gmail.com', '12345678', 4567.00),
                                                                                                    (3, 'andanje', 'Male', '2024-03-13', 'andanje@gmail.com', '07545465', 102.00),
                                                                                                    (5, 'john Doe', 'Male', '2024-03-12', 'johne@gmail.com', '584903497', 648.00);

--
-- Triggers `students`
--
DELIMITER $$
CREATE TRIGGER `insert_student_trigger` AFTER INSERT ON `students` FOR EACH ROW BEGIN
    INSERT INTO school_data (data_type, name, parent_id)
    VALUES ('student', CONCAT(NEW.std_name, ' (Student)'), NULL);
END
    $$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
                            `teacher_id` int(11) NOT NULL,
                            `teacher_name` varchar(255) NOT NULL,
                            `email` varchar(255) NOT NULL,
                            `phone_number` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`teacher_id`, `teacher_name`, `email`, `phone_number`) VALUES
                                                                                   (7, 'cheges', 'schege@gmail.com', '+47837374848'),
                                                                                   (8, 'kararikaranja', 'karari@gmail.com', '65432');

--
-- Triggers `teachers`
--
DELIMITER $$
CREATE TRIGGER `insert_teacher_trigger` AFTER INSERT ON `teachers` FOR EACH ROW BEGIN
    INSERT INTO school_data (data_type, name, parent_id)
    VALUES ('teacher', CONCAT(NEW.teacher_name, ' (Teacher)'), NULL);
END
    $$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
    ADD PRIMARY KEY (`course_id`),
    ADD KEY `teacher_id` (`teacher_id`);

--
-- Indexes for table `school_data`
--
ALTER TABLE `school_data`
    ADD PRIMARY KEY (`id`),
    ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
    ADD PRIMARY KEY (`std_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
    ADD PRIMARY KEY (`teacher_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
    MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `school_data`
--
ALTER TABLE `school_data`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
    MODIFY `std_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
    MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
    ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`teacher_id`);

--
-- Constraints for table `school_data`
--
ALTER TABLE `school_data`
    ADD CONSTRAINT `school_data_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `school_data` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
