<?php

class m140605_092357_truncate_table_students extends CDbMigration
{
	public function up()
	{
        $this->truncateTable('student');
        $this->truncateTable('class_mark');
	}

	public function down()
	{
		return true;
	}
}