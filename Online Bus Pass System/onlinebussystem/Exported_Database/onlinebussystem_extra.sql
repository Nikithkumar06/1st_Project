
--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `busdetails`
--
ALTER TABLE `busdetails`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `offline_pass`
--
ALTER TABLE `offline_pass`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `offline_register`
--
ALTER TABLE `offline_register`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `passdetails`
--
ALTER TABLE `passdetails`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `registerusers`
--
ALTER TABLE `registerusers`
  ADD PRIMARY KEY (`ID`,`User_ID`);

--
-- Indexes for table `updateprofile`
--
ALTER TABLE `updateprofile`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `busdetails`
--
ALTER TABLE `busdetails`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `offline_pass`
--
ALTER TABLE `offline_pass`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `offline_register`
--
ALTER TABLE `offline_register`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `passdetails`
--
ALTER TABLE `passdetails`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `registerusers`
--
ALTER TABLE `registerusers`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `updateprofile`
--
ALTER TABLE `updateprofile`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
