<?php

class m140221_162423_removeGroupIdFromActualClass extends CDbMigration
{
	public function up()
	{
		$this->dropColumn('actual_class', 'group_id');
	}

	public function down()
	{
		echo "m140221_162423_removeGroupIdFromActualClass does not support migration down.\n";
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