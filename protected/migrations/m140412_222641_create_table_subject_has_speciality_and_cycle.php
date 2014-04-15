<?php

class m140412_222641_create_table_subject_has_speciality_and_cycle extends CDbMigration
{
    public function up()
    {
        $this->createTable('subject_has_speciality_and_cycle', array(
            'subject_id' => 'int NOT NULL',
            'speciality_id' => 'int NOT NULL',
            'cycle_id' => 'int NOT NULL',
            'PRIMARY KEY (`subject_id`, `speciality_id`,`cycle_id`)',
        ));
        $this->dropColumn('subject', 'cycle_id');
    }

    public function down()
    {
        $this->dropTable('subject_has_speciality_and_cycle');
        $this->addColumn('subject', 'cycle_id', 'integer');
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