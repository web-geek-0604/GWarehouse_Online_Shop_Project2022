-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2022 at 12:16 AM
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
-- Database: `prodaja_kartica`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabela_admin`
--

CREATE TABLE `tabela_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `ime_i_prezime` varchar(100) NOT NULL,
  `korisnicko_ime` varchar(100) NOT NULL,
  `lozinka` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tabela_admin`
--

INSERT INTO `tabela_admin` (`id`, `ime_i_prezime`, `korisnicko_ime`, `lozinka`) VALUES
(2, 'Djordje Olujic', 'admin', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Table structure for table `tabela_kategorije`
--

CREATE TABLE `tabela_kategorije` (
  `id` int(10) UNSIGNED NOT NULL,
  `naziv` varchar(100) NOT NULL,
  `naziv_slike` varchar(255) NOT NULL,
  `aktivno` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tabela_kategorije`
--

INSERT INTO `tabela_kategorije` (`id`, `naziv`, `naziv_slike`, `aktivno`) VALUES
(1, 'AORUS kartice', 'kartice_kategorije_133.png', 'Da'),
(2, 'MSI kartice', 'kartice_kategorije_232.jpg', 'Da'),
(3, 'ASUS kartice', 'kartice_kategorije_166.jpg', 'Da'),
(4, 'Sapphire kartice', 'kartice_kategorije_198.jpg', 'Da'),
(5, 'ASRock kartice', 'kartice_kategorije_10.jpg', 'Da'),
(6, 'GIGABYTE kartice', 'kartice_kategorije_898.png', 'Da');

-- --------------------------------------------------------

--
-- Table structure for table `tabela_kurir`
--

