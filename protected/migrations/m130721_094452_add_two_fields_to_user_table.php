<?php

class m130721_094452_add_two_fields_to_user_table extends CDbMigration
{
	public function up()
	{
        $this->execute("
            ALTER TABLE  `users` ADD  `access_key_id` VARCHAR( 64 ) NOT NULL AFTER  `password` ;
            ALTER TABLE  `users` ADD  `secret_access_key` VARCHAR( 64 ) NOT NULL AFTER  `password` ;

        ");
	}

	public function down()
	{
		echo "m130721_094452_add_two_fields_to_user_table does not support migration down.\n";
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