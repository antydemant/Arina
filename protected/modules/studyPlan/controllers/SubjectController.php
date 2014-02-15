<?php

/**
 * Created by PhpStorm.
 * User: Serhiy
 * Date: 13.02.14
 * Time: 18:40
 */
class SubjectController extends Controller
{

    public function actionView($id)
    {
        /*  $criteria = new CDbCriteria(
              array(
                  'condition' => 'study_plan_subject_id = ' . $id,
                  'order' => 'study_plan_info_id ASC',
              )
          );*/
        //$dataProvider = Semester::model()->getProvider($criteria);
        $dataProvider = Semester::model()->getProvider();
        $model = SpSubject::model()->loadContent($id);
        $this->render('view', array('dataProvider' => $dataProvider, 'model' => $model));
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