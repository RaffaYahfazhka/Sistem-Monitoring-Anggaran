-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 16 Jul 2022 pada 06.09
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistem`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `hpp`
--

CREATE TABLE `hpp` (
  `id` int(40) NOT NULL,
  `tanggal` date NOT NULL,
  `mataanggaran` varchar(250) NOT NULL,
  `kodeanggaran` varchar(250) NOT NULL,
  `nilaikegiatan` varchar(250) NOT NULL,
  `kegiatan` varchar(1000) NOT NULL,
  `saldoawal` varchar(250) NOT NULL,
  `saldoakhir` varchar(250) NOT NULL,
  `hpp` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `input`
--

CREATE TABLE `input` (
  `id` int(40) NOT NULL,
  `tanggal` date NOT NULL,
  `mataanggaran` varchar(250) NOT NULL,
  `kodeanggaran` varchar(250) NOT NULL,
  `nilaikegiatan` varchar(250) NOT NULL,
  `kegiatan` varchar(1000) NOT NULL,
  `saldoawal` varchar(250) NOT NULL,
  `saldoakhir` varchar(250) NOT NULL,
  `pic` enum('HPP','Umum') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `input`
--

INSERT INTO `input` (`id`, `tanggal`, `mataanggaran`, `kodeanggaran`, `nilaikegiatan`, `kegiatan`, `saldoawal`, `saldoakhir`, `pic`) VALUES
(24, '2022-02-10', 'Tunjangan Pengobatan/Rawat Inap HPP', '91-02-01', '632907', 'Biaya Iuran Mandiri Inhealt periode Februari 2022 Perumda Paljaya', '511399600', '510766693', 'HPP'),
(25, '2022-03-10', 'Tunjangan Pengobatan/Rawat Inap HPP', '91-02-01', '4352253', 'Biaya Iuran Mandiri Inhealt semester 1 karyawan perumda paljaya', '510766693', '506414440', 'HPP'),
(26, '2022-04-14', 'Tunjangan Hari Raya HPP', '91-01-04', '850313913', 'Biaya Tunjangan Hari Raya Badan Pengawas, Komite, Tenaga Ahli, Direksi, Karyawan, Calon karyawan dan Karyawan Kontrak Perumda Paljaya Tahun 2022', '1002839476', '152525563', 'HPP'),
(28, '2022-05-23', 'Tunjangan Hari Raya HPP', '91-01-04', '95977500', 'Biaya Pengadaan Daging Lebaran HPP Karyawan dan PHL Perumda Paljaya Tahun 2022', '152525563', '56548063', 'HPP'),
(53, '2022-01-01', 'Tunjangan Pengobatan/Rawat Inap HPP', '91-02-01', '208600400', 'Biaya Iuran Mandiri Inhealt semester 1 karyawan Perumda Paljaya', '720000000', '511399600', 'HPP'),
(54, '2022-01-01', 'Tunjangan Operasional HPP', '91-01-03', '106466000', 'Tunj Ops HPP Desember 2021', '1381021488', '1274555488', 'HPP'),
(55, '2022-02-01', 'Tunjangan Operasional HPP', '91-01-03', '102063000', 'Tunj Operasional HPP 01 sd 31 jan 22', '1274555488', '1172492488', 'HPP'),
(56, '2022-03-02', 'Tunjangan Operasional HPP', '91-01-03', '98178000', 'Tunj Operasional HPP 01 sd 28 Feb 22', '1172492488', '1074314488', 'HPP'),
(61, '2022-04-06', 'Tunjangan Operasional HPP', '91-01-03', '112274000', 'Tunj Operasional HPP 01 sd 31 Maret 22', '1074314488', '962040488', 'HPP'),
(63, '2022-05-10', 'Tunjangan Operasional HPP', '91-01-03', '103809000', 'Tunj Operasional HPP 01 sd 31 Maret 22', '962040488', '858231488', 'HPP'),
(64, '2022-06-06', 'Tunjangan Operasional HPP', '91-01-03', '97246500', 'Tunj Operasional HPP 01 sd 31 Mei 22', '858231488', '760984988', 'HPP'),
(65, '2022-01-02', 'Uang Makan HPP', '91-01-03', '108932500', 'Tunj Uang makan HPP Desember 2021', '1381021488', '1272088988', 'HPP'),
(66, '2022-02-04', 'Uang Makan HPP', '91-01-03', '104508500', 'Tunj Uang makan HPP 01 sd 31 Jan 22', '1272088988', '1167580488', 'HPP'),
(67, '2022-03-04', 'Uang Makan HPP', '91-01-03', '97754500', 'Tunj Uang makan HPP 01 sd 28 Feb 22', '1167580488', '1069825988', 'HPP'),
(68, '2022-04-06', 'Uang Makan HPP', '91-01-03', '114832500', 'Tunj Uang makan HPP 01 sd 31 Maret 22', '1069825988', '954993488', 'HPP'),
(69, '2022-05-10', 'Uang Makan HPP', '91-01-03', '106035000', 'Tunj Operasional HPP 01 sd 30 April 22', '954993488', '848958488', 'HPP'),
(70, '2022-06-06', 'Uang Makan HPP', '91-01-03', '98023500', 'Tunj Uang makan HPP Periode 01 sd 31 Mei 22', '848958488', '750934988', 'HPP'),
(71, '2022-03-04', 'Pajak Karyawan HPP', '91.01.01.02', '35571881', 'Pembayaran PPh 21 Masa Februari 2022', '1532423740', '1496851859', 'HPP'),
(72, '2022-04-04', 'Pajak Karyawan HPP', '91.01.01.02', '56186001', 'Pembayaran PPh 21 Masa Maret 2022', '1496851859', '1440665858', 'HPP'),
(73, '2022-05-12', 'Pajak Karyawan HPP', '91.01.01.02', '60695441', 'Pembayaran PPh 21 Masa April 2022', '1440665858', '1379970417', 'HPP'),
(74, '2022-01-04', 'Tunjangan Cuti HPP', '91-04-11', '3000000', 'Tunjangan Cuti Januari', '239000000', '236000000', 'HPP'),
(75, '2022-02-04', 'Tunjangan Cuti HPP', '91-04-11', '16000000', 'Tunjangan Cuti Feb', '236000000', '220000000', 'HPP'),
(76, '2022-03-04', 'Tunjangan Cuti HPP', '91-04-11', '8000000', 'Tunjangan Cuti Maret ', '220000000', '212000000', 'HPP'),
(77, '2022-04-20', 'Tunjangan Cuti HPP', '91-04-11', '16000000', 'Tunjangan Cuti April', '212000000', '196000000', 'HPP'),
(78, '2022-05-23', 'Tunjangan Cuti HPP', '91-04-11', '19000000', 'Tunjangan Cuti Mei', '196000000', '177000000', 'HPP'),
(79, '2022-01-04', 'Tunjangan Pemel Kesehatan HPP', '91-02-07', '49742371', 'Tunjangan Pemel Kesehatan Januari', '621417600', '571675229', 'HPP'),
(80, '2022-02-04', 'Tunjangan Pemel Kesehatan HPP', '91-02-07', '51802925', 'Tunjangan Pemel Kesehatan Februari', '571675229', '519872304', 'HPP'),
(81, '2022-03-04', 'Tunjangan Pemel Kesehatan HPP', '91-02-07', '51898324', 'Tunjangan Pemel Kesehatan Maret', '519872304', '467973980', 'HPP'),
(82, '2022-04-20', 'Tunjangan Pemel Kesehatan HPP', '91-02-07', '52166848', 'Tunjangan Pemel Kesehatan April', '467973980', '415807132', 'HPP'),
(83, '2022-05-23', 'Tunjangan Pemel Kesehatan HPP', '91-02-07', '51868920', 'Tunjangan Pemel Kesehatan Mei', '415807132', '363938212', 'HPP'),
(84, '2022-01-04', 'Tunjangan Kesejahteraan HPP', '91-02-06', '116867292', 'Tunjangan Kesejahteraan Januari', '1479730080', '1362862788', 'HPP'),
(85, '2022-02-04', 'Tunjangan Kesejahteraan HPP', '91-02-06', '120964298', 'Tunjangan Kesejahteraan Februari', '1362862788', '1241898490', 'HPP'),
(86, '2022-03-04', 'Tunjangan Kesejahteraan HPP', '91-02-06', '120803056', 'Tunjangan Kesejahteraan Maret', '1241898490', '1121095434', 'HPP'),
(87, '2022-04-20', 'Tunjangan Kesejahteraan HPP', '91-02-06', '121269344', 'Tunjangan Kesejahteraan April', '1121095434', '999826090', 'HPP'),
(88, '2022-05-23', 'Tunjangan Kesejahteraan HPP', '91-02-06', '120037085', 'Tunjangan Kesejahteraan Mei', '999826090', '879789005', 'HPP'),
(89, '2022-01-04', 'Tunjangan Perumahan HPP', '91-02-06', '54199687', 'Tunjangan Perumahan Januari', '676699200', '622499513', 'HPP'),
(90, '2022-02-04', 'Tunjangan Perumahan HPP', '91-02-06', '56069806', 'Tunjangan Perumahan Februari', '622499513', '566429707', 'HPP'),
(91, '2022-03-04', 'Tunjangan Perumahan HPP', '91-02-06', '56185021', 'Tunjangan Perumahan Maret', '566429707', '510244686', 'HPP'),
(92, '2022-04-20', 'Tunjangan Perumahan HPP', '91-02-06', '62504477', 'Tunjangan Perumahan April', '510244686', '447740209', 'HPP'),
(93, '2022-05-23', 'Tunjangan Perumahan HPP', '91-02-06', '56115169', 'Tunjangan Perumahan Mei', '447738209', '391623040', 'HPP'),
(94, '2022-01-04', 'Tunjangan Perusahaan HPP', '91-01-06', '59303905', 'Tunjangan Perusahaan Januari', '730260000', '670956095', 'HPP'),
(95, '2022-02-04', 'Tunjangan Perusahaan HPP', '91-01-06', '62085096', 'Tunjangan Perusahaan Februari', '670956095', '608870999', 'HPP'),
(96, '2022-03-04', 'Tunjangan Perusahaan HPP', '91-01-06', '62188811', 'Tunjangan Perusahaan Maret', '608870999', '546682188', 'HPP'),
(97, '2022-04-20', 'Tunjangan Perusahaan HPP', '91-01-06', '62506477', 'Tunjangan Perusahaan April', '546682188', '484175711', 'HPP'),
(98, '2022-05-23', 'Tunjangan Perusahaan HPP', '91-01-06', '62143393', 'Tunjangan Perusahaan Mei', '484175711', '422032318', 'HPP'),
(99, '2022-01-04', 'Tunjangan Jabatan HPP', '91-01-02', '40809643', 'Tunjangan Jabatan HPP', '543780000', '502970357', 'HPP'),
(100, '2022-02-04', 'Tunjangan Jabatan HPP', '91-01-02', '53189643', 'Tunjangan Jabatan HPP', '502970357', '449780714', 'HPP'),
(101, '2022-03-04', 'Tunjangan Jabatan HPP', '91-01-02', '51098333', 'Tunjangan Jabatan HPP', '449780714', '398682381', 'HPP'),
(102, '2022-04-20', 'Tunjangan Jabatan HPP', '91-01-02', '51287381', 'Tunjangan Jabatan HPP', '398682381', '347395000', 'HPP'),
(103, '2022-05-23', 'Tunjangan Jabatan HPP', '91-01-02', '51287381', 'Tunjangan Jabatan HPP', '347395000', '296107619', 'HPP'),
(104, '2022-01-04', 'Gaji Karyawan HPP', '91.01.01.01', '52118307', 'Gaji Karyawan Kontrak Januari', '5620568336', '5568450029', 'HPP'),
(105, '2022-01-04', 'Gaji Karyawan HPP', '91.01.01.01', '270688250', 'Gaji Karyawan Tetap Januari', '5568450029', '5297761779', 'HPP'),
(106, '2022-02-04', 'Gaji Karyawan HPP', '91.01.01.01', '51551803', 'Gaji Karyawan Kontrak Februari', '5297761779', '5246209976', 'HPP'),
(107, '2022-02-04', 'Gaji Karyawan HPP', '91.01.01.01', '271598196', 'Gaji Karyawan Tetap Februari', '5246209976', '4974611780', 'HPP'),
(108, '2022-03-04', 'Gaji Karyawan HPP', '91.01.01.01', '58349844', 'Gaji Karyawan Kontrak Maret', '4974611780', '4916261936', 'HPP'),
(109, '2022-03-04', 'Gaji Karyawan HPP', '91.01.01.01', '272608714', 'Gaji Karyawan Tetap Maret', '4916261936', '4643653222', 'HPP'),
(110, '2022-04-20', 'Gaji Karyawan HPP', '91.01.01.01', '77044453', 'Gaji Karyawan Kontrak April', '4643653222', '4566608769', 'HPP'),
(111, '2022-04-20', 'Gaji Karyawan HPP', '91.01.01.01', '273819039', 'Gaji Karyawan Tetap April', '4566608769', '4292789730', 'HPP'),
(112, '2022-05-23', 'Gaji Karyawan HPP', '91.01.01.01', '76761202', 'Gaji Karyawan Kontrak Mei', '4292789730', '4216028528', 'HPP'),
(113, '2022-05-23', 'Gaji Karyawan HPP', '91.01.01.01', '271509563', 'Gaji Karyawan Tetap Mei', '4216028528', '3944518965', 'HPP');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekapitulasi`
--

