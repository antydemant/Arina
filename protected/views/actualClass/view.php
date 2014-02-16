<?php
/* @var $this ActualClassController */
/* @var $model ActualClass */

$this->breadcrumbs=array(
	'Actual Classes'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ActualClass', 'url'=>array('index')),
	array('label'=>'Create ActualClass', 'url'=>array('create')),
	array('label'=>'Update ActualClass', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ActualClass', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ActualClass', 'url'=>array('admin')),
);
?>

<h1>View ActualClass #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'date',
		'class_number',
		'teacher_load_id',
		'class_type',
		'group_id',
	),
)); ?>
