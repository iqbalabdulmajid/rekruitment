-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 15 Bulan Mei 2024 pada 16.28
-- Versi server: 8.0.30
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sirekta_alia`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `jekel` varchar(15) NOT NULL,
  `tempat_lhr` varchar(10) NOT NULL,
  `tgl_lhr` date NOT NULL,
  `agama` varchar(20) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `no_tlp` varchar(12) NOT NULL,
  `nip` varchar(7) NOT NULL,
  `jabatan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama`, `jekel`, `tempat_lhr`, `tgl_lhr`, `agama`, `alamat`, `no_tlp`, `nip`, `jabatan`) VALUES
(32007, 'irfan@gmail.com', 'irfan', 'irfan', 'Laki-Laki', ' Jakarta', '2017-10-05', 'Islam', 'bogor cui', '87878', '10088', 'hrd'),
(32008, 'nurulwidhayanti05@gmail.com', 'nurul123', 'Nurul Widhayanti', 'Perempuan', ' Bekasi', '1996-04-05', ' Islam ', 'Griya Bukit Jaya Blok M 15 No ', '081212322476', '118009', 'HRD 1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `econtract`
--

CREATE TABLE `econtract` (
  `nik` int NOT NULL,
  `soal1` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `soal2` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `soal3` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `soal4` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `soal5` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `soal6` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `masa_kerja` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `mulai_kontrak` date DEFAULT NULL,
  `akhir_kontrak` date DEFAULT NULL,
  `status_pegawai` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `econtract`
--

INSERT INTO `econtract` (`nik`, `soal1`, `soal2`, `soal3`, `soal4`, `soal5`, `soal6`, `masa_kerja`, `mulai_kontrak`, `akhir_kontrak`, `status_pegawai`) VALUES
(3322, '1', '1', '1', '1', '1', '1', '3 bulan', '2024-05-01', '2024-05-31', 'phk'),
(332212, '', '', '', '', '', '', '', '2024-05-01', '2024-06-30', 'karyawan kontrak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fisik`
--

CREATE TABLE `fisik` (
  `id_pelamar` int NOT NULL,
  `jarak_lari` int NOT NULL,
  `jumlah_push_up` int NOT NULL,
  `jumlah_sit_up` int NOT NULL,
  `keterangan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `fisik`
--

INSERT INTO `fisik` (`id_pelamar`, `jarak_lari`, `jumlah_push_up`, `jumlah_sit_up`, `keterangan`) VALUES
(320010, 2, 10, 10, 'gagal tes fisik'),
(320012, 0, 0, 0, NULL),
(320014, 0, 0, 0, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `head_office`
--

CREATE TABLE `head_office` (
  `id_head_office` int NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `jekel` varchar(15) NOT NULL,
  `tempat_lhr` varchar(10) NOT NULL,
  `tgl_lhr` date NOT NULL,
  `agama` varchar(20) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `no_tlp` varchar(12) NOT NULL,
  `nip` varchar(7) NOT NULL,
  `jabatan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `head_office`
--

INSERT INTO `head_office` (`id_head_office`, `username`, `password`, `nama`, `jekel`, `tempat_lhr`, `tgl_lhr`, `agama`, `alamat`, `no_tlp`, `nip`, `jabatan`) VALUES
(1, 'ho1@gmail.com', '1234', 'iqbal', 'Laki-Laki', ' kebumen', '2024-05-02', ' Islam ', 'kebumen', '21343143134', '213214', 'Head Office');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int NOT NULL,
  `nik` varchar(12) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `posisi` varchar(255) NOT NULL,
  `tanggal_awal_kontrak` datetime NOT NULL,
  `tanggal_akhir_kontrak` date NOT NULL,
  `status_karyawan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nik`, `nama`, `alamat`, `posisi`, `tanggal_awal_kontrak`, `tanggal_akhir_kontrak`, `status_karyawan`) VALUES
