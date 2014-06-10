-- phpMyAdmin SQL Dump
-- version 4.1.13
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Июн 10 2014 г., 18:15
-- Версия сервера: 5.5.31-1~dotdeb.0
-- Версия PHP: 5.4.27-1~dotdeb.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `hpk`
--

-- --------------------------------------------------------

--
-- Структура таблицы `actual_class`
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
-- Структура таблицы `audience`
--

CREATE TABLE IF NOT EXISTS `audience` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Код',
  `number` varchar(5) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Номер аудиторії',
  `type` int(11) NOT NULL COMMENT 'Тип аудиторії',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=73 ;

-- --------------------------------------------------------

--
-- Структура таблицы `AuthAssignment`
--

CREATE TABLE IF NOT EXISTS `AuthAssignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура таблицы `AuthItem`
--

CREATE TABLE IF NOT EXISTS `AuthItem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура таблицы `AuthItemChild`
--

CREATE TABLE IF NOT EXISTS `AuthItemChild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура таблицы `class_absence`
--

CREATE TABLE IF NOT EXISTS `class_absence` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Код',
  `actual_class_id` int(11) NOT NULL COMMENT 'Пара',
  `student_id` int(11) NOT NULL COMMENT 'Студент',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Структура таблицы `class_mark`
--

CREATE TABLE IF NOT EXISTS `class_mark` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Код',
  `actual_class_id` int(11) NOT NULL COMMENT 'Пара',
  `mark` int(11) NOT NULL COMMENT 'Оцінка',
  `student_id` int(11) NOT NULL COMMENT 'Студент',
  `type` enum('simple','attestation','attestation_second_try','test','exam','exam_second_try','course_work','course_project') COLLATE utf8_unicode_ci NOT NULL COMMENT 'Тип оцінки',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `cyclic_commission`
--

CREATE TABLE IF NOT EXISTS `cyclic_commission` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Код',
  `title` varchar(40) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Назва циклової комісії',
  `head_id` int(11) NOT NULL COMMENT 'Голова циклової комісії',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

-- --------------------------------------------------------

--
-- Структура таблицы `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Код',
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Назва відділення',
  `head_id` int(11) NOT NULL COMMENT 'Зав.відділення',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Структура таблицы `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `position_id` int(11) DEFAULT NULL,
  `participates_in_study_process` tinyint(1) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `short_name` varchar(255) DEFAULT NULL,
  `gender` tinyint(1) DEFAULT NULL,
  `cyclic_commission_id` int(11) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `nationality` varchar(255) DEFAULT NULL,
  `education` int(11) DEFAULT NULL,
  `educations_list` text,
  `postgraduate_training` int(11) DEFAULT NULL,
  `postgraduate_trainings` text,
  `last_job` varchar(255) DEFAULT NULL,
  `last_job_position` varchar(255) DEFAULT NULL,
  `has_experience` tinyint(1) DEFAULT NULL,
  `experience_start` date DEFAULT NULL,
  `experience_end` date DEFAULT NULL,
  `dismissal_reason` int(11) DEFAULT NULL,
  `dismissal_date` date DEFAULT NULL,
  `pension_data` varchar(255) DEFAULT NULL,
  `family_status` varchar(255) DEFAULT NULL,
  `family_data` text,
  `place_of_residence` varchar(255) DEFAULT NULL,
  `place_of_registration` varchar(255) DEFAULT NULL,
  `passport` varchar(255) DEFAULT NULL,
  `passport_issued_by` varchar(255) DEFAULT NULL,
  `military_accounting_group` varchar(255) DEFAULT NULL,
  `military_accounting_category` varchar(255) DEFAULT NULL,
  `military_composition` varchar(255) DEFAULT NULL,
  `military_rank` varchar(255) DEFAULT NULL,
  `military_accounting_speciality_number` varchar(255) DEFAULT NULL,
  `military_suitability` tinyint(1) DEFAULT NULL,
  `military_district_office_registration_name` varchar(255) DEFAULT NULL,
  `military_district_office_residence_name` varchar(255) DEFAULT NULL,
  `professional_education` text,
  `appointments_and_transfers` text,
  `vacations` text,
  PRIMARY KEY (`id`),
  KEY `employee_position` (`position_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=90 ;

-- --------------------------------------------------------

--
-- Структура таблицы `exemption`
--

CREATE TABLE IF NOT EXISTS `exemption` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Структура таблицы `group`
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
-- Структура таблицы `load`
--

CREATE TABLE IF NOT EXISTS `load` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `study_year_id` int(11) DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `wp_subject_id` int(11) DEFAULT NULL,
  `projects_hours` varchar(255) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `course` int(11) DEFAULT NULL,
  `consult` varchar(255) DEFAULT NULL,
  `students` varchar(255) DEFAULT NULL,
  `hours` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `position`