CREATE TABLE `rekapitulasi` (
  `id` int(40) NOT NULL,
  `tanggal` date NOT NULL,
  `mataanggaran` varchar(250) NOT NULL,
  `kodeanggaran` varchar(250) NOT NULL,
  `nilaikegiatan` varchar(250) NOT NULL,
  `kegiatan` varchar(1000) NOT NULL,
  `saldoawal` varchar(250) NOT NULL,
  `saldoakhir` varchar(250) NOT NULL,
  `pic` enum('HPP','Umum') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rekapitulasi`
--

INSERT INTO `rekapitulasi` (`id`, `tanggal`, `mataanggaran`, `kodeanggaran`, `nilaikegiatan`, `kegiatan`, `saldoawal`, `saldoakhir`, `pic`) VALUES
(35, '2022-01-01', 'PUSBINROH', '93-08-06', '10600000', 'UM pelaksanaan pengajian karyawan', '282271000', '271671000', 'Umum'),
(36, '2022-02-01', 'Biaya Manajemen', '93-08-11', '6000000', 'Biaya tagihan iuran anggota forkalim tahun 2021', '486000003', '480000003', 'Umum'),
(37, '2022-03-01', 'Biaya Manajemen', '93-08-11', '1800000', 'Realisasi kegiatan Silaturahmi Bidang Keuangan TW ', '480000003', '478200003', 'Umum'),
(38, '2022-03-31', 'Biaya Manajemen', '93-08-11', '2100000', 'Realisasi kegiatan Silaturahmi Bidang Teknik TW I', '478200003', '476100003', 'Umum'),
(41, '2022-04-01', 'Biaya Manajemen', '93-08-11', '748860', 'Realisasi kegiatan Silaturahmi Bidang Pengelolahan Limbah B3 TW I', '476100003', '475351143', 'Umum'),
(43, '2022-04-04', 'Biaya Manajemen', '93-08-11', '1650000', 'Realisasi kegiatan Silaturahmi Bidang Pemasaran TW I', '475351143', '473701143', 'Umum'),
(44, '2022-04-04', 'Biaya Manajemen', '93-08-11', '3572315', 'Realisasi kegiatan Silaturahmi Bidang Umum TW I', '473701143', '470128828', 'Umum'),
(45, '2022-05-12', 'Biaya Manajemen', '93-08-11', '1641915', 'Realisasi kegiatan Silaturahmi Bidang Pengembangan Bisnis TW I', '470128828', '468486913', 'Umum'),
(46, '2022-05-12', 'Biaya Manajemen', '93-08-11', '4350000', 'Realisasi kegiatan Silaturahmi Bidang Operasi & Pemeliharaan TW I', '468486913', '464136913', 'Umum'),
(52, '2022-05-13', 'Biaya Manajemen', '93-08-11', '600000', 'Realisasi kegiatan Silaturahmi Bidang SPI TW I', '464136913', '463536913', 'Umum'),
(53, '2022-05-13', 'Biaya Manajemen', '93-08-11', '2157500', 'Realisasi kegiatan Silaturahmi Bidang Layanan Lumpur Tinja TW I', '463536913', '461379413', 'Umum'),
(54, '2022-03-01', 'Purnabakti Direksi ', '93-03-10', '375283440', 'Biaya Tagihan PL 25 Maret 2022 atas nama aris supriyanto dan budi setyono', '790598280', '415314840', 'Umum'),
(55, '2022-04-21', 'Purnabakti Direksi ', '93-03-10', '177765840', 'Biaya Premi Asuransi BRI Life a/n Asri Indiyani', '415314840', '237549000', 'Umum'),
(56, '2022-05-20', 'Purnabakti Direksi ', '93-03-10', '164433402', 'Biaya Premi Asuransi BRI Life a/n Zulkarnaen dan Budi Siswanto', '237549000', '73115598', 'Umum'),
(57, '2022-01-04', 'BAPOR', '93-08-08', '5600000', 'UM Kegiatan Senam Pagi', '140998000', '135398000', 'Umum'),
(58, '2022-03-24', 'BAPOR', '93-08-08', '4191600', 'Biaya Bapor Mini Soccer/ Futsal TW I Tahun 2022', '135398000', '131206400', 'Umum'),
(59, '2022-04-22', 'TPA', '93-08-10', '11400000', 'Honor Panitia Penerima Hasil Pekerjaan Periode Januari sd Maret 2022', '72600000', '61200000', 'Umum'),
(60, '2022-01-04', 'Perjalanan Dinas', '93-05-02', '10700000', 'UM Perjalanan dinas Ke Tasik', '479500000', '468800000', 'Umum'),
(61, '2022-03-04', 'Perjalanan Dinas', '93-05-02', '10412338', 'Biaya Realisasi Perjalanan Dinas kunjungan PT.Indobangun Megatama 10 sd 12 Februari 2022', '468800000', '458387662', 'Umum'),
(62, '2022-04-06', 'Perjalanan Dinas', '93-05-02', '2458556', 'Penggantian Biaya Hotel an Zulkarnaen dalam rangka rapat Kunjungan ke IPLT Pulogebang, IPLT Durikosambi, IPAL Krukut, Undangan hari air dunia 2022, dan Perkenalan sekretaris dan anggota dewas Perumda Paljaya', '458387662', '455929106', 'Umum'),
(63, '2022-04-21', 'Perjalanan Dinas', '93-05-02', '1267631', 'Penggantian Biaya Hotel an Zulkarnaen dalam rangka rapat SOP Barang Jasa, rapat eLHKPN dan rapat BRI Life', '455929106', '454661475', 'Umum'),
(64, '2022-05-23', 'Perjalanan Dinas', '93-05-02', '5955570', 'Penggantian Biaya Hotel an Zulkarnaen dalam rangka acara ramadhan, rapat, halal bi halal, dan coffee morning dengan Direksi Perumda Paljaya', '454661475', '448705905', 'Umum'),
(65, '2022-05-24', 'Perjalanan Dinas', '93-05-02', '5955570', 'Uang Muka Perjalanan Dinas Kunjungan ke Organica Water Budapest Hongaria tanggal 28 Mei sd 6 Juni 2022', '448705905', '442750335', 'Umum'),
(66, '2022-06-02', 'Perjalanan Dinas', '93-05-02', '4654470', 'Biaya Realisasi Perjalanan Dinas Workshop Integrated GRC & Digization tanggal 29 Mei sd 1 Juni 2022 di Hotel Crowne Plaza Bandung', '442750335', '438095865', 'Umum'),
(67, '2022-02-22', 'Diklat/Training Karyawan', '93-05-01', '34560000', 'By. Training Certified international procurement professional (CIPP) oleh PT. husin intelligence Group', '652461000', '617901000', 'Umum'),
(68, '2022-03-31', 'Diklat/Training Karyawan', '93-05-01', '17049000', 'By Awareness Training: SNI ISO 37001:2016 (SMAP), Korupsi dan Tindak Pidana Korupsi', '617901000', '600852000', 'Umum'),
(69, '2022-05-24', 'Diklat/Training Karyawan', '93-05-01', '27084000', 'Uang Muka biaya Mengikuti Training dan Sertifikasi Kompetensi Limbah B3 Tanggal 22 sd 23 Juni 2022 di Jakarta', '600852000', '573768000', 'Umum'),
(70, '2022-05-12', 'Diklat/Training BP & Direksi', '93-05-01', '6500000', 'Biaya Realisasi Pelatihan Ketua Dewan Pengawas \"Pendidikan dan Uji Kompetensi Auditor Hukum Indonesia\"', '250000000', '243500000', 'Umum'),
(71, '2022-05-27', 'Diklat/Training BP & Direksi', '93-05-01', '11650000', 'Workshop Integrated GRC & Digization tanggal 29 Mei sd 1 Juni 2022 di Hotel Crowne Plaza Bandung', '243500000', '231850000', 'Umum'),
(72, '2022-06-08', 'Diklat/Training BP & Direksi', '93-05-01', '16950000', 'Workshop Kerugian Negara dalam BUMN dan BUMD: Resiko Investasi dan Korupsi tanggal 16-17 Juni 2022 di Hotel Crowne Plaza Bandung', '231850000', '214900000', 'Umum'),
(73, '2022-01-04', 'Asuransi Jamsostek', '93-03-12', '27445706', 'Biaya Iuran BPJS Ketenagakerjaan Januari', '330307000', '302861294', 'Umum'),
(74, '2022-02-04', 'Asuransi Jamsostek', '93-03-12', '27445706', 'Biaya Iuran BPJS Ketenagakerjaan Februari ', '302861294', '275415588', 'Umum'),
(75, '2022-03-04', 'Asuransi Jamsostek', '93-03-12', '27005907', 'Biaya Iuran BPJS Ketenagakerjaan Maret', '275415588', '248409681', 'Umum'),
(76, '2022-03-05', 'Asuransi Jamsostek', '93-03-12', '2223820', 'Biaya Iuran Asuransi Bumida Bulan Januari 2022 dan Februari 2022', '248409681', '246185861', 'Umum'),
(77, '2022-03-06', 'Asuransi Jamsostek', '93-03-12', '1103155', 'Biaya Iuran Asuransi Bumida Bulan Maret 2022', '246185861', '245082706', 'Umum'),
(78, '2022-04-08', 'Asuransi Jamsostek', '93-03-12', '1155686', 'Biaya Iuran Asuransi Bumida Bulan April 2022', '245082706', '243927020', 'Umum'),
(79, '2022-04-08', 'Asuransi Jamsostek', '93-03-12', '35086896', 'Biaya Iuran BPJS Ketenagakerjaan April', '243927020', '208840124', 'Umum'),
(80, '2022-05-11', 'Asuransi Jamsostek', '93-03-12', '34677470', 'Biaya Iuran BPJS Ketenagakerjaan Mei 2022', '208840124', '174162654', 'Umum'),
(81, '2022-05-20', 'Asuransi Jamsostek', '93-03-12', '1155686', 'Biaya Iuran Asuransi Bumida Mei 2022', '174162654', '173006968', 'Umum'),
(82, '2022-06-06', 'Asuransi Jamsostek', '93-03-12', '27046262', 'Biaya Iuran BPJS Ketenagakerjaan Juni 2022', '173006968', '145960706', 'Umum'),
(83, '2022-01-04', 'Tunjangan Dana Pensiun/BPJS Kesehatan', '93-02-03', '35850225', 'Iuran BPJS Kesehatan karyawan Januari', '489600000', '453749775', 'Umum'),
(84, '2022-03-07', 'Tunjangan Dana Pensiun/BPJS Kesehatan', '93-02-03', '36100225', 'Iuran BPJS Kesehatan karyawan Maret', '453749775', '417649550', 'Umum'),
(85, '2022-04-11', 'Tunjangan Dana Pensiun/BPJS Kesehatan', '93-02-03', '35782626', 'Iuran BPJS Kesehatan karyawan April', '417649550', '381866924', 'Umum'),
(86, '2022-05-12', 'Tunjangan Dana Pensiun/BPJS Kesehatan', '93-02-03', '36282626', 'Iuran BPJS Kesehatan karyawan Mei', '381866924', '345584298', 'Umum'),
(87, '2022-06-03', 'Tunjangan Dana Pensiun/BPJS Kesehatan', '93-02-03', '36032626', 'Iuran BPJS Kesehatan karyawan Juni', '345584298', '309551672', 'Umum'),
(88, '2022-01-04', 'Tunjangan Pengobatan/Rawat Inap Umum', '93-02-02', '1995000', 'By Pemeriksaan Antigen Karyawan & Cs gedung B lantai 2', '684000000', '682005000', 'Umum'),
(89, '2022-02-04', 'Tunjangan Pengobatan/Rawat Inap Umum', '93-02-02', '11367750', 'By Pemeriksaan Antigen Karyawan', '682005000', '670637250', 'Umum'),
(90, '2022-03-04', 'Tunjangan Pengobatan/Rawat Inap Umum', '93-02-02', '2185245', 'Biaya Iuran Mandiri Inhealt Semester 1 karyawan Perumda Paljaya', '670637250', '668452005', 'Umum'),
(91, '2022-05-20', 'Tunjangan Pengobatan/Rawat Inap Umum', '93-02-02', '8657840', 'Biaya Iuran Mandiri dengan nomor premi 0114120210700001 Tagihan Premi periode April 2022', '668452005', '659794165', 'Umum'),
(92, '2022-06-07', 'Tunjangan Pengobatan/Rawat Inap Umum', '93-02-02', '943541', 'Biaya Iuran Mandiri Inhealt 0114120210700001 (Untuk keluarga Karyawan atas nama Dira dan Danu) Periode Bulan Juni 2022', '659794165', '658850624', 'Umum'),
(93, '2022-03-04', 'Pajak BP', '93-01-10', '11816283', 'Pembayaran PPh 21 Masa Februari 2022', '396710343', '384894060', 'Umum'),
(94, '2022-04-04', 'Pajak BP', '93-01-10', '19716165', 'Pembayaran PPh 21 Masa Maret 2022', '384894060', '365177895', 'Umum'),
(95, '2022-05-12', 'Pajak BP', '93-01-10', '34697313', 'Pembayaran PPh 21 Masa April 2022', '365177895', '330480582', 'Umum'),
(96, '2022-03-04', 'Pajak Direksi', '93-01-08', '66239341', 'Pembayaran PPh 21 Masa Februari 2022', '1100653488', '1034414147', 'Umum'),
(97, '2022-04-04', 'Pajak Direksi', '93-01-08', '103563391', 'Pembayaran PPh 21 Masa Maret 2022', '1034414147', '930850756', 'Umum'),
(98, '2022-05-12', 'Pajak Direksi', '93-01-08', '100931431', 'Pembayaran PPh 21 Masa April 2022', '930850756', '829919325', 'Umum'),
(99, '2022-04-14', 'Tunjangan Hari Raya Umum', '93-01-04', '748177135', 'Biaya Tunjangan Hari Raya Badan Pengawas, Komite, Tenaga Ahli, Direksi, Karyawan, Calon karyawan dan Karyawan Kontrak Perumda Paljaya Tahun 2022', '1184502041', '436324906', 'Umum'),
(100, '2022-05-23', 'Tunjangan Hari Raya Umum', '93-01-04', '66684500', 'Biaya Pengadaan Daging Lebaran Umum Badan Pengawas, Direksi, Komite, Karyawan,PHL Perumda Paljaya, Marbot Masjid, dan Babinsa Tahun 2022', '436324906', '369640406', 'Umum'),
(101, '2022-01-04', 'Tunjangan Operasional Umum', '93-01-03', '80766000', 'Tunj ops Umum Desember 2021', '1069703712', '988937712', 'Umum'),
(102, '2022-02-04', 'Tunjangan Operasional Umum', '93-01-03', '75860000', 'Tunj Operasional Umum 01 sd 31 Jan 22', '988937712', '913077712', 'Umum'),
(103, '2022-03-04', 'Tunjangan Operasional Umum', '93-01-03', '65306000', 'Tunj Operasional Umum 01 sd 28 Feb 22', '913077712', '847771712', 'Umum'),
(104, '2022-04-06', 'Tunjangan Operasional Umum', '93-01-03', '74809000', 'Tunj Operasional Umum 01 sd 31 Maret 22', '847771712', '772962712', 'Umum'),
(105, '2022-05-10', 'Tunjangan Operasional Umum', '93-01-03', '67939000', 'Tunj Operasional Umum 01 sd 30 April 22', '772962712', '705023712', 'Umum'),
(106, '2022-06-06', 'Tunjangan Operasional Umum', '93-01-03', '61551000', 'Tunj Uang Operasional UMUM 01 sd 31 Mei 22', '705023712', '643472712', 'Umum'),
(107, '2022-01-04', 'Uang Makan Umum', '93-02-04', '79503500', 'Tunj Uang Makan Umum Desember 2021', '1069703712', '990200212', 'Umum'),
(108, '2022-02-04', 'Uang Makan Umum', '93-02-04', '76836500', 'Tunj Uang Makan Umum 01 sd 31 Jan 22', '990200212', '913363712', 'Umum'),
(109, '2022-03-04', 'Uang Makan Umum', '93-02-04', '66086500', 'Tunj Uang Makan Umum 01 sd 28 Feb 22', '913363712', '847277212', 'Umum'),
(110, '2022-04-06', 'Uang Makan Umum', '93-02-04', '76017500', 'Tunj Uang makan Umum 01 sd 31 Maret 22', '847277212', '771259712', 'Umum'),
(111, '2022-04-22', 'Uang Makan Umum', '93-02-04', '1860000', 'Biaya penggantian uang makan Mahasiswa Universitas Islam Negeri Syarif Hidayatullah Jkt & SMK Telekomunikasi Bekasi (PKL Sub Bid IT Periode Jan s.d Maret 2022)', '771259712', '769399712', 'Umum'),
(112, '2022-05-10', 'Uang Makan Umum', '93-02-04', '68965000', 'Tunj Uang Makan UMUM 01 sd 30 April 22', '769399712', '700434712', 'Umum'),
(113, '2022-05-20', 'Uang Makan Umum', '93-02-04', '2220000', 'Biaya penggantian uang makan Mahasiswa Universitas Trisakti (PKL Bidang Keuangan Periode November 2021 s.d April 2022))', '700434712', '698214712', 'Umum'),
(114, '2022-06-03', 'Uang Makan Umum', '93-02-04', '3220000', 'Biaya penggantian uang makan Mahasiswa Universitas Persada Indonesia Y.A.I (PKL Bidang Umum Periode 21 Februari sd 21 Mei 2022)', '698214712', '694994712', 'Umum'),
(115, '2022-06-06', 'Uang Makan Umum', '93-02-04', '61934000', 'Tunj Uang Makan UMUM 01 sd 31 Mei 22', '694994712', '633060712', 'Umum'),
(116, '2022-03-04', 'Pajak Karyawan Umum', '93.01.01.02', '55053466', 'Pembayaran PPh 21 Masa Februari 2022', '1826022841', '1770969375', 'Umum'),
(117, '2022-04-04', 'Pajak Karyawan Umum', '93.01.01.02', '21946276', 'Pembayaran PPh 21 Masa Maret 2022', '1770969375', '1749023099', 'Umum'),
(118, '2022-05-12', 'Pajak Karyawan Umum', '93.01.01.02', '38712401', 'Pembayaran PPh 21 Masa April 2022', '1749023099', '1710310698', 'Umum'),
(119, '2022-01-22', 'PIKKA (Dharma Wanita)', '93-08-07', '1000000', 'Biaya partisipasi PIKKA Kepada karyawan an Andry Herdianto, SE dan Wahyu Eka Distriana,SH', '142271000', '141271000', 'Umum'),
(120, '2022-01-22', 'PIKKA (Dharma Wanita)', '93-08-07', '500000', 'Biaya partisipasi PIKKA Kepada karyawan an Lisbet Eliana Napitupulu', '141271000', '140771000', 'Umum'),
(121, '2022-05-12', 'PIKKA (Dharma Wanita)', '93-08-07', '62462500', 'Biaya pengadaan parcel lebaran tahun 2022', '140771000', '78308500', 'Umum'),
(122, '2022-03-04', 'Tunjangan Cuti Direksi', '93.01.01.09', '125094480', 'Tunjangan cuti Dirut dan Dir Adm & Keuangan', '553049280', '427954800', 'Umum'),
(123, '2022-03-31', 'Tunjangan Pakaian Dinas Umum', '93.02.05', '967655', 'Pembuatan Id Card Direktur Teknik & Usaha', '156145000', '155177345', 'Umum'),
(124, '2022-01-04', 'Honor BP & Komite', '93-01-10.01', '70660530', 'Honor BP & Komite Jan', '1991841372', '1921180842', 'Umum'),
(125, '2022-02-04', 'Honor BP & Komite', '93-01-10.01', '70660530', 'Honor BP & Komite Feb', '1921180842', '1850520312', 'Umum'),
(126, '2022-03-04', 'Honor BP & Komite', '93-01-10.01', '125471674', 'Honor BP & Komite Maret', '1850520312', '1725048638', 'Umum'),
(127, '2022-04-20', 'Honor BP & Komite', '93-01-10.01', '152877241', 'Honor BP & Komite April', '1725048638', '1572171397', 'Umum'),
(128, '2022-05-23', 'Honor BP & Komite', '93-01-10.01', '157188141', 'Honor BP & Komite & Sekretaris Komite Mei', '1572171397', '1414983256', 'Umum'),
(129, '2022-01-04', 'Gaji Direksi', '93-01-08-02', '187641720', 'Gaji Direksi Jan', '3318295680', '3130653960', 'Umum'),
(130, '2022-02-04', 'Gaji Direksi', '93-01-08-02', '187641720', 'Gaji Direksi Feb', '3130653960', '2943012240', 'Umum'),
(131, '2022-03-04', 'Gaji Direksi ', '93-01-08-02', '276524640', 'Gaji Direksi Maret', '2943012240', '2666487600', 'Umum'),
(132, '2022-04-20', 'Gaji Direksi', '93-01-08-02', '276524640', 'Gaji Direksi April', '2666487600', '2389962960', 'Umum'),
(133, '2022-05-23', 'Gaji Direksi', '93-01-08-02', '276524640', 'Gaji Direksi Mei', '2389962960', '2113438320', 'Umum'),
(134, '2022-01-04', 'Tunjangan Fungsional Umum', '93-01-11', '9800000', 'Tunj Fungsional Umum Jan', '120600000', '110800000', 'Umum'),
(135, '2022-02-04', 'Tunjangan Fungsional Umum', '93-01-11', '8450000', 'Tunj Fungsional Umum Feb', '110800000', '102350000', 'Umum'),
(136, '2022-03-04', 'Tunjangan Fungsional Umum', '93-01-11', '7550000', 'Tunj Fungsional Umum Maret', '102350000', '94800000', 'Umum'),
(137, '2022-04-20', 'Tunjangan Fungsional Umum', '93-01-11', '7200000', 'Tunj Fungsional Umum April ', '94800000', '87600000', 'Umum'),
(138, '2022-05-23', 'Tunjangan Fungsional Umum', '93-01-11', '7200000', 'Tunj Fungsional Umum Mei', '87600000', '80400000', 'Umum'),
(139, '2022-01-04', 'Tunjangan Jabatan Umum', '93-01-02', '34937381', 'Tunj Jabatan Umum Jan', '540960000', '506022619', 'Umum'),
(140, '2022-02-04', 'Tunjangan Jabatan Umum', '93-01-02', '41009881', 'Tunj Jabatan Umum Feb', '506022619', '465012738', 'Umum'),
(141, '2022-03-04', 'Tunjangan Jabatan Umum', '93-01-02', '36905000', 'Tunj Jabatan Umum Maret', '465012738', '428107738', 'Umum'),
(142, '2022-04-20', 'Tunjangan Jabatan Umum', '93-01-02', '36905000', 'Tunj Jabatan Umum April', '428107738', '391202738', 'Umum'),
(143, '2022-05-23', 'Tunjangan Jabatan Umum', '93-01-02', '36905000', 'Tunj Jabatan Umum Mei', '391202738', '354297738', 'Umum'),
(144, '2022-01-04', 'Tunjangan Perusahaan Umum', '93-01-06', '40807524', 'Tunj Perusahaan Umum Jan', '556776000', '515968476', 'Umum'),
(145, '2022-02-04', 'Tunjangan Perusahaan Umum', '93-01-06', '40427524', 'Tunj Perusahaan Umum Feb', '515968476', '475540952', 'Umum'),
(146, '2022-03-04', 'Tunjangan Perusahaan Umum', '93-01-06', '37125667', 'Tunj Perusahaan Umum Maret', '475540952', '438415285', 'Umum'),
(147, '2022-04-20', 'Tunjangan Perusahaan Umum', '93-01-06', '37205524', 'Tunj Perusahaan Umum April', '438415285', '401209761', 'Umum'),
(148, '2022-05-23', 'Tunjangan Perusahaan Umum', '93-01-06', '37125667', 'Tunj Perusahaan Umum Mei', '401209761', '364084094', 'Umum'),
(149, '2022-01-04', 'Tunjangan Perumahan Umum', '93-02-01', '37188061', 'Tunj Perumahan Umum Jan', '502389600', '465201539', 'Umum'),
(150, '2022-02-04', 'Tunjangan Perumahan Umum', '93-02-01', '36535281', 'Tunj Perumahan Umum Feb', '465201539', '428666258', 'Umum'),
(151, '2022-03-04', 'Tunjangan Perumahan Umum', '93-02-01', '33530938', 'Tunjangan Perumahan Umum Maret', '428666258', '395135320', 'Umum'),
(152, '2022-04-20', 'Tunjangan Perumahan Umum', '93-02-01', '33608510', 'Tunjangan Perumahan Umum April', '395135320', '361526810', 'Umum'),
(153, '2022-05-23', 'Tunjangan Perumahan Umum', '93-02-01', '33530938', 'Tunjangan Perumahan Umum Mei', '361526810', '327995872', 'Umum'),
(154, '2022-01-04', 'Tunjangan Kesejahteraan Umum', '93-02-08', '85563288', 'Tunj Kesejahteraan Umum Jan', '1135915440', '1050352152', 'Umum'),
(155, '2022-02-04', 'Tunjangan Kesejahteraan Umum', '93-02-08', '86053184', 'Tunj Kesejahteraan Umum Feb', '1050352152', '964298968', 'Umum'),
(156, '2022-03-04', 'Tunjangan Kesejahteraan Umum', '93-02-08', '79877137', 'Tunj Kesejahteraan Umum Maret', '964298968', '884421831', 'Umum'),
(157, '2022-04-20', 'Tunjangan Kesejahteraan Umum', '93-02-08', '80119548', 'Tunj Kesejahteraan Umum April', '884421831', '804302283', 'Umum'),
(158, '2022-05-23', 'Tunjangan Kesejahteraan Umum', '93-02-08', '79877137', 'Tunj Kesejahteraan Umum Mei', '804302283', '724425146', 'Umum'),
(159, '2022-01-04', 'Tunjangan Pemeliharaan Kesehatan Umum', '93-02-07', '34256691', 'Tunjangan Pemel Kesehatan Jan', '463586400', '429329709', 'Umum'),
(160, '2022-02-04', 'Tunjangan Pemeliharaan Kesehatan Umum', '93-02-07', '33704058', 'Tunjangan Pemel Kesehatan Feb', '429329709', '395625651', 'Umum'),
(161, '2022-03-04', 'Tunjangan Pemeliharaan Kesehatan Umum', '93-02-07', '30874429', 'Tunjangan Pemel Kesehatan Maret', '395625651', '364751222', 'Umum'),
(162, '2022-04-20', 'Tunjangan Pemeliharaan Kesehatan Umum', '93-02-07', '30941001', 'Tunjangan Pemel Kesehatan April', '364751222', '333810221', 'Umum'),
(163, '2022-05-23', 'Tunjangan Pemeliharaan Kesehatan Umum', '93-02-07', '30874429', 'Tunjangan Pemel Kesehatan Mei', '333810221', '302935792', 'Umum'),
(164, '2022-01-04', 'Tunjangan Cuti Karyawan Umum', '93-02-09', '1000000', 'Tunjangan Cuti Jan', '239000000', '238000000', 'Umum'),
(165, '2022-02-04', 'Tunjangan Cuti Karyawan Umum', '93-02-09', '23000000', 'Tunjangan Cuti Feb', '238000000', '215000000', 'Umum'),
(166, '2022-03-04', 'Tunjangan Cuti Karyawan Umum', '93-02-09', '9000000', 'Tunjangan Cuti Maret', '215000000', '206000000', 'Umum'),
(167, '2022-04-20', 'Tunjangan Cuti Karyawan Umum', '93-02-09', '9000000', 'Tunjangan Cuti April', '206000000', '197000000', 'Umum'),
(168, '2022-05-23', 'Tunjangan Cuti Karyawan Umum', '93-02-09', '5000000', 'Tunjangan Cuti Mei', '197000000', '192000000', 'Umum'),
(169, '2022-01-04', 'Gaji Karyawan Umum', '93.01.01.01', '50629765', 'Gaji Karyawan Kontrak Jan 22', '3292462732', '3241832967', 'Umum'),
(170, '2022-01-04', 'Gaji Karyawan Umum', '93.01.01.01', '198383570', 'Gaji Karyawan Tetap Jan 22', '3241832967', '3043449397', 'Umum'),
(171, '2022-01-04', 'Gaji Karyawan Umum', '93.01.01.01', '15000000', 'Gaji Konsultan', '3043449397', '3028449397', 'Umum'),
(172, '2022-02-04', 'Gaji Karyawan Umum', '93.01.01.01', '54738975', 'Gaji Karyawan Kontrak Februari', '3028449397', '2973710422', 'Umum'),
(173, '2022-02-04', 'Gaji Karyawan Umum', '93.01.01.01', '15000000', 'Gaji Konsultan Feb 22', '2973710422', '2958710422', 'Umum'),
(174, '2022-02-04', 'Gaji Karyawan Umum', '93.01.01.01', '186335898', 'Gaji Karyawan Tetap Feb 22', '2958710422', '2772374524', 'Umum'),
(175, '2022-03-04', 'Gaji Karyawan Umum', '93.01.01.01', '15000000', 'Gaji Konsultan Maret 22', '2772374524', '2757374524', 'Umum'),
(176, '2022-03-04', 'Gaji Karyawan Umum', '93.01.01.01', '50911398', 'Gaji Karyawan Kontrak Maret 22', '2757374524', '2706463126', 'Umum'),
(177, '2022-03-04', 'Gaji Karyawan Umum', '93.01.01.01', '168125636', 'Gaji Karyawan Tetap Maret 22', '2706463126', '2538337490', 'Umum'),
(178, '2022-03-04', 'Gaji Karyawan Umum', '93.01.01.01', '8642856', 'Gaji Karyawan Kontrak kurang byr Maret', '2538337490', '2529694634', 'Umum'),
(179, '2022-04-20', 'Gaji Karyawan Umum', '93.01.01.01', '15000000', 'Gaji Konsultan April 22', '2529694634', '2514694634', 'Umum'),
(180, '2022-04-20', 'Gaji Karyawan Umum', '93.01.01.01', '52189710', 'Gaji Karyawan Kontrak April 22', '2514694634', '2462504924', 'Umum'),
(181, '2022-04-20', 'Gaji Karyawan Umum', '93.01.01.01', '168877987', 'Gaji Karyawan Tetap April 22', '2462504924', '2293626937', 'Umum'),
(182, '2022-05-23', 'Gaji Karyawan Umum', '93.01.01.01', '15000000', 'Gaji Konsultan Mei 22', '2293626937', '2278626937', 'Umum'),
(183, '2022-05-23', 'Gaji Karyawan Umum', '93.01.01.01', '52189710', 'Gaji Karyawan Kontrak Mei 22', '2278626937', '2226437227', 'Umum'),
(184, '2022-05-23', 'Gaji Karyawan Umum', '93.01.01.01', '168287887', 'Gaji Karyawan Tetap Mei 22', '2226437227', '2058149340', 'Umum');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rka`
--

CREATE TABLE `rka` (
  `id` int(40) NOT NULL,
  `tanggal` date NOT NULL,
  `nobukti` varchar(250) NOT NULL,
  `pengeluaran1` varchar(250) NOT NULL,
  `pengeluaran2` varchar(250) NOT NULL,
  `pengeluaran3` varchar(250) NOT NULL,
  `pengeluaran4` varchar(250) NOT NULL,
  `pengeluaran5` varchar(250) NOT NULL,
  `pengeluaran6` varchar(250) NOT NULL,
  `pengeluaran7` varchar(250) NOT NULL,
  `jumlahpengeluaran` varchar(250) NOT NULL,
  `pengembalian1` varchar(250) NOT NULL,
  `pengembalian2` varchar(250) NOT NULL,
  `pengembalian3` varchar(250) NOT NULL,
  `pengembalian4` varchar(250) NOT NULL,
  `pengembalian5` varchar(250) NOT NULL,
  `jumlahpengembalian` varchar(250) NOT NULL,
  `jumlahbayar` varchar(250) NOT NULL,
  `bayarkepada` varchar(250) NOT NULL,
  `uangsejumlah` varchar(250) NOT NULL,
  `untuk1` varchar(250) NOT NULL,
  `untuk2` varchar(250) NOT NULL,
  `untuk3` varchar(250) NOT NULL,
  `untuk4` varchar(250) NOT NULL,
  `dasarpembayaran` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rka`
--

INSERT INTO `rka` (`id`, `tanggal`, `nobukti`, `pengeluaran1`, `pengeluaran2`, `pengeluaran3`, `pengeluaran4`, `pengeluaran5`, `pengeluaran6`, `pengeluaran7`, `jumlahpengeluaran`, `pengembalian1`, `pengembalian2`, `pengembalian3`, `pengembalian4`, `pengembalian5`, `jumlahpengembalian`, `jumlahbayar`, `bayarkepada`, `uangsejumlah`, `untuk1`, `untuk2`, `untuk3`, `untuk4`, `dasarpembayaran`) VALUES
(1, '2022-06-08', '1', '100.000,00', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', 'rfa', '1', 'a', 'a', 'a', 'ucok', 'masjid'),
(2, '2022-06-01', '10', '100.000,00', '200.300,00', '300.000,00', '-', '-', '-', '-', '600.900,00', '-', '-', '-', '-', '-', '-', '600.900,00', 'rfa', '233', 'ucok', 'q', '-', '-', 'masjid');

-- --------------------------------------------------------

--
-- Struktur dari tabel `umum`
--

CREATE TABLE `umum` (
  `id` int(40) NOT NULL,
  `tanggal` date NOT NULL,
  `mataanggaran` varchar(250) NOT NULL,
  `kodeanggaran` varchar(250) NOT NULL,
  `nilaikegiatan` varchar(250) NOT NULL,
  `kegiatan` varchar(1000) NOT NULL,
  `saldoawal` varchar(250) NOT NULL,
  `saldoakhir` varchar(250) NOT NULL,
  `pic` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(16) NOT NULL,
  `login` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `role` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `login`, `password`, `role`) VALUES
(6, 'Muhammad Raffa', 'mraffayahfazhka@gmail.com', '202cb962ac59075b964b07152d234b70', 1),
(21, 'Medium', 'muhammadraffayahfazhka@gmail.com', '202cb962ac59075b964b07152d234b70', 2),
(24, 'Medium', 'admin@admin.com', '202cb962ac59075b964b07152d234b70', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `hpp`
--
ALTER TABLE `hpp`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `input`
--
ALTER TABLE `input`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rekapitulasi`
--
ALTER TABLE `rekapitulasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rka`
--
ALTER TABLE `rka`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `umum`
--
ALTER TABLE `umum`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `hpp`
--
ALTER TABLE `hpp`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `input`
--
ALTER TABLE `input`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT untuk tabel `rekapitulasi`
--
ALTER TABLE `rekapitulasi`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;

--
-- AUTO_INCREMENT untuk tabel `rka`
--
ALTER TABLE `rka`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `umum`
--
ALTER TABLE `umum`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
