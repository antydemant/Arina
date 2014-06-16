<?php
/* @var $this FileShareController */
/* @var $model FileShare */

$this->breadcrumbs=array(
    Yii::t('base', 'File Shares') => array('index'),
	$model->file_name,
);

$this->menu = array(
    array('label'=>Yii::t('fileShare', 'Files List'), 'url'=>array('index')),
    array('label'=>Yii::t('fileShare', 'Update file'), 'url'=>array('default/update/'.$model->id)),
);
?>

<h2><?php echo Yii::t('fileShare', 'View file info')." ".$model->file_name; ?></h2>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'file_name',
		'master_user',
        'another_master_fullname',
	),
)); ?>
