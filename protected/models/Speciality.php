<?php

/**
 * This is the model class for table "speciality".
 *
 * The followings are the available columns in table 'speciality':
 * @property integer $id
 * @property string $title
 * @property integer $department_id
 * @property string $number
 * @property string $accreditation_date
 *
 * @property Group[] $groups
 */
class Speciality extends ActiveRecord
{
    /**
     * @return array for dropDownList
     */
    public static function getList()
    {
        return self::getListAll('id', 'title');
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Speciality the static model class
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
        return 'speciality';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('title, department_id, number, accreditation_date', 'required'),
            array('department_id', 'numerical', 'integerOnly' => true),
            array('title', 'length', 'max' => 40),
            array('number', 'length', 'max' => 15),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, title, department_id, number, accreditation_date', 'safe', 'on' => 'search'),
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
            'groups' => array(self::HAS_MANY, 'Group', 'speciality_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => Yii::t('base', 'ID'),
            'title' => Yii::t('base', 'Title'),
            'department_id' => Yii::t('department', 'Department'),
            'department' => Yii::t('department', 'Department'),
            'number' => Yii::t('speciality', 'Number'),
            'accreditation_date' => Yii::t('speciality', 'Last accreditation date'),
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
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('department_id', $this->department_id);
        $criteria->compare('number', $this->number, true);
        $criteria->compare('accreditation_date', $this->accreditation_date, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }
}
