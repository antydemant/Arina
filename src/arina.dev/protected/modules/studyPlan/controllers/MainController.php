<?php

/**
 * @author Serhiy Vinichuk <serhiyvinichuk@gmail.com>
 * Class MainController
 */
class MainController extends Controller
{
    public $name = 'Study plans';

    public function actionIndex()
    {
        $dataProvider = Plan::model()->getProvider();
        $this->render('index', array('dataProvider' => $dataProvider));
    }

    /**
     * AJAX form to create study plan
     */
    public function actionCreateInfo()
    {
        $model = new Plan();

        if (isset($_POST['Plan'])) {
            $model->attributes = $_POST['Plan'];
            if (Yii::app()->getRequest()->isAjaxRequest) {

                if ($model->save()) {
                    $this->redirect(array('subjects', 'id' => $model->id)); // show subject form

                } else {
                    $this->renderPartial('createInfo', array(
                        'model' => $model,
                    ));
                }
                Yii::app()->end();
            }
        }

        $this->render('createInfo', array(
            'model' => $model,
        ));
    }

    /**
     * Add subjects to study plan
     * @param $id
     */
    public function actionSubjects($id)
    {
        $model = new PlanSubjects();
        $model->prepare($id);

        if (isset($_POST['PlanSubjects'])) {
            $model->attributes = $_POST['PlanSubjects'];
            if ($model->validate()) {
                $model->makeChanges();
            }
        }

        if (Yii::app()->getRequest()->isAjaxRequest) {
            $this->renderPartial('subjects', array('model' => $model));
        } else {
            $this->render('subjects', array('model' => $model));
        }
    }

    /**
     * Delete subject from study plan
     * @param $id
     */
    public function actionDeleteSubject($id)
    {
        /**
         * @var $subject SpSubject
         */
        $subject = SpSubject::model()->loadContent($id);
        $planId = $subject->sp_plan_id;
        $subject->delete();
        $this->redirect(array('subjects', 'id' => $planId));

    }

    /**
     * @param $id
     */
    public function actionSemesters($id)
    {
        $this->addData($id);
    }

    /**
     * Add semester or hours to study plan
     * @param $id
     * @param string $scenario
     */
    protected function addData($id, $scenario = '')
    {
        $model = new PlanSemesters($scenario);
        $model->prepare($id);

        if (isset($_POST['PlanSemesters'])) {
            $model->attributes = $_POST['PlanSemesters'];
            if ($model->validate()) {
                $model->makeChanges();
            }
        }

        if (Yii::app()->request->isAjaxRequest) {
            $this->renderPartial('semesters', array('model' => $model));
        } else {
            $this->render('semesters', array('model' => $model));
        }
    }

    /**
     * @param $id
     */
    public function actionAddSemester($id)
    {
        $this->addData($id, 'addSemester');
    }

    /**
     * @param $id
     */
    public function actionAddHours($id)
    {
        $this->addData($id, 'addHours');
    }

    /**
     * @param $id
     */
    public function actionRemoveSemester($id)
    {
        $this->addData($id, 'removeSemester');
    }
}