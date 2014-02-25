<?php
/* @var $this ClassAbsenceController */
/* @var $model ClassAbsence */

$this->breadcrumbs=array(
	Yii::t('absence', 'Class Absences')=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>Yii::t('absence', 'Create ClassAbsence'), 'url'=>array('create')),
	array('label'=>Yii::t('absence', 'Update ClassAbsence'), 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>Yii::t('absence', 'Delete ClassAbsence'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>Yii::t('absence', 'Are you sure you want to delete this item?'))),
);
?>

<h1><?php echo Yii::t('absence', 'View ClassAbsence'); ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'actualClass.alias',
		'student.fullName',
	),
)); ?>
