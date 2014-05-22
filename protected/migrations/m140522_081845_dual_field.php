<?php

class m140522_081845_dual_field extends CDbMigration
{
	public function up()
	{
        $this->addColumn('sp_subject','dual','bool');
	}

	public function down()
	{
        $this->dropColumn('sp_subject','dual');
		return true;
	}
}