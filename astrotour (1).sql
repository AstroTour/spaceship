-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2025. Ápr 29. 15:27
-- Kiszolgáló verziója: 10.4.32-MariaDB
-- PHP verzió: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `astrotour`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `avatars`
--

CREATE TABLE `avatars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `avatars`
--

INSERT INTO `avatars` (`id`, `image`, `created_at`, `updated_at`) VALUES
(1, 'avatar/person.jpg', '2025-04-25 14:16:32', '2025-04-25 14:16:32'),
(2, 'avatar/wolf.jpg', '2025-04-25 14:16:32', '2025-04-25 14:16:32'),
(3, 'avatar/driver.jpg', '2025-04-25 14:16:32', '2025-04-25 14:16:32'),
(4, 'avatar/ironman.jpg', '2025-04-25 14:16:32', '2025-04-25 14:16:32'),
(5, 'avatar/deadpool.jpg', '2025-04-25 14:16:32', '2025-04-25 14:16:32'),
(6, 'avatar/ufo.jpg', '2025-04-25 14:16:32', '2025-04-25 14:16:32'),
(7, 'avatar/seal.jpg', '2025-04-25 14:16:32', '2025-04-25 14:16:32');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `failed_jobs`
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
-- Tábla szerkezet ehhez a táblához `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` text NOT NULL,
  `answer` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`, `created_at`, `updated_at`) VALUES
(1, 'Hogyan működik egy űrhajó?', 'Az űrhajók működése az űrutazás során használt rakétatechnológián alapul. A rakéták motorjai rendkívül nagy sebességet adnak a járműnek, hogy átlépjék a Föld légkörét. Az űrhajók hajtóművei különböző üzemanyagokat használnak, hogy mozgásban tartsák az eszközt az űrben, miközben az égitestek közötti távolságokat is áthidalják.', '2025-04-25 14:16:34', '2025-04-25 14:16:34'),
(2, 'Mi az űrturizmus?', 'Az űrturizmus az a tevékenység, amikor civilek, tehát nem űrhajósok, elutazhatnak a világűrbe, hogy élvezhessék az űrélményt. A legnépszerűbb cégek, mint a SpaceX, Blue Origin és Virgin Galactic, már fejlesztenek olyan programokat, amelyek lehetővé teszik az emberek számára, hogy egy rövid időre az űrbe utazzanak, és megtapasztalják a súlytalanságot, valamint lenézhessenek a Földre.', '2025-04-25 14:16:34', '2025-04-25 14:16:34'),
(3, 'Mennyire biztonságos az űrutazás?', 'Az űrutazás rendkívül biztonságos, mivel minden űrhajónk a legszigorúbb biztonsági előírásoknak megfelel, és folyamatosan karbantartott. Minden utazást magasan képzett személyzet irányít. Az utasaink biztonsága az első számú prioritás.', '2025-04-25 14:16:34', '2025-04-25 14:16:34'),
(4, 'Miért válasszam az alkalmazásunkat más űrutazós szolgáltatók helyett?', 'Mi a legmodernebb űrhajókkal és a legbiztonságosabb utazási protokollokkal dolgozunk. A szolgáltatásunk egyszerűsíti az utazási élményt, gyors foglalást és könnyű hozzáférést biztosít a legfrissebb menetrendekhez. Emellett folyamatosan figyelünk a környezetvédelmi szempontokra is.', '2025-04-25 14:16:34', '2025-04-25 14:16:34'),
(5, 'Mit tartalmaz a felkészítő lecke?', 'A felkészítő lecke célja, hogy felkészítsen a bolygók közötti utazásra. A lecke áttekintést ad a fontos tudnivalókról, mint például a térbeli tájékozódás, az űrhajó fedélzeti rendszerei, a biztonsági protokollok, és az alapvető kommunikációs szabályok.', '2025-04-25 14:16:34', '2025-04-25 14:16:34'),
(6, 'Milyen időtartamúak az utazások?', 'Az utazás időtartama a választott bolygó távolságától függ. Az időtartamot a menetrendben feltüntetjük, és valós idejű frissítéseket is biztosítunk az esetleges változások esetén.', '2025-04-25 14:16:34', '2025-04-25 14:16:34'),
(7, 'Hogyan készülhetek fel az eltérő gravitációra a bolygókon?', 'Az alkalmazás felkészítő leckéje tartalmaz információkat a különböző gravitációs viszonyokhoz való alkalmazkodásról, és a legfontosabb tudnivalókról. Emellett a fedélzeten speciális edzésprogramok is rendelkezésre állnak.', '2025-04-25 14:16:34', '2025-04-25 14:16:34');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `flights`
--

