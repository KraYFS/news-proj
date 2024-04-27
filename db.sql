-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- РҐРѕСЃС‚: localhost
-- Р’СЂРµРјСЏ СЃРѕР·РґР°РЅРёСЏ: РђРїСЂ 24 2024 Рі., 19:15
-- Р’РµСЂСЃРёСЏ СЃРµСЂРІРµСЂР°: 10.6.16-MariaDB-0ubuntu0.22.04.1
-- Р’РµСЂСЃРёСЏ PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Р‘Р°Р·Р° РґР°РЅРЅС‹С…: `efdeffe`
--

-- --------------------------------------------------------

--
-- РЎС‚СЂСѓРєС‚СѓСЂР° С‚Р°Р±Р»РёС†С‹ `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Р”Р°РјРї РґР°РЅРЅС‹С… С‚Р°Р±Р»РёС†С‹ `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@visnik.in.ua', '$2y$10$n1I15ZDN3N2woY9hdGBhcutksA4AKOLuXuJWPARNEALwVUtfX8izW', NULL, '2023-04-26 16:51:26', '2023-04-26 16:51:26');

-- --------------------------------------------------------

--
-- РЎС‚СЂСѓРєС‚СѓСЂР° С‚Р°Р±Р»РёС†С‹ `articles`
--

CREATE TABLE `articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 0,
  `resource` varchar(255) DEFAULT NULL,
  `views` int(11) NOT NULL DEFAULT 0,
  `photo_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `public_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Р”Р°РјРї РґР°РЅРЅС‹С… С‚Р°Р±Р»РёС†С‹ `articles`
--

INSERT INTO `articles` (`id`, `slug`, `is_active`, `resource`, `views`, `photo_id`, `created_at`, `updated_at`, `public_at`) VALUES
(2, 'biici-rdk-ta-legionu-svoboda-rosiyi-atakuvali-bjelgorodsku-oblast-rf', 1, 'Telegram', 57, 23, '2023-05-30 12:57:55', '2024-04-24 08:53:18', '2023-05-23 02:23:00');

-- --------------------------------------------------------

--
-- РЎС‚СЂСѓРєС‚СѓСЂР° С‚Р°Р±Р»РёС†С‹ `article_creators`
--

CREATE TABLE `article_creators` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `article_id` bigint(20) UNSIGNED DEFAULT NULL,
  `employees_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Р”Р°РјРї РґР°РЅРЅС‹С… С‚Р°Р±Р»РёС†С‹ `article_creators`
--

INSERT INTO `article_creators` (`id`, `article_id`, `employees_id`, `created_at`, `updated_at`) VALUES
(6, 2, 1, '2023-05-30 12:57:55', '2023-05-30 12:57:55');

-- --------------------------------------------------------

--
-- РЎС‚СЂСѓРєС‚СѓСЂР° С‚Р°Р±Р»РёС†С‹ `article_translations`
--

CREATE TABLE `article_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `article_id` bigint(20) UNSIGNED DEFAULT NULL,
  `language_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `text` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Р”Р°РјРї РґР°РЅРЅС‹С… С‚Р°Р±Р»РёС†С‹ `article_translations`
--

