<?php

class DefaultController extends Controller
{
	public function actionIndex()
	{
		$criteria = new CDbCriteria(array(
			'with' => array(
				'classes' => array('marks', 'absences'),
				'students',
			),
		));
		$model = Group::model()->getProvider(array('criteria'=>$criteria)); 
		
		
		$this->render('index', array(
            'model' => $model,
        ));
	}
}