<?php

class CyclicCommissionController extends Controller
{
    public $name = 'Cyclic Commissions';

    /**
     * Lists all models.
     */
    public function actionIndex()
    {
        $dataProvider = new CActiveDataProvider('CyclicCommission');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id)
    {
        $this->render('view', array(
            'model' => CyclicCommission::model()->loadContent($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {
        $model = new CyclicCommission;

        $this->ajaxValidation('cyclic-commission-form', $model);

        if (isset($_POST['CyclicCommission'])) {
            $model->attributes = $_POST['CyclicCommission'];
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
        $model = CyclicCommission::model()->loadContent($id);

        $this->ajaxValidation('cyclic-commission-form', $model);

        if (isset($_POST['CyclicCommission'])) {
            $model->attributes = $_POST['CyclicCommission'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
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
        if (Yii::app()->request->isPostRequest) {
            CyclicCommission::model()->loadContent($id)->delete();

            if (!isset($_GET['ajax']))
                $this->redirect(array('index'));
        } else
            throw new CHttpException(400, Yii::t('base', 'Invalid request. Please do not repeat this request again.'));
    }
}
