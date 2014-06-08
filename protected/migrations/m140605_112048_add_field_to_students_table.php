<?php

class m140605_112048_add_field_to_students_table extends CDbMigration
{
	public function up()
	{
        $this->addColumn('student', 'sseed_id', 'int'); //single state electronic education database ID (ЄДЕБО ID)
        $this->addColumn('student', 'document', 'string'); //Серія, номер паспорту, інший документ про освіту
        $this->addColumn('student', 'identification_code', 'string'); //Ідентифікаційний код
	}

	public function down()
	{
        $this->dropColumn('student', 'sseed_id');
        $this->dropColumn('student', 'document');
        $this->dropColumn('student', 'identification_code');
		return true;
	}
}