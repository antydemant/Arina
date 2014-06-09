<?php

/**
 * @author Serhiy Vinichuk <serhiyvinichuk@gmail.com>
 * @copyright ХПК 2014
 *
 * This is the model class for table "load".
 *
 * The followings are the available columns in table 'load':
 * @property integer $id
 * @property integer $study_year_id
 * @property integer $teacher_id
 * @property integer $group_id
 * @property integer $wp_subject_id
 * @property string $projects_hours
 * @property integer $type
 * @property integer $course
 * @property array $consult
 * @property array $students
 * @property array $hours
 *
 * @property StudyYear $studyYear
 * @property Group $group
 * @property Teacher $teacher
 * @property WorkSubject $planSubject
 */
class Load extends ActiveRecord
{
    const TYPE_LECTURES = 1;
    const TYPE_PRACTS = 2;
    const TYPE_LABS = 3;

    //Курсові роботи проекти
    const HOURS_PROJECT = 0; //Проектування
    const HOURS_CHECK = 1; //Перевірка
    const HOURS_CONTROL = 2; //Захист
    const HOURS_WORKS = 3; //розрах. та контр. роб.
    const HOURS_DKK = 4; //Керівництво практикою, дипломне нормоконтроль, ДКК

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return StudyPlan the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'load';
    }


    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        return array();
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        return array(
            'studyYear' => array(self::BELONGS_TO, 'StudyYear', 'study_year_id'),
            'teacher' => array(self::BELONGS_TO, 'Teacher', 'teacher_id'),
            'group' => array(self::BELONGS_TO, 'Group', 'group_id'),
            'planSubject' => array(self::BELONGS_TO, 'WorkSubject', 'wp_subject_id'),
        );
    }


    /**
     * @return array
     */
    public function behaviors()
    {
        return array(
            'StrBehavior' => array(
                'class' => 'application.behaviors.StrBehavior',
                'fields' => array(
                    'consult',
                    'students',
                    'hours',
                )
            ),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'course' => 'Курс',
        );
    }

    public function search()
    {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * @param int $semester
     * @return float
     */
    public function getConsultation($semester)
    {
        $control = $this->planSubject->control[$semester];
        return floor($this->planSubject->total[$semester] * 0.06) + ($control[WorkSubject::CONTROL_EXAM] || $control[WorkSubject::CONTROL_DPA] ? 2 : 0);
    }

    /**
     * @param int $semester
     * @return bool
     */
    public function hasExam($semester)
    {
        $control = $this->planSubject->control[$semester];
        return $control[WorkSubject::CONTROL_EXAM] || $control[WorkSubject::CONTROL_DPA];
    }

    /**
     * @param int $semester
     * @return float
     */
    public function getExam($semester)
    {
        if (!$this->hasExam($semester))
            return 0;
        $control = $this->planSubject->control[$semester];
        $k = $control[WorkSubject::CONTROL_EXAM] ? 0.33 : 0.5;
        return floor($this->group->getStudentsCount() * $k);
    }

    /**
     * @param int $semester
     * @return bool
     */
    public function hasTest($semester)
    {
        $control = $this->planSubject->control[$semester];
        return $control[WorkSubject::CONTROL_TEST];
    }

    /**
     * @param int $semester
     * @return int
     */
    public function getTest($semester)
    {
        if ($this->hasTest($semester))
            return 2;
        else return 0;
    }

    /**
     * @return int
     */
    public function getStudentsCount()
    {
        if (isset($this->students[0]))
            return $this->students[0];
        else return $this->group->getStudentsCount();
    }

    /**
     * @return int
     */
    public function getBudgetStudentsCount()
    {
        if (isset($this->students[1]))
            return $this->students[1];
        else return $this->group->getBudgetStudentsCount();
    }

    /**
     * @return float
     */
    public function getBudgetPercent()
    {
        return floor(($this->getBudgetStudentsCount() / $this->getStudentsCount()) * 100);
    }

    /**
     * @return float
     */
    public function getContractPercent()
    {
        return floor(($this->getContractStudentsCount() / $this->getStudentsCount()) * 100);
    }


    /**
     * @return int
     */
    public function getContractStudentsCount()
    {
        if (isset($this->students[2]))
            return $this->students[2];
        else return $this->group->getContractStudentsCount();
    }


}
