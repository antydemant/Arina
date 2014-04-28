<?php

//use Yii;
use yii\db\Schema;

class m140428_221900_base extends \yii\db\Migration
{
    public function up()
    {
        $query = file_get_contents(Yii::getAlias('@app/data') . '/schema.mysql.sql');
        $queries = explode('; ', $query);
        echo count($queries);

        foreach ($queries as $item) {
            try {
                $this->execute($item . "");
            } catch (Exception $e) {
                echo "Error";
            }
        }

        $query = file_get_contents(Yii::getAlias('@app/data') . '/data.mysql.sql');
        $queries = explode('; ', $query);
        echo count($queries);

        foreach ($queries as $item) {
            try {
                $this->execute($item . "");
            } catch (Exception $e) {
                echo "Error";
            }
        }
    }

    public function down()
    {
        $this->execute("DROP TABLE `actual_class`, `audience`, `class_absence`, `class_mark`, `cyclic_commission`, `department`, `exemption`, `group`, `schedule`, `settings`, `speciality`, `sp_graphic`, `sp_hours`, `sp_plan`, `sp_semester`, `sp_subject`, `student`, `student_has_exemption`, `study_year`, `subject`, `subject_cycle`, `subject_has_speciality_and_cycle`, `teacher`, `teacher_load`, `user`;");
        return true;
    }
}
