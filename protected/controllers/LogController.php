<?php

class LogController extends Controller
{
	public function actionIndex()
	{
        if (Yii::app()->user->checkAccess('admin')) {
            Yii::app()->log->routes[1]->setMaxLogFiles(100);
            /*
            if (isset($_POST['maxLogFiles'])) {
                Yii::app()->getComponent('log')->routes[1]->setMaxLogFiles($_POST['maxLogFiles']);
                Yii::app()->getComponent('log')->routes[1]->setMaxFileSize($_POST['maxFileSize']);
                Yii::app()->getComponent('log')->routes[1]->setLogPath($_POST['logPath']);
                Yii::app()->getComponent('log')->routes[1]->setLogFile($_POST['logFile']);
                Yii::app()->getComponent('log')->routes[1]->init();
            }
            */
            $this->render('index');
        } else {
            throw new CHttpException(403, Yii::t('yii','You are not authorized to perform this action.'));
        }

	}

    public function actionView($id='') {
        if (Yii::app()->user->checkAccess('admin')) {
            $this->render('view', array('model' => $id));
        } else {
            throw new CHttpException(403, Yii::t('yii','You are not authorized to perform this action.'));
        }
    }

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}