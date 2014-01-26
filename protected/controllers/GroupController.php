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
        $columns = array(
            array('name'=>'title'),
            array('name'=>'curator','value'=>'$data->curator->fullName'),
            array(
                'header' => Yii::t('base', 'Actions'),
                'htmlOptions' => array('nowrap' => 'nowrap'),
                'class' => 'bootstrap.widgets.TbButtonColumn',
                'template' => '{update}{delete}{view}{parent}{referrals}',

                'updateButtonUrl' => 'Yii::app()->controller->createUrl("update", array("id"=>1))',
                'deleteButtonUrl' => 'Yii::app()->controller->createUrl("delete", array("id"=>1))',
                'viewButtonUrl' => 'Yii::app()->controller->createUrl("view", array("id"=>1))',

                'buttons' => array(
                    'parent' => array(
                        'label' => 'Пригласитель',
                        'url' => 'Yii::app()->createUrl("client/view", array("id"=>2))',
                        'icon' => 'icon-user',
                        'visible' => 'true',
                    ),
                    'referrals' => array(
                        'label' => Yii::t('student', 'Students list'),
                        'icon' => 'icon-list',
                        'url' => 'Yii::app()->createUrl("student/group", array("id"=>$data->id))',
                    ),
                ),
            )
        );

        $this->render(
            'index',
            array(
                'provider' => $provider,
                'columns' => $columns,
            )
        );
    }
}