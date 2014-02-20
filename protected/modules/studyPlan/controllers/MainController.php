<?php

/**
 *
 * @author Dmytro Karpovych <ZAYEC77@gmail.com>
 */
class MainController extends Controller
{
    public $name = 'Study plans';

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
        $planId = $subject->study_plan_id;
        $subject->delete();
        $this->redirect(array('subjects', 'id' => $planId));

    }

    /**
     * @param $id
     */
    public function actionSemesters($id)
    {
        $this->doSomething($id);
    }

    protected function doSomething($id, $scenario = '')
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

    public function actionIndex()
    {
        $dataProvider = Plan::model()->getProvider();
        $this->render('index', array('dataProvider' => $dataProvider));
    }

    public function actionAddSemester($id)
    {
        $this->doSomething($id, 'addSemester');
    }

    public function actionAddHours($id)
    {
        $this->doSomething($id, 'addHours');
    }

    public function actionRemoveSemester($id)
    {
        $this->doSomething($id, 'removeSemester');
    }
}