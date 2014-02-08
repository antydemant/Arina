<?php

/**
 * This is the model class for table "study_plan_info".
 *
 * The followings are the available columns in table 'study_plan_info':
 * @property integer $id
 * @property integer $study_plan_id
 * @property integer $semester_number
 * @property integer $weeks_count
 *
 * The followings are the available model relations:
 * @property StudyPlan $studyPlan
 */
class StudyPlanInfo extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'study_plan_info';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('study_plan_id, semester_number, weeks_count', 'required'),
			array('study_plan_id, semester_number, weeks_count', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, study_plan_id, semester_number, weeks_count', 'safe', 'on'=>'search'),
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
			'studyPlan' => array(self::BELONGS_TO, 'StudyPlan', 'study_plan_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'study_plan_id' => 'Study Plan',
			'semester_number' => 'Semester Number',
			'weeks_count' => 'Weeks Count',
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
		$criteria->compare('study_plan_id',$this->study_plan_id);
		$criteria->compare('semester_number',$this->semester_number);
		$criteria->compare('weeks_count',$this->weeks_count);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return StudyPlanInfo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
