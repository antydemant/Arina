<?php

class m140516_123606_create_study_plan extends CDbMigration
{
	public function up()
	{
        $this->createTable('sp_plan', array(
                'id'=>'pk',
                'speciality_id'=>'integer',
                'semesters'=>'string',
                'created'=>'integer',
                'updated'=>'integer',
                'graph'=>'text'
        ));
	}

	public function down()
	{
		$this->dropTable('sp_plan');
		return true;
	}
}