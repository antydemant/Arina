<?php
/**
 * @var $model CyclicCommission
 * @var $this CyclicCommissionController
 */
$this->breadcrumbs = array(
    Yii::t('base', 'Cyclic commissions') => array('index'),
    $model->title,
);

$this->menu = array(
    array('label' => 'List CyclicCommission', 'url' => array('index')),
    array('label' => 'Create CyclicCommission', 'url' => array('create')),
    array('label' => 'Update CyclicCommission', 'url' => array('update', 'id' => $model->id)),

    array('label' => 'Manage CyclicCommission', 'url' => array('admin')),

);
$this->menu = array(
    array('label' => Yii::t('teacher', 'Commissions list'), 'url' => array('index'), 'type' => Booster::TYPE_PRIMARY),
    array('label' => Yii::t('teacher', 'Create new cyclic commission'), 'url' => array('create'), 'type' => Booster::TYPE_PRIMARY),
    array(
        'label' => Yii::t('teacher', 'Update cyclic commission'),
        'icon' => 'pencil',
        'url' => $this->createUrl('update', array('id' => $model->id)),
    ),
    array(
        'label' => Yii::t('teacher', 'Delete cyclic commission'),
        'url' => $this->createUrl('delete', array('id' => $model->id)),
        'icon' => 'trash',
        'htmlOptions' => array(
            'submit' => array(
                'delete',
                'id' => $model->id,
            ),
            'confirm' => Yii::t('base', 'Do you want to delete this item?'),
        ),
    ),
);
?>

<h1> <?php echo Yii::t('teacher', 'View commission'); ?></h1>

<?php
$attributes = array(
    'title',
    array(
        'type' => 'raw',
        'name' => 'head_id',
        'value' => CHtml::link($model->getHeadName(), array('teacher/view', 'id' => $model->head_id)),
    ),
    array(
        'name' => 'teachers',
        'value' => '',
    ),
);
foreach ($model->teachers as $item) {
    $attributes[] = array('type' => 'raw', 'value' => CHtml::link($item->getFullName(), array('teacher/view', 'id' => $item->id)));
}
$this->widget(Booster::DETAIL_VIEW, array(
    'data' => $model,
    'attributes' => $attributes,
)); ?>
