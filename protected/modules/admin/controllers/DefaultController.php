<?php
Yii::import('admin.components.Migrate');

class DefaultController extends Controller
{
    public function actionIndex()
    {
        $migrate = new Migrate('name', new CConsoleCommandRunner());
        echo "<pre>";
        print_r($migrate->getAllMigrations());
        echo "</pre>";
        //$this->render('index');
    }
}