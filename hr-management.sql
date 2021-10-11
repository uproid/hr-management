/*
 Navicat Premium Data Transfer

 Source Server         : localhost_3306
 Source Server Type    : MySQL
 Source Server Version : 80026
 Source Host           : 127.0.0.1:3306
 Source Schema         : hr-management

 Target Server Type    : MySQL
 Target Server Version : 80026
 File Encoding         : 65001

 Date: 11/10/2021 14:16:46
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for countries
-- ----------------------------
DROP TABLE IF EXISTS `countries`;
CREATE TABLE `countries`  (
  `id` char(2) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `country_name` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `region_id` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `region_id`(`region_id`) USING BTREE,
  CONSTRAINT `countries_ibfk_1` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of countries
-- ----------------------------
INSERT INTO `countries` VALUES ('AR', 'Argentina', 2);
INSERT INTO `countries` VALUES ('AU', 'Australia', 3);
INSERT INTO `countries` VALUES ('BE', 'Belgium', 1);
INSERT INTO `countries` VALUES ('BR', 'Brazil', 2);
INSERT INTO `countries` VALUES ('CA', 'Canada', 2);
INSERT INTO `countries` VALUES ('CH', 'Switzerland', 1);
INSERT INTO `countries` VALUES ('CN', 'China', 3);
INSERT INTO `countries` VALUES ('DE', 'Germany', 1);
INSERT INTO `countries` VALUES ('DK', 'Denmark', 1);
INSERT INTO `countries` VALUES ('EG', 'Egypt', 4);
INSERT INTO `countries` VALUES ('FR', 'France', 1);
INSERT INTO `countries` VALUES ('HK', 'HongKong', 3);
INSERT INTO `countries` VALUES ('IL', 'Israel', 4);
INSERT INTO `countries` VALUES ('IN', 'India', 3);
INSERT INTO `countries` VALUES ('IT', 'Italy', 1);
INSERT INTO `countries` VALUES ('JP', 'Japan', 3);
INSERT INTO `countries` VALUES ('KW', 'Kuwait', 4);
INSERT INTO `countries` VALUES ('MX', 'Mexico', 2);
INSERT INTO `countries` VALUES ('NG', 'Nigeria', 4);
INSERT INTO `countries` VALUES ('NL', 'Netherlands', 1);
INSERT INTO `countries` VALUES ('SG', 'Singapore', 3);
INSERT INTO `countries` VALUES ('UK', 'United Kingdom', 1);
INSERT INTO `countries` VALUES ('US', 'United States of America', 2);
INSERT INTO `countries` VALUES ('ZM', 'Zambia', 4);
INSERT INTO `countries` VALUES ('ZW', 'Zimbabwe', 4);

-- ----------------------------
-- Table structure for departments
-- ----------------------------
DROP TABLE IF EXISTS `departments`;
CREATE TABLE `departments`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `department_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `location_id` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `location_id`(`location_id`) USING BTREE,
  CONSTRAINT `departments_ibfk_1` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of departments
-- ----------------------------
INSERT INTO `departments` VALUES (1, 'Administration', 1700);
INSERT INTO `departments` VALUES (2, 'Marketing', 1800);
INSERT INTO `departments` VALUES (3, 'Purchasing', 1700);
INSERT INTO `departments` VALUES (4, 'Human Resources', 2400);
INSERT INTO `departments` VALUES (5, 'Shipping', 1500);
INSERT INTO `departments` VALUES (6, 'IT', 1400);
INSERT INTO `departments` VALUES (7, 'Public Relations', 2700);
INSERT INTO `departments` VALUES (8, 'Sales', 2500);
INSERT INTO `departments` VALUES (9, 'Executive', 1700);
INSERT INTO `departments` VALUES (10, 'Finance', 1700);
INSERT INTO `departments` VALUES (11, 'Accounting', 1700);

-- ----------------------------
-- Table structure for dependents
-- ----------------------------
DROP TABLE IF EXISTS `dependents`;
CREATE TABLE `dependents`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `last_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `relationship` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `employee_id` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `employee_id`(`employee_id`) USING BTREE,
  CONSTRAINT `dependents_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 31 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dependents
-- ----------------------------
INSERT INTO `dependents` VALUES (1, 'Penelope', 'Gietz', 'Child', 206);
INSERT INTO `dependents` VALUES (2, 'Nick', 'Higgins', 'Child', 205);
INSERT INTO `dependents` VALUES (3, 'Ed', 'Whalen', 'Child', 200);
INSERT INTO `dependents` VALUES (4, 'Jennifer', 'King', 'Child', 100);
INSERT INTO `dependents` VALUES (5, 'Johnny', 'Kochhar', 'Child', 101);
INSERT INTO `dependents` VALUES (6, 'Bette', 'De Haan', 'Child', 102);
INSERT INTO `dependents` VALUES (7, 'Grace', 'Faviet', 'Child', 109);
INSERT INTO `dependents` VALUES (8, 'Matthew', 'Chen', 'Child', 110);
INSERT INTO `dependents` VALUES (9, 'Joe', 'Sciarra', 'Child', 111);
INSERT INTO `dependents` VALUES (10, 'Christian', 'Urman', 'Child', 112);
INSERT INTO `dependents` VALUES (11, 'Zero', 'Popp', 'Child', 113);
INSERT INTO `dependents` VALUES (12, 'Karl', 'Greenberg', 'Child', 108);
INSERT INTO `dependents` VALUES (13, 'Uma', 'Mavris', 'Child', 203);
INSERT INTO `dependents` VALUES (14, 'Vivien', 'Hunold', 'Child', 103);
INSERT INTO `dependents` VALUES (15, 'Cuba', 'Ernst', 'Child', 104);
INSERT INTO `dependents` VALUES (16, 'Fred', 'Austin', 'Child', 105);
INSERT INTO `dependents` VALUES (17, 'Helen', 'Pataballa', 'Child', 106);
INSERT INTO `dependents` VALUES (18, 'Dan', 'Lorentz', 'Child', 107);
INSERT INTO `dependents` VALUES (19, 'Bob', 'Hartstein', 'Child', 201);
INSERT INTO `dependents` VALUES (20, 'Lucille', 'Fay', 'Child', 202);
INSERT INTO `dependents` VALUES (21, 'Kirsten', 'Baer', 'Child', 204);
INSERT INTO `dependents` VALUES (22, 'Elvis', 'Khoo', 'Child', 115);
INSERT INTO `dependents` VALUES (23, 'Sandra', 'Baida', 'Child', 116);
INSERT INTO `dependents` VALUES (24, 'Cameron', 'Tobias', 'Child', 117);
INSERT INTO `dependents` VALUES (25, 'Kevin', 'Himuro', 'Child', 118);
INSERT INTO `dependents` VALUES (26, 'Rip', 'Colmenares', 'Child', 119);
INSERT INTO `dependents` VALUES (27, 'Julia', 'Raphaely', 'Child', 114);
INSERT INTO `dependents` VALUES (28, 'Woody', 'Russell', 'Child', 145);
INSERT INTO `dependents` VALUES (29, 'Alec', 'Partners', 'Child', 146);
INSERT INTO `dependents` VALUES (30, 'Sandra', 'Taylor', 'Child', 176);

-- ----------------------------
-- Table structure for employees
-- ----------------------------
DROP TABLE IF EXISTS `employees`;
CREATE TABLE `employees`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `last_name` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `phone_number` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `hire_date` date NOT NULL,
  `job_id` int NOT NULL,
  `salary` decimal(8, 2) NOT NULL,
  `manager_id` int NULL DEFAULT NULL,
  `department_id` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `job_id`(`job_id`) USING BTREE,
  INDEX `department_id`(`department_id`) USING BTREE,
  INDEX `manager_id`(`manager_id`) USING BTREE,
  CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `employees_ibfk_2` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `employees_ibfk_3` FOREIGN KEY (`manager_id`) REFERENCES `employees` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 207 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of employees
-- ----------------------------
INSERT INTO `employees` VALUES (100, 'Steven', 'King', 'steven.king@sqltutorial.org', '515.123.4567', '1987-06-17', 4, 24000.00, NULL, 9);
INSERT INTO `employees` VALUES (101, 'Neena', 'Kochhar', 'neena.kochhar@sqltutorial.org', '515.123.4568', '1989-09-21', 5, 17000.00, 100, 9);
INSERT INTO `employees` VALUES (102, 'Lex', 'De Haan', 'lex.de haan@sqltutorial.org', '515.123.4569', '1993-01-13', 5, 17000.00, 100, 9);
INSERT INTO `employees` VALUES (103, 'Alexander', 'Hunold', 'alexander.hunold@sqltutorial.org', '590.423.4567', '1990-01-03', 9, 9000.00, 102, 6);
INSERT INTO `employees` VALUES (104, 'Bruce', 'Ernst', 'bruce.ernst@sqltutorial.org', '590.423.4568', '1991-05-21', 9, 6000.00, 103, 6);
INSERT INTO `employees` VALUES (105, 'David', 'Austin', 'david.austin@sqltutorial.org', '590.423.4569', '1997-06-25', 9, 4800.00, 103, 6);
INSERT INTO `employees` VALUES (106, 'Valli', 'Pataballa', 'valli.pataballa@sqltutorial.org', '590.423.4560', '1998-02-05', 9, 4800.00, 103, 6);
INSERT INTO `employees` VALUES (107, 'Diana', 'Lorentz', 'diana.lorentz@sqltutorial.org', '590.423.5567', '1999-02-07', 9, 4200.00, 103, 6);
INSERT INTO `employees` VALUES (108, 'Nancy', 'Greenberg', 'nancy.greenberg@sqltutorial.org', '515.124.4569', '1994-08-17', 7, 12000.00, 101, 10);
INSERT INTO `employees` VALUES (109, 'Daniel', 'Faviet', 'daniel.faviet@sqltutorial.org', '515.124.4169', '1994-08-16', 6, 9000.00, 108, 10);
INSERT INTO `employees` VALUES (110, 'John', 'Chen', 'john.chen@sqltutorial.org', '515.124.4269', '1997-09-28', 6, 8200.00, 108, 10);
INSERT INTO `employees` VALUES (111, 'Ismael', 'Sciarra', 'ismael.sciarra@sqltutorial.org', '515.124.4369', '1997-09-30', 6, 7700.00, 108, 10);
INSERT INTO `employees` VALUES (112, 'Jose Manuel', 'Urman', 'jose manuel.urman@sqltutorial.org', '515.124.4469', '1998-03-07', 6, 7800.00, 108, 10);
INSERT INTO `employees` VALUES (113, 'Luis', 'Popp', 'luis.popp@sqltutorial.org', '515.124.4567', '1999-12-07', 6, 6900.00, 108, 10);
INSERT INTO `employees` VALUES (114, 'Den', 'Raphaely', 'den.raphaely@sqltutorial.org', '515.127.4561', '1994-12-07', 14, 11000.00, 100, 3);
INSERT INTO `employees` VALUES (115, 'Alexander', 'Khoo', 'alexander.khoo@sqltutorial.org', '515.127.4562', '1995-05-18', 13, 3100.00, 114, 3);
INSERT INTO `employees` VALUES (116, 'Shelli', 'Baida', 'shelli.baida@sqltutorial.org', '515.127.4563', '1997-12-24', 13, 2900.00, 114, 3);
INSERT INTO `employees` VALUES (117, 'Sigal', 'Tobias', 'sigal.tobias@sqltutorial.org', '515.127.4564', '1997-07-24', 13, 2800.00, 114, 3);
INSERT INTO `employees` VALUES (118, 'Guy', 'Himuro', 'guy.himuro@sqltutorial.org', '515.127.4565', '1998-11-15', 13, 2600.00, 114, 3);
INSERT INTO `employees` VALUES (119, 'Karen', 'Colmenares', 'karen.colmenares@sqltutorial.org', '515.127.4566', '1999-08-10', 13, 2500.00, 114, 3);
INSERT INTO `employees` VALUES (120, 'Matthew', 'Weiss', 'matthew.weiss@sqltutorial.org', '650.123.1234', '1996-07-18', 19, 8000.00, 100, 5);
INSERT INTO `employees` VALUES (121, 'Adam', 'Fripp', 'adam.fripp@sqltutorial.org', '650.123.2234', '1997-04-10', 19, 8200.00, 100, 5);
INSERT INTO `employees` VALUES (122, 'Payam', 'Kaufling', 'payam.kaufling@sqltutorial.org', '650.123.3234', '1995-05-01', 19, 7900.00, 100, 5);
INSERT INTO `employees` VALUES (123, 'Shanta', 'Vollman', 'shanta.vollman@sqltutorial.org', '650.123.4234', '1997-10-10', 19, 6500.00, 100, 5);
INSERT INTO `employees` VALUES (126, 'Irene', 'Mikkilineni', 'irene.mikkilineni@sqltutorial.org', '650.124.1224', '1998-09-28', 18, 2700.00, 120, 5);
INSERT INTO `employees` VALUES (145, 'John', 'Russell', 'john.russell@sqltutorial.org', NULL, '1996-10-01', 15, 14000.00, 100, 8);
INSERT INTO `employees` VALUES (146, 'Karen', 'Partners', 'karen.partners@sqltutorial.org', NULL, '1997-01-05', 15, 13500.00, 100, 8);
INSERT INTO `employees` VALUES (176, 'Jonathon', 'Taylor', 'jonathon.taylor@sqltutorial.org', NULL, '1998-03-24', 16, 8600.00, 100, 8);
INSERT INTO `employees` VALUES (177, 'Jack', 'Livingston', 'jack.livingston@sqltutorial.org', NULL, '1998-04-23', 16, 8400.00, 100, 8);
INSERT INTO `employees` VALUES (178, 'Kimberely', 'Grant', 'kimberely.grant@sqltutorial.org', NULL, '1999-05-24', 16, 7000.00, 100, 8);
INSERT INTO `employees` VALUES (179, 'Charles', 'Johnson', 'charles.johnson@sqltutorial.org', NULL, '2000-01-04', 16, 6200.00, 100, 8);
INSERT INTO `employees` VALUES (192, 'Sarah', 'Bell', 'sarah.bell@sqltutorial.org', '650.501.1876', '1996-02-04', 17, 4000.00, 123, 5);
INSERT INTO `employees` VALUES (193, 'Britney', 'Everett', 'britney.everett@sqltutorial.org', '650.501.2876', '1997-03-03', 17, 3900.00, 123, 5);
INSERT INTO `employees` VALUES (200, 'Jennifer', 'Whalen', 'jennifer.whalen@sqltutorial.org', '515.123.4444', '1987-09-17', 3, 4400.00, 101, 1);
INSERT INTO `employees` VALUES (201, 'Michael', 'Hartstein', 'michael.hartstein@sqltutorial.org', '515.123.5555', '1996-02-17', 10, 13000.00, 100, 2);
INSERT INTO `employees` VALUES (202, 'Pat', 'Fay', 'pat.fay@sqltutorial.org', '603.123.6666', '1997-08-17', 11, 6000.00, 201, 2);
INSERT INTO `employees` VALUES (203, 'Susan', 'Mavris', 'susan.mavris@sqltutorial.org', '515.123.7777', '1994-06-07', 8, 6500.00, 101, 4);
INSERT INTO `employees` VALUES (204, 'Hermann', 'Baer', 'hermann.baer@sqltutorial.org', '515.123.8888', '1994-06-07', 12, 10000.00, 101, 7);
INSERT INTO `employees` VALUES (205, 'Shelley', 'Higgins', 'shelley.higgins@sqltutorial.org', '515.123.8080', '1994-06-07', 2, 12000.00, 101, 11);
INSERT INTO `employees` VALUES (206, 'William', 'Gietz', 'william.gietz@sqltutorial.org', '515.123.8181', '1994-06-07', 1, 8300.00, 205, 11);

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for jobs
-- ----------------------------
DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `job_title` varchar(35) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `min_salary` decimal(8, 2) NULL DEFAULT NULL,
  `max_salary` decimal(8, 2) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 20 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of jobs
-- ----------------------------
INSERT INTO `jobs` VALUES (1, 'Public Accountant', 4200.00, 9000.00);
INSERT INTO `jobs` VALUES (2, 'Accounting Manager', 8200.00, 16000.00);
INSERT INTO `jobs` VALUES (3, 'Administration Assistant', 3000.00, 6000.00);
INSERT INTO `jobs` VALUES (4, 'President', 20000.00, 40000.00);
INSERT INTO `jobs` VALUES (5, 'Administration Vice President', 15000.00, 30000.00);
INSERT INTO `jobs` VALUES (6, 'Accountant', 4200.00, 9000.00);
INSERT INTO `jobs` VALUES (7, 'Finance Manager', 8200.00, 16000.00);
INSERT INTO `jobs` VALUES (8, 'Human Resources Representative', 4000.00, 9000.00);
INSERT INTO `jobs` VALUES (9, 'Programmer', 4000.00, 10000.00);
INSERT INTO `jobs` VALUES (10, 'Marketing Manager', 9000.00, 15000.00);
INSERT INTO `jobs` VALUES (11, 'Marketing Representative', 4000.00, 9000.00);
INSERT INTO `jobs` VALUES (12, 'Public Relations Representative', 4500.00, 10500.00);
INSERT INTO `jobs` VALUES (13, 'Purchasing Clerk', 2500.00, 5500.00);
INSERT INTO `jobs` VALUES (14, 'Purchasing Manager', 8000.00, 15000.00);
INSERT INTO `jobs` VALUES (15, 'Sales Manager', 10000.00, 20000.00);
INSERT INTO `jobs` VALUES (16, 'Sales Representative', 6000.00, 12000.00);
INSERT INTO `jobs` VALUES (17, 'Shipping Clerk', 2500.00, 5500.00);
INSERT INTO `jobs` VALUES (18, 'Stock Clerk', 2000.00, 5000.00);
INSERT INTO `jobs` VALUES (19, 'Stock Manager', 5500.00, 8500.00);

-- ----------------------------
-- Table structure for locations
-- ----------------------------
DROP TABLE IF EXISTS `locations`;
CREATE TABLE `locations`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `street_address` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `postal_code` varchar(12) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `city` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `state_province` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `country_id` char(2) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `country_id`(`country_id`) USING BTREE,
  CONSTRAINT `locations_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 2701 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of locations
-- ----------------------------
INSERT INTO `locations` VALUES (1400, '2014 Jabberwocky Rd', '26192', 'Southlake', 'Texas', 'US');
INSERT INTO `locations` VALUES (1500, '2011 Interiors Blvd', '99236', 'South San Francisco', 'California', 'US');
INSERT INTO `locations` VALUES (1700, '2004 Charade Rd', '98199', 'Seattle', 'Washington', 'US');
INSERT INTO `locations` VALUES (1800, '147 Spadina Ave', 'M5V 2L7', 'Toronto', 'Ontario', 'CA');
INSERT INTO `locations` VALUES (2400, '8204 Arthur St', NULL, 'London', NULL, 'UK');
INSERT INTO `locations` VALUES (2500, 'Magdalen Centre, The Oxford Science Park', 'OX9 9ZB', 'Oxford', 'Oxford', 'UK');
INSERT INTO `locations` VALUES (2700, 'Schwanthalerstr. 7031', '80925', 'Munich', 'Bavaria', 'DE');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `last_used_at` timestamp(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `personal_access_tokens_token_unique`(`token`) USING BTREE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type`, `tokenable_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for regions
-- ----------------------------
DROP TABLE IF EXISTS `regions`;
CREATE TABLE `regions`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `region_name` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of regions
-- ----------------------------
INSERT INTO `regions` VALUES (1, 'Europe');
INSERT INTO `regions` VALUES (2, 'Americas');
INSERT INTO `regions` VALUES (3, 'Asia');
INSERT INTO `regions` VALUES (4, 'Middle East and Africa');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp(0) NULL DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------

SET FOREIGN_KEY_CHECKS = 1;
