<?php

class m130724_213121_add_tables extends CDbMigration
{
	public function up()
	{
        $this->execute("

--
-- Database: `olutu`
--
CREATE DATABASE IF NOT EXISTS `olutu` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `olutu`;

-- --------------------------------------------------------

--
-- Table structure for table `airport_code`
--

CREATE TABLE IF NOT EXISTS `airport_code` (
  `id_airport_code` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `country_name` varchar(20) NOT NULL COMMENT '临时字段，会被删除',
  `fk_country` bigint(20) DEFAULT NULL,
  `fk_state` bigint(20) DEFAULT NULL,
  `fk_city` bigint(20) DEFAULT NULL,
  `code` varchar(3) NOT NULL COMMENT '机场代码',
  PRIMARY KEY (`id_airport_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `airport_code`
--

INSERT INTO `airport_code` (`id_airport_code`, `name`, `country_name`, `fk_country`, `fk_state`, `fk_city`, `code`) VALUES
(1, '北京首都国际机场', '', NULL, NULL, NULL, 'PEK'),
(2, '广州白云机场', '', NULL, NULL, NULL, 'CAN'),
(3, '上海浦东机场', '', NULL, NULL, NULL, 'PVG');

-- --------------------------------------------------------

--
-- Table structure for table `info_flights`
--

CREATE TABLE IF NOT EXISTS `info_flights` (
  `id_info_flight` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(1024) DEFAULT NULL,
  `fk_city_src` bigint(20) NOT NULL COMMENT '出发城市',
  `fk_city_dst` bigint(20) NOT NULL COMMENT '到达城市',
  `fk_airport_src` bigint(20) DEFAULT NULL,
  `fk_airport_dst` bigint(20) DEFAULT NULL,
  `valid_from` datetime DEFAULT NULL,
  `valid_to` datetime DEFAULT NULL,
  `departure_time` datetime DEFAULT NULL COMMENT '出发时间',
  `arrivial_time` datetime DEFAULT NULL COMMENT '到达时间',
  `is_time_change` tinyint(4) NOT NULL DEFAULT '0' COMMENT '机票是否可以改期',
  `image` varchar(255) DEFAULT NULL,
  `fk_merchant` bigint(20) NOT NULL,
  `price` float(10,2) NOT NULL,
  `market_price` float(10,2) DEFAULT NULL COMMENT '市场价格',
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_info_flight`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='该表存储所有航班折扣价格信息' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `merchants`
--

CREATE TABLE IF NOT EXISTS `merchants` (
  `id_merchant` bigint(20) NOT NULL AUTO_INCREMENT,
  `company` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `zipcode` varchar(16) DEFAULT NULL,
  `phone` varchar(16) DEFAULT NULL,
  `mobile` varchar(16) DEFAULT NULL,
  `fax` varchar(16) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `description` varchar(1024) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `status` enum('active','suspend') NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_merchant`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

        ");
	}

	public function down()
	{
		echo "m130724_213121_add_tables does not support migration down.\n";
		return false;
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}