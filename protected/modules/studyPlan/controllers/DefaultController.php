<?php

class DefaultController extends Controller
{
    public function actionIndex()
    {
        $this->render('index');
    }

    public function actionAjaxPlan()
    {
        if (Yii::app()->request->isAjaxRequest) {
            $model = new Plan();

            if (isset($_POST['Plan'])) {
                $model->attributes = $_POST['Plan'];
                if ($model->save()) {
                    $dataProvider = SpSubject::model()->getProvider(array(
                        'criteria' => array(
                            'condition' => 'study_plan_id=' . $model->id,
                        )
                    ));
                    $this->renderPartial('subject', array('model' => $model, 'dataProvider' => $dataProvider));
                } else {
                    echo 'Study Plan is invalid';
                    Yii::app()->end();
                }
            }
        } else
            throw new CHttpException(400, 'Невірний запит');
    }

    public function actionAddSubject($id)
    {
        if (Yii::app()->request->isAjaxRequest) {
        //    $this->renderPartial('subject_popup', array('planId' => $id));
            echo 'AJAX request is successful';
        } else {
            throw new CHttpException(400, 'Невірний запит');
        }
    }

    public function actionCreate()
    {
        $model = new Plan();
        $this->render('create', array('model' => $model));
    }
}