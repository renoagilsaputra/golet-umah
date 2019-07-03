-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Jul 2019 pada 15.49
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `golet-umah`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `activity_log`
--

CREATE TABLE `activity_log` (
  `id_al` int(11) NOT NULL,
  `id_pemilik` int(11) NOT NULL,
  `id_rumah` int(11) NOT NULL,
  `id_perumahan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `activity_log`
--

INSERT INTO `activity_log` (`id_al`, `id_pemilik`, `id_rumah`, `id_perumahan`, `id_user`, `waktu`) VALUES
(5, 2, 15, 11, 3, '2019-07-02 07:17:44'),
(6, 2, 16, 12, 3, '2019-07-02 07:18:14'),
(7, 2, 15, 11, 3, '2019-07-02 07:19:44'),
(8, 2, 15, 11, 3, '2019-07-02 07:19:52'),
(9, 2, 15, 11, 3, '2019-07-02 08:11:34'),
(10, 2, 15, 11, 3, '2019-07-02 08:20:29'),
(11, 2, 15, 11, 3, '2019-07-02 10:41:45'),
(12, 2, 15, 11, 3, '2019-07-02 15:23:31'),
(13, 2, 15, 11, 3, '2019-07-02 15:24:24'),
(14, 2, 15, 11, 3, '2019-07-03 12:00:04'),
(15, 2, 15, 11, 3, '2019-07-03 12:00:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bukutamu`
--

CREATE TABLE `bukutamu` (
  `id_bukutamu` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pesan` text NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bukutamu`
--

INSERT INTO `bukutamu` (`id_bukutamu`, `nama`, `email`, `pesan`, `waktu`) VALUES
(1, 'Ulung', 'ulung@gmail.com', 'ini pesan', '2019-07-02 07:44:22'),
(2, 'ulung', 'ulung@gmail.com', 'dlsfmklsdfm', '2019-07-02 15:22:34'),
(3, 'Happy Year', 'hyear@gmail.com', 'halo ini saya', '2019-07-02 17:15:21'),
(4, 'Happy Year', 'hyear@gmail.com', 'hai', '2019-07-03 06:56:10'),
(5, 'asdk', 'askd@gmail.com', 'skadlsakld', '2019-07-03 11:55:39'),
(6, 'ulung', 'ulung@gmail.com', 'Aku ingin pergi kebulan', '2019-07-03 11:58:27'),
(7, 'Happy Year', 'hyear@gmail.com', 'Aku punya bug bang', '2019-07-03 12:01:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perumahan`
--

CREATE TABLE `perumahan` (
  `id_perumahan` int(11) NOT NULL,
  `nama_perumahan` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `embed` text NOT NULL,
  `id_user` int(11) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `perumahan`
--

INSERT INTO `perumahan` (`id_perumahan`, `nama_perumahan`, `alamat`, `embed`, `id_user`, `slug`, `waktu`) VALUES
(11, 'Arcawinangun', 'Arcawinangun, Kec. Purwokerto Tim., Kabupaten Banyumas, Jawa Tengah 53123', 'https://www.google.com/maps/place/Perumahan+Arcawinangun+Estate/@-7.4140614,109.254459,17z/data=!3m1!4b1!4m5!3m4!1s0x2e655eeb06ad779f:0xe5ded4987b1cd487!8m2!3d-7.4140614!4d109.2566477', 2, 'arcawinangun', '2019-06-30 12:56:41'),
(12, 'Bumi Arca Indah', 'Jl. BAI Raya No.2 a, Arcawinangun, Kec. Purwokerto Tim., Kabupaten Banyumas, Jawa Tengah 53113', 'https://www.google.com/maps/place/Perum+Bumi+Arca+Indah+(BAI)/@-7.4158754,109.2537989,17z/data=!3m1!4b1!4m5!3m4!1s0x2e655eea9f60163f:0xb75034f40777ac5b!8m2!3d-7.4158754!4d109.2559876', 2, 'bumi-arca-indah', '2019-06-30 12:58:36'),
(14, 'Puri Hijau', 'Jl. Kyai H. Wahid Hasim, Windusara, Karangklesem, Kec. Purwokerto Sel., Kabupaten Banyumas, Jawa Tengah 53144', 'https://www.google.com/maps/place/Perumahan+Puri+Hijau/@-7.442823,109.2433641,17z/data=!3m1!4b1!4m5!3m4!1s0x2e655dbadeda49fb:0x58dea1a25695cfcf!8m2!3d-7.442823!4d109.2455528', 2, 'puri-hijau', '2019-06-30 15:19:11'),
(15, 'Puri Indah', 'Windusara, Karangklesem, Kec. Purwokerto Sel., Kabupaten Banyumas, Jawa Tengah 53144', 'https://www.google.com/maps/place/Perumahan+Puri+Indah+Blok+S,+Purwokerto+Selatan/@-7.4441067,109.2395895,17z/data=!3m1!4b1!4m5!3m4!1s0x2e655c2e9eeeb485:0x3f1e09ac42bd7bcf!8m2!3d-7.444112!4d109.2417782', 2, 'puri-indah', '2019-07-02 08:17:21'),
(16, 'Berkoh Indah', 'Jl. Beringin, Berkoh, Kec. Purwokerto Sel., Kabupaten Banyumas, Jawa Tengah 53146', 'https://www.google.com/maps/place/Perumahan+Berkoh+Indah/@-7.4335549,109.2578446,17z/data=!3m1!4b1!4m5!3m4!1s0x2e655e9b4dff9fc5:0x33a58454c5dd0e54!8m2!3d-7.4335602!4d109.2600333', 4, 'berkoh-indah', '2019-07-03 07:14:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_id`
--

CREATE TABLE `role_id` (
  `id` int(11) NOT NULL,
  `role_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `role_id`
--

INSERT INTO `role_id` (`id`, `role_id`) VALUES
(1, 'admin'),
(2, 'pemilik'),
(3, 'user');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rumah`
--

CREATE TABLE `rumah` (
  `id_rumah` int(11) NOT NULL,
  `nama_rumah` varchar(100) NOT NULL,
  `tipe` varchar(50) NOT NULL,
  `ukuran` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `harga` int(11) NOT NULL,
  `gambar` text NOT NULL,
  `id_perumahan` int(11) NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rumah`
--

INSERT INTO `rumah` (`id_rumah`, `nama_rumah`, `tipe`, `ukuran`, `keterangan`, `harga`, `gambar`, `id_perumahan`, `waktu`) VALUES
(15, 'Rumah kok', 'C11', '9x4', 'Kamar 5, Toilet 5', 25000000, '30-06-2019-rumah.jpg', 11, '2019-06-30 17:56:16'),
(16, 'Rumah Ana', 'D12', '10x10', 'Kamar 5, Toilet 5', 24000000, '30-06-2019-rumah2.jpg', 12, '2019-06-30 18:00:07'),
(18, 'Rumah Ku', 'A11', '3x8', 'Kamar 3, Toilet 1', 5000000, '30-06-2019-rumah1.jpg', 14, '2019-06-30 18:43:27'),
(19, 'Rumah Kevin', 'D27', '9x9', 'Kamar 3, Tolet 4', 50000000, '03-07-2019-rumah.jpg', 16, '2019-07-03 07:16:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `gender` enum('l','p') NOT NULL,
  `telp` varchar(50) NOT NULL,
  `role_id` int(11) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `username`, `password`, `gender`, `telp`, `role_id`, `gambar`) VALUES
(1, 'admin', 'renoagilsaputra87@gmail.com', 'admin', '$2y$10$xjO5E9JyhsYhZQdf/Y/s.ef/aWWR41JIZL5PbpnhlJ5SmqGIP8zPm', 'l', '083863447918', 1, '02-07-2019-user.jpg'),
(2, 'ulung', 'ulung@gmail.com', 'ulung', '$2y$10$hGzFb8gJM3sqXTtPys6ANehVEvX45Od12hnUntrhO8.Xax1E32zqe', 'p', '6285325600342', 2, '01-07-2019-user.jpg'),
(3, 'Happy Year', 'hyear@gmail.com', 'hyear', '$2y$10$YBMJV2Tw75ieRyjZVPW2Mu/iuxRG5IF.5.4HLEiBAQHxblwbr.30S', 'l', '081327654673', 3, '03-07-2019-user.jpg'),
(4, 'Kevin Hemas', 'hemas@gmail.com', 'kevin', '$2y$10$aZe1eRQ.Avf7MKsBqkIyK.Ta/IiTTAGI4SGj9LnPZyZBdgoJLE0w2', 'l', '6281226433640', 2, '03-07-2019-user.jpeg'),
(5, 'meli', 'melianadewi22@gmail.com', 'meliandewi', '$2y$10$gHEX2sjvOZiPFSw6DI0cjeYOBbcpBSZh7JA7Rk19nx7VOsfcYYPU2', 'p', '082176893464', 2, '03-07-2019-user1.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id_al`);

--
-- Indeks untuk tabel `bukutamu`
--
ALTER TABLE `bukutamu`
  ADD PRIMARY KEY (`id_bukutamu`);

--
-- Indeks untuk tabel `perumahan`
--
ALTER TABLE `perumahan`
  ADD PRIMARY KEY (`id_perumahan`);

--
-- Indeks untuk tabel `role_id`
--
ALTER TABLE `role_id`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rumah`
--
ALTER TABLE `rumah`
  ADD PRIMARY KEY (`id_rumah`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id_al` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `bukutamu`
--
ALTER TABLE `bukutamu`
  MODIFY `id_bukutamu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `perumahan`
--
ALTER TABLE `perumahan`
  MODIFY `id_perumahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `role_id`
--
ALTER TABLE `role_id`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `rumah`
--
ALTER TABLE `rumah`
  MODIFY `id_rumah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
