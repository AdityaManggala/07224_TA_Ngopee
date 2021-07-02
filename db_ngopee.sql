-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Jul 2021 pada 02.03
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ngopee`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun_bank`
--

CREATE TABLE `akun_bank` (
  `akunbank_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `akunbank_norek` varchar(255) DEFAULT NULL,
  `akunbank_pemilik` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `akun_bank`
--

INSERT INTO `akun_bank` (`akunbank_id`, `user_id`, `akunbank_norek`, `akunbank_pemilik`) VALUES
(4, 111, '123456789', 'asdfg'),
(6, 118, '0987651234', 'tes'),
(7, 120, '0987654456', 'orida');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `kopi_id` char(5) NOT NULL,
  `transaksi_id` char(6) NOT NULL,
  `qty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`kopi_id`, `transaksi_id`, `qty`) VALUES
('KP001', 'TRX001', 6),
('KP002', 'TRX001', 5),
('KP003', 'TRX002', 2),
('KP006', 'TRX002', 1),
('KP006', 'TRX004', 1),
('KP002', 'TRX004', 1),
('KP007', 'TRX001', 2),
('KP001', 'TRX005', 1),
('KP002', 'TRX005', 1),
('KP005', 'TRX003', 1),
('KP007', 'TRX003', 1),
('KP004', 'TRX003', 1),
('KP003', 'TRX003', 2),
('KP006', 'TRX007', 1),
('KP004', 'TRX007', 1),
('KP001', 'TRX007', 1),
('KP001', 'TRX009', 2),
('KP002', 'TRX009', 1),
('KP003', 'TRX009', 2),
('KP004', 'TRX009', 1),
('KP001', 'TRX008', 2),
('KP002', 'TRX008', 1),
('KP003', 'TRX008', 1),
('KP001', 'TRX010', 2),
('KP002', 'TRX010', 2),
('KP003', 'TRX010', 1),
('KP001', 'TRX011', 2),
('KP002', 'TRX011', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_produk`
--

CREATE TABLE `jenis_produk` (
  `jenisproduk_id` int(11) NOT NULL,
  `jenisproduk_nama` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis_produk`
--

INSERT INTO `jenis_produk` (`jenisproduk_id`, `jenisproduk_nama`) VALUES
(1, 'Espresso'),
(4, 'Brewed Coffee');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kopi`
--

CREATE TABLE `kopi` (
  `kopi_id` char(5) NOT NULL,
  `jenisproduk_id` int(11) DEFAULT NULL,
  `kopi_nama` varchar(100) DEFAULT NULL,
  `kopi_harga` int(11) DEFAULT NULL,
  `kopi_gambar` varchar(255) DEFAULT NULL,
  `kopi_keterangan` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kopi`
--

INSERT INTO `kopi` (`kopi_id`, `jenisproduk_id`, `kopi_nama`, `kopi_harga`, `kopi_gambar`, `kopi_keterangan`) VALUES
('KP001', 1, 'Caffè Latte', 20000, 'Caffè Latte.jpg', 'Rich, full-bodied espresso in steamed milk, lightly topped with foam. '),
('KP002', 1, 'Cappuccino', 25000, 'Cappuccino.jpg', 'Espresso with steamed milk, topped with a deep layer of foam.'),
('KP003', 1, 'Caramel Macchiato', 25000, 'Caramel Macchiato.jpg', 'Espresso combined with vanilla-flavoured syrup, milk and caramel sauce over ice.'),
('KP004', 1, 'Caffè Americano', 25000, 'Caffè Americano.jpg', 'HOT: Rich, full-bodied espresso with hot water.'),
('KP005', 1, 'Flat White', 25000, 'Flat White.jpg', 'Expertly steamed milk poured over a double shot of our signature espresso and finished with a thin layer of velvety microfoam.'),
('KP006', 4, 'Misto', 25000, 'Misto.jpg', 'Equal parts fresh filter coffee and frothy steamed milk.'),
('KP007', 4, 'Vanilla Sweet Cream Cold Brew', 30000, 'Vanilla Sweet Cream Cold Brew.jpg', 'slow-steeped Cold Brew is topped with a delicate float of house-made vanilla sweet cream that cascades throughout the cup.'),
('KP008', 1, 'Freshly Brewed Coffee', 50000, 'Freshly Brewed Coffee.jpg', 'Enjoy our rich, flavorful brewed coffees any time of day. ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kurir`
--

CREATE TABLE `kurir` (
  `kurir_id` int(11) NOT NULL,
  `kurir_desc` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kurir`
--

INSERT INTO `kurir` (`kurir_id`, `kurir_desc`) VALUES
(5, 'JNT'),
(7, 'gopud');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `pembayaran_id` char(6) NOT NULL,
  `akunbank_id` int(11) DEFAULT NULL,
  `transaksi_id` char(6) DEFAULT NULL,
  `pembayaran_nominaltrans` int(11) DEFAULT NULL,
  `pembayaran_buktitransfer` varchar(255) DEFAULT NULL,
  `pembayaran_keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`pembayaran_id`, `akunbank_id`, `transaksi_id`, `pembayaran_nominaltrans`, `pembayaran_buktitransfer`, `pembayaran_keterangan`) VALUES
('PMB001', 4, 'TRX001', 305000, 'TRX001.jpg', ''),
('PMB002', 7, 'TRX005', 45000, 'TRX005.jpg', ''),
('PMB003', 6, 'TRX003', 130000, 'TRX003.jpg', ''),
('PMB004', 4, 'TRX007', 70000, 'TRX007.jpg', ''),
('PMB005', 7, 'TRX009', 140000, 'TRX009.jpg', 'tes'),
('PMB006', 4, 'TRX008', 90000, 'TRX008.jpg', ''),
('PMB007', NULL, 'TRX010', NULL, NULL, NULL),
('PMB008', 4, 'TRX011', 65000, 'TRX011.jpg', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `role_id` char(1) NOT NULL,
  `role_desc` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`role_id`, `role_desc`) VALUES
('a', 'admin'),
('b', 'pembeli');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status`
--

CREATE TABLE `status` (
  `status_id` int(11) NOT NULL,
  `status_desc` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `status`
--

INSERT INTO `status` (`status_id`, `status_desc`) VALUES
(0, 'belum checkout'),
(1, 'belum bayar'),
(2, 'belum verif'),
(3, 'belum kirim'),
(4, 'terkirim'),
(5, 'Dibatalkan Admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `transaksi_id` char(6) NOT NULL,
  `pembeli_id` int(11) DEFAULT NULL,
  `kurir_id` int(11) DEFAULT NULL,
  `pembayaran_id` char(6) DEFAULT NULL,
  `admin_id` int(11) NOT NULL,
  `status_id` int(11) DEFAULT NULL,
  `transaksi_tgl` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`transaksi_id`, `pembeli_id`, `kurir_id`, `pembayaran_id`, `admin_id`, `status_id`, `transaksi_tgl`) VALUES
('TRX001', 111, 5, 'PMB001', 1, 4, '2021-06-27 05:48:28'),
('TRX002', 117, 0, '', 0, 0, '0000-00-00 00:00:00'),
('TRX003', 118, 5, 'PMB003', 1, 4, '2021-06-27 12:28:38'),
('TRX004', 119, 0, '', 0, 0, '0000-00-00 00:00:00'),
('TRX005', 120, 5, 'PMB002', 1, 4, '2021-06-27 12:28:04'),
('TRX006', 118, 0, '', 0, 0, '0000-00-00 00:00:00'),
('TRX007', 111, 5, 'PMB004', 1, 4, '2021-06-28 11:24:21'),
('TRX008', 111, 5, 'PMB006', 1, 4, '2021-06-30 07:32:14'),
('TRX009', 120, 5, 'PMB005', 1, 4, '2021-06-28 13:28:50'),
('TRX010', 111, 0, 'PMB007', 0, 1, '2021-06-30 18:17:46'),
('TRX011', 111, 7, 'PMB008', 1, 4, '2021-07-01 10:31:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `role_id` char(1) DEFAULT NULL,
  `user_nama` varchar(100) DEFAULT NULL,
  `user_alamat` varchar(255) DEFAULT NULL,
  `user_email` varchar(50) DEFAULT NULL,
  `user_password` varchar(50) DEFAULT NULL,
  `user_notelp` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `role_id`, `user_nama`, `user_alamat`, `user_email`, `user_password`, `user_notelp`) VALUES
(1, 'A', 'Aditya', 'lamongan', 'aditya.manggala12345@gmail.com', '123', '08980308516'),
(111, 'B', 'anggaaaa', 'lmg', 'angga@gmail.com', '123', '097668'),
(117, 'B', 'dono', 'qwertgnm', 'dono@gmail.com', '1234', '09876'),
(118, 'B', 'tes', 'qwertyui', 'tes@gmail.com', '123', '09876'),
(119, 'B', 'tesa', 'qwertyu', 'tesa@gmail.com', '123', '09876'),
(120, 'B', 'orida', 'lkjhg', 'orida@gmail.com', '123', '0892');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun_bank`
--
ALTER TABLE `akun_bank`
  ADD PRIMARY KEY (`akunbank_id`);

--
-- Indeks untuk tabel `jenis_produk`
--
ALTER TABLE `jenis_produk`
  ADD PRIMARY KEY (`jenisproduk_id`);

--
-- Indeks untuk tabel `kopi`
--
ALTER TABLE `kopi`
  ADD PRIMARY KEY (`kopi_id`);

--
-- Indeks untuk tabel `kurir`
--
ALTER TABLE `kurir`
  ADD PRIMARY KEY (`kurir_id`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`pembayaran_id`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indeks untuk tabel `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`transaksi_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akun_bank`
--
ALTER TABLE `akun_bank`
  MODIFY `akunbank_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `jenis_produk`
--
ALTER TABLE `jenis_produk`
  MODIFY `jenisproduk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `kurir`
--
ALTER TABLE `kurir`
  MODIFY `kurir_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
