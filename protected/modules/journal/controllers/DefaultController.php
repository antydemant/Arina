<?php

class DefaultController extends Controller
{
    public function actionIndex()
    {
    	$model = new JournalViewer();
    	$model->setScenario('group');
    	
    	if (Yii::app()->getRequest()->isAjaxRequest) {
    		if (isset($_POST["JournalViewer"])) {
    			$model->attributes = $_POST["JournalViewer"];
    			if ($model->validate()) {
    				$model->isEmpty = false;
    			}
    			$this->renderPartial('_form', array(
            		'model' => $model,
        		));
    		}
    		Yii::app()->end();
    	}
    	
    	

        $this->render('index', array(
            'model' => $model,
        ));
    }

}