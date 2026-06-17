-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 17, 2026 at 05:00 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_latihan_pbo_trpl1b_lanjuwidhunua`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_tiket`
--

CREATE TABLE `tabel_tiket` (
  `id_tiket` int NOT NULL,
  `nama_film` varchar(100) NOT NULL,
  `jadwal_tayang` datetime NOT NULL,
  `jumlah_kursi` int NOT NULL,
  `harga_dasar_tiket` decimal(10,2) NOT NULL,
  `jenis_studio` enum('Regular','IMAX','Velvet') NOT NULL,
  `tipe_audio` varchar(50) DEFAULT NULL,
  `lokasi_baris` varchar(50) DEFAULT NULL,
  `kacamata_3d_id` varchar(50) DEFAULT NULL,
  `efek_gerak_fitur` varchar(100) DEFAULT NULL,
  `bantal_selimut_pack` varchar(100) DEFAULT NULL,
  `layanan_butler` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tabel_tiket`
--

INSERT INTO `tabel_tiket` (`id_tiket`, `nama_film`, `jadwal_tayang`, `jumlah_kursi`, `harga_dasar_tiket`, `jenis_studio`, `tipe_audio`, `lokasi_baris`, `kacamata_3d_id`, `efek_gerak_fitur`, `bantal_selimut_pack`, `layanan_butler`) VALUES
(1, 'Avengers Endgame', '2026-06-20 19:00:00', 2, 50000.00, 'Regular', 'Dolby Atmos', 'A1', NULL, NULL, NULL, NULL),
(2, 'Spider-Man No Way Home', '2026-06-21 20:00:00', 3, 50000.00, 'Regular', 'Stereo', 'B2', NULL, NULL, NULL, NULL),
(3, 'The Batman', '2026-06-22 18:30:00', 2, 55000.00, 'Regular', 'Dolby Digital', 'C3', NULL, NULL, NULL, NULL),
(4, 'Doctor Strange', '2026-06-23 21:00:00', 4, 50000.00, 'Regular', 'Surround', 'D4', NULL, NULL, NULL, NULL),
(5, 'Black Panther', '2026-06-24 17:00:00', 2, 55000.00, 'Regular', 'Dolby Atmos', 'E5', NULL, NULL, NULL, NULL),
(6, 'Iron Man', '2026-06-25 19:30:00', 3, 50000.00, 'Regular', 'Stereo', 'F6', NULL, NULL, NULL, NULL),
(7, 'Captain America', '2026-06-26 20:15:00', 2, 55000.00, 'Regular', 'Dolby Digital', 'G7', NULL, NULL, NULL, NULL),
(8, 'Avatar 3', '2026-06-20 20:00:00', 2, 75000.00, 'IMAX', NULL, NULL, 'IMX001', 'Motion Seat', NULL, NULL),
(9, 'Jurassic World', '2026-06-21 18:00:00', 4, 75000.00, 'IMAX', NULL, NULL, 'IMX002', 'Vibration Effect', NULL, NULL),
(10, 'Interstellar', '2026-06-22 19:30:00', 2, 80000.00, 'IMAX', NULL, NULL, 'IMX003', 'Motion Seat', NULL, NULL),
(11, 'Dune Part Two', '2026-06-23 20:00:00', 3, 80000.00, 'IMAX', NULL, NULL, 'IMX004', '4D Effect', NULL, NULL),
(12, 'Top Gun Maverick', '2026-06-24 21:00:00', 2, 75000.00, 'IMAX', NULL, NULL, 'IMX005', 'Motion Seat', NULL, NULL),
(13, 'Transformers', '2026-06-25 19:00:00', 4, 75000.00, 'IMAX', NULL, NULL, 'IMX006', 'Vibration Effect', NULL, NULL),
(14, 'Godzilla x Kong', '2026-06-26 18:30:00', 3, 80000.00, 'IMAX', NULL, NULL, 'IMX007', '4D Effect', NULL, NULL),
(15, 'Titanic', '2026-06-20 17:00:00', 2, 100000.00, 'Velvet', NULL, NULL, NULL, NULL, 'Premium Pack', 'Available'),
(16, 'The Notebook', '2026-06-21 19:00:00', 2, 100000.00, 'Velvet', NULL, NULL, NULL, NULL, 'Luxury Pack', 'Available'),
(17, 'La La Land', '2026-06-22 20:00:00', 2, 110000.00, 'Velvet', NULL, NULL, NULL, NULL, 'Premium Pack', 'Available'),
(18, 'Me Before You', '2026-06-23 18:00:00', 2, 110000.00, 'Velvet', NULL, NULL, NULL, NULL, 'Luxury Pack', 'Available'),
(19, 'A Star Is Born', '2026-06-24 21:00:00', 3, 100000.00, 'Velvet', NULL, NULL, NULL, NULL, 'Premium Pack', 'Available'),
(20, 'The Fault in Our Stars', '2026-06-25 19:30:00', 2, 110000.00, 'Velvet', NULL, NULL, NULL, NULL, 'Luxury Pack', 'Available');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_tiket`
--
ALTER TABLE `tabel_tiket`
  ADD PRIMARY KEY (`id_tiket`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_tiket`
--
ALTER TABLE `tabel_tiket`
  MODIFY `id_tiket` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
