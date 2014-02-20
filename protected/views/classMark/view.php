<?php
/* @var $this ClassMarkController */
/* @var $model ClassMark */

$this->breadcrumbs = array(
    'Class Marks' => array('index'),
    $model->id,
);

$this->menu = array(
    array('label' => 'List ClassMark', 'url' => array('index')),
    array('label' => 'Create ClassMark', 'url' => array('create')),
    array('label' => 'Update ClassMark', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete ClassMark', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage ClassMark', 'url' => array('admin')),
);
?>

<h1>View ClassMark #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'actual_class_id',
        'mark',
        'student_id',
        'type',
    ),
)); ?>
