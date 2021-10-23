-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2021 at 06:52 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quanlydathang`
--

-- --------------------------------------------------------

--
-- Table structure for table `chitietdathang`
--

CREATE TABLE `chitietdathang` (
  `SoDonDH` int(6) NOT NULL,
  `MSHH` int(6) NOT NULL,
  `SoLuong` int(11) DEFAULT NULL CHECK (`SoLuong` >= 0),
  `GiaDatHang` int(11) DEFAULT NULL CHECK (`GiaDatHang` >= 0),
  `GiamGia` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dathang`
--

CREATE TABLE `dathang` (
  `SoDonDH` int(6) NOT NULL,
  `MSKH` char(40) DEFAULT NULL,
  `MSNV` char(40) DEFAULT NULL,
  `NgayDH` date DEFAULT NULL,
  `NgayGH` date DEFAULT NULL CHECK (`NgayDH` <= `NgayGH`),
  `TrangThaiDH` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dathang`
--

INSERT INTO `dathang` (`SoDonDH`, `MSKH`, `MSNV`, `NgayDH`, `NgayGH`, `TrangThaiDH`) VALUES
(200, 'y', 'B180', '0000-00-00', NULL, 1),
(344413, 'B180', NULL, '2021-09-03', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `diachikh`
--

CREATE TABLE `diachikh` (
  `MaDC` int(6) NOT NULL,
  `DiaChi` varchar(100) DEFAULT NULL,
  `MSKH` char(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `diachikh`
--

INSERT INTO `diachikh` (`MaDC`, `DiaChi`, `MSKH`) VALUES
(42, 'Cần Thơ', 'buicongminh'),
(44, 'Cần Thơ', 'B180'),
(46, 'Cần Thơ', 'a'),
(47, 'Hà Nội', 'y');

-- --------------------------------------------------------

--
-- Table structure for table `hanghoa`
--

CREATE TABLE `hanghoa` (
  `MSHH` int(6) NOT NULL,
  `TenHH` varchar(40) DEFAULT NULL,
  `QuyCach` text DEFAULT NULL,
  `Gia` int(11) DEFAULT NULL CHECK (`Gia` >= 0),
  `SoLuongHang` int(11) DEFAULT NULL CHECK (`SoLuongHang` >= 0),
  `MaLoaiHang` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hanghoa`
--

INSERT INTO `hanghoa` (`MSHH`, `TenHH`, `QuyCach`, `Gia`, `SoLuongHang`, `MaLoaiHang`) VALUES
(4, 'Máy Ảnh Nikon Coolpix W300 – Vàng', 'Máy Ảnh Nikon Coolpix W300  vàng', 9900, 100, 1),
(5, 'Máy Ảnh Nikon Coolpix W300 – Đen', 'Máy Ảnh Nikon Coolpix W300 – Cảm biến: BSI-CMOS 1/2.3″ độ phân giải 16 MP – Màn hình: 3″ độ phân giải 921.000 điểm ảnh – Tốc độ màn trập: 1/4.000 giây – Chụp liên tiếp: tối đa 7 fps – ISO: 125-6.400 – Quay phim: 4K/30p, 4K/25p, Full HD – Đèn trợ sáng: flash xenon + LED – Kết nối: Wi-Fi, Bluetooth, GPS – Giao tiếp: USB 2.0, HDMI – Lưu trữ: 473 MB + thẻ nhớ SD – Kích thước: 112 x 66 x 29 mm – Khối lượng: 231 g', 200000, 80, 1),
(6, 'Máy Ảnh Nikon Coolpix W300 – Đen', 'Máy Ảnh Nikon Coolpix W300 – Cảm biến: BSI-CMOS 1/2.3″ độ phân giải 16 MP – Màn hình: 3″ độ phân giải 921.000 điểm ảnh – Tốc độ màn trập: 1/4.000 giây – Chụp liên tiếp: tối đa 7 fps – ISO: 125-6.400 – Quay phim: 4K/30p, 4K/25p, Full HD – Đèn trợ sáng: flash xenon + LED – Kết nối: Wi-Fi, Bluetooth, GPS – Giao tiếp: USB 2.0, HDMI – Lưu trữ: 473 MB + thẻ nhớ SD – Kích thước: 112 x 66 x 29 mm – Khối lượng: 231 g', 200000, 80, 1),
(7, 'Máy Ảnh Nikon Coolpix W300 – Đen', 'Máy Ảnh Nikon Coolpix W300 – Cảm biến: BSI-CMOS 1/2.3″ độ phân giải 16 MP – Màn hình: 3″ độ phân giải 921.000 điểm ảnh – Tốc độ màn trập: 1/4.000 giây – Chụp liên tiếp: tối đa 7 fps – ISO: 125-6.400 – Quay phim: 4K/30p, 4K/25p, Full HD – Đèn trợ sáng: flash xenon + LED – Kết nối: Wi-Fi, Bluetooth, GPS – Giao tiếp: USB 2.0, HDMI – Lưu trữ: 473 MB + thẻ nhớ SD – Kích thước: 112 x 66 x 29 mm – Khối lượng: 231 g', 200000, 80, 1);

-- --------------------------------------------------------

--
-- Table structure for table `hinhhanghoa`
--

CREATE TABLE `hinhhanghoa` (
  `MaHinh` int(6) NOT NULL,
  `TenHinh` varchar(20) NOT NULL,
  `MSHH` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hinhhanghoa`
--

INSERT INTO `hinhhanghoa` (`MaHinh`, `TenHinh`, `MSHH`) VALUES
(2, 'logo.jpg', 4);

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `MSKH` char(40) NOT NULL,
  `HoTenKH` varchar(40) DEFAULT NULL,
  `TenCongTy` varchar(40) DEFAULT NULL,
  `SoDienThoai` char(10) DEFAULT NULL,
  `SoFax` int(20) DEFAULT NULL,
  `password` char(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`MSKH`, `HoTenKH`, `TenCongTy`, `SoDienThoai`, `SoFax`, `password`) VALUES
('a', 'a', 'Bình Minh ditital', '0329909462', 1234, 'c20ad4d76fe97759aa27a0c99bff6710'),
('B180', 'Hồ Như Ý', 'Việt Mỹ', '0329909468', 0, '7ffd85d93a3e4de5c490d304ccd9f864'),
('buicongminh', 'Bùi Công Minh', 'Việt Đức', '0123456789', 0, 'e10adc3949ba59abbe56e057f20f883e'),
('y', 'y', 'Việt Mỹ', '0329909468', 12345678, '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `loaihanghoa`
--

CREATE TABLE `loaihanghoa` (
  `MaLoaiHang` int(6) NOT NULL,
  `TenLoaiHang` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loaihanghoa`
--

INSERT INTO `loaihanghoa` (`MaLoaiHang`, `TenLoaiHang`) VALUES
(1, 'Máy Ảnh Canon'),
(2, 'Máy Ảnh Nikon'),
(3, 'Máy Ảnh Panasonic'),
(4, 'Máy Ảnh Fujifilm'),
(5, 'Máy Ảnh Sony');

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MSNV` char(40) NOT NULL,
  `HoTenNV` varchar(40) DEFAULT NULL,
  `ChucVu` int(11) DEFAULT NULL,
  `DiaChi` varchar(100) DEFAULT NULL,
  `SoDienThoai` char(10) DEFAULT NULL,
  `password` char(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`MSNV`, `HoTenNV`, `ChucVu`, `DiaChi`, `SoDienThoai`, `password`) VALUES
('B180', 'Nhẫn', 2, 'Cần Thơ', '0329909461', '0d033b42741823c0729a37ce5234f57e'),
('buicongminh', 'Bùi Công Minh', 1, 'Cần Thơ', '0123456789', '25f9e794323b453885f5181f1b624d0b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chitietdathang`
--
ALTER TABLE `chitietdathang`
  ADD PRIMARY KEY (`SoDonDH`,`MSHH`),
  ADD KEY `FK_hanghoa` (`MSHH`);

--
-- Indexes for table `dathang`
--
ALTER TABLE `dathang`
  ADD PRIMARY KEY (`SoDonDH`),
  ADD KEY `FK_nhanvien` (`MSNV`),
  ADD KEY `FK_khachhang` (`MSKH`);

--
-- Indexes for table `diachikh`
--
ALTER TABLE `diachikh`
  ADD PRIMARY KEY (`MaDC`),
  ADD KEY `FK_khachhang1` (`MSKH`);

--
-- Indexes for table `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD PRIMARY KEY (`MSHH`),
  ADD KEY `FK_loaihanghoa` (`MaLoaiHang`);

--
-- Indexes for table `hinhhanghoa`
--
ALTER TABLE `hinhhanghoa`
  ADD PRIMARY KEY (`MaHinh`),
  ADD KEY `FK_hanghoa1` (`MSHH`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MSKH`);

--
-- Indexes for table `loaihanghoa`
--
ALTER TABLE `loaihanghoa`
  ADD PRIMARY KEY (`MaLoaiHang`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MSNV`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `diachikh`
--
ALTER TABLE `diachikh`
  MODIFY `MaDC` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `hanghoa`
--
ALTER TABLE `hanghoa`
  MODIFY `MSHH` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `hinhhanghoa`
--
ALTER TABLE `hinhhanghoa`
  MODIFY `MaHinh` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `loaihanghoa`
--
ALTER TABLE `loaihanghoa`
  MODIFY `MaLoaiHang` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitietdathang`
--
ALTER TABLE `chitietdathang`
  ADD CONSTRAINT `FK_Chitiethanghoa` FOREIGN KEY (`SoDonDH`) REFERENCES `dathang` (`SoDonDH`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_hanghoa` FOREIGN KEY (`MSHH`) REFERENCES `hanghoa` (`MSHH`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dathang`
--
ALTER TABLE `dathang`
  ADD CONSTRAINT `FK_khachhang` FOREIGN KEY (`MSKH`) REFERENCES `khachhang` (`MSKH`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_nhanvien` FOREIGN KEY (`MSNV`) REFERENCES `nhanvien` (`MSNV`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `diachikh`
--
ALTER TABLE `diachikh`
  ADD CONSTRAINT `FK_khachhang1` FOREIGN KEY (`MSKH`) REFERENCES `khachhang` (`MSKH`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
