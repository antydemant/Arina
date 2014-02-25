<?php
/* @var $this ClassMarkController */
/* @var $model ClassMark */

$this->breadcrumbs=array(
	Yii::t('mark', 'Class Marks')=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>Yii::t('mark', 'Class Marks'), 'url'=>array('index')),
	array('label'=>Yii::t('mark', 'Update ClassMark'), 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>Yii::t('mark', 'Delete ClassMark'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>Yii::t('mark', 'Are you sure you want to delete this item?'))),
);
?>

<h1><?php echo Yii::t('mark', 'View ClassMark'); ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'actualClass.alias',
		'mark',
		'student.fullName',
		'type',
	),
)); ?>
