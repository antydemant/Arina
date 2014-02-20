<?php

class m140208_163944_student_extend extends CDbMigration
{
    public function up()
    {
        $this->addColumn("student", "phone_number", "varchar(15)");
        $this->addColumn("student", "mobile_number", "varchar(15)");
        $this->addColumn("student", "mother_name", "varchar(60)");
        $this->addColumn("student", "father_name", "varchar(60)");
        $this->addColumn("student", "gender", "varchar(10)");
        $this->addColumn("student", "address", "varchar(200)");
        $this->addColumn("student", "characteristics", "text");
    }

    public function down()
    {
        echo "m140208_163944_student_extend does not support migration down.\n";
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