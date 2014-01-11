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
        $this->layout = "//layouts/login";
        $model = new ELoginForm();
        $this->render(
            'login',
            array('model' => $model,)
        );
    }
}

?>
