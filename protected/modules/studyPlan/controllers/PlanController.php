<?php

/**
 * Created by PhpStorm.
 * User: Serhiy
 * Date: 13.02.14
 * Time: 18:40
 */
class PlanController extends Controller
{

    public function actionIndex()
    {
        $dataProvider = Plan::model()->getProvider();
        $this->render('index', array('dataProvider' => $dataProvider));
    }

    public function actionView($id)
    {
        $model = Plan::model()->loadContent($id);
        $this->render('view', array('model' => $model));
    }

    public function actionCreate()
    {
        $model = new Plan('create');
        if (isset($_POST['Plan'])) {
            $model->attributes = $_POST['Plan'];
            if ($model->save()) {
                $this->redirect('index');
            }
        }
        $this->render('create', array('model' => $model));
    }

    public function actionUpdate($id)
    {
        $model = Plan::model()->loadContent($id);
        if (isset($_POST['Plan'])) {
            $model->attributes = $_POST['Plan'];
            if ($model->save()) {
                $this->redirect($this->createUrl('index'));
            }
        }
        $this->render('update', array('model' => $model));
    }

    public function actionDelete($id)
    {
        $model = Plan::model()->loadContent($id);

        if ($model->delete()) {
            $model->save(false);
        }
    }
} 