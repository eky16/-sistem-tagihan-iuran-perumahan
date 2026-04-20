-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 28 Mei 2021 pada 06.46
-- Versi Server: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lellang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `info_bayar`
--

CREATE TABLE `info_bayar` (
  `id` int(20) NOT NULL,
  `id_warga` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nama` varchar(25) NOT NULL,
  `kebersihan` varchar(20) NOT NULL,
  `masjid` varchar(20) NOT NULL,
  `tenda` varchar(35) NOT NULL,
  `tambahan` varchar(150) NOT NULL,
  `status` enum('sudah_bayar','belom_bayar','menunggu_verifikasi','') NOT NULL,
  `total` varchar(50) NOT NULL,
  `bukti_pembayaran` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `info_bayar`
--

INSERT INTO `info_bayar` (`id`, `id_warga`, `tanggal`, `nama`, `kebersihan`, `masjid`, `tenda`, `tambahan`, `status`, `total`, `bukti_pembayaran`) VALUES
(44, 22, '2021-04-07', 'Yanto', '5000', '5000', '5000', '5000', 'sudah_bayar', '20000', ''),
(46, 19, '2021-04-09', 'Rian', '15000', '10000', '5000', '10000', 'belom_bayar', '40000', ''),
(47, 23, '2021-05-04', 'Supriatna', '15000', '5000', '5000', '10000', 'sudah_bayar', '35000', ''),
(48, 22, '2021-04-09', 'Yanto', '5000', '5000', '5000', '1000', 'belom_bayar', '16000', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `info_iuran`
--

CREATE TABLE `info_iuran` (
  `id` int(15) NOT NULL,
  `jenis_iuran` varchar(25) NOT NULL,
  `pembayaran` varchar(10) NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `kendaraan` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `info_iuran`
--

INSERT INTO `info_iuran` (`id`, `jenis_iuran`, `pembayaran`, `keterangan`, `kendaraan`) VALUES
(1, 'iuran sampah', '15.000', 'untuk membayar petugas kebersihan', 'Motor'),
(2, 'iuran sampah', '20.000', 'untuk membayar petugas kebersihan', 'Mobil'),
(4, 'Iuran Masjid', '10.000', 'untuk membayar pembangunan masjid atau uang kematian', '-'),
(5, 'kas', '5.000', 'digunakan jika ada sesuatu yang tiba-tiba dibutuhkan', '-'),
(6, 'Iuran Keamanan', '30.000', 'Untuk membayar petugas keamanan', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan_kas`
--

CREATE TABLE `laporan_kas` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(150) NOT NULL,
  `pemasukan` int(10) NOT NULL,
  `pengeluaran` int(10) NOT NULL,
  `saldo` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `laporan_kas`
--

INSERT INTO `laporan_kas` (`id`, `tanggal`, `keterangan`, `pemasukan`, `pengeluaran`, `saldo`) VALUES
(1, '2021-01-18', 'Untuk bayar kebersihan', 5000000, 3000000, 2000000),
(2, '2020-08-16', 'Untuk membayar kegiatan 17 Agustus', 4000000, 400000, 3600000),
(3, '2021-04-16', 'untuk membayar petugas kebersihan', 7000000, 200000, 6800000),
(5, '2021-07-01', 'untuk membayar petugas kebersihan', 3000000, 500000, 2500000),
(7, '2021-04-09', 'untuk membayar pembangunan masjid', 12000000, 8000000, 4000000),
(8, '2021-04-15', 'qwqwqw1', 10000, 2000, 8000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(15) NOT NULL,
  `namawarga` varchar(25) NOT NULL,
  `tanggal` date NOT NULL,
  `jalan` varchar(35) NOT NULL,
  `blok` int(10) NOT NULL,
  `total` varchar(20) NOT NULL,
  `status` enum('sudah_bayar','menunggu_verifikasi','belom_bayar','') NOT NULL,
  `sampah` varchar(20) NOT NULL,
  `masjid` varchar(20) NOT NULL,
  `tenda` varchar(20) NOT NULL,
  `tambahan` varchar(20) NOT NULL,
  `bukti_pembayaran` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id` int(12) NOT NULL,
  `id_user` int(25) NOT NULL,
  `address` varchar(250) NOT NULL,
  `post_code` int(10) NOT NULL,
  `email` varchar(35) NOT NULL,
  `password` varchar(15) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `nomor_handphone` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendataan`
--

CREATE TABLE `pendataan` (
  `id` int(15) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_kepala_keluarga` varchar(30) NOT NULL,
  `blok` varchar(10) NOT NULL,
  `jalan` varchar(18) NOT NULL,
  `handphone` varchar(17) NOT NULL,
  `kendaraan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pendataan`
--

INSERT INTO `pendataan` (`id`, `id_user`, `nama_kepala_keluarga`, `blok`, `jalan`, `handphone`, `kendaraan`) VALUES
(5, 0, 'Gunawan', 'EM.02', 'Jalan anggrek 1', '081224789012', 'Motor'),
(8, 19, 'Rian', 'EM.03', 'Jalan Anggrek 1', '082297754524', 'Motor'),
(11, 22, 'Yanto', 'EM.01', 'Jalan Anggrek 1', '08129045023', 'Mobil'),
(12, 23, 'Supriatna', 'EM.04', 'Jalan Anggrek 1', '081317497304', 'Mobil'),
(13, 24, 'Dedi Supriadi', 'EM.05', 'Jalan Anggrek 1', '08158768503', 'Motor'),
(14, 25, 'Sanu Jaya', 'EM.06', 'Jalan Anggrek 1', '0816667716', 'Motor'),
(15, 26, 'Djoni Lasiman', 'EM.07', 'Jalan Anggrek 1', '0818826056', 'Motor'),
(16, 27, 'Deddy Winarto', 'EM.08', 'Jalan Anggrek 1', '081908231545', 'Motor'),
(17, 28, 'Jefri Baisia', 'EM.09', 'Jalan Anggrek 1', '082299584649', 'Mobil'),
(18, 29, 'Andre Kurniawan', 'EM.10', 'Jalan Anggrek 1', '083871687676', 'Motor'),
(19, 30, 'Ferry Thio', 'EM.11', 'Jalan Anggrek 2', '085105010952', 'Mobil'),
(20, 31, 'Kiantoro Agis', 'EM.12', 'Jalan Anggrek 2', '087830080902', 'Motor'),
(21, 32, 'Sanusi', 'EM.13', 'Jalan Anggrek 2', '087879092082', 'Mobil'),
(22, 33, 'Rahmad', 'EM.14', 'Jalan Anggrek 2', '08111730189', 'Motor'),
(23, 34, 'Santoso', 'EM.15', 'Jalan Anggrek 2', '081218046477', 'Mobil'),
(24, 35, 'Ari Lolongan', 'EM.16', 'Jalan Anggrek 2', '081377823900', 'Mobil'),
(25, 36, 'Prima', 'EM.17', 'Jalan Anggrek 2', '2147483647', 'Motor'),
(26, 37, 'Nurahman', 'EM.18', 'Jalan Anggrek 2', '085262323000', 'Motor'),
(27, 38, 'wibu', 'em3', 'bunga', '2147483647', 'motor');

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `nama_bendahara` varchar(50) NOT NULL,
  `nama_rt` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `setting`
--

INSERT INTO `setting` (`id`, `nama_bendahara`, `nama_rt`) VALUES
(1, 'Yulia ', 'Aditya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_bank`
--

CREATE TABLE `tb_bank` (
  `id` int(11) NOT NULL,
  `nama_bank` varchar(11) NOT NULL,
  `nama_pemilik_rek` varchar(25) NOT NULL,
  `no_rek` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_bank`
--

INSERT INTO `tb_bank` (`id`, `nama_bank`, `nama_pemilik_rek`, `no_rek`) VALUES
(1, 'BRI', 'Yuli Setyawati', '549827272916427'),
(2, 'MANDIRI', 'Nunung Nuridah', '8392751237254');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_bukti_bayar`
--

CREATE TABLE `tb_bukti_bayar` (
  `id` int(20) NOT NULL,
  `id_bayar` int(25) NOT NULL,
  `id_rekening_tujuan` int(25) NOT NULL,
  `id_buti_bayar` int(20) NOT NULL,
  `nama_pengirim` varchar(25) NOT NULL,
  `no_rek_pengirim` varchar(25) NOT NULL,
  `bank_pengirim` varchar(10) NOT NULL,
  `struk_transfer` varchar(500) NOT NULL,
  `bukti_bayaran` varchar(20) NOT NULL,
  `rekening_tujuan` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_bukti_bayar`
--

INSERT INTO `tb_bukti_bayar` (`id`, `id_bayar`, `id_rekening_tujuan`, `id_buti_bayar`, `nama_pengirim`, `no_rek_pengirim`, `bank_pengirim`, `struk_transfer`, `bukti_bayaran`, `rekening_tujuan`) VALUES
(40, 44, 1, 0, 'Yanto', '92754285748295', 'BRI', '383-Absen4.png', '', ''),
(43, 47, 1, 0, 'Supriatna', '721201921', 'BCA', '995-ucapan selamat hari_kartini.PNG', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `id_user` int(20) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(125) NOT NULL,
  `tingkatan` enum('admin','bendahara','pengguna','','') NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` varchar(59) NOT NULL,
  `handphone` varchar(15) NOT NULL,
  `post_code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `id_user`, `username`, `password`, `tingkatan`, `email`, `alamat`, `handphone`, `post_code`) VALUES
(16, 0, 'diyah', '5f4dcc3b5aa765d61d8327deb882cf99', 'bendahara', 'diyah@gmail.com', 'tangerang', '085777909090', '4545'),
(17, 0, 'Gunawan', '5f4dcc3b5aa765d61d8327deb882cf99', 'pengguna', 'Gunawan@gmail.com', 'tangerang', '0-9284233', '2133'),
(19, 8, 'Rian', '5f4dcc3b5aa765d61d8327deb882cf99', 'pengguna', 'Rian@gmail.com', 'Bumi Indah', '081277302861', '15560'),
(21, 0, 'Eky Riswandiyah', '5f4dcc3b5aa765d61d8327deb882cf99', 'admin', 'ekyriswandiyah@gmail.com', 'Bumi Indah', '085777983026', '15560'),
(22, 0, 'Yanto', '5f4dcc3b5aa765d61d8327deb882cf99', 'pengguna', 'Yanto@gmail.com', 'Bumi Indah', '081224789012', '15560'),
(23, 0, 'Supriatna', '5f4dcc3b5aa765d61d8327deb882cf99', 'pengguna', 'Supriatna@gmail.com', 'Bumi Indah', '082276399127', '15560'),
(24, 0, 'Dedi', '5f4dcc3b5aa765d61d8327deb882cf99', 'pengguna', 'Dedi@gmail.com', 'Bumi Indah', '08158201122', '15560'),
(25, 0, 'Sanu', '5f4dcc3b5aa765d61d8327deb882cf99', 'pengguna', 'Sanu@hmail.com', 'Bumi Indah', '08159657676', '15560'),
(26, 0, 'Djoni', '5f4dcc3b5aa765d61d8327deb882cf99', 'pengguna', 'Djoni@gmail.com', 'Bumi Indah', '082246209422', '15560'),
(27, 0, 'Deddy', '5f4dcc3b5aa765d61d8327deb882cf99', 'pengguna', 'Deddy@gmail.com', 'Bumi Indah', '085695713301', '15560'),
(28, 0, 'Jefri', '5f4dcc3b5aa765d61d8327deb882cf99', 'pengguna', 'Jefri@gmail.com', 'Bumi Indah', '082312721849', '15560'),
(29, 0, 'Andre', '5f4dcc3b5aa765d61d8327deb882cf99', 'pengguna', 'Andre@gmail.com', 'Bumi Indah', '082299584696', '15560'),
(30, 0, 'Ferry', '5f4dcc3b5aa765d61d8327deb882cf99', 'pengguna', 'Ferry@gmail.com', 'Bumi Indah', '087830080902', '15560'),
(31, 0, 'Kiantoro', '5f4dcc3b5aa765d61d8327deb882cf99', 'pengguna', 'Kiantoro@gmail.com', 'Bumi Indah', '081519457200', '15560'),
(32, 0, 'Sanusi', '5f4dcc3b5aa765d61d8327deb882cf99', 'pengguna', 'sanusi@gmail.com', 'Bumi Indah', '081305490000', '15560'),
(33, 0, 'Rahmad', '5f4dcc3b5aa765d61d8327deb882cf99', 'pengguna', 'rahmad@gmail.com', 'Bumi Indah', '082246682011', '15560'),
(34, 0, 'Santoso', '5f4dcc3b5aa765d61d8327deb882cf99', 'pengguna', 'santoso@gmail.com', 'Bumi Indah', '081377823900', '15560'),
(35, 0, 'Ari', '5f4dcc3b5aa765d61d8327deb882cf99', 'pengguna', 'ari@gmail.com', 'Bumi Indah', '082388995000', '15560'),
(36, 0, 'Prima', '5f4dcc3b5aa765d61d8327deb882cf99', 'pengguna', 'prima@gmail.com', 'Bumi Indah', '082186346628', '15560'),
(37, 0, 'Nurahman', '5f4dcc3b5aa765d61d8327deb882cf99', 'pengguna', 'nurahman@gmail.com', 'Bumi Indah', '082152881306', '15560'),
(38, 0, 'wibu', '3193552c1f44766e9e69f441afd008dc', 'pengguna', 'wibu@gmail.com', 'bumi indah', '085238948732', '15560');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `info_bayar`
--
ALTER TABLE `info_bayar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `info_iuran`
--
ALTER TABLE `info_iuran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laporan_kas`
--
ALTER TABLE `laporan_kas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendataan`
--
ALTER TABLE `pendataan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_bank`
--
ALTER TABLE `tb_bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_bukti_bayar`
--
ALTER TABLE `tb_bukti_bayar`
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
-- AUTO_INCREMENT for table `info_bayar`
--
ALTER TABLE `info_bayar`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `info_iuran`
--
ALTER TABLE `info_iuran`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `laporan_kas`
--
ALTER TABLE `laporan_kas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pendataan`
--
ALTER TABLE `pendataan`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_bank`
--
ALTER TABLE `tb_bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_bukti_bayar`
--
ALTER TABLE `tb_bukti_bayar`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
