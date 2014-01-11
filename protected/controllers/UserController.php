<?php
/**
 *
 * @author Dmytro Karpovych <ZAYEC77@gmail.com>
 */

class UserController extends Controller
{
    /**
     * @param $view
     * @return bool
     */
    protected function beforeRender($view)
    {
        switch ($view) {
            case 'login':
            case 'restore':
                $this->layout = "//layouts/login";
                break;
        }
        return parent::beforeRender($view);
    }

    /**
     *
     */
    public function actionLogin()
    {
        $model = new ELoginForm();

        $this->ajaxValidation('login-form', $model);

        $this->render(
            'login',
            array('model' => $model,)
        );
    }

    /**
     *
     */
    public function actionLogout()
    {
        Yii::app()->getUser()->logout();
    }

    public function actionRestore()
    {
        $model = new ERestorePasswordForm();

        $this->ajaxValidation('restore-form', $model);

        //TODO processing of request
        $this->render(
            'restore',
            array('model' => $model,)
        );
    }
}
