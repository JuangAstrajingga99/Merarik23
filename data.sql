-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2023 at 06:45 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `judul` varchar(128) NOT NULL,
  `isi` text NOT NULL,
  `penulis` varchar(128) NOT NULL,
  `tanggal` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `judul`, `isi`, `penulis`, `tanggal`) VALUES
(4, 'Deskripsi tentang Pulau Kemodo', '<p><img alt=\"\" src=\"https://www.google.com/url?sa=i&url=https://travel.kompas.com/read/2023/09/06/124000927/7-fakta-taman-nasional-komodo-habitat-terakhir-hewan-purba?page=all&psig=AOvVaw0dZxenqi9GYLPtpWaewO3t&ust=1694690523033000&source=images&cd=vfe&opi=89978449&ved=0CBAQjRxqFwoTCMiFjKe8p4EDFQAAAAAdAAAAABAE\"><img alt=\"\" src=\"https://www.google.com/url?sa=i&url=https://travel.kompas.com/read/2023/09/06/124000927/7-fakta-taman-nasional-komodo-habitat-terakhir-hewan-purba?page=all&psig=AOvVaw0dZxenqi9GYLPtpWaewO3t&ust=1694690523033000&source=images&cd=vfe&opi=89978449&ved=0CBAQjRxqFwoTCMiFjKe8p4EDFQAAAAAdAAAAABAE\"><img alt=\"\" src=\"https://asset.kompas.com/crops/eIP2s99xXyYl2dhwW9hDQ6QxisY=/0x0:780x520/750x500/data/photo/2019/09/26/5d8c64544d656.jpg\"></p>\r\n\r\n<p>Pulau Komodo adalah sebuah pulau yang terletak di Kepulauan Nusa Tenggara, berada di sebelah timur Pulau Sumbawa, yang dipisahkan oleh Selat Sape. Pulau Komodo dikenal sebagai habitat asli hewan komodo. Pulau ini termasuk salah satu kawasan Taman Nasional Komodo yang dikelola oleh Pemerintah Pusat.</p>', '', NULL),
(5, 'Deskripsi tentang Pantai Pede', '<p><img alt=\"\" src=\"https://asset-2.tstatic.net/kupang/foto/bank/images/pantai-pede-labuan-bajo-kabupaten-manggarai-barat.jpg\"></p>\r\n\r\n<p>Pantai Pede merupakan satu – satunya pantai yang berada di <a href=\"https://id.wikipedia.org/wiki/Labuan_Bajo,_Komodo,_Manggarai_Barat\">Labuan Bajo</a> yang dapat kunjungi oleh masyarakat yang ingin menghabiskan akhir pekannya. Lokasi pantai ini berada di Jalan Raya Pantai Pede dan sangat mudah diakses ketika anda berada di Labuan Bajo. Objek Wisata ini menjadi tempat rekreasi masyarakat Labuan Bajo pada hari minggu atau hari libur. Biasanya pada hari minggu banyak dijumpai pedangan yang berjualan di kawasan ini. Pantai Pede memiliki pasir putih, air yang tenang dan taman dihiasi pepohonan yang cukup luas.</p>', '1', '2023-09-13 06:04:38'),
(6, 'Deskripsi tentang Cunca Rami', '<p><img alt=\"\" src=\"https://cdnimage2.caping.co.id/news/20220801/76/1313395197A600A750.jpg_480A0A1A80.webp\"></p>\r\n\r\n<p>Selain Taman Nasional Komodo, <strong>Flores </strong>juga memiliki objek wisata lain yang tak kalah menariknya yaitu <strong>Air Terjun Cunca Rami</strong>. Obyek wisata alam ini terletak di <strong>Desa Kae Lolos</strong> tepatnya di <strong>Kampung Roe, Kecamatan Sano Nggoan, Kabupaten Manggarai Barat, Nusa Tenggara Timur</strong>. Lokasi wisata ini merupakan sebuah desa yang menjadi gerbang utama untuk mendaki puncak gunung mbeliling. Dalam Bahasa Floresnya <strong>Cunca Rami</strong> memiliki arti, Cunca yang berarti air terjun dan Rami yang berarti hutan. Sangat cocok dengan arti namanya karena letak <strong>Cunca Rami </strong>yang memang dikelilingi oleh hutan rindang dan pepohonan asri.Air terjun ini sendiri mempunyai ketinggian sekitar 30 m. Terdapat kolam alami yang menampung aliran air yang jatuh ke bawah yang dijadikan tempat untuk berenang oleh wisatawan yang berkunjung ke sini.</p>', '1', '2023-09-13 06:12:30'),
(7, 'Deskripsi tentang Pulau padar', '<p><img alt=\"\" src=\"https://asset-a.grid.id/crop/0x0:0x0/x/photo/2019/07/20/1929748320.jpg\"></p>\r\n\r\n<p>Pulau Padar adalah pulau ketiga terbesar yang berada di kawasan Taman Nasional Komodo, keberadaan pulau Padar tidak sepopuler Pulau Rinca dan Pulau Komodo, akan tetapi pulau ini tidak kalah indah dan cantik dari pulau pulau lainnya yang terletak di selatan Nusa Tenggara Timur tersebut.</p>\r\n\r\n<p>Pulau padar juga termasuk sebagai situs warisan dunia yang di akui oleh UNESCO karena berada di wilayah Taman Nasional Komodo. Antara Pulau Padar dan Pulau Komodo dipisahkan dengan selat, yaitu selat Lintah dan Pulau Padar sendiri tidak di huni oleh Hewan Komodo</p>', '1', '2023-09-13 06:33:08'),
(8, 'Deskripsi tentang Cunca Wulang', '<p><img alt=\"\" src=\"https://awsimages.detik.net.id/customthumb/2016/05/07/1519/140734_aircover.jpg?w=600&q=90\"></p>\r\n\r\n<p>Flores memang penuh dengan pemandangan alam yang sangat memikat. Mulai dari keindahan alam di daratannya hingga alam bawah lautnya. satu tempat di Flores yang terkenal dengan keindahannya adalah Labuan Bajo. Salah satu keindahan alam yang terdapat di Labuan Bajo adalah objek wisata <strong>Air Terjun Cunca Wulang</strong>. Dinamakan <strong>Cunca Wulang</strong> karena lokasi air terjun ini terdapat di<strong> Desa Cunca Wulang, Kecamatan Mbeilling, Kabupaten Manggarai Barat, Nusa Tenggara Timur</strong>.<strong>Air Terjun Cunca Wulang </strong>sendiri terdapat di kawasan hutan Mbeilling. Bila diartikan kedalam bahasa Indonesia, Cunca dan Wulang sendiri berarti air terjun dan Bulan.<strong> Cunca Wulang</strong> sendiri berada di ketinggian 200 meter di atas permukaan laut sehingga udara di sekitar pasti lebih terasa sejuk. Sekilas, air terjun ini terlihat seperti Grand Canyon versi kecil dengan aliran sungainya berada diantara tebing bebatuan besar dan air terjunnya berada di atas batu-batu dan keluar melalui celah bebatuan.</p>', '1', '2023-09-13 06:59:24'),
(9, 'Deskripsi tentang Batu Cermin', '<p><img alt=\"\" src=\"https://znews.id/wp-content/uploads/2021/08/Screenshot_20210821-182124_Instagram.jpg\"></p>\r\n\r\n<p><strong>Gua Batu Cermin</strong> adalah gua yang terdapat di bukit batu yang gelap di <a href=\"https://id.wikipedia.org/wiki/Labuan_Bajo,_Komodo,_Manggarai_Barat\">Labuan Bajo</a>, <a href=\"https://id.wikipedia.org/wiki/Kabupaten_Manggarai_Barat\">Manggarai Barat</a>, <a href=\"https://id.wikipedia.org/wiki/Nusa_Tenggara_Timur\">Nusa Tenggara Timur</a>, <a href=\"https://id.wikipedia.org/wiki/Indonesia\">Indonesia</a>.<a href=\"https://id.wikipedia.org/wiki/Gua_Batu_Cermin#cite_note-Indonesia\'s_Official_Tourism_Website-1\">[1]</a> Luas gua ini 19 hektar, dan tingginya sekitar 75 meter.<a href=\"https://id.wikipedia.org/wiki/Gua_Batu_Cermin#cite_note-Made_Asdhiana-2\">[2]</a> Sinar matahari masuk ke gua melalui dinding-dinding gua, dan memantulkan cahayanya di dinding batu sehingga merefleksikan cahaya kecil ke areal lain dalam gua sehingga terlihat seperti cermin.<a href=\"https://id.wikipedia.org/wiki/Gua_Batu_Cermin#cite_note-Indonesia\'s_Official_Tourism_Website-1\">[1]</a> <a href=\"https://id.wikipedia.org/wiki/Stalaktit\">Stalaktit</a> dan <a href=\"https://id.wikipedia.org/wiki/Stalagmit\">stalagmit</a> dalam gua terlihat berkilauan saat disinari cahaya senter maupun cahaya matahari.<a href=\"https://id.wikipedia.org/wiki/Gua_Batu_Cermin#cite_note-Afif-3\">[3]</a> Kilauan ini disebabkan oleh kandungan garam di dalam air yang mengalir di saat turun hujan.<a href=\"https://id.wikipedia.org/wiki/Gua_Batu_Cermin#cite_note-Afif-3\">[3]</a> Hal inilah yang membuat masyarakat sekitar menyebut gua ini denga gua batu cermin.<a href=\"https://id.wikipedia.org/wiki/Gua_Batu_Cermin#cite_note-Indonesia\'s_Official_Tourism_Website-1\">[1]</a></p>', '1', '2023-09-13 07:04:44'),
(10, 'Deskripsi tentang Danau Sano Nggoang', '<p><img alt=\"\" src=\"https://www.gotravelaindonesia.com/wp-content/uploads/Danau-Sano-Nggoang.jpg\"></p>\r\n\r\n<p>Danau Sano Nggoang atau Danau Nggoang adalah danau vulkanik terluas dan terdalam di Nusa Tenggara Timur. Danau Sanonggoang terletak di Wae Sano, Sano Nggoang, Kabupaten Manggarai Barat, NTT.</p>\r\n\r\n<p>Danau Sano Nggoang merupakan danau vulkanik paling luas yang ada di Nusa Tenggara Timur. Danau ini memiliki luas sekitar 5.500 ha dan dianggap sebagai danau paling dalam di dunia dengan kedalaman 600 m. Di sepanjang Danau Sano Nggoang ini terdapat beberapa desa yang merupakan tempat tinggal para penduduk setempat.</p>', '1', '2023-09-13 07:10:04'),
(11, 'Deskripsi tentang Danau Sano Limbung', '<p><img alt=\"\" src=\"https://cdn.tajukflores.com/posts/1/2019/2019-10-08/23c83e0131b9daf9a73dfc4b15224e27_1.jpg\"></p>\r\n\r\n<p>Sano Limbung adalah sebuah danau yang terletak dikampung Ngaet desa Golo Lujang Kecamatan Boleng Kabupaten Manggarai Barat.Saat ini danau Sano Limbung telah menjadi salah satu tempat pariwisata yang banyak dikunjungi oleh masyarakat baik yang ada di desa Golo Lujang itu sendiri maupun yang datang dari luar. Lokasi danau ini sangat srategis karena berada di ruas jalan Labuan Bajo, Terang, Pacar, Bari dan Rego. Setiap kendaraan pasti selalu berhenti di lokasi obyek ini. Mereka istrahat sejenak menikmati indahnya danau sano Limbung serta menikmati kuliner yang sudah disiapkan oleh masyarakat.</p>\r\n\r\n<p> </p>\r\n\r\n<p> </p>', '1', '2023-09-14 05:51:14');

