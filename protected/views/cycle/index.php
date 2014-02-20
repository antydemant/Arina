<?php
/* @var $this CycleController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	Yii::t('base','Subject cycles'),
);

$this->menu=array(
	array('label'=>Yii::t('subject','Create cycle'), 'url'=>array('create')),
);
?>

<h1>Subject Cycles</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
