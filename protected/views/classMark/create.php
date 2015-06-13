<?php
/* @var $this ClassMarkController */
/* @var $model ClassMark */

$this->breadcrumbs=array(
	Yii::t('mark', 'Class Marks')=>array('index'),
	Yii::t('base', 'Create'),
);

?>

<h1><?php echo Yii::t('mark', 'Create ClassMark'); ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>