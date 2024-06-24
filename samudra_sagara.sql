-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2024 at 01:59 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `samudra_sagara`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Id_Admin` int(11) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Id_Admin`, `Email`, `Password`) VALUES
(1, 'admin@konoha.com', 'admin123'),
(2, 'admin2@konoha.com', 'admin456');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Id_Customer` int(11) NOT NULL,
  `Nama` varchar(255) NOT NULL,
  `Customer_Mobile` varchar(20) DEFAULT NULL,
  `Email` varchar(255) NOT NULL,
  `Alamat` text DEFAULT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Id_Customer`, `Nama`, `Customer_Mobile`, `Email`, `Alamat`, `Username`, `Password`) VALUES
(1, 'hashirama', '081234567890', 'hashirama@konoha.com', 'Jl. Kebon Jeruk No. 15', 'hashirama', 'password123'),
(2, 'tobirama', '081987654321', 'tobirama@konoha.com', 'Jl. Melati No. 20', 'tobirama', 'mypassword');

-- --------------------------------------------------------

--
-- Table structure for table `destinasi`
--

CREATE TABLE `destinasi` (
  `Destinasi_Id` int(11) NOT NULL,
  `Nama_Destinasi` varchar(255) NOT NULL,
  `Kapasitas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `destinasi`
--

INSERT INTO `destinasi` (`Destinasi_Id`, `Nama_Destinasi`, `Kapasitas`) VALUES
(1, 'Bali', 100),
(2, 'Yogyakarta', 200);

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `Hotel_Id` int(11) NOT NULL,
  `Nama_Hotel` varchar(255) NOT NULL,
  `Hoteladdress` text DEFAULT NULL,
  `Ketersediaan` int(11) DEFAULT NULL,
  `Kamar` int(11) DEFAULT NULL,
  `Hotel_Rent` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`Hotel_Id`, `Nama_Hotel`, `Hoteladdress`, `Ketersediaan`, `Kamar`, `Hotel_Rent`) VALUES
(1, 'Hotel Indonesia', 'Jl. MH Thamrin No. 1', 50, 100, 1500000.00),
(2, 'Hotel Merdeka', 'Jl. Sudirman No. 5', 30, 60, 1000000.00);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `Payment_Id` int(11) NOT NULL,
  `Total_Pembayaran` decimal(10,2) DEFAULT NULL,
  `Tanggal_Pembayaran` datetime NOT NULL,
  `Id_Customer` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`Payment_Id`, `Total_Pembayaran`, `Tanggal_Pembayaran`, `Id_Customer`) VALUES
(1, 1500000.00, '2024-06-20 10:00:00', 1),
(2, 1000000.00, '2024-06-21 11:00:00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int(11) NOT NULL,
  `tipe_pemesanan` varchar(255) DEFAULT NULL,
  `booking_description` text DEFAULT NULL,
  `flight_id` int(11) DEFAULT NULL,
  `hotelid` int(11) DEFAULT NULL,
  `destination_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `tipe_pemesanan`, `booking_description`, `flight_id`, `hotelid`, `destination_id`) VALUES
(1, 'Flight', 'Pemesanan penerbangan ke Bali', 1, NULL, 1),
(2, 'Hotel', 'Pemesanan hotel di Yogyakarta', NULL, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `pesawat`
--

CREATE TABLE `pesawat` (
  `Flight_Id` int(11) NOT NULL,
  `Pesawat` varchar(255) NOT NULL,
  `tujuan` varchar(255) NOT NULL,
  `Waktu_Keberangkatan` datetime NOT NULL,
  `Keberangkatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pesawat`
--

INSERT INTO `pesawat` (`Flight_Id`, `Pesawat`, `tujuan`, `Waktu_Keberangkatan`, `Keberangkatan`) VALUES
(1, 'Garuda Indonesia', 'Bali', '2024-07-01 08:00:00', 'Jakarta'),
(2, 'Lion Air', 'Yogyakarta', '2024-07-02 09:00:00', 'Jakarta');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `Id_Review` int(11) NOT NULL,
  `Rating` int(11) NOT NULL,
  `Comment` text DEFAULT NULL,
  `Customer` int(11) DEFAULT NULL,
  `Tourpackage` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`Id_Review`, `Rating`, `Comment`, `Customer`, `Tourpackage`) VALUES
(1, 5, 'Layanan bagus', 1, 1),
(2, 4, 'layanan sangat memuaskan', 2, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Id_Admin`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Id_Customer`);

--
-- Indexes for table `destinasi`
--
ALTER TABLE `destinasi`
  ADD PRIMARY KEY (`Destinasi_Id`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`Hotel_Id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`Payment_Id`),
  ADD KEY `Id_Customer` (`Id_Customer`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`),
  ADD KEY `flight_id` (`flight_id`),
  ADD KEY `hotelid` (`hotelid`),
  ADD KEY `destination_id` (`destination_id`);

--
-- Indexes for table `pesawat`
--
ALTER TABLE `pesawat`
  ADD PRIMARY KEY (`Flight_Id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`Id_Review`),
  ADD KEY `Customer` (`Customer`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Id_Admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `Id_Customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `destinasi`
--
ALTER TABLE `destinasi`
  MODIFY `Destinasi_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `Hotel_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `Payment_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pesawat`
--
ALTER TABLE `pesawat`
  MODIFY `Flight_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `Id_Review` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`Id_Customer`) REFERENCES `customer` (`Id_Customer`);

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`flight_id`) REFERENCES `pesawat` (`Flight_Id`),
  ADD CONSTRAINT `pemesanan_ibfk_2` FOREIGN KEY (`hotelid`) REFERENCES `hotel` (`Hotel_Id`),
  ADD CONSTRAINT `pemesanan_ibfk_3` FOREIGN KEY (`destination_id`) REFERENCES `destinasi` (`Destinasi_Id`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`Customer`) REFERENCES `customer` (`Id_Customer`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
