<?php

class m140208_146057_exemption extends CDbMigration
{
    public function up()
    {
        if (Yii::app()->getDb()->schema->getTable('exemption') !== null) {
            $this->dropTable('exemption');
        }
        $this->createTable('exemption', array(
                'id' => 'pk',
                'title' => 'varchar(50)',
            )
        );
        $this->insert(
            'exemption',
            array(
                'title' => 'Сирота',
            )
        );
        $this->insert(
            'exemption',
            array(
                'title' => 'Інвалід',
            )
        );
        if (Yii::app()->getDb()->schema->getTable('student_has_exemption') !== null) {
            $this->dropTable('student_has_exemption');
        }
        $this->createTable('student_has_exemption', array(
            'student_id' => 'int NOT NULL',
            'exemption_id' => 'int NOT NULL',
            'PRIMARY KEY (`student_id`, `exemption_id`)'
        ));
    }

    public function down()
    {
        echo "m140412_101057_exemption does not support migration down.\n";
        return false;
    }
}