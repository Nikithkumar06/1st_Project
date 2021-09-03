
-- --------------------------------------------------------

--
-- Table structure for table `busdetails`
--

CREATE TABLE `busdetails` (
  `ID` int(11) NOT NULL,
  `Bus_No` varchar(20) NOT NULL,
  `startstop` varchar(255) NOT NULL,
  `endstop` varchar(255) NOT NULL,
  `StartTime` time NOT NULL,
  `EndTime` time NOT NULL,
  `Frequency` varchar(50) NOT NULL,
  `onestop` varchar(255) NOT NULL,
  `secondstop` varchar(255) NOT NULL,
  `threestop` varchar(255) NOT NULL,
  `fourstop` varchar(255) NOT NULL,
  `fivestop` varchar(255) NOT NULL,
  `sixstop` varchar(255) NOT NULL,
  `sevenstop` varchar(255) NOT NULL,
  `eightstop` varchar(255) NOT NULL,
  `ninestop` varchar(255) NOT NULL,
  `tenstop` varchar(255) NOT NULL,
  `Update Time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `busdetails`
--

INSERT INTO `busdetails` (`ID`, `Bus_No`, `startstop`, `endstop`, `StartTime`, `EndTime`, `Frequency`, `onestop`, `secondstop`, `threestop`, `fourstop`, `fivestop`, `sixstop`, `sevenstop`, `eightstop`, `ninestop`, `tenstop`, `Update Time`) VALUES
(2, '1L ', 'LB Nagar Bus Stop ', 'Secunderabad Junction', '09:30:00', '08:06:00', '40 Minutes', 'Kothapet Bus Stop', 'Dilsukhnagar Bus station', 'Nalgonda X Roads Bus Stop', 'Koti Bus Stop', 'RTC Cross Rd', 'Golconda X Roads', 'Sapthagiri Theater', 'Jail Garden', 'Gandhi Hospital', 'Padmarao Nagar', '2021-04-13 13:36:07'),
(3, '1HD', 'Dilsukhnagar Bus station', 'Secunderabad Junction', '09:30:00', '21:00:00', '40 Minutes', 'Mosarambagh', 'Nalgonda X Roads Bus Stop', 'Chaderghat Bus Stop', 'Koti Bus Stop', 'Badichowdi', 'YMCA(Koti) Bus Stop', 'Chikkadpally', 'Golconda X Roads', 'Sapthagiri Theater', 'Musheerabad Bus Stop', '2021-04-16 10:49:05'),
(4, '2V', 'Secunderabad Junction', 'Charminar Bus Stop', '06:35:00', '18:09:00', '35 Minutes', 'Chilakalguda(Gandhi Statue)', 'Sitafalmandi MMTS', 'Sridevi Nursing Home', 'Jamia Osmania Bus Stop', 'Vidya Nagar Bus Stop', 'Nallakunta Bus Stop', 'Fever Hospital', 'Kachiguda Railway Station', 'Afzalgunj Bus Stop', 'Osmania Hospital(OGH)', '2021-04-16 10:51:47'),
(5, '6B', 'Ram Nagar', 'Ocean Park(Water Park)', '06:50:00', '21:40:00', '1 Hour', 'Narayanguda', 'Liberty Bus Stop', 'Birla Mandir', 'Lakdikapool Bus Stop', 'Golconda Hotel', 'Sarojini Bus Stop', 'Mehdipatnam Bus Stop', 'Nanalnagar Bus Stop', 'Bapu Ghat', 'Osman sagar Road', '2021-04-16 10:56:24');
