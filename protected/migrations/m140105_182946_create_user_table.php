<?php
/**
 * Class m140105_182946_create_user_table
 */

class m140105_182946_create_user_table extends CDbMigration
{
	public function up()
	{
        $this->createTable(
            'user',
            array(
                'id' => 'pk',
                'username' => 'string NOT NULL',
                'password' => 'string NOT NULL',
            )
        );
	}

	public function down()
	{
		$this->dropTable('user');
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