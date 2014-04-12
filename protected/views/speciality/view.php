<?php
/* @var $this SpecialityController */
/* @var $model Speciality */

$this->breadcrumbs = array(
    Yii::t('base', 'Specialities') => array('index'),
    $model->title,
);

$this->menu = array(
    array('label' => Yii::t('speciality', 'Specialities list'), 'url' => array('index'), 'type' => Booster::TYPE_PRIMARY),
    array('label' => Yii::t('speciality', 'Create new speciality'), 'url' => array('create'), 'type' => Booster::TYPE_PRIMARY),
    array('label' => Yii::t('speciality', 'Updating speciality'), 'url' => array('update', 'id' => $model->id), 'icon' => 'pencil'),
    array('label' => Yii::t('speciality', 'Remove speciality'), 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?'), 'icon' => 'trash',),
    array('label' => Yii::t('speciality', 'Manage speciality'), 'url' => array('admin')),
);
$attributes = array(
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
?>

<h3><?php echo Yii::t('speciality', 'View speciality'); ?></h3>
<h2><?php echo "\"$model->title\""; ?></h2>

<?php $this->widget(Booster::DETAIL_VIEW, array(
    'data' => $model,
    'attributes' => $attributes
)); ?>
