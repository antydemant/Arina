<?php

class m140220_063853_table_subject_cycle extends CDbMigration
{
    public function up()
    {
        $this->createTable(
            'subject_cycle',
            array(
                'id' => 'pk',
                'title' => 'string NOT NULL',
            )
        );
    }

    public function down()
    {
        $this->dropTable('subject_cycle');
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