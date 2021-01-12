-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Des 2020 pada 02.47
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bksd_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_lengkap`, `username`, `password`) VALUES
(1, 'gustho hidhor', 'admin', '0192023a7bbd73250516f069df18b500'),
(2, 'M Saputra', 'putra', '21f1256217c52a6cdaa51f34bf1b4131');

-- --------------------------------------------------------

--
-- Struktur dari tabel `agenda`
--

CREATE TABLE `agenda` (
  `id_agenda` varchar(50) NOT NULL,
  `nama_agenda` varchar(100) NOT NULL,
  `tgl_agenda` date NOT NULL,
  `isi_agenda` text NOT NULL,
  `lampiran` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `agenda`
--

INSERT INTO `agenda` (`id_agenda`, `nama_agenda`, `tgl_agenda`, `isi_agenda`, `lampiran`) VALUES
('agd001', 'Liburan', '2021-01-03', 'Hore liburr  yehh', 'final 1.docx'),
('agd002', 'ujian semester', '2020-12-31', 'akan di adakaan ujian semester pada akhir bulan ini', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id_berita` varchar(50) NOT NULL,
  `judul_berita` varchar(100) NOT NULL,
  `tgl_berita` date NOT NULL,
  `tampilan` varchar(100) NOT NULL,
  `isi_berita` text NOT NULL,
  `lampiran` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id_berita`, `judul_berita`, `tgl_berita`, `tampilan`, `isi_berita`, `lampiran`) VALUES
('brt001', 'BKSD', '2020-12-29', 'logo1.jpg', 'BKSd MUBA ', ''),
('brt002', 'tanah', '2021-01-08', 'logo2.jpg', 'tanah kosong ', 'final 1.docx');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dalam_negeri`
--

CREATE TABLE `dalam_negeri` (
  `id_dalam_negeri` varchar(50) NOT NULL,
  `nama_mitra` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `bidang` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dalam_negeri`
--

INSERT INTO `dalam_negeri` (`id_dalam_negeri`, `nama_mitra`, `deskripsi`, `bidang`) VALUES
('dlm002', 'asia', 'kerjasama untuk meningkatkan ekonomi', 'perdagangan'),
('dlm003', 'PT. tri srikandi', 'kerjasama dalam mengelola sawit', 'pertanian');

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeri`
--

CREATE TABLE `galeri` (
  `id_galeri` varchar(100) NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `galeri`
--

INSERT INTO `galeri` (`id_galeri`, `gambar`, `keterangan`) VALUES
('glr001', 'logo1.jpg', 'Unsri'),
('glr002', 'logo2.jpg', 'Logo 2'),
('glr003', 'unsri.png', 'unsri'),
('glr004', 'wifi.png', 'wifi'),
('glr005', 'logo1.jpg', '2'),
('glr006', 'logo1.jpg', '2'),
('glr007', 'logo1.jpg', '2'),
('glr008', '1.jpg', 'demis wifi'),
('glr009', 'Aulia Abdurrahman.jpg', 'aulia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `luar_negeri`
--

CREATE TABLE `luar_negeri` (
  `id_luar_negeri` varchar(50) NOT NULL,
  `nama_mitra` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `bidang` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `luar_negeri`
--

INSERT INTO `luar_negeri` (`id_luar_negeri`, `nama_mitra`, `deskripsi`, `bidang`) VALUES
('luar001', 'asu', 'asu asu asu asu\r\n', 'asu'),
('luar002', 'Pt.honda', 'kerjasama untuk memajukan transpotasi', 'teknologi'),
('luar003', 'Pt.indosejahtera', 'kerjasama unutk kesehatan', 'kesehatan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id_pengumuman` varchar(50) NOT NULL,
  `judul_pengumuman` varchar(100) NOT NULL,
  `tgl_pengumuman` date NOT NULL,
  `isi_pengumuman` text NOT NULL,
  `lampiran` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengumuman`
--

INSERT INTO `pengumuman` (`id_pengumuman`, `judul_pengumuman`, `tgl_pengumuman`, `isi_pengumuman`, `lampiran`) VALUES
('pgm001', 'Gajian', '2020-12-29', 'Gajian cair yah', 'final 1.docx'),
('pgm002', 'Liburan', '2020-12-29', 'ASUUUUUUUUU', 'final 1.docx');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id_agenda`);

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indeks untuk tabel `dalam_negeri`
--
ALTER TABLE `dalam_negeri`
  ADD PRIMARY KEY (`id_dalam_negeri`);

--
-- Indeks untuk tabel `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id_galeri`);

--
-- Indeks untuk tabel `luar_negeri`
--
ALTER TABLE `luar_negeri`
  ADD PRIMARY KEY (`id_luar_negeri`);

--
-- Indeks untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
