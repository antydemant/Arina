<?php

class m150525_080352_add_audiense_id_teacher extends CDbMigration
{
	public function up()
	{
		$this->addColumn('audience','id_teacher','INTEGER');
	}

	public function down()
	{
		$this->dropColumn('audience','id_teacher');
		return true;
	}
}