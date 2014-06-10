<?php

class m140608_142342_fill_positions_table extends CDbMigration
{
	public function up()
	{
        $this->insert('position', array(
            'id' => '1',
            'title' => 'Викладач',
            'max_load_hour_1' => '720',
            'max_load_hour_2' => '360',
        ));
        $this->insert('position', array(
            'id' => '2',
            'title' => 'Завідуючий відділенням',
            'max_load_hour_1' => '720',
            'max_load_hour_2' => '360',
        ));
        $this->insert('position', array(
            'id' => '3',
            'title' => 'Директор',
            'max_load_hour_1' => '720',
            'max_load_hour_2' => '360',
        ));
	}

	public function down()
	{
        $this->execute('DELETE FROM `position` WHERE (id>=1) and (id<=3)');
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