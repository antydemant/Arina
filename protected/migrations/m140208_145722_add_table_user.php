<?php

class m140208_145722_add_table_user extends CDbMigration
{
	public function up()
	{
        $this->createTable(
            'user',
            array(
                'id' => 'pk',
                'username' => 'string NOT NULL',
                'password' => 'string NOT NULL',
                'email' => 'string NOT NULL',
                'role' => 'integer',
                'identity_id' => 'integer',
            )
        );
	}

	public function down()
	{
        $this->dropTable('user');
		return false;
	}

}