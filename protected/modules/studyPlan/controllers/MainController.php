<?php
/**
 * @author Serhiy Vinichuk <serhiyvinichuk@gmail.com>
 */
class MainController extends Controller
{
    public $name = 'Навчальні плани';

    public function actionIndex()
    {
        $this->render('index');
    }
} 