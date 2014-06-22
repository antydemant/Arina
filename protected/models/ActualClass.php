<?php

/**
 * This is the model class for table "actual_class".
 *
 * The followings are the available columns in table 'actual_class':
 * @property integer $id
 * @property string $date
 * @property integer $class_number
 * @property integer $load_id
 * @property integer $class_type
 * @property integer $group_id
 * @property integer $teacher_id
 * @property integer $subject_id
 *
 * @property Load $load
 * @property Group $group
 * @property Teacher $teacher
 * @property Subject $subject
 *
 */
class ActualClass extends ActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'actual_class';
    }

    public function getAlias()
    {
    	return "$this->date $this->class_number пара";
    }
    
    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('date, class_number, teacher_load_id, class_type', 'required'),
            array('class_number, teacher_load_id, class_type', 'numerical', 'integerOnly' => true),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, date, class_number, teacher_load_id, class_type', 'safe', 'on' => 'search'),
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
            'marks' => array(self::HAS_MANY, 'ClassMark', 'actual_class_id'),
            'absences' => array(self::HAS_MANY, 'ClassAbsence', 'actual_class_id'),
            'load' => array(self::BELONGS_TO, 'Load', 'load_id'),
            'group' => array(self::BELONGS_TO, 'Group', 'group_id'),
            'teacher' => array(self::BELONGS_TO, 'Teacher', 'teacher_id'),
            'subject' => array(self::BELONGS_TO, 'Subject', 'subject_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => Yii::t('actualClass', 'ID'),
            'date' => Yii::t('actualClass', 'Date'),
            'class_number' => Yii::t('actualClass', 'Class Number'),
            'load_id' => Yii::t('actualClass', 'Teacher Load'),
            'class_type' => Yii::t('actualClass', 'Class Type'),
        	'alias' =>  Yii::t('actualClass', 'ActualClass'),
            'subject_id' => 'Предмет',
            'group_id' => 'Група',
            'teacher_id' => 'Викладач',
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
        $criteria->compare('date', $this->date, true);
        $criteria->compare('class_number', $this->class_number);
        $criteria->compare('load_id', $this->load_id);
        $criteria->compare('subject_id', $this->subject_id);
        $criteria->compare('teacher_id', $this->teacher_id);
        $criteria->compare('group_id', $this->group_id);
        $criteria->compare('class_type', $this->class_type);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return ActualClass the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}
