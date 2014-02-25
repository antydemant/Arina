<?php
/* @var $this ClassAbsenceController */
/* @var $model ClassAbsence */

$this->breadcrumbs=array(
	Yii::t('absence', 'Class Absences')=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	Yii::t('base', 'Update'),
);

$this->menu=array(
	array('label'=>Yii::t('absence', 'Create ClassAbsence'), 'url'=>array('create')),
	array('label'=>Yii::t('absence', 'View ClassAbsence'), 'url'=>array('view', 'id'=>$model->id)),
);
?>

<h1><?php echo Yii::t('absence', 'Update ClassAbsence'); ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>