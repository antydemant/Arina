<?php
/* @var $this DepartmentController */
/* @var $model Department */

$this->breadcrumbs = array(
    Yii::t('base', 'Departments') => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List Department', 'url' => array('index')),
    array('label' => 'Create Department', 'url' => array('create')),
);
?>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'department-grid',
    'dataProvider' => $model->search(),
    'columns' => array(
        'id',
        'title',
        'head_id',
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
    ),
)); ?>
