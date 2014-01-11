<?php

class m140111_210533_add_column_role_to_user extends CDbMigration
{
	public function up()
	{
        $this->addColumn('user', 'role_id', 'integer NOT NULL');
	}

	public function down()
	{
        $this->dropColumn('user', 'role');
        echo "success";
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