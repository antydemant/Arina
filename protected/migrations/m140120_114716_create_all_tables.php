<?php

class m140120_114716_create_all_tables extends CDbMigration
{
    public function up()
    {
        $query = file_get_contents(Yii::getPathOfAlias('application.data') . '/schema.mysql.sql');
        $queries = explode(';', $query);
        echo count($queries);

        foreach ($queries as $item) {
            try {
                $this->execute($item . "");
            } catch (Exception $e) {
                echo "Some error";
            }
        }

        $query = file_get_contents(Yii::getPathOfAlias('application.data') . '/data.mysql.sql');
        $queries = explode(';', $query);
        echo count($queries);

        foreach ($queries as $item) {
            try {
                $this->execute($item . "");
            } catch (Exception $e) {
                echo "Some error";
            }
        }
    }

    public function down()
    {
        $this->execute("DROP TABLE `actual_class`, `audience`, `class_absence`, `class_mark`, `cyclic_commission`, `department`, `exemption`, `group`, `schedule`, `settings`, `speciality`, `student`, `student_has_exemption`, `study_year`, `subject`, `subject_cycle`, `subject_has_speciality_and_cycle`, `teacher`, `teacher_load`, `user`;");
        return true;
    }
}