<?php
/**
 * GroupController
 *
 * @author Dmytro Karpovych <ZAYEC77@gmail.com>
 */

class GroupController extends Controller
{
    public function actionIndex()
    {
        $provider = Group::model()->getProvider();
        $columns = array();

        $this->render(
            'index',
            array(
                'provider' => $provider,
                'columns' => $columns,
            )
        );
    }
}