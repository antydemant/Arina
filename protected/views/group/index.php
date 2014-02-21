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
$this->menu = array(
    array(
        'type' => Booster::TYPE_PRIMARY,
        'label' => Yii::t('group', 'Create new group'),
        'url' => $this->createUrl('create'),
    ),
);
?>
    <h2><?php echo Yii::t('group', 'Groups list'); ?></h2>
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
                'value' => 'CHtml::link($data->speciality->title, array("speciality/view", "id"=>$data->speciality_id))',
            ),
            array(
                'header' => Yii::t('base', 'Actions'),
                'htmlOptions' => array('nowrap' => 'nowrap'),
                'class' => 'bootstrap.widgets.TbButtonColumn',
                'template' => '{update}{delete}{view}{students}',
                'buttons' => array(
                    'students' => array(
                        'label' => Yii::t('student', 'Students list'),
                        'icon' => 'icon-list',
                        'url' => 'Yii::app()->createUrl("student/default/group", array("id"=>$data->id))',
                    ),
                ),
            )
        ),
    )
);
?>