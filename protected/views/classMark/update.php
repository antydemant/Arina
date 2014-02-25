<?php
/* @var $this ClassMarkController */
/* @var $model ClassMark */

$this->breadcrumbs=array(
	Yii::t('mark', 'Class Marks')=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	Yii::t('base', 'Update'),
);

$this->menu=array(
	array('label'=>Yii::t('mark', 'Create ClassMark'), 'url'=>array('create')),
	array('label'=>Yii::t('mark', 'View ClassMark'), 'url'=>array('view', 'id'=>$model->id)),
);
?>

<h1><?php echo Yii::t('mark', 'Update ClassMark') ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>