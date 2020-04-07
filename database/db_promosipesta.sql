-- phpMyAdmin SQL Dump
-- version 2.11.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 21, 2020 at 09:25 PM
-- Server version: 5.0.67
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_promosipesta`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `id_admin` int(11) NOT NULL auto_increment,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_admin` varchar(30) NOT NULL,
  PRIMARY KEY  (`id_admin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `username`, `password`, `nama_admin`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang`
--

CREATE TABLE IF NOT EXISTS `tbl_barang` (
  `id_barang` int(11) NOT NULL auto_increment,
  `id_kategori` int(11) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `terjual` int(11) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  PRIMARY KEY  (`id_barang`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_barang`
--

INSERT INTO `tbl_barang` (`id_barang`, `id_kategori`, `tanggal_masuk`, `nama_barang`, `deskripsi`, `harga`, `stok`, `terjual`, `gambar`) VALUES
(4, 14, '2017-12-02', 'Pelaminan Besar', '<p>Pelaminan Besar</p>', 25000000, 2, 1, 'P00004.gedung-mahkota.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_biaya_kirim`
--

CREATE TABLE IF NOT EXISTS `tbl_biaya_kirim` (
  `id_biaya` int(11) NOT NULL auto_increment,
  `provinsi` int(4) NOT NULL,
  `kabkota` int(2) NOT NULL,
  `biaya` int(11) NOT NULL,
  PRIMARY KEY  (`id_biaya`),
  KEY `provinsi` (`provinsi`,`kabkota`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl_biaya_kirim`
--

INSERT INTO `tbl_biaya_kirim` (`id_biaya`, `provinsi`, `kabkota`, `biaya`) VALUES
(2, 6, 71, 10000),
(3, 6, 78, 30000),
(8, 6, 79, 20000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_informasi`
--

CREATE TABLE IF NOT EXISTS `tbl_informasi` (
  `id_informasi` int(11) NOT NULL auto_increment,
  `judul` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY  (`id_informasi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_informasi`
--

INSERT INTO `tbl_informasi` (`id_informasi`, `judul`, `keterangan`) VALUES
(1, 'RC. Pelaminan', '<p>RC. Pelaminan Menyediakan Bermacam - macam penyewaan alat untuk pernikahan</p>'),
(2, 'Cara Pemesanan', '<p style=\\"text-align:justify\\">1. Klik pada tombol &#39;Pesa&#39; pada produk yang ingin Anda pesan.</p>\r\n\r\n<p style=\\"text-align:justify\\">2. Barang yang Anda pesan akan masuk ke dalam Keranjang Belanja. Anda dapat menentukan berapa jumlah yang akan dipesan, kemudian klik tombol &#39;Simpan&#39;.</p>\r\n\r\n<p style=\\"text-align:justify\\">3. Jika sudah selesai, klik tombol &#39;Selesai Belanja&#39; maka akan tampil data pembeli beserta barang yang dibeli/dipesannya. kemudian klik tombol &#39;Proses Order&#39; maka akan tampil total pembayaran serta nomor rekening pembayaran.</p>\r\n\r\n<p style=\\"text-align:justify\\">4. Apabila telah melakukan pembayaran, maka barang yang dipesan akan segera dikirimkan.</p>\r\n\r\n<p style=\\"text-align:justify\\">&nbsp;</p>\r\n\r\n<p style=\\"text-align:justify\\">&nbsp;</p>');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kabkota`
--

CREATE TABLE IF NOT EXISTS `tbl_kabkota` (
  `id_kabkota` int(4) NOT NULL,
  `nama_kabkota` varchar(50) NOT NULL,
  `id_provinsi` int(2) NOT NULL,
  PRIMARY KEY  (`id_kabkota`),
  KEY `id_provinsi` (`id_provinsi`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kabkota`
--

INSERT INTO `tbl_kabkota` (`id_kabkota`, `nama_kabkota`, `id_provinsi`) VALUES
(1, 'JAKARTA PUSAT', 1),
(2, 'JAKARTA BARAT', 1),
(3, 'JAKARTA SELATAN', 1),
(4, 'JAKARTA TIMUR', 1),
(5, 'JAKARTA UTARA', 1),
(6, 'KEPULAUAN SERIBU', 1),
(7, 'TANGERANG', 2),
(8, 'TANGERANG SELATAN', 2),
(9, 'BOGOR', 3),
(10, 'DEPOK', 3),
(11, 'BEKASI', 3),
(12, 'MEDAN', 4),
(13, 'DELI SERDANG', 4),
(14, 'TEBING TINGGI', 4),
(15, 'BINJAI', 4),
(16, 'LANGKAT', 4),
(17, 'SERDANG BEDAGAI', 4),
(18, 'PEMATANG SIANTAR', 4),
(19, 'SIMALUNGUN', 4),
(20, 'ASAHAN', 4),
(21, 'BATU BARA', 4),
(22, 'TANJUNG BALAI', 4),
(23, 'LABUHAN BATU', 4),
(24, 'LABUHAN BATU UTARA', 4),
(25, 'LABUHAN BATU SELATAN', 4),
(26, 'KARO', 4),
(27, 'DAIRI', 4),
(28, 'PAKPAK BHARAT', 4),
(29, 'TOBA SAMOSIR', 4),
(30, 'SAMOSIR', 4),
(31, 'TAPANULI UTARA', 4),
(32, 'HUMBANG HASUNDUTAN', 4),
(33, 'SIBOLGA', 4),
(34, 'TAPANULI TENGAH', 4),
(35, 'PADANG SIDEMPUAN', 4),
(36, 'TAPANULI SELATAN', 4),
(37, 'PADANG LAWAS UTARA', 4),
(38, 'PADANG LAWAS', 4),
(39, 'GUNUNGSITOLI', 4),
(40, 'NIAS BARAT', 4),
(41, 'NIAS UTARA', 4),
(42, 'NIAS', 4),
(43, 'NIAS SELATAN', 4),
(44, 'MANDAILING NATAL', 4),
(45, 'BANDA ACEH', 5),
(46, 'ACEH BESAR', 5),
(47, 'SABANG', 5),
(48, 'ACEH BARAT', 5),
(49, 'ACEH JAYA', 5),
(50, 'NAGAN RAYA', 5),
(51, 'ACEH SELATAN', 5),
(52, 'ACEH BARAT DAYA', 5),
(53, 'SIMEULUE', 5),
(54, 'PIDIE', 5),
(55, 'PIDIE JAYA', 5),
(56, 'BIREUEN', 5),
(57, 'LHOKSEUMAWE', 5),
(58, 'ACEH UTARA', 5),
(59, 'LANGSA', 5),
(60, 'ACEH TIMUR', 5),
(61, 'ACEH TAMIANG', 5),
(62, 'ACEH TENGAH', 5),
(63, 'BENER MERIAH', 5),
(64, 'ACEH TENGGARA', 5),
(65, 'GAYO LUES', 5),
(66, 'SUBULUSSALAM', 5),
(67, 'ACEH SINGKIL', 5),
(68, 'PADANG', 6),
(69, 'KEPULAUAN MENTAWAI', 6),
(70, 'PARIAMAN', 6),
(71, 'PADANG PARIAMAN', 6),
(72, 'PESISIR SELATAN', 6),
(73, 'BUKITTINGGI', 6),
(74, 'AGAM', 6),
(75, 'PAYAKUMBUH', 6),
(76, 'LIMA PULUH KOTO/KOTA', 6),
(77, 'PASAMAN', 6),
(78, 'PASAMAN BARAT', 6),
(79, 'PADANG PANJANG', 6),
(80, 'TANAH DATAR', 6),
(81, 'SOLOK', 6),
(82, 'SAWAH LUNTO', 6),
(83, 'SIJUNJUNG (SAWAH LUNTO SIJUNJUNG)', 6),
(84, 'DHARMASRAYA', 6),
(85, 'SOLOK SELATAN', 6),
(86, 'PEKANBARU', 7),
(87, 'PELALAWAN', 7),
(88, 'KAMPAR', 7),
(89, 'ROKAN HULU', 7),
(90, 'SIAK', 7),
(91, 'BENGKALIS', 7),
(92, 'KEPULAUAN MERANTI', 7),
(93, 'DUMAI', 7),
(94, 'ROKAN HILIR', 7),
(95, 'TANJUNG PINANG', 8),
(96, 'BINTAN', 8),
(97, 'INDRAGIRI HILIR', 7),
(98, 'INDRAGIRI HULU', 7),
(99, 'BATAM', 8),
(100, 'KUANTAN SINGINGI', 7),
(101, 'KARIMUN', 8),
(102, 'NATUNA', 8),
(103, 'KEPULAUAN ANAMBAS', 8),
(104, 'LINGGA', 8),
(105, 'PALEMBANG', 9),
(106, 'OGAN KOMERING ILIR', 9),
(107, 'OGAN ILIR', 9),
(108, 'MUSI BANYUASIN', 9),
(109, 'MUSI RAWAS', 9),
(110, 'BANYUASIN', 9),
(111, 'PRABUMULIH', 9),
(112, 'MUARA ENIM', 9),
(113, 'LAHAT', 9),
(114, 'EMPAT LAWANG', 9),
(115, 'PAGAR ALAM', 9),
(116, 'LUBUK LINGGAU', 9),
(117, 'OGAN KOMERING ULU', 9),
(118, 'OGAN KOMERING ULU TIMUR', 9),
(119, 'OGAN KOMERING ULU SELATAN', 9),
(120, 'PANGKAL PINANG', 10),
(121, 'BANGKA', 10),
(122, 'BANGKA BARAT', 10),
(123, 'BELITUNG', 10),
(124, 'BELITUNG TIMUR', 10),
(125, 'BANGKA TENGAH', 10),
(126, 'BANGKA SELATAN', 10),
(127, 'METRO', 11),
(128, 'LAMPUNG TENGAH', 11),
(129, 'LAMPUNG TIMUR', 11),
(130, 'TULANG BAWANG BARAT', 11),
(131, 'LAMPUNG UTARA', 11),
(132, 'TULANG BAWANG', 11),
(133, 'MESUJI', 11),
(134, 'WAY KANAN', 11),
(135, 'LAMPUNG BARAT', 11),
(136, 'PESISIR BARAT', 11),
(137, 'BANDAR LAMPUNG', 11),
(138, 'LAMPUNG SELATAN', 11),
(139, 'PESAWARAN', 11),
(140, 'PRINGSEWU', 11),
(141, 'TANGGAMUS', 11),
(142, 'JAMBI', 12),
(143, 'MUARO JAMBI', 12),
(144, 'TANJUNG JABUNG BARAT', 12),
(145, 'TANJUNG JABUNG TIMUR', 12),
(146, 'BATANG HARI', 12),
(147, 'SUNGAIPENUH', 12),
(148, 'KERINCI', 12),
(149, 'BUNGO', 12),
(150, 'TEBO', 12),
(151, 'MERANGIN', 12),
(152, 'SAROLANGUN', 12),
(153, 'BENGKULU', 13),
(154, 'BENGKULU UTARA', 13),
(155, 'BENGKULU TENGAH', 13),
(156, 'BENGKULU SELATAN', 13),
(157, 'MUKO MUKO', 13),
(158, 'SELUMA', 13),
(159, 'KAUR', 13),
(160, 'REJANG LEBONG', 13),
(161, 'LEBONG', 13),
(162, 'KEPAHIANG', 13),
(163, 'BANDUNG', 3),
(164, 'BANDUNG BARAT', 3),
(165, 'CIMAHI', 3),
(166, 'PURWAKARTA', 3),
(167, 'SUBANG', 3),
(168, 'KARAWANG', 3),
(169, 'SERANG', 2),
(170, 'PANDEGLANG', 2),
(171, 'LEBAK', 2),
(172, 'CILEGON', 2),
(173, 'SUKABUMI', 3),
(174, 'CIANJUR', 3),
(175, 'GARUT', 3),
(176, 'CIREBON', 3),
(177, 'INDRAMAYU', 3),
(178, 'SUMEDANG', 3),
(179, 'MAJALENGKA', 3),
(180, 'KUNINGAN', 3),
(181, 'TASIKMALAYA', 3),
(182, 'CIAMIS', 3),
(183, 'PANGANDARAN', 3),
(184, 'BANJAR', 3),
(185, 'SEMARANG', 14),
(186, 'SALATIGA', 14),
(187, 'PEKALONGAN', 14),
(188, 'BATANG', 14),
(189, 'KENDAL', 14),
(190, 'TEGAL', 14),
(191, 'BREBES', 14),
(192, 'PEMALANG', 14),
(193, 'BANYUMAS', 14),
(194, 'CILACAP', 14),
(195, 'PURBALINGGA', 14),
(196, 'BANJARNEGARA', 14),
(197, 'PURWOREJO', 14),
(198, 'KEBUMEN', 14),
(199, 'YOGYAKARTA', 15),
(200, 'BANTUL', 15),
(201, 'SLEMAN', 15),
(202, 'KULON PROGO', 15),
(203, 'GUNUNG KIDUL', 15),
(204, 'MAGELANG', 14),
(205, 'TEMANGGUNG', 14),
(206, 'WONOSOBO', 14),
(207, 'SURAKARTA (SOLO)', 14),
(208, 'SUKOHARJO', 14),
(209, 'KARANGANYAR', 14),
(210, 'SRAGEN', 14),
(211, 'BOYOLALI', 14),
(212, 'KLATEN', 14),
(213, 'WONOGIRI', 14),
(214, 'GROBOGAN', 14),
(215, 'BLORA', 14),
(216, 'PATI', 14),
(217, 'REMBANG', 14),
(218, 'KUDUS', 14),
(219, 'JEPARA', 14),
(220, 'DEMAK', 14),
(221, 'SURABAYA', 16),
(222, 'GRESIK', 16),
(223, 'SIDOARJO', 16),
(224, 'MOJOKERTO', 16),
(225, 'JOMBANG', 16),
(226, 'BOJONEGORO', 16),
(227, 'LAMONGAN', 16),
(228, 'TUBAN', 16),
(229, 'MADIUN', 16),
(230, 'MAGETAN', 16),
(231, 'NGAWI', 16),
(232, 'PONOROGO', 16),
(233, 'PACITAN', 16),
(234, 'KEDIRI', 16),
(235, 'NGANJUK', 16),
(236, 'MALANG', 16),
(237, 'BATU', 16),
(238, 'BLITAR', 16),
(239, 'TULUNGAGUNG', 16),
(240, 'TRENGGALEK', 16),
(241, 'PASURUAN', 16),
(242, 'PROBOLINGGO', 16),
(243, 'LUMAJANG', 16),
(244, 'JEMBER', 16),
(245, 'BONDOWOSO', 16),
(246, 'SITUBONDO', 16),
(247, 'BANYUWANGI', 16),
(248, 'BANGKALAN', 16),
(249, 'SAMPANG', 16),
(250, 'PAMEKASAN', 16),
(251, 'SUMENEP', 16),
(252, 'BANJARMASIN', 17),
(253, 'BARITO KUALA', 17),
(254, 'BANJARBARU', 17),
(255, 'TANAH LAUT', 17),
(256, 'TAPIN', 17),
(257, 'HULU SUNGAI SELATAN', 17),
(258, 'HULU SUNGAI TENGAH', 17),
(259, 'HULU SUNGAI UTARA', 17),
(260, 'TABALONG', 17),
(261, 'BALANGAN', 17),
(262, 'KOTABARU', 17),
(263, 'TANAH BUMBU', 17),
(264, 'PALANGKA RAYA', 18),
(265, 'KAPUAS', 18),
(266, 'BARITO TIMUR', 18),
(267, 'BARITO SELATAN', 18),
(268, 'BARITO UTARA', 18),
(269, 'MURUNG RAYA', 18),
(270, 'KOTAWARINGIN BARAT', 18),
(271, 'LAMANDAU', 18),
(272, 'SUKAMARA', 18),
(273, 'SERUYAN', 18),
(274, 'KOTAWARINGIN TIMUR', 18),
(275, 'KATINGAN', 18),
(276, 'GUNUNG MAS', 18),
(277, 'PULANG PISAU', 18),
(278, 'SAMARINDA', 19),
(279, 'KUTAI KARTANEGARA', 19),
(280, 'BONTANG', 19),
(281, 'KUTAI TIMUR', 19),
(282, 'KUTAI BARAT', 19),
(283, 'BALIKPAPAN', 19),
(284, 'PENAJAM PASER UTARA', 19),
(285, 'PASER', 19),
(286, 'TARAKAN', 20),
(287, 'TANA TIDUNG', 20),
(288, 'MALINAU', 20),
(289, 'BULUNGAN (BULONGAN)', 20),
(290, 'BERAU', 19),
(291, 'NUNUKAN', 20),
(292, 'PONTIANAK', 21),
(293, 'KUBU RAYA', 21),
(294, 'SANGGAU', 21),
(295, 'SINTANG', 21),
(296, 'KAPUAS HULU', 21),
(297, 'KETAPANG', 21),
(298, 'KAYONG UTARA', 21),
(299, 'SINGKAWANG', 21),
(300, 'SAMBAS', 21),
(301, 'BENGKAYANG', 21),
(302, 'LANDAK', 21),
(303, 'SEKADAU', 21),
(304, 'MELAWI', 21),
(305, 'DENPASAR', 22),
(306, 'BADUNG', 22),
(307, 'GIANYAR', 22),
(308, 'BANGLI', 22),
(309, 'KLUNGKUNG', 22),
(310, 'KARANGASEM', 22),
(311, 'BULELENG', 22),
(312, 'TABANAN', 22),
(313, 'JEMBRANA', 22),
(314, 'MATARAM', 23),
(315, 'LOMBOK BARAT', 23),
(316, 'LOMBOK UTARA', 23),
(317, 'LOMBOK TENGAH', 23),
(318, 'LOMBOK TIMUR', 23),
(319, 'BIMA', 23),
(320, 'DOMPU', 23),
(321, 'SUMBAWA', 23),
(322, 'SUMBAWA BARAT', 23),
(323, 'KUPANG', 24),
(324, 'SABU RAIJUA', 24),
(325, 'TIMOR TENGAH SELATAN', 24),
(326, 'TIMOR TENGAH UTARA', 24),
(327, 'BELU', 24),
(328, 'ALOR', 24),
(329, 'ROTE NDAO', 24),
(330, 'SIKKA', 24),
(331, 'ENDE', 24),
(332, 'FLORES TIMUR', 24),
(333, 'NGADA', 24),
(334, 'NAGEKEO', 24),
(335, 'MANGGARAI', 24),
(336, 'MANGGARAI TIMUR', 24),
(337, 'LEMBATA', 24),
(338, 'MANGGARAI BARAT', 24),
(339, 'SUMBA TIMUR', 24),
(340, 'SUMBA BARAT', 24),
(341, 'SUMBA BARAT DAYA', 24),
(342, 'SUMBA TENGAH', 24),
(343, 'MAKASSAR', 25),
(344, 'GOWA', 25),
(345, 'BONE', 25),
(346, 'MAROS', 25),
(347, 'PANGKAJENE KEPULAUAN', 25),
(348, 'BARRU', 25),
(349, 'SOPPENG', 25),
(350, 'WAJO', 25),
(351, 'PAREPARE', 25),
(352, 'PINRANG', 25),
(353, 'POLEWALI MANDAR', 26),
(354, 'MAMUJU', 26),
(355, 'MAMASA', 26),
(356, 'MAJENE', 26),
(357, 'MAMUJU UTARA', 26),
(358, 'SIDENRENG RAPPANG/RAPANG', 25),
(359, 'SINJAI', 25),
(360, 'ENREKANG', 25),
(361, 'TANA TORAJA', 25),
(362, 'TORAJA UTARA', 25),
(363, 'LUWU UTARA', 25),
(364, 'PALOPO', 25),
(365, 'LUWU', 25),
(366, 'LUWU TIMUR', 25),
(367, 'TAKALAR', 25),
(368, 'JENEPONTO', 25),
(369, 'BANTAENG', 25),
(370, 'BULUKUMBA', 25),
(371, 'SELAYAR (KEPULAUAN SELAYAR)', 25),
(372, 'KENDARI', 27),
(373, 'KONAWE', 27),
(374, 'KONAWE UTARA', 27),
(375, 'KONAWE SELATAN', 27),
(376, 'KOLAKA', 27),
(377, 'MUNA', 27),
(378, 'BUTON UTARA', 27),
(379, 'BAU-BAU', 27),
(380, 'BUTON', 27),
(381, 'BOMBANA', 27),
(382, 'WAKATOBI', 27),
(383, 'KOLAKA UTARA', 27),
(384, 'PALU', 28),
(385, 'SIGI', 28),
(386, 'DONGGALA', 28),
(387, 'PARIGI MOUTONG', 28),
(388, 'TOLI-TOLI', 28),
(389, 'BUOL', 28),
(390, 'POSO', 28),
(391, 'TOJO UNA-UNA', 28),
(392, 'BANGGAI', 28),
(393, 'BANGGAI KEPULAUAN', 28),
(394, 'MOROWALI', 28),
(395, 'MANADO', 29),
(396, 'MINAHASA SELATAN', 29),
(397, 'MINAHASA UTARA', 29),
(398, 'MINAHASA', 29),
(399, 'TOMOHON', 29),
(400, 'BITUNG', 29),
(401, 'KOTAMOBAGU', 29),
(402, 'BOLAANG MONGONDOW (BOLMONG)', 29),
(403, 'BOLAANG MONGONDOW UTARA', 29),
(404, 'BOLAANG MONGONDOW SELATAN', 29),
(405, 'BOLAANG MONGONDOW TIMUR', 29),
(406, 'KEPULAUAN SANGIHE', 29),
(407, 'KEPULAUAN SIAU TAGULANDANG BIARO (SITARO)', 29),
(408, 'KEPULAUAN TALAUD', 29),
(409, 'MINAHASA TENGGARA', 29),
(410, 'GORONTALO', 30),
(411, 'GORONTALO UTARA', 30),
(412, 'BOALEMO', 30),
(413, 'POHUWATO', 30),
(414, 'BONE BOLANGO', 30),
(415, 'AMBON', 31),
(416, 'MALUKU BARAT DAYA', 31),
(417, 'MALUKU TENGGARA BARAT', 31),
(418, 'MALUKU TENGAH', 31),
(419, 'BURU SELATAN', 31),
(420, 'SERAM BAGIAN TIMUR', 31),
(421, 'SERAM BAGIAN BARAT', 31),
(422, 'BURU', 31),
(423, 'MALUKU TENGGARA', 31),
(424, 'TUAL', 31),
(425, 'KEPULAUAN ARU', 31),
(426, 'TERNATE', 32),
(427, 'HALMAHERA BARAT', 32),
(428, 'HALMAHERA UTARA', 32),
(429, 'HALMAHERA SELATAN', 32),
(430, 'PULAU MOROTAI', 32),
(431, 'KEPULAUAN SULA', 32),
(432, 'TIDORE KEPULAUAN', 32),
(433, 'HALMAHERA TENGAH', 32),
(434, 'HALMAHERA TIMUR', 32),
(435, 'BIAK NUMFOR', 33),
(436, 'SUPIORI', 33),
(437, 'KEPULAUAN YAPEN (YAPEN WAROPEN)', 33),
(438, 'WAROPEN', 33),
(439, 'MAMBERAMO RAYA', 33),
(440, 'MANOKWARI', 34),
(441, 'PEGUNUNGAN ARFAK', 34),
(442, 'MANOKWARI SELATAN', 34),
(443, 'TELUK WONDAMA', 34),
(444, 'TELUK BINTUNI', 34),
(445, 'TAMBRAUW', 34),
(446, 'SORONG', 34),
(447, 'SORONG SELATAN', 34),
(448, 'MAYBRAT', 34),
(449, 'RAJA AMPAT', 34),
(450, 'FAKFAK', 34),
(451, 'KAIMANA', 34),
(452, 'PANIAI', 33),
(453, 'DEIYAI (DELIYAI)', 33),
(454, 'INTAN JAYA', 33),
(455, 'NABIRE', 33),
(456, 'DOGIYAI', 33),
(457, 'PUNCAK JAYA', 33),
(458, 'PUNCAK', 33),
(459, 'JAYAPURA', 33),
(460, 'SARMI', 33),
(461, 'KEEROM', 33),
(462, 'JAYAWIJAYA', 33),
(463, 'MAMBERAMO TENGAH', 33),
(464, 'LANNY JAYA', 33),
(465, 'TOLIKARA', 33),
(466, 'NDUGA', 33),
(467, 'YAHUKIMO', 33),
(468, 'PEGUNUNGAN BINTANG', 33),
(469, 'YALIMO', 33),
(470, 'MERAUKE', 33),
(471, 'BOVEN DIGOEL', 33),
(472, 'ASMAT', 33),
(473, 'MAPPI', 33),
(474, 'MIMIKA', 33);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE IF NOT EXISTS `tbl_kategori` (
  `id_kategori` int(11) NOT NULL auto_increment,
  `nama_kategori` varchar(30) NOT NULL,
  PRIMARY KEY  (`id_kategori`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `nama_kategori`) VALUES
(12, 'PELAMINAN KECIL'),
(13, 'PELAMINAN SEDANG'),
(14, 'PELAMINAN BESAR');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_komentar`
--

CREATE TABLE IF NOT EXISTS `tbl_komentar` (
  `id_komentar` int(11) NOT NULL auto_increment,
  `id_barang` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `id_konsumen` int(11) NOT NULL,
  `komentar` text NOT NULL,
  `status` enum('y','n') NOT NULL default 'n',
  `balas` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id_komentar`),
  KEY `id_warta` (`id_barang`),
  KEY `id_barang` (`id_barang`),
  KEY `id_konsumen` (`id_konsumen`),
  KEY `id_konsumen_2` (`id_konsumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_komentar`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_konsumen`
--

CREATE TABLE IF NOT EXISTS `tbl_konsumen` (
  `id_konsumen` int(11) NOT NULL auto_increment,
  `tanggal_daftar` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `nama_konsumen` varchar(30) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `kota` int(4) NOT NULL,
  `provinsi` int(2) NOT NULL,
  `kode_pos` varchar(5) NOT NULL,
  `telepon` varchar(12) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY  (`id_konsumen`),
  KEY `kota` (`kota`),
  KEY `provinsi` (`provinsi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `tbl_konsumen`
--

INSERT INTO `tbl_konsumen` (`id_konsumen`, `tanggal_daftar`, `nama_konsumen`, `alamat`, `kota`, `provinsi`, `kode_pos`, `telepon`, `email`, `password`) VALUES
(25, '2020-01-21 18:21:04', 'Tata', 'Padang', 68, 4, '25000', '082283493511', 'tata@gmail.com', '49d02d55ad10973b7b9d0dc9eba7fdf0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembayaran`
--

CREATE TABLE IF NOT EXISTS `tbl_pembayaran` (
  `id_bayar` int(11) NOT NULL auto_increment,
  `tanggal_bayar` date NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `rekening_asal` varchar(20) NOT NULL,
  `no_rekening_asal` varchar(100) NOT NULL,
  `pemilik_rekening` varchar(30) NOT NULL,
  `rekening_tujuan` varchar(20) NOT NULL,
  `jumlah_bayar` int(11) NOT NULL,
  `bukti_bayar` varchar(200) NOT NULL,
  `status_bayar` varchar(30) NOT NULL default 'Menunggu Pembayaran',
  PRIMARY KEY  (`id_bayar`),
  KEY `pendaftar` (`id_transaksi`),
  KEY `id_konsumen` (`id_transaksi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Dumping data for table `tbl_pembayaran`
--

INSERT INTO `tbl_pembayaran` (`id_bayar`, `tanggal_bayar`, `id_transaksi`, `rekening_asal`, `no_rekening_asal`, `pemilik_rekening`, `rekening_tujuan`, `jumlah_bayar`, `bukti_bayar`, `status_bayar`) VALUES
(46, '2017-12-04', 1, 'BNI', '777777', 'aaaaa', 'BNI', 195000, 'Desert.jpg', 'Pembayaran Diterima'),
(47, '2017-12-13', 2, 'Mandiri', '8888888', 'jha,kakaka', 'BNI', 150000, 'Jellyfish.jpg', 'Pembayaran Diterima'),
(48, '2017-12-11', 3, 'Muamalat', '888990778', 'aadwwew', 'BCA', 705000, 'Chrysanthemum.jpg', 'Pembayaran Diterima'),
(49, '2017-12-17', 4, 'BRI Syariah', '434356', 'dfdfdfd', 'BCA', 300000, 'Koala.jpg', 'Pembayaran Diterima'),
(50, '2017-12-25', 5, 'Mandiri', '2323243454', 'asasasa', 'BNI', 75000, 'Tulips.jpg', 'Menunggu Verifikasi Pembayaran'),
(51, '2017-12-21', 6, 'BCA', '2332424', 'adadada', 'BNI', 180000, 'Lighthouse.jpg', 'Pembayaran Diterima'),
(52, '2020-01-21', 7, 'BRI Syariah', '7108155919', 'Tata', 'BNI', 75000000, 'the happy.jpg', 'Pembayaran Diterima');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_provinsi`
--

CREATE TABLE IF NOT EXISTS `tbl_provinsi` (
  `id_provinsi` int(2) NOT NULL auto_increment,
  `nama_provinsi` varchar(40) NOT NULL,
  PRIMARY KEY  (`id_provinsi`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `tbl_provinsi`
--

INSERT INTO `tbl_provinsi` (`id_provinsi`, `nama_provinsi`) VALUES
(1, 'DKI JAKARTA'),
(2, 'BANTEN'),
(3, 'JAWA BARAT'),
(4, 'SUMATERA UTARA'),
(5, 'NANGGROE ACEH DARUSSALAM (NAD)'),
(6, 'SUMATERA BARAT'),
(7, 'RIAU'),
(8, 'KEPULAUAN RIAU'),
(9, 'SUMATERA SELATAN'),
(10, 'BANGKA BELITUNG'),
(11, 'LAMPUNG'),
(12, 'JAMBI'),
(13, 'BENGKULU'),
(14, 'JAWA TENGAH'),
(15, 'DI YOGYAKARTA'),
(16, 'JAWA TIMUR'),
(17, 'KALIMANTAN SELATAN'),
(18, 'KALIMANTAN TENGAH'),
(19, 'KALIMANTAN TIMUR'),
(20, 'KALIMANTAN UTARA'),
(21, 'KALIMANTAN BARAT'),
(22, 'BALI'),
(23, 'NUSA TENGGARA BARAT (NTB)'),
(24, 'NUSA TENGGARA TIMUR (NTT)'),
(25, 'SULAWESI SELATAN'),
(26, 'SULAWESI BARAT'),
(27, 'SULAWESI TENGGARA'),
(28, 'SULAWESI TENGAH'),
(29, 'SULAWESI UTARA'),
(30, 'GORONTALO'),
(31, 'MALUKU'),
(32, 'MALUKU UTARA'),
(33, 'PAPUA'),
(34, 'PAPUA BARAT');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksi`
--

CREATE TABLE IF NOT EXISTS `tbl_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `tanggal_transaksi` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `id_konsumen` int(11) NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `status` varchar(50) NOT NULL default 'Menunggu Pembayaran',
  PRIMARY KEY  (`id_transaksi`),
  KEY `id_konsumen` (`id_konsumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_transaksi`
--

INSERT INTO `tbl_transaksi` (`id_transaksi`, `tanggal_transaksi`, `id_konsumen`, `total_bayar`, `status`) VALUES
(1, '2017-12-02 11:17:22', 24, 195000, 'Proses Pengiriman'),
(2, '2017-12-02 11:22:49', 24, 150000, 'Proses Pengiriman'),
(3, '2017-12-02 11:24:10', 24, 705000, 'Proses Pengiriman'),
(4, '2017-12-02 11:24:26', 24, 300000, 'Proses Pengiriman'),
(5, '2017-12-02 11:24:39', 24, 75000, 'Menunggu Verifikasi Pembayaran'),
(6, '2017-12-02 11:28:53', 24, 180000, 'Transaksi Selesai'),
(7, '2020-01-21 18:27:45', 25, 75000000, 'Transaksi Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksi_detail`
--

CREATE TABLE IF NOT EXISTS `tbl_transaksi_detail` (
  `id_detail` int(11) NOT NULL auto_increment,
  `id_transaksi` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah_beli` int(11) NOT NULL,
  `jumlah_bayar` int(11) NOT NULL,
  PRIMARY KEY  (`id_detail`),
  KEY `id_transaksi` (`id_transaksi`,`id_barang`),
  KEY `id_barang` (`id_barang`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=64 ;

--
-- Dumping data for table `tbl_transaksi_detail`
--

INSERT INTO `tbl_transaksi_detail` (`id_detail`, `id_transaksi`, `id_barang`, `jumlah_beli`, `jumlah_bayar`) VALUES
(54, 1, 3, 2, 120000),
(55, 1, 2, 1, 75000),
(56, 2, 1, 2, 150000),
(57, 3, 3, 3, 180000),
(58, 3, 1, 4, 300000),
(59, 3, 2, 3, 225000),
(60, 4, 3, 5, 300000),
(61, 5, 1, 1, 75000),
(62, 6, 3, 3, 180000),
(63, 7, 4, 3, 75000000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksi_tmp`
--

CREATE TABLE IF NOT EXISTS `tbl_transaksi_tmp` (
  `id_konsumen` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah_beli` int(11) NOT NULL,
  `jumlah_bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_transaksi_tmp`
--