INSERT INTO `article_translations` (`id`, `article_id`, `language_id`, `name`, `text`, `created_at`, `updated_at`) VALUES
(3, 2, 1, 'Р‘С–Р№С†С– Р Р”Рљ С‚Р° В«Р›РµРіС–РѕРЅСѓ РЎРІРѕР±РѕРґР° Р РѕСЃС–С—В» Р°С‚Р°РєСѓРІР°Р»Рё Р‘С”Р»РіРѕСЂРѕРґСЃСЊРєСѓ РѕР±Р»Р°СЃС‚СЊ Р Р¤', '<p style=\"text-align: justify;\">РЈСЃРµСЂРµРґРёРЅС– СЂР°РЅРєСѓ 22 С‚СЂР°РІРЅСЏ, РїРѕРІС–РґРѕРјР»РµРЅРЅСЏ РїСЂРѕ Р±С–Р№С†С–РІ <strong>\"Р РѕСЃС–Р№СЃСЊРєРѕРіРѕ Р”РѕР±СЂРѕРІРѕР»СЊС‡РѕРіРѕ РљРѕСЂРїСѓСЃСѓ\" (Р Р”Рљ) С‚Р° \"Р›РµРіС–РѕРЅСѓ РЎРІРѕР±РѕРґР° Р РѕСЃС–С—\"</strong> СѓРІС–СЂРІР°Р»РёСЃСЏ РЅР° С‚РµСЂРёС‚РѕСЂС–СЋ Р‘С”Р»РіРѕСЂРѕРґСЃСЊРєРѕС— РѕР±Р»Р°СЃС‚С–, Р РѕСЃС–Р№СЃСЊРєРѕС— Р¤РµРґРµСЂР°С†С–С—. Р’РѕРЅРё РѕРїСѓР±Р»С–РєСѓРІР°Р»Рё РІС–РґРµРѕ, РґРµ Р·РЅР°С…РѕРґСЏС‚СЊСЃСЏ РїРѕСЂСѓС‡ С–Р· РґРѕСЂРѕР¶РЅС–РјРё Р·РЅР°РєР°РјРё Р±С–Р»СЏ СЃС–Р» Р›СЋР±РёРјС–РІРєР°, Р‘РµР·Р»СЋРґС–РІРєР° С‚Р° Р§СѓСЂРѕРІРёС‡С– Сѓ Р‘СЂСЏРЅСЃСЊРєС–Р№ С‚Р° Р‘С”Р»РіРѕСЂРѕРґСЃСЊРєС–Р№ РѕР±Р»Р°СЃС‚СЏС… Р Р¤. РЈ СЃРІРѕС”РјСѓ РІС–РґРµРѕ \"Р›РµРіС–РѕРЅ РЎРІРѕР±РѕРґР° Р РѕСЃС–С—\" Р·Р°РєР»РёРєР°С” СЂРѕСЃС–СЏРЅ РЅРµ РїСЂРѕС‚РёРґС–СЏС‚Рё \"Р·РІС–Р»СЊРЅРµРЅРЅСЋ РІС–Рґ РґРёРєС‚Р°С‚СѓСЂРё РџСѓС‚С–РЅР°\".</p>\r\n<p style=\"text-align: justify;\">РџС–Р·РЅС–С€Рµ, \"Р›РµРіС–РѕРЅ РЎРІРѕР±РѕРґР° Р РѕСЃС–С—\" РїРѕРІС–РґРѕРјРёРІ РїСЂРѕ \"Р·РІС–Р»СЊРЅРµРЅРЅСЏ\" РљРѕР·РёРЅРєРё, СЂРѕР·С‚Р°С€РѕРІР°РЅРѕС— Сѓ Р‘С”Р»РіРѕСЂРѕРґСЃСЊРєС–Р№ РѕР±Р»Р°СЃС‚С–, С‚Р° РЅР°РјС–СЂ РїСЂРѕРґРѕРІР¶РёС‚Рё СЂСѓС… РґРѕ СЂРѕСЃС–Р№СЃСЊРєРѕРіРѕ РјС–СЃС‚Р° Р“СЂР°Р№РІРѕСЂРѕРЅ, С‰Рѕ Р·РЅР°С…РѕРґРёС‚СЊСЃСЏ РЅР° РєРѕСЂРґРѕРЅС– Р· РЈРєСЂР°С—РЅРѕСЋ. Р“СѓР±РµСЂРЅР°С‚РѕСЂ РѕР±Р»Р°СЃС‚С– Р’\'СЏС‡РµСЃР»Р°РІ Р“Р»Р°РґРєРѕРІ Р·Р°СЏРІРёРІ РїСЂРѕ С‚Рµ, С‰Рѕ РЅР° С‚РµСЂРёС‚РѕСЂС–СЋ Р“СЂР°Р№РІРѕСЂРѕРЅСЃСЊРєРѕРіРѕ РѕРєСЂСѓРіСѓ РЅС–Р±РёС‚Рѕ РїСЂРѕРЅРёРєР»Р° \"РґРёРІРµСЂСЃС–Р№РЅРѕ-СЂРѕР·РІС–РґСѓРІР°Р»СЊРЅР° РіСЂСѓРїР° Р—РЎРЈ\", С– С‰Рѕ Р·Р±СЂРѕР№РЅС– СЃРёР»Рё Р РѕСЃС–Р№СЃСЊРєРѕС— Р¤РµРґРµСЂР°С†С–С— СЂР°Р·РѕРј Р· Р РѕСЃРіРІР°СЂРґС–С”СЋ С‚Р° Р¤РЎР‘ Р·Р°Р№РјР°СЋС‚СЊСЃСЏ \"Р»С–РєРІС–РґР°С†С–С”СЋ РїСЂРѕС‚РёРІРЅРёРєР°\".</p>\r\n<p style=\"text-align: justify;\">РЎРїС–РєРµСЂ Р“РѕР»РѕРІРЅРѕРіРѕ СѓРїСЂР°РІР»С–РЅРЅСЏ СЂРѕР·РІС–РґРєРё РњС–РЅС–СЃС‚РµСЂСЃС‚РІР° РѕР±РѕСЂРѕРЅРё РЈРєСЂР°С—РЅРё РђРЅРґСЂС–Р№ Р®СЃРѕРІ Р·Р°СЏРІРёРІ, С‰Рѕ \"Р›РµРіС–РѕРЅ РЎРІРѕР±РѕРґР° Р РѕСЃС–С—\" С‚Р° Р Р”Рљ РїСЂРѕРІРѕРґСЏС‚СЊ РѕРїРµСЂР°С†С–СЋ С‰РѕРґРѕ СЃС‚РІРѕСЂРµРЅРЅСЏ \"СЃРјСѓРіРё Р±РµР·РїРµРєРё\" РЅР° С‚РµСЂРёС‚РѕСЂС–С— Р‘С”Р»РіРѕСЂРѕРґСЃСЊРєРѕС— РѕР±Р»Р°СЃС‚С– Р· РјРµС‚РѕСЋ Р·Р°С…РёСЃС‚Сѓ РіСЂРѕРјР°РґСЏРЅ РЈРєСЂР°С—РЅРё. Р—Р° СЃР»РѕРІР°РјРё Р®СЃРѕРІР°, РІ С†РёС… С„РѕСЂРјСѓРІР°РЅРЅСЏС… Р±РµСЂСѓС‚СЊ СѓС‡Р°СЃС‚СЊ РІРёРєР»СЋС‡РЅРѕ РіСЂРѕРјР°РґСЏРЅРё Р РѕСЃС–Р№СЃСЊРєРѕС— Р¤РµРґРµСЂР°С†С–С—.<br><br>РЈ Р±РµСЂРµР·РЅС– С†СЊРѕРіРѕ СЂРѕРєСѓ, Р±С–Р№С†С– Р РѕСЃС–Р№СЃСЊРєРѕРіРѕ Р”РѕР±СЂРѕРІРѕР»СЊС‡РѕРіРѕ РљРѕСЂРїСѓСЃСѓ (Р Р”Рљ) РѕРіРѕР»РѕСЃРёР»Рё РїСЂРѕ СЃРІС–Р№ РїРµСЂРµС‚РёРЅ РєРѕСЂРґРѕРЅСѓ Р РѕСЃС–С— РІ Р‘СЂСЏРЅСЃСЊРєС–Р№ РѕР±Р»Р°СЃС‚С–. Р’РѕРЅРё Р·Р°СЏРІРёР»Рё, С‰Рѕ С—С…РЅСЏ РјРµС‚Р° - РїСЂРѕРґРµРјРѕРЅСЃС‚СЂСѓРІР°С‚Рё, С‰Рѕ СЂРѕСЃС–СЏРЅРё, С‚СЂРёРјР°СЋС‡Рё Р·Р±СЂРѕСЋ РІ СЂСѓРєР°С…, РјРѕР¶СѓС‚СЊ Р±РѕСЂРѕС‚РёСЃСЏ РїСЂРѕС‚Рё СЂРµР¶РёРјСѓ РџСѓС‚С–РЅР°.<br><br></p>\r\n<p style=\"text-align: center;\">\"РљСЂР°С—РЅР° РґРѕР·СЂС–Р»Р° РґР»СЏ Р·РјС–РЅ. РљСЂР°С—РЅР° РґРѕР·СЂС–Р»Р° РґР»СЏ Р·РІС–Р»СЊРЅРµРЅРЅСЏ. Рђ РЅР°Р№Р±С–Р»СЊС€Рµ С‡РµРєР°СЋС‚СЊ Р·РІС–Р»СЊРЅРµРЅРЅСЏ С‚РµСЂРёС‚РѕСЂС–С—, С‰Рѕ РїСЂРёР»СЏРіР°С” РґРѕ Р·РѕРЅРё РІС–Р№СЃСЊРєРѕРІРёС… РґС–Р№: РљСѓСЂСЃСЊРє, Р‘СЂСЏРЅСЃСЊРє, Р‘С–Р»РіРѕСЂРѕРґ\", - РїРёС€СѓС‚СЊ СЂРѕСЃС–Р№СЃСЊРєС– РїРѕРІСЃС‚Р°РЅС†С–.</p>\r\n<p style=\"text-align: center;\">РЈ РїРѕРІС–РґРѕРјР»РµРЅРЅС– РІ Telegram Р РѕСЃС–Р№СЃСЊРєРѕРіРѕ Р”РѕР±СЂРѕРІРѕР»СЊС‡РѕРіРѕ РљРѕСЂРїСѓСЃСѓ СЃС‚РІРµСЂРґР¶СѓС”С‚СЊСЃСЏ: \"Р’С–Р№РЅР° С‚СЂРёРІР°С‚РёРјРµ, РїРѕРєРё РїРѕРІС–С€РµРЅРµ С‚С–Р»Рѕ РџСѓС‚С–РЅР° РЅРµ РїСЂРёРєСЂР°СЃРёС‚СЊ СЃС‚С–РЅРё РљСЂРµРјР»СЏ, Р° Р№РѕРіРѕ Р·РіСЂР°СЏ РЅРµ Р±СѓРґРµ Р·Р°СЃСѓРґР¶РµРЅР° СЃРїСЂР°РІРµРґР»РёРІРёРј СЃСѓРґРѕРј СЂРѕСЃС–Р№СЃСЊРєРѕРіРѕ РіРЅС–РІСѓ\"<br><br></p>\r\n<p style=\"text-align: justify;\">Р¦С– РїРѕРґС–С— СЃРІС–РґС‡Р°С‚СЊ РїСЂРѕ Р·СЂРѕСЃС‚Р°РЅРЅСЏ РЅР°РїСЂСѓРіРё С– РЅРµР±РµР·РїРµРєРё РЅР° С‚РµСЂРёС‚РѕСЂС–С— Р‘С”Р»РіРѕСЂРѕРґСЃСЊРєРѕС— С‚Р° Р‘СЂСЏРЅСЃСЊРєРѕС— РѕР±Р»Р°СЃС‚РµР№ Р Р¤, Р° С‚Р°РєРѕР¶ РїСЂРѕ РЅР°СЏРІРЅС–СЃС‚СЊ РіСЂСѓРї, СЏРєС– РІРёСЃС‚СѓРїР°СЋС‚СЊ РїСЂРѕС‚Рё СЂРµР¶РёРјСѓ РџСѓС‚С–РЅР° С‚Р° РІРёРєРѕСЂРёСЃС‚РѕРІСѓСЋС‚СЊ Р·Р±СЂРѕСЋ РґР»СЏ РґРѕСЃСЏРіРЅРµРЅРЅСЏ СЃРІРѕС—С… С†С–Р»РµР№. Р—Р°Р»РёС€Р°С”С‚СЊСЃСЏ РЅРµРІС–РґРѕРјРёРј, СЏРєС– РЅР°СЃР»С–РґРєРё С†С– РґС–С— РјРѕР¶СѓС‚СЊ РјР°С‚Рё РЅР° СЃРёС‚СѓР°С†С–СЋ РІ СЂРµРіС–РѕРЅС– С‚Р° РІС–РґРЅРѕСЃРёРЅРё РјС–Р¶ Р РѕСЃС–С”СЋ С‚Р° РЈРєСЂР°С—РЅРѕСЋ.</p>', '2023-05-30 12:57:55', '2023-05-30 13:06:27'),
(4, 2, 2, 'Fighters of the RDK and the \"Legion of Freedom of Russia\" attack the Belgorod region of the Russian Federation', '<p>In the middle of the morning of 22 January, reports about the soldiers of the \"Russian Volunteer Corps\" (RDK) and the \"Legion of Freedom of Russia\" escaped to the territory of the Belgorod region, the Russian Federation. They published a video, where the road signs were assigned to the villages of Lyubimivka, Bezlyudivka and Churovichi near the Bryansk and Belgorod regions of the Russian Federation. In his video \"Legion of Freedom of Russia\" exhorts the Russians not to oppose the \"sound of Putin\'s dictatorship.\"</p>\r\n<p>Later, the \"Legion of Freedom of Russia\" talked about the \"zvilnennya\" of Kozinka, roztashovanoС— near the Belgorod region, that we will continue moving to the Russian town of Graivoron, which is located on the cordon with Ukraine. Governor of the region V\'yacheslav Gladkov, saying that the \"sabotage-reconnaissance group of the ZSU\" penetrated into the territory of the Graivoronsky district, and that the Russian Federation\'s armed forces, together with the Russian Guard, and the FSB are engaged in \"liquidation\" adversary.\"</p>\r\n<p>Andriy Yusov, spokesman of the Main Intelligence Directorate of the Ministry of Defense of Ukraine, said that the \"Legion of Freedom of Russia\" and the RDC will carry out an operation to create a \"safety smuga\" on the territory of the Belgorod region with the help of the people of Ukraine. Behind the words of Yusov, in these moldings, the fate of the bulk of the Russian Federation is exclusively taken.</p>\r\n<p>At the birch rock, the soldiers of the Russian Volunteer Corps (RDK) voiced about their crossing of the cordon of Russia in the Bryansk region. They said that they are meta - to demonstrate that the Russians, with a streak in their hands, can fight against Putin\'s regime.</p>\r\n<p>\"The country is ripe for change. The country is ripe for change. And the most checks are on the territory that lies close to the zone of military divisions: Kursk, Bryansk, Bilgorod,\" the Russian rebels write.</p>\r\n<p>The announcement in the Telegram of the Russian Volunteer Corps states: \"Warning is trivatime, until Putin\'s increased body embellishes the walls of the Kremlin, and he will not be judged by a fair court of Russian anger.\"</p>\r\n<p>Do not forget about the increase in stress and insecurity on the territory of the Belgorod and Bryansk regions of the Russian Federation, as well as about the presence of groups that act against Putin\'s regime and fight against the Putin regime to reach their goals. We are left with the unknown, like the traces of others can mother the situation in the region and in the blue between Russia and Ukraine.</p>', '2023-05-30 12:57:55', '2023-05-30 13:06:27');

