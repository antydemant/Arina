<?php

class m140221_165722_change_plan extends CDbMigration
{
    public function up()
    {
        $this->renameTable('study_plan', 'sp_plan');
        $this->renameTable('study_plan_info', 'sp_semester');
        $this->renameTable('study_plan_semester', 'sp_hours');
        $this->renameTable('study_plan_subject', 'sp_subject');

        $this->renameColumn('sp_semester', 'study_plan_id', 'sp_plan_id');
        $this->renameColumn('sp_subject', 'study_plan_id', 'sp_plan_id');
        $this->renameColumn('sp_hours', 'study_plan_subject_id', 'sp_subject_id');
        $this->renameColumn('sp_hours', 'study_plan_info_id', 'sp_semester_id');
    }

    public function down()
    {
        $this->renameColumn('sp_semester', 'sp_plan_id', 'study_plan_id');
        $this->renameColumn('sp_subject', 'sp_plan_id', 'study_plan_id');
        $this->renameColumn('sp_hours', 'sp_subject_id', 'study_plan_subject_id');
        $this->renameColumn('sp_hours', 'sp_semester_id', 'study_plan_info_id');

        $this->renameTable('sp_plan', 'study_plan');
        $this->renameTable('sp_semester', 'study_plan_info');
        $this->renameTable('sp_hours', 'study_plan_semester');
        $this->renameTable('sp_subject', 'study_plan_subject');
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