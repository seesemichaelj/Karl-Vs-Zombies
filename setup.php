<?php
require_once('./functions/load_config.php');
$config = load_config('./settings/config.dat');

$sql = 'SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";\n';

$sql .= "CREATE TABLE IF NOT EXISTS `$config[admin_table]` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
";

$sql .= "CREATE TABLE IF NOT EXISTS `$config[time_table]` (
  `zone` tinytext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `$config[time_table]` (`zone`) VALUES
('US/Eastern');
";

$sql .+ "CREATE TABLE IF NOT EXISTS `$config[user_table]` (
  `id` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pic_path` varchar(255) NOT NULL,
  `state` mediumint(9) NOT NULL,
  `killed` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `feed` timestamp NOT NULL default '0000-00-00 00:00:00',
  `kills` mediumint(9) NOT NULL,
  `killed_by` varchar(255) NOT NULL,
  `oz_opt` tinyint(4) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `starved` timestamp NOT NULL default '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
";


$sql .= "CREATE TABLE IF NOT EXISTS `$config[var_table]` (
  `zkey` varchar(255) NOT NULL,
  `value` mediumint(9) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `$config[var_table]` (`zkey`, `value`) VALUES
('oz-selected', 0),
('game-started', 0),
('oz-revealed', 0),
('reg-open', 0),
('reg-closed', 0),
('game-over', 0);
";

$sql .= "CREATE TABLE IF NOT EXISTS `$config[content_table]` (
  `content_id` int(11) NOT NULL auto_increment,
  `keyword` char(25) NOT NULL,
  `value` longtext NOT NULL,
  PRIMARY KEY  (`content_id`),
  UNIQUE KEY `content_idx1` (`keyword`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

INSERT INTO `$config[content_table]` (`content_id`, `keyword`, `value`) VALUES
(1, 'front', '<h1> HvZ</h1>\n<p>Humans Vs. Zombies has been unleashed! <br >\n<br>If you have any questions or concerns, please contact your moderators.<br><br>\nHappy Hunting!</p>'),
(2, 'rules', '<li>Don''t be a D-Bag!</li>\n<li>No realistic looking weaponry</li>\n<li>Guns may not be visible inside of academic buildings or jobs on campus</li>\n<li>No cars (segways allowed)</li>\n<p><strong>Required Equipment:</strong></p>\n\n<li>Bandana</li> \n\n<li>Dart Launcher (or socks)</li>\n<li>One ID index card</li><br>\n<p><strong>Safe Zones:</strong><br>Dorm rooms, Bathrooms, Academic buildings, Library, SRC, \n  Health Center, Dining Halls.<br>\n  Everywhere else is Free Game. <br><br>\n\n*A zombie must have both feet \n  outside of a safe zone to tag a human.</p>\n<p><strong>Non-participants</strong><br>\n People who are not registered participants may not directly \n  interact with the game.</p>\n\n<p><strong>Human Rules</strong></p>\n<p><strong>Conditions for Winning:</strong><br>\n  Humans win when the last \n  zombie starves to death.</p>\n<p><strong>Staying on campus:<br>\n  </strong>Humans must sleep on campus. If for whatever reason you need to leave \n  campus for longer than 24 hours, we apologize, but there are no exceptions.</p>\n<p><strong>ID number:</strong><br>\n  Every Human player must keep one index card with their unique identification \n  number on them at all times.</p>\n\n<p><strong>Stunning a Zombie:</strong><br>\nHumans may stun a Zombie for 15 minutes by shooting them \n  with a nerf gun or throwing a sock at them.</p>\n<p>*Only single shot/Non-automatic \n  weapons are allowed until the Humans are notified otherwise.</p>\n<p><strong>When tagged by a Zombie:<br>\n  </strong>When tagged by a Zombie, a Human is required to distribute their ID \n  card. One hour from being tagged a Human becomes a member of the Zombie team. \n</p>\n<p>*One hour from being tagged \n  you must begin wearing your bandana around your head - you are then allowed \n  to tag other Humans.</p>\n<p><strong>Zombie Rules </strong></p>\n<p><strong>Conditions for Winning:<br>\n\n  </strong>The Zombies win when the Human team has no remaining members.</p>\n<p><strong>Wearing your Headband:<br>\n  </strong>The Zombie team must wear a bandana around their head at all times.</p>\n<p><strong>Tagging:<br>\n  </strong>A tag is a firm touch to any part of a Human. After tagging a Human \n  the Zombie must collect their ID card. Kills must be reported within three hours.</p>\n<p><strong>Feeding:<br>\n  </strong>Zombie must feed every 48 hours. A zombie feeds by reporting their \n  kill on the website. A zombie may choose two other zombies to join in the feed.</p>\n\n<p><strong>Getting shot:<br>\n  </strong>When shot with a nerf gun or hit with a sock a Zombie is stunned for \n  15 minutes. A stunned zombie may not interact with the game in any way.</p>\n<p>*This includes shielding other \n  zombies from bullets or continuing to run toward a human.<br>\n  *If shot while stunned, a zombie remains stunned for the next 15 minutes.</p>');
";



echo $sql;
