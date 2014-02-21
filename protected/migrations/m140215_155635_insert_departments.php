<?php

class m140215_155635_insert_departments extends CDbMigration
{
    public function up()
    {
        $this->insert(
            'teacher',
            array(
                'id' => '9',
                'last_name' => 'Сівко',
                'first_name' => 'Антон',
                'middle_name' => 'Павлович',
                'cyclic_commission_id' => '1',
            )
        );
        $this->insert(
            'department',
            array(
                'title' => "Комп'ютерні системи",
                'head_id' => '9',
            )
        );

        $this->insert(
            'teacher',
            array(
                'id' => '10',
                'last_name' => 'Валявіна',
                'first_name' => 'Ольга',
                'middle_name' => 'Тимофіївна',
                'cyclic_commission_id' => '1',
            )
        );
        $this->insert(
            'department',
            array(
                'title' => "Економіка та менеджмент",
                'head_id' => '10',
            )
        );
        $this->insert(
            'teacher',
            array(
                'id' => '11',
                'last_name' => 'Докторук',
                'first_name' => 'Валерій',
                'middle_name' => 'Павлович',
                'cyclic_commission_id' => '1',
            )
        );
        $this->insert(
            'department',
            array(
                'title' => "Інженерна механіка",
                'head_id' => '11',
            )
        );
        $this->insert(
            'teacher',
            array(
                'id' => '12',
                'last_name' => 'Данилюк',
                'first_name' => 'Анатолій',
                'middle_name' => 'Миколайович',
                'cyclic_commission_id' => '1',
            )
        );
        $this->insert(
            'department',
            array(
                'title' => "Заочне",
                'head_id' => '12',
            )
        );
    }

    public function down()
    {
        $this->delete(
            'department',
            array(
                'head_id' => '9',
            )
        );
        $this->delete(
            'department',
            array(
                'head_id' => '10',
            )
        );
        $this->delete(
            'department',
            array(
                'head_id' => '11',
            )
        );
        $this->delete(
            'department',
            array(
                'head_id' => '12',
            )
        );
        $this->delete(
            'teacher',
            array(
                'id' => '9',
            )
        );
        $this->delete(
            'teacher',
            array(
                'id' => '10',
            )
        );
        $this->delete(
            'teacher',
            array(
                'id' => '11',
            )
        );
        $this->delete(
            'teacher',
            array(
                'id' => '12',
            )
        );
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