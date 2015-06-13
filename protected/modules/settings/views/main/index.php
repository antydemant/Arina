<?php
/* @var $this MainController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    Yii::t('base', 'Settings'),
);

$this->menu = array(
    array('label' => Yii::t('settings', 'Create Settings'), 'url' => array('create')),
);
?>

<h2><?php echo Yii::t('base', 'Settings'); ?></h2>

<?php
//$this->widget(
//    BoosterHelper::GRID_VIEW,
//    array(
//        'dataProvider' => $model->search(),
//        'filter' => $model,
$columns = array(
            array(
                'name' => 'key',
                'header' => Yii::t('settings', 'key'),
            ),
            array(
                'name' => 'title',
                'header' => Yii::t('settings', 'title'),
            ),
            array(
                'name' => 'value',
                'header' => Yii::t('settings', 'value'),
            ),
            array(
                'class' => 'bootstrap.widgets.TbButtonColumn',
                'template' => '{view}{delete}{update}',
                'header' => Yii::t('base', 'Actions'),
            ),
//),
//        'responsiveTable' => true,
//        'type' => 'striped condensed bordered hover',
//    )
);
$this->renderPartial('//tableList', array('provider' => $dataProvider, 'columns' => $columns,));
?>
