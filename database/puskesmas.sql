/*
 Navicat Premium Data Transfer

 Source Server         : local-mysql
 Source Server Type    : MySQL
 Source Server Version : 100416
 Source Host           : localhost:3306
 Source Schema         : puskesmas

 Target Server Type    : MySQL
 Target Server Version : 100416
 File Encoding         : 65001

 Date: 01/07/2022 23:41:31
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for aturan_pakai
-- ----------------------------
DROP TABLE IF EXISTS `aturan_pakai`;
CREATE TABLE `aturan_pakai`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `keterangan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of aturan_pakai
-- ----------------------------
INSERT INTO `aturan_pakai` VALUES (1, 'sebelum makan', NULL, NULL);
INSERT INTO `aturan_pakai` VALUES (2, 'sesudah makan', NULL, NULL);

-- ----------------------------
-- Table structure for data_pasien
-- ----------------------------
DROP TABLE IF EXISTS `data_pasien`;
CREATE TABLE `data_pasien`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `kode_pasien` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nama` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `no_identitas` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `no_telp` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `alamat` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tgl_lahir` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jenis_kelamin` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `status_menikah` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `no_askes` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nama_keluarga` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_golongan_darah` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_pekerjaan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_kelurahan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_kelompok_pasien` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of data_pasien
-- ----------------------------
INSERT INTO `data_pasien` VALUES (2, '000001', 'DONI MULIZAR', '357301765890000', '082244374447', 'Malang', '1997-10-23', 'L', 'BELUM MENIKAH', NULL, 'SAMAN', '4', '5', '2', '1', '2021-12-28 17:04:50', '2022-01-24 11:46:52');
INSERT INTO `data_pasien` VALUES (3, '000002', 'AGNES FLORENCIA', '357301117165189', '082244274427', 'Jl Kapi Sraba 67A', '1997-06-14', 'P', 'BELUM MENIKAH', '01928374', 'KUSUMA', '2', '3', '4', '2', '2021-12-28 20:15:58', '2022-01-24 11:45:50');
INSERT INTO `data_pasien` VALUES (4, '000003', 'ZULHANA FITRI', '357301540765111', '082244174417', 'Jl Pahlawan Balearjosari', '1997-01-03', 'P', 'BELUM MENIKAH', NULL, 'ADITYA', '2', '6', '4', '1', '2022-01-03 12:42:02', '2022-01-24 11:45:32');
INSERT INTO `data_pasien` VALUES (5, '000004', 'LUKMAN HAKIM', '357301540650001', '082244174427', 'Jl Dharmahusada 90C', '1997-01-05', 'L', 'SUDAH MENIKAH', '92837651', 'BUDIMAN', '3', '4', '1', '2', '2022-01-04 19:18:38', '2022-01-24 11:45:09');
INSERT INTO `data_pasien` VALUES (7, '000005', 'SETYO PERMADI', '357645738198200', '08776564783', 'Jl Bunga Cokelat No. 1', '1990-01-23', 'L', 'SUDAH MENIKAH', '46572832', 'BIRU', '1', '2', '3', '2', '2022-01-24 13:38:34', '2022-01-24 13:39:09');
INSERT INTO `data_pasien` VALUES (8, '000006', 'ANDHIKA AFIANDA', '357301540511123', '085100699171', 'Malang', '1981-01-01', 'P', 'SUDAH MENIKAH', NULL, 'ALI', '2', '5', '3', '1', NULL, NULL);
INSERT INTO `data_pasien` VALUES (9, '000007', 'ANNISA DILLA', '357301510377178', '081368765009', 'Malang', '2000-05-09', 'P', 'BELUM MENIKAH', '59087654', 'DONI ', '4', '1', '3', '2', NULL, NULL);
INSERT INTO `data_pasien` VALUES (10, '000008', 'EVINA DIANITA', '657665387264732', '085678754445', 'Malang', '1993-03-02', 'P', 'BELUM MENIKAH', '20988734', 'SYAIFUDDIN', '1', '2', '3', '2', NULL, NULL);
INSERT INTO `data_pasien` VALUES (11, '000009', 'ALFIANSYAH', '253462827827362', '089734636546', 'Malang', '1966-08-08', 'L', 'SUDAH MENIKAH', '23283726', 'ALFIA', '3', '5', '2', '2', NULL, NULL);
INSERT INTO `data_pasien` VALUES (12, '000010', 'DONI PRADANA', '238365615666772', '083364653678', 'Malang', '1995-12-21', 'L', 'BELUM MENIKAH', NULL, 'PRADANA', '4', '1', '4', '1', NULL, NULL);
INSERT INTO `data_pasien` VALUES (13, '000011', 'RANI', '273626356256188', '082237646532', 'Malang', '1987-03-20', 'P', 'SUDAH MENIKAH', '21293283', 'HADI', '1', '2', '3', '2', NULL, NULL);
INSERT INTO `data_pasien` VALUES (14, '000012', 'HADI SUHATMOKO', '232483824824828', '081384873388', 'Malang', '1987-10-01', 'L', 'SUDAH MENIKAH', '23928434', 'HATMOKO', '2', '4', '3', '2', NULL, '2022-07-01 16:36:32');

-- ----------------------------
-- Table structure for diagnosa
-- ----------------------------
DROP TABLE IF EXISTS `diagnosa`;
CREATE TABLE `diagnosa`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `kode_diagnosa` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `deskripsi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of diagnosa
-- ----------------------------
INSERT INTO `diagnosa` VALUES (1, 'K38.12', 'Apendikular', 'Usus buntu', '2022-01-03 14:55:09', '2022-01-25 15:39:44');
INSERT INTO `diagnosa` VALUES (2, 'L02.9', 'Abses', 'abses  luka umum', '2022-01-04 20:12:55', '2022-01-04 20:13:23');
INSERT INTO `diagnosa` VALUES (3, 'A01.0', 'Tifus', 'Infeksi dikarenakan oleh Salmonella typhi kuman penyebab tifoid', '2022-01-04 20:24:02', '2022-01-25 15:18:33');
INSERT INTO `diagnosa` VALUES (4, 'J11', 'Influenza', NULL, '2022-01-25 15:27:56', '2022-01-25 15:35:53');
INSERT INTO `diagnosa` VALUES (5, 'T62.2', 'Keracunan Makanan', NULL, '2022-01-25 15:28:39', '2022-01-25 15:37:10');
INSERT INTO `diagnosa` VALUES (6, 'G43.9', 'Migren', NULL, '2022-01-25 15:29:11', '2022-01-25 15:39:25');
INSERT INTO `diagnosa` VALUES (7, 'A08.4', 'Infeksi virus usus, tidak spesifik', NULL, NULL, NULL);
INSERT INTO `diagnosa` VALUES (8, 'A08.5', 'Infeksi usus tertentu lainnya', NULL, NULL, NULL);
INSERT INTO `diagnosa` VALUES (9, 'A49.9', 'Infeksi bakteri, tidak spesifik', NULL, NULL, NULL);
INSERT INTO `diagnosa` VALUES (10, 'A75.1', 'Tifus yang timbul ', NULL, NULL, NULL);
INSERT INTO `diagnosa` VALUES (11, 'A77.8', 'Demam berbintik lainnya', NULL, NULL, NULL);
INSERT INTO `diagnosa` VALUES (12, 'A79.0', 'Demam parit', NULL, NULL, NULL);
INSERT INTO `diagnosa` VALUES (13, 'A96.8', 'Demam berdarah arenaviral lainnya', NULL, NULL, NULL);
INSERT INTO `diagnosa` VALUES (14, 'B03', 'Cacar', NULL, NULL, NULL);
INSERT INTO `diagnosa` VALUES (15, 'D50.9', 'Anemia kekurangan zat besi, tidak spesifik', NULL, NULL, NULL);
INSERT INTO `diagnosa` VALUES (16, 'D52.0', 'Anemia defisiensi folat diet', NULL, NULL, NULL);
INSERT INTO `diagnosa` VALUES (17, 'E64.2', 'Gejala sisa kekurangan vitamin c', NULL, NULL, NULL);
INSERT INTO `diagnosa` VALUES (18, 'H81.4', 'Vertigo sentral asal', NULL, NULL, NULL);
INSERT INTO `diagnosa` VALUES (19, 'J33.9', 'Polip hidung, tidak spesifik', NULL, NULL, NULL);
INSERT INTO `diagnosa` VALUES (20, 'J33.8', 'Polip lain dari sinus', NULL, NULL, NULL);

-- ----------------------------
-- Table structure for dokter
-- ----------------------------
DROP TABLE IF EXISTS `dokter`;
CREATE TABLE `dokter`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jenis_kelamin` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `telephone` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_jabatan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_statkepegawaian` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_spesialis` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 38 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of dokter
-- ----------------------------
INSERT INTO `dokter` VALUES (1, 'RAHMI ALMA', 'P', '08776664444', 'test', 'test', '1', '3', '', '2021-10-06 17:38:48', '2022-01-25 06:00:02');
INSERT INTO `dokter` VALUES (26, 'SILVI RAHAYU', 'P', '08224441111', 'test', 'test', '1', '1', '3', '2021-12-21 00:00:00', '2022-01-25 05:59:43');
INSERT INTO `dokter` VALUES (27, 'ADITIA YANUAR', 'L', '087744223758', 'Malang', 'dokter1@gmail.com', '1', '1', '1', '2022-01-24 11:54:40', '2022-01-25 05:59:36');
INSERT INTO `dokter` VALUES (28, 'SITI ANNUR', 'P', '087745678923', 'Malang', 'dokter2@gmail.com', '2', '1', '', '2022-01-24 11:55:35', '2022-01-25 05:59:29');
INSERT INTO `dokter` VALUES (29, 'REGINA PUTRI', 'P', '082233334455', 'Malang', 'dokter3@gmail.com', '2', '1', '4', '2022-01-24 11:56:52', '2022-01-25 05:59:17');
INSERT INTO `dokter` VALUES (30, 'BUDIYANTO', 'L', '087767895436', 'Malang', 'dokter4@gmail.com', '1', '1', '', '2022-01-24 12:15:29', '2022-01-25 05:59:09');
INSERT INTO `dokter` VALUES (31, 'NOVIANA SANDI', 'P', '082244141115', 'Malang', 'dokter10@gmail.com', '1', '1', '1', '2022-01-25 06:37:59', NULL);
INSERT INTO `dokter` VALUES (32, 'Dokter 11', 'L', '089766545545', 'Malang', 'dokter11@gmail.com', '1', '2', '', '2022-01-25 06:38:50', NULL);
INSERT INTO `dokter` VALUES (33, 'FARA DIBAH', 'P', '089766544555', 'Malang', 'dokter12@gmail.com', '2', '1', '', '2022-01-25 06:39:13', NULL);
INSERT INTO `dokter` VALUES (34, 'ARDIAN PRADANA', 'L', '081111111111', 'Karangploso', 'dumum@gmail.com', '1', '1', '1', '2022-06-15 10:02:48', NULL);
INSERT INTO `dokter` VALUES (35, 'MITA DEVINA', 'P', '082222222222', 'Karanglo', 'dgigi@gmail.com', '3', '1', '2', '2022-06-15 10:03:36', NULL);
INSERT INTO `dokter` VALUES (36, 'ADISTI EKA FARAH DEWI', 'P', '083333333333', 'Kepuh', 'dkia@gmail.com', '2', '2', '', '2022-06-15 10:07:58', NULL);
INSERT INTO `dokter` VALUES (37, 'ANNISA FARADILA', 'P', '084444444444', 'Tegalgondo', 'dkb@gmail.com', '1', '1', '', '2022-06-15 10:10:01', NULL);

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for golongan_darah
-- ----------------------------
DROP TABLE IF EXISTS `golongan_darah`;
CREATE TABLE `golongan_darah`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of golongan_darah
-- ----------------------------
INSERT INTO `golongan_darah` VALUES (1, 'A', NULL, NULL);
INSERT INTO `golongan_darah` VALUES (2, 'B', NULL, NULL);
INSERT INTO `golongan_darah` VALUES (3, 'AB', NULL, NULL);
INSERT INTO `golongan_darah` VALUES (4, 'O', NULL, NULL);

-- ----------------------------
-- Table structure for golongan_obat
-- ----------------------------
DROP TABLE IF EXISTS `golongan_obat`;
CREATE TABLE `golongan_obat`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of golongan_obat
-- ----------------------------
INSERT INTO `golongan_obat` VALUES (1, 'Analgetic', '2022-01-03 19:33:30', NULL);
INSERT INTO `golongan_obat` VALUES (2, 'Antibiotic', '2022-01-03 19:33:41', NULL);
INSERT INTO `golongan_obat` VALUES (3, 'Antihipertensi', '2022-01-03 19:34:01', NULL);
INSERT INTO `golongan_obat` VALUES (4, 'Diabetes', '2022-01-03 19:34:13', NULL);

-- ----------------------------
-- Table structure for jabatan
-- ----------------------------
DROP TABLE IF EXISTS `jabatan`;
CREATE TABLE `jabatan`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of jabatan
-- ----------------------------
INSERT INTO `jabatan` VALUES (1, 'pegawai', NULL, NULL);
INSERT INTO `jabatan` VALUES (2, 'asisten', NULL, NULL);
INSERT INTO `jabatan` VALUES (3, 'kepala', NULL, NULL);

-- ----------------------------
-- Table structure for jenis_pemeriksaan
-- ----------------------------
DROP TABLE IF EXISTS `jenis_pemeriksaan`;
CREATE TABLE `jenis_pemeriksaan`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of jenis_pemeriksaan
-- ----------------------------
INSERT INTO `jenis_pemeriksaan` VALUES (2, 'Tindakan Keperawatan Sedang', '2022-01-01 13:20:44', '2022-01-01 13:35:28');
INSERT INTO `jenis_pemeriksaan` VALUES (3, 'Tindakan Keperawatan Kecil', '2022-01-03 12:50:55', NULL);
INSERT INTO `jenis_pemeriksaan` VALUES (4, 'Tindakan Keperawatan Besar', '2022-01-03 12:51:10', NULL);
INSERT INTO `jenis_pemeriksaan` VALUES (5, 'HEMATOLOGI', '2022-01-27 15:31:48', NULL);
INSERT INTO `jenis_pemeriksaan` VALUES (8, 'URINE', '2022-01-27 15:32:13', NULL);
INSERT INTO `jenis_pemeriksaan` VALUES (9, 'KIMIA DARAH', '2022-01-27 15:32:29', NULL);
INSERT INTO `jenis_pemeriksaan` VALUES (10, 'KIMIA KLINIK', NULL, NULL);

-- ----------------------------
-- Table structure for kelompok_pasien
-- ----------------------------
DROP TABLE IF EXISTS `kelompok_pasien`;
CREATE TABLE `kelompok_pasien`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of kelompok_pasien
-- ----------------------------
INSERT INTO `kelompok_pasien` VALUES (1, 'UMUM', NULL, NULL);
INSERT INTO `kelompok_pasien` VALUES (2, 'BPJS/ASKES', NULL, NULL);

-- ----------------------------
-- Table structure for kelurahan
-- ----------------------------
DROP TABLE IF EXISTS `kelurahan`;
CREATE TABLE `kelurahan`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of kelurahan
-- ----------------------------
INSERT INTO `kelurahan` VALUES (1, 'AMPELDENTO, KEC. KARANGPLOSO, KAB. MALANG, 65152, JAWA TIMUR', NULL, NULL);
INSERT INTO `kelurahan` VALUES (2, 'BOCEK, KEC.KARANGPLOSO, KAB.MALANG, 65152, JAWA TIMUR', NULL, NULL);
INSERT INTO `kelurahan` VALUES (3, 'DONOWARIH, KEC.KARANGPLOSO, KAB.MALANG, 65152, JAWA TIMUR', NULL, NULL);
INSERT INTO `kelurahan` VALUES (4, 'GIRIMOYO, KEC.KARANGPLOSO, KAB.MALANG, 65152, JAWA TIMUR', NULL, NULL);
INSERT INTO `kelurahan` VALUES (5, 'KEPUHARJO, KEC.KARANGPLOSO, KAB.MALANG, 65152, JAWA TIMUR', NULL, NULL);
INSERT INTO `kelurahan` VALUES (6, 'NGENEP, KEC.KARANGPLOSO, KAB.MALANG, 65152, JAWA TIMUR', NULL, NULL);
INSERT INTO `kelurahan` VALUES (7, 'NGIJO, KEC.KARANGPLOSO, KAB.MALANG, 65152, JAWA TIMUR', NULL, NULL);
INSERT INTO `kelurahan` VALUES (8, 'TEGALGONDO, KEC.KARANGPLOSO, KAB.MALANG, 65152, JAWA TIMUR', NULL, NULL);
INSERT INTO `kelurahan` VALUES (9, 'TAWANGARGO, KEC.KARANGPLOSO, KAB.MALANG, 65152, JAWA TIMUR', NULL, NULL);

-- ----------------------------
-- Table structure for kunjungan_pasien
-- ----------------------------
DROP TABLE IF EXISTS `kunjungan_pasien`;
CREATE TABLE `kunjungan_pasien`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tgl_kunjungan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jam_kunjungan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `no_urut` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jenis_kunjungan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `keluhan` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kondisi_pasien` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kelompok_pasien` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_unit` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_pasien` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_dokter` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kunjungan_pasien
-- ----------------------------

-- ----------------------------
-- Table structure for medical_record
-- ----------------------------
DROP TABLE IF EXISTS `medical_record`;
CREATE TABLE `medical_record`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_pasien` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `id_registrasi_pasien` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `id_diagnosa` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `id_obat` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_unit` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_dokter` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of medical_record
-- ----------------------------

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (4, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` VALUES (5, '2021_09_23_024119_create_students_table', 2);

-- ----------------------------
-- Table structure for obat
-- ----------------------------
DROP TABLE IF EXISTS `obat`;
CREATE TABLE `obat`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `kode_obat` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_golongan_obat` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_satuan_obat` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 27 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of obat
-- ----------------------------
INSERT INTO `obat` VALUES (22, 'AA123456', 'FG Troches', 'diminum', '2', '1', '2022-01-03 20:17:15', '2022-01-25 16:09:12');
INSERT INTO `obat` VALUES (23, 'OB0001', 'Salisilat', NULL, '1', '2', NULL, NULL);
INSERT INTO `obat` VALUES (24, 'AB12345', 'Paracetamol', 'diminum', '1', '3', '2022-01-04 19:26:46', '2022-01-25 16:08:59');
INSERT INTO `obat` VALUES (25, 'AB12345', 'Obat Demam', 'diminum', '1', '3', '2022-01-04 19:34:59', NULL);
INSERT INTO `obat` VALUES (26, 'AB12345', 'Ponstan', 'diminum', '1', '2', '2022-01-04 19:48:10', '2022-01-25 16:08:18');

-- ----------------------------
-- Table structure for pasien
-- ----------------------------
DROP TABLE IF EXISTS `pasien`;
CREATE TABLE `pasien`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 82 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pasien
-- ----------------------------
INSERT INTO `pasien` VALUES (1, 'tt', '2021-09-23 23:44:03', NULL);
INSERT INTO `pasien` VALUES (7, 'ff', '2021-09-23 23:44:02', NULL);
INSERT INTO `pasien` VALUES (8, 'ff', '2021-09-23 23:44:02', NULL);
INSERT INTO `pasien` VALUES (9, 'tttt', '2021-09-23 23:44:01', NULL);
INSERT INTO `pasien` VALUES (10, 'test', '2021-09-23 23:44:00', NULL);
INSERT INTO `pasien` VALUES (11, 'titan', '2021-09-23 16:41:22', NULL);
INSERT INTO `pasien` VALUES (12, 'twtewt', '2021-09-23 00:00:00', NULL);
INSERT INTO `pasien` VALUES (13, 'aku', '2021-09-23 00:00:00', NULL);
INSERT INTO `pasien` VALUES (14, 'aku', '2021-09-23 00:00:00', NULL);
INSERT INTO `pasien` VALUES (15, 'aku', '2021-09-23 00:00:00', NULL);
INSERT INTO `pasien` VALUES (16, 'titan', '2021-09-23 00:00:00', NULL);
INSERT INTO `pasien` VALUES (17, 'titan', '2021-09-23 00:00:00', NULL);
INSERT INTO `pasien` VALUES (18, 'tttt', '2021-09-23 00:00:00', NULL);
INSERT INTO `pasien` VALUES (19, 'tttt', '2021-09-23 00:00:00', NULL);
INSERT INTO `pasien` VALUES (20, 'tttt', '2021-09-23 00:00:00', NULL);
INSERT INTO `pasien` VALUES (21, 'tttt', '2021-09-23 00:00:00', NULL);
INSERT INTO `pasien` VALUES (22, 'test', '2021-09-23 00:00:00', NULL);
INSERT INTO `pasien` VALUES (23, 'Kwitansi', '2021-09-23 00:00:00', NULL);
INSERT INTO `pasien` VALUES (24, 'BAB I', '2021-09-23 00:00:00', NULL);
INSERT INTO `pasien` VALUES (25, 'tttt', '2021-09-23 00:00:00', NULL);
INSERT INTO `pasien` VALUES (26, 'rrr', '2021-09-23 00:00:00', NULL);
INSERT INTO `pasien` VALUES (27, 'rrr', '2021-09-23 00:00:00', NULL);
INSERT INTO `pasien` VALUES (28, 'rrr', '2021-09-23 00:00:00', NULL);
INSERT INTO `pasien` VALUES (29, 'TA-006 (Form Biodata TA)', '2021-09-23 00:00:00', NULL);
INSERT INTO `pasien` VALUES (30, 'BAB I', '2021-09-23 00:00:00', NULL);
INSERT INTO `pasien` VALUES (31, 'BAB I', '2021-09-23 00:00:00', NULL);
INSERT INTO `pasien` VALUES (32, 'Form Check List', '2021-09-23 00:00:00', NULL);
INSERT INTO `pasien` VALUES (33, 'TA-006 (Form Biodata TA)', '2021-09-23 00:00:00', NULL);
INSERT INTO `pasien` VALUES (34, 'TA-006 (Form Biodata TA)', '2021-09-23 00:00:00', NULL);
INSERT INTO `pasien` VALUES (35, 'TA-006 (Form Biodata TA)', '2021-09-23 00:00:00', NULL);
INSERT INTO `pasien` VALUES (36, 'TA-006 (Form Biodata TA)', '2021-09-23 00:00:00', NULL);
INSERT INTO `pasien` VALUES (37, 'BAB I', '2021-09-23 00:00:00', NULL);
INSERT INTO `pasien` VALUES (38, 'BAB I', '2021-09-23 00:00:00', NULL);
INSERT INTO `pasien` VALUES (39, 'BAB I', '2021-09-23 00:00:00', NULL);
INSERT INTO `pasien` VALUES (40, 'BAB I', '2021-09-23 00:00:00', NULL);
INSERT INTO `pasien` VALUES (41, 'Kwitansi', '2021-09-23 00:00:00', NULL);
INSERT INTO `pasien` VALUES (42, 'TA-006 (Form Biodata TA)', '2021-09-23 00:00:00', NULL);
INSERT INTO `pasien` VALUES (43, 'SK Dekan Pembimbing TS', '2021-09-23 00:00:00', NULL);
INSERT INTO `pasien` VALUES (44, 'TA-006 (Form Biodata TA)', '2021-09-23 00:00:00', NULL);
INSERT INTO `pasien` VALUES (45, 'Kwitansi', '2021-09-23 00:00:00', NULL);
INSERT INTO `pasien` VALUES (46, 'Kwitansi', '2021-09-23 00:00:00', NULL);
INSERT INTO `pasien` VALUES (47, 'Transkrip', '2021-09-23 00:00:00', NULL);
INSERT INTO `pasien` VALUES (48, 'TA-006 (Form Biodata TA)', '2021-09-23 00:00:00', NULL);
INSERT INTO `pasien` VALUES (49, 'TA-006 (Form Biodata TA)', '2021-09-23 00:00:00', NULL);
INSERT INTO `pasien` VALUES (50, 'TA-006 (Form Biodata TA)', '2021-09-23 00:00:00', NULL);
INSERT INTO `pasien` VALUES (51, 'Transkrip', '2021-09-23 00:00:00', NULL);
INSERT INTO `pasien` VALUES (52, 'BAB I', '2021-09-23 00:00:00', NULL);
INSERT INTO `pasien` VALUES (53, 'TA-006 (Form Biodata TA)', '2021-09-23 00:00:00', NULL);
INSERT INTO `pasien` VALUES (54, 'BAB I', '2021-09-23 00:00:00', NULL);
INSERT INTO `pasien` VALUES (55, 'TA-006 (Form Biodata TA)', '2021-09-23 00:00:00', NULL);
INSERT INTO `pasien` VALUES (56, 'TA-006 (Form Biodata TA)', '2021-09-23 00:00:00', NULL);
INSERT INTO `pasien` VALUES (58, 'TA-006 (Form Biodata TA)', '2021-09-23 00:00:00', NULL);
INSERT INTO `pasien` VALUES (59, 'Kwitansi', '2021-09-23 00:00:00', NULL);
INSERT INTO `pasien` VALUES (60, 'TA-006 (Form Biodata TA)', '2021-09-23 00:00:00', NULL);
INSERT INTO `pasien` VALUES (61, 'Kwitansi', '2021-09-23 00:00:00', NULL);
INSERT INTO `pasien` VALUES (62, 'SK Dekan Pembimbing TS', '2021-09-23 00:00:00', NULL);
INSERT INTO `pasien` VALUES (63, 'SK Dekan Pembimbing TS', '2021-09-23 00:00:00', NULL);
INSERT INTO `pasien` VALUES (64, 'BAB I', '2021-09-23 00:00:00', NULL);
INSERT INTO `pasien` VALUES (65, 'TA-006 (Form Biodata TA)', '2021-09-23 00:00:00', NULL);
INSERT INTO `pasien` VALUES (66, 'BAB I', '2021-09-23 00:00:00', NULL);
INSERT INTO `pasien` VALUES (67, 'Kwitansi', '2021-09-23 00:00:00', NULL);
INSERT INTO `pasien` VALUES (68, 'BAB I', '2021-09-23 00:00:00', NULL);
INSERT INTO `pasien` VALUES (69, 'Kwitansi', '2021-09-23 00:00:00', NULL);
INSERT INTO `pasien` VALUES (70, 'TA-006 (Form Biodata TA)', '2021-09-23 00:00:00', NULL);
INSERT INTO `pasien` VALUES (71, 'Kwitansi', '2021-09-23 00:00:00', NULL);
INSERT INTO `pasien` VALUES (72, 'r', '2021-09-23 00:00:00', '2021-09-24 00:00:00');
INSERT INTO `pasien` VALUES (73, 'Form Check List', '2021-09-23 00:00:00', NULL);
INSERT INTO `pasien` VALUES (74, 'SK Dekan Pembimbing TS', '2021-09-23 00:00:00', NULL);
INSERT INTO `pasien` VALUES (75, 'Kwitansi', '2021-09-23 00:00:00', NULL);
INSERT INTO `pasien` VALUES (76, 'BAB I', '2021-09-23 00:00:00', NULL);

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for pekerjaan
-- ----------------------------
DROP TABLE IF EXISTS `pekerjaan`;
CREATE TABLE `pekerjaan`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of pekerjaan
-- ----------------------------
INSERT INTO `pekerjaan` VALUES (1, 'BELUM/TIDAK BEKERJA', NULL, NULL);
INSERT INTO `pekerjaan` VALUES (2, 'PELAJAR/MAHASISWA', NULL, NULL);
INSERT INTO `pekerjaan` VALUES (3, 'PEGAWAI NEGERI SIPIL', NULL, NULL);
INSERT INTO `pekerjaan` VALUES (4, 'PETANI/PEKEBUN', NULL, NULL);
INSERT INTO `pekerjaan` VALUES (5, 'PETERNAK', NULL, NULL);
INSERT INTO `pekerjaan` VALUES (6, 'KARYAWAN SWASTA', NULL, NULL);
INSERT INTO `pekerjaan` VALUES (7, 'KARYAWAN BUMN', NULL, NULL);
INSERT INTO `pekerjaan` VALUES (8, 'PENATA RIAS', NULL, NULL);
INSERT INTO `pekerjaan` VALUES (9, 'WARTAWAN', NULL, NULL);
INSERT INTO `pekerjaan` VALUES (10, 'GURU', NULL, NULL);
INSERT INTO `pekerjaan` VALUES (11, 'PEDAGANG', NULL, NULL);

-- ----------------------------
-- Table structure for pemeriksaan
-- ----------------------------
DROP TABLE IF EXISTS `pemeriksaan`;
CREATE TABLE `pemeriksaan`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `kode_pemeriksaan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_jenis_pemeriksaan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_unit` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of pemeriksaan
-- ----------------------------
INSERT INTO `pemeriksaan` VALUES (7, 'AP1234', 'Tensi Darah', ' ', '3', '9', '2022-01-04 07:39:04', '2022-01-04 19:46:37');
INSERT INTO `pemeriksaan` VALUES (8, 'PU11112', 'Cabut gigi susu dewasa', ' ', '4', '8', '2022-01-04 07:42:02', '2022-01-04 20:22:36');
INSERT INTO `pemeriksaan` VALUES (9, 'PG1111', 'PSA', 'perawatan saluran akar', '4', '8', '2022-01-04 19:41:29', '2022-01-04 19:45:43');
INSERT INTO `pemeriksaan` VALUES (10, 'H0001', 'Leukosit', ' ', '5', '6', '2022-01-27 15:33:45', NULL);
INSERT INTO `pemeriksaan` VALUES (11, 'H0002', 'Kolesterol', '< 200 mg/dl', '10', '6', '2022-01-27 15:34:22', NULL);
INSERT INTO `pemeriksaan` VALUES (12, 'U0001', 'Glukosa Urin', '- Negatif', '8', '6', '2022-01-27 15:34:51', NULL);
INSERT INTO `pemeriksaan` VALUES (13, 'A0001', 'Albumin', ' ', '9', '6', '2022-01-27 15:35:16', NULL);
INSERT INTO `pemeriksaan` VALUES (14, 'B0001', 'Cek suhu tubuh', ' ', '3', '7', '2022-01-27 15:37:40', NULL);

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `personal_access_tokens_token_unique`(`token`) USING BTREE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type`, `tokenable_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for registrasi_pasien
-- ----------------------------
DROP TABLE IF EXISTS `registrasi_pasien`;
CREATE TABLE `registrasi_pasien`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `tgl_kunjungan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `keluhan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `id_pasien` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_unit` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `no_registrasi` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 55 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of registrasi_pasien
-- ----------------------------
INSERT INTO `registrasi_pasien` VALUES (33, '2022-01-05', 'demam tinggi', '2', '7', '2022-01-04 20:04:11', '2022-01-04 20:08:19', 'REG-213007');
INSERT INTO `registrasi_pasien` VALUES (34, '2022-01-03', 'scalling', '2', '8', '2022-01-04 20:04:41', '2022-01-04 20:05:11', 'REG-213008');
INSERT INTO `registrasi_pasien` VALUES (35, '2022-01-05', 'titan', '2', '8', '2022-01-05 12:07:14', '2022-01-05 12:11:10', 'REG-213009');
INSERT INTO `registrasi_pasien` VALUES (38, '2022-01-05', 'fdfdf', '2', '9', '2022-01-05 14:31:03', NULL, 'REG-213049');
INSERT INTO `registrasi_pasien` VALUES (40, '2022-01-25', 'BATUK KERING', '5', '7', '2022-01-25 13:08:15', NULL, 'REG-20746');
INSERT INTO `registrasi_pasien` VALUES (41, '2022-06-19', 'SESAK NAFAS', '3', '7', '2022-01-25 13:14:54', NULL, 'REG-201435');
INSERT INTO `registrasi_pasien` VALUES (42, '2022-01-25', 'NYERI BAGIAN PERUT', '4', '7', '2022-01-25 15:02:08', NULL, 'REG-22133');
INSERT INTO `registrasi_pasien` VALUES (43, '2022-01-26', 'aksjka', '4', '8', '2022-01-26 08:37:20', NULL, 'REG-15378');
INSERT INTO `registrasi_pasien` VALUES (44, '2022-01-26', 'keluhan test', '7', '9', '2022-01-26 14:37:50', NULL, 'REG-213729');
INSERT INTO `registrasi_pasien` VALUES (45, '2022-06-17', 'sakit jiwa', '2', '7', '2022-01-27 08:41:29', NULL, 'REG-154112');
INSERT INTO `registrasi_pasien` VALUES (46, '2022-01-28', 'lelah letih lesu', '7', '10', '2022-01-28 05:13:33', NULL, 'REG-12134');
INSERT INTO `registrasi_pasien` VALUES (47, '2022-01-28', 'lunglai', '4', '9', '2022-01-28 05:13:53', NULL, 'REG-121339');
INSERT INTO `registrasi_pasien` VALUES (48, '2022-06-19', 'flu', '3', '7', '2022-01-28 05:14:20', NULL, 'REG-121356');
INSERT INTO `registrasi_pasien` VALUES (49, '2022-02-24', 'akjsdkaskdska', '4', '7', '2022-02-24 04:26:16', NULL, 'REG-11267');
INSERT INTO `registrasi_pasien` VALUES (50, '2022-06-16', 'sakit gigi', '2', '8', '2022-06-14 10:19:51', NULL, 'REG-171931');
INSERT INTO `registrasi_pasien` VALUES (51, '2022-06-15', 'nyeri perut', '7', '7', '2022-06-15 10:51:00', NULL, 'REG-175045');
INSERT INTO `registrasi_pasien` VALUES (53, '2022-06-22', 'sakit perut', '4', '7', '2022-06-22 06:04:27', NULL, 'REG-1346');
INSERT INTO `registrasi_pasien` VALUES (54, '2022-06-22', 'sakit', '3', '7', '2022-06-22 13:45:38', NULL, 'REG-204524');

-- ----------------------------
-- Table structure for request_lab
-- ----------------------------
DROP TABLE IF EXISTS `request_lab`;
CREATE TABLE `request_lab`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_registrasi` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_pemeriksaan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_dokter` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_user_petugas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tgl_request` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of request_lab
-- ----------------------------
INSERT INTO `request_lab` VALUES (1, '33', '7,10', '1', '3', '2022-06-20 14:33:09', '2022-06-20 14:33:09', 'rtest', '2022-06-20');
INSERT INTO `request_lab` VALUES (2, '40', '12,10', '1', '3', '2022-06-22 04:24:48', '2022-06-22 04:24:48', 'xxxx', '2022-06-22');
INSERT INTO `request_lab` VALUES (3, '52', '9', '29', '3', '2022-06-22 04:32:11', '2022-06-22 04:32:11', 'xyxyxy', '2022-06-22');

-- ----------------------------
-- Table structure for rujukan_internal
-- ----------------------------
DROP TABLE IF EXISTS `rujukan_internal`;
CREATE TABLE `rujukan_internal`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_unit` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_tindakan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of rujukan_internal
-- ----------------------------

-- ----------------------------
-- Table structure for rujukan_pasien
-- ----------------------------
DROP TABLE IF EXISTS `rujukan_pasien`;
CREATE TABLE `rujukan_pasien`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `tipe_rujukan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_tindakan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `poli_tujuan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `rs_tujuan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `kriteria` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `alasan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `no_rujuk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `pemeriksaan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `id_user_petugas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of rujukan_pasien
-- ----------------------------
INSERT INTO `rujukan_pasien` VALUES (1, 'eksternal', '5', 'test2', 'test2', 'EMERGENCY', 'fasilitas kurang', '2022-01-27 08:48:56', '2022-06-19 14:40:31', 'RJ-REG-213007-20220127-154849', NULL, NULL);
INSERT INTO `rujukan_pasien` VALUES (2, 'eksternal', '6', 'test tujuan', 'test rs', 'LANJUTAN', 'test alasan', '2022-01-27 17:02:25', '2022-01-27 17:02:25', 'RJ-REG-213009-20220128-0155', NULL, NULL);
INSERT INTO `rujukan_pasien` VALUES (5, 'internal', '16', '10', NULL, NULL, NULL, '2022-06-15 15:13:38', '2022-06-22 04:21:53', NULL, 'cek kbbbb', '3');
INSERT INTO `rujukan_pasien` VALUES (6, 'internal', '11', '10', NULL, NULL, NULL, '2022-06-15 15:14:24', '2022-06-19 13:38:40', NULL, 'ererrerer', '3');
INSERT INTO `rujukan_pasien` VALUES (8, 'internal', '13', '9', NULL, NULL, NULL, '2022-06-22 07:33:37', '2022-06-22 07:33:37', NULL, 'test pemeriksaan', '3');
INSERT INTO `rujukan_pasien` VALUES (10, 'internal', '18', '9', NULL, NULL, NULL, '2022-06-22 13:49:55', '2022-06-22 13:49:55', NULL, 'tes', '3');
INSERT INTO `rujukan_pasien` VALUES (11, 'internal', '17', '8', NULL, NULL, NULL, '2022-06-23 08:08:26', '2022-06-23 08:08:26', NULL, 'scalling', '3');

-- ----------------------------
-- Table structure for satuan_obat
-- ----------------------------
DROP TABLE IF EXISTS `satuan_obat`;
CREATE TABLE `satuan_obat`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of satuan_obat
-- ----------------------------
INSERT INTO `satuan_obat` VALUES (1, 'tablet', '2022-01-03 19:38:48', NULL);
INSERT INTO `satuan_obat` VALUES (2, 'sirup', '2022-01-03 19:38:56', NULL);
INSERT INTO `satuan_obat` VALUES (3, 'kapsul', '2022-01-03 19:39:03', NULL);
INSERT INTO `satuan_obat` VALUES (4, 'salep', '2022-01-03 19:39:15', NULL);

-- ----------------------------
-- Table structure for spesialis
-- ----------------------------
DROP TABLE IF EXISTS `spesialis`;
CREATE TABLE `spesialis`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of spesialis
-- ----------------------------
INSERT INTO `spesialis` VALUES (1, 'UMUM', NULL, NULL);
INSERT INTO `spesialis` VALUES (2, 'GIGI', NULL, NULL);
INSERT INTO `spesialis` VALUES (3, 'KIA', NULL, NULL);
INSERT INTO `spesialis` VALUES (4, 'KB', NULL, NULL);

-- ----------------------------
-- Table structure for statkepegawaian
-- ----------------------------
DROP TABLE IF EXISTS `statkepegawaian`;
CREATE TABLE `statkepegawaian`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of statkepegawaian
-- ----------------------------
INSERT INTO `statkepegawaian` VALUES (1, 'tetap', NULL, NULL);
INSERT INTO `statkepegawaian` VALUES (2, 'tidak tetap', NULL, NULL);

-- ----------------------------
-- Table structure for students
-- ----------------------------
DROP TABLE IF EXISTS `students`;
CREATE TABLE `students`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `students_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 201 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of students
-- ----------------------------
INSERT INTO `students` VALUES (1, 'Leo Paucek', 'ohessel@hoppe.net', 'mcglynn.deangelo', '+1 (540) 863-8691', '2007-06-14', NULL, NULL);
INSERT INTO `students` VALUES (2, 'Prof. Jerod Nicolas V', 'jennings.sporer@nikolaus.com', 'ehand', '1-831-908-0222', '2019-08-27', NULL, NULL);
INSERT INTO `students` VALUES (3, 'Mr. Dewayne Feil', 'qaltenwerth@lindgren.net', 'kilback.vincenza', '(640) 766-1692', '1998-08-15', NULL, NULL);
INSERT INTO `students` VALUES (4, 'Hardy Connelly DVM', 'gust.volkman@gmail.com', 'mervin76', '618.405.0556', '2000-09-01', NULL, NULL);
INSERT INTO `students` VALUES (5, 'Josh Lemke', 'cristobal.miller@jacobson.com', 'pauline.hirthe', '+1-336-333-5085', '1985-08-11', NULL, NULL);
INSERT INTO `students` VALUES (6, 'Archibald Jacobi', 'towne.adah@yahoo.com', 'quigley.malvina', '669.575.5602', '2010-11-14', NULL, NULL);
INSERT INTO `students` VALUES (7, 'Moshe Armstrong', 'minerva93@yahoo.com', 'yost.nestor', '910-760-0358', '1993-04-29', NULL, NULL);
INSERT INTO `students` VALUES (8, 'Rowland Wehner', 'balistreri.zechariah@yahoo.com', 'ekris', '+1-225-290-6602', '1984-10-21', NULL, NULL);
INSERT INTO `students` VALUES (9, 'Monty Bahringer DDS', 'dina20@little.com', 'fterry', '(509) 884-4317', '1973-10-26', NULL, NULL);
INSERT INTO `students` VALUES (10, 'Alexys King', 'ward.schuster@yahoo.com', 'roberts.antonio', '445.225.6494', '2010-02-06', NULL, NULL);
INSERT INTO `students` VALUES (11, 'Stanton Terry', 'shania23@yahoo.com', 'kgrimes', '+1.270.654.2676', '2012-07-26', NULL, NULL);
INSERT INTO `students` VALUES (12, 'Furman Stiedemann', 'xlarson@hotmail.com', 'ufriesen', '+1-667-247-8145', '2007-12-31', NULL, NULL);
INSERT INTO `students` VALUES (13, 'Mr. Buster Wisoky II', 'katherine.bosco@gmail.com', 'omari.ankunding', '+1.920.319.6265', '1979-01-17', NULL, NULL);
INSERT INTO `students` VALUES (14, 'Emmett Dibbert', 'tremblay.nikki@mcdermott.com', 'lbrakus', '(463) 618-7918', '2019-06-24', NULL, NULL);
INSERT INTO `students` VALUES (15, 'Wilfred Trantow Sr.', 'abbey65@gmail.com', 'makenzie.farrell', '360-548-4653', '1976-12-22', NULL, NULL);
INSERT INTO `students` VALUES (16, 'Mr. Jensen Hand', 'oschaden@gmail.com', 'brosenbaum', '(551) 228-3345', '1982-01-20', NULL, NULL);
INSERT INTO `students` VALUES (17, 'Prof. Cole Predovic', 'michale90@volkman.com', 'kutch.rowan', '404.382.0438', '1995-03-08', NULL, NULL);
INSERT INTO `students` VALUES (18, 'Philip Satterfield PhD', 'estelle27@collier.com', 'ferry.sydni', '+1-650-797-4557', '2007-05-20', NULL, NULL);
INSERT INTO `students` VALUES (19, 'Terrance Gaylord', 'krobel@braun.com', 'kristin70', '267.576.3459', '2020-01-26', NULL, NULL);
INSERT INTO `students` VALUES (20, 'Elwin Berge DDS', 'myrtice.gutmann@yahoo.com', 'smueller', '+19785548278', '1990-12-27', NULL, NULL);
INSERT INTO `students` VALUES (21, 'Randi Schimmel', 'magdalena28@streich.info', 'elnora60', '(562) 920-8453', '1974-10-03', NULL, NULL);
INSERT INTO `students` VALUES (22, 'Kiley Boehm', 'roob.ivah@keeling.com', 'baltenwerth', '+17439407162', '1980-09-27', NULL, NULL);
INSERT INTO `students` VALUES (23, 'Mr. Kendrick Smitham IV', 'cfritsch@shanahan.org', 'tjenkins', '(773) 560-9582', '2002-01-02', NULL, NULL);
INSERT INTO `students` VALUES (24, 'Mr. Floy Shanahan DVM', 'freddie39@yahoo.com', 'jamey.cremin', '937.787.4475', '2017-05-26', NULL, NULL);
INSERT INTO `students` VALUES (25, 'William Considine', 'emard.jennyfer@blanda.net', 'noble26', '+1-608-788-7753', '2012-06-15', NULL, NULL);
INSERT INTO `students` VALUES (26, 'Alexandro Sawayn', 'ohara.mary@corkery.com', 'enikolaus', '1-712-947-3317', '1978-04-13', NULL, NULL);
INSERT INTO `students` VALUES (27, 'Mr. Furman Kessler V', 'odessa86@gmail.com', 'windler.brando', '1-478-212-4447', '1986-02-11', NULL, NULL);
INSERT INTO `students` VALUES (28, 'Kendall Willms', 'karianne01@jacobi.org', 'preston.senger', '1-561-263-7870', '2009-09-18', NULL, NULL);
INSERT INTO `students` VALUES (29, 'Reinhold Jast', 'jake.dietrich@ebert.biz', 'west.delia', '1-949-625-1905', '1973-09-17', NULL, NULL);
INSERT INTO `students` VALUES (30, 'Prof. Ludwig Morissette', 'xeichmann@gmail.com', 'dan.koch', '1-469-450-3594', '2008-03-28', NULL, NULL);
INSERT INTO `students` VALUES (31, 'Mckenzie Funk', 'bergstrom.dale@yahoo.com', 'scarlett.pagac', '810.408.3718', '2001-01-15', NULL, NULL);
INSERT INTO `students` VALUES (32, 'Claud Gleichner', 'murphy.rau@prosacco.info', 'flang', '+1-762-804-3117', '1985-02-15', NULL, NULL);
INSERT INTO `students` VALUES (33, 'Mr. Jan Waters PhD', 'ariel47@bode.com', 'spinka.hilton', '+1 (505) 919-7315', '2010-03-15', NULL, NULL);
INSERT INTO `students` VALUES (34, 'Cielo O\'Connell', 'goldner.jillian@gmail.com', 'laury22', '1-918-912-2464', '1981-01-02', NULL, NULL);
INSERT INTO `students` VALUES (35, 'Luis Abernathy', 'lpfeffer@schamberger.biz', 'sschulist', '732.923.1118', '1996-08-18', NULL, NULL);
INSERT INTO `students` VALUES (36, 'D\'angelo Kerluke', 'ltoy@yahoo.com', 'finn90', '210-653-3943', '1974-07-07', NULL, NULL);
INSERT INTO `students` VALUES (37, 'Jeramy Smith IV', 'kulas.autumn@gmail.com', 'shaina43', '501.536.7049', '2007-08-16', NULL, NULL);
INSERT INTO `students` VALUES (38, 'Alex Welch I', 'veum.julie@hotmail.com', 'kautzer.vilma', '+13418373704', '1999-07-08', NULL, NULL);
INSERT INTO `students` VALUES (39, 'Maverick Conroy', 'martina99@hotmail.com', 'yolanda.bartell', '407.384.9898', '2018-07-22', NULL, NULL);
INSERT INTO `students` VALUES (40, 'Mr. Arthur Altenwerth DVM', 'gerhold.elza@yahoo.com', 'annalise53', '361-391-1799', '1980-01-13', NULL, NULL);
INSERT INTO `students` VALUES (41, 'Luigi Weissnat', 'bridgette.hayes@gmail.com', 'roderick33', '785-642-3117', '1988-06-24', NULL, NULL);
INSERT INTO `students` VALUES (42, 'Boyd Runolfsson I', 'xbayer@lynch.com', 'astracke', '(361) 779-2416', '2005-02-19', NULL, NULL);
INSERT INTO `students` VALUES (43, 'Enos Ferry', 'jamaal.lakin@hotmail.com', 'kenna.botsford', '(831) 680-2483', '1997-03-15', NULL, NULL);
INSERT INTO `students` VALUES (44, 'Prof. Kobe Schiller V', 'kobe99@schaefer.com', 'leslie88', '731.432.5340', '2006-10-01', NULL, NULL);
INSERT INTO `students` VALUES (45, 'Camden Welch', 'larkin.amya@ernser.biz', 'abby.schuster', '+1 (321) 455-7482', '1998-10-29', NULL, NULL);
INSERT INTO `students` VALUES (46, 'Dr. Micheal Kshlerin', 'ggrady@boehm.com', 'alex.schultz', '283-408-6086', '1974-07-21', NULL, NULL);
INSERT INTO `students` VALUES (47, 'Mr. Isaias Hintz PhD', 'vwolf@yahoo.com', 'sawayn.genesis', '+1-629-953-6640', '1998-03-09', NULL, NULL);
INSERT INTO `students` VALUES (48, 'Lawrence VonRueden', 'ruthie.leffler@kozey.com', 'feest.erica', '680-579-2836', '1999-10-10', NULL, NULL);
INSERT INTO `students` VALUES (49, 'Sim Roberts IV', 'wkling@ullrich.net', 'rickie.mann', '(832) 749-9038', '1981-07-06', NULL, NULL);
INSERT INTO `students` VALUES (50, 'Leo O\'Connell', 'dschamberger@hotmail.com', 'lschuster', '469.286.2292', '1987-02-20', NULL, NULL);
INSERT INTO `students` VALUES (51, 'Johathan Ullrich IV', 'dannie.cummings@gmail.com', 'isabella.schamberger', '+18329679114', '1995-07-31', NULL, NULL);
INSERT INTO `students` VALUES (52, 'Mr. Murphy Torphy', 'fgerhold@gmail.com', 'alene.bergstrom', '425-324-1826', '2001-07-27', NULL, NULL);
INSERT INTO `students` VALUES (53, 'Hadley Schulist', 'dankunding@walter.com', 'quitzon.maxime', '1-660-302-9374', '1988-04-21', NULL, NULL);
INSERT INTO `students` VALUES (54, 'Seamus Treutel II', 'marcelo.eichmann@gmail.com', 'dimitri60', '(737) 916-5738', '2021-08-21', NULL, NULL);
INSERT INTO `students` VALUES (55, 'Issac Dach', 'leland14@bahringer.net', 'xhodkiewicz', '603.371.0170', '1995-05-03', NULL, NULL);
INSERT INTO `students` VALUES (56, 'Prof. Kamren Erdman PhD', 'dhessel@hotmail.com', 'luz40', '1-260-390-6418', '2015-06-12', NULL, NULL);
INSERT INTO `students` VALUES (57, 'Philip Littel', 'zkuvalis@hotmail.com', 'utowne', '1-440-415-3713', '1992-12-27', NULL, NULL);
INSERT INTO `students` VALUES (58, 'Dr. Ruben Frami', 'bmarquardt@jakubowski.net', 'zachariah55', '+1 (763) 910-2492', '1973-12-10', NULL, NULL);
INSERT INTO `students` VALUES (59, 'Myron Langworth', 'waelchi.meagan@gmail.com', 'swift.sophia', '(984) 205-7680', '1976-04-28', NULL, NULL);
INSERT INTO `students` VALUES (60, 'Dr. Dane Schumm', 'mayer.jerel@yost.com', 'vwisoky', '+1.445.451.6375', '1976-02-15', NULL, NULL);
INSERT INTO `students` VALUES (61, 'Buck Littel', 'roscoe.reilly@yahoo.com', 'tierra03', '234-893-5306', '1981-06-02', NULL, NULL);
INSERT INTO `students` VALUES (62, 'Angelo Spencer III', 'lester.spencer@hotmail.com', 'lesch.dusty', '971.565.4519', '2020-06-08', NULL, NULL);
INSERT INTO `students` VALUES (63, 'Christopher Crooks Jr.', 'darian59@yahoo.com', 'vlubowitz', '719.667.4517', '1998-10-12', NULL, NULL);
INSERT INTO `students` VALUES (64, 'Tad Bahringer', 'asa86@haag.com', 'horace.breitenberg', '+1 (707) 356-8238', '1994-08-01', NULL, NULL);
INSERT INTO `students` VALUES (65, 'Ezekiel Ratke', 'vilma.haag@gmail.com', 'xgleichner', '+1.458.220.7553', '1986-10-04', NULL, NULL);
INSERT INTO `students` VALUES (66, 'Nelson Quigley', 'fritz.hartmann@hotmail.com', 'norval.kassulke', '+1-339-956-1143', '2005-03-06', NULL, NULL);
INSERT INTO `students` VALUES (67, 'Dr. Ryann Hamill', 'vito.becker@parker.com', 'mueller.lenny', '1-930-709-6672', '2020-03-10', NULL, NULL);
INSERT INTO `students` VALUES (68, 'Dr. Jasmin Mayert', 'will.tierra@cronin.biz', 'lind.damion', '(434) 492-4183', '1978-02-15', NULL, NULL);
INSERT INTO `students` VALUES (69, 'Prince Purdy', 'brando41@hotmail.com', 'taurean.hane', '+1-680-617-1112', '1999-07-21', NULL, NULL);
INSERT INTO `students` VALUES (70, 'Lavon Hand', 'landen60@gmail.com', 'phahn', '412.481.2530', '2003-04-01', NULL, NULL);
INSERT INTO `students` VALUES (71, 'Dr. Immanuel Fahey V', 'zstroman@altenwerth.org', 'altenwerth.devonte', '831-631-2900', '2006-12-14', NULL, NULL);
INSERT INTO `students` VALUES (72, 'Deshaun Nolan', 'bartell.arno@little.net', 'ieffertz', '+1.786.337.6284', '2006-02-21', NULL, NULL);
INSERT INTO `students` VALUES (73, 'Terry Price', 'loren.considine@yost.net', 'laisha00', '(316) 415-2870', '1993-10-01', NULL, NULL);
INSERT INTO `students` VALUES (74, 'Mr. Alf Schmitt', 'ruthie62@funk.info', 'annetta86', '283.309.3151', '1985-05-03', NULL, NULL);
INSERT INTO `students` VALUES (75, 'Prof. Curtis Mayer', 'sheridan.mcdermott@gmail.com', 'bridget.jacobi', '682.228.5859', '1980-01-19', NULL, NULL);
INSERT INTO `students` VALUES (76, 'Mr. Dawson Lang', 'arnoldo10@connelly.org', 'xyost', '(951) 918-7711', '1973-07-15', NULL, NULL);
INSERT INTO `students` VALUES (77, 'Tracey Greenholt', 'gbogan@yahoo.com', 'derek45', '+1-989-956-3345', '2015-12-01', NULL, NULL);
INSERT INTO `students` VALUES (78, 'Dr. Logan Howe', 'dietrich.bessie@hoeger.com', 'dedric43', '629.655.2982', '2013-11-07', NULL, NULL);
INSERT INTO `students` VALUES (79, 'Abel Baumbach', 'bwatsica@hamill.com', 'wrosenbaum', '(534) 440-1976', '2013-06-21', NULL, NULL);
INSERT INTO `students` VALUES (80, 'Mr. Barry Ward II', 'ybogan@spinka.org', 'ynader', '1-779-931-2819', '2004-02-12', NULL, NULL);
INSERT INTO `students` VALUES (81, 'Murray Kuhic', 'qbogan@gmail.com', 'cade.hansen', '239.863.1879', '1979-05-28', NULL, NULL);
INSERT INTO `students` VALUES (82, 'Kian Zemlak', 'emmitt.lind@hotmail.com', 'boyd69', '+1.479.486.8521', '1974-07-13', NULL, NULL);
INSERT INTO `students` VALUES (83, 'Guido Leannon Sr.', 'demetrius04@gmail.com', 'xleffler', '+15056858073', '1999-02-26', NULL, NULL);
INSERT INTO `students` VALUES (84, 'Lavern Beahan', 'mervin.weimann@brekke.net', 'corwin.armani', '1-640-767-1863', '1984-11-18', NULL, NULL);
INSERT INTO `students` VALUES (85, 'Chester Thiel', 'grayce50@gmail.com', 'bernhard.dejah', '+15345377559', '1996-11-05', NULL, NULL);
INSERT INTO `students` VALUES (86, 'Reese Fay', 'fgusikowski@moore.com', 'beier.christop', '+1.646.848.0223', '2005-07-04', NULL, NULL);
INSERT INTO `students` VALUES (87, 'Mr. Clint Aufderhar III', 'francesca08@pollich.net', 'antonia.terry', '239-591-9422', '1994-07-15', NULL, NULL);
INSERT INTO `students` VALUES (88, 'Nico Volkman Sr.', 'rmarquardt@mertz.com', 'murazik.jaeden', '1-831-270-7944', '2011-07-25', NULL, NULL);
INSERT INTO `students` VALUES (89, 'Ervin Heaney II', 'virgil.hamill@cole.com', 'athena37', '+1 (830) 324-4851', '2007-07-04', NULL, NULL);
INSERT INTO `students` VALUES (90, 'Florian Brakus', 'fabiola.renner@gmail.com', 'griffin52', '+1 (412) 662-8660', '1997-06-20', NULL, NULL);
INSERT INTO `students` VALUES (91, 'Wilhelm Treutel MD', 'welch.madalyn@gmail.com', 'lbrakus', '1-219-715-1193', '2014-03-19', NULL, NULL);
INSERT INTO `students` VALUES (92, 'Kieran Kiehn', 'gene.hermiston@yahoo.com', 'emmie63', '646-360-5116', '2010-01-17', NULL, NULL);
INSERT INTO `students` VALUES (93, 'Carey Carter II', 'janice93@grady.biz', 'yfeil', '+1 (740) 491-1379', '1982-03-11', NULL, NULL);
INSERT INTO `students` VALUES (94, 'Camden Smitham', 'kassulke.molly@gutmann.net', 'ostiedemann', '+1-539-683-9601', '2018-12-28', NULL, NULL);
INSERT INTO `students` VALUES (95, 'Thomas Langworth DVM', 'nmayer@yahoo.com', 'brock.heaney', '+1-325-906-9859', '1990-03-22', NULL, NULL);
INSERT INTO `students` VALUES (96, 'Blake Abbott', 'harvey.monique@yahoo.com', 'blanda.mayra', '269-827-8252', '1998-03-23', NULL, NULL);
INSERT INTO `students` VALUES (97, 'Ike Cronin DDS', 'xhuels@gibson.com', 'thiel.tito', '763.988.2333', '2002-04-25', NULL, NULL);
INSERT INTO `students` VALUES (98, 'Trey Ortiz', 'hegmann.casper@hotmail.com', 'edythe31', '+13517396975', '1990-01-22', NULL, NULL);
INSERT INTO `students` VALUES (99, 'Antone Jaskolski', 'mblanda@hotmail.com', 'bwiegand', '731-280-2454', '1987-01-31', NULL, NULL);
INSERT INTO `students` VALUES (100, 'Werner Jacobi', 'abdiel45@barrows.biz', 'schroeder.jaime', '832.400.5569', '1979-07-28', NULL, NULL);
INSERT INTO `students` VALUES (101, 'Judge Christiansen', 'dietrich.laron@beatty.info', 'ortiz.roman', '769.981.4945', '1992-05-12', NULL, NULL);
INSERT INTO `students` VALUES (102, 'Vern Reichel', 'kcasper@yahoo.com', 'hailee43', '1-224-535-4308', '1986-11-08', NULL, NULL);
INSERT INTO `students` VALUES (103, 'Dr. Beau Thiel Sr.', 'zbrown@romaguera.net', 'theodora10', '+1-740-293-9692', '1998-10-18', NULL, NULL);
INSERT INTO `students` VALUES (104, 'Delaney Schinner', 'collier.kamryn@trantow.com', 'delta.walker', '+1.341.547.8553', '1974-03-12', NULL, NULL);
INSERT INTO `students` VALUES (105, 'Norbert Ernser', 'cheyanne57@spinka.com', 'osinski.jane', '1-239-626-9638', '2007-12-17', NULL, NULL);
INSERT INTO `students` VALUES (106, 'Dane Hettinger', 'annette93@yahoo.com', 'metz.dedric', '347-347-7702', '1987-12-19', NULL, NULL);
INSERT INTO `students` VALUES (107, 'Karl Blanda', 'dudley34@gmail.com', 'hilpert.tianna', '+1.463.362.7259', '1987-12-24', NULL, NULL);
INSERT INTO `students` VALUES (108, 'Mr. Tony Dickinson', 'korbin16@yahoo.com', 'williamson.lucio', '+1 (520) 857-7511', '1998-07-31', NULL, NULL);
INSERT INTO `students` VALUES (109, 'Rudolph Jacobson', 'pfadel@gmail.com', 'vada.aufderhar', '1-567-439-2504', '1985-05-29', NULL, NULL);
INSERT INTO `students` VALUES (110, 'Declan Ryan V', 'gerard16@yahoo.com', 'sheila.bosco', '281-940-8878', '1987-09-08', NULL, NULL);
INSERT INTO `students` VALUES (111, 'Javier Bins', 'kamron.leannon@nienow.info', 'witting.brant', '(220) 941-7167', '2005-11-24', NULL, NULL);
INSERT INTO `students` VALUES (112, 'Ryleigh Flatley', 'susana79@hotmail.com', 'denis.bartoletti', '(623) 470-7784', '1996-01-17', NULL, NULL);
INSERT INTO `students` VALUES (113, 'Dr. Rene Lubowitz', 'toy.michaela@yahoo.com', 'retha63', '(816) 502-7315', '1993-11-06', NULL, NULL);
INSERT INTO `students` VALUES (114, 'Dr. Arvid Ullrich DDS', 'tristian.bogisich@hotmail.com', 'zfriesen', '+1.507.396.0339', '2002-04-09', NULL, NULL);
INSERT INTO `students` VALUES (115, 'Joe Langworth', 'carley55@gmail.com', 'mozelle64', '+16465233843', '2018-05-24', NULL, NULL);
INSERT INTO `students` VALUES (116, 'Jeremy Green IV', 'maegan.block@marks.com', 'augustus98', '+1-786-691-3631', '1970-02-17', NULL, NULL);
INSERT INTO `students` VALUES (117, 'Mr. Judson Harber', 'evie.hills@thompson.org', 'hackett.everardo', '337.618.5261', '1979-08-12', NULL, NULL);
INSERT INTO `students` VALUES (118, 'Mr. Cole Lockman DDS', 'carlie.jakubowski@gmail.com', 'jenkins.reinhold', '904.366.0966', '1994-02-20', NULL, NULL);
INSERT INTO `students` VALUES (119, 'Abelardo Mertz PhD', 'zgusikowski@hotmail.com', 'qshanahan', '351.658.1203', '1994-10-30', NULL, NULL);
INSERT INTO `students` VALUES (120, 'Lyric Kerluke', 'leannon.johnpaul@schamberger.info', 'eveline.romaguera', '+1-979-807-4382', '1983-10-07', NULL, NULL);
INSERT INTO `students` VALUES (121, 'Everett Cummings', 'greg74@gmail.com', 'wschaefer', '+1-786-875-5822', '1975-08-13', NULL, NULL);
INSERT INTO `students` VALUES (122, 'Rolando Collier', 'merle49@cremin.com', 'bahringer.alena', '(938) 787-8640', '2010-02-25', NULL, NULL);
INSERT INTO `students` VALUES (123, 'Gregory Rempel Sr.', 'will.elwin@morar.net', 'elvera.sauer', '1-276-477-6604', '1993-10-29', NULL, NULL);
INSERT INTO `students` VALUES (124, 'Tomas Rutherford', 'bterry@hotmail.com', 'nils.kunde', '+1 (830) 275-8202', '2006-09-02', NULL, NULL);
INSERT INTO `students` VALUES (125, 'Joseph Collins', 'kub.adele@parker.com', 'blake76', '1-219-713-1999', '2010-08-17', NULL, NULL);
INSERT INTO `students` VALUES (126, 'Freeman Murphy', 'nrippin@gmail.com', 'ztorphy', '310.807.3225', '1998-05-15', NULL, NULL);
INSERT INTO `students` VALUES (127, 'Madisen Predovic', 'kiana.reichel@hotmail.com', 'welch.isabella', '+1.440.429.0278', '1997-04-15', NULL, NULL);
INSERT INTO `students` VALUES (128, 'Marvin Fay', 'mraz.edison@yahoo.com', 'hkeebler', '(781) 202-5313', '1996-07-30', NULL, NULL);
INSERT INTO `students` VALUES (129, 'Dr. Shaun Hodkiewicz Sr.', 'lehner.davin@labadie.com', 'friesen.leonora', '+13089214543', '1999-05-21', NULL, NULL);
INSERT INTO `students` VALUES (130, 'Brandon Walker PhD', 'faye.gottlieb@yahoo.com', 'kuhn.monica', '1-574-396-1875', '1972-10-13', NULL, NULL);
INSERT INTO `students` VALUES (131, 'Mr. Seamus Abernathy Jr.', 'tadams@hotmail.com', 'alejandra05', '(920) 559-5565', '1995-01-09', NULL, NULL);
INSERT INTO `students` VALUES (132, 'Donato Kunze', 'aiyana.watsica@gmail.com', 'omayert', '(206) 519-1823', '2002-08-12', NULL, NULL);
INSERT INTO `students` VALUES (133, 'Jessie Blick', 'reinhold.marks@gutkowski.info', 'reinger.heaven', '+1-947-659-5041', '1989-04-03', NULL, NULL);
INSERT INTO `students` VALUES (134, 'Alfredo Brekke', 'ricky39@hotmail.com', 'urban.braun', '1-940-830-4991', '2002-10-18', NULL, NULL);
INSERT INTO `students` VALUES (135, 'Prof. Khalid Wunsch IV', 'cruecker@hotmail.com', 'marty80', '+1.283.738.7241', '1986-09-16', NULL, NULL);
INSERT INTO `students` VALUES (136, 'Mr. Monte Kuvalis Sr.', 'garret24@cartwright.com', 'kbeer', '+18597661938', '1997-02-06', NULL, NULL);
INSERT INTO `students` VALUES (137, 'Rodger Bailey', 'carroll.junior@fritsch.org', 'lula60', '1-402-937-6039', '2009-07-17', NULL, NULL);
INSERT INTO `students` VALUES (138, 'Houston Mitchell', 'ahmed70@gmail.com', 'savanna.stark', '1-423-904-4998', '2001-09-11', NULL, NULL);
INSERT INTO `students` VALUES (139, 'Cristina Adams', 'jayme.larkin@yahoo.com', 'okon.lois', '307.406.1137', '2006-01-01', NULL, NULL);
INSERT INTO `students` VALUES (140, 'Dr. Dwight Barton IV', 'isabel25@gmail.com', 'diego90', '626.842.3324', '2015-01-11', NULL, NULL);
INSERT INTO `students` VALUES (141, 'Micheal Crooks', 'anthony41@johnston.net', 'qdietrich', '+1-770-853-7840', '1986-04-14', NULL, NULL);
INSERT INTO `students` VALUES (142, 'Prof. Ludwig Wolff V', 'ealtenwerth@nicolas.com', 'bryana.wisozk', '310-980-8648', '1979-09-10', NULL, NULL);
INSERT INTO `students` VALUES (143, 'Prof. Timothy Botsford MD', 'ryan.kiarra@gmail.com', 'nrunolfsdottir', '531-594-4481', '1993-04-12', NULL, NULL);
INSERT INTO `students` VALUES (144, 'Ephraim Douglas PhD', 'littel.ward@romaguera.com', 'qboehm', '954.839.5880', '1994-12-19', NULL, NULL);
INSERT INTO `students` VALUES (145, 'Reese Monahan', 'gkuhn@hotmail.com', 'hboehm', '979-784-7822', '1979-05-26', NULL, NULL);
INSERT INTO `students` VALUES (146, 'Dr. Toy Rodriguez', 'kiera45@borer.com', 'goodwin.cleveland', '661-915-3847', '2014-06-08', NULL, NULL);
INSERT INTO `students` VALUES (147, 'Colton Glover', 'belle71@kozey.net', 'graham.dixie', '(509) 791-5156', '2000-10-16', NULL, NULL);
INSERT INTO `students` VALUES (148, 'Rowland Harber PhD', 'dauer@hill.com', 'elenor79', '718-432-9311', '1972-12-05', NULL, NULL);
INSERT INTO `students` VALUES (149, 'Kobe Mueller', 'albin.hilpert@gmail.com', 'ydaniel', '1-847-264-5353', '1976-12-04', NULL, NULL);
INSERT INTO `students` VALUES (150, 'Destin Heaney', 'kihn.katelin@kreiger.com', 'smayer', '1-913-514-9999', '1995-03-06', NULL, NULL);
INSERT INTO `students` VALUES (151, 'Prof. Sammie Schoen II', 'heath.lynch@gmail.com', 'jacinto.bednar', '+1-267-786-6810', '1976-12-19', NULL, NULL);
INSERT INTO `students` VALUES (152, 'Toni O\'Kon', 'emorar@gmail.com', 'ghegmann', '689-209-7290', '2016-07-09', NULL, NULL);
INSERT INTO `students` VALUES (153, 'Gage Reynolds', 'bwolff@hotmail.com', 'bailey.eveline', '+1.520.539.0858', '1999-04-13', NULL, NULL);
INSERT INTO `students` VALUES (154, 'Prof. Alexandro Windler I', 'ashly.stamm@yahoo.com', 'lorenza.frami', '1-910-672-7397', '1984-07-13', NULL, NULL);
INSERT INTO `students` VALUES (155, 'Kiel Reichert', 'cornell.schiller@jerde.com', 'sidney91', '423-221-2459', '1985-06-19', NULL, NULL);
INSERT INTO `students` VALUES (156, 'Marquis Jacobi IV', 'barrows.alfredo@shields.com', 'gwen.batz', '872-312-4153', '2010-01-14', NULL, NULL);
INSERT INTO `students` VALUES (157, 'Brett Stanton', 'lenora.berge@hotmail.com', 'hmetz', '+18628481006', '2017-05-08', NULL, NULL);
INSERT INTO `students` VALUES (158, 'Uriah Zemlak', 'tevin68@yahoo.com', 'adelbert.oberbrunner', '(940) 893-1488', '1980-10-18', NULL, NULL);
INSERT INTO `students` VALUES (159, 'Dejuan Mayer', 'bauch.tiffany@schumm.com', 'aliyah04', '1-586-235-2528', '2001-08-23', NULL, NULL);
INSERT INTO `students` VALUES (160, 'Barney Feeney', 'mjakubowski@gmail.com', 'eleanore.gorczany', '805.432.6085', '1998-12-09', NULL, NULL);
INSERT INTO `students` VALUES (161, 'Mr. Zechariah Goodwin', 'buck84@yahoo.com', 'ryan.fabiola', '+1-360-542-5100', '1981-08-02', NULL, NULL);
INSERT INTO `students` VALUES (162, 'Christian Koepp', 'feeney.arvid@gmail.com', 'nikolas.konopelski', '903.804.8405', '1986-05-30', NULL, NULL);
INSERT INTO `students` VALUES (163, 'Dr. Wilhelm Welch IV', 'iheathcote@hotmail.com', 'carley81', '+1 (276) 521-2811', '2018-09-15', NULL, NULL);
INSERT INTO `students` VALUES (164, 'Roosevelt Sporer I', 'ekshlerin@friesen.com', 'johnny.murray', '781.250.6159', '2014-01-04', NULL, NULL);
INSERT INTO `students` VALUES (165, 'Mr. Destin Bednar DDS', 'damaris.graham@ratke.info', 'elisha98', '386-410-5331', '1980-05-30', NULL, NULL);
INSERT INTO `students` VALUES (166, 'Mr. Herman Aufderhar', 'rgutmann@wunsch.com', 'delmer83', '331.479.2377', '1995-10-17', NULL, NULL);
INSERT INTO `students` VALUES (167, 'Mr. Antwon Kiehn PhD', 'maximillian75@hotmail.com', 'noelia51', '+1 (860) 776-7045', '2002-06-10', NULL, NULL);
INSERT INTO `students` VALUES (168, 'Mr. Cicero Beier', 'djerde@ziemann.com', 'brain.cronin', '520.433.2409', '2013-08-12', NULL, NULL);
INSERT INTO `students` VALUES (169, 'Juvenal Howe I', 'aemard@hotmail.com', 'joan94', '+1-820-677-0596', '1995-06-23', NULL, NULL);
INSERT INTO `students` VALUES (170, 'Davion Crist', 'uklocko@gmail.com', 'leon.sipes', '520-285-0971', '2015-02-23', NULL, NULL);
INSERT INTO `students` VALUES (171, 'Johann Cruickshank', 'keenan.johns@gmail.com', 'sierra.goldner', '1-854-962-9794', '1986-12-13', NULL, NULL);
INSERT INTO `students` VALUES (172, 'Bertha Cartwright', 'maegan.rutherford@watsica.net', 'missouri12', '214.456.5432', '1973-03-29', NULL, NULL);
INSERT INTO `students` VALUES (173, 'Dr. Korey Barton II', 'grady.kuphal@mohr.info', 'pagac.carlee', '+1 (715) 515-2105', '1970-06-16', NULL, NULL);
INSERT INTO `students` VALUES (174, 'Conor Hackett', 'edwina.johnson@yahoo.com', 'cristobal55', '702-426-6431', '1981-08-03', NULL, NULL);
INSERT INTO `students` VALUES (175, 'Prof. Garnet Konopelski Sr.', 'xking@monahan.com', 'joe87', '(267) 557-1275', '2002-05-01', NULL, NULL);
INSERT INTO `students` VALUES (176, 'Peyton Adams', 'hermann.gabe@bosco.org', 'andre15', '1-810-636-0867', '2008-11-20', NULL, NULL);
INSERT INTO `students` VALUES (177, 'Wayne Steuber', 'eladio.labadie@gmail.com', 'rolando.ebert', '585-545-8218', '2004-09-27', NULL, NULL);
INSERT INTO `students` VALUES (178, 'Dr. Garrick Weber MD', 'yhahn@hyatt.com', 'leo.dach', '+1-208-479-0615', '1994-07-05', NULL, NULL);
INSERT INTO `students` VALUES (179, 'Jovan Hackett MD', 'loyal89@larkin.com', 'eino.grimes', '+1.630.907.4844', '2009-02-21', NULL, NULL);
INSERT INTO `students` VALUES (180, 'Theodore Dooley', 'lydia08@yahoo.com', 'cassandra45', '1-540-675-5255', '1988-10-07', NULL, NULL);
INSERT INTO `students` VALUES (181, 'Brian Murphy', 'ioconnell@gmail.com', 'lmann', '1-802-931-7022', '2003-08-18', NULL, NULL);
INSERT INTO `students` VALUES (182, 'Joan Pacocha', 'gleason.easton@hotmail.com', 'gerlach.zoey', '1-706-585-0579', '2007-09-04', NULL, NULL);
INSERT INTO `students` VALUES (183, 'Mr. Orrin Conn IV', 'fabian.quitzon@yahoo.com', 'ydicki', '+1-469-885-5393', '1978-11-02', NULL, NULL);
INSERT INTO `students` VALUES (184, 'Micah Langosh', 'nienow.lucius@mills.com', 'breanne28', '(803) 323-1505', '1972-09-14', NULL, NULL);
INSERT INTO `students` VALUES (185, 'Prof. Bobbie Carroll', 'zieme.victoria@gmail.com', 'leffler.carmela', '843.249.7555', '1988-11-09', NULL, NULL);
INSERT INTO `students` VALUES (186, 'Kristoffer Nolan', 'hallie.reichert@hill.net', 'usporer', '231-686-9634', '2019-08-30', NULL, NULL);
INSERT INTO `students` VALUES (187, 'Carleton Becker', 'tschmitt@parker.org', 'alba.will', '1-352-984-6123', '2010-12-09', NULL, NULL);
INSERT INTO `students` VALUES (188, 'Elliot Bahringer Jr.', 'orin07@walter.com', 'lexie03', '878-869-3269', '2020-12-01', NULL, NULL);
INSERT INTO `students` VALUES (189, 'Brody Bergstrom', 'randy94@prosacco.com', 'fkunde', '(364) 899-7640', '1974-08-02', NULL, NULL);
INSERT INTO `students` VALUES (190, 'Craig Schmeler', 'marcus.bins@welch.info', 'llangosh', '+19048670350', '2020-06-06', NULL, NULL);
INSERT INTO `students` VALUES (191, 'Gust Douglas', 'wilderman.reggie@beier.org', 'alarson', '+1.651.528.7376', '2017-10-06', NULL, NULL);
INSERT INTO `students` VALUES (192, 'Elian Hudson I', 'leopold72@mante.com', 'okon.sherwood', '+12815597111', '1983-07-26', NULL, NULL);
INSERT INTO `students` VALUES (193, 'Enid Rippin', 'douglas.misty@murazik.com', 'dare.jamison', '1-202-748-4194', '1988-07-19', NULL, NULL);
INSERT INTO `students` VALUES (194, 'Cleve Grady DVM', 'enid.dicki@yahoo.com', 'weissnat.kenyatta', '+1-480-583-3035', '1982-03-29', NULL, NULL);
INSERT INTO `students` VALUES (195, 'Benton Mante', 'qdonnelly@yahoo.com', 'kaitlyn.greenfelder', '+18543286820', '2006-12-17', NULL, NULL);
INSERT INTO `students` VALUES (196, 'Donavon Marquardt', 'schultz.tianna@marquardt.net', 'ctorp', '1-919-541-6660', '1976-03-15', NULL, NULL);
INSERT INTO `students` VALUES (197, 'Dr. Christian Bergnaum', 'caden.sporer@walsh.org', 'borer.makenna', '1-703-978-6007', '1986-05-20', NULL, NULL);
INSERT INTO `students` VALUES (198, 'Sage Fay DVM', 'kimberly.grant@greenholt.com', 'spinka.lyla', '(813) 255-1198', '1971-05-04', NULL, NULL);
INSERT INTO `students` VALUES (199, 'Nico Ryan', 'camryn60@toy.com', 'orn.duane', '831-846-8990', '2006-01-31', NULL, NULL);
INSERT INTO `students` VALUES (200, 'Ambrose Bergnaum', 'waelchi.zane@parker.com', 'keeling.willie', '513-721-5292', '1999-09-28', NULL, NULL);

-- ----------------------------
-- Table structure for tests
-- ----------------------------
DROP TABLE IF EXISTS `tests`;
CREATE TABLE `tests`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tests
-- ----------------------------
INSERT INTO `tests` VALUES (1, 'tt', '2021-09-22 00:39:01', '2021-09-22 00:39:02');

-- ----------------------------
-- Table structure for tindakan_lab
-- ----------------------------
DROP TABLE IF EXISTS `tindakan_lab`;
CREATE TABLE `tindakan_lab`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `hasil` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_request_lab` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_pemeriksaan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_user_petugas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tindakan_lab
-- ----------------------------
INSERT INTO `tindakan_lab` VALUES (1, 'test11', '2', '12', '2022-06-25 05:51:17', '2022-06-25 06:31:21', '9');
INSERT INTO `tindakan_lab` VALUES (2, 'test22', '2', '10', '2022-06-25 05:51:17', '2022-06-25 06:31:21', '9');

-- ----------------------------
-- Table structure for tindakan_pasien
-- ----------------------------
DROP TABLE IF EXISTS `tindakan_pasien`;
CREATE TABLE `tindakan_pasien`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `anamnesis` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jumlah_obat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_registrasi` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_dokter` int NULL DEFAULT NULL,
  `id_pemeriksaan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_diagnosa` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_obat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_aturan_pakai` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ket_obat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tindakan_pasien
-- ----------------------------
INSERT INTO `tindakan_pasien` VALUES (5, 'tenggorokan nyeri ketika menelan', '', '33', 26, '7', '2', '24', '0', '2022-01-05 16:26:35', '2022-06-19 14:10:36', '');
INSERT INTO `tindakan_pasien` VALUES (6, 'batuk kering selama dua minggu', '0', '35', 1, '7', '2', '26', '0', '2022-01-05 16:44:30', '2022-01-25 15:05:46', NULL);
INSERT INTO `tindakan_pasien` VALUES (7, 'nyeri kepala setiap bangun tidur', '0', '38', 26, '9', '3', '26', '0', '2022-01-05 16:45:44', '2022-01-25 15:05:02', NULL);
INSERT INTO `tindakan_pasien` VALUES (9, 'demam tinggi, muntah-muntah, sendi nyeri', '0', '40', 27, '9', '1', '25', '0', '2022-01-25 15:04:36', NULL, NULL);
INSERT INTO `tindakan_pasien` VALUES (11, 'warna air urin keruh', '', '42', 29, '7', '5', '0', '0', '2022-01-25 16:01:09', '2022-06-19 14:09:31', '');
INSERT INTO `tindakan_pasien` VALUES (12, 'mual, muntah setiap setelah makan', ',', '50', 0, '0', '0', '22,24', '0,0', '2022-06-16 13:59:10', NULL, ',');
INSERT INTO `tindakan_pasien` VALUES (13, 'demam tinggi, nyeri sendi', '', '41', 34, '7', '5', '0', '0', '2022-06-19 13:54:09', '2022-06-19 14:09:10', '');
INSERT INTO `tindakan_pasien` VALUES (14, 'dahak berwarna hijau', '', '48', 34, '12', '2', '0', '0', '2022-06-19 14:13:13', '2022-06-19 14:14:51', '');
INSERT INTO `tindakan_pasien` VALUES (15, 'diare tiga hari berturut turut', '', '0', 34, '12', '2', '0', '0', '2022-06-19 14:16:37', NULL, '');
INSERT INTO `tindakan_pasien` VALUES (16, 'tidak bisa mencium bau', '', '52', 33, '7', '1', '0', '0', '2022-06-19 14:21:05', '2022-06-19 14:21:57', '');
INSERT INTO `tindakan_pasien` VALUES (17, 'lidah tidak bisa merasakan', '5', '53', 29, '7', '3', '24', '0', '2022-06-22 06:05:15', NULL, '');
INSERT INTO `tindakan_pasien` VALUES (18, 'batuk berdahak tidak kunjung selesai', '4', '54', 26, '7', '1', '22', '0', '2022-06-22 13:47:27', NULL, '');
INSERT INTO `tindakan_pasien` VALUES (19, 'pusing ketika terkena sinar matahari', '3,3,2', '0', 29, '7', '3', '22,24,26', '0,0,0', '2022-06-23 08:05:20', NULL, ',,');

-- ----------------------------
-- Table structure for tindakan_pasien_rujukan
-- ----------------------------
DROP TABLE IF EXISTS `tindakan_pasien_rujukan`;
CREATE TABLE `tindakan_pasien_rujukan`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `anamnesis` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jumlah_obat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_registrasi` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_dokter` int NULL DEFAULT NULL,
  `id_pemeriksaan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_diagnosa` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_obat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_aturan_pakai` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ket_obat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `id_tindakan_pasien` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tindakan_pasien_rujukan
-- ----------------------------
INSERT INTO `tindakan_pasien_rujukan` VALUES (2, 'tindakan pasien rujukan', '3,4', '41', 1, '7', '1', '22,23', NULL, '2022-07-01 16:03:49', '2022-07-01 16:03:49', '3,4', 13);

-- ----------------------------
-- Table structure for unit
-- ----------------------------
DROP TABLE IF EXISTS `unit`;
CREATE TABLE `unit`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `kode_unit` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of unit
-- ----------------------------
INSERT INTO `unit` VALUES (6, 'UP111', 'Laboratorium', 'Unit Penunjang', '2022-01-01 13:27:35', '2022-01-25 05:52:23');
INSERT INTO `unit` VALUES (7, 'PO111', 'UMUM', 'Poliklinik Pemeriksaan Umum', '2022-01-03 12:32:11', '2022-01-27 15:38:38');
INSERT INTO `unit` VALUES (8, 'PO112', 'GIGI', 'Poliklinik Kesehatan Gigi dan Mulut', '2022-01-03 12:32:34', '2022-01-27 15:38:51');
INSERT INTO `unit` VALUES (9, 'PO113', 'KIA', 'Poliklinik Kesehatan Ibu Anak', '2022-01-03 12:33:07', '2022-01-25 05:52:37');
INSERT INTO `unit` VALUES (10, 'PO114', 'KB', 'Poliklinik', '2022-01-27 15:38:16', '2022-01-27 15:39:12');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_role` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `no_hp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Zahratul Firdaus', 'user@user.com', '2021-09-23 14:36:48', '$2y$10$YjQMqmoLKeUPZPFSkSL44e/h8ilyATKpd7yK9uOED7DhosR7zrvAS', NULL, '2021-09-23 14:36:48', '2021-09-23 14:36:48', 'admin', NULL, NULL, NULL);
INSERT INTO `users` VALUES (2, 'Nanda Soraya', 'loket@gmail.com', '2022-01-29 11:34:44', '$2y$10$YjQMqmoLKeUPZPFSkSL44e/h8ilyATKpd7yK9uOED7DhosR7zrvAS', NULL, '2022-01-29 11:34:45', '2022-01-29 11:34:45', 'admin', NULL, NULL, NULL);
INSERT INTO `users` VALUES (3, 'Ade Juanda', 'umum@user.com', '2022-06-15 12:55:55', '$2y$10$YjQMqmoLKeUPZPFSkSL44e/h8ilyATKpd7yK9uOED7DhosR7zrvAS', NULL, '2022-06-15 12:55:56', '2022-06-15 12:55:56', 'admin_bagian_poli', '7', NULL, NULL);
INSERT INTO `users` VALUES (4, 'Rivandi Maulana', 'gigi@user.com', '2022-06-16 10:05:15', '$2y$10$YjQMqmoLKeUPZPFSkSL44e/h8ilyATKpd7yK9uOED7DhosR7zrvAS', NULL, '2022-06-16 10:05:15', '2022-06-16 10:05:15', 'admin_bagian_poli', '8', NULL, NULL);
INSERT INTO `users` VALUES (6, 'Dara Saputri', 'regis@user.com', '2022-06-17 08:21:56', '$2y$10$YjQMqmoLKeUPZPFSkSL44e/h8ilyATKpd7yK9uOED7DhosR7zrvAS', NULL, '2022-06-17 08:21:56', '2022-06-22 08:29:34', 'admin_registrasi', NULL, 'malang', NULL);
INSERT INTO `users` VALUES (7, 'Monisa Hira', 'kia@user.com', NULL, '$2y$10$YjQMqmoLKeUPZPFSkSL44e/h8ilyATKpd7yK9uOED7DhosR7zrvAS', NULL, NULL, NULL, 'admin_bagian_poli', '9', NULL, NULL);
INSERT INTO `users` VALUES (8, 'Sri Nuriati', 'kb@user.com', NULL, '$2y$10$YjQMqmoLKeUPZPFSkSL44e/h8ilyATKpd7yK9uOED7DhosR7zrvAS', NULL, NULL, NULL, 'admin_bagian_poli', '10', NULL, NULL);
INSERT INTO `users` VALUES (9, 'Safira Nazwa', 'lab@user.com', NULL, '$2y$10$YjQMqmoLKeUPZPFSkSL44e/h8ilyATKpd7yK9uOED7DhosR7zrvAS', NULL, NULL, NULL, 'admin_laboratorium', '6', NULL, NULL);
INSERT INTO `users` VALUES (10, 'Dina Faradina', 'kepala@user.com', NULL, '$2y$10$YjQMqmoLKeUPZPFSkSL44e/h8ilyATKpd7yK9uOED7DhosR7zrvAS', NULL, NULL, NULL, 'kepala_rekam_medis', NULL, NULL, NULL);

-- ----------------------------
-- View structure for riwayat_rekam_medis
-- ----------------------------
DROP VIEW IF EXISTS `riwayat_rekam_medis`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `riwayat_rekam_medis` AS SELECT
tp.id id_tindakan,
rp.id AS id_registrasi,
dp.id AS id_pasien,
rp.tgl_kunjungan,
d.nama as diagnosa,
p.nama as nama_pemeriksaan,
tp.id_obat,
do.nama as nama_dokter,
tp.anamnesis
FROM registrasi_pasien rp
JOIN data_pasien dp ON rp.id_pasien = dp.id
join (select 
id,
anamnesis,
id_registrasi,
id_diagnosa,
id_pemeriksaan,
id_dokter,
id_obat
from tindakan_pasien
union all
select 
id,
anamnesis,
id_registrasi,
id_diagnosa,
id_pemeriksaan,
id_dokter,
id_obat
from tindakan_pasien_rujukan) as tp ON rp.id = tp.id_registrasi

JOIN diagnosa d ON tp.id_diagnosa = d.id
join pemeriksaan p on tp.id_pemeriksaan = p.id
-- join obat o on tp.id_obat =  o.id
join dokter do on tp.id_dokter = do.id ;

SET FOREIGN_KEY_CHECKS = 1;
