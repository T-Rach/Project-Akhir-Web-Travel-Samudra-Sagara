-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 28 Jun 2024 pada 17.53
-- Versi server: 8.2.0
-- Versi PHP: 8.2.19

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
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `Id_Admin` int NOT NULL,
  `Email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `Password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`Id_Admin`, `Email`, `Password`) VALUES
(1, 'admin@konoha.com', 'admin123'),
(2, 'admin2@konoha.com', 'admin456'),
(3, 'admin@admin.com', 'password');

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `Id_Customer` int NOT NULL,
  `Nama` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `Customer_Mobile` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `Alamat` text COLLATE utf8mb4_general_ci,
  `Username` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `Password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`Id_Customer`, `Nama`, `Customer_Mobile`, `Email`, `Alamat`, `Username`, `Password`) VALUES
(1, 'hashirama', '081234567890', 'hashirama@konoha.com', 'Jl. Kebon Jeruk No. 15', 'hashirama', 'password123'),
(2, 'tobirama', '081987654321', 'tobirama@konoha.com', 'Jl. Melati No. 20', 'tobirama', 'mypassword');

-- --------------------------------------------------------

--
-- Struktur dari tabel `destinasi`
--

CREATE TABLE `destinasi` (
  `Destinasi_Id` int NOT NULL,
  `Nama_Destinasi` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `Kapasitas` int DEFAULT NULL,
  `harga` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `destinasi`
--

INSERT INTO `destinasi` (`Destinasi_Id`, `Nama_Destinasi`, `Kapasitas`, `harga`, `address`, `gambar`) VALUES
(1, 'Bali', 100, '50000', 'Bali', 'exampl.webp'),
(2, 'Yogyakarta', 200, '150000', 'Jawa Tengah', 'exampl.webp'),
(3, 'Dufan Ancol', 100, '500000', 'Taman Impian Jaya Ancol. Jl. Lodan Timur No.7, RW.10, Ancol, Kec. Pademangan', 'ancol1.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hotel`
--

