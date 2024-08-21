-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2024 at 12:10 AM
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
CREATE DATABASE IF NOT EXISTS `bibliomania` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bibliomania`;

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
('Q001', 'What is the main purpose of quantitative research?', 'To explore human behavior', 'To test hypotheses', 'To understand cultures', 'To develop theory', 2, 'T001', 1, 0),
('Q002', 'Which characteristic is NOT associated with quantitative research?', 'Emphasis on objectivity', 'Emphasis on replicability', 'Emphasis on context and depth', 'Use of statistical tools', 3, 'T001', 1, 0),
('Q003', 'What are the results of quantitative research typically presented as?', 'Themes and concepts', 'Narratives', 'Statistics, tables, and graphs', 'Case studies', 3, 'T001', 1, 1),
('Q004', 'What type of research aims to describe characteristics of a population?', 'Experimental Research', 'Descriptive Research', 'Correlational Research', 'Qualitative Research', 2, 'T001', 1, 0),
('Q005', 'Which quantitative research design examines the relationship between two or more variables without establishing cause and effect?', 'Experimental Research', 'Correlational Research', 'Descriptive Research', 'Qualitative Research', 2, 'T001', 0, 0),
('Q006', 'What differentiates experimental research from quasi-experimental research?', 'Random assignment', 'Sample size', 'Ethical considerations', 'Use of qualitative data', 1, 'T001', 0, 0),
('Q007', 'Which method is used to collect data from a large sample using structured questions?', 'Interviews', 'Focus Groups', 'Experiments', 'Surveys/Questionnaires', 4, 'T001', 0, 0),
('Q008', 'What is the primary method for conducting controlled tests to observe the effects of manipulated variables?', 'Observations', 'Case Studies', 'Experiments', 'Surveys', 3, 'T001', 0, 0),
('Q009', 'Which method involves systematically recording behavior or phenomena in a structured environment?', 'Interviews', 'Experiments', 'Observations', 'Focus Groups', 3, 'T001', 0, 0),
('Q010', 'What is secondary data analysis?', 'Collecting new data', 'Analyzing existing data', 'Conducting experiments', 'Interviewing participants', 2, 'T001', 0, 0),
('Q011', 'What is a key feature of descriptive research?', 'Establishing cause and effect', 'Manipulating variables', 'Describing characteristics of a population', 'Developing theory', 3, 'T001', 0, 0),
('Q012', 'Which research design would you use if you wanted to establish a cause-and-effect relationship?', 'Descriptive Research', 'Correlational Research', 'Qualitative Research', 'Experimental Research', 4, 'T001', 0, 0),
('Q013', 'How are the methods in quantitative research typically described?', 'Unstructured', 'Contextual', 'Structured and standardized', 'Subjective', 3, 'T001', 0, 0),
('Q014', 'What is a common output format for quantitative research findings?', 'Narratives', 'Case studies', 'Statistics, tables, and graphs', 'Themes', 3, 'T001', 0, 0),
('Q015', 'What is the focus of correlational research?', 'Establishing causality', 'Developing theory', 'Examining relationships between variables', 'Describing a population', 3, 'T001', 0, 0),
('Q016', 'What is the main focus of qualitative research?', 'Exploring and understanding the meaning', 'Testing hypotheses', 'Collecting numerical data', 'Establishing causality', 1, 'T002', 0, 0),
('Q017', 'Which characteristic is NOT associated with qualitative research?', 'Focus on objectivity', 'Emphasis on context and depth', 'Use of unstructured data', 'Rich narrative descriptions', 1, 'T002', 0, 0),
('Q018', 'What is the primary purpose of qualitative research?', 'To gain in-depth insights', 'To test hypotheses', 'To collect numerical data', 'To establish causality', 1, 'T002', 0, 0),
('Q019', 'Which research design involves an in-depth exploration of a single case or multiple cases over time?', 'Phenomenology', 'Grounded Theory', 'Case Study', 'Ethnography', 3, 'T002', 0, 0),
('Q020', 'What does ethnography focus on studying?', 'Cultural groups through observation', 'Psychological phenomena', 'Individual cases', 'Narrative analysis', 1, 'T002', 0, 0),
('Q021', 'Which research design is focused on understanding the lived experiences of individuals?', 'Grounded Theory', 'Phenomenology', 'Case Study', 'Ethnography', 2, 'T002', 0, 0),
('Q022', 'What is grounded theory?', 'Developing theory through data analysis', 'Exploring cultural groups', 'Describing a single case', 'Testing a hypothesis', 1, 'T002', 0, 0),
('Q023', 'Which data collection method is commonly used in qualitative research to gather detailed narrative data?', 'Experiments', 'Surveys', 'Interviews', 'Observation', 3, 'T002', 0, 0),
('Q024', 'What method involves facilitating group discussions to explore collective views and experiences?', 'Focus Groups', 'Surveys', 'Case Studies', 'Interviews', 1, 'T002', 0, 0),
('Q025', 'Which qualitative research method involves recording behaviors and interactions in their natural setting?', 'Experiments', 'Observations', 'Surveys', 'Interviews', 2, 'T002', 0, 0),
('Q026', 'What is the emphasis of qualitative research?', 'Context and depth', 'Objectivity', 'Statistical analysis', 'Hypothesis testing', 1, 'T002', 0, 0),
('Q027', 'Which research design is likely to be used for studying a cultural group?', 'Case Study', 'Phenomenology', 'Ethnography', 'Grounded Theory', 3, 'T002', 0, 0),
('Q028', 'What is the main feature of phenomenology?', 'Describing individual cases', 'Understanding lived experiences', 'Developing new theories', 'Testing hypotheses', 2, 'T002', 0, 0),
('Q029', 'Which method involves reviewing and interpreting existing documents?', 'Document Analysis', 'Interviews', 'Observations', 'Experiments', 1, 'T002', 0, 0),
('Q030', 'How is data typically represented in qualitative research?', 'Numerical data', 'Statistical graphs', 'Non-numerical and rich in detail', 'Hypothesis testing', 3, 'T002', 0, 0),
('Q031', 'What is the primary purpose of surveys?', 'To gather narrative data', 'To gather quantitative or qualitative data', 'To develop theories', 'To observe behaviors', 2, 'T003', 0, 0),
('Q032', 'What type of question provides specific answer choices?', 'Open-Ended Questions', 'Multiple-Choice Questions', 'Closed-Ended Questions', 'Descriptive Questions', 3, 'T003', 0, 0),
('Q033', 'Which question type allows respondents to answer in their own words?', 'Closed-Ended Questions', 'Open-Ended Questions', 'Multiple-Choice Questions', 'Yes/No Questions', 2, 'T003', 0, 0),
('Q034', 'Why is question clarity important in surveys?', 'To avoid confusion', 'To gather more data', 'To make the survey longer', 'To increase cost', 1, 'T003', 0, 0),
('Q035', 'What is the purpose of pretesting a questionnaire?', 'To gather more data', 'To identify and correct any issues', 'To increase participation', 'To reduce cost', 2, 'T003', 0, 0),
('Q036', 'Which mode of survey administration is most efficient for reaching large audiences quickly?', 'Mail Surveys', 'Telephone Surveys', 'Face-to-Face Surveys', 'Online Surveys', 4, 'T003', 0, 0),
('Q037', 'Which survey mode allows for in-depth interaction and clarification?', 'Mail Surveys', 'Telephone Surveys', 'Face-to-Face Surveys', 'Online Surveys', 3, 'T003', 0, 0),
('Q038', 'What is a potential drawback of mail surveys?', 'High cost', 'Low response rates', 'Time-consuming', 'Limited interaction', 2, 'T003', 0, 0),
('Q039', 'Why is logical flow important in a questionnaire?', 'To gather more data', 'To avoid confusion', 'To organize questions in a logical sequence', 'To increase cost', 3, 'T003', 0, 0),
('Q040', 'What is one application of surveys in research?', 'Conducting experiments', 'Developing theories', 'Gathering data for social sciences', 'Performing case studies', 3, 'T003', 0, 0),
('Q041', 'What technique should be used to ensure a representative sample in a survey?', 'Convenience sampling', 'Random sampling', 'Purposive sampling', 'Snowball sampling', 2, 'T003', 0, 0),
('Q042', 'What is the key benefit of closed-ended questions?', 'They allow for in-depth responses', 'They provide specific answer choices', 'They are difficult to analyze', 'They increase response time', 2, 'T003', 0, 0),
('Q043', 'Which survey method might be more costly but is useful for respondents without internet access?', 'Telephone Surveys', 'Mail Surveys', 'Face-to-Face Surveys', 'Online Surveys', 1, 'T003', 0, 0),
('Q044', 'What is an advantage of face-to-face surveys?', 'They are cheaper', 'They allow for in-depth interaction', 'They are quicker to administer', 'They have higher response rates', 2, 'T003', 0, 0),
('Q045', 'What type of question is likely to gather richer detail?', 'Closed-Ended Questions', 'Multiple-Choice Questions', 'Yes/No Questions', 'Open-Ended Questions', 4, 'T003', 0, 0),
('Q046', 'What is the main purpose of quantitative research?', 'To explore human behavior', 'To test hypotheses', 'To understand cultures', 'To develop theory', 2, 'T004', 0, 0),
('Q047', 'Which research design examines cause and effect relationships by manipulating variables?', 'Correlational Research', 'Experimental Research', 'Descriptive Research', 'Qualitative Research', 2, 'T004', 0, 0),
('Q048', 'What type of research design is used in qualitative studies to develop theory?', 'Case Study', 'Ethnography', 'Phenomenology', 'Grounded Theory', 4, 'T004', 0, 0),
('Q049', 'What method is commonly used in quantitative research to collect large amounts of data?', 'Interviews', 'Focus Groups', 'Experiments', 'Surveys/Questionnaires', 4, 'T004', 0, 0),
('Q050', 'Which data collection method is shared between quantitative and qualitative research?', 'Observation', 'Interviews', 'Focus Groups', 'Surveys', 1, 'T004', 0, 0),
('Q051', 'What is the focus of phenomenology in qualitative research?', 'Developing theory', 'Understanding lived experiences', 'Describing cultural groups', 'Testing hypotheses', 2, 'T004', 0, 0),
('Q052', 'What is one characteristic of quantitative research?', 'Structured methods', 'Focus on context', 'Use of narrative data', 'Unstructured interviews', 1, 'T004', 0, 0),
('Q053', 'Which type of research would you use to gain in-depth insights into participants behaviors?', 'Experimental Research', 'Descriptive Research', 'Correlational Research', 'Qualitative Research', 4, 'T004', 0, 0),
('Q054', 'Why is pretesting important when designing a questionnaire?', 'To increase participation', 'To identify and correct issues', 'To gather more data', 'To reduce cost', 2, 'T004', 0, 0),
('Q055', 'What does secondary data analysis involve?', 'Collecting new data', 'Analyzing existing data', 'Conducting experiments', 'Interviewing participants', 2, 'T004', 0, 0),
('Q056', 'What is the purpose of using random sampling in surveys?', 'To ensure a representative sample', 'To gather more data', 'To reduce cost', 'To increase response rate', 1, 'T004', 0, 0),
('Q057', 'Which qualitative research method involves detailed study through participant observation?', 'Case Study', 'Phenomenology', 'Ethnography', 'Grounded Theory', 3, 'T004', 0, 0),
('Q058', 'Which research method would be used to describe characteristics of a population?', 'Correlational Research', 'Experimental Research', 'Descriptive Research', 'Qualitative Research', 3, 'T004', 0, 0),
('Q059', 'Which survey mode is likely to have low response rates but provides a physical option?', 'Telephone Surveys', 'Mail Surveys', 'Face-to-Face Surveys', 'Online Surveys', 2, 'T004', 0, 0),
('Q060', 'What is a common use of qualitative research?', 'Exploring complex social problems', 'Testing hypotheses', 'Collecting numerical data', 'Analyzing statistical data', 1, 'T004', 0, 0),
('Q061', 'Which method of administering surveys is cost-effective and quick?', 'Telephone Surveys', 'Mail Surveys', 'Face-to-Face Surveys', 'Online Surveys', 4, 'T004', 0, 0),
('Q062', 'What is the main ingredient in guacamole according to the quantitative research slides?', 'This is a sample placeholder question', 'The answer should be based on actual survey data', '', '', 1, 'T004', 0, 0),
('Q063', 'Which research design lacks random assignment but still examines cause and effect?', 'Correlational Research', 'Quasi-Experimental Research', 'Descriptive Research', 'Qualitative Research', 2, 'T004', 0, 0),
('Q064', 'Which type of question allows for rich, detailed responses in surveys?', 'Closed-Ended Questions', 'Multiple-Choice Questions', 'Yes/No Questions', 'Open-Ended Questions', 4, 'T004', 0, 0),
('Q065', 'What is the emphasis in qualitative research that differentiates it from quantitative research?', 'Emphasis on objectivity', 'Use of statistical tools', 'Emphasis on context and depth', 'Focus on replicability', 3, 'T004', 0, 0);

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
  `topic_3` int(5) NOT NULL,
  `topic_4` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `scores`
--

INSERT INTO `scores` (`score_id`, `student_id`, `guest_id`, `topic_1`, `topic_2`, `topic_3`, `topic_4`) VALUES
('', 'S004', NULL, 0, 0, 0, 0),
('SC001', 'S001', NULL, 0, 0, 0, 0),
('SC002', 'S002', NULL, 0, 0, 0, 0),
('SC003', 'S003', NULL, 0, 0, 0, 0),
('SC004', NULL, 'G001', 85, 0, 0, 0),
('SC005', NULL, 'G002', 75, 0, 0, 0);

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
('S005', 'Tarun', 'tarun', '1999-01-01', 'tarunkrishnan@mail.com'),
('S006', 'tarun', 'tarnu', '1999-01-01', 'tarun@mail.com'),
('S007', 'tarun', 'tarun', '1999-01-01', 'tarun@email.com');

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
('T001', 'Topic 1'),
('T002', 'Topic 2'),
('T003', 'Topic 3');

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
(59, 'S004', NULL, 'SL003_2'),
(60, 'S001', NULL, 'SL003_3'),
(61, 'S001', NULL, 'SL003_1'),
(62, 'S001', NULL, 'SL003_2'),
(63, 'S005', NULL, 'SL001_2'),
(64, 'S005', NULL, 'SL001_1'),
(65, 'S005', NULL, 'SL001_3'),
(66, 'S005', NULL, 'SL002_2'),
(67, 'S005', NULL, 'SL002_3'),
(68, 'S005', NULL, 'SL002_1'),
(69, 'S005', NULL, 'SL003_1'),
(70, 'S005', NULL, 'SL003_2'),
(71, 'S005', NULL, 'SL003_3'),
(72, 'S006', NULL, 'SL001_2'),
(73, 'S006', NULL, 'SL001_1'),
(74, 'S006', NULL, 'SL001_3'),
(75, 'S006', NULL, 'SL002_2'),
(76, 'S006', NULL, 'SL002_3'),
(77, 'S006', NULL, 'SL002_1'),
(78, 'S006', NULL, 'SL003_3'),
(79, 'S006', NULL, 'SL003_1'),
(80, 'S006', NULL, 'SL003_2'),
(81, 'S007', NULL, 'SL001_2'),
(82, 'S007', NULL, 'SL001_1'),
(83, 'S007', NULL, 'SL001_3'),
(84, 'S007', NULL, 'SL002_2'),
(85, 'S007', NULL, 'SL002_3'),
(86, 'S007', NULL, 'SL002_1'),
(87, 'S007', NULL, 'SL003_3'),
(88, 'S007', NULL, 'SL003_1'),
(89, 'S007', NULL, 'SL003_2'),
(162, 'S007', NULL, 'SL004_1'),
(163, 'S007', NULL, 'SL004_2'),
(164, 'S007', NULL, 'SL004_3'),
(165, 'S007', NULL, 'SL005_1'),
(166, 'S007', NULL, 'SL005_2'),
(167, 'S007', NULL, 'SL005_3'),
(168, 'S007', NULL, 'SL006_1'),
(169, 'S007', NULL, 'SL006_2'),
(170, 'S007', NULL, 'SL006_3');

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
  MODIFY `unlock_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;

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
