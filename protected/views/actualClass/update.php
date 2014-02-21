<?php
/* @var $this ActualClassController */
/* @var $model ActualClass */

$this->breadcrumbs = array(
    'Actual Classes' => array('index'),
    $model->id => array('view', 'id' => $model->id),
    'Update',
);

$this->menu = array(
    array('label' => 'List ActualClass', 'url' => array('index')),
    array('label' => 'Create ActualClass', 'url' => array('create')),
    array('label' => 'View ActualClass', 'url' => array('view', 'id' => $model->id)),
    array('label' => 'Manage ActualClass', 'url' => array('admin')),
);
?>

    <h1>Update ActualClass <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>