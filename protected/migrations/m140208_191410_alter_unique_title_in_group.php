<?php

class m140208_191410_alter_unique_title_in_group extends CDbMigration
{
	public function up()
	{
        $this->execute("ALTER TABLE  `group` ADD UNIQUE (`title`);");
	}

	public function down()
	{
		echo "m140208_191410_alter_unique_title_in_group does not support migration down.\n";
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