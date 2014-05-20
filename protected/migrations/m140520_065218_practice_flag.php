<?php

class m140520_065218_practice_flag extends CDbMigration
{
	public function up()
	{
        $this->addColumn('subject', 'practice', 'bool');
	}

	public function down()
	{
        $this->dropColumn('subject','practice');
		return true;
	}
}