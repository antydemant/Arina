<?php

class m140610_172316_drop_teacher_table extends CDbMigration
{
	public function up()
	{
        $this->dropTable('teacher');
	}

	public function down()
	{
		$this->createTable('teacher', array(
            'id' => 'pk',
            'last_name' => 'string',
            'first_name' => 'string',
            'middle_name' => 'string',
            'cyclic_commission_id' => 'id',
            'short_name' => 'string',
        ));
		return true;
	}
}