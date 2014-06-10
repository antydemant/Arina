<?php

class m140610_182215_create_and_fill_all_tables extends CDbMigration
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
                echo "Some error in: '{$item}'";
            }
        }
    }

	public function down()
	{
        $this->execute("DROP TABLE `actual_class`, `audience`, `AuthAssignment`, `AuthItem`, `AuthItemChild`, `class_absence`, `class_mark`, `cyclic_commission`, `department`, `employee`, `exemption`, `group`, `load`, `position`, `schedule`, `settings`, `speciality`, `sp_plan`, `sp_subject`, `student`, `student_has_exemption`, `study_year`, `subject`, `subject_cycle`, `subject_has_speciality_and_cycle`, `user`, `wp_plan`, `wp_subject`;");
        return true;
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