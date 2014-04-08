<?php

class m140408_180000_create_study_year_table extends CDbMigration
{
	public function up()
	{
        $this->createTable('study_year',array(
            'id' => 'pk',
            'year' => 'varchar(10) NOT NULL',
        ));
	}

	public function down()
	{
		$this->dropTable('study_year');
		return true;
	}

}