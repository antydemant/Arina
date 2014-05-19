<?php

class m140516_123613_create_study_subject extends CDbMigration
{
	public function up()
	{
        $this->createTable('sp_subject', array(
                'id'=>'pk',
                'plan_id'=>'integer',
                'subject_id'=>'integer',
                'total'=>'integer',
                'lectures'=>'integer',
                'labs'=>'integer',
                'practs'=>'integer',
                'weeks'=>'string',
                'control'=>'string'
        ));
	}

	public function down()
	{
		$this->dropTable('sp_subject');
		return true;
	}
}