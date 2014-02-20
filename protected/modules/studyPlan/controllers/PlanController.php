<?php

/**
 * @author Serhiy Vinichuk <serhiyvinichuk@gmail.com>
 * Class PlanController
 */
class PlanController extends Controller
{
    public $name = 'Study plans';

    /**
     * Detailed view of a study plan
     * @param $id
     */
    public function actionView($id)
    {
        $model = Plan::model()->loadContent($id);
        $this->render('view', array('model' => $model));
    }

    /**
     * Create new study plan
     */
    public function actionCreate()
    {
        $model = new Plan('create');
        if (isset($_POST['Plan'])) {
            $model->attributes = $_POST['Plan'];
            if ($model->save()) {
                $this->redirect(Yii::app()->user->returnUrl);
            }
        }
        $this->render('create', array('model' => $model));
    }

    /**
     * Update study plan
     * @param $id
     */
    public function actionUpdate($id)
    {
        $model = Plan::model()->loadContent($id);
        if (isset($_POST['Plan'])) {
            $model->attributes = $_POST['Plan'];
            if ($model->save()) {
                $this->redirect(Yii::app()->user->returnUrl);
            }
        }
        $this->render('update', array('model' => $model));
    }

    /**
     * Delete study plan
     * @param $id
     */
    public function actionDelete($id)
    {
        $model = Plan::model()->loadContent($id);

        if ($model->delete()) {
            $model->save(false);
        }
    }
} 