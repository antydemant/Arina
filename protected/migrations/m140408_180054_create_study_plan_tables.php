<?php

class m140408_180054_create_study_plan_tables extends CDbMigration
{
    public function up()
    {
        $this->createTable('sp_plan', array(
            'id' => 'pk',
            'year_id' => 'int NOT NULL',
            'speciality_id' => 'int NOT NULL',
        ));

        $this->createTable('sp_graphic', array(
            'id' => 'pk',
            'plan_id' => 'int NOT NULL',
            'course' => 'int NOT NULL',
            'week' => 'int NOT NULL',
            'status' => 'int NOT NULL',
        ));

        $this->createTable('sp_subject', array(
            'id' => 'pk',
            'plan_id' => 'int NOT NULL',
            'subject_id' => 'int NOT NULL',
        ));

        $this->addForeignKey('graphicOnPlan', 'sp_graphic', 'plan_id', 'sp_plan', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('subjectOnPlan', 'sp_subject', 'plan_id', 'sp_plan', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('graphicOnPlan', 'sp_graphic');
        $this->dropForeignKey('subjectOnPlan', 'sp_subject');

        $this->dropTable('sp_subject');
        $this->dropTable('sp_graphic');
        $this->dropTable('sp_plan');
        return true;
    }
}