-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 13, 2022 lúc 04:21 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `coffee`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_02_14_131305_create_tbl_admin_table', 1),
(15, '2022_02_17_141622_create_tbl_category_product', 2),
(16, '2022_02_20_043003_create_tbl_product', 2),
(17, '2022_02_22_135451_create_tbl_product_size', 2),
(18, '2022_03_01_124824_create_tbl_customer', 3),
(27, '2022_03_02_133847_create_tbl_order', 4),
(28, '2022_03_02_134020_create_tbl_order_detail', 4),
(29, '2022_03_08_115828_create_tbl_wishlist', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `account` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `account`, `password`, `name`) VALUES
(2, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'Nghia');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category_product`
--

CREATE TABLE `tbl_category_product` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_category_product`
--

INSERT INTO `tbl_category_product` (`category_id`, `category_name`, `category_desc`, `created_at`, `updated_at`) VALUES
(1, 'Cà Phê', '<p>Sự kết hợp ho&agrave;n hảo giữa hạt c&agrave; ph&ecirc; Robusta &amp; Arabica thượng hạng được trồng tr&ecirc;n những v&ugrave;ng cao nguy&ecirc;n Việt Nam m&agrave;u mỡ, qua những b&iacute; quyết rang xay độc đ&aacute;o, Cup Coffee ch&uacute;ng t&ocirc;i tự h&agrave;o giới thiệu những d&ograve;ng sản phẩm C&agrave; ph&ecirc; mang hương vị đậm đ&agrave; v&agrave; tinh tế.</p>', NULL, NULL),
(2, 'FREEZE', '<p>Nếu bạn l&agrave; người y&ecirc;u th&iacute;ch những g&igrave; mới mẻ v&agrave; s&agrave;nh điệu để&nbsp;khơi nguồn cảm hứng. H&atilde;y thưởng thức ngay c&aacute;c&nbsp;m&oacute;n nước&nbsp;đ&aacute; xay độc đ&aacute;o mang hương vị tự&nbsp;nhi&ecirc;n tại Cup Coffee để đ&aacute;nh thức mọi gi&aacute;c quan của&nbsp;bạn, gi&uacute;p bạn&nbsp;lu&ocirc;n căng tr&agrave;n&nbsp;sức sống.</p>', NULL, NULL),
(3, 'Trà', '<p>Hương vị tự nhi&ecirc;n, thơm ngon của Tr&agrave; Việt với&nbsp;phong c&aacute;ch hiện đại tại&nbsp;Cup Coffee sẽ gi&uacute;p bạn gợi mở vị gi&aacute;c của bản th&acirc;n v&agrave; tận hưởng một cảm gi&aacute;c thật khoan kho&aacute;i, tươi mới.</p>', NULL, NULL),
(4, 'Bánh', '<p>Đến với Cup Coffee c&aacute;c bạn c&oacute; thể thưởng thức c&aacute;c loại b&aacute;nh m&igrave; đặc trưng của Việt Nam.</p>', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_customer`
--

INSERT INTO `tbl_customer` (`customer_id`, `phone`, `name`, `password`, `created_at`, `updated_at`) VALUES
(1, '0966929394', 'phuoc', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL),
(2, '0989550129', 'Khoa', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL),
(3, '1111111111', 'Hoang', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL),
(4, '2222222222', 'Quang', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL),
(5, '0987987987', 'Hưng', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `order_note` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `order_note`, `order_address`, `total_price`, `customer_id`, `created_at`, `updated_at`, `date`) VALUES
(2, 'Không', 'zzzzzzzzzz', '184,000.00', 4, NULL, NULL, '2022-02-11 21:37:49'),
(3, 'Không', 'qwertyuio;', '390,000.00', 4, NULL, NULL, '2022-03-01 21:38:12'),
(4, 'Không', 'go vap', '58,000.00', 1, NULL, NULL, '2022-02-28 21:48:36'),
(5, 'Không', '34A', '133,000.00', 3, NULL, NULL, '2022-03-05 22:17:26'),
(6, 'Không', '45 Lữ Gia', '242,000.00', 3, NULL, NULL, '2022-02-27 22:17:50'),
(7, 'Không', '41 Lý Chính Thắng', '57,000.00', 3, NULL, NULL, '2022-03-01 21:20:29'),
(8, 'Không', '48 Lê Lai', '57,000.00', 3, NULL, NULL, '2022-03-10 22:18:04'),
(9, 'Không', '38 Bàu Cát', '165,000.00', 3, NULL, NULL, '2022-03-07 22:18:22'),
(10, 'Không', '12 Lê Lợi', '147,000.00', 3, NULL, NULL, '2022-02-25 22:18:33'),
(11, 'Không', '78 NKKN', '49,000.00', 3, NULL, NULL, '2022-03-11 21:20:53'),
(12, 'Không', '95 Lữ Gia', '19,000.00', 3, NULL, NULL, '2022-03-13 17:05:21');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order_detail`
--

CREATE TABLE `tbl_order_detail` (
  `order_detail_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_size_id` int(10) UNSIGNED NOT NULL,
  `quantity` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_order_detail`
--

INSERT INTO `tbl_order_detail` (`order_detail_id`, `order_id`, `product_size_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 44, 1, NULL, NULL),
(2, 2, 37, 3, NULL, NULL),
(3, 2, 24, 1, NULL, NULL),
(4, 3, 14, 10, NULL, NULL),
(5, 4, 61, 1, NULL, NULL),
(6, 4, 70, 1, NULL, NULL),
(7, 5, 70, 7, NULL, NULL),
(8, 6, 69, 5, NULL, NULL),
(9, 6, 62, 3, NULL, NULL),
(10, 7, 69, 3, NULL, NULL),
(11, 8, 69, 3, NULL, NULL),
(12, 9, 60, 3, NULL, NULL),
(13, 10, 65, 3, NULL, NULL),
(14, 11, 62, 1, NULL, NULL),
(15, 12, 70, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `category_id`, `product_desc`, `product_name`, `product_image`, `created_at`, `updated_at`) VALUES
(1, 1, 'Americano tại Cup Coffee là sự kết hợp giữa cà phê espresso thêm vào nước đun sôi. Bạn có thể tùy thích lựa chọn uống nóng hoặc dùng chung với đá.', 'Americano', 'americano.png', NULL, NULL),
(2, 1, 'Thỏa mãn cơn thèm ngọt! Ly cà phê Caramel Macchiato bắt đầu từ dòng sữa tươi và lớp bọt sữa béo ngậy, sau đó hòa quyện cùng cà phê espresso đậm đà và sốt caramel ngọt ngào. Thông qua bàn tay điêu luyện của các chuyên gia pha chế, mọi thứ hoàn toàn được nâng tầm thành nghệ thuật! Bạn có thể tùy thích lựa chọn uống nóng hoặc dùng chung với đá.', 'Caramel Macchiato', 'caramelmacchiato.png', NULL, NULL),
(3, 1, 'Một thức uống yêu thích được kết hợp bởi giữa sốt sô cô la ngọt ngào, sữa tươi và đặc biệt là cà phê espresso đậm đà mang thương hiệu Highlands Coffee. Bạn có thể tùy thích lựa chọn uống nóng hoặc dùng chung với đá.', 'Mocha Macchiato', 'mochamacchiato.png', NULL, NULL),
(4, 1, 'Ly cà phê sữa ngọt ngào đến khó quên! Với một chút nhẹ nhàng hơn so với Cappuccino, Latte của chúng tôi bắt đầu với cà phê espresso, sau đó thêm sữa tươi và bọt sữa một cách đầy nghệ thuật. Bạn có thể tùy thích lựa chọn uống nóng hoặc dùng chung với đá.', 'Latte', 'latte.png', NULL, NULL),
(5, 1, 'Đích thực là ly cà phê espresso ngon đậm đà! Được chiết xuất một cách hoàn hảo từ loại cà phê rang được phối trộn độc đáo từ những hạt cà phê Robusta và Arabica chất lượng hảo hạng.', 'Espresso', 'espresso.png', NULL, NULL),
(6, 1, 'Ly cà phê sữa đậm đà thời thượng! Một chút đậm đà hơn so với Latte, Cappuccino của chúng tôi bắt đầu với cà phê espresso, sau đó thêm một lượng tương đương giữa sữa tươi và bọt sữa cho thật hấp dẫn. Bạn có thể tùy thích lựa chọn uống nóng hoặc dùng chung với đá.', 'Cappuccino', 'cappuccino.png', NULL, NULL),
(7, 1, 'Nếu Phin Sữa Đá dành cho các bạn đam mê vị đậm đà, thì Bạc Xỉu Đá là một sự lựa chọn nhẹ “đô\" cà phê nhưng vẫn thơm ngon, chất lừ không kém!', 'Bạc Xỉu Đá', 'bacxiuda.png', NULL, NULL),
(8, 1, 'Hương vị cà phê Việt Nam đích thực! Từng hạt cà phê hảo hạng được chọn bằng tay, phối trộn độc đáo giữa hạt Robusta từ cao nguyên Việt Nam, thêm Arabica thơm lừng. Cà phê được pha từ Phin truyền thống, hoà cùng sữa đặc sánh và thêm vào chút đá tạo nên ly Phin Sữa Đá – Đậm Đà Chất Phin.', 'Phin Sữa Đá', 'phinsuada.png', NULL, NULL),
(9, 1, 'Dành cho những tín đồ cà phê đích thực! Hương vị cà phê truyền thống được phối trộn độc đáo tại Highlands. Cà phê đậm đà pha hoàn toàn từ Phin, cho thêm 1 thìa đường, một ít đá viên mát lạnh, tạo nên Phin Đen Đá mang vị cà phê đậm đà chất Phin.', 'Phin Đen Đá', 'phindenda.png', NULL, NULL),
(10, 1, 'Dành cho những tín đồ cà phê đích thực! Hương vị cà phê truyền thống được phối trộn độc đáo tại Cup Coffee. Cà phê đậm đà pha từ Phin, cho thêm 1 thìa đường, mang đến vị cà phê đậm đà chất Phin.', 'Phin Đen Nóng', 'phindennong.png', NULL, NULL),
(11, 1, 'Hương vị cà phê Việt Nam đích thực! Từng hạt cà phê hảo hạng được chọn bằng tay, phối trộn độc đáo giữa hạt Robusta từ cao nguyên Việt Nam, thêm Arabica thơm lừng. Kết hợp với nước sôi từng giọt cà phê được chiết xuất từ Phin truyền thống, hoà cùng sữa đặc sánh tạo nên ly Phin Sữa Nóng – Đậm đà chất Phin.', 'Phin Sữa nóng', 'phinsuanong.png', NULL, NULL),
(12, 1, 'PhinDi Kem Sữa - Cà phê Phin thế hệ mới với chất Phin êm hơn, lần đầu tiên kết hợp cùng Hồng Trà mang đến hương vị quyện êm, phiên bản giới hạn chỉ trong mùa lễ hội !', 'PhinDi Hồng Trà', 'phindihongtra.png', NULL, NULL),
(13, 1, 'PhinDi Choco - Cà phê Phin thế hệ mới với chất Phin êm hơn, kết hợp cùng Choco ngọt tan mang đến hương vị mới lạ, không thể hấp dẫn hơn!', 'PhinDi Choco', 'phindichoco.png', NULL, NULL),
(14, 1, 'PhinDi Hạnh Nhân - Cà phê Phin thế hệ mới với chất Phin êm hơn, kết hợp cùng Hạnh nhân thơm bùi mang đến hương vị mới lạ, không thể hấp dẫn hơn!', 'PhinDi Hạnh Nhân', 'phindihanhnhan.png', NULL, NULL),
(15, 1, 'PhinDi Kem Sữa - Cà phê Phin thế hệ mới với chất Phin êm hơn, kết hợp cùng Kem Sữa béo ngậy mang đến hương vị mới lạ, không thể hấp dẫn hơn!', 'PhinDi Kem Sữa', 'phindikemsua.png', NULL, NULL),
(16, 2, 'Thơm ngon khó cưỡng! Được kết hợp từ cà phê truyền thống chỉ có tại Cup Coffee, cùng với caramel, thạch cà phê và đá xay mát lạnh. Trên cùng là lớp kem tươi thơm béo và caramel ngọt ngào. Món nước phù hợp trong những cuộc gặp gỡ bạn bè, bởi sự ngọt ngào thường mang mọi người xích lại gần nhau.', 'Caramel Phin Freeze', 'caramelphinfreeze.png', NULL, NULL),
(17, 2, 'Thơm ngon đậm đà! Được kết hợp từ cà phê pha Phin truyền thống chỉ có tại Cup Coffee, cùng với thạch cà phê và đá xay mát lạnh. Trên cùng là lớp kem tươi thơm béo và bột ca cao đậm đà. Món nước hoàn hảo để khởi đầu câu chuyện cùng bạn bè.', 'Classic Phin Freeze', 'classicphinfreeze.png', NULL, NULL),
(18, 2, 'Thức uống rất được ưa chuộng! Trà xanh thượng hạng từ cao nguyên Việt Nam, kết hợp cùng đá xay, thạch trà dai dai, thơm ngon và một lớp kem dày phủ lên trên vô cùng hấp dẫn. Freeze Trà Xanh thơm ngon, mát lạnh, chinh phục bất cứ ai!', 'Freeze Trà Xanh', 'freezetraxanh.png', NULL, NULL),
(19, 2, 'Thức uống rất được ưa chuộng! Trà xanh thượng hạng từ cao nguyên Việt Nam, kết hợp cùng đá xay, thạch trà dai dai, thơm ngon và một lớp kem dày phủ lên trên vô cùng hấp dẫn. Freeze Trà Xanh thơm ngon, mát lạnh, chinh phục bất cứ ai!', 'Cookies & Cream', 'cookiescream.png', NULL, NULL),
(20, 2, 'Thiên đường đá xay sô cô la! Từ những thanh sô cô la Việt Nam chất lượng được đem xay với đá cho đến khi mềm mịn, sau đó thêm vào thạch sô cô la dai giòn, ở trên được phủ một lớp kem whip beo béo và sốt sô cô la ngọt ngào. Tạo thành Freeze Sô-cô-la ngon mê mẩn chinh phục bất kì ai!', 'Freeze Sô-cô-la', 'freezechocolate.png', NULL, NULL),
(21, 3, 'Một sự kết hợp thú vị giữa trà đen, những quả vải thơm ngon và thạch giòn khó cưỡng, mang đến thức uống tuyệt hảo!', 'Trà Thạch Vải', 'trathachvai.png', NULL, NULL),
(22, 3, 'Một sự kết hợp thú vị giữa trà đen, những quả vải thơm ngon và thạch giòn khó cưỡng, mang đến thức uống tuyệt hảo!', 'Trà Thạch Đào', 'trathachdao.png', NULL, NULL),
(23, 3, 'Một trải nghiệm thú vị khác! Sự hài hòa giữa vị trà cao cấp, vị sả thanh mát và những miếng đào thơm ngon mọng nước sẽ mang đến cho bạn một thức uống tuyệt vời.', 'Trà Thanh Đào', 'trathanhdao.png', NULL, NULL),
(24, 3, 'Thức uống chinh phục những thực khách khó tính! Sự kết hợp độc đáo giữa trà Ô long, hạt sen thơm bùi và củ năng giòn tan. Thêm vào chút sữa sẽ để vị thêm ngọt ngào.', 'Trà Sen Vàng', 'trasenvang.png', NULL, NULL),
(25, 4, 'Bánh mì Việt Nam giòn thơm với nhân gà xé, rau, gia vị hòa quyện cùng nước sốt đặc biệt.', 'Bánh Mì Gà Xé', 'bmgaxe.png', NULL, NULL),
(26, 4, 'Bánh mì Việt Nam giòn thơm, với nhân thịt viên hấp dẫn, phủ thêm một lớp nước sốt cà chua ngọt, cùng với rau tươi và gia vị đậm đà.', 'Bánh Mì Xíu Mại', 'bmxiumai.png', NULL, NULL),
(27, 4, 'Bánh mì Việt Nam giòn thơm với chả lụa và thịt xá xíu thơm ngon, kết hợp cùng rau và gia vị, hòa quyện cùng nước sốt độc đáo', 'Bánh Mì Chả Lụa Xá Xíu', 'bmchaluaxaxiu.png', NULL, NULL),
(28, 4, 'Đặc sản của Việt Nam! Bánh mì giòn với nhân thịt nướng, rau thơm và gia vị đậm đà, hòa quyện trong lớp nước sốt tuyệt hảo.', 'Bánh Mì Thịt Nướng', 'bmthitnuong.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product_size`
--

CREATE TABLE `tbl_product_size` (
  `product_size_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` bigint(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_product_size`
--

INSERT INTO `tbl_product_size` (`product_size_id`, `product_id`, `product_size`, `product_price`, `created_at`, `updated_at`) VALUES
(1, 1, 'M', 44000, NULL, NULL),
(2, 1, 'L', 54000, NULL, NULL),
(3, 2, 'M', 44000, NULL, NULL),
(4, 2, 'L', 54000, NULL, NULL),
(5, 3, 'M', 59000, NULL, NULL),
(6, 3, 'L', 69000, NULL, NULL),
(7, 4, 'M', 54000, NULL, NULL),
(8, 4, 'L', 64000, NULL, NULL),
(9, 5, 'M', 44000, NULL, NULL),
(10, 5, 'L', 54000, NULL, NULL),
(11, 6, 'M', 54000, NULL, NULL),
(12, 6, 'L', 64000, NULL, NULL),
(13, 7, 'S', 29000, NULL, NULL),
(14, 7, 'M', 39000, NULL, NULL),
(15, 7, 'L', 49000, NULL, NULL),
(16, 8, 'S', 29000, NULL, NULL),
(17, 8, 'M', 39000, NULL, NULL),
(18, 8, 'L', 49000, NULL, NULL),
(19, 9, 'S', 29000, NULL, NULL),
(20, 9, 'M', 39000, NULL, NULL),
(21, 9, 'L', 49000, NULL, NULL),
(22, 10, 'S', 29000, NULL, NULL),
(23, 10, 'M', 39000, NULL, NULL),
(24, 10, 'L', 49000, NULL, NULL),
(25, 11, 'S', 29000, NULL, NULL),
(26, 11, 'M', 39000, NULL, NULL),
(27, 11, 'L', 49000, NULL, NULL),
(28, 12, 'S', 45000, NULL, NULL),
(29, 12, 'M', 55000, NULL, NULL),
(30, 12, 'L', 65000, NULL, NULL),
(31, 13, 'S', 45000, NULL, NULL),
(32, 13, 'M', 55000, NULL, NULL),
(33, 13, 'L', 65000, NULL, NULL),
(34, 14, 'S', 45000, NULL, NULL),
(35, 14, 'M', 55000, NULL, NULL),
(36, 14, 'L', 65000, NULL, NULL),
(37, 15, 'S', 45000, NULL, NULL),
(38, 15, 'M', 55000, NULL, NULL),
(39, 15, 'L', 65000, NULL, NULL),
(40, 16, 'S', 49000, NULL, NULL),
(41, 16, 'M', 59000, NULL, NULL),
(42, 16, 'L', 65000, NULL, NULL),
(43, 17, 'S', 49000, NULL, NULL),
(44, 17, 'M', 59000, NULL, NULL),
(45, 17, 'L', 65000, NULL, NULL),
(46, 18, 'S', 49000, NULL, NULL),
(47, 18, 'M', 59000, NULL, NULL),
(48, 18, 'L', 65000, NULL, NULL),
(49, 19, 'S', 49000, NULL, NULL),
(50, 19, 'M', 59000, NULL, NULL),
(51, 19, 'L', 65000, NULL, NULL),
(52, 20, 'S', 49000, NULL, NULL),
(53, 20, 'M', 59000, NULL, NULL),
(54, 20, 'L', 65000, NULL, NULL),
(55, 21, 'S', 39000, NULL, NULL),
(56, 21, 'M', 49000, NULL, NULL),
(57, 21, 'L', 55000, NULL, NULL),
(58, 22, 'S', 39000, NULL, NULL),
(59, 22, 'M', 49000, NULL, NULL),
(60, 22, 'L', 55000, NULL, NULL),
(61, 23, 'S', 39000, NULL, NULL),
(62, 23, 'M', 49000, NULL, NULL),
(63, 23, 'L', 55000, NULL, NULL),
(64, 24, 'S', 39000, NULL, NULL),
(65, 24, 'M', 49000, NULL, NULL),
(66, 24, 'L', 55000, NULL, NULL),
(67, 25, 'S', 19000, NULL, NULL),
(68, 26, 'S', 19000, NULL, NULL),
(69, 27, 'S', 19000, NULL, NULL),
(70, 28, 'S', 19000, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_wishlist`
--

CREATE TABLE `tbl_wishlist` (
  `wishlist_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_wishlist`
--

INSERT INTO `tbl_wishlist` (`wishlist_id`, `product_id`, `customer_id`, `created_at`, `updated_at`) VALUES
(9, 28, 4, NULL, NULL),
(10, 27, 4, NULL, NULL),
(11, 15, 4, NULL, NULL),
(14, 15, 2, NULL, NULL),
(15, 24, 1, NULL, NULL),
(21, 28, 3, NULL, NULL),
(22, 19, 3, NULL, NULL),
(23, 17, 3, NULL, NULL),
(24, 6, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_category_product`
--
ALTER TABLE `tbl_category_product`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Chỉ mục cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Chỉ mục cho bảng `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  ADD PRIMARY KEY (`order_detail_id`);

--
-- Chỉ mục cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Chỉ mục cho bảng `tbl_product_size`
--
ALTER TABLE `tbl_product_size`
  ADD PRIMARY KEY (`product_size_id`);

--
-- Chỉ mục cho bảng `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  ADD PRIMARY KEY (`wishlist_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tbl_category_product`
--
ALTER TABLE `tbl_category_product`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `customer_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  MODIFY `order_detail_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `tbl_product_size`
--
ALTER TABLE `tbl_product_size`
  MODIFY `product_size_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT cho bảng `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  MODIFY `wishlist_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
