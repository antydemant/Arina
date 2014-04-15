<?php

class m140223_124639_student_rework extends CDbMigration
{
	public function up()
	{

		$this->renameColumn('student', 'address', 'official_address');
		$this->addColumn('student', 'factual_address', 'varchar(100)');
		$this->addColumn('student', 'birth_date', 'date');
		$this->addColumn('student', 'admission_date', 'date');
		$this->addColumn('student', 'tuition_payment', 'varchar(50)');
		$this->addColumn('student', 'admission_order_number', 'int(10)');
		$this->addColumn('student', 'admission_semester', 'int');
		$this->addColumn('student', 'entry_exams', 'varchar(100)');
		$this->addColumn('student', 'education_document', 'varchar(50)');
		$this->addColumn('student', 'contract', 'varchar(50)');
		$this->addColumn('student', 'math_mark', 'int');
		$this->addColumn('student', 'ua_language_mark', 'int');
		$this->addColumn('student', 'mother_workplace', 'varchar(50)');
		$this->addColumn('student', 'mother_position', 'varchar(50)');
		$this->addColumn('student', 'mother_workphone', 'varchar(20)');
		$this->addColumn('student', 'mother_boss_workphone', 'varchar(20)');
		$this->addColumn('student', 'father_workplace', 'varchar(50)');
		$this->addColumn('student', 'father_position', 'varchar(50)');
		$this->addColumn('student', 'father_workphone', 'varchar(20)');
		$this->addColumn('student', 'father_boss_workphone', 'varchar(20)');
		$this->addColumn('student', 'graduated', 'bit');
		$this->addColumn('student', 'graduation_date', 'date');
		$this->addColumn('student', 'graduation_basis', 'varchar(50)');
		$this->addColumn('student', 'graduation_semester', 'int(1)');
		$this->addColumn('student', 'graduation_order_number', 'int(10)');
		$this->addColumn('student', 'diploma', 'varchar(50)');
		$this->addColumn('student', 'direction', 'varchar(50)');
		$this->addColumn('student', 'misc_data', 'varchar(100)');
		$this->addColumn('student', 'hobby', 'varchar(100)');
	}

	public function down()
	{
		echo "m140223_124639_student_rework does not support migration down.\n";
		return false;
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