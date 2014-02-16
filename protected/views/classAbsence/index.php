<?php
/* @var $this ClassAbsenceController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Class Absences',
);

$this->menu=array(
	array('label'=>'Create ClassAbsence', 'url'=>array('create')),
	array('label'=>'Manage ClassAbsence', 'url'=>array('admin')),
);
?>

<h1>Class Absences</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
