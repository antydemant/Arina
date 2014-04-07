<?php

class m140125_114716_rename extends CDbMigration
{
    public function up()
    {
        $this->renameColumn("teacher", "firstname", "first_name");
        $this->renameColumn("teacher", "lastname", "last_name");
        $this->renameColumn("teacher", "middlename", "middle_name");
        $this->renameColumn("student", "firstname", "first_name");
        $this->renameColumn("student", "lastname", "last_name");
        $this->renameColumn("student", "middlename", "middle_name");
    }

    public function down()
    {
        echo "m140125_114716_rename does not support migration down.\n";
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