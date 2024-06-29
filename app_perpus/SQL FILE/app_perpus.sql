-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2024 at 11:18 AM
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
-- Database: `app_perpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `ID` int(11) NOT NULL,
  `NIK` varchar(255) NOT NULL,
  `NamaLengkap` varchar(255) NOT NULL,
  `Alamat` text NOT NULL,
  `NoTelp` varchar(255) NOT NULL,
  `TglRegistrasi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`ID`, `NIK`, `NamaLengkap`, `Alamat`, `NoTelp`, `TglRegistrasi`) VALUES
(7, '1234567', 'Bintang Arya Pratama', 'Jalan Sawojajar 2', '0838428323', '2024-01-22'),
(28, '1234567', 'Melvyn ', 'Singosari', '082131321111', '2024-01-25');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `ID` int(11) NOT NULL,
  `ISBN` varchar(255) NOT NULL,
  `Judul` varchar(255) NOT NULL,
  `Pengarang` varchar(255) NOT NULL,
  `Kategori_ID` int(11) NOT NULL,
  `Penerbit_ID` int(11) NOT NULL,
  `Deskripsi` text NOT NULL,
  `Stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`ID`, `ISBN`, `Judul`, `Pengarang`, `Kategori_ID`, `Penerbit_ID`, `Deskripsi`, `Stok`) VALUES
(42, '122121', 'AKU KAYA', 'Melvyn', 21212214, 12347, 'AKU KAYA', 12212),
(47, 'sasas', 'sasasasa', 'sasas', 12345, 12346, 'sas', 12);

-- --------------------------------------------------------

--
-- Table structure for table `detailpeminjaman`
--

CREATE TABLE `detailpeminjaman` (
  `ID` int(11) NOT NULL,
  `Peminjaman_ID` int(11) NOT NULL,
  `Buku_ID` int(11) NOT NULL,
  `Jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `ID` int(11) NOT NULL,
  `NamaKategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`ID`, `NamaKategori`) VALUES
(12345, 'Horror'),
(21212214, 'Action'),
(21212215, 'Lucu'),
(21212216, 'HAHA');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `ID` int(11) NOT NULL,
  `Anggota_ID` int(11) NOT NULL,
  `TglPinjam` date NOT NULL,
  `JadwalKembali` date NOT NULL,
  `TglKembali` date DEFAULT NULL,
  `Denda` int(11) NOT NULL DEFAULT 0,
  `Petugas_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`ID`, `Anggota_ID`, `TglPinjam`, `JadwalKembali`, `TglKembali`, `Denda`, `Petugas_ID`) VALUES
(10, 7, '1111-11-11', '1111-11-11', '1111-11-11', 11, 5),
(12, 28, '1111-11-11', '1111-11-11', '1111-11-11', 11, 10),
(13, 7, '2024-02-01', '2024-02-03', '0000-00-00', 0, 10);

-- --------------------------------------------------------

--
-- Table structure for table `penerbit`
--

CREATE TABLE `penerbit` (
  `ID` int(11) NOT NULL,
  `NamaPenerbit` varchar(255) NOT NULL,
  `Alamat` text NOT NULL,
  `NoTelp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penerbit`
--

INSERT INTO `penerbit` (`ID`, `NamaPenerbit`, `Alamat`, `NoTelp`) VALUES
(12345, 'Bintang', 'Jalan Danau Ranau', '08123'),
(12346, 'Melvyn', 'Jalan Danau Ranau', '1212121212'),
(12347, 'HAHHAHAHA', 'Jalan Danau Ranau', '1212121212212'),
(12348, 'Hayuk', 'Jalan Danau Ranau', '12121'),
(12349, 'Hayuk212', 'Jalan Danau Ranau', '12121desde');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `ID` int(11) NOT NULL,
  `NamaPetugas` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `NomorTelp` varchar(15) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Role` enum('Admin','Staf','Karyawan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`ID`, `NamaPetugas`, `Email`, `NomorTelp`, `Password`, `Role`) VALUES
(5, 'Bintang', 'bintang@gmail.com', '1212', '12345', 'Staf'),
(10, 'Melvyn', 'user1@gmail.com', '21212', 'password', 'Admin'),
(16, 'Bintang121', 'wqwqwqw', 'wqwqw', 'wqwqw', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ISBN` (`ISBN`),
  ADD KEY `Kategori_ID` (`Kategori_ID`),
  ADD KEY `Penerbit_ID` (`Penerbit_ID`);

--
-- Indexes for table `detailpeminjaman`
--
ALTER TABLE `detailpeminjaman`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Peminjaman_ID` (`Peminjaman_ID`),
  ADD KEY `Buku_ID` (`Buku_ID`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Anggota_ID` (`Anggota_ID`),
  ADD KEY `Petugas_ID` (`Petugas_ID`);

--
-- Indexes for table `penerbit`
--
ALTER TABLE `penerbit`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `detailpeminjaman`
--
ALTER TABLE `detailpeminjaman`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21212218;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `penerbit`
--
ALTER TABLE `penerbit`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12350;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_ibfk_2` FOREIGN KEY (`Kategori_ID`) REFERENCES `kategori` (`ID`),
  ADD CONSTRAINT `buku_ibfk_3` FOREIGN KEY (`Penerbit_ID`) REFERENCES `penerbit` (`ID`);

--
-- Constraints for table `detailpeminjaman`
--
ALTER TABLE `detailpeminjaman`
  ADD CONSTRAINT `detailpeminjaman_ibfk_1` FOREIGN KEY (`Peminjaman_ID`) REFERENCES `peminjaman` (`ID`),
  ADD CONSTRAINT `detailpeminjaman_ibfk_2` FOREIGN KEY (`Buku_ID`) REFERENCES `buku` (`ID`);

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`Petugas_ID`) REFERENCES `petugas` (`ID`),
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`Anggota_ID`) REFERENCES `anggota` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
