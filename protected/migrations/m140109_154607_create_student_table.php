<?php

class m140109_154607_create_student_table extends CDbMigration
{
	public function up()
	{
            $this->createTable(
            'student',
            array(
                'id' => 'pk',
                'lastName' => 'string NOT NULL',
                'firstName' => 'string NOT NULL',
                'patronymic' => 'string NOT NULL',
                'code' => 'string NOT NULL',
                'group_id' => 'integer NOT NULL',
            )
        );
	}

	public function down()
	{
        $this->dropTable('student');
        echo "success".PHP_EOL;
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