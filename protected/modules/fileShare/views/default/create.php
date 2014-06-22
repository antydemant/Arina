<?php
/* @var $this FileShareController */
/* @var $model FileShare */

$this->breadcrumbs=array(
    Yii::t('base', 'File Shares') => array('index'),
    Yii::t('fileShare', 'New file'),
);

$this->menu=array(
    array('label'=>Yii::t('fileShare', 'Files List'), 'url'=>array('index')),
);
?>

<h2><?php echo Yii::t('fileShare', 'Upload file for sharing'); ?></h2>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>