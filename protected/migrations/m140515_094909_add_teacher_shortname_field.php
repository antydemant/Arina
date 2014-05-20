<?php

class m140515_094909_add_teacher_shortname_field extends CDbMigration
{
    public function up()
    {
        $this->addColumn('teacher', 'short_name', 'string');
    }

    public function down()
    {
        $this->dropColumn('teacher', 'short_name');
        return true;
    }
}