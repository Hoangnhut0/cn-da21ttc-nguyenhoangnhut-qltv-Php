-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 06, 2025 lúc 09:59 AM
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
  `code_cart` varchar(255) DEFAULT NULL,
  `ma_user` int(11) NOT NULL,
  `ngay_dat` date DEFAULT NULL,
  `trang_thai` enum('cho_duyet','da_duyet','huy','da_tra') DEFAULT 'cho_duyet'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `dat_sach`
--

INSERT INTO `dat_sach` (`ma_dat_sach`, `code_cart`, `ma_user`, `ngay_dat`, `trang_thai`) VALUES
(40, '5017', 1, '2025-01-06', 'cho_duyet');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dat_sach_chi_tiet`
--

CREATE TABLE `dat_sach_chi_tiet` (
  `ma_dat_sach_chi_tiet` int(11) NOT NULL,
  `ma_sach` int(11) NOT NULL,
  `code_cart` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `dat_sach_chi_tiet`
--

INSERT INTO `dat_sach_chi_tiet` (`ma_dat_sach_chi_tiet`, `ma_sach`, `code_cart`) VALUES
(43, 16, '5017'),
(44, 17, '5017'),
(45, 15, '5017');

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
  `vai_tro` enum('admin','nhan_vien') DEFAULT 'nhan_vien',
  `ngay_tao` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nguoi_dung`
--

