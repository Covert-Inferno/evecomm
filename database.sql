--
-- Database: `evecomm`
--

-- --------------------------------------------------------

--
-- Table structure for table `board_channels`
--

CREATE TABLE IF NOT EXISTS `board_channels` (
  `boardID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(32) COLLATE utf16_unicode_ci NOT NULL,
  `rights` int(1) unsigned NOT NULL,
  PRIMARY KEY (`boardID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `board_channels`
--

INSERT INTO `board_channels` (`boardID`, `title`, `rights`) VALUES
(1, 'General', 1),
(999, 'Admin board', 10);

-- --------------------------------------------------------

--
-- Table structure for table `board_posts`
--

CREATE TABLE IF NOT EXISTS `board_posts` (
  `postID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(128) COLLATE utf16_unicode_ci NOT NULL,
  `replyTo` int(10) unsigned NOT NULL,
  `datetime` int(10) unsigned NOT NULL,
  `content` mediumtext COLLATE utf16_unicode_ci NOT NULL,
  `poster` int(10) unsigned NOT NULL,
  `channel` int(10) unsigned NOT NULL,
  `type` varchar(1) COLLATE utf16_unicode_ci NOT NULL,
  PRIMARY KEY (`postID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `board_posts`
--

INSERT INTO `board_posts` (`postID`, `title`, `replyTo`, `datetime`, `content`, `poster`, `channel`, `type`) VALUES
(1, 'Welcome to EVEComm!', 0, 1372843699, 'Welcome to EVEComm!\r\n\r\nThis is the default topic of the board module. For more information, please visit: http://github.com/DoogeJ/evecomm', 1, 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `messageID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `senderUserID` int(10) unsigned NOT NULL,
  `receiverUserID` int(10) unsigned NOT NULL,
  `title` varchar(128) COLLATE utf16_unicode_ci NOT NULL,
  `content` mediumtext COLLATE utf16_unicode_ci NOT NULL,
  `sendDate` int(10) unsigned NOT NULL,
  `readDate` int(10) unsigned NOT NULL,
  `senderDelete` varchar(1) COLLATE utf16_unicode_ci NOT NULL DEFAULT '0',
  `receiverDelete` varchar(1) COLLATE utf16_unicode_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`messageID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE IF NOT EXISTS `modules` (
  `module` varchar(64) COLLATE utf16_unicode_ci NOT NULL,
  `status` varchar(1) COLLATE utf16_unicode_ci NOT NULL DEFAULT '1',
  `rights` varchar(1) COLLATE utf16_unicode_ci NOT NULL DEFAULT '1',
  PRIMARY KEY (`module`)
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`module`, `status`, `rights`) VALUES
('board', '1', '1'),
('messages', '1', '1'),
('wallet', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `option` varchar(64) COLLATE utf16_unicode_ci NOT NULL,
  `value` varchar(256) COLLATE utf16_unicode_ci NOT NULL,
  PRIMARY KEY (`option`)
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`option`, `value`) VALUES
('adminRights', '10'),
('allowedAllianceIDs', '99001436'),
('allowedCharacterIDs', ''),
('allowedCorporationIDs', ''),
('apiAccessMask', '59113736'),
('apiRequired', '1'),
('emailRequired', '0'),
('enabledModules', 'board,wallet,messages'),
('onlyAdminLogin', '0');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(64) COLLATE utf16_unicode_ci NOT NULL,
  `password` varchar(40) COLLATE utf16_unicode_ci NOT NULL,
  `eveCharacterID` int(10) unsigned NOT NULL,
  `eveCorporationID` int(10) unsigned NOT NULL,
  `eveAllianceID` int(10) unsigned NOT NULL,
  `eveApiID` int(10) unsigned NOT NULL,
  `eveApiVcode` varchar(128) COLLATE utf16_unicode_ci NOT NULL,
  `status` varchar(1) COLLATE utf16_unicode_ci NOT NULL DEFAULT '1',
  `rights` int(10) unsigned NOT NULL DEFAULT '1',
  `language` varchar(2) COLLATE utf16_unicode_ci NOT NULL DEFAULT 'EN',
  `registrationDate` int(10) unsigned NOT NULL,
  `lastLoginDate` int(10) unsigned NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `wallet`
--

CREATE TABLE IF NOT EXISTS `wallet` (
  `walletID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `amount` decimal(14,2) NOT NULL,
  `userID` int(10) unsigned NOT NULL,
  `status` varchar(1) COLLATE utf16_unicode_ci NOT NULL DEFAULT '1',
  PRIMARY KEY (`walletID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci COMMENT='Decimal(14,2) limites the maximum amount to 999 billion ISK.' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `wallet_access`
--

CREATE TABLE IF NOT EXISTS `wallet_access` (
  `accessID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `walletID` int(10) unsigned NOT NULL,
  `userID` int(10) unsigned NOT NULL,
  `accessDate` int(10) unsigned NOT NULL,
  `description` varchar(64) COLLATE utf16_unicode_ci NOT NULL,
  `maxDailyTransfer` decimal(14,2) NOT NULL,
  `status` varchar(1) COLLATE utf16_unicode_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`accessID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `wallet_transactions`
--

CREATE TABLE IF NOT EXISTS `wallet_transactions` (
  `transactionID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fromUserID` int(10) unsigned NOT NULL,
  `toUserID` int(10) unsigned NOT NULL,
  `fromWalletID` int(10) unsigned NOT NULL,
  `toWalletID` int(10) unsigned NOT NULL,
  `amount` decimal(14,2) unsigned NOT NULL,
  `description` varchar(64) COLLATE utf16_unicode_ci NOT NULL DEFAULT 'No description',
  `transactionDate` int(10) unsigned NOT NULL,
  PRIMARY KEY (`transactionID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci AUTO_INCREMENT=1 ;