CREATE TABLE `flights` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `flight_number` varchar(10) NOT NULL,
  `to_time` varchar(255) DEFAULT NULL,
  `from_time` varchar(255) DEFAULT NULL,
  `departure_spaceport_id` bigint(20) UNSIGNED NOT NULL,
  `destination_spaceport_id` bigint(20) UNSIGNED NOT NULL,
  `spaceship_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `flights`
--

INSERT INTO `flights` (`id`, `flight_number`, `to_time`, `from_time`, `departure_spaceport_id`, `destination_spaceport_id`, `spaceship_id`, `created_at`, `updated_at`) VALUES
(1, 'AD154', '~7 hónap', '~7 hónap', 3, 4, 2, '2025-04-25 14:16:34', '2025-04-25 14:16:34'),
(2, 'GH191', '~8,5 év', '~8,5 év', 3, 7, 5, '2025-04-25 14:16:34', '2025-04-25 14:16:34'),
(3, 'EX202', '~6 év', '~6 év', 3, 5, 6, '2025-04-25 14:16:34', '2025-04-25 14:16:34'),
(4, 'CI225', '~6,5 év', '~6,5 év', 3, 1, 6, '2025-04-25 14:16:34', '2025-04-25 14:16:34'),
(5, 'MA203', '~12 év', '~12 év', 3, 8, 5, '2025-04-25 14:16:34', '2025-04-25 14:16:34'),
(6, 'TT211', '~15 hónap', '~15 hónap', 3, 2, 1, '2025-04-25 14:16:34', '2025-04-25 14:16:34'),
(7, 'KK161', '~7 év', '~7 év', 3, 6, 4, '2025-04-25 14:16:34', '2025-04-25 14:16:34');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `img` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `galleries`
--

INSERT INTO `galleries` (`id`, `img`, `created_at`, `updated_at`) VALUES
(1, 'gallery/astro1.jpg', '2025-04-25 14:16:34', '2025-04-25 14:16:34'),
(2, 'gallery/astro2.jpg', '2025-04-25 14:16:34', '2025-04-25 14:16:34'),
(3, 'gallery/astro3.jpg', '2025-04-25 14:16:34', '2025-04-25 14:16:34'),
(4, 'gallery/astro4.jpg', '2025-04-25 14:16:34', '2025-04-25 14:16:34'),
(5, 'gallery/astro5.jpg', '2025-04-25 14:16:34', '2025-04-25 14:16:34'),
(6, 'gallery/astro6.jpg', '2025-04-25 14:16:34', '2025-04-25 14:16:34'),
(7, 'gallery/astro7.png', '2025-04-25 14:16:34', '2025-04-25 14:16:34'),
(8, 'gallery/astro8.png', '2025-04-25 14:16:34', '2025-04-25 14:16:34'),
(9, 'gallery/astro9.png', '2025-04-25 14:16:34', '2025-04-25 14:16:34'),
(10, 'gallery/astro10.png', '2025-04-25 14:16:34', '2025-04-25 14:16:34'),
(11, 'gallery/astro11.png', '2025-04-25 14:16:34', '2025-04-25 14:16:34'),
(12, 'gallery/astro12.jpg', '2025-04-25 14:16:34', '2025-04-25 14:16:34'),
(13, 'gallery/astro13.jpg', '2025-04-25 14:16:34', '2025-04-25 14:16:34'),
(14, 'gallery/astro14.jpg', '2025-04-25 14:16:34', '2025-04-25 14:16:34'),
(15, 'gallery/astro15.png', '2025-04-25 14:16:34', '2025-04-25 14:16:34'),
(16, 'gallery/astro16.png', '2025-04-25 14:16:34', '2025-04-25 14:16:34'),
(17, 'gallery/astro17.png', '2025-04-25 14:16:34', '2025-04-25 14:16:34'),
(18, 'gallery/astro18.png', '2025-04-25 14:16:34', '2025-04-25 14:16:34');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_00_000000_create_avatars_table', 1),
(2, '0001_01_01_000000_create_users_table', 1),
(3, '0001_01_01_000001_create_cache_table', 1),
(4, '0001_01_01_000002_create_jobs_table', 1),
(5, '2024_10_10_133042_create_spaceships_table', 1),
(6, '2024_10_10_134601_create_spaceship_seats_table', 1),
(7, '2024_10_10_135552_create_planets_table', 1),
(8, '2024_10_10_135559_create_spaceports_table', 1),
(9, '2024_10_10_135638_create_flights_table', 1),
(10, '2024_10_10_140623_create_schedules_table', 1),
(11, '2024_10_10_140624_create_reservations_table', 1),
(12, '2024_10_11_094905_create_faqs_table', 1),
(13, '2024_10_11_094906_create_prospectuses_table', 1),
(14, '2025_01_16_093406_create_personal_access_tokens_table', 1),
(15, '2025_02_14_093834_condition_schedule_trigger', 1),
(16, '2025_03_20_144102_create_galleries_table', 1);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `personal_access_tokens`
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

--
-- A tábla adatainak kiíratása `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'auth_token', '0ef7cfa84bebbf0dab8d2ab01d1b74e896e70acb3d914f8cc63bc0b5ff714c99', '[\"*\"]', NULL, NULL, '2025-04-25 14:23:12', '2025-04-25 14:23:12'),
(2, 'App\\Models\\User', 1, 'auth_token', '08c6ba2f4d827e8f09d3e8cda63037fc8b6a3a1d759ee87b0da517bab12faa07', '[\"*\"]', '2025-04-25 14:47:40', NULL, '2025-04-25 14:40:54', '2025-04-25 14:47:40');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `planets`
--

