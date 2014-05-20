<?php

class m140520_113344_add_sp_subject_weeks_amont extends CDbMigration
{
    public function up()
    {
        $this->addColumn('sp_subject', 'practice_weeks', 'integer');
        $this->addColumn('sp_subject', 'diploma_name', 'string');
        $this->addColumn('sp_subject', 'certificate_name', 'string');
    }

    public function down()
    {
        $this->dropColumn('sp_subject', 'practice_weeks');
        $this->dropColumn('sp_subject', 'diploma_name');
        $this->dropColumn('sp_subject', 'certificate_name');
        return true;
    }
}