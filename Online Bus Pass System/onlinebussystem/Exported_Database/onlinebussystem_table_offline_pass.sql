
-- --------------------------------------------------------

--
-- Table structure for table `offline_pass`
--

CREATE TABLE `offline_pass` (
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
-- Dumping data for table `offline_pass`
--

INSERT INTO `offline_pass` (`ID`, `User_ID`, `Pass_ID`, `busno`, `start`, `end`, `option`, `price`, `Date`, `Expiry`) VALUES
(3, 323351, 63272, 'B145', 'Miyapur', 'Koti', '3150', '3150', '2021-04-14 11:15:39', '2022-04-14 11:15:39');
