<?php

class StudyPlanController extends Controller
{
    /**
     * This method include access control logic
     *
     * @param CAction $action
     * @return bool
     */
    protected function beforeAction($action)
    {
        return parent::beforeAction($action);
    }

    public function actionIndex()
    {
        $provider = StudyPlan::model()->getProvider();
        $this->render(
            'index',
            array(
                'dataProvider' => $provider,
            )
        );
    }

    public function actionCreate()
    {
        $model = new StudyPlan();

        $this->render(
            'create',
            array(
                'model' => $model,
            )
        );
    }

    public function actionUpdateSemesters()
    {
        $model = new StudyPlan();

        $this->render(
            'updateSemesters',
            array(
                'model' => $model,
            )
        );
    }

    public function actionSemesters($id)
    {
        $params = array(
            'criteria' => array(
                'condition' => "study_plan_id =$id",
            ),
        );
        $dataProvider = StudyPlanInfo::model()->getProvider($params);

        $this->renderPartial(
            'semesters',
            array(
                'dataProvider' => $dataProvider,
            )
        );
    }
    // Uncomment the following methods and override them if needed
    /*
    public function filters()
    {
        // return the filter configuration for this controller, e.g.:
        return array(
            'inlineFilterName',
            array(
                'class'=>'path.to.FilterClass',
                'propertyName'=>'propertyValue',
            ),
        );
    }

    public function actions()
    {
        // return external action classes, e.g.:
        return array(
            'action1'=>'path.to.ActionClass',
            'action2'=>array(
                'class'=>'path.to.AnotherActionClass',
                'propertyName'=>'propertyValue',
            ),
        );
    }
    */
}