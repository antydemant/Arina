<?php
/* @var $this PositionController */
/* @var $model Position */

$this->breadcrumbs = array(
    Yii::t('base', 'Positions') => array('index'),
    $model->title,
);

$this->menu = array(
    array('label' => Yii::t('position', 'Positions list'), 'url' => array('index'), 'type' => BoosterHelper::TYPE_PRIMARY),
    array('label' => Yii::t('position', 'Create new position'), 'url' => array('create'), 'type' => BoosterHelper::TYPE_PRIMARY),
    array('label' => Yii::t('position', 'Updating position'), 'url' => array('update', 'id' => $model->id), 'icon' => 'pencil'),
    array('label' => Yii::t('position', 'Remove position'), 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?'), 'icon' => 'trash',),
    array('label' => Yii::t('position', 'Manage position'), 'url' => array('admin')),
);

/*$attributes = array(
    'title',
    array(
        'name' => 'department',
        'value' => CHtml::link($model->department->title, array(
                    '/department/view/',
                    'id' => $model->department_id)
            ),
        'type' => 'raw'
    ),
    'number',
    'accreditation_date',
);
$attributes [] = array(
    'label' => Yii::t('group', 'Groups list'),
    'value' => '',
);

foreach ($model->groups as $item) {
    $group = array(
        'type' => 'raw',
        'value' => CHtml::link($item->title, array('group/view', 'id' => $item->id)),
    );
    $attributes[] = $group;
}
*/?><!--

<h3><?php /*echo Yii::t('position', 'View position'); */?></h3>
<h2><?php /*echo "\"$model->title\""; */?></h2>

--><?php /*$this->widget(BoosterHelper::DETAIL_VIEW, array(
    'data' => $model,
    'attributes' => $attributes
)); */?>
