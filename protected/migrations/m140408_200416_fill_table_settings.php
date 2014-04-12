<?php

class m140408_200416_fill_table_settings extends CDbMigration
{
	public function up()
	{
        $this->insert('settings',array('key'=>'name','title'=>'Назва','value'=>'Хмельницький політехнічний коледж'));
        $this->insert('settings',array('key'=>'short_name','title'=>'Скорочена назва','value'=>'ХПК'));
	}

	public function down()
	{
        $this->truncateTable('settings');
		return true;
	}
}