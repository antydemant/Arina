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
);

$attributes = array(
    'title',
);
$attributes [] = array(
    'label' => Yii::t('employee', 'Employees'),
    'value' => '',
);

foreach ($model->employees as $item) {
    $employee = array(
        'type' => 'raw',
        'value' => CHtml::link($item->getFullName(), array('hr/default/view', 'id' => $item->id)),
    );
    $attributes[] = $employee;
}
?>

<h3><?php echo Yii::t('position', 'View position'); ?></h3>
<h2><?php echo "\"$model->title\""; ?></h2>

<?php $this->widget(BoosterHelper::DETAIL_VIEW, array(
    'data' => $model,
    'attributes' => $attributes
)); ?>
