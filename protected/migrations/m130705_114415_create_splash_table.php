<?php

class m130705_114415_create_splash_table extends CDbMigration
{
	public function up()
	{
        $this->execute("
            CREATE TABLE `splash` (
              `id_splash` bigint(11) unsigned NOT NULL AUTO_INCREMENT,
              `image_type` enum('jpeg','png','gif') DEFAULT 'jpeg',
              `url` varchar(255) NOT NULL DEFAULT '',
              `duration` float(10,1) NOT NULL DEFAULT '1.0',
              `start_at` datetime DEFAULT NULL,
              `end_at` datetime DEFAULT NULL,
              `created_at` datetime NOT NULL,
              `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
              PRIMARY KEY (`id_splash`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
        ");
	}

	public function down()
	{
		echo "m130705_114415_create_splash_table does not support migration down.\n";
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