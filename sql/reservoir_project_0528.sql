-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2021-05-28 08:28:22
-- 伺服器版本： 10.4.17-MariaDB
-- PHP 版本： 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `reservoir_project`
--

-- --------------------------------------------------------

--
-- 資料表結構 `history`
--

CREATE TABLE `history` (
  `number` int(11) NOT NULL,
  `date` date NOT NULL,
  `userid` varchar(12) NOT NULL,
  `affect_table` int(11) NOT NULL,
  `affect_rows` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `postcode_area`
--

CREATE TABLE `postcode_area` (
  `city` varchar(15) NOT NULL,
  `district` varchar(15) NOT NULL,
  `area` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `postcode_area`
--

INSERT INTO `postcode_area` (`city`, `district`, `area`) VALUES
('南投縣', '中寮鄉', '中'),
('南投縣', '仁愛鄉', '中'),
('南投縣', '信義鄉', '中'),
('南投縣', '南投市', '中'),
('南投縣', '名間鄉', '中'),
('南投縣', '國姓鄉', '中'),
('南投縣', '埔里鎮', '中'),
('南投縣', '水里鄉', '中'),
('南投縣', '竹山鎮', '中'),
('南投縣', '草屯鎮', '中'),
('南投縣', '集集鎮', '中'),
('南投縣', '魚池鄉', '中'),
('南投縣', '鹿谷鄉', '中'),
('嘉義市', '東區', '南'),
('嘉義市', '西區', '南'),
('嘉義縣', '中埔鄉', '南'),
('嘉義縣', '六腳鄉', '南'),
('嘉義縣', '大埔鄉', '南'),
('嘉義縣', '大林鎮', '南'),
('嘉義縣', '太保市', '南'),
('嘉義縣', '布袋鎮', '南'),
('嘉義縣', '新港鄉', '南'),
('嘉義縣', '朴子市', '南'),
('嘉義縣', '東石鄉', '南'),
('嘉義縣', '梅山鄉', '南'),
('嘉義縣', '民雄鄉', '南'),
('嘉義縣', '水上鄉', '南'),
('嘉義縣', '溪口鄉', '南'),
('嘉義縣', '番路鄉', '南'),
('嘉義縣', '竹崎鄉', '南'),
('嘉義縣', '義竹鄉', '南'),
('嘉義縣', '阿里山鄉', '南'),
('嘉義縣', '鹿草鄉', '南'),
('基隆市', '七堵區', '北'),
('基隆市', '中山區', '北'),
('基隆市', '中正區', '北'),
('基隆市', '仁愛區', '北'),
('基隆市', '信義區', '北'),
('基隆市', '安樂區', '北'),
('基隆市', '暖暖區', '北'),
('宜蘭縣', '三星鄉', '北'),
('宜蘭縣', '五結鄉', '北'),
('宜蘭縣', '冬山鄉', '北'),
('宜蘭縣', '南澳鄉', '北'),
('宜蘭縣', '員山鄉', '北'),
('宜蘭縣', '壯圍鄉', '北'),
('宜蘭縣', '大同鄉', '北'),
('宜蘭縣', '宜蘭市', '北'),
('宜蘭縣', '礁溪鄉', '北'),
('宜蘭縣', '羅東鎮', '北'),
('宜蘭縣', '蘇澳鎮', '北'),
('宜蘭縣', '釣魚臺', '北'),
('宜蘭縣', '頭城鎮', '北'),
('屏東縣', '三地門鄉', '南'),
('屏東縣', '九如鄉', '南'),
('屏東縣', '佳冬鄉', '南'),
('屏東縣', '來義鄉', '南'),
('屏東縣', '內埔鄉', '南'),
('屏東縣', '南州鄉', '南'),
('屏東縣', '屏東市', '南'),
('屏東縣', '崁頂鄉', '南'),
('屏東縣', '恆春鎮', '南'),
('屏東縣', '新園鄉', '南'),
('屏東縣', '新埤鄉', '南'),
('屏東縣', '春日鄉', '南'),
('屏東縣', '東港鎮', '南'),
('屏東縣', '枋寮鄉', '南'),
('屏東縣', '枋山鄉', '南'),
('屏東縣', '林邊鄉', '南'),
('屏東縣', '泰武鄉', '南'),
('屏東縣', '滿州鄉', '南'),
('屏東縣', '潮州鎮', '南'),
('屏東縣', '牡丹鄉', '南'),
('屏東縣', '獅子鄉', '南'),
('屏東縣', '琉球鄉', '南'),
('屏東縣', '瑪家鄉', '南'),
('屏東縣', '竹田鄉', '南'),
('屏東縣', '萬丹鄉', '南'),
('屏東縣', '萬巒鄉', '南'),
('屏東縣', '車城鄉', '南'),
('屏東縣', '里港鄉', '南'),
('屏東縣', '長治鄉', '南'),
('屏東縣', '霧臺鄉', '南'),
('屏東縣', '高樹鄉', '南'),
('屏東縣', '鹽埔鄉', '南'),
('屏東縣', '麟洛鄉', '南'),
('彰化縣', '二林鎮', '中'),
('彰化縣', '二水鄉', '中'),
('彰化縣', '伸港鄉', '中'),
('彰化縣', '北斗鎮', '中'),
('彰化縣', '和美鎮', '中'),
('彰化縣', '員林市', '中'),
('彰化縣', '埔心鄉', '中'),
('彰化縣', '埔鹽鄉', '中'),
('彰化縣', '埤頭鄉', '中'),
('彰化縣', '大城鄉', '中'),
('彰化縣', '大村鄉', '中'),
('彰化縣', '彰化市', '中'),
('彰化縣', '永靖鄉', '中'),
('彰化縣', '溪州鄉', '中'),
('彰化縣', '溪湖鎮', '中'),
('彰化縣', '田中鎮', '中'),
('彰化縣', '田尾鄉', '中'),
('彰化縣', '社頭鄉', '中'),
('彰化縣', '福興鄉', '中'),
('彰化縣', '秀水鄉', '中'),
('彰化縣', '竹塘鄉', '中'),
('彰化縣', '線西鄉', '中'),
('彰化縣', '芬園鄉', '中'),
('彰化縣', '花壇鄉', '中'),
('彰化縣', '芳苑鄉', '中'),
('彰化縣', '鹿港鎮', '中'),
('新北市', '三峽區', '北'),
('新北市', '三芝區', '北'),
('新北市', '三重區', '北'),
('新北市', '中和區', '北'),
('新北市', '五股區', '北'),
('新北市', '八里區', '北'),
('新北市', '土城區', '北'),
('新北市', '坪林區', '北'),
('新北市', '平溪區', '北'),
('新北市', '新店區', '北'),
('新北市', '新莊區', '北'),
('新北市', '板橋區', '北'),
('新北市', '林口區', '北'),
('新北市', '樹林區', '北'),
('新北市', '永和區', '北'),
('新北市', '汐止區', '北'),
('新北市', '泰山區', '北'),
('新北市', '淡水區', '北'),
('新北市', '深坑區', '北'),
('新北市', '烏來區', '北'),
('新北市', '瑞芳區', '北'),
('新北市', '石碇區', '北'),
('新北市', '石門區', '北'),
('新北市', '萬里區', '北'),
('新北市', '蘆洲區', '北'),
('新北市', '貢寮區', '北'),
('新北市', '金山區', '北'),
('新北市', '雙溪區', '北'),
('新北市', '鶯歌區', '北'),
('新竹市', '北區', '北'),
('新竹市', '東區', '北'),
('新竹市', '香山區', '北'),
('新竹縣', '五峰鄉', '北'),
('新竹縣', '北埔鄉', '北'),
('新竹縣', '寶山鄉', '北'),
('新竹縣', '尖石鄉', '北'),
('新竹縣', '峨眉鄉', '北'),
('新竹縣', '新埔鎮', '北'),
('新竹縣', '新豐鄉', '北'),
('新竹縣', '橫山鄉', '北'),
('新竹縣', '湖口鄉', '北'),
('新竹縣', '竹北市', '北'),
('新竹縣', '竹東鎮', '北'),
('新竹縣', '芎林鄉', '北'),
('新竹縣', '關西鎮', '北'),
('桃園市', '中壢區', '北'),
('桃園市', '八德區', '北'),
('桃園市', '大園區', '北'),
('桃園市', '大溪區', '北'),
('桃園市', '平鎮區', '北'),
('桃園市', '復興區', '北'),
('桃園市', '新屋區', '北'),
('桃園市', '桃園區', '北'),
('桃園市', '楊梅區', '北'),
('桃園市', '蘆竹區', '北'),
('桃園市', '觀音區', '北'),
('桃園市', '龍潭區', '北'),
('桃園市', '龜山區', '北'),
('臺中市', '中區', '中'),
('臺中市', '北區', '中'),
('臺中市', '北屯區', '中'),
('臺中市', '南區', '中'),
('臺中市', '南屯區', '中'),
('臺中市', '后里區', '中'),
('臺中市', '和平區', '中'),
('臺中市', '外埔區', '中'),
('臺中市', '大安區', '中'),
('臺中市', '大甲區', '中'),
('臺中市', '大肚區', '中'),
('臺中市', '大里區', '中'),
('臺中市', '大雅區', '中'),
('臺中市', '太平區', '中'),
('臺中市', '新社區', '中'),
('臺中市', '東勢區', '中'),
('臺中市', '東區', '中'),
('臺中市', '梧棲區', '中'),
('臺中市', '沙鹿區', '中'),
('臺中市', '清水區', '中'),
('臺中市', '潭子區', '中'),
('臺中市', '烏日區', '中'),
('臺中市', '石岡區', '中'),
('臺中市', '神岡區', '中'),
('臺中市', '西區', '中'),
('臺中市', '西屯區', '中'),
('臺中市', '豐原區', '中'),
('臺中市', '霧峰區', '中'),
('臺中市', '龍井區', '中'),
('臺北市', '中山區', '北'),
('臺北市', '中正區', '北'),
('臺北市', '信義區', '北'),
('臺北市', '內湖區', '北'),
('臺北市', '北投區', '北'),
('臺北市', '南港區', '北'),
('臺北市', '士林區', '北'),
('臺北市', '大同區', '北'),
('臺北市', '大安區', '北'),
('臺北市', '文山區', '北'),
('臺北市', '松山區', '北'),
('臺北市', '萬華區', '北'),
('臺南市', '七股區', '南'),
('臺南市', '下營區', '南'),
('臺南市', '中西區', '南'),
('臺南市', '仁德區', '南'),
('臺南市', '佳里區', '南'),
('臺南市', '六甲區', '南'),
('臺南市', '北區', '南'),
('臺南市', '北門區', '南'),
('臺南市', '南化區', '南'),
('臺南市', '南區', '南'),
('臺南市', '善化區', '南'),
('臺南市', '大內區', '南'),
('臺南市', '學甲區', '南'),
('臺南市', '安南區', '南'),
('臺南市', '安定區', '南'),
('臺南市', '安平區', '南'),
('臺南市', '官田區', '南'),
('臺南市', '將軍區', '南'),
('臺南市', '山上區', '南'),
('臺南市', '左鎮區', '南'),
('臺南市', '後壁區', '南'),
('臺南市', '新化區', '南'),
('臺南市', '新市區', '南'),
('臺南市', '新營區', '南'),
('臺南市', '東區', '南'),
('臺南市', '東山區', '南'),
('臺南市', '柳營區', '南'),
('臺南市', '楠西區', '南'),
('臺南市', '歸仁區', '南'),
('臺南市', '永康區', '南'),
('臺南市', '玉井區', '南'),
('臺南市', '白河區', '南'),
('臺南市', '西港區', '南'),
('臺南市', '關廟區', '南'),
('臺南市', '鹽水區', '南'),
('臺南市', '麻豆區', '南'),
('臺南市', '龍崎區', '南'),
('臺東縣', '卑南鄉', '東'),
('臺東縣', '大武鄉', '東'),
('臺東縣', '太麻里鄉', '東'),
('臺東縣', '延平鄉', '東'),
('臺東縣', '成功鎮', '東'),
('臺東縣', '東河鄉', '東'),
('臺東縣', '池上鄉', '東'),
('臺東縣', '海端鄉', '東'),
('臺東縣', '綠島鄉', '東'),
('臺東縣', '臺東市', '東'),
('臺東縣', '蘭嶼鄉', '東'),
('臺東縣', '達仁鄉', '東'),
('臺東縣', '金峰鄉', '東'),
('臺東縣', '長濱鄉', '東'),
('臺東縣', '關山鎮', '東'),
('臺東縣', '鹿野鄉', '東'),
('花蓮縣', '光復鄉', '東'),
('花蓮縣', '卓溪鄉', '東'),
('花蓮縣', '吉安鄉', '東'),
('花蓮縣', '壽豐鄉', '東'),
('花蓮縣', '富里鄉', '東'),
('花蓮縣', '新城鄉', '東'),
('花蓮縣', '玉里鎮', '東'),
('花蓮縣', '瑞穗鄉', '東'),
('花蓮縣', '秀林鄉', '東'),
('花蓮縣', '花蓮市', '東'),
('花蓮縣', '萬榮鄉', '東'),
('花蓮縣', '豐濱鄉', '東'),
('花蓮縣', '鳳林鎮', '東'),
('苗栗縣', '三灣鄉', '中'),
('苗栗縣', '三義鄉', '中'),
('苗栗縣', '公館鄉', '中'),
('苗栗縣', '卓蘭鎮', '中'),
('苗栗縣', '南庄鄉', '中'),
('苗栗縣', '大湖鄉', '中'),
('苗栗縣', '後龍鎮', '中'),
('苗栗縣', '泰安鄉', '中'),
('苗栗縣', '獅潭鄉', '中'),
('苗栗縣', '竹南鎮', '中'),
('苗栗縣', '苑裡鎮', '中'),
('苗栗縣', '苗栗市', '中'),
('苗栗縣', '西湖鄉', '中'),
('苗栗縣', '通霄鎮', '中'),
('苗栗縣', '造橋鄉', '中'),
('苗栗縣', '銅鑼鄉', '中'),
('苗栗縣', '頭份市', '中'),
('苗栗縣', '頭屋鄉', '中'),
('雲林縣', '二崙鄉', '中'),
('雲林縣', '元長鄉', '中'),
('雲林縣', '北港鎮', '中'),
('雲林縣', '口湖鄉', '中'),
('雲林縣', '古坑鄉', '中'),
('雲林縣', '四湖鄉', '中'),
('雲林縣', '土庫鎮', '中'),
('雲林縣', '大埤鄉', '中'),
('雲林縣', '崙背鄉', '中'),
('雲林縣', '斗六市', '中'),
('雲林縣', '斗南鎮', '中'),
('雲林縣', '東勢鄉', '中'),
('雲林縣', '林內鄉', '中'),
('雲林縣', '水林鄉', '中'),
('雲林縣', '臺西鄉', '中'),
('雲林縣', '莿桐鄉', '中'),
('雲林縣', '虎尾鎮', '中'),
('雲林縣', '褒忠鄉', '中'),
('雲林縣', '西螺鎮', '中'),
('雲林縣', '麥寮鄉', '中'),
('高雄市', '三民區', '南'),
('高雄市', '仁武區', '南'),
('高雄市', '內門區', '南'),
('高雄市', '六龜區', '南'),
('高雄市', '前金區', '南'),
('高雄市', '前鎮區', '南'),
('高雄市', '大寮區', '南'),
('高雄市', '大樹區', '南'),
('高雄市', '大社區', '南'),
('高雄市', '小港區', '南'),
('高雄市', '岡山區', '南'),
('高雄市', '左營區', '南'),
('高雄市', '彌陀區', '南'),
('高雄市', '新興區', '南'),
('高雄市', '旗山區', '南'),
('高雄市', '旗津區', '南'),
('高雄市', '杉林區', '南'),
('高雄市', '林園區', '南'),
('高雄市', '桃源區', '南'),
('高雄市', '梓官區', '南'),
('高雄市', '楠梓區', '南'),
('高雄市', '橋頭區', '南'),
('高雄市', '永安區', '南'),
('高雄市', '湖內區', '南'),
('高雄市', '燕巢區', '南'),
('高雄市', '田寮區', '南'),
('高雄市', '甲仙區', '南'),
('高雄市', '美濃區', '南'),
('高雄市', '苓雅區', '南'),
('高雄市', '茂林區', '南'),
('高雄市', '茄萣區', '南'),
('高雄市', '路竹區', '南'),
('高雄市', '那瑪夏區', '南'),
('高雄市', '阿蓮區', '南'),
('高雄市', '鳥松區', '南'),
('高雄市', '鳳山區', '南'),
('高雄市', '鹽埕區', '南'),
('高雄市', '鼓山區', '南');

-- --------------------------------------------------------

--
-- 資料表結構 `reservoir`
--

CREATE TABLE `reservoir` (
  `reservoir_id` varchar(5) NOT NULL,
  `reservoir_name` varchar(20) NOT NULL,
  `city` varchar(15) NOT NULL,
  `district` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `reservoir`
--

INSERT INTO `reservoir` (`reservoir_id`, `reservoir_name`, `city`, `district`) VALUES
('10201', '石門水庫', '桃園市', '龍潭區'),
('10204', '新山水庫', '基隆市', '安樂區'),
('10205', '翡翠水庫', '新北市', '新店區'),
('10401', '寶山水庫', '新竹縣', '寶山鄉'),
('10405', '寶山第二水庫', '新竹縣', '寶山鄉'),
('10501', '永和山水庫', '苗栗縣', '頭份市'),
('10601', '明德水庫', '苗栗縣', '頭屋鄉'),
('20101', '鯉魚潭水庫', '苗栗縣', '卓蘭鎮'),
('20201', '德基水庫', '臺中市', '和平區'),
('20202', '石岡壩', '臺中市', '石岡區'),
('20501', '霧社水庫', '南投縣', '仁愛鄉'),
('20502', '日月潭水庫', '南投縣', '魚池鄉'),
('20509', '湖山水庫', '雲林縣', '斗六市'),
('30301', '仁義潭水庫', '嘉義縣', '番路鄉'),
('30302', '蘭潭水庫', '嘉義市', '東區'),
('30401', '白河水庫', '臺南市', '白河區'),
('30501', '烏山頭水庫', '臺南市', '六甲區'),
('30502', '曾文水庫', '嘉義縣', '大埔鄉'),
('30503', '南化水庫', '臺南市', '南化區'),
('30802', '阿公店水庫', '高雄市', '燕巢區'),
('31201', '牡丹水庫', '屏東縣', '牡丹鄉');

-- --------------------------------------------------------

--
-- 資料表結構 `reservoir_water_condition`
--

CREATE TABLE `reservoir_water_condition` (
  `reservoir_id` char(5) NOT NULL,
  `date` date NOT NULL,
  `effective_water_storage` float NOT NULL,
  `effective_capacity` float NOT NULL,
  `outflow` float DEFAULT NULL,
  `inflow` float DEFAULT NULL,
  `reservior_rainfall` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `userid` varchar(12) NOT NULL,
  `password` text NOT NULL,
  `nickname` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`number`),
  ADD KEY `userid` (`userid`);

--
-- 資料表索引 `postcode_area`
--
ALTER TABLE `postcode_area`
  ADD PRIMARY KEY (`city`,`district`);

--
-- 資料表索引 `reservoir`
--
ALTER TABLE `reservoir`
  ADD PRIMARY KEY (`reservoir_id`),
  ADD KEY `city` (`city`,`district`);

--
-- 資料表索引 `reservoir_water_condition`
--
ALTER TABLE `reservoir_water_condition`
  ADD PRIMARY KEY (`reservoir_id`,`date`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `history`
--
ALTER TABLE `history`
  MODIFY `number` int(11) NOT NULL AUTO_INCREMENT;

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `history_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制式 `reservoir`
--
ALTER TABLE `reservoir`
  ADD CONSTRAINT `reservoir_ibfk_1` FOREIGN KEY (`city`,`district`) REFERENCES `postcode_area` (`city`, `district`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制式 `reservoir_water_condition`
--
ALTER TABLE `reservoir_water_condition`
  ADD CONSTRAINT `reservoir_water_condition_ibfk_1` FOREIGN KEY (`reservoir_id`) REFERENCES `reservoir` (`reservoir_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
