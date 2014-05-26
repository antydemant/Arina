<?php
/* @var $this MainControllerController */
/* @var $model Settings */

$this->breadcrumbs=array(
    Yii::t('base', 'Settings') => array('index'),
	$model->title,
);

$this->menu=array(
    array('label' => Yii::t('settings', 'List Settings'), 'url'=>array('index')),
);
?>

<h2><?php echo Yii::t('settings', 'View Settings') . ' ' .$model->key; ?></h2>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'key',
		'title',
		'value',
	),
)); ?>
