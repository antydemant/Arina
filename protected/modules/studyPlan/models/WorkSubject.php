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
 * @property string $atestat_name
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
} 