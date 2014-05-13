<?php

class m140513_045237_auth_rules extends CDbMigration
{
	public function up()
	{
        $this->execute("drop table if exists `AuthAssignment`;");
        $this->execute("drop table if exists `AuthItemChild`;");
        $this->execute("drop table if exists `AuthItem`;");
        $query = file_get_contents(Yii::getPathOfAlias('system.web.auth') . '/schema-mysql.sql');
        $queries = explode(';', $query);
        echo count($queries);

        foreach ($queries as $item) {
            try {
                $this->execute($item . "");
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }

        $query = file_get_contents(Yii::getPathOfAlias('application.data') . '/authitem.sql');

        try {
            $this->execute($query . "");
        } catch (Exception $e) {
            echo $e->getMessage();
        }

        $query = file_get_contents(Yii::getPathOfAlias('application.data') . '/authitemchild.sql');

        try {
            $this->execute($query . "");
        } catch (Exception $e) {
            echo $e->getMessage();
        }

        $query = file_get_contents(Yii::getPathOfAlias('application.data') . '/authassignment.sql');

            try {
                $this->execute($query . "");
            } catch (Exception $e) {
                echo $e->getMessage();
            }

	}

	public function down()
	{
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