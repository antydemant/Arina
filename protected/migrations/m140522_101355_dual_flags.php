<?php

class m140522_101355_dual_flags extends CDbMigration
{
	public function up()
	{
        $this->dropColumn('sp_subject','dual');
        $this->addColumn('sp_subject','dual_practice', 'bool');
        $this->addColumn('sp_subject','dual_labs', 'bool');
	}

	public function down()
	{
        $this->addColumn('sp_subject','dual', 'bool');
        $this->dropColumn('sp_subject','dual_practice');
        $this->dropColumn('sp_subject','dual_labs');
		return true;
	}
}