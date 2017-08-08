-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 08 Agu 2017 pada 03.31
-- Versi Server: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siakad2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bio_guru`
--

CREATE TABLE `bio_guru` (
  `kode` int(3) NOT NULL,
  `kode_guru` varchar(20) NOT NULL,
  `nip` varchar(25) DEFAULT NULL,
  `nama` varchar(80) DEFAULT NULL,
  `jenis_kelamin` varchar(10) DEFAULT NULL,
  `tmpt_lahir` varchar(20) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `kecamatan` varchar(20) DEFAULT NULL,
  `alamat_kota` varchar(20) DEFAULT NULL,
  `alamat_prov` varchar(20) DEFAULT NULL,
  `agama` varchar(10) DEFAULT NULL,
  `no_telp` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `mapel` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bio_guru`
--

INSERT INTO `bio_guru` (`kode`, `kode_guru`, `nip`, `nama`, `jenis_kelamin`, `tmpt_lahir`, `tgl_lahir`, `alamat`, `kecamatan`, `alamat_kota`, `alamat_prov`, `agama`, `no_telp`, `email`, `mapel`) VALUES
(1, '1', '1', 'Danang', 'Laki-laki', 'Tulungagung', '1987-01-05', 'Desa Gebang', 'Pakel', 'Kabupaten Tulungagun', 'Jawa Timur', 'Islam', '089089089089', 'kdanang20@rocketmail.com', 'Matematika'),
(2, '2', '2', 'Achmad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bahasa Indonesia'),
(3, 'bhsindo1', '195811121984032006', 'Dra. TIFAAH ', 'Perempuan', '-', NULL, '-', NULL, 'Kota Malang', 'Jawa Timur', NULL, '234234', NULL, 'Bahasa Indonesia'),
(4, 'bhsinggris1', '196009201993032002', 'Dra. PURWANI E.S', 'Perempuan', 'Purwokerto', '1960-09-20', '-', NULL, 'Kota Malang', 'Jawa Timur', NULL, '081232777207', 'purwani2060@gmail.com', 'Bahasa Inggris'),
(5, 'matematika1', '195709161982032011', 'Dra. AMINAH', 'Perempuan', 'Kediri', '0001-01-01', 'Jalan MT Haryono XVII /60B', 'Lowokwaru', 'Kota Malang', 'Jawa Timur', 'Islam', '08125276157', 'aminah@gmail.com', 'Matematika'),
(7, 'coba', '123', 'jajal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bio_siswa`
--

CREATE TABLE `bio_siswa` (
  `nis` varchar(25) NOT NULL,
  `NISN` varchar(25) DEFAULT NULL,
  `nama` varchar(80) DEFAULT NULL,
  `jenis_kelamin` varchar(20) DEFAULT NULL,
  `tmpt_lahir` varchar(20) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `alamat` varchar(80) DEFAULT NULL,
  `kecamatan` varchar(20) DEFAULT NULL,
  `almt_kota` varchar(20) DEFAULT NULL,
  `almt_prov` varchar(20) DEFAULT NULL,
  `agama` varchar(10) DEFAULT NULL,
  `no_telp` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `jurusan` varchar(30) DEFAULT NULL,
  `kelas_1` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bio_siswa`
--

INSERT INTO `bio_siswa` (`nis`, `NISN`, `nama`, `jenis_kelamin`, `tmpt_lahir`, `tgl_lahir`, `alamat`, `kecamatan`, `almt_kota`, `almt_prov`, `agama`, `no_telp`, `email`, `jurusan`, `kelas_1`) VALUES
('1', '1', 'Kusuma', 'Laki-laki', 'Tulungagung', '1997-01-05', 'Desa Gebang', 'Pakel', 'Kabupaten Tulungagun', 'Jawa Timur', 'Islam', '089089089089', NULL, 'Teknik Komputer jaringan', 'X-TKJ-1'),
('2', NULL, 'Fauzi', 'Laki-laki', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'X-TKJ-1'),
('9523659064', NULL, 'A YAHYA  HUDAN  PERMANA', 'Laki-laki', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Teknik Komputer dan Jaringan', 'XI-TKJ-1'),
('9524660064', NULL, 'ADELIA  MASITA  PUTRI ', 'Perempuan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Teknik Komputer dan Jaringan', 'XI-TKJ-1'),
('9525661064', NULL, 'AGATHA  VALEN  DIO', 'Laki-laki', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Teknik Komputer dan Jaringan', 'XI-TKJ-1'),
('9951727064', NULL, 'ABBEL RAMA VALLERY PUTRI', 'Perempuan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'X-TKJ-1'),
('9952728064', NULL, 'ACHMAD ALDIAN', 'Laki-laki', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'X-TKJ-1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `his_abs_guru`
--

CREATE TABLE `his_abs_guru` (
  `kd_his_abs_guru` int(10) NOT NULL,
  `kode_guru` varchar(20) DEFAULT NULL,
  `thn_ajaran` varchar(10) DEFAULT NULL,
  `semester` varchar(10) DEFAULT NULL,
  `kelas` varchar(5) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `sakit` int(2) DEFAULT NULL,
  `izin` int(2) DEFAULT NULL,
  `alpa` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `his_abs_guru`
--

INSERT INTO `his_abs_guru` (`kd_his_abs_guru`, `kode_guru`, `thn_ajaran`, `semester`, `kelas`, `tanggal`, `sakit`, `izin`, `alpa`) VALUES
(6, '1', '2015/2016', 'Genap', NULL, '2016-01-30', 0, 3, 0),
(7, '2', '2015/2016', 'Genap', NULL, '2016-02-25', 1, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `his_abs_sis`
--

CREATE TABLE `his_abs_sis` (
  `kd_his_absis` int(10) NOT NULL,
  `NIS` varchar(25) DEFAULT NULL,
  `kelas` varchar(10) DEFAULT NULL,
  `th_ajaran` varchar(20) DEFAULT NULL,
  `semester` varchar(10) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `sakit` int(2) DEFAULT NULL,
  `izin` int(2) DEFAULT NULL,
  `alpa` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `his_abs_sis`
--

INSERT INTO `his_abs_sis` (`kd_his_absis`, `NIS`, `kelas`, `th_ajaran`, `semester`, `tanggal`, `sakit`, `izin`, `alpa`) VALUES
(3, '1', 'X-TKJ-1', '2015/2016', 'Ganjil', '2015-11-26', 2, 0, 0),
(4, '2', 'X-TKJ-1', '2015/2016', 'Genap', '2016-01-29', 1, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `his_poin`
--

CREATE TABLE `his_poin` (
  `kd_his_poin` int(10) NOT NULL,
  `NIS` varchar(25) DEFAULT NULL,
  `kelas` varchar(10) DEFAULT NULL,
  `th_ajaran` varchar(20) DEFAULT NULL,
  `semester` varchar(10) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `kd_tatib` int(5) DEFAULT NULL,
  `pencatat` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `his_poin`
--

INSERT INTO `his_poin` (`kd_his_poin`, `NIS`, `kelas`, `th_ajaran`, `semester`, `tanggal`, `kd_tatib`, `pencatat`) VALUES
(8, '1', 'X-TKJ-1', '2018', 'Genap', '2016-02-18', 4, 'Kesiswaan'),
(9, '2', 'X-TKJ-1', '2015/2016', 'Ganjil', '2015-10-22', 1, 'Kesiswaan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_agama`
--

CREATE TABLE `m_agama` (
  `kd_agama` int(5) NOT NULL,
  `agama` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_agama`
--

INSERT INTO `m_agama` (`kd_agama`, `agama`) VALUES
(1, 'Islam'),
(2, 'Kristen');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_jabatan`
--

CREATE TABLE `m_jabatan` (
  `kd_jabatan` int(10) NOT NULL,
  `jabatan` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_jabatan`
--

INSERT INTO `m_jabatan` (`kd_jabatan`, `jabatan`) VALUES
(1, 'Guru');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_jurusan`
--

CREATE TABLE `m_jurusan` (
  `kd_jurusan` int(5) NOT NULL,
  `nama_jurusan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_jurusan`
--

INSERT INTO `m_jurusan` (`kd_jurusan`, `nama_jurusan`) VALUES
(1, 'Teknik Komputer dan Jaringan'),
(2, 'Teknik Kecantikan Rambut');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_kecamatan`
--

CREATE TABLE `m_kecamatan` (
  `kd_kec` int(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kd_kota` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_kecamatan`
--

INSERT INTO `m_kecamatan` (`kd_kec`, `nama`, `kd_kota`) VALUES
(2, 'Lowokwaru', 1),
(3, 'Pakel', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_kelas`
--

CREATE TABLE `m_kelas` (
  `kd_kelas` int(10) NOT NULL,
  `jurusan` varchar(30) DEFAULT NULL,
  `kelas` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_kelas`
--

INSERT INTO `m_kelas` (`kd_kelas`, `jurusan`, `kelas`) VALUES
(1, 'Teknik Komputer dan Jaringan', 'X-TKJ-1'),
(2, 'Teknik Komputer dan Jaringan', 'X-TKJ-2'),
(3, 'Teknik Komputer dan Jaringan', 'XI-TKJ-1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_kota`
--

CREATE TABLE `m_kota` (
  `kd_kota` int(5) NOT NULL,
  `nama_kota` varchar(50) DEFAULT NULL,
  `kd_prov` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_kota`
--

INSERT INTO `m_kota` (`kd_kota`, `nama_kota`, `kd_prov`) VALUES
(1, 'Malang (Kota)', '1'),
(2, 'Malang', '1'),
(3, 'Tulungagung', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_mata_pelajaran`
--

CREATE TABLE `m_mata_pelajaran` (
  `kd_mapel` varchar(10) NOT NULL,
  `mata_pelajaran` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_mata_pelajaran`
--

INSERT INTO `m_mata_pelajaran` (`kd_mapel`, `mata_pelajaran`) VALUES
('1', 'Bahasa Indonesia'),
('2', 'Matematika'),
('3', 'Bahasa Inggris');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_provinsi`
--

CREATE TABLE `m_provinsi` (
  `kd_prov` int(5) NOT NULL,
  `nama_provinsi` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_provinsi`
--

INSERT INTO `m_provinsi` (`kd_prov`, `nama_provinsi`) VALUES
(1, 'Jawa Timur'),
(2, 'Jawa Tengah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_tahun_ajaran`
--

CREATE TABLE `m_tahun_ajaran` (
  `kd_th_ajar` varchar(5) NOT NULL,
  `tahun_ajaran` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_tahun_ajaran`
--

INSERT INTO `m_tahun_ajaran` (`kd_th_ajar`, `tahun_ajaran`) VALUES
('1', '2014/2015'),
('2', '2015/2016'),
('3', '2016/2017');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `kd_nilai` int(10) NOT NULL,
  `NIS` varchar(25) DEFAULT NULL,
  `kelas` varchar(10) DEFAULT NULL,
  `thn_ajaran` varchar(10) DEFAULT NULL,
  `semester` varchar(10) DEFAULT NULL,
  `mapel` varchar(20) DEFAULT NULL,
  `guru` varchar(30) DEFAULT NULL,
  `nh` int(3) DEFAULT NULL,
  `uts` int(3) DEFAULT NULL,
  `uas` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nilai`
--

INSERT INTO `nilai` (`kd_nilai`, `NIS`, `kelas`, `thn_ajaran`, `semester`, `mapel`, `guru`, `nh`, `uts`, `uas`) VALUES
(3, '9523659064', 'XI-TKJ-1', '2016/2017', 'Ganjil', 'Bahasa Indonesia', 'Dra. TIFAAH', 84, 85, 90),
(5, '1', 'X-TKJ-1', '2016/2017', 'Ganjil', 'Bahasa Indonesia', 'Achmad', 80, 80, 80),
(6, '2', 'X-TKJ-1', '2016/2017', 'Ganjil', 'Bahasa Indonesia', 'Achmad', 75, 75, 75),
(10, '9523659064', 'XI-TKJ-1', '2016/2017', 'Ganjil', 'Bahasa Indonesia', 'Achmad', 81, 82, 83);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengumuman`
--

CREATE TABLE `pengumuman` (
  `level` varchar(10) NOT NULL,
  `isi` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengumuman`
--

INSERT INTO `pengumuman` (`level`, `isi`) VALUES
('admin', 'Sistem informasi ini diperuntukan bagi seluruh Siswa dan Guru SMK Negeri 3 Malang untuk membantu proses akademik.'),
('guru', 'Bagi guru yang sudah mendapatkan Username dan Password serta dapat melakukan login ke akun SIAKAD masing-masing, diharapkan untuk segera mengganti password.'),
('kesiswaan', 'Sistem informasi ini diperuntukan bagi seluruh Siswa dan Guru SMK Negeri 3 Malang untuk membantu proses akademik.'),
('siswa', 'Bagi siswa yang sudah mendapatkan Username dan Password serta dapat melakukan login ke akun SIAKAD masing-masing, diharapkan untuk segera mengganti password.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `spp`
--

CREATE TABLE `spp` (
  `kd_spp` int(10) NOT NULL,
  `NIS` varchar(25) DEFAULT NULL,
  `kelas` varchar(10) DEFAULT NULL,
  `tahun_ajaran` varchar(10) DEFAULT NULL,
  `semester` varchar(10) DEFAULT NULL,
  `kewajiban` double DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `spp`
--

INSERT INTO `spp` (`kd_spp`, `NIS`, `kelas`, `tahun_ajaran`, `semester`, `kewajiban`, `status`) VALUES
(10, '1', 'X-TKJ-1', '2015/2016', 'Ganjil', 300000, 'Lunas'),
(11, '2', 'X-TKJ-1', '2016/2017', 'Ganjil', 160000, 'Lunas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tata_tertib`
--

CREATE TABLE `tata_tertib` (
  `kd_tatib` int(5) NOT NULL,
  `jenis_pelanggaran` varchar(50) DEFAULT NULL,
  `pelanggaran` varchar(100) DEFAULT NULL,
  `poin` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tata_tertib`
--

INSERT INTO `tata_tertib` (`kd_tatib`, `jenis_pelanggaran`, `pelanggaran`, `poin`) VALUES
(1, 'Penampilan', 'Tidak Berseragam', 1),
(3, 'Penampilan', 'Rambut Gondrong', 2),
(4, 'Fasilitas Sekolah', 'Mencoret-coret dinding, merusak meja/kursi', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `level`) VALUES
(1, 'ad', 'min', 'admin'),
(2, 'kesis', 'waan', 'kesiswaan'),
(3, 'matematika1', '195709161982032011', 'guru'),
(4, '9951727064', '9951727064', 'siswa'),
(5, 'bhsinggris1', '196009201993032002', 'guru'),
(6, '9952728064', '9952728064', 'siswa'),
(7, '1', '1', 'siswa'),
(8, '2', '2', 'guru'),
(9, '9523659064', '9523659064', 'siswa'),
(10, '9524660064', '9524660064', 'siswa'),
(11, '9525661064', '9525661064', 'siswa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bio_guru`
--
ALTER TABLE `bio_guru`
  ADD PRIMARY KEY (`kode`),
  ADD UNIQUE KEY `kode_guru` (`kode_guru`);

--
-- Indexes for table `bio_siswa`
--
ALTER TABLE `bio_siswa`
  ADD PRIMARY KEY (`nis`),
  ADD KEY `jenis_kelamin` (`jenis_kelamin`);

--
-- Indexes for table `his_abs_guru`
--
ALTER TABLE `his_abs_guru`
  ADD PRIMARY KEY (`kd_his_abs_guru`);

--
-- Indexes for table `his_abs_sis`
--
ALTER TABLE `his_abs_sis`
  ADD PRIMARY KEY (`kd_his_absis`);

--
-- Indexes for table `his_poin`
--
ALTER TABLE `his_poin`
  ADD PRIMARY KEY (`kd_his_poin`);

--
-- Indexes for table `m_agama`
--
ALTER TABLE `m_agama`
  ADD PRIMARY KEY (`kd_agama`);

--
-- Indexes for table `m_jabatan`
--
ALTER TABLE `m_jabatan`
  ADD PRIMARY KEY (`kd_jabatan`);

--
-- Indexes for table `m_jurusan`
--
ALTER TABLE `m_jurusan`
  ADD PRIMARY KEY (`kd_jurusan`);

--
-- Indexes for table `m_kecamatan`
--
ALTER TABLE `m_kecamatan`
  ADD PRIMARY KEY (`kd_kec`),
  ADD KEY `kd_kota` (`kd_kota`);

--
-- Indexes for table `m_kelas`
--
ALTER TABLE `m_kelas`
  ADD PRIMARY KEY (`kd_kelas`);

--
-- Indexes for table `m_kota`
--
ALTER TABLE `m_kota`
  ADD PRIMARY KEY (`kd_kota`),
  ADD KEY `kd_prov` (`kd_prov`);

--
-- Indexes for table `m_mata_pelajaran`
--
ALTER TABLE `m_mata_pelajaran`
  ADD PRIMARY KEY (`kd_mapel`);

--
-- Indexes for table `m_provinsi`
--
ALTER TABLE `m_provinsi`
  ADD PRIMARY KEY (`kd_prov`);

--
-- Indexes for table `m_tahun_ajaran`
--
ALTER TABLE `m_tahun_ajaran`
  ADD PRIMARY KEY (`kd_th_ajar`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`kd_nilai`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`level`);

--
-- Indexes for table `spp`
--
ALTER TABLE `spp`
  ADD PRIMARY KEY (`kd_spp`);

--
-- Indexes for table `tata_tertib`
--
ALTER TABLE `tata_tertib`
  ADD PRIMARY KEY (`kd_tatib`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bio_guru`
--
ALTER TABLE `bio_guru`
  MODIFY `kode` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `his_abs_guru`
--
ALTER TABLE `his_abs_guru`
  MODIFY `kd_his_abs_guru` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `his_abs_sis`
--
ALTER TABLE `his_abs_sis`
  MODIFY `kd_his_absis` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `his_poin`
--
ALTER TABLE `his_poin`
  MODIFY `kd_his_poin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `m_agama`
--
ALTER TABLE `m_agama`
  MODIFY `kd_agama` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `m_jabatan`
--
ALTER TABLE `m_jabatan`
  MODIFY `kd_jabatan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `m_jurusan`
--
ALTER TABLE `m_jurusan`
  MODIFY `kd_jurusan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `m_kecamatan`
--
ALTER TABLE `m_kecamatan`
  MODIFY `kd_kec` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `m_kelas`
--
ALTER TABLE `m_kelas`
  MODIFY `kd_kelas` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `m_kota`
--
ALTER TABLE `m_kota`
  MODIFY `kd_kota` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `m_provinsi`
--
ALTER TABLE `m_provinsi`
  MODIFY `kd_prov` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `kd_nilai` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `spp`
--
ALTER TABLE `spp`
  MODIFY `kd_spp` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tata_tertib`
--
ALTER TABLE `tata_tertib`
  MODIFY `kd_tatib` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `m_kecamatan`
--
ALTER TABLE `m_kecamatan`
  ADD CONSTRAINT `m_kecamatan_ibfk_1` FOREIGN KEY (`kd_kota`) REFERENCES `m_kota` (`kd_kota`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
