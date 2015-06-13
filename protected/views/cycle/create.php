<?php
/* @var $this CycleController */
/* @var $model SubjectCycle */

$this->breadcrumbs = array(
    Yii::t('base', 'Subject cycles') => array('index'),
    Yii::t('subject', 'Creating new cycle'),
);

$this->menu = array(
    array('label' => Yii::t('subject', 'Cycles list'), 'url' => array('index'), 'type' => BoosterHelper::TYPE_PRIMARY),
);
?>
    <h2><?php echo Yii::t('subject', 'Creating new cycle'); ?></h2>
    
<?php $this->renderPartial('_form', array('model' => $model)); ?>