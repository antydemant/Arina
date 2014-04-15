<?php

class m140208_146057_exemption extends CDbMigration
{
	public function up()
	{
        $this->createTable('exemption', array(
                'id' => 'pk',
                'title' => 'varchar(50)',
            )
        );
        $this->insert(
            'exemption',
            array(
                'title'=>'Сирота',
            )
        );
        $this->insert(
            'exemption',
            array(
                'title'=>'Інвалід',
            )
        );
        $this->createTable('student_has_exemption', array(
            'student_id' => 'int NOT NULL',
            'exemption_id' => 'int NOT NULL',
            'PRIMARY KEY (`student_id`, `exemption_id`)'
        ));
	}

	public function down()
	{
		echo "m140412_101057_exemption does not support migration down.\n";
		return false;
	}
}