CREATE TABLE `hotel` (
  `Hotel_Id` int NOT NULL,
  `Nama_Hotel` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `Hoteladdress` text COLLATE utf8mb4_general_ci,
  `Ketersediaan` int DEFAULT NULL,
  `Kamar` int DEFAULT NULL,
  `Hotel_Rent` decimal(10,2) DEFAULT NULL,
  `diskon` int NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `hotel`
--

INSERT INTO `hotel` (`Hotel_Id`, `Nama_Hotel`, `Hoteladdress`, `Ketersediaan`, `Kamar`, `Hotel_Rent`, `diskon`, `gambar`) VALUES
(1, 'Hotel Indonesia', 'Jl. MH Thamrin No. 1', 50, 100, 1500000.00, 25, 'hotel.jpg'),
(2, 'Hotel Merdeka', 'Jl. Sudirman No. 5', 30, 60, 1000000.00, 35, 'hotel.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `Payment_Id` int NOT NULL,
  `Total_Pembayaran` decimal(10,2) DEFAULT NULL,
  `Tanggal_Pembayaran` datetime NOT NULL,
  `Id_Customer` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`Payment_Id`, `Total_Pembayaran`, `Tanggal_Pembayaran`, `Id_Customer`) VALUES
(1, 1500000.00, '2024-06-20 10:00:00', 1),
(2, 1000000.00, '2024-06-21 11:00:00', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int NOT NULL,
  `tipe_pemesanan` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `booking_description` text COLLATE utf8mb4_general_ci,
  `flight_id` int DEFAULT NULL,
  `hotelid` int DEFAULT NULL,
  `destination_id` int DEFAULT NULL,
  `preferensi_pembayaran` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_customer` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `total` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `tipe_pemesanan`, `booking_description`, `flight_id`, `hotelid`, `destination_id`, `preferensi_pembayaran`, `nama_customer`, `total`, `status`) VALUES
(5, 'Hotel', '2024-06-29 - 2024-06-13 <br> Total Guest : 3 <br> Rooms : 2', NULL, 2, NULL, 'pay_now', 'Rehan', '2000000', 'On Proccess'),
(6, 'Destination', 'Asal : Makassar <br> NO HP : 0892834232', NULL, NULL, 2, 'pay_at_hotel', 'Asep', '150000', 'Rejected'),
(7, 'Flight', 'Asal : Maka <br> NO HP : 089234234', 2, NULL, NULL, 'pay_now', 'Ipheng', '1450000', 'Done');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesawat`
--

CREATE TABLE `pesawat` (
  `Flight_Id` int NOT NULL,
  `Pesawat` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `tujuan` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `Waktu_Keberangkatan` datetime NOT NULL,
  `Keberangkatan` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `class` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pesawat`
--

INSERT INTO `pesawat` (`Flight_Id`, `Pesawat`, `tujuan`, `Waktu_Keberangkatan`, `Keberangkatan`, `price`, `class`) VALUES
(1, 'Garuda Indonesia', 'Bali (DPS)', '2024-07-01 08:00:00', 'Jakarta (CGK)', '1500000', 'economy'),
(2, 'Lion Air', 'Yogyakarta', '2024-07-02 09:00:00', 'Jakarta (CGK)', '1450000', 'bussiness');

-- --------------------------------------------------------

--
-- Struktur dari tabel `review`
--

CREATE TABLE `review` (
  `Id_Review` int NOT NULL,
  `Rating` int NOT NULL,
  `Comment` text COLLATE utf8mb4_general_ci,
  `Customer` int DEFAULT NULL,
  `Tourpackage` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `review`
--

INSERT INTO `review` (`Id_Review`, `Rating`, `Comment`, `Customer`, `Tourpackage`) VALUES
(1, 5, 'Layanan bagus', 1, 1),
(2, 4, 'layanan sangat memuaskan', 2, 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Id_Admin`);

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Id_Customer`);

--
-- Indeks untuk tabel `destinasi`
--
ALTER TABLE `destinasi`
  ADD PRIMARY KEY (`Destinasi_Id`);

--
-- Indeks untuk tabel `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`Hotel_Id`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`Payment_Id`),
  ADD KEY `Id_Customer` (`Id_Customer`);

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`),
  ADD KEY `flight_id` (`flight_id`),
  ADD KEY `hotelid` (`hotelid`),
  ADD KEY `destination_id` (`destination_id`);

--
-- Indeks untuk tabel `pesawat`
--
ALTER TABLE `pesawat`
  ADD PRIMARY KEY (`Flight_Id`);

--
-- Indeks untuk tabel `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`Id_Review`),
  ADD KEY `Customer` (`Customer`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `Id_Admin` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `customer`
--
ALTER TABLE `customer`
  MODIFY `Id_Customer` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `destinasi`
--
ALTER TABLE `destinasi`
  MODIFY `Destinasi_Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `hotel`
--
ALTER TABLE `hotel`
  MODIFY `Hotel_Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `Payment_Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `pesawat`
--
ALTER TABLE `pesawat`
  MODIFY `Flight_Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `review`
--
ALTER TABLE `review`
  MODIFY `Id_Review` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`Id_Customer`) REFERENCES `customer` (`Id_Customer`);

--
-- Ketidakleluasaan untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`flight_id`) REFERENCES `pesawat` (`Flight_Id`),
  ADD CONSTRAINT `pemesanan_ibfk_2` FOREIGN KEY (`hotelid`) REFERENCES `hotel` (`Hotel_Id`),
  ADD CONSTRAINT `pemesanan_ibfk_3` FOREIGN KEY (`destination_id`) REFERENCES `destinasi` (`Destinasi_Id`);

--
-- Ketidakleluasaan untuk tabel `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`Customer`) REFERENCES `customer` (`Id_Customer`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