CREATE TABLE `planets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `information` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `planets`
--

INSERT INTO `planets` (`id`, `name`, `information`, `created_at`, `updated_at`) VALUES
(1, 'Merkúr', 'A római szerelem és szépség istennőjéről van elnevezve. Az ókori időkben Vénuszt gyakran két különböző csillagnak tartották, az esti csillagnak és a reggeli csillagnak.', '2025-04-25 14:16:34', '2025-04-25 14:16:34'),
(2, 'Vénusz', 'A Naphoz legközelebbi bolygó. Gyorsabban kerüli meg a Napot, mint az összes többi bolygó, ezért nevezték el a rómaiak a gyors lábú hírnök istenükről.', '2025-04-25 14:16:34', '2025-04-25 14:16:34'),
(3, 'Föld', 'Föld, otthonunk. Ez az egyetlen bolygó, amelyről ismert, hogy légköre szabad oxigént tartalmaz, folyékony víz óceánjai találhatók a felszínén, és természetesen élet is létezik rajta.', '2025-04-25 14:16:34', '2025-04-25 14:16:34'),
(4, 'Mars', 'A Naphoz negyedik bolygó és a második legkisebb bolygó a Naprendszerben. A római háború istenéről van elnevezve, amelyet gyakran „Vörös Bolygóként” emlegetnek.', '2025-04-25 14:16:34', '2025-04-25 14:16:34'),
(5, 'Jupiter', 'A Jupiter a legnagyobb bolygó a Naprendszerben. Illően a római mitológia istenek királyáról nevezték el.', '2025-04-25 14:16:34', '2025-04-25 14:16:34'),
(6, 'Szaturnusz', 'A Szaturnusz a Naphoz hatodik bolygó és a második legnagyobb bolygó a Naprendszerben. A Szaturnusz a római neve Cronusnak, a Titánok urának.', '2025-04-25 14:16:34', '2025-04-25 14:16:34'),
(7, 'Uránusz', 'Az első bolygó, amelyet a tudósok felfedeztek. A bolygó különleges a drámai dőlésszöge miatt, amelynek következtében tengelye szinte közvetlenül a Nap felé mutat.', '2025-04-25 14:16:34', '2025-04-25 14:16:34'),
(8, 'Neptunusz', 'A Neptunusz a Naprendszer nyolcadik bolygója, és a legmesszebb eső gázóriás. Jellemzője a jellegzetes kék szín, amelyet a metán jelenléte ad, és erős szelei, amelyek a leggyorsabbak a bolygók között.', '2025-04-25 14:16:34', '2025-04-25 14:16:34'),
(9, 'Pluto', 'A Plútó, amelyet egykor a Naprendszer kilencedik és legmesszebb eső bolygójának tartottak, ma a legnagyobb ismert törpebolygó a Naprendszerben.', '2025-04-25 14:16:34', '2025-04-25 14:16:34');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `prospectuses`
--

CREATE TABLE `prospectuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `information` text NOT NULL,
  `picture` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `prospectuses`
--

