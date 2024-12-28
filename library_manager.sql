-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 31, 2024 lúc 06:53 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `library_manager`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dat_sach`
--

CREATE TABLE `dat_sach` (
  `ma_dat_sach` int(11) NOT NULL,
  `ma_nguoi_dung` int(11) DEFAULT NULL,
  `ma_sach` int(11) DEFAULT NULL,
  `ngay_dat` date DEFAULT NULL,
  `trang_thai` enum('cho_duyet','da_duyet','huy') DEFAULT 'cho_duyet'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoi_dung`
--

CREATE TABLE `nguoi_dung` (
  `ma_nguoi_dung` int(11) NOT NULL,
  `ten_dang_nhap` varchar(50) NOT NULL,
  `mat_khau` varchar(255) NOT NULL,
  `ho_ten` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `so_dien_thoai` varchar(15) DEFAULT NULL,
  `vai_tro` enum('quan_tri','nhan_vien','user') DEFAULT 'user',
  `ngay_tao` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nha_xuat_ban`
--

CREATE TABLE `nha_xuat_ban` (
  `ma_nha_xuat_ban` int(11) NOT NULL,
  `ten_nha_xuat_ban` varchar(100) DEFAULT NULL,
  `dia_chi` text DEFAULT NULL,
  `so_dien_thoai` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nha_xuat_ban`
--

INSERT INTO `nha_xuat_ban` (`ma_nha_xuat_ban`, `ten_nha_xuat_ban`, `dia_chi`, `so_dien_thoai`) VALUES
(6, 'nhi dong', 'tra vinh', '0123456789');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phat`
--

CREATE TABLE `phat` (
  `ma_phat` int(11) NOT NULL,
  `ma_nguoi_dung` int(11) DEFAULT NULL,
  `so_tien` decimal(10,2) DEFAULT NULL,
  `da_thanh_toan` tinyint(1) DEFAULT 0,
  `ngay_tao` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieu_muon`
--

CREATE TABLE `phieu_muon` (
  `ma_phieu_muon` int(11) NOT NULL,
  `ma_nguoi_dung` int(11) DEFAULT NULL,
  `ma_sach` int(11) DEFAULT NULL,
  `ngay_muon` date DEFAULT NULL,
  `ngay_tra` date DEFAULT NULL,
  `da_tra` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sach`
--

CREATE TABLE `sach` (
  `ma_sach` int(11) NOT NULL,
  `ten_sach` varchar(255) NOT NULL,
  `hinh_anh` varchar(255) NOT NULL,
  `ma_tac_gia` int(11) DEFAULT NULL,
  `ma_nha_xuat_ban` int(11) DEFAULT NULL,
  `nam_xuat_ban` year(4) DEFAULT NULL,
  `ma_the_loai` int(11) DEFAULT NULL,
  `so_luong` int(11) DEFAULT NULL,
  `ngay_tao` timestamp NOT NULL DEFAULT current_timestamp(),
  `ngay_cap_nhat` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sach`
--

INSERT INTO `sach` (`ma_sach`, `ten_sach`, `hinh_anh`, `ma_tac_gia`, `ma_nha_xuat_ban`, `nam_xuat_ban`, `ma_the_loai`, `so_luong`, `ngay_tao`, `ngay_cap_nhat`) VALUES
(8, 'hoang nhut', 'Screenshot 2024-10-30 175632.png', 12, 6, '2020', 5, 10, '2024-10-31 00:34:58', '2024-10-31 00:34:58');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tac_gia`
--

CREATE TABLE `tac_gia` (
  `ma_tac_gia` int(11) NOT NULL,
  `ten_tac_gia` varchar(100) NOT NULL,
  `tieu_su` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tac_gia`
--

INSERT INTO `tac_gia` (`ma_tac_gia`, `ten_tac_gia`, `tieu_su`) VALUES
(12, 'nhut', 'xau'),
(13, 'dat', 'dep trai'),
(14, 'dai phu', 'tra vinh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `the_loai`
--

CREATE TABLE `the_loai` (
  `ma_the_loai` int(11) NOT NULL,
  `ten_the_loai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `the_loai`
--

INSERT INTO `the_loai` (`ma_the_loai`, `ten_the_loai`) VALUES
(5, 'so hai'),
(6, 'phu');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `dat_sach`
--
ALTER TABLE `dat_sach`
  ADD PRIMARY KEY (`ma_dat_sach`),
  ADD KEY `ma_nguoi_dung` (`ma_nguoi_dung`),
  ADD KEY `ma_sach` (`ma_sach`);

--
-- Chỉ mục cho bảng `nguoi_dung`
--
ALTER TABLE `nguoi_dung`
  ADD PRIMARY KEY (`ma_nguoi_dung`);

--
-- Chỉ mục cho bảng `nha_xuat_ban`
--
ALTER TABLE `nha_xuat_ban`
  ADD PRIMARY KEY (`ma_nha_xuat_ban`);

--
-- Chỉ mục cho bảng `phat`
--
ALTER TABLE `phat`
  ADD PRIMARY KEY (`ma_phat`),
  ADD KEY `ma_nguoi_dung` (`ma_nguoi_dung`);

--
-- Chỉ mục cho bảng `phieu_muon`
--
ALTER TABLE `phieu_muon`
  ADD PRIMARY KEY (`ma_phieu_muon`),
  ADD KEY `ma_nguoi_dung` (`ma_nguoi_dung`),
  ADD KEY `ma_sach` (`ma_sach`);

--
-- Chỉ mục cho bảng `sach`
--
ALTER TABLE `sach`
  ADD PRIMARY KEY (`ma_sach`),
  ADD KEY `ma_tac_gia` (`ma_tac_gia`),
  ADD KEY `ma_the_loai` (`ma_the_loai`),
  ADD KEY `ma_nha_xuat_ban` (`ma_nha_xuat_ban`);

--
-- Chỉ mục cho bảng `tac_gia`
--
ALTER TABLE `tac_gia`
  ADD PRIMARY KEY (`ma_tac_gia`);

--
-- Chỉ mục cho bảng `the_loai`
--
ALTER TABLE `the_loai`
  ADD PRIMARY KEY (`ma_the_loai`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `dat_sach`
--
ALTER TABLE `dat_sach`
  MODIFY `ma_dat_sach` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `nguoi_dung`
--
ALTER TABLE `nguoi_dung`
  MODIFY `ma_nguoi_dung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `nha_xuat_ban`
--
ALTER TABLE `nha_xuat_ban`
  MODIFY `ma_nha_xuat_ban` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `phat`
--
ALTER TABLE `phat`
  MODIFY `ma_phat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `phieu_muon`
--
ALTER TABLE `phieu_muon`
  MODIFY `ma_phieu_muon` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `sach`
--
ALTER TABLE `sach`
  MODIFY `ma_sach` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `tac_gia`
--
ALTER TABLE `tac_gia`
  MODIFY `ma_tac_gia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `the_loai`
--
ALTER TABLE `the_loai`
  MODIFY `ma_the_loai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `dat_sach`
--
ALTER TABLE `dat_sach`
  ADD CONSTRAINT `dat_sach_ibfk_1` FOREIGN KEY (`ma_nguoi_dung`) REFERENCES `nguoi_dung` (`ma_nguoi_dung`),
  ADD CONSTRAINT `dat_sach_ibfk_2` FOREIGN KEY (`ma_sach`) REFERENCES `sach` (`ma_sach`);

--
-- Các ràng buộc cho bảng `phat`
--
ALTER TABLE `phat`
  ADD CONSTRAINT `phat_ibfk_1` FOREIGN KEY (`ma_nguoi_dung`) REFERENCES `nguoi_dung` (`ma_nguoi_dung`);

--
-- Các ràng buộc cho bảng `phieu_muon`
--
ALTER TABLE `phieu_muon`
  ADD CONSTRAINT `phieu_muon_ibfk_1` FOREIGN KEY (`ma_nguoi_dung`) REFERENCES `nguoi_dung` (`ma_nguoi_dung`),
  ADD CONSTRAINT `phieu_muon_ibfk_2` FOREIGN KEY (`ma_sach`) REFERENCES `sach` (`ma_sach`);

--
-- Các ràng buộc cho bảng `sach`
--
ALTER TABLE `sach`
  ADD CONSTRAINT `sach_ibfk_1` FOREIGN KEY (`ma_tac_gia`) REFERENCES `tac_gia` (`ma_tac_gia`),
  ADD CONSTRAINT `sach_ibfk_2` FOREIGN KEY (`ma_the_loai`) REFERENCES `the_loai` (`ma_the_loai`),
  ADD CONSTRAINT `sach_ibfk_3` FOREIGN KEY (`ma_nha_xuat_ban`) REFERENCES `nha_xuat_ban` (`ma_nha_xuat_ban`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