CREATE TABLE `tabela_kurir` (
  `id` int(10) UNSIGNED NOT NULL,
  `kurir_naziv` varchar(255) NOT NULL,
  `naziv_slike` varchar(150) NOT NULL,
  `kurir_telefon` varchar(150) NOT NULL,
  `kurir_email` varchar(150) NOT NULL,
  `kurir_adresa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tabela_kurir`
--

INSERT INTO `tabela_kurir` (`id`, `kurir_naziv`, `naziv_slike`, `kurir_telefon`, `kurir_email`, `kurir_adresa`) VALUES
(1, 'BEX EXPRESS', 'kurir_slika-673.jpg', '+381 11 404 97 20', 'bexexpress@gmail.com', 'Obilazni put bb, 15353 Šabac'),
(2, 'AKS Express', 'kurir_slika-806.jpg', '+1 (761) 488-5375', 'aksoffice@gmail.com', 'Svetog Save 36 11271 Surčin');

-- --------------------------------------------------------

--
-- Table structure for table `tabela_poruci`
--

CREATE TABLE `tabela_poruci` (
  `id` int(10) UNSIGNED NOT NULL,
  `proizvod` varchar(150) NOT NULL,
  `cena` decimal(10,2) NOT NULL,
  `kolicina` int(11) NOT NULL,
  `ukupno` decimal(10,2) NOT NULL,
  `datum_porudzbine` datetime NOT NULL,
  `status_porudzbine` varchar(50) NOT NULL,
  `kupac_ime_prezime` varchar(150) NOT NULL,
  `kupac_telefon` varchar(20) NOT NULL,
  `kupac_email` varchar(150) NOT NULL,
  `kupac_adresa` varchar(255) NOT NULL,
  `kurir_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tabela_poruci`
--

INSERT INTO `tabela_poruci` (`id`, `proizvod`, `cena`, `kolicina`, `ukupno`, `datum_porudzbine`, `status_porudzbine`, `kupac_ime_prezime`, `kupac_telefon`, `kupac_email`, `kupac_adresa`, `kurir_id`) VALUES
(1, 'MSI GeForce RTX 2080 SUPER GAMING X TRIO 8GB GDDR6 ', '130000.00', 1, '130000.00', '2022-03-07 22:11:59', 'Dostavljeno', 'Dejan Petrović', '0600005432', 'dejanpet44@gmail.com', 'Dimitrija Tucovića 55, 11000 Beograd, Srbija', 1),
(2, 'Asus ROG Strix Radeon RX 5700 XT OC edition 8GB GDDR6', '89000.00', 1, '89000.00', '2022-03-13 13:45:29', 'Naručeno', 'Milos Milosevic', '07975544', 'miilos66@gmail.com', 'Ljubljanska 38, 11000 Beograd, Srbija', 1),
(3, 'MSI GeForce RTX 2080 SUPER GAMING X TRIO 8GB GDDR6 ', '130000.00', 1, '130000.00', '2022-05-23 22:37:35', 'Dostavljeno', 'Nikola Nikolic', '+381 11 404 97 20', 'olujic.djordje@gmail.com', 'dadaccvefvwebv', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tabela_proizvodi`
--

CREATE TABLE `tabela_proizvodi` (
  `id` int(10) UNSIGNED NOT NULL,
  `naziv` varchar(100) NOT NULL,
  `cena` decimal(10,2) NOT NULL,
  `naziv_slike` varchar(255) NOT NULL,
  `id_kategorije` int(11) UNSIGNED NOT NULL,
  `izdvojeno` varchar(10) NOT NULL,
  `aktivno` varchar(10) NOT NULL,
  `model` varchar(255) NOT NULL,
  `proizvodjac` varchar(255) NOT NULL,
  `graficki_interfejs` varchar(255) NOT NULL,
  `brzina_grafickog_cipa` varchar(255) NOT NULL,
  `cuda_jezgra` varchar(255) NOT NULL,
  `directx` varchar(255) NOT NULL,
  `open_gl` varchar(255) NOT NULL,
  `brzina_memorije` varchar(255) NOT NULL,
  `memorijska_magistrala` varchar(255) NOT NULL,
  `naponski_konektori` varchar(255) NOT NULL,
  `dimenzije` varchar(255) NOT NULL,
  `hdmi` varchar(255) NOT NULL,
  `display_port` varchar(255) NOT NULL,
  `kolicina_memorije` varchar(255) NOT NULL,
  `tip_memorije` varchar(255) NOT NULL,
  `hladjenje` varchar(255) NOT NULL,
  `ostalo1` varchar(255) NOT NULL,
  `ostalo2` varchar(255) NOT NULL,
  `ostalo3` varchar(255) NOT NULL,
  `ostalo4` varchar(255) NOT NULL,
  `ostalo5` varchar(255) NOT NULL,
  `ostalo6` varchar(255) NOT NULL,
  `ostalo7` varchar(255) NOT NULL,
  `ostalo8` varchar(255) NOT NULL,
  `ostalo9` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tabela_proizvodi`
--

INSERT INTO `tabela_proizvodi` (`id`, `naziv`, `cena`, `naziv_slike`, `id_kategorije`, `izdvojeno`, `aktivno`, `model`, `proizvodjac`, `graficki_interfejs`, `brzina_grafickog_cipa`, `cuda_jezgra`, `directx`, `open_gl`, `brzina_memorije`, `memorijska_magistrala`, `naponski_konektori`, `dimenzije`, `hdmi`, `display_port`, `kolicina_memorije`, `tip_memorije`, `hladjenje`, `ostalo1`, `ostalo2`, `ostalo3`, `ostalo4`, `ostalo5`, `ostalo6`, `ostalo7`, `ostalo8`, `ostalo9`) VALUES
(10, 'Asus ROG Strix Radeon RX 5700 XT OC edition 8GB GDDR6', '89000.00', 'kartice_proizvod_222.png', 3, 'Ne', 'Da', 'AMD Radeon RX 5700 XT', 'ASUS', 'PCI Express 4.0 x 16', 'P mode:  Up to 1965 MHz(Game Clock)/ Up to 2035MHz(Boost Clock)', '2560', '12 API', '4.6', '14 Gbps', '256-bit', '8-pin*2', '305 x 130 x 54 mm', '2.0b*1', '1.4*3', '8 GB', 'GDDR6', 'Axial-tech fan design', 'Maksimalna rezolucija: 7680 x 4320 px', 'Multi-view: 4', 'HDCP: 2.3', 'Aura Sync', 'AMD Radeon FreeSync™1 and FreeSync™ 2 HDR2', 'Adaptive Vertical Sync', 'VR Ready', 'ASUS FanConnect II', 'Preporučeno napajanje: 600 W'),
(11, 'AMD Radeon RX 6800 XT Taichi X 16G OC GDDR6 256-bit', '95000.00', 'kartice_proizvod_846.png', 5, 'Da', 'Da', 'AMD Radeon™ RX 6800 XT', 'ASRock', 'PCI Express 4.0 x 16', 'Boost Clock: Up to 2360 MHz', '4608', '12 Ultimate', '4.6', '16 Gbps', '256-bit', '8-pin*3', '330 x 140 x 56 mm', '2.1*1', '1.4*2', '16 GB', 'GDDR6', 'Taichi 3X Cooling System', 'Maksimalna rezolucija: 7680 x 4320 px', 'Multi-view: 4', 'HDCP: 2.3', 'Polychrome SYNC', 'AMD FreeSync™', 'Adaptive Vertical Sync', 'VR Ready', 'AMD RDNA™ 2', 'Preporučeno napajanje: 800 W'),
(12, 'Sapphire Nitro + AMD Radeon RX 6600 XT OC 8GB GDDR6', '65000.00', 'kartica320.jpg', 4, 'Ne', 'Da', ' AMD Radeon™ RX 6600 XT', 'Sapphire', 'PCI Express 4.0 x 16', 'Boost Clock: Up to 2607 MHz', '2048', '12 Ultimate', '4.6', '16 Gbps', '128-bit', '8-pin*1', '240(L)X 119.25(W)X 44.82 (H)mm', '2.1*1', '1.4a*3', '8 GB', 'GDDR6', 'Dual-X Cooling Technology', 'Maksimalna rezolucija: 7680 x 4320 px', 'Multi-view: 4', 'HDCP: 2.3', 'Smart Access Memory', 'AMD FreeSync™', 'Adaptive Vertical Sync', 'Radeon™ VR Ready Premium', 'AMD RDNA™ 2', 'Preporučeno napajanje: 500 W'),
(13, 'Gigabyte GeForce® GTX 1650 GAMING OC 4G GDDR5 128-bit ', '49000.00', 'kartice_proizvod_38.png', 6, 'Ne', 'Da', 'GeForce® GTX 1650', 'Gigabyte', 'PCI Express 3.0 x 16', '1815 MHz (Reference card is 1665 MHz)', '896', '12', '4.6', '128 GB/s (max)', '128-bit', '6-pin*1', 'D=265 Š=118 V=40 mm', '2.0b*2', '1.4*1', '4 GB', 'GDDR5', 'WINDFORCE 2X rashladni sistem', 'Maksimalna rezolucija: 7680 x 4320 px', 'Multi-view: 4', 'NVIDIA Turing™', 'RGB Fusion 2.0', 'G-SYNC® HDR technology', 'Adaptive Vertical Sync', 'VR Ready', 'GeForce Experience™', 'Preporučeno napajanje: 300 W'),
(14, 'MSI Radeon RX 580 ARMOR 8GB OC GDDR5 256-bit', '45000.00', 'kartice_proizvod_467.png', 2, 'Ne', 'Da', 'Radeon™ RX 580', 'MSI', 'PCI Express 3.0 x 16', 'up to 1366 MHz', '2304', '12', '4.5', '256 GB/s (max)', '256-bit', '8-pin*1', '269 x 125 x 38 mm', '2.0b*2', '1.4*2', '8 GB', 'GDDR5', 'MSI 2X TORX Fans', 'Maksimalna rezolucija: 7680 x 4320 px', 'Multi-view: 5', 'HDCP: 2.2', 'Crossfire™, 2-Way (Bridgeless)', 'AMD FreeSync™', 'Adaptive Vertical Sync', 'VR Ready', 'Afterburner Overclocking Utility', 'Preporučeno napajanje: 500 W'),
(15, 'Gigabyte GeForce GTX 1660 SUPER 6GB GDDR6 192bit', '67300.00', 'kartice_proizvod_834.png', 6, 'Ne', 'Da', 'GeForce® GTX 1660 SUPER™', 'Gigabyte', 'PCI Express 3.0 x 16', '1830 MHz (Referentna karta: 1785 MHz)', '1408', '12', '4.6', '336 GB/s (max)', '192-bit', '8-pin*1', 'D=225.65 Š=122.02 V=40.5 mm', '2.0b*1', '1.4*3', '6 GB', 'GDDR6', 'WINDFORCE 2X rashladni sistem', 'Maksimalna rezolucija: 7680 x 4320 px', 'Multi-view: 4', 'NVIDIA Turing™', 'NVIDIA Ansel', 'G-SYNC® technology', 'Adaptive Vertical Sync', 'PCB format: ATX', 'GeForce Experience™', 'Preporučeno napajanje: 450 W'),
(16, 'AORUS Radeon™ RX 6800 MASTER 16GB GDDR6 256bit', '195000.00', 'kartice_proizvod_122.png', 1, 'Ne', 'Da', 'Radeon™ RX 6800', 'AORUS', 'PCI Express 4.0 x 16', 'Pojačani takt*: do 2190 MHz (Referentna karta: 2105 MHz)', '3840', '12 Ultimate', '4.6', '512 GB/s (max)', '256-bit', '8-pin*2', 'D=324 Š=140 V=60 mm', '2.1*2 ', '1.4a*2', '16 GB', 'GDDR6', 'MAX-COVERED hlađenje', 'Maksimalna rezolucija: 7680 x 4320 px', 'Multi-view: 4', 'HDCP: 2.3', 'RGB Fusion 2.0', 'AMD Radeon FreeSync™1 and FreeSync™ 2 HDR2', 'Adaptive Vertical Sync', 'Radeon™ VR Ready Premium', 'AMD RDNA™ 2', 'Preporučeno napajanje: 650 W'),
(17, 'Sapphire TOXIC Radeon RX 6900 XT LE 16GB GDDR6 256bit', '268999.00', 'kartica8399.png', 4, 'Da', 'Da', 'Radeon RX 6900 XT', 'Sapphire', 'PCI Express 4.0 x 16', 'Boost Clock: Up to 2365 MHz', '5120', '12 Ultimate', '4.6', '16 Gbps', '256-bit', '8-pin*2 + 6-pin*1', '270(L)x 130(W)x 45 (H)mm', '2.1*1', '1.4*3', '16 GB', 'GDDR6', 'AIO Liquid Cooling with 360 mm radiator', 'Maksimalna rezolucija: 7680 x 4320 px', 'Multi-view: 4', 'HDCP: 2.3', 'Backplate with ARGB', 'AMD Radeon FreeSync™1 and FreeSync™ 2 HDR2', 'Adaptive Vertical Sync', 'Radeon™ VR Ready Premium', 'AMD RDNA™ 2', 'Preporučeno napajanje: 850 W'),
(18, 'Asus ROG Strix GeForce RTX 3060 V2 OC 12GB GDDR6 192bit', '95000.00', 'kartice_proizvod_196.png', 3, 'Da', 'Da', 'GeForce RTX™ 3060', 'ASUS', 'PCI Express 4.0 x 16', 'OC Mode - 1912  MHz (Boost Clock)', '3584', '12', '4.6', '15 Gbps', '192-bit', '8-pin*1', '300 x 133 x 33 mm', '2.1*2 ', '1.4a*3', '12 GB', 'GDDR6', 'Axial-tech fan design', 'Maksimalna rezolucija: 7680 x 4320 px', 'Multi-view: 4', 'HDCP: 2.3', 'Aura Sync', 'G-SYNC® HDR technology', 'Adaptive Vertical Sync', 'VR Ready', 'GeForce Experience™', 'Preporučeno napajanje: 750 W'),
(19, 'Gigabyte GeForce RTX™ 3050 EAGLE OC 8GB GDDR6 128bit', '70000.00', 'kartice_proizvod_264.png', 6, 'Da', 'Da', 'GeForce RTX™ 3050', 'Gigabyte', 'PCI Express 4.0 x 16', '1792 MHz (Reference Card: 1777 MHz)', '2560', '12 Ultimate', '4.6', '224 GB/s (max)', '128-bit', '8-pin*1', 'L=213 W=120 H=41 mm', '2.1*2 ', '1.4a*2', '8 GB', 'GDDR6', 'WINDFORCE 2X Cooling System', 'Maksimalna rezolucija: 7680 x 4320 px', 'Multi-view: 4', 'HDCP: 2.3', 'NVIDIA Ampere Streaming Multiprocessors', 'G-SYNC® technology', 'Adaptive Vertical Sync', 'PCB format: ATX', 'GeForce Experience™', 'Preporučeno napajanje: 450 W'),
(20, 'MSI GeForce RTX 2060 VENTUS OC 12GB GDDR6 192bit', '86000.00', 'kartice_proizvod_855.png', 2, 'Ne', 'Da', 'GeForce RTX™ 2060', 'MSI', 'PCI Express 3.0 x 16', 'Boost: 1680 MHz', '2176', '12 API', '4.6', '14 Gbps', '192-bit', '8-pin*1', '231 x 128 x 42 mm', '2.0b*1', '1.4a*3', '12 GB', 'GDDR6', 'TORX Fan 2.0', 'Maksimalna rezolucija: 7680 x 4320 px', 'Multi-view: 4', 'HDCP: 2.3', 'NVIDIA Turing™', 'G-SYNC® HDR technology', 'Adaptive Vertical Sync', 'GeForce RTX™ VR', 'Afterburner Overclocking Utility', 'Preporučeno napajanje: 500 W'),
(21, 'ASRock Radeon RX 5500 XT Challenger D 8GB GDDR6 128bit', '60000.00', 'kartica3766.png', 5, 'Ne', 'Da', 'AMD Radeon RX 5500 XT', 'ASRock', 'PCI Express 4.0 x 8', 'Boost Clock: Up to 1845 MHz', '1408', '12', '4.6', '14 Gbps', '128-bit', '8-pin*1', '241 x 127 x 42mm', '2.0b*1', '1.4*3', '8 GB', 'GDDR6', 'Dual Fan Design', 'Maksimalna rezolucija: 7680 x 4320 px', 'Multi-view: 4', 'HDCP: 2.3', '8K Resolution Support', 'Radeon FreeSync™ 2 HDR', 'Adaptive Vertical Sync', 'VR Ready', 'AMD RDNA™', 'Preporučeno napajanje: 500 W');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabela_admin`
--
ALTER TABLE `tabela_admin`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tabela_kategorije`
--
ALTER TABLE `tabela_kategorije`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tabela_kurir`
--
ALTER TABLE `tabela_kurir`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tabela_poruci`
--
ALTER TABLE `tabela_poruci`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tabela_proizvodi`
--
ALTER TABLE `tabela_proizvodi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabela_admin`
--
ALTER TABLE `tabela_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tabela_kategorije`
--
ALTER TABLE `tabela_kategorije`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tabela_kurir`
--
ALTER TABLE `tabela_kurir`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tabela_poruci`
--
ALTER TABLE `tabela_poruci`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tabela_proizvodi`
--
ALTER TABLE `tabela_proizvodi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
