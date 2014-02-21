<?php
/* @var $this ActualClassController */
/* @var $model ActualClass */

$this->breadcrumbs = array(
    'Actual Classes' => array('index'),
    'Create',
);

$this->menu = array(
    array('label' => 'List ActualClass', 'url' => array('index')),
    array('label' => 'Manage ActualClass', 'url' => array('admin')),
);
?>

    <h1>Create ActualClass</h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>