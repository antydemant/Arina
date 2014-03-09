<?php

class m140222_072054_rename_load_column extends CDbMigration
{
    public function up()
    {
        $this->renameColumn('teacher_load', 'study_plan_semester_id', 'sp_hours_id');
    }

    public function down()
    {
        $this->renameColumn('teacher_load', 'sp_hours_id', 'study_plan_semester_id');
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