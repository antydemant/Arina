<?php
/* @var $this DefaultController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
    Yii::t('base', 'File Shares'),
);

$this->menu=array(
	array('label'=>Yii::t('fileShare', 'New file'), 'url'=>array('create')),
);
?>

<h2><?php echo Yii::t('base', 'File Shares'); ?></h2>

<?php

$columns = array(
'file_name',
'master_user',
//'another_master_fullname',
array(
    'header' => Yii::t('base', 'Actions'),
    'htmlOptions' => array('nowrap' => 'nowrap'),
    'class' => 'bootstrap.widgets.TbButtonColumn',
    'template' => '{update}{delete}{view}',
    ),
);

$this->renderPartial('//tableList', array('columns' => $columns, 'provider' => $dataProvider));
