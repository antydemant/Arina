<?php

/**
 * This is the model class for table "class_mark".
 *
 * The followings are the available columns in table 'class_mark':
 * @property integer $id
 * @property integer $actual_class_id
 * @property integer $mark
 * @property integer $student_id
 * @property string $type
 */
class ClassMark extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'class_mark';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('actual_class_id, mark, student_id, type', 'required'),
			array('actual_class_id, mark, student_id', 'numerical', 'integerOnly'=>true),
			array('type', 'length', 'max'=>22),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, actual_class_id, mark, student_id, type', 'safe', 'on'=>'search'),
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
				'student'=>array(self::BELONGS_TO, 'Student', 'student_id'),
				'actualClass'=>array(self::BELONGS_TO, 'ActualClass', 'actual_class_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'actual_class_id' => 'Actual Class',
			'mark' => 'Mark',
			'student_id' => 'Student',
			'type' => 'Type',
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

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('actual_class_id',$this->actual_class_id);
		$criteria->compare('mark',$this->mark);
		$criteria->compare('student_id',$this->student_id);
		$criteria->compare('type',$this->type,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ClassMark the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
