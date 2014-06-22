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
     * @param $id
     * @throws CHttpException
     */
    public function actionView($id)
    {
        if (!Yii::app()->user->checkAccess('admin')) {
            throw new CHttpException(403, Yii::t('yii', 'You are not authorized to perform this action.'));
        }
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
        if (!Yii::app()->user->checkAccess('admin')) {
            throw new CHttpException(403, Yii::t('yii', 'You are not authorized to perform this action.'));
        }
        $model = new User;

        //$this->performAjaxValidation('user-form', $model);

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
     * @param $id
     * @throws CHttpException
     */
    public function actionUpdate($id)
    {
        if ((!Yii::app()->user->checkAccess('admin')) && (Yii::app()->user->id != $id)) {
            throw new CHttpException(403, Yii::t('yii', 'You are not authorized to perform this action.'));
        }
        /** @var User $model */
        $model = $this->loadModel($id);
        $model->password = '';
        //$this->performAjaxValidation('user-form', $model);

        if (isset($_POST['User'])) {
            $model->attributes = $_POST['User'];
            if ($model->save()){
                Yii::app()->getUser()->setFlash('success','Дані були успішно змінені');
                $this->redirect(array('update', 'id' => $model->id));
            }
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * @param $id
     * @throws CHttpException
     */
    public function actionDelete($id)
    {
        if (!Yii::app()->user->checkAccess('admin')) {
            throw new CHttpException(403, Yii::t('yii', 'You are not authorized to perform this action.'));
        }
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
        if (!Yii::app()->user->checkAccess('admin')) {
            throw new CHttpException(403, Yii::t('yii', 'You are not authorized to perform this action.'));
        }
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
        if (!Yii::app()->user->checkAccess('admin')) {
            throw new CHttpException(403, Yii::t('yii', 'You are not authorized to perform this action.'));
        }
        $model = new User('search');
        $model->unsetAttributes(); // clear any default values
        if (isset($_GET['User']))
            $model->attributes = $_GET['User'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * @param $id
     * @return array|CActiveRecord|mixed|null
     * @throws CHttpException
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
