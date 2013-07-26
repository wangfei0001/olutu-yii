<?php

class m130726_115417_modify_database extends CDbMigration
{
	public function up()
	{
        $this->execute("
ALTER TABLE  `trips` ADD INDEX (  `fk_user` ) ;
ALTER TABLE  `trips` ADD INDEX (  `fk_default_image` ) ;
ALTER TABLE  `trips` ADD FOREIGN KEY (  `fk_user` ) REFERENCES  `olutu`.`users` (
`id_user`
) ON DELETE NO ACTION ON UPDATE NO ACTION ;
ALTER TABLE  `trips` ADD  `is_plan` TINYINT NOT NULL DEFAULT  '0' COMMENT  '是否是旅行计划' AFTER  `is_group` ;
ALTER TABLE  `trips` ADD  `fk_country` BIGINT NULL AFTER  `name` ,
ADD  `fk_state` BIGINT NULL AFTER  `fk_country` ,
ADD  `fk_city` BIGINT NULL AFTER  `fk_state` ;
drop table trip_plan;
        ");
	}

	public function down()
	{
		echo "m130726_115417_modify_database does not support migration down.\n";
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