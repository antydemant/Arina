<?php

/**
 * @author Serhiy Vinichuk <serhiyvinichuk@gmail.com>
 * @copyright ХПК 2014
 *
 * This is the model class for table "sp_subject".
 *
 * The followings are the available columns in table 'sp_subject':
 * @property integer $id
 * @property integer $plan_id
 * @property integer $subject_id
 * @property array $total
 * @property array $lectures
 * @property array $labs
 * @property array $practs
 * @property array $weeks
 * @property array $control
 * @property integer $cyclic_commission_id
 * @property string $certificate_name
 * @property string $diploma_name
 * @property array $control_hours
 *
 * The followings are the available model relations:
 * @property WorkPlan $plan
 * @property Subject $subject
 */
class WorkSubject extends ActiveRecord
{
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
     * @return array
     */
    public function rules()
    {
        return array(
            array(
                'subject_id, total, lectures, labs, practs, weeks, control, cyclic_commission_id, certificate_name, diploma_name',
                'safe'
            ),
            array('total, lectures, labs, practs', 'default', 'value' => array('', '', '', '', '', '', '', '')),
        );
    }

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'wp_subject';
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        return array(
            'plan' => array(self::BELONGS_TO, 'WorkPlan', 'plan_id'),
            'subject' => array(self::BELONGS_TO, 'Subject', 'subject_id'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'plan_id' => 'Plan',
            'subject_id' => Yii::t('terms', 'Subject'),
            'total' => 'Загальна кількість',
            'lectures' => 'Лекції',
            'labs' => 'Лабораторні',
            'practs' => 'Практичні',
            'classes' => 'Всього аудиторних',
            'selfwork' => 'Самостійна робота',
            'testSemesters' => 'Залік',
            'examSemesters' => 'Екзамен',
            'workSemesters' => 'Курсова робота',
            'projectSemesters' => 'Курсовий проект',
            'weeks' => 'Годин на тиждень',
            'cyclic_commission_id' => 'Циклова комісія',
            'certificate_name' => 'Назва в атестат',
            'diploma_name' => 'Назва в диплом',
        );
    }

    /**
     * @return array
     */
    public function behaviors()
    {
        return CMap::mergeArray(
            parent::behaviors(),
            array(
                'StrBehavior' => array(
                    'class' => 'application.behaviors.StrBehavior',
                    'fields' => array(
                        'total',
                        'lectures',
                        'labs',
                        'practs',
                        'weeks',
                    )
                ),
                'JSONBehavior' => array(
                    'class' => 'application.behaviors.JSONBehavior',
                    'fields' => array(
                        'control',
                        'control_hours',
                    )
                ),
            )
        );
    }

    /**
     * @param $semester
     * @return integer
     */
    public function getSelfwork($semester)
    {
        return $this->total[$semester] - $this->getClasses($semester);
    }

    /**
     * @param $semester
     * @return integer
     */
    public function getClasses($semester)
    {
        return $this->weeks[$semester]  * $this->plan->semesters[$semester];
    }

    /**
     * @param $course
     * @return bool
     */
    public function presentIn($course)
    {
        switch ($course) {
            case 1:
                $fall = 0;
                $spring = 1;
                break;
            case 2:
                $fall = 2;
                $spring = 3;
                break;
            case 3:
                $fall = 4;
                $spring = 5;
                break;
            case 4:
                $fall = 6;
                $spring = 7;
                break;
            default:
                $fall = 0;
                $spring = 1;
        }
        return !empty($this->total[$fall]) ||
        !empty($this->weeks[$fall]) ||
        !empty($this->total[$spring]) ||
        !empty($this->weeks[$spring]);
    }
} 