-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 21, 2023 at 08:43 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `CIVE_REPOSITORY_V1`
--

-- --------------------------------------------------------

--
-- Table structure for table `Comment`
--

CREATE TABLE `Comment` (
  `CommentID` int(11) NOT NULL,
  `PostID` int(11) NOT NULL,
  `PersonalID` int(11) NOT NULL,
  `content` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Comment`
--

INSERT INTO `Comment` (`CommentID`, `PostID`, `PersonalID`, `content`, `created_at`, `updated_at`) VALUES
(1, 21, 17, 'this is actually true', '2023-09-11 21:04:19', '2023-09-11 21:04:19'),
(2, 21, 17, 'i like this post', '2023-09-11 21:04:57', '2023-09-11 21:04:57'),
(7, 24, 20, 'dfghjkl;kllkjh', '2023-09-12 11:49:02', '2023-09-12 11:49:02'),
(8, 24, 20, 'jkbjnok\r\n', '2023-09-12 11:51:30', '2023-09-12 11:51:30'),
(9, 24, 20, 'rwrwwrw', '2023-09-12 11:51:44', '2023-09-12 11:51:44'),
(10, 12, 1, 'helolo mambo vip', '2023-09-12 11:52:21', '2023-09-12 11:52:21'),
(11, 12, 1, 'hello ndugu yangu`', '2023-09-12 11:53:10', '2023-09-12 11:53:10'),
(12, 26, 17, 'hello its me again', '2023-09-14 00:53:52', '2023-09-14 00:53:52'),
(13, 26, 17, 'trfdsadssdsfdgfhjhkhjlj;ljhggfds', '2023-09-14 00:54:02', '2023-09-14 00:54:02'),
(14, 26, 17, '[ioihuugkjyhtgfdhfjgkhl;kljkjhgfdsfsdfghkljlk', '2023-09-14 00:54:11', '2023-09-14 00:54:11'),
(15, 21, 22, 'Hey its dawilly here posted', '2023-09-14 02:20:23', '2023-09-14 02:20:23'),
(16, 21, 22, 'MY NAME IS DAWILLY GENE OFFICIAL', '2023-09-14 02:20:40', '2023-09-14 02:20:40'),
(18, 26, 22, 'zxfghjkjhgfdsdfghj', '2023-09-14 02:29:31', '2023-09-14 02:29:31'),
(19, 24, 22, 'wertyuioiuytreertyuiopoiuytr', '2023-09-14 02:29:47', '2023-09-14 02:29:47'),
(21, 21, 22, 'hello my best friend', '2023-09-14 02:39:37', '2023-09-14 02:39:37'),
(22, 21, 22, 'who said that', '2023-09-14 03:14:05', '2023-09-14 03:14:05'),
(24, 21, 22, 'rtyuiuytre', '2023-09-14 04:16:47', '2023-09-14 04:16:47'),
(25, 21, 22, 'okay i think this is good for sure', '2023-09-14 04:20:24', '2023-09-14 04:20:24'),
(28, 21, 26, 'this is bad i dont like it', '2023-09-15 10:06:34', '2023-09-15 10:06:34'),
(29, 21, 22, 'this is good', '2023-09-15 11:31:14', '2023-09-15 11:31:14'),
(30, 24, 22, 'my name is Elia william mariki am from kihonda secondary school and am so happy to be here as a student from this country', '2023-09-16 11:54:16', '2023-09-16 11:54:16'),
(31, 17, 22, 'This is beautifully', '2023-09-16 18:06:33', '2023-09-16 18:06:33'),
(41, 43, 22, 'zxzzczx', '2023-09-16 23:08:08', '2023-09-16 23:08:08'),
(43, 42, 22, 'this pasp paper is full of lies \r\n', '2023-09-16 23:32:44', '2023-09-16 23:32:44'),
(44, 42, 22, 'but we have to believe it and for sure we need some complicated things here i need to upload picture here', '2023-09-16 23:33:40', '2023-09-16 23:33:40'),
(45, 19, 22, 'hey its me who comment here am happy to do so for sure ', '2023-09-17 07:53:14', '2023-09-17 07:53:14'),
(46, 20, 22, 'this book is the best for sure and i cant stop looking at it', '2023-09-17 07:56:21', '2023-09-17 07:56:21'),
(48, 46, 22, 'yeah this is great', '2023-09-17 11:59:38', '2023-09-17 11:59:38'),
(50, 13, 22, 'ASDFGHJKLL;KJHGFXCXZX', '2023-09-17 14:09:26', '2023-09-17 14:09:26'),
(51, 18, 23, 'hey its me dawilly gene official', '2023-09-17 15:19:37', '2023-09-17 15:19:37'),
(53, 17, 23, 'sdfghjkljlkjh', '2023-09-17 17:31:04', '2023-09-17 17:31:04'),
(56, 44, 22, 'i really like this thing', '2023-09-17 17:34:13', '2023-09-17 17:34:13'),
(62, 44, 23, 'vgfhgfgfygjhgjgghjghjghgjhgjhgjhghghj', '2023-09-17 17:44:23', '2023-09-17 17:44:23'),
(66, 56, 22, 'This book is awsome for sure', '2023-09-18 09:56:17', '2023-09-18 09:56:17');

-- --------------------------------------------------------

--
-- Table structure for table `Personal_Details`
--

CREATE TABLE `Personal_Details` (
  `PersonalID` int(11) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Fname` varchar(25) NOT NULL,
  `Mname` varchar(25) NOT NULL,
  `Lname` varchar(25) NOT NULL,
  `Phone_number` int(11) NOT NULL,
  `Password` longtext NOT NULL,
  `Profile_picture` varchar(255) DEFAULT NULL,
  `Role` enum('student','admin') NOT NULL,
  `Active` tinyint(1) DEFAULT NULL,
  `Gender` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Personal_Details`
--

INSERT INTO `Personal_Details` (`PersonalID`, `Email`, `Fname`, `Mname`, `Lname`, `Phone_number`, `Password`, `Profile_picture`, `Role`, `Active`, `Gender`) VALUES
(1, 'dawillygene@gmail.com', 'dawilly', 'brodah', 'gene', 753225961, '1234', NULL, 'student', 1, ''),
(2, 'dawillygene@gmail.com', 'dawilly', 'bodah', 'gene', 71212, '$2y$10$14TNRwuPG7Zuwg4CeQ/CROuxAd6rXQPAVT/UWdyghnIgUyEiMuL8m', 'file.jpg', 'student', 0, ''),
(3, 'dawillygene@gmail.com', 'dawilly', 'bodah', 'gene', 71212, '', NULL, 'student', 0, ''),
(4, 'dawillygene@gmail.com', 'dawilly', 'bodah', 'gene', 71212, 'dawilly', NULL, 'student', 1, ''),
(5, 'dawillygene@gmail.com', 'dawilly', 'bodah', 'gene', 71212, 'dawilly', NULL, 'student', 1, 'Male'),
(6, 'dawillygene@gmail.com', 'dawilly', 'bodah', 'gene', 71212, 'dawilly', NULL, 'student', 1, 'Male'),
(7, 'dawillygene@gmail.com', 'HG', 'bodah', 'gene', 71212, 'dawilly', NULL, 'student', 1, 'Male'),
(8, 'dawillygene@gmail.com', 'dawilly', 'bodah', 'gene', 71212, 'dawilly', NULL, 'student', 1, 'Male'),
(9, 'dawillygene@gmail.com', 'HG', 'bodah', 'GH', 71212, 'dawilly', NULL, 'student', 1, 'Male'),
(10, 'dawillygene@gmail.com', 'dawilly', 'bodah', 'gene', 71212, 'dawilly', NULL, 'student', 1, 'Male'),
(11, 'dawillygene@gmail.com', 'dawilly', 'bodah', 'GH', 71212, 'dawilly', NULL, 'student', 0, 'Male'),
(12, 'dawillygene@gmail.com', 'dawilly', 'bodah', 'gene', 71212, 'dawilly', NULL, 'student', 0, 'Male'),
(13, 'dawillygene@gmail.com', 'dawilly', 'bodah', 'gene', 71212, 'dawilly', NULL, 'student', 0, 'Male'),
(14, 'dawillygene@gmail.com', 'dawilly', 'bodah', 'gene', 71212, '', NULL, 'student', 0, 'Male'),
(15, 'dawillygene@gmail.com', 'dawilly', 'bodah', 'gene', 71212, '', NULL, 'student', 0, 'Male'),
(16, 'dawillygene@gmail.com', 'dawilly', 'bodah', 'gene', 71212, '', NULL, 'student', 0, 'Male'),
(17, 'dawillygene@gmail.com', 'nimpha', 'bodah', 'mmali', 71212, '$2y$10$14TNRwuPG7Zuwg4CeQ/CROuxAd6rXQPAVT/UWdyghnIgUyEiMuL8m', '1295047_4574.jpg', 'student', 1, 'Female'),
(18, 'ramadhan@gmail.com', 'Ramadhani', 'abdallah', 'abdallah', 976, '', NULL, 'student', 1, 'Male'),
(19, 'haroon@gmail.com', 'HAROON', 'AHMED', 'ABDILLAH', 7123344, '', NULL, 'student', 0, 'Male'),
(20, 'neema@gmail.com', 'NEEMA', 'GODFREY', 'KISANGA', 7111, '$2y$10$14TNRwuPG7Zuwg4CeQ/CROuxAd6rXQPAVT/UWdyghnIgUyEiMuL8m', NULL, 'student', 0, 'Female'),
(21, 'tronics@gmail.com', 'tronics', 'tronics', 'tronics', 771, '$2y$10$14TNRwuPG7Zuwg4CeQ/CROuxAd6rXQPAVT/UWdyghnIgUyEiMuL8m', '1295047_4574.jpg', 'student', 1, 'Male'),
(22, 'eliamariki2000@gmail.com', 'ELIA', 'WILLIAM', 'MARIKI', 753225961, '$2y$10$14TNRwuPG7Zuwg4CeQ/CROuxAd6rXQPAVT/UWdyghnIgUyEiMuL8m', '219732741_557382345445795_5988141686749400102_n.jpg', 'student', 1, 'Male'),
(23, 'dawillygene@gmail.com', 'admin1', 'admin1', 'admin1', 753225961, '$2y$10$14TNRwuPG7Zuwg4CeQ/CROuxAd6rXQPAVT/UWdyghnIgUyEiMuL8m', '241116550_581242799726416_2473398295940264921_n.jpg', 'admin', 1, ''),
(24, 'haroon@gmail.com', 'nimpha', 'bodah', 'GH', 7123344, '$2y$10$14TNRwuPG7Zuwg4CeQ/CROuxAd6rXQPAVT/UWdyghnIgUyEiMuL8m', NULL, 'student', 1, 'Female'),
(25, 'haroona@gfds', 'haroona', 'harrona', 'haroona', 98765, '$2y$10$6t6rmcJaH85oi34OSsRYAe2qUgPxXRiyVwi/GyavnGhQTgi5.vx/S', 'file.jpg', 'student', 1, 'Male'),
(26, 'leonida@gmail.com', 'leonida', 'leonida', 'leonida', 1234567, '$2y$10$08chbaUb6AU9wy9wNdJfAuOP1KR3OlHYDIdTZ0QKesBv6MPHPvHPO', 'logo.png', 'student', 1, 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `Post`
--

CREATE TABLE `Post` (
  `PostID` int(11) NOT NULL,
  `PersonalID` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `file_type` enum('pastpaper','notes','program','book','installation','Tutorial','accessory') NOT NULL,
  `YearLevel` int(11) DEFAULT NULL CHECK (`YearLevel` between 1 and 4),
  `Documentyear` varchar(4) DEFAULT NULL,
  `Examlevel` enum('Test 01','Test 02','UE') DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `Program` varchar(100) DEFAULT NULL,
  `Course` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `links` varchar(255) DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT 'rejected',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Post`
--

INSERT INTO `Post` (`PostID`, `PersonalID`, `title`, `file_type`, `YearLevel`, `Documentyear`, `Examlevel`, `department`, `Program`, `Course`, `description`, `links`, `file_path`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '', 'pastpaper', 1, '2023', 'Test 01', ' Department of comp science and engineering', 'SE', 'DS', '', '', 'ELIA WILLIAM MARIKI FUNC & LOOP ASSN 1.pdf', 'rejected', '2023-09-04 11:14:50', '2023-09-04 11:14:50'),
(2, 1, '', 'pastpaper', 1, '2023', 'Test 01', ' Department of comp science and engineering', 'SE', 'DS', '', '', 'Mbosso ft Zuchu _for your love cover by Minnah Melodies.mp4', 'rejected', '2023-09-04 12:13:07', '2023-09-04 12:13:07'),
(3, 1, '', 'pastpaper', 1, '2012', 'UE', 'Department of information system and technology', 'MTA', 'MT117', '', '', '5.1.png', 'rejected', '2023-09-04 12:56:10', '2023-09-04 12:56:10'),
(4, 1, 'Jungle book', 'book', NULL, NULL, NULL, NULL, NULL, NULL, 'my name is dawilly gene', 'https://google.com', NULL, 'rejected', '2023-09-04 20:03:11', '2023-09-04 20:03:11'),
(5, 1, 'Microsoft word ', 'installation', NULL, NULL, NULL, NULL, NULL, NULL, 'This is simpy on how to install microsoft word and it is ismple to learn and program this kind of thing its like your Trying to do something really funny ', 'https://google.com', NULL, 'rejected', '2023-09-04 20:11:20', '2023-09-04 20:11:20'),
(7, 1, '', 'notes', 1, '2023', 'UE', ' Department of comp science and engineering', 'SE', 'DS', '', '', 'CamScanner 01-19-2023 23.48.pdf', 'rejected', '2023-09-04 20:56:47', '2023-09-04 20:56:47'),
(8, 1, '', 'notes', 1, '2023', 'UE', ' Department of comp science and engineering', 'SE', 'DS', '', '', 'CamScanner 01-19-2023 23.48.pdf', 'rejected', '2023-09-04 20:56:51', '2023-09-04 20:56:51'),
(9, 1, 'Jungle Book', 'book', NULL, NULL, NULL, NULL, NULL, NULL, 'The history about the Jungle BOOK', 'https://www.apachefriends.org/index.html. ', NULL, 'rejected', '2023-09-04 20:57:00', '2023-09-04 20:57:00'),
(10, 1, '', 'notes', 1, '2023', 'UE', 'Department of comp science and engineering', 'SE', 'DS', '', '', 'profile.png', 'rejected', '2023-09-05 06:53:55', '2023-09-05 06:53:55'),
(11, 1, '', 'pastpaper', 1, '2023', 'Test 01', ' Department of comp science and engineering', 'SE', 'DS', '', '', '1.pdf', 'rejected', '2023-09-05 08:44:20', '2023-09-05 08:44:20'),
(12, 1, 'SHORT HISTORY OF SCHOOL', 'installation', NULL, NULL, NULL, NULL, NULL, NULL, 'Ancient Education: Education has been a part of human society for millennia. In ancient civilizations, such as Mesopotamia, Egypt, Greece, and Rome, education was often provided by private tutors or religious institutions. These early educational systems focused on subjects like philosophy, mathematics, and literature.\r\n\r\nMedieval Monastic Schools: During the Middle Ages, education was primarily controlled by religious institutions, particularly monasteries and cathedral schools. Monks and clergy were the primary educators, and they taught subjects like theology, Latin, and classical literature.\r\n\r\nRenaissance and Humanism: The Renaissance period in Europe (14th to 17th centuries) saw a revival of interest in classical learning and the arts. Humanism emerged as an educational philosophy that emphasized the study of classical texts, grammar, rhetoric, and the humanities. Prominent humanists like Erasmus and Petrarch promoted this approach.\r\n\r\nEarly Modern Schools: As societies evolved, schools and educational institutions began to diversify. The printing press, invented by Johannes Gutenberg in the 15th century, played a significant role in making books and knowledge more accessible.\r\n\r\nPublic Education: In the 18th and 19th centuries, public education systems started to take shape in various countries. Prominent educators like Horace Mann in the United States and Johann Heinrich Pestalozzi in Switzerland advocated for universal access to education.\r\n\r\nIndustrial Revolution and Mass Education: The Industrial Revolution in the 19th century transformed societies and economies. It also led to a greater demand for an educated workforce. Governments began establishing compulsory education laws and building public schools to meet this demand.\r\n\r\n20th Century Education: The 20th century saw significant advancements in education, including the development of standardized testing, the growth of universities, and the integration of technology into classrooms. Educational philosophies also evolved, with movements like progressive education emphasizing student-centered learning.\r\n\r\nDigital Age and Online Learning: In the 21st century, the widespread availability of the internet has revolutionized education. Online learning platforms, massive open online courses (MOOCs), and digital resources have expanded access to education beyond traditional classroom settings.\r\n\r\nGlobalization and International Education: Education has become increasingly globalized, with students and educators collaborating across borders. International schools, exchange programs, and cultural exchanges have become more common.\r\n\r\nChallenges and Innovations: Modern education faces challenges such as educational inequality, the need to adapt to rapidly changing technology, and addressing environmental and social issues. Innovations in pedagogy, curriculum development, and educational technology continue to shape the future of education.\r\n\r\nThis overview provides a brief glimpse into the long and diverse history of schools and education. The field of education continues to evolve, reflecting the changing needs and aspirations of societies worldwide.', 'http://localhost/Cive%20repository/Dashbord/complete_code/upload.php', NULL, 'rejected', '2023-09-05 08:54:31', '2023-09-05 08:54:31'),
(13, 1, 'SHORT STORY OF EDUCATION', 'installation', NULL, NULL, NULL, NULL, NULL, NULL, 'Ancient Roots: The history of schools can be traced back to ancient civilizations like Mesopotamia, Egypt, Greece, and Rome. These societies had formal educational systems that often focused on subjects like philosophy, mathematics, and literature.\r\n\r\nMedieval Monastic Schools: During the Middle Ages, education was primarily provided by religious institutions, including monasteries and cathedral schools. Monks and clergy were the main educators, teaching subjects like theology, Latin, and the arts.\r\n\r\nRenaissance and Humanism: The Renaissance period in Europe (14th to 17th centuries) saw a revival of interest in classical learning. Humanism emerged as an educational philosophy emphasizing the study of classical texts, grammar, rhetoric, and the humanities.\r\n\r\nAge of Enlightenment: The Enlightenment in the 17th and 18th centuries led to the spread of secular education and the idea of universal access to knowledge. Prominent philosophers like John Locke and Jean-Jacques Rousseau contributed to educational thought during this period.\r\n\r\nIndustrial Revolution: The 19th-century Industrial Revolution brought about significant societal changes. Public education systems were established in many countries to provide basic literacy and skills needed for an industrial workforce.\r\n\r\nCompulsory Education: In the late 19th and early 20th centuries, many nations implemented compulsory education laws, making it mandatory for children to attend school for a certain number of years.\r\n\r\nProgressive Education: The early 20th century saw the rise of progressive education, with educators like John Dewey advocating for student-centered learning, experiential education, and a focus on critical thinking.\r\n\r\nPost-World War II Boom: After World War II, there was a massive expansion of education worldwide. The GI Bill in the United States and similar initiatives in other countries provided education and training to veterans, leading to a surge in university enrollments.\r\n\r\nDigital Age: The late 20th century and beyond witnessed the integration of technology into education. The rise of the internet, computers, and digital resources transformed teaching and learning, leading to online education and blended learning models.\r\n\r\nGlobalization: Education became more globalized, with international student exchanges, study abroad programs, and the growth of international schools and universities.\r\n\r\n21st Century Challenges: Education in the 21st century faces challenges such as addressing educational inequality, adapting to rapidly changing technology, and preparing students for an increasingly interconnected and complex world.\r\n\r\nInnovations and Pedagogical Shifts: Contemporary education is characterized by innovations in pedagogy, including personalized learning, project-based learning, and the use of artificial intelligence in education.', 'http://localhost/Cive%20repository/Dashbord/complete_code/upload.php', NULL, 'rejected', '2023-09-05 08:55:58', '2023-09-05 08:55:58'),
(14, 1, 'MY NAME IS DAWILLY', 'installation', NULL, NULL, NULL, NULL, NULL, NULL, '\"Dawilly\" is a name with a rich and unique history, originating from a small, close-knit community in a picturesque valley. The name has been passed down through generations, and its origins are deeply rooted in the traditions of this community.\r\n\r\nAccording to local legend, the name Dawilly was first bestowed upon a renowned and respected leader of this community centuries ago. Dawilly was known for their wisdom, compassion, and strong sense of justice. They played a crucial role in mediating disputes, resolving conflicts, and ensuring the well-being of their people.\r\n\r\nOver time, the name Dawilly became synonymous with leadership, fairness, and integrity. It was not only a given name but also a title of honor. Those who bore the name were expected to uphold the values and principles associated with it.\r\n\r\nAs generations passed, the Dawillys continued to serve as leaders and pillars of their community. They were known for their commitment to education, with many Dawillys becoming scholars, teachers, and mentors, ensuring that knowledge and wisdom were passed down through the ages.\r\n\r\nIn the present day, the name Dawilly is a source of pride for those who bear it. It serves as a reminder of the community\'s history and values, and it continues to be associated with leadership and the pursuit of knowledge.\r\n\r\nWhile this history of the name Dawilly is entirely fictional, it illustrates how names can be imbued with meaning and significance within a particular context or community.', 'http://localhost/Cive%20repository/Dashbord/complete_code/upload.php#', NULL, 'rejected', '2023-09-05 08:57:33', '2023-09-05 08:57:33'),
(15, 1, 'Essentials:', 'book', NULL, NULL, NULL, NULL, NULL, NULL, 'rtyuio', '', NULL, 'rejected', '2023-09-05 09:48:56', '2023-09-05 09:48:56'),
(16, 1, 'Run like there is no return', 'book', NULL, NULL, NULL, NULL, NULL, NULL, 'This book blablablabla', 'wqwqwqwqw', NULL, 'rejected', '2023-09-05 10:39:02', '2023-09-05 10:39:02'),
(17, 1, 'lamas', 'book', NULL, NULL, NULL, NULL, NULL, NULL, 'blablablabla', 'http://localhost/Cive%20repository/Dashbord/complete_code/upload.php', '2.pdf', 'rejected', '2023-09-05 10:47:16', '2023-09-05 10:47:16'),
(18, 1, 'four one', 'book', NULL, NULL, NULL, NULL, NULL, NULL, 'four', 'four', '2.pdf', 'rejected', '2023-09-05 10:48:46', '2023-09-05 10:48:46'),
(19, 1, '', 'pastpaper', 1, '2023', 'Test 01', ' Department of comp science and engineering', 'SE', 'DS', '', '', 'Chapter 3.pdf', 'rejected', '2023-09-06 21:32:49', '2023-09-06 21:32:49'),
(20, 17, '', 'pastpaper', 1, '2023', 'Test 01', ' Department of comp science and engineering', 'SE', 'DS', '', '', 'Sharon Myers , Keying Ye, Walpole - Probability & Statistics for Engineers & Scientists, 8th Edition_ Instructors Solution Manual ONLY.pdf', 'rejected', '2023-09-08 07:55:36', '2023-09-08 07:55:36'),
(21, 17, 'The tales of nimpha', 'book', NULL, NULL, NULL, NULL, NULL, NULL, 'Once upon a time, in a quaint village nestled deep within a lush, enchanted forest, there lived a young girl named Nimpha. The village of Verdelight was known for its natural beauty and the magical aura that surrounded it. Nimpha, however, was unlike any other child in the village.\r\n\r\nFrom the day she was born, it was clear that Nimpha possessed a special connection with the forest and its inhabitants. Her eyes sparkled like emeralds, and her laughter had a musical quality that seemed to resonate with the leaves, birds, and animals. The villagers believed she was blessed by the forest spirits.\r\n\r\nAs Nimpha grew, so did her bond with the enchanted forest. She spent her days exploring the woods, talking to the animals, and learning the secrets of the ancient trees. She had a particular affinity for the fairies that flitted about, their tiny wings shimmering with iridescent colors.\r\n\r\nOne day, when Nimpha was exploring a hidden glade deep within the forest, she stumbled upon a wounded unicorn. Its coat was muddied, and a thorn was embedded in its delicate hoof. Nimpha approached the creature with gentle care and, using her innate connection with nature, she healed the unicorn\'s wounds.\r\n\r\nIn gratitude, the unicorn granted Nimpha a single wish. Without hesitation, Nimpha wished for the forest to be protected and preserved forever. The unicorn, touched by her selfless wish, used its magical horn to create a barrier around Verdelight. The barrier kept the village safe from harm, ensuring the forest\'s protection for generations to come.\r\n\r\nNimpha\'s fame spread far and wide, and people from neighboring villages visited Verdelight to witness the magical bond between Nimpha and the forest. She became a guardian of the natural world, guiding travelers through the enchanted woods and teaching them the importance of living in harmony with nature.\r\n\r\nAs the years passed, Nimpha\'s story became a legend, and her name was synonymous with love for the natural world. Even after she grew old and passed away, her spirit remained within the forest, continuing to protect and inspire those who ventured into the mystical realm of Verdelight.\r\n\r\nAnd so, the story of Nimpha, the girl with the emerald eyes and a heart full of love for the enchanted forest, lived on, reminding all who heard it of the magic that exists when one is truly connected to nature.', 'https://www.apachefriends.org/index.html. ', '', 'rejected', '2023-09-08 09:08:33', '2023-09-08 09:08:33'),
(22, 17, '', 'pastpaper', 1, '2023', 'Test 01', '  Department of comp science and engineering', 'MTA', 'IA', '', '', 'C++ --Complete Reference (PDF).pdf', 'rejected', '2023-09-08 09:42:32', '2023-09-08 09:42:32'),
(23, 19, '', 'notes', 4, '2019', 'UE', 'Department of comp science and engineering', 'MTA', 'IA', '', '', 'Linux Administration Handbook, 2nd.pdf', 'rejected', '2023-09-08 10:13:22', '2023-09-08 10:13:22'),
(24, 20, 'TALES OF NEEMA KISANGA', 'installation', NULL, NULL, NULL, NULL, NULL, NULL, 'Once upon a time, in a quaint village nestled deep within a lush, enchanted forest, there lived a young girl named Nimpha. The village of Verdelight was known for its natural beauty and the magical aura that surrounded it. Nimpha, however, was unlike any other child in the village.\r\n\r\nFrom the day she was born, it was clear that Nimpha possessed a special connection with the forest and its inhabitants. Her eyes sparkled like emeralds, and her laughter had a musical quality that seemed to resonate with the leaves, birds, and animals. The villagers believed she was blessed by the forest spirits.\r\n\r\nAs Nimpha grew, so did her bond with the enchanted forest. She spent her days exploring the woods, talking to the animals, and learning the secrets of the ancient trees. She had a particular affinity for the fairies that flitted about, their tiny wings shimmering with iridescent colors.\r\n\r\nOne day, when Nimpha was exploring a hidden glade deep within the forest, she stumbled upon a wounded unicorn. Its coat was muddied, and a thorn was embedded in its delicate hoof. Nimpha approached the creature with gentle care and, using her innate connection with nature, she healed the unicorn\'s wounds.\r\n\r\nIn gratitude, the unicorn granted Nimpha a single wish. Without hesitation, Nimpha wished for the forest to be protected and preserved forever. The unicorn, touched by her selfless wish, used its magical horn to create a barrier around Verdelight. The barrier kept the village safe from harm, ensuring the forest\'s protection for generations to come.\r\n\r\nNimpha\'s fame spread far and wide, and people from neighboring villages visited Verdelight to witness the magical bond between Nimpha and the forest. She became a guardian of the natural world, guiding travelers through the enchanted woods and teaching them the importance of living in harmony with nature.\r\n\r\nAs the years passed, Nimpha\'s story became a legend, and her name was synonymous with love for the natural world. Even after she grew old and passed away, her spirit remained within the forest, continuing to protect and inspire those who ventured into the mystical realm of Verdelight.\r\n\r\nAnd so, the story of Nimpha, the girl with the emerald eyes and a heart full of love for the enchanted forest, lived on, reminding all who heard it of the magic that exists when one is truly connected to nature.', 'https://www.apachefriends.org/index.html. ', '', 'rejected', '2023-09-08 10:38:51', '2023-09-08 10:38:51'),
(25, 17, 'ertyui', 'installation', NULL, NULL, NULL, NULL, NULL, NULL, 'dfghj', 'dfghj', '', 'rejected', '2023-09-09 09:00:52', '2023-09-09 09:00:52'),
(26, 17, 'how to make API', 'Tutorial', NULL, NULL, NULL, NULL, NULL, NULL, 'its just simple and more simple', 'https://google.com', '', 'rejected', '2023-09-09 09:33:07', '2023-09-09 09:33:07'),
(34, 24, '', 'notes', 1, '2023', 'UE', ' Department of comp science and engineering', 'SE', 'DS', '', '', 'simulizi.txt', 'rejected', '2023-09-12 12:04:22', '2023-09-12 12:04:22'),
(36, 24, '', 'notes', 1, '2023', 'UE', ' Department of comp science and engineering', 'SE', 'DS', '', '', 'dawillycode.ino', 'rejected', '2023-09-12 12:18:29', '2023-09-12 12:18:29'),
(39, 22, '', 'pastpaper', 1, '2023', 'Test 01', ' Department of comp science and engineering', 'SE', 'DS', '', '', 'assgnment 1 MT 1211.pdf', 'rejected', '2023-09-15 11:23:42', '2023-09-15 11:23:42'),
(41, 22, '', 'notes', 2, '2011', 'UE', ' Department of comp science and engineering', 'SE', 'DS', 'i really love this application and is very healpfully for everyone in this country', '', 'CamScanner 03-27-2023 12.27.pdf', 'rejected', '2023-09-16 11:51:16', '2023-09-16 11:51:16'),
(42, 23, '', 'pastpaper', 1, '2023', 'Test 01', ' Department of comp science and engineering', 'SE', 'DS', 'niaje ndugu yangu', '', 'Numerical Analysis BURDEN.pdf', 'rejected', '2023-09-16 20:43:16', '2023-09-16 20:43:16'),
(43, 22, 'dawilly', 'book', NULL, NULL, NULL, NULL, NULL, NULL, 'hgfhgfhfhhbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb', '', '', 'rejected', '2023-09-16 23:06:32', '2023-09-16 23:06:32'),
(44, 22, 'dawilly again', 'book', NULL, NULL, NULL, NULL, NULL, NULL, 'The %20 you see in the URL represents a URL-encoded space character. In URLs, spaces are not allowed as they can cause issues with parsing and might not be handled consistently across all systems and browsers. Therefore, spaces are replaced with %20 or + when included in a URL.\r\n\r\nIn your URL, the presence of %20 suggests that there are spaces in the values of the userId and action parameters. For example, the userId value might be \" \" (a single space character) and the action value might be \"opentext\" (without spaces).\r\n\r\nIf you want to avoid the %20 and have more human-readable URLs, you should ensure that the values you\'re passing as query parameters do not contain spaces. You can trim spaces from the values or replace them with underscores or hyphens before constructing the URL.', '', '', 'rejected', '2023-09-16 23:09:00', '2023-09-16 23:09:00'),
(46, 22, 'my favorate', 'book', NULL, NULL, NULL, NULL, NULL, NULL, 'this book is for genius only', '', 'atkinson1.pdf', 'rejected', '2023-09-17 11:31:46', '2023-09-17 11:31:46'),
(47, 22, 'my video ', 'installation', NULL, NULL, NULL, NULL, NULL, NULL, 'In this code:\r\n\r\nEach <td> element has an inline style attribute that sets the width to a fixed value (e.g., 100px). You can adjust this width as needed to achieve the desired appearance.\r\nBy setting a fixed width, you ensure that the dimensions of the table cells remain consistent regardless of the content length.\r\nHowever, please note that setting fixed widths for table cells may cause issues on smaller screens or when the content is longer than the specified width. You might want to consider using responsive design techniques like CSS media queries or allowing the cells to expand as needed to accommodate longer content in a fluid layout if that\'s appropriate for your use case.', '', 'The Weeknd - Blinding Lights (Live On The 2020 MTV VMAs).mp4', 'rejected', '2023-09-17 12:04:00', '2023-09-17 12:04:00'),
(48, 23, '', 'pastpaper', 1, '2023', 'Test 01', ' Department of comp science and engineering', 'SE', 'DS', 'WERTYUIOPOKJHGFDSASSDFGHGJKL', '', 'Total_amount.pdf', 'rejected', '2023-09-17 14:06:51', '2023-09-17 14:06:51'),
(49, 23, NULL, 'accessory', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Top-WiFi-Embedded-Modules-for-IoT-Projects.png', 'accepted', '2023-09-17 16:12:03', '2023-09-17 16:12:03'),
(50, 23, 'my name is simphon', 'book', NULL, NULL, NULL, NULL, NULL, NULL, 'hello hello hello hello hello', '', 'COLLEGE OF INFORMATICS AND VIRTUAL EDUCATION COVER PAGE.pdf', 'rejected', '2023-09-17 17:09:35', '2023-09-17 17:09:35'),
(51, 22, '', 'pastpaper', 1, '2023', 'Test 01', ' Department of comp science and engineering', 'SE', 'IA', 'This past paper is all about the last year challenging pastpaper have ever seen before . please for anyone who has answer please contact me am begging you nad if get answers contact me my number is 071111111', '', 'Numerical methods is an area of mathematics and computer science that creates.pdf', 'accepted', '2023-09-18 09:40:25', '2023-09-18 09:40:25'),
(52, 22, '', 'pastpaper', 2, '2019', 'UE', 'Department of information system and technology', 'SE', 'IA', 'I think you all like this thing and you will enjoy to solve some of this challenging pastpaper', '', 'IT SECURITY....IA..p.papers.pdf', 'pending', '2023-09-18 09:42:18', '2023-09-18 09:42:18'),
(53, 22, '', 'notes', 1, '2022', 'UE', ' Department of comp science and engineering', 'SE', 'MT117', 'This is the last Notes from the lecture am happy to share with you', '', 'CS 123 Tutorial 1.pdf', 'accepted', '2023-09-18 09:44:17', '2023-09-18 09:44:17'),
(54, 22, '', 'notes', 1, '2023', 'UE', ' Department of comp science and engineering', 'SE', 'DS', 'This was the last week  notes from lecture Amon you have to see this', '', 'CS 126 Lecture 08.pdf', 'accepted', '2023-09-18 09:45:40', '2023-09-18 09:45:40'),
(55, 26, 'An Introduction to Numerical Methods and Analysis', 'book', NULL, NULL, NULL, NULL, NULL, NULL, 'Hey guys am so happy to share with you this book is all about security i has full of challenging and new trumendous idea li think you have to see it and read hope u will enjoy and learn alot from this  ', '', 'An Introduction to Numerical Methods and Analysis ( PDFDrive ).pdf', 'accepted', '2023-09-18 09:49:31', '2023-09-18 09:49:31'),
(56, 26, 'Fayyad-Nassif-Introduction-numerical-Analysis', 'book', NULL, NULL, NULL, NULL, NULL, NULL, 'This is all about analysis of security you have to see and solve some difficult question. am really happy to share it with it', '', 'Fayyad-Nassif-Introduction-numerical-Analysis.pdf', 'accepted', '2023-09-18 09:54:02', '2023-09-18 09:54:02');

-- --------------------------------------------------------

--
-- Table structure for table `Student`
--

CREATE TABLE `Student` (
  `Registration_ID` varchar(30) NOT NULL,
  `PersonalID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Student`
--

INSERT INTO `Student` (`Registration_ID`, `PersonalID`) VALUES
('T22-03-13063', 1),
('dawilly', 2),
('dawilly0', 3),
('dawilly12', 4),
('dawilly7098765', 5),
('dawilly67676', 8),
('dawillyy7', 9),
('dawilly6776767', 10),
('dawilly000', 11),
('dawilly2233', 12),
('dawilly6789', 13),
('dawilly67897', 15),
('dawillyl', 16),
('nimpha', 17),
('T22-03-1212', 18),
('T22-03-11577', 19),
('T22-02-03401', 20),
('tronics', 21),
('Elia', 22),
('T22-103-1212', 24),
('haroona', 25),
('Leonida', 26);

-- --------------------------------------------------------

--
-- Table structure for table `System_Admin`
--

CREATE TABLE `System_Admin` (
  `System_AdminID` int(11) NOT NULL,
  `PersonalID` int(11) NOT NULL,
  `admin_username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `System_Admin`
--

INSERT INTO `System_Admin` (`System_AdminID`, `PersonalID`, `admin_username`) VALUES
(1, 23, 'admin1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Comment`
--
ALTER TABLE `Comment`
  ADD PRIMARY KEY (`CommentID`),
  ADD KEY `PostID` (`PostID`),
  ADD KEY `PersonalID` (`PersonalID`);

--
-- Indexes for table `Personal_Details`
--
ALTER TABLE `Personal_Details`
  ADD PRIMARY KEY (`PersonalID`);

--
-- Indexes for table `Post`
--
ALTER TABLE `Post`
  ADD PRIMARY KEY (`PostID`),
  ADD KEY `PersonalID` (`PersonalID`);

--
-- Indexes for table `Student`
--
ALTER TABLE `Student`
  ADD PRIMARY KEY (`Registration_ID`),
  ADD KEY `PersonalID` (`PersonalID`);

--
-- Indexes for table `System_Admin`
--
ALTER TABLE `System_Admin`
  ADD PRIMARY KEY (`System_AdminID`),
  ADD KEY `PersonalID` (`PersonalID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Comment`
--
ALTER TABLE `Comment`
  MODIFY `CommentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `Personal_Details`
--
ALTER TABLE `Personal_Details`
  MODIFY `PersonalID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `Post`
--
ALTER TABLE `Post`
  MODIFY `PostID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Comment`
--
ALTER TABLE `Comment`
  ADD CONSTRAINT `Comment_ibfk_1` FOREIGN KEY (`PostID`) REFERENCES `Post` (`PostID`),
  ADD CONSTRAINT `Comment_ibfk_2` FOREIGN KEY (`PersonalID`) REFERENCES `Personal_Details` (`PersonalID`);

--
-- Constraints for table `Post`
--
ALTER TABLE `Post`
  ADD CONSTRAINT `Post_ibfk_1` FOREIGN KEY (`PersonalID`) REFERENCES `Personal_Details` (`PersonalID`);

--
-- Constraints for table `Student`
--
ALTER TABLE `Student`
  ADD CONSTRAINT `Student_ibfk_1` FOREIGN KEY (`PersonalID`) REFERENCES `Personal_Details` (`PersonalID`);

--
-- Constraints for table `System_Admin`
--
ALTER TABLE `System_Admin`
  ADD CONSTRAINT `System_Admin_ibfk_1` FOREIGN KEY (`PersonalID`) REFERENCES `Personal_Details` (`PersonalID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
