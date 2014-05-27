<?php

class m140525_191759_create_table_position extends CDbMigration
{
    public function up()
    {
        $this->createTable('position', array(
            'id' => 'pk',
            'title' => 'string NOT NULL',
        ));
    }

    public function down()
    {
        $this->dropTable('position');
        return true;
    }
}