INSERT INTO `prospectuses` (`id`, `title`, `information`, `picture`, `created_at`, `updated_at`) VALUES
(1, 'Biztonsági előírások az űrutazás során', 'Az űrutazás speciális biztonsági intézkedéseket igényel. Súlytalanságban másképp működik a mozgás, ezért kiképzés szükséges. Vészhelyzeti protokollok biztosítják az utasok épségét tűz, meghibásodás vagy nyomáscsökkenés esetén. Űrruhák védenek a szélsőséges körülményektől és biztosítják az oxigénellátást.', 'pictures/safety.jfif', '2025-04-25 14:16:34', '2025-04-25 14:16:34'),
(2, 'Felkészítés az űrutazásra', 'Az utazás előtt fizikai és mentális felkészítés szükséges. Egészségügyi vizsgálatok ellenőrzik a szív- és érrendszert, valamint a súlytalanságra való érzékenységet. Parabolarepülések és szimulációk segítenek alkalmazkodni a gravitációmentes környezethez. Navigációs tréning biztosítja a fedélzeti rendszerek alapszintű ismeretét.', 'pictures/preparatory.jfif', '2025-04-25 14:16:34', '2025-04-25 14:16:34'),
(3, 'Mentőkabin és vészhelyzeti eljárások', 'Az űrhajók mentőkabinokkal rendelkeznek vészhelyzet esetére. Ezek önállóan működnek és elegendő oxigént, élelmet, valamint kommunikációs eszközöket biztosítanak. Evakuálási protokollok irányítják az utasokat vészhelyzet esetén, a mentőkabinok pedig automatikusan visszatérhetnek a Földre.', 'pictures/cabin.jfif', '2025-04-25 14:16:34', '2025-04-25 14:16:34'),
(4, 'Higiénia és egészségmegőrzés', 'A világűrben nincs folyóvíz, ezért nedves törlőkendők, szárazsampon és speciális higiéniai eszközök használatosak. Az űrételek fagyasztva szárítottak, és víz hozzáadásával fogyaszthatók. Orvosi felszerelések és távoli konzultációk biztosítják a sürgősségi ellátást.', 'pictures/hygiene.jfif', '2025-04-25 14:16:34', '2025-04-25 14:16:34'),
(5, 'Kommunikáció és kapcsolat a Földdel', 'Az űrhajósok rádióhullámokon keresztül tartják a kapcsolatot az irányítóközponttal, de a nagy távolság miatt késleltetéssel. Internet és videóhívás elérhető a Nemzetközi Űrállomáson. Az űrhajósok rendszeresen kapcsolatba léphetnek családtagjaikkal a mentális egészségük megőrzése érdekében.', 'pictures/communication.jfif', '2025-04-25 14:16:34', '2025-04-25 14:16:34'),
(6, 'Fenntarthatóság és űrkörnyezetvédelem', 'Az űrhulladék veszélyezteti a jövőbeli küldetéseket, ezért újrahasznosítási technológiák segítik a csökkentését. Az új generációs űrhajók újrafelhasználható anyagokból készülnek. Zárt rendszerű életfenntartó rendszerek biztosítják a víz és oxigén újrahasznosítását.', 'pictures/sustainability.jfif', '2025-04-25 14:16:34', '2025-04-25 14:16:34');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `reservations`
--

CREATE TABLE `reservations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `schedule_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `seat` tinyint(1) NOT NULL DEFAULT 0,
  `ticket_type` varchar(255) NOT NULL DEFAULT 'basic',
  `total` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `reservations`
--

INSERT INTO `reservations` (`id`, `schedule_id`, `user_id`, `seat`, `ticket_type`, `total`, `created_at`, `updated_at`) VALUES
(1, 5, 1, 1, 'VIP', 15000000, '2025-04-25 14:44:25', '2025-04-25 14:44:25'),
(2, 2, 1, 1, 'Basic', 15000000, '2025-04-25 14:44:33', '2025-04-25 14:44:33'),
(3, 4, 1, 0, 'VIP', 205000000, '2025-04-25 14:44:46', '2025-04-25 14:44:46');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `schedules`
--

