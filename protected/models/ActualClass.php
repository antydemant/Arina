<?php

/**
 * This is the model class for table "actual_class".
 *
 * The followings are the available columns in table 'actual_class':
 * @property integer $id
 * @property string $date
 * @property integer $class_number
 * @property integer $teacher_load_id
 * @property integer $class_type
 * @property integer $group_id
 *
 *
 * @property TeacherLoad $load
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

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('date, class_number, teacher_load_id, class_type, group_id', 'required'),
            array('class_number, teacher_load_id, class_type, group_id', 'numerical', 'integerOnly' => true),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, date, class_number, teacher_load_id, class_type, group_id', 'safe', 'on' => 'search'),
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
            'load' => array(self::BELONGS_TO, 'TeacherLoad', 'teacher_load_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'date' => 'Date',
            'class_number' => 'Class Number',
            'teacher_load_id' => 'Teacher Load',
            'class_type' => 'Class Type',
            'group_id' => 'Group',
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
        $criteria->compare('teacher_load_id', $this->teacher_load_id);
        $criteria->compare('class_type', $this->class_type);
        $criteria->compare('group_id', $this->group_id);

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
