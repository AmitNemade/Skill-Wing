SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS `id11020831_skillwing` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `id11020831_skillwing`;

CREATE TABLE `all_courses` (
  `course_id` int(20) NOT NULL,
  `category_id` int(5) NOT NULL,
  `course_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tutor_id` int(5) NOT NULL,
  `description` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `total_lectures` int(10) NOT NULL,
  `price` int(5) NOT NULL,
  `ratings` double NOT NULL,
  `total_students` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `all_courses` (`course_id`, `category_id`, `course_name`, `tutor_id`, `description`, `total_lectures`, `price`, `ratings`, `total_students`) VALUES
(1, 2, 'Master in Web Development', 3, 'Learn Web Development and Create your first Site Using HTML, CSS, PHP, JS etc', 354, 720, 4.5, 98500),
(2, 5, 'Master in Game Development ', 3, 'Learn Game Development and Create your first Game Using Unity, C# etc', 390, 1200, 3, 57000);

CREATE TABLE `category_detail` (
  `category_id` int(5) NOT NULL,
  `main_category` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `subcategory` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `no_of_courses` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `category_detail` (`category_id`, `main_category`, `subcategory`, `no_of_courses`) VALUES
(1, 'Development', 'Main_Category', 0),
(2, 'Development', 'Web Development', 0),
(3, 'Development', 'Mobile App', 0),
(4, 'Development', 'Software Development', 0),
(5, 'Development', 'Game Development', 0),
(6, 'Development', 'Databases', 0),
(7, 'Business', 'Main_Category', 0),
(8, 'Business', 'Nothing to show', 0),
(9, 'IT & Software', 'Main_Category', 0),
(10, 'IT &  Software', 'Nothing to show', 0);

CREATE TABLE `course_skills` (
  `course_id` int(5) NOT NULL,
  `skills` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `course_skills` (`course_id`, `skills`) VALUES
(1, 'HTML'),
(1, 'CSS'),
(1, 'JavaScript'),
(1, 'CSS'),
(1, 'PHP'),
(2, 'Unity'),
(2, 'C#');

CREATE TABLE `password_reset_temp` (
  `email` varchar(250) NOT NULL,
  `key` varchar(250) NOT NULL,
  `expDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `student_subscriptions` (
  `user_id` int(5) NOT NULL,
  `course_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `student_subscriptions` (`user_id`, `course_id`) VALUES
(1, 1),
(1, 2);

CREATE TABLE `tutor_courses` (
  `tutor_id` int(5) NOT NULL,
  `course_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `tutor_courses` (`tutor_id`, `course_id`) VALUES
(3, 1),
(3, 2);

CREATE TABLE `user_details` (
  `user_id` int(5) NOT NULL,
  `user_type` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `fname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `portfolio_path` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `profile_status` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '''Incomplete'''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `user_details` (`user_id`, `user_type`, `fname`, `lname`, `email`, `password`, `portfolio_path`, `profile_status`) VALUES
(1, 'Student', 'Amit', 'Nemade', 'amitnemade34@gmail.com', '$2y$12$2Xh6agXN8/3HMcuyoD/CKe4qqdq7S5qmwv4pS0n1dNq/cU2BbktzG', NULL, '\'Incomplete\''),
(2, 'Student', 'Vijay', 'Tembugade', 'vijaytembugade21@gmail.com', '$2y$12$kni4YvGcU0s5WTSHCWl2OOhUhESkyM8lafg3YIS3K8GbIIdW1KBiu', NULL, '\'Incomplete\''),
(3, 'Tutor', 'Sanket', 'More', 'sanket26@gmail.com', '$2y$12$fmqhjGQDocrq.7Yj27bpmuNio5KaoFsUY8ZIOZCvsy0N4FiXf.0yC', NULL, '\'Incomplete\'');

CREATE TABLE `video_details` (
  `course_id` int(10) NOT NULL,
  `video_id` int(10) NOT NULL,
  `lecture_no` int(5) NOT NULL,
  `lecture_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `video_path` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `video_details` (`course_id`, `video_id`, `lecture_no`, `lecture_name`, `video_path`) VALUES
(1, 1, 1, 'HTML_1', 'http://localhost/Skill%20It/video/Dil Jhoome with Maaza _ A.R. Rahman.mp4'),
(1, 2, 2, 'HTML_2', 'http://localhost/Skill%20It/video/Dil Jhoome with Maaza _ A.R. Rahman.mp4'),
(1, 3, 3, 'PHP_1', 'http://localhost/Skill%20It/video/Dil Jhoome with Maaza _ A.R. Rahman.mp4'),
(1, 4, 4, 'PHP_2', 'http://localhost/Skill%20It/video/Dil Jhoome with Maaza _ A.R. Rahman.mp4'),
(2, 5, 1, 'Unity_1', 'http://localhost/Skill%20It/video/Dil Jhoome with Maaza _ A.R. Rahman.mp4'),
(2, 6, 2, 'Unity_2', 'http://localhost/Skill%20It/video/Dil Jhoome with Maaza _ A.R. Rahman.mp4'),
(2, 7, 3, 'C#_1', 'http://localhost/Skill%20It/video/Dil Jhoome with Maaza _ A.R. Rahman.mp4'),
(2, 8, 4, 'C#_2', 'http://localhost/Skill%20It/video/Dil Jhoome with Maaza _ A.R. Rahman.mp4'),
(1, 9, 5, 'PHP_3', 'http://localhost/Skill%20It/video/Dil Jhoome with Maaza _ A.R. Rahman.mp4');


ALTER TABLE `all_courses`
  ADD PRIMARY KEY (`course_id`);

ALTER TABLE `category_detail`
  ADD PRIMARY KEY (`category_id`);

ALTER TABLE `user_details`
  ADD PRIMARY KEY (`user_id`);

ALTER TABLE `video_details`
  ADD PRIMARY KEY (`video_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
