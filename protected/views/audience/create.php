<?php
$this->breadcrumbs=array(
	'Audiences'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Audience','url'=>array('index')),
array('label'=>'Manage Audience','url'=>array('admin')),
);
?>

<h1>Create Audience</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>