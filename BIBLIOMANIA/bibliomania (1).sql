-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2024 at 06:23 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bibliomania`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` varchar(25) NOT NULL,
  `name` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `password`) VALUES
('001', 'abc', '123'),
('A001', 'Admin1', 'adminpass1'),
('A002', 'Admin2', 'adminpass2'),
('A003', 'Admin3', 'adminpass3');

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `content_id` varchar(10) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`content_id`, `content`) VALUES
('SL001_1', 'HIIIII, Nama Syaa upin'),
('SL001_2', 'Dan nama saya ipin'),
('SL001_3', 'Content for Topic 1 Slide 1'),
('SL002_1', 'Content for Topic 1 Slide 2'),
('SL002_2', 'Content for Topic 1 Slide 2'),
('SL002_3', 'Content for Topic 1 Slide 2'),
('SL003_1', 'Content for Topic 1 Slide 3'),
('SL003_2', 'Content for Topic 1 Slide 3'),
('SL003_3', 'Content for Topic 1 Slide 3'),
('SL004_1', 'Content for Topic 2 Slide 1'),
('SL004_2', 'Content for Topic 2 Slide 1'),
('SL004_3', 'Content for Topic 2 Slide 1'),
('SL005_1', 'Content for Topic 2 Slide 2'),
('SL005_2', 'Content for Topic 2 Slide 2'),
('SL005_3', 'Content for Topic 2 Slide 2'),
('SL006_1', 'Content for Topic 2 Slide 3'),
('SL006_2', 'Content for Topic 2 Slide 3'),
('SL006_3', 'Content for Topic 2 Slide 3'),
('SL007_1', 'Content for Topic 3 Slide 1'),
('SL007_2', 'Content for Topic 3 Slide 1'),
('SL007_3', 'Content for Topic 3 Slide 1'),
('SL008_1', 'Content for Topic 3 Slide 2'),
('SL008_2', 'Content for Topic 3 Slide 2'),
('SL008_3', 'Content for Topic 3 Slide 2'),
('SL009_1', 'Content for Topic 3 Slide 3'),
('SL009_2', 'Content for Topic 3 Slide 3'),
('SL009_3', 'Content for Topic 3 Slide 3');

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE `guest` (
  `guest_id` varchar(4) NOT NULL,
  `name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guest`
--

INSERT INTO `guest` (`guest_id`, `name`) VALUES
('G001', 'Guest1'),
('G002', 'Guest2'),
('G003', 'Guest3');

-- --------------------------------------------------------

--
-- Stand-in structure for view `leaderboard`
-- (See below for the actual view)
--
CREATE TABLE `leaderboard` (
);

-- --------------------------------------------------------

--
-- Table structure for table `moderator`
--

CREATE TABLE `moderator` (
  `moderator_id` varchar(25) NOT NULL,
  `name` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `date_of_birth` date NOT NULL,
  `email` varchar(25) NOT NULL,
  `admin_id` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `moderator`
--

INSERT INTO `moderator` (`moderator_id`, `name`, `password`, `date_of_birth`, `email`, `admin_id`) VALUES
('M001', 'Mod1', 'modpass1', '1998-01-01', 'mod1@example.com', 'A001'),
('M002', 'Javanna', 'javanaunana', '1998-03-03', 'javana@gmail.com', 'A002');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `question_id` varchar(25) NOT NULL,
  `question` text NOT NULL,
  `option_1` text NOT NULL,
  `option_2` text NOT NULL,
  `option_3` text NOT NULL,
  `option_4` text NOT NULL,
  `correct_answer` int(2) NOT NULL,
  `topic_id` varchar(25) DEFAULT NULL,
  `total_attempts` int(4) NOT NULL,
  `correct_attempts` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question_id`, `question`, `option_1`, `option_2`, `option_3`, `option_4`, `correct_answer`, `topic_id`, `total_attempts`, `correct_attempts`) VALUES
('Q001', 'What is 2+2?', '3', '4', '5', '6', 2, 'T001', 0, 0),
('Q002', 'What is the capital of France?', 'London', 'Berlin', 'Madrid', 'Paris', 4, 'T001', 0, 0),
('Q003', 'Who wrote Romeo and Juliet?', 'Charles Dickens', 'William Shakespeare', 'Jane Austen', 'Mark Twain', 2, 'T001', 0, 0),
('Q004', 'What is the powerhouse of the cell?', 'Nucleus', 'Mitochondria', 'Ribosome', 'Chloroplast', 2, 'T001', 0, 0),
('Q005', 'Which planet is known as the Red Planet?', 'Venus', 'Mars', 'Jupiter', 'Saturn', 2, 'T001', 0, 0),
('Q006', 'What is the largest mammal?', 'Elephant', 'Blue Whale', 'Giraffe', 'Hippopotamus', 2, 'T001', 0, 0),
('Q007', 'Who painted the Mona Lisa?', 'Vincent van Gogh', 'Leonardo da Vinci', 'Pablo Picasso', 'Michelangelo', 2, 'T001', 0, 0),
('Q008', 'Which country is famous for kangaroos?', 'Brazil', 'Australia', 'Canada', 'India', 2, 'T001', 0, 0),
('Q009', 'What is the currency of Japan?', 'Yuan', 'Dollar', 'Euro', 'Yen', 4, 'T001', 0, 0),
('Q010', 'What is the tallest mountain in the world?', 'Mount Kilimanjaro', 'Mount Everest', 'K2', 'Matterhorn', 2, 'T001', 0, 0),
('Q011', 'Who wrote the Harry Potter series?', 'J.R.R. Tolkien', 'J.K. Rowling', 'C.S. Lewis', 'Stephen King', 2, 'T001', 0, 0),
('Q012', 'What is the largest ocean on Earth?', 'Atlantic Ocean', 'Indian Ocean', 'Arctic Ocean', 'Pacific Ocean', 4, 'T001', 0, 0),
('Q013', 'What is the main ingredient in guacamole?', 'Tomato', 'Onion', 'Avocado', 'Lemon', 3, 'T001', 0, 0),
('Q014', 'Which animal is known as the \"Ship of the Desert\"?', 'Camel', 'Horse', 'Elephant', 'Giraffe', 1, 'T001', 0, 0),
('Q015', 'Who is known as the \"Father of Computers\"?', 'Bill Gates', 'Alan Turing', 'Steve Jobs', 'Charles Babbage', 4, 'T001', 0, 0),
('Q016', 'What is the chemical symbol for gold?', 'Au', 'Ag', 'Cu', 'Fe', 1, 'T002', 0, 0),
('Q017', 'Which planet is known as the \"Morning Star\"?', 'Mars', 'Venus', 'Mercury', 'Jupiter', 2, 'T002', 0, 0),
('Q018', 'Who painted the Sistine Chapel ceiling?', 'Raphael', 'Michelangelo', 'Leonardo da Vinci', 'Donatello', 2, 'T002', 0, 0),
('Q019', 'What is the largest desert in the world?', 'Sahara Desert', 'Arabian Desert', 'Gobi Desert', 'Kalahari Desert', 1, 'T002', 0, 0),
('Q020', 'Which country is known as the \"Land of the Rising Sun\"?', 'China', 'India', 'Japan', 'South Korea', 3, 'T002', 0, 0),
('Q021', 'Who is the author of \"To Kill a Mockingbird\"?', 'Harper Lee', 'John Steinbeck', 'F. Scott Fitzgerald', 'Ernest Hemingway', 1, 'T002', 0, 0),
('Q022', 'What is the largest planet in our solar system?', 'Mars', 'Venus', 'Jupiter', 'Saturn', 3, 'T002', 0, 0),
('Q023', 'Which city is known as the \"City of Love\"?', 'Venice', 'Paris', 'Rome', 'Barcelona', 2, 'T002', 0, 0),
('Q024', 'Who is the Greek god of the sea?', 'Zeus', 'Hades', 'Poseidon', 'Apollo', 3, 'T002', 0, 0),
('Q025', 'What is the largest bird in the world?', 'Ostrich', 'Eagle', 'Albatross', 'Condor', 1, 'T002', 0, 0),
('Q026', 'Which country is known as the \"Land of a Thousand Lakes\"?', 'Sweden', 'Finland', 'Norway', 'Denmark', 2, 'T002', 0, 0),
('Q027', 'Who is the lead singer of the band Queen?', 'Freddie Mercury', 'David Bowie', 'Elton John', 'Mick Jagger', 1, 'T002', 0, 0),
('Q028', 'What is the largest rainforest in the world?', 'Congo Rainforest', 'Amazon Rainforest', 'Daintree Rainforest', 'Taiga', 2, 'T002', 0, 0),
('Q029', 'Which country is known as the \"Land of Fire and Ice\"?', 'Greenland', 'Iceland', 'Norway', 'New Zealand', 2, 'T002', 0, 0),
('Q030', 'Who is the first woman to win a Nobel Prize?', 'Marie Curie', 'Rosalind Franklin', 'Dorothy Hodgkin', 'Barbara McClintock', 1, 'T002', 0, 0),
('Q031', 'What is the smallest planet in our solar system?', 'Venus', 'Mercury', 'Mars', 'Earth', 2, 'T003', 0, 0),
('Q032', 'Who wrote \"Pride and Prejudice\"?', 'Jane Austen', 'Charlotte Bronte', 'Emily Dickinson', 'Virginia Woolf', 1, 'T003', 0, 0),
('Q033', 'What is the largest mammal on Earth?', 'Elephant', 'Blue Whale', 'Giraffe', 'Hippopotamus', 2, 'T003', 0, 0),
('Q034', 'Which country is known as the \"Land of the Rising Sun\"?', 'China', 'India', 'Japan', 'South Korea', 3, 'T003', 0, 0),
('Q035', 'Who painted the \"Starry Night\"?', 'Vincent van Gogh', 'Leonardo da Vinci', 'Pablo Picasso', 'Claude Monet', 1, 'T003', 0, 0),
('Q036', 'What is the largest ocean on Earth?', 'Atlantic Ocean', 'Indian Ocean', 'Arctic Ocean', 'Pacific Ocean', 4, 'T003', 0, 0),
('Q037', 'What is the main ingredient in sushi?', 'Rice', 'Seaweed', 'Fish', 'Soy Sauce', 1, 'T003', 0, 0),
('Q038', 'Which animal is known as the \"King of the Jungle\"?', 'Lion', 'Tiger', 'Leopard', 'Cheetah', 1, 'T003', 0, 0),
('Q039', 'Who is known as the \"Queen of Pop\"?', 'Madonna', 'Beyonce', 'Taylor Swift', 'Rihanna', 1, 'T003', 0, 0),
('Q040', 'What is the currency of the United Kingdom?', 'Dollar', 'Euro', 'Pound', 'Yen', 3, 'T003', 0, 0),
('Q041', 'What is the tallest mountain in Africa?', 'Mount Kilimanjaro', 'Mount Everest', 'K2', 'Matterhorn', 1, 'T003', 0, 0),
('Q042', 'Who is the author of \"1984\"?', 'George Orwell', 'Aldous Huxley', 'Ray Bradbury', 'J.R.R. Tolkien', 1, 'T003', 0, 0),
('Q043', 'What is the largest river in the world?', 'Nile River', 'Amazon River', 'Yangtze River', 'Mississippi River', 2, 'T003', 0, 0),
('Q044', 'Which country is known as the \"Land of the Midnight Sun\"?', 'Sweden', 'Finland', 'Norway', 'Denmark', 3, 'T003', 0, 0),
('Q045', 'Who is the lead guitarist of the band Led Zeppelin?', 'Jimmy Page', 'Eric Clapton', 'Jimi Hendrix', 'Keith Richards', 1, 'T003', 0, 0),
('Q046', 'What is the largest continent on Earth?', 'Africa', 'Asia', 'Europe', 'North America', 2, NULL, 0, 0),
('Q047', 'Who is the author of \"The Great Gatsby\"?', 'F. Scott Fitzgerald', 'Ernest Hemingway', 'John Steinbeck', 'Harper Lee', 1, NULL, 0, 0),
('Q048', 'What is the capital of Australia?', 'Sydney', 'Melbourne', 'Canberra', 'Perth', 3, NULL, 0, 0),
('Q049', 'Who painted the \"Mona Lisa\"?', 'Vincent van Gogh', 'Leonardo da Vinci', 'Pablo Picasso', 'Michelangelo', 2, NULL, 0, 0),
('Q050', 'What is the largest desert in Asia?', 'Gobi Desert', 'Arabian Desert', 'Kalahari Desert', 'Sahara Desert', 1, NULL, 0, 0),
('Q051', 'Which country is known as the \"Land of a Thousand Islands\"?', 'Philippines', 'Indonesia', 'Maldives', 'Sri Lanka', 2, NULL, 0, 0),
('Q052', 'Who is the Greek goddess of wisdom?', 'Athena', 'Aphrodite', 'Hera', 'Artemis', 1, NULL, 0, 0),
('Q053', 'What is the largest carnivorous marsupial?', 'Kangaroo', 'Koala', 'Tasmanian Devil', 'Wombat', 3, NULL, 0, 0),
('Q054', 'Which city is known as the \"Eternal City\"?', 'Venice', 'Paris', 'Rome', 'Athens', 3, NULL, 0, 0),
('Q055', 'Who is the Norse god of thunder?', 'Odin', 'Thor', 'Loki', 'Freyja', 2, NULL, 0, 0),
('Q056', 'What is the largest freshwater lake by volume?', 'Lake Superior', 'Lake Baikal', 'Lake Victoria', 'Great Bear Lake', 2, NULL, 0, 0),
('Q057', 'Which country is known as the \"Land of the Long White Cloud\"?', 'Canada', 'Norway', 'New Zealand', 'Iceland', 3, NULL, 0, 0),
('Q058', 'Who is the lead vocalist of the band U2?', 'Bono', 'The Edge', 'Adam Clayton', 'Larry Mullen Jr.', 1, NULL, 0, 0),
('Q059', 'What is the largest hot desert in the world?', 'Sahara Desert', 'Arabian Desert', 'Gobi Desert', 'Kalahari Desert', 1, NULL, 0, 0),
('Q060', 'Which country is known as the \"Land of the Rising Sun\"?', 'China', 'India', 'Japan', 'South Korea', 3, NULL, 0, 0),
('Q061', 'Who wrote \"The Catcher in the Rye\"?', 'J.D. Salinger', 'Ernest Hemingway', 'F. Scott Fitzgerald', 'Mark Twain', 1, NULL, 0, 0),
('Q062', 'Who wrote \"The Catcher in the Rye\"?', 'J.D. Salinger', 'Ernest Hemingway', 'F. Scott Fitzgerald', 'Mark Twain', 1, NULL, 0, 0),
('Q063', 'Who wrote \"The Catcher in the Rye\"?', 'J.D. Salinger', 'Ernest Hemingway', 'F. Scott Fitzgerald', 'Mark Twain', 1, NULL, 0, 0),
('Q064', 'Who wrote \"The Catcher in the Rye\"?', 'J.D. Salinger', 'Ernest Hemingway', 'F. Scott Fitzgerald', 'Mark Twain', 1, NULL, 0, 0),
('Q065', 'Who wrote \"The Catcher in the Rye\"?', 'J.D. Salinger', 'Ernest Hemingway', 'F. Scott Fitzgerald', 'Mark Twain', 1, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `scores`
--

CREATE TABLE `scores` (
  `score_id` varchar(25) NOT NULL,
  `student_id` varchar(25) DEFAULT NULL,
  `guest_id` varchar(25) DEFAULT NULL,
  `topic_1` int(6) DEFAULT NULL,
  `topic_2` int(5) NOT NULL,
  `topic_3` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `scores`
--

INSERT INTO `scores` (`score_id`, `student_id`, `guest_id`, `topic_1`, `topic_2`, `topic_3`) VALUES
('SC001', 'S001', NULL, 0, 0, 0),
('SC002', 'S002', NULL, 0, 0, 0),
('SC003', 'S003', NULL, 0, 0, 0),
('SC004', NULL, 'G001', 85, 0, 0),
('SC005', NULL, 'G002', 75, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE `slides` (
  `slides_id` varchar(25) NOT NULL,
  `topic_id` varchar(25) NOT NULL,
  `content_1` varchar(10) NOT NULL,
  `content_2` varchar(10) NOT NULL,
  `content_3` varchar(10) NOT NULL,
  `moderator_id` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`slides_id`, `topic_id`, `content_1`, `content_2`, `content_3`, `moderator_id`) VALUES
('SL001', 'T001', 'SL001_1', 'SL001_2', 'SL001_3', 'M001'),
('SL002', 'T001', 'SL002_1', 'SL002_2', 'SL002_3', 'M001'),
('SL003', 'T001', 'SL003_1', 'SL003_2', 'SL003_3', 'M001'),
('SL004', 'T002', 'SL004_1', 'SL004_2', 'SL004_3', 'M001'),
('SL005', 'T002', 'SL005_1', 'SL005_2', 'SL005_3', 'M001'),
('SL006', 'T002', 'SL006_1', 'SL006_2', 'SL006_3', 'M001'),
('SL007', 'T003', 'SL007_1', 'SL007_2', 'SL007_3', 'M001'),
('SL008', 'T003', 'SL008_1', 'SL008_2', 'SL008_3', 'M001'),
('SL009', 'T003', 'SL009_1', 'SL009_2', 'SL009_3', 'M001');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` varchar(25) NOT NULL,
  `name` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `date_of_birth` date NOT NULL,
  `email` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `name`, `password`, `date_of_birth`, `email`) VALUES
('S001', 'Alice Johnson', 'password1', '2001-01-01', 'alice.johnson@example.com'),
('S002', 'Bob Smith', 'password2', '1998-03-02', 'bob.smith@example.com'),
('S003', 'Carol White', 'password3', '2001-02-01', 'carol.white@example.com'),
('S004', 'Tarun', 'tarun', '1999-01-01', 'tarunkrishnan@gmail.com'),
('S005', 'Tarun', 'tarun', '1999-01-01', 'tarunkrishnan@mail.com');

-- --------------------------------------------------------

--
-- Table structure for table `topic`
--

CREATE TABLE `topic` (
  `topic_id` varchar(25) NOT NULL,
  `topic_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `topic`
--

INSERT INTO `topic` (`topic_id`, `topic_name`) VALUES
('T001', 'Mathematics'),
('T002', 'Science'),
('T003', 'History');

-- --------------------------------------------------------

--
-- Table structure for table `unlocks`
--

CREATE TABLE `unlocks` (
  `unlock_id` int(25) NOT NULL,
  `student_id` varchar(25) DEFAULT NULL,
  `guest_id` varchar(25) DEFAULT NULL,
  `content_id` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `unlocks`
--

INSERT INTO `unlocks` (`unlock_id`, `student_id`, `guest_id`, `content_id`) VALUES
(47, 'S004', NULL, 'SL001_2'),
(48, 'S004', NULL, 'SL001_1'),
(49, 'S004', NULL, 'SL002_2'),
(50, NULL, 'G001', 'SL002_3'),
(51, 'S004', NULL, 'SL002_1'),
(55, 'S004', NULL, 'SL001_3'),
(56, 'S004', NULL, 'SL002_3'),
(57, 'S004', NULL, 'SL003_1'),
(58, 'S004', NULL, 'SL003_3'),
(59, 'S004', NULL, 'SL003_2');

-- --------------------------------------------------------

--
-- Structure for view `leaderboard`
--
DROP TABLE IF EXISTS `leaderboard`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `leaderboard`  AS SELECT coalesce(`student`.`name`,`guest`.`name`) AS `name`, `scores`.`current_score` AS `score`, `quiz_times`.`time` AS `time` FROM (((`scores` left join `student` on(`scores`.`student_id` = `student`.`student_id`)) left join `guest` on(`scores`.`guest_id` = `guest`.`guest_id`)) left join `quiz_times` on(`quiz_times`.`student_id` = `student`.`student_id` or `quiz_times`.`guest_id` = `guest`.`guest_id`)) ORDER BY `scores`.`current_score` DESC, `quiz_times`.`time` ASC ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`content_id`);

--
-- Indexes for table `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`guest_id`);

--
-- Indexes for table `moderator`
--
ALTER TABLE `moderator`
  ADD PRIMARY KEY (`moderator_id`),
  ADD KEY `fk_admin_id` (`admin_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`question_id`),
  ADD KEY `fk_topic_id` (`topic_id`);

--
-- Indexes for table `scores`
--
ALTER TABLE `scores`
  ADD PRIMARY KEY (`score_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `fk_to_guest_id` (`guest_id`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`slides_id`),
  ADD KEY `fk_slides_topic_id` (`topic_id`),
  ADD KEY `fk_content1` (`content_1`),
  ADD KEY `fk_content2` (`content_2`),
  ADD KEY `fk_content3` (`content_3`),
  ADD KEY `mod_fk` (`moderator_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`topic_id`);

--
-- Indexes for table `unlocks`
--
ALTER TABLE `unlocks`
  ADD PRIMARY KEY (`unlock_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `guest_id` (`guest_id`),
  ADD KEY `content_id` (`content_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `unlocks`
--
ALTER TABLE `unlocks`
  MODIFY `unlock_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `moderator`
--
ALTER TABLE `moderator`
  ADD CONSTRAINT `fk_admin_id` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`);

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `fk_topic_id` FOREIGN KEY (`topic_id`) REFERENCES `topic` (`topic_id`);

--
-- Constraints for table `scores`
--
ALTER TABLE `scores`
  ADD CONSTRAINT `fk_to_guest_id` FOREIGN KEY (`guest_id`) REFERENCES `guest` (`guest_id`),
  ADD CONSTRAINT `scores_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`);

--
-- Constraints for table `slides`
--
ALTER TABLE `slides`
  ADD CONSTRAINT `fk_content1` FOREIGN KEY (`content_1`) REFERENCES `content` (`content_id`),
  ADD CONSTRAINT `fk_content2` FOREIGN KEY (`content_2`) REFERENCES `content` (`content_id`),
  ADD CONSTRAINT `fk_content3` FOREIGN KEY (`content_3`) REFERENCES `content` (`content_id`),
  ADD CONSTRAINT `fk_slides_topic_id` FOREIGN KEY (`topic_id`) REFERENCES `topic` (`topic_id`),
  ADD CONSTRAINT `mod_fk` FOREIGN KEY (`moderator_id`) REFERENCES `moderator` (`moderator_id`);

--
-- Constraints for table `unlocks`
--
ALTER TABLE `unlocks`
  ADD CONSTRAINT `unlocks_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`),
  ADD CONSTRAINT `unlocks_ibfk_2` FOREIGN KEY (`guest_id`) REFERENCES `guest` (`guest_id`),
  ADD CONSTRAINT `unlocks_ibfk_3` FOREIGN KEY (`content_id`) REFERENCES `content` (`content_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
