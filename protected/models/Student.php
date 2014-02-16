<?php

/**
 * This is the model class for table "student".
 *
 * The followings are the available columns in table 'student':
 * @property integer $id
 * @property string $code
 * @property string $last_name
 * @property string $first_name
 * @property string $middle_name
 * @property integer $group_id
 * @property string $phone_number
 * @property string $mobile_number
 * @property string $mother_name
 * @property string $father_name
 * @property string $gender
 * @property string $address
 * @property string $characteristics
 */
class Student extends ActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'student';
	}

	public function getFullName()
	{
		return "$this->last_name $this->first_name $this->middle_name";
	}
	
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('code, last_name, first_name, middle_name, group_id', 'required'),
			array('group_id', 'numerical', 'integerOnly'=>true),
			array('code', 'length', 'max'=>12),
			array('last_name, first_name, middle_name', 'length', 'max'=>40),
			array('phone_number, mobile_number', 'length', 'max'=>15),
			array('mother_name, father_name', 'length', 'max'=>60),
			array('gender', 'length', 'max'=>10),
			array('address', 'length', 'max'=>200),
			array('characteristics', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, code, last_name, first_name, middle_name, group_id, phone_number, mobile_number, mother_name, father_name, gender, address, characteristics', 'safe', 'on'=>'search'),
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
				'group'=>array(self::BELONGS_TO, 'Group', 'group_id'),
				'marks'=>array(self::HAS_MANY, 'ClassMark', 'student_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('student', 'ID'),
			'code' => Yii::t('student', 'Code'),
			'last_name' => Yii::t('student', 'Last Name'),
			'first_name' => Yii::t('student', 'First Name'),
			'middle_name' => Yii::t('student', 'Middle Name'),
			'group_id' => Yii::t('student', 'Group'),
			'phone_number' => Yii::t('student', 'Phone Number'),
			'mobile_number' => Yii::t('student', 'Mobile Number'),
			'mother_name' => Yii::t('student', 'Mother Name'),
			'father_name' => Yii::t('student', 'Father Name'),
			'gender' => Yii::t('student', 'Gender'),
			'address' => Yii::t('student', 'Address'),
			'characteristics' => Yii::t('student', 'Characteristics'),
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

		$criteria->with = 'group';
		
		$criteria->compare('id',$this->id);
		$criteria->compare('code',$this->code,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('middle_name',$this->middle_name,true);
		$criteria->compare('group_id',$this->group_id);
		$criteria->compare('phone_number',$this->phone_number,true);
		$criteria->compare('mobile_number',$this->mobile_number,true);
		$criteria->compare('mother_name',$this->mother_name,true);
		$criteria->compare('father_name',$this->father_name,true);
		$criteria->compare('gender',$this->gender,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('characteristics',$this->characteristics,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Student the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
