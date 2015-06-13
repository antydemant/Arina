<?php

class m140610_192202_default_settings extends CDbMigration
{
    public function up()
    {
        $this->insert('settings', array(
            'key' => 'consultation_percents',
            'value' => '2',
            'title' => 'Відсоток консультацій (%)',
        ));
        $this->insert('settings', array(
            'key' => 'coursework_check',
            'value' => '4',
            'title' => 'Перевірка курсових робіт',
        ));
        $this->insert('settings', array(
            'key' => 'coursework_design',
            'value' => '4',
            'title' => 'Проектування курсових робіт',
        ));
        $this->insert('settings', array(
            'key' => 'diploma_check',
            'value' => '4',
            'title' => 'Перевірка дипломних робіт',
        ));
        $this->insert('settings', array(
            'key' => 'diploma_design',
            'value' => '4',
            'title' => 'Проектування дипломних робіт',
        ));
    }

    public function down()
    {
        $this->delete('settings', '`key`="consultation_percents"');
        $this->delete('settings', '`key`="coursework_check"');
        $this->delete('settings', '`key`="coursework_design"');
        $this->delete('settings', '`key`="diploma_check"');
        $this->delete('settings', '`key`="diploma_design"');
        return true;
    }
}