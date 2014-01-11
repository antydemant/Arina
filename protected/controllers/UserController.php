<?php
/**
 *
 * @author Dmytro Karpovych <ZAYEC77@gmail.com>
 */
/**
 *
 */
class UserController extends Controller
{

    public function actionLogin()
    {
        $model = new ELoginForm();
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
        $this->layout = "//layouts/login";

        $this->render(
            'login',
            array('model' => $model,)
        );
    }
}

?>
