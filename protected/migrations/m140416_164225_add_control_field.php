<?php

class m140416_164225_add_control_field extends CDbMigration
{
	public function up()
	{
        $this->addColumn('sp_subject', 'control', 'string');
	}

	public function down()
	{
		$this->dropColumn('sp_subject', 'control');
		return true;
	}
}