-- phpMyAdmin SQL Dump
-- version 4.0.6deb1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Час створення: Квт 28 2014 р., 21:54
-- Версія сервера: 5.5.35-0ubuntu0.13.10.2
-- Версія PHP: 5.5.3-1ubuntu2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База даних: `khpk`
--

-- --------------------------------------------------------

--
-- Структура таблиці `actual_class`
--

CREATE TABLE IF NOT EXISTS `actual_class` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Код',
  `date` date NOT NULL COMMENT 'Дата',
  `class_number` int(11) NOT NULL COMMENT 'Номер пари',
  `teacher_load_id` int(11) NOT NULL COMMENT 'Предмет в навантаженні викладача',
  `class_type` int(11) NOT NULL COMMENT 'Тип заняття',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Структура таблиці `audience`
--

CREATE TABLE IF NOT EXISTS `audience` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Код',
  `number` varchar(5) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Номер аудиторії',
  `type` int(11) NOT NULL COMMENT 'Тип аудиторії',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=73 ;

-- --------------------------------------------------------

--
-- Структура таблиці `class_absence`
--

CREATE TABLE IF NOT EXISTS `class_absence` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Код',
  `actual_class_id` int(11) NOT NULL COMMENT 'Пара',
  `student_id` int(11) NOT NULL COMMENT 'Студент',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Структура таблиці `class_mark`
--

CREATE TABLE IF NOT EXISTS `class_mark` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Код',
  `actual_class_id` int(11) NOT NULL COMMENT 'Пара',
  `mark` int(11) NOT NULL COMMENT 'Оцінка',
  `student_id` int(11) NOT NULL COMMENT 'Студент',
  `type` enum('simple','attestation','attestation_second_try','test','exam','exam_second_try','course_work','course_project') COLLATE utf8_unicode_ci NOT NULL COMMENT 'Тип оцінки',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Структура таблиці `cyclic_commission`
--

CREATE TABLE IF NOT EXISTS `cyclic_commission` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Код',
  `title` varchar(40) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Назва циклової комісії',
  `head_id` int(11) NOT NULL COMMENT 'Голова циклової комісії',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

-- --------------------------------------------------------

--
-- Структура таблиці `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Код',
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Назва відділення',
  `head_id` int(11) NOT NULL COMMENT 'Зав.відділення',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Структура таблиці `exemption`
--

CREATE TABLE IF NOT EXISTS `exemption` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Структура таблиці `group`
--

CREATE TABLE IF NOT EXISTS `group` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Код',
  `title` varchar(8) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Назва групи',
  `speciality_id` int(11) NOT NULL COMMENT 'Код спеціальності',
  `curator_id` int(11) NOT NULL COMMENT 'Куратор',
  `monitor_id` int(11) NOT NULL COMMENT 'Староста',
  PRIMARY KEY (`id`),
  UNIQUE KEY `title` (`title`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=46 ;

-- --------------------------------------------------------

--
-- Структура таблиці `schedule`
--

CREATE TABLE IF NOT EXISTS `schedule` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Код',
  ` week_type` tinyint(1) NOT NULL COMMENT 'Чисельник/Знаменник',
  `class_number` int(11) NOT NULL COMMENT 'Номер пари',
  `study_plan_semester_id` int(11) NOT NULL COMMENT 'Предмет',
  `audience_id` int(11) NOT NULL COMMENT 'Аудиторія',
  `group_id` int(11) NOT NULL COMMENT 'Група',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблиці `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Структура таблиці `speciality`
--

CREATE TABLE IF NOT EXISTS `speciality` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Код',
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Назва спеціальності',
  `department_id` int(11) NOT NULL COMMENT 'Код відділення',
  `number` varchar(15) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Номер спеціальності',
  `accreditation_date` date NOT NULL COMMENT 'Дата останньої акредитації',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

-- --------------------------------------------------------

--
-- Структура таблиці `sp_graphic`
--

