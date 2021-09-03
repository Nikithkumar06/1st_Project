
-- --------------------------------------------------------

--
-- Table structure for table `offline_register`
--

CREATE TABLE `offline_register` (
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
  `Register_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `offline_register`
--

INSERT INTO `offline_register` (`ID`, `User_ID`, `First_Name`, `Last_Name`, `Email_ID`, `Phone_Number`, `gender`, `birthday`, `Address`, `Address2`, `State`, `City`, `Zipcode`, `profileImage`, `AddressProof`, `Register_date`) VALUES
(2, 782079, 'Nikith kumar', 'Seemakurthi', 'seemakurthi02@gmail.com', '06302114042', 'Male', '2021-04-06', 'B.V.Nagar,Nellore', 'Near BJP Office', 'Andhra Pradesh', 'Nellore', '524004', '', '', '2021-04-12 13:36:42'),
(3, 364448, 'Nikith', 'Kumar', 'seemakurthi02@gmail.com', '06302114042', 'Male', '2021-04-30', 'B.V.NAGAR', 'Near BJP Office', 'Andhra Pradesh', 'Nellore', '524004', '', '', '2021-04-12 11:32:09'),
(4, 35903, 'Rohith', 'S', 'rohith@gmail.com', '123456789', 'Male', '2021-03-30', 'Guntur', 'Guntur', 'Andhra Pradesh', 'Guntur', '123456', '', '', '2021-04-12 11:50:22');
