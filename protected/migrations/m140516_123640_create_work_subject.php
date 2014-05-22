<?php

class m140516_123640_create_work_subject extends CDbMigration
{
    public function up()
    {
        $this->createTable(
            'wp_subject',
            array(
                'id' => 'pk',
                'plan_id' => 'integer',
                'subject_id' => 'integer',
                'total' => 'string',
                'lectures' => 'string',
                'labs' => 'string',
                'practs' => 'string',
                'weeks' => 'string',
                'control' => 'string',
                'cyclic_commission_id' => 'integer',
                'atestat_name' => 'string',
                'diploma_name' => 'string',
                'control_hours' => 'string',
            )
        );
    }

    public function down()
    {
        $this->dropTable('wp_subject');
        return true;
    }
}