<?php

class m140609_083316_add_hours_to_load extends CDbMigration
{
    public function up()
    {
        $this->addColumn('load', 'consult', 'string');
        $this->addColumn('load', 'students', 'string');
        $this->addColumn('load', 'hours', 'string');
    }

    public function down()
    {
        $this->dropColumn('load', 'consult');
        $this->dropColumn('load', 'students');
        $this->dropColumn('load', 'hours');
        return true;
    }

}