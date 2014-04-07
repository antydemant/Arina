<?php
/* @var $this CycleController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    Yii::t('base', 'Subject cycles'),
);

$this->menu = array(
    array('label' => Yii::t('subject', 'Create cycle'), 'url' => array('create'), 'type' => Booster::TYPE_PRIMARY),
);
?>

<h1><?php echo Yii::t('subject', 'Cycles list') ?></h1>

<?php
$columns = array(
    'title',
    array(
        'header' => Yii::t('base', 'Actions'),
        'htmlOptions' => array('nowrap' => 'nowrap'),
        'class' => 'bootstrap.widgets.TbButtonColumn',
        'template' => '{update}{delete}{view}',
    ),
);
$this->renderPartial('//tableList', array('columns' => $columns, 'provider' => $dataProvider));
?>
