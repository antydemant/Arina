<?php

class m140520_194927_study_years extends CDbMigration
{
	public function up()
	{
        $this->dropColumn('study_year','title');
        $this->addColumn('study_year','begin','int(4)');
        $this->addColumn('study_year','end','int(4)');
	}

	public function down()
	{
        $this->addColumn('study_year','title','varchar(10)');
        $this->dropColumn('study_year','begin');
        $this->dropColumn('study_year','end');
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