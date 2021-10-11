-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2018 at 06:15 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spbur`
--

-- --------------------------------------------------------

--
-- Table structure for table `complain`
--

CREATE TABLE `complain` (
  `series_no` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `ic_number` varchar(50) DEFAULT NULL,
  `matric_no` int(11) DEFAULT NULL,
  `course_code` varchar(255) DEFAULT NULL,
  `faculty` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone_no` varchar(255) NOT NULL,
  `missDate` date DEFAULT NULL,
  `missTime` time DEFAULT NULL,
  `missPlace` varchar(255) DEFAULT NULL,
  `missItem` varchar(10000) DEFAULT NULL,
  `report` varchar(10000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complain`
--

INSERT INTO `complain` (`series_no`, `name`, `ic_number`, `matric_no`, `course_code`, `faculty`, `address`, `phone_no`, `missDate`, `missTime`, `missPlace`, `missItem`, `report`) VALUES
(1, 'Muhammad Izham Bin Mohamad Nizam', '980810565043', 2016686708, 'CS110', 'FSKM', 'Mat Kilau', '01123002898', '2018-09-05', '11:11:00', 'Medan Selera', 'Dompet', 'X tau apa jadi'),
(2, 'Izara Aisyah', '990605541456', 2019699799, 'CS111', 'FSKM', 'Tun Teja 2', '0135648794', '2018-09-06', '12:12:00', 'Rumah', 'Duit RM100', 'Mungkin member pinjam tak bagitau.'),
(3, 'Muhammad Izham Bin Mohamad Nizam', '980810565043', 2016686708, 'CS110', 'FSKM', 'Mat Kilau', '01123002898', '2018-09-06', '00:22:00', 'vavasv', 'dgadva', 'vasvasvasv');

-- --------------------------------------------------------

--
-- Table structure for table `kad`
--

CREATE TABLE `kad` (
  `series_no` int(11) NOT NULL,
  `currentdate` date NOT NULL,
  `matric_no` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `prog_code` varchar(255) NOT NULL,
  `faculty` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone_no` varchar(255) NOT NULL,
  `validuntil` varchar(255) DEFAULT NULL,
  `refer` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kad`
--

INSERT INTO `kad` (`series_no`, `currentdate`, `matric_no`, `name`, `prog_code`, `faculty`, `address`, `phone_no`, `validuntil`, `refer`) VALUES
(1, '2018-09-06', 2019699799, 'Izara Aisyah', 'CS111', 'FSKM', 'Tun Teja 2', '0135648794', '2018-09-07', '2'),
(2, '2018-09-05', 2016686708, 'Muhammad Izham Bin Mohamad Nizam', 'CS110', 'FSKM', 'Mat Kilau', '01123002898', '2018-09-08', '1'),
(3, '2018-09-06', 2016686708, 'Muhammad Izham Bin Mohamad Nizam', 'CS110', 'FSKM', 'Mat Kilau', '01123002898', '2018-09-06', '3');

-- --------------------------------------------------------

--
-- Table structure for table `kp`
--

CREATE TABLE `kp` (
  `series_no` int(11) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `matric_no` int(11) NOT NULL,
  `mykad_no` varchar(255) NOT NULL,
  `prog_code` varchar(255) NOT NULL,
  `summon_date` varchar(255) NOT NULL,
  `summon_time` varchar(255) NOT NULL,
  `summon_place` varchar(255) NOT NULL,
  `summons` varchar(255) NOT NULL,
  `rm` double NOT NULL,
  `paybefore` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kp`
--

INSERT INTO `kp` (`series_no`, `gender`, `name`, `matric_no`, `mykad_no`, `prog_code`, `summon_date`, `summon_time`, `summon_place`, `summons`, `rm`, `paybefore`) VALUES
(1, 'Siswi', 'Izara Aisyah', 2019699799, '990605541456', 'CS111', '05/09/2018', '03:29:PM', 'Dataran', 'Baju- Jarang, Baju- Singkat(tidak menutup punggung), Seluar/Kain- Terlalu ketat, , ', 200, 'Ditentukan Oleh Pegawai Yang Bertugas'),
(2, 'Siswi', 'Izara Aisyah', 2019699799, '990605541456', 'CS111', '05/09/2018', '03:32:PM', 'Rumah', 'Kolej Kediaman- Membuat Bising, Kolej Kediaman- Bilik Kotor/Tidak kemas, ', 100, 'Ditentukan Oleh Pegawai Yang Bertugas'),
(3, 'Siswa', 'Ahmad Ammar Qayyum Bin Mohamad Kamal', 2016699092, '980801105379', 'CS110', '05/09/2018', '03:57:PM', 'Tandas', 'Kolej Kediaman- Membuat Bising, Tempat Tinggal/Tidur Dalam Kampus- Tidur di tempat yang tidak dibenarkan, ', 100, 'Ditentukan Oleh Pegawai Yang Bertugas'),
(4, 'Siswa', 'Ahmad Ammar Qayyum Bin Mohamad Kamal', 2016699092, '980801105379', 'CS110', '05/09/2018', '03:59:PM', 'Dataran', 'Kasut- Memakai selipar, Kad Pelajar- Tidak membawa/gantung/pamer, ', 100, 'Ditentukan Oleh Pegawai Yang Bertugas'),
(5, 'Siswa', 'Muhammad Izham Bin Mohamad Nizam', 2016686708, '980810565043', 'CS110', '05/09/2018', '04:00:PM', 'Parkir', 'Kad Pelajar- Tidak membawa/gantung/pamer, Perhiasan Diri- Memakai anting-anting/rantai/gelang/pamer, ', 100, 'Ditentukan Oleh Pegawai Yang Bertugas');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_ID` int(11) NOT NULL,
  `pass_word` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_ID`, `pass_word`) VALUES
(111, '111');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `matric_no` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `ic_number` varchar(255) NOT NULL,
  `course_code` varchar(255) NOT NULL,
  `faculty` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone_no` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`matric_no`, `name`, `ic_number`, `course_code`, `faculty`, `address`, `phone_no`, `gender`) VALUES
(2016686708, 'Muhammad Izham Bin Mohamad Nizam', '980810565043', 'CS110', 'FSKM', 'Mat Kilau', '01123002898', 'Lelaki'),
(2016699092, 'Ahmad Ammar Qayyum Bin Mohamad Kamal', '980801105379', 'CS110', 'FSKM', '04A 07 b23/2 - Mat Kilau', '0102368052', 'Lelaki'),
(2019699799, 'Izara Aisyah', '990605541456', 'CS111', 'FSKM', 'Tun Teja 2', '0135648794', 'Perempuan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complain`
--
ALTER TABLE `complain`
  ADD PRIMARY KEY (`series_no`);

--
-- Indexes for table `kad`
--
ALTER TABLE `kad`
  ADD PRIMARY KEY (`series_no`),
  ADD KEY `matric_no` (`matric_no`);

--
-- Indexes for table `kp`
--
ALTER TABLE `kp`
  ADD PRIMARY KEY (`series_no`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_ID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`matric_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complain`
--
ALTER TABLE `complain`
  MODIFY `series_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kad`
--
ALTER TABLE `kad`
  MODIFY `series_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kp`
--
ALTER TABLE `kp`
  MODIFY `series_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kad`
--
ALTER TABLE `kad`
  ADD CONSTRAINT `kad_ibfk_1` FOREIGN KEY (`matric_no`) REFERENCES `student` (`matric_no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