CREATE TABLE `schedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `departure_time` datetime NOT NULL,
  `arrival_time` datetime NOT NULL,
  `goes_back` datetime NOT NULL,
  `comes_back` datetime NOT NULL,
  `flights_id` bigint(20) UNSIGNED NOT NULL,
  `condition` varchar(255) NOT NULL DEFAULT 'várakozik',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `schedules`
--

INSERT INTO `schedules` (`id`, `departure_time`, `arrival_time`, `goes_back`, `comes_back`, `flights_id`, `condition`, `created_at`, `updated_at`) VALUES
(1, '2025-04-27 18:24:00', '2025-04-30 18:24:00', '2025-05-02 18:24:00', '2025-05-05 18:24:00', 5, 'várakozik', '2025-04-25 14:25:15', '2025-04-25 14:25:15'),
(2, '2025-06-11 18:25:00', '2025-07-10 18:25:00', '2025-08-19 18:25:00', '2025-09-04 18:26:00', 1, 'várakozik', '2025-04-25 14:26:55', '2025-04-25 14:26:55'),
(3, '2025-04-29 18:27:00', '2025-05-03 18:27:00', '2025-05-07 18:27:00', '2025-05-09 18:27:00', 6, 'várakozik', '2025-04-25 14:28:06', '2025-04-25 14:28:06'),
(4, '2025-05-13 18:28:00', '2025-05-30 18:28:00', '2025-06-04 18:28:00', '2025-06-25 18:28:00', 5, 'várakozik', '2025-04-25 14:28:56', '2025-04-25 14:28:56'),
(5, '2025-05-03 18:28:00', '2025-05-06 18:29:00', '2025-05-16 18:29:00', '2025-05-22 18:29:00', 6, 'várakozik', '2025-04-25 14:29:16', '2025-04-25 14:29:16');

--
-- Eseményindítók `schedules`
--
DELIMITER $$
CREATE TRIGGER `update_schedule_condition` BEFORE UPDATE ON `schedules` FOR EACH ROW BEGIN
                IF NEW.`departure_time` <= NOW() THEN
                    SET NEW.`condition` = "utazik";
                END IF;
            END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `spaceports`
--

CREATE TABLE `spaceports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `planet_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `spaceports`
--

INSERT INTO `spaceports` (`id`, `name`, `planet_id`, `created_at`, `updated_at`) VALUES
(1, 'Nyx', 1, '2025-04-25 14:16:34', '2025-04-25 14:16:34'),
(2, 'Helios', 2, '2025-04-25 14:16:34', '2025-04-25 14:16:34'),
(3, 'Orion', 3, '2025-04-25 14:16:34', '2025-04-25 14:16:34'),
(4, 'Red Horizon', 4, '2025-04-25 14:16:34', '2025-04-25 14:16:34'),
(5, 'Orbital', 5, '2025-04-25 14:16:34', '2025-04-25 14:16:34'),
(6, 'Ring Haven', 6, '2025-04-25 14:16:34', '2025-04-25 14:16:34'),
(7, 'Ring Gate', 7, '2025-04-25 14:16:34', '2025-04-25 14:16:34'),
(8, 'Photon', 8, '2025-04-25 14:16:34', '2025-04-25 14:16:34'),
(9, 'Abyssal', 9, '2025-04-25 14:16:34', '2025-04-25 14:16:34');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `spaceships`
--

CREATE TABLE `spaceships` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `information` text NOT NULL,
  `capacity` smallint(5) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `spaceships`
--

INSERT INTO `spaceships` (`id`, `name`, `information`, `capacity`, `created_at`, `updated_at`) VALUES
(1, 'Odyssey', 'Az Odyssey egy hosszú távú űrutazásokra tervezett hajó, amely egyszerre szolgál kutatásra és emberi kolonizációra. Az űrhajó külseje futurisztikus, és az aerodinamikai tervezés figyelembe veszi a bolygók közötti gyors mozgást. A hajó testét különleges titánium-kerámia ötvözet borítja, amely képes ellenállni a meteoritokkal való ütközésnek. Az Odyssey belső terét úgy alakították ki, hogy a legénység számára ne csak technikai, hanem pszichológiai szempontból is kényelmes legyen. A színek világosak és nyugodtak, a szellőzés és a mesterséges fények folyamatosan fenntartják az ideális hangulatot. Az automatikus rendszer a fedélzeten minden lépést felügyel, az emberi beavatkozás minimálisra csökkenthető.', 10, '2025-04-25 14:16:33', '2025-04-25 14:16:33'),
(2, 'Origin', 'Az Origin egy igazi technológiai mestermű, amely egyesíti a gyorsaságot és a hatékonyságot. A hajó kompakt, de maximálisan funkcionalista: minden egyes négyzetméterét kioptimálizálták a hosszú távú utazásokhoz. Az Origin egyik legnagyobb újítása az újrahasznosító víz- és oxigénrendszer, amely lehetővé teszi a legénység számára, hogy akár évekig is önállóan működjön a bolygók közötti térben. A kabinok minimalista stílust követnek, de minden egyes kényelmet biztosítanak a legénység számára, hogy a küldetés zökkenőmentesen haladhasson. Az Origin minden részlete a hatékonyságot és a fenntarthatóságot célozza meg.', 12, '2025-04-25 14:16:33', '2025-04-25 14:16:33'),
(3, 'Nova', 'A Nova egy éjszakai égbolt alatt ragyogó csillaghoz hasonlítható űrhajó, amely a legújabb fénysebességű hajtóművekkel van felszerelve. Az űrhajó külseje fekete és ezüst színben pompázik, és olyan anyagokból készült, amelyek képesek elnyelni a csillagfény visszaverődését. Kisebb kapacitású, de az erőforrásait maximálisan kihasználva képes az adott küldetésekre gyorsan és hatékonyan elérni a célpontokat. Az űrhajó belseje futurisztikus, a falak áttetszőek, így a legénység tagjai szinte folyamatosan kapcsolatban állhatnak az univerzummal, miközben végzik feladataikat. Az energiaellátás megújuló forrásokra épül, ami csökkenti az üzemeltetési költségeket.', 9, '2025-04-25 14:16:33', '2025-04-25 14:16:33'),
(4, 'Chronos', 'A Chronos a legnagyobb és legimpozánsabb űrhajó a flottában. Külsőleg masszív, szinte ősi erőt sugároz, mintha egy időutazó hajó lenne, amely a múltból jött. A hajó belsejében luxus és praktikum egyesül, a legénység számára olyan teret biztosít, mintha egy mobil kutatóközpont lenne. A fedélzeten egy hatalmas, üvegkupola található, amelyből a csillagok és bolygók látványa nyújt pihenést a hosszú utazások során. A Chronos az idő fogalmát is újraértelmezi, és rendkívül precíziós navigációs rendszerei képesek minimalizálni az időeltolódásokat a távoli bolygók közötti utazások során.', 12, '2025-04-25 14:16:33', '2025-04-25 14:16:33'),
(5, 'Phantom', 'A Phantom egy titkos küldetésekhez kifejlesztett űrhajó, amelyet kifejezetten az észlelhetetlenségre terveztek. Külső megjelenését a legújabb rejtett technológiák és álcázó rendszerek formálják, így a hajó szinte teljesen láthatatlan a hagyományos radarok számára. A belső tér sötét, matt fémfelületek uralják, hogy a legénység ne vonja magára a figyelmet a hosszú küldetések során. A Phantom egyedülállóan képes elérni azokat a helyeket, ahová más űrhajók nem merészkednek, és a legbonyolultabb feladatokat is végrehajtja, mindeközben elkerülve a legnagyobb veszélyeket.', 10, '2025-04-25 14:16:33', '2025-04-25 14:16:33'),
(6, 'Spectra', 'A Spectra egy elegáns, rendkívül precíziós eszközként van megalkotva. Külső dizájnja áramvonalas, sima vonalakkal, amelyek szinte úszni látszanak az űrben. A hajó színvilága csillogó ezüst és metálkék árnyalatokban játszik, tükrözve a csillagok fényét. A belső tér nyugodt és jól felszerelt, a legénység tagjai minden kényelmet élvezhetnek a folyamatos kutatás és laboratóriumi munkák közben. A Spectra a legújabb érzékelő- és kommunikációs rendszerekkel van felszerelve, amelyek a legkisebb változásokat is észlelik az univerzumban, így folyamatosan biztosítja a legpontosabb adatokat a küldetések során.', 15, '2025-04-25 14:16:33', '2025-04-25 14:16:33');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `spaceship_seats`
--

CREATE TABLE `spaceship_seats` (
  `seat_name` varchar(255) NOT NULL,
  `spaceship_id` bigint(20) UNSIGNED NOT NULL,
  `at_window` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `spaceship_seats`
--

INSERT INTO `spaceship_seats` (`seat_name`, `spaceship_id`, `at_window`, `created_at`, `updated_at`) VALUES
('1A', 1, 1, '2025-04-25 14:16:33', '2025-04-25 14:16:33'),
('1A', 2, 1, '2025-04-25 14:16:33', '2025-04-25 14:16:33'),
('1A', 3, 1, '2025-04-25 14:16:33', '2025-04-25 14:16:33'),
('1A', 4, 1, '2025-04-25 14:16:33', '2025-04-25 14:16:33'),
('1A', 5, 1, '2025-04-25 14:16:33', '2025-04-25 14:16:33'),
('1A', 6, 1, '2025-04-25 14:16:34', '2025-04-25 14:16:34'),
('1B', 1, 0, '2025-04-25 14:16:33', '2025-04-25 14:16:33'),
('1B', 2, 0, '2025-04-25 14:16:33', '2025-04-25 14:16:33'),
('1B', 3, 0, '2025-04-25 14:16:33', '2025-04-25 14:16:33'),
('1B', 4, 0, '2025-04-25 14:16:33', '2025-04-25 14:16:33'),
('1B', 5, 0, '2025-04-25 14:16:33', '2025-04-25 14:16:33'),
('1B', 6, 0, '2025-04-25 14:16:34', '2025-04-25 14:16:34'),
('1C', 1, 0, '2025-04-25 14:16:33', '2025-04-25 14:16:33'),
('1C', 2, 0, '2025-04-25 14:16:33', '2025-04-25 14:16:33'),
('1C', 3, 0, '2025-04-25 14:16:33', '2025-04-25 14:16:33'),
('1C', 4, 0, '2025-04-25 14:16:33', '2025-04-25 14:16:33'),
('1C', 5, 0, '2025-04-25 14:16:34', '2025-04-25 14:16:34'),
('1C', 6, 0, '2025-04-25 14:16:34', '2025-04-25 14:16:34'),
('1D', 1, 0, '2025-04-25 14:16:33', '2025-04-25 14:16:33'),
('1D', 2, 0, '2025-04-25 14:16:33', '2025-04-25 14:16:33'),
('1D', 3, 0, '2025-04-25 14:16:33', '2025-04-25 14:16:33'),
('1D', 4, 0, '2025-04-25 14:16:33', '2025-04-25 14:16:33'),
('1D', 5, 0, '2025-04-25 14:16:34', '2025-04-25 14:16:34'),
('1D', 6, 0, '2025-04-25 14:16:34', '2025-04-25 14:16:34'),
('2A', 1, 1, '2025-04-25 14:16:33', '2025-04-25 14:16:33'),
('2A', 2, 1, '2025-04-25 14:16:33', '2025-04-25 14:16:33'),
('2A', 3, 1, '2025-04-25 14:16:33', '2025-04-25 14:16:33'),
('2A', 4, 1, '2025-04-25 14:16:33', '2025-04-25 14:16:33'),
('2A', 5, 1, '2025-04-25 14:16:34', '2025-04-25 14:16:34'),
('2A', 6, 1, '2025-04-25 14:16:34', '2025-04-25 14:16:34'),
('2B', 1, 0, '2025-04-25 14:16:33', '2025-04-25 14:16:33'),
('2B', 2, 0, '2025-04-25 14:16:33', '2025-04-25 14:16:33'),
('2B', 3, 0, '2025-04-25 14:16:33', '2025-04-25 14:16:33'),
('2B', 4, 0, '2025-04-25 14:16:33', '2025-04-25 14:16:33'),
('2B', 5, 0, '2025-04-25 14:16:34', '2025-04-25 14:16:34'),
('2B', 6, 0, '2025-04-25 14:16:34', '2025-04-25 14:16:34'),
('2C', 1, 0, '2025-04-25 14:16:33', '2025-04-25 14:16:33'),
('2C', 2, 0, '2025-04-25 14:16:33', '2025-04-25 14:16:33'),
('2C', 3, 0, '2025-04-25 14:16:33', '2025-04-25 14:16:33'),
('2C', 4, 0, '2025-04-25 14:16:33', '2025-04-25 14:16:33'),
('2C', 5, 0, '2025-04-25 14:16:34', '2025-04-25 14:16:34'),
('2C', 6, 0, '2025-04-25 14:16:34', '2025-04-25 14:16:34'),
('2D', 1, 0, '2025-04-25 14:16:33', '2025-04-25 14:16:33'),
('2D', 2, 0, '2025-04-25 14:16:33', '2025-04-25 14:16:33'),
('2D', 3, 0, '2025-04-25 14:16:33', '2025-04-25 14:16:33'),
('2D', 4, 0, '2025-04-25 14:16:33', '2025-04-25 14:16:33'),
('2D', 5, 0, '2025-04-25 14:16:34', '2025-04-25 14:16:34'),
('2D', 6, 0, '2025-04-25 14:16:34', '2025-04-25 14:16:34'),
('3A', 1, 1, '2025-04-25 14:16:33', '2025-04-25 14:16:33'),
('3A', 2, 1, '2025-04-25 14:16:33', '2025-04-25 14:16:33'),
('3A', 3, 1, '2025-04-25 14:16:33', '2025-04-25 14:16:33'),
('3A', 4, 1, '2025-04-25 14:16:33', '2025-04-25 14:16:33'),
('3A', 5, 1, '2025-04-25 14:16:34', '2025-04-25 14:16:34'),
('3A', 6, 1, '2025-04-25 14:16:34', '2025-04-25 14:16:34'),
('3B', 1, 0, '2025-04-25 14:16:33', '2025-04-25 14:16:33'),
('3B', 2, 0, '2025-04-25 14:16:33', '2025-04-25 14:16:33'),
('3B', 4, 0, '2025-04-25 14:16:33', '2025-04-25 14:16:33'),
('3B', 5, 0, '2025-04-25 14:16:34', '2025-04-25 14:16:34'),
('3B', 6, 0, '2025-04-25 14:16:34', '2025-04-25 14:16:34'),
('3C', 2, 0, '2025-04-25 14:16:33', '2025-04-25 14:16:33'),
('3C', 4, 0, '2025-04-25 14:16:33', '2025-04-25 14:16:33'),
('3C', 6, 0, '2025-04-25 14:16:34', '2025-04-25 14:16:34'),
('3D', 2, 0, '2025-04-25 14:16:33', '2025-04-25 14:16:33'),
('3D', 4, 0, '2025-04-25 14:16:33', '2025-04-25 14:16:33'),
('3D', 6, 0, '2025-04-25 14:16:34', '2025-04-25 14:16:34'),
('4A', 6, 1, '2025-04-25 14:16:34', '2025-04-25 14:16:34'),
('4B', 6, 0, '2025-04-25 14:16:34', '2025-04-25 14:16:34'),
('4C', 6, 0, '2025-04-25 14:16:34', '2025-04-25 14:16:34');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `avatar_id` bigint(20) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `email_verified_at`, `password`, `role`, `avatar_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Kovács István', 'istik@gmail.com', NULL, '$2y$12$CeSBY6U5VPkQv3Q/JaQCbOlfhl9/HDOWFPsKDpmCYe5kTzi8DVWqy', 'admin', 4, NULL, '2025-04-25 14:16:32', '2025-04-25 14:44:13'),
(2, 'Lukács Alexandra', 'szendy@gmail.com', NULL, '$2y$12$ZgHreQY83VVg.cuWYZom6eKZ79NQok73sbSGh/o45IxtJB.tnHDf6', 'admin', NULL, NULL, '2025-04-25 14:16:33', '2025-04-25 14:16:33'),
(3, 'testuser', 'testuser@gmail.com', NULL, '$2y$12$p3iruDR2jg2xclpArm.FwecHTialViPVnNxVHGOBD.OOMFZ02hhgq', 'user', NULL, NULL, '2025-04-25 14:16:33', '2025-04-25 14:16:33'),
(4, 'Pfiffer Attila', 'asd@gmail.com', NULL, '$2y$12$H2LO0PtG77.9eFNWifWAyexHaAL/Ml8OS3wd96euRpLBtJwUpHKD6', 'admin', NULL, NULL, '2025-04-25 14:16:33', '2025-04-25 14:16:33'),
(5, 'Tóth András', 'totya@gmail.com', NULL, '$2y$12$7YerJo8GjwC1LlSbGuULoutJegDOWiwbb24kOOtIp/Er7aORWiQl2', 'user', NULL, NULL, '2025-04-25 14:16:33', '2025-04-25 14:16:33'),
(6, 'TestSAdmin', 'testsadmin@gmail.com', NULL, '$2y$12$TWqB3LwUMIQbKf.NDWu/cOFyvp2hJss7VMHclc.PvDoEiqRvYI1V2', 'super-admin', NULL, NULL, '2025-04-25 14:16:33', '2025-04-25 14:16:33');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `avatars`
--
ALTER TABLE `avatars`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- A tábla indexei `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- A tábla indexei `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- A tábla indexei `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `flights`
--
ALTER TABLE `flights`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_departure_spaceport` (`departure_spaceport_id`),
  ADD KEY `fk_destination_spaceport` (`destination_spaceport_id`),
  ADD KEY `flights_spaceship_id_foreign` (`spaceship_id`);

