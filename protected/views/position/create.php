<?php
/* @var $this PositionController */
/* @var $model Position */

$this->breadcrumbs = array(
    Yii::t('base', 'Positions') => array('index'),
    Yii::t('base', 'Creating'),
);

$this->menu = array(
    array('label' => Yii::t('position', 'Positions list'), 'url' => array('index'), 'type' => BoosterHelper::TYPE_PRIMARY),
);
?>
    <h2><?php echo Yii::t('position', 'Create new position'); ?></h2>

<?php $this->renderPartial('_form', array('model' => $model)); ?>