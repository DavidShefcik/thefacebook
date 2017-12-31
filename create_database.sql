--
-- Database: `thefacebook`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(3) NOT NULL auto_increment,
  `email` varchar(255) default NULL,
  `name` varchar(255) default NULL,
  `status` varchar(255) default NULL,
  `password` varchar(255) default NULL,
  `member_since` varchar(255) default NULL,
  `sex` varchar(255) default NULL,
  `year` varchar(255) default NULL,
  `concentration` varchar(255) default NULL,
  `screenname` varchar(255) default NULL,
  `looking_for` varchar(255) default NULL,
  `interested_in` varchar(255) default NULL,
  `relationship` varchar(255) default NULL,
  `political_view` varchar(255) default NULL,
  `interests` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `name`, `status`, `password`, `member_since`, `sex`, `year`, `concentration`, `screenname`, `looking_for`, `interested_in`, `relationship`, `political_view`, `interests`) VALUES
(1, 'mzuckerberg@harvard.edu', 'Mark Zuckerberg', 'Student', 'password', '2004-02-04', 'Male', '2006', 'Psychology', 'Zuck', '', 'Women', 'Single', 'Liberal', '');
