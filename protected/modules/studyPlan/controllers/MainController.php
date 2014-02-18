<?php
/**
 *
 * @author Dmytro Karpovych <ZAYEC77@gmail.com>
 */
class MainController extends Controller
{
    public function actionCreateInfo()
    {
        $model = new Plan();

        if (isset($_POST['Plan'])) {
            $model->attributes = $_POST['Plan'];
            if (Yii::app()->getRequest()->isAjaxRequest) {

                if ($model->save()) {
                    $this->redirect(array('subjects','id'=>$model->id));

                } else {
                    $this->renderPartial('createInfo', array(
                        'model' => $model,
                    ));
                }
                Yii::app()->end();
            }
        }

        $this->render('createInfo', array(
            'model' => $model,
        ));
    }

    public function actionSubjects($id)
    {
        $model = new PlanSubjects();
        $model->planId = $id;

        if (isset($_POST['PlanSubjects'])) {
            $model->attributes = $_POST['PlanSubjects'];
            if ($model->validate()) {
                $model->makeChanges();
                $this->renderPartial('subjects',array('model'=>$model));
                Yii::app()->end();
            } else {
            }
        }

        if (Yii::app()->getRequest()->isAjaxRequest) {
            $this->renderPartial('subjects',array('model'=>$model));
        } else {
            $this->render('subjects',array('model'=>$model));
        }
    }
}