<?php
/* @var $this ActualClassController */
/* @var $model ActualClass */

$this->breadcrumbs = array(
    Yii::t('actualClass', 'Actual Classes') => array('index'),
    $model->id => array('view', 'id' => $model->id),
    Yii::t('base', 'Update'),
);

$this->menu = array(
    array('label' => Yii::t('actualClass', 'ActualClass'), 'url' => array('index')),
    array('label' => Yii::t('actualClass', 'Create ActualClass'), 'url' => array('create')),
    array('label' => Yii::t('actualClass', 'View ActualClass'), 'url' => array('view', 'id' => $model->id)),
);
?>

    <h1><?php echo Yii::t('actualClass', 'Update ActualClass'); ?></h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>