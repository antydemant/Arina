<?php
/**
 *
 * @author Dmytro Karpovych <ZAYEC77@gmail.com>
 */
class PlanSubjects extends CFormModel
{
    public $planId;
    public $addedSubjects = array();
    public $total_hours;
    public $subjectId;

    /**
     * Do something cool
     * Add subject to plan
     * Or remove id
     * Or update total hours
     */
    public function makeChanges()
    {
        $model = new SpSubject();
        $model->study_plan_id = $this->planId;
        $model->subject_id = $this->subjectId;
        $model->total_hours = $this->total_hours;
        $model->save(false);
    }

    /**
     * @return array
     */
    public function getNotAddedSubjects()
    {
        return Subject::model()->getList();
    }

    public function getAddedSubjectsProvider()
    {
        $criteria = new CDbCriteria();
        $criteria->condition = "study_plan_id = $this->planId";
        $dataProvider = SpSubject::model()->getProvider(array('criteria'=>$criteria));
        return $dataProvider;
    }

    public function rules()
    {
        return array(
            array('total_hours, subjectId', 'required'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'total_hours' => 'Загальна кількість годин',
            'subjectId' => 'Список предметів',
        );
    }
}