CREATE TABLE IF NOT EXISTS `sp_graphic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plan_id` int(11) NOT NULL,
  `course` int(11) NOT NULL,
  `week` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `graphicOnPlan` (`plan_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблиці `sp_hours`
--

CREATE TABLE IF NOT EXISTS `sp_hours` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Код',
  `sp_subject_id` int(11) NOT NULL COMMENT 'Предмет у навчальному плані',
  `lectures` int(11) NOT NULL COMMENT 'Лекції',
  `labs` int(11) NOT NULL COMMENT 'Лабораторні',
  `practs` int(11) NOT NULL COMMENT 'Практичні',
  `selfwork` int(11) NOT NULL COMMENT 'Самостійна робота студентів',
  `hours_per_week` int(11) NOT NULL COMMENT 'Годин на тиждень',
  `test` tinyint(1) NOT NULL COMMENT 'Залік',
  `exam` tinyint(1) NOT NULL COMMENT 'Екзамен',
  `course_work` tinyint(1) NOT NULL COMMENT 'Курсова робота',
  `course_project` tinyint(1) NOT NULL COMMENT 'Курсовий проект',
  `sp_semester_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `hoursOnSemester` (`sp_semester_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Структура таблиці `sp_plan`
--

CREATE TABLE IF NOT EXISTS `sp_plan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `speciality_id` int(11) NOT NULL,
  `semesters` varchar(255) DEFAULT NULL,
  `created` date DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

-- --------------------------------------------------------

--
-- Структура таблиці `sp_semester`
--

CREATE TABLE IF NOT EXISTS `sp_semester` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sp_plan_id` int(11) NOT NULL,
  `semester_number` int(11) NOT NULL,
  `weeks_count` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

-- --------------------------------------------------------

--
-- Структура таблиці `sp_subject`
--

CREATE TABLE IF NOT EXISTS `sp_subject` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plan_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `total` int(11) DEFAULT NULL,
  `lectures` int(11) DEFAULT NULL,
  `labs` int(11) DEFAULT NULL,
  `practs` int(11) DEFAULT NULL,
  `weeks` varchar(255) DEFAULT NULL,
  `control` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `subjectOnPlan` (`plan_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

-- --------------------------------------------------------

--
-- Структура таблиці `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Код',
  `code` varchar(12) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Номер студентського',
  `last_name` varchar(40) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Прізвище',
  `first_name` varchar(40) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Ім''я',
  `middle_name` varchar(40) COLLATE utf8_unicode_ci NOT NULL COMMENT 'По батькові',
  `group_id` int(11) NOT NULL COMMENT 'Група',
  `phone_number` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile_number` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mother_name` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `father_name` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` tinyint(1) DEFAULT NULL,
  `official_address` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `characteristics` text COLLATE utf8_unicode_ci,
  `factual_address` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `admission_date` date DEFAULT NULL,
  `tuition_payment` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `admission_order_number` int(10) DEFAULT NULL,
  `admission_semester` int(11) DEFAULT NULL,
  `entry_exams` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `education_document` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contract` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `math_mark` int(11) DEFAULT NULL,
  `ua_language_mark` int(11) DEFAULT NULL,
  `mother_workplace` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mother_position` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mother_workphone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mother_boss_workphone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `father_workplace` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `father_position` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `father_workphone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `father_boss_workphone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `graduated` bit(1) DEFAULT NULL,
  `graduation_date` date DEFAULT NULL,
  `graduation_basis` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `graduation_semester` int(1) DEFAULT NULL,
  `graduation_order_number` int(10) DEFAULT NULL,
  `diploma` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `direction` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `misc_data` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hobby` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

-- --------------------------------------------------------

--
-- Структура таблиці `student_has_exemption`
--

CREATE TABLE IF NOT EXISTS `student_has_exemption` (
  `student_id` int(11) NOT NULL,
  `exemption_id` int(11) NOT NULL,
  PRIMARY KEY (`student_id`,`exemption_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблиці `study_year`
--

CREATE TABLE IF NOT EXISTS `study_year` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблиці `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Код',
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Назва предмету',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=105 ;

-- --------------------------------------------------------

--
-- Структура таблиці `subject_cycle`
--

CREATE TABLE IF NOT EXISTS `subject_cycle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

-- --------------------------------------------------------

--
-- Структура таблиці `subject_has_speciality_and_cycle`
--

CREATE TABLE IF NOT EXISTS `subject_has_speciality_and_cycle` (
  `subject_id` int(11) NOT NULL,
  `speciality_id` int(11) NOT NULL,
  `cycle_id` int(11) NOT NULL,
  PRIMARY KEY (`subject_id`,`speciality_id`,`cycle_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблиці `teacher`
--

CREATE TABLE IF NOT EXISTS `teacher` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Код',
  `last_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Прізвище',
  `first_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Ім''я',
  `middle_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL COMMENT 'По батькові',
  `cyclic_commission_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=90 ;

-- --------------------------------------------------------

--
-- Структура таблиці `teacher_load`
--

CREATE TABLE IF NOT EXISTS `teacher_load` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Код',
  `teacher_id` int(11) NOT NULL COMMENT 'Викладач',
  `sp_hours_id` int(11) NOT NULL COMMENT 'Предмет',
  `group_id` int(11) NOT NULL COMMENT 'Група',
  `lectures` int(11) NOT NULL COMMENT 'Лекції',
  `labs` int(11) NOT NULL COMMENT 'Лабораторні',
  `practs` int(11) NOT NULL COMMENT 'Практичні',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Структура таблиці `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` int(11) DEFAULT NULL,
  `identity_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
