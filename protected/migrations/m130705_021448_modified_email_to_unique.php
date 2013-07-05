<?php

class m130705_021448_modified_email_to_unique extends CDbMigration
{
	public function up()
	{
        $this->execute('ALTER TABLE  `users` ADD UNIQUE (`email`);');
	}

	public function down()
	{
		echo "m130705_021448_modified_email_to_unique does not support migration down.\n";
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