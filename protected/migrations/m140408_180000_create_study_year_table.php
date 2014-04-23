<?php

class m140408_180000_create_study_year_table extends CDbMigration
{
    public function up()
    {
        if (Yii::app()->getDb()->schema->getTable('study_year') !== null) {
            $this->dropTable('study_year');
        }
        $this->createTable('study_year', array(
            'id' => 'pk',
            'title' => 'varchar(10) NOT NULL',
        ));
    }

    public function down()
    {
        $this->dropTable('study_year');
        return true;
    }

}