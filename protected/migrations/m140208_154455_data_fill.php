<?php

class m140208_154455_data_fill extends CDbMigration
{
	public function up()
	{
		//Stuff
		$this->insert("teacher", array(
			'last_name' => 'Соломко',
			'first_name' => 'Людмила',
			'middle_name' => 'Андріївна',
			'cyclic_commission_id' => '1',
		));
		
		$this->insert("cyclic_commission", array(
				'title' => 'ЦК Розробки Програмного Забезпечення',
				'head_id' => '1',
		));
		
		$this->insert("teacher", array(
				'last_name' => 'Щуцький',
				'first_name' => 'Сергій',
				'middle_name' => "В'ячеславович",
				'cyclic_commission_id' => '1',
		));
		
		$this->insert("teacher", array(
				'last_name' => 'Гуменна',
				'first_name' => 'Валентина',
				'middle_name' => "Вікторівна",
				'cyclic_commission_id' => '1',
		));
		
		$this->insert("teacher", array(
				'last_name' => 'Кондратюк',
				'first_name' => 'Євген',
				'middle_name' => 'Сергійович',
				'cyclic_commission_id' => '1',
		));
		
		$this->insert("teacher", array(
				'last_name' => 'Задніпровський',
				'first_name' => 'Вадим',
				'middle_name' => 'Григорович',
				'cyclic_commission_id' => '1',
		));
		
		$this->insert("teacher", array(
				'last_name' => 'Григоровський',
				'first_name' => 'Євген',
				'middle_name' => 'Сергійович',
				'cyclic_commission_id' => '1',
		));
		
		$this->insert("teacher", array(
				'last_name' => 'Федосюк',
				'first_name' => 'Генадій',
				'middle_name' => 'Васильович',
				'cyclic_commission_id' => '1',
		));
		
		$this->renameColumn("student", "number", "code");
		
		$this->insert("group", array(
				'title' => 'ПР-102',
				'speciality_id' => '1',
				'curator_id' => '2',
				'monitor_id' => '1',
		));
		
		$this->insert("speciality", array(
				'title' => 'Розробка програмного забезпечення',
				'department_id' => '1',
				'number' => '11111111111111',
				'accreditation_date' => '01.01.1900',
		));
		
		$this->insert("department", array(
				'title' => 'Програмування',
				'head_id' => '3',
		));
		
		$this->insert("student", array(
				'code' => '111111111112',
				'last_name' => 'Сівець',
				'first_name' => 'Ольга',
				'middle_name' => 'Олегівна',
				'group_id' => '1',
		));
		
		$this->insert("student", array(
				'code' => '111111111111',
				'last_name' => 'Карпович',
				'first_name' => 'Дмитро',
				'middle_name' => 'Васильович',
				'group_id' => '1',
		));
		
		$this->insert("student", array(
				'code' => '111111111113',
				'last_name' => 'Вінічук',
				'first_name' => 'Сергій',
				'middle_name' => 'Вікторович',
				'group_id' => '1',
		));
		
		$this->insert("student", array(
				'code' => '111111111114',
				'last_name' => 'Назаров',
				'first_name' => 'Кирило',
				'middle_name' => 'Володимирович',
				'group_id' => '1',
		));
	}

	public function down()
	{
		echo "m140208_154455_data_fill does not support migration down.\n";
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