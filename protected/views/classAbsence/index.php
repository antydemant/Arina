<?php
/* @var $this ClassAbsenceController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	Yii::t('absence', 'Class Absences'),
);

$this->menu=array(
	array('label'=>Yii::t('absence', 'Create ClassAbsence'), 'url'=>array('create')),
);
?>

<h1><?php echo Yii::t('absence', 'Class Absences'); ?></h1>
