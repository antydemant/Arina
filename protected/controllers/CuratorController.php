<?php
/**
 * CuratorController
 *
 * @author Dmytro Karpovych <ZAYEC77@gmail.com>
 */

class CuratorController extends Controller
{
    public function accessRules()
    {
        return array(
            array(
                'allow',
                'role' => array('curator')
            ),
            array(
                'deny',
                'users' => array('*')
            ),
        );
    }

    public function actionIndex()
    {
        $groupProvider = Student::model()->getProvider(array('criteria' => array()));
        $this->render(
            'index',
            array(
                'groupProvider' => $groupProvider
            )
        );
    }
}