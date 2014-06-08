<?php

class LoadController extends Controller
{
    public function actionIndex()
    {
        $this->render('index',array('cycle_id'=>5,'teacher_id'=>1));
    }
}