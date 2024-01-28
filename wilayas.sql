-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 22 nov. 2023 à 15:45
-- Version du serveur :  10.4.19-MariaDB
-- Version de PHP : 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `pointeuse`
--

-- --------------------------------------------------------

--
-- Structure de la table `wilayas`
--

CREATE TABLE `wilayas` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ber` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phoneCodes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edited_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `deleted_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `validated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `validated_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `wilayas`
--

INSERT INTO `wilayas` (`id`, `code`, `location_id`, `name`, `name_ar`, `name_en`, `name_ber`, `phoneCodes`, `zip_code`, `longitude`, `latitude`, `created_by`, `edited_by`, `status`, `deleted_by`, `deleted_at`, `validated_by`, `validated_at`, `created_at`, `updated_at`) VALUES
(1, '01', '148', 'Adrar', 'أدرار', 'Adrar', 'ⵜⴰⵎⵏⴰⴹⵜ ⵏ ⴰⴷⵔⴰⵔ', '49', '01000', '-0.2938800', '27.8742900', NULL, '95', 1, NULL, NULL, NULL, NULL, NULL, '2022-02-08 07:41:47'),
(2, '02', '147', 'Chlef', 'الشلف', 'Chlef', 'ⴰⴳⴻⵣⴷⵓ ⵏ ⵛⵍⴻⴼ', '27', '02000', '1.333333', '36.166667', NULL, '95', 1, NULL, NULL, NULL, NULL, NULL, '2022-02-08 07:35:44'),
(3, '03', '146', 'Laghouat', 'الأغواط', 'Laghouat', 'ⵍⴰⵖⵡⴰⵟ', '029', '03000', '2.8694065', '33.7972551', NULL, '95', 1, NULL, NULL, NULL, NULL, NULL, '2022-02-08 11:16:05'),
(4, '04', '145', 'Oum El Bouaghi', 'أم البواقي', 'Oum El Bouaghi', 'ⵜⴰⵎⵏⴰⴹⵜ ⵏ ⵓⵎ ⴻⵍ ⴱⵓⴰⵖⵉ', '032', '04000', '7.179026', '35.7881449', NULL, '95', 1, NULL, NULL, NULL, NULL, NULL, '2022-02-08 11:19:40'),
(5, '05', '144', 'Batna', 'بـاتـنـة', 'Batna', 'ⵁⴱⴰⵝⵏⵜ', '033', '05000', '6.166667', '35.55', NULL, '95', 1, NULL, NULL, NULL, NULL, NULL, '2022-02-08 11:22:54'),
(6, '06', '143', 'Béjaïa', 'بجاية', 'Béjaïa', 'ⵠⴳⴰⵢⴻⵜ,', '034', '06000', '5.0567333', '36.7508896', NULL, '95', 1, NULL, NULL, NULL, NULL, NULL, '2022-02-08 07:46:04'),
(7, '07', '142', 'Biskra', 'بسكرة', 'Biskra', 'ⴱⵉⵙⴽⵔⴰ', '033', '07000', '5.733333', '34.85', NULL, '95', 1, NULL, NULL, NULL, NULL, NULL, '2022-02-08 07:47:20'),
(8, '08', '141', 'Béchar', 'بشار', 'Bechar', 'ⴱⴻⵛⵛⴰⵔ', '049', '08000', '-2.2143231', '31.6182492', NULL, '95', 1, NULL, NULL, NULL, NULL, NULL, '2022-02-08 07:48:15'),
(9, '09', '140', 'Blida', 'البليدة', 'Blida', 'ⵍⴻⴱⵍⵉⴷⴰ', '025', '09000', '2.8005677', '36.4798683', NULL, '95', 1, NULL, NULL, NULL, NULL, NULL, '2022-02-08 07:49:08'),
(10, '10', '139', 'Bouira', 'البويرة', 'Bouira', 'ⵜⴰⵏⴻⴱⴹⵉⵜ ⵏ ⵜⵓⴱⵉⵔⴻⵜ', '026', '10000', '3.9878427', '36.2835299', NULL, '95', 1, NULL, NULL, NULL, NULL, NULL, '2022-02-08 07:50:07'),
(11, '11', '138', 'Tamanrasset', 'تمنراست', 'Tamanrasset', 'ⵜⵣ\'ⵓⵏⵜ ⵏ ⴰⴾⴰⵍ ⵜⴰⵏ ⵜⴰⵎⴰⵏⵗⴰⵙⵜ', '029', '11000', '5.522778', '22.785', NULL, '95', 1, NULL, NULL, NULL, NULL, NULL, '2022-02-08 11:28:27'),
(12, '12', '137', 'Tébessa', 'تبسة', 'Tebessa', 'ⵜⴰⵎⴰⵥⵍⴰⵢⵜ ⵏ ⵜⵉⴱⵙⵜ', '037', '12000', '8.116667', '35.4', NULL, '95', 1, NULL, NULL, NULL, NULL, NULL, '2022-02-08 11:31:25'),
(13, '13', '136', 'Tlemcen', 'تلمسان', 'Tlemcen', 'ⵜⴰⵡⵉⵍⴰⵢⵜ ⵏ ⵜⵍⵎⵙⴰⵏ', '43', '13000', '-1.31667', '34.882776', NULL, '95', 1, NULL, NULL, NULL, NULL, NULL, '2022-02-08 11:33:51'),
(14, '14', '135', 'Tiaret', 'تيارت', 'Tiaret', 'ⴰⴳⴻⵣⴷⵓ ⵏ ⵜⵉⵀⴻⵔⵜ', '046', '14000', '1.3220322', '35.3673553', NULL, '95', 1, NULL, NULL, NULL, NULL, NULL, '2022-02-08 11:35:59'),
(15, '15', '134', 'Tizi Ouzou', 'تيزي وزو', 'Tizi Ouzou', 'ⵜⴰⵏⴻⴱⴹⵉⵜ ⵏ ⵜⵉⵣⵉ ⵡⴻⵣⵓ', '026', '15000', '4.05', '36.716667', NULL, '95', 1, NULL, NULL, NULL, NULL, NULL, '2022-02-08 11:38:17'),
(16, '16', '133', 'Alger', 'الجزائر', 'Algiers', 'ⵜⴰⵎⵏⴰⴹⵜ ⵏ ⵍⴻⴷⵣⴰⵢⴻⵔ', '023', '16000', '3.042048', '36.752887', NULL, '95', 1, NULL, NULL, NULL, NULL, NULL, '2022-02-08 11:50:54'),
(17, '17', '132', 'Djelfa', 'الجلفة', 'Djelfa', 'ⴹⵊⴻⵍⴼⴰ', '027', '17000', '3.25', '34.666667', NULL, '95', 1, NULL, NULL, NULL, NULL, NULL, '2022-02-09 04:24:55'),
(18, '18', '131', 'Jijel', 'جيجل', 'Jijel', 'ⵜⴰⵎⵏⴰⴷⵜ ⵏ ⵉⵖⵉⵍ', '034', '18000', '5.7490933', '36.8167387', NULL, '95', 1, NULL, NULL, NULL, NULL, NULL, '2022-02-09 04:31:02'),
(19, '19', '130', 'Sétif', 'سطيف', 'Sétif', 'ⵜⴰⵡⵉⵍⴰⵢⵜ I ⵣⵟⵉⴼ', '036', '19000', '5.4150871', '36.1969027', NULL, '95', 1, NULL, NULL, NULL, NULL, NULL, '2022-02-09 05:05:34'),
(20, '20', '129', 'Saïda', 'سعيدة', 'Saïda', 'ⵜⴰⵎⵏⴰⴹⵜ l ⵙⴰⵢⴷⴰ', '048', '20000', '0.1484305', '34.8412014', NULL, '95', 1, NULL, NULL, NULL, NULL, NULL, '2022-02-09 10:02:01'),
(21, '21', '128', 'Skikda', 'سكيكدة', 'Skikda', 'ⵜⴰⵎⴻⵏⴰⴹⵜ ⵏ ⵙⴽⵉⴽⴷⴰ', '038', '21000', '6.915103', '36.866609', NULL, '95', 1, NULL, NULL, NULL, NULL, NULL, '2022-02-09 10:07:38'),
(22, '22', '127', 'Sidi Bel Abbès', 'سيدي بلعباس', 'Sidi Bel Abbes', 'ⵜⴰⵎⵏⴰⴹⵜ l ⵙⵉⴷⵉ ⴱⵍ ⴰⴱⴱⴰⵙ', '048', '22000', '-0.641389', '35.1939', NULL, '95', 1, NULL, NULL, NULL, NULL, NULL, '2022-02-09 10:10:01'),
(23, '23', '126', 'Annaba', 'عنابة', 'Annaba', 'ⴱⵓⵏⴰ', '038', '23000', '7.766667', '36.9', NULL, '95', 1, NULL, NULL, NULL, NULL, NULL, '2022-02-09 10:13:05'),
(24, '24', '125', 'Guelma', 'قالمة', 'Guelma', 'ⴳⴰⵍⵎⴰ', '037', '24000', '7.433333', '36.45', NULL, '95', 1, NULL, NULL, NULL, NULL, NULL, '2022-02-09 10:15:45'),
(25, '25', '124', 'Constantine', 'قسنطينة', 'Constantine', 'ⵇⵙⵏⵟⵉⵏⴰ', '025', '25000', '6.642433', '36.360155', NULL, '95', 1, NULL, NULL, NULL, NULL, NULL, '2022-02-09 10:17:13'),
(26, '26', '123', 'Médéa', 'المدية', 'Médéa', 'ⴰⴳⴻⵣⴷⵓ ⵏ ⵎⴷⴻⵢⴰ', '025', '26000', '2.7501', '36.2675', NULL, '95', 1, NULL, NULL, NULL, NULL, NULL, '2022-02-09 10:21:26'),
(27, '27', '122', 'Mostaganem', 'مستغانم', 'Mostaganem', 'ⵜⴰⵎⵏⴰⴹⵜ ⵏ ⵎⴻⵙⵜⵖⴰⵍⵉⵎ', '045', '27000', '0.083333', '35.933333', NULL, '95', 1, NULL, NULL, NULL, NULL, NULL, '2022-02-09 10:29:44'),
(28, '28', '121', 'M\'Sila', 'المسيلة', 'M\'Sila', 'Tamsilt', '035', '28000', '4.5418141', '35.677109', NULL, '95', 1, NULL, NULL, NULL, NULL, NULL, '2022-02-08 09:15:39'),
(29, '29', '120', 'Mascara', 'معسكر', 'Mascara', 'ⵜⴰⵡⵉⵍⴰⵢⵜ ⵏ ⵎⵄⵙⴽⵔ', '045', '29000', '0.1494988', '35.3904125', NULL, '95', 1, NULL, NULL, NULL, NULL, NULL, '2022-02-10 04:27:31'),
(30, '30', '119', 'Ouargla', 'ورڨلة', 'Ouargla', 'ⵜⴰⵡⵉⵍⵢⵜ ⵏ ⵡⵔⴳⵔⵏ', '029', '30000', '5.316667', '31.95', NULL, '95', 1, NULL, NULL, NULL, NULL, NULL, '2022-02-07 05:09:01'),
(31, '31', '118', 'Oran', 'وهران', 'Oran', 'ⵜⴰⵎⵏⴰⴹⵜ ⵏ ⵡⴰⵀⵔⴻⵏ', '041', '31000', '-0.6337376', '35.6976541', NULL, '95', 1, NULL, NULL, NULL, NULL, NULL, '2022-02-10 04:31:48'),
(32, '32', '117', 'El Bayadh', 'الـبـيـض', 'El Bayadh', 'ⴰⴳⴻⵣⴷⵓ ⵏ ⵍⴱⴻⵢⵢⴻⴹ', '049', '32000', '1.020278', '33.680278', NULL, '95', 1, NULL, NULL, NULL, NULL, NULL, '2022-02-10 04:35:22'),
(33, '33', '116', 'Illizi', 'إلـيـزي', 'Illizi', 'ⵉⵍⵍⵉⵣⵉ', '029', '33000', '8.482222', '26.505', NULL, '95', 1, NULL, NULL, NULL, NULL, NULL, '2022-02-10 04:38:05'),
(34, '34', '115', 'Bordj Bou Arreridj', 'برج بوعريريج', 'Bordj Bou Arreridj', 'ⴱⵓⵕⴵ ⴱⵓ ⴰⵕⴻⵕⵉⴵ', '035', '34000', '4.7564046', '36.0704188', NULL, '95', 1, NULL, NULL, NULL, NULL, NULL, '2022-02-07 04:48:58'),
(35, '35', '114', 'Boumerdès', 'بومرداس', 'Boumerdès', 'ⵜⴰⵏⴻⴱⴹⵉⵜ ⵏ ⴱⵓⵎⴻⵔⴷⴰⵙ', '024', '35000', '3.7029002', '36.7675962', NULL, '95', 1, NULL, NULL, NULL, NULL, NULL, '2022-02-10 04:50:38'),
(36, '36', '113', 'El Tarf', 'الطارف', 'El Tarf', 'ⴻⵍ ⵜⴰⵔⴼ', '038', '36000', '8.317', '36.767', NULL, '95', 1, NULL, NULL, NULL, NULL, NULL, '2022-02-10 04:52:01'),
(37, '37', '112', 'Tindouf', 'تندوف', 'Tindouf', 'ⵜⴰⵡⵉⵍⴰⵢⵜ ⵏ ⵜⵉⵏⴷⵓⴼ', '049', '37000', '-8.1276526', '27.6761012', NULL, '95', 1, NULL, NULL, NULL, NULL, NULL, '2022-02-10 04:53:17'),
(38, '38', '111', 'Tissemsilt', 'تيسمسيلت', 'Tissemsilt', 'ⴰⴳⴻⵣⴷⵓ ⵏ ⵜⵉⵙⵎⵙⵉⵍⵜ', '046', '38000', '1.811111', '35.607778', NULL, '95', 1, NULL, NULL, NULL, NULL, NULL, '2022-02-10 04:55:49'),
(39, '39', '110', 'El Oued', 'الوادي', 'El Oued', 'ⵙⵓⴼ', '032', '39000', '6.8479682', '33.3713397', NULL, '95', 1, NULL, NULL, NULL, NULL, NULL, '2022-02-10 04:58:33'),
(40, '40', '109', 'Khenchela', 'خنشلة', 'Khenchela', 'ⵅⴻⵏⵛⵍⴰ', '032', '40000', '7.14333', '35.43583', NULL, '95', 1, NULL, NULL, NULL, NULL, NULL, '2022-02-10 05:05:24'),
(41, '41', '108', 'Souk Ahras', 'سوق أهراس', 'Souk Ahras', 'ⵜⴰⵡⵉⵍⴰⵢⵜ ⵏ ⵙⵓⵇ ⴰⵀⵔⴰⵙ', '037', '41000', '7.951111', '36.286389', NULL, '95', 1, NULL, NULL, NULL, NULL, NULL, '2022-02-10 05:26:33'),
(42, '42', '107', 'Tipaza', 'تيبازة', 'Tipaza', 'ⵜⴰⵏⴻⴱⵟⵉⵜ ⵏ ⵜⵉⴼⵣⴰ', '024', '42000', '2.3912362', '36.6178786', NULL, '95', 1, NULL, NULL, NULL, NULL, NULL, '2022-02-10 05:31:19'),
(43, '43', '106', 'Mila', 'ميلة', 'Mila', 'ⵎⵉⵍⴰ', '031', '43000', '6.26667', '36.45', NULL, '95', 1, NULL, NULL, NULL, NULL, NULL, '2022-02-10 05:43:17'),
(44, '44', '105', 'Aïn Defla', 'عين الدفلى', 'Aïn Defla', 'ⵜⴰⵡⵉⵍⴰⵢⵜ ⵏ ⵄⵉⵏ-ⴷⴼⵍⴰ', '027', '44000', '2.234312', '36.261021', NULL, '95', 1, NULL, NULL, NULL, NULL, NULL, '2022-02-08 10:03:01'),
(45, '45', '104', 'Naâma', 'النعامة', 'Naâma', NULL, '049', '45000', '-0.9056623', '33.4350615', NULL, '95', 1, NULL, NULL, NULL, NULL, NULL, '2022-02-10 05:57:13'),
(46, '46', '103', 'Aïn Témouchent', 'عين تموشنت', 'Aïn Témouchent', 'ⵜⴰⵍⴰ ⵏ ⵜⵓⵛⴻⵏⵜ', '043', '46000', '-1.1424514', '35.3072501', NULL, '95', 1, NULL, NULL, NULL, NULL, NULL, '2022-02-08 10:05:34'),
(47, '47', '102', 'Ghardaïa', 'غرداية', 'Ghardaïa', 'ⵜⴰⵡⵉⵍⴰⵢⵜ ⵏ ⵜⵖⵔⴷⴰⵢⵜ', '029', '47000', '3.6738412', '32.4902246', NULL, '95', 1, NULL, NULL, NULL, NULL, NULL, '2022-02-08 10:08:18'),
(48, '48', '101', 'Relizane', 'غليزان', 'Relizane', 'ⵉⵖⵉⵍ ⵉⵍⵣⴰⵏ', '046', '48000', '0.55599', '35.73734', NULL, '95', 1, NULL, NULL, NULL, NULL, NULL, '2022-02-10 06:05:11'),
(49, '49', NULL, 'Timimoun', 'تيميمون', 'Timimoun', 'ⵜⵉⵎⵉⵎⵓⵏ', '049', '49000', '0.2309800', '29.2638800', NULL, '95', 1, NULL, NULL, NULL, NULL, NULL, '2022-02-10 06:08:57'),
(50, '50', NULL, 'Bordj Badji Mokhtar', 'برج باجي مختار', 'Bordj Badji Mokhtar', 'ⴱⵓⵔⴵ ⴱⴰⴵⵉ ⵎⵓⵅⵜⴰⵔ', '049', '50000', '0.949448', '21.330915', NULL, '95', 1, NULL, NULL, NULL, NULL, NULL, '2022-02-10 06:22:16'),
(51, '51', NULL, 'Ouled Djellal', 'أولاد جلال', 'Ouled Djellal', 'ⵡⵍⴰⴷ ⵊⴻⵍⴰⵍ', '033', '51000', '5.0642', '34.4289', NULL, '95', 1, NULL, NULL, NULL, NULL, NULL, '2022-02-10 06:26:06'),
(52, '52', NULL, 'Béni Abbès', 'بني عباس', 'Béni Abbès', 'ⴰⵝ ⵄⴱⴱⴰⵙ', '049', '52000', '2.1', '30.08', NULL, '95', 1, NULL, NULL, NULL, NULL, NULL, '2022-02-10 06:29:37'),
(53, '53', NULL, 'In Salah', 'عين صالح', 'In Salah', '/', '029', '53000', '2.52', '27.25', NULL, '95', 1, NULL, NULL, NULL, NULL, NULL, '2022-02-10 06:36:54'),
(54, '54', NULL, 'In Guezzam', 'إن ڨزام', 'In Guezzam', 'ⵉⵏ ⴳⴻⵣⴰⵎ', '029', '54000', '5.78796', '19.8494', NULL, '95', 1, NULL, NULL, NULL, NULL, NULL, '2022-02-10 06:48:52'),
(55, '55', NULL, 'Touggourt', 'تڨرت', 'Touggourt', 'ⵜⵓⴳⵓⵔⵜ', NULL, '55000', '6.0785104', '33.0996078', NULL, '95', 1, NULL, NULL, NULL, NULL, NULL, '2022-02-10 07:01:00'),
(56, '56', NULL, 'Djanet', 'جانت', 'Djanet', 'ⵊⴰⵏⴻⵜ', '029', '56000', '9.4812', '24.5546', NULL, '95', 1, NULL, NULL, NULL, NULL, NULL, '2022-02-10 07:03:12'),
(57, '57', NULL, 'El M\'Ghair', 'المغير', 'El M\'Ghair', 'ⵎⵖⴰⵢⴻⵔ', '032', '57000', '5.9242', '33.9506', NULL, '95', 1, NULL, NULL, NULL, NULL, NULL, '2022-02-10 07:08:40'),
(58, '58', NULL, 'El Menia', 'المنيعة', 'El Menia', NULL, '029', '58000', '2.87979', '30.5889', NULL, '95', 1, NULL, NULL, NULL, NULL, NULL, '2022-02-10 07:12:29');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `wilayas`
--
ALTER TABLE `wilayas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `wilayas_code_unique` (`code`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `wilayas`
--
ALTER TABLE `wilayas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
