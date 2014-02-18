<?php

class DefaultController extends Controller
{
    public $name = 'Навчальні плани';

    public function actionIndex()
    {
        $dataProvider = Plan::model()->getProvider();
        $this->render('index', array('dataProvider' => $dataProvider));
    }

    public function actionAddPlan()
    {
        if (Yii::app()->requset->isAjaxRequest) {

        }
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
                    $this->renderPartial('subject', array('model' => $model, 'dataProvider' => $dataProvider), false, true);
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
        $model = new SpSubject();
        $model->study_plan_id = $id;

        if (isset($_POST['SpSubject'])) {
            $model->attributes = $_POST['SpSubject'];
            if ($model->save()) {
                $dataProvider = SpSubject::model()->getProvider(array(
                    'criteria' => array(
                        'condition' => 'study_plan_id=8',
                    )
                ));
                $this->renderPartial('subject_list', array('model' => $model, 'dataProvider' => $dataProvider), false, true);
            }
            Yii::app()->end();

        }

        $this->renderPartial('add_subject', array('model' => $model));

    }

    public function actionCreate()
    {
        $model = new Plan();

        //  $this->ajaxValidation('studyPlan-form', $model);

        if (isset($_POST['Plan'])) {
            $model->attributes = $_POST['Plan'];
            if ($model->validate()) {
                $dataProvider = SpSubject::model()->getProvider(array(
                    'criteria' => array(
                        'condition' => 'study_plan_id=8',
                    )
                ));
                $this->renderPartial('subject_list', array('model' => $model, 'dataProvider' => $dataProvider), false, true);
            }
            Yii::app()->end();
        }

        $this->render('create', array('model' => $model));
    }

}