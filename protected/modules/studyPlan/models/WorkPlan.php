<?php

/**
 * @author Serhiy Vinichuk <serhiyvinichuk@gmail.com>
 * @copyright ХПК 2014
 *
 * This is the model class for table "wp_plan".
 *
 * The followings are the available columns in table 'wp_plan':
 * @property integer $id
 * @property integer $speciality_id
 * @property array $semesters
 * @property array $graph
 * @property integer $created
 * @property integer $updated
 * @property integer $year_id
 *
 * The followings are the available model relations:
 * @property StudyYear $year
 * @property WorkSubject[] $subjects
 * @property Speciality $speciality
 */
class WorkPlan extends ActiveRecord
{
    /** Допустима різниця між годинами в навчальному та робочому плані */
    const HOURS_DIFF = 5;
    public $plan_origin;
    public $work_origin;

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'wp_plan';
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        return array(
            'subjects' => array(self::HAS_MANY, 'WorkSubject', 'plan_id'),
            'speciality' => array(self::BELONGS_TO, 'Speciality', 'speciality_id'),
            'year' => array(self::BELONGS_TO, 'StudyYear', 'year_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'year_id' => Yii::t('terms', 'Study year'),
            'speciality_id' => Yii::t('terms', 'Speciality'),
            'created' => Yii::t('terms', 'Date of creation'),
            'updated' => Yii::t('terms', 'Date of update'),
            'plan_origin' => 'Навчальний план для основи',
            'work_origin' => 'Робочий план для основи',
        );
    }

    public function rules()
    {
        return array(
            array('speciality_id, year_id', 'required'),
            array(
                'semesters',
                'required',
                'message' => 'Натисніть кнопку "Генерувати" та перевірте правильність даних',
                'on' => 'graph',
            ),
            array('speciality_id', 'numerical', 'integerOnly' => true),
            array('created', 'default', 'value' => date('Y-m-d', time()), 'on' => 'insert'),
            array('id, speciality_id', 'safe', 'on' => 'search'),
            array('plan_origin, work_origin', 'check_origin', 'on'=>'create'),
        );
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->speciality->title . ' - ' . $this->year->title;
    }

    public function check_origin()
    {
        if (!$this->hasErrors()) {
            if (empty($this->plan_origin) && (empty($this->work_origin))) {
                $this->addError('plan_origin, work_origin', 'Вкажіть план основу');
            }
        }
    }

    public function behaviors()
    {
        return array(
            'JSONBehavior' => array(
                'class' => 'application.behaviors.JSONBehavior',
                'fields' => array(
                    'graph'
                ),
            ),
            'StrBehavior' => array(
                'class' => 'application.behaviors.StrBehavior',
                'fields' => array(
                    'semesters',
                ),
            ),
            'CTimestampBehavior' => array(
                'class' => 'zii.behaviors.CTimestampBehavior',
                'createAttribute' => 'created',
                'updateAttribute' => 'updated',
                'setUpdateOnCreate' => true,
            ),
        );
    }

    /**
     * @return array
     */
    public function checkSubjects()
    {
        $warnings = array();
        foreach ($this->subjects as $subject) {
            if (abs(array_sum($subject->total) - $subject->control_hours['total']) > self::HOURS_DIFF) {
                $warnings[] = 'Предмет "' . $subject->subject->title . '" за загальною кількістю годин відрізняється від навчального плану більше ніж на ' . self::HOURS_DIFF . ' годин';
            }
        }
        return implode(CHtml::tag('br'), $warnings);
    }

    protected function afterSave()
    {
        if (!empty($this->work_origin)) {
            $this->copyWorkPlan(WorkPlan::model()->findByPk($this->work_origin));
        } elseif (!empty($this->plan_origin)) {
            $this->copyFromStudyPlan(StudyPlan::model()->findByPk($this->plan_origin));
        }
    }

    /**
     * Копіює предмети з плану-основи
     * @param WorkPlan $origin
     */
    protected function copyWorkPlan($origin)
    {
        foreach ($origin->subjects as $subject) {
            $model = new WorkSubject();
            $model->attributes = $subject->attributes;
            $model->plan_id = $this->id;
            $model->save(false);
        }
    }

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
     * @param StudyPlan $origin
     */
    protected function copyFromStudyPlan(StudyPlan $origin)
    {
        foreach ($origin->subjects as $subject) {
            $model = new WorkSubject();
            $model->plan_id = $this->id;
            $model->subject_id = $subject->subject_id;
            $control_hours = array();
            $control_hours['total'] = $subject->total;
            $control_hours['lectures'] = $subject->lectures;
            $control_hours['labs'] = $subject->labs;
            $control_hours['practs'] = $subject->practs;
            $model->control_hours = $control_hours;
            $model->weeks = $subject->weeks;
            $model->control = $subject->control;
            $model->save();
        }
    }


} 