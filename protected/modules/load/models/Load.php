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
 * @property integer $type
 * @property integer $course
 * @property array $consult
 * @property array $students
 * @property array $fall_hours
 * @property array $spring_hours
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
    const HOURS_WORKS = 0; //розрах. та контр. роб.
    const HOURS_DKK = 1; //Керівництво практикою, дипломне нормоконтроль, ДКК
    //Курсові роботи проекти
    const HOURS_PROJECT = 2; //Проектування
    const HOURS_CHECK = 3; //Перевірка
    const HOURS_CONTROL = 4; //Захист
    public $commissionId;

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
        return array(
            array('fall_hours, spring_hours', 'default', 'value' => array('', '', '', '', '')),
            array('consult', 'validateConsultation'),
        );
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
                    'fall_hours',
                    'spring_hours',
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
            'teacher_id' => 'Викладач',
            'commissionId' => 'Циклова комісія',
            'fall_hours[0]' => 'Розрахункові та контрольні роботи',
            'fall_hours[1]' => 'Керівництво практикою, дипломне нормоконтроль, ДКК',
            'spring_hours[0]' => 'Розрахункові та контрольні роботи',
            'spring_hours[1]' => 'Керівництво практикою, дипломне нормоконтроль, ДКК',
            'consult[0]' => 'Консультації',
            'consult[1]' => 'Консультації',
        );
    }

    public function search()
    {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('teacher_id', $this->teacher_id);
        $criteria->compare('planSubject.cyclic_commission_id', $this->commissionId);

        $criteria->with = array('planSubject' => array('together' => true));

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => false,
            'sort' => array('defaultOrder' => 'course ASC'),
        ));
    }

    /**
     * @return float
     */
    public function getBudgetPercent()
    {
        if ($this->getStudentsCount() == 0) {
            return 0;
        }
        return floor(($this->getBudgetStudentsCount() / $this->getStudentsCount()) * 100);
    }

    /**
     * @return int
     */
    public function getStudentsCount()
    {
        if (isset($this->students[0])) {
            return $this->students[0];
        } else {
            return $this->group->getStudentsCount();
        }
    }

    /**
     * @return int
     */
    public function getBudgetStudentsCount()
    {
        if (isset($this->students[1])) {
            return $this->students[1];
        } else {
            return $this->group->getBudgetStudentsCount();
        }
    }

    /**
     * @return float
     */
    public function getContractPercent()
    {
        if ($this->getStudentsCount() == 0) {
            return 0;
        }
        return floor(($this->getContractStudentsCount() / $this->getStudentsCount()) * 100);
    }

    /**
     * @return int
     */
    public function getContractStudentsCount()
    {
        if (isset($this->students[2])) {
            return $this->students[2];
        } else {
            return $this->group->getContractStudentsCount();
        }
    }

    /**
     * @param $semester
     * @return string
     */
    public function getLectures($semester)
    {
        if (!$this->type == self::TYPE_LECTURES) {
            return '';
        }
        return $this->planSubject->lectures[$semester];
    }

    /**
     * @param $semester
     * @return string
     */
    public function getLabs($semester)
    {
        if (!$this->type == self::TYPE_LABS) {
            return '';
        }
        return $this->planSubject->labs[$semester];
    }

    /**
     * @param int $semester
     * @return string
     */
    public function getPracts($semester)
    {
        if (!$this->type == self::TYPE_PRACTS) {
            return '';
        }
        return $this->planSubject->practs[$semester];
    }

    /**
     * @param int $semester
     * @return string
     */
    public function getControlWorks($semester)
    {
        if ($semester & 1) {
            return isset($this->fall_hours[self::HOURS_WORKS]) ? $this->fall_hours[self::HOURS_WORKS] : '';
        } else {
            return isset($this->spring_hours[self::HOURS_WORKS]) ? $this->spring_hours[self::HOURS_WORKS] : '';
        }
    }

    /**
     * @param $semester
     * @return string
     */
    public function getDkk($semester)
    {
        if ($semester & 1) {
            return isset($this->fall_hours[self::HOURS_DKK]) ? $this->fall_hours[self::HOURS_DKK] : '';
        } else {
            return isset($this->spring_hours[self::HOURS_DKK]) ? $this->spring_hours[self::HOURS_DKK] : '';
        }
    }

    /**
     * @param int $semester
     * @return string
     */
    public function getTotal($semester)
    {
        $total = $this->planSubject->total[$semester];
        return !empty($total) ? $total : '';
    }

    /**
     * @param int $semester
     * @return string
     */
    public function getSelfwork($semester)
    {
        $selfwork = $this->planSubject->getSelfwork($semester);
        return !empty($selfwork) ? $selfwork : '';
    }

    /**
     * @param int $semester
     * @return int
     */
    public function getPay($semester)
    {
        return intval($this->getClasses($semester)) + intval($this->getProject($semester)) +
        intval($this->getCheck($semester)) + intval($this->getControl($semester)) +
        intval($this->getConsultation($semester)) +
        intval($this->getExam($semester)) + intval($this->getTest($semester));
    }

    /**
     * @param int $semester
     * @return string
     */
    public function getClasses($semester)
    {
        $classes = $this->planSubject->getClasses($semester);
        return !empty($classes) ? $classes : '';
    }

    /**
     * @param int $semester
     * @return string
     */
    public function getProject($semester)
    {
        if ($semester & 1) {
            $project = $this->fall_hours[self::HOURS_PROJECT];
        } else {
            $project = $this->spring_hours[self::HOURS_PROJECT];
        }
        return !empty($project) ? $project : '';
    }

    /**
     * @param int $semester
     * @return string
     */
    public function getCheck($semester)
    {
        if ($semester & 1) {
            $check = $this->fall_hours[self::HOURS_CHECK];
        } else {
            $check = $this->spring_hours[self::HOURS_CHECK];
        }
        return !empty($check) ? $check : '';
    }

    /**
     * @param int $semester
     * @return string
     */
    public function getControl($semester)
    {
        if ($semester & 1) {
            $control = $this->fall_hours[self::HOURS_CONTROL];
        } else {
            $control = $this->fall_hours[self::HOURS_CONTROL];
        }
        return !empty($control) ? $control : '';
    }

    /**
     * @param int $semester
     * @return float
     */
    public function getConsultation($semester)
    {
        if ($semester & 1) {
            $consult = $this->consult[0];
        } else {
            $consult = $this->consult[1];
        }
        return isset($consult) ? $consult : $this->calcConsultation($semester);
    }

    /**
     * @param int $semester
     * @return float
     */
    public  function calcConsultation($semester)
    {
        $control = $this->planSubject->control[$semester];
        return floor(
            $this->planSubject->total[$semester] * 0.06
        ) + ($control[WorkSubject::CONTROL_EXAM] || $control[WorkSubject::CONTROL_DPA] ? 2 : 0);
    }

    /**
     * @param int $semester
     * @return float
     */
    public function getExam($semester)
    {
        $control = $this->planSubject->control[$semester];
        if (!$control[WorkSubject::CONTROL_EXAM] && !$control[WorkSubject::CONTROL_DPA]) {
            return 0;
        }
        $k = $control[WorkSubject::CONTROL_EXAM] ? 0.33 : 0.5;
        return floor($this->group->getStudentsCount() * $k);
    }

    /**
     * @param int $semester
     * @return int
     */
    public function getTest($semester)
    {
        $control = $this->planSubject->control[$semester];
        if ($control[WorkSubject::CONTROL_TEST]) {
            return 2;
        } else {
            return 0;
        }
    }

    /**
     * @return int
     */
    public function getPlanTotal()
    {
        $spring = $this->course * 2;
        $fall = $spring - 1;
        return $this->planSubject->total[$fall] + $this->planSubject->total[$spring];
    }

    /**
     * @return int
     */
    public function getPlanClasses()
    {
        $spring = $this->course * 2;
        $fall = $spring - 1;
        return $this->planSubject->getClasses($fall) + $this->planSubject->getClasses($spring);
    }

    /**
     * @return int
     */
    public function getPlanSelfwork()
    {
        $spring = $this->course * 2;
        $fall = $spring - 1;
        return $this->planSubject->getSelfwork($fall) + $this->planSubject->getSelfwork($spring);
    }


    public function validateConsultation()
    {
        if (!$this->hasErrors()) {
            $spring = $this->course * 2;
            $fall = $spring - 1;
            if ($this->consult[0] > $this->calcConsultation($fall))
                $this->addError('consult[0]', 'Кількість консультацій перевищує максимальну');
            if ($this->consult[1] > $this->calcConsultation($spring))
                $this->addError('consult[1]', 'Кількість консультацій перевищує максимальну');
        }
    }

}
