<?php

class m140115_103800_create_table_absence extends CDbMigration
{
	public function up()
    {
        $this->createTable(
            'absence',
            array(
                'id' => 'pk',
                'student_id' => 'integer NOT NULL',
                'load_id' => 'integer NOT NULL',
                'date' => 'date NOT NULL',
                'value' => 'integer(4) NOT NULL',
            )
        );
    }

    public function down()
    {
        $this->dropTable('absence');
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