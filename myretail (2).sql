-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2018 at 08:30 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myretail`
--

-- --------------------------------------------------------

--
-- Table structure for table `outlet`
--

CREATE TABLE `outlet` (
  `kode_outlet` varchar(11) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `qr` varchar(90) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `outlet`
--

INSERT INTO `outlet` (`kode_outlet`, `nama`, `alamat`, `qr`) VALUES
('AAA2', 'Jkt', 'Jakarta', 'AAA2.png'),
('AAA3', 'Matahari2', 'Jakarta', 'AAA3.png'),
('ZZZZ', 'ads', 'asdasd', 'ZZZZ.png'),
('z', 'z', 'z', 'z.png'),
('aaa', 'a', 'a', 'aaa.png'),
('zzz', 'zzzz', 'zzzz', 'zzz.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `fullname` varchar(150) NOT NULL,
  `password` varchar(250) NOT NULL,
  `email` varchar(150) NOT NULL,
  `nohp` int(16) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `role` varchar(15) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `fullname`, `password`, `email`, `nohp`, `kategori`, `role`, `status`) VALUES
(1, 'admin', 'Administrator', '21232f297a57a5a743894a0e4a801fc3', 'dionsaputro@gmail.com', 0, '', 'admin', 0),
(2, 'dionsaputro', 'Dion Saputro', '21232f297a57a5a743894a0e4a801fc3', 'dion.saputro8@gmail.com', 0, '', 'admin', 1),
(3, 'aaaa', 'aaa', '64570f6d1d29379d1c18bbdff28fd391', 'aaaa@aaaa.com', 0, '', 'admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `visit`
--

CREATE TABLE `visit` (
  `id` int(11) NOT NULL,
  `sales` varchar(100) NOT NULL,
  `tanggal` int(200) NOT NULL,
  `checkin` varchar(11) NOT NULL,
  `checkout` varchar(11) NOT NULL,
  `outlet` varchar(150) NOT NULL,
  `longi` double NOT NULL,
  `latti` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `outlet`
--
ALTER TABLE `outlet`
  ADD PRIMARY KEY (`kode_outlet`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visit`
--
ALTER TABLE `visit`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `visit`
--
ALTER TABLE `visit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
