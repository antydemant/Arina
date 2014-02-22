<?php

/**
 * This is the model class for table "teacher_load".
 *
 * The followings are the available columns in table 'teacher_load':
 * @property integer $id
 * @property integer $teacher_id
 * @property integer $sp_hours_id
 * @property integer $group_id
 * @property integer $lectures
 * @property integer $labs
 * @property integer $practs
 */
class TeacherLoad extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'teacher_load';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('teacher_id, sp_hours_id, group_id, lectures, labs, practs', 'required'),
            array('teacher_id, sp_hours_id, group_id, lectures, labs, practs', 'numerical', 'integerOnly' => true),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, teacher_id, sp_hours_id, group_id, lectures, labs, practs', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(//'subject'=>array(self::),
            'sp_hours'=>array(self::BELONGS_TO, 'Hours','sp_hours_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'teacher_id' => 'Teacher',
            'sp_hours_id' => 'Study Plan Hours',
            'group_id' => 'Group',
            'lectures' => 'Lectures',
            'labs' => 'Labs',
            'practs' => 'Practs',
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
        $criteria->compare('teacher_id', $this->teacher_id);
        $criteria->compare('sp_hours_id', $this->sp_hours_id);
        $criteria->compare('group_id', $this->group_id);
        $criteria->compare('lectures', $this->lectures);
        $criteria->compare('labs', $this->labs);
        $criteria->compare('practs', $this->practs);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return TeacherLoad the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}
