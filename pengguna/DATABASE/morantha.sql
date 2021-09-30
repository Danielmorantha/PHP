
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";



CREATE DATABASE morantha;
USE morantha;


CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `nama_akun` varchar(24) NOT NULL,
  `kata_sandi` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `admin` (`admin_id`, `nama`, `nama_akun`, `kata_sandi`) VALUES
(1, 'Administrator', 'Admin', 'admin'),
(2, 'Daniel Morantha', 'daniel', '12345678');






CREATE TABLE `guest` (
  `guest_id` int(11) NOT NULL,
  `nama_depan` varchar(50) NOT NULL,
  `nama_tengah` varchar(30) NOT NULL,
  `nama_belakang` varchar(40) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `nomor_telepon` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




CREATE TABLE `room` (
  `room_id` int(11) NOT NULL,
  `tipe_kamar` varchar(50) NOT NULL,
  `harga` varchar(11) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




INSERT INTO `room` (`room_id`, `tipe_kamar`, `harga`, `foto`) VALUES
(1, 'Standard', '1000000', '1.jpg'),
(2, 'Superior', '4000000', '3.jpg'),
(3, 'Super Deluxe', '5000000', '4.jpg'),
(4, 'Jr. Suite', '1200000', '5.jpg'),
(5, 'Executive Suite', '6000000', '6.jpg');



CREATE TABLE `transaction` (
  `transaction_id` int(11) NOT NULL,
  `guest_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `nomor_kamar` int(5) NOT NULL,
  `extra_bed` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `lama_menginap` int(2) NOT NULL,
  `checkin` date NOT NULL,
  `waktu_checkin` time NOT NULL,
  `checkout` date NOT NULL,
  `waktu_checkout` time NOT NULL,
  `tagihan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);


ALTER TABLE `guest`
  ADD PRIMARY KEY (`guest_id`);


ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`);


ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_id`);




ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `guest`
  MODIFY `guest_id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `room`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

ALTER TABLE `transaction`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT;COMMIT;
