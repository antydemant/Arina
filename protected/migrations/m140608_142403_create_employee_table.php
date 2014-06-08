<?php

class m140608_142403_create_employee_table extends CDbMigration
{
    public function up()
    {
        $this->createTable('employee', array(
            'id' => 'pk',
            'position_id' => 'int',
            'participates_in_study_process' => 'bool',
            'start_date' => 'date',
            'last_name' => 'string',
            'first_name' => 'string',
            'middle_name' => 'string',
            'short_name' => 'string',
            'gender' => 'bool',
            'cyclic_commission_id' => 'int',
            'birth_date' => 'date',
            'nationality' => 'string',
            'education' => 'int',
            'educations_list' => 'text',
            'postgraduate_training' => 'int',
            'postgraduate_trainings' => 'text',
            'last_job' => 'string',
            'last_job_position' => 'string',
            'has_experience' => 'bool',
            'experience_start' => 'date',
            'experience_end' => 'date',
            'dismissal_reason' => 'int',
            'dismissal_date' => 'date',
            'pension_data' => 'string',
            'family_status' => 'string',
            'family_data' => 'text',
            'place_of_residence' => 'string',
            'place_of_registration' => 'string',
            'passport' => 'string',
            'passport_issued_by' => 'string',
            'military_accounting_group' => 'string',
            'military_accounting_category' => 'string',
            'military_composition' => 'string',
            'military_rank' => 'string',
            'military_accounting_speciality_number' => 'string',
            'military_suitability' => 'bool',
            'military_district_office_registration_name' => 'string',
            'military_district_office_residence_name' => 'string',
            'professional_education' => 'text',
            'appointments_and_transfers' => 'text',
            'vacations' => 'text',
        ));

        $this->addForeignKey('employee_position', 'employee', 'position_id', 'position', 'id');
    }

    public function down()
    {
        $this->dropForeignKey('employee_position', 'employee');
        $this->dropTable('employee');
        return true;
    }
}