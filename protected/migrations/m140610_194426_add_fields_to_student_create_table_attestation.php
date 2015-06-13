<?php

class m140610_194426_add_fields_to_student_create_table_attestation extends CDbMigration
{
	public function up()
	{
        $this->alterColumn('student', 'contract', 'bool');
        $this->addColumn('student', 'form_of_study_notes', 'string');

        $this->dropColumn('employee', 'has_experience');
        $this->dropColumn('employee', 'experience_start');
        $this->dropColumn('employee', 'experience_end');

        $this->addColumn('employee', 'experience_years', 'int');
        $this->addColumn('employee', 'experience_months', 'int');
        $this->addColumn('employee', 'experience_days', 'int');


	}

	public function down()
	{
        $this->dropColumn('employee', 'experience_years');
        $this->dropColumn('employee', 'experience_months');
        $this->dropColumn('employee', 'experience_days');

        $this->addColumn('employee', 'has_experience', 'bool');
        $this->addColumn('employee', 'experience_start', 'date');
        $this->addColumn('employee', 'experience_end', 'date');

        $this->dropColumn('student', 'form_of_study_notes');
        $this->alterColumn('student', 'contract', 'string');
		return true;
	}

}