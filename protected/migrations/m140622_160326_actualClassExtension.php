<?php

class m140622_160326_actualClassExtension extends CDbMigration
{
	public function up()
	{
        $this->addColumn('actual_class', 'group_id', 'int(11)');
        $this->addColumn('actual_class', 'teacher_id', 'int(11)');
        $this->addColumn('actual_class', 'subject_id', 'int(11)');
        $this->renameColumn('actual_class','teacher_load_id','load_id');
	}

	public function down()
	{
		$this->dropColumn('actual_class', 'group_id');
        $this->dropColumn('actual_class', 'teacher_id');
        $this->dropColumn('actual_class', 'subject_id');
        $this->renameColumn('actual_class','load_id','teacher_load_id');
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