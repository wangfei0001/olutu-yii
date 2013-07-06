<?php

class m130706_124934_create_4_tables extends CDbMigration
{
	public function up()
	{
     $this->execute("
CREATE TABLE `trip_image` (
  `id_trip_image` bigint(11) unsigned NOT NULL AUTO_INCREMENT,
  `lat` float DEFAULT NULL,
  `lng` float DEFAULT NULL,
  `image_type` enum('jpeg') NOT NULL DEFAULT 'jpeg',
  `path` varchar(1024) NOT NULL DEFAULT '',
  `width` int(11) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `filename` varchar(255) NOT NULL DEFAULT '',
  `thumb_width` int(11) DEFAULT NULL,
  `thumb_height` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_trip_image`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
CREATE TABLE `trip_post` (
  `id_trip_post` bigint(11) unsigned NOT NULL AUTO_INCREMENT,
  `fk_trip` bigint(20) NOT NULL,
  `fk_user` bigint(20) NOT NULL,
  `content` varchar(1024) NOT NULL DEFAULT '',
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_trip_post`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
CREATE TABLE `post_image` (
  `id_post_image` bigint(11) unsigned NOT NULL AUTO_INCREMENT,
  `fk_post` bigint(11) NOT NULL,
  `fk_image` bigint(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_post_image`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
             ");
	}

	public function down()
	{
		echo "m130706_124934_create_4_tables does not support migration down.\n";
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