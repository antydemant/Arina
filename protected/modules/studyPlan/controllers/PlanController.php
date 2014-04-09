<?php

/**
 * @author Serhiy Vinichuk <serhiyvinichuk@gmail.com>
 */
class PlanController extends Controller
{
    public function actionIndex()
    {

    }

    public function actionCreate()
    {
        $model = new StudyPlan('create');

        if (isset($_POST['StudyPlan'])) {
            $model->attributes = $_POST['StudyPlan'];
            if ($model->save()) {
                $this->redirect($this->createUrl('graphic', array('id' => $model->id)));
            }
        }

        $this->render('create', array('model' => $model));
    }

    public function actionGraphic($id)
    {
        $model = new StudyGraphic();
        $model->plan_id = $id;

        $this->render('graphic', array('model' => $model));
    }

    public function actionSubjects($id)
    {
        $model = StudyPlan::model()->loadContent($id);

        $this->render('subjects', array('model' => $model));
    }

    public function actionView()
    {

    }

    public function actionUpdate()
    {

    }

    public function actionDelete()
    {

    }
} 