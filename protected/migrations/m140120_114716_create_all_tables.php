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
    }

    public function down()
    {
        $this->dropTable('*');
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