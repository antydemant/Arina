<?php

/**
 * Created by PhpStorm.
 * User: Serhiy
 * Date: 13.02.14
 * Time: 18:40
 */
class SemesterController extends Controller
{
    public $name = 'Навчальний план: Семестри';

    public function actionIndex()
    {
        $dataProvider = Semester::model()->getProvider();
        $this->render('index', array('dataProvider' => $dataProvider));
    }

    public function actionCreate()
    {
        $model = new Semester();

        if (isset($_POST['Semester'])) {
            $model->attributes = $_POST['Semester'];
            if ($model->save()) {
                $this->redirect($this->createUrl('index'));
            }
        }

        $this->render('create', array('model' => $model));
    }

    public function actionView($id)
    {
        $model = Semester::model()->loadContent($id);
        $this->render('view', array('model' => $model));
    }

    public function actionUpdate($id)
    {
        $model = Semester::model()->loadContent($id);

        if (isset($_POST['Semester'])) {
            $model->attributes = $_POST['Semester'];
            if ($model->save()) {
                $this->redirect($this->createUrl('index'));
            }
        }

        $this->render('update', array('model' => $model));
    }

    public function actionDelete($id)
    {
        $model = Semester::model()->loadContent($id);
        if ($model->delete()) {
            $model->save(false);
        }

    }
} 