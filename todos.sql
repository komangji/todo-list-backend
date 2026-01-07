-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 07, 2026 at 08:33 AM
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
-- Database: `todolist_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `todos`
--

CREATE TABLE `todos` (
  `id` int(11) NOT NULL,
  `due_date` date DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` enum('pending','done') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `todos`
--

INSERT INTO `todos` (`id`, `due_date`, `title`, `description`, `status`, `created_at`) VALUES
(1, '2026-01-08', 'Latihan Java Swing', 'Bahasa Pemrograman Java', 'pending', '2026-01-04 23:55:41'),
(2, '2026-01-08', 'Inbox Zero Mission', 'Buka dan balas pesan atau email yang tertunda agar tidak menumpuk dan bikin pikiran penuh.', 'done', '2026-01-07 07:09:29'),
(3, '2026-01-09', 'Self-Care Minute', 'Ambil waktu sejenak untuk diri sendiri: tarik napas dalam, cuci muka, atau dengerin lagu favorit.', 'pending', '2026-01-07 07:17:32'),
(4, '2026-01-09', 'Skill Upgrade Session', 'Pelajari satu hal baru, sekecil apa pun—tonton video singkat, baca artikel, atau coba fitur baru.', 'done', '2026-01-07 07:17:53'),
(5, '2026-01-11', 'Finance Check', 'Catat pengeluaran hari ini dan cek saldo supaya keuangan tetap terkontrol.', 'pending', '2026-01-07 07:18:18'),
(6, '2026-01-11', 'Early Night Prep', 'Siapkan baju, tas, dan rencana besok agar pagi lebih tenang dan tidak terburu-buru.', 'done', '2026-01-07 07:18:34'),
(7, '2026-01-09', 'Reflect & Plan', 'Tulis 3 hal yang kamu pelajari hari ini dan 1 target kecil untuk esok hari agar progres tetap konsisten.', 'pending', '2026-01-07 07:19:24'),
(8, '2026-01-08', 'Move Your Body', 'Lakukan aktivitas fisik ringan seperti stretching, jalan kaki, atau workout singkat untuk menjaga energi.', 'done', '2026-01-07 07:19:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `todos`
--
ALTER TABLE `todos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `todos`
--
ALTER TABLE `todos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
