<?php

class UserController extends Controller
{
    public $name = 'users';

    /**
     * @param $view
     * @return bool
     */
    protected function beforeRender($view)
    {
        switch ($view) {
            case 'login':
            case 'restore':
                $this->layout = "//layouts/login";
                break;
        }
        return parent::beforeRender($view);
    }

    /**
     *
     */
    public function actionLogin()
    {
        $model = new ELoginForm();

        $this->ajaxValidation('login-form', $model);

        if (isset($_POST['ELoginForm'])) {
            $model->attributes = $_POST['ELoginForm'];
            if ($model->validate() && $model->login()) {
                Yii::app()->request->redirect(Yii::app()->homeUrl);
            }
        }

        $this->render(
            'login',
            array('model' => $model,)
        );
    }

    /**
     *
     */
    public function actionLogout()
    {
        Yii::app()->user->logout();
        Yii::app()->request->redirect(Yii::app()->homeUrl);
    }

    /**
     *
     */
    public function actionRestore()
    {
        $model = new ERestorePasswordForm();

        $this->ajaxValidation('restore-form', $model);

        //TODO processing of request
        $this->render(
            'restore',
            array('model' => $model,)
        );
    }

    /**
     * @return array action filters
     */
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id)
    {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {
        $model = new User;

        $this->performAjaxValidation('user-form', $model);

        if (isset($_POST['User'])) {
            $model->attributes = $_POST['User'];
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
        $model = $this->loadModel($id);

        $this->performAjaxValidation('user-form', $model);

        if (isset($_POST['User'])) {
            $model->attributes = $_POST['User'];
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
        if (Yii::app()->request->isPostRequest) {
            $this->loadModel($id)->delete();

            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        } else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Lists all models.
     */
    public function actionIndex()
    {
        $dataProvider = new CActiveDataProvider('User');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $model = new User('search');
        $model->unsetAttributes(); // clear any default values
        if (isset($_GET['User']))
            $model->attributes = $_GET['User'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id)
    {
        $model = User::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    public function accessRules()
    {
        return CMap::mergeArray(
            array(
                array('allow',
                    'actions' => array('login'),
                    'users' => array('*'),
                ),
            ),
            parent::accessRules()
        );
    }
}
