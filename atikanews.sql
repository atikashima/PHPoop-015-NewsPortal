-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Bulan Mei 2020 pada 10.19
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tutorial`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `navbar_title`
--

CREATE TABLE `navbar_title` (
  `id_navbar` tinyint(4) NOT NULL DEFAULT 1,
  `navbar_header` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `navbar_title`
--

INSERT INTO `navbar_title` (`id_navbar`, `navbar_header`) VALUES
(1, 'ATIKA NEWS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `news`
--

CREATE TABLE `news` (
  `id_news` int(11) NOT NULL,
  `judul_berita` varchar(50) NOT NULL,
  `news` text NOT NULL,
  `date` datetime NOT NULL,
  `author` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `news`
--

INSERT INTO `news` (`id_news`, `judul_berita`, `news`, `date`, `author`) VALUES
(5, 'DIDI KEMPOT MENINGGAL DUNIA', 'Penyanyi campursari Didi Kempot meninggal dunia di Solo, Jawa Tengah, Selasa (5/5/2020). Didi Kempot diketahui meninggal dunia pada usia 53 tahun pukul 07.30 WIB.', '2020-05-09 01:03:01', 'atika'),
(6, 'Puncaki Chart, IU feat Suga BTS - Eight ', 'Setelah mengumumkan akan melakukan kolaborasi pada bulan April lalu, IU dan Suga BTS akhirnya menjawab rasa penasaran para penggemar dari dua fandom di tanggal 6 Mei 2020. Rapper BTS tersebut bukan hanya menyumbangkan suaranya melainkan menjadi produser lagu Eight.', '2020-05-09 01:06:54', 'atika');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `role` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `nama_lengkap`, `alamat`, `role`) VALUES
(14, 'atika', '$2y$10$zskdqHS95.dFMTsX0aHHCO9qoQPEiddh/arcNL6TpHsok0o1wlTyK', 'Atika', 'Krembangan Jaya', 1),
(15, 'Shima', '$2y$10$QkKlRWJjdnIlAt78FW/ECuNTSZvi87Wvqvwb4lq89iF9TNvcii.3C', 'shima', 'krembangan jaya utara', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `video`
--

CREATE TABLE `video` (
  `id_video` int(11) NOT NULL,
  `nama_video` varchar(150) CHARACTER SET latin1 NOT NULL,
  `link_video` longtext CHARACTER SET latin1 NOT NULL,
  `isi_news` varchar(150) CHARACTER SET latin1 NOT NULL,
  `date` datetime NOT NULL,
  `author` varchar(30) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `video`
--

INSERT INTO `video` (`id_video`, `nama_video`, `link_video`, `isi_news`, `date`, `author`) VALUES
(9, 'Update Corona 08 Mei', 'https://www.youtube-nocookie.com/embed/c6eY14YI56A', 'Berikut perkembangan terkini penyebaran virus corona per Jumat, 8 Mei 2020, yang positif, sembuh dan meninggal.', '2020-05-09 00:57:06', 'atika'),
(10, 'POCONG MASUK BERITA KOREA', 'https://www.youtube-nocookie.com/embed/2V2_7vKmY1o', 'Vlog Penjelasan Pocong masuk berita korea', '2020-05-09 01:00:22', 'atika');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id_news`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id_video`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `news`
--
ALTER TABLE `news`
  MODIFY `id_news` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `video`
--
ALTER TABLE `video`
  MODIFY `id_video` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
