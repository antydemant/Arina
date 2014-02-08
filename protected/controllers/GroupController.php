<?php
/**
 * GroupController
 *
 * @author Dmytro Karpovych <ZAYEC77@gmail.com>
 */

class GroupController extends Controller
{
    public $name = 'Groups';

    public function actionIndex()
    {
        $provider = Group::model()->getProvider();
        $columns = array(
            array('name' => 'title'),
            array('name' => 'curator', 'value' => '$data->curator->fullName'),
            array(
                'header' => Yii::t('base', 'Actions'),
                'htmlOptions' => array('nowrap' => 'nowrap'),
                'class' => 'bootstrap.widgets.TbButtonColumn',
                'template' => '{update}{delete}{view}{curator}{referrals}',

                'updateButtonUrl' => 'Yii::app()->controller->createUrl("update", array("id"=>1))',
                'deleteButtonUrl' => 'Yii::app()->controller->createUrl("delete", array("id"=>1))',
                'viewButtonUrl' => 'Yii::app()->controller->createUrl("view", array("id"=>1))',

                'buttons' => array(
                    'curator' => array(
                        'label' => 'Перегляд інформації про куратора',
                        'url' => 'Yii::app()->createUrl("teacher/view", array("id"=>$data->curator_id))',
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

    public function actionCreate()
    {
        $model = new Group();

        if (isset($_POST['Group'])) {
            $model->attributes = $_POST['Group'];
            if ($model->save()) {
                $this->redirect(array('group/index'));
            }
        }

        $this->render('create', array('model' => $model));
    }
}