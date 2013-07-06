<?php

class m130706_121730_create_trips_table extends CDbMigration
{
	public function up()
	{
     $this->execute("
CREATE TABLE `trips` (
        `id_trip` bigint(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL DEFAULT '',
  `fk_user` bigint(20) NOT NULL,
  `is_group` tinyint(4) DEFAULT '0' COMMENT '是否是团队游',
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_trip`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
      ");
	}

	public function down()
	{
		echo "m130706_121730_create_trips_table does not support migration down.\n";
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