<?php
/* @var $this ClassAbsenceController */
/* @var $model ClassAbsence */

$this->breadcrumbs=array(
	'Class Absences'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ClassAbsence', 'url'=>array('index')),
	array('label'=>'Manage ClassAbsence', 'url'=>array('admin')),
);
?>

<h1>Create ClassAbsence</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>