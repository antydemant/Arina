<?php

class m140609_171018_file_share_service extends CDbMigration
{
	public function up()
	{
        $this->createTable('file_share', array(
            'id' => 'pk',
            'file_name' => 'string',
            'master_user' => 'string',
            'file_index' => 'integer DEFAULT 0',
        ));
	}

	public function down()
	{
        $this->dropTable('file_share');
	}

}