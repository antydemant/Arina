<?php
/* @var $this ActualClassController */
/* @var $model ActualClass */

$this->breadcrumbs = array(
    Yii::t('actualClass', 'Actual Classes') => array('index'),
    Yii::t('base', 'Create'),
);

$this->menu = array(
    array('label' => Yii::t('actualClass', 'ActualClass'), 'url' => array('index')),
);
?>

    <h1><?php echo Yii::t('actualClass', 'Create ActualClass'); ?></h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>