<?php
/* @var $this ClassAbsenceController */
/* @var $model ClassAbsence */

$this->breadcrumbs=array(
	Yii::t('absence', 'Class Absences')=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	Yii::t('base', 'Update'),
);

$this->menu=array(
	array('label'=>Yii::t('absence', 'View ClassAbsence'), 'url'=>array('view', 'id'=>$model->id)),
);
?>

<?php $class = ActualClass::model()->findByPk($model->actual_class_id); ?>
<h1><?php echo Student::model()->findByPk($model->student_id)->fullName; ?></h1>
<h3><?php echo 'Пропуск за ' . $class->class_number . ' пару<br>Дата: ' . $class->date; ?></h3>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>