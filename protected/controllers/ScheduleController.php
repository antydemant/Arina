<?php
/**
 *
 * @author Dmytro Karpovych <ZAYEC77@gmail.com>
 */
class ScheduleController extends Controller
{
    public function actionIndex()
    {
        //TODO implement
        //$model = Schedule::getAll();
        $model = new ActiveRecord();
        $this->render(
            'index',
            array('model' => $model,)
        );
    }

    public function actionGroup($id)
    {
        //TODO implement
        //$model = Schedule::getForGroup($id);
        $model = new ActiveRecord();
        $this->render(
            'group',
            array('model' => $model,)
        );
    }
}