<?php
/* @var $this CycleController */
/* @var $model SubjectCycle */

$this->breadcrumbs = array(
    Yii::t('base', 'Subject cycles') => array('index'),
    $model->title => array('view', 'id' => $model->id),
    Yii::t('base', 'Updating'),
);

$this->menu = array(
    array('label' => Yii::t('subject', 'Cycles list'), 'url' => array('index'), 'type' => Booster::TYPE_PRIMARY),
    array('label' => Yii::t('subject', 'Create cycle'), 'url' => array('create'), 'type' => Booster::TYPE_PRIMARY),
    array('label' => Yii::t('subject', 'View cycle'), 'url' => array('create'), 'icon' => 'eye-open'),
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

    <h2><?php echo Yii::t('subject', 'Update cycle') . " $model->title"; ?></h2>

<?php $this->renderPartial('_form', array('model' => $model)); ?>