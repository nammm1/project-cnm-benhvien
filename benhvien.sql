-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2025 at 06:30 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `benhvien`
--

-- --------------------------------------------------------

--
-- Table structure for table `bacsi`
--

CREATE TABLE `bacsi` (
  `maBacSi` int(11) NOT NULL,
  `hoTenDem` varchar(255) NOT NULL,
  `ten` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `diachi` varchar(255) NOT NULL,
  `soDienThoai` varchar(255) NOT NULL,
  `ngaySinh` datetime DEFAULT NULL,
  `gioiTinh` varchar(255) DEFAULT NULL,
  `anhDaiDien` varchar(255) NOT NULL,
  `maTaiKhoan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bacsi`
--

INSERT INTO `bacsi` (`maBacSi`, `hoTenDem`, `ten`, `email`, `diachi`, `soDienThoai`, `ngaySinh`, `gioiTinh`, `anhDaiDien`, `maTaiKhoan`) VALUES
(1, 'Nguyễn Đức', 'Mạnh', 'nguyenducmanh@email.com', 'Hà Nội', '0123', '1985-05-15 00:00:00', 'Nam', 'manh.jpg', 13),
(2, 'Lê Minh', 'Tuấn', 'leminhtuan@email.com', 'Hồ Chí Minh', '0456', '1990-08-22 00:00:00', 'Nam', 'tuan.jpg', 14),
(3, 'Trần Thị', 'Hoa', 'tranthihoa@email.com', 'Đà Nẵng', '0789', '1987-02-10 00:00:00', 'Nữ', 'hoa.jpg', 15),
(4, 'Phạm Anh', 'Duy', 'phamanhduy@email.com', 'Cần Thơ', '0234', '1992-11-05 00:00:00', 'Nam', 'duy.jpg', 16),
(5, 'Hà Anh', 'Tuấn', 'haanhtuan@gmail.com', 'Bình Chánh', '0566', '1985-10-02 00:00:00', 'Nam', 'tuan.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `benhnhan`
--

CREATE TABLE `benhnhan` (
  `maBenhNhan` int(11) NOT NULL,
  `hoTenDem` varchar(255) NOT NULL,
  `ten` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `diaChi` varchar(255) DEFAULT NULL,
  `soDienThoai` varchar(255) NOT NULL,
  `ngaySinh` date NOT NULL,
  `gioiTinh` varchar(10) NOT NULL,
  `anhDaiDien` varchar(255) NOT NULL,
  `maTaiKhoan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `benhnhan`
--

INSERT INTO `benhnhan` (`maBenhNhan`, `hoTenDem`, `ten`, `email`, `diaChi`, `soDienThoai`, `ngaySinh`, `gioiTinh`, `anhDaiDien`, `maTaiKhoan`) VALUES
(1, 'Nguyễn Văn', 'Hào', 'nguyenvanhao@email.com', 'Hà Nội', '0123', '1990-01-15', 'Nam', 'hao.jpg', 4),
(2, 'Lê Thị', 'Bích', 'lethibich@email.com', 'Hồ Chí Minh', '0456', '1988-03-22', 'Nữ', 'bich.jpg', 5),
(3, 'Trần Quang', 'Huy', 'tranquanghuy@email.com', 'Đà Nẵng', '0789', '1995-06-30', 'Nam', 'huy.jpg', 6),
(4, 'Phạm Quốc', 'Khánh', 'phamquockhanh@email.com', 'Cần Thơ', '0234', '1987-10-10', 'Nam', 'khanh.jpg', 7),
(5, 'Vũ Thị', 'Lan', 'vuthilan@email.com', 'Nha Trang', '0567', '1992-02-18', 'Nữ', 'lan.jpg', 8),
(6, 'Đỗ Thành', 'Long', 'dothanhlong@email.com', 'Bình Dương', '0890', '1993-07-25', 'Nam', 'long.jpg', 9),
(7, 'Hoàng Anh', 'Khoa', 'hoanganhkhoa@email.com', 'Hải Phòng', '0911', '1989-11-05', 'Nam', 'khoa.jpg', 10),
(8, 'Ngô Quốc', 'Toàn', 'ngoquoctoan@email.com', 'Vũng Tàu', '0345', '1991-09-11', 'Nam', 'toan.jpg', 11),
(9, 'Bùi Minh', 'Triết', 'buiminhtriet@email.com', 'Quảng Ninh', '0678', '1986-12-20', 'Nữ', 'triet.jpg', 12),
(10, 'Nguyễn Kim', 'Hoàng', 'nguyenkimhoang@gmail.com', 'Gò vấp', '0363', '1990-11-05', 'Nữ', '1.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `chitietdonthuoc`
--

CREATE TABLE `chitietdonthuoc` (
  `maChiTietDonThuoc` int(11) NOT NULL,
  `soLuong` int(11) NOT NULL,
  `cachDung` varchar(255) DEFAULT NULL,
  `maDonThuoc` int(11) NOT NULL,
  `maThuoc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chitietdonthuoc`
--

INSERT INTO `chitietdonthuoc` (`maChiTietDonThuoc`, `soLuong`, `cachDung`, `maDonThuoc`, `maThuoc`) VALUES
(1, 11, '123', 1, 1),
(2, 11, '123', 2, 1),
(3, 112, '123', 3, 1),
(4, 1, '12', 4, 1),
(5, 43, '43', 4, 1),
(6, 2, 'qqq', 5, 1),
(7, 2, 'wwww', 5, 2),
(8, 44, '333', 6, 1),
(9, 112, 'qqq', 11, 2),
(10, 2134, 'dư', 11, 2);

-- --------------------------------------------------------

--
-- Table structure for table `donthuoc`
--

CREATE TABLE `donthuoc` (
  `maDonThuoc` int(11) NOT NULL,
  `ghiChu` varchar(255) DEFAULT NULL,
  `ngayKeDon` date NOT NULL,
  `maHoSo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donthuoc`
--

INSERT INTO `donthuoc` (`maDonThuoc`, `ghiChu`, `ngayKeDon`, `maHoSo`) VALUES
(1, 'Đơn thuốc lần đầu', '2024-11-27', 5),
(2, 'Đơn thuốc lần đầu', '2024-11-27', 1),
(3, 'Đơn thuốc lần đầu', '2024-11-27', 5),
(4, 'Đơn thuốc lần đầu', '2024-11-27', 5),
(5, 'Đơn thuốc lần đầu', '2024-11-27', 1),
(6, 'Đơn thuốc lần đầu', '2024-11-27', 1),
(10, 'Đơn thuốc lần đầu', '2024-11-27', 5),
(11, '112', '2024-11-27', 10);

-- --------------------------------------------------------

--
-- Table structure for table `hosobenhan`
--

CREATE TABLE `hosobenhan` (
  `maHoSo` int(11) NOT NULL,
  `chuanDoan` varchar(255) NOT NULL,
  `ketLuan` varchar(255) NOT NULL,
  `trangThai` varchar(255) NOT NULL,
  `ngayTaoHoSo` date DEFAULT NULL,
  `maBenhNhan` int(11) NOT NULL,
  `maBacSi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hosobenhan`
--

INSERT INTO `hosobenhan` (`maHoSo`, `chuanDoan`, `ketLuan`, `trangThai`, `ngayTaoHoSo`, `maBenhNhan`, `maBacSi`) VALUES
(1, 'Viêm họng', 'Cần theo dõi', 'Hoàn Thành', '2005-11-01', 1, 1),
(2, 'Tiểu đường', 'Cần kiểm soát chế độ ăn uống', 'Hoàn Thành', '2010-02-12', 1, 2),
(3, 'Đau đầu', 'Cần nghỉ ngơi', 'Hoàn Thành', '2015-06-23', 1, 3),
(4, 'Chấn thương xương', 'Cần phẫu thuật', 'Hoàn Thành', '2017-08-17', 1, 4),
(5, 'Mất ngủ', 'Cần điều trị thuốc', 'Hoàn Thành', '2020-03-29', 1, 5),
(6, 'Đau bụng', 'Cần xét nghiệm', 'Hoàn Thành', '2022-05-11', 1, 1),
(7, 'Cảm cúm', 'Đã hồi phục', 'Hoàn Thành', '2024-01-15', 1, 2),
(8, 'Viêm loét dạ dày', 'Cần điều trị thuốc', 'Hoàn Thành', '2018-09-05', 1, 3),
(9, 'Chấn thương đầu gối', 'Cần phẫu thuật', 'Hoàn Thành', '2023-11-01', 2, 4),
(10, 'Huyết áp cao', 'sdfsd', 'Hoàn thành', '2021-12-14', 2, 5),
(11, 'Viêm khớp', 'Cần điều trị lâu dài', 'Đang chờ', '2009-04-22', 2, 1),
(12, 'Đau vai', 'Cần nghỉ ngơi', 'Hoàn Thành', '2013-10-09', 2, 2),
(13, 'Bệnh tim mạch', 'Cần theo dõi', 'Hoàn Thành', '2016-06-19', 2, 3),
(14, 'Cảm cúm', 'Đã hồi phục', 'Hoàn Thành', '2020-02-07', 2, 4),
(15, 'Chấn thương xương', 'Đã phục hồi', 'Hoàn Thành', '2024-03-01', 2, 5),
(16, 'Mất ngủ', 'Cần điều trị thuốc', 'Hoàn Thành', '2017-01-02', 3, 1),
(17, 'Đau bụng', 'Cần xét nghiệm', 'Hoàn Thành', '2014-09-13', 3, 2),
(18, 'Viêm loét dạ dày', 'Cần điều trị thuốc', 'Hoàn Thành', '2019-12-18', 3, 3),
(19, 'Chấn thương xương', 'Cần phẫu thuật', 'Hoàn Thành', '2022-08-27', 3, 4),
(20, 'Cảm cúm', 'Đã hồi phục', 'Hoàn Thành', '2020-10-31', 3, 5),
(21, 'Tiểu đường', 'Cần kiểm soát chế độ ăn uống', 'Hoàn Thành', '2018-04-15', 3, 1),
(22, 'Viêm khớp', 'Cần điều trị lâu dài', 'Hoàn Thành', '2017-07-22', 3, 2),
(23, 'Viêm họng', 'Cần theo dõi', 'Hoàn Thành', '2010-04-01', 8, 1),
(24, 'Chấn thương xương', 'Cần phẫu thuật', 'Hoàn Thành', '2012-05-23', 8, 2),
(25, 'Mất ngủ', 'Cần điều trị thuốc', 'Hoàn Thành', '2014-06-17', 8, 3),
(26, 'Cảm cúm', 'Đã hồi phục', 'Hoàn Thành', '2016-01-25', 8, 4),
(27, 'Tiểu đường', 'Cần kiểm soát chế độ ăn uống', 'Hoàn Thành', '2019-09-09', 8, 5),
(28, 'Đau bụng', 'Cần xét nghiệm', 'Hoàn Thành', '2020-03-19', 8, 1),
(29, 'Viêm loét dạ dày', 'Cần điều trị thuốc', 'Hoàn Thành', '2021-07-30', 8, 2),
(30, 'Chấn thương đầu gối', 'Cần phẫu thuật', 'Hoàn Thành', '2023-02-08', 8, 3),
(31, 'Huyết áp thấp', 'Cần uống thuốc', 'Hoàn Thành', '2023-12-01', 8, 4),
(32, 'Đau vai', 'Cần nghỉ ngơi', 'Hoàn Thành', '2024-01-10', 8, 5),
(33, 'Viêm khớp', 'Cần điều trị lâu dài', 'Hoàn Thành', '2022-02-14', 9, 1),
(34, 'Bệnh tim mạch', 'Cần theo dõi', 'Hoàn Thành', '2020-06-17', 9, 2),
(35, 'Chấn thương tay', 'Cần nghỉ ngơi', 'Hoàn Thành', '2021-04-12', 9, 3),
(36, 'Mất ngủ', 'Cần điều chỉnh thói quen', 'Hoàn Thành', '2023-05-26', 9, 4),
(37, 'Tiểu đường', 'Cần kiểm soát chế độ ăn uống', 'Hoàn Thành', '2022-07-19', 9, 5),
(38, 'Viêm họng', 'Cần điều trị thuốc', 'Hoàn Thành', '2018-10-21', 9, 1),
(39, 'Đau bụng', 'Cần xét nghiệm', 'Hoàn Thành', '2017-11-30', 9, 2),
(40, 'Chấn thương xương', 'Đã phục hồi', 'Hoàn Thành', '2020-12-05', 9, 3),
(41, 'Viêm loét dạ dày', 'Cần điều trị thuốc', 'Hoàn Thành', '2021-09-17', 9, 4),
(42, 'Cảm cúm', 'Đã hồi phục', 'Hoàn Thành', '2019-08-02', 9, 5),
(43, 'Chấn thương xương', 'Đã phục hồi', 'Hoàn Thành', '2020-11-19', 10, 1),
(44, 'Mất ngủ', 'Cần điều trị thuốc', 'Hoàn Thành', '2023-06-04', 10, 2),
(45, 'Viêm họng', 'Cần điều trị thuốc', 'Hoàn Thành', '2016-02-28', 10, 3),
(46, 'Đau đầu', 'Cần nghỉ ngơi', 'Hoàn Thành', '2022-09-01', 10, 4),
(47, 'Viêm khớp', 'Cần điều trị lâu dài', 'Hoàn Thành', '2017-07-10', 10, 5),
(48, 'Tiểu đường', 'Cần kiểm soát chế độ ăn uống', 'Hoàn Thành', '2023-12-12', 10, 1),
(49, 'Chấn thương đầu gối', 'Cần phẫu thuật', 'Hoàn Thành', '2021-10-22', 10, 2),
(50, 'Cảm cúm', 'Đã hồi phục', 'Hoàn Thành', '2019-03-15', 10, 3),
(51, 'Bệnh lý tim mạch', 'Cần theo dõi', 'Hoàn Thành', '2022-04-05', 10, 4),
(52, 'Viêm loét dạ dày', 'Cần điều trị thuốc', 'Hoàn Thành', '2024-01-17', 10, 5),
(53, 'Viêm họng', 'Cần theo dõi', 'Hoàn Thành', '2012-11-01', 4, 1),
(54, 'Tiểu đường', 'Cần kiểm soát chế độ ăn uống', 'Hoàn Thành', '2013-06-22', 4, 2),
(55, 'Mất ngủ', 'Cần điều trị thuốc', 'Hoàn Thành', '2014-07-15', 4, 3),
(56, 'Cảm cúm', 'Đã hồi phục', 'Hoàn Thành', '2015-05-10', 4, 4),
(57, 'Viêm khớp', 'Cần điều trị lâu dài', 'Hoàn Thành', '2016-09-18', 4, 5),
(58, 'Chấn thương xương', 'Cần phẫu thuật', 'Hoàn Thành', '2017-02-09', 4, 1),
(59, 'Bệnh tim mạch', 'Cần theo dõi', 'Hoàn Thành', '2018-10-04', 4, 2),
(60, 'Đau bụng', 'Cần xét nghiệm', 'Hoàn Thành', '2019-03-01', 4, 3),
(61, 'Viêm loét dạ dày', 'Cần điều trị thuốc', 'Hoàn Thành', '2020-07-14', 5, 1),
(62, 'Cảm cúm', 'Đã hồi phục', 'Hoàn Thành', '2021-04-25', 5, 2),
(63, 'Chấn thương đầu gối', 'Cần phẫu thuật', 'Hoàn Thành', '2022-01-07', 5, 3),
(64, 'Tiểu đường', 'Cần kiểm soát chế độ ăn uống', 'Hoàn Thành', '2023-08-13', 5, 4),
(65, 'Đau đầu', 'Cần nghỉ ngơi', 'Hoàn Thành', '2024-02-26', 5, 5),
(66, 'Mất ngủ', 'Cần điều trị thuốc', 'Hoàn Thành', '2019-05-17', 6, 1),
(67, 'Cảm cúm', 'Đã hồi phục', 'Hoàn Thành', '2020-09-30', 6, 2),
(68, 'Viêm họng', 'Cần điều trị thuốc', 'Hoàn Thành', '2021-02-14', 6, 3),
(69, 'Chấn thương xương', 'Đã phục hồi', 'Hoàn Thành', '2022-06-07', 6, 4),
(70, 'Đau bụng', 'Cần xét nghiệm', 'Hoàn Thành', '2023-12-22', 6, 5),
(71, 'Bệnh lý tim mạch', 'Cần theo dõi', 'Hoàn Thành', '2021-11-10', 7, 1),
(72, 'Viêm loét dạ dày', 'Cần điều trị thuốc', 'Hoàn Thành', '2022-08-19', 7, 2),
(73, 'Tiểu đường', 'Cần kiểm soát chế độ ăn uống', 'Hoàn Thành', '2023-06-13', 7, 3),
(74, 'Chấn thương đầu gối', 'Cần phẫu thuật', 'Hoàn Thành', '2024-04-03', 7, 4),
(75, 'Mất ngủ', 'Cần điều trị thuốc', 'Hoàn Thành', '2020-01-22', 7, 5),
(76, 'q', 'ew', 'Đang xử lý', '2024-11-27', 1, 5),
(77, '324', '423', 'Hoàn thành', '2024-11-27', 1, 5),
(78, '324', '321', 'Đang xử lý', '2024-11-27', 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `lichhen`
--

CREATE TABLE `lichhen` (
  `maLichHen` int(11) NOT NULL,
  `ngayTaoLichHen` date DEFAULT NULL,
  `ngayDatLich` date DEFAULT NULL,
  `gioDatLich` time DEFAULT NULL,
  `trangThai` varchar(255) NOT NULL,
  `maBenhNhan` int(11) NOT NULL,
  `Type` varchar(6) DEFAULT NULL,
  `maBacSi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lichhen`
--

INSERT INTO `lichhen` (`maLichHen`, `ngayTaoLichHen`, `ngayDatLich`, `gioDatLich`, `trangThai`, `maBenhNhan`, `Type`, `maBacSi`) VALUES
(1, '2005-10-25', '2005-11-01', '09:15:00', 'Hoàn thành', 1, 'M', 1),
(2, '2010-01-30', '2010-02-12', '10:45:00', 'Hoàn thành', 1, 'M', 1),
(3, '2015-06-15', '2015-06-23', '14:15:00', 'Hoàn thành', 1, 'M', 1),
(4, '2017-08-10', '2017-08-17', '15:00:00', 'Hoàn thành', 1, 'M', 1),
(5, '2020-03-20', '2020-03-29', '08:45:00', 'Hoàn thành', 1, 'M', 1),
(6, '2022-04-25', '2022-05-11', '15:30:00', 'Hoàn thành', 1, 'TK', 1),
(7, '2024-01-10', '2024-01-15', '13:30:00', 'Hoàn thành', 1, 'TK', 1),
(8, '2018-08-25', '2018-09-05', '09:30:00', 'Hoàn thành', 1, 'TK', 1),
(9, '2023-10-25', '2023-11-01', '14:45:00', 'Hoàn thành', 2, 'TK', 2),
(10, '2021-12-01', '2021-12-14', '10:30:00', 'Hoàn thành', 2, 'TK', 2),
(11, '2009-04-10', '2009-04-22', '08:15:00', 'Hoàn thành', 2, 'TK', 5),
(12, '2013-09-25', '2013-10-09', '08:00:00', 'Hoàn thành', 2, 'M', 2),
(13, '2016-06-10', '2016-06-19', '09:45:00', 'Hoàn thành', 2, 'M', 2),
(14, '2020-01-25', '2020-02-07', '08:15:00', 'Hoàn thành', 2, 'M', 2),
(15, '2024-02-20', '2024-03-01', '10:00:00', 'Hoàn thành', 2, 'M', 2),
(16, '2017-01-01', '2017-01-02', '08:45:00', 'Hoàn thành', 3, 'M', 2),
(17, '2014-09-01', '2014-09-13', '14:15:00', 'Hoàn thành', 3, 'TK', 5),
(18, '2019-12-10', '2019-12-18', '13:00:00', 'Hoàn thành', 3, 'M', 1),
(19, '2022-08-15', '2022-08-27', '09:30:00', 'Hoàn thành', 3, 'M', 5),
(20, '2020-10-15', '2020-10-31', '07:45:00', 'Hoàn thành', 3, 'TK', 3),
(21, '2018-04-13', '2018-04-15', '08:45:00', 'Hoàn thành', 3, 'TK', 5),
(22, '2017-07-20', '2017-07-22', '07:00:00', 'Hoàn thành', 3, 'M', 2),
(23, '2012-10-28', '2012-11-01', '07:15:00', 'Hoàn thành', 4, 'M', 3),
(24, '2013-06-20', '2013-06-22', '09:45:00', 'Hoàn thành', 4, 'TK', 3),
(25, '2014-07-11', '2014-07-15', '08:00:00', 'Hoàn thành', 4, 'TK', 3),
(26, '2015-05-05', '2015-05-10', '09:15:00', 'Hoàn thành', 4, NULL, 0),
(27, '2016-09-17', '2016-09-18', '07:00:00', 'Hoàn thành', 4, NULL, 0),
(28, '2017-02-08', '2017-02-09', '08:00:00', 'Hoàn thành', 4, NULL, 0),
(29, '2018-10-01', '2018-10-04', '07:45:00', 'Hoàn thành', 4, NULL, 0),
(30, '2019-02-28', '2019-03-01', '07:45:00', 'Hoàn thành', 4, NULL, 0),
(31, '2020-07-13', '2020-07-14', '10:45:00', 'Hoàn thành', 5, NULL, 0),
(32, '2021-04-21', '2021-04-25', '08:45:00', 'Hoàn thành', 5, NULL, 0),
(33, '2022-01-05', '2022-01-07', '07:30:00', 'Hoàn thành', 5, NULL, 0),
(34, '2023-08-12', '2023-08-13', '07:45:00', 'Hoàn thành', 5, NULL, 0),
(35, '2024-02-25', '2024-02-26', '07:45:00', 'Hoàn thành', 5, NULL, 0),
(36, '2020-11-18', '2020-11-19', '09:00:00', 'Hoàn thành', 10, NULL, 0),
(37, '2020-11-18', '2023-06-04', '09:00:00', 'Hoàn thành', 10, NULL, 0),
(38, '2020-11-18', '2016-02-28', '09:00:00', 'Hoàn thành', 10, NULL, 0),
(39, '2022-08-28', '2022-09-01', '07:00:00', 'Hoàn thành', 10, NULL, 0),
(40, '2017-07-08', '2017-07-10', '09:00:00', 'Hoàn thành', 10, NULL, 0),
(41, '2023-12-11', '2023-12-12', '08:00:00', 'Hoàn thành', 10, NULL, 0),
(42, '2021-10-17', '2021-10-22', '14:00:00', 'Hoàn thành', 10, NULL, 0),
(43, '2019-03-14', '2019-03-15', '09:00:00', 'Hoàn thành', 10, NULL, 0),
(44, '2022-04-04', '2022-04-05', '09:00:00', 'Hoàn thành', 10, NULL, 0),
(45, '2024-01-16', '2024-01-17', '15:00:00', 'Hoàn thành', 10, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `lichkham`
--

CREATE TABLE `lichkham` (
  `maLichKham` int(11) NOT NULL,
  `ngayKham` date DEFAULT NULL,
  `gioKham` time DEFAULT NULL,
  `ngayTaoLich` date DEFAULT NULL,
  `trangThai` varchar(255) NOT NULL,
  `maBacSi` int(11) NOT NULL,
  `maLichHen` int(11) NOT NULL,
  `maBenhNhan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lichkham`
--

INSERT INTO `lichkham` (`maLichKham`, `ngayKham`, `gioKham`, `ngayTaoLich`, `trangThai`, `maBacSi`, `maLichHen`, `maBenhNhan`) VALUES
(1, '2005-11-01', '09:15:00', '2005-11-01', 'Hoàn thành', 1, 1, 1),
(2, '2010-02-12', '10:45:00', '2010-02-12', 'Hoàn thành', 2, 2, 1),
(3, '2015-06-23', '14:15:00', '2015-06-23', 'Hoàn thành', 3, 3, 1),
(4, '2017-08-17', '15:00:00', '2017-08-17', 'Hoàn thành', 4, 4, 1),
(5, '2020-03-29', '08:45:00', '2020-03-29', 'Hoàn thành', 5, 5, 1),
(6, '2022-05-11', '15:30:00', '2022-05-11', 'Hoàn thành', 1, 6, 1),
(7, '2024-01-15', '13:30:00', '2024-01-15', 'Hoàn thành', 2, 7, 1),
(8, '2018-09-05', '09:30:00', '2018-09-05', 'Chưa Hoàn Thành', 5, 8, 1),
(9, '2023-11-01', '14:45:00', '2023-11-01', 'Hoàn thành', 4, 9, 2),
(10, '2021-12-14', '10:30:00', '2021-12-14', 'Chưa Hoàn Thành', 5, 10, 2),
(11, '2009-04-22', '08:15:00', '2009-04-22', 'Chưa Hoàn Thành', 1, 11, 2),
(12, '2013-10-09', '08:00:00', '2013-10-09', 'Hoàn Thành', 2, 12, 2),
(13, '2016-06-19', '09:45:00', '2016-06-19', 'Hoàn thành', 3, 13, 2),
(14, '2020-02-07', '08:15:00', '2020-02-07', 'Hoàn thành', 4, 14, 2),
(15, '2024-03-01', '10:00:00', '2024-03-01', 'Chưa Hoàn Thành', 5, 15, 2),
(16, '2017-01-02', '08:45:00', '2017-01-02', 'Hoàn thành', 5, 16, 3),
(17, '2014-09-13', '14:15:00', '2014-09-13', 'Hoàn thành', 2, 17, 3),
(18, '2019-12-18', '13:00:00', '2019-12-18', 'Hoàn thành', 3, 18, 3),
(19, '2022-08-27', '09:30:00', '2022-08-27', 'Hoàn thành', 4, 19, 3),
(20, '2020-10-31', '07:45:00', '2020-10-31', 'Hoàn thành', 5, 20, 3),
(21, '2018-04-15', '08:45:00', '2018-04-15', 'Hoàn thành', 1, 21, 3),
(22, '2017-07-22', '07:00:00', '2017-07-22', 'Hoàn thành', 2, 22, 3),
(23, '2012-11-01', '07:15:00', '2012-11-01', 'Hoàn thành', 1, 23, 4),
(24, '2013-06-22', '09:45:00', '2013-06-22', 'Hoàn thành', 2, 24, 4),
(25, '2014-07-15', '08:00:00', '2014-07-15', 'Hoàn thành', 3, 25, 4),
(26, '2015-05-10', '09:15:00', '2015-05-10', 'Hoàn thành', 4, 26, 4),
(27, '2016-09-18', '07:00:00', '2016-09-18', 'Hoàn thành', 5, 27, 4),
(28, '2017-02-09', '08:00:00', '2017-02-09', 'Hoàn thành', 1, 28, 4),
(29, '2018-10-04', '07:45:00', '2018-10-04', 'Hoàn thành', 2, 29, 4),
(30, '2019-03-01', '07:45:00', '2019-03-01', 'Hoàn thành', 3, 30, 4),
(31, '2020-07-14', '10:45:00', '2020-07-14', 'Hoàn thành', 1, 31, 5),
(32, '2021-04-25', '08:45:00', '2021-04-25', 'Hoàn thành', 2, 32, 5),
(33, '2022-01-07', '07:30:00', '2022-01-07', 'Hoàn thành', 3, 33, 5),
(34, '2023-08-13', '07:45:00', '2023-08-13', 'Hoàn thành', 4, 34, 5),
(35, '2024-02-26', '07:45:00', '2024-02-26', 'Hoàn thành', 5, 35, 5);

-- --------------------------------------------------------

--
-- Table structure for table `lichlam`
--

CREATE TABLE `lichlam` (
  `maLichLam` int(11) NOT NULL,
  `ngayLam` date NOT NULL,
  `caLam` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `maBacSi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `lichlam`
--

INSERT INTO `lichlam` (`maLichLam`, `ngayLam`, `caLam`, `maBacSi`) VALUES
(1, '2024-12-02', 'Cả ngày', 1),
(2, '2024-12-02', 'Cả ngày', 2),
(3, '2024-12-02', 'Cả ngày', 3),
(4, '2024-12-02', 'Cả ngày', 4),
(5, '2024-12-02', 'Cả ngày', 5),
(6, '2024-12-03', 'Cả ngày', 1),
(7, '2024-12-03', 'Cả ngày', 2),
(8, '2024-12-03', 'Cả ngày', 3),
(9, '2024-12-03', 'Cả ngày', 4),
(10, '2024-12-03', 'Cả ngày', 5),
(11, '2024-12-04', 'Cả ngày', 1),
(12, '2024-12-04', 'Cả ngày', 2),
(13, '2024-12-04', 'Cả ngày', 3),
(14, '2024-12-04', 'Cả ngày', 4),
(15, '2024-12-04', 'Cả ngày', 5),
(16, '2024-12-05', 'Cả ngày', 1),
(17, '2024-12-05', 'Cả ngày', 2),
(18, '2024-12-05', 'Cả ngày', 3),
(19, '2024-12-05', 'Cả ngày', 4),
(20, '2024-12-05', 'Cả ngày', 5),
(21, '2024-12-06', 'Cả ngày', 1),
(22, '2024-12-06', 'Cả ngày', 2),
(23, '2024-12-06', 'Cả ngày', 3),
(24, '2024-12-06', 'Cả ngày', 4),
(25, '2024-12-06', 'Cả ngày', 5),
(26, '2024-12-09', 'Cả ngày', 1),
(27, '2024-12-09', 'Cả ngày', 2),
(28, '2024-12-09', 'Cả ngày', 3),
(29, '2024-12-09', 'Cả ngày', 4),
(30, '2024-12-09', 'Cả ngày', 5),
(31, '2024-12-10', 'Cả ngày', 1),
(32, '2024-12-10', 'Cả ngày', 2),
(33, '2024-12-10', 'Cả ngày', 3),
(34, '2024-12-10', 'Cả ngày', 4),
(35, '2024-12-10', 'Cả ngày', 5),
(36, '2024-12-11', 'Cả ngày', 1),
(37, '2024-12-11', 'Cả ngày', 2),
(38, '2024-12-11', 'Cả ngày', 3),
(39, '2024-12-11', 'Cả ngày', 4),
(40, '2024-12-11', 'Cả ngày', 5),
(41, '2024-12-12', 'Cả ngày', 1),
(42, '2024-12-12', 'Cả ngày', 2),
(43, '2024-12-12', 'Cả ngày', 3),
(44, '2024-12-12', 'Cả ngày', 4),
(45, '2024-12-12', 'Cả ngày', 5),
(46, '2024-12-13', 'Cả ngày', 1),
(47, '2024-12-13', 'Cả ngày', 2),
(48, '2024-12-13', 'Cả ngày', 3),
(49, '2024-12-13', 'Cả ngày', 4),
(50, '2024-12-13', 'Cả ngày', 5),
(51, '2024-12-16', 'Cả ngày', 1),
(52, '2024-12-16', 'Cả ngày', 2),
(53, '2024-12-16', 'Cả ngày', 3),
(54, '2024-12-16', 'Cả ngày', 4),
(55, '2024-12-16', 'Cả ngày', 5),
(56, '2024-12-17', 'Cả ngày', 1),
(57, '2024-12-17', 'Cả ngày', 2),
(58, '2024-12-17', 'Cả ngày', 3),
(59, '2024-12-17', 'Cả ngày', 4),
(60, '2024-12-17', 'Cả ngày', 5),
(61, '2024-12-18', 'Cả ngày', 1),
(62, '2024-12-18', 'Cả ngày', 2),
(63, '2024-12-18', 'Cả ngày', 3),
(64, '2024-12-18', 'Cả ngày', 4),
(65, '2024-12-18', 'Cả ngày', 5),
(66, '2024-12-19', 'Cả ngày', 1),
(67, '2024-12-19', 'Cả ngày', 2),
(68, '2024-12-19', 'Cả ngày', 3),
(69, '2024-12-19', 'Cả ngày', 4),
(70, '2024-12-19', 'Cả ngày', 5),
(71, '2024-12-20', 'Cả ngày', 1),
(72, '2024-12-20', 'Cả ngày', 2),
(73, '2024-12-20', 'Cả ngày', 3),
(74, '2024-12-20', 'Cả ngày', 4),
(75, '2024-12-20', 'Cả ngày', 5),
(76, '2024-12-23', 'Cả ngày', 1),
(77, '2024-12-23', 'Cả ngày', 2),
(78, '2024-12-23', 'Cả ngày', 3),
(79, '2024-12-23', 'Cả ngày', 4),
(80, '2024-12-23', 'Cả ngày', 5),
(81, '2024-12-24', 'Cả ngày', 1),
(82, '2024-12-24', 'Cả ngày', 2),
(83, '2024-12-24', 'Cả ngày', 3),
(84, '2024-12-24', 'Cả ngày', 4),
(85, '2024-12-24', 'Cả ngày', 5),
(86, '2024-12-25', 'Cả ngày', 1),
(87, '2024-12-25', 'Cả ngày', 2),
(88, '2024-12-25', 'Cả ngày', 3),
(89, '2024-12-25', 'Cả ngày', 4),
(90, '2024-12-25', 'Cả ngày', 5),
(91, '2024-12-26', 'Cả ngày', 1),
(92, '2024-12-26', 'Cả ngày', 2),
(93, '2024-12-26', 'Cả ngày', 3),
(94, '2024-12-26', 'Cả ngày', 4),
(95, '2024-12-26', 'Cả ngày', 5),
(96, '2024-12-27', 'Cả ngày', 1),
(97, '2024-12-27', 'Cả ngày', 2),
(98, '2024-12-27', 'Cả ngày', 3),
(99, '2024-12-27', 'Cả ngày', 4),
(100, '2024-12-27', 'Cả ngày', 5),
(101, '2024-12-30', 'Cả ngày', 1),
(102, '2024-12-30', 'Cả ngày', 2),
(103, '2024-12-30', 'Cả ngày', 3),
(104, '2024-12-30', 'Cả ngày', 4),
(105, '2024-12-30', 'Cả ngày', 5),
(106, '2024-12-31', 'Cả ngày', 1),
(107, '2024-12-31', 'Cả ngày', 2),
(108, '2024-12-31', 'Cả ngày', 3),
(109, '2024-12-31', 'Cả ngày', 4),
(110, '2024-12-31', 'Cả ngày', 5),
(128, '2024-12-01', 'Sáng', 1),
(129, '2024-12-01', 'Sáng', 2),
(130, '2024-12-01', 'Sáng', 3),
(131, '2024-12-01', 'Chiều', 4),
(132, '2024-12-01', 'Sáng', 5),
(133, '2024-12-07', 'Sáng', 1),
(134, '2024-12-07', 'Chiều', 2),
(135, '2024-12-07', 'Chiều', 3),
(136, '2024-12-07', 'Chiều', 4),
(137, '2024-12-07', 'Chiều', 5),
(138, '2024-12-08', 'Sáng', 1),
(139, '2024-12-08', 'Chiều', 2),
(140, '2024-12-08', 'Sáng', 3),
(141, '2024-12-08', 'Sáng', 4),
(142, '2024-12-08', 'Chiều', 5),
(143, '2024-12-14', 'Sáng', 1),
(144, '2024-12-14', 'Sáng', 2),
(145, '2024-12-14', 'Sáng', 3),
(146, '2024-12-14', 'Chiều', 4),
(147, '2024-12-14', 'Chiều', 5),
(148, '2024-12-15', 'Chiều', 1),
(149, '2024-12-15', 'Sáng', 2),
(150, '2024-12-15', 'Sáng', 3),
(151, '2024-12-15', 'Sáng', 4),
(152, '2024-12-15', 'Chiều', 5),
(153, '2024-12-21', 'Sáng', 1),
(154, '2024-12-21', 'Sáng', 2),
(155, '2024-12-21', 'Sáng', 3),
(156, '2024-12-21', 'Sáng', 4),
(157, '2024-12-21', 'Chiều', 5),
(158, '2024-12-22', 'Chiều', 1),
(159, '2024-12-22', 'Chiều', 2),
(160, '2024-12-22', 'Chiều', 3),
(161, '2024-12-22', 'Chiều', 4),
(162, '2024-12-22', 'Chiều', 5),
(163, '2024-12-28', 'Chiều', 1),
(164, '2024-12-28', 'Sáng', 2),
(165, '2024-12-28', 'Sáng', 3),
(166, '2024-12-28', 'Chiều', 4),
(167, '2024-12-28', 'Chiều', 5),
(168, '2024-12-29', 'Sáng', 1),
(169, '2024-12-29', 'Sáng', 2),
(170, '2024-12-29', 'Sáng', 3),
(171, '2024-12-29', 'Chiều', 4),
(172, '2024-12-29', 'Chiều', 5);

-- --------------------------------------------------------

--
-- Table structure for table `loaixetnghiem`
--

CREATE TABLE `loaixetnghiem` (
  `maLoai` int(11) NOT NULL,
  `tenLoai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `loaixetnghiem`
--

INSERT INTO `loaixetnghiem` (`maLoai`, `tenLoai`) VALUES
(1, 'Xét nghiệm đường huyết (tiểu đường)'),
(2, 'Xét nghiệm cholesterol máu (tim mạch)'),
(3, 'Xét nghiệm chức năng gan (viêm gan)'),
(4, 'Xét nghiệm tế bào máu (huyết học)'),
(5, 'Xét nghiệm viêm loét dạ dày (HP)'),
(6, 'Xét nghiệm chức năng thận (thận)'),
(7, 'Xét nghiệm mỡ trong máu (mỡ máu cao)'),
(8, 'Xét nghiệm điện tâm đồ (tim mạch)'),
(9, 'Xét nghiệm siêu âm bụng (đau bụng, gan)'),
(10, 'Xét nghiệm HIV'),
(11, 'Xét nghiệm chức năng tuyến giáp'),
(12, 'Xét nghiệm kháng thể viêm gan B'),
(13, 'Xét nghiệm huyết thanh (nhiễm trùng)'),
(14, 'Xét nghiệm điện não đồ (mất ngủ)'),
(15, 'Xét nghiệm virus cúm'),
(16, 'Xét nghiệm kháng thể viêm khớp'),
(17, 'Xét nghiệm vi sinh học (vi khuẩn gây viêm họng)'),
(18, 'Xét nghiệm hình ảnh học (chụp X-quang hoặc CT)');

-- --------------------------------------------------------

--
-- Table structure for table `phieuxetnghiem`
--

CREATE TABLE `phieuxetnghiem` (
  `maPhieu` int(11) NOT NULL,
  `ketQuaXetNghiem` varchar(255) NOT NULL,
  `ngayXetNghiem` date DEFAULT NULL,
  `gioXetNghiem` time DEFAULT NULL,
  `ngayTaoPhieu` date DEFAULT NULL,
  `trangThai` varchar(255) NOT NULL,
  `maLoai` int(11) NOT NULL,
  `maHoSo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `phieuxetnghiem`
--

INSERT INTO `phieuxetnghiem` (`maPhieu`, `ketQuaXetNghiem`, `ngayXetNghiem`, `gioXetNghiem`, `ngayTaoPhieu`, `trangThai`, `maLoai`, `maHoSo`) VALUES
(1, 'Có vi khuẩn gây viêm họng', '2013-12-09', '09:30:00', '2013-12-08', 'Hoàn thành', 17, 1),
(2, 'Đường huyết cao', '2010-02-13', '08:20:00', '2010-02-13', 'Hoàn Thành', 1, 2),
(3, 'Không vấn đề gì', '2015-06-24', '15:20:00', '2015-06-24', 'Hoàn Thành', 18, 3),
(4, 'Gãy xương', '2017-08-18', '08:30:00', '2017-08-18', 'Hoàn Thành', 18, 4),
(5, 'Kết quả điện não đồ bình thường', '2020-03-30', '09:20:00', '2020-03-30', 'Hoàn Thành', 14, 5),
(6, 'Không có dấu hiệu bất thường', '2022-05-12', '10:30:00', '2022-05-12', 'Hoàn Thành', 9, 6),
(7, 'Phát hiện virus cúm', '2024-01-16', '07:00:00', '2024-01-16', 'Hoàn Thành', 15, 7),
(8, 'Dương tính với vi khuẩn HP', '2018-09-06', '15:30:00', '2018-09-06', 'Hoàn Thành', 5, 8),
(9, 'Vỡ xương khớp gối', '2023-11-02', '10:00:00', '2023-11-02', 'Hoàn Thành', 18, 9),
(10, 'Huyết áp tăng', '2021-12-15', '16:00:00', '2021-12-15', 'Hoàn Thành', 2, 10),
(11, 'Chỉ số kháng thể viêm khớp cao', '2009-04-23', '08:15:00', '2009-04-23', 'Hoàn Thành', 16, 11),
(12, 'Bình thường\r\n', '2013-10-10', '07:25:00', '2013-10-10', 'Hoàn Thành', 18, 12),
(13, 'Cholesterol cao', '2016-06-20', '14:00:00', '2016-06-20', 'Hoàn Thành', 8, 13),
(14, 'Phát hiện virus cúm', '2020-02-08', '08:00:00', '2020-02-08', 'Hoàn Thành', 15, 14),
(15, 'Bình thường', '2024-03-02', '07:15:00', '2024-03-02', 'Hoàn Thành', 18, 15),
(16, 'Âm tính với HP', '2019-12-19', '16:30:00', '2019-12-19', 'Hoàn Thành', 5, 18),
(17, 'Chức năng gan bình thường', '2019-12-19', '10:00:00', '2019-12-19', 'Hoàn Thành', 3, 18),
(18, 'Có dấu hiệu viêm khớp', '2017-07-23', '09:20:00', '2017-07-23', 'Hoàn Thành', 16, 22),
(19, 'Điện tâm đồ bình thường', '2012-11-02', '09:45:00', '2012-11-02', 'Hoàn Thành', 8, 53),
(20, 'Mỡ máu cao', '2017-07-23', '07:30:00', '2017-07-23', 'Hoàn Thành', 7, 22),
(21, 'Xương gãy, cần phẫu thuật', '2022-08-28', '09:45:00', '2022-08-28', 'Hoàn Thành', 18, 19),
(22, 'Tiểu đường', '2020-07-15', '10:00:00', '2020-07-15', 'Hoàn Thành', 1, 54),
(23, 'Virus cúm âm tính', '2015-05-11', '15:30:00', '2015-05-11', 'Hoàn Thành', 15, 56),
(26, 'Xương gãy, cần phẫu thuật', '2022-01-08', '08:45:00', '2022-01-08', 'Hoàn Thành', 18, 63),
(27, 'Âm tính với vi khuẩn gây viêm họng', '2012-11-02', '07:30:00', '2012-11-02', 'Hoàn Thành', 17, 53),
(28, 'Không có viêm loét', '2019-12-19', '14:00:00', '2019-12-19', 'Hoàn Thành', 5, 18),
(29, 'Đường huyết bình thường', '2023-08-14', '08:45:00', '2023-08-14', 'Hoàn Thành', 1, 64),
(30, 'Chức năng thận bình thường', '2018-04-11', '07:45:00', '2018-04-11', 'Hoàn Thành', 6, 21),
(31, 'Huyết thanh bình thường', '2019-03-02', '10:30:00', '2019-03-02', 'Hoàn Thành', 13, 18);

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `maTaiKhoan` int(11) NOT NULL,
  `hoTenDem` varchar(255) NOT NULL,
  `tenTaiKhoan` varchar(255) NOT NULL,
  `soDienThoai` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `vaiTro` varchar(255) NOT NULL DEFAULT 'Bệnh nhân'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`maTaiKhoan`, `hoTenDem`, `tenTaiKhoan`, `soDienThoai`, `password`, `vaiTro`) VALUES
(1, 'Nguyễn Kim', 'Hoàng', '1', 'c4ca4238a0b923820dcc509a6f75849b', 'Bệnh nhân'),
(2, 'Hà Anh', 'Tuấn', '2', 'c81e728d9d4c2f636f067f89cc14862c', 'Bác sĩ'),
(3, 'Nguyễn Thị', 'Hà', '3', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', 'Quản lý'),
(4, 'Nguyễn Văn', 'Hào', '0123', 'eb62f6b9306db575c2d596b1279627a4', 'Bệnh nhân'),
(5, 'Lê Thị', 'Bích', '0456', 'fec8038ae4436caa7188b2e3f0bd216f', 'Bệnh nhân'),
(6, 'Trần Quang', 'Huy', '0789', '350c2900ac4b9042ba82f1ce0d5a5150', 'Bệnh nhân'),
(7, 'Phạm Quốc', 'Khánh', '0234', 'c8e585c56adbcb064ff08aa53e5f3aef', 'Bệnh nhân'),
(8, 'Vũ Thị', 'Lan', '0567', '6f343e529f3a92598243852abfe5325a', 'Bệnh nhân'),
(9, 'Đỗ Thành', 'Long', '0890', '945aff29f48ea9752aa14d6880388a25', 'Bệnh nhân'),
(10, 'Hoàng Anh', 'Khoa', '0911', '6d9ff949640422493f3db836c3035c64', 'Bệnh nhân'),
(11, 'Ngô Quốc', 'Toàn', '0345', '172327706fc975aa0962791884609c37', 'Bệnh nhân'),
(12, 'Bùi Minh', 'Triết', '0678', '4108a2b85a2edf0c8c70fe61a9d30173', 'Bệnh nhân'),
(13, 'Nguyễn Đức', 'Mạnh', '0121', 'fee67cadcc3a0bec8e00641884903c45', 'Bác sĩ'),
(14, 'Lê Minh', 'Tuấn', '0907', '5aee410122e9d1d76f194496cb2f90de', 'Bác sĩ'),
(15, 'Trần Thị', 'Hoa', '0343', 'e83d66d039a426ce86289b530797a836', 'Bác sĩ'),
(16, 'Phạm Anh', 'Duy', '0235', 'cb9d15824c38fb9ec3067d475c3339ca', 'Bác sĩ');

-- --------------------------------------------------------

--
-- Table structure for table `thuoc`
--

CREATE TABLE `thuoc` (
  `maThuoc` int(11) NOT NULL,
  `tenThuoc` varchar(255) NOT NULL,
  `moTa` varchar(255) DEFAULT NULL,
  `donViTinh` varchar(255) DEFAULT NULL,
  `quyCach` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `thuoc`
--

INSERT INTO `thuoc` (`maThuoc`, `tenThuoc`, `moTa`, `donViTinh`, `quyCach`) VALUES
(1, 'Paracetamol', 'Giảm đau, hạ sốt', 'Viên', 'Hộp 20 viên'),
(2, 'Ibuprofen', 'Giảm đau, kháng viêm', 'Viên', 'Hộp 30 viên'),
(3, 'Amoxicillin', 'Kháng sinh', 'Viên', 'Hộp 10 viên');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bacsi`
--
ALTER TABLE `bacsi`
  ADD PRIMARY KEY (`maBacSi`),
  ADD KEY `maTaiKhoan` (`maTaiKhoan`);

--
-- Indexes for table `benhnhan`
--
ALTER TABLE `benhnhan`
  ADD PRIMARY KEY (`maBenhNhan`),
  ADD KEY `maTaiKhoan` (`maTaiKhoan`);

--
-- Indexes for table `chitietdonthuoc`
--
ALTER TABLE `chitietdonthuoc`
  ADD PRIMARY KEY (`maChiTietDonThuoc`),
  ADD KEY `FK_ChiTietDonThuoc_DonThuoc` (`maDonThuoc`),
  ADD KEY `FK_ChiTietDonThuoc_Thuoc` (`maThuoc`);

--
-- Indexes for table `donthuoc`
--
ALTER TABLE `donthuoc`
  ADD PRIMARY KEY (`maDonThuoc`),
  ADD KEY `FK_DonThuoc_HoSo` (`maHoSo`);

--
-- Indexes for table `hosobenhan`
--
ALTER TABLE `hosobenhan`
  ADD PRIMARY KEY (`maHoSo`),
  ADD KEY `maBenhNhan` (`maBenhNhan`),
  ADD KEY `maBacSi` (`maBacSi`),
  ADD KEY `maBenhNhan_2` (`maBenhNhan`);

--
-- Indexes for table `lichhen`
--
ALTER TABLE `lichhen`
  ADD PRIMARY KEY (`maLichHen`),
  ADD KEY `maBenhNhan` (`maBenhNhan`);

--
-- Indexes for table `lichkham`
--
ALTER TABLE `lichkham`
  ADD PRIMARY KEY (`maLichKham`),
  ADD KEY `maBacSi` (`maBacSi`),
  ADD KEY `maLichHen` (`maLichHen`),
  ADD KEY `maBenhNhan` (`maBenhNhan`);

--
-- Indexes for table `loaixetnghiem`
--
ALTER TABLE `loaixetnghiem`
  ADD PRIMARY KEY (`maLoai`);

--
-- Indexes for table `phieuxetnghiem`
--
ALTER TABLE `phieuxetnghiem`
  ADD PRIMARY KEY (`maPhieu`),
  ADD KEY `maHoSo` (`maHoSo`),
  ADD KEY `maLoai` (`maLoai`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`maTaiKhoan`),
  ADD UNIQUE KEY `soDienThoai` (`soDienThoai`),
  ADD KEY `password` (`password`),
  ADD KEY `tenTaiKhoan` (`tenTaiKhoan`),
  ADD KEY `hoTenDem` (`hoTenDem`);

--
-- Indexes for table `thuoc`
--
ALTER TABLE `thuoc`
  ADD PRIMARY KEY (`maThuoc`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bacsi`
--
ALTER TABLE `bacsi`
  MODIFY `maBacSi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `benhnhan`
--
ALTER TABLE `benhnhan`
  MODIFY `maBenhNhan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `chitietdonthuoc`
--
ALTER TABLE `chitietdonthuoc`
  MODIFY `maChiTietDonThuoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `donthuoc`
--
ALTER TABLE `donthuoc`
  MODIFY `maDonThuoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `hosobenhan`
--
ALTER TABLE `hosobenhan`
  MODIFY `maHoSo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `lichhen`
--
ALTER TABLE `lichhen`
  MODIFY `maLichHen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `lichkham`
--
ALTER TABLE `lichkham`
  MODIFY `maLichKham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `loaixetnghiem`
--
ALTER TABLE `loaixetnghiem`
  MODIFY `maLoai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `phieuxetnghiem`
--
ALTER TABLE `phieuxetnghiem`
  MODIFY `maPhieu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `maTaiKhoan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bacsi`
--
ALTER TABLE `bacsi`
  ADD CONSTRAINT `fk_bs_maTaiKhoan` FOREIGN KEY (`maTaiKhoan`) REFERENCES `taikhoan` (`maTaiKhoan`);

--
-- Constraints for table `benhnhan`
--
ALTER TABLE `benhnhan`
  ADD CONSTRAINT `fk_bn_maTaiKhoan` FOREIGN KEY (`maTaiKhoan`) REFERENCES `taikhoan` (`maTaiKhoan`);

--
-- Constraints for table `chitietdonthuoc`
--
ALTER TABLE `chitietdonthuoc`
  ADD CONSTRAINT `FK_ChiTietDonThuoc_DonThuoc` FOREIGN KEY (`maDonThuoc`) REFERENCES `donthuoc` (`maDonThuoc`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_ChiTietDonThuoc_Thuoc` FOREIGN KEY (`maThuoc`) REFERENCES `thuoc` (`maThuoc`) ON DELETE CASCADE,
  ADD CONSTRAINT `chitietdonthuoc_ibfk_1` FOREIGN KEY (`maDonThuoc`) REFERENCES `donthuoc` (`maDonThuoc`) ON DELETE CASCADE,
  ADD CONSTRAINT `chitietdonthuoc_ibfk_2` FOREIGN KEY (`maThuoc`) REFERENCES `thuoc` (`maThuoc`) ON DELETE CASCADE;

--
-- Constraints for table `donthuoc`
--
ALTER TABLE `donthuoc`
  ADD CONSTRAINT `FK_DonThuoc_HoSo` FOREIGN KEY (`maHoSo`) REFERENCES `hosobenhan` (`maHoSo`) ON DELETE CASCADE;

--
-- Constraints for table `hosobenhan`
--
ALTER TABLE `hosobenhan`
  ADD CONSTRAINT `fkhsbn_maBacSi` FOREIGN KEY (`maBacSi`) REFERENCES `bacsi` (`maBacSi`),
  ADD CONSTRAINT `fkhsbn_maBenhNhan` FOREIGN KEY (`maBenhNhan`) REFERENCES `benhnhan` (`maBenhNhan`);

--
-- Constraints for table `lichhen`
--
ALTER TABLE `lichhen`
  ADD CONSTRAINT `fk_lh_maBenhNhan` FOREIGN KEY (`maBenhNhan`) REFERENCES `benhnhan` (`maBenhNhan`);

--
-- Constraints for table `lichkham`
--
ALTER TABLE `lichkham`
  ADD CONSTRAINT `fk_lk_maBacSi` FOREIGN KEY (`maBacSi`) REFERENCES `bacsi` (`maBacSi`),
  ADD CONSTRAINT `fk_lk_maBenhNhan` FOREIGN KEY (`maBenhNhan`) REFERENCES `benhnhan` (`maBenhNhan`),
  ADD CONSTRAINT `fk_lk_maLichHen` FOREIGN KEY (`maLichHen`) REFERENCES `lichhen` (`maLichHen`);

--
-- Constraints for table `phieuxetnghiem`
--
ALTER TABLE `phieuxetnghiem`
  ADD CONSTRAINT `fk_pxn_maHoSo` FOREIGN KEY (`maHoSo`) REFERENCES `hosobenhan` (`maHoSo`),
  ADD CONSTRAINT `fk_pxn_maLoai` FOREIGN KEY (`maLoai`) REFERENCES `loaixetnghiem` (`maLoai`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
