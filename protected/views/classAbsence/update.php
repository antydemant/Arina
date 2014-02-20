<?php
/* @var $this ClassAbsenceController */
/* @var $model ClassAbsence */

$this->breadcrumbs = array(
    'Class Absences' => array('index'),
    $model->id => array('view', 'id' => $model->id),
    'Update',
);

$this->menu = array(
    array('label' => 'List ClassAbsence', 'url' => array('index')),
    array('label' => 'Create ClassAbsence', 'url' => array('create')),
    array('label' => 'View ClassAbsence', 'url' => array('view', 'id' => $model->id)),
    array('label' => 'Manage ClassAbsence', 'url' => array('admin')),
);
?>

    <h1>Update ClassAbsence <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>