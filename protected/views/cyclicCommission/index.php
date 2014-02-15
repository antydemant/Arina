<?php
$this->breadcrumbs = array(
    'Cyclic Commissions' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List CyclicCommission', 'url' => array('index')),
    array('label' => 'Create CyclicCommission', 'url' => array('create')),
);
?>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'cyclic-commission-grid',
    'dataProvider' => $dataProvider,
    'columns' => array(
        'id',
        'title',
        'head_id',
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
    ),
)); ?>
