-- -------------------------------------------------------------
-- TablePlus 3.12.2(358)
--
-- https://tableplus.com/
--
-- Database: carikontrakan
-- Generation Time: 2021-07-10 4:03:07.5950 PM
-- -------------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


CREATE TABLE `admins` (
  `id_admin` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_admin` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` text,
  PRIMARY KEY (`id_admin`),
  UNIQUE KEY `id_admin` (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE `foto_kontrakan` (
  `id_foto` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_kontrakan` varchar(10) DEFAULT NULL,
  `label_foto` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_foto`),
  UNIQUE KEY `id_foto` (`id_foto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE `kecamatan` (
  `id_kecamatan` bigint unsigned NOT NULL AUTO_INCREMENT,
  `kecamatan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_kecamatan`),
  UNIQUE KEY `id_kecamatan` (`id_kecamatan`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE `kontrakan` (
  `id_kontrakan` varchar(32) NOT NULL,
  `nama_kontrakan` varchar(100) DEFAULT NULL,
  `kategori` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `deskripsi` text,
  `id_admin` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `id_owner` varchar(20) DEFAULT NULL,
  `kamar_tersedia` varchar(10) DEFAULT NULL,
  `harga` int DEFAULT NULL,
  `thumbnail` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `jalan` varchar(100) DEFAULT NULL,
  `kecamatan` varchar(100) DEFAULT NULL,
  `deskripsi_alamat` text,
  `lat` varchar(100) DEFAULT NULL,
  `lon` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_kontrakan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE `owners` (
  `id_owner` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_owner` varchar(100) DEFAULT NULL,
  `handphone` varchar(13) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `alamat` text,
  PRIMARY KEY (`id_owner`),
  UNIQUE KEY `id_owner` (`id_owner`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE `pesanan` (
  `id_pesanan` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_user` varchar(20) DEFAULT NULL,
  `id_kontrakan` varchar(20) DEFAULT NULL,
  `tgl_masuk` date DEFAULT NULL,
  `tgl_pesanan` date DEFAULT NULL,
  `bukti_bayar` text,
  `status_pemesanan` varchar(100) DEFAULT NULL,
  `note` text,
  PRIMARY KEY (`id_pesanan`),
  UNIQUE KEY `id_pesanan` (`id_pesanan`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE `users` (
  `id_user` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_user` varchar(100) DEFAULT NULL,
  `handphone` varchar(13) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` text,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `admins` (`id_admin`, `nama_admin`, `email`, `password`) VALUES
('1', 'admin carikontrakan', 'admin@carikontrakan.com', '21232f297a57a5a743894a0e4a801fc3'),
('3', 'udin logan', 'udin@mail.com', '21232f297a57a5a743894a0e4a801fc3');

INSERT INTO `kecamatan` (`id_kecamatan`, `kecamatan`) VALUES
('1', 'balaraja'),
('2', 'cikupa'),
('3', 'cisauk'),
('4', 'cisoka'),
('5', 'curug'),
('6', 'gunung kaler'),
('7', 'jambe'),
('8', 'jayanti'),
('9', 'kelapa dua'),
('10', 'kresek'),
('11', 'kronjo'),
('12', 'kosambi'),
('13', 'mauk'),
('14', 'legok'),
('15', 'pakuhaji'),
('16', 'panongan'),
('17', 'pasar kemis'),
('18', 'sepatan');

INSERT INTO `kontrakan` (`id_kontrakan`, `nama_kontrakan`, `kategori`, `deskripsi`, `id_admin`, `id_owner`, `kamar_tersedia`, `harga`, `thumbnail`, `jalan`, `kecamatan`, `deskripsi_alamat`, `lat`, `lon`) VALUES
('k60e1baa907365', 'kost batu kencana', 'wanita', 'j0D2QrB7fn', NULL, '6', '9', '700000', 'img-60e1baa903d83.jpg', 'nbC3LapzSf', '1', 'mFOqifopeJ', '-6.19603397', '106.46088620'),
('k60e1bad926ace', 'kost waringin', 'wanita', 'AduO6TpVqf', NULL, '7', '10', '600000', 'img-60e1bad9257fe.jpg', 'Iym0D33fbE', '1', 'Lhh7FtVSRl', '-6.19476430', '106.46403192'),
('k60e1bb1f3ec42', 'kost annapurna', 'wanita', '9XxYexfBmq', NULL, '8', '10', '750000', 'img-60e1bb1f3e028.jpg', 'xWQ7tLY0i3', '1', 'Cxry8gQT7k', '-6.19587337', '106.45996903'),
('k60e1bb54aa4b9', 'kost ibu asep', 'wanita', 'avX3oOweDr', NULL, '9', '10', '750000', 'img-60e1bb54a9600.jpeg', 'LVZuBvFL8Y', '1', 'pRZnBnPNp6', '-6.19767406', '106.45559681'),
('k60e1bbabeeab8', 'griya hanna', 'campur', 'hLvCuPXp1e', NULL, '10', '10', '750000', 'img-60e1bbabe2b25.jpeg', 'B2Q3hqZcAC', '2', 'i6g1Ok39X2', '-6.22598180', '106.52094278'),
('k60e1bbecb123c', 'kost cakrawala', 'campur', 'IHwVjXrMb1', NULL, '11', '10', '750000', 'img-60e1bbecb050d.jpeg', 'QvsDvUnEtG', '2', 'J1o6ova5aa', '-6.22725488', '106.51686798'),
('k60e1bc40526a7', 'kost emily', 'campur', 'TOtB4MCDDI', NULL, '11', '10', '750000', 'img-60e1bc4051332.jpg', 'zGIFqoUlsw', '2', 'pOae2OtaBK', '-6.22228010', '106.51655618'),
('k60e1bca1d4e2d', 'kost cikupa indah', 'campur', '06om7c829Q', NULL, '12', '10', '750000', 'img-60e1bca1d44db.jpg', 'es9S0YKNV8', '2', '0u49uZdffZ', '-6.23191218', '106.51908828');

INSERT INTO `owners` (`id_owner`, `nama_owner`, `handphone`, `email`, `alamat`) VALUES
('6', 'ujang supena', '08772615523', 'ujang@gmail.com', 'tangerang'),
('7', 'mahmud darudin', '08772615332', 'mahmud@gmail.com', 'tangerang'),
('8', 'maman suparaman', '08779915332', 'suparman@gmail.com', 'tangerang'),
('9', 'asep juardi', '08779310332', 'asep@gmail.com', 'tangerang'),
('10', 'koswara ', '08111230332', 'koswara@gmail.com', 'tangerang'),
('11', 'yati purwasih', '08137883732', 'yati@gmail.com', 'tangerang'),
('12', 'windah irushi', '08999283132', 'windah@gmail.com', 'tangerang'),
('13', 'entin karsih', '08983231322', 'entin@gmail.com', 'tangerang');

INSERT INTO `pesanan` (`id_pesanan`, `id_user`, `id_kontrakan`, `tgl_masuk`, `tgl_pesanan`, `bukti_bayar`, `status_pemesanan`, `note`) VALUES
('11', '3', 'k60e1baa907365', '2021-07-15', '2021-07-10', 'img-60e9504894761.jpg', 'terkonfirmasi', 'pesanan terkonfirmasi'),
('12', '4', 'k60e1bbabeeab8', '2021-07-31', '2021-07-10', 'img-60e9507212657.jpg', 'terkonfirmasi', 'pesanan terkonfirmasi'),
('13', '4', 'k60e1bbabeeab8', '2021-07-31', '2021-07-09', 'img-60e9507212657.jpg', 'ditolak', 'pembayaran kurang'),
('14', '3', 'k60e1baa907365', '2021-07-15', '2021-07-08', 'img-60e9504894761.jpg', 'ditolak', 'pembayaran palsu'),
('15', '3', 'k60e1baa907365', '2021-07-15', '2021-07-07', 'img-60e9504894761.jpg', 'terkonfirmasi', 'pesanan terkonfirmasi');

INSERT INTO `users` (`id_user`, `nama_user`, `handphone`, `email`, `password`) VALUES
('1', 'KQpbeVv58q', NULL, 'nowot@qnyu.com', 'c1a65695971551592b1db034ae39dc52'),
('3', 'ade rahmat nurdiyana', '087776451664', 'nurdiyana.ade@gmail.com', '21232f297a57a5a743894a0e4a801fc3'),
('4', 'william', '08111231728', 'william@gmail.com', '21232f297a57a5a743894a0e4a801fc3');



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;