<?php

class m140219_201227_classes extends CDbMigration
{
    public function up()
    {
        $this->insert(
            'class_mark',
            array(
                'actual_class_id' => '1',
                'mark' => '5',
                'student_id' => '1'
            )
        );
        $this->insert(
            'class_mark',
            array(
                'actual_class_id' => '1',
                'mark' => '5',
                'student_id' => '2'
            )
        );
        $this->insert(
            'class_mark',
            array(
                'actual_class_id' => '1',
                'mark' => '5',
                'student_id' => '3'
            )
        );
        $this->insert(
            'class_mark',
            array(
                'actual_class_id' => '2',
                'mark' => '5',
                'student_id' => '3'
            )
        );
        $this->insert(
            'class_mark',
            array(
                'actual_class_id' => '2',
                'mark' => '5',
                'student_id' => '4'
            )
        );
        $this->insert(
            'actual_class',
            array(
                'date' => '2014-02-14',
                'teacher_load_id' => '1',
            )
        );
        $this->insert(
            'actual_class',
            array(
                'date' => '2014-02-19',
                'teacher_load_id' => '1',
            )
        );
        $this->insert(
            'teacher_load',
            array(
                'study_plan_semester_id' => '1',
                'teacher_id' => '1',
                'group_id' => '1'
            )
        );

        $this->insert(
            'sp_plan',
            array(
                'speciality_id' => '1',
                'study_year' => '2013/2014',
            )
        );
        $this->insert(
            'sp_subject',
            array(
                'subject_id' => '1',
                'sp_plan_id' => '1',
            )
        );
        $this->insert('sp_semester',
            array(
                'sp_plan_id' => '1',
                'semester_number' => '1',
                'weeks_count' => '17'
            ));
        $this->insert(
            'sp_hours',
            array(
                'sp_subject_id' => '1',
                'sp_semester_id' => '1',
            )
        );
    }

    public function down()
    {
        echo "m140219_201227_classes does not support migration down.\n";
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