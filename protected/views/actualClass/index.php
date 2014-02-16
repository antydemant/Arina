<?php
/* @var $this ActualClassController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Actual Classes',
);

$this->menu=array(
	array('label'=>'Create ActualClass', 'url'=>array('create')),
	array('label'=>'Manage ActualClass', 'url'=>array('admin')),
);
?>

<h1>Actual Classes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