(1, '123', 'iqbal', 'kebumen', 'it', '2024-05-15 23:13:00', '2024-05-15', 'kontrak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lowongan`
--

CREATE TABLE `lowongan` (
  `id_lowongan` varchar(20) NOT NULL,
  `posisi_pekerjaan` varchar(35) NOT NULL,
  `lokasi_seleksi` varchar(35) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `deskripsi_pekerjaan` text NOT NULL,
  `jurusan_akademik` varchar(40) NOT NULL,
  `lokasi_pekerjaan` varchar(35) NOT NULL,
  `nip` varchar(15) NOT NULL,
  `view` enum('aktif','tidak aktif','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lowongan`
--

INSERT INTO `lowongan` (`id_lowongan`, `posisi_pekerjaan`, `lokasi_seleksi`, `tgl_mulai`, `tgl_selesai`, `deskripsi_pekerjaan`, `jurusan_akademik`, `lokasi_pekerjaan`, `nip`, `view`) VALUES
('LWG0001', 'Sales Executive', 'Jakarta', '2017-10-01', '2017-12-01', '<p><strong>Tanggung Jawab:</strong></p><ul><li>Mencapai target penjualan.</li><li>Mencari, mengidentifikasi calon pelanggan dan potensial pasar</li><li>Mempertahankan &nbsp;kepuasan pelanggan.</li></ul><p><strong>Persyaratan:</strong></p><ul><li>Usia maksimal 30 tahun (laki-laki/perempuan).</li><li>Memiliki gelar sarjana (S1).</li><li>Pengalaman dalam penjualan minimal 1 tahun.</li><li>Kepribadian yang sangat baik, komunikasi yang baik &amp; keterampilan interpersonal.</li><li>Agresif.</li></ul><p><strong>Manfaat :</strong></p><ul><li>Gaji pokok, intensif, tunjangan transportasi.</li></ul>', 'Manajemen Pemasaran', 'DKI Jakarta', '118009', 'aktif'),
('LWG0002', 'Teknisi', 'Jakarta', '2017-10-14', '2017-12-06', '<p><strong>Kualifikasi :</strong></p><ul><li>Pria, umu max 30 tahun.</li><li>Pendidikan Minimal SMA/STM/D3.</li><li>Menyukai Pekerjaan Lapangan/Teknis.</li><li>Berpengalaman min 1 tahun.</li></ul><p><strong>Manfaat :</strong></p><ul><li>Gaji + insentif menarik.</li></ul>', 'Sipil/ teknik', 'Jabodetabek', '10088', 'aktif'),
('LWG0003', 'Sales Consultan', 'Jakarta', '2017-11-16', '2017-12-21', '<p><strong>Persyaratan :</strong></p><ul><li>Usia maksimal 30 tahun.</li><li>S1</li><li>Pengalaman dalam penjualan minimal 1 tahun.</li><li>Kepribadian yang sangat baik, komunikasi yang baik &amp; keterampilan interpersonal.</li><li>Agresif.</li></ul><p><strong>Manfaat :</strong></p><ul><li>Total pendapatan &gt;/10 jt (gaji pokok, tunjangan transportasi, intensif)</li><li>Intensif perjalanan keluar negeri.</li><li>Pelatihan dan pengembangan karir.</li></ul>', 'Manjemen Marketting & Pemasaran', 'Bogor, Jakarta Timur, Bekasi.', '', 'aktif');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `master_pelamar`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `master_pelamar` (
`id_pelamar` int
,`posisi_pekerjaan` varchar(255)
,`lokasi_seleksi` varchar(255)
,`username` varchar(40)
,`password` varchar(18)
,`nama` varchar(255)
,`jekel` varchar(255)
,`tempat_lhr` varchar(255)
,`tgl_lhr` date
,`alamat` varchar(40)
,`kodepos` varchar(15)
,`kota` varchar(15)
,`no_tlp` varchar(20)
,`no_hp` varchar(20)
,`ktp` varchar(16)
,`negara` varchar(20)
,`agama` varchar(15)
,`hobi` varchar(10)
,`alamat_ortu` varchar(35)
,`kodepos_ortu` varchar(15)
,`kota_ortu` varchar(15)
,`status` varchar(15)
,`jml_anak` varchar(10)
,`nm_kel` varchar(35)
,`hubungan` varchar(20)
,`alamat_kel` varchar(35)
,`no_kel` varchar(15)
,`pendidikan` varchar(15)
,`nm_sekolah` varchar(30)
,`jurusan` varchar(30)
,`tgl_mulai` date
,`tgl_selesai` date
,`nilai` float
,`organisasi` varchar(35)
,`jabatan` varchar(25)
,`periode_org` varchar(20)
,`nm_kursus` varchar(30)
,`tahun` year
,`penyelenggara` varchar(25)
,`peringkat` varchar(15)
,`bahasa` varchar(15)
,`dengar` varchar(15)
,`baca` varchar(15)
,`bicara` varchar(15)
,`tulis` varchar(15)
,`nm_pt` varchar(25)
,`tgl_awal` date
,`tgl_akhir` date
,`almt_pt` varchar(35)
,`tlp_pt` varchar(15)
,`jabat_awal` varchar(20)
,`jabat_akhir` varchar(20)
,`nm_atasan` varchar(30)
,`alasan` varchar(100)
,`gaji` varchar(20)
,`dokumen` longtext
,`foto` longtext
,`file_sertifikat` longtext
,`jawaban_benar` int
,`jawaban_salah` int
,`jawaban_kosong` int
,`score` int
,`jenis_soal` varchar(20)
,`tgl_ujian` date
,`keterangan` varchar(255)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelamar`
--

CREATE TABLE `pelamar` (
  `id_pelamar` int NOT NULL,
  `posisi_pekerjaan` varchar(255) NOT NULL DEFAULT '',
  `lokasi_seleksi` varchar(255) NOT NULL DEFAULT '''''',
  `username` varchar(40) NOT NULL,
  `password` varchar(18) NOT NULL,
  `nama` varchar(255) NOT NULL DEFAULT '''''',
  `nik` int NOT NULL,
  `status_pegawai` varchar(255) NOT NULL,
  `jekel` varchar(255) NOT NULL DEFAULT '',
  `tempat_lhr` varchar(255) NOT NULL DEFAULT '',
  `tgl_lhr` date DEFAULT NULL,
  `alamat` varchar(40) NOT NULL DEFAULT '',
  `kodepos` varchar(15) NOT NULL DEFAULT '',
  `kota` varchar(15) NOT NULL DEFAULT '',
  `no_tlp` varchar(20) NOT NULL DEFAULT '',
  `no_hp` varchar(20) NOT NULL DEFAULT '',
  `ktp` varchar(16) NOT NULL DEFAULT '',
  `negara` varchar(20) NOT NULL DEFAULT '',
  `agama` varchar(15) NOT NULL DEFAULT '',
  `hobi` varchar(10) NOT NULL DEFAULT '',
  `alamat_ortu` varchar(35) NOT NULL DEFAULT '',
  `kodepos_ortu` varchar(15) NOT NULL DEFAULT '',
  `kota_ortu` varchar(15) NOT NULL DEFAULT '',
  `status` varchar(15) NOT NULL DEFAULT '',
  `jml_anak` varchar(10) NOT NULL DEFAULT '',
  `nm_kel` varchar(35) NOT NULL DEFAULT '',
  `hubungan` varchar(20) NOT NULL DEFAULT '',
  `alamat_kel` varchar(35) NOT NULL DEFAULT '',
  `no_kel` varchar(15) NOT NULL DEFAULT '',
  `pendidikan` varchar(15) NOT NULL DEFAULT '',
  `nm_sekolah` varchar(30) NOT NULL DEFAULT '',
  `jurusan` varchar(30) NOT NULL DEFAULT '',
  `tgl_mulai` date DEFAULT NULL,
  `tgl_selesai` date DEFAULT NULL,
  `nilai` float NOT NULL DEFAULT '0',
  `organisasi` varchar(35) NOT NULL DEFAULT '',
  `jabatan` varchar(25) NOT NULL DEFAULT '',
  `periode_org` varchar(20) NOT NULL DEFAULT '',
  `nm_kursus` varchar(30) NOT NULL DEFAULT '',
  `tahun` year NOT NULL DEFAULT '0000',
  `penyelenggara` varchar(25) NOT NULL DEFAULT '',
  `peringkat` varchar(15) NOT NULL DEFAULT '',
  `bahasa` varchar(15) NOT NULL DEFAULT '',
  `dengar` varchar(15) NOT NULL DEFAULT '',
  `baca` varchar(15) NOT NULL DEFAULT '',
  `bicara` varchar(15) NOT NULL DEFAULT '',
  `tulis` varchar(15) NOT NULL DEFAULT '',
  `nm_pt` varchar(25) NOT NULL DEFAULT '',
  `tgl_awal` date DEFAULT NULL,
  `tgl_akhir` date DEFAULT NULL,
  `almt_pt` varchar(35) NOT NULL DEFAULT '',
  `tlp_pt` varchar(15) NOT NULL DEFAULT '',
  `jabat_awal` varchar(20) NOT NULL DEFAULT '',
  `jabat_akhir` varchar(20) NOT NULL DEFAULT '',
  `nm_atasan` varchar(30) NOT NULL DEFAULT '',
  `alasan` varchar(100) NOT NULL DEFAULT '',
  `gaji` varchar(20) NOT NULL DEFAULT '',
  `dokumen` longtext,
  `foto` longtext,
  `file_sertifikat` longtext,
  `wawancara` longtext,
  `tgl_wwcr` date DEFAULT NULL,
  `mulai_kontrak` date DEFAULT NULL,
  `akhir_kontrak` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelamar`
--

INSERT INTO `pelamar` (`id_pelamar`, `posisi_pekerjaan`, `lokasi_seleksi`, `username`, `password`, `nama`, `nik`, `status_pegawai`, `jekel`, `tempat_lhr`, `tgl_lhr`, `alamat`, `kodepos`, `kota`, `no_tlp`, `no_hp`, `ktp`, `negara`, `agama`, `hobi`, `alamat_ortu`, `kodepos_ortu`, `kota_ortu`, `status`, `jml_anak`, `nm_kel`, `hubungan`, `alamat_kel`, `no_kel`, `pendidikan`, `nm_sekolah`, `jurusan`, `tgl_mulai`, `tgl_selesai`, `nilai`, `organisasi`, `jabatan`, `periode_org`, `nm_kursus`, `tahun`, `penyelenggara`, `peringkat`, `bahasa`, `dengar`, `baca`, `bicara`, `tulis`, `nm_pt`, `tgl_awal`, `tgl_akhir`, `almt_pt`, `tlp_pt`, `jabat_awal`, `jabat_akhir`, `nm_atasan`, `alasan`, `gaji`, `dokumen`, `foto`, `file_sertifikat`, `wawancara`, `tgl_wwcr`, `mulai_kontrak`, `akhir_kontrak`) VALUES
(320010, 'Accounting', 'Jakarta', 'gtsgalang27@gmail.com', 'galang123', 'Galang Setiawan', 3322, 'phk', 'Laki - Laki', 'Madiun', '1996-10-27', 'Jl.indah yang kulalui bersamamu', '16820', 'Bogor', '087873369841', '087873369841', '987654323456', 'Indonesia', 'Islam', 'Coding', 'Jl.indah yang kulalui bersamamu', '16820', 'bogor', 'Belum Menikah', '', 'Bagas', 'Adik Kandung', 'Jl.indah yang kulalui bersamamu', '065432345', 'SMK/SMA', 'SMK muhammadiyah 2', 'Teknik Komputer Jaringan', '2017-11-09', '2017-11-09', 90, '', '', '', '', '0000', '', '', '', '-- Pilih --', '-- Pilih --', '-- Pilih --', '-- Pilih --', '', '0000-00-00', '0000-00-00', '', '', '', '', '', '', '', '1111810332-drp-bei.pdf', '1178072550-318507097.png', '332178747-anchor-32476_960_720.png', '687911265-wwcr.jpg', '2024-05-15', '2024-05-01', '2024-05-31'),
(320012, '', '', 'shintapurnamasari08@gmail.com', '19970822', '', 0, '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', 0, '', '', '', '', '0000', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '0', NULL, NULL, NULL),
(320014, 'Teknisi ', 'Jakarta ', 'iqbal@gmail.com', 'iqbal', 'iqbal ', 332212, 'karyawan kontrak', 'Laki - Laki ', 'kebumen ', '2024-05-08', 'sdasdasd', '122334 ', 'kebumen', '21343143134', '124314324', '123456789023', 'Indonesia', 'Islam', 'ewew', 'wtewte', '1234', 'wetewtw', 'Belum Menikah', '2', 'sfdfsd', 'Kakak Kandung', 'ewrw', '12432452', 'S1', 'dsdfzf', 'etretregvdf', '2024-05-08', '2024-06-01', 31, 'qeqweqwwe', 'qweqwe', '2021-2022', 'fsfsfre', '2020', 'sfasfds1', '1f', 'ind', 'Baik', 'Baik', 'Baik', 'Baik', 'fwefwef', '2024-05-10', '2024-05-31', 'fwefewaf', '1231432', 'fwefdsvs', 'wregvfddfg', 'dsfsfdsf', 'sdfsdfre', '32222222', NULL, NULL, '803133155-laporan-bulanan-iqbal-abdul-majid.pdf', '0', NULL, '2024-05-01', '2024-06-30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_nilai`
--

CREATE TABLE `tbl_nilai` (
  `id_nilai` int NOT NULL,
  `id_pelamar` int NOT NULL,
  `jawaban_benar` int NOT NULL,
  `jawaban_salah` int NOT NULL,
  `jawaban_kosong` int NOT NULL,
  `score` int NOT NULL,
  `jenis_soal` varchar(20) NOT NULL,
  `tgl_ujian` date NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_nilai`
--

INSERT INTO `tbl_nilai` (`id_nilai`, `id_pelamar`, `jawaban_benar`, `jawaban_salah`, `jawaban_kosong`, `score`, `jenis_soal`, `tgl_ujian`, `keterangan`) VALUES
(12, 320010, 7, 0, 0, 100, 'Umum', '2017-11-22', 'Lolos Wawancara'),
(13, 320012, 3, 4, 0, 43, 'Umum', '2017-11-22', 'Tidak Lulus'),
(15, 320014, 0, 0, 0, 0, 'Umum', '2017-11-22', 'lolos seleksi berkas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_soal`
--

CREATE TABLE `tbl_soal` (
  `id_soal` int NOT NULL,
  `soal` longtext NOT NULL,
  `jenis_soal` varchar(20) NOT NULL,
  `a` varchar(30) NOT NULL,
  `b` varchar(30) NOT NULL,
  `c` varchar(30) NOT NULL,
  `d` varchar(30) NOT NULL,
  `knc_jawaban` varchar(30) NOT NULL,
  `tanggal` date NOT NULL,
  `aktif` enum('Y','N') NOT NULL,
  `nip` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_soal`
--

INSERT INTO `tbl_soal` (`id_soal`, `soal`, `jenis_soal`, `a`, `b`, `c`, `d`, `knc_jawaban`, `tanggal`, `aktif`, `nip`) VALUES
(29, '<p>Semua penyelam adalah penerang. Sementara penyelam adalah pelaut</p>', 'Psikotes', 'Sementara peyelam bukan pelaut', 'Sementara pelaut adalah perena', 'Sementara perenang bukan penye', 'Sementara penyelam bukan peren', 'a', '2017-11-30', 'Y', '118009'),
(31, '<p>EPILOG</p>', 'Psikotes', 'Hipolog', 'Analog', 'Prolog', 'Dialog', 'c', '2017-11-30', 'Y', '118009'),
(30, '<p>EKLENTIK</p>', 'Psikotes', 'Radikal', 'Tak pilih-pilih', 'Cemerlang', 'Spiritual', 'b', '2017-11-30', 'Y', '118009'),
(32, '<p>Berapakah 33% dari 163</p>', 'Psikotes', '53,79', '54,33', '543', '5,37', 'a', '2017-11-30', 'Y', '118009'),
(33, '<p>Jika p=4 dan q=3 serta r=(p+2q)/pq Berapakah : (p+q)/r</p>', 'Psikotes', '5 10/12', '70/12', '8 2/5', '8 4/5', 'c', '2017-11-30', 'Y', '118009'),
(34, '<p>Semua seniman kreatif. Sementara ilmuwan tidak kreatif.</p>', 'Psikotes', 'Tidak ada seniman yang ilmuwan', 'Semua ilmuwan kreatif', 'Semua ilmuwan bukan seniman', 'Sementara ilmuwan kreatif', 'd', '2017-11-30', 'Y', '118009'),
(35, '<p>SUMBANG</p>', 'Psikotes', 'Mirip', 'Tepat', 'Laras', 'Imbang', 'b', '2017-11-30', 'Y', '118009'),
(36, '<p>Jika x = 1/16 dan y = 16% maka :</p>', 'Psikotes', 'x>y', 'x=y', 'x<y', 'x dan y tak dapat ditentukan', 'c', '2017-11-30', 'Y', '118009');

-- --------------------------------------------------------

--
-- Struktur untuk view `master_pelamar`
--
DROP TABLE IF EXISTS `master_pelamar`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `master_pelamar`  AS SELECT `pelamar`.`id_pelamar` AS `id_pelamar`, `pelamar`.`posisi_pekerjaan` AS `posisi_pekerjaan`, `pelamar`.`lokasi_seleksi` AS `lokasi_seleksi`, `pelamar`.`username` AS `username`, `pelamar`.`password` AS `password`, `pelamar`.`nama` AS `nama`, `pelamar`.`jekel` AS `jekel`, `pelamar`.`tempat_lhr` AS `tempat_lhr`, `pelamar`.`tgl_lhr` AS `tgl_lhr`, `pelamar`.`alamat` AS `alamat`, `pelamar`.`kodepos` AS `kodepos`, `pelamar`.`kota` AS `kota`, `pelamar`.`no_tlp` AS `no_tlp`, `pelamar`.`no_hp` AS `no_hp`, `pelamar`.`ktp` AS `ktp`, `pelamar`.`negara` AS `negara`, `pelamar`.`agama` AS `agama`, `pelamar`.`hobi` AS `hobi`, `pelamar`.`alamat_ortu` AS `alamat_ortu`, `pelamar`.`kodepos_ortu` AS `kodepos_ortu`, `pelamar`.`kota_ortu` AS `kota_ortu`, `pelamar`.`status` AS `status`, `pelamar`.`jml_anak` AS `jml_anak`, `pelamar`.`nm_kel` AS `nm_kel`, `pelamar`.`hubungan` AS `hubungan`, `pelamar`.`alamat_kel` AS `alamat_kel`, `pelamar`.`no_kel` AS `no_kel`, `pelamar`.`pendidikan` AS `pendidikan`, `pelamar`.`nm_sekolah` AS `nm_sekolah`, `pelamar`.`jurusan` AS `jurusan`, `pelamar`.`tgl_mulai` AS `tgl_mulai`, `pelamar`.`tgl_selesai` AS `tgl_selesai`, `pelamar`.`nilai` AS `nilai`, `pelamar`.`organisasi` AS `organisasi`, `pelamar`.`jabatan` AS `jabatan`, `pelamar`.`periode_org` AS `periode_org`, `pelamar`.`nm_kursus` AS `nm_kursus`, `pelamar`.`tahun` AS `tahun`, `pelamar`.`penyelenggara` AS `penyelenggara`, `pelamar`.`peringkat` AS `peringkat`, `pelamar`.`bahasa` AS `bahasa`, `pelamar`.`dengar` AS `dengar`, `pelamar`.`baca` AS `baca`, `pelamar`.`bicara` AS `bicara`, `pelamar`.`tulis` AS `tulis`, `pelamar`.`nm_pt` AS `nm_pt`, `pelamar`.`tgl_awal` AS `tgl_awal`, `pelamar`.`tgl_akhir` AS `tgl_akhir`, `pelamar`.`almt_pt` AS `almt_pt`, `pelamar`.`tlp_pt` AS `tlp_pt`, `pelamar`.`jabat_awal` AS `jabat_awal`, `pelamar`.`jabat_akhir` AS `jabat_akhir`, `pelamar`.`nm_atasan` AS `nm_atasan`, `pelamar`.`alasan` AS `alasan`, `pelamar`.`gaji` AS `gaji`, `pelamar`.`dokumen` AS `dokumen`, `pelamar`.`foto` AS `foto`, `pelamar`.`file_sertifikat` AS `file_sertifikat`, `tbl_nilai`.`jawaban_benar` AS `jawaban_benar`, `tbl_nilai`.`jawaban_salah` AS `jawaban_salah`, `tbl_nilai`.`jawaban_kosong` AS `jawaban_kosong`, `tbl_nilai`.`score` AS `score`, `tbl_nilai`.`jenis_soal` AS `jenis_soal`, `tbl_nilai`.`tgl_ujian` AS `tgl_ujian`, `tbl_nilai`.`keterangan` AS `keterangan` FROM (`pelamar` join `tbl_nilai`) WHERE (`pelamar`.`id_pelamar` = `tbl_nilai`.`id_pelamar`) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `econtract`
--
ALTER TABLE `econtract`
  ADD PRIMARY KEY (`nik`);

--
-- Indeks untuk tabel `fisik`
--
ALTER TABLE `fisik`
  ADD KEY `id_pelamar` (`id_pelamar`);

--
-- Indeks untuk tabel `head_office`
--
ALTER TABLE `head_office`
  ADD PRIMARY KEY (`id_head_office`);

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indeks untuk tabel `lowongan`
--
ALTER TABLE `lowongan`
  ADD PRIMARY KEY (`id_lowongan`);

--
-- Indeks untuk tabel `pelamar`
--
ALTER TABLE `pelamar`
  ADD PRIMARY KEY (`id_pelamar`),
  ADD KEY `nik` (`nik`) USING BTREE;

--
-- Indeks untuk tabel `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `id_pelamar` (`id_pelamar`);

--
-- Indeks untuk tabel `tbl_soal`
--
ALTER TABLE `tbl_soal`
  ADD PRIMARY KEY (`id_soal`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32009;

--
-- AUTO_INCREMENT untuk tabel `head_office`
--
ALTER TABLE `head_office`
  MODIFY `id_head_office` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  MODIFY `id_nilai` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `tbl_soal`
--
ALTER TABLE `tbl_soal`
  MODIFY `id_soal` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `econtract`
--
ALTER TABLE `econtract`
  ADD CONSTRAINT `econtract_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `pelamar` (`nik`);

--
-- Ketidakleluasaan untuk tabel `fisik`
--
ALTER TABLE `fisik`
  ADD CONSTRAINT `fisik_ibfk_1` FOREIGN KEY (`id_pelamar`) REFERENCES `pelamar` (`id_pelamar`);

--
-- Ketidakleluasaan untuk tabel `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  ADD CONSTRAINT `tbl_nilai_ibfk_1` FOREIGN KEY (`id_pelamar`) REFERENCES `pelamar` (`id_pelamar`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
