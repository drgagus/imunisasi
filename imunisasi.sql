-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Okt 2021 pada 14.31
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `imunisasi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_anak`
--

CREATE TABLE `data_anak` (
  `anak_id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `ibu` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `desa` int(3) NOT NULL,
  `posyandu` int(3) NOT NULL,
  `tahun` int(11) NOT NULL,
  `idl` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_anak`
--

INSERT INTO `data_anak` (`anak_id`, `nama`, `ibu`, `tanggal_lahir`, `jenis_kelamin`, `desa`, `posyandu`, `tahun`, `idl`) VALUES
(1, 'drg. Teuku Arya Shoufi', 'Yusfadia, Amd.AK', '2019-06-25', 'Laki-laki', 1, 1, 2020, 50),
(2, 'Nana', 'Sarima', '2019-01-10', '', 5, 8, 2020, 20),
(3, 'Cut asyfa', 'fadia', '2020-05-04', '', 1, 1, 2021, 0),
(8, 'Ara', 'Mega', '2020-05-07', '', 6, 9, 2019, 20),
(9, 'ulipe', 'ica', '2020-02-22', '', 2, 3, 2019, 0),
(10, 'Ahdan', 'umi', '2016-04-23', '', 1, 1, 2022, 30),
(11, 'Shafiq', 'Cut Azni', '2018-05-25', '', 100, 11, 0, 0),
(12, 'Shafiq2', 'Cut Azni z', '2018-05-21', '', 100, 11, 0, 10),
(14, 'Afifah Gita Samjaya', 'Diah Laras', '2014-08-03', 'Laki-laki', 1, 1, 2020, 0),
(15, 'Ola', 'Lamtiar', '2017-02-05', 'Laki-laki', 2, 4, 2020, 0),
(16, 'fikri', 'Ema', '2020-01-01', 'Laki-laki', 7, 10, 2020, 0),
(17, 'Afif', 'Emi', '2019-07-04', 'Laki-laki', 1, 1, 2020, 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `desa`
--

CREATE TABLE `desa` (
  `desa_id` int(2) NOT NULL,
  `desa` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `desa`
--

INSERT INTO `desa` (`desa_id`, `desa`) VALUES
(1, 'Desa Kelarik'),
(2, 'Desa Kelarik Utara'),
(3, 'Desa Kelarik Air Mali'),
(4, 'Desa Belakang Gunung'),
(5, 'Desa Gunung Durian'),
(6, 'Desa Teluk Buton'),
(7, 'Desa Seluan Barat'),
(8, 'Desa Kelarik Barat'),
(100, 'Pendatang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `imunisasi`
--

CREATE TABLE `imunisasi` (
  `imun_id` int(2) NOT NULL,
  `imunisasi` varchar(20) NOT NULL,
  `batas_usia` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `imunisasi`
--

INSERT INTO `imunisasi` (`imun_id`, `imunisasi`, `batas_usia`) VALUES
(1, 'HB-0', '0-7 hari'),
(2, 'BCG', '0-11 bulan'),
(3, 'Polio 1', '0-11 bulan'),
(4, 'DPT-HB-Hib 1', '2-11 bulan'),
(5, 'Polio 2', '2-11 bulan'),
(6, 'DPT-HB-Hib 2', '3-11 bulan'),
(7, 'Polio 3', '3-11 bulan'),
(8, 'DPT-HB-Hib 3', '4-11 bulan'),
(9, 'Polio 4', '4-11 bulan'),
(10, 'IPV', '4-11 bulan'),
(11, 'Campak', '9-11 bulan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kunjungan`
--

CREATE TABLE `kunjungan` (
  `id` int(11) NOT NULL,
  `anak` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `imunisasi` int(11) NOT NULL,
  `posyandu` int(11) NOT NULL,
  `nakes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kunjungan`
--

INSERT INTO `kunjungan` (`id`, `anak`, `tanggal`, `imunisasi`, `posyandu`, `nakes`) VALUES
(1, 2, '2020-05-01', 11, 1, 2),
(23, 1, '2019-06-25', 1, 0, 5),
(28, 1, '2020-05-14', 6, 5, 11),
(30, 1, '2020-05-06', 8, 5, 3),
(33, 8, '2020-05-20', 4, 2, 4),
(35, 8, '2020-05-21', 5, 1, 11),
(36, 10, '2020-05-21', 3, 1, 1),
(37, 10, '2020-05-07', 4, 1, 4),
(38, 10, '2020-05-20', 5, 100, 3),
(39, 11, '2020-05-12', 10, 9, 7),
(40, 12, '2020-05-20', 11, 1, 11),
(42, 1, '2020-05-05', 4, 1, 9),
(43, 17, '2020-05-24', 1, 0, 5),
(44, 1, '2020-05-24', 2, 1, 2),
(45, 2, '2019-03-02', 2, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `posyandu`
--

CREATE TABLE `posyandu` (
  `posyandu_id` int(3) NOT NULL,
  `posyandu` varchar(20) NOT NULL,
  `desa` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `posyandu`
--

INSERT INTO `posyandu` (`posyandu_id`, `posyandu`, `desa`) VALUES
(1, 'Sakura', 1),
(2, 'Kenanga', 2),
(3, 'Teratai', 2),
(4, 'Matahari', 2),
(5, 'Melati', 3),
(6, 'Dahlia', 3),
(7, 'Melur', 4),
(8, 'Mawar', 5),
(9, 'Putri Malu', 6),
(10, 'Anggrek', 7),
(11, 'Kemuning', 8),
(100, 'Sweeping', 100);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(2) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(125) NOT NULL,
  `role_id` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `nama`, `username`, `password`, `role_id`) VALUES
(1, 'Dalilawati, A.Md', 'dalilawati', '$2y$10$EuGbwwYrQvpRcoAcBNbjGupvTgvHQjTKKgHHuSn2EZQlrnD1DQL9.', 2),
(2, 'Wan Srikurniawati, AMK', 'wansrikurniawati', '$2y$10$EuGbwwYrQvpRcoAcBNbjGupvTgvHQjTKKgHHuSn2EZQlrnD1DQL9.', 2),
(3, 'Novi Niagawantri, A.Md.Kep', 'noviniagawantri', '$2y$10$EuGbwwYrQvpRcoAcBNbjGupvTgvHQjTKKgHHuSn2EZQlrnD1DQL9.', 2),
(4, 'Diah Ratri Larasati, S.Kep.Ners', 'diahratrilarasati', '$2y$10$EuGbwwYrQvpRcoAcBNbjGupvTgvHQjTKKgHHuSn2EZQlrnD1DQL9.', 2),
(5, 'Nurbaiti, A.Md.Keb', 'nurbaiti', '$2y$10$EuGbwwYrQvpRcoAcBNbjGupvTgvHQjTKKgHHuSn2EZQlrnD1DQL9.', 2),
(6, 'Dewi Friska Silalahi, AMd.Keb', 'dewifriskasilalahi', '$2y$10$EuGbwwYrQvpRcoAcBNbjGupvTgvHQjTKKgHHuSn2EZQlrnD1DQL9.', 2),
(7, 'Lamtiar Yunita Sirait, AMKeb', 'lamtiaryunitasirait', '$2y$10$EuGbwwYrQvpRcoAcBNbjGupvTgvHQjTKKgHHuSn2EZQlrnD1DQL9.', 2),
(8, 'Ester Sinaga, AMKeb', 'estersinaga', '$2y$10$EuGbwwYrQvpRcoAcBNbjGupvTgvHQjTKKgHHuSn2EZQlrnD1DQL9.', 2),
(9, 'Hayati, Am.Keb', 'hayati', '$2y$10$EuGbwwYrQvpRcoAcBNbjGupvTgvHQjTKKgHHuSn2EZQlrnD1DQL9.', 2),
(10, 'Sri Utami, AMdKeb', 'sriutami', '$2y$10$EuGbwwYrQvpRcoAcBNbjGupvTgvHQjTKKgHHuSn2EZQlrnD1DQL9.', 2),
(11, 'Muhammad Adlin, S.Kep. NERS', 'adlin', '$2y$10$EuGbwwYrQvpRcoAcBNbjGupvTgvHQjTKKgHHuSn2EZQlrnD1DQL9.', 1),
(12, 'Asmawati, AMK', 'asmawati', '$2y$10$EuGbwwYrQvpRcoAcBNbjGupvTgvHQjTKKgHHuSn2EZQlrnD1DQL9.', 2),
(13, 'Ica, AMd.Kep', 'icaica', '$2y$10$EuGbwwYrQvpRcoAcBNbjGupvTgvHQjTKKgHHuSn2EZQlrnD1DQL9.', 2),
(14, 'Sadri, AMK', 'sadri', '$2y$10$EuGbwwYrQvpRcoAcBNbjGupvTgvHQjTKKgHHuSn2EZQlrnD1DQL9.', 2),
(15, 'Yuli Herlina, A.Md.keb', 'yuliherlina', '$2y$10$EuGbwwYrQvpRcoAcBNbjGupvTgvHQjTKKgHHuSn2EZQlrnD1DQL9.', 2),
(16, 'Zumidar, Amk', 'zumidar', '$2y$10$EuGbwwYrQvpRcoAcBNbjGupvTgvHQjTKKgHHuSn2EZQlrnD1DQL9.', 2),
(17, 'Sinta Novita, A.Md.Keb', 'sintanovita', '$2y$10$EuGbwwYrQvpRcoAcBNbjGupvTgvHQjTKKgHHuSn2EZQlrnD1DQL9.', 2),
(18, 'Nuriska, A.Md.Keb', 'nuriska', '$2y$10$EuGbwwYrQvpRcoAcBNbjGupvTgvHQjTKKgHHuSn2EZQlrnD1DQL9.', 2),
(19, 'Hayati , Amd.kep', 'hayatiseluan', '$2y$10$EuGbwwYrQvpRcoAcBNbjGupvTgvHQjTKKgHHuSn2EZQlrnD1DQL9.', 2),
(20, 'Selamat Datang', 'kelarik', '$2y$10$EuGbwwYrQvpRcoAcBNbjGupvTgvHQjTKKgHHuSn2EZQlrnD1DQL9.', 3);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_anak`
--
ALTER TABLE `data_anak`
  ADD PRIMARY KEY (`anak_id`);

--
-- Indeks untuk tabel `desa`
--
ALTER TABLE `desa`
  ADD PRIMARY KEY (`desa_id`);

--
-- Indeks untuk tabel `imunisasi`
--
ALTER TABLE `imunisasi`
  ADD PRIMARY KEY (`imun_id`);

--
-- Indeks untuk tabel `kunjungan`
--
ALTER TABLE `kunjungan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `posyandu`
--
ALTER TABLE `posyandu`
  ADD PRIMARY KEY (`posyandu_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_anak`
--
ALTER TABLE `data_anak`
  MODIFY `anak_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `desa`
--
ALTER TABLE `desa`
  MODIFY `desa_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT untuk tabel `imunisasi`
--
ALTER TABLE `imunisasi`
  MODIFY `imun_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `kunjungan`
--
ALTER TABLE `kunjungan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `posyandu`
--
ALTER TABLE `posyandu`
  MODIFY `posyandu_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
