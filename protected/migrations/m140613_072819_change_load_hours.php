<?php

class m140613_072819_change_load_hours extends CDbMigration
{
    public function up()
    {
        $this->dropColumn('load', 'hours');
        $this->dropColumn('load', 'projects_hours');
        $this->addColumn('load', 'fall_hours', 'string');
        $this->addColumn('load', 'spring_hours', 'string');
    }

    public function down()
    {
        $this->dropColumn('load', 'fall_hours');
        $this->dropColumn('load', 'spring_hours');
        $this->addColumn('load', 'hours', 'string');
        $this->addColumn('load', 'projects_hours', 'string');
        return true;
    }

}