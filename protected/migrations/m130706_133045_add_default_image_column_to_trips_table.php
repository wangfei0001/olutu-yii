<?php

class m130706_133045_add_default_image_column_to_trips_table extends CDbMigration
{
	public function up()
	{

        $this->execute("ALTER TABLE trips ADD fk_default_image BIGINT(20) AFTER fk_user;");
	}

	public function down()
	{
		echo "m130706_133045_add_default_image_column_to_trips_table does not support migration down.\n";
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