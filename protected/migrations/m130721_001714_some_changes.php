<?php

class m130721_001714_some_changes extends CDbMigration
{
	public function up()
	{
        $this->execute("
            ALTER TABLE  `users` ADD  `password` VARCHAR( 128 ) NOT NULL AFTER  `username` ;
            ALTER TABLE  `users` CHANGE  `lname`  `lname` VARCHAR( 128 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL ;
            ALTER TABLE  `users` CHANGE  `fname`  `fname` VARCHAR( 128 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL ;
            ALTER TABLE  `users` ADD  `status` ENUM(  'active',  'suspend',  'deleted' ) NOT NULL AFTER  `fname` ;
            ALTER TABLE  `users` ADD  `gender` TINYINT NOT NULL DEFAULT  '0' COMMENT  '1-male,0-female' AFTER  `username` ;
            CREATE TABLE IF NOT EXISTS `category` (
              `id_category` bigint(20) NOT NULL AUTO_INCREMENT,
              `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
              `image` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
              `odr` int(11) NOT NULL DEFAULT '255',
              `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
              PRIMARY KEY (`id_category`)
            ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;
        ");
	}

	public function down()
	{
		echo "m130721_001714_some_changes does not support migration down.\n";
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