
-- --------------------------------------------------------

--
-- Table structure for table `registerusers`
--

CREATE TABLE `registerusers` (
  `ID` int(11) NOT NULL,
  `User_ID` bigint(11) NOT NULL,
  `First_Name` varchar(50) NOT NULL,
  `Last_Name` varchar(50) NOT NULL,
  `Email_ID` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `RePassword` varchar(255) NOT NULL,
  `verify_token` varchar(191) NOT NULL,
  `status` varchar(255) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registerusers`
--

INSERT INTO `registerusers` (`ID`, `User_ID`, `First_Name`, `Last_Name`, `Email_ID`, `Password`, `RePassword`, `verify_token`, `status`, `Date`) VALUES
(1, 5016, 'Nikith', 'Seemakurthi', 'seemakurthi@gmail.com', 'nikith1234', 'nikith1234', '2339rr91y9r0923ur02', 'active', '2021-06-22 06:17:15'),
(3, 8066, 'Vignesh', 'P', 'vignesh@gmail.com', '123456789', '123456789', '4d5953b8c64ba00cccc351121d654f78', 'inactive', '2021-04-21 08:06:03'),
(4, 209644, 'Nikith', 'Seemakurthi', 'nikith123@srmist.edu.in', 'nikith1234', 'nikith1234', 'f0f265b3204c7b26383bce89471cf03a', 'inactive', '2021-06-22 06:17:38');
