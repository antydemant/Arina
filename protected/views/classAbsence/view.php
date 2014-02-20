<?php
/* @var $this ClassAbsenceController */
/* @var $model ClassAbsence */

$this->breadcrumbs = array(
    'Class Absences' => array('index'),
    $model->id,
);

$this->menu = array(
    array('label' => 'List ClassAbsence', 'url' => array('index')),
    array('label' => 'Create ClassAbsence', 'url' => array('create')),
    array('label' => 'Update ClassAbsence', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete ClassAbsence', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage ClassAbsence', 'url' => array('admin')),
);
?>

<h1>View ClassAbsence #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'actual_class_id',
        'student_id',
    ),
)); ?>
