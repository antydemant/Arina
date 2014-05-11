<?php
/* @var $this SpecialityController */
/* @var $model Speciality */

$this->breadcrumbs = array(
    Yii::t('base', 'Specialities') => array('index'),
    Yii::t('base', 'Creating'),
);

$this->menu = array(
    array('label' => Yii::t('speciality', 'Specialities list'), 'url' => array('index'), 'type' => BoosterHelper::TYPE_PRIMARY),
);
?>
    <h2><?php echo Yii::t('speciality', 'Create new speciality'); ?></h2>

<?php $this->renderPartial('_form', array('model' => $model)); ?>