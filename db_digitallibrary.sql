-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 17 Apr 2025 pada 07.00
-- Versi server: 8.0.17
-- Versi PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_digitallibrary`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategoribuku_relasi`
--

CREATE TABLE `kategoribuku_relasi` (
  `id_kategoribuku` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `kategoribuku_relasi`
--

INSERT INTO `kategoribuku_relasi` (`id_kategoribuku`, `id_buku`, `id_kategori`) VALUES
(3, 19, 3),
(5, 21, 1),
(6, 21, 4),
(7, 22, 4),
(8, 22, 8),
(11, 4, 6),
(12, 23, 3),
(13, 23, 8),
(14, 10, 3),
(15, 10, 9),
(16, 24, 4),
(17, 24, 6),
(18, 25, 1),
(19, 25, 6),
(20, 26, 1),
(21, 26, 6),
(22, 27, 9),
(28, 29, 9),
(30, 28, 3),
(31, 28, 8),
(32, 28, 9),
(37, 13, 1),
(38, 30, 1),
(39, 30, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_buku`
--

CREATE TABLE `tb_buku` (
  `id_buku` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `tahun_terbit` int(11) NOT NULL,
  `deskripsi_buku` text NOT NULL,
  `gambar_buku` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `tb_buku`
--

INSERT INTO `tb_buku` (`id_buku`, `judul`, `penulis`, `penerbit`, `tahun_terbit`, `deskripsi_buku`, `gambar_buku`) VALUES
(4, 'Peka', 'Indy Ratna Pratiwi', 'Jurnalisa', 2022, 'Teh Risa ngapain? Kok, dia ngomong sendiri, sih?\r\n\r\nTak pernah Indy bayangkan bahwa suatu hari, ia menjadi peka seperti Teh Risa, mampu melihat dan berinteraksi dengan \"mereka\".\r\n\r\n\r\nSayangnya, bukan sosok bersahabat seperti Peter dan teman-teman yang menghampirinya, melainkan sosok menyeramkan yang menjadikan Indy sebagai tempat yang \'nyaman\' untuk singgah. Mulai dari pocong, genderuwo, hingga sosok berwujud hancur.\r\n\r\nTerakhir, sosok Kuntilanak Merah yang selalu hadir dan mengusik hidupnya. Seolah ada pesan yang ingin ia sampaikan pada Indy. Lalu, apakah pesan itu akan menjadi kabar baik, atau sebaliknya, justru membawa celaka yang akan menimpanya?\r\n\r\n', '5942aa3f-bd97-4174-95cf-9875addaca58.jpg'),
(6, 'Love Your Live', 'Shopie Kinsella', 'Gramedia', 2022, 'Menurut Ava, cinta harus ditemukan di dunia nyata, bukannya pada filter aplikasi kencan yang mengatur tinggi cowok, pekerjaan, hobi, dan sebagainya. Ava memutuskan undur diri sejenak dari ingar bingar hidup serta cinta, lalu mengikuti retret menulis di tempat terpencil yang indah di Italia. Semua peserta memakai nama samaran dan tidak saling mengungkap kehidupan pribadi. Di sana, Ava yang memakai nama Aria bertemu cowok yang nyaris sempurna, Dutch, salah satu peserta retret bela diri yang dibatalkan dan masuk ke retret menulis. Mereka menjalin hubungan tanpa bawa-bawa masa lalu. Segalanya terasa tepat. Namun, Ava dan Matt harus kembali ke kehidupan nyata. Selagi fantasi memudar, mereka menyadari bahwa hidup mereka sangat bertolak belakang. Mulai dari perbedaan makanan kesukaan, kebiasaan yang menyebalkan, dan banyak hal lain yang nyatanya sulit ditoleransi. Belum lagi mantan pacar Matt yang masih “berkeliaran”. Ava sadar kehidupan memunculkan filternya sendiri. Walau mereka saling mencintai, tampaknya mereka tidak bisa saling mencintai kehidupan yang lain. Bisakah mereka bertahan? Ataukah lebih baik menyerah?', 'Love-Your-Life.jpg'),
(10, 'Situs Warisan Dunia', 'Bombom Story', 'Bhuana Ilmu Populer', 2022, 'Sejak tahun 1982, Organisasi Pendidikan, Ilmu Pengetahuan dan Kebudayaan Perserikatan Bangsa-Bangsa (UNESCO) telah mendeklarasikan 18 April sebagai International Day for Monuments and Sites, World Heritage Day, atau Hari Warisan Dunia secara global. Peringatan Hari Warisan Dunia bertujuan untuk meningkatkan kesadaran akan perlindungan sejarah, keragaman dan kerentanan situs dan monumen Warisan Dunia. Hari istimewa ini menandakan pemahaman tentang budaya dan tradisi yang harus dilestarikan, dan menyampaikan pesan penting kepada generasi muda untuk mewarisi warisan dan melestarikan budaya.', 'WhatsApp_Image_2022-07-06_at_8.30.26_AM.jpeg'),
(12, 'My First Encyclopedia', 'Disney', 'Gramedia Pustaka Utama', 2015, 'Dunia kita penuh dengan fakta menakjubkan\r\nyang tak mungkin kaupelajari dalam sehari.\r\nDengan Ensiklopedia Anak Pintar, kau cukup\r\nbelajar satu fakta sehari.\r\nDijamin, kau akan pintar dalam 249 hari!', '9786020316468_Ensiklopedia-Anak-Pintar-My-First-Encyclopedia.jpg'),
(13, 'Who I am I to You', 'RE', 'Romancious', 2025, 'Siapa yang nggak kesal kalau punya pacar yang lebih prioritasin sahabat ceweknya daripada kita sendiri? Apalagi, dia punya kesibukan yang padat dan sedikit waktu buat kita. Masa waktu yang sedikit itu, dipakai buat cewek lain?\r\n\r\nItu yang dirasakan Tesara selama pacaran sama Kean. Berkali-kali Kean selalu membatalkan janjinya dan seringkali mengutamakan Celia, sahabatnya.\r\n\r\nKean, Who am I to you? Sebenarnya, aku ini siapa buat kamu?', 'z89uv4--xt.jpg'),
(15, 'SweetHeart Of Nobody', 'MalaShantii', 'Elex Media Komputindo', 2025, 'Sepanjang karirnya di dunia sinetron, Juliette selalu mendapat tawaran peran sebagai antagonis jahat yang menyebalkan. Kemampuan aktingnya yang sangat bagus dan menjiwai, membuat para penonton jadi terbawa perasaan dan membencinya hingga ke dunia nyata. Dimaki-maki, dijambak, bahkan dicakar di jalanan pun pernah dia alami. Juliette tak keberatan. Asalkan dapat cuan, anggap saja itu risiko pekerjaan. Ditambah lagi, Leta si manajer selalu mengamuk jika dia sampai pilih-pilih peran.\r\n\r\nMulanya, semua berjalan baik-baik saja. Hingga kemudian dia mulai beradu akting dengan Julian, aktor yang diam-diam dia kagumi sejak lama. Juliette mulai merasa risau. Seharusnya segalanya berjalan lancar kalau saja orang-orang tak telanjur membencinya. Sekarang, demi karir dia terpaksa harus menekan perasaan, mengalah, dan berpura-pura. Seakan belum cukup rumit situasi yang tengah dia hadapi, Alex, kakak lelaki Leta yang sangat dia benci tiba-tiba muncul kembali dalam kehidupannya. Membuatnya berada di persimpangan antara keharusan membalas budi, atau memperjuangkan kebahagiaannya sendiri.', 'BLK_SON1742782405268.jpg'),
(19, 'Top Rank Tes Skolastik Snbt', 'Tim Edukasi Indonesia', 'Sarang Baca ', 2023, 'Tes skolastik sendiri adalah tes yang mengukur kemampuan penalaran umum (kognitif) siswa. Kemampuan kognitif mencakup kemampuan berpikir, belajar, bahasa, dan kritis. Soal-soal tes skolastik, juga berfokus pada logika siswa dan cara siswa menganalisis suatu problem yang kontekstual.', 'Top_Rank_Tes_Skolastik_Snbt_2023.jpg'),
(21, 'When The Rain Meets Hema', 'Wulan Nur Amalia', 'Noura Books Publishing', 2023, 'Halo, Ini Hemachandra. Buku Bandung After Rain adalah buku yang sangat indah. Namun, biarkan aku menulis semua hal yang terlewat dari dalam buku itu. Tentang perasaanku, tentang semua hal dari sudut pandangku, tentang kisah bersama gadis cantik di Bandung, juga tentang manusia setengah alien yang diberi nama Barudak Babandungan', 'hwxx-erzen.jpg'),
(22, 'The Storm Runner', 'J.C Cervantes', 'Noura Books Publishing', 2021, 'Aku Zane Obispo. Ada 3 hal yang tidak suka kubahas:\r\n\r\nPertama, kakiku yang pincang sehingga aku harus memakai tongkat ke mana-mana.\r\n\r\nKedua, aku tidak tahu siapa ayahku, jadi tidak usah tanya-tanya.\r\n\r\nKetiga, sekolah! Aku membencinya, tapi Mom menolak permintaanku untuk tetap homeschooling. Aku perlu bersosialisasi, katanya. Padahal, aku sudah senang bertemankan Rosie saja, anjingku yang setia dan hanya berkaki tiga', 'the_storm_runner.jpg'),
(23, ' Asyiknya Belajar Berhitung', 'Heru Kurniawan', 'Checklist', 2018, 'Berhitung adalah salah satu cabang dari matematika yang mempelajari operasi penjumlahan, operasi pengurangan, operasi perkalian, dan operasi pembagian. Tujuan berhitung bagi anak adalah untuk mengetahui dasar-dasar pembelajaran berhitung sehingga pada saatnya nanti anak akan lebih siap mengikuti pembelajaran berhitung pada jenjang selanjutnya yang lebih kompleks.\r\nSedangkan secara khusus, dapat berpikir logis dan sistematis sejak dini melalui pengamatan terhadap benda-benda konkrit gambar-gambar atau angka-angka yang terdapat di sekitar, anak dapat menyesuaikan dan melibatkan diri dalam kehidupan bermasyarakat yang dalam kesehariannya memerlukan kemampuan berhitung, ketelitian, konsentrasi, abstraksi dan daya apresiasi yang lebih tinggi, memiliki pemahaman konsep ruang dan waktu serta dapat memperkirakan kemungkinan urutan sesuai peristiwa yang terjadi di sekitarnya, dan memiliki kreatifitas dan imajinasi dalam menciptakan sesuatu secara spontan.', '9786025479199_Asyiknya-Belajar-Berhitung-Kelas-Anak-Pintar.jpg'),
(24, 'The Girl From The Well', 'Rin Chupeco', 'Alex Media Komputindo', 2018, 'Kisah horor ala Stephen King... Kisah hantu berdarah yang mengerikan yang menggema.\"― Kirkus Dari penulis trilogi Bone Witch yang sangat terkenal muncul kisah mengerikan tentang hantu Jepang yang mencari pembalasan dendam dan bocah lelaki yang tidak punya pilihan selain memercayainya, dipuji sebagai \"kisah menyeramkan yang fantastis yang pasti membuat pembaca terjaga di malam hari\" (RT Book Reviews) Akulah tempat anak-anak yang sudah meninggal pergi. Okiku adalah jiwa yang kesepian. Dia telah mengembara di dunia selama berabad-abad, membebaskan roh-roh orang yang dibunuh-mati. Dulunya dia sendiri adalah korban, dia sekarang mengambil nyawa para pembunuh dengan pembalasan dendam yang pantas mereka dapatkan. Namun, melepaskan hantu-hantu tak berdosa dari ikatan halus mereka tidak membawa kedamaian bagi Okiku. Dia tetap hanyut. Begitulah keberadaannya, sampai dia bertemu Tark. Kejahatan menggeliat di bawah kulit remaja yang murung itu, terperangkap oleh serangkaian tato yang rumit.', '18509623.jpg'),
(25, 'The Hollow Places', 'T. Kingfisher', 'Noura Books Publishing', 2021, 'Seorang wanita muda menemukan portal aneh di rumah pamannya, yang menyebabkan kegilaan dan teror dalam novel baru yang mencekam ini.', '50892288.jpg'),
(26, 'The Dead Romantics', 'Ashely Poston', 'Berkley', 2022, 'cerita dewasa dengan sedikit unsur supernatural, di mana Florence kembali ke rumah untuk membantu keluarga menguburkan ayahnya, dan bertemu dengan hantu yang menarik perhatiannya', '58885776.jpg'),
(27, 'Petualangan Marco Polo', 'Marco Polo', 'Alvabet', 2025, 'Petualangan Marco Polo diawali dengan tujuannya menuju kota-kota legendaris Cathay (Tiongkok), tempat ia bertugas di istana Kubilai Khan. Jejaknya pun berlanjut di sepanjang Jalur Sutra kuno, melalui pasar-pasar Persia yang ramai, dan ke lanskap India yang memesona. Ia memberikan gambaran menarik tentang berbagai masyarakat yang ditemuinya: agama, adat istiadat, upacara, dan cara hidup mereka; tentang rempah-rempah dan sutra Timur; tentang permata berharga, tumbuhan eksotis, dan binatang-binatang buas.', 'petualangan-marco-polo.jpg'),
(28, 'Little People Big Dreams', 'Maria Isabel Sanchez Vegara', 'Keperpustakaan Populer Gramedia', 2025, 'Ungkap kehidupan tokoh-tokoh terkemuka di berbagai bidang. Semua menghasilkan karya luar biasa dan mereka memulainya sebagai anak-anak dengan mimpi besar! Terlahir dari keluarga ilmuwan, Charles menghabiskan waktunya dengan berkelana di pedesaan sambil mengumpulkan biji-bijian, bunga-bunga, dan berbagai serangga. Ketertarikannya pada alam membawanya ikut serta dalam pelayaran HMS Beagle. Petualangan itu membuahkan sebuah ide yang akan mengubah pemikiran ilmiah hingga saat ini! Di akhir buku terdapat ringkasan hidup Charles Darwin sang naturalis, lengkap dengan foto-fotonya', '79ze--rndd.jpg'),
(29, 'Ibnu Abbas', 'Dr. Musthafa Sa\'id Khan', 'Alvabet', 2025, 'Ibnu Abbas (Abdullah bin Abbas) adalah salah satu sahabat Nabi yang sangat terkenal dalam sejarah Islam. Banyak julukan yang disematkan kepada sosoknya, seperti turjuman al-Qur’an (penafsir al-Quran), habrul ummah (guru umat), dan ra’isul mufassirin (pemuka para ahli tafsir). Julukan paling menonjol pada dirinya dan selalu melekat sepanjang masa adalah “ahli takwil” (tafsir al-Quran). Julukan ini tiada lain merupakan berkah dari doa Nabi yang khusus ditujukan kepadanya, “Ya Allah, berilah dia pemahaman yang mendalam dalam agama dan ajarilah dia takwil (tafsir al-Quran).”', 'iapabkslk-.jpg'),
(30, 'Tuhan Maha Romantis', 'Azhar Nurun Ala', 'Gramedia Widiasarana Indonesia', 2023, 'Rijal adalah seorang mahasiswa baru yang berasal dari Pulau Sumatra. Ia merantau ke UI untuk kuliah. Sebagai anak lelaki tunggal, meninggalkan orangtua sangatlah berat. Hari-harinya dipenuhi dengan rindu pada orangtua dan masa kecilnya. Namun demi mengejar impiannya, ia harus melewati masa-masa itu. Selama di Depok, Rijal yang sejak kecil didik oleh orangtuanya tentang kebijaksanaan hidup dan pengetahuan agama, dihadapkan pada perasaan yang tak terbendung. Ia tertarik pada Laras pada pandangan pertama saat Rijal menginjakkan kaki di UI. Pada hari-hari setelahnya, Rijal harus memutuskan pada pilihan yang sama-sama sulit. Di satu sisi Rijal tidak ingin membuat orangtuanya kecewa, di sisi lain ia tidak ingin melepaskan kesempatan atas nama cinta.', 'kcakubhu5mh7yroy8ezq9r.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_denda`
--

CREATE TABLE `tb_denda` (
  `id` int(11) NOT NULL,
  `nama_pengaturan` varchar(200) NOT NULL,
  `nilai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `tb_denda`
--

INSERT INTO `tb_denda` (`id`, `nama_pengaturan`, `nilai`) VALUES
(2, 'denda', '15000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategoribuku`
--

CREATE TABLE `tb_kategoribuku` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `gambar_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `tb_kategoribuku`
--

INSERT INTO `tb_kategoribuku` (`id_kategori`, `nama_kategori`, `gambar_kategori`) VALUES
(1, 'Romance', 'roman.png'),
(3, 'Education', 'edu.png'),
(4, 'Fiction', 'fiksi.png'),
(6, 'Horor', 'ghost.png'),
(8, 'Child', 'child.png'),
(9, 'History', 'history.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_koleksi`
--

CREATE TABLE `tb_koleksi` (
  `id_koleksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `tb_koleksi`
--

INSERT INTO `tb_koleksi` (`id_koleksi`, `id_user`, `id_buku`) VALUES
(1, 8, 6),
(2, 8, 10),
(3, 6, 4),
(4, 10, 4),
(5, 8, 27),
(6, 11, 21),
(7, 11, 4),
(8, 10, 22);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_peminjaman`
--

CREATE TABLE `tb_peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `tanggal_peminjaman` date NOT NULL,
  `tanggal_pengembalian` date NOT NULL,
  `status_peminjaman` enum('borrowed','returned','overdue','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `tb_peminjaman`
--

INSERT INTO `tb_peminjaman` (`id_peminjaman`, `id_user`, `id_buku`, `tanggal_peminjaman`, `tanggal_pengembalian`, `status_peminjaman`) VALUES
(9, 8, 13, '2025-04-10', '2025-04-12', 'borrowed'),
(10, 10, 15, '2025-04-14', '2025-04-17', 'returned'),
(11, 8, 26, '2025-04-15', '2025-04-16', 'borrowed'),
(12, 11, 22, '2025-04-15', '2025-04-16', 'returned'),
(13, 12, 15, '2025-04-11', '2025-04-14', 'returned'),
(14, 10, 22, '2025-04-15', '2025-04-29', 'returned'),
(15, 6, 19, '2025-04-15', '2025-04-18', 'returned'),
(16, 6, 19, '2025-04-15', '2025-04-29', 'returned'),
(17, 10, 19, '2025-04-15', '2025-04-29', 'returned'),
(18, 8, 12, '2025-04-15', '2025-04-29', 'returned');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_ulasan`
--

CREATE TABLE `tb_ulasan` (
  `id_ulasan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `ulasan` text NOT NULL,
  `rating` float(2,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `tb_ulasan`
--

INSERT INTO `tb_ulasan` (`id_ulasan`, `id_user`, `id_buku`, `ulasan`, `rating`) VALUES
(1, 8, 4, 'Buku ini seru banget dan punya alur yang menarik, keren ! ❤️', 4.0),
(2, 8, 12, 'buku ini sangat mendidik sekali untuk anak anak !', 5.0),
(4, 11, 22, 'buku baguss, aku suka', 5.0),
(5, 11, 22, 'WAH BAGUS DN KIYYEN', 4.0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `role` enum('pelanggan','petugas','admin','') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `nama_lengkap`, `password`, `email`, `alamat`, `role`) VALUES
(6, 'admin', 'Budi Haryono', '$2y$10$hdLziG/Ov91X8n.ZYayw3ubgPE018hhVG2zmQ24xHLmlqY8qYs9zK', 'admin1@gmail.com', 'Cilangkap No.12', 'admin'),
(8, 'sipa', 'arsyifa', '$2y$10$9MsGg3m1QNQFNIbMN1jiUOo2fM0jfLat53rmgf.LeFx.7XOiGP26K', 'sayasuka@gmail.com', 'Cilangkap No.12', 'pelanggan'),
(9, 'Petugas', 'Budi Haryono', '$2y$10$Iq49tI0gO/Lr6f3lKfAiEOiMH7gtFAWzkGtD7tnhEBzWIjl6GL5cy', 'sayasaya@gmail.com', 'Pabuaran Indah No.13', 'admin'),
(10, 'lita', 'talita', '$2y$10$3mHdAyAfmn5PkVR0HMpi.OBmuSpvCCKM9KNl2Zftlr8nZN.RWqNGu', 'talita@gmail.com', 'Pabuaran Indah No.13', 'pelanggan'),
(11, 'nia', 'nia aja', '$2y$10$FZZQ/4Hm6W749.MdDSMDueHMxglJQjSlBa6OhQ/55v2jPPk1WnckS', 'niaja@gmail.com', 'Pabuaran Indah No.13', 'pelanggan'),
(12, 'tania', 'novi', '$2y$10$Zti29Gry1/xYtk5lOzKkuODRUqO50F/FYqNYx0gK1iYY2jZOi83Ve', 'tatasukacoklat@gmail.com', 'Cimpaeun Rt 01', 'pelanggan'),
(13, 'Petugas 56', 'Alya Elfa', '$2y$10$cqHV/pL6LH5gId6nItRRtOURWUkGQvllTHed03tCQhAUA6lR/Kue.', 'alya94@gmail.com', 'Cilangkap', 'petugas'),
(14, 'Budi', 'Budi ', '$2y$10$QhaYk0I5b9SJdg.u.pWwDeyAgYuM.d7lDuhhPNxwYUVBN2p2pqwUm', 'admin56@gmail.com', 'Pabuaran No.45', 'petugas');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kategoribuku_relasi`
--
ALTER TABLE `kategoribuku_relasi`
  ADD PRIMARY KEY (`id_kategoribuku`),
  ADD KEY `id_buku` (`id_buku`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indeks untuk tabel `tb_denda`
--
ALTER TABLE `tb_denda`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_kategoribuku`
--
ALTER TABLE `tb_kategoribuku`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tb_koleksi`
--
ALTER TABLE `tb_koleksi`
  ADD PRIMARY KEY (`id_koleksi`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indeks untuk tabel `tb_peminjaman`
--
ALTER TABLE `tb_peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indeks untuk tabel `tb_ulasan`
--
ALTER TABLE `tb_ulasan`
  ADD PRIMARY KEY (`id_ulasan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kategoribuku_relasi`
--
ALTER TABLE `kategoribuku_relasi`
  MODIFY `id_kategoribuku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `tb_buku`
--
ALTER TABLE `tb_buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `tb_denda`
--
ALTER TABLE `tb_denda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_kategoribuku`
--
ALTER TABLE `tb_kategoribuku`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_koleksi`
--
ALTER TABLE `tb_koleksi`
  MODIFY `id_koleksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_peminjaman`
--
ALTER TABLE `tb_peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `tb_ulasan`
--
ALTER TABLE `tb_ulasan`
  MODIFY `id_ulasan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kategoribuku_relasi`
--
ALTER TABLE `kategoribuku_relasi`
  ADD CONSTRAINT `kategoribuku_relasi_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `tb_kategoribuku` (`id_kategori`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `kategoribuku_relasi_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `tb_buku` (`id_buku`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ketidakleluasaan untuk tabel `tb_koleksi`
--
ALTER TABLE `tb_koleksi`
  ADD CONSTRAINT `tb_koleksi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `tb_koleksi_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `tb_buku` (`id_buku`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ketidakleluasaan untuk tabel `tb_peminjaman`
--
ALTER TABLE `tb_peminjaman`
  ADD CONSTRAINT `tb_peminjaman_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `tb_peminjaman_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `tb_buku` (`id_buku`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ketidakleluasaan untuk tabel `tb_ulasan`
--
ALTER TABLE `tb_ulasan`
  ADD CONSTRAINT `tb_ulasan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
