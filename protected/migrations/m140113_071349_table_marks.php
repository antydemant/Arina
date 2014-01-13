<?php

class m140113_071349_table_marks extends CDbMigration
{
    public function up()
    {
        $this->createTable(
            'mark',
            array(
                'id' => 'pk',
                'student_id' => 'integer NOT NULL',
                'load_id' => 'integer NOT NULL',
                'date' => 'date NOT NULL',
                'value' => 'integer(4) NOT NULL',
            )
        );
    }

    public function down()
    {
        $this->dropTable('mark');
        echo "success." . PHP_EOL;
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