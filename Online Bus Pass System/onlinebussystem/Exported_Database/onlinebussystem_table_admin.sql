
-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(11) NOT NULL,
  `Admin_ID` bigint(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email_ID` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `Admin_ID`, `Name`, `Email_ID`, `Password`, `Date`) VALUES
(1, 608051, 'Admin', 'Admin1234@gmail.com', 'Admin1234', '2021-04-16 12:02:19');
