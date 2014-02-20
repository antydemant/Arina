<?php
/**
 * @author Dmytro Karpovych <ZAYEC77@gmail.com>
 */

class SubjectController extends Controller
{
    public $name = 'Subjects';

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {
        $model = new Subject;

        $this->ajaxValidation('subject-form', $model);

        if (isset($_POST['Subject'])) {
            $model->attributes = $_POST['Subject'];
            if ($model->save())
                $this->redirect(array('index'));
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
        $model = Subject::model()->loadContent($id);

        $this->ajaxValidation('subject-form', $model);

        if (isset($_POST['Subject'])) {
            $model->attributes = $_POST['Subject'];
            if ($model->save())
                $this->redirect(array('index'));
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
            Subject::model()->loadContent($id)->delete();

            if (!isset($_GET['ajax']))
                $this->redirect(array('index'));
        } else
            throw new CHttpException(400, Yii::t('base', 'Invalid request. Please do not repeat this request again.'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex()
    {
        $dataProvider = new CActiveDataProvider('Subject');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }
}
