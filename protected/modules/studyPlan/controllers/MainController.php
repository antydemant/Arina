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

                if ($model->validate()) {
                    $this->renderPartial('addSubject');
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
}