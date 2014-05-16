<?php

class m140516_123635_create_work_plan extends CDbMigration
{
	public function up()
	{
        $this->createTable('wp_plan', array(
                'id'=>'pk',
                'speciality_id'=>'integer',
                'semesters'=>'string',
                'created'=>'integer',
                'updated'=>'integer',
                'graph'=>'text',
                'year'=>'string',
        ));
	}

	public function down()
	{
		$this->dropTable('wp_plan');
		return true;
	}
}