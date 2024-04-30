-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2024 at 06:40 AM
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
-- Database: `fbms`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `flat_id` bigint(20) UNSIGNED DEFAULT NULL,
  `rating` int(5) UNSIGNED DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `flat_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES
(1, 5, 4, 5, 'Good Service', '2024-04-28 03:50:14', '2024-04-28 03:50:14'),
(2, 5, 4, 4, 'Wonderful Environment', '2024-04-28 04:17:37', '2024-04-28 04:17:37'),
(4, 5, 4, 3, 'okk', '2024-04-28 04:31:05', '2024-04-28 04:31:05'),
(5, 6, 16, 4, 'ok Nice', '2024-04-28 14:03:09', '2024-04-28 14:03:09'),
(6, 6, 4, 4, 'Nice', '2024-04-29 02:06:03', '2024-04-29 02:06:03');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `flats`
--

CREATE TABLE `flats` (
  `flat_id` bigint(20) UNSIGNED NOT NULL,
  `owner_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `location` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `property_type` varchar(255) NOT NULL,
  `size` int(11) NOT NULL,
  `bed` int(11) NOT NULL,
  `bath` int(11) NOT NULL,
  `photo` text NOT NULL,
  `status` varchar(50) DEFAULT 'pending',
  `sale_status` varchar(100) DEFAULT 'Rent',
  `featured` varchar(50) DEFAULT 'false',
  `booking_status` varchar(255) NOT NULL DEFAULT 'none',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `flats`
--

