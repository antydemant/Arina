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
            array(
                'type' => 'raw',
                'name' => 'curator_id',
                'value' => 'CHtml::link($data->curator->getFullName(), array("teacher/view", "id"=>$data->curator_id))',
            ),
            array(
                'type' => 'raw',
                'name' => 'speciality_id',
                'value' => 'CHtml::link($data->speciality->title,array())',
            ),
            array(
                'header' => Yii::t('base', 'Actions'),
                'htmlOptions' => array('nowrap' => 'nowrap'),
                'class' => 'bootstrap.widgets.TbButtonColumn',
                'template' => '{update}{delete}{view}{students}',

                'updateButtonUrl' => 'Yii::app()->controller->createUrl("update", array("id"=>$data->id))',
                'deleteButtonUrl' => 'Yii::app()->controller->createUrl("delete", array("id"=>$data->id))',
                'viewButtonUrl' => 'Yii::app()->controller->createUrl("view", array("id"=>$data->id))',

                'buttons' => array(
                    'students' => array(
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