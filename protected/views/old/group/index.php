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
                'header' => Yii::t('teacher', 'Curator'),
                'type' => 'raw',
                'name' => 'curator.name',
                'value' => 'CHtml::link($data->curator->getFullName(), array("teacher/view", "id"=>$data->curator_id))',
            ),
            array(
                'header' => Yii::t('base', 'Speciality'),
                'type' => 'raw',
                'name' => 'speciality.title',
                'value' => 'CHtml::link($data->speciality->title, array("speciality/view", "id"=>$data->speciality_id))',
            ),
            array(
                'header' => Yii::t('base', 'Actions'),
                'htmlOptions' => array('nowrap' => 'nowrap'),
                'class' => 'bootstrap.widgets.TbButtonColumn',
                'template' => '{update}{delete}{view}{students}{excel}',
                'buttons' => array(
                    'students' => array(
                        'label' => Yii::t('student', 'Students list'),
                        'icon' => 'icon-list',
                        'url' => 'Yii::app()->createUrl("student/default/group", array("id"=>$data->id))',
                    ),
                    'excel' => array(
                        'label' => Yii::t('student', 'Get excel'),
                        'icon' => 'icon-file',
                        'url' => 'Yii::app()->createUrl("/group/makeExcel", array("id"=>$data->id))',
                    ),
                ),
            )
        ),
    )
);
?>