--

CREATE TABLE IF NOT EXISTS `position` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `max_load_hour_1` int(11) DEFAULT NULL,
  `max_load_hour_2` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Структура таблицы `schedule`
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
-- Структура таблицы `settings`
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
-- Структура таблицы `speciality`
--

CREATE TABLE IF NOT EXISTS `speciality` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Код',
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Назва спеціальності',
  `department_id` int(11) NOT NULL COMMENT 'Код відділення',
  `number` varchar(15) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Номер спеціальності',
  `accreditation_date` date NOT NULL COMMENT 'Дата останньої акредитації',
  `qualification` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `apprenticeship` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `discipline` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `direction` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `education_form` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

-- --------------------------------------------------------

--
-- Структура таблицы `sp_plan`
--

CREATE TABLE IF NOT EXISTS `sp_plan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `speciality_id` int(11) DEFAULT NULL,
  `semesters` varchar(255) DEFAULT NULL,
  `created` int(11) DEFAULT NULL,
  `updated` int(11) DEFAULT NULL,
  `graph` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

-- --------------------------------------------------------

--
-- Структура таблицы `sp_subject`
--

CREATE TABLE IF NOT EXISTS `sp_subject` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plan_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `lectures` int(11) DEFAULT NULL,
  `labs` int(11) DEFAULT NULL,
  `practs` int(11) DEFAULT NULL,
  `weeks` varchar(255) DEFAULT NULL,
  `control` varchar(255) DEFAULT NULL,
  `practice_weeks` int(11) DEFAULT NULL,
  `diploma_name` varchar(255) DEFAULT NULL,
  `certificate_name` varchar(255) DEFAULT NULL,
  `dual_practice` tinyint(1) DEFAULT NULL,
  `dual_labs` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

-- --------------------------------------------------------

--
-- Структура таблицы `student`
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
  `sseed_id` int(11) DEFAULT NULL,
  `document` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `identification_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `student_has_exemption`
--

CREATE TABLE IF NOT EXISTS `student_has_exemption` (
  `student_id` int(11) NOT NULL,
  `exemption_id` int(11) NOT NULL,
  PRIMARY KEY (`student_id`,`exemption_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `study_year`
--

CREATE TABLE IF NOT EXISTS `study_year` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `begin` int(4) DEFAULT NULL,
  `end` int(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Структура таблицы `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Код',
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Назва предмету',
  `code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `short_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `practice` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=164 ;

-- --------------------------------------------------------

--
-- Структура таблицы `subject_cycle`
--

CREATE TABLE IF NOT EXISTS `subject_cycle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

-- --------------------------------------------------------

--
-- Структура таблицы `subject_has_speciality_and_cycle`
--

CREATE TABLE IF NOT EXISTS `subject_has_speciality_and_cycle` (
  `subject_id` int(11) NOT NULL,
  `speciality_id` int(11) NOT NULL,
  `cycle_id` int(11) NOT NULL,
  PRIMARY KEY (`subject_id`,`speciality_id`,`cycle_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` int(11) DEFAULT NULL,
  `identity_id` int(11) DEFAULT NULL,
  `identity_type` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=96 ;

-- --------------------------------------------------------

--
-- Структура таблицы `wp_plan`
--

CREATE TABLE IF NOT EXISTS `wp_plan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `speciality_id` int(11) DEFAULT NULL,
  `semesters` varchar(255) DEFAULT NULL,
  `created` int(11) DEFAULT NULL,
  `updated` int(11) DEFAULT NULL,
  `graph` text,
  `year_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

-- --------------------------------------------------------

--
-- Структура таблицы `wp_subject`
--

CREATE TABLE IF NOT EXISTS `wp_subject` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plan_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `total` varchar(255) DEFAULT NULL,
  `lectures` varchar(255) DEFAULT NULL,
  `labs` varchar(255) DEFAULT NULL,
  `practs` varchar(255) DEFAULT NULL,
  `weeks` varchar(255) DEFAULT NULL,
  `control` varchar(255) DEFAULT NULL,
  `cyclic_commission_id` int(11) DEFAULT NULL,
  `certificate_name` varchar(255) DEFAULT NULL,
  `diploma_name` varchar(255) DEFAULT NULL,
  `control_hours` varchar(255) DEFAULT NULL,
  `project_hours` varchar(255) DEFAULT NULL,
  `dual_practice` tinyint(1) DEFAULT NULL,
  `dual_labs` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `AuthAssignment`
--
ALTER TABLE `AuthAssignment`
  ADD CONSTRAINT `AuthAssignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `AuthItem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `AuthItemChild`
--
ALTER TABLE `AuthItemChild`
  ADD CONSTRAINT `AuthItemChild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `AuthItem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `AuthItemChild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `AuthItem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_position` FOREIGN KEY (`position_id`) REFERENCES `position` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
