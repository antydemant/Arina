<?php

class m140416_170115_sp_plan_add_updated_field extends CDbMigration
{
	public function up()
	{
        $this->addColumn('sp_plan', 'updated', 'datetime');
	}

	public function down()
	{
        $this->dropColumn('sp_plan', 'updated');
        return true;
	}
}