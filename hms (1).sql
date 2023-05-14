-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2023 at 10:10 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hms`
--

-- --------------------------------------------------------

--
-- Table structure for table `hadir`
--

CREATE TABLE `hadir` (
  `hadir_id` int(11) NOT NULL,
  `hadir_tgl` datetime NOT NULL,
  `hadir_tgl_in` date NOT NULL,
  `hadir_npk` varchar(255) NOT NULL,
  `hadir_nama` varchar(255) NOT NULL,
  `hadir_jalur` varchar(255) NOT NULL,
  `hadir_pos` varchar(255) NOT NULL,
  `hadir_status` varchar(255) NOT NULL,
  `hadir_shift` varchar(255) NOT NULL,
  `hadir_kode` varchar(11) NOT NULL,
  `hadir_ket` varchar(255) NOT NULL,
  `hadir_gan_id` int(11) NOT NULL,
  `hadir_gan_nama` varchar(255) NOT NULL,
  `hadir_gan_sts` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hadir`
--

INSERT INTO `hadir` (`hadir_id`, `hadir_tgl`, `hadir_tgl_in`, `hadir_npk`, `hadir_nama`, `hadir_jalur`, `hadir_pos`, `hadir_status`, `hadir_shift`, `hadir_kode`, `hadir_ket`, `hadir_gan_id`, `hadir_gan_nama`, `hadir_gan_sts`) VALUES
(25, '2022-08-30 22:01:59', '2022-08-30', '14421', 'Totok Kunarto', '12', '', 'Permanent', 'A', 'CL19', 'Diliburkan', 17275, 'Mulyanto', 'Permanent'),
(26, '2022-09-03 18:57:42', '2022-09-03', '21479', 'R.Nurul Imam Budiyanto', '6', '', 'Permanent', 'A', 'C1', 'Cuti Tahunan', 31450, 'Marjono Bin Ratih', 'Permanent'),
(28, '2022-09-05 01:07:04', '2022-09-05', '18785', 'Adi Rahmanto Wijaya', '6', '', 'Permanent', 'A', 'C1', 'Cuti Tahunan', 0, '', ''),
(29, '2022-09-05 01:07:27', '2022-09-05', '3116', 'Untung Subagyo', '9', '', 'Permanent', 'A', 'C1', 'Cuti Tahunan', 0, '', ''),
(30, '2022-12-03 07:51:50', '2022-12-03', '34002', 'Jumanto', '22', '', 'Permanent', 'N', 'C2', 'Cuti Panjang', 19105, 'Untung Prasetyo', 'Permanent'),
(31, '2022-12-03 07:51:26', '2022-12-03', '25174', 'Nurjaman', '22', '', 'Permanent', 'N', 'CL5', 'Ijin Duka Cita', 24157, 'Ahmad Faridhi', 'Permanent'),
(32, '2023-04-07 13:23:42', '2023-04-07', '27821', 'Didik Setiawan', '9', '', 'Permanent', 'B', 'S1', 'Sakit dengan Keterangan Dokter', 0, '', ''),
(33, '2023-04-07 22:35:19', '2023-04-07', '3116', 'Untung Subagyo', '9', '', 'Permanent', '1', 'S1', 'Sakit dengan Keterangan Dokter', 21720, 'Yusep Ridwan', 'Permanent');

-- --------------------------------------------------------

--
-- Table structure for table `halaman`
--

