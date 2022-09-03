-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2022 at 07:16 PM
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
-- Database: `smkpusponegoro`
--

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `galeri_id` int(5) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `kategori` int(2) NOT NULL,
  `isi` mediumtext NOT NULL,
  `foto` varchar(35) DEFAULT NULL,
  `link` mediumtext,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `galeri`
--

INSERT INTO `galeri` (`galeri_id`, `judul`, `kategori`, `isi`, `foto`, `link`, `created_at`, `updated_at`) VALUES
(15, 'Video Sholawat Thibbil Qulub SMK Pusponegoro Brebes', 1, '<p>Ayooo... Memasyarakatkan Sholawat......</p>\r\n', NULL, 'https://www.youtube.com/embed/mUDKGSV2Tls', '2021-07-18 13:50:00', '2022-06-06 07:49:54'),
(16, 'Profil SMK Pusponegoro 01 Brebes', 1, '<p>Tak kenal, maka tak sayang, tak sayang maka tak cinta. Perkenankan kami menampilkan profil sekolah kami tuk dikenal, disayang dan dicinta banyak orang.</p>\r\n', NULL, 'https://www.youtube.com/embed/tuIlFtGvdUo', '2021-07-18 13:52:24', '2022-06-06 07:50:16'),
(17, 'Asyik Temon Holic Juragan Empang', 1, '<p>Kegiatan Jalan Sehat Dalam Rangka Memperingati HUT RI ke- 72 Hari Sabtu, 19 Agustus 2017 SMK Pusponegoro 01 Brebes</p>\r\n', NULL, 'https://www.youtube.com/embed/sqwPsPrIXHk', '2021-07-18 13:54:22', '2022-06-06 07:49:22'),
(18, 'Praktik Diklat Penguatan Kepala Sekolah SMK Pusponegoro 01 Brebes', 1, '<p>Praktik Diklat Penguatan Kepala Sekolah SMK Pusponegoro 01 Brebes</p>\r\n', NULL, 'https://www.youtube.com/embed/U3kAhJlw8vE', '2021-07-18 13:55:51', '2022-06-06 07:49:34'),
(19, 'AADS | Cerita Pendek SMK Pusponegoro 01 Brebes', 1, '', NULL, 'https://www.youtube.com/embed/enrhFtsOI6A', '2021-07-18 13:57:18', '2022-06-06 07:49:09'),
(20, 'PROSESI WISUDAWAN-WISUDAWATI 2017 SMK PUSPONEGORO 01 BREBES', 1, '<p>Bagi alumni  tahun 2016/2017 yang belum dapat CD Videonya bisa Download atau datang langsung ke Sekolah di Ruang IT/Lab. Komputer. / Hub. Pak Rastoni</p>\r\n', NULL, 'https://www.youtube.com/embed/=ayFEiRL8lbk', '2021-07-18 14:18:06', '2022-06-06 07:50:03'),
(21, 'Profil Kegiatan SMK Pusponegoro 01 Brebes', 1, '', NULL, 'https://www.youtube.com/embed/_25f8S0sw8I', '2021-07-18 14:19:11', '2022-06-06 07:49:45'),
(22, 'Angklung Cesar SMK Pusponegoro 01 Brebes', 1, '<p>Wujud Kreativitas siswa-siswa dalam kegiatan ekstra Calung SMK Pusponegoro 01 Brebes</p>\r\n', NULL, 'https://www.youtube.com/embed/p1ensnvufNo', '2021-07-18 14:21:11', '2022-06-06 07:49:16'),
(23, 'Parade Hadroh Pelajar Brebes Keren', 1, '<p>Parade Hadroh Pelajar Kab. Brebes Dalam Rangka Peringatan Maulid Nabi Muhammad SAW. di SMA N 1 Brebes, SMK Pusponegoro 01 Brebes Turut Serta Dalam memeriahkan Maulid Nabi Muhammad SAW. tahun 2017</p>\r\n', NULL, 'https://www.youtube.com/embed/i1ozk0MK3ww', '2021-07-18 14:22:35', '2022-06-06 07:48:41'),
(24, 'Pramuka', 0, '', 'galeri-210718-f7a39d7f47.jpg', '', '2021-07-18 14:43:33', NULL),
(25, 'Paskibra', 0, '', 'galeri-210718-d119a02021.jpg', '', '2021-07-18 14:44:25', NULL),
(26, 'Eskul Calung', 0, '', 'galeri-210718-5a5766dd97.jpg', '', '2021-07-18 14:44:57', NULL),
(27, 'Eskul Hadroh', 0, '', 'galeri-210718-1933736057.jpg', '', '2021-07-18 14:45:52', NULL),
(28, 'Pancak Silat Pagar Nusa', 0, '', 'galeri-210718-ebf4a67ad8.jpg', '', '2021-07-18 14:49:36', NULL),
(29, 'Kunjungan POLRES Tegal', 0, '', 'galeri-210718-c7d830edc4.jpg', '', '2021-07-18 14:50:38', NULL),
(30, 'Lab Komputer', 0, '', 'galeri-210718-90b9183f8b.jpg', '', '2021-07-18 14:51:10', NULL),
(31, 'Bukber', 0, '', 'galeri-210718-9f55069399.jpg', '', '2021-07-18 14:52:05', NULL),
(32, 'Tasyakuran', 0, '', 'galeri-210718-2fa6cb0776.jpg', '', '2021-07-18 14:53:20', NULL),
(33, 'PMR', 0, '', 'galeri-210718-de06ce4800.jpg', '', '2021-07-18 14:54:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gelombang`
--

CREATE TABLE `gelombang` (
  `gelombang_id` int(5) NOT NULL,
  `judul_gel` varchar(50) NOT NULL,
  `tgl_buka` date NOT NULL,
  `tgl_tutup` date NOT NULL,
  `isi` mediumtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gelombang`
--

INSERT INTO `gelombang` (`gelombang_id`, `judul_gel`, `tgl_buka`, `tgl_tutup`, `isi`, `created_at`, `updated_at`) VALUES
(1, 'Gelombang 1', '2019-12-01', '2019-02-28', '<p>Gelombang 1</p>\r\n\r\n<p>Pembayaran SPP sebesar Rp.110.000*</p>\r\n', '2019-07-12 15:03:54', '2019-09-27 11:46:38'),
(2, 'Gelombang 2', '2019-03-01', '2019-04-30', '<p>Gelombang 2</p>\r\n\r\n<p>Pembayaran SPP sebesar Rp.165.000*</p>\r\n', '2019-07-12 15:07:24', '2019-09-27 11:46:24'),
(3, 'Gelombang 3', '2019-06-01', '2019-07-31', '<p>Gelombang 3</p>\r\n\r\n<p>Pembayaran SPP sebesar Rp.220.000*</p>\r\n', '2019-07-12 15:08:25', '2019-09-27 11:46:00');

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `info_id` int(5) NOT NULL,
  `id_kategori` int(5) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `isi` mediumtext NOT NULL,
  `foto` varchar(35) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`info_id`, `id_kategori`, `judul`, `isi`, `foto`, `created_at`, `updated_at`) VALUES
(7, 1, 'Gladi Resik Pagelaran Seni dan Budaya TMII SMK Pusponegoro Dihadiri Bupati Brebes', '<p><span dir=\"auto\">BREBES, Bupati Brebes Hj. Idza Priyanti, SE. MH melihat langsung gladi resik pagelaran seni dan budaya TMII di pendopo Kabupaten Brebes. Didampingi beberapa SKPD, gladi resik dimulai sekitar pukul 15.00 WIB.</span></p>\r\n\r\n<p><span dir=\"auto\">Gladi resik pagelaran dipandu oleh Wijanarto selaku Kabid Kebudayaan Dinbudpar Kabupaten Brebes. Jajaran Dinbudpar khususnya bidang kebudayaan juga ikut menyaksikan gladik resik. Kamis 4 Oktober 2018.</span></p>\r\n\r\n<p><span dir=\"auto\">Dalam pagelaran kali ini, akan mengangkat cerita Babad Losari Atawa Carita Panembahan Angkawijaya. Kisah Panembahan Angkawijaya atau Panembahan Losari, yang makamnya di Pulosaren, Losari Lor Kabupaten Brebes, cerita ini terkembang. Pangeran Losari merupakan keturunan dari Pangeran Pesarean atau Pangeran Mohammad Arifin dengan Ratu Nyawa. Panembahan Losari atau Panembahan Losari merupakan cucu dari Sunan Gunung Jati.</span></p>\r\n\r\n<p><span dir=\"auto\">Memadukan konsep sendratari dengan melibatkan 3 kareografer masing-masing Yulia, S.Sn, Mega Amelia dan Linawati, serta komposer digarap Ade Riyanto dkk. Sendratari ini menghidupkan suasana gaya pesisiran Losari dan Brebesan.</span></p>\r\n\r\n<p><span dir=\"auto\">Di bawah kerja sama Dinas Kebudayaan dan Pariwisata Kabupaten bersama Dewan Kesenian Daerah Kabupaten Brebes serta komunitas seni di Kabupaten Brebes, garapan tahun ini menampilkan ekologi budaya pesisiran utara Brebes, tepatnya wilayah Kecamatan Losari.</span></p>\r\n\r\n<p><span dir=\"auto\">“Losari merupakan wilayah perbatasan Brebes dengan provinsi Jawa Barat tepatnya Kabupaten Cirebon, sangat kaya dengan potensi budaya yang sama dengan wilayah Cerbonan. Baik secara bahasa maupun tradisi” papar Kabid Kebudayaan Dinbudpar Brebes, Wijanarto.</span></p>\r\n\r\n<p><span dir=\"auto\">Lebih jauh Wijanarto menyampaikan bahwa penggarapan pementasan ini mengeksplorasi cerita tutur dan narasi historis yang lama dikenal oleh masyarakat Losari Lor Kabupaten Brebes.</span></p>\r\n\r\n<p><span dir=\"auto\">Ada 50 pendukung pementasan ini yang mencakup 30 penari yang diambilkan dari pelajar di SMPN 1 Losari, SMP Negeri 2 Brebes, SMA Negeri 1 Brebes, SMA Negeri 2 Brebes, serta 15 musik dari beberapa seniman musik sekaligus guru musik di SMP Negeri 1 Tanjung, SMP Negeri 2 Jatibarang, SMP Negeri 1 Brebes, SMP Negeri 2 Brebes, SMPN 1 Ketanggungan, SMANegeri 3 Brebes, SMKN 1 Kersana, SMKN 1 Brebes SMK Mitra Mandiri Ketanggungan, SMK Pusponegoro Brebes, SMK Bisma Kersana dan SMP NU Terpadu. Sisanya pendamping dari Dewan Kesenian Daerah Brebes.</span></p>\r\n\r\n<p><span dir=\"auto\">Pergelaran ini disajikan dengan bentuk sendratari yang berkoborasi dengan gamelan renteng yang dipengaruhi Cerbonan. Kisah menawan dari Pangeran Angkawijaya ini hingga menyingkir ke Pulosaren akibat kekhawatiran tidak mampu menjaga hubungan Ratu Nyai Mas Gelampok isteri kakaknya yang menjadi Sultan Cirebon yang jatuh hati terhadapnya, menjadi alasan menyingkir. Perpaduan tari dan operet mini akan menggugah sosok siapa Pangeran Angkawijaya yang makamnya berada di Pulosaren Losari Kabupaten Brebes.</span></p>\r\n\r\n<p><span dir=\"auto\">Selain pementasan juga terdapat bazaar produk unggulan Kabupaten Brebes yang diikuti UMKM binaan 5 SKPD serta komunitas masyarakat Brebes di Jabodetabek yang tergabung dalam Masigab, UMKM Remojong Brebes serta 7 organisasi lainnya. “Diharapkan mereka bisa dilibatkan dalam membangun Kabupaten Brebes tercinta. Selain KPMDB Brebes” pungkas Wijanarto.</span></p>\r\n', 'info-220619-4671aeaf49.png', '2021-07-18 14:58:32', '2022-06-19 10:30:00'),
(8, 2, 'SMA 1 Brebes dan SMK 1 Brebes Juara Debat Bahasa', '<p><span dir=\"auto\">BREBES-SMA Negeri 1 Brebes dan SMK N 1 Brebes berhasil memboyong juara debat Bahasa Indonesia dan Bahasa Inggris tingkat Kabupaten Brebes yang digelar Dinas Pendidikan dan Olahraga (DinDikpora) Kab Brebes. Lomba yang digelar di SMK Pusponegoro 01 Brebes itu terpisah antara juara SMA dan SMK, Sabtu (14/4).</span></p>\r\n\r\n<p><span dir=\"auto\">Untuk tingkat SMA, Lomba Debat Bahasa Indonesia juara 1 diraih SMA 1 Brebes dengan nilai 810, juara 2 SMA 2 Brebes (807) dan juara 3 SMA 1 Salem (732). Untuk Debat Bahasa Inggris, juara 1 SMA 1 Brebes, juara 2 SMA N 1 Bumiayu dan Juara 3 SMA N 2 Brebes.</span></p>\r\n\r\n<p><span dir=\"auto\">Sedang tingkat SMK, Lomba Debat Bahasa Indonesia juara 1 diraih SMK N 1 Brebes dengan nilai 768, juara 2 SMK N 1 Bulakamba (708), juara 3 SMK Arya Singasari Larangan (615,9). Sedang lomba Bahasa Inggris SMK 1 Brebes dengan nilai 29,2, juara 2 SMK N 1 Kersana (28,9) dan juara 3 SMK N 1 Tonjong (27,9).</span></p>\r\n\r\n<p><span dir=\"auto\">Ketua Panitia Drs Taufiq MPd menjelaskan, lomba debat Bahasa Indonesia dan Bahasa Asing digelar setiap tahun. Dikandung maksud agar siswa SMA maupun SMK menguasai bahasa Indonesia dan Bahasa Asing sebagai bekal pergaulan internasional dalam memilih sekolah maupun dunia kerja.</span></p>\r\n\r\n<p><span dir=\"auto\">“Bahasa menunjukan bangsa, maka mahir berbahasa Idonesia akan menjadi duta yang baik. Demikian pula dengan menguasai bahasa asing maka bisa menyerap ilmu yang mayoritas dari bahasa asing dan tidak ‘tersesat’ ketika berada di luar negeri,” kata Taufiq.</span></p>\r\n\r\n<p><span dir=\"auto\">Lomba yang bertemakan “Kebiasaan Berpendapat Di Media Sosial Dapat Mengikis Budaya Santun Berbahasa“ diikuti ratusan pelajar SMA dan SMK se Kabupaten Brebes berlangsung hingga malam hari.</span></p>\r\n\r\n<p><span dir=\"auto\">Kepala SMK N 1 Brebes Ali Subkhi mengaku senang dengan prestasi yang diraih peserta didiknya. Bagi SMK 1 Brebes, menurut Ali menjadi juara Kabupaten sudah menjadi tradisi. Bahkan tahun yang lalu meraih juara 2 tingkat Provinsi untuk lomba Debat Bahasa Inggris. Selain sudah diadakan English club, juga sudah dipersiapkan jauh hari sebelum perlombaan.</span></p>\r\n\r\n<p><span dir=\"auto\">Sementara Kepala SMA N 1 Brebes Winaryo mengungkapkan, Tim perwakilan Lomba Bahasa Inggris beranggotakan Ismi Alifia Prisman, Muttia Maudina Rahmah, Sekarnada Salsabila. Sedang Tim Debat Bahasa Indonesia beranggotakan SS Azelia Putri, Retno Hapsari Rakhmawati dan Eka Apriliana Putri.</span></p>\r\n\r\n<p><span dir=\"auto\">“Torehan prestasi yang diraih siswanya sangat membanggakan, tentunya bisa menjadi daya pacu bagi siswa SMA Negeri 1 Brebes untuk terus berkarya dan membawa harum SMA Negeri 1 Brebes,” ucapnya bangga.</span></p>\r\n\r\n<p> </p>\r\n', 'info-220619-3e3dab60e3.jpg', '2021-07-18 15:01:00', '2022-06-19 10:22:03'),
(9, 2, 'Rayakan HUT ke 44, SMK Pusponegoro Adakan Lomba Jalan Sehat', '<p>Sebagai tanda rasa syukur di Hari Ulang Tahun ke-44 SMK Pusponegoro 01 Brebes mengadakan tumpengan. Selain tumpengan juga digelar jalan sehat yang mengambil rute dari sekolah menuju jalan Suprapto, Ahmad Dahlan, Yos Sudarso, KH Mukhtar, Pembangunan, Dewi Sartika Sigambir, Ahmad Dahlan patrol tingkat, Moh Yamin, Piere Tendean, Barokah dan kembali ke sekolah sejauh lebih kurang 6 kilometer.</p>\r\n\r\n<p>“Lebih dari seribu peserta memeriahkan jalan sehat karena gratis, dengan hadiah utama 2 buah sepeda gunung dan ratusan hadiah hiburan lainnya,” kata Surip Rachmano Amd selaku ketua panitia HUT SMK Puspo ke 44, Minggu (24/1/2016).</p>\r\n\r\n<p>Menurut Surip kegiatan ini dilakukan sebagai ungkapan terima kasih kepada Allah SWT atas segala nikmat yang telah diberikan, sehingga sekolah dan warga sekolah secara keseluruhan diberi panjang umur dan mencapai kesuksesan.</p>\r\n\r\n<p>H Darno MPd selaku Kepala Sekolah SMK Puspo dalam gelar tasyakuran menyatakan bahwa keberadaan SMK Puspo sangat membantu masyarakat Brebes dalam pemenuhan tenaga muda trampil.</p>\r\n\r\n<p>Disamping itu, turut meningkatkan derajat pendidikan dan terbukti turut menggenjot peningkatan Indeks Pembangunan Manusia (IPM) Kabupaten Brebes.</p>\r\n\r\n<p>“Dulu, SMK Puspo tidak mendapat perhatian dari masyarakat, tetapi sekarang makin hebat dan banyak peminatnya,” ujarnya.<br>\r\nBahkan, sekolah yang berlokasi di jalan Letjen Suprapto No 176 Brebes itu kini memiliki siswa 598. Mereka tersebar di jurusan teknik kendaraan ringan (otomotif), teknik audio video, teknik bangunan/arsitektur, dan akuntansi.</p>\r\n\r\n<p>SMK Puspo juga sudah mendapatkan ISO 9001:2008 pada tahun 2014. Karena telah berhasil meningkatkan manajemen mutu yang dikeluarkan oleh United Register of System Sertification (URSS) tentang Manajeman of Vocational School. </p>\r\n', 'info-220619-39b1b0fc4a.jpg', '2021-07-18 15:14:00', '2022-06-19 10:25:51'),
(10, 2, 'TDR Racing Mendapat Kunjungan Ratusan Pelajar SMK Pusponegoro 01 Brebes', '<p>Setelah sebelumnya mendapat kunjungan industri dari SMK Teladan Kertasemaya Indramayu (27 Agustus), lanjut kemudian TDR Technology Center mendapat visitation dari SMK Pusponegoro 01 Brebes, Jawa Tengah jurusan Teknik Sepeda Motor (TSM).</p>\r\n\r\n<p><br>\r\nHeadline Product Road Race Umum <br>\r\n29 Agustus, 2019<br>\r\nTDR Racing Mendapat Kunjungan Ratusan Pelajar SMK Pusponegoro 01 Brebes<br>\r\nPosted By: BeritaBalap.com berita balap, beritabalap.com, Kunjungan Industri, SMK Pusponegoro 01 Brebes, TDR Racing</p>\r\n\r\n<p><br>\r\nBeritaBalap.com-Setelah sebelumnya mendapat kunjungan industri dari SMK Teladan Kertasemaya Indramayu (27 Agustus), lanjut kemudian TDR Technology Center mendapat visitation dari SMK Pusponegoro 01 Brebes, Jawa Tengah jurusan Teknik Sepeda Motor (TSM).</p>\r\n\r\n<p><br>\r\nKunjungan SMK Pusponegoro 01 Brebes, Jawa Tengah jurusan Teknik Sepeda Motor (TSM) di TDR Technology Center<br>\r\nDemikian berlangsung pada Kamis, (28 Agustus) di TDR Technology Center yang berlokasi di Pulogadung, Jakarta Timur. Ratusan siswa SMK Pusponegoro 01 Brebes diberikan edukasi oleh manajemen TDR Racing International yang dikomandoi Jeffrey Willar. Ini sehubungan tehnologi terkini yang konsisten dikembangkan TDR Racing.</p>\r\n\r\n<p>Anyway, TDR Technology Center memang sengaja dibangun sebagai pusat pengembangan tehnologi sekaligus memberikan pengetahuan yang up to date alias terkini sehubungan dunia sepeda motor. Siswa atau pelajar diajak untuk belajar memahami tehnologi terbaru yang dikembangkan TDR Racing.</p>\r\n\r\n<p>Pada akhir sesi acara diberikan berbagai hadiah dan juga cenderamata diantara kedua belah pihak sebagai ungkapan terimakasih atas sinergi yang sangat berguna dalam menciptakan sumber daya manusia yang berkualitas. Ini sesuai misi TDR One Team dalam mewujudkan Empowering High Performance. </p>\r\n', 'info-220619-8b42d3eeb4.jpg', '2021-07-18 15:28:13', '2022-06-19 10:18:41'),
(11, 1, 'Belum Lulus Sudah di Terima Kerja', '<p>BREBES-Sebanyak 19 siswa SMK Pusponegoro 01 Brebes berhasil mendapatkan peluang kerja di berbagai perusahaan nasional ternama meski belum dinyatakan lulus sekolah. Mereka dipastikan lulus langsung kerja setelah menjalani tes rekrutmen jauh hari sebelum Ujian Nasional dan dinyatakan layak bekerja sesuai dengan bidang keahlian masing-masing.</p>\r\n\r\n<p>“Ada 19 siswa-siswi yang berhasil diterima diperusahaan ternama nasional,” tutur Kepala SMK Pusponegoro 01 Brebes H Darno MMPd saat menyampaikan sambutan penglepasan wisudawan wisudawati SMK Pusponegoro tahun pelajaran 2016/2017, di Gedung Islamic Center, Jalan Yos Sudarso Brebes, Sabtu (29/4).</p>\r\n\r\n<p>SMK Puspo, kata Darno, selalu mendorong siswanya agar cepat mendapat pekerjaan. Pihak sekolah bekerja sama dengan berbagai perusahaan menjalin kerja sama dengan melakukan rekrutmen melalui Memorandum of Understanding (MoU) sehingga siswa yang potensial bisa langsung mendapatkan pekerjaan.</p>\r\n\r\n<p>Melalui Bursa Kerja Khusus (BKK) sekolah, telah membuka rekrutmen sebanyak empat kali. Pelamar tidak hanya datang dari SMK Puspo saja, tetapi juga dari Tegal, Pemalang, Cirebon, Purwokerja dan lain-lain. “Kalaupun anak-anak nanti sudah lulus dan belum mendapatkan pekerjaan bisa konsultasi terus ke BKK Puspo untuk di salurkan ke perusahaan yang membutuhkan,” tuturnya.</p>\r\n\r\n<p>Dia menandaskan, mencetak siswa berkualitas memerlukan proses yang tidak ringan. Ibarat nasi tidak ujug-ujug dihidangkan di meja makan. Tetapi ada proses dari pembibitan, kegigihan petani mengolah tanah, memanen, menggiling pada hingga menanaknya.</p>\r\n\r\n<p>Sebanyak 172 siswa kembali diserahkan kepada orang tua masing-masing dalam upacara penglepasan wisudawan wisudawati smk pusponegroro 01 Brebes tahun 2016/2017. Sebelumnya, mereka telah menempuh Ujian Nasional Berbasis Komputer (UNBK).</p>\r\n\r\n<p>Para siswa yang tersebar di bidang keahlian Teknik Gambar Bangunan,  Teknik Kendaraan Ringan, Akuntansi, dan Teknik Audio Video bakal mendapat pengumuman kelulusan pada Selasa 2 Mei 2017 pukul 16.00 WIB melalui jaringan online.</p>\r\n\r\n<p>Salah seorang siswa Idah Samroatun, mengaku gembira dan bangga bila nanti lulus ujian karena sudah diterima di Bank milik BUMN. Namun demikian dirinya memandang, lulus sekolah merupakan awal dari perjuangan menghadap tantangan ke depan. “Saya bangga dengan SMK Pusponegoro karena telah mendidik kami selama tiga tahun dan mudah-mudahan terus maju menjadi wadah pendidikan yang berkualitas,” ungkapnya.</p>\r\n\r\n<p>Dari masing-masing bidang keahlian, terpilih sebagai lulusan terbaik Sahrul Budiyanto berasal dari bidang keahlian Teknik Gambar Bangunan,  Riski Maulana (Teknik Kendaraan Ringan),  Nurul Hidayah (Akuntansi), dan Apriyadi (Teknik Audio Video).</p>\r\n\r\n<p>Acara yang dihadiri Wakil Ketua Yayasan Pusponegoro Wahidin Soedja, Komite Sekolah Suryo, Para Orang tua siswa kelas XII dan undangan lainnya diisi pula dengan berbagai atraksi kreatifitas siswa. (wasdiun)</p>\r\n', 'info-220619-f1b4a1e8b4.jpg', '2021-07-18 15:33:15', '2022-06-19 10:12:53'),
(12, 2, 'Bahagia Terpilih Jadi Paskibra Brebes', '<p>BREBES-Menjadi Pasukan Pengibar Bendera Pusaka (Paskibraka) adalah idaman setiap siswa. Kebanggan tiada tara akan tercurah karena disaksikan ribuan mata yang tertuju pada Paskibra ketika Upacara 17 Agustusan. Seperti halnya Siswa SMK Pusponegoro 01 Brebes Kelas 10 Teknik Kendaraan Ringan (TKR) 1 Musapikin yang terjaring masuk sebagai Paskibra Kabupaten Brebes 2017.</p>\r\n\r\n<p>“Seneng, gak nyangka aku terpilih jadi Paskibraka Brebes,”  tutur Musapikin saat dihubungi di SMK Pusponegoro 01 Brebes, Sabtu (14/4).</p>\r\n\r\n<p>Pikin-demikian sapaan akrabnya-, berhasil masuk Paskibraka Kabupaten Brebes bersama 36 teman lainnya dari 385 peserta yang diseleksi. Tahapan seleksi itu sendiri sudah berlangsung pada 4-5 April lalu. Tahap awal seleksi peserta menjalani test pisik dan psikis, antara lain lari mengelilingi stadion karang birahi selama 12 menit.</p>\r\n\r\n<p>Selain itu juga tes kesehatan, wawancara, pengukuran postur tubuh, kreasi seni dan uji talenta lainnya serta praktek PBB.</p>\r\n\r\n<p>Dia belum tahu akan diposisikan pada pasukan pengibar, pasukan 17, pasukan 8 apa pasukan 45 karena masih harus menghadapi pelatihan berikutnya hingga tanggal 17 Agustus. “Saya belum tahu akan ditempatkan di pasukan mana, tapi kata Pembina saya, akan ada latihan berkelanjutan dan tahapan karangtina,” tutur pria kelahiran Brebes, 3 April 2000.</p>\r\n\r\n<p>Pemilik tinggi badan 172 centi meter dan berat badan 57 kilogram selalu menjaga staminanya dengan berolahraga setiap hari. Pikin juga mengaku sudah berpengalaman menjadi pengibar bendera saat di SMP dan SMK. “Setiap upacara saya sering menjadi pembawa maupun pengerek bendera,” ucapnya.</p>\r\n', 'info-220619-ffa62ed6b3.jpg', '2021-07-18 15:37:01', '2022-06-19 10:11:23');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `jurusan_id` int(5) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `isi` mediumtext NOT NULL,
  `foto` varchar(35) DEFAULT NULL,
  `created` timestamp NULL DEFAULT NULL,
  `updated` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`jurusan_id`, `judul`, `isi`, `foto`, `created`, `updated`) VALUES
(1, 'Teknik Audio Video', '<p><strong>Teknik Audio Video</strong> merupakan satu dari tiga kompetensi keahlian dalam bidang keahlian elektronika pada konsep kurikulum 2019 yang lalu dan hingga saat ini masih berjalan. Teknik Audio Video mengkhususkan pembahasan atau pembelajaran tentang hal-hal teknik elektronika yang berkait dengan suara (audio) dan gambar (video) yang diproses secara elektronik.</p>\r\n\r\n<p><strong>Pembelajaran di TAV :</strong></p>\r\n\r\n<p>Teknik audio video mendidik dan melatih peserta didik / siswa tentang ilmu pengetahuan teknologi yang berkaitan dengan berbagai peralatan yang memproses sinyal suara dan sinyal gambar seperti : amplifier, radio, cassette deck, televisi, VCD / DVD, membuat rekaman audio dan membuat rekaman video, merakit peralatan audio seperti mixer audio, amplifier menginstall/memasang dan atau memperbaiki peralatan audio.</p>\r\n\r\n<p><strong>Peluang Pekerjaan :</strong></p>\r\n\r\n<p>Beberapa prospek kerja yang menjanjikan tamatan atau lulusan Teknik Audio Video diharapkan mampu diserap dunia kerja pada bidang: Persewaan Sound Sistem Video Shooting Perkantoran, Super Market Perakitan Elektronika Bengkel Elektronik Dealer & Dstributor Peralatan Elektronika Industri Elektronika, Berwirausaha di bidang Elektronika Audio Video seperti : Mendirikan Bengkel Elektronika, Persewaan Sound System, Video Shooting, Dibidang pertelevisian diantaranya : Electrical Design Engineer, Sound Engineer yang mahir dalam berbagai jenis media perekaman seperti tape analog, multitrack recorder, digital audio workstation dan juga pengetahuan tentang komputer, kameramen dll.</p>\r\n\r\n<p><strong>Fasilitas :</strong></p>\r\n\r\n<ol>\r\n <li>Guru S1 Elektronika bersertifikat uji kompetensi</li>\r\n <li>Workshop Elektronika dan mikrokontroler</li>\r\n <li>terakreditasi B</li>\r\n <li>Ruang kelas uas dan nyaman</li>\r\n</ol>\r\n', 'jurusan-220606-62d081df1f.png', '2021-07-13 15:22:37', '2022-06-06 02:02:47'),
(2, 'Teknik Otomotif', '<p><strong>Teknik otomotif</strong> adalah salah satu cabang ilmu teknik mesin yang mempelajari tentang bagaimana merancang, membuat dan mengembangkan alat-alat transportasi darat yang menggunakan mesin, terutama sepeda motor, mobil, bis dan truk. Teknik otomotif menggabungkan elemen-elemen pengetahuan mekanika, listrik, elektronik, keselamatan dan lingkungan serta matematika, fisika, kimia, biologi dan manajemen.</p>\r\n\r\n<p><strong>Pembelajaran di TMO :</strong><br>\r\nDalam teknik otomotif, menguasai sistem-sistem yang ada alat-alat transportasi darat merupakan suatu keharusan. Sistem tersebut terdiri beberapa sistem utama dan puluhan subsistem. Sistem tersebut dapat dikelompokkan:Mesin (engine)Mesin pembakaran dalam (internal combustion engine).Sistem bahan bakar (fuel system).Tangki bahan bakar.Pompa bahan bakar.Karburator atau Sistem injeksi bahan bakar.Sistem pengapian (ignition system).Sistem pemasukan udara dalam ruang bakar (intake system).Sistem pembuangan udara hasil pembakaran (exhaust system).Sistem pendinginan (cooling system).Sistem pelumasan (lubricating system).Sistem keseimbangan roda (spooring balancing)Pemindah daya (power train).Sistem transmisi (transmission system).Rangkaian penggerak (drive train).Transfer case (untuk penggerak 4 roda)Penggerak akhir (final drive)Roda (wheel)Sistem kemudi (steering system).Sistem suspensi (suspension system).Sistem rem (brake system).Bodi.Sistem listrik (electrical system).</p>\r\n\r\n<p><strong>Peluang Pekerjaan :</strong><br>\r\nPeluang kerja menjadi mekanik otomotif tidak hanya berhubungan dengan bengkel saja, jika anda memang berkompeten, anda juga bisa mendesain body maupun mesin kendaraan sendiri dan mempresentasikan prototype kendaraan anda, kepada produsen-produsen kendaraan bermotor yang ternama. Kebanyakan lulusan sarjana otomotif justru tidak bekerja di bengkel, mereka lebih banyak bekerja dibelakang komputer sebagai Engineer, Maintenance Planner, dan Designer. Perusahaan-perusahaan yang dapat dimasuki oleh lulusan jurusan ini diantaranya adalah Halliburton, Total E & P, Medco, Badak LNG, Astra, McDermott, Saipem, Schlumberger, dan masih banyak lagi.l</p>\r\n', 'jurusan-220606-723c26b346.jpeg', '2019-07-13 15:29:09', '2022-06-06 02:00:56'),
(3, 'Desain Permodelan dan Informasi Bangunan', '<p><strong>Desain Pemodelan dan Informasi Bangunan</strong> adalah kompetensi keahlian yang mempelajari tentang perencanaan bangunan, pelaksanaan pembuatan gedung dn perbaikan gedung. kegiatannya adalah belajar menggambar rumah, gedung dan apartemen, menghitung biaya bangunan, melaksankan pembangunan dan memelihara kontruksi bangunan.</p>\r\n\r\n<p><strong>Prospek Kompetensi Keahlian DPIB</strong></p>\r\n\r\n<p>DRAFTER, Bertanggung jawab membuat gambar bangunan, jika bekerja di konsultan perencana bertugas membuat gambar perencanaan, jika bekerja di kontraktor bertugas membuat gambar kerja atau shopdrawing dan asbuiltdrawing. QUANTITY SURVEYOR, Kerjanya menghitung volume bangunan,kebutuhan material dan membuat laporan progres pekerjaan. UITZET/SURVEYOR, Bertugas dalam hal pengukuran seperti membuat data ukuran existing tanah atau bangunan, dan mengukur untuk penerapan gambar kerja ke lokasi pekerjaan. PELAKSANA BANGUNAN, Bertugas mengawal jalanya pekerjaan konstruksi bangunan agar sesuai apa yang sudah direncanakan, dilaksanakan secepat mungkin dan dengan hasil berkualitas maksimal. pada proyek besar seperti pembangunan gedung bertingkat tinggi, ada pembagian tugas pelaksana dari mulai pelaksana besi, bekisting, cor beton, nishing, listrik, dan yang lainya menyesuaikan kebutuhan. PEMBORONG/KONTRAKTOR, Jika berani menjalani usaha secara mandiri, maka bisa bergerak dibidang pemborong atau kontraktor. jika memerlukan tenaga ahli maka bisa sambil melanjutkan kuliah S1, atau dengan cara merekrut sarjana sebagai karyawan. KONSULTAN PERENCANA, Bisa juga membuka usaha di bidang perencanaan, seperti jasa desain rumah, pembuatan maket, gambar 3D dan sejenisnya. untuk lebih mendalami keilmuan dibidang ini maka bisa melanjutkan kuliah jurusan Arsitektur.</p>\r\n', 'jurusan-220606-2d6f787aa1.png', '2022-06-06 02:03:40', NULL),
(4, 'Akuntansi', '<p><strong>Akuntansi</strong> (terjemahan dari kata accounting) yang berarti menghitung. Secara garis besar, akuntansi adalah suatu proses yang diawali dengan mencatat, mengelompokkan, mengolah, menyajikan data, serta mencatat transaksi yang berhubungan dengan keuangan sehingga informasi tersebut dapat digunakan oleh seseorang yang ahli di bidangnya dan menjadi bahan untuk mengambil suatu keputusan. Seorang praktisi yang ahli dalam bidang ini disebut akuntan.</p>\r\n\r\n<p>Akuntansi juga sudah disebut sebagai bahasa bisnis untuk mengukur hasil kegiatan ekonomi dalam organisasi serta menyampaikan informasi kepada berbagai pihak, termasuk manajemen, investor, kreditor, dan regulator. Berbagai teori sendiri telah banyak dikemukakan mengenai pengertian akuntansi. Bagi sebagian orang, ilmu akuntansi berkaitan dengan sistem hitung-menghitung, tapi faktanya akuntansi tidak sederhana itu.</p>\r\n\r\n<p><strong>Prospek Kerja Jurusan Akuntansi</strong></p>\r\n\r\n<p>Bukan hanya menjadi akuntan, tapi banyak sekali lapangan kerja yang membutuhkan jurusan ini. Untuk lebih jelasnya, berikut adalah macam-macam pekerjaan yang bisa diambil saat lulus dari jurusan psikologi. Akuntan Perusahaan, Setiap perusahaan tentunya membutuhkan ahli akuntan saat pembuatan proses laporan keuangan. Nah, disinilah kiprah para lulusan akuntansi sangat dibutuhkan. Biasanya kamu akan mengemban tugas sebagai akuntan public, asisten akuntan, dan akuntan manajer. Internal Auditor, Untuk memastikan seluruh laporan keuangan dengan tepat dan benar, kiprah seorang internal auditor sangatlah penting dalam urusan ini. tugas seorang auditor memang sangat krusial. Sehingga kamu disini akan dituntut menjadi seorang yang sangat professional dalam pemeriksaan keuangan. Perencana keuangan, Financial planner adalah seorang tenaga kerja di bidang keuangan yang bertugas untuk mengatur perencanaan keuangan. Nah disini kamu harus terlebih dahulu mengambil Certified Financial Planner (CFP). Berhubungan kebutuhan perencanaan keuangan sangat dibutuhkan di era sekarang ini, maka profesi ini sangat dibutuhkan. dll</p>\r\n', 'jurusan-220606-1a3650aedf.jpeg', '2022-06-06 02:04:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(5) NOT NULL,
  `nama_kategori` varchar(25) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(1, 'Berita Sekolah', '2019-07-13 03:44:02', NULL),
(2, 'Kegiatan Sekolah', '2019-07-13 03:44:20', NULL),
(3, 'Lingkungan Sekolah', '2019-07-13 03:44:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `pembayaran_id` int(5) NOT NULL,
  `id_user` int(5) NOT NULL,
  `no_rek` int(20) NOT NULL,
  `atas_nama` varchar(50) NOT NULL,
  `jumlah` double NOT NULL,
  `foto` varchar(35) DEFAULT NULL,
  `created` timestamp NULL DEFAULT NULL,
  `updated` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`pembayaran_id`, `id_user`, `no_rek`, `atas_nama`, `jumlah`, `foto`, `created`, `updated`) VALUES
(2, 3, 2147483647, 'muhammad zaki', 1060000, 'pembayaran-210724-e5a7acc236.jpeg', '2021-07-24 04:16:52', NULL),
(6, 7, 989282827, 'Umara', 1060000, 'pembayaran-210724-c525c5b4ae.jpeg', '2021-07-24 04:55:40', '2022-07-20 06:56:09'),
(7, 5, 1, 'Basuki Murdiyono', 1, 'pembayaran-210801-a8de839ca3.jpeg', '2021-07-26 02:44:01', '2022-07-30 07:01:35');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftar`
--

CREATE TABLE `pendaftar` (
  `pendaftar_id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `id_gelombang` int(5) DEFAULT NULL,
  `id_jurusan` int(5) NOT NULL,
  `nisn` varchar(15) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `tempat_lahir` varchar(25) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` char(2) NOT NULL,
  `agama` varchar(10) NOT NULL,
  `alamat` mediumtext NOT NULL,
  `kode_pos` char(6) NOT NULL,
  `no_telp` char(13) NOT NULL,
  `no_hp` char(15) NOT NULL,
  `nama_ayah` varchar(50) NOT NULL,
  `nama_ibu` varchar(50) NOT NULL,
  `nama_wali` varchar(50) NOT NULL,
  `alamat_org` mediumtext NOT NULL,
  `nama_sekolah` varchar(50) NOT NULL,
  `alamat_sekolah` mediumtext NOT NULL,
  `kec_sekolah` varchar(25) NOT NULL,
  `kab_kota_sekolah` varchar(25) NOT NULL,
  `propinsi` varchar(25) NOT NULL,
  `tahun_lulus` int(5) NOT NULL,
  `no_ijazah` varchar(25) NOT NULL,
  `bhs_indo` float NOT NULL,
  `bhs_inggris` float NOT NULL,
  `mtk` float NOT NULL,
  `ipa` float NOT NULL,
  `prestasi` mediumtext NOT NULL,
  `info_daftar` varchar(30) NOT NULL,
  `alasan` varchar(30) NOT NULL,
  `foto3x4` varchar(40) DEFAULT NULL,
  `scan_akte` varchar(40) DEFAULT NULL,
  `scan_kk` varchar(40) DEFAULT NULL,
  `scan_ijazah1` varchar(40) DEFAULT NULL,
  `scan_ijazah2` varchar(40) DEFAULT NULL,
  `scan_skhu` varchar(40) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendaftar`
--

INSERT INTO `pendaftar` (`pendaftar_id`, `user_id`, `id_gelombang`, `id_jurusan`, `nisn`, `nama_siswa`, `tempat_lahir`, `tgl_lahir`, `jk`, `agama`, `alamat`, `kode_pos`, `no_telp`, `no_hp`, `nama_ayah`, `nama_ibu`, `nama_wali`, `alamat_org`, `nama_sekolah`, `alamat_sekolah`, `kec_sekolah`, `kab_kota_sekolah`, `propinsi`, `tahun_lulus`, `no_ijazah`, `bhs_indo`, `bhs_inggris`, `mtk`, `ipa`, `prestasi`, `info_daftar`, `alasan`, `foto3x4`, `scan_akte`, `scan_kk`, `scan_ijazah1`, `scan_ijazah2`, `scan_skhu`, `created_at`, `updated_at`) VALUES
(2, 3, 1, 1, '0008787637', 'Muhammad Zaki', 'Tegal', '2006-06-23', 'L', 'Islam', 'Jl. Ismail no 23, tegal', '53111', '086767262726', '086767262726', 'Yadi', 'Fitri', 'Yadi', 'Jl. Ismail no 23, tegal', 'MTS Filial Aliman', 'Jl. Ujungrusi Adiwerna', 'Adiwerna', 'Tegal', 'Jawa Tengah', 2021, '887D8UY76', 90, 80, 80, 80, 'Tidak Ada', '', '', 'Foto3x4-210724-beb3c650aa.jpg', 'Scan_Akte210724-ebe048f252.jpeg', 'Scan_Kartu_Keluarga210724-0374aee111.jpg', 'Scan_Ijazah_1-210724-f442d33fa0.jpeg', 'Scan_Ijazah_2-210724-6074c6aa34.jpeg', 'Scan_SKHU-210724-a2b13d885f.jpeg', '2021-07-24 04:15:13', NULL),
(4, 5, 1, 2, '0009872827', 'Basuki Murdiyono', 'Tegal', '2015-06-23', 'L', 'Islam', 'Jl. Gemahsari No.24, Pegirikan', '56111', '089898272827', '089898272827', 'Darnoyo', 'Nurhikmah', 'Darnoyo', 'Jl. Gemahsari No.24, Pegirikan', 'SMP N 03 Lebaksiu', 'Jl, Patin No, 28, Lebaksiu', 'Lebaksiu', 'Tegal', 'Jawa Tengah', 2021, '989GJ87871', 95, 95, 95, 95, 'Tidak Ada', '', '', 'Foto3x4-210724-ba038e2a20.jpg', 'Scan_Akte210724-523b9a2124.jpeg', 'Scan_Kartu_Keluarga210724-626fbe83f8.jpg', 'Scan_Ijazah_1-210724-0314ae78de.jpeg', 'Scan_Ijazah_2-210724-9f63074652.jpeg', 'Scan_SKHU-210724-19b650660b.jpeg', '2021-07-24 04:41:07', '2022-06-19 17:34:43'),
(6, 7, 1, 1, '0008292827', 'Fatimah Zahra', 'Tegal', '2014-06-23', 'P', 'Islam', 'Jl. Petruk No.9, Tegal Selatan', '56111', '089893839383', '089893839383', 'Umar', 'Ulfah', 'Umar', 'Jl. Petruk No.9, Tegal Selatan', 'SMP 2 Lebeteng', 'Jl, Muara No.5, Lebeteng', 'Lebeteng', 'Tegal', 'Jawa Tengah', 2021, '893DF9898', 90, 80, 70, 60, 'Tidak Ada', '', '', 'Foto3x4-210724-baf00f2060.jpg', 'Scan_Akte210724-1101c92ba6.jpeg', 'Scan_Kartu_Keluarga210724-92b70a5271.jpg', 'Scan_Ijazah_1-210724-544a4f59f6.jpeg', 'Scan_Ijazah_2-210724-9d2d3d4c44.jpeg', 'Scan_SKHU-210724-0b1ec36692.jpeg', '2021-07-24 04:54:03', '2021-07-24 04:56:52');

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `pengumuman_id` int(5) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `isi` mediumtext NOT NULL,
  `link` mediumtext NOT NULL,
  `status` int(2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`pengumuman_id`, `judul`, `isi`, `link`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Informasi Pendaftaran Tahun 2022', '<p>Informasi terkait pendaftaran SMK Pusponegoro 01 Brebes bisa di akses melalui website PPDB online.</p>\r\n', 'http://localhost/smkpusponegoro/home/ppdb', 1, '2019-07-18 08:35:26', '2022-06-06 03:24:50'),
(2, 'Informasi Pendaftaran', '<p>Pendaftaran dilaksanaan mulai 01 Juni 2022 sampai10 Juli 2022</p>\r\n', 'http://localhost/smkpusponegoro/home/ppdb', 0, '2021-07-03 09:52:55', '2022-06-06 03:24:16');

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE `profil` (
  `profil_id` int(5) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `isi` mediumtext NOT NULL,
  `foto` varchar(35) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`profil_id`, `judul`, `isi`, `foto`, `created_at`, `updated_at`) VALUES
(3, 'Sejarah SMK Pusponegoro 01 Brebes', '<p>SMK Pusponegoro 01 Brebes merupakan salah satu Sekolah Menengah Kejuruan swasta yang ada di kabupaten Brebes. pada awal berdiri, SMK Pusponegoro 01 Brebes memiliki nama STM Pemda Brebes dibawah naungan Yayasan Pendidikan Pusponegoro 01. semakin banyaknya kebutuhan sumber daya manusia dibidang industri menjadi dasar pendirian Sekolah Menengah Kejuruan ini sehingga pada tanggal 2 Januari 1974 didirikan Badan Pembina STM Pemda yang dirintis oleh YayasanPendidikan Pusponegoro Brebes.</p>\r\n\r\n<p>SMK Pusponegoro 01 brebes memiliki tiga program studi keahlian yaitu Teknik Bangunan, Teknik Kendaraan Ringan, Teknik Audio Video, Dan Akuntansi.</p>\r\n', 'profil-220608-215a71a127.png', '2019-07-13 07:17:53', '2022-06-08 10:11:08'),
(4, 'Visi dan Misi SMK NU WAHID HASYIM', '<p><strong>VISI</strong></p>\r\n\r\n<p><strong>”<em>Berprestasi dalam mutu, berakhlakul karimah dalam bertingkah laku, berkarya dalam kreatifitas dan berbudaya dalam identitas</em>”.</strong></p>\r\n\r\n<p><strong>MISI</strong></p>\r\n\r\n<ol>\r\n <li><strong>Melaksanakan KBM secara efektif  dengan menghasilkan prestasi yang bermanfaat.</strong></li>\r\n <li><strong>Melaksanakan aqidah islam Ahlusunnah Wal Jama’ah</strong>.</li>\r\n <li><strong>Menumbuhkan sikap berdemokrasi, sehingga menghasilkan semangat untuk maju.</strong></li>\r\n <li><strong>Terciptanya sekolah yang tertib, aman, nyaman, indah dan harmonis.</strong></li>\r\n</ol>\r\n', NULL, '2019-07-13 07:26:43', '2021-05-30 06:00:57'),
(5, 'Stuktur Organisasi', '', 'profil-220619-e3acbb1b8d.png', '2019-07-13 07:27:11', '2022-06-19 11:21:48'),
(6, 'Biaya Pendaftaran', '<p>Total Biaya Pendaftaran Sebesar Rp. <strong>1.060.000.-</strong></p>\r\n\r\n<p>Dibayarkan ke Nomor Rekening: <strong>100-9110-611 BANK BNI</strong></p>\r\n\r\n<p><br>\r\nBiaya pendidikan per bulan Rp. <strong>120.000,00</strong> dibayarkan paling lambat tanggal 5 setiap bulan. Biaya tersebut sudah termasuk untuk: OSIS, Praktikum, Study Tour Ekstrakurikuler, dan Tes Semester.</p>\r\n\r\n<p> </p>\r\n', NULL, '2019-07-16 12:10:46', '2021-07-22 14:34:54'),
(7, 'Rincian Biaya Masuk', '<p>1. Iuran Dana Pendidikan (SSP) per bulan          Rp. 120.000</p>\r\n\r\n<p>2. Iuran Kegiatan Osis                                          Rp. 200.000</p>\r\n\r\n<p>3. Proses Peningkatan Mutu                                Rp. 200.000 </p>\r\n\r\n<p>4. Pengadaan Atribut (Osis & Pramuka)              Rp. 80.000</p>\r\n\r\n<p>5. Asuransi                                                           Rp. 25.000</p>\r\n\r\n<p>6. Seragam Sekolah                                            Rp. 435.000</p>\r\n\r\n<p><strong>                                                                Total :  Rp. 1.060.000</strong></p>\r\n', NULL, '2019-07-16 12:11:37', '2022-06-19 12:57:10');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(5) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(150) NOT NULL,
  `role` int(2) NOT NULL,
  `status` int(2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `role`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 1, 0, '2019-07-12 02:28:33', '2019-07-12 23:37:48'),
(3, 'muhammad zaki', 'zaki@gmail.com', 'ee11cbb19052e40b07aac0ca060c23ee', 0, 1, '2021-07-24 04:09:28', '2022-07-20 06:55:56'),
(5, 'Basuki Murdiyono', 'basuki@gmail.com', 'ee11cbb19052e40b07aac0ca060c23ee', 0, 1, '2021-07-24 04:36:38', '2022-07-30 07:28:13'),
(7, 'Fatimah Zahra', 'zahra@gmail.com', '202cb962ac59075b964b07152d234b70', 0, 1, '2021-07-24 04:49:52', '2022-07-20 06:55:45'),
(8, 'useronly', 'user@gmail.com', 'ee11cbb19052e40b07aac0ca060c23ee', 0, 0, '2022-06-19 17:37:44', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`galeri_id`);

--
-- Indexes for table `gelombang`
--
ALTER TABLE `gelombang`
  ADD PRIMARY KEY (`gelombang_id`);

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`info_id`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`jurusan_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`pembayaran_id`),
  ADD KEY `pembayaran_ibfk_1` (`id_user`);

--
-- Indexes for table `pendaftar`
--
ALTER TABLE `pendaftar`
  ADD PRIMARY KEY (`pendaftar_id`),
  ADD KEY `id_jurusan` (`id_jurusan`),
  ADD KEY `id_gelombang` (`id_gelombang`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`pengumuman_id`);

--
-- Indexes for table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`profil_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `galeri_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `gelombang`
--
ALTER TABLE `gelombang`
  MODIFY `gelombang_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `info_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `jurusan_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `pembayaran_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pendaftar`
--
ALTER TABLE `pendaftar`
  MODIFY `pendaftar_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `pengumuman_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `profil`
--
ALTER TABLE `profil`
  MODIFY `profil_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `info`
--
ALTER TABLE `info`
  ADD CONSTRAINT `info_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`kategori_id`);

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Constraints for table `pendaftar`
--
ALTER TABLE `pendaftar`
  ADD CONSTRAINT `pendaftar_ibfk_1` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`jurusan_id`),
  ADD CONSTRAINT `pendaftar_ibfk_2` FOREIGN KEY (`id_gelombang`) REFERENCES `gelombang` (`gelombang_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
