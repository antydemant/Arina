<?php
/**
 * @author Serhiy Vinichuk <serhiyvinichuk@gmail.com>
 * This is the model class for table "study_plan_semester".
 *
 * The followings are the available columns in table 'study_plan_semester':
 * @property integer $id
 * @property integer $study_plan_subject_id
 * @property integer $study_plan_info_id
 * @property integer $lectures
 * @property integer $labs
 * @property integer $practs
 * @property integer $selfwork
 * @property integer $hours_per_week
 * @property integer $test
 * @property integer $exam
 * @property integer $course_work
 * @property integer $course_project
 * The followings are the available model relations:
 * @property SpSubject $spSubject
 * @property Semester $semester
 */
class Hours extends ActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'study_plan_semester';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('study_plan_subject_id, study_plan_info_id, lectures, labs, practs, selfwork, hours_per_week, test, exam, course_work, course_project', 'required'),
			array('study_plan_subject_id, study_plan_info_id, lectures, labs, practs, selfwork, hours_per_week, test, exam, course_work, course_project', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, study_plan_subject_id, study_plan_info_id, lectures, labs, practs, selfwork, hours_per_week, test, exam, course_work, course_project', 'safe', 'on'=>'search'),
		);
	}

    public function getTotal()
    {
        return $this->labs + $this->practs + $this->selfwork + $this->lectures;
    }


	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
            'spSubject' => array(self::BELONGS_TO, 'SpSubject', 'study_plan_subject_id'),
            'semester' => array(self::BELONGS_TO, 'Semester', 'study_plan_info_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'study_plan_subject_id' => 'Предмет',
			'study_plan_info_id' => 'Семестр №',
			'lectures' => 'Лекції',
			'labs' => 'Лабораторні',
			'practs' => 'Практичні',
			'selfwork' => 'Самостійна робота студентів',
			'hours_per_week' => 'Годин на тиждень',
			'test' => 'Залік',
			'exam' => 'Екзамен',
			'course_work' => 'Курсова робота',
			'course_project' => 'Курсовий проект',
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
		$criteria->compare('study_plan_subject_id',$this->study_plan_subject_id);
		$criteria->compare('study_plan_info_id',$this->study_plan_info_id);
		$criteria->compare('lectures',$this->lectures);
		$criteria->compare('labs',$this->labs);
		$criteria->compare('practs',$this->practs);
		$criteria->compare('selfwork',$this->selfwork);
		$criteria->compare('hours_per_week',$this->hours_per_week);
		$criteria->compare('test',$this->test);
		$criteria->compare('exam',$this->exam);
		$criteria->compare('course_work',$this->course_work);
		$criteria->compare('course_project',$this->course_project);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Hours the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
