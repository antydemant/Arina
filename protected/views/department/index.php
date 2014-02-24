<?php
/* @var $this DepartmentController */
/* @var $model Department */

$this->breadcrumbs = array(
    Yii::t('base', 'Departments'),
);

$this->menu = array(
    array('label' => Yii::t('department', 'Departments list'), 'url' => array('index'), 'type' => Booster::TYPE_PRIMARY),
    array('label' => Yii::t('department', 'Create new department'), 'url' => array('create')),
);
?>

<?php
$columns = array(
    'title',
    array(
        'name' => 'head_id',
        'value' => '$data->head->fullName',
    ),
    array(
        'class' => 'bootstrap.widgets.TbButtonColumn',
        'header' => Yii::t('base', 'Actions'),
    ),
);
$this->renderPartial('//tableList', array('provider' => $model->search(), 'columns' => $columns));
?>
