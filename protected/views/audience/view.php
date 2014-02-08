<?php
$this->breadcrumbs=array(
	'Audiences'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List Audience','url'=>array('index')),
array('label'=>'Create Audience','url'=>array('create')),
array('label'=>'Update Audience','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete Audience','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Audience','url'=>array('admin')),
);
?>

<h1>View Audience #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'number',
		'type',
),
)); ?>
