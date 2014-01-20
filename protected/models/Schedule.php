<?php

/**
 * This is the model class for table "schedule".
 *
 * The followings are the available columns in table 'schedule':
 * @property integer $id
 * @property integer $week_type
 * @property integer $class_number
 * @property integer $study_plan_semester_id
 * @property integer $audience_id
 * @property integer $group_id
 *
 *
 * @property Group $group
 */
class Schedule extends ActiveRecord
{
    const TARGET_GROUP = 1;
    const TARGET_TEACHER = 2;
    const TARGET_AUDIENCE = 3;

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'schedule';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('week_type, class_number, study_plan_semester_id, audience_id, group_id', 'required'),
            array('week_type, class_number, study_plan_semester_id, audience_id, group_id', 'numerical', 'integerOnly' => true),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            //array('id, week_type, class_number, study_plan_semester_id, audience_id, group_id', 'safe', 'on'=>'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'group' => array(self::HAS_ONE, 'Group', 'group_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'week_type' => 'Week Type',
            'class_number' => 'Class Number',
            'study_plan_semester_id' => 'Study Plan Semester',
            'audience_id' => 'Audience',
            'group_id' => Yii::t('group', 'Group'),
        );
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Schedule the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @return CActiveDataProvider
     */
    public function getAll()
    {
        $criteria = array();
        $provider = $this->getProvider($criteria);
        return $provider;
    }

    /**
     * @param $id
     * @return CActiveDataProvider
     */
    public function getForGroup($id)
    {
        $criteria = new CDbCriteria(); $criteria->addCondition("group_id = $id");
        $provider = $this->getProvider(array('criteria' => $criteria));
        return $provider;
    }

    /**
     * @param $id
     * @return CActiveDataProvider
     */
    public function getForTeacher($id)
    {
        $criteria = array('condition' => "teacher_id=$id");
        $provider = $this->getProvider(array('criteria' => $criteria));
        return $provider;
    }
}