INSERT INTO `nguoi_dung` (`ma_nguoi_dung`, `ten_dang_nhap`, `mat_khau`, `ho_ten`, `email`, `so_dien_thoai`, `vai_tro`, `ngay_tao`) VALUES
(7, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'hoangnhut', '123456@gmail.com', '0123456789', 'admin', '2024-10-31 18:58:55'),
(8, 'hoangnhut', '796f004488416428ecc8c79007a49766', 'hoangnhut', 'hoangnhut@gmail.com', '01235647852', 'nhan_vien', '2024-10-31 19:04:10');

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
(8, 'Nhà xuất bản trẻ', '', ''),
(9, '#1 New York Times bestselling author of The Girl on the Train', '', ''),
(10, 'Printz Honor Lily Anderson', '', ''),
(11, 'NXB thế giới', '', ''),
(12, 'NXB Trẻ', '', ''),
(13, 'NXB Khoa học - Xã hội', '', ''),
(14, 'NXB Hồng Đức', '', ''),
(15, 'NXB Kim Đồng', '', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phat`
--

CREATE TABLE `phat` (
  `ma_phat` int(11) NOT NULL,
  `ma_user` int(11) NOT NULL,
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
  `ma_user` int(11) NOT NULL,
  `code_cart` varchar(255) NOT NULL,
  `ngay_muon` date DEFAULT NULL,
  `ngay_tra` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sach`
--

CREATE TABLE `sach` (
  `ma_sach` int(11) NOT NULL,
  `ten_sach` varchar(255) NOT NULL,
  `hinh_anh` varchar(255) NOT NULL,
  `mo_ta` text NOT NULL,
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

INSERT INTO `sach` (`ma_sach`, `ten_sach`, `hinh_anh`, `mo_ta`, `ma_tac_gia`, `ma_nha_xuat_ban`, `nam_xuat_ban`, `ma_the_loai`, `so_luong`, `ngay_tao`, `ngay_cap_nhat`) VALUES
(10, 'Án Mạng Trên Chuyến Tàu Tốc Hành Phương Đông', 'mmm.png', 'Án Mạng Trên Chuyến Tàu Tốc Hành Phương Đông là một cuốn tiểu thuyết trinh thám được độc giả quan tâm và cuốn hút bởi chính là yếu tố gây cấn, bất ngờ, sự logic và hợp lí.\r\n\r\nMột tên giết người trên chuyến tàu tốc hành Phương Đông được phát hiện đã bị giết chết bởi 12 nhát dao khác nhau. Phải chăng hung thủ là người ngoài hay chính 12 hành khách - vốn có mối thù với hắn - thông đồng với nhau để trả thù? Thám tử Poirot đã ra tay và vụ án dần dần được làm sáng tỏ. Kết quả thu được không chỉ đơn thuần là câu trả lời cho vấn đề hung thủ là ai, mà chính là lương tâm của con người trước ánh sáng của công lí đã mở ra, anh lại tìm đến bên cô để cùng nhìn về một khoảng trời bình yên.', 19, 8, '1934', 15, 10, '2024-11-07 07:32:45', '2024-11-07 07:32:45'),
(11, 'Dont Let the Forest In', 'Dont Let the Forest In.png', 'Ngày xửa ngày xưa, Andrew đã cắt trái tim mình và trao cho cậu bé này, và cậu rất chắc chắn Thomas không hề biết Andrew sẽ làm bất cứ điều gì cho mình. Bảo vệ cậu. Nói dối vì cậu. Giết vì cậu. Cậu học sinh cuối cấp trung học Andrew Perrault tìm thấy nơi ẩn náu trong những câu chuyện cổ tích kỳ quái mà cậu viết cho người duy nhất có thể đưa cậu trở về với thực tế—Thomas Rye, cậu bé với đôi bàn tay luôn nhuốm mực và mái tóc như lá mùa thu. Và với người chị song sinh của mình, Dove, không hiểu sao lại giữ khoảng cách lạnh lùng với cậu khi họ trở về Học viện Wickwood, Andrew thấy mình càng dựa dẫm vào bạn mình hơn. Nhưng có điều gì đó kỳ lạ đang xảy ra với Thomas. Cha mẹ ngược đãi cậu đã biến mất một cách bí ẩn, và cậu đến trường với máu trên tay áo. Thomas không nói một lời nào về điều đó, và im lặng mỗi khi Andrew cố gắng hỏi cậu những câu hỏi. Lạ lùng hơn nữa, Thomas bị ám ảnh bởi một điều gì đó, và cậu dường như đã mất hứng thú với tác phẩm nghệ thuật của mình—những bức phác họa kỳ quái về những con quái vật trong những câu chuyện độc ác của Andrew. Tuyệt vọng muốn tìm hiểu xem chuyện gì đã xảy ra với người bạn của mình, Andrew theo Thomas vào khu rừng cấm một đêm và bắt gặp anh ta đang chiến đấu với một con quái vật kinh hoàng—những bức vẽ của Thomas đã trở nên sống động và đang giết chết bất kỳ ai ở gần anh ta. Để đảm bảo không ai khác phải chết, những cậu bé chiến đấu với quái vật mỗi đêm. Nhưng khi nỗi ám ảnh của họ với nhau ngày càng lớn, thì quái vật cũng vậy, và Andrew bắt đầu lo sợ rằng cách duy nhất để ngăn chặn những sinh vật đó có thể là tiêu diệt người tạo ra chúng…', 21, 8, '2024', 16, 5, '2024-11-07 08:09:10', '2024-11-07 08:09:10'),
(12, 'The Blue Hour', 'The Blue Hour.png', 'The propulsive and powerful new novel from the #1 New York Times bestselling author of The Girl on the Train.\r\n\r\nWelcome to Eris: an island with only one house, one inhabitant, one way out. Unreachable from the Scottish mainland for twelve hours each day.\r\n\r\nOnce home to Vanessa: A famous artist whose notoriously unfaithful husband disappeared twenty years ago.\r\n\r\nNow home to Grace: A solitary creature of the tides, content in her own isolation.\r\n\r\nBut when a shocking discovery is made in an art gallery far away in London, a visitor comes calling.\r\n\r\nAnd the secrets of Eris threaten to emerge....\r\n\r\nA masterful novel that is as page-turning as it is unsettling, The Blue Hour recalls the sophisticated suspense of Shirley Jackson and Patricia Highsmith and cements Hawkins’s place among the very best of our most nuanced and stylish storytellers.', 22, 9, '2024', 16, 30, '2024-11-07 08:31:09', '2024-11-07 08:31:09'),
(13, 'Killer House Party', 'Killer House Party.png', 'Từ tác giả đoạt giải Printz Honor Lily Anderson đến một bộ phim kinh dị dành cho thanh thiếu niên theo chân Arden và ba người bạn thân nhất của cô khi bữa tiệc tốt nghiệp của họ tại một biệt thự bỏ hoang biến thành một cuộc chiến đẫm máu để sinh tồn.\r\n\r\nCốc Red Solo? Có. Đồ ăn nhẹ? Có. Biệt thự bỏ hoang chứa đầy vô số nỗi kinh hoàng sẽ không cho bạn rời đi? Có. Biệt\r\n\r\nthự Deinhart đã là một cái bóng lờ mờ bao trùm thị trấn kể từ khi mọi người có thể nhớ, và nó đã bị bỏ hoang thậm chí còn lâu hơn nữa. Khi hậu duệ cuối cùng của Deinhart qua đời, biệt thự gothic khổng lồ được rao bán lần đầu tiên. Điều đó có nghĩa là Arden có thể đánh cắp chìa khóa từ văn phòng bất động sản của mẹ cô...\r\n\r\nĐã đến lúc tổ chức một bữa tiệc tốt nghiệp mà không ai có thể quên. Arden và những người bạn thân nhất của cô đều có những lý do khác nhau để muốn tổ chức bữa tiệc để kết thúc mọi bữa tiệc. Nhưng khi cánh cửa biệt thự chặn mọi người bên trong và các bức tường bắt đầu chảy máu, tất cả những gì mọi người muốn làm là sống sót trở ra.', 23, 10, '2024', 17, 20, '2024-11-07 08:37:58', '2024-11-07 08:37:58'),
(14, 'Cái Giá Của Đặc Quyền', 'Cái giá của đặt quyền.png', 'Cái giá của đặc quyền là cuốn sách cần thiết cho các bậc phụ huynh đang hoang mang với những vấn đề ở đứa con tuổi teen của mình. Họ không hiểu vì sao những đứa trẻ dường như “có đủ thứ” mà vẫn khó chịu, ủ dột, thiếu động lực, thậm chí là “hư hỏng”; họ không biết mình đã sai ở đâu và cần bước tiếp như thế nào, không xác định được đâu là những biểu hiện “bình thường” ở một đứa trẻ tuổi teen và đâu là những dấu hiệu cho thấy con cần được can thiệp, hỗ trợ...\r\n\r\nTrong cuốn sách này, Tiến sĩ Madeline Levine, một nhà tâm lí học lâm sàng nổi tiếng, đã cảnh báo về một đại dịch sức khỏe tâm thần đang hủy hoại những đứa trẻ vị thành niên xuất thân từ các gia đình giàu có ở Mĩ, chủ yếu là do cách nuôi dạy đầy áp lực và can thiệp quá mức khiến sự phát triển ý thức về cái tôi ở trẻ bị cản trở. Nhiều nghiên cứu gần đây đã chỉ ra rằng, dù có vẻ ngoài tự tin, sáng sủa, có thành tích nổi trội và kĩ năng xã hội xuất sắc, đám trẻ xuất thân từ các gia đình giàu có ở Mĩ đang có tỉ lệ mắc trầm cảm, lạm dụng chất gây nghiện và rối loạn lo âu cao hơn thanh thiếu niên ở bất kì nhóm kinh tế xã hội nào khác. Chủ nghĩa vật chất, áp lực thành tích, chủ nghĩa hoàn hảo và sự thiếu kết nối đang hợp sức lại tạo thành một cơn bão khủng khiếp tàn phá những đứa trẻ nhiều đặc quyền.\r\n\r\nCuốn sách viết về hiện trạng nhức nhối ở Mĩ nhưng hẳn sẽ khiến không ít độc giả Việt Nam giật mình nhận ra rằng cha mẹ Việt cũng đang phải đối mặt với những vấn đề tương tự, thậm chí còn ở mức độ phổ biến hơn nhiều. Đó là do trong nền văn hóa mà chúng ta đang sống, đa số các bậc cha mẹ đều tin rằng họ nên và cần phải chịu hi sinh vất vả để con cái có một tương lai tốt đẹp hơn.\r\n\r\nBằng sự đồng cảm và cũng rất thẳng thắn, Madeline Levine đã chỉ ra những ảnh hưởng độc hại từ nền văn hóa giàu có cùng các phong cách làm cha mẹ đầy thiện chí nhưng hết sức sai lầm. Tác giả cũng đưa ra những lời khuyên sâu sắc và thực tế nhằm cung cấp cho phụ huynh các giải pháp hiệu quả để họ có thể giúp con và cũng tự giúp mình vượt qua giai đoạn đầy thử thách của hành trình làm cha mẹ này.', 24, 11, '2024', 18, 30, '2024-11-07 08:48:08', '2024-11-07 08:48:08'),
(15, 'Hiểu Tâm Lý, Xóa Bỏ Lo Lắng Tuổi Tin', 'Hiểu Tâm Lý, Xóa Bỏ Lo Lắng Tuổi Tin.png', 'Cuốn sách thiết thực dành cho tuổi teen để giải quyết lo lắng.\r\nBạn có thường xuyên lo lắng? Bạn có cảm thấy tim đập nhanh, khó thở hoặc đổ mồ hôi khi bạn căng thẳng? Nếu có, bạn hãy nhớ rằng mình không đơn độc. Lo lắng là một cảm xúc phổ biến ở thanh thiếu niên. Nhưng nó không được quyền kiểm soát cuộc sống của bạn.\r\nTrong cuốn sách này, Nicola Morgan – chuyên gia sức khỏe tâm thần từng đoạt giải thưởng – sẽ giúp bạn hiểu lo lắng là gì và nó ảnh hưởng đến bạn như thế nào. Đặc biệt, tác giả còn cung cấp cho bạn 55 chiến lược để đối phó với lo lắng và làm chủ cuộc sống của mình.', 25, 12, '2024', 18, 10, '2024-11-07 08:50:48', '2024-11-07 08:50:48'),
(16, 'Giáo Dục Miền Nam Việt Nam Dưới Thời Chính Quyền Sài Gòn', 'Giáo Dục Miền Nam Việt Nam Dưới Thời Chính Quyền Sài Gòn.png', 'Đây là Luận án Tiến sĩ của tác giả Nguyễn Kim Dung đạt giải nhất Giải thưởng sử học Phạm Thận Duật lần thứ 22 năm 2021\r\n\r\nGiáo dục Miền nam Việt Nam dưới thời chính quyền Sài Gòn là một thực thể lịch sử tồn tại cách ngày nay hơn nửa thể kỷ, một khoảng thời gian vừa đủ để nhận thức tương đối khách quan về một đối tượng lịch sử. Một mặt nền giáo dục giai đoạn này được xem như sản phẩm của chế độ cũ, của “ngụy quyền Sài Gòn” và vì vậy cần phải phê phán, xóa bỏ. Nhưng trên một phương diện khác có thể thấy chính hệ thống giáo dục ấy đã đào tạo nhiều thế hệ học sinh, sinh viên trong đó có trí thức tinh hoa trên nhiểu lĩnh vực: khoa học kỹ thuật, công nghệ và khoa học xã hội,…nhiều trong số đó đã thành danh, góp phần xây dựng, phát triển và nâng cao vị thế đất nước trên trường quốc tế.\r\n', 26, 13, '2024', 18, 10, '2024-11-07 08:53:22', '2024-11-07 08:53:22'),
(17, 'Hành Trình Trưởng Thành 30 Quy Tắc Phát Triển Dành Cho Con Trai Tuổi Dậy Thì', 'Hành Trình Trưởng Thành 30 Quy Tắc Phát Triển Dành Cho Con Trai Tuổi Dậy Thì.png', 'Giáo dục giới tính, tâm sinh lý tuổi dậy thì rất quan trọng.\r\n\r\nCuốn sách “Hành trình trưởng thành - 30 quy tắc phát triển dành cho con trai ở tuổi dậy thì” dành cho những chàng trai đang ở độ tuổi “khó ở” nhất và những bậc phụ huynh muốn hiểu rõ con cái của mình.\r\n\r\nCuốn sách trang bị những kỹ năng cần thiết trong độ tuổi dậy thì thông qua những bài học đơn giản và dễ hiểu về tất cả các vấn đề từ phát triển cơ thể đến thay đổi tâm tính, từ gia đình, bạn bè đến học tập, cuộc sống.\r\n\r\nĐặc biệt, cuốn sách có phần giới thiệu một cách gần gũi thông qua xây dựng câu chuyện của các nhân vật một cách sinh động, nhằm gợi mở những vấn đề và phương pháp để giải quyết những vấn đề đó.\r\n\r\nCái tuổi dậy thì là cái tuổi khiến người ta đau đầu nhất, không còn nhỏ để dựa dẫm nhưng cũng chưa đủ lớn để quyết định mọi việc như một người trưởng thành. Tâm sinh lý đều thay đổi. Sự nổi loạn của những cậu con trai biểu hiện rõ ràng hơn bao giờ hết, anh ta không hiểu nổi chính mình, cha mẹ không hiểu được con cái. Nhưng thay vì tìm hiểu gốc rễ của vấn đề, tìm hiểu những kiến thức dậy thì của con trai thì họ lại hành động một cách bản năng để mọi việc đi xa hơn.', 27, 14, '2024', 18, 10, '2024-11-07 08:56:14', '2024-11-07 08:56:14'),
(18, 'Vết Cũ Ngày Mưa', 'Vết cũ ngày mưa.png', 'Tuổi trẻ giống như ban mai. Những câu chuyện của tuổi trẻ khơi dậy hoài bão, ước mơ tinh khiết. Ai từng đi qua tuổi trẻ cơ cực với các biến cố thăng trầm sẽ có nhiều kỉ niệm khó quên. Trên đường đời, những trải nghiệm ấy rồi sẽ trở thành hành trang vô giá.\r\n\r\nVết cũ ngày mưa tập hợp các mảnh kí ức sâu lắng mà tác giả nâng niu. Tháng năm tuổi trẻ càng sống động hơn khi đặt trong bối cảnh chân thực mà cũng đầy lãng mạn của Đà Nẵng. Sự phát triển vượt bậc của thành phố soi chiếu trong sự trưởng thành của một trí thức trẻ, tạo nên hành trình song đôi độc đáo và thi vị. Yêu hơn dải đất miền Trung, hiểu hơn con người đang sống và làm việc ở thành phố đầu biển cuối sông, đó là những điều bạn nhận ra khi đọc quyển sách này.\r\n\r\n“Căn phòng áp mái nhỏ bé giữ cho lòng người ấm áp và không hiu quạnh những ngày tháng xa quê. Từ trong căn phòng ấy, tôi yêu hơn bầu trời xanh rộng lớn ngoài kia, yêu đàn chim tung cánh chao lượn giữa tầng không, càng trân quí tự do và hòa bình mà tôi đang sống.”', 28, 15, '2024', 19, 10, '2024-11-07 09:01:02', '2024-11-07 09:01:02');

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
(19, 'Agatha Christie', ' '),
(21, 'C.G. Drews', ''),
(22, 'Paula Hawkins', ''),
(23, 'Lily Anderson', ''),
(24, 'Madeline Levine  ', ''),
(25, 'Nicola Morgan  ', ''),
(26, 'Nguyễn Kim Dung  ', ''),
(27, 'Chu Tước Vi Hạ  ', ''),
(28, 'Đoàn Hạo Lương  ', '');

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
(15, 'Trinh Thám'),
(16, 'Viễn Tưởng'),
(17, 'Kinh Dị'),
(18, 'Giáo dục'),
(19, 'Văn học Việt Nam');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `ma_user` int(11) NOT NULL,
  `hoten_user` varchar(255) NOT NULL,
  `so_dien_thoai` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dia_chi` varchar(255) NOT NULL,
  `ngay_tao` date NOT NULL,
  `taikhoan` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`ma_user`, `hoten_user`, `so_dien_thoai`, `email`, `dia_chi`, `ngay_tao`, `taikhoan`, `password`) VALUES
(1, 'Hoàng Nhựt', '0967331058', 'hoangnhutnguyen7@gmail.com', 'Trà Vinh', '2024-11-14', 'nhuttv123', 'a9b3b0a95a18f0f6287f581930888771'),
(2, 'latandat', '0123456789', '123456@gmail.com', 'tv', '0000-00-00', 'dat', 'e34d514f7db5c8aac72a7c8191a09617');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `dat_sach`
--
ALTER TABLE `dat_sach`
  ADD PRIMARY KEY (`ma_dat_sach`),
  ADD KEY `ma_user` (`ma_user`);

--
-- Chỉ mục cho bảng `dat_sach_chi_tiet`
--
ALTER TABLE `dat_sach_chi_tiet`
  ADD PRIMARY KEY (`ma_dat_sach_chi_tiet`),
  ADD KEY `fk_ma_sach` (`ma_sach`);

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
  ADD KEY `ma_user` (`ma_user`);

--
-- Chỉ mục cho bảng `phieu_muon`
--
ALTER TABLE `phieu_muon`
  ADD PRIMARY KEY (`ma_phieu_muon`),
  ADD KEY `ma_user` (`ma_user`);

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
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ma_user`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `dat_sach`
--
ALTER TABLE `dat_sach`
  MODIFY `ma_dat_sach` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT cho bảng `dat_sach_chi_tiet`
--
ALTER TABLE `dat_sach_chi_tiet`
  MODIFY `ma_dat_sach_chi_tiet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT cho bảng `nguoi_dung`
--
ALTER TABLE `nguoi_dung`
  MODIFY `ma_nguoi_dung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `nha_xuat_ban`
--
ALTER TABLE `nha_xuat_ban`
  MODIFY `ma_nha_xuat_ban` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `phat`
--
ALTER TABLE `phat`
  MODIFY `ma_phat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `phieu_muon`
--
ALTER TABLE `phieu_muon`
  MODIFY `ma_phieu_muon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `sach`
--
ALTER TABLE `sach`
  MODIFY `ma_sach` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `tac_gia`
--
ALTER TABLE `tac_gia`
  MODIFY `ma_tac_gia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `the_loai`
--
ALTER TABLE `the_loai`
  MODIFY `ma_the_loai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `ma_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `dat_sach`
--
ALTER TABLE `dat_sach`
  ADD CONSTRAINT `dat_sach_ibfk_1` FOREIGN KEY (`ma_user`) REFERENCES `user` (`ma_user`);

--
-- Các ràng buộc cho bảng `dat_sach_chi_tiet`
--
ALTER TABLE `dat_sach_chi_tiet`
  ADD CONSTRAINT `fk_ma_sach` FOREIGN KEY (`ma_sach`) REFERENCES `sach` (`ma_sach`);

--
-- Các ràng buộc cho bảng `phat`
--
ALTER TABLE `phat`
  ADD CONSTRAINT `phat_ibfk_1` FOREIGN KEY (`ma_user`) REFERENCES `user` (`ma_user`);

--
-- Các ràng buộc cho bảng `phieu_muon`
--
ALTER TABLE `phieu_muon`
  ADD CONSTRAINT `phieu_muon_ibfk_3` FOREIGN KEY (`ma_user`) REFERENCES `user` (`ma_user`);

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
