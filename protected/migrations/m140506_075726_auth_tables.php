<?php

class m140506_075726_auth_tables extends CDbMigration
{
	public function up()
	{
        $query = file_get_contents(Yii::getPathOfAlias('system.web.auth') . '/schema-mysql.sql');
        $queries = explode(';', $query);
        echo count($queries);

        foreach ($queries as $item) {
            try {
                $this->execute($item . "");
            } catch (Exception $e) {
                echo "Yoku wakaranai eraa";
            }
        }
	}

	public function down()
	{
        $this->execute("drop table if exists `AuthAssignment`;");
        $this->execute("drop table if exists `AuthItemChild`;");
        $this->execute("drop table if exists `AuthItem`;");
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