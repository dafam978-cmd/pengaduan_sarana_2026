-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 07, 2026 at 02:32 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pengaduan_sarana`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500');

-- --------------------------------------------------------

--
-- Table structure for table `tb_aspirasi`
--

CREATE TABLE `tb_aspirasi` (
  `id_aspirasi` int NOT NULL,
  `id_pelaporan` int DEFAULT NULL,
  `nis` int DEFAULT NULL,
  `status` enum('Menunggu','Proses','Selesai') DEFAULT 'Menunggu',
  `feedback` text,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_aspirasi`
--

INSERT INTO `tb_aspirasi` (`id_aspirasi`, `id_pelaporan`, `nis`, `status`, `feedback`, `foto`) VALUES
(1, NULL, NULL, 'Selesai', '1', NULL),
(2, 1, NULL, 'Selesai', 'mantap', NULL),
(3, 3, NULL, 'Selesai', 'cocok', NULL),
(4, 4, NULL, 'Proses', 'mantap', NULL),
(5, 5, NULL, 'Selesai', 'udah diberesan bos', NULL),
(6, 2, NULL, 'Selesai', 'udah dibenerin', NULL),
(7, 6, NULL, 'Proses', 'bentar ya masi dalam tahap proses', NULL),
(8, 7, NULL, 'Selesai', 'uda anjay', NULL),
(9, 9, NULL, 'Selesai', 'sabar bro', NULL),
(10, 10, NULL, 'Proses', 'sudah', NULL),
(11, 12, NULL, 'Proses', 'amat', NULL),
(12, 14, NULL, 'Selesai', '0', NULL),
(13, 15, NULL, 'Selesai', 'tunggu bro', NULL),
(14, 16, NULL, 'Proses', 'man', NULL),
(15, 17, NULL, 'Menunggu', 'hehee', NULL),
(16, 19, NULL, 'Selesai', 'kalem kuurang motor na  rek diduruk', NULL),
(17, 21, NULL, 'Selesai', '-', NULL),
(18, 24, NULL, 'Selesai', '-', NULL),
(19, 23, NULL, 'Selesai', '-', NULL),
(20, 22, NULL, 'Selesai', '-', NULL),
(21, 20, NULL, 'Selesai', '-', NULL),
(22, 27, NULL, 'Selesai', '-', NULL),
(23, 28, NULL, 'Selesai', '-', NULL),
(24, 29, NULL, 'Menunggu', '-', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_input_aspirasi`
--

CREATE TABLE `tb_input_aspirasi` (
  `id_pelaporan` int NOT NULL,
  `nis` int DEFAULT NULL,
  `id_kategori` int DEFAULT NULL,
  `lokasi` varchar(50) DEFAULT NULL,
  `ket` varchar(50) DEFAULT NULL,
  `tgl_input` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_input_aspirasi`
--

INSERT INTO `tb_input_aspirasi` (`id_pelaporan`, `nis`, `id_kategori`, `lokasi`, `ket`, `tgl_input`, `foto`) VALUES
(1, 1111, 1, 'XII MP 2', 'kursi rusak', '2026-02-04 02:01:08', NULL),
(2, 1111, 2, 'lapang', 'rusak', '2026-02-04 02:01:08', NULL),
(3, 1111, 3, 'XII RPL 4', 'mantap', '2026-02-04 02:01:08', NULL),
(4, 1111, 4, 'XII MP 2', 'sapu', '2026-02-04 02:44:45', NULL),
(5, 1111, 1, 'XII RPL 4', 'kelas pabalatak', '2026-02-04 06:43:26', NULL),
(6, 1111, 2, 'lapang', 'ring bola basket bolong', '2026-02-04 13:39:01', NULL),
(7, 1111, 3, 'Ruang Guru', 'ac rusak', '2026-02-04 13:57:17', NULL),
(9, 1111, 2, 'lapang', 'basket', '2026-02-05 01:27:27', NULL),
(10, 2222, 4, 'wc', 'kurang bersih men', '2026-02-05 02:04:42', NULL),
(11, 1111, 2, 'lapang', 'madindundin', '2026-02-05 02:19:15', NULL),
(12, 1111, 3, 'dekat kantin', 'kotor', '2026-02-05 02:29:35', NULL),
(14, 1111, 4, 'kantin', 'kotor\r\n', '2026-02-06 03:03:35', NULL),
(15, 1111, 2, 'masjid', 'karpet debuan', '2026-02-06 07:19:15', NULL),
(16, 1111, 2, 'kursi belakang', 'mantap', '2026-02-06 07:57:27', NULL),
(17, 1111, 8, 'halaman sekolah', 'pot bunga rusak', '2026-02-07 23:46:12', NULL),
(18, 1111, 1, 'dekat mushola', 'kekurangan sendal jadi kotor', '2026-02-09 04:22:33', NULL),
(19, 1111, 10, 'parkiran', 'beat  deluxe hitam helm coklat solasi\r\n', '2026-02-10 01:54:56', NULL),
(20, 1111, 6, 'saung', 'kayu na potong', '2026-02-10 02:24:22', NULL),
(21, 1111, 2, 'lapang', 'basket rusak\r\n', '2026-02-10 02:31:25', NULL),
(22, 1111, 4, 'toilet', 'pintu rusak\r\n', '2026-02-10 02:41:29', NULL),
(23, 1111, 5, 'deket lapang', 'takda sendal', '2026-02-10 02:42:46', NULL),
(24, 1111, 5, 'dekat kelas mp 2', 'tembok nya rusak', '2026-02-10 03:14:47', NULL),
(26, 1111, 1, 'kursi belakang', 'kursi belakang', '2026-02-14 05:40:11', NULL),
(27, 1111, 8, 'Ruang Guru', 'bunga layu', '2026-02-16 06:54:12', NULL),
(28, 1111, 2, 'lapang', 'abc', '2026-02-21 14:58:57', '1771685937_1111.png'),
(29, 1111, 6, 'Ruang Guru', 'bocor\r\n', '2026-03-31 01:05:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int NOT NULL,
  `ket_kategori` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `ket_kategori`) VALUES
(1, 'Sarana Kelas'),
(2, 'Fasilitas Olahraga'),
(3, 'Lingkungan Sekolah'),
(4, 'Layanan Kebersihan'),
(5, 'masjid'),
(6, 'saung'),
(7, 'XII RPL 4'),
(8, 'taman'),
(9, 'tepa'),
(10, 'parkir motor');

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `nis` int NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`nis`, `kelas`, `password`) VALUES
(222, 'XII RPL 4', '8bc1aa6f600087586c00a2a744f92c7f'),
(444, 'XII RPL 4', 'siswa1'),
(1111, 'XII MP 2', '2fea6c02a98d6318d44cdf150775f07a'),
(2222, 'XII RPL 4', '29d3cdd3ac163cfa4a275cda40642b00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_aspirasi`
--
ALTER TABLE `tb_aspirasi`
  ADD PRIMARY KEY (`id_aspirasi`),
  ADD KEY `nis` (`nis`);

--
-- Indexes for table `tb_input_aspirasi`
--
ALTER TABLE `tb_input_aspirasi`
  ADD PRIMARY KEY (`id_pelaporan`),
  ADD KEY `nis` (`nis`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`nis`),
  ADD KEY `nis` (`nis`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_aspirasi`
--
ALTER TABLE `tb_aspirasi`
  MODIFY `id_aspirasi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tb_input_aspirasi`
--
ALTER TABLE `tb_input_aspirasi`
  MODIFY `id_pelaporan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_aspirasi`
--
ALTER TABLE `tb_aspirasi`
  ADD CONSTRAINT `tb_aspirasi_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `tb_siswa` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_input_aspirasi`
--
ALTER TABLE `tb_input_aspirasi`
  ADD CONSTRAINT `tb_input_aspirasi_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `tb_siswa` (`nis`) ON DELETE CASCADE,
  ADD CONSTRAINT `tb_input_aspirasi_ibfk_2` FOREIGN KEY (`id_kategori`) REFERENCES `tb_kategori` (`id_kategori`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
