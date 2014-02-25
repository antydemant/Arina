<?php
/* @var $this ClassMarkController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	Yii::t('mark', 'Class Marks'),
);

$this->menu=array(
	array('label'=>Yii::t('mark', 'Create ClassMark'), 'url'=>array('create')),
);
?>

<h1><?php echo Yii::t('mark', 'Class Marks'); ?></h1>