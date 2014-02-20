<?php
/* @var $this ClassMarkController */
/* @var $model ClassMark */

$this->breadcrumbs = array(
    'Class Marks' => array('index'),
    $model->id => array('view', 'id' => $model->id),
    'Update',
);

$this->menu = array(
    array('label' => 'List ClassMark', 'url' => array('index')),
    array('label' => 'Create ClassMark', 'url' => array('create')),
    array('label' => 'View ClassMark', 'url' => array('view', 'id' => $model->id)),
    array('label' => 'Manage ClassMark', 'url' => array('admin')),
);
?>

    <h1>Update ClassMark <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>