INSERT INTO `flats` (`flat_id`, `owner_id`, `title`, `description`, `location`, `address`, `price`, `property_type`, `size`, `bed`, `bath`, `photo`, `status`, `sale_status`, `featured`, `booking_status`, `created_at`, `updated_at`) VALUES
(4, 5, 'Under Construction Apartment', '<p><span style=\"color: rgb(51, 51, 51); font-family: Lato, sans-serif; font-size: 14px; text-align: justify;\">Dear Sir, 1500 sq-ftf Exclusive apartment available for sale in Hyperion Mojibur Tower. Hyperion Mojibur Tower has been built by Hyperion design &amp; development ltd company and it is located in BUIYAPARA, Banasree. Hyperion design &amp; development ltd has arranged to build a secured gated community on 14.00 Khatas land at BUIYAPARA, Banasree, Dhaka named the “Hyperion Mojibur Tower.\". This would be a big residential complex consisting of 35 apartments leaving 40 % of the land area clear for the habitants to enjoy. It is only 5 minutes drive from Rampura Tv Center. It comprises of number of special features which may ensure healthy environment for the community to enjoy truly a World Class Living in&nbsp; “Hyperion Mojibur Tower.\"at BUIYAPARA, Banasree.</span><br style=\"color: rgb(51, 51, 51); font-family: Lato, sans-serif; font-size: 14px; text-align: justify;\"><span style=\"color: rgb(51, 51, 51); font-family: Lato, sans-serif; font-size: 14px; text-align: justify;\">Project Name: Hyperion Mojibur Tower</span><br style=\"color: rgb(51, 51, 51); font-family: Lato, sans-serif; font-size: 14px; text-align: justify;\"><span style=\"color: rgb(51, 51, 51); font-family: Lato, sans-serif; font-size: 14px; text-align: justify;\">Project Address: Bhuiyapara,Banasree,Dhaka-1219.</span><br style=\"color: rgb(51, 51, 51); font-family: Lato, sans-serif; font-size: 14px; text-align: justify;\"><span style=\"color: rgb(51, 51, 51); font-family: Lato, sans-serif; font-size: 14px; text-align: justify;\">Building Height: 10 storied .</span><br style=\"color: rgb(51, 51, 51); font-family: Lato, sans-serif; font-size: 14px; text-align: justify;\"><span style=\"color: rgb(51, 51, 51); font-family: Lato, sans-serif; font-size: 14px; text-align: justify;\">Building -01 : Residential building</span><br style=\"color: rgb(51, 51, 51); font-family: Lato, sans-serif; font-size: 14px; text-align: justify;\"><span style=\"color: rgb(51, 51, 51); font-family: Lato, sans-serif; font-size: 14px; text-align: justify;\">Project Facing: West</span><br style=\"color: rgb(51, 51, 51); font-family: Lato, sans-serif; font-size: 14px; text-align: justify;\"><span style=\"color: rgb(51, 51, 51); font-family: Lato, sans-serif; font-size: 14px; text-align: justify;\">Land Use: 40%</span><br style=\"color: rgb(51, 51, 51); font-family: Lato, sans-serif; font-size: 14px; text-align: justify;\"><span style=\"color: rgb(51, 51, 51); font-family: Lato, sans-serif; font-size: 14px; text-align: justify;\">Land Area: 14.00 katha.</span><br style=\"color: rgb(51, 51, 51); font-family: Lato, sans-serif; font-size: 14px; text-align: justify;\"><span style=\"color: rgb(51, 51, 51); font-family: Lato, sans-serif; font-size: 14px; text-align: justify;\">Number of Apartments: 35 Nos.&nbsp;</span><br style=\"color: rgb(51, 51, 51); font-family: Lato, sans-serif; font-size: 14px; text-align: justify;\"><span style=\"color: rgb(51, 51, 51); font-family: Lato, sans-serif; font-size: 14px; text-align: justify;\">Number of Parking: 35 cars.</span><br style=\"color: rgb(51, 51, 51); font-family: Lato, sans-serif; font-size: 14px; text-align: justify;\"><span style=\"color: rgb(51, 51, 51); font-family: Lato, sans-serif; font-size: 14px; text-align: justify;\">Common Features:</span><br style=\"color: rgb(51, 51, 51); font-family: Lato, sans-serif; font-size: 14px; text-align: justify;\"><span style=\"color: rgb(51, 51, 51); font-family: Lato, sans-serif; font-size: 14px; text-align: justify;\">building : 1 lifts (10 persons).</span><br style=\"color: rgb(51, 51, 51); font-family: Lato, sans-serif; font-size: 14px; text-align: justify;\"><span style=\"color: rgb(51, 51, 51); font-family: Lato, sans-serif; font-size: 14px; text-align: justify;\">building - 1 stairs&nbsp;</span><br style=\"color: rgb(51, 51, 51); font-family: Lato, sans-serif; font-size: 14px; text-align: justify;\"><span style=\"color: rgb(51, 51, 51); font-family: Lato, sans-serif; font-size: 14px; text-align: justify;\">European Standard Generator.</span><br style=\"color: rgb(51, 51, 51); font-family: Lato, sans-serif; font-size: 14px; text-align: justify;\"><span style=\"color: rgb(51, 51, 51); font-family: Lato, sans-serif; font-size: 14px; text-align: justify;\">Expected Handover: June,2023</span><br></p>', 'Uttara', 'House 12, Road 10', 1500.00, 'Family House', 1200, 3, 3, 'images/1714237622_flat_1.jpg', 'approved', 'Rent', 'true', 'none', '2024-04-27 17:07:02', '2024-04-27 17:07:02'),
(6, 5, '2500 sft Ready Apartment', '<p><span style=\"color: rgb(51, 51, 51); font-family: Lato, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;Hyperion design &amp; development ltd has arranged to build a secured gated community on 14.00 Khatas land Dhaka named the “Hyperion Mojibur Tower.\". This would be a big residential complex consisting of 35 apartments leaving 40 % of the land area clear for the habitants to enjoy. It is only 5 minutes drive from Rampura Tv Center.</span><br style=\"color: rgb(51, 51, 51); font-family: Lato, sans-serif; font-size: 14px; text-align: justify;\"><span style=\"color: rgb(51, 51, 51); font-family: Lato, sans-serif; font-size: 14px; text-align: justify;\">Project Name: Hyperion Mojibur Tower</span><br style=\"color: rgb(51, 51, 51); font-family: Lato, sans-serif; font-size: 14px; text-align: justify;\"><span style=\"color: rgb(51, 51, 51); font-family: Lato, sans-serif; font-size: 14px; text-align: justify;\">Building Height: 10 storied .</span><br style=\"color: rgb(51, 51, 51); font-family: Lato, sans-serif; font-size: 14px; text-align: justify;\"><span style=\"color: rgb(51, 51, 51); font-family: Lato, sans-serif; font-size: 14px; text-align: justify;\">Building -01 : Residential building</span><br></p>', 'Abdullapur', 'House 14, Road 11', 2000.00, 'Family House', 1200, 4, 2, 'images/1714238032_flat_2.jpg', 'approved', 'Rent', 'true', 'none', '2024-04-27 17:13:52', '2024-04-27 17:13:52'),
(7, 5, 'Apartment/Flats for Sale', '<p><span style=\"color: rgb(51, 51, 51); font-family: Lato, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;Hyperion design &amp; development ltd has arranged to build a secured gated community on 14.00 Khatas land Dhaka named the “Hyperion Mojibur Tower.\". This would be a big residential complex consisting of 35 apartments leaving 40 % of the land area clear for the habitants to enjoy. It is only 5 minutes drive from Rampura Tv Center.</span></p><p><span style=\"color: rgb(51, 51, 51); font-family: Lato, sans-serif; font-size: 14px; text-align: justify;\">Ready for Sale<br></span><br></p>', 'Uttara', 'House 15, Road 13', 2000.00, 'Family House', 1500, 2, 2, 'images/1714238241_flat_4.jpeg', 'approved', 'Rent', 'true', 'none', '2024-04-27 17:17:21', '2024-04-27 17:17:21'),
(8, 5, 'Stylish 3 bedroom Luxury Apartment', '<h3 class=\"e1eebb6a1e b484330d89\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-size: calc(var(--bui_spacing_4x) + var(--bui_spacing_half)); font-weight: var(--bui_font_strong_1_font-weight); line-height: var(--bui_font_strong_1_line-height); font-family: BlinkMacSystemFont, -apple-system, &quot;Segoe UI&quot;, Roboto, Helvetica, Arial, sans-serif; margin-block: 0px 0.67em; color: rgb(38, 38, 38);\">Experience world-class service Stylish 3 bedroom Luxury Apartment in Prime location</h3><p data-testid=\"property-description\" class=\"a53cbfa6de b3efd73f69\" style=\"font-size: 14px; line-height: var(--bui_font_body_2_line-height); font-family: BlinkMacSystemFont, -apple-system, &quot;Segoe UI&quot;, Roboto, Helvetica, Arial, sans-serif; white-space-collapse: preserve; margin-block-end: 0px; color: rgb(38, 38, 38);\">Set within the  district in Dhaka, 3 bedroom Luxury Apartment in Prime location has air conditioning, a balcony, and inner courtyard views. This 5-star apartment offers a 24-hour front desk and a lift. The apartment also offers free WiFi, free private parking and facilities for disabled guests.\r\n\r\nThe spacious apartment is fitted with 3 bedrooms, 4 bathrooms, bed linen, towels, a flat-screen TV with streaming services, a dining area, a fully equipped kitchen, and a terrace with garden views. For added privacy, the accommodation has a private entrance and soundproofing.\r\n\r\nA car rental service is available at the apartment.\r\n\r\nConsulate of Singapore is 700 metres from Gulshan Stylish 3 bedroom Luxury Apartment in Prime location, while BRAC University is 1.2 km from the property. The nearest airport is Hazrat Shahjalal International, 7 km from the accommodation, and the property offers a paid airport shuttle service.</p>', 'Abdullapur', 'House 16, Road 10', 2500.00, 'Family House', 1200, 3, 2, 'images/1714271381_flat_4.jpg', 'pending', 'Sale', 'false', 'none', '2024-04-28 02:29:41', '2024-04-28 02:29:41'),
(9, 5, 'Exclusive Marble floor 4 Bedroom\'s', '<p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(112, 118, 118); font-family: &quot;Open Sans&quot;, &quot;PF DinText Pro&quot;, Arial, Helvetica, sans-serif; font-size: 14px; white-space-collapse: preserve;\">The flat description below:</p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(112, 118, 118); font-family: &quot;Open Sans&quot;, &quot;PF DinText Pro&quot;, Arial, Helvetica, sans-serif; font-size: 14px; white-space-collapse: preserve;\">★Bedroom 04</p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(112, 118, 118); font-family: &quot;Open Sans&quot;, &quot;PF DinText Pro&quot;, Arial, Helvetica, sans-serif; font-size: 14px; white-space-collapse: preserve;\">★Bathroom 05</p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(112, 118, 118); font-family: &quot;Open Sans&quot;, &quot;PF DinText Pro&quot;, Arial, Helvetica, sans-serif; font-size: 14px; white-space-collapse: preserve;\">★Drawing space</p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(112, 118, 118); font-family: &quot;Open Sans&quot;, &quot;PF DinText Pro&quot;, Arial, Helvetica, sans-serif; font-size: 14px; white-space-collapse: preserve;\">★Dining Space</p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(112, 118, 118); font-family: &quot;Open Sans&quot;, &quot;PF DinText Pro&quot;, Arial, Helvetica, sans-serif; font-size: 14px; white-space-collapse: preserve;\">★Living space</p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(112, 118, 118); font-family: &quot;Open Sans&quot;, &quot;PF DinText Pro&quot;, Arial, Helvetica, sans-serif; font-size: 14px; white-space-collapse: preserve;\">★Kitchen</p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(112, 118, 118); font-family: &quot;Open Sans&quot;, &quot;PF DinText Pro&quot;, Arial, Helvetica, sans-serif; font-size: 14px; white-space-collapse: preserve;\">★Servants room&amp;bath room</p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(112, 118, 118); font-family: &quot;Open Sans&quot;, &quot;PF DinText Pro&quot;, Arial, Helvetica, sans-serif; font-size: 14px; white-space-collapse: preserve;\">★Wall cabinet</p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(112, 118, 118); font-family: &quot;Open Sans&quot;, &quot;PF DinText Pro&quot;, Arial, Helvetica, sans-serif; font-size: 14px; white-space-collapse: preserve;\">★Floor Tiled marble </p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(112, 118, 118); font-family: &quot;Open Sans&quot;, &quot;PF DinText Pro&quot;, Arial, Helvetica, sans-serif; font-size: 14px; white-space-collapse: preserve;\">★Nice view</p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(112, 118, 118); font-family: &quot;Open Sans&quot;, &quot;PF DinText Pro&quot;, Arial, Helvetica, sans-serif; font-size: 14px; white-space-collapse: preserve;\">★Lift 2</p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(112, 118, 118); font-family: &quot;Open Sans&quot;, &quot;PF DinText Pro&quot;, Arial, Helvetica, sans-serif; font-size: 14px; white-space-collapse: preserve;\">★Generator </p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(112, 118, 118); font-family: &quot;Open Sans&quot;, &quot;PF DinText Pro&quot;, Arial, Helvetica, sans-serif; font-size: 14px; white-space-collapse: preserve;\">★Gas</p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(112, 118, 118); font-family: &quot;Open Sans&quot;, &quot;PF DinText Pro&quot;, Arial, Helvetica, sans-serif; font-size: 14px; white-space-collapse: preserve;\">★Electricity</p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(112, 118, 118); font-family: &quot;Open Sans&quot;, &quot;PF DinText Pro&quot;, Arial, Helvetica, sans-serif; font-size: 14px; white-space-collapse: preserve;\">★Water</p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(112, 118, 118); font-family: &quot;Open Sans&quot;, &quot;PF DinText Pro&quot;, Arial, Helvetica, sans-serif; font-size: 14px; white-space-collapse: preserve;\">★Community Hall</p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(112, 118, 118); font-family: &quot;Open Sans&quot;, &quot;PF DinText Pro&quot;, Arial, Helvetica, sans-serif; font-size: 14px; white-space-collapse: preserve;\">★Waiting room</p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(112, 118, 118); font-family: &quot;Open Sans&quot;, &quot;PF DinText Pro&quot;, Arial, Helvetica, sans-serif; font-size: 14px; white-space-collapse: preserve;\">★Gard room</p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(112, 118, 118); font-family: &quot;Open Sans&quot;, &quot;PF DinText Pro&quot;, Arial, Helvetica, sans-serif; font-size: 14px; white-space-collapse: preserve;\">★Care taker room</p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(112, 118, 118); font-family: &quot;Open Sans&quot;, &quot;PF DinText Pro&quot;, Arial, Helvetica, sans-serif; font-size: 14px; white-space-collapse: preserve;\">★Garden rooftop</p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(112, 118, 118); font-family: &quot;Open Sans&quot;, &quot;PF DinText Pro&quot;, Arial, Helvetica, sans-serif; font-size: 14px; white-space-collapse: preserve;\">★Car parking 3</p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(112, 118, 118); font-family: &quot;Open Sans&quot;, &quot;PF DinText Pro&quot;, Arial, Helvetica, sans-serif; font-size: 14px; white-space-collapse: preserve;\">★CCTV Monitoring system</p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(112, 118, 118); font-family: &quot;Open Sans&quot;, &quot;PF DinText Pro&quot;, Arial, Helvetica, sans-serif; font-size: 14px; white-space-collapse: preserve;\">★Security guard 24 hours Service.</p>', 'Rajlokkhi', 'House 17, Road 11', 2000.00, 'Building', 1000, 4, 2, 'images/1714271663_flat_5.jpg', 'pending', 'Rent', 'false', 'none', '2024-04-28 02:34:23', '2024-04-28 02:34:23'),
(10, 5, 'Golden Urban For sale', '<p><span style=\"color: rgb(34, 34, 34); font-family: Lato, Helvetica, sans-serif; font-size: 15.96px; white-space-collapse: preserve;\">Welcome to the future of urban living in the thriving neighborhood of Mirpur! This under-construction residential flat presents a fantastic opportunity to own a slice of modern comfort. With 1,150 sq ft of space, this apartment boasts 3 bedrooms, 3 bathrooms, and 2 balconies, providing ample room for relaxation and enjoyment. </span><br></p>', 'Uttara', 'House 18, Road 11', 1200.00, 'Shop', 2100, 0, 3, 'images/1714271918_flat_6.jpg', 'pending', 'Rent', 'false', 'none', '2024-04-28 02:38:38', '2024-04-28 02:38:38'),
(11, 5, '1150 Square Feet Apartment', '<p><span style=\"color: rgb(34, 34, 34); font-family: Lato, Helvetica, sans-serif; font-size: 15.96px; white-space-collapse: preserve;\">Welcome to the future of urban living in the thriving neighborhood of Mirpur! This under-construction residential flat presents a fantastic opportunity to own a slice of modern comfort. With 1,150 sq ft of space, this apartment boasts 3 bedrooms, 3 bathrooms, and 2 balconies, providing ample room for relaxation and enjoyment. </span><br></p>', 'Kamarpara', 'House 18, Road 11', 3000.00, 'Shop', 1200, 0, 2, 'images/1714272101_flat_7.jpg', 'pending', 'Rent', 'false', 'none', '2024-04-28 02:41:41', '2024-04-28 02:41:41'),
(12, 5, 'A Nice Flat Is Ready For Sale', '<p><span style=\"color: rgb(34, 34, 34); font-family: Lato, Helvetica, sans-serif; font-size: 15.96px; white-space-collapse: preserve;\">Amicable environment, appropriate commuting system and equitable prices of properties make the area Mirpur spectacular and most sought to all the home stalkers who are looking for properties. Well-to-do living and effortless movement which have to be on top of your wishlists if you are here to know about this home and reckon to own it. Featuring 4 beds and 3 baths, this cozy and beautiful apartment can be a perfect fit for families who are planning to make a home in Mirpur. The Kitchen area is positioned close to the dining space for your congenial gourmet hour. The washrooms are tiled with durable fittings that would make you content with your supposed sanitation. </span><br></p>', 'Abdullapur', 'House 19, Road 11', 1500.00, 'Family House', 1000, 3, 3, 'images/1714272392_flat_8.jpg', 'approved', 'Rent', 'true', 'none', '2024-04-28 02:46:32', '2024-04-28 02:46:32'),
(13, 5, '980 Square Feet Apartment', '<p><span style=\"color: rgb(34, 34, 34); font-family: Lato, Helvetica, sans-serif; font-size: 15.96px; white-space-collapse: preserve;\">This wonderful residence is nestled on a large level in the desirable location of Mirpur. This beautiful 3 beds and 2 baths apartment is quite open and lively. Moreover, the home retains the value of peaceful living while being conveniently close to shops, school and transport. Standing on a strong structure, the flat is cozy and spacious. You will also get 24/7 electricity, water, gas and security services. The asking price of this flat for sale surely comes within your affordability. </span><br></p>', 'Uttara', 'House 20, Road 12', 3000.00, 'Villa', 2000, 2, 2, 'images/1714272760_flat_9.jpg', 'approved', 'Rent', 'true', 'none', '2024-04-28 02:52:40', '2024-04-28 02:52:40'),
(14, 5, '1000 Square Feet Apartment', '<p><span style=\"color: rgb(34, 34, 34); font-family: Lato, Helvetica, sans-serif; font-size: 15.96px; white-space-collapse: preserve;\">Check out this 1000  Square Feet apartment in Uttara. With 3 beds and 2 baths, this eccentric apartment is equipped with every modern feature that one could ever need to live a fulfilling life with family. The house presents a drawing room adjoined to the dining room. The corresponding unit of this building holds a very spacious floor plan with large size windows. The kitchen is beautifully equipped with well-fitted tiles and cabinet to whip up a feast for the family. The rooms are well prepared with the finest quality fixtures and the washrooms are installed with a high durability guarantee. </span><br style=\"box-sizing: inherit; color: rgb(34, 34, 34); font-family: Lato, Helvetica, sans-serif; font-size: 15.96px; white-space-collapse: preserve;\"></p>', 'Uttara', 'House 21, Road 12', 2000.00, 'Villa', 1000, 3, 3, 'images/1714272974_flat_10.jpg', 'approved', 'Rent', 'true', 'none', '2024-04-28 02:56:14', '2024-04-28 02:56:14'),
(15, 5, '1730 Square Feet Apartment', '<p><span style=\"color: rgb(34, 34, 34); font-family: Lato, Helvetica, sans-serif; font-size: 15.96px; white-space-collapse: preserve;\">Imagine a lovely home to return to, after a tiresome day! Yes, we understand how much you fancy such an amazing idea, and how you dream up about spending quality times with your loved ones after of course the very ordinary day you spent outside. Well, in this case we have this stunning home offer for you, which will instantly lift your mood up! Take a tour of this cozy 1730  Square Feet apartment with us, which is located in a convenient location to avail both the urban and relaxing life, according to your necessity. This residence consists of 3 beds with scenic views, 3 baths and balconies where you can set up your refreshing den or a special hideout space from all your worldly stresses! </span><br></p>', 'Kamarpara', 'House 22, Road 12', 1200.00, 'Family House', 1730, 3, 3, 'images/1714273148_flat_11.jpg', 'approved', 'Rent', 'false', 'none', '2024-04-28 02:59:08', '2024-04-28 02:59:08'),
(16, 5, '800 Square feet flat is available', '<p><span style=\"color: rgb(34, 34, 34); font-family: Lato, Helvetica, sans-serif; font-size: 15.96px; white-space-collapse: preserve;\">The place Uttara comes to our mind and what we can picture is the area holding the most inhabitant friendly and green atmosphere. Now Uttara is proposing one of the best deals for your new home. The corresponding unit having the most outstanding amenities that come along with this splendid building. You would get a taste of elite as soon as you enter the drawing room for your leisure hours. The kitchen room is nicely planned for any occupant who seeks for a spacious cooking area. The house got best quality fittings for guaranteeing healthy hygiene. A good amount of school, colleges and groceries are also located in the nearby area. </span><br></p>', 'Uttara', 'House 23, Road 12', 1200.00, 'Villa', 800, 3, 2, 'images/1714275013_flat_12.jpg', 'pending', 'Rent', 'false', 'none', '2024-04-28 03:30:13', '2024-04-28 03:30:13');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Uttara', NULL, NULL),
(2, 'Kamarpara', NULL, NULL),
(3, 'Abdullapur', NULL, NULL),
(4, 'Rajlokkhi', '2024-04-26 21:52:50', '2024-04-26 21:52:50');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_04_27_030523_create_properties_table', 2),
(6, '2024_04_27_034002_create_locations_table', 3),
(7, '2024_04_27_105912_create_flats_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `id` int(10) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`id`, `title`, `content`, `created_at`, `updated_at`) VALUES
(2, 'New Notice', '<p>We have new notice.</p>', '2024-04-29 21:55:43', '2024-04-29 21:55:43'),
(3, 'Notice 2', '<p>Next Notice</p><ol><li>Here one</li><li>Here 3</li></ol>', '2024-04-29 21:57:26', '2024-04-29 22:07:45');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `flat_id` int(10) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `address` text DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `currency` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `flat_id`, `name`, `email`, `phone`, `amount`, `address`, `status`, `transaction_id`, `currency`, `created_at`, `updated_at`) VALUES
(32, 4, 'Remu', 'remu@gmail.com', '01918218933', 1500, 'Uttara, Dhaka', 'Processing', '662f56fa1321c', 'BDT', '2024-04-29 08:14:50', '2024-04-29 08:14:50'),
(33, 7, 'Owner', 'owner@gmail.com', '01981234557', 2000, 'Uttara, Dhaka', 'Processing', '662f75b339840', 'BDT', '2024-04-29 10:25:55', '2024-04-29 10:25:55');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Villa', NULL, NULL),
(2, 'Family House', NULL, NULL),
(3, 'Office', NULL, NULL),
(4, 'Building', NULL, NULL),
(5, 'Shop', NULL, NULL),
(6, 'Garage', NULL, NULL),
(7, 'Hostels', '2024-04-26 21:22:21', '2024-04-26 21:28:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` enum('user','owner','admin') NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `present_address` varchar(255) NOT NULL,
  `permanent_address` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `password`, `photo`, `present_address`, `permanent_address`, `country`, `phone`, `email`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admins', '$2y$10$YGMewdPd5eSL0g6HFX7l.eC6bMOVD1I/aCxSKx7BiRmotSh7c83oW', 'images/img1_20240426_185523_662bf89baf237.jpg', 'Uttara, Dhakas', 'Uttara, Dhakas', 'Bangladeshs', '01611765966', 'admin@gmail.com', '2024-04-26 05:27:15', '2024-04-26 05:27:15'),
(5, 'owner', 'Owner', '$2y$10$/15Hx552gpMolFV6aMtv2e3xEG2/z9cFd/D3/B6Vllvez/GXUFEc.', 'images/boy_20240426_194822_662c0506bd847.jpg', 'Uttara, Dhaka', 'Uttara, Dhaka', 'Bangladesh', '01981234557', 'owner@gmail.com', '2024-04-26 13:48:22', '2024-04-26 13:48:22'),
(6, 'user', 'Remu', '$2y$10$nlkXzYlogS/D.qoKzmunbuNVWRpuSON1xyV9Exw4j6PEhUAtqhj4K', 'images/user_20240428_151428_662e67d451aa8.png', 'Uttara, Dhaka', 'Uttara, Dhaka', 'Bangladesh', '01918218933', 'remu@gmail.com', '2024-04-28 09:14:28', '2024-04-28 09:14:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `flats`
--
ALTER TABLE `flats`
  ADD PRIMARY KEY (`flat_id`),
  ADD KEY `flats_owner_id_foreign` (`owner_id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `flats`
--
ALTER TABLE `flats`
  MODIFY `flat_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `flats`
--
ALTER TABLE `flats`
  ADD CONSTRAINT `flats_owner_id_foreign` FOREIGN KEY (`owner_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
