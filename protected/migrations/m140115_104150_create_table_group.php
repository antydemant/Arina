<?php

class m140115_104150_create_table_group extends CDbMigration
{
	public function up()
    {
        $this->createTable(
            'group',
            array(
                'id' => 'pk',
                'name' => 'string NOT NULL',
                'courator_id' => 'integer NOT NULL',
                'department_id' => 'integer NOT NULL',
                'year' => 'integer(4) NOT NULL',
            )
        );
    }

    public function down()
    {
        $this->dropTable('group');
        echo "success" . PHP_EOL;
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