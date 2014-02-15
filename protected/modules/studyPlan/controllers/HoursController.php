<?php

/**
 * Created by PhpStorm.
 * User: Serhiy
 * Date: 13.02.14
 * Time: 18:40
 */
class HoursController extends Controller
{
    public function actionIndex()
    {
        $dataProvider = Hours::model()->getProvider();
        $this->render('index', array('dataProvider' => $dataProvider));
    }

    public function actionView($id)
    {
        $model = Hours::model()->loadContent($id);
        $this->render('view', array('model' => $model));
    }

    public function actionCreate()
    {
        $model = new Hours();
        if (isset($_POST['Hours'])) {
            $model->attributes = $_POST['Hours'];
            if ($model->save()) {
                $this->redirect(Yii::app()->user->returnUrl);
            }
        }
        $this->render('create', array('model' => $model));
    }

    public function actionUpdate($id)
    {
    }

    public function actionDelete($id)
    {
    }

} 