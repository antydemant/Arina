<?php

/**
 * @author Dmytro Karpovych <ZAYEC77@gmail.com>
 * Class PlanSubjects
 */
class PlanSubjects extends CFormModel
{
    /**
     * @var $planId integer
     */
    public $planId;
    public $addedSubjects = array();
    public $total_hours;
    public $subjectId;
    /**
     * @var Plan $plan
     */
    protected $plan;

    /**
     * @param $id
     */
    public function prepare($id)
    {
        $this->planId = $id;
        $this->plan = Plan::model()->findByPk($this->planId);
    }

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
        $list = Subject::model()->getList();

        /**
         * @var SpSubject $item
         */
        foreach ($this->plan->subjects as $item) {
            unset($list[$item->subject_id]);
        }
        return $list;
    }

    /**
     * @return CActiveDataProvider
     */
    public function getAddedSubjectsProvider()
    {
        $criteria = new CDbCriteria();
        $criteria->condition = "study_plan_id = $this->planId";
        $dataProvider = SpSubject::model()->getProvider(array('criteria' => $criteria));
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