-- --------------------------------------------------------

--
-- Table structure for table `data_wisata`
--

CREATE TABLE `data_wisata` (
  `id_wisata` int(11) NOT NULL,
  `id_wilayah` int(11) NOT NULL,
  `id_jenis_wisata` int(11) NOT NULL,
  `penginput` int(11) NOT NULL,
  `harga_tiket` varchar(128) NOT NULL,
  `luas_wisata` varchar(128) NOT NULL,
  `lat` varchar(128) NOT NULL,
  `lng` varchar(128) NOT NULL,
  `gambar` varchar(128) NOT NULL,
  `tanggal` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_wisata`
--

INSERT INTO `data_wisata` (`id_wisata`, `id_wilayah`, `id_jenis_wisata`, `penginput`, `harga_tiket`, `luas_wisata`, `lat`, `lng`, `gambar`, `tanggal`) VALUES
(17, 26, 12, 1, '10.000', '5.12', '-8.5286111', '120.1061111', '6d23edf2964529cc823f8de6bb3eebd6_13.jpg', '2023-09-18 05:58:26'),
(26, 18, 12, 1, '50.000', '18.17', '-8.5850461', '119.4411476', 'pulau_kemodo1.jpg', '2023-09-18 07:32:53'),
(27, 21, 12, 1, '50.000', '173.00', '-8.6489909', '119.5832593', 'pulau_padar4.jpg', '2023-09-18 07:35:10'),
(29, 20, 12, 1, '20.000', '3.87', '-8.545105999999999', '119.9939394', 'cunca_wulang5.jpg', '2023-09-18 07:43:08'),
(30, 19, 12, 1, '10.000', '1.25', '-8.5082185', '119.8780707', 'pantai-pede-labuan-bajo-kabupaten-manggarai-barat4.jpg', '2023-09-18 07:45:57'),
(31, 22, 12, 1, '20.000', '5.13', '-8.712141399999998', '119.9885061', 'danau-sano-nggoang22.jpg', '2023-09-18 07:49:10'),
(33, 23, 12, 1, '20.000', '19.34', '-8.483313299999999', '119.898875', 'goa_batu_cermin.jpg', '2023-09-18 07:58:37'),
(36, 24, 12, 1, '20.000', '1.90', '-8.6260851', '119.997147', 'cunca_rami5.jpg', '2023-09-18 08:21:24'),
(46, 29, 12, 1, '', '7.23', '-8.389844499999999', '119.8525909', 'IMG_20170822_213804_525-750x750_(2)6.jpg', '2023-09-19 18:55:33');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'staf pegawai', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_wisata`
--

CREATE TABLE `jenis_wisata` (
  `id_jenis_wisata` int(11) NOT NULL,
  `nama_wisata` varchar(128) NOT NULL,
  `icon_marker` varchar(56) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_wisata`
--

INSERT INTO `jenis_wisata` (`id_jenis_wisata`, `nama_wisata`, `icon_marker`) VALUES
(12, 'Wisata alam.', 'images.png');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `gambar` varchar(128) NOT NULL,
  `keterangan1` varchar(128) NOT NULL,
  `keterangan2` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `gambar`, `keterangan1`, `keterangan2`) VALUES
(8, 'cunca_rami.jpg', 'Air terjun', 'Cunca rami'),
(9, 'pantai-pede-labuan-bajo-kabupaten-manggarai-barat.jpg', 'Pantai', 'Pantai pede'),
(10, 'pulau_padar.jpg', 'Pulau', 'Pulau padar'),
(11, '5d8c64544d656.jpg', 'Pulau', 'Komodo'),
(12, 'cunca_wulang.jpg', 'Air terjun', 'Cunca wulang'),
(13, 'danau-sano-nggoang2.jpg', 'Danau', 'Sano Nggoang'),
(14, 'goa_batu_cermin.jpg', 'Gua', 'Batu cermin'),
(15, '6d23edf2964529cc823f8de6bb3eebd6_1.jpg', 'Danau', 'Sano Limbung'),
(16, 'gua_rangko1.jpg', 'Gua', 'Rangko');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama_lengkap` varchar(256) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `nomor_telepon` varchar(20) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `foto` varchar(256) NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama_lengkap`, `username`, `password`, `nomor_telepon`, `email`, `foto`, `last_login`, `ip_address`, `salt`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `active`) VALUES
(1, 'Administrator', 'admin', '$2y$10$5T04Z3KZIfx1hdKdr6SLuOIGLiWirx7290J4zTaDehNfJ/ixZlhG2', '0', 'admin@admin.com', '', 1695171828, '127.0.0.1', '', '', NULL, NULL, NULL, 1268889823, 1),
(2, 'Eka2023', 'Eka2023', '$2y$08$hJRpXNbh5i7UAqIZJ5yDaehvwpuzy.7gC4d6wi1dB5Lc7MbdR/cL.', '083272328923', 'eka2023@gmail.com', 'logo11.png', 1694499471, '127.0.0.1', NULL, NULL, NULL, NULL, NULL, 1694499446, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `wilayah`
--

CREATE TABLE `wilayah` (
  `id_wilayah` int(11) NOT NULL,
  `no_wilayah` int(11) NOT NULL,
  `nama_wilayah` varchar(128) NOT NULL,
  `alamat` varchar(256) NOT NULL,
  `no_telepon_pengelola` varchar(56) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wilayah`
--

INSERT INTO `wilayah` (`id_wilayah`, `no_wilayah`, `nama_wilayah`, `alamat`, `no_telepon_pengelola`) VALUES
(18, 1, 'Pulau Komodo', 'Pulau Komodo-Nusa Tenggara Timur', '0823145678'),
(19, 2, 'Pantai pede', 'Jl.Pantai Pede, Lebuan Bajo', '08543267512'),
(20, 3, 'Cunca Wulang', 'Desa Wersawe,Mbeliling', '0824567864'),
(21, 4, 'Pulau Padar', 'Pulau Padar', '0856432786'),
(22, 5, 'Danau Sano Nggoang', 'Wae Sano, Sano Nggoang', '0823987654'),
(23, 6, 'Batu Cermin', 'Jl. Frans Nala-Lebuan Bajo', '0856465432'),
(24, 7, 'Cunca Rami', 'Golo Ndaring,Sano Nggoang', '0856409876'),
(26, 8, 'Danau Sano Limbung', 'Desa  Golo Lujang', '082314876543'),
(29, 9, 'Gua Rangko', 'Tj. Boleng, Kec. Boleng, Kabupaten Manggarai Barat, Nusa Tenggara Timur', '0854367876');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`),
  ADD KEY `penulis` (`penulis`);

--
-- Indexes for table `data_wisata`
--
ALTER TABLE `data_wisata`
  ADD PRIMARY KEY (`id_wisata`),
  ADD KEY `id_tanah` (`id_wisata`,`id_jenis_wisata`,`penginput`,`harga_tiket`,`luas_wisata`,`lat`,`lng`,`gambar`,`tanggal`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_wisata`
--
ALTER TABLE `jenis_wisata`
  ADD PRIMARY KEY (`id_jenis_wisata`),
  ADD KEY `id_jenis_bangunan` (`id_jenis_wisata`,`nama_wisata`,`icon_marker`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- Indexes for table `wilayah`
--
ALTER TABLE `wilayah`
  ADD PRIMARY KEY (`id_wilayah`),
  ADD KEY `id_penduduk` (`id_wilayah`,`no_wilayah`,`nama_wilayah`,`alamat`,`no_telepon_pengelola`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `data_wisata`
--
ALTER TABLE `data_wisata`
  MODIFY `id_wisata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jenis_wisata`
--
ALTER TABLE `jenis_wisata`
  MODIFY `id_jenis_wisata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wilayah`
--
ALTER TABLE `wilayah`
  MODIFY `id_wilayah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
