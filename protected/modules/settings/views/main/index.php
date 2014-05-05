<?php
/* @var $this MainController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Settings',
);

$this->menu=array(
	array('label'=>'Create Settings', 'url'=>array('create')),
	array('label'=>'Manage Settings', 'url'=>array('admin')),
);
?>

<h1>Settings</h1>

<?php
$this->widget(
    Booster::GRID_VIEW,
    array(
        'dataProvider' => $model->search(),
        'filter' => $model,
        'columns'=>array(
            'key',
            'title',
            'value',
            array(
                'class'=>'CButtonColumn',
            ),
        ),
        'responsiveTable' => true,
        'type' => 'striped condensed bordered hover',
    )
);
?>
