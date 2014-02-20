<?php
/* @var $this ClassMarkController */
/* @var $model ClassMark */

$this->breadcrumbs = array(
    'Class Marks' => array('index'),
    'Create',
);

$this->menu = array(
    array('label' => 'List ClassMark', 'url' => array('index')),
    array('label' => 'Manage ClassMark', 'url' => array('admin')),
);
?>

    <h1>Create ClassMark</h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>