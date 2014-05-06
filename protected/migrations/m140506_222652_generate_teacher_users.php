<?php

class m140506_222652_generate_teacher_users extends CDbMigration
{
	public function up()
	{
        $teachers = Teacher::model()->findAll();
        foreach ($teachers as $teacher) {
            $this->insert('user', array('username' => 'teacher'.$teacher->id, 'role' => 1,
                'identity_id' => $teacher->id, 'identity_type' => 1, 'password' => 'c4ca4238a0b923820dcc509a6f75849b'));
        }
	}

	public function down()
	{
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