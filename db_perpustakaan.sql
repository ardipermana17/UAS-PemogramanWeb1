-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Feb 2024 pada 12.23
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perpustakaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_buku`
--

CREATE TABLE `data_buku` (
  `id_buku` int(11) NOT NULL,
  `judul` varchar(250) NOT NULL,
  `pengarang` varchar(250) NOT NULL,
  `penerbit` varchar(250) NOT NULL,
  `tahun_terbit` int(5) NOT NULL,
  `isbn` varchar(25) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `jumlah_buku` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_buku`
--

INSERT INTO `data_buku` (`id_buku`, `judul`, `pengarang`, `penerbit`, `tahun_terbit`, `isbn`, `kategori`, `jumlah_buku`) VALUES
(1, 'sains kuark', 'kuark', 'Elek Media Komputindo', 2011, '978-602-00-1055-7', 'komik', 344),
(2, 'Perempuan Berkalung Sorban', 'Abidah El khalieqy', 'Arti Bumi Intaran', 2009, '978-979-15836-4-1', 'novel', 19),
(4, 'Captain Tsubasa', 'Kenji Adacihara', 'Manga Komik', 2022, '2332-4674-3639-06', 'Komik', 347);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pengunjung`
--

CREATE TABLE `data_pengunjung` (
  `id_pengunjung` int(11) NOT NULL,
  `nim` int(8) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `kelas` varchar(20) NOT NULL,
  `no_handphone` varchar(16) NOT NULL,
  `alamat` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_pengunjung`
--

INSERT INTO `data_pengunjung` (`id_pengunjung`, `nim`, `nama`, `kelas`, `no_handphone`, `alamat`) VALUES
(1, 18111400, 'Aldi Rivaldi', 'TIF RM 18 C', '089765456331', 'Jl. Rahayu 56'),
(2, 18111401, 'Hafiza Lubna', 'DKV 19 A', '+6288974557123', 'Jl Karapitan 37'),
(3, 18111403, 'Ari Permadi', 'DKV 22 A', '087654908113', 'Jl. Terusan Suryani 55'),
(4, 18111402, 'Arsyla', 'TIF RM 221MA', '089788634221', 'Jl. Terusan Cibaduyut');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_transaksi`
--

CREATE TABLE `data_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `id_pengunjung` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_transaksi`
--

INSERT INTO `data_transaksi` (`id_transaksi`, `id_buku`, `id_pengunjung`, `tanggal`, `keterangan`) VALUES
(1, 1, 1, '2023-11-13', 'Membaca'),
(2, 1, 2, '2023-11-12', 'meminjam'),
(3, 2, 1, '2023-11-12', 'Meminjam'),
(4, 4, 4, '2024-01-27', 'Meminjam'),
(5, 2, 1, '2024-01-26', 'Meminjam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `multiuser`
--

CREATE TABLE `multiuser` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `multiuser`
--

INSERT INTO `multiuser` (`id`, `nama`, `username`, `password`, `level`) VALUES
(1, 'Ardi Permana', 'ardi01', 'ardi01', 'admin'),
(2, 'Gani Adi Surya', 'gani20', 'gani20', 'user'),
(3, 'Arsyla', 'arsyl11', 'arsyl11', 'user'),
(4, 'Hafiza Lubna', 'lubna12', 'lubna12', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_buku`
--
ALTER TABLE `data_buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indeks untuk tabel `data_pengunjung`
--
ALTER TABLE `data_pengunjung`
  ADD PRIMARY KEY (`id_pengunjung`);

--
-- Indeks untuk tabel `data_transaksi`
--
ALTER TABLE `data_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `multiuser`
--
ALTER TABLE `multiuser`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_buku`
--
ALTER TABLE `data_buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `data_pengunjung`
--
ALTER TABLE `data_pengunjung`
  MODIFY `id_pengunjung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `data_transaksi`
--
ALTER TABLE `data_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `multiuser`
--
ALTER TABLE `multiuser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
