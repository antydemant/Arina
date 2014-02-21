<?php

class DefaultController extends Controller
{
    public function actionIndex()
    {
        $criteria = new CDbCriteria(array(
            'with' => array(
            	'marks',
            	'absences',
            	'load' => array(
            			'teacher', 
            			'group' => array('students'),
            			'studyPlanSemester' => array('plan' => array('subjects' => 'subject')),
            	),
            ),
        	'where' => array(
            		
            ),
        ));
        $model = ActualClass::model()->getProvider(array('criteria' => $criteria));


        $this->render('index', array(
            'model' => $model,
        ));
    }
}