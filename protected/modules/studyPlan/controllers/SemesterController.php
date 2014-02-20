<?php

/**
 * @author Serhiy Vinichuk <serhiyvinichuk@gmail.com>
 * Class SemesterController
 */
class SemesterController extends Controller
{
    public $name = 'Semesters';

    /**
     * List all semester for the study plan
     * @param $id
     */
    public function actionIndex($id)
    {
        $model = Plan::model()->loadContent($id);
        $dataProvider = Semester::model()->getProvider(array(
            'criteria' => array(
                'condition' => "study_plan_id=$id"
            )
        ));
        $this->render('index', array(
            'model' => $model,
            'dataProvider' => $dataProvider
        ));
    }

    /**
     * Add semester to the study plan
     * @param $id
     */
    public function actionCreate($id)
    {
        $model = new Semester();
        $model->study_plan_id = $id;
        if (isset($_POST['Semester'])) {
            $model->attributes = $_POST['Semester'];
            if ($model->save()) {
                $this->redirect($this->createUrl('index',array('id'=>$model->study_plan_id)));
            }
        }

        $this->render('create', array('model' => $model));
    }

    /**
     * Update semester in the study plan
     * @param $id
     */
    public function actionUpdate($id)
    {
        $model = Semester::model()->loadContent($id);

        if (isset($_POST['Semester'])) {
            $model->attributes = $_POST['Semester'];
            if ($model->save()) {
                $this->redirect($this->createUrl('index',array('id'=>$model->study_plan_id)));
            }
        }

        $this->render('update', array('model' => $model));
    }

    /**
     * Delete semester from the study plan
     * @param $id
     */
    public function actionDelete($id)
    {
        $model = Semester::model()->loadContent($id);
        if ($model->delete()) {
            $model->save(false);
        }

    }
} 