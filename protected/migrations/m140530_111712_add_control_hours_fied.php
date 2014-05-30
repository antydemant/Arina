<?php

class m140530_111712_add_control_hours_fied extends CDbMigration
{
	public function up()
	{
        $this->addColumn('wp_subject', 'control_hours' , 'string');
	}

	public function down()
	{
		$this->dropColumn('wp_subject', 'control_hours');
		return true;
	}
}