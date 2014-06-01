<?php
/* @var $this CycleController */
/* @var $model SubjectCycle */

$this->breadcrumbs = array(
    Yii::t('base', 'Subject cycles') => array('index'),
    $model->title,
);

$this->menu = array(
    array('label' => Yii::t('subject', 'Cycles list'), 'url' => array('index'), 'type' => BoosterHelper::TYPE_PRIMARY),
    array('label' => Yii::t('subject', 'Create cycle'), 'url' => array('create'), 'type' => BoosterHelper::TYPE_PRIMARY),

    array('label' => Yii::t('subject', 'Update cycle'), 'url' => array('update', 'id' => $model->id), 'icon' => 'pencil'),
    array(
        'label' => Yii::t('subject', 'Delete cycle'),
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

<h2><?php echo Yii::t('subject', 'View cycle') . " $model->title"; ?></h2>

<?php
$attributes = array(
    'title',
    array(
        'label' => 'Предмети:',
        'value' => '',
    )
);
foreach ($model->relations as $item) {
    $subject = array(
        'type' => 'raw',
        'value' => CHtml::link($item->subject->title, array('subject/update', 'id' => $item->subject->id)),
    );
    $attributes[$item->subject->id] = $subject;
}
$this->widget(BoosterHelper::DETAIL_VIEW, array(
    'data' => $model,
    'attributes' => $attributes,
)); ?>