-- --------------------------------------------------------

--
-- РЎС‚СЂСѓРєС‚СѓСЂР° С‚Р°Р±Р»РёС†С‹ `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sort` int(11) NOT NULL DEFAULT 0,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Р”Р°РјРї РґР°РЅРЅС‹С… С‚Р°Р±Р»РёС†С‹ `cities`
--

INSERT INTO `cities` (`id`, `sort`, `active`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2023-04-26 16:52:48', '2023-04-26 16:52:48'),
(2, 2, 1, '2023-04-26 16:52:48', '2023-04-26 16:52:48'),
(3, 3, 1, '2023-04-26 16:52:48', '2023-04-26 16:52:48'),
(4, 4, 1, '2023-04-26 16:52:48', '2023-04-26 16:52:48'),
(5, 5, 1, '2023-04-26 16:52:48', '2023-04-26 16:52:48'),
(6, 6, 1, '2023-04-26 16:52:48', '2023-04-26 16:52:48'),
(7, 7, 1, '2023-04-26 16:52:48', '2023-04-26 16:52:48'),
(8, 8, 1, '2023-04-26 16:52:48', '2023-04-26 16:52:48'),
(9, 9, 1, '2023-04-26 16:52:48', '2023-04-26 16:52:48'),
(10, 10, 1, '2023-04-26 16:52:48', '2023-04-26 16:52:48'),
(11, 11, 1, '2023-04-26 16:52:48', '2023-04-26 16:52:48'),
(12, 12, 1, '2023-04-26 16:52:48', '2023-04-26 16:52:48'),
(13, 13, 1, '2023-04-26 16:52:48', '2023-04-26 16:52:48'),
(14, 14, 1, '2023-04-26 16:52:48', '2023-04-26 16:52:48'),
(15, 15, 1, '2023-04-26 16:52:48', '2023-04-26 16:52:48'),
(16, 16, 1, '2023-04-26 16:52:48', '2023-04-26 16:52:48'),
(17, 17, 1, '2023-04-26 16:52:48', '2023-04-26 16:52:48'),
(18, 18, 1, '2023-04-26 16:52:48', '2023-04-26 16:52:48'),
(19, 19, 1, '2023-04-26 16:52:48', '2023-04-26 16:52:48'),
(20, 20, 1, '2023-04-26 16:52:48', '2023-04-26 16:52:48'),
(21, 21, 1, '2023-04-26 16:52:48', '2023-04-26 16:52:48'),
(22, 22, 1, '2023-04-26 16:52:48', '2023-04-26 16:52:48'),
(23, 23, 1, '2023-04-26 16:52:48', '2023-04-26 16:52:48'),
(24, 24, 1, '2023-04-26 16:52:48', '2023-04-26 16:52:48'),
(25, 25, 1, '2023-04-26 16:52:48', '2023-04-26 16:52:48');

-- --------------------------------------------------------

--
-- РЎС‚СЂСѓРєС‚СѓСЂР° С‚Р°Р±Р»РёС†С‹ `city_translations`
--

CREATE TABLE `city_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `city_id` bigint(20) UNSIGNED DEFAULT NULL,
  `language_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Р”Р°РјРї РґР°РЅРЅС‹С… С‚Р°Р±Р»РёС†С‹ `city_translations`
--

INSERT INTO `city_translations` (`id`, `city_id`, `language_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'РљРёС—РІ', '2023-03-23 17:08:57', '2023-03-23 17:08:57'),
(2, 1, 2, 'РљРёС—РІ', '2023-03-23 17:08:57', '2023-03-23 17:08:57'),
(3, 2, 1, 'Р›СЊРІС–РІ', '2023-03-23 17:08:57', '2023-03-23 17:08:57'),
(4, 2, 2, 'Р›СЊРІС–РІ', '2023-03-23 17:08:57', '2023-03-23 17:08:57'),
(5, 3, 1, 'Р†РІР°РЅРѕ-Р¤СЂР°РЅРєС–РІСЃСЊРє', '2023-03-23 17:08:57', '2023-03-23 17:08:57'),
(6, 3, 2, 'Р†РІР°РЅРѕ-Р¤СЂР°РЅРєС–РІСЃСЊРє', '2023-03-23 17:08:57', '2023-03-23 17:08:57'),
(7, 4, 1, 'РўРµСЂРЅРѕРїС–Р»СЊ', '2023-03-23 17:08:57', '2023-03-23 17:08:57'),
(8, 4, 2, 'РўРµСЂРЅРѕРїС–Р»СЊ', '2023-03-23 17:08:57', '2023-03-23 17:08:57'),
(9, 5, 1, 'РҐР°СЂРєС–РІ', '2023-03-23 17:08:57', '2023-03-23 17:08:57'),
(10, 5, 2, 'РҐР°СЂРєС–РІ', '2023-03-23 17:08:57', '2023-03-23 17:08:57'),
(11, 6, 1, 'Р”РЅС–РїСЂРѕ', '2023-03-23 17:08:57', '2023-03-23 17:08:57'),
(12, 6, 2, 'Р”РЅС–РїСЂРѕ', '2023-03-23 17:08:57', '2023-03-23 17:08:57'),
(13, 7, 1, 'Р’С–РЅРЅРёС†СЏ', '2023-03-23 17:08:57', '2023-03-23 17:08:57'),
(14, 7, 2, 'Р’С–РЅРЅРёС†СЏ', '2023-03-23 17:08:57', '2023-03-23 17:08:57'),
(15, 8, 1, 'Р С–РІРЅРµ', '2023-03-23 17:08:57', '2023-03-23 17:08:57'),
(16, 8, 2, 'Р С–РІРЅРµ', '2023-03-23 17:08:57', '2023-03-23 17:08:57'),
(17, 9, 1, 'Р—Р°РїРѕСЂС–Р¶Р¶СЏ', '2023-03-23 17:08:57', '2023-03-23 17:08:57'),
(18, 9, 2, 'Р—Р°РїРѕСЂС–Р¶Р¶СЏ', '2023-03-23 17:08:57', '2023-03-23 17:08:57'),
(19, 10, 1, 'РћРґРµСЃР°', '2023-03-23 17:08:57', '2023-03-23 17:08:57'),
(20, 10, 2, 'РћРґРµСЃР°', '2023-03-23 17:08:57', '2023-03-23 17:08:57'),
(21, 11, 1, 'РҐРјРµР»СЊРЅРёС†СЊРєРёР№', '2023-03-23 17:08:57', '2023-03-23 17:08:57'),
(22, 11, 2, 'РҐРјРµР»СЊРЅРёС†СЊРєРёР№', '2023-03-23 17:08:57', '2023-03-23 17:08:57'),
(23, 12, 1, 'РџРѕР»С‚Р°РІР°', '2023-03-23 17:08:57', '2023-03-23 17:08:57'),
(24, 12, 2, 'РџРѕР»С‚Р°РІР°', '2023-03-23 17:08:57', '2023-03-23 17:08:57'),
(25, 13, 1, 'Р§РµСЂРєР°СЃРё', '2023-03-23 17:08:57', '2023-03-23 17:08:57'),
(26, 13, 2, 'Р§РµСЂРєР°СЃРё', '2023-03-23 17:08:57', '2023-03-23 17:08:57'),
(27, 14, 1, 'Р–РёС‚РѕРјРёСЂ', '2023-03-23 17:08:57', '2023-03-23 17:08:57'),
(28, 14, 2, 'Р–РёС‚РѕРјРёСЂ', '2023-03-23 17:08:57', '2023-03-23 17:08:57'),
(29, 15, 1, 'Р§РµСЂРЅС–РІС†С–', '2023-03-23 17:08:57', '2023-03-23 17:08:57'),
(30, 15, 2, 'Р§РµСЂРЅС–РІС†С–', '2023-03-23 17:08:57', '2023-03-23 17:08:57'),
(31, 16, 1, 'РљСЂРѕРїРёРІРЅРёС†СЊРєРёР№', '2023-03-23 17:08:57', '2023-03-23 17:08:57'),
(32, 16, 2, 'РљСЂРѕРїРёРІРЅРёС†СЊРєРёР№', '2023-03-23 17:08:57', '2023-03-23 17:08:57'),
(33, 17, 1, 'РњРёРєРѕР»Р°С—РІ', '2023-03-23 17:08:57', '2023-03-23 17:08:57'),
(34, 17, 2, 'РњРёРєРѕР»Р°С—РІ', '2023-03-23 17:08:57', '2023-03-23 17:08:57'),
(35, 18, 1, 'Р§РµСЂРЅС–РіС–РІ', '2023-03-23 17:08:57', '2023-03-23 17:08:57'),
(36, 18, 2, 'Р§РµСЂРЅС–РіС–РІ', '2023-03-23 17:08:57', '2023-03-23 17:08:57'),
(37, 19, 1, 'РЈР¶РіРѕСЂРѕРґ', '2023-03-23 17:08:57', '2023-03-23 17:08:57'),
(38, 19, 2, 'РЈР¶РіРѕСЂРѕРґ', '2023-03-23 17:08:57', '2023-03-23 17:08:57'),
(39, 20, 1, 'РЎСѓРјРё', '2023-03-23 17:08:57', '2023-03-23 17:08:57'),
(40, 20, 2, 'РЎСѓРјРё', '2023-03-23 17:08:57', '2023-03-23 17:08:57'),
(41, 21, 1, 'РҐРµСЂСЃРѕРЅ', '2023-03-23 17:08:57', '2023-03-23 17:08:57'),
(42, 21, 2, 'РҐРµСЂСЃРѕРЅ', '2023-03-23 17:08:57', '2023-03-23 17:08:57'),
(43, 22, 1, 'Р”РѕРЅРµС†СЊРє', '2023-03-23 17:08:57', '2023-03-23 17:08:57'),
(44, 22, 2, 'Р”РѕРЅРµС†СЊРє', '2023-03-23 17:08:57', '2023-03-23 17:08:57'),
(45, 23, 1, 'Р›СѓРіР°РЅСЃСЊРє', '2023-03-23 17:08:57', '2023-03-23 17:08:57'),
(46, 23, 2, 'Р›СѓРіР°РЅСЃСЊРє', '2023-03-23 17:08:57', '2023-03-23 17:08:57'),
(47, 24, 1, 'РЎС–РјС„РµСЂРѕРїРѕР»СЊ', '2023-03-23 17:08:57', '2023-03-23 17:08:57'),
(48, 24, 2, 'РЎС–РјС„РµСЂРѕРїРѕР»СЊ', '2023-03-23 17:08:57', '2023-03-23 17:08:57'),
(49, 25, 1, 'Р›СѓС†СЊРє', '2023-03-23 17:08:57', '2023-03-23 17:08:57'),
(50, 25, 2, 'Р›СѓС†СЊРє', '2023-03-23 17:08:57', '2023-03-23 17:08:57');

-- --------------------------------------------------------

--
-- РЎС‚СЂСѓРєС‚СѓСЂР° С‚Р°Р±Р»РёС†С‹ `config_systems`
--

CREATE TABLE `config_systems` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Р”Р°РјРї РґР°РЅРЅС‹С… С‚Р°Р±Р»РёС†С‹ `config_systems`
--

INSERT INTO `config_systems` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'token', '5528247660:AAFHWtVfO8szRfu_UveP17NXoyBXUOMabZ', '2023-04-26 16:53:11', '2023-04-27 11:25:56'),
(2, 'group', '-978830888', '2023-04-26 16:53:11', '2023-04-27 11:25:56'),
(3, 'lang', '1', '2023-04-26 16:53:11', '2023-04-27 11:25:56');

-- --------------------------------------------------------

--
-- РЎС‚СЂСѓРєС‚СѓСЂР° С‚Р°Р±Р»РёС†С‹ `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `speciality_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `photo_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Р”Р°РјРї РґР°РЅРЅС‹С… С‚Р°Р±Р»РёС†С‹ `employees`
--

INSERT INTO `employees` (`id`, `speciality_id`, `status`, `photo_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 8, '2023-05-24 13:57:39', '2023-05-24 13:57:39');

-- --------------------------------------------------------

--
-- РЎС‚СЂСѓРєС‚СѓСЂР° С‚Р°Р±Р»РёС†С‹ `employees_translations`
--

CREATE TABLE `employees_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employees_id` bigint(20) UNSIGNED DEFAULT NULL,
  `language_id` bigint(20) UNSIGNED NOT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Р”Р°РјРї РґР°РЅРЅС‹С… С‚Р°Р±Р»РёС†С‹ `employees_translations`
--

INSERT INTO `employees_translations` (`id`, `employees_id`, `language_id`, `last_name`, `first_name`, `surname`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Р”СЊРѕРјС–РЅ', 'РћР»РµРєСЃС–Р№', 'Р’Р°СЃРёР»СЊРѕРІРёС‡', NULL, '2023-05-24 13:57:39', '2023-05-24 13:57:39'),
(2, 1, 2, 'Domin', 'Oleksii', 'Vasylovych', NULL, '2023-05-24 13:57:39', '2023-05-24 13:57:39');

-- --------------------------------------------------------

--
-- РЎС‚СЂСѓРєС‚СѓСЂР° С‚Р°Р±Р»РёС†С‹ `failed_jobs`
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
-- РЎС‚СЂСѓРєС‚СѓСЂР° С‚Р°Р±Р»РёС†С‹ `files`
--

CREATE TABLE `files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `disk` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Р”Р°РјРї РґР°РЅРЅС‹С… С‚Р°Р±Р»РёС†С‹ `files`
--

INSERT INTO `files` (`id`, `disk`, `name`, `type`, `size`, `active`, `created_at`, `updated_at`) VALUES
(8, 'employees', 'pjdbmjnuy2hxiwhc.png', 'png', '102840', 1, '2023-05-24 13:57:39', '2023-05-24 13:57:39'),
(23, 'articles', 'qtcmmpc5xvestxry.jpg', 'jpg', '418408', 1, '2023-05-30 13:00:33', '2023-05-30 13:00:33');

-- --------------------------------------------------------

--
-- РЎС‚СЂСѓРєС‚СѓСЂР° С‚Р°Р±Р»РёС†С‹ `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `sort` int(11) NOT NULL DEFAULT 0,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Р”Р°РјРї РґР°РЅРЅС‹С… С‚Р°Р±Р»РёС†С‹ `languages`
--

INSERT INTO `languages` (`id`, `name`, `value`, `sort`, `active`, `created_at`, `updated_at`) VALUES
(1, 'UA', 'uk', 1, 1, NULL, NULL),
(2, 'EN', 'en', 2, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- РЎС‚СЂСѓРєС‚СѓСЂР° С‚Р°Р±Р»РёС†С‹ `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Р”Р°РјРї РґР°РЅРЅС‹С… С‚Р°Р±Р»РёС†С‹ `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_admins_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2018_08_08_100000_create_telescope_entries_table', 1),
(5, '2019_08_19_000000_create_failed_jobs_table', 1),
(6, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(7, '2023_02_07_111654_create_languages_table', 1),
(8, '2023_02_13_154337_create_config_systems_table', 1),
(9, '2023_03_07_224254_create_files_table', 1),
(10, '2023_03_23_003958_create_specialities_table', 1),
(11, '2023_03_23_004035_create_speciality_translations_table', 1),
(12, '2023_03_23_005459_create_employees_table', 1),
(13, '2023_03_23_124336_create_employees_translations_table', 1),
(14, '2023_03_23_133847_add_speciality_employees', 1),
(15, '2023_03_23_140631_create_articles_table', 1),
(16, '2023_03_23_140659_create_article_translations_table', 1),
(17, '2023_03_23_140741_create_article_creators_table', 1),
(18, '2023_03_23_174819_add_public_time_article', 1),
(19, '2023_03_23_204646_create_cities_table', 1),
(20, '2023_03_23_204653_create_city_translations_table', 1),
(21, '2023_03_23_211434_create_press_requests_table', 1),
(22, '2023_03_27_152236_drop_coloms_unique_press_requests', 1),
(23, '2023_03_27_152556_add_colums_press_requests', 1),
(24, '2023_03_27_152728_re_type_delivery_addresses_department', 1);

-- --------------------------------------------------------

--
-- РЎС‚СЂСѓРєС‚СѓСЂР° С‚Р°Р±Р»РёС†С‹ `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- РЎС‚СЂСѓРєС‚СѓСЂР° С‚Р°Р±Р»РёС†С‹ `personal_access_tokens`
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
-- РЎС‚СЂСѓРєС‚СѓСЂР° С‚Р°Р±Р»РёС†С‹ `press_requests`
--

CREATE TABLE `press_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `car` tinyint(4) NOT NULL DEFAULT 0,
  `car_brand` varchar(255) DEFAULT NULL,
  `car_number` varchar(255) DEFAULT NULL,
  `speciality_id` bigint(20) UNSIGNED DEFAULT NULL,
  `term` tinyint(4) NOT NULL DEFAULT 0,
  `region` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `steer` varchar(255) DEFAULT NULL,
  `house` varchar(255) DEFAULT NULL,
  `apartment` varchar(255) DEFAULT NULL,
  `delivery_addresses_city` bigint(20) UNSIGNED DEFAULT NULL,
  `delivery_addresses_department` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `photo_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- РЎС‚СЂСѓРєС‚СѓСЂР° С‚Р°Р±Р»РёС†С‹ `specialities`
--

CREATE TABLE `specialities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Р”Р°РјРї РґР°РЅРЅС‹С… С‚Р°Р±Р»РёС†С‹ `specialities`
--

INSERT INTO `specialities` (`id`, `slug`, `is_active`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'redaktor', 1, NULL, '2023-04-27 11:04:04', '2023-04-27 11:04:04'),
(2, 'specialnii-korespondent', 1, NULL, '2023-05-24 13:51:24', '2023-05-24 13:51:24'),
(3, 'reporter-viiskovii-korespondent', 1, NULL, '2023-05-24 14:02:46', '2023-05-24 14:02:46');

-- --------------------------------------------------------

--
-- РЎС‚СЂСѓРєС‚СѓСЂР° С‚Р°Р±Р»РёС†С‹ `speciality_translations`
--

CREATE TABLE `speciality_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `speciality_id` bigint(20) UNSIGNED DEFAULT NULL,
  `language_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Р”Р°РјРї РґР°РЅРЅС‹С… С‚Р°Р±Р»РёС†С‹ `speciality_translations`
--

INSERT INTO `speciality_translations` (`id`, `speciality_id`, `language_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Р РµРґР°РєС‚РѕСЂ', '2023-04-27 11:04:04', '2023-04-27 11:04:04'),
(2, 1, 2, 'Redactor', '2023-04-27 11:04:04', '2023-04-27 11:04:04'),
(3, 2, 1, 'РЎРџР•Р¦Р†РђР›Р¬РќРР™ РљРћР Р•РЎРџРћРќР”Р•РќРў', '2023-05-24 13:51:24', '2023-05-24 13:51:24'),
(4, 2, 2, 'spec. korespondent', '2023-05-24 13:51:24', '2023-05-24 13:51:24'),
(5, 3, 1, 'Р Р•РџРћР РўР•Р  Р’Р†Р™РЎР¬РљРћР’РР™ РљРћР Р•РЎРџРћРќР”Р•РќРў', '2023-05-24 14:02:46', '2023-05-24 14:02:46'),
(6, 3, 2, 'REPORTER MILITARY CORRESPONDENT', '2023-05-24 14:02:46', '2023-05-24 14:02:46');

-- --------------------------------------------------------

--
-- РЎС‚СЂСѓРєС‚СѓСЂР° С‚Р°Р±Р»РёС†С‹ `telescope_entries`
--

CREATE TABLE `telescope_entries` (
  `sequence` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `batch_id` char(36) NOT NULL,
  `family_hash` varchar(255) DEFAULT NULL,
  `should_display_on_index` tinyint(1) NOT NULL DEFAULT 1,
  `type` varchar(20) NOT NULL,
  `content` longtext NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- РЎС‚СЂСѓРєС‚СѓСЂР° С‚Р°Р±Р»РёС†С‹ `telescope_entries_tags`
--

CREATE TABLE `telescope_entries_tags` (
  `entry_uuid` char(36) NOT NULL,
  `tag` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- РЎС‚СЂСѓРєС‚СѓСЂР° С‚Р°Р±Р»РёС†С‹ `telescope_monitoring`
--

CREATE TABLE `telescope_monitoring` (
  `tag` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- РЎС‚СЂСѓРєС‚СѓСЂР° С‚Р°Р±Р»РёС†С‹ `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- РРЅРґРµРєСЃС‹ СЃРѕС…СЂР°РЅС‘РЅРЅС‹С… С‚Р°Р±Р»РёС†
--

--
-- РРЅРґРµРєСЃС‹ С‚Р°Р±Р»РёС†С‹ `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- РРЅРґРµРєСЃС‹ С‚Р°Р±Р»РёС†С‹ `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `articles_slug_unique` (`slug`),
  ADD KEY `articles_photo_id_foreign` (`photo_id`);

--
-- РРЅРґРµРєСЃС‹ С‚Р°Р±Р»РёС†С‹ `article_creators`
--
ALTER TABLE `article_creators`
  ADD PRIMARY KEY (`id`),
  ADD KEY `article_creators_article_id_foreign` (`article_id`),
  ADD KEY `article_creators_employees_id_foreign` (`employees_id`);

--
-- РРЅРґРµРєСЃС‹ С‚Р°Р±Р»РёС†С‹ `article_translations`
--
ALTER TABLE `article_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `article_translations_article_id_foreign` (`article_id`),
  ADD KEY `article_translations_language_id_foreign` (`language_id`);

--
-- РРЅРґРµРєСЃС‹ С‚Р°Р±Р»РёС†С‹ `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- РРЅРґРµРєСЃС‹ С‚Р°Р±Р»РёС†С‹ `city_translations`
--
ALTER TABLE `city_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `city_translations_city_id_foreign` (`city_id`),
  ADD KEY `city_translations_language_id_foreign` (`language_id`);

--
-- РРЅРґРµРєСЃС‹ С‚Р°Р±Р»РёС†С‹ `config_systems`
--
ALTER TABLE `config_systems`
  ADD PRIMARY KEY (`id`);

--
-- РРЅРґРµРєСЃС‹ С‚Р°Р±Р»РёС†С‹ `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employees_photo_id_foreign` (`photo_id`),
  ADD KEY `employees_speciality_id_foreign` (`speciality_id`);

--
-- РРЅРґРµРєСЃС‹ С‚Р°Р±Р»РёС†С‹ `employees_translations`
--
ALTER TABLE `employees_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employees_translations_employees_id_foreign` (`employees_id`),
  ADD KEY `employees_translations_language_id_foreign` (`language_id`);

--
-- РРЅРґРµРєСЃС‹ С‚Р°Р±Р»РёС†С‹ `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- РРЅРґРµРєСЃС‹ С‚Р°Р±Р»РёС†С‹ `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- РРЅРґРµРєСЃС‹ С‚Р°Р±Р»РёС†С‹ `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- РРЅРґРµРєСЃС‹ С‚Р°Р±Р»РёС†С‹ `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- РРЅРґРµРєСЃС‹ С‚Р°Р±Р»РёС†С‹ `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- РРЅРґРµРєСЃС‹ С‚Р°Р±Р»РёС†С‹ `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- РРЅРґРµРєСЃС‹ С‚Р°Р±Р»РёС†С‹ `press_requests`
--
ALTER TABLE `press_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `press_requests_speciality_id_foreign` (`speciality_id`),
  ADD KEY `press_requests_delivery_addresses_city_foreign` (`delivery_addresses_city`),
  ADD KEY `press_requests_photo_id_foreign` (`photo_id`);

--
-- РРЅРґРµРєСЃС‹ С‚Р°Р±Р»РёС†С‹ `specialities`
--
ALTER TABLE `specialities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `specialities_slug_unique` (`slug`),
  ADD KEY `specialities_parent_id_foreign` (`parent_id`);

--
-- РРЅРґРµРєСЃС‹ С‚Р°Р±Р»РёС†С‹ `speciality_translations`
--
ALTER TABLE `speciality_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `speciality_translations_speciality_id_foreign` (`speciality_id`),
  ADD KEY `speciality_translations_language_id_foreign` (`language_id`);

--
-- РРЅРґРµРєСЃС‹ С‚Р°Р±Р»РёС†С‹ `telescope_entries`
--
ALTER TABLE `telescope_entries`
  ADD PRIMARY KEY (`sequence`),
  ADD UNIQUE KEY `telescope_entries_uuid_unique` (`uuid`),
  ADD KEY `telescope_entries_batch_id_index` (`batch_id`),
  ADD KEY `telescope_entries_family_hash_index` (`family_hash`),
  ADD KEY `telescope_entries_created_at_index` (`created_at`),
  ADD KEY `telescope_entries_type_should_display_on_index_index` (`type`,`should_display_on_index`);

--
-- РРЅРґРµРєСЃС‹ С‚Р°Р±Р»РёС†С‹ `telescope_entries_tags`
--
ALTER TABLE `telescope_entries_tags`
  ADD KEY `telescope_entries_tags_entry_uuid_tag_index` (`entry_uuid`,`tag`),
  ADD KEY `telescope_entries_tags_tag_index` (`tag`);

--
-- РРЅРґРµРєСЃС‹ С‚Р°Р±Р»РёС†С‹ `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT РґР»СЏ СЃРѕС…СЂР°РЅС‘РЅРЅС‹С… С‚Р°Р±Р»РёС†
--

--
-- AUTO_INCREMENT РґР»СЏ С‚Р°Р±Р»РёС†С‹ `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT РґР»СЏ С‚Р°Р±Р»РёС†С‹ `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=328;

--
-- AUTO_INCREMENT РґР»СЏ С‚Р°Р±Р»РёС†С‹ `article_creators`
--
ALTER TABLE `article_creators`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=315;

--
-- AUTO_INCREMENT РґР»СЏ С‚Р°Р±Р»РёС†С‹ `article_translations`
--
ALTER TABLE `article_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=623;

--
-- AUTO_INCREMENT РґР»СЏ С‚Р°Р±Р»РёС†С‹ `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT РґР»СЏ С‚Р°Р±Р»РёС†С‹ `city_translations`
--
ALTER TABLE `city_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT РґР»СЏ С‚Р°Р±Р»РёС†С‹ `config_systems`
--
ALTER TABLE `config_systems`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT РґР»СЏ С‚Р°Р±Р»РёС†С‹ `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT РґР»СЏ С‚Р°Р±Р»РёС†С‹ `employees_translations`
--
ALTER TABLE `employees_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=223;

--
-- AUTO_INCREMENT РґР»СЏ С‚Р°Р±Р»РёС†С‹ `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT РґР»СЏ С‚Р°Р±Р»РёС†С‹ `files`
--
ALTER TABLE `files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=549;

--
-- AUTO_INCREMENT РґР»СЏ С‚Р°Р±Р»РёС†С‹ `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT РґР»СЏ С‚Р°Р±Р»РёС†С‹ `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT РґР»СЏ С‚Р°Р±Р»РёС†С‹ `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT РґР»СЏ С‚Р°Р±Р»РёС†С‹ `press_requests`
--
ALTER TABLE `press_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT РґР»СЏ С‚Р°Р±Р»РёС†С‹ `specialities`
--
ALTER TABLE `specialities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT РґР»СЏ С‚Р°Р±Р»РёС†С‹ `speciality_translations`
--
ALTER TABLE `speciality_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT РґР»СЏ С‚Р°Р±Р»РёС†С‹ `telescope_entries`
--
ALTER TABLE `telescope_entries`
  MODIFY `sequence` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT РґР»СЏ С‚Р°Р±Р»РёС†С‹ `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- РћРіСЂР°РЅРёС‡РµРЅРёСЏ РІРЅРµС€РЅРµРіРѕ РєР»СЋС‡Р° СЃРѕС…СЂР°РЅРµРЅРЅС‹С… С‚Р°Р±Р»РёС†
--

--
-- РћРіСЂР°РЅРёС‡РµРЅРёСЏ РІРЅРµС€РЅРµРіРѕ РєР»СЋС‡Р° С‚Р°Р±Р»РёС†С‹ `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_photo_id_foreign` FOREIGN KEY (`photo_id`) REFERENCES `files` (`id`) ON DELETE CASCADE;

--
-- РћРіСЂР°РЅРёС‡РµРЅРёСЏ РІРЅРµС€РЅРµРіРѕ РєР»СЋС‡Р° С‚Р°Р±Р»РёС†С‹ `article_creators`
--
ALTER TABLE `article_creators`
  ADD CONSTRAINT `article_creators_article_id_foreign` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `article_creators_employees_id_foreign` FOREIGN KEY (`employees_id`) REFERENCES `employees` (`id`);

--
-- РћРіСЂР°РЅРёС‡РµРЅРёСЏ РІРЅРµС€РЅРµРіРѕ РєР»СЋС‡Р° С‚Р°Р±Р»РёС†С‹ `article_translations`
--
ALTER TABLE `article_translations`
  ADD CONSTRAINT `article_translations_article_id_foreign` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `article_translations_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`);

--
-- РћРіСЂР°РЅРёС‡РµРЅРёСЏ РІРЅРµС€РЅРµРіРѕ РєР»СЋС‡Р° С‚Р°Р±Р»РёС†С‹ `city_translations`
--
ALTER TABLE `city_translations`
  ADD CONSTRAINT `city_translations_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `city_translations_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`);

--
-- РћРіСЂР°РЅРёС‡РµРЅРёСЏ РІРЅРµС€РЅРµРіРѕ РєР»СЋС‡Р° С‚Р°Р±Р»РёС†С‹ `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_photo_id_foreign` FOREIGN KEY (`photo_id`) REFERENCES `files` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `employees_speciality_id_foreign` FOREIGN KEY (`speciality_id`) REFERENCES `specialities` (`id`) ON DELETE CASCADE;

--
-- РћРіСЂР°РЅРёС‡РµРЅРёСЏ РІРЅРµС€РЅРµРіРѕ РєР»СЋС‡Р° С‚Р°Р±Р»РёС†С‹ `employees_translations`
--
ALTER TABLE `employees_translations`
  ADD CONSTRAINT `employees_translations_employees_id_foreign` FOREIGN KEY (`employees_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `employees_translations_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`);

--
-- РћРіСЂР°РЅРёС‡РµРЅРёСЏ РІРЅРµС€РЅРµРіРѕ РєР»СЋС‡Р° С‚Р°Р±Р»РёС†С‹ `press_requests`
--
ALTER TABLE `press_requests`
  ADD CONSTRAINT `press_requests_delivery_addresses_city_foreign` FOREIGN KEY (`delivery_addresses_city`) REFERENCES `cities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `press_requests_photo_id_foreign` FOREIGN KEY (`photo_id`) REFERENCES `files` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `press_requests_speciality_id_foreign` FOREIGN KEY (`speciality_id`) REFERENCES `specialities` (`id`) ON DELETE CASCADE;

--
-- РћРіСЂР°РЅРёС‡РµРЅРёСЏ РІРЅРµС€РЅРµРіРѕ РєР»СЋС‡Р° С‚Р°Р±Р»РёС†С‹ `specialities`
--
ALTER TABLE `specialities`
  ADD CONSTRAINT `specialities_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `specialities` (`id`) ON DELETE CASCADE;

--
-- РћРіСЂР°РЅРёС‡РµРЅРёСЏ РІРЅРµС€РЅРµРіРѕ РєР»СЋС‡Р° С‚Р°Р±Р»РёС†С‹ `speciality_translations`
--
ALTER TABLE `speciality_translations`
  ADD CONSTRAINT `speciality_translations_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`),
  ADD CONSTRAINT `speciality_translations_speciality_id_foreign` FOREIGN KEY (`speciality_id`) REFERENCES `specialities` (`id`) ON DELETE CASCADE;

--
-- РћРіСЂР°РЅРёС‡РµРЅРёСЏ РІРЅРµС€РЅРµРіРѕ РєР»СЋС‡Р° С‚Р°Р±Р»РёС†С‹ `telescope_entries_tags`
--
ALTER TABLE `telescope_entries_tags`
  ADD CONSTRAINT `telescope_entries_tags_entry_uuid_foreign` FOREIGN KEY (`entry_uuid`) REFERENCES `telescope_entries` (`uuid`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;