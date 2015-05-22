<?php

class m150426_081830_add_employee_type_column extends CDbMigration
{
	public function up()
	{
		$this->addColumn('employee','type','INTEGER');
	}

	public function down()
	{
		$this->dropColumn('employee','type');
		return true;
	}
}