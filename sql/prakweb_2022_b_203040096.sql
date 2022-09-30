-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2022 at 09:57 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prakweb_2022_b_203040096`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `judul` varchar(80) NOT NULL,
  `penulis` varchar(80) NOT NULL,
  `penerbit` varchar(30) NOT NULL,
  `tahun_terbit` varchar(4) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id`, `judul`, `penulis`, `penerbit`, `tahun_terbit`, `gambar`) VALUES
(5, 'Death Note Short Stories', 'Tsugumi Ohba', 'm&c!', '2022', 'Death-Note.jpg'),
(7, 'One Piece 98', 'Eiichiro Oda', 'Elex Media Komputindo', '2022', 'One_Piece_98.jpg'),
(10, 'Blue Lock 01', 'Muneyuki Kaneshiro & Yasuke Nomura', 'Elex Media Komputindo', '2022', 'Blue_Lock_01.jpg'),
(11, 'Tokyo Ravengers 01', 'Ken Wakui', 'Elex Media Komputindo', '2022', 'Tokyo_Revengers_1.jpg'),
(14, 'Shaman King Complete Edition 03', 'Hiroyuki Takei', 'Elex Media Komputindo', '2022', 'Shaman_King_CE_03.jpg'),
(15, 'Jujutsu Kaisen 05', 'Gege Akutami', 'Elex Media Komputindo', '2022', 'Jujutsukaisen_5.jpg'),
(16, 'Detective Conan 100', 'Aoyama Gosho', 'Elex Media Komputindo', '2022', 'Conan_100.jpg'),
(17, 'Spy X Family 01', 'Endo Tetsuya', 'Elex Media Komputindo', '2022', 'Spy_x_Family_01.jpg'),
(18, 'Hai Miiko 34', 'Ono Eriko', 'm&c!', '2022', 'Hai-Miiko--34.jpeg'),
(30, 'Komik Next G: Rahasia Rambut Kakak Rpl', 'Azka Aulia Rahman &amp; Mei', 'Mizan Media Utama Pt', '2022', 'Kom17914.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
