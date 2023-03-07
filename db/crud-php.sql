-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Mar 2023 pada 18.30
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud-php`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `id_akun` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`id_akun`, `nama`, `username`, `email`, `password`, `level`) VALUES
(26, 'coba1', 'coba1', 'coba@gmail.com', '$2y$10$zeAbkl.sNnthQ5fn3NVnS.KjhxXtfpUUuA1/0GsGbMmD.lTBsiZeS', '1'),
(27, 'erika', 'admin', 'erika@gmail.com', '$2y$10$sC7Vb/A2qavn98mNrh9c3OAE63Y1XMtE4Ob7wdpPce3I3GFMCfpDm', '1'),
(28, 'erika', 'erika', 'erika@gmail.com', '$2y$10$tonX/BEerfn/cOOrPCeMpupPyxWJNdcJZVk8UQ415q/0FmRSAqGMO', '1'),
(29, 'Operator Barang', 'opmbarang', 'opmbarang@gmail.com', '$2y$10$v2jj8U55zyxWAGX5ccrMIeI48NlauyrrC9.hyci6nxH0NuYf7AD3m', '2'),
(30, 'Operator Mahasiswa', 'opmahasiswa', 'opmahasiswa@gmail.com', '$2y$10$p/LPZzkOB/xWW3fQm1yoCuaNYCas7HA7NzHPny1TnPUe7unpx.hTS', '3'),
(31, 'User', 'user', 'user123@gmail.com', '$2y$10$7pkm3p6Paq2r1AnAGqBy5O5b25vNKgJDiukZOOJO1ZcxJNgspol8W', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jumlah` varchar(200) NOT NULL,
  `harga` varchar(100) NOT NULL,
  `barcode` varchar(15) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nama`, `jumlah`, `harga`, `barcode`, `tanggal`) VALUES
(1, 'Router', '5', '200000', '', '2023-02-15 16:28:16'),
(2, 'Laptop', '5', '20000000', '', '2023-02-10 07:12:45'),
(3, 'Headset', '4', '300000', '', '2023-02-10 07:49:44'),
(4, 'Mouse', '4', '44000', '', '2023-02-10 16:21:26'),
(35, 'PC 2', '5', '1000000', '874035', '2023-02-21 07:47:06'),
(36, 'Printer', '2', '5000000', '835454', '2023-02-21 07:57:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `prodi` varchar(50) NOT NULL,
  `jk` varchar(11) NOT NULL,
  `telepon` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mahasiswa`, `nama`, `prodi`, `jk`, `telepon`, `alamat`, `email`, `foto`) VALUES
(1, 'Erika Amp', 'Teknik Infomatika', 'Perempuan', '089663594845', '<p>Komp Uka rt/18 rw/08 koja&nbsp;<em>jakarta utara.</em></p>', 'erikaamp@gmail.com', ''),
(2, 'Fera Ardila', 'Teknik Infomatika', 'Perempuan', '089643234958', '', 'feraar@gmail.com', 'fera.jpg'),
(3, 'Dea Sabrina', 'Teknik sipil', 'Perempuan', '083823481234', '', 'deasab@gmail.com', 'dea.jpg'),
(4, 'Intan Puspita Sari', 'Teknik sipil', 'Perempuan', '083543245765', '', 'intan@gmail.com', ''),
(10, 'Riska Mila', 'Teknik Infomatika', 'Perempuan', '082736473821', '<p>Jln Mahani No.9<em>&nbsp;koja,</em>&nbsp;<em>jakarta utara <strong>30/09.</strong></em></p>', 'riska@gmail.com', '63f121d002663.jpg'),
(11, 'Ardela', 'Teknik Mesin', 'Perempuan', '089765434676', '<p>Jln Bekasi Utara No.90<em>&nbsp;jawa barat.</em></p>', 'della@gmail.com', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telepon` varchar(100) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama`, `jabatan`, `email`, `telepon`, `alamat`) VALUES
(1, 'erika', 'magang', 'erika@gmail.com', '089654367423', 'jln.perdamian no 6 jakarta utara'),
(2, 'Ardya', 'manager', 'ardya@gmail.com', '082739228342', 'jln duren sawit. no9 jakarta barang'),
(3, 'mesia ', 'assisten manager', 'mesia@gmai.com', '089765435678', 'jl melati ujung jakarta timur'),
(4, 'putri', 'staff', 'putri@gmail.com', '089765456765', 'jln jatiasih no 6 . bekasi utara');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akun`
--
ALTER TABLE `akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
