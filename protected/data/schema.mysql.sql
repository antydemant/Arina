
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
  `group_id` int(11) NOT NULL COMMENT 'Група',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблиці `audience`
--

CREATE TABLE IF NOT EXISTS `audience` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Код',
  `number` varchar(5) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Номер аудиторії',
  `name` varchar(15) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Назва аудиторії',
  `type` int(11) NOT NULL COMMENT 'Тип аудиторії',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблиці `class_absence`
--

CREATE TABLE IF NOT EXISTS `class_absence` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Код',
  `actual_class_id` int(11) NOT NULL COMMENT 'Пара',
  `student_id` int(11) NOT NULL COMMENT 'Студент',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблиці `cyclic_commission`
--

CREATE TABLE IF NOT EXISTS `cyclic_commission` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Код',
  `title` varchar(40) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Назва циклової комісії',
  `head_id` int(11) NOT NULL COMMENT 'Голова циклової комісії',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблиці `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Код',
  `title` varchar(40) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Назва відділення',
  `head_id` int(11) NOT NULL COMMENT 'Зав.відділення',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблиці `speciality`
--

CREATE TABLE IF NOT EXISTS `speciality` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Код',
  `title` varchar(40) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Назва спеціальності',
  `department_id` int(11) NOT NULL COMMENT 'Код відділення',
  `number` varchar(15) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Номер спеціальності',
  `accreditation_date` date NOT NULL COMMENT 'Дата останньої акредитації',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;


-- --------------------------------------------------------

--
-- Структура таблиці `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Код',
  `number` varchar(12) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Номер студентського',
  `lastname` varchar(40) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Прізвище',
  `firstname` varchar(40) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Ім''я',
  `middlename` varchar(40) COLLATE utf8_unicode_ci NOT NULL COMMENT 'По батькові',
  `group_id` int(11) NOT NULL COMMENT 'Група',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблиці `study_plan`
--

CREATE TABLE IF NOT EXISTS `study_plan` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Код',
  `speciality_id` int(11) NOT NULL COMMENT 'Спеціальність',
  `study_year` varchar(9) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Навчальний рік',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблиці `study_plan_semester`
--

CREATE TABLE IF NOT EXISTS `study_plan_semester` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Код',
  `study_plan_subject_id` int(11) NOT NULL COMMENT 'Предмет у навчальному плані',
  `lectures` int(11) NOT NULL COMMENT 'Лекції',
  `labs` int(11) NOT NULL COMMENT 'Лабораторні',
  `practs` int(11) NOT NULL COMMENT 'Практичні',
  `selfwork` int(11) NOT NULL COMMENT 'Самостійна робота студентів',
  `hours_per_week` int(11) NOT NULL COMMENT 'Годин на тиждень',
  `test` tinyint(1) NOT NULL COMMENT 'Залік',
  `exam` tinyint(1) NOT NULL COMMENT 'Екзамен',
  `course_work` tinyint(1) NOT NULL COMMENT 'Курсова робота',
  `course_project` tinyint(1) NOT NULL COMMENT 'Курсовий проект',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблиці `study_plan_subject`
--

CREATE TABLE IF NOT EXISTS `study_plan_subject` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Код',
  `study_plan_id` int(11) NOT NULL COMMENT 'Навчальний план',
  `subject_id` int(11) NOT NULL COMMENT 'Предмет',
  `total_hours` int(11) NOT NULL COMMENT 'Годин всього',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблиці `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Код',
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Назва предмету',
  `cycle_id` int(11) NOT NULL COMMENT 'Цикл предмету',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблиці `teacher`
--

CREATE TABLE IF NOT EXISTS `teacher` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Код',
  `lastname` varchar(25) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Прізвище',
  `firstname` varchar(25) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Ім''я',
  `middlename` varchar(25) COLLATE utf8_unicode_ci NOT NULL COMMENT 'По батькові',
  `cyclic_commission_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблиці `teacher_load`
--

CREATE TABLE IF NOT EXISTS `teacher_load` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Код',
  `teacher_id` int(11) NOT NULL COMMENT 'Викладач',
  `study_plan_semester_id` int(11) NOT NULL COMMENT 'Предмет',
  `group_id` int(11) NOT NULL COMMENT 'Група',
  `lectures` int(11) NOT NULL COMMENT 'Лекції',
  `labs` int(11) NOT NULL COMMENT 'Лабораторні',
  `practs` int(11) NOT NULL COMMENT 'Практичні',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;