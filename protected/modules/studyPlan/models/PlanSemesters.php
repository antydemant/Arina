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
    /**
     * @var $plan Plan
     */
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

    public function getSemesters()
    {
        return CHtml::listData(Plan::model()->findByPk($this->planId)->semesters, 'id', 'semester_number');
    }

    public function makeChanges()
    {
        switch ($this->scenario) {
            case 'addSemester':
                $model = new Semester();
                $model->study_plan_id = $this->planId;
                $model->semester_number = $this->semester_number;
                $model->weeks_count = $this->weeks_count;
                $model->save(false);
                break;
            case 'removeSemester':
                $model = Semester::model()->findByPk($this->semesterId);
                $model->delete();
                break;
            case 'addHours':
                //@TODO rewrite this
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
                break;
        }
    }

    public function rules()
    {
        return array(
            array('semester_number, weeks_count', 'required', 'on' => 'addSemester'),
            array('semester_number', 'checkSemester', 'on' => 'addSemester'),

            array('semesterId', 'required', 'on' => 'removeSemester'),

            array('semester_number, weeks_count', 'numerical', 'integerOnly' => true, 'on' => 'addSemester'),
            array('subjectId, semesterId', 'required', 'on' => 'addHours'),
            array('semesterId', 'checkSubject', 'on' => 'addHours'),
            array('semesterId', 'checkHours', 'on' => 'addHours'),
            array('lectures, labs, practs, selfwork, hours_per_week', 'numerical', 'integerOnly' => true),
            array('test, exam, course_work, course_project', 'boolean'),
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
            'semesterId' => 'Семестр',
            'semester_number' => 'Номер семестру',
            'weeks_count' => 'Кількість тижнів',
        );
    }

    public function checkSemester($attribute, $params)
    {
        if (!$this->hasErrors()) {
            /**
             * @var $item Semester
             */
            foreach ($this->plan->semesters as $item) {
                if ($item->semester_number == $this->semester_number)
                    return $this->addError('semester_number', Yii::t('plan', 'Incorrect semester number'));
            }
        }

    }

    public function checkSubject($attribute, $params)
    {
        /**
         * @var SpSubject $model
         * @var Hours $item
         */
        if (!$this->hasErrors()) {
            $hours = Hours::model()->findByAttributes(
                array('study_plan_subject_id' => $this->subjectId,
                    'study_plan_info_id' => $this->semesterId
                ));
            if (isset($hours))
                return $this->addError('semesterId', 'Дані про цей семестр уже внесені');
        }
    }

    public function checkHours($attribute, $params)
    {
        /**
         * @var SpSubject $subject
         */
        if (!$this->hasErrors()) {

            $sum = $this->lectures + $this->labs + $this->practs + $this->selfwork;
            $subject = SpSubject::model()->findByPk($this->subjectId);
            foreach ($subject->hours as $item) {
                $sum += $item->getTotal();
            }
            if ($sum > $subject->total_hours)
                return $this->addError('subjectId', 'Перевищена к-сть годин');
        }
    }

}