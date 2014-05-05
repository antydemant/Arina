<?php

class m140505_203407_add_field_to_subjects extends CDbMigration
{
	public function up()
	{
        $this->addColumn('subject', 'code', 'string');
        $this->addColumn('subject', 'short_name', 'string');
	}

	public function down()
	{
        $this->dropColumn('subject', 'code');
        $this->dropColumn('subject', 'short_name');
		return true;
	}
}