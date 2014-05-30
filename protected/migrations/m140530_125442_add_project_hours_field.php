<?php

class m140530_125442_add_project_hours_field extends CDbMigration
{
	public function up()
	{
        $this->addColumn('wp_subject', 'project_hours', 'string');
	}

	public function down()
	{
		$this->dropColumn('wp_subject', 'project_hours');
		return true;
	}

}