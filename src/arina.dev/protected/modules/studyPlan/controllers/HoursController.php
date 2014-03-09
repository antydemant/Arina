<?php

/**
 * @author Serhiy Vinichuk <serhiyvinichuk@gmail.com>
 * Class HoursController
 */
class HoursController extends Controller
{
    /**
     * Create hours in the study plan
     * @param $id
     */
    public function actionCreate($id)
    {
        $model = new Hours('create');
        $model->sp_subject_id = $id;
        if (isset($_POST['Hours'])) {
            $model->attributes = $_POST['Hours'];
            if ($model->save()) {
                $this->redirect($this->createUrl('spSubject/view', array('id' => $model->sp_subject_id)));
            }
        }
        $this->render('create', array('model' => $model));
    }

    /**
     * Update hours in the study plan
     * @param $id
     */
    public function actionUpdate($id)
    {
        $model = Hours::model()->loadContent($id);
        if (isset($_POST['Hours'])) {
            $model->attributes = $_POST['Hours'];
            if ($model->save()) {
                $this->redirect($this->createUrl('spSubject/view', array('id' => $model->sp_subject_id)));
            }
        }
        $this->render('update', array('model' => $model));
    }

    /**
     * Delete hours from study plan
     * @param $id
     */
    public function actionDelete($id)
    {
        $model = Hours::model()->findByPk($id);
        $model->delete();
    }

} 