<?php
/**
 *
 * @var GroupController $this
 * @var \CActiveDataProvider $provider
 */
?>
<?php
$this->breadcrumbs = array(
    Yii::t('group', 'Groups'),
);
?>
    <header>
        <?php $this->widget(
            Booster::BUTTON_GROUP,
            array(
                'buttons' => array(
                    array(
                        'type' => Booster::TYPE_PRIMARY,
                        'label' => Yii::t('group', 'Create new group'),
                        'url' => $this->createUrl('create'),
                    ),
                ),
            )
        )
        ?>
    </header>
<?php $this->renderPartial('//tableList',
    array(
        'provider' => $provider,
        'columns' => array(
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
        ),
    )
);
?>