-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2021 at 11:21 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_poloskuy`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` varchar(8) NOT NULL,
  `nama_admin` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `id_level` tinyint(2) NOT NULL,
  `img` varchar(100) NOT NULL,
  `img_resize` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `email`, `username`, `password`, `id_level`, `img`, `img_resize`) VALUES
('AD0FJRTE', 'Muhammad Akbar Rayyan', 'akbar@gmail.com', 'akbar_ray', '112233', 1, 'face_admin.jpg', 'face_admin.jpgface_admin.jpg'),
('ADA23FDI', 'Fikri Zamzam', 'fikrizamzam@yahoo.com', 'fzamzam', '111223', 2, 'face7.jpg', 'face7.jpgface7.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id_cart` varchar(8) NOT NULL,
  `id_user` varchar(8) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `detail_cart`
--

CREATE TABLE `detail_cart` (
  `id_detail_cart` varchar(8) NOT NULL,
  `id_cart` varchar(8) NOT NULL,
  `id_produk` varchar(8) NOT NULL,
  `kuantitas` int(11) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_detail_trans` varchar(8) NOT NULL,
  `id_transaksi` varchar(8) NOT NULL,
  `id_produk` varchar(8) NOT NULL,
  `sub_total` int(6) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `kuantitas` tinyint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` tinyint(3) NOT NULL,
  `nama_kategori` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'baju'),
(2, 'celana'),
(3, 'kemeja'),
(4, 'Jeans'),
(5, 'Sepatu');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id_level` tinyint(2) NOT NULL,
  `nama_level` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id_level`, `nama_level`) VALUES
(1, 'Owner'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` varchar(8) NOT NULL,
  `nama_produk` varchar(25) NOT NULL,
  `harga` int(9) NOT NULL,
  `stok` int(4) NOT NULL,
  `tgl_masuk` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deskripsi` varchar(200) NOT NULL,
  `id_kategori` tinyint(3) NOT NULL,
  `rating` tinyint(2) NOT NULL,
  `img` varchar(100) NOT NULL,
  `img_resize` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga`, `stok`, `tgl_masuk`, `deskripsi`, `id_kategori`, `rating`, `img`, `img_resize`) VALUES
('P0G5R4UF', 'Hoodie jumper', 75000, 21, '2021-11-26 06:55:01', 'Hoodie jumper', 1, 0, 'hoodie.jpg', 'hoodie.jpghoodie.jpg'),
('P0WEK8H9', 'Sepatu Nike', 30000, 32, '2021-11-26 06:55:16', 'Sepatu nike keren', 5, 0, 'nike.jpg', 'nike.jpgnike.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(8) NOT NULL,
  `id_admin` varchar(8) NOT NULL,
  `id_user` varchar(8) NOT NULL,
  `tanggal_transaksi` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `total_harga` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(8) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(25) NOT NULL,
  `user_fullname` varchar(50) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `gender` enum('L','P') NOT NULL,
  `alamat` text NOT NULL,
  `img` varchar(100) NOT NULL,
  `img_resize` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `email`, `password`, `user_fullname`, `no_telp`, `gender`, `alamat`, `img`, `img_resize`) VALUES
('U03DHEI2', 'Rickyseth@gmail.com', '12345222', 'Ricky Seth', '072112347821', 'L', 'USA florida ', 'face3.jpg', 'face3.jpgface3.jpg'),
('U050P6LJ', 'fikri@zamzam', 'z1234', 'Fikri Azkia\'i Zamzam', '0822331334122', 'L', 'Tanjung rejo wuluhan jember', 'face21.jpg', 'face21.jpgface21.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user21`
--

CREATE TABLE `user21` (
  `id_user` varchar(8) NOT NULL,
  `email` varchar(40) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user21`
--

INSERT INTO `user21` (`id_user`, `email`, `username`, `password`) VALUES
('$id', '$email', '$username', '$pass'),
('U03DHEI2', 'Rickyseth@gmail.com', 'rickseth', '12345222'),
('U050P6LJ', 'fikri@zamzam', 'zamzam', 'z1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `id_level` (`id_level`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `detail_cart`
--
ALTER TABLE `detail_cart`
  ADD PRIMARY KEY (`id_detail_cart`),
  ADD KEY `id_cart` (`id_cart`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detail_trans`),
  ADD KEY `idtrans_transaksi` (`id_transaksi`,`id_produk`),
  ADD KEY `idprod_produk` (`id_produk`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `iduser_id` (`id_user`),
  ADD KEY `transaksi_ibfk_1` (`id_admin`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `user21`
--
ALTER TABLE `user21`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` tinyint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `level` (`id_level`) ON UPDATE CASCADE;

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON UPDATE CASCADE;

--
-- Constraints for table `detail_cart`
--
ALTER TABLE `detail_cart`
  ADD CONSTRAINT `detail_cart_ibfk_1` FOREIGN KEY (`id_cart`) REFERENCES `cart` (`id_cart`) ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_cart_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON UPDATE CASCADE;

--
-- Constraints for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `detail_transaksi_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_transaksi_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON UPDATE CASCADE;

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`) ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
