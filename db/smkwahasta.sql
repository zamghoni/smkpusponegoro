-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2021 at 03:27 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smkwahasta`
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
(15, 'Ujian Praktek Bahasa Arab', 1, '<p>Kegiatan ujian praktek bahasa arab di SMK NU Wahid Hasyim Talang</p>\r\n', NULL, 'https://www.youtube.com/embed/wlNoNbIiROI', '2021-07-18 13:50:00', '2021-07-18 14:13:05'),
(16, 'Kegiatan Awal Pembelajaran', 1, '<p>Pembacaan Asmaul Husna SMK NU Wahid Hasyim Talang</p>\r\n', NULL, 'https://www.youtube.com/embed/fA6NzSDGYoU?', '2021-07-18 13:52:24', '2021-07-18 14:10:47'),
(17, 'Kegiatan dalam kelas SMK NU WahidHasyim Talang', 1, '<p>Ibu Dewi Indrawati, S.Pd Mapel Bahasa Indonesia</p>\r\n', NULL, 'https://www.youtube.com/embed/_hJArrgKWbM', '2021-07-18 13:54:22', '2021-07-18 14:11:57'),
(18, 'Kepala Sekolah SMK NU Wahid Hasyim Talang', 1, '<p>H. Misbakhul Mundir, S.Ag</p>\r\n', NULL, 'https://www.youtube.com/embed/K8A9IHei9H8', '2021-07-18 13:55:51', '2021-07-18 14:12:49'),
(19, 'Calung SMK Wahid Hasyim Talang', 1, '', NULL, 'https://www.youtube.com/embed/3BbABkCs_xU', '2021-07-18 13:57:18', '2021-07-18 14:11:30'),
(20, 'Upacara Hari Guru', 1, '<p>Acara memperingati hari guru di pangkalan SMK NU WAHID HASYIM TALANG</p>\r\n', NULL, 'https://www.youtube.com/embed/uumZ0WTMaLg', '2021-07-18 14:18:06', NULL),
(21, 'DOKUMENTASI PERPISAHAN KELAS XII SMA SMK NU WAHID HASYIM TALANG KAB TEGAL TAHUN PELAJARAN 2017 2018', 1, '', NULL, 'https://www.youtube.com/embed/9gN-B9Jnhng', '2021-07-18 14:19:11', '2021-07-18 14:19:33'),
(22, 'Inilah Prestasi Alumni SMK NU Wahid Hasyim talang tegal', 1, '<p>Mari segera daftarkan diri..raih jalan menuju sukses</p>\r\n', NULL, 'https://www.youtube.com/embed/rl2EctbCDXY', '2021-07-18 14:21:11', NULL),
(23, 'Pementasan Teater SMK NU Wahid Hasyim Talang dalam Lomba Festival Budaya Tegal 2018', 1, '<p>Ini loh kawan pementasan Teater di Taman Budaya Tegal, seberang Rita Mall, Selamat menyaksikan..</p>\r\n', NULL, 'https://www.youtube.com/embed/ig-T3RcAJDc', '2021-07-18 14:22:35', '2021-07-18 14:55:31'),
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
(7, 1, 'Pemilihan Umum Ketua dan Wakil Ketua Osis', '<p><span dir=\"auto\">AYOO!!! Pilih pemimpinmu.</span></p>\r\n\r\n<p><span dir=\"auto\">Dalam pemilihan umum ketua dan wakil ketua osis</span></p>\r\n\r\n<p><span dir=\"auto\">Periode 2020/2021 SMA-SMK NU WAHID HASYIM TALANG kamis 22 Oktober 2020</span></p>\r\n\r\n<p><span dir=\"auto\">Prmilihan : Via google froms</span></p>\r\n\r\n<p><span dir=\"auto\">Tentukan pilihanmu jangan sampai golput.</span></p>\r\n', 'info-210718-ce20169db9.jpg', '2021-07-18 14:58:32', NULL),
(8, 1, '\"TEGAL STUDENT LEADERSHIP PROJECT\"', '<p><span dir=\"auto\">\"TEGAL STUDENT LEADERSHIP PROJECT\"</span></p>\r\n\r\n<p><span dir=\"auto\">Generasi yang kuat bagian dari investasi bangsa, kekuatan karakter di ikuti dengan komitmen para pendidik menjadikan mereka masa depan yang tak pernah pudar</span></p>\r\n\r\n<p><span dir=\"auto\">TSLP 2020</span></p>\r\n\r\n<p><span dir=\"auto\">\"PEMIMPIN MUDA,CERDAS,PENYONGSONG GENERASI EMAS\"</span></p>\r\n\r\n<p><span dir=\"auto\">Tegal 22,23 febuari 2020</span></p>\r\n\r\n<p><span dir=\"auto\"><a href=\"https://web.facebook.com/hashtag/latepost?__eep__=6&__cft__[0]=AZXIUGyDNgfFNaW9k5kurbXq_8qKPJAKxvS0mkr8-jLG2mLgugPh3_cwG4nj1G5wi7QJB51t7OgWadlY6F4XMc5QwncNwD4EgZK5hBP8UNhW4ai0afVJUnQtCQIwlj9sSuXUC4OHFik6Qn6jjz2-PwWv&__tn__=*NK-R\">#latepost</a></span></p>\r\n\r\n<p><span dir=\"auto\"><a href=\"https://web.facebook.com/hashtag/tslp?__eep__=6&__cft__[0]=AZXIUGyDNgfFNaW9k5kurbXq_8qKPJAKxvS0mkr8-jLG2mLgugPh3_cwG4nj1G5wi7QJB51t7OgWadlY6F4XMc5QwncNwD4EgZK5hBP8UNhW4ai0afVJUnQtCQIwlj9sSuXUC4OHFik6Qn6jjz2-PwWv&__tn__=*NK-R\">#TSLP</a></span></p>\r\n\r\n<p><span dir=\"auto\"><a href=\"https://web.facebook.com/hashtag/fkoskabtegal?__eep__=6&__cft__[0]=AZXIUGyDNgfFNaW9k5kurbXq_8qKPJAKxvS0mkr8-jLG2mLgugPh3_cwG4nj1G5wi7QJB51t7OgWadlY6F4XMc5QwncNwD4EgZK5hBP8UNhW4ai0afVJUnQtCQIwlj9sSuXUC4OHFik6Qn6jjz2-PwWv&__tn__=*NK-R\">#Fkoskabtegal</a></span></p>\r\n\r\n<p><span dir=\"auto\"><a href=\"https://web.facebook.com/hashtag/bersamafkoskamibisa?__eep__=6&__cft__[0]=AZXIUGyDNgfFNaW9k5kurbXq_8qKPJAKxvS0mkr8-jLG2mLgugPh3_cwG4nj1G5wi7QJB51t7OgWadlY6F4XMc5QwncNwD4EgZK5hBP8UNhW4ai0afVJUnQtCQIwlj9sSuXUC4OHFik6Qn6jjz2-PwWv&__tn__=*NK-R\">#bersamafkoskamibisa</a></span></p>\r\n\r\n<p><span dir=\"auto\"><a href=\"https://web.facebook.com/hashtag/osiswahasta?__eep__=6&__cft__[0]=AZXIUGyDNgfFNaW9k5kurbXq_8qKPJAKxvS0mkr8-jLG2mLgugPh3_cwG4nj1G5wi7QJB51t7OgWadlY6F4XMc5QwncNwD4EgZK5hBP8UNhW4ai0afVJUnQtCQIwlj9sSuXUC4OHFik6Qn6jjz2-PwWv&__tn__=*NK-R\">#osiswahasta</a></span></p>\r\n', 'info-210718-2784c762da.jpg', '2021-07-18 15:01:00', NULL),
(9, 2, '\"WAWASAN KEBANGSAAN\"', '<p>Wawasan kebangsaan nasional TNI AD Tahun 2017 wilayah Koramil 08 / Talang</p>\r\n', 'info-210718-7e448ed9dd.jpg', '2021-07-18 15:14:00', '2021-07-18 15:18:30'),
(10, 2, '\"Pendidikan Karakter Bersama BRIGIF\"', '<p>Untuk memotivasi siswa agar terdorong untuk disiplin, bertanggung jawab, dan sopan santun  maka smk astrindo membekali siswanya dengan latihan peraturan  baris-berbaris  (PBB) .</p>\r\n', 'info-210718-ee68814cae.jpg', '2021-07-18 15:28:13', NULL),
(11, 1, '\"Juara 1 Calung Modifikasi\"', '<p>SMK NU Wahid Hasyim Talang telah meraih juara 1 lomba calung modifikasi tahun 2018</p>\r\n', 'info-210718-c05da36fcd.jpg', '2021-07-18 15:33:15', NULL),
(12, 2, '\"Hari Pahlawan, Pramuka Wahid Hasyim Aksi Tanam Pohon\"', '<p>Gugusdepan Pramuka pangkalan SMK NU Wahid Hasyim Talang Kabupaten Tegal melakukan aksi penanaman pohon, Jum&#39;at (10/11) lalu. Aksi yang dilakukan usai upacara bendera memperingati Hari Pahlawan dipusatkan di lingkungan sekolah dan diarea sekitar tanggul sungai Gung.</p>\r\n\r\n<p>Ketua Gudep SMK NU 01 Wahid Hasyim, kak Drs.Tejo Purnomo, mengungkapkan aksi sebagai rangkaian kegiatan Pengabdian Masyarakat (Abdimas) Gerakan Pramuka.</p>\r\n\r\n<p>\"Aksi juga untuk meminimalisir penyalahgunaan fungsi tanggul sebagai area tempat pembuangan sampah masyarakat setempat,\" katanya disela kegiatan</p>\r\n\r\n<p>Selain Aksi Tanam Pohon, dalam kesempatan itu juga dilakukan penyerahan Piagam Penghargaan Peserta Kegiatan Gladi Widya Kwartir Cabang Tegal yang dilaksanakan pada tanggal 26 - 28 Oktober 2017.</p>\r\n\r\n<p>Dalam kegiatan tersebut ,Gudep SMK Wahid Hasyim Talang memperoleh prestasi Tergiat dalam Administrasi Gugus Depan.</p>\r\n\r\n<p>\"Semoga Gugus Depan kita bisa mempertahankan Prestasi, serta bekerjasama dengan masyarakat sekitar untuk merawat pohon yang telah ditanam hari ini,\" Imbuh Tejo yang juga Waka Kurikulum.</p>\r\n', 'info-210718-0d10f1d273.jpg', '2021-07-18 15:37:01', NULL);

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
(1, 'Teknik Komputer Jaringan', '<p><strong>Teknik Komputer Jaringan</strong> (TKJ) Merupakan sebuah kejurusan yang mempelajari tentang cara-cara merakit komputer dan menginstalasi program komputer. .</p>\r\n\r\n<p><strong>Kelebihan Jurusan TKJ</strong></p>\r\n\r\n<p>Ada beberapa kelebihan dari jurusan TKJ yang perlu Kamu ketahui, antara lain :</p>\r\n\r\n<p><strong>1. Mempelajari Sistem Operasi</strong></p>\r\n\r\n<p>Di dalam mata pelajaran TKJ, Kamu akan mengenal apa itu Sistem Operasi. Jadi setelah Kamu merakit komputer, Kamu tidak berhenti disitu saja melainkan lanjut dengan instalasi OS dan juga pelajaran tentang Sistem Kerja User hingga Partisi Hardisk dan Konstruksi.</p>\r\n\r\n<p><strong>2. Tidak Hanya Belajar Komputer Saja, Namun Jaringan Juga</strong></p>\r\n\r\n<p>Seperti yang sudah dijelaskan di atas, TKJ lebih kompleks dan lebih rumit dari yang Kamu bayangkan. Namun justru inilah kelebihannya. Jurusan ini sangat sulit sehingga tidak sembarang anak bisa diterima. Pasalnya, disana Kamu akan diajari membuat jaringan komputer dengan macam-macam tipologinya. Sebut saja setting IP address, server, hingga jaringan lokal.</p>\r\n\r\n<p><strong>3. Siswa Dibekali Keahlian Troubleshooting</strong></p>\r\n\r\n<p>Selain beberapa pelajaran di poin 1 dan 2, pelajaran terkait troubleshooting juga harus Kamu kuasai dan inilah yang menjadikan lulusan SMK jurusan TKJ lebih unggul dari lulusan anak SMA. Pasalnya, troubleshooting berguna untuk menyelidiki dan menyelesaikan permasalahan yang ada di RAM, Hardisk, hingga CPU.</p>\r\n\r\n<p><strong>4. Ada Praktek Kerja Untuk Tambah Pengalaman</strong></p>\r\n\r\n<p>Layaknya jurusan di SMK lainnya, TKJ pun diwajibkan untuk magang alias Praktek Kerja Lapangan. Hal ini bertujuan menambah wawasanmu tentang dunia kerja dan juga membantumu merasakan segala permasalahan nyata di kehidupan sehari-hari terkait TKJ. Jadi tidak hanya kaya ilmu dan keahlian, jurusan TKJ juga akan kaya pengalaman.</p>\r\n\r\n<p><strong>5. Ada Peluang Kerja Besar Selepas SMK</strong></p>\r\n\r\n<p>Biasanya, magang akan memiliki sertifikat dimana bisa digunakan sebagai referensi seperti surat keterangan kerja. Oleh sebab itu, anak lulusan SMK akan lebih mudah mencari kerja daripada anak lulusan SMA. Pasalnya selain memang sekolah mereka disiapkan untuk dapat terjun langsung di dunia kerja begitu lulus, mereka pun telah mengantongi pengalaman dan sertifikat.</p>\r\n\r\n<p><strong>Kemampuan Khusus :</strong></p>\r\n\r\n<ul>\r\n <li>Teknisi Komputer/Laptop (Hardware & Software)</li>\r\n <li>Komputer & Aplikasinya</li>\r\n <li>Sistem Keamanan Jaringan</li>\r\n <li>Administrator Sistem Jaringan Komputer</li>\r\n</ul>\r\n', 'jurusan-210620-7dc8b441cf.jpg', '2021-07-13 15:22:37', '2021-07-13 04:01:44'),
(2, 'Akuntansi Keuangan Lembaga', '<p><strong>Akuntansi</strong> adalah suatu ilmu yang mempelajari proses pengidentifikasian transaksi, pencatatan, penggolongan, pengikhitisaran dan pelaporan untuk pihak yang berkepentingan (pihak intern dan ekstern).</p>\r\n\r\n<p><strong>Kelebihan Jurusan Akuntansi SMK</strong></p>\r\n\r\n<p>Jurusan akuntansi merupakan jurusan yang cukup populer karena para lulusannya dianggap memiliki peluang kerja yang cukup besar. Hingga saat ini, para lulusan jurusan akuntansi masih banyak dibutuhkan di berbagai perusahaan untuk menjadi akuntan.</p>\r\n\r\n<p>Setiap perusahaan yang bergerak di bidang apapun tentu akan membutuhkan orang yang mengisi posisi akuntan untuk mengelola keuangan mereka. Hal ini juga yang membuat prospek karir para lulusan akuntan akan tetap dibutuhkan hingga kapanpun.</p>\r\n\r\n<p>Selain itu, profesi sebagai akuntan atau profesi-profesi yang berkaitan dengan dunia akuntansi juga termasuk salah satu profesi yang dikenal memiliki prospek gaji yang cukup besar, terlebih jika nantinya Kamu sudah menjadi akuntan senior.</p>\r\n\r\n<p>Jika setelah lulus dari SMK Kamu memilih untuk meneruskan pendidikan ke perguruan tinggi, Kamu juga akan cukup mudah meneruskan pendidikan Kamu karena ada banyak jurusan di perguruan tinggi yang cocok bagi Kamu yang merupakan lulusan dari SMK akuntansi.</p>\r\n\r\n<p><strong>Kemampuan Khusus :</strong></p>\r\n\r\n<ul>\r\n <li>Aplikasi Komputer Akuntansi</li>\r\n <li>Perdagangan dan Perbankan</li>\r\n <li>Etika Profesi</li>\r\n <li>Mengelola Transaksi Keuangan</li>\r\n <li>Mengelola Buku Besar dan Jurnal</li>\r\n</ul>\r\n', 'jurusan-210620-2ca59fd9c3.jpg', '2019-07-13 15:29:09', '2021-07-20 04:07:34');

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
(1, 2, 1009110622, 'Muhammad Alif', 1060000, 'pembayaran-210724-a64c94baaf.jpeg', '2021-07-24 03:40:44', NULL),
(2, 3, 2147483647, 'muhammad zaki', 1060000, 'pembayaran-210724-e5a7acc236.jpeg', '2021-07-24 04:16:52', NULL),
(3, 4, 2147483647, 'Putri', 1060000, 'pembayaran-210724-55acf85395.jpeg', '2021-07-24 04:34:48', NULL),
(5, 6, 2147483647, 'Wulan', 1060000, 'pembayaran-210724-823b2d1022.jpeg', '2021-07-24 04:48:45', NULL),
(6, 7, 989282827, 'Umar', 1060000, 'pembayaran-210724-c525c5b4ae.jpeg', '2021-07-24 04:55:40', NULL),
(7, 5, 1, 'aa', 1, 'pembayaran-210801-a8de839ca3.jpeg', '2021-07-26 02:44:01', '2021-08-01 07:54:28');

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
(1, 2, 1, 1, '0002928292', 'Muhammad alif kasyafani', 'Tegal', '2004-04-23', 'L', 'Islam', 'Jl. Gatot subroto no24, Tegal', '90801', '089898373837', '089898373837', 'MUKHYIDIN', 'SALAMAH', 'MUKHYIDIN', 'Jl. Gatot subroto no24, Tegal', 'SMP Wahid hasyim', 'Jl. Wkudoro no24, Tegal', 'Talang', 'Tegal', 'Jawa Tengah', 2021, 'DI09293827H89', 90, 90, 90, 90, 'Tidak ada', '', '', 'Foto3x4-210724-2131f8ecf1.jpg', 'Scan_Akte210724-98785ca89c.jpeg', 'Scan_Kartu_Keluarga210724-7c3aa93f86.jpg', 'Scan_Ijazah_1-210724-f1ab8ae200.jpeg', 'Scan_Ijazah_2-210724-d53078261f.jpeg', 'Scan_SKHU-210724-1e9c38cfdf.jpeg', '2021-07-24 03:02:49', '2021-07-24 04:04:48'),
(2, 3, 1, 1, '0008787637', 'Muhammad Zaki', 'Tegal', '2006-06-23', 'L', 'Islam', 'Jl. Ismail no 23, tegal', '53111', '086767262726', '086767262726', 'Yadi', 'Fitri', 'Yadi', 'Jl. Ismail no 23, tegal', 'MTS Filial Aliman', 'Jl. Ujungrusi Adiwerna', 'Adiwerna', 'Tegal', 'Jawa Tengah', 2021, '887D8UY76', 90, 80, 80, 80, 'Tidak Ada', '', '', 'Foto3x4-210724-beb3c650aa.jpg', 'Scan_Akte210724-ebe048f252.jpeg', 'Scan_Kartu_Keluarga210724-0374aee111.jpg', 'Scan_Ijazah_1-210724-f442d33fa0.jpeg', 'Scan_Ijazah_2-210724-6074c6aa34.jpeg', 'Scan_SKHU-210724-a2b13d885f.jpeg', '2021-07-24 04:15:13', NULL),
(3, 4, 1, 2, '0009876765', 'Putri Zidni', 'Tegal', '2014-06-23', 'P', 'Islam', 'Jl. Gemahsari No.2, Pegirikan', '56111', '0898728272', '0898728272', 'Wanto', 'Siti', 'Wanto', 'Jl. Gemahsari No.2, Pegirikan', 'SMP N 01', 'Jl. Sepat No,8 Tegal', 'Kramat', 'Tegal', 'Jawa Tengah', 2021, '987JHA8728', 90, 98, 86, 75, 'Pancak Silat Sekabupaten', '', '', 'Foto3x4-210724-7ffd85d93a.jpg', 'Scan_Akte210724-7a06ad497a.jpeg', 'Scan_Kartu_Keluarga210724-020e78251c.jpg', 'Scan_Ijazah_1-210724-41fa3925a7.jpeg', 'Scan_Ijazah_2-210724-cd14821dab.jpeg', 'Scan_SKHU-210724-cb04f3f921.jpeg', '2021-07-24 04:34:12', NULL),
(4, 5, 1, 2, '0009872827', 'Muhammad Fatwah', 'Tegal', '2015-06-23', 'L', 'Islam', 'Jl. Gemahsari No.24, Pegirikan', '56111', '089898272827', '089898272827', 'Darnoyo', 'Nurhikmah', 'Darnoyo', 'Jl. Gemahsari No.24, Pegirikan', 'SMP N 03 Lebaksiu', 'Jl, Patin No, 28, Lebaksiu', 'Lebaksiu', 'Tegal', 'Jawa Tengah', 2021, '989GJ87871', 95, 95, 95, 95, 'Tidak Ada', '', '', 'Foto3x4-210724-ba038e2a20.jpg', 'Scan_Akte210724-523b9a2124.jpeg', 'Scan_Kartu_Keluarga210724-626fbe83f8.jpg', 'Scan_Ijazah_1-210724-0314ae78de.jpeg', 'Scan_Ijazah_2-210724-9f63074652.jpeg', 'Scan_SKHU-210724-19b650660b.jpeg', '2021-07-24 04:41:07', NULL),
(5, 6, 1, 2, '0009872827', 'Wulandari', 'Tegal', '2015-06-23', 'P', 'Islam', 'Jl. Mujaer No.5, Tegal', '56111', '089892827282', '089892827282', 'Budi', 'Fatimah', 'Budi', 'Jl. Mujaer No.5, Tegal', 'SMP 07 Talang', 'Jl. Nila No.1, Talang', 'Talang', 'Tegal', 'Jawa Tengah', 2021, '98373DI874', 70, 80, 99, 74, 'Tidak Ada', '', '', 'Foto3x4-210724-938a56471d.jpg', 'Scan_Akte210724-021aade7f6.jpeg', 'Scan_Kartu_Keluarga210724-6fab6e3aa3.jpg', 'Scan_Ijazah_1-210724-41c8606b05.jpeg', 'Scan_Ijazah_2-210724-06458d2eeb.jpeg', 'Scan_SKHU-210724-108f6a4883.jpeg', '2021-07-24 04:47:15', NULL),
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
(1, 'INFORMASI PENDAFTARAN 2021', '<p>Informasi terkait pendaftaran SMK NU Wahid Hasyim Talang bisa di akses melalui website PPDB online.</p>\r\n', 'http://localhost/smkwahasta/home/ppdb', 1, '2019-07-18 08:35:26', '2021-07-03 09:54:05'),
(2, 'Informasi Pendaftaran', '<p>Pendaftaran dilaksanaan mulai 01 juni 2021 sampai10 juli 2021</p>\r\n', 'http://localhost/smkwahasta/home/ppdb', 0, '2021-07-03 09:52:55', '2021-07-24 06:56:57');

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
(3, 'Sejarah SMK NU WAHID HASYIMA', '<p>SMK NU Wahid Hasyim Talang berdiri pada tanggal 9 Maret 1990 sebagai antisipasi terhadap lulusan MTS Wahid Hasyim Talang dan mulai kegiatan operasionalnya pada tanggal 17 Juli 1990 dengan lima local yang dirinci menjadi, 1 lokal untuk guru, Tata Usaha dan ruang kepala sekolah, 4 lokal untuk ruang kelas.</p>\r\n\r\n<p>Pada perkembangan berikutnya sekitar awal februari 1995 telah dibangun mushola Wahid Hasyim sebagai sarana peribadatan dan pusat kegiatan ke-Islaman. Selain tu digunakan pula untuk memonitoring praktek peribadatan dalam meningkatkan khazanah kepribadian siswa.<br>\r\nPerkembangan terus berlanjut, sehingga untuk memenuhi kebutuhan masyarakat akan pendidikan maka pada bulan Juli 1997 SMK NU Wahid Hasyim Talang menambah local lagi sebanyak 3 lokal ruang belajar. Selanjutnya dalam upaya pembentukan jati diri siswa yang islami maka dibangun 2 buah bilik asrama pada bulan Maret 1999.</p>\r\n\r\n<p>Kepercayaan akan pendidikan di SMK NU Wahid Hasyim Talang nampaknya semakin kuat dan mengkristal di kalbu warga Nahdiyin, sehingga sebagai upaya mengatasi lonjakan siswa yang semakin bertambah di bulan Juli tahun 2000 SMK Wahid Hasyim Talang menambah 4 lokal baru yang terbagi menjadi 2 ruang kelas, 1 ruang kepala sekolahdan 1 ruang laboratorium IP. Sedangkan pada tahun 2003 SMK Wahid Hasyim Talang menambah 1 ruang belajar lagi atas dana dari pemerintah melalui jalur bantuan imbal swadaya pengadaan ruang kelas baru (BIS_ RKB). Tahun 2004 melalui jalur bantuan imbal swadaya juga telah mendirikan ruang laboratorim komputer yang telah sesuai dengan standar pendidikan dan di tahun 2008 telah menambah sarana berupa ruang dan peralatan teknologi informatika dan computer akan tetapi baru pada tahun 2009 diadakan jaringan internet dan Hotspot.</p>\r\n', 'profil-210528-f334c47648.png', '2019-07-13 07:17:53', '2021-05-30 05:59:26'),
(4, 'Visi dan Misi SMK NU WAHID HASYIM', '<p><strong>VISI</strong></p>\r\n\r\n<p><strong>”<em>Berprestasi dalam mutu, berakhlakul karimah dalam bertingkah laku, berkarya dalam kreatifitas dan berbudaya dalam identitas</em>”.</strong></p>\r\n\r\n<p><strong>MISI</strong></p>\r\n\r\n<ol>\r\n <li><strong>Melaksanakan KBM secara efektif  dengan menghasilkan prestasi yang bermanfaat.</strong></li>\r\n <li><strong>Melaksanakan aqidah islam Ahlusunnah Wal Jama’ah</strong>.</li>\r\n <li><strong>Menumbuhkan sikap berdemokrasi, sehingga menghasilkan semangat untuk maju.</strong></li>\r\n <li><strong>Terciptanya sekolah yang tertib, aman, nyaman, indah dan harmonis.</strong></li>\r\n</ol>\r\n', NULL, '2019-07-13 07:26:43', '2021-05-30 06:00:57'),
(5, 'Stuktur Organisasi', '', 'profil-210620-ef2a4be547.png', '2019-07-13 07:27:11', '2021-06-20 03:40:52'),
(6, 'Biaya Pendaftaran', '<p>Total Biaya Pendaftaran Sebesar Rp. <strong>1.060.000.-</strong></p>\r\n\r\n<p>Dibayarkan ke Nomor Rekening: <strong>100-9110-611 BANK BNI</strong></p>\r\n\r\n<p><br>\r\nBiaya pendidikan per bulan Rp. <strong>120.000,00</strong> dibayarkan paling lambat tanggal 5 setiap bulan. Biaya tersebut sudah termasuk untuk: OSIS, Praktikum, Study Tour Ekstrakurikuler, dan Tes Semester.</p>\r\n\r\n<p> </p>\r\n', NULL, '2019-07-16 12:10:46', '2021-07-22 14:34:54'),
(7, 'Rincian Biaya Masuk', '<p>1. Iuran Dana Pendidikan (SSP) per bulan              Rp. 120.000</p>\r\n\r\n<p>2. Iuran Kegiatan Osis                                          Rp. 200.000</p>\r\n\r\n<p>3. Proses Peningkatan Mutu                                 Rp. 200.000 </p>\r\n\r\n<p>4. Pengadaan Atribut (Osis & Pramuka)                Rp. 80.000</p>\r\n\r\n<p>5. Asuransi                                                         Rp. 25.000</p>\r\n\r\n<p>6. Seragam Sekolah                                            Rp. 435.000</p>\r\n\r\n<p><strong>                                                                Total : Rp. 1.060.000</strong></p>\r\n', NULL, '2019-07-16 12:11:37', '2021-07-22 14:43:40');

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
(2, 'muhammad alif', 'alifkasyafani@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 0, 1, '2021-07-24 02:46:38', '2021-08-02 00:14:44'),
(3, 'muhammad zaki', 'zaki@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 0, 1, '2021-07-24 04:09:28', NULL),
(4, 'Putri Zidni', 'purti@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 0, 1, '2021-07-24 04:26:06', '2021-10-26 01:15:38'),
(5, 'Muhammad Fatwah', 'fatwah@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 0, 1, '2021-07-24 04:36:38', NULL),
(6, 'wulandari', 'wulandari@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 0, 1, '2021-07-24 04:42:55', '2021-10-26 01:15:33'),
(7, 'Fatimah Zahra', 'zahra@gmail.com', '202cb962ac59075b964b07152d234b70', 0, 1, '2021-07-24 04:49:52', '2021-08-01 07:44:15'),
(8, 'Pujangga', 'pujangga@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 0, 1, '2021-07-24 05:06:12', '2021-07-24 15:00:56');

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
  MODIFY `jurusan_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
