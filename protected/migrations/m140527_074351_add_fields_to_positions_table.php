<?php

class m140527_074351_add_fields_to_positions_table extends CDbMigration
{
	public function up()
	{
        $this->addColumn('position', 'max_load_hour_1', 'int');
        $this->addColumn('position', 'max_load_hour_2', 'int');
	}

	public function down()
	{
		$this->dropColumn('position', 'max_load_hour_1');
		$this->dropColumn('position', 'max_load_hour_2');
		return true;
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}