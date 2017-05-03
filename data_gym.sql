-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 03 Mei 2017 pada 07.20
-- Versi Server: 10.1.13-MariaDB
-- PHP Version: 7.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data_gym`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `label` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `category`
--

INSERT INTO `category` (`id`, `label`) VALUES
(1, 'Fitness Center'),
(2, 'Yoga'),
(3, 'Aerobik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `facility`
--

CREATE TABLE `facility` (
  `id` int(11) NOT NULL,
  `label` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `facility`
--

INSERT INTO `facility` (`id`, `label`) VALUES
(1, 'Free Wifi'),
(2, 'Jacuzi'),
(3, 'Swimming Pool'),
(4, 'Smoking Area');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gym`
--

CREATE TABLE `gym` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `longitude` varchar(100) DEFAULT NULL,
  `latitude` varchar(100) DEFAULT NULL,
  `telp` varchar(12) DEFAULT NULL,
  `description` text,
  `price` int(11) DEFAULT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gym`
--

INSERT INTO `gym` (`id`, `user_id`, `category_id`, `fullname`, `alamat`, `longitude`, `latitude`, `telp`, `description`, `price`, `status`) VALUES
(1, 2, 1, 'Awesome Gym', 'Jl. Gn. Agung No.225, Padangsambian, Denpasar Bar., Kota Denpasar, Bali 80118, Indonesia', '115.190703', '-8.651285', '085737353568', 'Gym terbaik dan terhebat disekitar denpasar\r\nhahahaha', 100000, 1),
(2, 3, 2, 'Tempat Yoga Asik', 'Jl. Raya Puputan No.74, Dangin Puri Klod, Denpasar Tim., Kota Denpasar, Bali 80234, Indonesia', '115.225379', '-8.672668', '085737364736', 'Tempat yoga paling asik di Bali', 150000, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `gym_facility`
--

CREATE TABLE `gym_facility` (
  `id` int(11) NOT NULL,
  `facility_id` int(11) DEFAULT NULL,
  `gym_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gym_facility`
--

INSERT INTO `gym_facility` (`id`, `facility_id`, `gym_id`) VALUES
(5, 1, 1),
(6, 2, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `gym_id` int(11) DEFAULT NULL,
  `file` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `images`
--

INSERT INTO `images` (`id`, `gym_id`, `file`) VALUES
(10, 1, 'f54c6ff73df3656a1d9f46ce41d98d9c.jpg'),
(11, 1, 'ba97eafd36eaa445f1a794521db7ab4e.jpg'),
(12, 1, 'a9fa60d08cb4adb43be0573f471e8d28.jpg'),
(13, 1, 'b8fb4844a7f2ac8be8f422e1968dcda7.jpg'),
(14, 1, '0b8c245f5d0b260ddc13c8bbc6e88216.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `username` varchar(12) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `no_hp` varchar(12) DEFAULT NULL,
  `type` int(1) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `password`, `no_hp`, `type`, `status`) VALUES
(1, 'Administrator', 'admin', '7fef6171469e80d32c0559f88b377245', '08573737437', 1, 1),
(2, 'Awesome Gym', 'operator', '100d9d509794db4ff7fd800bdc659dad', '085737353568', 2, 1),
(3, 'Tempat Yoga Asik', 'yoga', '8bd400413bffe4af08d8a6608fda8bad', '085737364736', 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facility`
--
ALTER TABLE `facility`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gym`
--
ALTER TABLE `gym`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gym_facility`
--
ALTER TABLE `gym_facility`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `facility`
--
ALTER TABLE `facility`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `gym`
--
ALTER TABLE `gym`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `gym_facility`
--
ALTER TABLE `gym_facility`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
