<?php
$this->breadcrumbs=array(
	'Cyclic Commissions'=>array('index'),
	$model->title,
);

$this->menu=array(
array('label'=>'List CyclicCommission','url'=>array('index')),
array('label'=>'Create CyclicCommission','url'=>array('create')),
array('label'=>'Update CyclicCommission','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete CyclicCommission','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage CyclicCommission','url'=>array('admin')),
);
?>

<h1>View CyclicCommission #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'title',
		'head_id',
),
)); ?>
