<?php
Yii::import('modules.studyPlan.models.*');
class JournalViewer extends CFormModel 
{
	
	public $groupId;
	public $subjectId;
	public $studentId;
	public $isEmpty;
	
	
	public function rules()
	{
		return array(
			array('subjectId', 'required'),
			array('groupId', 'required', 'on' => 'group'),
			array('studentId', 'required', 'on' => 'student'),	
		);
	}
	
	public function attributeLabels()
	{
		return array(
			'subjectId' => Yii::t('terms', 'Subject'),
			'groupId' => Yii::t('terms', 'Group'),
			'studentId' => Yii::t('terms', 'Student'),
		);
	}
	
	public function getData()
	{
		switch ($this->scenario) {
			case 'student' : return $this->getStudentData();
			case 'group' : return $this->getGroupData();
			default : return array();
		}
	}
	
	protected function getGroupData()
	{
		$criteria = new CDbCriteria(array(
				'with' => array(
						'marks',
						'absences',
						'load' => array('with' => array(
								'teacher',
								'group' => array('with' => array('students')),
								'studyPlanSemester' => array('with' => array(
											'plan' => array('with' => array(
												'spSubjects' => array('with' => array('subject')))),
											)
										)
								)
						),
				),
		));
		//$model = 
		return ActualClass::model()->getProvider(array('criteria' => $criteria))->getData();
	}
	
	protected function getStudentData()
	{
		return array();
	}
	
}

?>