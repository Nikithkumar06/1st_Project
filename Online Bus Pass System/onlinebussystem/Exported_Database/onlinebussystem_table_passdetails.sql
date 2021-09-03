
-- --------------------------------------------------------

--
-- Table structure for table `passdetails`
--

CREATE TABLE `passdetails` (
  `ID` int(11) NOT NULL,
  `User_ID` bigint(11) NOT NULL,
  `Pass_ID` bigint(11) NOT NULL,
  `busno` varchar(255) NOT NULL,
  `start` varchar(255) NOT NULL,
  `end` varchar(255) NOT NULL,
  `option` varchar(80) NOT NULL,
  `price` varchar(80) NOT NULL,
  `Date` datetime NOT NULL,
  `Expiry` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `passdetails`
--

INSERT INTO `passdetails` (`ID`, `User_ID`, `Pass_ID`, `busno`, `start`, `end`, `option`, `price`, `Date`, `Expiry`) VALUES
(1, 5016, 1610, 'A145', 'Miyapur', 'Koti', '850', '850', '2021-04-10 13:36:04', '2021-07-10 13:36:04');
