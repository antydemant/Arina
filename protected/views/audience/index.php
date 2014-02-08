<?php
$this->breadcrumbs=array(
	'Audiences',
);

$this->menu=array(
array('label'=>'Create Audience','url'=>array('create')),
array('label'=>'Manage Audience','url'=>array('admin')),
);
?>

<h1>Audiences</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
