-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Jan 2021 pada 03.36
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
(1, 'gustho hidhor', 'admin', '0c909a141f1f2c0a1cb602b0b2d7d050');

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
('agd003', 'Kunjungan kerja', '2021-01-21', 'pada tanggal 21 januari 2021 akan dilakukan kunjungan kerja kepada pihak PT. Petro Tekno sebagai mitra kerjasama. untuk mengetahui perkembangan kerjasama ', ''),
('agd004', 'Rapat Kerja', '2021-01-29', 'Untuk mengawali tahun pertama kerja maka akan dilakukan rapat kerja untuk mengetahui planing kedepannya', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id_berita` varchar(100) NOT NULL,
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
('brt001', 'BKSD', '2020-12-29', 'logo1.jpg', '<p style=\"text-align:justify\">Sebelumnya kita sudah membuat halaman utama website kita, kali ini kita akan membuat halaman untuk menampilkan artikel ketika user mengklik url pada halaman homepage, caranya adalah dengan membuat halaman artikel. Untuk melakukannya anda bisa membaca tutorial berikut :</p>\r\n\r\n<p><!--batas-->Pertama buka folder root project kita, lalu bukalah folder pages dan buatlah sebuah file bernama artikel.php. Setelah itu isikan sintaks dibawah ini kedalam file tersebut</p>\r\n', '28-Article Text-49-1-10-20181121.pdf'),
('brt002', 'Interface Website', '2021-01-02', 'BYU.jpg', '<p>Cara yang dipakai WordPress untuk membuat excerpt ini lebih simple dibandingkan jika kita membuat komponen input sendiri untuk mengisi excerpt ketika memposting artikel melalui form. Beberapa CMS yang dibuat oleh rekan-rekan saya, maupun mahasiswa seringnya menggunakan form input sendiri ketika membuat excerpt ini. Apalagi dibuat field sendiri dalam tabel database untuk menyimpan data excerpt.</p>\r\n\r\n<p>Tentu saja ini pemborosan ruang dan energi. Dengan konsep ala WordPress ini, membuat excerpt tidak perlu menulis 2 kali tapi cukup sekali saja karena excerpt terletak dalam isi postingan (artikel) juga. Jadi cukup menandai saja bagian excerptnya dengan suatu tag tertentu. <!--batas--> Selain itu ide excerpt yang digunakan WordPress ini cukup luar biasa, karena cukup menandai suatu postingan namun tanda ini tidak akan kelihatan ketika tampil di browser.</p>\r\n\r\n<p>Hal ini dikarenakan tanda itu berupa tag komentar di HTML yang secara umum berbentuk <!-- komentar -->. Oleh karena itu, sebenarnya Anda boleh membuat tanda excerpt sendiri selain <!--more--> misalnya <!--cuplikan--> atau <!--excerpt--> dll. OK&hellip; sekarang kita fokus lagi ke cara pembuatan script untuk excerptnya. Berikut ini adalah contoh tampilan script excerpt yang nanti akan kita coba buat.</p>\r\n', ''),
('brt003', 'LDF WIFI', '2021-01-03', 'wifi.png', '<p>Paragraf yang kita buat di dalam kode HTML akan ditampilkan dengan format yang sama seperti yang kita tulis di sana.</p>\r\n\r\n<p>Biasanya&nbsp;sering digunakan untuk menampilkan source code. Karena, tag ini menggunakan font&nbsp;<em>Monospace</em>&nbsp;atau&nbsp;<em>Courier New</em>&nbsp;(di Windows).</p>\r\n\r\n<p><!--batas--></p>\r\n\r\n<p>Sebelumnya kita sudah membuat halaman utama website kita, kali ini kita akan membuat halaman untuk menampilkan artikel ketika user mengklik url pada halaman homepage, caranya adalah dengan membuat halaman artikel. Untuk melakukannya anda bisa membaca tutorial berikut :&nbsp;</p>\r\n', ''),
('brt004', 'Cara memakai WordPress', '2021-01-03', 'BYU.jpg', '<p>Cara yang dipakai WordPress untuk membuat excerpt ini lebih simple dibandingkan jika kita membuat komponen input sendiri untuk mengisi excerpt ketika memposting artikel melalui form. Beberapa CMS yang dibuat oleh rekan-rekan saya, maupun mahasiswa seringnya menggunakan form input sendiri ketika membuat excerpt ini. Apalagi dibuat field sendiri dalam tabel database untuk menyimpan data excerpt. Tentu saja ini pemborosan ruang dan energi.</p>\r\n\r\n<p>Dengan konsep ala WordPress ini, membuat excerpt tidak perlu menulis 2 kali tapi cukup sekali saja karena excerpt terletak dalam isi postingan (artikel) juga. Jadi cukup menandai saja bagian excerptnya dengan suatu tag tertentu. Selain itu ide excerpt yang digunakan WordPress ini cukup luar biasa, karena cukup menandai suatu postingan namun tanda ini tidak akan kelihatan ketika tampil di browser. Hal ini dikarenakan tanda itu berupa tag komentar di HTML yang secara umum berbentuk . Oleh karena itu, sebenarnya Anda boleh membuat tanda excerpt sendiri selain misalnya atau dll.</p>\r\n\r\n<p>OK&hellip; sekarang kita fokus lagi ke cara pembuatan script untuk excerptnya. Berikut ini adalah contoh tampilan script excerpt yang nanti akan kita coba buat.</p>\r\n', ''),
('brt005', 'penyampaian dokumentasi prakasa kerja sama dari DPC PPDI kab.muba', '2021-01-11', 'IMG-20201126-WA0039.jpg', '<p>Pada hari rabu, 25/11/2020<br />\r\nPenyampaian Dokumen Penawaran oleh DPC Perkumpulan Penyandang Disabilitas Indonesia (PPDI) Kab. Muba tentang Penyelenggaraan Kerja Sama Pelaksanaan Penghormatan, Perlindungan dan Pemenuhan Hak Penyandang Disabilitas di Kab Muba kepada Kepala BKSD Muba Bapak Dicky Meiriando, SSTP, MH di Kantor BKSD Muba.<br />\r\n.</p>\r\n', ''),
('brt006', 'Penandatangan kesepaktan kerjasama dengan PT.Petro Tekno', '2021-01-11', 'IMG-20201219-WA0051.jpg', '<p>Kamis (3/12/2020) Kegiatan Penandatangan Kesepakatan Bersama Antara PT. Petrotekno dan Pemerintah Kabupaten Musi Banyuasin tentang Kerja Sama Penyelenggaraan Program Pengembangan SDM Migas, Perkebunan dan Penanggulangan Karhutla, di Petrotekno Trainning Centre Ciloto Jawa Barat.<br />\r\n&nbsp;</p>\r\n', '');

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
('glr001', 'logo1.jpg', 'Logo BKSD MUBA'),
('glr002', 'logo2.jpg', 'Muba Maju'),
('glr003', 'nwdn_file_temp_1606875508120.jpg', 'Batik Bambo Muba'),
('glr004', 'IMG-20201219-WA0051.jpg', 'Penandatangan Kerjasama'),
('glr005', 'IMG-20201126-WA0039.jpg', 'Penyerahan Dokumen'),
('glr007', 'IMG-20201201-WA0004.jpg', 'Rapat Kerja'),
('glr008', 'IMG-20201219-WA0052.jpg', 'Penyerahan Dokumen '),
('glr009', 'IMG-20201022-WA0000.jpg', 'Rapat Kerja'),
('glr010', 'IMG-20201231-WA0025.jpg', 'Penandatangan Kerjasama'),
('glr011', 'IMG-20201219-WA0052.jpg', 'Penyerahan Dokumen'),
('glr012', 'IMG-20201219-WA0053.jpg', 'Kepedulian MUba'),
('glr013', 'IMG-20201223-WA0009.jpg', 'Rapat Kerja'),
('glr014', 'IMG-20201218-WA0045.jpg', 'Penyampaian Sambutan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kerja_sama`
--

CREATE TABLE `kerja_sama` (
  `id_kerja_sama` varchar(11) NOT NULL,
  `nama_mitra` varchar(100) NOT NULL,
  `bidang` varchar(50) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `tahun` year(4) NOT NULL,
  `lampiran` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kerja_sama`
--

INSERT INTO `kerja_sama` (`id_kerja_sama`, `nama_mitra`, `bidang`, `kategori`, `tahun`, `lampiran`) VALUES
('kj003', 'Dispopar', 'Pemerintah', 'Sinergi', 2019, ''),
('kj004', 'Pemda', 'Pemerintah', 'Sinergi', 2020, ''),
('kj005', 'PT asi', 'sawit', 'Pihak Ketiga', 2020, ''),
('kj006', 'PT Indo asia', 'minyak', 'Pihak Ketiga', 2019, ''),
('kj007', 'Muaro Jambi', 'Pemerintah', 'Antar Daerah', 2018, ''),
('kj008', 'Pertamina', 'Minyak', 'Pihak Ketiga', 2019, 'final 2.docx'),
('kj009', 'Kab. Muaro Jambi', 'pertanian', 'Antar Daerah', 2020, ''),
('kj010', 'PT. Petro Tekno', 'pertanian', 'Pihak Ketiga', 2020, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ksdd`
--

CREATE TABLE `ksdd` (
  `id_ksdd` varchar(50) NOT NULL,
  `nama_mitra` varchar(100) NOT NULL,
  `bidang` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `tahun` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `luar_negeri`
--

CREATE TABLE `luar_negeri` (
  `id_luar_negeri` varchar(50) NOT NULL,
  `nama_mitra` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `bidang` varchar(100) NOT NULL,
  `tahun` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `luar_negeri`
--

INSERT INTO `luar_negeri` (`id_luar_negeri`, `nama_mitra`, `deskripsi`, `bidang`, `tahun`) VALUES
('luar001', 'asia', 'asia asia asia', 'wilayah', 0000),
('luar002', 'Pt.honda', 'kerjasama untuk memajukan transpotasi', 'teknologi', 0000),
('luar003', 'Pt.indosejahtera', 'kerjasama unutk kesehatan', 'kesehatan', 0000);

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
('pgm001', 'Gajian', '2021-01-08', 'Gajian pada bulan ini akan keluar pada tanggal 1 desember 2021 sesuai dengan ketentuan dari pemerintah', ''),
('pgm002', 'Liburan', '2020-12-29', 'Untuk mengakhir tahun pada kerja ini maka akn dilakukan liburan bersama dengan seluruh pegawai yang ada.', 'final 1.docx');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pihak_ketiga`
--

CREATE TABLE `pihak_ketiga` (
  `id_pihak_ketiga` varchar(50) NOT NULL,
  `nama_mitra` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `bidang` varchar(100) NOT NULL,
  `tahun` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pihak_ketiga`
--

INSERT INTO `pihak_ketiga` (`id_pihak_ketiga`, `nama_mitra`, `deskripsi`, `bidang`, `tahun`) VALUES
('phk004', 'jarwo', '<p>gsghahsgjash</p>\r\n', 'pertanian', 2029);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sinergi`
--

CREATE TABLE `sinergi` (
  `id_sinergi` varchar(50) NOT NULL,
  `nama_mitra` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `bidang` varchar(50) NOT NULL,
  `tahun` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sinergi`
--

INSERT INTO `sinergi` (`id_sinergi`, `nama_mitra`, `deskripsi`, `bidang`, `tahun`) VALUES
('srg001', 'ghghh', '<p>sddgghgfh</p>\r\n', 'kebinatangan', 2020);

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
-- Indeks untuk tabel `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id_galeri`);

--
-- Indeks untuk tabel `kerja_sama`
--
ALTER TABLE `kerja_sama`
  ADD PRIMARY KEY (`id_kerja_sama`);

--
-- Indeks untuk tabel `ksdd`
--
ALTER TABLE `ksdd`
  ADD PRIMARY KEY (`id_ksdd`);

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
-- Indeks untuk tabel `pihak_ketiga`
--
ALTER TABLE `pihak_ketiga`
  ADD PRIMARY KEY (`id_pihak_ketiga`);

--
-- Indeks untuk tabel `sinergi`
--
ALTER TABLE `sinergi`
  ADD PRIMARY KEY (`id_sinergi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
