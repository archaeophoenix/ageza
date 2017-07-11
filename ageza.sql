-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 11, 2017 at 06:34 
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ageza`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` int(11) NOT NULL,
  `id_temuan` int(11) DEFAULT NULL,
  `tj` varchar(50) DEFAULT NULL,
  `ketua` varchar(50) DEFAULT NULL,
  `anggota` varchar(50) NOT NULL,
  `tgl` date DEFAULT NULL,
  `no` varchar(50) DEFAULT NULL,
  `ts` varchar(50) DEFAULT NULL,
  `uu` varchar(50) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `saran` varchar(50) DEFAULT NULL,
  `batas` date DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `id_temuan`, `tj`, `ketua`, `anggota`, `tgl`, `no`, `ts`, `uu`, `tanggal`, `saran`, `batas`, `status`) VALUES
(1, 1, 'PJ', 'ket', '', '0000-00-00', 'nos', 'temsm', 'uu', '2017-06-18', 'buang', '2017-06-20', '2'),
(2, 2, 'TJ', 'k', '', '0000-00-00', 'khkk', 'jhkhkj', 'hkjhkj', '2017-07-07', 'asdasd', '2017-07-09', '0'),
(3, 1, 'mboh', 'sembarang', '', '0000-00-00', '331', 'satu', 'raurus', '2017-06-15', 'buang', '2017-06-16', '0'),
(4, 1, 'mboh', 'sembarang', '', '0000-00-00', '331', 'satu', 'raurus', '2017-06-14', 'buang', '2017-06-15', '1'),
(5, 1, 'asdlasjhdna', 'j', '', '0000-00-00', 'n', 'kjjh', 'hkjh', '2017-06-15', 'aksdjas', '2017-06-18', '0'),
(6, 1, NULL, NULL, '', '0000-00-00', NULL, NULL, NULL, '1970-01-01', NULL, '1970-01-01', NULL),
(7, 1, '', '', '', '0000-00-00', '', '', '', '2017-06-18', '', '2017-06-18', '0'),
(8, 1, '', '', '', '0000-00-00', '', '', '', '2017-06-18', '', '2017-06-18', '0'),
(9, 1, '', '', '', '0000-00-00', '', '', '', '2017-06-18', '', '2017-06-18', '0'),
(10, 1, '', '', '', '0000-00-00', '', '', '', '2017-06-18', '', '2017-06-18', '0'),
(11, 1, '', '', '', '0000-00-00', '', '', '', '2017-06-18', '', '2017-06-18', '0'),
(12, 1, NULL, NULL, '', '0000-00-00', NULL, NULL, NULL, '1970-01-01', NULL, '1970-01-01', NULL),
(13, 1, '', '', '', '0000-00-00', '', '', '', '2017-06-18', '', '2017-06-18', '0'),
(14, 12, 'pj', 'ket', '', '0000-00-00', 'nosur', 'mboh', 'uu', '2017-07-04', 'ok', '2017-07-06', '0'),
(15, 12, 'yp', 'yo', '', '0000-00-00', 'ok', 'ok', 'ok', '2017-07-05', 'kpo', '2017-07-08', '1');

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `id` int(11) NOT NULL,
  `id_berita` int(11) DEFAULT NULL,
  `file` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`id`, `id_berita`, `file`) VALUES
(1, 1, 'assets/images/berita/5949e701e1508.jpg'),
(2, 2, 'assets/images/berita/5949e71601962.jpg'),
(3, 14, 'assets/images/berita/595af44a622e4.jpg'),
(4, 14, 'assets/images/berita/595af44a6d2e8.jpg'),
(5, 14, 'assets/images/berita/595af5036f701.jpg'),
(6, 14, 'assets/images/berita/595af5037edf5.jpg'),
(7, 15, 'assets/images/berita/595c62dbba2f5.png');

-- --------------------------------------------------------

--
-- Table structure for table `polling`
--

