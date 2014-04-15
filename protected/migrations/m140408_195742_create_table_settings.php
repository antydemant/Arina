<?php

class m140408_195742_create_table_settings extends CDbMigration
{
	public function up()
	{
        if (Yii::app()->getDb()->schema->getTable('settings') !== null) {
            $this->dropTable('settings');
        }
        $this->createTable('settings', array(
            'id'=>'pk',
            'key'=>'string',
            'title'=>'string',
            'value'=>'string',
        ));
	}

	public function down()
	{
        $this->dropTable('settings');
		return true;
	}

}