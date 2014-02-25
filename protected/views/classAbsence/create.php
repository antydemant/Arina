<?php
/* @var $this ClassAbsenceController */
/* @var $model ClassAbsence */

$this->breadcrumbs=array(
	Yii::t('absence', 'Class Absences')=>array('index'),
	Yii::t('base', 'Create'),
);

?>

<h1><?php echo Yii::t('absence', 'Create ClassAbsence'); ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>