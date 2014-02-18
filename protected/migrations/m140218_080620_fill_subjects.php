<?php

class m140218_080620_fill_subjects extends CDbMigration
{
    public function up()
    {
        $this->insert(
            'subject',
            array(
                'title' => 'Математика',
                'cycle_id' => '1',
            )
        );
        $this->insert(
            'subject',
            array(
                'title' => 'Фізика',
                'cycle_id' => '1',
            )
        );
        $this->insert(
            'subject',
            array(
                'title' => 'Хімія',
                'cycle_id' => '1',
            )
        );
        $this->insert(
            'subject',
            array(
                'title' => 'Біологія',
                'cycle_id' => '1',
            )
        );
        $this->insert(
            'subject',
            array(
                'title' => 'Об’єктно-орієнтоване програмування',
                'cycle_id' => '1',
            )
        );
        $this->insert(
            'subject',
            array(
                'title' => 'Конструювання програмного забезпечення',
                'cycle_id' => '1',
            )
        );
    }

    public function down()
    {
        echo "m140218_080620_fill_subjects does not support migration down.\n";
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