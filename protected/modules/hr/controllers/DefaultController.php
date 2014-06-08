<?php

class DefaultController extends Controller
{
    public function actionIndex()
    {
        $model = new Employee('search');
        $model->unsetAttributes(); // clear any default values
        if (isset($_GET['Employee'])) {
            $model->attributes = $_GET['Employee'];
        }

        $this->render('index', array(
            'model' => $model,
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {
        $model = new Employee();

        $this->ajaxValidation('employee-form', $model);

        if (isset($_POST['Employee'])) {
            $model->attributes = $_POST['Employee'];
            /*if(!Yii::app()->user->checkAccess('manageStudent',
                array(
                    'id' => $model->group->speciality->department->head_id,
                    'type' => User::TYPE_TEACHER,
                )
            ))
            {
                throw new CHttpException(403, Yii::t('yii','You are not authorized to perform this action.'));
            }*/
            if ($model->save()) {
                $this->redirect(array('index'));//, 'id' => $model->id));
            }
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }
}