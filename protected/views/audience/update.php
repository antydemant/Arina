<?php
$this->breadcrumbs=array(
	'Audiences'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Audience','url'=>array('index')),
	array('label'=>'Create Audience','url'=>array('create')),
	array('label'=>'View Audience','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Audience','url'=>array('admin')),
	);
	?>

	<h1>Update Audience <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>