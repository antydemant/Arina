<?php
Yii::import('admin.components.*');

class DefaultController extends Controller
{
    public function actionIndex()
    {
        ?>
        <pre>
        <?php print_r(Yii::app()->session); ?>
        </pre><?php
        //$this->render('index');
    }

    public function actionMigrate()
    {
        $this->render('index');
    }

    public function actionRun($args = '')
    {
        $console = new WebConsole();
        $console->init();
        $result = $console->run(explode(' ', trim($args)));
        $confirm = isset(Yii::app()->session['show-confirm']);
        $this->render('run', array('result' => $result, 'confirm' => $confirm, 'args' => $args));
    }

    public function actionConfirm($args)
    {
        Yii::app()->session['console-confirm'] = true;
        $this->actionRun($args);
    }
}