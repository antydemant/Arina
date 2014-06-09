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

            if ($model->save()) {
                $this->redirect(array('index'));//, 'id' => $model->id));
            }
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    public function actionDelete($id)
    {
        $model = Employee::model()->loadContent($id);
        $model->delete();
        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }
}