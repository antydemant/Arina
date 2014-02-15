<?php

/**
 * Created by PhpStorm.
 * User: Serhiy
 * Date: 13.02.14
 * Time: 18:40
 */
class SubjectController extends Controller
{
    public $name = 'Навчальний план: Предмети';

    public function actionIndex()
    {
        $dataProvider = SpSubject::model()->getProvider();
        $this->render('index', array('dataProvider' => $dataProvider));
    }

    public function actionView($id)
    {
        $dataProvider = Hours::model()->getProvider(array(
            'criteria' => array(
                'condition' => 'study_plan_subject_id=' . $id,
            ),
        ));
        $model = SpSubject::model()->loadContent($id);
        $this->render('view', array('dataProvider' => $dataProvider, 'model' => $model));
    }

    public function actionCreate()
    {
        $model = new SpSubject('create');
        if (isset($_POST['SpSubject'])) {
            $model->attributes = $_POST['SpSubject'];
            if ($model->save()) {
                $this->redirect('index');
            }
        }
        $this->render('create', array('model' => $model));
    }

    public function actionUpdate($id)
    {
        $model = SpSubject::model()->loadContent($id);
        if (isset($_POST['SpSubject'])) {
            $model->attributes = $_POST['SpSubject'];
            if ($model->save()) {
                $this->redirect($this->createUrl('index'));
            }
        }
        $this->render('update', array('model' => $model));
    }

    public function actionDelete($id)
    {
        $model = SpSubject::model()->loadContent($id);

        if ($model->delete()) {
            $model->save(false);
        }
    }
} 