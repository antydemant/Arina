<?php
/* @var $this ActualClassController */
/* @var $model ActualClass */

$this->breadcrumbs = array(
    Yii::t('actualClass', 'Actual Classes') => array('index'),
    $model->id,
);

$this->menu = array(
    array('label' => Yii::t('actualClass', 'ActualClass'), 'url' => array('index')),
    array('label' => Yii::t('actualClass', 'Create ActualClass'), 'url' => array('create')),
    array('label' => Yii::t('actualClass', 'Update ActualClass'), 'url' => array('update', 'id' => $model->id)),
    array('label' => Yii::t('actualClass', 'Delete ActualClass'), 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => Yii::t('actualClass', 'Are you sure you want to delete this item?'))),
);
?>

<h1><?php echo Yii::t('actualClass', 'View ActualClass'); ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'date',
        'class_number',
        'teacher_load_id',
        'class_type',
    ),
)); ?>
