<?php
/* @var $this DepartmentController */
/* @var $model Department */

$this->breadcrumbs = array(
    Yii::t('base', 'Departments'),
);

$this->menu = array(
    array('label' => Yii::t('department', 'Create new department'), 'url' => array('create'), 'type' => Booster::TYPE_PRIMARY),
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
