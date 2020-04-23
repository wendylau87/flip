DROP DATABASE IF EXISTS `flip`;

CREATE DATABASE `flip`;

USE `flip`;

DROP TABLE IF EXISTS `disbursement`;

CREATE TABLE `disbursement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime NOT NULL,
  `updated` datetime DEFAULT NULL,
  `response_id` bigint(20) unsigned NOT NULL,
  `response_amount` double NOT NULL,
  `response_timestamp` datetime NOT NULL,
  `response_bank_code` varchar(100) NOT NULL,
  `response_account_number` varchar(100) NOT NULL,
  `response_beneficiary_name` varchar(255) NOT NULL,
  `response_remark` text,
  `response_receipt` text,
  `response_time_served` datetime DEFAULT NULL,
  `response_fee` double DEFAULT NULL,
  `response_status` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
