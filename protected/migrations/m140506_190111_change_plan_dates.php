<?php

class m140506_190111_change_plan_dates extends CDbMigration
{
	public function up()
	{
        $this->alterColumn('sp_plan', 'created', 'int');
        $this->alterColumn('sp_plan', 'updated', 'int');
	}

	public function down()
	{
        $this->alterColumn('sp_plan', 'created', 'datetime');
        $this->alterColumn('sp_plan', 'updated', 'datetime');
		return true;
	}
}