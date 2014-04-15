<?php

class m140208_220810_data_fill extends CDbMigration
{
    public function up()
    {
        /**
         * @var CyclicCommission $commission
         */
        $commission = CyclicCommission::model()->findByAttributes(array('title' => "ЦК Розробки Програмного Забезпечення"));
        $commission_id = $commission->id;
        $teacher = new Teacher();
        $teacher->first_name = "Олександр";
        $teacher->last_name = "Петляк";
        $teacher->middle_name = "Валерійович";
        $teacher->cyclic_commission_id = $commission_id;
        $teacher->save(false);

        $speciality = Speciality::model()->findByAttributes(array('number' => '5.05010301'));
        $group = new Group();
        $group->title = "ПР-101";
        $group->curator_id = $teacher->id;
        $group->speciality_id = $speciality->id;
        $group->save(false);
    }

    public function down()
    {

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