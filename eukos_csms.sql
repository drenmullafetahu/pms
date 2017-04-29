/*
Navicat MySQL Data Transfer

Source Server         : Localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : eukos_csms

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2016-08-10 16:30:34
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `courses`
-- ----------------------------
DROP TABLE IF EXISTS `courses`;
CREATE TABLE `courses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `program_id` int(11) NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `year` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `trimester` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lectures` int(11) NOT NULL,
  `exercises` int(11) NOT NULL,
  `credits` int(11) NOT NULL,
  `ord` bigint(20) NOT NULL,
  `academic_year` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of courses
-- ----------------------------

-- ----------------------------
-- Table structure for `courses_details`
-- ----------------------------
DROP TABLE IF EXISTS `courses_details`;
CREATE TABLE `courses_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `course_id` int(10) unsigned NOT NULL,
  `lang_id` tinyint(4) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `visible` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `course_id` (`course_id`),
  CONSTRAINT `course_id` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of courses_details
-- ----------------------------

-- ----------------------------
-- Table structure for `course_staff`
-- ----------------------------
DROP TABLE IF EXISTS `course_staff`;
CREATE TABLE `course_staff` (
  `course_id` int(10) NOT NULL,
  `staff_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of course_staff
-- ----------------------------

-- ----------------------------
-- Table structure for `exams`
-- ----------------------------
DROP TABLE IF EXISTS `exams`;
CREATE TABLE `exams` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `lang_id` tinyint(4) NOT NULL,
  `student_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `staff_id` int(11) NOT NULL,
  `exam_submission_dates_id` int(11) NOT NULL,
  `program_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `sit_for` tinyint(4) NOT NULL,
  `attendance` tinyint(4) NOT NULL,
  `processed` tinyint(4) NOT NULL,
  `published_at` datetime NOT NULL,
  `exam_date` datetime NOT NULL,
  `published` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of exams
-- ----------------------------

-- ----------------------------
-- Table structure for `exam_grade`
-- ----------------------------
DROP TABLE IF EXISTS `exam_grade`;
CREATE TABLE `exam_grade` (
  `exam_id` int(11) NOT NULL,
  `grade_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of exam_grade
-- ----------------------------

-- ----------------------------
-- Table structure for `exam_submission_dates`
-- ----------------------------
DROP TABLE IF EXISTS `exam_submission_dates`;
CREATE TABLE `exam_submission_dates` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `term_id` int(11) NOT NULL,
  `from` datetime NOT NULL,
  `to` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of exam_submission_dates
-- ----------------------------

-- ----------------------------
-- Table structure for `grades`
-- ----------------------------
DROP TABLE IF EXISTS `grades`;
CREATE TABLE `grades` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `grade` int(11) NOT NULL,
  `accepted` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of grades
-- ----------------------------

-- ----------------------------
-- Table structure for `languages`
-- ----------------------------
DROP TABLE IF EXISTS `languages`;
CREATE TABLE `languages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ord` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `visible` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of languages
-- ----------------------------
INSERT INTO `languages` VALUES ('1', 'Shqip', 'sq', '0', '1', '2016-07-19 12:24:49', '2016-07-19 12:24:54');
INSERT INTO `languages` VALUES ('2', 'English', 'en', '1', '1', '2016-07-19 12:24:49', '2016-07-19 12:24:49');

-- ----------------------------
-- Table structure for `login_session`
-- ----------------------------
DROP TABLE IF EXISTS `login_session`;
CREATE TABLE `login_session` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `user_type` tinyint(4) NOT NULL,
  `login_time` datetime NOT NULL,
  `logout_time` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of login_session
-- ----------------------------

-- ----------------------------
-- Table structure for `migrations`
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('2016_07_15_073143_create_students', '1');
INSERT INTO `migrations` VALUES ('2016_07_15_073206_create_login_session', '1');
INSERT INTO `migrations` VALUES ('2016_07_15_073221_create_programs', '1');
INSERT INTO `migrations` VALUES ('2016_07_15_073238_create_courses', '1');
INSERT INTO `migrations` VALUES ('2016_07_15_073246_create_courses_details', '1');
INSERT INTO `migrations` VALUES ('2016_07_15_073259_create_staff', '1');
INSERT INTO `migrations` VALUES ('2016_07_19_084111_create_permissions', '1');
INSERT INTO `migrations` VALUES ('2016_07_19_084321_create_exam_submission_dates', '1');
INSERT INTO `migrations` VALUES ('2016_07_19_084334_create_exams', '1');
INSERT INTO `migrations` VALUES ('2016_07_19_084347_create_grades', '1');
INSERT INTO `migrations` VALUES ('2016_07_19_084610_create_exam_grade', '1');
INSERT INTO `migrations` VALUES ('2016_07_19_084659_create_rate_form', '1');
INSERT INTO `migrations` VALUES ('2016_07_19_093906_create_roles', '1');
INSERT INTO `migrations` VALUES ('2016_07_19_095841_create_permission_role', '1');
INSERT INTO `migrations` VALUES ('2016_07_19_100001_create_term', '1');
INSERT INTO `migrations` VALUES ('2016_07_19_102345_create_languages', '2');
INSERT INTO `migrations` VALUES ('2016_07_20_103450_create_programs_details', '3');

-- ----------------------------
-- Table structure for `password_resets`
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for `permissions`
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `lang_id` tinyint(4) NOT NULL,
  `title` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `group` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of permissions
-- ----------------------------
INSERT INTO `permissions` VALUES ('1', '0', 'Students', 'students', 'csms', '2016-07-20 08:59:19', '2016-07-20 08:59:19');
INSERT INTO `permissions` VALUES ('2', '0', 'Exams', 'exams', 'csms', '2016-07-20 09:35:10', '2016-07-20 09:35:10');
INSERT INTO `permissions` VALUES ('3', '0', 'Grades', 'grades', 'csms', '2016-07-20 09:35:36', '2016-07-20 09:35:36');
INSERT INTO `permissions` VALUES ('4', '0', 'Courses', 'courses', 'csms', '2016-07-20 09:36:16', '2016-07-20 09:36:16');
INSERT INTO `permissions` VALUES ('5', '0', 'Programs', 'programs', 'csms', '2016-07-20 09:36:23', '2016-07-20 09:36:23');
INSERT INTO `permissions` VALUES ('6', '0', 'Staff', 'staff', 'csms', '2016-07-20 09:36:31', '2016-07-20 09:36:31');

-- ----------------------------
-- Table structure for `permission_role`
-- ----------------------------
DROP TABLE IF EXISTS `permission_role`;
CREATE TABLE `permission_role` (
  `permission_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `p_create` tinyint(4) NOT NULL,
  `p_read` tinyint(4) NOT NULL,
  `p_update` tinyint(4) NOT NULL,
  `p_delete` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of permission_role
-- ----------------------------
INSERT INTO `permission_role` VALUES ('1', '2', '1', '1', '1', '1', null, null);
INSERT INTO `permission_role` VALUES ('2', '2', '1', '1', '1', '1', null, null);
INSERT INTO `permission_role` VALUES ('3', '2', '1', '1', '1', '1', null, null);
INSERT INTO `permission_role` VALUES ('4', '2', '1', '1', '1', '1', null, null);
INSERT INTO `permission_role` VALUES ('5', '2', '1', '1', '1', '1', null, null);
INSERT INTO `permission_role` VALUES ('6', '2', '1', '1', '1', '1', null, null);
INSERT INTO `permission_role` VALUES ('1', '3', '0', '1', '0', '0', null, null);
INSERT INTO `permission_role` VALUES ('2', '3', '0', '1', '1', '1', null, null);
INSERT INTO `permission_role` VALUES ('3', '3', '1', '1', '1', '1', null, null);
INSERT INTO `permission_role` VALUES ('1', '1', '1', '1', '1', '1', null, null);
INSERT INTO `permission_role` VALUES ('2', '1', '1', '1', '1', '1', null, null);
INSERT INTO `permission_role` VALUES ('3', '1', '1', '1', '1', '1', null, null);
INSERT INTO `permission_role` VALUES ('4', '1', '1', '1', '1', '1', null, null);
INSERT INTO `permission_role` VALUES ('5', '1', '1', '1', '1', '1', null, null);
INSERT INTO `permission_role` VALUES ('6', '1', '1', '1', '1', '1', null, null);
INSERT INTO `permission_role` VALUES ('1', '4', '0', '1', '0', '0', null, null);
INSERT INTO `permission_role` VALUES ('2', '4', '1', '1', '1', '0', null, null);
INSERT INTO `permission_role` VALUES ('3', '4', '0', '1', '0', '0', null, null);
INSERT INTO `permission_role` VALUES ('4', '4', '0', '1', '0', '0', null, null);
INSERT INTO `permission_role` VALUES ('5', '4', '0', '1', '0', '0', null, null);
INSERT INTO `permission_role` VALUES ('6', '4', '0', '1', '0', '0', null, null);

-- ----------------------------
-- Table structure for `programs`
-- ----------------------------
DROP TABLE IF EXISTS `programs`;
CREATE TABLE `programs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of programs
-- ----------------------------
INSERT INTO `programs` VALUES ('1', '2016-07-20 10:54:26', '2016-07-20 10:54:26');
INSERT INTO `programs` VALUES ('2', '2016-07-20 10:54:42', '2016-07-20 10:54:42');
INSERT INTO `programs` VALUES ('3', '2016-07-20 10:54:53', '2016-07-20 10:54:53');
INSERT INTO `programs` VALUES ('4', '2016-07-20 10:55:03', '2016-07-20 10:55:03');
INSERT INTO `programs` VALUES ('5', '2016-07-20 10:55:16', '2016-07-20 10:55:16');

-- ----------------------------
-- Table structure for `programs_details`
-- ----------------------------
DROP TABLE IF EXISTS `programs_details`;
CREATE TABLE `programs_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `program_id` int(10) unsigned NOT NULL,
  `lang_id` tinyint(4) NOT NULL,
  `title` varchar(1500) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `visible` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `program_id` (`program_id`),
  CONSTRAINT `program_id` FOREIGN KEY (`program_id`) REFERENCES `programs` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of programs_details
-- ----------------------------
INSERT INTO `programs_details` VALUES ('1', '1', '1', 'Juridik Bachelor', '2016-07-20 10:54:26', '2016-07-20 13:26:16', '0');
INSERT INTO `programs_details` VALUES ('2', '1', '2', 'Juridik Bachelor', '2016-07-20 10:54:26', '2016-07-20 10:54:26', '0');
INSERT INTO `programs_details` VALUES ('3', '2', '1', 'Menaxhimi i Patundshmërive dhe Infrastrukturës - Bachelor', '2016-07-20 10:54:42', '2016-07-20 10:54:42', '0');
INSERT INTO `programs_details` VALUES ('4', '2', '2', 'Menaxhimi i Patundshmërive dhe Infrastrukturës - Bachelor', '2016-07-20 10:54:42', '2016-07-20 10:54:42', '0');
INSERT INTO `programs_details` VALUES ('5', '3', '1', 'Menaxhimi i Energjisë Bachelor', '2016-07-20 10:54:53', '2016-07-20 10:54:53', '0');
INSERT INTO `programs_details` VALUES ('6', '3', '2', 'Menaxhimi i Energjisë Bachelor', '2016-07-20 10:54:53', '2016-07-20 10:54:53', '0');
INSERT INTO `programs_details` VALUES ('7', '4', '1', 'Menaxhimi i Patundshmërive dhe Infrastrukturës  - Master', '2016-07-20 10:55:03', '2016-07-20 10:55:03', '0');
INSERT INTO `programs_details` VALUES ('8', '4', '2', 'Menaxhimi i Patundshmërive dhe Infrastrukturës  - Master', '2016-07-20 10:55:03', '2016-07-20 10:55:03', '0');
INSERT INTO `programs_details` VALUES ('9', '5', '1', 'Juridik Master - E drejta evropiane ekonomike', '2016-07-20 10:55:16', '2016-07-20 10:55:16', '0');
INSERT INTO `programs_details` VALUES ('10', '5', '2', 'Juridik Master - E drejta evropiane ekonomike', '2016-07-20 10:55:16', '2016-07-20 10:55:16', '0');

-- ----------------------------
-- Table structure for `rate_form`
-- ----------------------------
DROP TABLE IF EXISTS `rate_form`;
CREATE TABLE `rate_form` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `student_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `staff_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of rate_form
-- ----------------------------

-- ----------------------------
-- Table structure for `roles`
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES ('1', 'Admin', '2016-07-20 09:57:47', '2016-07-25 14:07:22');
INSERT INTO `roles` VALUES ('3', 'Staff', '2016-07-20 10:07:49', '2016-07-20 10:07:49');
INSERT INTO `roles` VALUES ('4', 'Students', '2016-07-20 10:09:44', '2016-07-20 10:09:44');

-- ----------------------------
-- Table structure for `staff`
-- ----------------------------
DROP TABLE IF EXISTS `staff`;
CREATE TABLE `staff` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `birthdate` date NOT NULL,
  `birthplace` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of staff
-- ----------------------------

-- ----------------------------
-- Table structure for `students`
-- ----------------------------
DROP TABLE IF EXISTS `students`;
CREATE TABLE `students` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `program_id` bigint(20) unsigned NOT NULL,
  `student_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `parents_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `birthdate` date NOT NULL,
  `birthplace` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `registration_year` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `students_student_id_unique` (`student_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of students
-- ----------------------------
INSERT INTO `students` VALUES ('3', '4', '1', '1000022016', 'Festim3', 'Nevzati', 'Bashkim', '1984-11-28', 'Prishtinë', '2016', '2016-08-08 08:26:14', '2016-08-09 09:16:20');
INSERT INTO `students` VALUES ('4', '5', '1', '1000032016', 'Festim1', 'Nevzati1', 'Bashkim1', '1984-11-28', 'Prishtinë', '2016', '2016-08-08 08:41:30', '2016-08-08 08:41:30');

-- ----------------------------
-- Table structure for `term`
-- ----------------------------
DROP TABLE IF EXISTS `term`;
CREATE TABLE `term` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `lang_id` tinyint(4) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of term
-- ----------------------------

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_changed` tinyint(1) NOT NULL,
  `password_changed_date` datetime NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('4', '4', 'festim.nevzati@gmail.com', 'festim.nevzati', '$2y$10$h.2IyLjA.nUA9f7moYNGPeckQFH1/C99aKrj.SpLeh.WFrluur/06', '0', '0000-00-00 00:00:00', '', '1', null, '2016-08-08 08:26:14', '2016-08-09 09:21:35');
INSERT INTO `users` VALUES ('5', '4', 'festim@refresh-ks.com', 'festim', '$2y$10$tLVquIn4AcA6kiQ2vUMg0eNEOl.wW8hSCLq/OC9ncUTZuw1.LgSIm', '0', '0000-00-00 00:00:00', '', '1', null, '2016-08-08 08:41:30', '2016-08-08 08:41:30');
