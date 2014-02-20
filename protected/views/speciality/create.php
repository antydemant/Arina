<?php
/* @var $this SpecialityController */
/* @var $model Speciality */

$this->breadcrumbs = array(
    Yii::t('base', 'Specialities') => array('index'),
    'Create',
);

$this->menu = array(
    array('label' => 'List Speciality', 'url' => array('index')),
    array('label' => 'Manage Speciality', 'url' => array('admin')),
);
?>

    <h1>Create Speciality</h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>