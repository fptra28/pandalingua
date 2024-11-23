-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2024 at 01:21 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pandalingua`
--

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `question_text` text NOT NULL,
  `option_a` varchar(255) NOT NULL,
  `option_b` varchar(255) NOT NULL,
  `option_c` varchar(255) NOT NULL,
  `option_d` varchar(255) NOT NULL,
  `correct_option` enum('a','b','c','d') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `quiz_id`, `question_text`, `option_a`, `option_b`, `option_c`, `option_d`, `correct_option`, `created_at`) VALUES
(2, 1, 'Apa arti dari kata 你好 (Nǐ hǎo)?', 'Terima kasih', 'Halo', 'Selamat tinggal', 'Maaf', 'a', '2024-11-23 12:12:45');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'adminLaura', 'adminLaura', '2024-11-23 10:46:17');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course`
--

CREATE TABLE `tbl_course` (
  `course_id` int(11) NOT NULL,
  `imgCourse` text NOT NULL,
  `title` varchar(100) NOT NULL COMMENT 'Judul kursus',
  `level` enum('Beginner','Intermediate','Advanced') NOT NULL COMMENT 'Tingkatan kursus',
  `description` text NOT NULL COMMENT 'Deskripsi kursus',
  `total_lessons` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'Tanggal dan waktu pembuatan kursus'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_course`
--

INSERT INTO `tbl_course` (`course_id`, `imgCourse`, `title`, `level`, `description`, `total_lessons`, `created_at`) VALUES
(1, '1134b0525df03926c824.png', 'Mandarin Beginner', 'Beginner', '', 10, '2024-11-23 10:57:31');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dictionary`
--

CREATE TABLE `tbl_dictionary` (
  `id` int(11) NOT NULL,
  `Simplified` varchar(10) NOT NULL,
  `Traditional` varchar(10) NOT NULL,
  `Pinyin` varchar(50) NOT NULL,
  `English` text NOT NULL,
  `Indonesian` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_dictionary`
--

INSERT INTO `tbl_dictionary` (`id`, `Simplified`, `Traditional`, `Pinyin`, `English`, `Indonesian`) VALUES
(1, '爱好', '愛好', 'ài hào', 'hobby', 'hobi'),
(2, '八', '八', 'bā', 'eight', 'delapan'),
(3, '爸爸', '爸爸', 'bà ba', 'dad', 'ayah'),
(4, '吧', '吧', 'ba', '(a particle used at the end of the sentence to indicate suggestion or instruction)', '(partikel yang digunakan di akhir kalimat untuk menunjukkan saran atau instruksi)'),
(5, '白', '白', 'bái', 'white', 'putih'),
(6, '白天', '白天', 'bái tiān', 'daytime', 'siang hari'),
(7, '百', '百', 'bǎi', 'hundred', 'seratus'),
(8, '班', '班', 'bān', 'class', 'kelas'),
(9, '半', '半', 'bàn', 'half', 'setengah'),
(10, '半年', '半年', 'bàn nián', 'half a year', 'setengah tahun'),
(11, '半天', '半天', 'bàn tiān', 'half day; long time', 'setengah hari; waktu yang lama'),
(12, '帮', '幫', 'bāng', 'to help', 'membantu'),
(13, '帮忙', '幫忙', 'bāng máng', 'to help', 'membantu'),
(14, '包', '包', 'bāo', 'bag; to pack', 'tas; membungkus'),
(15, '包子', '包子', 'bāo zi', 'bun', 'bun'),
(16, '杯', '杯', 'bēi', 'cup (measure word)', 'cangkir (kata ukur)'),
(17, '杯子', '杯子', 'bēi zi', 'cup', 'cangkir'),
(18, '北', '北', 'běi', 'north', 'utara'),
(19, '北边', '北邊', 'běi bian', 'north side', 'sisi utara'),
(20, '北京', '北京', 'Běi jīng', 'Beijing', 'Beijing'),
(21, '本', '本', 'běn', '(measure word for books)', '(kata ukur untuk buku)'),
(22, '本子', '本子', 'běn zi', 'note book', 'buku catatan'),
(23, '比', '比', 'bǐ', 'compare', 'membandingkan'),
(24, '别', '別', 'bié', 'do not', 'jangan'),
(25, '别的', '別的', 'bié de', 'other', 'yang lain'),
(26, '别人', '別人', 'bié rén', 'other people', 'orang lain'),
(27, '病', '病', 'bìng', 'sick; disease', 'sakit; penyakit'),
(28, '病人', '病人', 'bìng rén', 'patient', 'pasien'),
(29, '不大', '不大', 'bú dà', 'not big; not very', 'tidak besar; tidak begitu'),
(30, '不对', '不對', 'bú duì', 'not right; wrong', 'tidak benar; salah'),
(31, '不客气', '不客氣', 'bú kè qì', 'you\'re welcome', 'sama-sama'),
(32, '不用', '不用', 'bú yòng', 'no need to', 'tidak perlu'),
(33, '不', '不', 'bù', 'do not', 'tidak'),
(34, '菜', '菜', 'cài', 'dish', 'hidangan; sayur'),
(35, '茶', '茶', 'chá', 'tea', 'teh'),
(36, '差', '差', 'chà', 'lack of; bad', 'kurang; buruk'),
(37, '常', '常', 'cháng', 'often', 'sering'),
(38, '常常', '常常', 'cháng cháng', 'often', 'sering'),
(39, '唱', '唱', 'chàng', 'sing', 'bernyanyi'),
(40, '唱歌', '唱歌', 'chàng gē', 'to sing a song', 'menyanyikan lagu'),
(41, '车', '車', 'chē', 'vehicle', 'kendaraan'),
(42, '车票', '車票', 'chē piào', 'bus or train ticket', 'tiket bus atau kereta'),
(43, '车上', '車上', 'chē shang', 'in the car', 'di dalam mobil'),
(44, '车站', '車站', 'chē zhàn', 'station', 'stasiun'),
(45, '吃', '吃', 'chī', 'eat', 'makan'),
(46, '吃饭', '吃飯', 'chī fàn', 'eat', 'makan (biasanya berarti makan makanan utama)'),
(47, '出', '出', 'chū', 'out', 'keluar'),
(48, '出来', '出來', 'chū lái', 'come out', 'keluar'),
(49, '出去', '出去', 'chū qù', 'go out', 'pergi keluar'),
(50, '穿', '穿', 'chuān', 'wear', 'memakai'),
(51, '床', '床', 'chuáng', 'bed', 'tempat tidur'),
(52, '次', '次', 'cì', 'times', 'kali'),
(53, '从', '從', 'cóng', 'from', 'dari'),
(54, '错', '錯', 'cuò', 'wrong', 'salah'),
(55, '打', '打', 'dǎ', 'hit', 'memukul'),
(56, '打车', '打車', 'dǎ chē', 'take a taxi', 'naik taksi'),
(57, '打电话', '打電話', 'dǎ diàn huà', 'make a call', 'menelepon'),
(58, '打开', '打開', 'dǎ kāi', 'to open; turn on', 'membuka; menyalakan'),
(59, '打球', '打球', 'dǎ qiú', 'play ball', 'bermain bola'),
(60, '大', '大', 'dà', 'big', 'besar'),
(61, '大学', '大學', 'dà xué', 'university', 'universitas'),
(62, '大学生', '大學生', 'dà xué shēng', 'college student', 'mahasiswa'),
(63, '到', '到', 'dào', 'to; arrive; until', 'sampai; tiba'),
(64, '得到', '得到', 'dé dào', 'get; acquire', 'mendapatkan; memperoleh'),
(65, '地', '地', 'de', '(a particle used to explain verb)', '(partikel yang digunakan untuk menjelaskan kata kerja)'),
(66, '的', '的', 'de', '(a particle used behind an attributive)', '(partikel yang digunakan setelah atributif)'),
(67, '等', '等', 'děng', 'wait', 'menunggu'),
(68, '地', '地', 'dì', 'ground', 'tanah'),
(69, '地点', '地點', 'dì diǎn', 'location', 'lokasi'),
(70, '地方', '地方', 'dì fang', 'place', 'tempat'),
(71, '地上', '地上', 'dì shang', 'on the ground', 'di atas tanah'),
(72, '地图', '地圖', 'dìtú', 'map', 'peta'),
(73, '弟弟', '弟弟', 'dìdi', 'younger brother', 'adik laki-laki'),
(74, '第二', '第二', 'dì èr', 'second', 'kedua'),
(75, '点', '點', 'diǎn', 'o\'clock; point', 'jam; titik'),
(76, '电', '電', 'diàn', 'electricity', 'listrik'),
(77, '电话', '電話', 'diàn huà', 'phone', 'telepon'),
(78, '电脑', '電腦', 'diàn nǎo', 'computer', 'computer'),
(79, '电视', '電視', 'diàn shì', 'tv', 'televisi'),
(80, '电视机', '電視機', 'diàn shì jī', 'tv set', 'set televisi'),
(81, '电影', '電影', 'diàn yǐng', 'movie', 'film'),
(82, '电影院', '電影院', 'diàn yǐng yuàn', 'cinema', 'bioskop'),
(83, '东', '東', 'dōng', 'east', 'timur'),
(84, '东边', '東邊', 'dōng bian', 'east side', 'sisi timur'),
(85, '东西', '東西', 'dōng xi', 'object; stuff', 'benda; barang'),
(86, '动', '動', 'dòng', 'move', 'bergerak'),
(87, '动作', '動作', 'dòng zuò', 'action', 'tindakan'),
(88, '都', '都', 'dōu', 'all', 'semua'),
(89, '读', '讀', 'dú', 'read', 'membaca'),
(90, '读书', '讀書', 'dú shū', 'to read a book', 'membaca buku'),
(91, '对', '對', 'duì', 'correct', 'benar'),
(92, '对不起', '對不起', 'duì bu qǐ', 'sorry', 'maaf'),
(93, '多', '多', 'duō', 'many', 'banyak'),
(94, '多少', '多少', 'duō shao', 'how many', 'berapa banyak'),
(95, '饿', '餓', 'è', 'hungry', 'lapar'),
(96, '儿子', '兒子', 'ér zi', 'son', 'anak laki-laki'),
(97, '二', '二', 'èr', 'two', 'dua'),
(98, '饭', '飯', 'fàn', 'rice', 'nasi'),
(99, '饭店', '飯店', 'fàn diàn', 'restaurant', 'restoran'),
(100, '房间', '房間', 'fáng jiān', 'room', 'kamar'),
(101, '房子', '房子', 'fáng zi', 'house', 'rumah'),
(102, '放', '放', 'fàng', 'put', 'meletakkan'),
(103, '放假', '放假', 'fàng jià', 'holiday', 'liburan'),
(104, '放学', '放學', 'fàng xué', 'after school', 'setelah sekolah'),
(105, '飞', '飛', 'fēi', 'fly', 'terbang'),
(106, '飞机', '飛機', 'fēi jī', 'aircraft; plane', 'pesawat terbang'),
(107, '非常', '非常', 'fēi cháng', 'very', 'sangat'),
(108, '分', '分', 'fēn', 'minute', 'menit'),
(109, '风', '風', 'fēng', 'wind', 'angin'),
(110, '干', '幹', 'gàn', 'dry', 'kering'),
(111, '干净', '乾淨', 'gān jìng', 'clean', 'bersih'),
(112, '干', '幹', 'gàn', 'do', 'melakukan'),
(113, '干什么', '幹什麼', 'gàn shén me', 'what to do', 'apa yang harus dilakukan'),
(114, '高', '高', 'gāo', 'tall; high', 'tinggi'),
(115, '高兴', '高興', 'gāo xìng', 'happy', 'bahagia'),
(116, '告诉', '告訴', 'gào su', 'tell', 'memberitahu'),
(117, '哥哥', '哥哥', 'gē ge', 'older brother', 'kakak laki-laki'),
(118, '歌', '歌', 'gē', 'song', 'lagu'),
(119, '个', '個', 'gè', '(general measure word)', '(kata ukur umum)'),
(120, '给', '給', 'gěi', 'give', 'memberi'),
(121, '跟', '跟', 'gēn', 'with', 'dengan'),
(122, '工人', '工人', 'gōng rén', 'worker', 'pekerja'),
(123, '工作', '工作', 'gōng zuò', 'to work; job', 'bekerja; pekerjaan'),
(124, '关', '關', 'guān', 'to close; turn off', 'menutup; mematikan'),
(125, '关上', '關上', 'guān shang', 'to close; turn off', 'menutup; mematikan'),
(126, '贵', '貴', 'guì', 'expensive', 'mahal'),
(127, '国', '國', 'guó', 'country', 'negara'),
(128, '国家', '國家', 'guó jiā', 'country', 'negara'),
(129, '国外', '國外', 'guó wài', 'abroad', 'luar negeri'),
(130, '过', '過', 'guò', 'to cross; to pass', 'menyeberang; melewati'),
(131, '还', '還', 'hái', 'also; still', 'juga; masih'),
(132, '还是', '還是', 'hái shi', 'or', 'atau'),
(133, '还有', '還有', 'hái yǒu', 'and also', 'dan juga'),
(134, '孩子', '孩子', 'hái zi', 'child', 'anak'),
(135, '汉语', '漢語', 'Hàn yǔ', 'Chinese', 'bahasa Mandarin'),
(136, '汉字', '漢字', 'Hàn zì', 'Chinese character', 'karakter Tionghoa'),
(137, '好', '好', 'hǎo', 'great; good', 'hebat; baik'),
(138, '好吃', '好吃', 'hào chī', 'delicious', 'enak'),
(139, '好看', '好看', 'hǎo kàn', 'good looking', 'tampan; cantik'),
(140, '好听', '好聽', 'hǎo tīng', 'nice (to listen)', 'enak didengar'),
(141, '好玩儿', '好玩兒', 'hǎo wánr', 'fun', 'menyenangkan'),
(142, '号', '號', 'hào', 'number; date', 'nomor; tanggal'),
(143, '喝', '喝', 'hē', 'drink', 'minum'),
(144, '和', '和', 'hé', 'with; and', 'dengan; dan'),
(145, '很', '很', 'hěn', 'very', 'sangat'),
(146, '后', '後', 'hòu', 'behind; after', 'di belakang; setelah'),
(147, '后边', '後邊', 'hòu bian', 'back side', 'sisi belakang'),
(148, '后天', '後天', 'hòu tiān', 'the day after tomorrow', 'lusa'),
(149, '花', '花', 'huā', 'flower', 'bunga'),
(150, '话', '話', 'huà', 'words', 'kata-kata'),
(151, '坏', '壞', 'huài', 'bad; broken', 'buruk; rusak'),
(152, '还', '還', 'huán', 'return', 'mengembalikan'),
(153, '回', '回', 'huí', 'back to', 'kembali ke'),
(154, '回答', '回答', 'huídá', 'to answer', 'menjawab'),
(155, '回到', '回到', 'huí dào', 'back to', 'kembali ke'),
(156, '回家', '回家', 'huí jiā', 'come back home; go home', 'pulang ke rumah; pergi ke rumah'),
(157, '回来', '回來', 'huí lái', 'come back', 'kembali'),
(158, '回去', '回去', 'huí qù', 'go back', 'pergi kembali'),
(159, '会', '會', 'huì', 'can; be able to', 'bisa; mampu'),
(160, '火车', '火車', 'huǒ chē', 'train', 'kereta api'),
(161, '机场', '機場', 'jī chǎng', 'airport', 'bandara'),
(162, '机票', '機票', 'jī piào', 'plane tickets', 'tiket pesawat'),
(163, '鸡蛋', '雞蛋', 'jī dàn', 'chicken egg', 'telur ayam'),
(164, '几', '幾', 'jǐ', 'a few', 'beberapa'),
(165, '记', '記', 'jì', 'remember', 'ingat'),
(166, '记得', '記得', 'jì de', 'remember', 'ingat'),
(167, '记住', '記住', 'jì zhù', 'remember', 'ingat'),
(168, '家', '家', 'jiā', 'family; home', 'keluarga; rumah'),
(169, '家里', '家裡', 'jiā li', 'at home', 'di rumah'),
(170, '家人', '家人', 'jiā rén', 'family', 'keluarga'),
(171, '间', '間', 'jiān', 'room', 'ruangan'),
(172, '见', '見', 'jiàn', 'meet', 'bertemu'),
(173, '见面', '見面', 'jiàn miàn', 'meet', 'bertemu'),
(174, '教', '教', 'jiào', 'teach', 'mengajar'),
(175, '叫', '叫', 'jiào', 'call', 'memanggil'),
(176, '教学楼', '教學樓', 'jiào xué lóu', 'classroom building', 'gedung kelas'),
(177, '姐姐', '姐姐', 'jiě jie', 'older sister', 'kakak perempuan'),
(178, '介绍', '介紹', 'jiè shào', 'introduce; introduction', 'memperkenalkan; pengenalan'),
(179, '今年', '今年', 'jīn nián', 'this year', 'tahun ini'),
(180, '今天', '今天', 'jīn tiān', 'today', 'hari ini'),
(181, '进', '進', 'jìn', 'enter', 'masuk'),
(182, '进来', '進來', 'jìn lái', 'come in', 'masuk'),
(183, '进去', '進去', 'jìn qù', 'go in', 'pergi masuk'),
(184, '九', '九', 'jiǔ', 'nine', 'sembilan'),
(185, '就', '就', 'jiù', '(indicate summary or result)', '(menunjukkan ringkasan atau hasil)'),
(186, '觉得', '覺得', 'jué de', 'feel', 'merasa'),
(187, '开', '開', 'kāi', 'open; drive', 'membuka; mengemudikan'),
(188, '开车', '開車', 'kāi chē', 'drive', 'mengemudikan'),
(189, '开会', '開會', 'kāi huì', 'have a meeting', 'mengadakan pertemuan'),
(190, '开玩笑', '開玩笑', 'kāi wán xiào', 'joking', 'bercanda'),
(191, '看', '看', 'kàn', 'look', 'melihat'),
(192, '看病', '看病', 'kàn bìng', 'see a doctor', 'berobat'),
(193, '看到', '看到', 'kàn dào', 'see', 'melihat'),
(194, '看见', '看見', 'kàn jiàn', 'see', 'melihat'),
(195, '考', '考', 'kǎo', 'test', 'ujian'),
(196, '考试', '考試', 'kǎo shì', 'examination', 'ujian'),
(197, '渴', '渴', 'kě', 'thirsty', 'haus'),
(198, '课', '課', 'kè', 'class; lesson', 'kelas; pelajaran'),
(199, '课本', '課本', 'kè běn', 'textbook', 'buku teks'),
(200, '课文', '課文', 'kè wén', 'text', 'teks'),
(201, '口', '口', 'kǒu', 'mouth', 'mulut'),
(202, '块', '塊', 'kuài', 'piece (measure word)', 'potong (kata ukur)'),
(203, '快', '快', 'kuài', 'fast', 'cepat'),
(204, '来', '來', 'lái', 'come', 'datang'),
(205, '来到', '來到', 'lái dào', 'come to', 'datang ke'),
(206, '老', '老', 'lǎo', 'old', 'tua'),
(207, '老人', '老人', 'lǎo rén', 'old people', 'orang tua'),
(208, '老师', '老師', 'lǎo shī', 'teacher', 'guru'),
(209, '了', '了', 'le', 'already', 'sudah'),
(210, '累', '累', 'lèi', 'tired', 'lelah'),
(211, '冷', '冷', 'lěng', 'cold', 'dingin'),
(212, '里', '裡', 'lǐ', 'in', 'di'),
(213, '里边', '裡邊', 'lǐ bian', 'inside', 'di dalam'),
(214, '两', '兩', 'liǎng', 'two', 'dua'),
(215, '零', '零', 'líng', 'zero', 'nol'),
(216, '六', '六', 'liù', 'six', 'enam'),
(217, '楼', '樓', 'lóu', 'floor', 'lantai'),
(218, '楼上', '樓上', 'lóu shàng', 'upstairs', 'lantai atas'),
(219, '楼下', '樓下', 'lóu xià', 'downstairs', 'lantai bawah'),
(220, '路', '路', 'lù', 'road', 'jalan'),
(221, '路口', '路口', 'lù kǒu', 'intersection', 'persimpangan'),
(222, '路上', '路上', 'lù shang', 'on the road', 'di jalan'),
(223, '妈妈', '媽媽', 'mā ma', 'mother', 'ibu'),
(224, '马路', '馬路', 'mǎ lù', 'road', 'jalan raya'),
(225, '马上', '馬上', 'mǎ shàng', 'immediately', 'segera'),
(226, '吗', '嗎', 'ma', 'is it', 'apakah'),
(227, '买', '買', 'mǎi', 'buy', 'beli'),
(228, '慢', '慢', 'màn', 'slow', 'lambat'),
(229, '忙', '忙', 'máng', 'busy', 'sibuk'),
(230, '毛', '毛', 'máo', '(measure word for money)', '(kata ukur untuk uang)'),
(231, '没', '沒', 'méi', 'not', 'tidak'),
(232, '没关系', '沒關係', 'méi guān xi', 'it\'s ok', 'tidak masalah'),
(233, '没什么', '沒什麼', 'méi shén me', 'it\'s nothing', 'tidak ada apa-apa'),
(234, '没事儿', '沒事兒', 'méi shìr', 'it\'s okay', 'tidak apa-apa'),
(235, '没有', '沒有', 'méi yǒu', 'don\'t have', 'tidak ada'),
(236, '妹妹', '妹妹', 'mèi mei', 'younger sister', 'adik perempuan'),
(237, '门', '門', 'mén', 'door', 'pintu'),
(238, '门口', '門口', 'mén kǒu', 'entrance', 'pintu masuk'),
(239, '门票', '門票', 'mén piào', 'tickets', 'tiket'),
(240, '朋友们', '朋友們', 'péng you men', 'friends', 'teman-teman'),
(241, '米饭', '米飯', 'mǐ fàn', 'rice', 'nasi'),
(242, '面包', '麵包', 'miàn bāo', 'bread', 'roti'),
(243, '面条儿', '麵條兒', 'miàn tiáor', 'noodles', 'mie'),
(244, '名字', '名字', 'míng zi', 'first name', 'nama depan'),
(245, '明白', '明白', 'míng bai', 'understand', 'mengerti'),
(246, '明年', '明年', 'míng nián', 'next year', 'tahun depan'),
(247, '明天', '明天', 'míng tiān', 'tomorrow', 'besok'),
(248, '拿', '拿', 'ná', 'take', 'ambil'),
(249, '哪', '哪', 'nǎ', 'which', 'yang mana'),
(250, '哪里', '哪裡', 'nǎ lǐ', 'where', 'di mana'),
(251, '哪儿', '哪兒', 'nǎr', 'where', 'di mana'),
(252, '哪些', '哪些', 'nǎ xiē', 'which', 'yang mana'),
(253, '那', '那', 'nà', 'that', 'itu'),
(254, '那边', '那邊', 'nà biān', 'over there', 'di sana'),
(255, '那里', '那裡', 'nà lǐ', 'there', 'di sana'),
(256, '那儿', '那兒', 'nàr', 'there', 'di sana'),
(257, '那些', '那些', 'nà xiē', 'those', 'itu'),
(258, '奶', '奶', 'nǎi', 'milk', 'susu'),
(259, '奶奶', '奶奶', 'nǎi nai', 'grandmother', 'nenek'),
(260, '男', '男', 'nán', 'male', 'laki-laki'),
(261, '男孩儿', '男孩兒', 'nán háir', 'boy', 'anak laki-laki'),
(262, '男朋友', '男朋友', 'nán péng you', 'boyfriend', 'pacar pria'),
(263, '男人', '男人', 'nán rén', 'man', 'pria'),
(264, '男生', '男生', 'nán shēng', 'school boy', 'anak laki-laki'),
(265, '南', '南', 'nán', 'south', 'selatan'),
(266, '南边', '南邊', 'nán bian', 'south side', 'sisi selatan'),
(267, '难', '難', 'nán', 'difficult', 'sulit'),
(268, '呢', '呢', 'ne', 'what', 'apa'),
(269, '能', '能', 'néng', 'can', 'bisa'),
(270, '你', '你', 'nǐ', 'you', 'kamu'),
(271, '你们', '你們', 'nǐ men', 'you guys', 'kalian'),
(272, '年', '年', 'nián', 'year', 'tahun'),
(273, '您', '您', 'nín', 'you (polite)', 'Anda'),
(274, '牛奶', '牛奶', 'niú nǎi', 'cow milk', 'susu sapi'),
(275, '女', '女', 'nǚ', 'female', 'perempuan'),
(276, '女儿', '女兒', 'nǚ\'ér', 'daughter', 'putri'),
(277, '女孩儿', '女孩兒', 'nǚ háir', 'girl', 'anak perempuan'),
(278, '女朋友', '女朋友', 'nǚ péng you', 'girlfriend', 'pacar wanita'),
(279, '女人', '女人', 'nǚ rén', 'woman', 'wanita'),
(280, '女生', '女生', 'nǚ shēng', 'schoolgirl', 'siswi'),
(281, '旁边', '旁邊', 'páng biān', 'next to', 'di sebelah'),
(282, '跑', '跑', 'pǎo', 'run', 'berlari'),
(283, '朋友', '朋友', 'péng you', 'friend', 'teman'),
(284, '票', '票', 'piào', 'ticket', 'tiket'),
(285, '七', '七', 'qī', 'seven', 'tujuh'),
(286, '起', '起', 'qǐ', 'up', 'bangkit'),
(287, '起床', '起床', 'qǐ chuáng', 'get up', 'bangun tidur'),
(288, '起来', '起來', 'qǐ lái', 'stand up', 'berdiri'),
(289, '汽车', '汽車', 'qì chē', 'car', 'mobil'),
(290, '前', '前', 'qián', 'before', 'sebelum'),
(291, '前边', '前邊', 'qián bian', 'front side', 'sisi depan'),
(292, '前天', '前天', 'qián tiān', 'the day before yesterday', 'dua hari yang lalu'),
(293, '钱', '錢', 'qián', 'money', 'uang'),
(294, '钱包', '錢包', 'qián bāo', 'wallet', 'dompet'),
(295, '请', '請', 'qǐng', 'please', 'silakan'),
(296, '请假', '請假', 'qǐng jià', 'ask for leave', 'meminta cuti'),
(297, '请进', '請進', 'qǐng jìn', 'please come in', 'silakan masuk'),
(298, '请问', '請問', 'qǐng wèn', 'excuse me', 'permisi'),
(299, '请坐', '請坐', 'qǐng zuò', 'please sit down', 'silakan duduk'),
(300, '球', '球', 'qiú', 'ball', 'bola'),
(301, '去', '去', 'qù', 'go', 'pergi'),
(302, '去年', '去年', 'qù nián', 'last year', 'tahun lalu'),
(303, '热', '熱', 'rè', 'hot', 'panas'),
(304, '人', '人', 'rén', 'people', 'orang'),
(305, '认识', '認識', 'rèn shi', 'know', 'mengenal'),
(306, '认真', '認真', 'rèn zhēn', 'serious', 'serius'),
(307, '日', '日', 'rì', 'day', 'hari'),
(308, '日期', '日期', 'rì qī', 'date', 'tanggal'),
(309, '肉', '肉', 'ròu', 'meat', 'daging'),
(310, '三', '三', 'sān', 'three', 'tiga'),
(311, '山', '山', 'shān', 'mountain', 'gunung'),
(312, '商场', '商場', 'shāng chǎng', 'mall', 'pusat perbelanjaan'),
(313, '商店', '商店', 'shāng diàn', 'store', 'toko'),
(314, '上', '上', 'shàng', 'on', 'di atas'),
(315, '上班', '上班', 'shàng bān', 'go to work', 'pergi kerja'),
(316, '上边', '上邊', 'shàng bian', 'above', 'di atas'),
(317, '上车', '上車', 'shàng chē', 'get on to the car', 'naik mobil'),
(318, '上次', '上次', 'shàng cì', 'last time', 'terakhir kali'),
(319, '上课', '上課', 'shàng kè', 'go to class', 'pergi ke kelas'),
(320, '上网', '上網', 'shàng wǎng', 'go online', 'online'),
(321, '上午', '上午', 'shàng wǔ', 'morning', 'pagi'),
(322, '上学', '上學', 'shàng xué', 'go to school', 'pergi ke sekolah'),
(323, '少', '少', 'shǎo', 'little; less', 'sedikit; kurang'),
(324, '谁', '誰', 'shéi/shuí', 'who', 'siapa'),
(325, '身上', '身上', 'shēn shang', 'on the body', 'di tubuh'),
(326, '身体', '身體', 'shēn tǐ', 'body', 'tubuh'),
(327, '什么', '什麼', 'shén me', 'what', 'apa'),
(328, '生病', '生病', 'shēng bìng', 'sick', 'sakit'),
(329, '生气', '生氣', 'shēng qì', 'angry; pissed off', 'marah; kesal'),
(330, '生日', '生日', 'shēng rì', 'birthday', 'ulang tahun'),
(331, '十', '十', 'shí', 'ten', 'sepuluh'),
(332, '时候', '時候', 'shí hou', 'when', 'kapan'),
(333, '时间', '時間', 'shí jiān', 'time', 'waktu'),
(334, '事', '事', 'shì', 'thing; affair', 'hal; urusan'),
(335, '试', '試', 'shì', 'try; test', 'mencoba; tes'),
(336, '是', '是', 'shì', 'yes; am/is/are', 'ya; adalah'),
(337, '是不是', '是不是', 'shì bu shì', 'is not it', 'bukankah'),
(338, '手', '手', 'shǒu', 'hand', 'tangan'),
(339, '手机', '手機', 'shǒu jī', 'handphone', 'telepon genggam'),
(340, '书', '書', 'shū', 'book', 'buku'),
(341, '书包', '書包', 'shū bāo', 'school bag', 'tas sekolah'),
(342, '书店', '書店', 'shū diàn', 'bookstore', 'toko buku'),
(343, '树', '樹', 'shù', 'tree', 'pohon'),
(344, '水', '水', 'shuǐ', 'water', 'air'),
(345, '水果', '水果', 'shuǐ guǒ', 'fruit', 'buah'),
(346, '睡', '睡', 'shuì', 'sleep', 'tidur'),
(347, '睡觉', '睡覺', 'shuì jiào', 'go to bed', 'tidur'),
(348, '说', '說', 'shuō', 'say', 'berkata'),
(349, '说话', '說話', 'shuō huà', 'speak', 'berbicara'),
(350, '四', '四', 'sì', 'four', 'empat'),
(351, '送', '送', 'sòng', 'give away', 'memberikan'),
(352, '岁', '歲', 'suì', 'year (old)', 'tahun (umur)'),
(353, '他', '他', 'tā', 'he', 'dia (laki-laki)'),
(354, '他们', '他們', 'tā men', 'they', 'mereka (laki-laki)'),
(355, '她', '她', 'tā', 'she', 'dia (perempuan)'),
(356, '她们', '她們', 'tā men', 'they', 'mereka (perempuan)'),
(357, '太', '太', 'tài', 'too', 'terlalu'),
(358, '天', '天', 'tiān', 'day', 'hari'),
(359, '天气', '天氣', 'tiān qì', 'weather', 'cuaca'),
(360, '听', '聽', 'tīng', 'listen', 'mendengar'),
(361, '听到', '聽到', 'tīng dào', 'hear', 'mendengar'),
(362, '听见', '聽見', 'tīng jiàn', 'hear', 'mendengar'),
(363, '听写', '聽寫', 'tīng xiě', 'dictation', 'dikte'),
(364, '同学', '同學', 'tóng xué', 'classmate', 'teman sekelas'),
(365, '图书馆', '圖書館', 'tú shū guǎn', 'library', 'perpustakaan'),
(366, '外', '外', 'wài', 'out', 'luar'),
(367, '外边', '外邊', 'wài bian', 'outside', 'di luar'),
(368, '外国', '外國', 'wài guó', 'foreign country', 'negara asing'),
(369, '外语', '外語', 'wài yǔ', 'foreign language', 'bahasa asing'),
(370, '玩儿', '玩兒', 'wánr', 'play', 'bermain'),
(371, '晚', '晚', 'wǎn', 'late', 'terlambat'),
(372, '晚饭', '晚飯', 'wǎn fàn', 'dinner', 'makan malam'),
(373, '晚上', '晚上', 'wǎn shang', 'at night', 'malam'),
(374, '网上', '網上', 'wǎng shang', 'on the internet', 'di internet'),
(375, '网友', '網友', 'wǎng yǒu', 'netizen', 'pengguna internet'),
(376, '忘', '忘', 'wàng', 'forget', 'lupa'),
(377, '忘记', '忘記', 'wàng jì', 'forget', 'lupa'),
(378, '问', '問', 'wèn', 'ask', 'bertanya'),
(379, '我', '我', 'wǒ', 'I', 'saya'),
(380, '我们', '我們', 'wǒ men', 'we', 'kami'),
(381, '五', '五', 'wǔ', 'five', 'lima'),
(382, '午饭', '午飯', 'wǔ fàn', 'lunch', 'makan siang'),
(383, '西', '西', 'xī', 'west', 'barat'),
(384, '西边', '西邊', 'xī bian', 'west side', 'sisi barat'),
(385, '洗', '洗', 'xǐ', 'wash', 'cuci'),
(386, '洗手间', '洗手間', 'xǐ shǒu jiān', 'restroom', 'kamar mandi'),
(387, '喜欢', '喜歡', 'xǐ huan', 'like', 'suka'),
(388, '下', '下', 'xià', 'under; off', 'bawah; turun'),
(389, '下班', '下班', 'xià bān', 'off work', 'pulang kerja'),
(390, '下边', '下邊', 'xià bian', 'below', 'di bawah'),
(391, '下车', '下車', 'xià chē', 'get off the car', 'turun dari mobil'),
(392, '下次', '下次', 'xià cì', 'next time', 'lain kali'),
(393, '下课', '下課', 'xià kè', 'end of class', 'selesai kelas'),
(394, '下午', '下午', 'xià wǔ', 'afternoon', 'sore'),
(395, '下雨', '下雨', 'xià yǔ', 'rain', 'hujan'),
(396, '先', '先', 'xiān', 'first', 'pertama'),
(397, '先生', '先生', 'xiān sheng', 'Mister', 'Tuan'),
(398, '现在', '現在', 'xiàn zài', 'right now', 'sekarang'),
(399, '想', '想', 'xiǎng', 'miss; want; think', 'rindu; ingin; berpikir'),
(400, '小', '小', 'xiǎo', 'small', 'kecil'),
(401, '小孩儿', '小孩兒', 'xiǎo háir', 'child', 'anak'),
(402, '小姐', '小姐', 'xiǎo jiě', 'Miss', 'Nona'),
(403, '小朋友', '小朋友', 'xiǎo péng yǒu', 'kids', 'anak-anak'),
(404, '小时', '小時', 'xiǎo shí', 'hour', 'jam'),
(405, '小学', '小學', 'xiǎo xué', 'primary school', 'sekolah dasar'),
(406, '小学生', '小學生', 'xiǎo xué shēng', 'elementary school student', 'siswa sekolah dasar'),
(407, '笑', '笑', 'xiào', 'laugh', 'tertawa'),
(408, '写', '寫', 'xiě', 'write', 'menulis'),
(409, '谢谢', '謝謝', 'xiè xie', 'thank you', 'terima kasih'),
(410, '新', '新', 'xīn', 'new', 'baru'),
(411, '新年', '新年', 'xīn nián', 'new year', 'tahun baru'),
(412, '星期', '星期', 'xīng qī', 'week', 'minggu'),
(413, '星期日', '星期日', 'xīng qī rì', 'Sunday', 'hari Minggu'),
(414, '星期天', '星期天', 'xīng qī tiān', 'Sunday', 'hari Minggu'),
(415, '行', '行', 'xíng', 'okay', 'oke'),
(416, '休息', '休息', 'xiū xi', 'rest', 'istirahat'),
(417, '学', '學', 'xué', 'learn', 'belajar'),
(418, '学生', '學生', 'xué shēng', 'student', 'siswa'),
(419, '学习', '學習', 'xué xí', 'learn; study', 'belajar; studi'),
(420, '学校', '學校', 'xué xiào', 'school', 'sekolah'),
(421, '学院', '學院', 'xué yuàn', 'academy', 'akademi'),
(422, '要', '要', 'yào', 'want', 'ingin'),
(423, '爷爷', '爺爺', 'yé ye', 'grandfather', 'kakek'),
(424, '也', '也', 'yě', 'also', 'juga'),
(425, '页', '頁', 'yè', 'page', 'halaman'),
(426, '一', '一', 'yī', 'one', 'satu'),
(427, '衣服', '衣服', 'yī fu', 'clothes', 'pakaian'),
(428, '医生', '醫生', 'yī shēng', 'doctor', 'dokter'),
(429, '医院', '醫院', 'yī yuàn', 'hospital', 'rumah sakit'),
(430, '一半', '一半', 'yí bàn', 'a half', 'setengah'),
(431, '一会儿', '一會兒', 'yí huìr', 'a while', 'sebentar'),
(432, '一块儿', '一塊兒', 'yí kuàir', 'together', 'bersama'),
(433, '一下儿', '一下兒', 'yí xiàr', 'a while', 'sebentar'),
(434, '一样', '一樣', 'yí yàng', 'same', 'sama'),
(435, '一边', '一邊', 'yì biān', 'while', 'sambil'),
(436, '一点儿', '一點兒', 'yì diǎnr', 'a little', 'sedikit'),
(437, '一起', '一起', 'yì qǐ', 'together', 'bersama'),
(438, '一些', '一些', 'yì xiē', 'some', 'beberapa'),
(439, '用', '用', 'yòng', 'use', 'menggunakan'),
(440, '有', '有', 'yǒu', 'have', 'memiliki'),
(441, '有的', '有的', 'yǒu de', 'some', 'beberapa'),
(442, '有名', '有名', 'yǒu míng', 'famous', 'terkenal'),
(443, '有时候', '有時候', 'yǒu shí hou', 'sometimes', 'kadang-kadang'),
(444, '有些', '有些', 'yǒu xiē', 'some', 'beberapa'),
(445, '有用', '有用', 'yǒu yòng', 'useful', 'berguna'),
(446, '右', '右', 'yòu', 'right', 'kanan'),
(447, '右边', '右邊', 'yòu bian', 'right side', 'sisi kanan'),
(448, '雨', '雨', 'yǔ', 'rain', 'hujan'),
(449, '元', '元', 'yuán', 'China Yuan', 'Yuan China'),
(450, '远', '遠', 'yuǎn', 'far', 'jauh'),
(451, '月', '月', 'yuè', 'moon; month', 'bulan; bulan'),
(452, '再', '再', 'zài', 'again', 'lagi'),
(453, '再见', '再見', 'zài jiàn', 'goodbye', 'selamat tinggal'),
(454, '在', '在', 'zài', 'in', 'di'),
(455, '在家', '在家', 'zài jiā', 'at home', 'di rumah'),
(456, '早', '早', 'zǎo', 'early', 'pagi'),
(457, '早饭', '早飯', 'zǎo fàn', 'breakfast', 'sarapan'),
(458, '早上', '早上', 'zǎo shang', 'morning', 'pagi'),
(459, '怎么', '怎麼', 'zěn me', 'how', 'bagaimana'),
(460, '站', '站', 'zhàn', 'station', 'stasiun'),
(461, '找', '找', 'zhǎo', 'look for', 'mencari'),
(462, '找到', '找到', 'zhǎo dào', 'find', 'menemukan'),
(463, '这', '這', 'zhè', 'this', 'ini'),
(464, '这边', '這邊', 'zhè biān', 'here', 'sini'),
(465, '这里', '這裡', 'zhè lǐ', 'here', 'sini'),
(466, '这儿', '這兒', 'zhèr', 'here', 'sini'),
(467, '这些', '這些', 'zhè xiē', 'these', 'ini'),
(468, '着', '著', 'zhe', 'with', 'dengan'),
(469, '真', '真', 'zhēn', 'true; very', 'benar; sangat'),
(470, '真的', '真的', 'zhēn de', 'really', 'benar-benar'),
(471, '正', '正', 'zhèng', 'being', 'sedang'),
(472, '正在', '正在', 'zhèng zài', 'being', 'sedang'),
(473, '知道', '知道', 'zhī dào', 'know', 'tahu'),
(474, '知识', '知識', 'zhī shi', 'knowledge', 'pengetahuan'),
(475, '中', '中', 'zhōng', 'middle', 'tengah'),
(476, '中国', '中國', 'Zhōng guó', 'China', 'Tiongkok'),
(477, '中间', '中間', 'zhōng jiān', 'middle', 'tengah'),
(478, '中文', '中文', 'Zhōng wén', 'Chinese', 'bahasa Mandarin'),
(479, '中午', '中午', 'zhōng wǔ', 'noon', 'siang'),
(480, '重', '重', 'zhòng', 'heavy', 'berat'),
(481, '注意', '注意', 'zhù yì', 'pay attention', 'perhatikan'),
(482, '坐', '坐', 'zuò', 'sit', 'duduk'),
(483, '昨天', '昨天', 'zuó tiān', 'yesterday', 'kemarin'),
(484, '做', '做', 'zuò', 'do', 'melakukan'),
(485, '作业', '作業', 'zuò yè', 'homework', 'pekerjaan rumah'),
(486, '走', '走', 'zǒu', 'walk', 'jalan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_materi`
--

CREATE TABLE `tbl_materi` (
  `lesson_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_materi`
--

INSERT INTO `tbl_materi` (`lesson_id`, `course_id`, `title`, `content`, `create_at`) VALUES
(7, 1, 'Perkenalan - 簡介', '&lt;p&gt;Bahasa Mandarin adalah bahasa nasional china. Sebagian besar masyarakat China menggunakan Bahasa Mandarin untuk komunikasi, sedangkan di desa atau tempat tertentu ada yang menggunakan bahasa daerah mereka masing-masing untuk berkomunikasi, ibaratnya seperti di Indonesia, Bahasa Nasional adalah Bahasa Indonesia, tapi ada sebagian daerah yang menggunakan bahasa daerah untuk komunikasi seperti Bahasa Jawa, Bahasa Sunda dll.&lt;/p&gt;\r\n&lt;p&gt;Di China Bahasa Mandarin disebut Pǔtōnghu&amp;agrave; (&lt;strong&gt;普通話&lt;/strong&gt;). oleh karena itu kata-kata yang dikenal dalam Bahasa Indonesia tidak baku seperti angpau, siomay, gopek, koukou, atau bakpau tidak akan ditemukan di Bahasa Mandarin dikarenakan kata-kata itu tidak berasal dari Bahasa Mandarin melainkan Bahasa Hokkian.&lt;/p&gt;\r\n&lt;p&gt;Ejaan yang digunakan adalah H&amp;agrave;nyŭ Pinyin (&lt;strong&gt;汉语拼音&lt;/strong&gt;) yang biasanya disingkat Pinyin saja. Bahasa Mandarin ini menggunakan lafal dialek Tiongkok Utara &amp;ndash; Běijīng Hu&amp;agrave; (&lt;strong&gt;北京话&lt;/strong&gt;) sebagai lafal baku, tata bahasa dari bahasa daerah negeri Tiongkok Utara - Běifāng Fāngy&amp;aacute;n (&lt;strong&gt;北方方言&lt;/strong&gt;) sebagai tata bahasa baku, dan kosa kata modern dari kesusastraan Tiongkok sebagai kosa kata baru.&lt;/p&gt;\r\n&lt;p&gt;Kata mandarin merupakan terjemahan dari Guānhu&amp;agrave; (&lt;strong&gt;官 话&lt;/strong&gt;) yang berarti &quot;bahasa pejabat&quot;. Awalnya istilah ini digunakan untuk menunjuk bahasa pejabat pemerintah di ibu kota Beijing. Mulai dinasti Yuan (&lt;strong&gt;元朝&lt;/strong&gt;) kota Beijing ditetapkan sebagai ibu kota.&lt;/p&gt;', '2024-11-23 11:48:02');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_quizzes`
--

CREATE TABLE `tbl_quizzes` (
  `quiz_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL COMMENT 'Foreign Key (references Courses)',
  `title` varchar(100) NOT NULL COMMENT 'Judul kuis (misalnya ''Final Quiz'')',
  `content` text NOT NULL COMMENT 'Konten kuis dalam bentuk HTML dari Quizlet',
  `desc` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL COMMENT 'Tanggal dan waktu pembuatan kuis'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_quizzes`
--

INSERT INTO `tbl_quizzes` (`quiz_id`, `course_id`, `title`, `content`, `desc`, `created_at`) VALUES
(1, 1, 'Mandarin Beginer', '', 'Uji kemampuan dasar bahasa Mandarinmu dengan kuis ini! Dirancang khusus untuk pemula, kuis ini mencakup soal-soal sederhana seperti pengenalan huruf Hanzi, nada (tones), kosakata sehari-hari, dan struktur kalimat dasar. Cocok untuk kamu yang baru memulai belajar Mandarin atau ingin mengasah kembali pengetahuan dasar. Yuk, mulai dan lihat sejauh mana kamu sudah menguasai bahasa Mandarin!', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL COMMENT 'Nama pengguna',
  `username` varchar(50) NOT NULL COMMENT 'Nama pengguna unik',
  `email` varchar(100) NOT NULL COMMENT 'Email pengguna',
  `password` varchar(255) NOT NULL COMMENT 'Password terenkripsi',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'Tanggal dan waktu pembuatan akun'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `name`, `username`, `email`, `password`, `created_at`) VALUES
(1, 'Muhammad Faturrahman Putra', 'Senfuri0n', 'faturrahman86.fr@gmail.com', '123456789Test', '2024-08-25 04:31:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_course`
--
ALTER TABLE `tbl_course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `tbl_dictionary`
--
ALTER TABLE `tbl_dictionary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_materi`
--
ALTER TABLE `tbl_materi`
  ADD PRIMARY KEY (`lesson_id`);

--
-- Indexes for table `tbl_quizzes`
--
ALTER TABLE `tbl_quizzes`
  ADD PRIMARY KEY (`quiz_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_course`
--
ALTER TABLE `tbl_course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_dictionary`
--
ALTER TABLE `tbl_dictionary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=487;

--
-- AUTO_INCREMENT for table `tbl_materi`
--
ALTER TABLE `tbl_materi`
  MODIFY `lesson_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_quizzes`
--
ALTER TABLE `tbl_quizzes`
  MODIFY `quiz_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_quizzes`
--
ALTER TABLE `tbl_quizzes`
  ADD CONSTRAINT `tbl_quizzes_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `tbl_course` (`course_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
