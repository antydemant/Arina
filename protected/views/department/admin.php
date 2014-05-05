<?php
/**
 * @var Department $model
 * @var DepartmentController $this
 */

$this->breadcrumbs = array(
    Yii::t('base', 'Departments') => array('index'),
    $model->title,
);

$this->menu = array(
    array('label' => Yii::t('department', 'Departments list'), 'url' => array('index'), 'type' => Booster::TYPE_PRIMARY),
    array('label' => Yii::t('department', 'Create new department'), 'url' => array('create'), 'type' => Booster::TYPE_PRIMARY),
    array('label' => Yii::t('department', 'Update department'), 'url' => array('update', 'id' => $model->id), 'icon' => 'pencil'),
    array('label' => Yii::t('department', 'Delete department'), 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?'), 'icon' => 'trash'),
);

$attributes = array(
    array(
        'label' => Yii::t('group', 'Groups list'),
        'value' => '',
    )
);

foreach ($model->specialities as $speciality) {
    foreach ($speciality->groups as $item) {
        $group = array(
            'type' => 'raw',
            'value' => CHtml::link($item->title, array('group/view', 'id' => $item->id)),
        );
        $attributes[] = $group;
    }
}
?>

    <h3><?php echo Yii::t('group', 'Groups list'); ?></h3>
    <h2><?php echo "\"$model->title\""; ?></h2>

<?php $this->widget(Booster::DETAIL_VIEW, array(
    'data' => $model,
    'attributes' => $attributes
)); ?>