CREATE TABLE `halaman` (
  `halaman_id` int(11) NOT NULL,
  `halaman_judul` varchar(255) NOT NULL,
  `halaman_slug` varchar(255) NOT NULL,
  `halaman_konten` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `halaman`
--

INSERT INTO `halaman` (`halaman_id`, `halaman_judul`, `halaman_slug`, `halaman_konten`) VALUES
(3, 'Kontak Kami', 'kontak-kami', '<p>Berikut ini adalah kontak kami yang bisa anda hubungi :</p>\r\n\r\n<p><strong>WhatsApp</strong> : 0812-3456-7890</p>\r\n\r\n<p><strong>Email</strong> : me@dikialfarabi.com</p>\r\n\r\n<p><strong>Webiste</strong> : https://www.malasngoding.com</p>\r\n'),
(4, 'Tentang', 'tentang', '<h2>Siapa Kami ?</h2>\r\n\r\n<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<h2>Jasa Yang Ditawarkan</h2>\r\n\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n\r\n<h2>Where does it come from?</h2>\r\n\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>\r\n\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>\r\n'),
(5, 'Layanan', 'layanan', '<p>Berikut adalah layanan kami,</p>\r\n\r\n<ol>\r\n	<li>Jasa Pembuatan Aplikasi<br />\r\n	It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).<br />\r\n	&nbsp;</li>\r\n	<li>Jasa Pembuatan Website<br />\r\n	It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).<br />\r\n	&nbsp;</li>\r\n	<li>Jasa Content Writer<br />\r\n	It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).<br />\r\n	&nbsp;</li>\r\n	<li>Jasa Translate Bahasa Inggris - Indonesia<br />\r\n	It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).<br />\r\n	&nbsp;</li>\r\n</ol>\r\n\r\n<p>Terima Kasih</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `henkaten`
--

CREATE TABLE `henkaten` (
  `hen_id` int(11) NOT NULL,
  `hadir_id` int(50) NOT NULL,
  `hen_npk` varchar(255) NOT NULL,
  `hen_nama` varchar(255) NOT NULL,
  `hen_jalur` varchar(255) NOT NULL,
  `hen_status` varchar(255) NOT NULL,
  `hen_shift` varchar(255) NOT NULL,
  `hen_ganti` varchar(255) NOT NULL,
  `hen_gan_nama` varchar(255) NOT NULL,
  `hen_gan_sts` enum('1','0','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `jalur`
--

CREATE TABLE `jalur` (
  `jalur_id` int(11) NOT NULL,
  `jalur_nama` varchar(255) NOT NULL,
  `jalur_slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jalur`
--

INSERT INTO `jalur` (`jalur_id`, `jalur_nama`, `jalur_slug`) VALUES
(6, 'UnderBody D55L', 'underbody-d55l'),
(8, 'UnderBody D79L', 'underbody-d79l'),
(9, 'UF COMMON', 'uf-common'),
(10, 'SIDE MEMBER RH', 'side-member-rh'),
(12, 'SHELLPART', 'shellpart'),
(13, 'AUTOMIXLINE', 'automixline'),
(17, 'Others', 'others'),
(18, 'SIDE MEMBER LH', 'side-member-lh'),
(19, 'Supply', 'supply'),
(20, 'Quality', 'quality'),
(21, 'Project Improvement', 'project-improvement'),
(22, 'New Project', 'new-project'),
(23, 'Dojo Admin', 'dojo-admin'),
(24, 'Tatecho', 'tatecho'),
(25, 'BQC', 'bqc'),
(26, 'Safety', 'safety');

-- --------------------------------------------------------

--
-- Table structure for table `kodeabsen`
--

CREATE TABLE `kodeabsen` (
  `absen_id` varchar(11) NOT NULL,
  `absen_ket` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kodeabsen`
--

INSERT INTO `kodeabsen` (`absen_id`, `absen_ket`) VALUES
('C1', 'Cuti Tahunan'),
('C2', 'Cuti Panjang'),
('C3', 'Cuti Pernikahan Karyawan'),
('CL19', 'Diliburkan'),
('CL5', 'Ijin Duka Cita'),
('CL6', 'Cuti Sakit Keras Keluarga Karyawan'),
('CL8', 'Cuti Istri Karyawan Melahirkan'),
('CL9', 'Cuti Khitanan Anak Karyawan'),
('M', 'Mangkir'),
('S1', 'Sakit dengan Keterangan Dokter'),
('S2', 'Sakit dengan dirawat di Rumah Sakit'),
('T1', 'Terlambat > 1 jam'),
('T2', 'Terlambat > 30 menit kurang dari 1 jam'),
('T3', 'Terlambat kurang dari 30 menit'),
('WFH', 'Work From Home');

-- --------------------------------------------------------

--
-- Table structure for table `mp`
--

CREATE TABLE `mp` (
  `mp_id` int(11) NOT NULL,
  `mp_nama` varchar(255) NOT NULL,
  `mp_jalur` int(255) NOT NULL,
  `mp_pos` varchar(255) NOT NULL,
  `mp_status` varchar(255) NOT NULL,
  `mp_shift` varchar(11) NOT NULL,
  `mp_atasan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mp`
--

INSERT INTO `mp` (`mp_id`, `mp_nama`, `mp_jalur`, `mp_pos`, `mp_status`, `mp_shift`, `mp_atasan`) VALUES
(3116, 'Untung Subagyo', 9, '17', 'Permanent', '1', '3116'),
(3207, 'Herman Subiyanto', 25, '17', 'Permanent', 'N', ''),
(3353, 'Wawan Hermawan', 8, '17', 'Permanent', 'A', '17275'),
(7042, 'Asep Saepudin', 10, '17', 'Permanent', 'A', '7042'),
(14421, 'Totok Kunarto', 13, '17', 'Permanent', 'A', '14421'),
(14425, 'Wahyu Sadbudi Hidayat', 24, '17', 'Permanent', 'B', ''),
(14817, 'Putut Pujiarto', 20, '17', 'Permanent', 'A', '14817'),
(15252, 'Eka Candra', 6, '17', 'Permanent', 'B', '15252'),
(15799, 'Asep Hartanto', 23, '17', 'Permanent', 'N', '15799'),
(16726, 'Achmad Setiawan', 20, '17', 'Permanent', 'B', '16726'),
(17275, 'Mulyanto', 8, '17', 'Permanent', 'A', '17275'),
(17916, 'Purwanto', 25, '17', 'Permanent', 'N', ''),
(18342, 'Ririn Subarkah', 8, '17', 'Permanent', 'B', '25077'),
(18546, 'Darsono', 8, '17', 'Permanent', 'A', '17275'),
(18647, 'Aji Prastowo', 6, '17', 'Permanent', 'B', '15252'),
(18785, 'Adi Rahmanto Wijaya', 6, '17', 'Permanent', 'A', '18785'),
(18809, 'Takdir Sugayat', 19, '17', 'Permanent', 'B', '18809'),
(19021, 'Ardi Saiful', 12, '17', 'Permanent', 'B', '24224'),
(19105, 'Untung Prasetyo', 22, '16', 'Permanent', 'N', '24221'),
(19118, 'Moh. Sutanto', 13, '17', 'Permanent', 'B', '21531'),
(20630, 'Agus Riyadi', 10, '17', 'Permanent', 'B', '21377'),
(20823, 'Nur Wahidin', 18, '17', 'Permanent', 'A', '20823'),
(21377, 'Pipit Ardiyanto', 10, '17', 'Permanent', 'B', '21377'),
(21479, 'R.Nurul Imam Budiyanto', 6, '17', 'Permanent', 'A', '18785'),
(21531, 'Fitra Setiyawan', 13, '17', 'Permanent', 'B', '21531'),
(21548, 'Gatot Haryono', 19, '17', 'Permanent', 'A', '21548'),
(21666, 'Candra Cardiana', 13, '17', 'Permanent', 'B', '21531'),
(21679, 'Mohyono', 26, '17', 'Permanent', 'N', '21679'),
(21720, 'Yusep Ridwan', 9, '17', 'Permanent', 'B', '21720'),
(21738, 'Cendi Herisman', 24, '17', 'Permanent', 'A', ''),
(22167, 'Suryani', 20, '17', 'Permanent', 'B', '16726'),
(22284, 'Tri Wahyono', 9, '17', 'Permanent', 'B', '21720'),
(22416, 'Rudi Yanto', 22, '16', 'Permanent', 'N', '24221'),
(22445, 'Yudi Mulyadi', 9, '17', 'Permanent', 'B', '21720'),
(23229, 'Tutut Prasetyanto', 20, '17', 'Permanent', 'A', '14817'),
(23246, 'Triyo Rusdiyono', 24, '17', 'Permanent', 'A', ''),
(23317, 'Bambang Sangaji', 19, '17', 'Permanent', 'A', '21548'),
(23328, 'Eko Sugiyono', 8, '17', 'Permanent', 'A', '17275'),
(23337, 'Harsoyo', 8, '17', 'Permanent', 'B', '25077'),
(23358, 'Miftah Umuluddin', 10, '17', 'Permanent', 'A', '7042'),
(23379, 'Priyatno', 6, '17', 'Permanent', 'A', '18785'),
(23387, 'Rosad Somantri', 21, '17', 'Permanent', 'N', '27379'),
(23556, 'Moh. Arif Budi Iskandar', 20, '17', 'Permanent', 'B', '16726'),
(23830, 'Ahmad Riza', 13, '17', 'Permanent', 'A', '14421'),
(24119, 'Joko Siswanto', 22, '17', 'Permanent', 'N', '24221'),
(24120, 'Iryawan', 12, '17', 'Permanent', 'B', '24224'),
(24127, 'Puji Prasetyo', 10, '17', 'Permanent', 'A', '7042'),
(24131, 'Debi Aji Hagamastar', 9, '17', 'Permanent', 'A', '3116'),
(24148, 'Suharyanto', 12, '17', 'Permanent', 'A', '24202'),
(24157, 'Ahmad Faridhi', 22, '17', 'Permanent', 'N', '24221'),
(24163, 'Supriyadi Susanto', 8, '17', 'Permanent', 'B', '25077'),
(24171, 'Feri Wahyudi', 22, '17', 'Permanent', 'N', '24221'),
(24172, 'Tauhid Bekti Marzuki', 22, '17', 'Permanent', 'N', '24221'),
(24174, 'Paryanto', 22, '17', 'Permanent', 'N', '24221'),
(24191, 'Aris Efendi', 12, '17', 'Permanent', 'B', '24224'),
(24199, 'Nurul Hidayat', 9, '17', 'Permanent', 'A', '3116'),
(24202, 'Priyo Trianto', 12, '17', 'Permanent', 'A', '24202'),
(24206, 'Aminullah', 25, '17', 'Permanent', 'N', ''),
(24217, 'Tarsum', 6, '17', 'Permanent', 'A', '18785'),
(24218, 'Slamet Tri Handoko', 13, '17', 'Permanent', 'B', '21531'),
(24219, 'Amat Jaswadi', 25, '17', 'Permanent', 'N', ''),
(24221, 'Nurul Solikin', 22, '17', 'Permanent', 'N', '24221'),
(24224, 'Abdul Qodir', 12, '17', 'Permanent', 'B', '24224'),
(24422, 'Giyanto', 8, '17', 'Permanent', 'B', '25077'),
(24438, 'Abdul Latif', 6, '17', 'Permanent', 'B', '15252'),
(24460, 'Septian Ragil Raharjo', 26, '17', 'Permanent', 'N', '21679'),
(24481, 'Agung Yulianto', 24, '17', 'Permanent', 'B', ''),
(24495, 'Tri Winarno', 9, '17', 'Permanent', 'B', '21720'),
(24580, 'Agung Tri Sujarwo', 12, '17', 'Permanent', 'A', '24202'),
(24643, 'Teguh Adrian', 18, '17', 'Permanent', 'B', '24643'),
(24664, 'Yogie Nurdiyanto', 9, '17', 'Permanent', 'B', '21720'),
(24675, 'Samsul Falah', 13, '17', 'Permanent', 'B', '21531'),
(24885, 'Apris Heriyanto', 20, '17', 'Permanent', 'A', '14817'),
(24950, 'Bahkti Yudhi Kurniawan', 12, '17', 'Permanent', 'A', '24202'),
(24960, 'Iwan Ruhyat', 9, '17', 'Permanent', 'B', '21720'),
(24964, 'Aji Purnomo', 24, '17', 'Permanent', 'B', ''),
(24968, 'Kristianto', 9, '17', 'Permanent', 'A', '3116'),
(25064, 'Samsul Bahri', 20, '17', 'Permanent', 'A', '14817'),
(25077, 'Saepul Ahmad Hidayat', 8, '17', 'Permanent', 'B', '25077'),
(25079, 'Yayat Hidayat', 21, '17', 'Permanent', 'N', '27379'),
(25081, 'Achmad Sidik', 20, '17', 'Permanent', 'B', '16726'),
(25083, 'Syamsudin', 9, '17', 'Permanent', 'B', '21720'),
(25139, 'Ahmad Ridani', 9, '17', 'Permanent', 'B', '21720'),
(25174, 'Nurjaman', 22, '17', 'Permanent', 'N', '24221'),
(25188, 'Randi Septa Wijaya', 18, '17', 'Permanent', 'B', '24643'),
(25191, 'Budi Irwanto', 24, '17', 'Permanent', 'A', ''),
(25195, 'Hilmi Waliyudin', 20, '17', 'Permanent', 'B', '16726'),
(25217, 'Kurniawan', 10, '17', 'Permanent', 'A', '7042'),
(25622, 'Rendra Nugraha', 10, '17', 'Permanent', 'B', '21377'),
(25623, 'Mamad', 21, '17', 'Permanent', 'N', '27379'),
(25838, 'Ade Iswadih', 8, '17', 'Permanent', 'B', '25077'),
(25951, 'Ani Candra Wijaya', 25, '17', 'Permanent', 'N', ''),
(26090, 'Imam Nuryaman', 19, '17', 'Permanent', 'B', '18809'),
(26441, 'Kasidin', 24, '17', 'Permanent', 'A', ''),
(26496, 'Imam Bukhori', 9, '17', 'Permanent', 'A', '3116'),
(26512, 'Muanif Afandi', 12, '17', 'Permanent', 'A', '24202'),
(26516, 'David Oktavianto', 22, '17', 'Permanent', 'N', '24221'),
(26517, 'Markim', 13, '17', 'Permanent', 'A', '14421'),
(26529, 'Aji Purwoko', 10, '17', 'Permanent', 'B', '21377'),
(26531, 'Wardianto Bin Samsuri', 20, '17', 'Permanent', 'A', '14817'),
(26532, 'M. Zam Zami', 9, '17', 'Permanent', 'B', '21720'),
(26534, 'Asep Subandi', 20, '17', 'Permanent', 'B', '16726'),
(26543, 'Yudiyanto', 9, '17', 'Permanent', 'A', '3116'),
(26563, 'Taufan Apri Kurniawan', 18, '17', 'Permanent', 'B', '24643'),
(26575, 'Mukhyidin', 20, '17', 'Permanent', 'A', '14817'),
(26576, 'Masruri Hadi Sumartono', 20, '17', 'Permanent', 'A', '14817'),
(26936, 'Feri Ariyanto', 20, '17', 'Permanent', 'B', '16726'),
(27077, 'Nurhadi', 23, '17', 'Permanent', 'N', '15799'),
(27372, 'Heru Triyono', 13, '17', 'Permanent', 'B', '21531'),
(27379, 'Atep Nanang Kosim', 21, '17', 'Permanent', 'N', '27379'),
(27381, 'Dudung', 25, '17', 'Permanent', 'N', ''),
(27387, 'Priyanto', 20, '17', 'Permanent', 'B', '16726'),
(27402, 'Suporiyono', 24, '17', 'Permanent', 'A', ''),
(27408, 'Joko Suryanto', 6, '17', 'Permanent', 'A', '18785'),
(27417, 'Sulistianto', 13, '17', 'Permanent', 'A', '14421'),
(27431, 'Yoyo Taryo', 12, '17', 'Permanent', 'A', '24202'),
(27439, 'Nur Salim', 6, '17', 'Permanent', 'B', '15252'),
(27742, 'Mahrudi', 24, '17', 'Permanent', 'A', ''),
(27770, 'Ari Ansori', 19, '17', 'Permanent', 'B', '18809'),
(27821, 'Didik Setiawan', 9, '17', 'Permanent', 'B', '21720'),
(27833, 'Eko Sujadmiko', 22, '17', 'Permanent', 'N', '24221'),
(27835, 'Romi Canggih Saputra', 13, '17', 'Permanent', 'B', '21531'),
(27843, 'Mujahidin', 20, '17', 'Permanent', 'A', '14817'),
(28079, 'Eko Styawan', 21, '17', 'Permanent', 'N', '27379'),
(28096, 'Mubarok', 21, '17', 'Permanent', 'N', '27379'),
(28138, 'Budiarto', 9, '17', 'Permanent', 'A', '3116'),
(28162, 'Achmad Aris Solichin', 13, '17', 'Permanent', 'A', '14421'),
(28173, 'Zenuri', 19, '17', 'Permanent', 'B', '18809'),
(28454, 'Ponco Hendro Pamungkas', 20, '17', 'Permanent', 'A', '14817'),
(28460, 'Agung Puji Kristriyanto', 10, '17', 'Permanent', 'A', '7042'),
(28461, 'Taufik Nurrahman', 25, '17', 'Permanent', 'N', ''),
(28478, 'Deny Kiswanto', 19, '17', 'Permanent', 'A', '21548'),
(28481, 'Akhmad Hamid', 23, '17', 'Permanent', 'N', '15799'),
(28485, 'Muhammad Farindhi', 22, '17', 'Permanent', 'N', '24221'),
(28492, 'Sudiyono', 26, '17', 'Permanent', 'B', '21679'),
(28500, 'Yunianto', 25, '17', 'Permanent', 'N', ''),
(28505, 'Abdul Khodir', 20, '17', 'Permanent', 'B', '16726'),
(28516, 'Carles Setiawan', 20, '17', 'Permanent', 'B', '16726'),
(28520, 'Prastiyanto', 9, '17', 'Permanent', 'B', '21720'),
(28562, 'Arya Maryanto', 18, '17', 'Permanent', 'A', '20823'),
(28565, 'Agus Siswanto', 20, '17', 'Permanent', 'A', '14817'),
(28568, 'Ian Wicaksono', 20, '17', 'Permanent', 'A', '14817'),
(28572, 'Maryadi', 6, '17', 'Permanent', 'A', '18785'),
(28584, 'Nanang Trianto', 9, '17', 'Permanent', 'B', '21720'),
(28591, 'Nanang Setiawan', 13, '17', 'Permanent', 'A', '14421'),
(28595, 'Asep Maulana', 20, '17', 'Permanent', 'B', '16726'),
(28948, 'Deny Setiawan', 20, '17', 'Permanent', 'A', '14817'),
(28949, 'Edi Junaedi', 24, '17', 'Permanent', 'A', ''),
(28960, 'Runi Setia Permana', 20, '17', 'Permanent', 'B', '16726'),
(28965, 'Muhammad Septiana Abdullah', 25, '17', 'Permanent', 'B', ''),
(28966, 'Haryadi', 25, '17', 'Permanent', 'A', ''),
(29168, 'Risman Kurniawan', 9, '17', 'Permanent', 'B', '21720'),
(29174, 'Purwanto', 20, '17', 'Permanent', 'A', '14817'),
(29616, 'Novi Hantoro N.', 18, '17', 'Permanent', 'B', '24643'),
(29623, 'Dhillullah.R.A.H', 18, '17', 'Permanent', 'A', '20823'),
(29646, 'Anggy Wijayatmoko', 8, '17', 'Permanent', 'A', '17275'),
(29648, 'Sarifudin', 22, '17', 'Permanent', 'N', '24221'),
(29653, 'Susilo', 25, '17', 'Permanent', 'N', ''),
(29666, 'Supendi', 18, '17', 'Permanent', 'B', '24643'),
(29667, 'Yunarya', 19, '17', 'Permanent', 'B', '18809'),
(29722, 'Yogo Purwo Wibowo', 8, '17', 'Permanent', 'B', '25077'),
(29732, 'Iman Sulaeman', 20, '17', 'Permanent', 'A', '14817'),
(29747, 'Rifa Pahlefi', 26, '17', 'Permanent', 'N', '21679'),
(29751, 'Dodi Humaidi', 19, '17', 'Permanent', 'A', '21548'),
(29759, 'Sulistiyo', 6, '17', 'Permanent', 'A', '18785'),
(29761, 'Agung Risdiantara Putra', 12, '17', 'Permanent', 'B', '24224'),
(29776, 'Nur Rokhmat', 13, '17', 'Permanent', 'A', '14421'),
(29799, 'Sholikhin', 8, '17', 'Permanent', 'B', '25077'),
(29891, 'Aris Yulianto', 9, '17', 'Permanent', 'A', '3116'),
(29901, 'Sunari', 18, '17', 'Permanent', 'A', '20823'),
(29913, 'Ari Wibowo', 9, '17', 'Permanent', 'A', '3116'),
(29915, 'Dwi Agus Suryanto', 12, '17', 'Permanent', 'A', '24202'),
(29943, 'Catur Sulistiyo', 10, '17', 'Permanent', 'B', '21377'),
(29951, 'Hendri Priasmoko', 20, '17', 'Permanent', 'A', '14817'),
(29954, 'Budi Santoso', 25, '17', 'Permanent', 'N', ''),
(29957, 'Ahmad Sidik', 6, '17', 'Permanent', 'A', '18785'),
(29964, 'Zaeky Oktra Yudha', 9, '17', 'Permanent', 'A', '3116'),
(29983, 'Hendra Kurniawan', 20, '17', 'Permanent', 'B', '16726'),
(30004, 'Ade Farizal', 9, '17', 'Permanent', 'A', '3116'),
(30044, 'Irwan Sopandi', 18, '17', 'Permanent', 'A', '20823'),
(30083, 'Imron Rosyadi', 6, '17', 'Permanent', 'B', '15252'),
(30295, 'Turidin Hidayat', 6, '17', 'Permanent', 'A', '18785'),
(30297, 'Barkat Arif Rahman', 20, '17', 'Permanent', 'B', '16726'),
(30359, 'Cholik Abdi Awaludin', 22, '17', 'Permanent', 'N', '24221'),
(30379, 'Miming Yudiarta', 13, '17', 'Permanent', 'B', '21531'),
(30481, 'Dwi Prasetyo', 6, '17', 'Permanent', 'B', '15252'),
(30489, 'Jumadi', 19, '17', 'Permanent', 'B', '18809'),
(30499, 'Andi Yudistira Arby', 6, '17', 'Permanent', 'B', '15252'),
(30503, 'Sigit Prayitno', 25, '17', 'Permanent', 'N', ''),
(30518, 'Jamaludin', 10, '17', 'Permanent', 'B', '21377'),
(30520, 'Moh. Fahrudin', 12, '17', 'Permanent', 'A', '24202'),
(30535, 'Maryanto', 26, '17', 'Permanent', 'A', '21679'),
(30709, 'Diaz Prayogi', 9, '17', 'Permanent', 'A', '3116'),
(30715, 'Nuvo Adhar Movandi', 8, '17', 'Permanent', 'A', '17275'),
(30720, 'Agus Setiawan', 8, '17', 'Permanent', 'A', '17275'),
(30726, 'Tri Satyanto', 10, '17', 'Permanent', 'B', '21377'),
(31431, 'Puji Hadinoto', 19, '17', 'Permanent', 'B', '18809'),
(31436, 'Ahmad Krisdiyansyah', 12, '17', 'Permanent', 'A', '24202'),
(31446, 'Irwanudin', 18, '17', 'Permanent', 'B', '24643'),
(31449, 'Sarno Ahmad Fauzi', 8, '17', 'Permanent', 'A', '17275'),
(31450, 'Marjono Bin Ratih', 8, '17', 'Permanent', 'A', '17275'),
(31657, 'Erry Suswandi', 12, '17', 'Permanent', 'A', '24202'),
(31671, 'Ade Cahya Purnama', 20, '17', 'Permanent', 'B', '16726'),
(31674, 'Bayu Adi Wibowo', 9, '17', 'Permanent', 'B', '21720'),
(31692, 'Muhammad Aminudin', 13, '17', 'Permanent', 'A', '14421'),
(31839, 'Moch. Burhanul Arifin', 9, '17', 'Permanent', 'A', '3116'),
(32690, 'Agung Kristiawan', 6, '17', 'Permanent', 'B', '15252'),
(33131, 'Arif Sucahyadi', 8, '17', 'Permanent', 'A', '17275'),
(33140, 'Eko Wasis Jayanto', 18, '17', 'Permanent', 'B', '24643'),
(33148, 'Kifni Bagus Indrawan', 9, '17', 'Permanent', 'B', '21720'),
(33163, 'Mustajirin', 9, '17', 'Permanent', 'A', '3116'),
(33230, 'Acep Setyo Nugroho', 19, '17', 'Permanent', 'B', '18809'),
(33245, 'Suyanto', 6, '17', 'Permanent', 'B', '15252'),
(33286, 'Andit Solichin', 19, '17', 'Permanent', 'A', '21548'),
(33676, 'Arif Triyono', 21, '17', 'Permanent', 'N', '27379'),
(33680, 'Budi Priyo Utama', 12, '17', 'Permanent', 'B', '24224'),
(33685, 'Fuad Winarno', 6, '17', 'Permanent', 'B', '15252'),
(33691, 'Karyadi', 13, '17', 'Permanent', 'B', '21531'),
(33980, 'Andi Supriyono', 18, '17', 'Permanent', 'A', '20823'),
(34002, 'Jumanto', 22, '17', 'Permanent', 'N', '24221'),
(34308, 'Suhandini Agung Setiyabudi', 18, '17', 'Permanent', 'B', '24643'),
(34366, 'Imam Muttaqin', 8, '17', 'Permanent', 'B', '25077'),
(34379, 'Yusup Supriadi', 6, '17', 'Permanent', 'B', '15252'),
(34557, 'Sholikin', 18, '17', 'Permanent', 'B', '24643'),
(34561, 'Mochamad Kasih', 19, '17', 'Permanent', 'A', '21548'),
(34569, 'Margo Prastiyono', 10, '17', 'Permanent', 'B', '21377'),
(34577, 'Setia Haryanto', 8, '17', 'Permanent', 'B', '25077'),
(34579, 'Ahmad Ratno', 9, '17', 'Permanent', 'A', '3116'),
(34596, 'Buyung Bagus Yan Gani', 25, '17', 'Permanent', 'N', ''),
(34737, 'Saiful Robiul Yunus', 10, '17', 'Permanent', 'B', '21377'),
(34741, 'Sugeng Riyadi', 8, '17', 'Permanent', 'A', '17275'),
(34755, 'Wijianto', 12, '17', 'Permanent', 'B', '24224'),
(34972, 'Apit Raditya S', 8, '17', 'Permanent', 'A', '17275'),
(34987, 'Mardani', 25, '17', 'Permanent', 'N', ''),
(34988, 'Muhammad Nur Shodiq', 9, '17', 'Permanent', 'B', '21720'),
(35118, 'Slamet Priyono', 10, '17', 'Permanent', 'B', '21377'),
(35523, 'Gunawan Mujiono', 20, '17', 'Permanent', 'B', '16726'),
(35978, 'Ganggeng Anabrang', 9, '17', 'Permanent', 'A', '3116'),
(35989, 'Yanto', 19, '17', 'Permanent', 'B', '18809'),
(36350, 'Dinaryan Haryadi', 8, '17', 'Permanent', 'A', '17275'),
(36360, 'Purwanto', 6, '17', 'Permanent', 'A', '18785'),
(36875, 'Heriyanto', 8, '17', 'Permanent', 'B', '25077'),
(36889, 'Ahmad Nur Kurniyanto', 20, '17', 'Permanent', 'B', '16726'),
(36892, 'Aziz Iswantoro', 19, '17', 'Permanent', 'A', '21548'),
(37278, 'Danang Putra Pinilih', 9, '17', 'Permanent', 'B', '21720'),
(37281, 'Eli Kasim', 18, '17', 'Permanent', 'B', '24643'),
(37566, 'Fajar Ari Sandra', 13, '17', 'Permanent', 'B', '21531'),
(37918, 'Alde Riyanto', 19, '17', 'Permanent', 'B', '18809'),
(37934, 'Iskandar', 10, '17', 'Permanent', 'B', '21377'),
(38393, 'Apri Widianto', 8, '17', 'Permanent', 'A', '17275'),
(38431, 'Nur Kholis', 21, '17', 'Permanent', 'B', '27379'),
(38800, 'Fakhruri', 9, '17', 'Permanent', 'A', '3116'),
(39027, 'Sutarso', 6, '17', 'Permanent', 'B', '15252'),
(40620, 'Alvian Andry Herawan', 25, '17', 'Permanent', 'B', ''),
(40974, 'Didik Darmaji', 19, '17', 'Permanent', 'B', '18809'),
(41090, 'Ferdi Permadi', 20, '17', 'Permanent', 'A', '14817'),
(41330, 'Mochamad Jaenal Arifin', 25, '17', 'Permanent', 'N', ''),
(41332, 'Muhammad Abdilah Rizal', 25, '17', 'Permanent', 'N', ''),
(41338, 'Rahmad Adi Santoso', 25, '17', 'Permanent', 'N', ''),
(41341, 'Sandi Susilo', 25, '17', 'Permanent', 'A', ''),
(41439, 'Eji Hamali', 23, '17', 'Permanent', 'A', '15799'),
(41557, 'M. Muchi', 25, '17', 'Permanent', 'N', ''),
(41562, 'Rian Hadiansyah', 25, '17', 'Permanent', 'N', ''),
(41563, 'Riano Urip Prakoso', 21, '17', 'Permanent', 'A', '27379'),
(42671, 'Fuad Hasanudin', 8, '17', 'Permanent', 'A', '17275'),
(42736, 'Moh Ginanjar', 19, '17', 'Permanent', 'A', '21548'),
(44140, 'Ade Susanto', 19, '17', 'Permanent', 'A', '21548'),
(44141, 'Deni Yuda Apriyanto', 25, '17', 'Permanent', 'N', ''),
(44143, 'Feri Lesmana', 12, '17', 'Permanent', 'A', '24202'),
(44144, 'Gangsar Tarmono', 6, '17', 'Permanent', 'A', '18785'),
(44430, 'Agung Dafit Istya Fani', 23, '17', 'Permanent', 'B', '15799'),
(44590, 'Bagus Muhammad Faisal', 20, '17', 'Permanent', 'A', '14817'),
(44962, 'Eko Irianto', 13, '17', 'Permanent', 'B', '21531'),
(45323, 'Agus Hariyanto', 20, '17', 'Permanent', 'A', '14817'),
(45325, 'Ahmad Daimuntaqin', 20, '17', 'Permanent', 'A', '14817'),
(45327, 'Ahmad Muafan', 24, '17', 'Permanent', 'A', ''),
(45328, 'Aji Yuliawan', 12, '17', 'Permanent', 'A', '24202'),
(45332, 'Argo Gondo Kusumo', 24, '17', 'Permanent', 'B', ''),
(45337, 'Bayu Lesmana', 20, '17', 'Permanent', 'B', '16726'),
(45341, 'Deni Wahyudi', 20, '17', 'Permanent', 'B', '16726'),
(45342, 'Didik Reno Aji', 23, '17', 'Permanent', 'N', '15799'),
(45343, 'Edi Asta Saputra', 18, '17', 'Permanent', 'A', '20823'),
(45350, 'Galih Prasetyo', 24, '17', 'Permanent', 'B', ''),
(45353, 'Harmono', 12, '17', 'Permanent', 'B', '24224'),
(45354, 'Hendri Nugroho', 24, '17', 'Permanent', 'B', ''),
(45358, 'Isman Fedrianto', 8, '17', 'Permanent', 'B', '25077'),
(45360, 'Jodi Septiyanto', 6, '17', 'Permanent', 'B', '15252'),
(45363, 'Moh. Eddy Sujianto', 24, '17', 'Permanent', 'B', ''),
(45368, 'Pio Aryanto', 8, '17', 'Permanent', 'A', '17275'),
(45375, 'Subkhan', 18, '17', 'Permanent', 'A', '20823'),
(45376, 'Sumaryo', 18, '17', 'Permanent', 'A', '20823'),
(45377, 'Suryo Bintang', 23, '17', 'Permanent', 'N', '15799'),
(45378, 'Suwarno', 19, '17', 'Permanent', 'B', '18809'),
(45380, 'Taufik Nur Setiawan', 10, '17', 'Permanent', 'B', '21377'),
(45386, 'Yulianto Wibowo', 9, '17', 'Permanent', 'A', '3116'),
(45564, 'Abdul Wakhid', 13, '17', 'Permanent', 'B', '21531'),
(45565, 'Adi Nurdiansah', 12, '17', 'Permanent', 'B', '24224'),
(45573, 'Aji Setyo Anggoro', 20, '17', 'Permanent', 'A', '14817'),
(45587, 'Didi Rosikin', 13, '17', 'Permanent', 'B', '21531'),
(45601, 'Khoerun Nas', 20, '17', 'Permanent', 'B', '16726'),
(45606, 'Mohamad Arifin', 12, '17', 'Permanent', 'A', '24202'),
(45611, 'Nur Muhamad Rois', 22, '17', 'Permanent', 'N', '24221'),
(45614, 'Pujadi Sony Sonata', 8, '17', 'Permanent', 'B', '25077'),
(45617, 'Rokhimin', 20, '17', 'Permanent', 'B', '16726'),
(45620, 'Saefudin', 6, '17', 'Permanent', 'B', '15252'),
(45623, 'Teguh Kristianto', 8, '17', 'Permanent', 'A', '17275'),
(45626, 'Toni Handika', 9, '17', 'Permanent', 'A', '3116'),
(45628, 'Tri Aminudin', 9, '17', 'Permanent', 'B', '21720'),
(45789, 'Dian Rosdiana', 9, '17', 'Permanent', 'A', '3116'),
(45792, 'Nurdin Nurdiana', 19, '17', 'Permanent', 'A', '21548'),
(45842, 'Ferdy Aditya', 24, '17', 'Permanent', 'A', ''),
(45843, 'Danang Widi Hatmoko', 6, '17', 'Permanent', 'A', '18785'),
(45852, 'Widiyanto', 20, '17', 'Permanent', 'B', '16726'),
(45853, 'Dedi Iswanto', 6, '17', 'Permanent', 'B', '15252'),
(45854, 'Malan Supriyadi', 19, '17', 'Permanent', 'B', '18809'),
(45855, 'Moh Irfan Maulana', 18, '17', 'Permanent', 'A', '20823'),
(45865, 'Ahmad Fatkurohim', 9, '17', 'Permanent', 'B', '21720'),
(45869, 'Fitra Puji Sasongko', 13, '17', 'Permanent', 'B', '21531'),
(45870, 'Abdu Somad', 13, '17', 'Permanent', 'A', '14421'),
(45876, 'Asep Mulyadi', 22, '17', 'Permanent', 'N', '24221'),
(45880, 'Jajang Sudrajat S.M', 22, '17', 'Permanent', 'N', '24221'),
(45883, 'Muhammad Reza Setiawan', 13, '17', 'Permanent', 'A', '14421'),
(46152, 'Akhmad Najib', 9, '17', 'Permanent', 'B', '21720'),
(46157, 'Bambang Carino', 8, '17', 'Permanent', 'B', '25077'),
(46165, 'Erpandi', 9, '17', 'Permanent', 'B', '21720'),
(46166, 'Fahmi Azhar .A', 10, '17', 'Permanent', 'A', '7042'),
(46170, 'Irfan Setiadi', 18, '17', 'Permanent', 'B', '24643'),
(46171, 'Jaka Nur Yasin', 19, '17', 'Permanent', 'B', '18809'),
(46172, 'Juli', 10, '17', 'Permanent', 'A', '7042'),
(46178, 'Lukman Trio Andriyan', 9, '17', 'Permanent', 'B', '21720'),
(46180, 'M. Syarifudin', 9, '17', 'Permanent', 'A', '3116'),
(46189, 'Saeful Anwar', 19, '17', 'Permanent', 'A', '21548'),
(46384, 'Dimas Prasetyo', 24, '17', 'Permanent', 'B', ''),
(46386, 'Tridiyanto', 6, '17', 'Permanent', 'B', '15252'),
(46390, 'Ahmad Taufiq', 6, '17', 'Permanent', 'A', '18785'),
(46391, 'Heri Risqiyanto', 19, '17', 'Permanent', 'B', '18809'),
(46392, 'Saimin', 19, '17', 'Permanent', 'A', '21548'),
(46395, 'Sariman', 20, '17', 'Permanent', 'A', '14817'),
(46396, 'Roni Helmison', 19, '17', 'Permanent', 'B', '18809'),
(46399, 'Igen Setiawan', 18, '17', 'Permanent', 'A', '20823'),
(46404, 'Hanian Khamid', 10, '17', 'Permanent', 'A', '7042'),
(46405, 'Ahmad Makhrufi', 10, '17', 'Permanent', 'B', '21377'),
(46406, 'Handoyo', 18, '17', 'Permanent', 'A', '20823'),
(46407, 'Ahmad Nursalim', 19, '17', 'Permanent', 'B', '18809'),
(46408, 'Faqih Wicaksono', 8, '17', 'Permanent', 'B', '25077'),
(46410, 'Dwi Wahono', 10, '17', 'Permanent', 'B', '21377'),
(47631, 'Agung Legia', 10, '17', 'Permanent', 'A', '7042'),
(47635, 'Denny Prasetyo', 12, '17', 'Permanent', 'B', '24224'),
(47646, 'Lopi', 10, '17', 'Permanent', 'B', '21377'),
(47648, 'Mohamad Toha', 20, '17', 'Permanent', 'A', '14817'),
(47649, 'Nur Cahandi', 12, '17', 'Permanent', 'A', '24202'),
(47652, 'Rudi Hanapi Bin Keri', 21, '17', 'Permanent', 'N', '27379'),
(47654, 'Saefullah', 10, '17', 'Permanent', 'A', '7042'),
(47655, 'Satria Putra', 23, '17', 'Permanent', 'N', '15799'),
(47662, 'Warsono', 21, '17', 'Permanent', 'N', '27379'),
(47666, 'Yanto Susanto', 19, '17', 'Permanent', 'B', '18809'),
(48051, 'Ade Hilman Muhaimin Hermawan', 9, '17', 'Permanent', 'A', '3116'),
(48053, 'Ali Munandar', 8, '17', 'Permanent', 'A', '17275'),
(48054, 'Aminudin', 8, '17', 'Permanent', 'A', '17275'),
(48058, 'Ayat Bustomi', 8, '17', 'Permanent', 'A', '17275'),
(48060, 'Bagus Suryanda', 8, '17', 'Permanent', 'A', '17275'),
(48063, 'Dandy Tandayu', 24, '17', 'Permanent', 'B', ''),
(48064, 'Diki Novianto', 13, '17', 'Permanent', 'A', '14421'),
(48070, 'Gunawan Suyat', 10, '17', 'Permanent', 'A', '7042'),
(48084, 'Satimin Arif Budiono', 13, '17', 'Permanent', 'A', '14421'),
(48086, 'Sugeng Ayub Romadhon', 10, '17', 'Permanent', 'B', '21377'),
(48087, 'Tri Ujayanto', 19, '17', 'Permanent', 'B', '18809'),
(48089, 'Yeyen Aji Mulyanto', 9, '17', 'Permanent', 'B', '21720'),
(48337, 'Toni', 20, '17', 'Permanent', 'A', '14817'),
(48506, 'Muhamad Hedar Akhwadi', 8, '17', 'Permanent', 'B', '25077'),
(48507, 'Muhamad Nurul Huda', 19, '17', 'Permanent', 'B', '18809'),
(48509, 'Muhamad Teguh Zaqi Imanudin', 10, '17', 'Permanent', 'B', '21377'),
(48512, 'Muhammad Firmansyah', 12, '17', 'Permanent', 'B', '24224'),
(48514, 'Muhammad Luthfi Amer', 19, '17', 'Permanent', 'B', '18809'),
(48516, 'Muhammad Yusuf Hanif', 20, '17', 'Permanent', 'B', '16726'),
(48517, 'Muharso', 13, '17', 'Permanent', 'B', '21531'),
(48520, 'Mukhammad Sidiq Lastrikno', 6, '17', 'Permanent', 'B', '15252'),
(48523, 'Nur Aziz', 6, '17', 'Permanent', 'B', '15252'),
(48532, 'Reza Prastio', 13, '17', 'Permanent', 'A', '14421'),
(48537, 'Roi Riana', 20, '17', 'Permanent', 'A', '14817'),
(48950, 'Afif Hidayattullah', 12, '17', 'Permanent', 'B', '24224'),
(48981, 'Apip Anwari', 10, '17', 'Permanent', 'B', '21377'),
(48983, 'Candra Antoni', 12, '17', 'Permanent', 'B', '24224'),
(49248, 'Ade Dahlan', 10, '17', 'Permanent', 'A', '7042'),
(50824, 'Fatkhu Rokhman', 25, '17', 'Permanent', 'N', ''),
(50825, 'Nur Muhamad Lutfi', 25, '17', 'Permanent', 'N', ''),
(51107, 'Fery Irawan', 20, '17', 'Permanent', 'A', '14817'),
(51115, 'Sarif Andika', 12, '17', 'Permanent', 'A', '24202'),
(51116, 'Satryo Irawan', 13, '17', 'Permanent', 'A', '14421'),
(51594, 'Daryanto', 9, '17', 'Permanent', 'B', '21720'),
(51601, 'Muh Riyanto', 8, '17', 'Permanent', 'A', '17275'),
(51602, 'Oki Budi Santoso', 12, '17', 'Permanent', 'A', '24202'),
(52142, 'Fani Ariyanto', 6, '17', 'Permanent', 'A', '18785'),
(52266, 'Muhamad Wandi', 19, '17', 'Permanent', 'A', '21548'),
(52273, 'Indra Andri Andi', 6, '17', 'Permanent', 'B', '15252'),
(52346, 'Rizky Rahman Hakim', 9, '17', 'Permanent', 'A', '3116'),
(52511, 'Shohibul Imam Tohir', 10, '17', 'Permanent', 'B', '21377'),
(52588, 'Ade Wahyu', 10, '17', 'Permanent', 'A', '7042'),
(52589, 'Aditya Saadilah Alfarizi', 25, '17', 'Permanent', 'N', ''),
(52595, 'Asep Pirmansyah', 6, '17', 'Permanent', 'A', '18785'),
(52604, 'Eka Setiawan', 6, '17', 'Permanent', 'A', '18785'),
(52608, 'Feri Hidayatulloh', 12, '17', 'Permanent', 'A', '24202'),
(52613, 'Inan', 19, '17', 'Permanent', 'A', '21548'),
(52621, 'Nurholis', 20, '17', 'Permanent', 'A', '14817'),
(53533, 'Ali Muhamad Ribut', 8, '17', 'Permanent', 'A', '17275'),
(53544, 'Nor Kholis', 9, '17', 'Permanent', 'B', '21720'),
(53547, 'Riyan Santosa', 13, '17', 'Permanent', 'A', '14421'),
(53548, 'Rudi Setiawan', 6, '17', 'Permanent', 'A', '18785'),
(53549, 'Sigit Arif Wijayanto', 20, '17', 'Permanent', 'B', '16726'),
(53550, 'Sofyan Hadiansyah', 23, '17', 'Permanent', 'N', '15799'),
(53636, 'Ajianto', 19, '17', 'Permanent', 'A', '21548'),
(53645, 'Sahid Al Anwari', 9, '17', 'Permanent', 'B', '21720'),
(53647, 'Wahono Agus Heryanto', 6, '17', 'Permanent', 'A', '18785'),
(53778, 'Agus Nuryadi', 10, '17', 'Permanent', 'A', '7042'),
(53781, 'Candra Mukti Enjang Pribadi', 19, '17', 'Permanent', 'B', '18809'),
(53785, 'Heidi Tri Maisya', 8, '17', 'Permanent', 'B', '25077'),
(53786, 'Khoirul Nurrahman', 22, '17', 'Permanent', 'N', '24221'),
(53790, 'Rizki Lutfianto', 20, '17', 'Permanent', 'B', '16726'),
(53944, 'Dian Shofar Arestan', 22, '17', 'Permanent', 'N', '24221'),
(53945, 'Aji Prasongko', 24, '17', 'Permanent', 'A', ''),
(54055, 'Indri Kurniadi', 20, '17', 'Permanent', 'B', '16726'),
(54149, 'Feri Maulana', 22, '17', 'Permanent', 'N', '24221'),
(54311, 'Bayu Prastowo', 10, '17', 'Permanent', 'A', '7042'),
(54330, 'Turimin', 13, '17', 'Permanent', 'A', '14421'),
(54755, 'Ahmad Feri', 8, '17', 'Permanent', 'A', '17275'),
(57603, 'Ridwan Nudin', 8, '17', 'Permanent', 'B', '25077'),
(57776, 'Sigit Okta Pratama', 20, '17', 'Permanent', 'A', '14817'),
(68603, 'Ade Gunawan', 8, '17', 'Kontrak 2', 'A', '17275'),
(68606, 'Priyo Septriadi', 9, '17', 'Kontrak 2', 'A', '3116'),
(68607, 'M. Zein', 9, '17', 'Kontrak 2', 'A', '3116'),
(68608, 'Bayu Aji Saputra', 10, '17', 'Kontrak 2', 'A', '7042'),
(68609, 'Yahya Rudi Dwi Saputra', 8, '17', 'Kontrak 2', 'A', '17275'),
(68611, 'Denis Ahmad Ali', 10, '17', 'Kontrak 2', 'A', '7042'),
(68612, 'Galih Sukmana', 12, '17', 'Kontrak 2', 'A', '24202'),
(68613, 'Indra Adfriansyah', 19, '17', 'Kontrak 2', 'A', '21548'),
(68614, 'Choirul Umam', 9, '17', 'Kontrak 2', 'B', '21720'),
(68615, 'Fahri Fauzi Adhim', 6, '17', 'Kontrak 2', 'B', '15252'),
(68616, 'Rio Adi Pranata', 19, '17', 'Kontrak 2', 'B', '18809'),
(68619, 'Fajar Fauzan', 13, '17', 'Kontrak 2', 'B', '21531'),
(68620, 'Eko Budi Prastiyo', 8, '17', 'Kontrak 2', 'B', '25077'),
(68621, 'Rudi', 8, '17', 'Kontrak 2', 'B', '25077'),
(68624, 'Vani', 9, '17', 'Kontrak 2', 'B', '21720'),
(68626, 'Tri Hidayat', 13, '17', 'Kontrak 2', 'B', '21531'),
(68627, 'Sigit Bowo Atmojo', 9, '17', 'Kontrak 2', 'B', '21720'),
(68628, 'Muhamad Nasrulloh', 12, '17', 'Kontrak 2', 'B', '24224'),
(68629, 'Sofi\'I Hidayat', 12, '17', 'Kontrak 2', 'B', '24224'),
(68632, 'Faishal Mustofa Zein', 8, '17', 'Kontrak 2', 'B', '25077'),
(68637, 'Hanif Febriansah', 24, '17', 'Kontrak 2', 'B', ''),
(68638, 'Gunawan Riswantoro', 8, '17', 'Kontrak 2', 'B', '25077'),
(68639, 'Rizal Maulana Ibrahim', 12, '17', 'Kontrak 2', 'B', '24224'),
(68640, 'Rizky Sulistiyono', 12, '17', 'Kontrak 2', 'B', '24224'),
(68641, 'Yogi Prasetio', 8, '17', 'Kontrak 2', 'B', '25077'),
(68642, 'Ikhsan Maulana Said', 6, '17', 'Kontrak 2', 'B', '15252'),
(68643, 'Muchamad Lukman Harun', 6, '17', 'Kontrak 2', 'B', '15252'),
(68645, 'Dafit Gunawan', 18, '17', 'Kontrak 2', 'A', '20823'),
(68667, 'Muh Dhulidan', 19, '17', 'Kontrak 2', 'B', '18809'),
(68668, 'Herman Susilo', 13, '17', 'Kontrak 2', 'B', '21531'),
(68967, 'Aldo Kusuma Yudo', 9, '17', 'Kontrak 2', 'A', '3116'),
(68970, 'Agus Wahyudhi', 10, '17', 'Kontrak 2', 'A', '7042'),
(68972, 'Akhmad Edy Sulistyanto', 13, '17', 'Kontrak 2', 'A', '14421'),
(68973, 'Andi Eko Purnomo', 12, '17', 'Kontrak 2', 'A', '24202'),
(68974, 'Asep Mulyana', 8, '17', 'Kontrak 2', 'A', '17275'),
(68975, 'Badawi Bagus Jumantoro', 9, '17', 'Kontrak 2', 'A', '3116'),
(68976, 'Bagus Dwi Saputro', 19, '17', 'Kontrak 2', 'A', '21548'),
(68977, 'Bayu Irawan', 18, '17', 'Kontrak 2', 'A', '20823'),
(68978, 'Danang Adzim Asyhari', 13, '17', 'Kontrak 2', 'A', '14421'),
(68979, 'Deny Eko Prasetyo', 9, '17', 'Kontrak 2', 'A', '3116'),
(68980, 'Didik Setiyawan', 8, '17', 'Kontrak 2', 'B', '25077'),
(68981, 'Didik Supriyadi', 8, '17', 'Kontrak 2', 'B', '25077'),
(68982, 'Fahmi Asshidiq', 18, '17', 'Kontrak 2', 'B', '24643'),
(68983, 'Fajar Firmansyah', 18, '17', 'Kontrak 2', 'B', '24643'),
(68984, 'Ferdiansyah Saputra', 8, '17', 'Kontrak 2', 'B', '25077'),
(68985, 'Feri Budi Santoso', 19, '17', 'Kontrak 2', 'B', '18809'),
(68986, 'Feri Setiawan', 8, '17', 'Kontrak 2', 'B', '25077'),
(68987, 'Imam Sugiarto', 8, '17', 'Kontrak 2', 'B', '25077'),
(68988, 'Indra Setiyawan', 18, '17', 'Kontrak 2', 'B', '24643'),
(68990, 'Khoirul Anwar', 8, '17', 'Kontrak 2', 'B', '25077'),
(69328, 'Ugi Izzati Biaabdilah', 8, '17', 'Kontrak 2', 'B', '25077'),
(69329, 'Yahya Muhaemin', 8, '17', 'Kontrak 2', 'B', '25077'),
(69331, 'Zaeni Tafrikhin', 9, '17', 'Kontrak 2', 'B', '21720'),
(69332, 'Zidan Muhroji', 9, '17', 'Kontrak 2', 'B', '21720'),
(69333, 'Alam Muzaki', 19, '17', 'Kontrak 2', 'B', '18809'),
(69334, 'Iqbal Fahrurozi', 19, '17', 'Kontrak 2', 'B', '18809'),
(69335, 'Muhammad Faisal Arief Wibowo', 13, '17', 'Kontrak 2', 'B', '21531'),
(69336, 'Fikri Aqil Maulana', 9, '17', 'Kontrak 2', 'B', '21720'),
(69338, 'Aammar Romadhon', 19, '17', 'Kontrak 2', 'B', '18809'),
(69339, 'Diffa Rama Wijaya', 10, '17', 'Kontrak 2', 'B', '21377'),
(69340, 'Tri Wahyu Widiartono', 9, '17', 'Kontrak 2', 'B', '21720'),
(69342, 'Asyik Amrulloh', 8, '17', 'Kontrak 2', 'B', '25077'),
(69343, 'Badru Ramadhan', 8, '17', 'Kontrak 2', 'B', '25077'),
(69345, 'Dafid Maulana Arizi', 8, '17', 'Kontrak 2', 'B', '25077'),
(69347, 'Dicky Orlandev', 9, '17', 'Kontrak 2', 'B', '21720'),
(69348, 'Ellan Ali Irfan', 9, '17', 'Kontrak 2', 'B', '21720'),
(69350, 'Faiz Arman Fathan', 8, '17', 'Kontrak 2', 'B', '25077'),
(69351, 'Fajar Handhika Mustika', 9, '17', 'Kontrak 2', 'B', '21720'),
(69354, 'Grinanda Yoga Aristian', 12, '17', 'Kontrak 2', 'A', '24202'),
(69355, 'Idham Abidin', 19, '17', 'Kontrak 2', 'A', '21548'),
(69356, 'Imam Suhada', 12, '17', 'Kontrak 2', 'A', '24202'),
(69358, 'Khoirul Huda', 8, '17', 'Kontrak 2', 'A', '17275'),
(69360, 'Luthfi Zacki Efendi', 9, '17', 'Kontrak 2', 'A', '3116'),
(69361, 'Luthfir Rachman', 9, '17', 'Kontrak 2', 'A', '3116'),
(69363, 'M.Faizul Khalim', 13, '17', 'Kontrak 2', 'A', '14421'),
(69364, 'Mochammad Miftah Sidik', 20, '17', 'Kontrak 2', 'A', '14817'),
(69365, 'Moh. Imam Yahya', 19, '17', 'Kontrak 2', 'A', '21548'),
(69366, 'Moh. Imanudin Pratomo', 8, '17', 'Kontrak 2', 'A', '17275'),
(69367, 'Moh. Wika Muzaiyanul Akmal', 8, '17', 'Kontrak 2', 'A', '17275'),
(69368, 'Mohamad Andika', 8, '17', 'Kontrak 2', 'A', '17275'),
(69371, 'Yogi Anggoro', 8, '17', 'Kontrak 2', 'A', '17275'),
(69372, 'Bagus Syaifudin Arif', 8, '17', 'Kontrak 2', 'A', '17275'),
(69373, 'Beysta Raka Defa', 8, '17', 'Kontrak 2', 'A', '17275'),
(69392, 'Gilang Putra Pratama', 18, '17', 'Kontrak 2', 'A', '20823'),
(69393, 'Gunawan', 8, '17', 'Kontrak 2', 'A', '17275'),
(69398, 'Septian Indra Kurniawan', 19, '17', 'Kontrak 2', 'B', '18809'),
(69789, 'Asif Hidayah Syarif', 6, '17', 'Kontrak 2', 'B', '15252'),
(69790, 'Dody Satria Pambudi', 18, '17', 'Kontrak 2', 'A', '20823'),
(69793, 'Rahmat Setiawan', 10, '17', 'Kontrak 2', 'A', '7042'),
(69794, 'Mokh Sofan Muhyidin', 6, '17', 'Kontrak 2', 'B', '15252'),
(69795, 'Maruly Ugy Prasetyo', 6, '17', 'Kontrak 2', 'A', '18785'),
(69796, 'Iksan Defitra', 6, '17', 'Kontrak 2', 'A', '18785'),
(69798, 'Akbar Ibnu Mubarak', 6, '17', 'Kontrak 2', 'B', '15252'),
(69799, 'Imam Faozi', 6, '17', 'Kontrak 2', 'B', '15252'),
(69803, 'Ilham Nur Khasidiq', 6, '17', 'Kontrak 2', 'A', '18785'),
(69820, 'Santo', 6, '17', 'Kontrak 2', 'A', '18785'),
(69821, 'Rahmat Nur Fauzi', 8, '17', 'Kontrak 2', 'B', '25077'),
(69822, 'Kuat Budi Priyatno', 10, '17', 'Kontrak 2', 'B', '21377'),
(69824, 'Arizal Imam Fauzi', 12, '17', 'Kontrak 2', 'B', '24224'),
(69825, 'Budiyono', 8, '17', 'Kontrak 2', 'B', '25077'),
(69827, 'Adrianus Saputra', 12, '17', 'Kontrak 2', 'B', '24224'),
(69828, 'Rendi Kurniawan', 18, '17', 'Kontrak 2', 'B', '24643'),
(69829, 'Wisnu Saputra', 10, '17', 'Kontrak 2', 'B', '21377'),
(69830, 'Muh Dani Darmawan', 8, '17', 'Kontrak 2', 'A', '17275'),
(69831, 'Vikri Ardhian', 19, '17', 'Kontrak 2', 'A', '21548'),
(69835, 'Erik Egi Prayogo', 6, '17', 'Kontrak 2', 'A', '18785'),
(69836, 'Muhamad Apriyanto', 12, '17', 'Kontrak 2', 'A', '24202'),
(69837, 'Muhamad Zafiq Ramdana', 9, '17', 'Kontrak 2', 'B', '21720'),
(69843, 'Mardian Setyo Bagus Pamungkas', 12, '17', 'Kontrak 2', 'A', '24202'),
(69844, 'Muhammad Etghardo Arfiansyah', 6, '17', 'Kontrak 2', 'A', '18785'),
(69845, 'Riski Barokah', 24, '17', 'Kontrak 2', 'A', ''),
(69847, 'Anjas Dastio Beddu', 18, '17', 'Kontrak 2', 'B', '24643'),
(69848, 'Ahmad Saefudin Al Fakih', 10, '17', 'Kontrak 2', 'B', '21377'),
(69849, 'Imam Buhori', 18, '17', 'Kontrak 2', 'B', '24643'),
(69850, 'Galih Winara', 24, '17', 'Kontrak 2', 'B', ''),
(69853, 'Idris Aryoga Putra', 6, '17', 'Kontrak 2', 'A', '18785'),
(69854, 'Muhammad Iqbal Aulia', 6, '17', 'Kontrak 2', 'A', '18785'),
(69855, 'Mohamad Nurtado', 6, '17', 'Kontrak 2', 'A', '18785'),
(69856, 'Mohamad Sobirin', 6, '17', 'Kontrak 2', 'B', '15252'),
(69857, 'Wisnu Yuliansah', 8, '17', 'Kontrak 2', 'B', '25077'),
(69858, 'Henry Fajar Pamungkas', 6, '17', 'Kontrak 2', 'B', '15252'),
(69859, 'Ari Lukmawan', 6, '17', 'Kontrak 2', 'A', '18785'),
(69860, 'Dimas Ade Aji Saputro', 6, '17', 'Kontrak 2', 'A', '18785'),
(69861, 'Tri Prasetyo', 6, '17', 'Kontrak 2', 'A', '18785'),
(69862, 'Rizki Ardiansyah', 6, '17', 'Kontrak 2', 'B', '15252'),
(69863, 'Samngani Kamal', 6, '17', 'Kontrak 2', 'B', '15252'),
(69864, 'Fendi Marhana', 8, '17', 'Kontrak 2', 'B', '25077'),
(69866, 'Syahid Al Fatah', 13, '17', 'Kontrak 2', 'A', '14421'),
(69867, 'Rizki Ferdiyanto', 10, '17', 'Kontrak 2', 'B', '21377'),
(69868, 'Riski Syihab Habiballah', 13, '17', 'Kontrak 2', 'B', '21531'),
(69869, 'Sukma Hernata', 6, '17', 'Kontrak 2', 'A', '18785'),
(69870, 'Anan Rohmad Anshori', 6, '17', 'Kontrak 2', 'A', '18785'),
(69872, 'Adam Subarkah', 12, '17', 'Kontrak 2', 'A', '24202'),
(69873, 'Riski Bayu Ramadan', 19, '17', 'Kontrak 2', 'B', '18809'),
(69875, 'Iskak Suro Wardoyo', 18, '17', 'Kontrak 2', 'B', '24643'),
(69876, 'Ruly Ady Prasetya', 12, '17', 'Kontrak 2', 'B', '24224'),
(70446, 'Lutfi Ikhsani', 13, '17', 'Kontrak 2', 'B', '21531'),
(70447, 'M Fajar Tri Saputro', 13, '17', 'Kontrak 2', 'B', '21531'),
(70627, 'M Ilham Sidik', 18, '17', 'Kontrak 2', 'B', '24643'),
(70629, 'Mahmud Mutohir', 10, '17', 'Kontrak 2', 'B', '21377'),
(70630, 'Makhruf', 13, '17', 'Kontrak 2', 'B', '21531'),
(70631, 'Masagung Waluyo', 19, '17', 'Kontrak 2', 'B', '18809'),
(70632, 'Maulana Ramadan', 12, '17', 'Kontrak 2', 'B', '24224'),
(70633, 'Maulana Rizqi Ashidqi', 20, '17', 'Kontrak 2', 'B', '16726'),
(70635, 'Misbakhul Munir', 10, '17', 'Kontrak 2', 'B', '21377'),
(70636, 'Moh Huda', 19, '17', 'Kontrak 2', 'B', '18809'),
(70637, 'Moh Nofen Andrian', 20, '17', 'Kontrak 2', 'B', '16726'),
(70638, 'Moh Sagi Musyarof', 13, '17', 'Kontrak 2', 'B', '21531'),
(70639, 'Muh Fajar Sidik', 24, '17', 'Kontrak 2', 'B', ''),
(70640, 'Muhamad Akbar Ramadhan', 10, '17', 'Kontrak 2', 'B', '21377'),
(70641, 'Muhamad Daffa', 20, '17', 'Kontrak 2', 'B', '16726'),
(70642, 'Muhammad Khudori', 8, '17', 'Kontrak 2', 'B', '25077'),
(70643, 'Nafi Susanto', 8, '17', 'Kontrak 2', 'B', '25077'),
(70647, 'Nur Rozak', 19, '17', 'Kontrak 2', 'A', '21548'),
(70648, 'Nurul Anwar', 8, '17', 'Kontrak 2', 'A', '17275'),
(70649, 'Oki Ismuaji', 8, '17', 'Kontrak 2', 'A', '17275'),
(70650, 'Oki Purwanto', 6, '17', 'Kontrak 2', 'A', '18785'),
(70651, 'Panggih Pangestu', 9, '17', 'Kontrak 2', 'A', '3116'),
(70652, 'Puguh Wijiyanto', 9, '17', 'Kontrak 2', 'A', '3116'),
(70653, 'Puji Wahyuadi', 9, '17', 'Kontrak 2', 'A', '3116'),
(70654, 'Rahmat Nurhidayat', 19, '17', 'Kontrak 2', 'A', '21548'),
(70655, 'Randi Candra Laksana', 19, '17', 'Kontrak 2', 'A', '21548'),
(70656, 'Remo Adit Kurniawan', 13, '17', 'Kontrak 2', 'A', '14421'),
(70660, 'Rizal Maulana', 13, '17', 'Kontrak 2', 'A', '14421'),
(70661, 'Rizki Pratama', 12, '17', 'Kontrak 2', 'A', '24202'),
(70663, 'Robi Burhanudin', 8, '17', 'Kontrak 2', 'B', '25077'),
(70912, 'Ahmad Syaifudin', 8, '17', 'Kontrak 2', 'A', '17275'),
(70913, 'Akhmad Mujahidin', 10, '17', 'Kontrak 2', 'B', '21377'),
(70914, 'Alek Dwi Saputra', 10, '17', 'Kontrak 2', 'B', '21377'),
(70915, 'Assif Hasan Thoha', 18, '17', 'Kontrak 2', 'B', '24643'),
(70916, 'Bagas Reza Ramadhan', 12, '17', 'Kontrak 2', 'B', '24224'),
(70917, 'Deni Setiawan', 8, '17', 'Kontrak 2', 'A', '17275'),
(70918, 'Diva Yoga Pratama', 6, '17', 'Kontrak 2', 'A', '18785'),
(70919, 'Eko Fajar Keswanto', 12, '17', 'Kontrak 2', 'B', '24224'),
(70921, 'Hafid Rizki Annafi', 12, '17', 'Kontrak 2', 'B', '24224'),
(70922, 'Helmi Fajar Burhani', 8, '17', 'Kontrak 2', 'B', '25077'),
(70925, 'Heru Setiawan', 6, '17', 'Kontrak 2', 'B', '15252'),
(70926, 'Jagad Satriya', 6, '17', 'Kontrak 2', 'A', '18785'),
(70927, 'Kabib Umar Khamdan', 8, '17', 'Kontrak 2', 'A', '17275'),
(70928, 'Lochia Nandika Vero Mountoya', 8, '17', 'Kontrak 2', 'A', '17275'),
(70929, 'Luckymuna Nurseto', 6, '17', 'Kontrak 2', 'A', '18785'),
(71603, 'Abdul R', 8, '17', 'Kontrak 1', 'A', '17275'),
(71738, 'Hery Bagus Aryanto', 20, '17', 'Kontrak 1', 'A', '14817'),
(71739, 'Armario Ramadhani Putra', 12, '17', 'Kontrak 1', 'A', '24202'),
(71740, 'Ardi Laksana Putra', 6, '17', 'Kontrak 1', 'B', '15252'),
(71741, 'Ahmad Tirta Wijaya', 9, '17', 'Kontrak 1', 'B', '21720'),
(71764, 'Deni darmawan', 6, '17', 'Kontrak 1', 'A', '18785'),
(71880, 'Kefa Falassukma', 10, '17', 'Kontrak 1', 'A', '7042'),
(71881, 'Zulfa Rizqi Mubarok', 12, '17', 'Kontrak 1', 'A', '24202'),
(71882, 'Della Permadani', 18, '17', 'Kontrak 1', 'A', '20823'),
(71883, 'Ghufron Auladi', 19, '17', 'Kontrak 1', 'A', '21548'),
(71884, 'Erlangga Apriliansyah', 19, '17', 'Kontrak 1', 'A', '21548'),
(72026, 'Adi Wibowo', 9, '17', 'Kontrak 1', 'B', '21720'),
(72027, 'Aditia Jatinova', 9, '17', 'Kontrak 1', 'B', '21720'),
(72028, 'Ardi Rifaldi', 9, '17', 'Kontrak 1', 'B', '21720'),
(72029, 'Asrin Rifai Matondang', 10, '17', 'Kontrak 1', 'A', '7042'),
(72030, 'Bachtiar Sanjaya', 6, '17', 'Kontrak 1', 'B', '15252'),
(72031, 'Burhan Aziz', 18, '17', 'Kontrak 1', 'A', '20823'),
(72032, 'Dava Aulia S', 9, '17', 'Kontrak 1', 'A', '3116'),
(72218, 'A.Muzaki', 10, '17', 'Kontrak 1', 'B', '21377'),
(72219, 'Ade Ismahendra', 13, '17', 'Kontrak 1', 'B', '21531'),
(72220, 'Adis Ferdiyansyah', 12, '17', 'Kontrak 1', 'B', '24224'),
(72222, 'Ahmad Irfangi', 12, '17', 'Kontrak 1', 'B', '24224'),
(72224, 'Akhmad Hadi Suroso', 8, '17', 'Kontrak 1', 'B', '25077'),
(72592, 'Arief Rahmad Dwi.S', 10, '17', 'Kontrak 1', 'A', '7042'),
(72593, 'Arifin', 19, '17', 'Kontrak 1', 'B', '18809'),
(72594, 'Arjun Putra Leksmana', 19, '17', 'Kontrak 1', 'A', '21548'),
(72595, 'Bagas diantoro', 9, '17', 'Kontrak 1', 'A', '3116'),
(72596, 'Bayu kurniawan', 9, '17', 'Kontrak 1', 'A', '3116'),
(72597, 'Bima Putra Ardiansyah', 12, '17', 'Kontrak 1', 'A', '24202'),
(72598, 'Budi Dwi Prasetyo', 8, '17', 'Kontrak 1', 'B', '25077'),
(72599, 'Dannil Pijar Ardissa', 18, '17', 'Kontrak 1', 'B', '24643'),
(72600, 'Daryono', 9, '17', 'Kontrak 1', 'B', '21720'),
(72601, 'Dhani Anggara', 10, '17', 'Kontrak 1', 'B', '21377'),
(72602, 'Dicky Guntur Candra Pratama', 18, '17', 'Kontrak 1', 'B', '24643'),
(73129, 'Tesar Fredian Santoso', 10, '17', 'Kontrak 1', 'A', '7042'),
(73130, 'Catur Aji Pamungkas', 19, '17', 'Kontrak 1', 'A', '21548'),
(73131, 'Christian gery mahendra', 9, '17', 'Kontrak 1', 'A', '3116'),
(73132, 'Danu Prasetyo', 13, '17', 'Kontrak 1', 'A', '14421'),
(73133, 'Davit Sanjaya', 10, '17', 'Kontrak 1', 'A', '7042'),
(73134, 'Dika Setiawan', 19, '17', 'Kontrak 1', 'A', '21548'),
(73135, 'Diky Januarto Nugroho', 12, '17', 'Kontrak 1', 'A', '24202'),
(73136, 'Djalu Subekti', 9, '17', 'Kontrak 1', 'B', '21720'),
(73137, 'Dody Kurniawan', 8, '17', 'Kontrak 1', 'B', '25077'),
(73138, 'Dwi Hendri Prabowo', 13, '17', 'Kontrak 1', 'B', '21531'),
(73139, 'Faiz Nur Mustofa', 8, '17', 'Kontrak 1', 'B', '25077'),
(73140, 'Farid Ardi Nugroho', 10, '17', 'Kontrak 1', 'B', '21377'),
(73141, 'Farizki Iqbal Arifin', 6, '17', 'Kontrak 1', 'A', '18785'),
(73142, 'Fikri Alfendi', 6, '17', 'Kontrak 1', 'A', '18785'),
(73143, 'Ghana Arya Mahendra', 8, '17', 'Kontrak 1', 'A', '17275'),
(73144, 'Habib Ridwan Fajar.R', 10, '17', 'Kontrak 1', 'A', '7042'),
(73145, 'Heri Septyawan', 18, '17', 'Kontrak 1', 'A', '20823'),
(73146, 'Ifan Novito Setyawan', 18, '17', 'Kontrak 1', 'A', '20823'),
(73147, 'Iggo Mugi Nugroho', 18, '17', 'Kontrak 1', 'A', '20823'),
(73148, 'Ikhas Nino Prasana', 6, '17', 'Kontrak 1', 'B', '15252'),
(73149, 'Imam Choirul Fahrudin', 6, '17', 'Kontrak 1', 'B', '15252'),
(73150, 'Indra Prambudi', 6, '17', 'Kontrak 1', 'B', '15252'),
(73151, 'Joko Susilo', 9, '17', 'Kontrak 1', 'B', '21720'),
(73152, 'Khafid Aliyin Ainulloh', 9, '17', 'Kontrak 1', 'B', '21720'),
(73153, 'Langgeng Wahyu Ari Wibowo', 8, '17', 'Kontrak 1', 'B', '25077'),
(73154, 'Lucky Franto Sera', 6, '17', 'Kontrak 1', 'B', '15252'),
(73155, 'Lutfi Ibnu Marlianto', 8, '17', 'Kontrak 1', 'A', '17275'),
(73156, 'Mahiswan', 8, '17', 'Kontrak 1', 'A', '17275'),
(73157, 'Muhamad nur kholis majid', 9, '17', 'Kontrak 1', 'A', '3116'),
(73158, 'Muhammad adam fajar syah putra', 8, '17', 'Kontrak 1', 'A', '17275'),
(73159, 'Muhammad ali imron', 9, '17', 'Kontrak 1', 'A', '3116'),
(73160, 'Muhammad Syaifullah', 18, '17', 'Kontrak 1', 'A', '20823'),
(73161, 'Muhammad Yasin', 8, '17', 'Kontrak 1', 'A', '17275'),
(73162, 'Muhammad Yusril Amrullah', 8, '17', 'Kontrak 1', 'A', '17275'),
(73163, 'Muklis Adi Nur Wijaya', 20, '17', 'Kontrak 1', 'A', '14817'),
(73164, 'Murthada Fadhlu Rahman', 18, '17', 'Kontrak 1', 'A', '20823'),
(73165, 'Mustofa', 18, '17', 'Kontrak 1', 'A', '20823'),
(73166, 'Naufal Azhriel Mahesa', 12, '17', 'Kontrak 1', 'A', '24202'),
(73167, 'Nopi Saputra', 18, '17', 'Kontrak 1', 'A', '20823'),
(73168, 'Nur Muhammad Nazhirudin .A', 10, '17', 'Kontrak 1', 'A', '7042'),
(73169, 'Pajar Bayu S', 12, '17', 'Kontrak 1', 'A', '24202'),
(73170, 'Pintoko Raharjo', 19, '17', 'Kontrak 1', 'A', '21548'),
(73171, 'Pujiyanto', 6, '17', 'Kontrak 1', 'B', '15252'),
(73172, 'Rahmad Gilang Ramadhan', 12, '17', 'Kontrak 1', 'B', '24224'),
(73173, 'Ramdani Hanif Latif', 19, '17', 'Kontrak 1', 'B', '18809'),
(73174, 'Rangga Ardiyansah', 8, '17', 'Kontrak 1', 'B', '25077'),
(73280, 'Muhammad Rizky Saputra', 13, '17', 'Kontrak 1', 'B', '21531'),
(73281, 'Fuat Baihaki', 8, '17', 'Kontrak 1', 'B', '25077'),
(73282, 'Angga Fitrio', 6, '17', 'Kontrak 1', 'B', '15252'),
(73283, 'Faiz Himmatus Sholih', 19, '17', 'Kontrak 1', 'B', '18809'),
(73284, 'Iqbal Abdul Hakam', 13, '17', 'Kontrak 1', 'B', '21531'),
(73285, 'Deni Supriato', 19, '17', 'Kontrak 1', 'B', '18809'),
(73286, 'Andi Saputro', 20, '17', 'Kontrak 1', 'B', '16726'),
(73287, 'Ali Masykur', 9, '17', 'Kontrak 1', 'A', '3116'),
(73288, 'Fahrul Rafi Zain', 13, '17', 'Kontrak 1', 'A', '14421'),
(73289, 'Eko Riyanto', 8, '17', 'Kontrak 1', 'A', '17275'),
(73290, 'Huda Saefur Rizal', 8, '17', 'Kontrak 1', 'A', '17275'),
(73291, 'Saddam Wicaksono', 8, '17', 'Kontrak 1', 'A', '17275'),
(73292, 'Diky Surya Saputra', 10, '17', 'Kontrak 1', 'A', '7042'),
(73293, 'Asta Arya Ramadan', 10, '17', 'Kontrak 1', 'A', '7042'),
(73294, 'Aldi Saputro', 13, '17', 'Kontrak 1', 'A', '14421'),
(73295, 'Irvan Febriansyah', 12, '17', 'Kontrak 1', 'A', '24202'),
(73296, 'Mohamad Latif', 13, '17', 'Kontrak 1', 'A', '14421'),
(73655, 'Agung Kusyairi', 18, '17', 'Kontrak 1', 'B', '24643'),
(73656, 'Ajis Fakhroji', 9, '17', 'Kontrak 1', 'B', '21720'),
(73657, 'Amin Romadhon', 10, '17', 'Kontrak 1', 'B', '21377'),
(73658, 'Bili Riyanto', 10, '17', 'Kontrak 1', 'B', '21377'),
(73659, 'Nandi', 12, '17', 'Kontrak 1', 'B', '24224'),
(73660, 'Firmansyah', 12, '17', 'Kontrak 1', 'B', '24224'),
(73661, 'Kadoni', 12, '17', 'Kontrak 1', 'B', '24224'),
(73662, 'Naufal Bahtiar Rahmani', 9, '17', 'Kontrak 1', 'B', '21720'),
(73663, 'M. Ali Aldiansah', 9, '17', 'Kontrak 1', 'B', '21720'),
(73664, 'Moch. Fauzi Firmansyah', 12, '17', 'Kontrak 1', 'B', '24224'),
(73665, 'Rangga Figo Arfiandanu', 8, '17', 'Kontrak 1', 'B', '25077'),
(73666, 'Mohamad Aziz', 6, '17', 'Kontrak 1', 'B', '15252'),
(73667, 'Mohamad Fery Fajar Ramadhani', 8, '17', 'Kontrak 1', 'B', '25077'),
(73668, 'Mohamad Soleh', 6, '17', 'Kontrak 1', 'B', '15252'),
(73669, 'Muamar', 8, '17', 'Kontrak 1', 'B', '25077'),
(73670, 'Rangga Perezt', 9, '17', 'Kontrak 1', 'B', '21720'),
(73671, 'Muhammad Amu Khuzni Mubarok', 9, '17', 'Kontrak 1', 'B', '21720'),
(73672, 'Muhammad Arif', 13, '17', 'Kontrak 1', 'B', '21531'),
(73673, 'Muhammad Jaenal Muttaqim', 19, '17', 'Kontrak 1', 'B', '18809'),
(73674, 'Muhammad Rafli Septiadi', 19, '17', 'Kontrak 1', 'B', '18809'),
(73675, 'Muhammad Wahyu Adhari', 19, '17', 'Kontrak 1', 'B', '18809'),
(73676, 'Muhammad Zaenal Abduh', 9, '17', 'Kontrak 1', 'A', '3116'),
(73678, 'Nada Sumarna', 18, '17', 'Kontrak 1', 'B', '24643'),
(73679, 'Nana Sutrisna', 8, '17', 'Kontrak 1', 'B', '25077'),
(73680, 'Nandi Ramdani', 9, '17', 'Kontrak 1', 'B', '21720'),
(73681, 'Nurohman', 6, '17', 'Kontrak 1', 'B', '15252'),
(73682, 'Priyatno', 6, '17', 'Kontrak 1', 'B', '15252'),
(73683, 'Putra Mulya Pratama', 8, '17', 'Kontrak 1', 'A', '17275'),
(73684, 'Putra Ramadhan', 8, '17', 'Kontrak 1', 'A', '17275'),
(73685, 'Rafli Ari Ruhyadi', 19, '17', 'Kontrak 1', 'A', '21548'),
(73686, 'Rahaji', 18, '17', 'Kontrak 1', 'A', '20823'),
(73687, 'Rahbani Alimiyasa', 19, '17', 'Kontrak 1', 'A', '21548'),
(73688, 'Raihan Afif', 10, '17', 'Kontrak 1', 'A', '7042'),
(73689, 'Rakman Aris', 10, '17', 'Kontrak 1', 'A', '7042'),
(73690, 'Regi', 18, '17', 'Kontrak 1', 'A', '20823'),
(73691, 'Riski Maulana Subagja', 18, '17', 'Kontrak 1', 'A', '20823'),
(73692, 'Renal Hidayatulloh', 12, '17', 'Kontrak 1', 'A', '24202'),
(73693, 'Reza Saputra', 13, '17', 'Kontrak 1', 'A', '14421'),
(73694, 'Rhama Nur Fadhilah', 6, '17', 'Kontrak 1', 'B', '15252'),
(73695, 'Ridwan Soleh', 19, '17', 'Kontrak 1', 'A', '21548'),
(73696, 'Riko Augia Pratama', 9, '17', 'Kontrak 1', 'B', '21720'),
(73697, 'Rinaldi Eza H', 8, '17', 'Kontrak 1', 'A', '17275'),
(73698, 'Rizal Nur Rizki', 10, '17', 'Kontrak 1', 'A', '7042'),
(73699, 'Robbani', 9, '17', 'Kontrak 1', 'A', '3116'),
(73700, 'Royan Firdaus', 19, '17', 'Kontrak 1', 'A', '21548'),
(73701, 'Sayid Abdullah', 13, '17', 'Kontrak 1', 'A', '14421'),
(73702, 'Riski Riswanto', 18, '17', 'Kontrak 1', 'A', '20823'),
(73703, 'Tohri Rinaldi', 10, '17', 'Kontrak 1', 'A', '7042'),
(73704, 'Wartoni', 12, '17', 'Kontrak 1', 'A', '24202'),
(73705, 'Wintono', 13, '17', 'Kontrak 1', 'A', '14421'),
(73706, 'Wisnu Bin Karsa', 19, '17', 'Kontrak 1', 'A', '21548'),
(73707, 'Wisnu Mauludin', 19, '17', 'Kontrak 1', 'A', '21548'),
(73708, 'Wisnu saputra', 6, '17', 'Kontrak 1', 'A', '18785'),
(73709, 'Wisnu Saputra', 12, '17', 'Kontrak 1', 'B', '24224'),
(73710, 'Yopi kamaludin', 6, '17', 'Kontrak 1', 'A', '18785'),
(73711, 'Suratno', 6, '17', 'Kontrak 1', 'A', '18785'),
(73712, 'Tanto Wijaya', 6, '17', 'Kontrak 1', 'A', '18785'),
(73713, 'Tarwadi', 6, '17', 'Kontrak 1', 'A', '18785'),
(73714, 'Tedi', 6, '17', 'Kontrak 1', 'A', '18785'),
(73715, 'Tedi Apriyandi', 9, '17', 'Kontrak 1', 'A', '3116'),
(73716, 'Tedi Sanjaya', 6, '17', 'Kontrak 1', 'A', '18785'),
(73717, 'Tedy syahputra', 6, '17', 'Kontrak 1', 'A', '18785'),
(73718, 'Muhamad Raihan Nugroho', 8, '17', 'Kontrak 1', 'B', '25077'),
(73862, 'Ade Ardiyanto', 9, '17', 'Kontrak 1', 'A', '3116'),
(73863, 'Agus Hidayat', 6, '17', 'Kontrak 1', 'A', '18785'),
(73864, 'Ahmad Hidayat Al Faza', 13, '17', 'Kontrak 1', 'A', '14421'),
(73865, 'Akhmad Tasdik', 19, '17', 'Kontrak 1', 'A', '21548'),
(73866, 'Akhmad Uli Sifa', 19, '17', 'Kontrak 1', 'A', '21548'),
(73867, 'Muhsin Ali Nurrohman', 18, '17', 'Kontrak 1', 'B', '24643'),
(73868, 'Andika Tri Wibowo', 18, '17', 'Kontrak 1', 'B', '24643'),
(73869, 'Nurul Rokhmanto', 10, '17', 'Kontrak 1', 'B', '21377'),
(73870, 'Dimas Agung S', 6, '17', 'Kontrak 1', 'A', '18785'),
(73871, 'Dimas Anam AL.', 12, '17', 'Kontrak 1', 'A', '24202'),
(73872, 'Dzikron Abdillah', 13, '17', 'Kontrak 1', 'A', '14421'),
(73873, 'Eriko Dwi Handoko', 8, '17', 'Kontrak 1', 'A', '17275'),
(73874, 'Galih Gennavan', 9, '17', 'Kontrak 1', 'A', '3116'),
(73875, 'Hendrik Juntriono', 12, '17', 'Kontrak 1', 'A', '24202'),
(73876, 'M. Aviv Rubiansyah', 18, '17', 'Kontrak 1', 'A', '20823'),
(73877, 'Mukhdiyanto', 10, '17', 'Kontrak 1', 'A', '7042'),
(73878, 'Rahmat Faizi', 8, '17', 'Kontrak 1', 'A', '17275'),
(73879, 'Juni Afidin', 8, '17', 'Kontrak 1', 'A', '17275'),
(73880, 'Angga Dimas Adhytia', 8, '17', 'Kontrak 1', 'A', '17275'),
(73881, 'Firgilang Setyo W', 6, '17', 'Kontrak 1', 'A', '18785'),
(73882, 'Sigit Hermanto', 18, '17', 'Kontrak 1', 'B', '24643'),
(73883, 'Rizki Eko Budianto', 8, '17', 'Kontrak 1', 'B', '25077'),
(73884, 'Widi Ardianza', 9, '17', 'Kontrak 1', 'B', '21720'),
(73885, 'Mashrifan', 9, '17', 'Kontrak 1', 'B', '21720'),
(73886, 'Raka Alfirianto', 8, '17', 'Kontrak 1', 'B', '25077'),
(73887, 'Aldy Choirul Ivany', 8, '17', 'Kontrak 1', 'B', '25077'),
(73888, 'Muhamad Andi Rohmansyah', 12, '17', 'Kontrak 1', 'B', '24224'),
(73889, 'Akhmad Khaerudin', 10, '17', 'Kontrak 1', 'B', '21377'),
(73890, 'Luky Firmansyah', 10, '17', 'Kontrak 1', 'B', '21377'),
(73891, 'Reza Pranugi', 12, '17', 'Kontrak 1', 'B', '24224'),
(73963, 'Mohamad Hisam Abduh', 19, '17', 'Kontrak 1', 'A', '21548'),
(73964, 'Imam Saefudin', 8, '17', 'Kontrak 1', 'A', '17275'),
(73965, 'Khoerul Umam', 8, '17', 'Kontrak 1', 'A', '17275'),
(73966, 'Wahyu Setyo Romadhon', 10, '17', 'Kontrak 1', 'A', '7042'),
(73967, 'Dimas Priyanto', 18, '17', 'Kontrak 1', 'A', '20823'),
(73968, 'Nurkholis Miftah Tsani', 9, '17', 'Kontrak 1', 'A', '3116'),
(73969, 'Resa Feryansyah', 9, '17', 'Kontrak 1', 'B', '21720'),
(73970, 'Muhammad Ibnu Syani', 8, '17', 'Kontrak 1', 'B', '25077'),
(73971, 'Toni Putranto', 8, '17', 'Kontrak 1', 'B', '25077'),
(73972, 'Andri Setiawan', 18, '17', 'Kontrak 1', 'B', '24643'),
(73973, 'Teguh Riyanto', 10, '17', 'Kontrak 1', 'B', '21377');
INSERT INTO `mp` (`mp_id`, `mp_nama`, `mp_jalur`, `mp_pos`, `mp_status`, `mp_shift`, `mp_atasan`) VALUES
(73974, 'Agri Setyowono', 9, '17', 'Kontrak 1', 'B', '21720'),
(73975, 'Yusuf Bagaskara', 9, '17', 'Kontrak 1', 'B', '21720'),
(74102, 'Zulfa Anggara', 18, '17', 'Kontrak 1', 'B', '24643'),
(74103, 'Nugrah Galuh Permadi', 12, '17', 'Kontrak 1', 'B', '24224'),
(74104, 'Wiwit Septianto', 12, '17', 'Kontrak 1', 'B', '24224'),
(74106, 'Adam Suryo Prayogo', 12, '17', 'Kontrak 1', 'B', '24224'),
(74107, 'Aditiya Bagaskara', 10, '17', 'Kontrak 1', 'B', '21377'),
(74108, 'Adrik Hidayat', 18, '17', 'Kontrak 1', 'B', '24643'),
(74109, 'Adun Yusuf', 18, '17', 'Kontrak 1', 'B', '24643'),
(74110, 'Agus Kurniawan', 18, '17', 'Kontrak 1', 'B', '24643'),
(74111, 'Aldy Pratama', 10, '17', 'Kontrak 1', 'B', '21377'),
(74112, 'Aris Hardiyanto', 10, '17', 'Kontrak 1', 'B', '21377'),
(74113, 'Bagus Pratama Saputra', 10, '17', 'Kontrak 1', 'B', '21377'),
(74114, 'Deby Hans Octaviana', 10, '17', 'Kontrak 1', 'B', '21377'),
(74115, 'Dika Candra Yugista', 10, '17', 'Kontrak 1', 'B', '21377'),
(74116, 'Dika Prastyo', 13, '17', 'Kontrak 1', 'B', '21531'),
(74117, 'Faiz Ilham Nur Rohman', 8, '17', 'Kontrak 1', 'B', '25077'),
(74118, 'Fajar Putra Utama', 9, '17', 'Kontrak 1', 'B', '21720'),
(74119, 'Heri', 9, '17', 'Kontrak 1', 'B', '21720'),
(74120, 'Jodi Pratama', 9, '17', 'Kontrak 1', 'B', '21720'),
(74121, 'Kukuh Jaya Admaja', 9, '17', 'Kontrak 1', 'B', '21720'),
(74122, 'Kurniya Apriliyawansyah', 8, '17', 'Kontrak 1', 'B', '25077'),
(74123, 'Leo Irawan', 8, '17', 'Kontrak 1', 'B', '25077'),
(74124, 'M Adi Saputra', 8, '17', 'Kontrak 1', 'B', '25077'),
(74125, 'M Ari Ramadan', 8, '17', 'Kontrak 1', 'B', '25077'),
(74126, 'M. Aulia Rohman', 6, '17', 'Kontrak 1', 'B', '15252'),
(74127, 'M.Areja Pahlepi', 20, '17', 'Kontrak 1', 'B', '16726'),
(74128, 'Patur Rohman', 8, '17', 'Kontrak 1', 'A', '17275'),
(74129, 'Sholeh Dwi Saputra', 12, '17', 'Kontrak 1', 'A', '24202'),
(74130, 'Suandi', 12, '17', 'Kontrak 1', 'A', '24202'),
(74131, 'Tri Irawan', 12, '17', 'Kontrak 1', 'A', '24202'),
(74132, 'Agustomi', 6, '17', 'Kontrak 1', 'A', '18785'),
(74133, 'Bayu', 10, '17', 'Kontrak 1', 'A', '7042'),
(74134, 'Devra Arviantara', 10, '17', 'Kontrak 1', 'A', '7042'),
(74135, 'Yogi Firmansyah', 10, '17', 'Kontrak 1', 'A', '7042'),
(74136, 'Eko Dwiyanto', 10, '17', 'Kontrak 1', 'A', '7042'),
(74137, 'Gito Sanjaya', 18, '17', 'Kontrak 1', 'A', '20823'),
(74138, 'Kms M Farhan Afriansyah', 18, '17', 'Kontrak 1', 'A', '20823'),
(74139, 'M Dic Satria Bintang Maulana', 18, '17', 'Kontrak 1', 'A', '20823'),
(74140, 'M. Ridho Syawalsyah Putra', 10, '17', 'Kontrak 1', 'A', '7042'),
(74141, 'Muhammad Fajri Rizky Wijaya', 18, '17', 'Kontrak 1', 'A', '20823'),
(74142, 'Muhammad Yani', 13, '17', 'Kontrak 1', 'A', '14421'),
(74143, 'Muhammad Yusuf Syafei', 9, '17', 'Kontrak 1', 'A', '3116'),
(74144, 'Patigon', 9, '17', 'Kontrak 1', 'A', '3116'),
(74145, 'Prabowo Sugianto', 9, '17', 'Kontrak 1', 'A', '3116'),
(74146, 'Raden Muhammad Idris', 9, '17', 'Kontrak 1', 'A', '3116'),
(74147, 'Randyka Afrila Saputra', 9, '17', 'Kontrak 1', 'A', '3116'),
(74148, 'Rendi Syaputra', 20, '17', 'Kontrak 1', 'A', '14817'),
(74149, 'Rio Tomi', 9, '17', 'Kontrak 1', 'A', '3116'),
(74150, 'Rizki Syahputra', 20, '17', 'Kontrak 1', 'A', '14817'),
(74151, 'Robin Saputra', 8, '17', 'Kontrak 1', 'A', '17275'),
(74152, 'Rohim', 8, '17', 'Kontrak 1', 'A', '17275'),
(74153, 'Ryansya Putra', 8, '17', 'Kontrak 1', 'A', '17275'),
(74154, 'Wahid', 20, '17', 'Kontrak 1', 'A', '14817'),
(74189, 'Dulhadi', 18, '17', 'Kontrak 1', 'B', '24643');

-- --------------------------------------------------------

--
-- Table structure for table `pengaturan`
--

CREATE TABLE `pengaturan` (
  `nama` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `logo` varchar(255) NOT NULL,
  `link_facebook` varchar(255) NOT NULL,
  `link_twitter` varchar(255) NOT NULL,
  `link_instagram` varchar(255) NOT NULL,
  `link_github` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pengaturan`
--

INSERT INTO `pengaturan` (`nama`, `deskripsi`, `logo`, `link_facebook`, `link_twitter`, `link_instagram`, `link_github`) VALUES
('BMS', 'BoDygital Master Spot', 'logoku.png', '-', '-', '-', '-');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `pengguna_id` int(11) NOT NULL,
  `pengguna_nama` varchar(50) NOT NULL,
  `pengguna_npk` varchar(11) NOT NULL,
  `pengguna_shift` varchar(255) NOT NULL,
  `pengguna_jalur` int(11) NOT NULL,
  `pengguna_pos` varchar(50) NOT NULL,
  `pengguna_email` varchar(255) NOT NULL,
  `pengguna_wa` varchar(255) NOT NULL,
  `pengguna_username` varchar(50) NOT NULL,
  `pengguna_password` varchar(255) NOT NULL,
  `pengguna_level` enum('admin','penulis','spv','BQC WQC','Project','Foreman','Quality Body','Produksi') NOT NULL,
  `pengguna_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`pengguna_id`, `pengguna_nama`, `pengguna_npk`, `pengguna_shift`, `pengguna_jalur`, `pengguna_pos`, `pengguna_email`, `pengguna_wa`, `pengguna_username`, `pengguna_password`, `pengguna_level`, `pengguna_status`) VALUES
(1, 'suryo bintang', '45377', 'A', 6, '', 'bodygital@gmail.com', '085885343894', 'admin', 'admin45377', 'admin', 1),
(4, 'suryo', '', '1', 0, '', 'bodygital@gmail.com', '', 'penulis', '13097b136a471b277cae1a429b7fd568', 'penulis', 1),
(6, 'Adi Rahmanto Wijaya', '18785', '1', 6, '', 'Tholebjg18785@gmail.com', '6.28E+12', 'Adi', '31e465dce170670b68fd1188f3bc44b7', 'Produksi', 1),
(7, 'Sigit Prayitno', '30503', '1', 17, '', 'pray1225@gmail.com', '6.29E+12', 'Sigit', '31e465dce170670b68fd1188f3bc44b7', 'BQC WQC', 1),
(8, 'Deny Setiawan', '28948', '1', 17, '', 'setiawan.deny8888@gmail.com', '6.29E+12', 'Deny', '31e465dce170670b68fd1188f3bc44b7', 'Quality Body', 1),
(9, 'Yusep Ridwan', '24221', 'B', 9, '', 'rullznoe@gmail.com', '6.28E+12', 'Yusep', '541deb2fe959b93e108c020193d49425', 'Foreman', 1),
(10, 'Agung  davit', '44430', '1', 17, '', 'agung.david19@gmail.com', '6.29E+12', 'Agung', '6ade4163a398335a0a2abced430cf869', 'spv', 1),
(11, 'Eji Hamali', '41439', '1', 17, '', 'enzy.tansyu.et@gmail.com', '6.28E+12', 'Eji', '31e465dce170670b68fd1188f3bc44b7', '', 1),
(12, 'Suryo Bintang', '45377', '1', 17, '', 'bodygital@gmail.com', '8.59E+10', 'Suryo', '31e465dce170670b68fd1188f3bc44b7', 'admin', 1),
(13, 'suryo', '45377', '1', 6, '', 'suryo.bintang@gmail.com', '085885343894', 'suryo', '0685cbd213039b77003d35a83ef4bf68', 'admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pos`
--

CREATE TABLE `pos` (
  `pos_id` int(11) NOT NULL,
  `pos_jalur` int(11) NOT NULL,
  `pos_nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pos`
--

INSERT INTO `pos` (`pos_id`, `pos_jalur`, `pos_nama`) VALUES
(5, 6, 'under rear small'),
(6, 10, 'Pre A'),
(7, 10, 'Pre B'),
(9, 8, 'Underfront'),
(10, 9, 'Under Front'),
(11, 12, 'Backdoor'),
(12, 13, 'Shelline'),
(13, 19, 'Underbody D79'),
(14, 20, 'TD Link Side member'),
(15, 21, 'Improvement'),
(16, 22, 'Project D74'),
(18, 8, 'Koordinator'),
(20, 10, 'Koordinator'),
(21, 12, 'Koordinator'),
(23, 13, 'Koordinator'),
(24, 18, 'Koordinator'),
(25, 18, 'Koordinator'),
(26, 19, 'Koordinator'),
(27, 20, 'Koordinator'),
(28, 21, 'Koordinator'),
(29, 22, 'Koordinator'),
(30, 23, 'Trainer'),
(31, 23, 'Koordinator'),
(32, 23, 'Administrasi Reguler'),
(33, 22, 'project d52'),
(34, 9, 'Outline Under Front'),
(35, 9, 'Front Floor'),
(36, 9, 'Panel Dash'),
(37, 9, 'Koordinator'),
(38, 6, 'pos 1');

-- --------------------------------------------------------

--
-- Table structure for table `shift`
--

CREATE TABLE `shift` (
  `shift_id` int(11) NOT NULL,
  `shift_nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shift`
--

INSERT INTO `shift` (`shift_id`, `shift_nama`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'N');

-- --------------------------------------------------------

--
-- Table structure for table `skil`
--

CREATE TABLE `skil` (
  `skil_id` int(11) NOT NULL,
  `mp_id` int(11) NOT NULL,
  `mp_nama` varchar(255) NOT NULL,
  `skiljalur_id` int(11) NOT NULL,
  `pos_kode` int(11) NOT NULL,
  `skill_score` varchar(255) NOT NULL,
  `skill_sts` enum('1','0','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `skil`
--

INSERT INTO `skil` (`skil_id`, `mp_id`, `mp_nama`, `skiljalur_id`, `pos_kode`, `skill_score`, `skill_sts`) VALUES
(7, 7042, 'Asep Saepudin', 10, 5, '100', '1'),
(8, 7042, 'Asep Saepudin', 10, 7, '50', '0'),
(9, 14421, 'Totok Kunarto', 13, 5, '25', '0'),
(10, 34002, 'Jumanto', 22, 16, '100', '1'),
(11, 25174, 'Nurjaman', 22, 16, '100', '1'),
(13, 48520, 'Mukhammad Sidiq Lastrikno', 6, 36, '100', '1');

-- --------------------------------------------------------

--
-- Table structure for table `spot`
--

CREATE TABLE `spot` (
  `spot_id` int(11) NOT NULL,
  `spot_tanggal` datetime NOT NULL,
  `spot_tt` varchar(50) NOT NULL,
  `spot_judul` varchar(255) NOT NULL,
  `spot_slug` varchar(255) NOT NULL,
  `spot_pos` varchar(50) NOT NULL,
  `spot_jig` varchar(50) NOT NULL,
  `spot_gun` varchar(255) NOT NULL,
  `spot_tipegun` varchar(50) NOT NULL,
  `spot_gnl` varchar(255) NOT NULL,
  `spot_safe` varchar(50) NOT NULL,
  `spot_konten` longtext NOT NULL,
  `spot_sampul` varchar(255) NOT NULL,
  `spot_author` int(11) NOT NULL,
  `spot_jalur` int(11) NOT NULL,
  `spot_quality` int(11) NOT NULL,
  `spot_pe` int(11) NOT NULL,
  `spot_project` int(11) NOT NULL,
  `spot_bqc` int(11) NOT NULL,
  `spot_spv` int(11) NOT NULL,
  `spot_status` enum('publish','proses','revisi') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `spot`
--

INSERT INTO `spot` (`spot_id`, `spot_tanggal`, `spot_tt`, `spot_judul`, `spot_slug`, `spot_pos`, `spot_jig`, `spot_gun`, `spot_tipegun`, `spot_gnl`, `spot_safe`, `spot_konten`, `spot_sampul`, `spot_author`, `spot_jalur`, `spot_quality`, `spot_pe`, `spot_project`, `spot_bqc`, `spot_spv`, `spot_status`) VALUES
(21, '2022-04-20 14:41:51', '1,0', 'ok', 'ok', 'under rear small', 'jig under rear', 'PSW2', 'KDX', '3', '4', '<p>ok</p>\r\n', 'Screenshot_(272)20.png', 1, 8, 0, 0, 0, 0, 0, 'publish'),
(22, '2022-04-20 14:51:27', '1,0', '45377', '45377', 'Under rear', 'jig under rear', 'PSW2', 'KDX', '2', '3', '<p>rrrrrrrrrrrr</p>\r\n', 'Screenshot_(272)21.png', 11, 8, 0, 1, 0, 0, 0, 'proses'),
(23, '2022-04-20 15:17:25', '1,0', 'ok', 'ok', 'under rear small', 'jig under rear', 'PSW2', 'KDX', '2', '3', '<p>ok</p>\r\n', 'Screenshot_(272)22.png', 11, 6, 0, 1, 0, 0, 0, 'proses'),
(24, '2022-04-21 12:47:49', '1,0', 'ok', 'ok', 'under rear small', 'jig under rear', 'PSW2', 'KDX', '2', '3', '<p>5555</p>\r\n', 'Screenshot_(272)23.png', 10, 6, 0, 0, 0, 0, 0, 'proses');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hadir`
--
ALTER TABLE `hadir`
  ADD PRIMARY KEY (`hadir_id`),
  ADD KEY `hadir_kode` (`hadir_kode`),
  ADD KEY `hadir_kode_2` (`hadir_kode`);

--
-- Indexes for table `halaman`
--
ALTER TABLE `halaman`
  ADD PRIMARY KEY (`halaman_id`);

--
-- Indexes for table `henkaten`
--
ALTER TABLE `henkaten`
  ADD PRIMARY KEY (`hen_id`),
  ADD KEY `hadir_id` (`hadir_id`);

--
-- Indexes for table `jalur`
--
ALTER TABLE `jalur`
  ADD PRIMARY KEY (`jalur_id`);

--
-- Indexes for table `kodeabsen`
--
ALTER TABLE `kodeabsen`
  ADD PRIMARY KEY (`absen_id`);

--
-- Indexes for table `mp`
--
ALTER TABLE `mp`
  ADD PRIMARY KEY (`mp_id`),
  ADD KEY `mp_jalur` (`mp_jalur`),
  ADD KEY `mp_shift` (`mp_shift`),
  ADD KEY `mp_pos` (`mp_pos`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`pengguna_id`),
  ADD KEY `pengguna_jalur` (`pengguna_jalur`);

--
-- Indexes for table `pos`
--
ALTER TABLE `pos`
  ADD PRIMARY KEY (`pos_id`),
  ADD KEY `pos_jalur` (`pos_jalur`);

--
-- Indexes for table `shift`
--
ALTER TABLE `shift`
  ADD PRIMARY KEY (`shift_id`);

--
-- Indexes for table `skil`
--
ALTER TABLE `skil`
  ADD PRIMARY KEY (`skil_id`),
  ADD KEY `pos_id` (`pos_kode`),
  ADD KEY `jalur_id` (`skiljalur_id`);

--
-- Indexes for table `spot`
--
ALTER TABLE `spot`
  ADD PRIMARY KEY (`spot_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hadir`
--
ALTER TABLE `hadir`
  MODIFY `hadir_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `halaman`
--
ALTER TABLE `halaman`
  MODIFY `halaman_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `henkaten`
--
ALTER TABLE `henkaten`
  MODIFY `hen_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jalur`
--
ALTER TABLE `jalur`
  MODIFY `jalur_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `pengguna_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pos`
--
ALTER TABLE `pos`
  MODIFY `pos_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `shift`
--
ALTER TABLE `shift`
  MODIFY `shift_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `skil`
--
ALTER TABLE `skil`
  MODIFY `skil_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `spot`
--
ALTER TABLE `spot`
  MODIFY `spot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `henkaten`
--
ALTER TABLE `henkaten`
  ADD CONSTRAINT `henkaten_ibfk_1` FOREIGN KEY (`hadir_id`) REFERENCES `hadir` (`hadir_id`);

--
-- Constraints for table `mp`
--
ALTER TABLE `mp`
  ADD CONSTRAINT `mp_ibfk_1` FOREIGN KEY (`mp_jalur`) REFERENCES `jalur` (`jalur_id`);

--
-- Constraints for table `pos`
--
ALTER TABLE `pos`
  ADD CONSTRAINT `pos_ibfk_1` FOREIGN KEY (`pos_jalur`) REFERENCES `jalur` (`jalur_id`);

--
-- Constraints for table `skil`
--
ALTER TABLE `skil`
  ADD CONSTRAINT `skil_ibfk_1` FOREIGN KEY (`pos_kode`) REFERENCES `pos` (`pos_id`),
  ADD CONSTRAINT `skil_ibfk_2` FOREIGN KEY (`skiljalur_id`) REFERENCES `jalur` (`jalur_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
