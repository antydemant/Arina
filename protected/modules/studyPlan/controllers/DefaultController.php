<?php

class DefaultController extends Controller
{
    public function actionIndex()
    {
        $this->render('index');
    }

    public function actionPlan($id)
    {
        if (Yii::app()->request->isAjaxRequest) {
            echo TbHtml::dropDownList('plan', '', TbHtml::listData(Plan::model()->findAll('speciality_id=' . $id), 'id', 'study_year'),
                array('empty' => 'Оберіть навчальний план'));
            Yii::app()->end();
        } else
            throw new CHttpException(400);
    }
}