CREATE TABLE `polling` (
  `id` int(11) NOT NULL,
  `id_skpd` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `skpd`
--

CREATE TABLE `skpd` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skpd`
--

INSERT INTO `skpd` (`id`, `nama`) VALUES
(1, 'SMA 1 Lamongan'),
(2, 'Rumah Sakit Lamongan');

-- --------------------------------------------------------

--
-- Table structure for table `temuan`
--

CREATE TABLE `temuan` (
  `id` int(11) NOT NULL,
  `id_skpd` int(11) DEFAULT NULL,
  `uu` varchar(100) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `pendapatan` varchar(50) DEFAULT NULL,
  `btl_uraian` text,
  `btl_anggaran` varchar(50) DEFAULT NULL,
  `btl_realisasi` varchar(50) DEFAULT NULL,
  `btl_spj` varchar(50) DEFAULT NULL,
  `btl_sisa` varchar(50) DEFAULT NULL,
  `bl_uraian` varchar(50) DEFAULT NULL,
  `bl_anggaran` varchar(50) DEFAULT NULL,
  `bl_realisasi` varchar(50) DEFAULT NULL,
  `bl_spj` varchar(50) DEFAULT NULL,
  `bl_sisa` varchar(50) DEFAULT NULL,
  `jenis` varchar(50) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `nilai` varchar(50) DEFAULT NULL,
  `spm_tanggal` date DEFAULT NULL,
  `spm_up` varchar(50) DEFAULT NULL,
  `spm_gu` varchar(50) DEFAULT NULL,
  `spm_tu` varchar(50) DEFAULT NULL,
  `spm_gaji` varchar(50) DEFAULT NULL,
  `spm_barjas` varchar(50) DEFAULT NULL,
  `spp_tanggal` date DEFAULT NULL,
  `spp_up` varchar(50) DEFAULT NULL,
  `spp_gu` varchar(50) DEFAULT NULL,
  `spp_tu` varchar(50) DEFAULT NULL,
  `spp_gaji` varchar(50) DEFAULT NULL,
  `spp_barjas` varchar(50) DEFAULT NULL,
  `tj_tanggal` date DEFAULT NULL,
  `no_spj` varchar(50) DEFAULT NULL,
  `jumlah` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temuan`
--

INSERT INTO `temuan` (`id`, `id_skpd`, `uu`, `tanggal`, `pendapatan`, `btl_uraian`, `btl_anggaran`, `btl_realisasi`, `btl_spj`, `btl_sisa`, `bl_uraian`, `bl_anggaran`, `bl_realisasi`, `bl_spj`, `bl_sisa`, `jenis`, `nama`, `nilai`, `spm_tanggal`, `spm_up`, `spm_gu`, `spm_tu`, `spm_gaji`, `spm_barjas`, `spp_tanggal`, `spp_up`, `spp_gu`, `spp_tu`, `spp_gaji`, `spp_barjas`, `tj_tanggal`, `no_spj`, `jumlah`) VALUES
(1, 1, 'uu', '2017-06-12', '1000', 'btl u', 'btl a', 'btl r', 'btl spj', 'btl s', 'bt u', 'bl A', 'bt r', 'bt spj', 'bt s', 'kegiatan', 'nama', 'nilai', '2017-06-12', 'spm u', 'spm gu', 'spm tu', 'spm ls gaji', 'spm barjas', '2017-06-12', 'spp up', 'spp gu', 'spp tu', 'spp ls gaji', 'spp barjas', '2017-06-12', 'no spj', '1000'),
(2, 1, 'uu', '2017-06-13', '1000', 'btl u', 'btl a', 'btl r', 'btl spj', 'btl s', 'bt u', 'BT a', 'bt r', 'bt spj', 'bt s', 'kegiatan', 'nama', 'nilai', '2017-06-13', 'spm u', 'spm gu', 'spm tu', 'spm ls gaji', 'spm barjas', '2017-06-13', 'spp up', 'spp gu', 'spp tu', 'spp ls gaji', 'spp barjas', '2017-06-13', 'no spj', '1000'),
(3, 1, 'uu', '0000-00-00', '1000', 'btl u', 'btl a', 'btl r', 'btl spj', 'btl s', 'bt u', NULL, 'bt r', 'bt spj', 'bt s', 'kegiatan', 'nama', 'nilai', '0000-00-00', 'spm u', 'spm gu', 'spm tu', 'spm ls gaji', 'spm barjas', '0000-00-00', 'spp up', 'spp gu', 'spp tu', 'spp ls gaji', 'spp barjas', '0000-00-00', 'no spj', '1000'),
(4, 1, 'uu', '0000-00-00', '1000', 'btl u', 'btl a', 'btl r', 'btl spj', 'btl s', 'bt u', NULL, 'bt r', 'bt spj', 'bt s', 'kegiatan', 'nama', 'nilai', '0000-00-00', 'spm u', 'spm gu', 'spm tu', 'spm ls gaji', 'spm barjas', '0000-00-00', 'spp up', 'spp gu', 'spp tu', 'spp ls gaji', 'spp barjas', '0000-00-00', 'no spj', '1000'),
(5, 2, 'uu', '0000-00-00', '1000', 'btl u', 'btl a', 'btl r', 'btl spj', 'btl s', 'bt u', NULL, 'bt r', 'bt spj', 'bt s', 'kegiatan', 'nama', 'nilai', '0000-00-00', 'spm u', 'spm gu', 'spm tu', 'spm ls gaji', 'spm barjas', '0000-00-00', 'spp up', 'spp gu', 'spp tu', 'spp ls gaji', 'spp barjas', '0000-00-00', 'no spj', '1000'),
(6, 1, 'uu', '0000-00-00', '1000', 'btl u', 'btl a', 'btl r', 'btl spj', 'btl s', 'bt u', NULL, 'bt r', 'bt spj', 'bt s', 'kegiatan', 'nama', 'nilai', '0000-00-00', 'spm u', 'spm gu', 'spm tu', 'spm ls gaji', 'spm barjas', '0000-00-00', 'spp up', 'spp gu', 'spp tu', 'spp ls gaji', 'spp barjas', '0000-00-00', 'no spj', '1000'),
(7, 2, 'uu', '2017-06-12', '1000', 'btl u', 'btl a', 'btl r', 'btl spj', 'btl s', 'bt u', NULL, 'bt r', 'bt spj', 'bt s', 'kegiatan', 'nama', 'nilai', '2017-06-12', 'spm u', 'spm gu', 'spm tu', 'spm ls gaji', 'spm barjas', '2017-06-12', 'spp up', 'spp gu', 'spp tu', 'spp ls gaji', 'spp barjas', '2017-06-12', 'no spj', '1000'),
(8, 1, 'uu', '0000-00-00', '1000', 'btl u', 'btl a', 'btl r', 'btl spj', 'btl s', 'bt u', NULL, 'bt r', 'bt spj', 'bt s', 'kegiatan', 'nama', 'nilai', '0000-00-00', 'spm u', 'spm gu', 'spm tu', 'spm ls gaji', 'spm barjas', '0000-00-00', 'spp up', 'spp gu', 'spp tu', 'spp ls gaji', 'spp barjas', '0000-00-00', 'no spj', '1000'),
(9, 1, 'uu', '0000-00-00', '1000', 'btl u', 'btl a', 'btl r', 'btl spj', 'btl s', 'bt u', NULL, 'bt r', 'bt spj', 'bt s', 'kegiatan', 'nama', 'nilai', '0000-00-00', 'spm u', 'spm gu', 'spm tu', 'spm ls gaji', 'spm barjas', '0000-00-00', 'spp up', 'spp gu', 'spp tu', 'spp ls gaji', 'spp barjas', '0000-00-00', 'no spj', '1000'),
(10, 1, 'uu', '0000-00-00', '1000', 'btl u', 'btl a', 'btl r', 'btl spj', 'btl s', 'bt u', NULL, 'bt r', 'bt spj', 'bt s', 'kegiatan', 'nama', 'nilai', '0000-00-00', 'spm u', 'spm gu', 'spm tu', 'spm ls gaji', 'spm barjas', '0000-00-00', 'spp up', 'spp gu', 'spp tu', 'spp ls gaji', 'spp barjas', '0000-00-00', 'no spj', '1000'),
(11, 1, 'uu', '0000-00-00', '1000', 'btl u', 'btl a', 'btl r', 'btl spj', 'btl s', 'bt u', NULL, 'bt r', 'bt spj', 'bt s', 'kegiatan', 'nama', 'nilai', '0000-00-00', 'spm u', 'spm gu', 'spm tu', 'spm ls gaji', 'spm barjas', '0000-00-00', 'spp up', 'spp gu', 'spp tu', 'spp ls gaji', 'spp barjas', '0000-00-00', 'no spj', '1000'),
(12, 2, 'ashakHDKJ', '2017-06-12', 'JG1JHHH1', 'KASDLKJ', 'lskjdla', 'jalksdj', 'klsjdal', 'laksdjlaskdj', 'aksjdlaksjd', 'kaskdfaksf', 'akshdflahd', 'kasfdhaklsdh', 'akd9pwpuerqn,mq', 'n,mzidhaw9jadaw', 'slknalc9dawrjhad', 'nakjshfas,', '2017-06-12', 'alsdjalisavln', 'laksja9shfb', 'zkchaldjlqd', 'laksdjaishgab', 'kasjdabfj', '2017-06-12', 'kzjiaj', 'lasdja.ngm,ha', 'asdjlasdabd,', 'licalsdlkd', 'ldjjsclna,msnd', '2017-06-12', 'ajsdnlaksd', 'haldhasld');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `telpon` varchar(20) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` text,
  `tmstmp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `status`, `telpon`, `username`, `password`, `tmstmp`) VALUES
