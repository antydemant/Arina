<?php

class m140506_084032_user_update extends CDbMigration
{
	public function up()
	{
        $this->addColumn('user', 'identity_type', 'int');
	}

	public function down()
	{
        $this->dropColumn('user', 'identity_type');
		return true;
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