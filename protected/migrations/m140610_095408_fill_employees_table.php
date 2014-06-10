<?php

class m140610_095408_fill_employees_table extends CDbMigration
{
    public function up()
    {
        $query = file_get_contents(Yii::getPathOfAlias('application.data') . '/employees_teachers.sql');
        $queries = explode(';', $query);
        echo count($queries);

        foreach ($queries as $item) {
            try {
                $this->execute($item . "");
            } catch (Exception $e) {
                echo "Error with executing query: " . $item;
            }
        }
    }

    public function down()
    {
        $this->truncateTable('employee');
        return true;
    }
}