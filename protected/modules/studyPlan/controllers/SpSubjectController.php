<?php

/**
 * @author Serhiy Vinichuk <serhiyvinichuk@gmail.com>
 * Class SpSubjectController
 */
class SpSubjectController extends Controller
{
    public $name = 'Subjects';

    /**
     * Detailed view of the subject in the study plan
     * @param $id
     */
    public function actionView($id)
    {
        $dataProvider = Hours::model()->getProvider(array(
            'criteria' => array(
                'condition' => 'sp_subject_id=' . $id,
            ),
        ));
        $model = SpSubject::model()->loadContent($id);
        $this->render('view', array('dataProvider' => $dataProvider, 'model' => $model));
    }

    /**
     * Add new subject to the study plan
     */
    public function actionCreate()
    {
        $model = new SpSubject('create');
        if (isset($_POST['SpSubject'])) {
            $model->attributes = $_POST['SpSubject'];
            if ($model->save()) {
                $this->createUrl('plan/view', array('id' => $model->sp_plan_id));
            }
        }
        $this->render('create', array('model' => $model));
    }

    /**
     * Update subject in the study plan
     * @param $id
     */
    public function actionUpdate($id)
    {
        $model = SpSubject::model()->loadContent($id);
        if (isset($_POST['SpSubject'])) {
            $model->attributes = $_POST['SpSubject'];
            if ($model->save()) {
                $this->redirect($this->createUrl('plan/view', array('id' => $model->sp_plan_id)));
            }
        }
        $this->render('update', array('model' => $model));
    }

    /**
     * Remove subject from the study plan
     * @param $id
     */
    public function actionDelete($id)
    {
        $model = SpSubject::model()->loadContent($id);

        if ($model->delete()) {
            $model->save(false);
        }
    }
} 