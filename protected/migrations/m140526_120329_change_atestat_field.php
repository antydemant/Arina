<?php

class m140526_120329_change_atestat_field extends CDbMigration
{
    public function up()
    {
        $this->renameColumn('wp_subject', 'atestat_name', 'certificate_name');
    }

    public function down()
    {
        $this->renameColumn('wp_subject', 'certificate_name', 'atestat_name');
        return true;
    }
}