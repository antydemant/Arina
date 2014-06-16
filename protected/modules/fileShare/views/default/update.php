<?php
/* @var $this FileShareController */
/* @var $model FileShare */

$this->breadcrumbs=array(
    Yii::t('base', 'File Shares') => array('index'),
	$model->file_name => array('view','id'=>$model->id),
    Yii::t('base', 'Update'),
);

$this->menu = array(
	array('label'=>Yii::t('fileShare', 'Files List'), 'url'=>array('index')),
);
?>

<h2> <?php echo Yii::t('fileShare', 'Update file')." ".$model->file_name; ?></h2>
<p>Скачати поточну версію файлу з сервера:</p>
<p><?php $this->widget(BoosterHelper::BUTTON,
        array('buttonType' => 'link',
            'label' => Yii::t('base', 'Download'),
            'htmlOptions' => array('href'=> "/files/$model->file_name"),
        )); ?>
</p>
<p>Завантажити нову версію файлу на сервер:</p>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>
