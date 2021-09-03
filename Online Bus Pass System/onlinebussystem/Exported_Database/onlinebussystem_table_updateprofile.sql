
-- --------------------------------------------------------

--
-- Table structure for table `updateprofile`
--

CREATE TABLE `updateprofile` (
  `ID` int(11) NOT NULL,
  `User_ID` bigint(11) NOT NULL,
  `First_Name` varchar(50) NOT NULL,
  `Last_Name` varchar(50) NOT NULL,
  `Email_ID` varchar(255) NOT NULL,
  `Phone_Number` varchar(20) NOT NULL,
  `gender` varchar(191) NOT NULL,
  `birthday` date NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Address2` varchar(255) NOT NULL,
  `State` varchar(255) NOT NULL,
  `City` varchar(255) NOT NULL,
  `Zipcode` varchar(255) NOT NULL,
  `profileImage` blob NOT NULL,
  `AddressProof` blob NOT NULL,
  `Last_Update Time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `updateprofile`
--

INSERT INTO `updateprofile` (`ID`, `User_ID`, `First_Name`, `Last_Name`, `Email_ID`, `Phone_Number`, `gender`, `birthday`, `Address`, `Address2`, `State`, `City`, `Zipcode`, `profileImage`, `AddressProof`, `Last_Update Time`) VALUES
(10, 5016, 'Nikith', 'Seemakurthi', 'seemakurthi02@gmail.com', '6302114042', 'Male', '2021-01-06', 'Mini Bypass Road, BV Nagar, Nellore, Andhra Pradesh 524004, India', 'Near BJP Office', 'Andhra Pradesh', 'Nellore', '524004', '', '', '2021-04-11 11:53:55'),
(11, 5016, 'Nikith', 'Seemakurthi', 'seemakurthi02@gmail.com', '6302114042', 'Male', '2021-01-06', 'Mini Bypass Road, BV Nagar, Nellore, Andhra Pradesh 524004, India', 'Near BJP Office', 'Andhra Pradesh', 'Nellore', '524004', 0x61746c61735f626f6f6b2d77616c6c70617065722d343830783830302e6a7067, 0x4268616e6761726820466f72745f2041204861756e74656420466f72742e6a7067, '2021-04-11 11:54:27');
