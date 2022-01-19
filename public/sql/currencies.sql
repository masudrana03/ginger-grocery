-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2022 at 12:10 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grocery`
--

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `minor_unit` smallint(6) DEFAULT NULL,
  `symbol` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `country`, `currency`, `code`, `minor_unit`, `symbol`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 'Afghanistan', 'Afghani', 'AFN', 2, '؋', NULL, NULL, NULL),
(5, 'Åland Islands', 'Euro', 'EUR', 2, '€', NULL, NULL, NULL),
(6, 'Albania', 'Lek', 'ALL', 2, 'Lek', NULL, NULL, NULL),
(8, 'American Samoa', 'US Dollar', 'USD', 2, '$', NULL, NULL, NULL),
(9, 'Andorra', 'Euro', 'EUR', 2, '€', NULL, NULL, NULL),
(13, 'Argentina', 'Argentine Peso', 'ARS', 2, '$', NULL, NULL, NULL),
(16, 'Australia', 'Australian Dollar', 'AUD', 2, '$', NULL, NULL, NULL),
(17, 'Austria', 'Euro', 'EUR', 2, '€', NULL, NULL, NULL),
(19, 'Bahamas', 'Bahamian Dollar', 'BSD', 2, '$', NULL, NULL, NULL),
(21, 'Bangladesh', 'Taka', 'BDT', 2, '৳', NULL, NULL, NULL),
(22, 'Barbados', 'Barbados Dollar', 'BBD', 2, '$', NULL, NULL, NULL),
(24, 'Belgium', 'Euro', 'EUR', 2, '€', NULL, NULL, NULL),
(25, 'Belize', 'Belize Dollar', 'BZD', 2, 'BZ$', NULL, NULL, NULL),
(28, 'Bhutan', 'Indian Rupee', 'INR', 2, '₹', NULL, NULL, NULL),
(32, 'Bonaire, Sint Eustatius And Saba', 'US Dollar', 'USD', 2, '$', NULL, NULL, NULL),
(36, 'Brazil', 'Brazilian Real', 'BRL', 2, 'R$', NULL, NULL, NULL),
(37, 'British Indian Ocean Territory', 'US Dollar', 'USD', 2, '$', NULL, NULL, NULL),
(39, 'Bulgaria', 'Bulgarian Lev', 'BGN', 2, 'лв', NULL, NULL, NULL),
(43, 'Cambodia', 'Riel', 'KHR', 2, '៛', NULL, NULL, NULL),
(45, 'Canada', 'Canadian Dollar', 'CAD', 2, '$', NULL, NULL, NULL),
(49, 'Chile', 'Chilean Peso', 'CLP', 0, '$', NULL, NULL, NULL),
(51, 'China', 'Yuan Renminbi', 'CNY', 2, '¥', NULL, NULL, NULL),
(54, 'Colombia', 'Colombian Peso', 'COP', 2, '$', NULL, NULL, NULL),
(59, 'Cook Islands', 'New Zealand Dollar', 'NZD', 2, '$', NULL, NULL, NULL),
(62, 'Croatia', 'Kuna', 'HRK', 2, 'kn', NULL, NULL, NULL),
(66, 'Cyprus', 'Euro', 'EUR', 2, '€', NULL, NULL, NULL),
(67, 'Czechia', 'Czech Koruna', 'CZK', 2, 'Kč', NULL, NULL, NULL),
(68, 'Denmark', 'Danish Krone', 'DKK', 2, 'kr', NULL, NULL, NULL),
(72, 'Ecuador', 'US Dollar', 'USD', 2, '$', NULL, NULL, NULL),
(75, 'El Salvador', 'US Dollar', 'USD', 2, '$', NULL, NULL, NULL),
(78, 'Estonia', 'Euro', 'EUR', 2, '€', NULL, NULL, NULL),
(81, 'European Union', 'Euro', 'EUR', 2, '€', NULL, NULL, NULL),
(85, 'Finland', 'Euro', 'EUR', 2, '€', NULL, NULL, NULL),
(86, 'France', 'Euro', 'EUR', 2, '€', NULL, NULL, NULL),
(87, 'French Guiana', 'Euro', 'EUR', 2, '€', NULL, NULL, NULL),
(89, 'French Southern Territories', 'Euro', 'EUR', 2, '€', NULL, NULL, NULL),
(92, 'Georgia', 'Lari', 'GEL', 2, '₾', NULL, NULL, NULL),
(93, 'Germany', 'Euro', 'EUR', 2, '€', NULL, NULL, NULL),
(96, 'Greece', 'Euro', 'EUR', 2, '€', NULL, NULL, NULL),
(99, 'Guadeloupe', 'Euro', 'EUR', 2, '€', NULL, NULL, NULL),
(100, 'Guam', 'US Dollar', 'USD', 2, '$', NULL, NULL, NULL),
(102, 'Guernsey', 'Pound Sterling', 'GBP', 2, '£', NULL, NULL, NULL),
(107, 'Haiti', 'US Dollar', 'USD', 2, '$', NULL, NULL, NULL),
(109, 'Holy See (Vatican)', 'Euro', 'EUR', 2, '€', NULL, NULL, NULL),
(111, 'Hong Kong', 'Hong Kong Dollar', 'HKD', 2, '$', NULL, NULL, NULL),
(112, 'Hungary', 'Forint', 'HUF', 2, 'ft', NULL, NULL, NULL),
(114, 'India', 'Indian Rupee', 'INR', 2, '₹', NULL, NULL, NULL),
(115, 'Indonesia', 'Rupiah', 'IDR', 2, 'Rp', NULL, NULL, NULL),
(119, 'Ireland', 'Euro', 'EUR', 2, '€', NULL, NULL, NULL),
(120, 'Isle Of Man', 'Pound Sterling', 'GBP', 2, '£', NULL, NULL, NULL),
(121, 'Israel', 'New Israeli Sheqel', 'ILS', 2, '₪', NULL, NULL, NULL),
(122, 'Italy', 'Euro', 'EUR', 2, '€', NULL, NULL, NULL),
(124, 'Japan', 'Yen', 'JPY', 0, '¥', NULL, NULL, NULL),
(125, 'Jersey', 'Pound Sterling', 'GBP', 2, '£', NULL, NULL, NULL),
(128, 'Kenya', 'Kenyan Shilling', 'KES', 2, 'Ksh', NULL, NULL, NULL),
(131, 'Korea (the Republic Of)', 'Won', 'KRW', 0, '₩', NULL, NULL, NULL),
(135, 'Latvia', 'Euro', 'EUR', 2, '€', NULL, NULL, NULL),
(142, 'Lithuania', 'Euro', 'EUR', 2, '€', NULL, NULL, NULL),
(143, 'Luxembourg', 'Euro', 'EUR', 2, '€', NULL, NULL, NULL),
(148, 'Malaysia', 'Malaysian Ringgit', 'MYR', 2, 'RM', NULL, NULL, NULL),
(151, 'Malta', 'Euro', 'EUR', 2, '€', NULL, NULL, NULL),
(152, 'Marshall Islands', 'US Dollar', 'USD', 2, '$', NULL, NULL, NULL),
(153, 'Martinique', 'Euro', 'EUR', 2, '€', NULL, NULL, NULL),
(156, 'Mayotte', 'Euro', 'EUR', 2, '€', NULL, NULL, NULL),
(158, 'Mexico', 'Mexican Peso', 'MXN', 2, '$', NULL, NULL, NULL),
(160, 'Micronesia', 'US Dollar', 'USD', 2, '$', NULL, NULL, NULL),
(162, 'Monaco', 'Euro', 'EUR', 2, '€', NULL, NULL, NULL),
(164, 'Montenegro', 'Euro', 'EUR', 2, '€', NULL, NULL, NULL),
(166, 'Morocco', 'Moroccan Dirham', 'MAD', 2, ' .د.م ', NULL, NULL, NULL),
(173, 'Netherlands', 'Euro', 'EUR', 2, '€', NULL, NULL, NULL),
(175, 'New Zealand', 'New Zealand Dollar', 'NZD', 2, '$', NULL, NULL, NULL),
(178, 'Nigeria', 'Naira', 'NGN', 2, '₦', NULL, NULL, NULL),
(179, 'Niue', 'New Zealand Dollar', 'NZD', 2, '$', NULL, NULL, NULL),
(181, 'Northern Mariana Islands', 'US Dollar', 'USD', 2, '$', NULL, NULL, NULL),
(182, 'Norway', 'Norwegian Krone', 'NOK', 2, 'kr', NULL, NULL, NULL),
(184, 'Pakistan', 'Pakistan Rupee', 'PKR', 2, 'Rs', NULL, NULL, NULL),
(185, 'Palau', 'US Dollar', 'USD', 2, '$', NULL, NULL, NULL),
(187, 'Panama', 'US Dollar', 'USD', 2, '$', NULL, NULL, NULL),
(190, 'Peru', 'Sol', 'PEN', 2, 'S', NULL, NULL, NULL),
(191, 'Philippines', 'Philippine Peso', 'PHP', 2, '₱', NULL, NULL, NULL),
(192, 'Pitcairn', 'New Zealand Dollar', 'NZD', 2, '$', NULL, NULL, NULL),
(193, 'Poland', 'Zloty', 'PLN', 2, 'zł', NULL, NULL, NULL),
(194, 'Portugal', 'Euro', 'EUR', 2, '€', NULL, NULL, NULL),
(195, 'Puerto Rico', 'US Dollar', 'USD', 2, '$', NULL, NULL, NULL),
(197, 'Réunion', 'Euro', 'EUR', 2, '€', NULL, NULL, NULL),
(198, 'Romania', 'Romanian Leu', 'RON', 2, 'lei', NULL, NULL, NULL),
(199, 'Russian Federation', 'Russian Ruble', 'RUB', 2, '₽', NULL, NULL, NULL),
(201, 'Saint Barthélemy', 'Euro', 'EUR', 2, '€', NULL, NULL, NULL),
(205, 'Saint Martin (French Part)', 'Euro', 'EUR', 2, '€', NULL, NULL, NULL),
(206, 'Saint Pierre And Miquelon', 'Euro', 'EUR', 2, '€', NULL, NULL, NULL),
(209, 'San Marino', 'Euro', 'EUR', 2, '€', NULL, NULL, NULL),
(216, 'Singapore', 'Singapore Dollar', 'SGD', 2, '$', NULL, NULL, NULL),
(219, 'Slovakia', 'Euro', 'EUR', 2, '€', NULL, NULL, NULL),
(220, 'Slovenia', 'Euro', 'EUR', 2, '€', NULL, NULL, NULL),
(223, 'South Africa', 'Rand', 'ZAR', 2, 'R', NULL, NULL, NULL),
(225, 'Spain', 'Euro', 'EUR', 2, '€', NULL, NULL, NULL),
(226, 'Sri Lanka', 'Sri Lanka Rupee', 'LKR', 2, 'Rs', NULL, NULL, NULL),
(230, 'Sweden', 'Swedish Krona', 'SEK', 2, 'kr', NULL, NULL, NULL),
(238, 'Thailand', 'Baht', 'THB', 2, '฿', NULL, NULL, NULL),
(239, 'Timor-leste', 'US Dollar', 'USD', 2, '$', NULL, NULL, NULL),
(241, 'Tokelau', 'New Zealand Dollar', 'NZD', 2, '$', NULL, NULL, NULL),
(245, 'Turkey', 'Turkish Lira', 'TRY', 2, '₺', NULL, NULL, NULL),
(247, 'Turks And Caicos Islands', 'US Dollar', 'USD', 2, '$', NULL, NULL, NULL),
(250, 'Ukraine', 'Hryvnia', 'UAH', 2, '₴', NULL, NULL, NULL),
(251, 'United Arab Emirates', 'UAE Dirham', 'AED', 2, 'د.إ', NULL, NULL, NULL),
(252, 'United Kingdom Of Great Britain And Northern Ireland', 'Pound Sterling', 'GBP', 2, '£', NULL, NULL, NULL),
(253, 'United States Minor Outlying Islands', 'US Dollar', 'USD', 2, '$', NULL, NULL, NULL),
(254, 'United States Of America', 'US Dollar', 'USD', 2, '$', NULL, NULL, NULL),
(262, 'Vietnam', 'Dong', 'VND', 0, '₫', NULL, NULL, NULL),
(263, 'Virgin Islands (British)', 'US Dollar', 'USD', 2, '$', NULL, NULL, NULL),
(264, 'Virgin Islands (U.S.)', 'US Dollar', 'USD', 2, '$', NULL, NULL, NULL),
(270, 'Albania', 'Leke', 'ALL', NULL, 'Lek', NULL, NULL, NULL),
(271, 'America', 'Dollars', 'USD', NULL, '$', NULL, NULL, NULL),
(272, 'Afghanistan', 'Afghanis', 'AFN', NULL, '؋', NULL, NULL, NULL),
(273, 'Argentina', 'Pesos', 'ARS', NULL, '$', NULL, NULL, NULL),
(274, 'Aruba', 'Guilders', 'AWG', NULL, 'ƒ', NULL, NULL, NULL),
(275, 'Australia', 'Dollars', 'AUD', NULL, '$', NULL, NULL, NULL),
(276, 'Azerbaijan', 'New Manats', 'AZN', NULL, 'ман', NULL, NULL, NULL),
(277, 'Bahamas', 'Dollars', 'BSD', NULL, '$', NULL, NULL, NULL),
(278, 'Barbados', 'Dollars', 'BBD', NULL, '$', NULL, NULL, NULL),
(279, 'Belarus', 'Rubles', 'BYR', NULL, 'p.', NULL, NULL, NULL),
(280, 'Belgium', 'Euro', 'EUR', NULL, '€', NULL, NULL, NULL),
(281, 'Beliz', 'Dollars', 'BZD', NULL, 'BZ$', NULL, NULL, NULL),
(282, 'Bermuda', 'Dollars', 'BMD', NULL, '$', NULL, NULL, NULL),
(283, 'Bolivia', 'Bolivianos', 'BOB', NULL, '$b', NULL, NULL, NULL),
(284, 'Bosnia and Herzegovina', 'Convertible Marka', 'BAM', NULL, 'KM', NULL, NULL, NULL),
(285, 'Botswana', 'Pula', 'BWP', NULL, 'P', NULL, NULL, NULL),
(286, 'Bulgaria', 'Leva', 'BGN', NULL, 'лв', NULL, NULL, NULL),
(287, 'Brazil', 'Reais', 'BRL', NULL, 'R$', NULL, NULL, NULL),
(288, 'Britain (United Kingdom)', 'Pounds', 'GBP', NULL, '£', NULL, NULL, NULL),
(289, 'Brunei Darussalam', 'Dollars', 'BND', NULL, '$', NULL, NULL, NULL),
(290, 'Cambodia', 'Riels', 'KHR', NULL, '៛', NULL, NULL, NULL),
(291, 'Canada', 'Dollars', 'CAD', NULL, '$', NULL, NULL, NULL),
(292, 'Cayman Islands', 'Dollars', 'KYD', NULL, '$', NULL, NULL, NULL),
(293, 'Chile', 'Pesos', 'CLP', NULL, '$', NULL, NULL, NULL),
(294, 'China', 'Yuan Renminbi', 'CNY', NULL, '¥', NULL, NULL, NULL),
(295, 'Colombia', 'Pesos', 'COP', NULL, '$', NULL, NULL, NULL),
(296, 'Costa Rica', 'Colón', 'CRC', NULL, '₡', NULL, NULL, NULL),
(297, 'Croatia', 'Kuna', 'HRK', NULL, 'kn', NULL, NULL, NULL),
(298, 'Cuba', 'Pesos', 'CUP', NULL, '₱', NULL, NULL, NULL),
(299, 'Cyprus', 'Euro', 'EUR', NULL, '€', NULL, NULL, NULL),
(300, 'Czech Republic', 'Koruny', 'CZK', NULL, 'Kč', NULL, NULL, NULL),
(301, 'Denmark', 'Kroner', 'DKK', NULL, 'kr', NULL, NULL, NULL),
(302, 'Dominican Republic', 'Pesos', 'DOP ', NULL, 'RD$', NULL, NULL, NULL),
(303, 'East Caribbean', 'Dollars', 'XCD', NULL, '$', NULL, NULL, NULL),
(304, 'Egypt', 'Pounds', 'EGP', NULL, '£', NULL, NULL, NULL),
(305, 'El Salvador', 'Colones', 'SVC', NULL, '$', NULL, NULL, NULL),
(306, 'England (United Kingdom)', 'Pounds', 'GBP', NULL, '£', NULL, NULL, NULL),
(307, 'Euro', 'Euro', 'EUR', NULL, '€', NULL, NULL, NULL),
(308, 'Falkland Islands', 'Pounds', 'FKP', NULL, '£', NULL, NULL, NULL),
(309, 'Fiji', 'Dollars', 'FJD', NULL, '$', NULL, NULL, NULL),
(310, 'France', 'Euro', 'EUR', NULL, '€', NULL, NULL, NULL),
(311, 'Ghana', 'Cedis', 'GHC', NULL, '¢', NULL, NULL, NULL),
(312, 'Gibraltar', 'Pounds', 'GIP', NULL, '£', NULL, NULL, NULL),
(313, 'Greece', 'Euro', 'EUR', NULL, '€', NULL, NULL, NULL),
(314, 'Guatemala', 'Quetzales', 'GTQ', NULL, 'Q', NULL, NULL, NULL),
(315, 'Guernsey', 'Pounds', 'GGP', NULL, '£', NULL, NULL, NULL),
(316, 'Guyana', 'Dollars', 'GYD', NULL, '$', NULL, NULL, NULL),
(317, 'Holland (Netherlands)', 'Euro', 'EUR', NULL, '€', NULL, NULL, NULL),
(318, 'Honduras', 'Lempiras', 'HNL', NULL, 'L', NULL, NULL, NULL),
(319, 'Hong Kong', 'Dollars', 'HKD', NULL, '$', NULL, NULL, NULL),
(320, 'Hungary', 'Forint', 'HUF', NULL, 'Ft', NULL, NULL, NULL),
(321, 'Iceland', 'Kronur', 'ISK', NULL, 'kr', NULL, NULL, NULL),
(322, 'India', 'Rupees', 'INR', NULL, 'Rp', NULL, NULL, NULL),
(323, 'Indonesia', 'Rupiahs', 'IDR', NULL, 'Rp', NULL, NULL, NULL),
(324, 'Iran', 'Rials', 'IRR', NULL, '﷼', NULL, NULL, NULL),
(325, 'Ireland', 'Euro', 'EUR', NULL, '€', NULL, NULL, NULL),
(326, 'Isle of Man', 'Pounds', 'IMP', NULL, '£', NULL, NULL, NULL),
(327, 'Israel', 'New Shekels', 'ILS', NULL, '₪', NULL, NULL, NULL),
(328, 'Italy', 'Euro', 'EUR', NULL, '€', NULL, NULL, NULL),
(329, 'Jamaica', 'Dollars', 'JMD', NULL, 'J$', NULL, NULL, NULL),
(330, 'Japan', 'Yen', 'JPY', NULL, '¥', NULL, NULL, NULL),
(331, 'Jersey', 'Pounds', 'JEP', NULL, '£', NULL, NULL, NULL),
(332, 'Kazakhstan', 'Tenge', 'KZT', NULL, 'лв', NULL, NULL, NULL),
(333, 'Korea (North)', 'Won', 'KPW', NULL, '₩', NULL, NULL, NULL),
(334, 'Korea (South)', 'Won', 'KRW', NULL, '₩', NULL, NULL, NULL),
(335, 'Kyrgyzstan', 'Soms', 'KGS', NULL, 'лв', NULL, NULL, NULL),
(336, 'Laos', 'Kips', 'LAK', NULL, '₭', NULL, NULL, NULL),
(337, 'Latvia', 'Lati', 'LVL', NULL, 'Ls', NULL, NULL, NULL),
(338, 'Lebanon', 'Pounds', 'LBP', NULL, '£', NULL, NULL, NULL),
(339, 'Liberia', 'Dollars', 'LRD', NULL, '$', NULL, NULL, NULL),
(340, 'Liechtenstein', 'Switzerland Francs', 'CHF', NULL, 'CHF', NULL, NULL, NULL),
(341, 'Lithuania', 'Litai', 'LTL', NULL, 'Lt', NULL, NULL, NULL),
(342, 'Luxembourg', 'Euro', 'EUR', NULL, '€', NULL, NULL, NULL),
(343, 'Macedonia', 'Denars', 'MKD', NULL, 'ден', NULL, NULL, NULL),
(344, 'Malaysia', 'Ringgits', 'MYR', NULL, 'RM', NULL, NULL, NULL),
(345, 'Malta', 'Euro', 'EUR', NULL, '€', NULL, NULL, NULL),
(346, 'Mauritius', 'Rupees', 'MUR', NULL, '₨', NULL, NULL, NULL),
(347, 'Mexico', 'Pesos', 'MXN', NULL, '$', NULL, NULL, NULL),
(348, 'Mongolia', 'Tugriks', 'MNT', NULL, '₮', NULL, NULL, NULL),
(349, 'Mozambique', 'Meticais', 'MZN', NULL, 'MT', NULL, NULL, NULL),
(350, 'Namibia', 'Dollars', 'NAD', NULL, '$', NULL, NULL, NULL),
(351, 'Nepal', 'Rupees', 'NPR', NULL, '₨', NULL, NULL, NULL),
(352, 'Netherlands Antilles', 'Guilders', 'ANG', NULL, 'ƒ', NULL, NULL, NULL),
(353, 'Netherlands', 'Euro', 'EUR', NULL, '€', NULL, NULL, NULL),
(354, 'New Zealand', 'Dollars', 'NZD', NULL, '$', NULL, NULL, NULL),
(355, 'Nicaragua', 'Cordobas', 'NIO', NULL, 'C$', NULL, NULL, NULL),
(356, 'Nigeria', 'Nairas', 'NGN', NULL, '₦', NULL, NULL, NULL),
(357, 'North Korea', 'Won', 'KPW', NULL, '₩', NULL, NULL, NULL),
(358, 'Norway', 'Krone', 'NOK', NULL, 'kr', NULL, NULL, NULL),
(359, 'Oman', 'Rials', 'OMR', NULL, '﷼', NULL, NULL, NULL),
(360, 'Pakistan', 'Rupees', 'PKR', NULL, '₨', NULL, NULL, NULL),
(361, 'Panama', 'Balboa', 'PAB', NULL, 'B/.', NULL, NULL, NULL),
(362, 'Paraguay', 'Guarani', 'PYG', NULL, 'Gs', NULL, NULL, NULL),
(363, 'Peru', 'Nuevos Soles', 'PEN', NULL, 'S/.', NULL, NULL, NULL),
(364, 'Philippines', 'Pesos', 'PHP', NULL, 'Php', NULL, NULL, NULL),
(365, 'Poland', 'Zlotych', 'PLN', NULL, 'zł', NULL, NULL, NULL),
(366, 'Qatar', 'Rials', 'QAR', NULL, '﷼', NULL, NULL, NULL),
(367, 'Romania', 'New Lei', 'RON', NULL, 'lei', NULL, NULL, NULL),
(368, 'Russia', 'Rubles', 'RUB', NULL, 'руб', NULL, NULL, NULL),
(369, 'Saint Helena', 'Pounds', 'SHP', NULL, '£', NULL, NULL, NULL),
(370, 'Saudi Arabia', 'Riyals', 'SAR', NULL, '﷼', NULL, NULL, NULL),
(371, 'Serbia', 'Dinars', 'RSD', NULL, 'Дин.', NULL, NULL, NULL),
(372, 'Seychelles', 'Rupees', 'SCR', NULL, '₨', NULL, NULL, NULL),
(373, 'Singapore', 'Dollars', 'SGD', NULL, '$', NULL, NULL, NULL),
(374, 'Slovenia', 'Euro', 'EUR', NULL, '€', NULL, NULL, NULL),
(375, 'Solomon Islands', 'Dollars', 'SBD', NULL, '$', NULL, NULL, NULL),
(376, 'Somalia', 'Shillings', 'SOS', NULL, 'S', NULL, NULL, NULL),
(377, 'South Africa', 'Rand', 'ZAR', NULL, 'R', NULL, NULL, NULL),
(378, 'South Korea', 'Won', 'KRW', NULL, '₩', NULL, NULL, NULL),
(379, 'Spain', 'Euro', 'EUR', NULL, '€', NULL, NULL, NULL),
(380, 'Sri Lanka', 'Rupees', 'LKR', NULL, '₨', NULL, NULL, NULL),
(381, 'Sweden', 'Kronor', 'SEK', NULL, 'kr', NULL, NULL, NULL),
(382, 'Switzerland', 'Francs', 'CHF', NULL, 'CHF', NULL, NULL, NULL),
(383, 'Suriname', 'Dollars', 'SRD', NULL, '$', NULL, NULL, NULL),
(384, 'Syria', 'Pounds', 'SYP', NULL, '£', NULL, NULL, NULL),
(385, 'Taiwan', 'New Dollars', 'TWD', NULL, 'NT$', NULL, NULL, NULL),
(386, 'Thailand', 'Baht', 'THB', NULL, '฿', NULL, NULL, NULL),
(387, 'Trinidad and Tobago', 'Dollars', 'TTD', NULL, 'TT$', NULL, NULL, NULL),
(388, 'Turkey', 'Lira', 'TRY', NULL, 'TL', NULL, NULL, NULL),
(389, 'Turkey', 'Liras', 'TRL', NULL, '£', NULL, NULL, NULL),
(390, 'Tuvalu', 'Dollars', 'TVD', NULL, '$', NULL, NULL, NULL),
(391, 'Ukraine', 'Hryvnia', 'UAH', NULL, '₴', NULL, NULL, NULL),
(392, 'United Kingdom', 'Pounds', 'GBP', NULL, '£', NULL, NULL, NULL),
(393, 'United States of America', 'Dollars', 'USD', NULL, '$', NULL, NULL, NULL),
(394, 'Uruguay', 'Pesos', 'UYU', NULL, '$U', NULL, NULL, NULL),
(395, 'Uzbekistan', 'Sums', 'UZS', NULL, 'лв', NULL, NULL, NULL),
(396, 'Vatican City', 'Euro', 'EUR', NULL, '€', NULL, NULL, NULL),
(397, 'Venezuela', 'Bolivares Fuertes', 'VEF', NULL, 'Bs', NULL, NULL, NULL),
(398, 'Vietnam', 'Dong', 'VND', NULL, '₫', NULL, NULL, NULL),
(399, 'Yemen', 'Rials', 'YER', NULL, '﷼', NULL, NULL, NULL),
(400, 'Zimbabwe', 'Zimbabwe Dollars', 'ZWD', NULL, 'Z$', NULL, NULL, NULL),
(401, 'India', 'Rupees', 'INR', NULL, '₹', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=402;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
