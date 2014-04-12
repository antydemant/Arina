<?php

/**
 * @author Serhiy Vinichuk <serhiyvinichuk@gmail.com>
 */
class PlanController extends Controller
{
    public function actionIndex()
    {
        $dataProvider = StudyPlan::model()->getProvider(array(
            'criteria' => array(
                'order' => 'year_id DESC',
            ),
        ));

        $this->render('index', array('dataProvider' => $dataProvider));
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

        if (isset($_POST['yt0']))
            $this->redirect($this->createUrl('subjects', array('id' => $id)));

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