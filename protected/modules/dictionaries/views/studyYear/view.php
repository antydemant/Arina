<?php
/* @var $this StudyYearController */
/* @var $model StudyYear */

$this->breadcrumbs=array(
	'Study Years'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List StudyYear', 'url'=>array('index')),
	array('label'=>'Create StudyYear', 'url'=>array('create')),
	array('label'=>'Update StudyYear', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete StudyYear', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage StudyYear', 'url'=>array('admin')),
);
?>

<h1>View StudyYear #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'begin',
		'end',
	),
)); ?>