(1, 'cipa admin', 2, '+6281', 'cipaadmin', 'N1FkTGdwVnM1N3NuNy96ZnBXQ2pBdz09', '2017-05-11 07:45:24'),
(2, 'admin trans haji', 2, '+628111', 'adtrah', 'TWlWVjc5QU40ak1sMGVrbHczajZnZz09', '2017-05-11 07:45:28'),
(3, 'hakkam', 5, '+966', 'hakkam', 'cUtFb2k5enVUN3p4aTZRS2wza3VtQT09', '2017-05-14 03:19:27'),
(4, 'haddej', 5, '+966', 'haddej', 'eXE5U3M5RDRPa005WlEya3oxMGw4Zz09', '2017-05-14 03:19:57'),
(5, 'hanidam', 5, '+966', 'hanidam', 'akJHbmxBZ3JtcmJmNldxSFd1dnZHUT09', '2017-05-14 03:20:00'),
(6, 'admin', 1, '+6289900', 'admin', 'ajh4Z0QyT3dhVjFJd0xtakg0NVJBUT09', '2017-07-11 02:40:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `polling`
--
ALTER TABLE `polling`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skpd`
--
ALTER TABLE `skpd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temuan`
--
ALTER TABLE `temuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `polling`
--
ALTER TABLE `polling`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `skpd`
--
ALTER TABLE `skpd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `temuan`
--
ALTER TABLE `temuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
