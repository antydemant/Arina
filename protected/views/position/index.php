<?php
/* @var $this PositionController */
/* @var $model Position */

$this->breadcrumbs = array(
    Yii::t('base', 'Positions'),
);

$this->menu = array(
    array('label' => Yii::t('position', 'Create new position'), 'url' => array('create'), 'type' => BoosterHelper::TYPE_PRIMARY),
);
?>

<?php
$columns = array(
    'title',
    'max_load_hour_1',
    'max_load_hour_2',
    /*array(
        'header' => Yii::t('department', 'Department'),
        'name' => 'department.title',
        'value' => 'CHtml::link($data->department->title, array(
                    "/department/view/",
                    "id" => "$data->department_id")
            )',
        'type' => 'raw'
    ),*/
    array(
        'header' => Yii::t('base', 'Actions'),
        'htmlOptions' => array('nowrap' => 'nowrap'),
        'class' => 'bootstrap.widgets.TbButtonColumn',
        'template' => '{update}{delete}{view}',
    ),
);

$this->renderPartial('//tableList', array('provider' => $model->search(), 'columns' => $columns));


?>
