<?php

class m140520_103219_addition_fields_for_speciality extends CDbMigration
{
    public function up()
    {
        $this->addColumn('speciality', 'qualification', 'string');
        $this->addColumn('speciality', 'apprenticeship', 'string');
        $this->addColumn('speciality', 'discipline', 'string');
        $this->addColumn('speciality', 'direction', 'string');
        $this->addColumn('speciality', 'education_form', 'string');
    }

    public function down()
    {
        $this->dropColumn('speciality', 'qualification');
        $this->dropColumn('speciality', 'apprenticeship');
        $this->dropColumn('speciality', 'discipline');
        $this->dropColumn('speciality', 'direction');
        $this->dropColumn('speciality', 'education_form');
        return true;
    }
}