<?php
/**
 * @author Serhiy Vinichuk <serhiyvinichuk@gmail.com>
 */
class MainController extends Controller {

    public function actionIndex()
    {
        $this->render('index');
    }
} 