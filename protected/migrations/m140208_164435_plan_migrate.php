<?php

class m140208_164435_plan_migrate extends CDbMigration
{
	public function up()
	{
        $this->createTable('study_plan_info', array(
            'id'=>'pk',
            'study_plan_id' => 'integer NOT NULL',
            'semester_number' => 'integer NOT NULL',
            'weeks_count' => 'integer NOT NULL',
        ));

        $this->addColumn('study_plan_semester', 'study_plan_info_id', 'integer NOT NULL');
	}

	public function down()
	{
		echo "m140208_164435_plan_migrate does not support migration down.\n";
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