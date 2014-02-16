<?php
/* @var $this ClassMarkController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Class Marks',
);

$this->menu=array(
	array('label'=>'Create ClassMark', 'url'=>array('create')),
	array('label'=>'Manage ClassMark', 'url'=>array('admin')),
);
?>

<h1>Class Marks</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
