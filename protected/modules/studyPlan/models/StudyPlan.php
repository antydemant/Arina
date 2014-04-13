<?php
Yii::import('application.behaviors.strField.*');
Yii::import('application.behaviors.dateField.*');

/**
 * This is the model class for table "sp_plan".
 *
 * The followings are the available columns in table 'sp_plan':
 * @property integer $id
 * @property integer $speciality_id
 * @property array $semesters
 * @property datetime $created
 *
 * The followings are the available model relations:
 * @property StudyGraphic[] $graphics
 * @property StudySubject[] $subjects
 * @property Speciality $speciality
 */
class StudyPlan extends ActiveRecord implements IStrContainable, IDateContainable
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'sp_plan';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('speciality_id, semesters', 'required'),
            array('speciality_id', 'numerical', 'integerOnly' => true),
            array('created', 'default', 'value' => date('Y-m-d', time()), 'on' => 'insert'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, speciality_id', 'safe', 'on' => 'search'),
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
            'graphics' => array(self::HAS_MANY, 'StudyGraphic', 'plan_id'),
            'subjects' => array(self::HAS_MANY, 'StudySubject', 'plan_id'),
            'speciality' => array(self::BELONGS_TO, 'Speciality', 'speciality_id'),
        );
    }

    /**
     * @return array
     */
    public function behaviors()
    {
        return array(
            'StrBehavior',
            'DateBehavior',
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
            'created' => 'Створений',
        );
    }

    /**
     * @return array
     */
    public function getStrFields()
    {
        return array(
            'semesters',
        );
    }

    public function getDateFields()
    {
        return array(
            'created',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search()
    {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('speciality_id', $this->speciality_id);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
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

}
