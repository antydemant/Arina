<?php

class MainController extends Controller
{
    public function actionIndex()
    {
        $curator_id = Yii::app()->user->getIdentityId();
        $group = Group::model()->findByAttributes(array('curator_id' => $curator_id));
        $this->render('index', array(
            'group' => $group,
        ));
    }
}