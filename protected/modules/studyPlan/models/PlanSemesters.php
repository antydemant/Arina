<?php

/**
 * Class PlanSemesters
 * @author Serhiy Vinichuk <serhiyvinichuk@gmail.com>
 */
class PlanSemesters extends CFormModel
{
    /**
     * @var $planId integer
     */
    public $planId;
    public $plan;
    /**
     * @var $subjectProvider CActiveDataProvider
     */
    public $subjectProvider;
    //Semester properties
    public $semester_number;
    public $weeks_count;
    //Hours properties
    public $subjectId;
    public $semesterId;
    public $lectures;
    public $labs;
    public $practs;
    public $selfwork;
    public $hours_per_week;
    public $test;
    public $exam;
    public $course_work;
    public $course_project;

    /**
     * @param $id
     */
    public function prepare($id)
    {
        $this->planId = $id;
        $this->plan = Plan::model()->findByPk($this->planId);
        $model = new PlanSubjects();
        $model->prepare($id);
        $this->subjectProvider = $model->getAddedSubjectsProvider();
    }

    public function makeChanges()
    {
        if (isset($this->semester_number) && isset($this->weeks_count)) {
            $model = new Semester();
            $model->study_plan_id = $this->planId;
            $model->semester_number = $this->semester_number;
            $model->weeks_count = $this->weeks_count;
            $model->save(false);
        }

        if (isset($this->subjectId) && isset($this->semesterId)) {
            $model = new Hours();
            $model->study_plan_subject_id = $this->subjectId;
            $model->study_plan_info_id = $this->semesterId;
            $model->lectures = $this->lectures;
            $model->labs = $this->labs;
            $model->practs = $this->practs;
            $model->selfwork = $this->selfwork;
            $model->hours_per_week = $this->hours_per_week;
            $model->test = $this->test;
            $model->exam = $this->exam;
            $model->course_project = $this->course_project;
            $model->course_work = $this->course_work;
            $model->save(false);
        }
    }


    public function rules()
    {
        return array(
            array('test, exam, course_work, course_project', 'boolean'),
            array('semester_number, weeks_count, lectures, labs, practs, selfwork, hours_per_week', 'numerical', 'integerOnly' => true),
        );
    }

    public function attributeLabels()
    {
        return array(
            'subjectId' => 'Предмет',
            'lectures' => 'Лекції',
            'labs' => 'Лабораторні',
            'practs' => 'Практичні',
            'selfwork' => 'Самостійна робота студентів',
            'hours_per_week' => 'Годин на тиждень',
            'test' => 'Залік',
            'exam' => 'Екзамен',
            'course_work' => 'Курсова робота',
            'course_project' => 'Курсовий проект',
        );
    }

}