--
-- A tábla indexei `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- A tábla indexei `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- A tábla indexei `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- A tábla indexei `planets`
--
ALTER TABLE `planets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `planets_name_unique` (`name`);

--
-- A tábla indexei `prospectuses`
--
ALTER TABLE `prospectuses`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reservations_schedule_id_foreign` (`schedule_id`),
  ADD KEY `reservations_user_id_foreign` (`user_id`);

--
-- A tábla indexei `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `schedules_flights_id_foreign` (`flights_id`);

--
-- A tábla indexei `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- A tábla indexei `spaceports`
--
ALTER TABLE `spaceports`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `spaceports_name_unique` (`name`),
  ADD KEY `spaceports_planet_id_foreign` (`planet_id`);

--
-- A tábla indexei `spaceships`
--
ALTER TABLE `spaceships`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `spaceships_name_unique` (`name`);

--
-- A tábla indexei `spaceship_seats`
--
ALTER TABLE `spaceship_seats`
  ADD PRIMARY KEY (`seat_name`,`spaceship_id`),
  ADD KEY `spaceship_seats_spaceship_id_foreign` (`spaceship_id`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_avatar_id_foreign` (`avatar_id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `avatars`
--
ALTER TABLE `avatars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT a táblához `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT a táblához `flights`
--
ALTER TABLE `flights`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT a táblához `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT a táblához `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT a táblához `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT a táblához `planets`
--
ALTER TABLE `planets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT a táblához `prospectuses`
--
ALTER TABLE `prospectuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT a táblához `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT a táblához `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT a táblához `spaceports`
--
ALTER TABLE `spaceports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT a táblához `spaceships`
--
ALTER TABLE `spaceships`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `flights`
--
ALTER TABLE `flights`
  ADD CONSTRAINT `fk_departure_spaceport` FOREIGN KEY (`departure_spaceport_id`) REFERENCES `spaceports` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_destination_spaceport` FOREIGN KEY (`destination_spaceport_id`) REFERENCES `spaceports` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `flights_spaceship_id_foreign` FOREIGN KEY (`spaceship_id`) REFERENCES `spaceships` (`id`) ON DELETE CASCADE;

--
-- Megkötések a táblához `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_schedule_id_foreign` FOREIGN KEY (`schedule_id`) REFERENCES `schedules` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Megkötések a táblához `schedules`
--
ALTER TABLE `schedules`
  ADD CONSTRAINT `schedules_flights_id_foreign` FOREIGN KEY (`flights_id`) REFERENCES `flights` (`id`);

--
-- Megkötések a táblához `spaceports`
--
ALTER TABLE `spaceports`
  ADD CONSTRAINT `spaceports_planet_id_foreign` FOREIGN KEY (`planet_id`) REFERENCES `planets` (`id`);

--
-- Megkötések a táblához `spaceship_seats`
--
ALTER TABLE `spaceship_seats`
  ADD CONSTRAINT `spaceship_seats_spaceship_id_foreign` FOREIGN KEY (`spaceship_id`) REFERENCES `spaceships` (`id`) ON DELETE CASCADE;

--
-- Megkötések a táblához `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_avatar_id_foreign` FOREIGN KEY (`avatar_id`) REFERENCES `avatars` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
