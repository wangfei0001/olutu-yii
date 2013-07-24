<?php

class m130723_124911_add_two_tables extends CDbMigration
{
	public function up()
	{
        $this->execute("
            CREATE TABLE `plan_type` (
              `id_plan_type` bigint(20) NOT NULL AUTO_INCREMENT,
              `name` varchar(64) NOT NULL,
              `description` varchar(128) DEFAULT NULL,
              `image` varchar(255) NOT NULL,
              `odr` int(11) NOT NULL DEFAULT '255',
              `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
              PRIMARY KEY (`id_plan_type`)
            ) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

            INSERT INTO `plan_type` (`id_plan_type`, `name`, `description`, `image`, `odr`, `created_at`) VALUES
            (1, '机票', '酒店/旅馆/住宿', '', 0, '2013-07-23 12:47:34'),
            (2, '景点/地标', NULL, '', 255, '2013-07-23 12:45:38'),
            (3, '租车/旅行设备', NULL, '', 3, '2013-07-23 12:47:51'),
            (4, '美食/餐馆', NULL, '', 4, '2013-07-23 12:47:59'),
            (5, '购物', NULL, '', 255, '2013-07-23 12:46:26'),
            (6, '活动/户外/休闲', NULL, '', 255, '2013-07-23 12:46:32'),
            (7, '酒店/旅馆/住宿', NULL, '', 1, '2013-07-23 12:47:42');

            CREATE TABLE `trip_plan` (
              `id_trip_plan` bigint(20) NOT NULL AUTO_INCREMENT,
              `fk_country` bigint(20) DEFAULT NULL,
              `fk_state` bigint(20) DEFAULT NULL,
              `fk_city` bigint(20) DEFAULT NULL,
              `date` date DEFAULT NULL,
              `title` varchar(128) NOT NULL,
              `fk_user` bigint(20) NOT NULL,
              `created_at` datetime NOT NULL,
              `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
              PRIMARY KEY (`id_trip_plan`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
        ");
	}

	public function down()
	{
		echo "m130723_124911_add_two_tables does not support migration down.\n";
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