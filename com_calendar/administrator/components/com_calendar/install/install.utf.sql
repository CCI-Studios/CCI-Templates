CREATE TABLE IF NOT EXISTS `#__calendar_days` (
  `calendar_day_id` bigint(20) unsigned NOT NULL auto_increment,
  `user_id` int(11) unsigned NOT NULL,
  `filename` varchar(150) NOT NULL,
	`title`	varchar(150) NOT NULL,
  `description` text NOT NULL COMMENT '@Filter("html")',
  `enabled` tinyint(1) unsigned NOT NULL default '0',
  `locked_at` datetime NOT NULL,
  `purchased_at` datetime NOT NULL,
  `calendar_transaction_id` bigint(20) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY  (`calendar_day_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;




CREATE OR REPLACE VIEW `#__calendar_view_days` AS
SELECT `tbl`.*, `u`.`name` as `user_name`
FROM `#__calendar_days` AS `tbl` JOIN `#__users` AS `u` 
WHERE `tbl`.`user_id` = `u`.`id`;
