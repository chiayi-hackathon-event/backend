-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 16, 2017 at 01:18 PM
-- Server version: 5.7.18-0ubuntu0.16.04.1-log
-- PHP Version: 7.0.18-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `opendata`
--

-- --------------------------------------------------------

--
-- Table structure for table `green_store`
--

CREATE TABLE `green_store` (
  `place_id` varchar(100) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text,
  `location` varchar(50) DEFAULT NULL,
  `lat` float(10,6) DEFAULT '0.000000',
  `lng` float(10,6) DEFAULT '0.000000',
  `lat_lng` point DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `official_url` varchar(255) DEFAULT NULL,
  `map_url` varchar(255) DEFAULT NULL,
  `office_hours` varchar(255) DEFAULT NULL,
  `promo` varchar(255) DEFAULT NULL,
  `image_1` varchar(255) DEFAULT NULL,
  `image_2` varchar(255) DEFAULT NULL,
  `image_3` varchar(255) DEFAULT NULL,
  `tag` varchar(255) DEFAULT NULL,
  `create_timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ;

--
-- Dumping data for table `green_store`
--

INSERT INTO `green_store` (`place_id`, `title`, `description`, `location`, `lat`, `lng`, `lat_lng`, `address`, `phone`, `official_url`, `map_url`, `office_hours`, `promo`, `image_1`, `image_2`, `image_3`, `tag`, `create_timestamp`) VALUES
('ChIJ-ezlWGvDbjQReT0wLcIMwYM', '阿喜紫藤民宿', NULL, '嘉義縣', 23.542210, 120.680542, NULL, '嘉義縣梅山鄉瑞里村10號', '05-2501575', NULL, NULL, NULL, NULL, 'https://lh3.googleusercontent.com/p/AF1QipNuXxPPtqNxtc0XnHgVC6D_z-GgyBUyp7TIHh3H=s1600-h500', 'https://lh3.googleusercontent.com/p/AF1QipNxqtdDVgm7C4iV-fiAJDQbmT2azq4zNXhdntKx=s1600-h500', 'https://lh3.googleusercontent.com/p/AF1QipOjOz1hi9SqNr-afQhC5hotn-wHrX3oGlblmmSA=s1600-h500', '環保旅店', '2017-07-16 12:23:13'),
('ChIJ01WxeXfDbjQRw3PA1vLLXmo', '瑞里茶壺民宿', NULL, '嘉義縣', 23.539230, 120.668015, NULL, '嘉義縣梅山鄉瑞里村100之6號', '05-2501806', NULL, NULL, NULL, NULL, 'https://lh3.googleusercontent.com/p/AF1QipN2xAq2Nxzl8t01pDwmwK53H4zwlfAZYp9MqCQx=s1600-h500', 'https://lh3.googleusercontent.com/p/AF1QipPHdPg94VMcFtpKWEqdxbIia-pGbuLv0Dl0VbMd=s1600-h500', 'https://lh3.googleusercontent.com/p/AF1QipOrOy-l7nVerRuga7TcD6PKMZF7nJXbBuxAys4u=s1600-h500', '環保旅店', '2017-07-16 12:23:24'),
('ChIJ092xe4uDbjQRVIFdeQkjQ9Y', '來來商店', NULL, '嘉義縣', 23.337475, 120.244446, NULL, '624嘉義縣義竹鄉義竹118之56號', '05-3413525', NULL, NULL, NULL, NULL, 'https://lh3.googleusercontent.com/p/AF1QipOlKdbEGKT0t8pujp_Y7dyeQCISdfq1Z6WH0vnm=s1600-h500', NULL, NULL, '綠色商店', '2017-07-16 12:27:29'),
('ChIJ1_gFLDfwbjQRwPEl-DMazQg', '淳液園民宿', NULL, '嘉義縣', 23.297262, 120.684288, NULL, '嘉義縣阿里山鄉茶山村木瓜寮4鄰106號', '05-2513189', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '環保旅店', '2017-07-16 12:24:08'),
('ChIJ2QuPGijrbjQRz65_JVa_lc8', '雲登渡假會館', NULL, '嘉義縣', 23.465961, 120.538460, NULL, '嘉義縣番路鄉新福村第三農場136號', '05-2590011', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '環保旅店', '2017-07-16 12:22:51'),
('ChIJ2WDwxISZbjQRWVIT9LSnGtM', '蔗埕微風', NULL, '嘉義縣', 23.481150, 120.301743, NULL, '615嘉義縣六腳鄉工廠村一號', '05-3805626', NULL, NULL, NULL, NULL, 'https://lh3.googleusercontent.com/p/AF1QipNVjwJHr4SaAOfOSH7hW_9bwmlDDIlDnuO8uCZE=s1600-h500', 'https://lh3.googleusercontent.com/p/AF1QipNXTeDJ_VsQznTCBzmw2iC6Et-jV343JmWzDGiZ=s1600-h500', 'https://lh3.googleusercontent.com/p/AF1QipOsWMQXaDBpw-KN6wkbsFl0xWyrlXqbpWl225hj=s1600-h500', '環保餐館', '2017-07-16 12:24:30'),
('ChIJ31aaNKaQbjQRjqBglg_3Vmk', '昶旭車業有限公司', NULL, '嘉義縣', 23.454792, 120.345619, NULL, '612嘉義縣太保市後潭里439之10號', '05-3711321', NULL, NULL, NULL, NULL, 'https://lh3.googleusercontent.com/p/AF1QipMWl3gEh8SaP-HcSnv75Z0QfrUHpU5grwCBRwd8=s1600-h500', NULL, NULL, '綠色商店', '2017-07-16 12:27:41'),
('ChIJ36KrwlWQbjQRmTshM51OKqQ', '南靖糖廠', NULL, '嘉義縣', 23.413782, 120.385063, NULL, '608嘉義縣水上鄉靖和村1號', '05-2687750', NULL, NULL, NULL, NULL, 'https://lh3.googleusercontent.com/p/AF1QipPQBDSQD5a1mmnZZqDCXYyaIQ-dyMgIX-CkFd3C=s1600-h500', 'https://lh3.googleusercontent.com/p/AF1QipMrBlxPA06NYYKQXSVH9ibWUSLNLFhu3SVYSY7f=s1600-h500', 'https://lh3.googleusercontent.com/p/AF1QipPnwTU71MTBrYwtYW9ZVOq-TJ75Qx4MnYmBMlPr=s1600-h500', '綠色商店', '2017-07-16 12:25:37'),
('ChIJ38yXRPyVbjQRtAE2xGrgV20', '新知科技電器', NULL, '嘉義縣', 23.523397, 120.439667, NULL, '606嘉義縣民雄鄉建國路三段138號', '05-2213113', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '綠色商店', '2017-07-16 12:25:28'),
('ChIJ40Aa3gbDbjQRJ2X5YJXUH5I', '漫步雲端民宿', NULL, '嘉義縣', 23.530582, 120.669174, NULL, '嘉義縣梅山鄉瑞里村科子林15號', '05-2501090', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '環保旅店', '2017-07-16 12:23:19'),
('ChIJ41kOuhfAbjQRM-U0mv4r3QI', '竹豐超級市場', NULL, '嘉義縣', 23.519829, 120.549072, NULL, '604嘉義縣竹崎鄉竹崎村民生路23號', '05-2611140', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '綠色商店', '2017-07-16 12:25:19'),
('ChIJ42DInyDcbjQRoguQwT-Ws3E', '阿里山青山別館', NULL, '嘉義縣', 23.512136, 120.803871, NULL, '嘉義縣阿里山鄉中正村42號', '05-2679533', NULL, NULL, NULL, NULL, 'https://lh3.googleusercontent.com/p/AF1QipOtUkkmqjxmfQVEYREiouI7Meeo8OdcE08tTdvj=s1600-h500', 'https://lh3.googleusercontent.com/p/AF1QipM6DcxYa_zArPwhe--928L3MSrZQELk0aSeedef=s1600-h500', 'https://lh3.googleusercontent.com/p/AF1QipMxNVD6St-vKLRVTjzTPZ-0iv2cHLPxmOoUcUvq=s1600-h500', '環保旅店', '2017-07-16 12:23:59'),
('ChIJ51IgFG-bbjQRtB2FFIWfKGk', '玉珍商店', NULL, '嘉義縣', 23.423044, 120.266609, NULL, '613嘉義縣朴子市新庄里63之5號', '05-3691940', NULL, NULL, NULL, NULL, 'https://lh3.googleusercontent.com/p/AF1QipOJKSCC8limTgTcOZguVq3_vf1vVYLB_3JaeCrV=s1600-h500', NULL, NULL, '綠色商店', '2017-07-16 12:26:32'),
('ChIJ5XVtHPGTbjQR_SUIybcElIs', '松友休閒客家庄民宿', NULL, '嘉義縣', 23.435480, 120.450478, NULL, '嘉義縣中埔鄉和興村37鄰公館97-20號', '0921-700563', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '環保旅店', '2017-07-16 12:23:07'),
('ChIJ6UnHa8qbbjQRVVmkn_24eg4', '饌食冷飲店(阿墨)', NULL, '嘉義縣', 23.455889, 120.293388, NULL, '612嘉義縣太保市安仁里棒球一街8號', '05-3625701', NULL, NULL, NULL, NULL, 'https://greenliving.epa.gov.tw/GreenLife/actions/greenrestaurant/Files/StoreImages/82acc3cc-7c4d-4667-a8e0-bb7155ad9c17.jpg', NULL, NULL, '環保餐館', '2017-07-16 12:24:50'),
('ChIJ6wYH1XKcbjQRp1ERmnr2fbU', '日成文具行', NULL, '嘉義縣', 23.465446, 120.242523, NULL, '613嘉義縣朴子市開元路271號', '05-3795316', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '綠色商店', '2017-07-16 12:26:29'),
('ChIJ6YiZe8_AbjQRMkuyLcnw23g', '億昌家電', NULL, '嘉義縣', 23.580309, 120.559074, NULL, '603嘉義縣梅山鄉中山路87號', '05-2624585', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '綠色商店', '2017-07-16 12:25:06'),
('ChIJAQAAQIMnbDQRe1gsBkS7pJs', '和成興商號', NULL, '嘉義縣', 23.457891, 120.150642, NULL, '614嘉義縣東石鄉猿樹村東石154之22號', '05-3730022', NULL, NULL, NULL, NULL, 'https://lh3.googleusercontent.com/p/AF1QipM8m4_7h7cqOd_BXtO9sdrM9lYpyYRjMV23QXwb=s1600-h500', 'https://lh3.googleusercontent.com/p/AF1QipP7qjH8wqwyN1OrA6aFGjmVICU72o-2-JTQRLTP=s1600-h500', NULL, '綠色商店', '2017-07-16 12:26:39'),
('ChIJb9H42g--bjQRTi9KvTvLzbc', '五妹的店', NULL, '嘉義縣', 23.534395, 120.458069, NULL, '621嘉義縣民雄鄉北斗村北勢子20-30號', '05-2133187', NULL, NULL, NULL, NULL, 'https://lh3.googleusercontent.com/p/AF1QipMmyidOCOz0EQGmF1-gWJE39rQrVgmv4AR-V9iQ=s1600-h500', 'https://lh3.googleusercontent.com/p/AF1QipM20j_wdMupwAQzAPDSUVTpy2zkRpNHK-mPF1-N=s1600-h500', 'https://lh3.googleusercontent.com/p/AF1QipPgrhyxeO2zKQeT-RRd6Dx0IBq2i3PDWqkCtEQ=s1600-h500', '環保餐館', '2017-07-16 12:24:35'),
('ChIJc9WvJLe-bjQR1vZp6e3iRdc', '大林電子', NULL, '嘉義縣', 23.604630, 120.454025, NULL, '622嘉義縣大林鎮中正路527號', '05-2650722', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '綠色商店', '2017-07-16 12:27:06'),
('ChIJCenVD929bjQRnWYNmYKKAo4', '嘉大機車行', NULL, '嘉義縣', 23.556835, 120.426414, NULL, '621嘉義縣民雄鄉西安村西安路35-3號', '05-2262252', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '綠色商店', '2017-07-16 12:26:53'),
('ChIJcUhyItfqbjQRS5z1caHyZXA', '童年渡假飯店(F HOTEL)', NULL, '嘉義縣', 23.471004, 120.536835, NULL, '嘉義縣番路鄉下坑村8鄰下坑42-3號', '05-2590888', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '環保旅店', '2017-07-16 12:23:49'),
('ChIJdTcCaU3objQRIxCiP1AnsXs', '當歸民宿', NULL, '嘉義縣', 23.450195, 120.667648, NULL, '嘉義縣番路鄉公田村2鄰龍頭18-4號', '05-2586841', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '環保旅店', '2017-07-16 12:22:39'),
('ChIJdxw_eDjAbjQRfXsBtU0h7h0', '白樹腳驛棧', NULL, '嘉義縣', 23.526020, 120.560211, NULL, '嘉義縣竹崎鄉復金村白樹腳22號', '05-2615933', NULL, NULL, NULL, NULL, 'https://lh3.googleusercontent.com/p/AF1QipP7FBoxCJck12GpAVGIdqELTjkIg0TmAlpjzsk=s1600-h500', 'https://lh3.googleusercontent.com/p/AF1QipNWf58FqwyIwLlaMWV1IDCAo5Mfl4UpNaxS1bwH=s1600-h500', 'https://lh3.googleusercontent.com/p/AF1QipO4I3WC_sWxbGWoAMURYowvChwQZh4bNMTSI4Dx=s1600-h500', '環保旅店', '2017-07-16 12:22:58'),
('ChIJea48pIGCbjQRx1r38VN5Fe0', '皇誠企業行(東香企業行)', NULL, '嘉義縣', 23.379040, 120.161407, NULL, '625嘉義縣布袋鎮興中里上海路197號', '05-3479779', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '綠色商店', '2017-07-16 12:27:36'),
('ChIJeetMxBGabjQRdwduMv876SM', '新展文具圖書廣場', NULL, '嘉義縣', 23.453928, 120.331055, NULL, '612嘉義縣太保市春珠里150-5號', '05-3717617', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '綠色商店', '2017-07-16 12:26:01'),
('ChIJef9fEQjDbjQROIaLlL6t_0U', '茗園茶業山莊', NULL, '嘉義縣', 23.539421, 120.671753, NULL, '603嘉義縣梅山鄉瑞里村89號', '05-2501796', NULL, NULL, NULL, NULL, 'https://lh3.googleusercontent.com/p/AF1QipPuipZwgIsHg5ezo2ruLe09hfCuxcQcl46uBZrk=s1600-h500', 'https://lh3.googleusercontent.com/p/AF1QipMupeYbXFvf2fI7ApMmPmWvSiN_xLAELrPgEgJc=s1600-h500', 'https://lh3.googleusercontent.com/p/AF1QipPoCfbC8TrPV4eECXbDQDj3bUS8cATW8o5_cNR2=s1600-h500', '環保餐館', '2017-07-16 12:24:48'),
('ChIJeQ8v8gnDbjQR01UfoE85i38', '瑞里印象區', NULL, '嘉義縣', 23.540117, 120.666351, NULL, '嘉義縣梅山鄉瑞里村二鄰120之8號', '05-2501629', NULL, NULL, NULL, NULL, 'https://lh3.googleusercontent.com/p/AF1QipMW64HU2du2z6OP5YKRoQw_BxS2vKxtRJBDc_U4=s1600-h500', 'https://lh3.googleusercontent.com/p/AF1QipM6NQq0SMu29R4YK6lP_6L8po9l7h2BZbmQiwY0=s1600-h360', 'https://lh3.googleusercontent.com/p/AF1QipOyxZHhnmzpa8rlHcBTvHak3RCCSpSKBC2cuCZl=s1600-h500', '環保旅店', '2017-07-16 12:23:30'),
('ChIJETa9YN29bjQRb7Jf4V35B7A', '米澤飲食店', NULL, '嘉義縣', 23.555395, 120.425713, NULL, '621嘉義縣民雄鄉保生街189號', '05-2269156', NULL, NULL, NULL, NULL, 'https://greenliving.epa.gov.tw/GreenLife/Actions/GreenRestaurant/Files/StoreImages/a23a6c17-5c7f-414d-b7b0-24e10dccf67c.jpg', NULL, NULL, '環保餐館', '2017-07-16 12:24:43'),
('ChIJf-I7TSjobjQRIwM__HN06lw', '綠野仙蹤民宿', NULL, '嘉義縣', 23.478027, 120.674690, NULL, '嘉義縣竹崎鄉光華村頂笨仔22-1號', '05-2561929', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '環保旅店', '2017-07-16 12:24:10'),
('ChIJf23N8gnDbjQR9H1jWmIpEIg', '歐湘園飯店', NULL, '嘉義縣', 23.540030, 120.665947, NULL, '嘉義縣梅山鄉瑞里村103號', '05-2501222', NULL, NULL, NULL, NULL, 'https://lh3.googleusercontent.com/p/AF1QipM6c2-EZ6jY-ezglpP35qtGf3Cf2UR-Ev5poV7K=s1600-h500', 'https://lh3.googleusercontent.com/p/AF1QipMYqc7TRLiEDIJZUK_ANO77MArx0hnnXLNXepMK=s1600-h500', 'https://lh3.googleusercontent.com/p/AF1QipMTNJtVCtQDD1teFKpdadkLcy5sH3WytZk6_XOn=s1600-h500', '環保旅店', '2017-07-16 12:23:40'),
('ChIJf8R9XMi-bjQRN2Nh6tbSUi0', '秦晟企業有限公司', NULL, '嘉義縣', 23.602716, 120.461166, NULL, '622嘉義縣大林鎮中興路258號', '05-2653045', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '綠色商店', '2017-07-16 12:27:08'),
('ChIJfTrf4rDCbjQRyj2gI2bmWaY', '龍雲山莊', NULL, '嘉義縣', 23.487854, 120.703209, NULL, '嘉義縣竹崎鄉中和村18鄰石棹1號', '05-2562216', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '環保旅店', '2017-07-16 12:24:04'),
('ChIJfzKxgXGcbjQRFMszlXjqtCo', '順鈺行', NULL, '嘉義縣', 23.460052, 120.242554, NULL, '613嘉義縣朴子市南通路三段603號', '05-3795555', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '綠色商店', '2017-07-16 12:26:21'),
('ChIJG3eDrjLDbjQRcHb5PYsvI38', '欣采民宿', NULL, '嘉義縣', 23.525879, 120.711624, NULL, '嘉義縣梅山鄉太和村樟樹湖27號', '05-2561219', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '環保旅店', '2017-07-16 12:23:17'),
('ChIJGUfbeme8bjQR-OB1Rly4SI8', '明光電器行', NULL, '嘉義縣', 23.604580, 120.397652, NULL, '623嘉義縣溪口鄉中正路62號', '05-2691128', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '綠色商店', '2017-07-16 12:27:12'),
('ChIJh18EgGe8bjQRkSqX9vgE5to', '協成電器行', NULL, '嘉義縣', 23.603924, 120.398338, NULL, '623嘉義縣溪口鄉溪東村民生街55號', '05-2695329', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '綠色商店', '2017-07-16 12:27:21'),
('ChIJh5oAsSDcbjQR7wsoBvsF7i0', '美麗亞山莊', NULL, '嘉義縣', 23.511337, 120.803047, NULL, '嘉義縣阿里山鄉中正村49號', '05-2679745', NULL, NULL, NULL, NULL, 'https://lh3.googleusercontent.com/p/AF1QipNb_24kLDxS7dpH9gTICCG3_sQgkLVkk8OQlIAP=s1600-h500', 'https://lh3.googleusercontent.com/p/AF1QipPG0upP5FV9nYzNRhJ_EDY021Cqjinf9EubDKzy=s1600-h500', 'https://lh3.googleusercontent.com/p/AF1QipM_65jrajstdOXv0oDzq6vRZf5MBTDhx1hWWtDp=s1600-h500', '環保旅店', '2017-07-16 12:23:03'),
('ChIJh6a0yBfAbjQRMR6i1n8WlSg', '金玉堂文具行', NULL, '嘉義縣', 23.519730, 120.549828, NULL, '604嘉義縣竹崎鄉中山路207號', '05-2616262', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '綠色商店', '2017-07-16 12:25:17'),
('ChIJhTJ8tnqQbjQRdsS_-6M1Z0E', '西井村生活五金行', NULL, '嘉義縣', 23.411390, 120.308319, NULL, '611嘉義縣鹿草鄉鹿草432號', '05-3752062', NULL, NULL, NULL, NULL, 'https://lh3.googleusercontent.com/p/AF1QipN3T8BdJi57XPQf67Od6eTGwqfI_i8L6VpOmRam=s1600-h500', 'https://lh3.googleusercontent.com/p/AF1QipO44XcilTxaORqsFZUgNjZFQmOX3uIQbFKBtP7Z=s1600-h500', 'https://lh3.googleusercontent.com/p/AF1QipNzXyn2keEWh7KOgONxLqLfEkJP3_ueih2arDSo=s1600-h500', '綠色商店', '2017-07-16 12:25:53'),
('ChIJI338jty9bjQRPcmw6FDPoeE', '豪億商行', NULL, '嘉義縣', 23.559408, 120.426643, NULL, '621嘉義縣民雄鄉西安村復興路226號', '05-2269481', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '綠色商店', '2017-07-16 12:26:57'),
('ChIJi5ucnqKibjQRgG-N_y0GcxM', '板陶窯主題餐廳', NULL, '嘉義縣', 23.565285, 120.320717, NULL, '616嘉義縣新港鄉板頭村45-1號', '05-7810832', NULL, NULL, NULL, NULL, 'https://lh3.googleusercontent.com/p/AF1QipM6kmHW7ngNusQ9EXZi-PMdX5stQ4HiVwqA9E0J=s1600-h500', 'https://lh3.googleusercontent.com/p/AF1QipMfopV-gq_WHX3ToNe3dJ3A-IM9tt_m8yTEKSKz=s1600-h500', 'https://lh3.googleusercontent.com/p/AF1QipMQIYzIB8cU14AsGO35w85a0GZ5HZs7dSMWLfGR=s1600-h500', '環保餐館', '2017-07-16 12:24:57'),
('ChIJIejz6subbjQRjdKpAhrM8Bw', '嘉義縣政府員工福利社', NULL, '嘉義縣', 23.458988, 120.292938, NULL, '613嘉義縣朴子市祥和東路1段1號', '05-3620123#516', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '綠色商店', '2017-07-16 12:26:27'),
('ChIJiXOke8_AbjQRoO6k2xQdgBI', '慈惠商行', NULL, '嘉義縣', 23.580353, 120.559067, NULL, '603嘉義縣梅山鄉梅南村中山路89號', '05-2624412', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '綠色商店', '2017-07-16 12:25:13'),
('ChIJk-E5D6zebjQRrSJuk1uPlio', '中華電信阿里山會館', NULL, '嘉義縣', 23.511196, 120.803299, NULL, '嘉義縣阿里山鄉中正村58號', '05-2441443', NULL, NULL, NULL, NULL, 'https://lh3.googleusercontent.com/p/AF1QipPItP4FGu1ZxrhbuQoGP4TfmNb4DoH1j4-zIeyf=s1600-h500', 'https://lh3.googleusercontent.com/p/AF1QipPATzqV9OlcN5VnRACSXpH7yCQjYI9h7_VqwJQD=s1600-h500', 'https://lh3.googleusercontent.com/p/AF1QipNb50qtm3vvYkrkwgiSXAQtM8pforQ2D1rWhlJJ=s1600-h500', '環保旅店', '2017-07-16 12:22:44'),
('ChIJKdBE0wmabjQRCoP9nRkPnNQ', '高佳電器有限公司', NULL, '嘉義縣', 23.452127, 120.343178, NULL, '612嘉義縣太保市後潭里330號', '05-3715006', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '綠色商店', '2017-07-16 12:27:38'),
('ChIJKWwT6ouEbjQR5SVvFVsyvTA', '上鴻水電行', NULL, '嘉義縣', 23.356565, 120.269745, NULL, '624嘉義縣義竹鄉五厝村2鄰五間厝81之10號', '05-3416925', NULL, NULL, NULL, NULL, 'https://lh3.googleusercontent.com/p/AF1QipNoAOalBbEqDlUb8YgYG0Zj0BW_PJS9_ruM1veL=s1600-h500', 'https://lh3.googleusercontent.com/p/AF1QipO6mwgHw-rhlsCOtmB2M60b_AAZgULLnsXzCOBB=s1600-h500', 'https://lh3.googleusercontent.com/p/AF1QipPikne9ODdu8UVub_kOXMjot0cX3980YI2DS8mV=s1600-h500', '綠色商店', '2017-07-16 12:27:26'),
('ChIJlchDjF28bjQRFYg7RHp6H-E', '嘉冠行', NULL, '嘉義縣', 23.603724, 120.397110, NULL, '623嘉義縣溪口鄉溪東村民生街113號', '05-2697881', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '綠色商店', '2017-07-16 12:27:16'),
('ChIJlSyEp5vCbjQR518XLepjiYI', '阿里山民宿-湘泉休閒民宿', NULL, '嘉義縣', 23.485392, 120.680740, NULL, '嘉義縣竹崎鄉光華村1鄰9號', '0910-837222', NULL, NULL, NULL, NULL, 'https://lh3.googleusercontent.com/p/AF1QipMsVKMaelgT3ijtZHBo7zofE0Gqi3Ks3ScdQVbZ=s1600-h500', 'https://lh3.googleusercontent.com/p/AF1QipOvjUbHJpJU_s_77DJhy1HbJFAe2kyuPJQ1o9Ux=s1600-h500', 'https://lh3.googleusercontent.com/p/AF1QipNiit_F_YyBYjrGOaahB9vnAIi2pWKcPT_-QqNs=s1600-h500', '環保旅店', '2017-07-16 12:24:15'),
('ChIJMVLrYAucbjQRKR4heSMNtww', '嘉洲大旅社股份有限公司', NULL, '嘉義縣', 23.466343, 120.245766, NULL, '嘉義縣朴子市光復路57號', '05-379-4121', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '環保旅店', '2017-07-16 12:22:31'),
('ChIJN2W4FafDbjQRngZojbbIYHo', '阿本的家民宿', NULL, '嘉義縣', 23.539585, 120.664299, NULL, '嘉義縣梅山鄉瑞里村2鄰105號', '05-2501333', NULL, NULL, NULL, NULL, 'https://lh3.googleusercontent.com/p/AF1QipP3ChjqcVeUTVzft4gHRMH8bV-FS6kG9UgRqyAA=s1600-h480', 'https://lh3.googleusercontent.com/p/AF1QipMTZslsKROKiAMvzdlxaWnE_Usdg03mrgIbmZEY=s1600-h332', 'https://lh3.googleusercontent.com/p/AF1QipMIysJz-4hsdd7cCibWKvZaqYP4U7k5vQAc_kG3=s1600-h500', '環保旅店', '2017-07-16 12:23:54'),
('ChIJNdMzrwycbjQRrN3IdHBW-W0', '英倫', NULL, '嘉義縣', 23.465582, 120.245110, NULL, '613嘉義縣朴子市山通路35號之4', '05-3792374', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '綠色商店', '2017-07-16 12:26:10'),
('ChIJnR_Ih7ntbjQR26ghy3QCO-k', '歐都納山野渡假村', NULL, '嘉義縣', 23.298693, 120.587769, NULL, '607嘉義縣大埔鄉大埔村大埔202號', '05-2521717', NULL, NULL, NULL, NULL, 'https://lh3.googleusercontent.com/p/AF1QipP0OZmZCASOFBCE6AEFnWSt4qwGaji9YGFSKIbO=s1600-h500', 'https://lh3.googleusercontent.com/p/AF1QipNMJw-H_hzcYPMcBXT9Q6PrFmdL6zVeHQ3ZeHU=s1600-h500', 'https://lh3.googleusercontent.com/p/AF1QipNTnVVTkLX70WmofYwBosJiZpUZ9kSn_zu8VqR-=s1600-h500', '環保餐館', '2017-07-16 12:24:40'),
('ChIJNxzXdj-cbjQRP0D0FXSE79U', '船仔頭天賞居', NULL, '嘉義縣', 23.470181, 120.225014, NULL, '嘉義縣東石鄉蔦松村船仔頭13號', '05-3702667', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '環保旅店', '2017-07-16 12:23:05'),
('ChIJodfBXX-YbjQRT75gRobn_WY', '益安', NULL, '嘉義縣', 23.559853, 120.301834, NULL, '615嘉義縣六腳鄉六腳鄉蘇厝村蘇厝寮120-1號', '05-7812469', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '綠色商店', '2017-07-16 12:26:41'),
('ChIJOfn3fRi-bjQRNHtbvl_-Uoo', '親親商店', NULL, '嘉義縣', 23.534689, 120.458397, NULL, '621嘉義縣民雄鄉北斗村北勢子1之101號', '05-2214471', NULL, NULL, NULL, NULL, 'https://lh3.googleusercontent.com/p/AF1QipMRl8y_h4d7Jxc-5lemKdM4tg5-t5uiIKeQSImT=s1600-h500', 'https://lh3.googleusercontent.com/p/AF1QipOgvoFULD1vRMWe1RtyvHYdQ7bI8hF5QMirafDG=s1600-h500', NULL, '綠色商店', '2017-07-16 12:26:50'),
('ChIJPU676BGabjQRaqgvvHDC94U', '來來五金超市', NULL, '嘉義縣', 23.453115, 120.331253, NULL, '612嘉義縣太保市春珠里144-1號', '05-3714577', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '綠色商店', '2017-07-16 12:25:59'),
('ChIJpz6ZbCkobDQREFUBM4uWbfc', '夢想家商務旅館', NULL, '嘉義縣', 23.383514, 120.155022, NULL, '嘉義縣布袋鎮新北路22號', '05-3472755', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '環保旅店', '2017-07-16 12:24:22'),
('ChIJP_fCje2bbjQRpOiHT9mn5MA', '山海大飯店股份有限公司', NULL, '嘉義縣', 23.464977, 120.263718, NULL, '嘉義縣朴子市大慷榔1020號', '05-3709399', NULL, NULL, NULL, NULL, 'https://lh3.googleusercontent.com/p/AF1QipNTs3jOIVMH5UWUoc-oBqrCnZ2f18vOOMnRsgl-=s1600-h500', 'https://lh3.googleusercontent.com/p/AF1QipPqBQ45rV10kUzpr8yz3DIFnJhM8mQTdLYZkJ6j=s1600-h500', 'https://lh3.googleusercontent.com/p/AF1QipMXJvElFQQtTzghhacSTgnPooreEM8fpRG6EoZy=s1600-h500', '環保旅店', '2017-07-16 12:24:20'),
('ChIJq6qq6mmcbjQR22t_Webq--Q', '晴預約餐坊', NULL, '嘉義縣', 23.465269, 120.232445, NULL, '613嘉義縣朴子市永和里49之24號', '05-3661600', NULL, NULL, NULL, NULL, 'https://lh3.googleusercontent.com/p/AF1QipOO3O3ZLLBrXB1SgZdNcFe9BmDhuscocmvMfdtF=s1600-h500', 'https://lh3.googleusercontent.com/p/AF1QipPX4mYeKHnSI6A2RsZvKVmm2fuYXaJs1dmsevfg=s1600-h500', 'https://lh3.googleusercontent.com/p/AF1QipN2A1_Wrj4UAoG0eqHFGZZXkCUuJGkf3S0d39qP=s1600-h500', '環保餐館', '2017-07-16 12:25:04'),
('ChIJq6qq6mmcbjQRaYBRNqYLU5M', '書局在這裡', NULL, '嘉義縣', 23.463791, 120.236092, NULL, '613嘉義縣朴子市永和里35-17號', '053790120', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '綠色商店', '2017-07-16 12:26:16'),
('ChIJR2VoS-C9bjQRiPA6u2YReCQ', '東新車業有限公司', NULL, '嘉義縣', 23.550747, 120.434013, NULL, '621嘉義縣民雄鄉東湖村建國二路340號', '05226575', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '綠色商店', '2017-07-16 12:26:59'),
('ChIJr5YS5rebbjQRvk-R-2lnKZM', '祥和車業', NULL, '嘉義縣', 23.455507, 120.286949, NULL, '613嘉義縣朴子市祥和三路西段153號', '05-3621060', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '綠色商店', '2017-07-16 12:26:25'),
('ChIJs965jHSZbjQR2XRrcTl7QQw', '新一家便利商行', NULL, '嘉義縣', 23.495483, 120.293045, NULL, '615嘉義縣六腳鄉蒜頭7之6號', '05-3804261', NULL, NULL, NULL, NULL, 'https://lh3.googleusercontent.com/p/AF1QipNSgqr7Csp9xGDTn8DBCm6vbSPITO0iWNLMucTA=s1600-h500', NULL, NULL, '綠色商店', '2017-07-16 12:26:44'),
('ChIJtbB48XW-bjQRrC8u9_792rg', '發興機車行', NULL, '嘉義縣', 23.557220, 120.436302, NULL, '612嘉義縣民雄縣東榮村中庄14之3號', '052267651', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '綠色商店', '2017-07-16 12:26:08'),
('ChIJtSbaW6zDbjQRnd9JQR2TQeQ', '三華生態民宿', NULL, '嘉義縣', 23.529316, 120.658325, NULL, '嘉義縣竹崎鄉仁壽村交力坪84號', '05-2501165', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '環保旅店', '2017-07-16 12:23:15'),
('ChIJtT2HoyDcbjQR_cxwyoOAYhU', '萬國別館', NULL, '嘉義縣', 23.511774, 120.803436, NULL, '嘉義縣阿里山鄉中正村45號', '05-2679777', NULL, NULL, NULL, NULL, 'https://lh3.googleusercontent.com/p/AF1QipO-CZtoRaRFxl_soaR7HcO0NcfMIjoTxVVh699y=s1600-h500', 'https://lh3.googleusercontent.com/p/AF1QipMCe6JEmIXtgrTDpnCrSGS8u8KmrAiti3c-p7uH=s1600-h500', 'https://lh3.googleusercontent.com/p/AF1QipNqTWq0JGJUoFq_zbnv72OacW9MXWkL3QyFhrQ=s1600-h500', '環保旅店', '2017-07-16 12:22:49'),
('ChIJU19aFuqUbjQRLdPQ0CDLmWY', '名都觀光渡假大飯店股份有限公司', NULL, '嘉義縣', 23.457104, 120.503586, NULL, '嘉義縣番路鄉內甕村後坑仔28號', '05-2712658', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '環保旅店', '2017-07-16 12:23:47'),
('ChIJu6NacLWbbjQRBh9DsGagS4E', '向日葵汽車旅館', NULL, '嘉義縣', 23.453604, 120.295120, NULL, '嘉義縣太保市縣府六街29號', '05-3625599', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '環保旅店', '2017-07-16 12:24:02'),
('ChIJv0bHtg3DbjQRcymdJ1lSMcM', '瑞勝渡假木屋', NULL, '嘉義縣', 23.538954, 120.672096, NULL, '嘉義縣梅山鄉瑞里村79號', '0932-981526', NULL, NULL, NULL, NULL, 'https://lh3.googleusercontent.com/p/AF1QipNVanSN6qo4gB5qlubOeXNTtKHLYKo8gw9vCJ2X=s1600-h500', 'https://lh3.googleusercontent.com/p/AF1QipMRn6lZSj2COolUscIa_xOiRdfcyuPKh4Jx0Lg8=s1600-h500', 'https://lh3.googleusercontent.com/p/AF1QipOLqMAJge6uTrNZ4vvvqYuXY2kyyMOt8uAIlDL9=s1600-h500', '環保旅店', '2017-07-16 12:23:35'),
('ChIJY5ZMqsPAbjQRZY8-jTsgKM4', '茗園茶葉民宿', NULL, '嘉義縣', 23.538763, 120.672783, NULL, '嘉義縣梅山鄉瑞里村89號', '05-2501222', NULL, NULL, NULL, NULL, 'https://lh3.googleusercontent.com/p/AF1QipN5kh9Ux4umcG2wphCkSi7FS_3WZQR9hVHZSM6-=s1600-h500', 'https://lh3.googleusercontent.com/p/AF1QipNEAhNaqSiCky_jWwdYole8dmXeaDv-eIJbBK-i=s1600-h500', 'https://lh3.googleusercontent.com/p/AF1QipPV_ylJM5YIJuDVhKdMk8qJssK4nSYKMGF83HHU=s1600-h500', '環保旅店', '2017-07-16 12:23:45'),
('ChIJy8WGIXfDbjQR2tE9AAsNJuw', '賴坤陽的家木屋民宿', NULL, '嘉義縣', 23.553364, 120.670448, NULL, '嘉義縣梅山鄉瑞峰村新興寮22之1號', '05-2501578', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '環保旅店', '2017-07-16 12:22:53'),
('ChIJyYkZcUqZbjQRMfDb_pOoIrw', '蟀哥農家民宿', NULL, '嘉義縣', 23.505421, 120.255081, NULL, '嘉義縣六腳鄉六腳村10號', '05-3781234', NULL, NULL, NULL, NULL, 'https://lh3.googleusercontent.com/p/AF1QipOkTHXyjyy0QipIlEV4ougaTCbnRalG800ym90F=s1600-h500', 'https://lh3.googleusercontent.com/p/AF1QipP-2MadTtLNyLr_xUlwRWSZgJaLSrZBG7y5jvmL=s1600-h500', 'https://lh3.googleusercontent.com/p/AF1QipOpUTTfz89ImBFsUW6d83o1qirm0fdcERvUr8iR=s1600-h500', '環保旅店', '2017-07-16 12:22:37'),
('ChIJzbsZ46XCbjQRVC_G6v69sLU', '淵明居山庄', NULL, '嘉義縣', 23.480062, 120.699684, NULL, '嘉義縣竹崎鄉中和村石棹四號', '05-2561066', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '環保旅店', '2017-07-16 12:24:06'),
('ChIJzWwTJxCabjQRdQ_RQ1D183c', '芳興電器行', NULL, '嘉義縣', 23.455482, 120.331924, NULL, '612嘉義縣太保市太保里17-42號', '05-3716626', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '綠色商店', '2017-07-16 12:25:55'),
('ChIJ_2K5aXOcbjQRkpuRsU5TmB4', '日月光電器', NULL, '嘉義縣', 23.463676, 120.244553, NULL, '613嘉義縣朴子市海通路２３－４號', '05-3793409', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '綠色商店', '2017-07-16 12:26:23'),
('ChIJ__955heRbjQReLH-vvgVsW4', '豪億五金商行', NULL, '嘉義縣', 23.430948, 120.402290, NULL, '608嘉義縣水上鄉水頭村吳竹街133號', '05-2688855', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '綠色商店', '2017-07-16 12:25:32'),
('Ei82MjHlj7DngaPlmInnvqnnuKPmsJHpm4TphInkv53nlJ_ooZc4MeW3tzEyMOiZnw', '齊普民雄', NULL, '嘉義縣', 23.552050, 120.427162, NULL, '621嘉義縣民雄鄉西安村保生街120號1樓', '05-2062257', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '綠色商店', '2017-07-16 12:26:55'),
('Ei82MTPlj7DngaPlmInnvqnnuKPmnLTlrZDluILlm5vntq3ot6_kuozmrrUxM-iZnw', '朴子電器行', NULL, '嘉義縣', 23.458458, 120.242500, NULL, '613嘉義縣朴子市竹圍里四維路二段13號一樓', '05-3705890', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '綠色商店', '2017-07-16 12:26:18'),
('Ei82MTPlj7DngaPlmInnvqnnuKPmnLTlrZDluILlmInmnLTot6_opb_mrrU1N-iZnw', '愛貝克太陽能', NULL, '嘉義縣', 23.462233, 120.281151, NULL, '613嘉義縣朴子市嘉朴西路57號', '05-3627111', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '綠色商店', '2017-07-16 12:26:34'),
('Eic2MjXlj7DngaPlmInnvqnnuKPluIPooovpjq7lpKrlubPmnbHot68', '大布袋大賣場', NULL, '嘉義縣', 23.376202, 120.170593, NULL, '625嘉義縣布袋鎮光復里太平東路380號', '05-3478117', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '綠色商店', '2017-07-16 12:27:31'),
('Eig2MDPlj7DngaPlmInnvqnnuKPmooXlsbHphInlhazlnJLot6846Jmf', '梅山九九', NULL, '嘉義縣', 23.578176, 120.559044, NULL, '603嘉義縣梅山鄉梅東村1鄰公園路326巷8號', '05-2626420', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '綠色商店', '2017-07-16 12:25:08'),
('Eig2MDPlj7DngaPlmInnvqnnuKPmooXlsbHphInoj6_lsbHot6826Jmf', '梅豐生鮮超市', NULL, '嘉義縣', 23.585861, 120.555321, NULL, '603嘉義縣梅山鄉華山路6號', '05-2623575', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '綠色商店', '2017-07-16 12:25:15'),
('Eig2MTPlj7DngaPlmInnvqnnuKPmnLTlrZDluILlubPlkozot6836Jmf', '億客來', NULL, '嘉義縣', 23.465014, 120.247375, NULL, '613嘉義縣朴子市平和里平和路7號1F', '05-3704617#000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '綠色商店', '2017-07-16 12:26:12'),
('Eig2MTPlj7DngaPlmInnvqnnuKPmnLTlrZDluILlubPlkozot68y6Jmf', '自強書局', NULL, '嘉義縣', 23.465361, 120.248177, NULL, '613嘉義縣朴子市平和路2號', '05-3791898', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '綠色商店', '2017-07-16 12:26:14'),
('Eik2MDblj7DngaPlmInnvqnnuKPkuK3ln5TphInljYHlrZfot681MOiZnw', '勝和商店', NULL, '嘉義縣', 23.441771, 120.528084, NULL, '606嘉義縣中埔鄉隆興村十字路50號', '05-2531226', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '綠色商店', '2017-07-16 12:25:26'),
('Eik2MDjlj7DngaPlmInnvqnnuKPmsLTkuIrphInkuK3oiIjot684MeiZnw', '昇昌商行', NULL, '嘉義縣', 23.428757, 120.404243, NULL, '608嘉義縣水上鄉中興路81號', '05-2686561', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '綠色商店', '2017-07-16 12:25:30'),
('Eik2MDTlj7DngaPlmInnvqnnuKPnq7nltI7phInpub_ps7Tot684N-iZnw', '立發商店', NULL, '嘉義縣', 23.498257, 120.533188, NULL, '604嘉義縣竹崎鄉鹿滿村鹿鳴路87號', '05-2611145', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '綠色商店', '2017-07-16 12:25:21'),
('Eik2MTPlj7DngaPlmInnvqnnuKPmnLTlrZDluILlsbHpgJrot68yNOiZnw', '一安小吃部「采荷居」', NULL, '嘉義縣', 23.466709, 120.246803, NULL, '613嘉義縣朴子市山通路24之13號', '05-3661255', NULL, NULL, NULL, NULL, 'https://greenliving.epa.gov.tw/GreenLife/Actions/GreenRestaurant/Files/StoreImages/5576f062-0590-47eb-b8b5-a54e418a4a00.jpg', 'https://c1.staticflickr.com/6/5708/30269705752_e791ab13b1_z.jpg', NULL, '環保餐館', '2017-07-16 12:24:52'),
('Eio2MDPlj7DngaPlmInnvqnnuKPmooXlsbHphInkuK3lsbHot68yMjPomZ8', '梅山安順電器', NULL, '嘉義縣', 23.583509, 120.557922, NULL, '603嘉義縣梅山鄉梅南村中山路223號', '05-2624579', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '綠色商店', '2017-07-16 12:25:10'),
('Eio2MjLlj7DngaPlmInnvqnnuKPlpKfmnpfpjq7npaXlkozot68yNDfomZ8', '志明冷氣行', NULL, '嘉義縣', 23.604078, 120.452240, NULL, '622嘉義縣大林鎮西林里祥和路247號', '05-2651347', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '綠色商店', '2017-07-16 12:27:10'),
('Eio2MjPlj7DngaPlmInnvqnnuKPmuqrlj6PphInmsJHnlJ_ooZcxMjXomZ8', '嘉勇電器行', NULL, '嘉義縣', 23.603708, 120.396782, NULL, '623嘉義縣溪口鄉溪東村民生街125號', '05-2695787', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '綠色商店', '2017-07-16 12:27:18'),
('Eio2MjXlj7DngaPlmInnvqnnuKPluIPooovpjq7mlrDljp3ku5Q2MjXomZ8', '佳昌商號', NULL, '嘉義縣', 23.386812, 120.172623, NULL, '625嘉義縣布袋鎮新厝里新厝仔137-9號', '0929292929', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '綠色商店', '2017-07-16 12:27:34'),
('Eio2MTblj7DngaPlmInnvqnnuKPmlrDmuK_phInnpo_lvrfot68xODHomZ8', '來來大賣場', NULL, '嘉義縣', 23.557358, 120.341629, NULL, '616嘉義縣新港鄉福德路181號', '05-3746499', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '綠色商店', '2017-07-16 12:26:46'),
('EiQ2MjPlj7DngaPlmInnvqnnuKPmuqrlj6PphInkuK3mraPot68', '大統超市', NULL, '嘉義縣', 23.600868, 120.392982, NULL, '623嘉義縣溪口鄉溪西村中正路二一九之ㄧ號', '05-2691326', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '綠色商店', '2017-07-16 12:27:14'),
('Eiw2MTLlj7DngaPlmInnvqnnuKPlpKrkv53luILnuKPlupzkupTooZc2OeiZnw', '新鑫生活百貨館', NULL, '嘉義縣', 23.455521, 120.295647, NULL, '612嘉義縣太保市縣府五街69號', '05-3625013', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '綠色商店', '2017-07-16 12:26:06'),
('Eiw2MTPlj7DngaPlmInnvqnnuKPmnLTlrZDluILlhazlnJLkuozooZcyMOiZnw', '一家餐廳', NULL, '嘉義縣', 23.465380, 120.252899, NULL, '613嘉義縣朴子市公園2街20號', '05-3798009', NULL, NULL, NULL, NULL, 'http://pic.pimg.tw/autu/1327923219-3903789546_n.jpg', NULL, NULL, '環保餐館', '2017-07-16 12:24:59'),
('EjA2MDblj7DngaPlmInnvqnnuKPkuK3ln5TphInkuK3lsbHot6_kupTmrrU2OTjomZ8', '中埔九九', NULL, '嘉義縣', 23.451494, 120.464241, NULL, '606嘉義縣中埔鄉和美村中山路五段698-1號', '05-2304599', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '綠色商店', '2017-07-16 12:25:23'),
('EjA2MjHlj7DngaPlmInnvqnnuKPmsJHpm4TphInlu7rlnIvot6_kuInmrrUxNzbomZ8', '生活品', NULL, '嘉義縣', 23.524132, 120.439445, NULL, '621嘉義縣民雄鄉福樂村建國三路176號1樓', '05-2130269', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '綠色商店', '2017-07-16 12:27:01'),
('EjA2MjHlj7DngaPlmInnvqnnuKPmsJHpm4TphInlu7rlnIvot6_kuInmrrUxNzfomZ8', '仁偉書局', NULL, '嘉義縣', 23.524143, 120.439445, NULL, '621嘉義縣民雄鄉頭橋建國路三段177號', '05-2212430', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '綠色商店', '2017-07-16 12:27:04'),
('EjA2MTLlj7DngaPlmInnvqnnuKPlpKrkv53luILkuK3lsbHot6_kuozmrrUxODPomZ8', '昱能企業社', NULL, '嘉義縣', 23.499760, 120.368317, NULL, '612嘉義縣太保市麻寮里中山路2段183號', '05-2376777', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '綠色商店', '2017-07-16 12:26:04'),
('EjE2MTLlj7DngaPlmInnvqnnuKPlpKrkv53luILnpaXlkozkuInot6_mnbHmrrUy6Jmf', '上勝五金百貨', NULL, '嘉義縣', 23.454584, 120.293617, NULL, '612嘉義縣太保市安仁里祥和三路東段2號', '053625378', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '綠色商店', '2017-07-16 12:25:57'),
('EjM2MTLlj7DngaPlmInnvqnnuKPlpKrkv53luILnpaXlkozkuInot6_mnbHmrrUyOTDomZ8', '香夫子麵食館(福臨)', NULL, '嘉義縣', 23.454067, 120.295876, NULL, '612嘉義縣太保市安仁里詳和三路東段290號', '05-3627185', NULL, NULL, NULL, NULL, 'https://greenliving.epa.gov.tw/GreenLife/actions/greenrestaurant/Files/StoreImages/ac2d8835-d0bd-43ce-b57f-dd0ab987f18c.JPG', NULL, NULL, '環保餐館', '2017-07-16 12:24:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `green_store`
--
ALTER TABLE `green_store`
  ADD PRIMARY KEY (`place_id`),
  ADD KEY `location` (`location`);
ALTER TABLE `green_store` ADD FULLTEXT KEY `title_description_tag` (`title`,`description`,`tag`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
