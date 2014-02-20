<?php
/* @var $this CycleController */
/* @var $model SubjectCycle */

$this->breadcrumbs=array(
	'Subject Cycles'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SubjectCycle', 'url'=>array('index')),
	array('label'=>'Manage SubjectCycle', 'url'=>array('admin')),
);
?>

<h1>Create SubjectCycle</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>