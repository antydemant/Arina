<?php

class SpecialityController extends Controller
{
    public $name = "Specialities";

/*
    public function filters()
    {
        return array(
            'accessControl',
        );
    }

    public function accessRules()
    {
        return array(
            array('allow',
                'actions'=>array('create', 'delete', 'update'),
                'roles'=>array('dephead'),
            ),

            //array('deny',
            //    'actions'=>array('update', 'create', 'delete'),
            //    'users'=>array('*'),
            //),
        );
    }
*/

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id)
    {
        $this->render('view', array(
            'model' => Speciality::model()->loadContent($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {
        if(!Yii::app()->user->checkAccess('manageSpeciality'))
        {
            throw new CHttpException(403, Yii::t('yii','You are not authorized to perform this action.'));
        }
        $model = new Speciality;

        if (isset($_POST['Speciality'])) {
            $model->attributes = $_POST['Speciality'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id)
    {
        $model = Speciality::model()->loadContent($id);

        if(!Yii::app()->user->checkAccess('manageSpeciality',
            array(
                'id' => $model->department->head_id,
                'type' => User::TYPE_TEACHER,
            )
        ))
        {
            throw new CHttpException(403, Yii::t('yii','You are not authorized to perform this action.'));
        }

        if (isset($_POST['Speciality'])) {
            $model->attributes = $_POST['Speciality'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id)
    {
        if(!Yii::app()->user->checkAccess('manageSpeciality'))
        {
            throw new CHttpException(403, Yii::t('yii','You are not authorized to perform this action.'));
        }
        Speciality::model()->loadContent($id)->delete();

        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex()
    {
        $model = new Speciality('search');
        $model->unsetAttributes();
        if (isset($_GET['Speciality']))
            $model->attributes = $_GET['Speciality'];

        $this->render('index', array(
            'model' => $model,
        ));
    }
}
