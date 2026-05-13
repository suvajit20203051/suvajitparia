-- ============================================================
--  Suvajit Paria Portfolio Database
--  Import via phpMyAdmin: http://localhost/phpmyadmin
--  Database: suvajit_portfolio
-- ============================================================

CREATE DATABASE IF NOT EXISTS `suvajit_portfolio`
  DEFAULT CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE `suvajit_portfolio`;

-- ============================================================
--  TABLE: profile
-- ============================================================
DROP TABLE IF EXISTS `profile`;
CREATE TABLE `profile` (
  `id`            int(11)      NOT NULL AUTO_INCREMENT,
  `name`          varchar(100) NOT NULL,
  `tagline`       varchar(255) NOT NULL,
  `bio`           text         NOT NULL,
  `email`         varchar(100) NOT NULL,
  `phone`         varchar(20)  NOT NULL,
  `location`      varchar(100) NOT NULL,
  `github`        varchar(255) DEFAULT NULL,
  `linkedin`      varchar(255) DEFAULT NULL,
  `hackerrank`    varchar(255) DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT 'avatar.png',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `profile` VALUES (
  1,
  'Suvajit Paria',
  'Full Stack Web Developer | PHP CodeIgniter 3 | Java',
  'Enthusiastic and quick-learning IT professional with a B.E in Information Technology (CGPA 8.25). Proficient in Java, PHP CodeIgniter 3, MySQL, and full-stack web development. Experienced in building and deploying live production websites. Passionate about writing clean, maintainable code and delivering real-world solutions.',
  'suvajitparias@gmail.com',
  '+91-9002882160',
  'Midnapore, West Bengal, India',
  'https://github.com/suvajitparia',
  'https://www.linkedin.com/in/suvajit-paria-297376205/',
  'https://www.hackerrank.com/suvajitparias',
  'avatar.png'
);

-- ============================================================
--  TABLE: skills
-- ============================================================
DROP TABLE IF EXISTS `skills`;
CREATE TABLE `skills` (
  `id`         int(11)      NOT NULL AUTO_INCREMENT,
  `category`   varchar(50)  NOT NULL,
  `name`       varchar(100) NOT NULL,
  `percentage` int(3)       NOT NULL DEFAULT 80,
  `icon`       varchar(100) DEFAULT NULL,
  `sort_order` int(3)       DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `skills` (`category`, `name`, `percentage`, `icon`, `sort_order`) VALUES
('Languages', 'PHP (CodeIgniter 3)', 90, 'fab fa-php',         1),
('Languages', 'Java / OOP',          85, 'fab fa-java',        2),
('Languages', 'JavaScript',          78, 'fab fa-js',          3),
('Languages', 'HTML5',               95, 'fab fa-html5',       4),
('Languages', 'CSS3',                90, 'fab fa-css3-alt',    5),
('Backend',   'MVC Architecture',    88, 'fas fa-layer-group', 6),
('Backend',   'CRUD Operations',     92, 'fas fa-cogs',        7),
('Backend',   'JDBC / Hibernate',    75, 'fas fa-database',    8),
('Backend',   'REST Concepts',       72, 'fas fa-plug',        9),
('Databases', 'MySQL / phpMyAdmin',  90, 'fas fa-database',   10),
('Databases', 'PostgreSQL',          78, 'fas fa-database',   11),
('Databases', 'Oracle SQL',          70, 'fas fa-database',   12),
('Tools',     'Git / GitHub',        85, 'fab fa-github',     13),
('Tools',     'XAMPP',               90, 'fas fa-server',     14),
('Tools',     'VS Code / Eclipse',   88, 'fas fa-code',       15),
('Tools',     'Bootstrap 5',         88, 'fab fa-bootstrap',  16);

-- ============================================================
--  TABLE: projects
-- ============================================================
DROP TABLE IF EXISTS `projects`;
CREATE TABLE `projects` (
  `id`          int(11)      NOT NULL AUTO_INCREMENT,
  `title`       varchar(150) NOT NULL,
  `description` text         NOT NULL,
  `tech_stack`  varchar(255) NOT NULL,
  `live_url`    varchar(255) DEFAULT NULL,
  `github_url`  varchar(255) DEFAULT NULL,
  `image`       varchar(255) DEFAULT 'project-default.png',
  `category`    varchar(50)  DEFAULT 'Web',
  `featured`    tinyint(1)   DEFAULT 0,
  `sort_order`  int(3)       DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `projects` (`title`, `description`, `tech_stack`, `live_url`, `github_url`, `image`, `category`, `featured`, `sort_order`) VALUES
(
  'Apna Sehat',
  'A full-featured healthcare website with dynamic content management, appointment booking, and user modules. Built with MVC architecture for clean, maintainable code. Fully responsive UI for seamless experience across all devices.',
  'PHP CodeIgniter 3, MySQL, HTML5, CSS3, Bootstrap 5, JavaScript',
  'https://apnasehat.com',
  NULL,
  'apnasehat.png',
  'Healthcare',
  1,
  1
),
(
  'Bikshan.in',
  'A live e-commerce web application with product listings, cart management, and order processing. MVC-based architecture ensures modular and maintainable code. Integrated backend database with dynamic front-end for a complete full-stack solution.',
  'PHP CodeIgniter 3, MySQL, HTML5, CSS3, Bootstrap 5, JavaScript',
  'https://bikshan.in',
  NULL,
  'bikshan.png',
  'E-Commerce',
  1,
  2
),
(
  'Laptop Shop Management',
  'A desktop application for laptop inventory management with full CRUD operations. Features modular code structure, JDBC integration for PostgreSQL database connectivity, and a clean Swing-based GUI.',
  'Java, PostgreSQL, JDBC, Java Swing',
  NULL,
  'https://github.com/suvajitparia',
  'laptop-shop.png',
  'Desktop',
  0,
  3
);

-- ============================================================
--  TABLE: experience
-- ============================================================
DROP TABLE IF EXISTS `experience`;
CREATE TABLE `experience` (
  `id`          int(11)                    NOT NULL AUTO_INCREMENT,
  `company`     varchar(150)               NOT NULL,
  `role`        varchar(150)               NOT NULL,
  `duration`    varchar(100)               NOT NULL,
  `location`    varchar(100)               NOT NULL,
  `description` text                       NOT NULL,
  `type`        enum('work','training')    NOT NULL DEFAULT 'work',
  `sort_order`  int(3)                     DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `experience` (`company`, `role`, `duration`, `location`, `description`, `type`, `sort_order`) VALUES
(
  'Code Galaxy ITES',
  'Web Developer',
  'September 2025 – Present',
  'West Bengal, India',
  'Developed and maintained production web applications using PHP CodeIgniter 3 and MySQL. Built and deployed two live projects: apnasehat.com (healthcare) and bikshan.in (e-commerce). Implemented full-stack features covering front-end UI, back-end logic, database design, and MVC architecture. Collaborated with team on feature planning, bug fixing, and code reviews.',
  'work',
  1
),
(
  'JSpiders Kolkata',
  'Full Stack Java Developer (Training)',
  '2024 – 2025',
  'Kolkata, West Bengal',
  'Completed an intensive 12-month training program covering Core Java, OOP, JDBC, Hibernate ORM, HTML5, CSS3, JavaScript, Bootstrap, and SQL databases (MySQL and PostgreSQL). Built multiple mini-projects including a Laptop Shop Management System using Java and PostgreSQL.',
  'training',
  2
);

-- ============================================================
--  TABLE: education
-- ============================================================
DROP TABLE IF EXISTS `education`;
CREATE TABLE `education` (
  `id`          int(11)      NOT NULL AUTO_INCREMENT,
  `institution` varchar(200) NOT NULL,
  `degree`      varchar(200) NOT NULL,
  `year`        varchar(20)  NOT NULL,
  `location`    varchar(100) NOT NULL,
  `score`       varchar(50)  DEFAULT NULL,
  `sort_order`  int(3)       DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `education` (`institution`, `degree`, `year`, `location`, `score`, `sort_order`) VALUES
('University Institute of Technology, Burdwan University', 'B.E – Information Technology',  '2020 – 2024', 'West Bengal', 'CGPA: 8.25', 1),
('Khairullachak Netaji Vidyamandir',                       'Higher Secondary – WBCHSE',      '2020',         'West Bengal', '75.40%',     2),
('Khairullachak Netaji Vidyamandir',                       'Secondary – WBBSE',              '2018',         'West Bengal', '79.00%',     3);

-- ============================================================
--  TABLE: certifications
-- ============================================================
DROP TABLE IF EXISTS `certifications`;
CREATE TABLE `certifications` (
  `id`     int(11)      NOT NULL AUTO_INCREMENT,
  `title`  varchar(200) NOT NULL,
  `issuer` varchar(100) NOT NULL,
  `year`   varchar(10)  DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `certifications` (`title`, `issuer`, `year`) VALUES
('HTML5, CSS3 & JavaScript Bootcamp', 'Udemy',            '2024'),
('Java Full Stack Developer',          'JSpiders Kolkata', '2025'),
('PHP & MySQL Web Development',        'Udemy',            '2024');

-- ============================================================
--  TABLE: contact_messages
-- ============================================================
DROP TABLE IF EXISTS `contact_messages`;
CREATE TABLE `contact_messages` (
  `id`         int(11)      NOT NULL AUTO_INCREMENT,
  `name`       varchar(100) NOT NULL,
  `email`      varchar(100) NOT NULL,
  `subject`    varchar(200) DEFAULT NULL,
  `message`    text         NOT NULL,
  `created_at` datetime     DEFAULT CURRENT_TIMESTAMP,
  `is_read`    tinyint(1)   DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================================
--  TABLE: admin_users
-- ============================================================
DROP TABLE IF EXISTS `admin_users`;
CREATE TABLE `admin_users` (
  `id`         int(11)      NOT NULL AUTO_INCREMENT,
  `username`   varchar(50)  NOT NULL UNIQUE,
  `password`   varchar(255) NOT NULL,
  `is_active`  tinyint(1)   DEFAULT 1,
  `last_login` datetime     DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Default credentials: admin / admin123  (change after first login!)
INSERT INTO `admin_users` (`username`, `password`) VALUES
('admin', '$2y$10$K09AWK6tYwTnALAhinZDeeXhnQrpd43JbW9jMiP10M6TxSvkybJVi');
